<?PHP

function dbConnectMe()
{
	if( !is_object($_REQUEST['db']['connection']) )
	{
		$_REQUEST['db']['connection'] = ADONewConnection($_REQUEST['config']['db']['driver']);
		$_REQUEST['db']['connection']->Connect($_REQUEST['config']['db']['host'], $_REQUEST['config']['db']['user'], $_REQUEST['config']['db']['pass'], $_REQUEST['config']['db']['name']);
	}
}

function loginUser(&$user)
{
	dbConnectMe();

	$query = "SELECT objectId, email, password, name
			FROM users
			WHERE (	lower(email) = ".dbVal($_POST['vitLogin'])."
				OR	lower(username) = ".dbVal($_POST['vitLogin']).")
				AND password = '".addslashes($_POST['vitPass'])."'
				AND isActive = '1'";
	$qUser_result = doQuery($query,__LINE__,__FILE__);
	
	if($qUser_result->RecordCount()>0 && strlen($_POST['vitLogin']))
	{
		$qUser = $qUser_result->FetchRow();
		if(is_array($qUser))
			foreach($qUser as $field => $value)
				$qUser[$field] = stripslashes($value);
		
		
		$user['email'] = $qUser['email'];
		$user['username'] = $qUser['username'];
		$user['name'] = $qUser['name'];
		$user['id'] = $qUser['objectId'];
		return true;
	} 
	else return false;
}


function dbVal($variable)
{
	return "'".strtolower(addslashes($variable))."'";
}

function relocate($loc,$args,$url)
{
	if(!strlen($url)) $url = $_SERVER['HTTP_HOST']."/index.php";
	if(!stristr($url,"http://")) $url = "http://".$url;
	if(strlen($loc)) $url = $url."?loc=".urlencode($loc);
	if(is_array($args)) 
		foreach($args as $arg => $val)
			$url = $url."&".urlencode($arg)."=".urlencode($val);
	echo "<script>document.location='".$url."';</script>";
	return true;
}

function getFilesFromDir($directory,$showAll=1)
{
	$files = array();
	$i = 0;

	if(is_dir($directory) AND $handle = opendir($directory)) 
	{
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != ".." && !stristr($file,"unauthorised") && !stristr($file,".LCK") && !stristr($file,"_notes"))
			{ 
				//hide files that have no use for the standard admin user
				if( hasPermitionLevel('1') || !stristr($file,"_") || $showAll )
				{
					$files[$i] = $file; 
					$i++;
				}
			}
		}
		closedir($handle);
	}
	sort($files,SORT_STRING);
	return $files;
}

function setPageHeader()
{
	
	//add keywords
		if(strlen($_REQUEST['location']['keywords']))
			$_REQUEST['keywords'] = $_REQUEST['location']['keywords'];
		elseif(!strlen($_REQUEST['keywords']))
			$_REQUEST['keywords'] = $_REQUEST['config']['keywords'];

	//add description
		if(strlen($_REQUEST['location']['description']))
			$_REQUEST['description'] = $_REQUEST['location']['description'];
		elseif(!strlen($_REQUEST['description']))
			$_REQUEST['description'] = $_REQUEST['config']['description'];
		
	//set page title.
		$_REQUEST['pageTitle'] = $_REQUEST['config']['pageTitle'];
		if(strlen($_REQUEST['location']['name']))
			$_REQUEST['pageTitle'] .= " :: ".$_REQUEST['location']['name'];
}

function showFormError($scope)
{
	if(strlen($scope) and (strlen($_REQUEST['errors'][$scope])))
		return "<p class=\"formFieldError\">".$_REQUEST['errors'][$scope]."</p>";
	else return "";
}

function showFormErrorMain($message)
{
	if(strlen($message))
		return "<p class=\"formSubmitionError\">".$message."</p>";
	else return "";
}

function inAgent($agent) 
{
   global $HTTP_USER_AGENT;
   $notAgent = strpos($HTTP_USER_AGENT,$agent) === false;
   return !$notAgent;
}

function getStyleByBrowser()
{
	if ( inAgent('MSIE 4') or inAgent('MSIE 5') ) 
	{
		if ( inAgent('Mac') )	$browser = inAgent('MSIE 5') ? 'ie5mac' : 'ie4mac';
		elseif ( inAgent('Win') ) $browser = 'iewin';
	}
	elseif ( !inAgent('MSIE') ) 
	{
	 if ( inAgent('Mozilla/5') or inAgent('Mozilla/6') )	$browser = 'ns6';
	 elseif ( inAgent('Mozilla/4') ) 
	 {
	   if ( inAgent('Mac') ) $browser = 'nsmac';
	   elseif ( inAgent('Win') ) $browser = 'nswin';
	   else $browser = 'nsunix';
	 }
	} 
	else $browser = "unknown";
		
	return $browser;

}



function getBaseLocation()
{
	if(strstr($_GET['loc'],"."))	$baseMenuLoc = explode(".",$_GET['loc']);
	elseif(strstr($_GET['loc'],"-"))	$baseMenuLoc = explode("-",$_GET['loc']);
	else $baseMenuLoc[0] = $_GET['loc'];
	return $baseMenuLoc[0];
}

