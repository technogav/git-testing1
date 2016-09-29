<div class="clear">
	<img src="./gfx/sp01.gif" alt="" width="1px" height="1px"/>
</div>
<div class="debug"><HR><h2>Debuging:</h2>
<?PHP
		
	//SHOW QUERIES ERROR
	if(is_array($_REQUEST['debugQueriesErrors']))
	{
		echo "<div class=\"debug\"><h3>QUERIES ERRORS</h3>";
		foreach($_REQUEST['debugQueriesErrors'] as $debugQueryError)	
		{	
			echo "<font color=red>Error: <strong>(".$debugQueryError['errorNumber'].")</strong> | <strong>".$debugQueryError['errorDescription']."</strong> </font><br>";
			echo "[<strong>".$i."</strong>] File: <strong>".$debugQueryError['scriptFile']."</strong> Line: ".$debugQueryError['lineNumber']." | Execution Time: <strong>".$debugQueryError['time']."</strong> s | Records: <strong>".$debugQueryError['totalRecords']."</strong>
			<br> SQL: ".$debugQueryError['sql']."<BR><br>";
		}
	}
	
	//SHOW EXECUTED QUERIES
	if(is_array($_REQUEST['debugQueries']))
	{
		echo "<div class=\"debug\"><h3>QUERIES</h3>";
		$i=1;
		foreach($_REQUEST['debugQueries'] as $debugQuery)	
		{	
			echo "[<strong>".$i."</strong>] File: <strong>".$debugQuery['scriptFile']."</strong> Line: ".$debugQuery['lineNumber']." | Execution Time: <strong>".$debugQuery['time']."</strong> s | Records: <strong>".$debugQuery['totalRecords']."</strong>
			<br> SQL: ".$debugQuery['sql']."<BR><br>";
			$i++;
		}
	}
	
	
	
	
	
	//debuging SCOPES
	$scopes = array();
	$scopes['SESSION']=$_SESSION;
	$scopes['POST']=$_POST;
	$scopes['GET']=$_GET;
	$scopes['REQUEST']=$_REQUEST;
	$scopes['COOKIE']=$_COOKIE;
	$scopes['SERVER']=$_SERVER;
	
	
	
	
	
	foreach($scopes as $name => $scope)
		if(is_array($scope)) 	
			echo "<div class=\"debug\"><h3>\$".$name.":</h3>".displayArray($scope,$name)."<HR></div>";
			

	function displayArray($scope,$name)
	{
		$out = "<UL>";
		foreach($scope as $key => $value)
			if(is_array($value))
				$out .= "<li>\$".$name."[<strong>".$key."</strong>]</li> <UL>".displayArray($scope[$key],$name."[<strong>".$key."</strong>]")."</UL>"; 
			else
				$out .= "<li>\$".$name."[<strong>".$key."</strong>] = |<strong>".$value."</strong>|</li>";
		$out .= "</UL>";
		return $out;
	}
		
?>

</div>



