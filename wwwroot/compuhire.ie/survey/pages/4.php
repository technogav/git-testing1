<?PHP
if(strlen($_GET['id']))
	{
		//get all sections
		$query = "SELECT * FROM users WHERE objectId = ".$_GET['id'];
		$qUser_result = doQuery($query,__LINE__,__FILE__);
		$qUser=$qUser_result->FetchRow();
		?>
		
		<div id="p4_top_left"></div>
		<div id="p4_top_right"></div>
		<div class="clear"></div>
		<div id="p4_center">
			Thank You for your Opinion!
		</div>
		<div class="clear"></div>
		<div id="p4_btm_left"></div>
		<div id="p4_btm_right">
			Your Password is:
			<div class="end_password_box"><?PHP echo $qUser['password']; ?></div>
			<span style="font-size: 14px; font-weight: bold;">There's no need to register again.<br>
			Just use this Password for Free Internet Access anytime!</span>
			<a href="<?PHP echo $_REQUEST['config']['proxyURL'];?>"><img src="./gfx/start_browsing.jpg" style="border: 0px;"><br /></a>
		</div>

<?PHP
	}
	else
	{
		echo "<p class=\"links\">Please fill the <a href=\"http://www.compuhire.ie/survey/index.php?loc=2\">registration form</a> first.</p>";
		echo "<p class=\"links\">If you have already registered - please <a href=\"http://www.compuhire.ie/survey/index.php?loc=login\">log in here</a>.</p>";
	}


?>