<?PHP
	
	switch($_POST['actionToDo'])
	{
		case "save":	
			saveSurvey();
			break;
	}
	
	function saveSurvey()
	{
		
		if(validateSurvey())
		{
			
			$query = "UPDATE survey	SET isActive = 0";
			doQuery($query,__LINE__,__FILE__);
			
			$query = "INSERT INTO survey
			(
				name,
				isActive
			)
			VALUES
			(
				'".addslashes($_POST['name'])."',
				1
			)";
			doQuery($query,__LINE__,__FILE__);
			
			//registration done - RELOCATE
			$query = "SELECT objectId FROM survey WHERE isActive = 1";
			$qSurvey_result = doQuery($query,__LINE__,__FILE__);
			$qSurvey=$qSurvey_result->FetchRow();
			$urlArgs['id']=$qSurvey['objectId'];
			relocate("editSurvey",$urlArgs,"http://www.compuhire.ie/survey/index.php");//relocate 
		}//show the general form for person if there were errors
	}
	
	function validateSurvey()
	{
		//check requied fields
		if(!strlen($_POST['name'])) $_REQUEST['errors']['name'] = "'Name' is required";

		if(isset($_REQUEST['errors'])) return false;
		else return true;
	}
	
	


if($_SESSION['user']['loggedIn'])	
{
	//get all DETAILS
	$query = "SELECT * FROM survey WHERE isActive = 1";
	$qSurvey_results = doQuery($query,__LINE__,__FILE__);
	$qSurvey=$qSurvey_results->FetchRow();
	
	
	//get all DETAILS
	$query = "SELECT * FROM survey WHERE isActive = 0";
	$qSurveyOld_results = doQuery($query,__LINE__,__FILE__);

	
	
	if(strlen($_GET['name']))
		include("./pages/editSurvey.php");
	else
	{
		echo '
		<div id="p3_top">Admin Section | <a href="index.php?logout=1">Logout</a></div>
		<div class="clear"></div>
		<div id="admin_center">
		<form method="post">
		<input type="hidden" name="actionToDo" value="save">
		Add new survey:<input type="text" name="name"><input type="submit" value="Add">
		</form>
		<p>
		<b>Current Survey:</b>
		</p>
		<p>
		'.$qSurvey['name'].' ( <a href="index.php?loc=editSurvey&id='.$qSurvey['objectId'].'">edit</a> | <a href="index.php?loc=results&id='.$qSurvey['objectId'].'">view results</a> )
		</p>
		<p>
		<b>Archive Surveys:</b>
		</p>
		<ul>';
		while($qSurveyOld=$qSurveyOld_results->FetchRow()){
		echo '<li>'.$qSurveyOld['name'].' (<a href="index.php?loc=results&id='.$qSurveyOld['objectId'].'">view results</a>)</li>';
		}
		echo'</ul></div>';
	
	}
}else{
	relocate("login",$urlArgs,"http://www.compuhire.ie/survey/index.php");//relocate 
}
?>