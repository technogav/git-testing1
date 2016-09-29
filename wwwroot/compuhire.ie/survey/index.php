<?PHP
	
	//load default config settings for website
	include("./config/config.php");
	
	//load all PHP functions
	include("./system/functions/functions.php");	

	//load ADOdb library
	include("./system/adodb/adodb.inc.php");
	
	//load survey settings for website from db!
	include("./files/load_survey.php");
	
	//try to login the user to session
	include("./files/sessionLogin.php");
	
	//relocate to proxy server login page and allow browsing
	if($_SESSION['user']['loggedIn'] and $_SESSION['user']['name']!=$_REQUEST['config']['adminPass'] and strlen($_POST['vitLogin']))
		relocate("",$urlArgs,$_REQUEST['config']['proxyURL']);
	
	//now at last display output!
	include("./pages/header.php");
//	echo date("d-m-y h:i:s",time()+60*60);
	include("./pages/".$_REQUEST['loc'].".php");
	include("./pages/footer.php");
	
?>