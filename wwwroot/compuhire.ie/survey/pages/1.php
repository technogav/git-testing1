<script language="JavaScript">
	function submitForm(myForm){
		myForm.vitLogin.value = myForm.vitPass.value;
		myForm.submit();
	}
	
</script>
<div id="p1_top_left">
<p>Already Registered?</p><p>Login Here&raquo;</p>
<span style="color: #d32; font-size: 13px;"><?PHP
if(strlen($_POST['vitLogin']) and !$_SESSION['user']['loggedIn']) echo showFormErrorMain('Wrong Username or Password.');
?></span>
</div>
<div id="p1_top_right">
	<?PHP

		echo "
		<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."\" onsubmit=\"submitForm(this)\">
		<input type=\"hidden\" name=\"logMeIn\" value=\"1\">
		<input type=\"hidden\" name=\"vitLogin\" >
		<div id='logedUserLinksHolder' style=\"text-align: center; padding-top: 70px;\">
		Password:<input class=\"textLogin\" type=\"password\" name=\"vitPass\" value=\"1234\" size=14 ><input class=\"button\" type=\"submit\" value=\"GO\"> 
		</div>
		</form>";
	
?>
</div>
<div class="clear"></div>
<div id="p1_center">
	<div class="header">Free Internet Access</div>
	<div class="clear"></div>
	<div id="p1_go" onclick="document.location='http://www.compuhire.ie/survey/index.php?loc=2'"><div class="text">2 Steps 2 Register!</div></div>
</div>
<div class="clear"></div>
<div id="p1_btm_left"><a href="index.php?loc=2">Start</a></div>
<div id="p1_btm_right"></div>
	<form