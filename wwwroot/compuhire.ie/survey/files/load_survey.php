<?PHP

//set page
if($_GET['loc'] == "")	$_REQUEST['loc'] = 1;
else $_REQUEST['loc'] = $_GET['loc'];

//load survey from DB
//image, title
dbConnectMe();

$query = "SELECT objectId, name, image
		FROM survey
		WHERE isActive = '1'";
$qSurvey_result = doQuery($query,__LINE__,__FILE__);

if($qSurvey_result->RecordCount())
{
	$qSurvey = $qSurvey_result->FetchRow();
	$_REQUEST['pageTitle'] = "Compuhire - ".$qSurvey['name'];
	$_REQUEST['image'] = "./gfx/survey_images/".$qSurvey['image'];
}

?>