<?PHP
	
	if(strlen($_POST['actionToDo']))	//get user details from submitted form
	{
		foreach($_POST as $field => $value)
			$_REQUEST['userForm'][$field] = $value;
	}
	

	switch($_POST['actionToDo'])
	{
		case "register":	
			saveUser();
			break;
	}
	
	function saveUser()
	{
		//create username and password
		$_POST['username'] = ereg_replace("[ ]+","_",$_POST['name']).date('Y');
		$_POST['password'] = $_POST['username'];
		
		if(validateUser())
		{
			//check if other user with this username exists when adding new user
			$query = "SELECT * FROM users WHERE lower(email) = ".dbVal($_POST['email'])." ";
			$qUsersCheck_result = doQuery($query,__LINE__,__FILE__);
			if($qUsersCheck_result->RecordCount()) $_REQUEST['errors']['user_exists'] = "User with this email address already exists in the system"; 
			else{
						
			$query = "INSERT INTO users
			(
				username,
				password,
				name,
				organization,
				country,
				email,
				isActive
			)
			VALUES
			(
				'".addslashes($_POST['username'])."',
				'".addslashes($_POST['password'])."',
				'".addslashes($_POST['name'])."',
				'".addslashes($_POST['organization'])."',
				'".addslashes($_POST['country'])."',
				'".addslashes($_POST['email'])."',
				'1'
			)";
			doQuery($query,__LINE__,__FILE__);
			}
			//registration done - RELOCATE
			$query = "SELECT objectId FROM users WHERE lower(email) = ".dbVal($_POST['email'])." ";
			$qUser_result = doQuery($query,__LINE__,__FILE__);
			$qUser=$qUser_result->FetchRow();
			$urlArgs['id']=$qUser['objectId'];
			relocate("3",$urlArgs,"http://www.compuhire.ie/survey/index.php");//relocate 
		}//show the general form for person if there were errors
	}
	
	function validateUser()
	{
		//check requied fields
		//if(!strlen($_POST['email'])) $_REQUEST['errors']['email'] = "'Email' address is required";
		if(!strlen($_POST['name'])) $_REQUEST['errors']['name'] = "'Name' is required";
		if(!strlen($_POST['organization'])) $_REQUEST['errors']['organization'] = "'Organization' is required";
		//if(!strlen($_POST['country'])) $_REQUEST['errors']['country'] = "'Country' is required";
		
		//validate email
		//if(!eregi("^([a-zA-Z0-9][-a-zA-Z0-9_%\.']*)?[a-zA-Z0-9]@[a-zA-Z0-9][-a-zA-Z0-9%\>.]*\.[a-zA-Z]{2,}$",$_POST['email']) && strlen($_POST['email'])) 
		//	$_REQUEST['errors']['email'] = "This is not a valid email address";
		
		
		if(isset($_REQUEST['errors'])) return false;
		else return true;
	}
?>


	<div id="p2_top"></div>
	<div class="clear"></div>
	<div id="p2_center1">
		<div class="errors">
			<?PHP 
			
			
			if(isset($_REQUEST['errors']))	echo "<p><strong>There was an error in your form:</strong></p>"; 
			echo showFormError("name");
			echo showFormError("organization");
			//echo showFormError("country");
			//echo showFormError("email");
			//echo showFormError("user_exists");
			
			
			?>
		</div><div class="clear"></div>
		<div class="text">First Step.</div>
	</div>
	<div id="p2_center2">
		
	</div>
	<div class="clear"></div>
	<div id="p2_btm_left">
		<div class="text">Please Register:</div>
	</div>
	<div id="p2_btm_right">
	
<?PHP

	echo "<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."\" style=\"margin: 0px;\">
	<input type=\"hidden\" name=\"actionToDo\" value=\"register\">
   
	<table cellspacing=\"15px\" width=\"100%\" style=\"margin-top: 20px;\">
	<tr>
	<td align=\"right\">Name:</td>
	<td><input class=\"textfield\" name=\"name\" type=\"text\" value=\"".$_POST['name']."\"></td>
	</tr>
	<tr>
	<td align=\"right\">Organization:
	</td>
	<td><input class=\"textfield\" name=\"organization\" type=\"text\" value=\"".$_POST['organization']."\"></td>
	</tr>";
	/*<!---
	<tr>
	<td align=\"right\">Country:</td>
	<td><input class=\"textfield\" name=\"country\" type=\"text\" value=\"".$_POST['country']."\"></td>
	</tr>
	<tr>
	<td align=\"right\">Your Email:</td>
	<td><input class=\"textfield\" name=\"email\" type=\"text\" value=\"".$_POST['email']."\"></td>
	</tr>--->*/
	echo "
	<tr><td colspan=\"2\" align=\"center\"><br />
	<input type=\"button\" class=\"submit\" value=\"Cancel\" onclick=\"document.location='http://www.compuhire.ie/survey'\"> | 
	<input type=\"submit\" class=\"submit\" value=\"Register Me\">
	</td></tr>
	</table>
	</form>";

?>
</div>