function getMainLevelParent($childLocCodeName)
{
	$query = "SELECT lp.codeName
			FROM location lc, location lp 
			WHERE lower(lc.codeName) = ".dbVal($childLocCodeName)."
				AND lp.objectId = lc.parentLocation";
	$qLocParent_result = doQuery($query,__LINE__,__FILE__);

	if($qLocParent_result->RecordCount())
	{
		$qLocParent = $qLocParent_result->FetchRow();
		if(is_array($qLocParent))
			foreach($qLocParent as $field => $value)
				$qLocParent[$field] = stripslashes($value);
		
		//try to search one level up 
		$parentCodeName = getMainLevelParent($qLocParent['codeName']);
		
		if(!strlen($parentCodeName))
			$parentCodeName = $qLocParent['codeName'];
		
		return $parentCodeName;

	}
	else return $childLocCodeName;
}	
	

					
function getParentName($locationId,$separator,$showLinksBack)
{
	$query = "SELECT lp.name,lp.objectId,lp.parentLocation,lp.codeName, lp.menuIcon
			FROM location lc, location lp 
			WHERE lower(lc.objectId) = ".dbVal($locationId)."
				AND lp.objectId = lc.parentLocation";
	$qLocParent_result = doQuery($query,__LINE__,__FILE__);
	if($qLocParent_result->RecordCount())
	{
		$qLocParent = $qLocParent_result->FetchRow();
		if(is_array($qLocParent))
			foreach($qLocParent as $field => $value)
				$qLocParent[$field] = stripslashes($value);
		$parentName = getParentName($qLocParent['objectId'],$separator,$showLinksBack);
		
		if($showLinksBack)
			if(strlen($parentName))
				return $parentName.$separator."<a href=".$_SERVER['PHP_SELF']."?loc=".$qLocParent['codeName'].">".$qLocParent['name']."</a>";
			else
				return "<a href=".$_SERVER['PHP_SELF']."?loc=".$qLocParent['codeName'].">".$qLocParent['name']."</a>";
		else
		{
			if(strlen($parentName))
				return $parentName.$separator.$qLocParent['name'];
			else
				return $qLocParent['name'];
		}
	}
	else return "";
}


function getModuleName($locCodeName,$notSystem)
{
	//check if location is module
	$moduleName[0] = "";
	if(stristr($_SERVER['PHP_SELF'],"/modules/") AND !strlen($locCodeName))//
	{
		//get module name from $_SERVER['PHP_SELF'] between /modules/..../
		$urlParts = explode("/",$_SERVER['PHP_SELF']);
		$i=0;
		foreach($urlParts as $urlPart)
		{
			if(!strcasecmp($urlPart,"modules"))
				$moduleName[0] = $urlParts[$i+1];
			$i++;
		 }
	}
	elseif(strstr($locCodeName,".") OR (!is_numeric($locCodeName) AND !strstr($locCodeName,"-")))
	{
		if(strstr($locCodeName,"."))	$moduleName = explode(".",$locCodeName);
		else	$moduleName[0] = $locCodeName;
		//system is not a module!
		if($notSystem AND !strcasecmp($moduleName[0],"system")) $moduleName[0] = "";
	}
	return $moduleName[0];
}

function isModule($locCodeName='')
{
	if(!strlen($locCodeName)) $locCodeName = $_GET['loc'];
	if(strlen(getModuleName($locCodeName,true)))		return true;
	elseif(stristr($_SERVER['PHP_SELF'],"/modules/") and !strlen($locCodeName)) return true;
	else	return false;
}

function isSystem($locationCodeName)
{
	if(stristr($locationCodeName,"system"))		return true;
	else 		return false;
}

function modulePath()
{
	if(stristr($_SERVER['PHP_SELF'],"/modules/")) $path = "../..";			
	else $path = ".";
	return $path;
}


//define global variable first
$_REQUEST['debugQueriesCount'] = 0;

