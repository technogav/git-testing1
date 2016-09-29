</div>
</div>
<?PHP

$isAdminIp = false;
$ipNumbers = explode(',',$_REQUEST['config']['adminIP']);
foreach($ipNumbers as $ip)
	if(!strcmp($ip,$_SERVER['REMOTE_ADDR']))
		$isAdminIp = true;

if($_REQUEST['config']['showDebug'] and $isAdminIp )
	include("./files/debug.php");

?>
</body>
</html>