<?PHP
	
	switch($_POST['actionToDo'])
	{
		case "save":	
			saveSurvey();
			break;
		case "update":	
			update();
			break;
		case "upload":	
			upload();
			break;
	}
	
	if(strlen($_GET['did']) and strlen($_GET['type']))	
		deleteObject();

	
	function saveSurvey()
	{
		
		if(validateSurvey())
		{
			$query = "INSERT INTO ".$_POST['table']."
			(
				name,
				parentId
			)
			VALUES
			(
				'".addslashes($_POST['objectName'])."',
				'".addslashes($_POST['parentId'])."'
			)";
			doQuery($query,__LINE__,__FILE__);

			$urlArgs['id']=$_GET['id'];
			relocate("editSurvey",$urlArgs,"http://www.compuhire.ie/survey/index.php");//relocate 
		}//show the general form for person if there were errors
	}
	
	function deleteObject()
	{
		$query = "DELETE FROM ".$_GET['type']." WHERE objectId = ".$_GET['did'];
		doQuery($query,__LINE__,__FILE__);
		
		$urlArgs['id']=$_GET['id'];
		relocate("editSurvey",$urlArgs,"http://www.compuhire.ie/survey/index.php");//relocate 
	}
	
	function update()
	{
		$query = "UPDATE survey SET name = '".$_POST['objectName']."' WHERE objectId = ".$_GET['id']."";
		doQuery($query,__LINE__,__FILE__);
		
		$urlArgs['id']=$_GET['id'];
		relocate("editSurvey",$urlArgs,"http://www.compuhire.ie/survey/index.php");//relocate 
	}
	
	function upload()
	{
		if (stristr($_FILES['imagefile']['type'],"image/gif") or 
			stristr($_FILES['imagefile']['type'],"image/jpg") or 
			stristr($_FILES['imagefile']['type'],"image/jpeg") or
			stristr($_FILES['imagefile']['type'],"image/png") )
		{ 
		copy ($_FILES['imagefile']['tmp_name'], "./gfx/survey_images/".$_FILES['imagefile']['name']) 
	    or die ("Could not copy"); 
		
		$query = "UPDATE survey SET image = '".$_FILES['imagefile']['name']."' WHERE objectId = ".$_GET['id']."";
		doQuery($query,__LINE__,__FILE__);
		
		$urlArgs['id']=$_GET['id'];
		relocate("editSurvey",$urlArgs,"http://www.compuhire.ie/survey/index.php");//relocate 
        } 
		else {
            echo "<br><br>";
            echo "Could Not Copy, Wrong Filetype (".$_FILES['imagefile']['name'].")<br>";
        } 
		
	}
	
	
	function validateSurvey()
	{
		//check requied fields
		if(!strlen($_POST['objectName'])) $_REQUEST['errors']['objectName'] = "'Name' is required";

		if(isset($_REQUEST['errors'])) return false;
		else return true;
	}
	

	//get all DETAILS
	$query = "SELECT * FROM survey WHERE objectId = ".$_GET['id'];
	$qSurvey_results = doQuery($query,__LINE__,__FILE__);
	$qSurvey=$qSurvey_results->FetchRow();
		
?>


	<div id="p3_top">
		Edit survey | <input type="button" value="Save and Exit" onclick="document.location='index.php?loc=admin'">
	</div>
	<div class="clear"></div>
	<div class="errors">	
		<?PHP 
			
			
			if(isset($_REQUEST['errors']))	echo "<p><strong>There was an error in your form:</strong></p>"; 
			echo showFormError("objectName");
			
			
			?>
		</div>
	<div id="admin_center">
		
	
	<script>
		
		function addObject(type,parentId)
		{
			var myForm = document.getElementById("myForm");
			var elemId = type+'_'+parentId;
			myForm.parentId.value = parentId;
			myForm.objectName.value = document.getElementById(elemId).value;
			myForm.table.value = type;
			myForm.submit();
		}		
		
		function saveName()
		{
			var myForm = document.getElementById("myForm");
			myForm.objectName.value = document.getElementById('survey_').value;
			myForm.actionToDo.value = "update";
			myForm.submit();
		}	
		
		function upload(){
			
			var myForm = document.getElementById("myForm");
			myForm.actionToDo.value = "upload";
			myForm.enctype.value="multipart/form-data";
			myForm.submit();
			
		}
	</script>
	
	
	<form id="myForm" method="post">
		<input type="hidden" name="parentId">
		<input type="hidden" name="objectName">
		<input type="hidden" name="table">
		<input type="hidden" name="actionToDo" value="save">
	</form>



	<div style="float: left;">
		<b>Survey Name:</b> <input type="text" name="survey_" id="survey_" value="<?PHP echo $qSurvey['name']; ?>" size="26"><input type="button" value="Save" onclick="saveName();" >
	</div>
	<div style="float: left; text-align: right; padding-left: 40px;">
		<form id="imageUpload" enctype="multipart/form-data" method="post"><b>Image:</b><input type="file" name="imagefile" id="imagefile"><input type="submit" value="Save"><input type="hidden" name="actionToDo" value="upload"></form>
	</div>
	<div class="clear"></div>
	<hr>
	<h3>Sections:</h3>
<?PHP

	//get all sections
	$query = "SELECT * FROM section WHERE parentid = ".$qSurvey['objectId'];
	$qSections_results = doQuery($query,__LINE__,__FILE__);
	
	echo 'Add new section:<input type="text" name="section_'.$qSurvey['objectId'].'" id="section_'.$qSurvey['objectId'].'"><input type="button" value="Add" onclick="addObject(\'section\',\''.$qSurvey['objectId'].'\');">';
	while($qSection=$qSections_results->FetchRow())
	{
		echo "<h3>'".$qSection['name']."' - <a href=\"".$_SERVER['PHP_SELF']."?loc=editSurvey&id=".$qSurvey['objectId']."&type=section&did=".$qSection['objectId']."\">delete</a></h3>";
		//get all questions
		$query = "SELECT * FROM question WHERE parentid = ".$qSection['objectId'];
		$qQuestions_results = doQuery($query,__LINE__,__FILE__);
		
		echo 'Add new question:<input type="text" name="question_'.$qSection['objectId'].'" id="question_'.$qSection['objectId'].'"><input type="button" value="Add" onclick="addObject(\'question\',\''.$qSection['objectId'].'\');">';
		while($qQuestion=$qQuestions_results->FetchRow())
		{
			echo "<h4>Q: '".$qQuestion['name']."' -  <a href=\"".$_SERVER['PHP_SELF']."?loc=editSurvey&id=".$qSurvey['objectId']."&type=question&did=".$qQuestion['objectId']."\">delete</a></h4><ul>";
			//get all answers
			$query = "SELECT * FROM answer WHERE parentid = ".$qQuestion['objectId'];
			$qAnswers_results = doQuery($query,__LINE__,__FILE__);
			
			echo 'Add new answer:<input type="text" name="answer_'.$qQuestion['objectId'].'" id="answer_'.$qQuestion['objectId'].'"><input type="button" value="Add" onclick="addObject(\'answer\',\''.$qQuestion['objectId'].'\');">';
			while($qAnswer=$qAnswers_results->FetchRow())
			{
				echo "<li class='admin_ans'>".$qAnswer['name']." - <a href=\"".$_SERVER['PHP_SELF']."?loc=editSurvey&id=".$qSurvey['objectId']."&type=answer&did=".$qAnswer['objectId']."\">delete</a></li>";	
				
			}
			echo "</ul>";
		}	
		
	}

?>
</div>
