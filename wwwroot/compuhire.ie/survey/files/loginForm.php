<?PHP

	if($_SESSION['user']['loggedIn'])
	{	
		if(strlen($_SESSION['user']['fullName']))
			$loggedUsername = $_SESSION['user']['fullName'];
		else
			$loggedUsername = $_SESSION['user']['username'];
			
		echo "<div id='logedUserLinksHolder'><div class='header'>".lang('welcome')." <b>".$loggedUsername."</b></div>";
		
		//SHOW ALL POSSIBLE LINKS FOR THIS USER
		if(hasPermitionLevel("1") or userIs('admin'))
		{
			echo "<div class='systemLink'><a href=\"http://".$_SERVER['HTTP_HOST']."/index.php?loc=system\"><img src=\"".modulePath()."/gfx/icons/developer2.gif\" align=\"absbottom\"> ".lang('system_panel')."</a> &raquo;</div>";
			echo "<div class='systemLink'><a href=\"http://".$_SERVER['HTTP_HOST']."/index.php?loc=shop.admin\"><img src=\"".modulePath()."/gfx/icons/config-PC.gif\" align=\"absbottom\"> ".lang('shop_manager')."</a> &raquo;</div>";
			
		}
		//profile
		echo "<div><a href=\"http://".$_SERVER['HTTP_HOST']."/index.php?loc=reg.4\"><img src=\"".modulePath()."/gfx/icons/vote-user-blue.gif\" align=\"absbottom\"> ".lang('my_profile')."</a> &raquo;</div>";
		//change Password
		echo "<div><a href=\"http://".$_SERVER['HTTP_HOST']."/index.php?loc=reg.5\"><img src=\"".modulePath()."/gfx/icons/icon_padlock.gif\" align=\"absbottom\"> ".lang('change_password')."</a> &raquo;</div>";
		//change Language
		//echo "<div><form method=\"post\"><strong>".lang('language')."</strong>&nbsp;&raquo;&nbsp;<select name=\"setNewLanguage\" onchange=\"this.form.submit();\">";
/*
		foreach($_REQUEST['config']['language'] as $language => $code)
		{
			echo "<option value=\"".$code."\""; 
			if($_SESSION['lng'] == $code) 
				echo " selected "; 
			echo ">".$language."</option>";
		}
		
		echo "</select></form></div>";*/
		//logout
		echo "<div class='logoutLink'><a href=\"http://".$_SERVER['HTTP_HOST']."/index.php?logout=1\"><img src=\"".modulePath()."/gfx/icons/user-logout-red.gif\" align=\"absbottom\"> ".lang('logout')."</a></div>
		</div>";
	}
	else
	{
		echo "
		<div id='logedUserLinksHolder'>
		<form method=\"POST\">
		<input type=\"hidden\" name=\"logMeIn\" value=\"1\">
		<div style='text-align: right;'>
		<table cellpadding=0 cellspacing=2 width=100%>
			<tr><td align=right>";
			if(strlen($_POST['vitLogin']))
				echo '<font color="#FF0000">'.lang('wrong_username_password').'</font>&nbsp;&nbsp;';
			echo "<input class=\"textLogin\" value=\"Login\" type=\"text\" name=\"vitLogin\" size=18 onFocus=\"this.value=''\"></td></tr>
			<tr><td align=right><input class=\"textLogin\" value=\"*****\" type=\"password\" name=\"vitPass\" size=18  onFocus=\"this.value=''\"></td></tr>
		</table>
		
		</div>
		<div style='text-align: right; padding-top: 0px; margin-top: 0px; margin-bottom: 5px;'><input class=\"submit\" type=\"submit\" value=\"".lang('do_login')."\" ></div></form>";

		//change Language
		//echo "<div class=\"logoutLink\"><form method=\"post\"><strong>".lang('language')."</strong>&nbsp;&raquo;&nbsp;<select name=\"setNewLanguage\" onchange=\"this.form.submit();\">";
/*
		foreach($_REQUEST['config']['language'] as $language => $code)
		{
			echo "<option value=\"".$code."\""; 
			if($_SESSION['lng'] == $code) 
				echo " selected "; 
			echo ">".$language."</option>";
		}
		
		echo "</select></form></div>";*/
		//LOGOUT LINK
		echo '<div class="logoutLink">
		<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php?loc=reg.1"><img src="'.modulePath().'/gfx/icons/user-login-blue.gif" align="absbottom"> '.lang('sign_in').' &raquo;</a>
		</div>
		<div class="logoutLink">
		<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php?loc=reg.3"><img src="'.modulePath().'/gfx/icons/user-comment-blue.gif" align="absbottom"> '.lang('lost_password').'?</a>
		</div>
		</div>
		';
	}
	

?>
