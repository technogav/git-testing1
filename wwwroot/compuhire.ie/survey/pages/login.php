<div id="p3_top">Login</div>
<div class="clear"></div>
<div id="p3_center">
	
	
<script language="JavaScript">
	function submitForm(myForm){
		myForm.vitLogin.value = myForm.vitPass.value;
		myForm.submit();
	}
	
</script>
	
<?PHP

		echo "
		<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."\">
		<input type=\"hidden\" name=\"logMeIn\" value=\"1\">
		<div id='logedUserLinksHolder'>
		<div style='text-align: left; padding-left: 50px;'>
			<input class=\"textLogin\" type=\"hidden\" name=\"vitLogin\" value=\"Login\" onfocus=\"this.value=''\" size=14 style=\"margin-bottom: 2px\">
			Password: <input class=\"textLogin\" type=\"password\" name=\"vitPass\" value=\"\" size=14 >
			<input class=\"button\" type=\"button\" value=\"Login\" onclick='submitForm(this.form);'> </div>";
		if(strlen($_POST['vitLogin']))
			echo "<div>".showFormErrorMain('Wrong Username or Password.')."</div>";
		echo '<div class="logoutLink"><a href="http://'.$_SERVER['HTTP_HOST'].'/survey/index.php?loc=2">Not registered yet?</a>	</div>'; 
		echo '</div></form>';
	
?>
</div>