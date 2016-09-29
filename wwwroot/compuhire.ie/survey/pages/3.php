<?PHP
	
	if(strlen($_POST['actionToDo']))	//get user details from submitted form
	{
		foreach($_POST as $field => $value)
			$_REQUEST['userForm'][$field] = $value;
	}
	

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
			foreach($_POST as $key => $nr)
			{
				if(strstr($key,"q_"))
				{
					$query = "UPDATE answer SET hitCount=hitCount+1 WHERE objectId = ".$nr." ";
					doQuery($query,__LINE__,__FILE__);
				}	
			}
			
			
			$urlArgs['id']=$_GET['id'];
			$urlArgs['a']=1;
			relocate("4",$urlArgs,"http://www.compuhire.ie/survey/index.php");//relocate 
		}//show the general form for person if there were errors
	}
	
	function validateSurvey()
	{
		//check if all questions were answered
		$query = "SELECT section.objectId FROM section, survey
			WHERE section.parentid = survey.objectId
				AND survey.isActive = 1";
		$qSections_results = doQuery($query,__LINE__,__FILE__);
		while($qSection=$qSections_results->FetchRow())
		{
			//get all questions
			$query = "SELECT objectId FROM question WHERE parentid = ".$qSection['objectId'];
			$qQuestions_results = doQuery($query,__LINE__,__FILE__);
			while($qQuestion=$qQuestions_results->FetchRow())
			{
				if($_POST[q_.$qQuestion['objectId']]==""){
					$_REQUEST['errors']['fields'] = "<script>alert('Please give answer to all questions.')</script>";
					break;
				}
			}
		}
		
		if(isset($_REQUEST['errors'])) return false;
		else return true;
	}
?>


	<div id="p3_top">Your Opinion Counts  -  Tell Us What You Think!</div>
	<div class="clear"></div>
	<div id="p3_center">
	
<?PHP
	
	if(strlen($_GET['id']))
	{
		//get all sections
		$query = "SELECT * FROM section WHERE parentid = ".$qSurvey['objectId'];
		$qSections_results = doQuery($query,__LINE__,__FILE__);
		$sectionCount = 1;
		$pageBreak = 0;
		
		echo '<form method="post">
		<input type="hidden" name="actionToDo" value="save">
		<div style="float: left; width: 50%;">';
		
		while($qSection=$qSections_results->FetchRow())
		{
			echo "<div class=\"hSection\">".$qSection['name']."</div>";
			//get all questions
			$query = "SELECT * FROM question WHERE parentid = ".$qSection['objectId'];
			$qQuestions_results = doQuery($query,__LINE__,__FILE__);
			
			while($qQuestion=$qQuestions_results->FetchRow())
			{
				echo "<div class=\"hQuestion\">".$qQuestion['name']."</div>";
				//get all answers
				$query = "SELECT * FROM answer WHERE parentid = ".$qQuestion['objectId'];
				$qAnswers_results = doQuery($query,__LINE__,__FILE__);
				
				echo "<div class=\"hAnswer\">";
				while($qAnswer=$qAnswers_results->FetchRow())
				{
					echo "<input type=\"radio\" name=\"q_".$qQuestion['objectId']."\" value=\"".$qAnswer['objectId']."\""; if($_POST[q_.$qQuestion['objectId']]==$qAnswer['objectId'])echo " checked "; echo " >".$qAnswer['name']." ";	
				}
				echo "</div>";
			}	
			if($sectionCount >= $_REQUEST['config']['wrapAfterSection'] and !$pageBreak){
				echo '</div><div style="float: left; width: 50%;">';
				$pageBreak = 1;			
			}	
			$sectionCount++;
		}
	
		echo "</div>
		
		<div id=\"survey_submit_btns\">
		<!---<input type=\"button\" class=\"submit\" value=\"Cancel\" onclick=\"if (confirm('Are you sure you wish to cancel filling this survey?\\n\\nYou will not be able to get Free Internet Access!')) document.location='http://www.compuhire.ie/survey'\">
		&nbsp;&nbsp;&nbsp;&nbsp;--->
		<input type=\"submit\" class=\"submit\" value=\"Submit &raquo;\">
		</div></form>";
	}
	else
	{
		echo "<p class=\"links\">Please fill the <a href=\"http://www.compuhire.ie/survey/index.php?loc=2\">registration form</a> first.</p>";
		echo "<p class=\"links\">If you have already registered - please <a href=\"http://www.compuhire.ie/survey/index.php?loc=login\">log in here</a>.</p>";
	}

	
	echo showFormError("fields");
?>

	</div>
