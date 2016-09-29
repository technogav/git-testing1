<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?PHP echo $_REQUEST['pageTitle']; ?></title>
<meta name="keywords" content="<?PHP echo $_REQUEST['keywords']; ?>" >
<meta name="description" content="<?PHP echo $_REQUEST['description']; ?>" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css" title="Imported CMS Stylesheet"> @import ".<?PHP echo $_REQUEST['config']['stylesheet']; ?>"; </style>
</head>
<body>
<div id="lHolder">
	
	<div id="lLeft">
		
		<div id="orange">
			<?PHP
			if($_GET['loc']==2) echo"<div class=\"text\">First Step.</div>";
			if($_GET['loc']==3) echo"<div class=\"text\">Last Step.</div>";
			if($_GET['loc']=='admin') echo"<div class=\"text\">Admin.</div>";
			
			?>
		</div>
		<div class="clear"></div>
		<div id="image">
			<img src="<?php echo $_REQUEST['image']; ?>" nowrap style="width: 255px; height: 200px;"><br />
		</div>
		<div class="clear"></div>
		<div id="grey"></div>
		<div class="clear"></div>
		
	</div>

	<div id="lMain">
	
		