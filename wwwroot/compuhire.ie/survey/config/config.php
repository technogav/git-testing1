<?PHP
	
	//DATABASE
	$_REQUEST['config']['db']['driver'] 	= "mysql";
	$_REQUEST['config']['db']['host'] 		= "mysql1443int.cp.blacknight.com";
	$_REQUEST['config']['db']['user'] 		= "db1242247_survay";
	$_REQUEST['config']['db']['pass'] 		= "survey01";
	$_REQUEST['config']['db']['name'] 		= "db1242247_survay";
	
	//$_REQUEST['config']['db']['driver'] 	= "mysql";
	//$_REQUEST['config']['db']['host'] 		= "sql4.hosting365.ie";
	//$_REQUEST['config']['db']['user'] 		= "compuhi_survey";
	//$_REQUEST['config']['db']['pass'] 		= "survey01";
	//$_REQUEST['config']['db']['name'] 		= "compuhi_survey";
	
	//PORTAL DISPLAY 
	$_REQUEST['config']['pageTitle'] 		= "Compuhire";
	$_REQUEST['config']['keywords'] 		= "";
	$_REQUEST['config']['description'] 		= "";
	$_REQUEST['config']['stylesheet'] 		= "/styles/style.css";
	
	//SURVEY DISPLAY
	$_REQUEST['config']['wrapAfterSection'] = 2; //set this to force first column in survey after X sections!
	
	//SECURITY
	$_REQUEST['config']['sessionTimeout'] 	= 0; 	//minutes, set it to '0' to expire after browser close.
	$_REQUEST['config']['showDebug'] 		= false;
	$_REQUEST['config']['adminIP'] 			= "89.100.84.23,84.203.40.187,193.1.160.120,86.41.11.59,83.70.57.195";
	$_REQUEST['config']['adminPass'] 		= "admin101"; //remember to chnage this user's: username and password in DB!!!
	$_REQUEST['config']['proxyURL']			= "http://www.compuhire.ie/survey/access/index.php?q=aHR0cDovL3d3dy5nb29nbGUuaWU%3D&hl=3ed";
	$_REQUEST['config']['proxyTimeout']		= "15";
	
?>