function doQuery($sql, $line, $file, $page=0) 
{
	$time_start = microtime_float();

	// paging
	if( $page>0 )
	{
/*
		$sql = ereg_replace( "^SELECT", "SELECT SQL_CALC_FOUND_ROWS", $sql );
		$limit = " LIMIT ".($page-1)*$_REQUEST['config']['maxRowsPerPage'].','.$_REQUEST['config']['maxRowsPerPage'];
		$sql = ereg_replace( " LIMIT (.*)", "", $sql );	
		$sql .= $limit;
*/
		$_REQUEST['config']['maxRowsPerPage'] = ((int)($_POST['itemsPerPage']) > 0) ? (int)($_POST['itemsPerPage']) : $_REQUEST['config']['maxRowsPerPage'];

  		$result = $_REQUEST['db']['connection']->PageExecute($sql, $_REQUEST['config']['maxRowsPerPage'], $page);
  		if( $result )
   			$total = $_REQUEST['config']['maxRowsPerPage']*$result->LastPageNo();
	}//if
	else
	{
	  $result = $_REQUEST['db']['connection']->Execute($sql);
  		if( $result )

  	 		$total  = $result->RecordCount();
	}//else
	  
	$_REQUEST['result']['total_rows'] = $total;
	
/*
	if( $page>0 )
	{
		$query = "SELECT FOUND_ROWS() AS count";
	  	$result_res = $_REQUEST['db']['connection']->Execute($query);
	  	$total_res = @mysql_fetch_array($result_res);
		$_REQUEST['result']['total_rows'] = $total_res['count'];
	}//if	
*/	
 	if(!strlen($total)) $total = 0;
 	$time_end = microtime_float();
	$time = round(($time_end - $time_start),5);


	//set next query number 
	$_REQUEST['debugQueriesCount']++;
	$i = $_REQUEST['debugQueriesCount'];
	
	//$_REQUEST['debugQueries'][$i]['process'] = "";
    //$resultProcess = @mysql_list_processes();
    //while ($row = @$resultProcess->FetchRow())
	//{
    //  $_REQUEST['debugQueries'][$i]['process'] .= $row['Id'] . " " . $row['Command'] . " " . $row['Time'] . "<br>";
    //}

	$_REQUEST['debugQueries'][$i]['scriptFile'] = $file;
	$_REQUEST['debugQueries'][$i]['lineNumber'] = $line;
	$_REQUEST['debugQueries'][$i]['sql'] = $sql;
	$_REQUEST['debugQueries'][$i]['time'] = $time;
	$_REQUEST['debugQueries'][$i]['totalRecords'] = $total;
	
	//add additional info if error ocured
  	if (@mysql_error() <> "") 
  	{
    	 //@mysql_free_result($result);
			
		// Error number
		$_REQUEST['debugQueriesErrors'][$i]['errorNumber'] = @mysql_errno();
	
		// Error Description
		$_REQUEST['debugQueriesErrors'][$i]['errorDescription'] = @mysql_error();
	
		// Error Date / Time
		$_REQUEST['debugQueriesErrors'][$i]['errorDate'] = date("H:m:s, jS F, Y");
	
		// Client
		$_REQUEST['debugQueriesErrors'][$i]['client'] = $client;

		$_REQUEST['debugQueriesErrors'][$i]['scriptFile'] = $file;
		$_REQUEST['debugQueriesErrors'][$i]['lineNumber'] = $line;
		$_REQUEST['debugQueriesErrors'][$i]['sql'] = $sql;
		$_REQUEST['debugQueriesErrors'][$i]['time'] = $time;
		$_REQUEST['debugQueriesErrors'][$i]['totalRecords'] = $total;
		
		$client = $_SERVER['HTTP_HOST'];//$_REQUEST['config']['pageTitle']; // Client Name
  		$email = $_REQUEST['config']['adminEmails']; // Email to notify on error
		
		$urlAddress = "HTTP://".$_SERVER['HTTP_HOST']."/".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
		$error_message = "<font color=red>
		<strong>Error: (".$_REQUEST['debugQueriesErrors'][$i]['errorNumber'].") | ".$_REQUEST['debugQueriesErrors'][$i]['errorDescription']."</strong> </font><br> 
		<strong>URL:</strong> <a href='".$urlAddress."'>".$urlAddress."</a><br>
		<strong>File:</strong> ".$_REQUEST['debugQueriesErrors'][$i]['scriptFile']."<br> 
		<strong>Line:</strong> ".$_REQUEST['debugQueriesErrors'][$i]['lineNumber']."<br> 
		<strong>Execution Time:</strong> ".$_REQUEST['debugQueriesErrors'][$i]['time']." s<br> 
		<strong>Records:</strong> ".$_REQUEST['debugQueriesErrors'][$i]['totalRecords']."<br> 
		<strong>SQL:</strong> ".$_REQUEST['debugQueriesErrors'][$i]['sql']."<BR><hr>";
			
		//now send an email
		$headers = "From: \"DEBUG: ". $client."\" <" . $email . ">\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$doUpdateCount = true;
			$ipNumbers = explode(',',$_REQUEST['config']['adminIP']);
			foreach($ipNumbers as $ip)
				if(!strcmp($ip,$_SERVER['REMOTE_ADDR']))
					$doUpdateCount = false;
			
		if($doUpdateCount)
			$subject = "[CRITICAL DATABASE Error]";
		else
			$subject = "[Admin Error]";
			
		//mail($email, $subject, $error_message, $headers);
		if ($_REQUEST['config']['showDebug']) 
  		{
			if(file_exists(modulePath()."./../files/debug.php")) include(modulePath()."./../files/debug.php");
			else include(modulePath()."/files/debug.php");
		} 
		die("<span class=\"queryError\">Sorry, there has been an unexpected database error. The webmaster has been informed of this error.</span>");
  }
  return $result;
}


function microtime_float()
{
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}


function lang($localString)
{
	$localString_key = strtolower(eregi_replace("[ ]+","_",$localString));
	if(strlen($_REQUEST['lang'][$localString_key]))
		return $_REQUEST['lang'][$localString_key];
	else
		return "$[".strtoupper($localString_key)."]";
}

?>
