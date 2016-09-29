<?
	
	//   timeout value for the garbage collector
	//   we add 300 seconds, just in case the user's computer clock
	//   was synchronized meanwhile; 600 secs (10 minutes) should be
	//   enough - just to ensure there is session data until the
	//   cookie expires
	//$garbage_timeout = 60*$_REQUEST['config']['sessionTimeout'] + 600; // in seconds
	if($_REQUEST['config']['sessionTimeout'])	
	{
		session_set_cookie_params(60*$_REQUEST['config']['sessionTimeout'],'/');
		session_cache_expire(60*$_REQUEST['config']['sessionTimeout']);
	}
	//   set the garbage collector - who will clean the session files -to our custom timeout
	//ini_set('session.gc_maxlifetime', $garbage_timeout);
	//session_cache_limiter('private');
	
	session_name('vitSessionId');
	session_save_path(modulePath().'/tmp');
	
	session_start();
	
	if($_POST['logMeIn']) // && !session_is_registered('user')) 
	{
		session_register('user');//create $_SESSION['user']
	
		if(!$_SESSION['user']['loggedIn']=loginUser($_SESSION['user']))
			$_GET['logout']=1;
		elseif($_SESSION['user']['name']==$_REQUEST['config']['adminPass'])
			echo "<script>document.location='index.php?loc=admin';</script>";
		else //the user is verified and can access internet
			setcookie("compuhireProxy",$_REQUEST['config']['proxyTimeout'].' min access',time()+60*60+60*$_REQUEST['config']['proxyTimeout']);

	}
	
	if($_GET['logout'])
	{
		$_SESSION = array();
		if(isset($_COOKIE['session_name']))
			setcookie(session_name(),'', time()-60*60*24*30, '/');
		setcookie("compuhireProxy",'0 min access',time()-60*60*24*30);
		unset($_COOKIE['session_name']);
		unset($_SESSION);
		session_destroy();
		//echo "<script>document.location='index.php';</script>";
	}
	
	if($_GET['loc']==4 and $_GET['a']==1)
		setcookie("compuhireProxy",$_REQUEST['config']['proxyTimeout'].' min access',time()+60*60+60*$_REQUEST['config']['proxyTimeout']);

?>
