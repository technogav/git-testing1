<?PHP

	$query = "SELECT * FROM survey WHERE objectId = ".$_GET['id'];
	$qSurvey_results = doQuery($query,__LINE__,__FILE__);
	$qSurvey=$qSurvey_results->FetchRow();
	
?>


	<div id="p3_top">
		<?PHP echo $qSurvey['name']; ?> - Results | <input type="button" value="Exit" onclick="document.location='index.php?loc=admin'">
	</div>
	<div class="clear"></div>
	<div id="admin_center">
<?PHP
	
	//get all sections
	$query = "SELECT * FROM section WHERE parentid = ".$qSurvey['objectId'];
	$qSections_results = doQuery($query,__LINE__,__FILE__);
	
	echo '<form method="post">
	<input type="hidden" name="actionToDo" value="save">';
	
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
			
			$query = "SELECT sum(hitCount) as total FROM answer WHERE parentid = ".$qQuestion['objectId'];
			$qAnswersHits_results = doQuery($query,__LINE__,__FILE__);
			$qAnswerHits=$qAnswersHits_results->FetchRow();
			
			echo "<table cellpadding=\"0\" cellspacing=\"0\">";
			while($qAnswer=$qAnswers_results->FetchRow())
			{
				if($qAnswerHits['total']>0){
				$prc=intval(($qAnswer['hitCount']*100)/$qAnswerHits['total']);
				}
				else $prc = 0;
				$width=$prc*3;
				echo "<tr><td align=\"right\" style=\"padding: 0 5px; width: 100px;\">".$qAnswer['name']."<td><div class=\"result_bar\" style=\"width: ".$width."px;\"></div> ".$prc."% (".$qAnswer['hitCount'].")</td></tr>";	
			}
			echo "</table>";
		}	
		
	}


?>

	</div>
