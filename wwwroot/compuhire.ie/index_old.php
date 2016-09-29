<html>
<head>
<title>Computer Hire Ireland -  Rent Short Term Technical Solutions - Compu Hire</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="Hire latest technology computers, laptops, printers and photocopiers for your conference, event or training session in Dublin, Ireland. You can rent computer, office equipment, technical support.">
<meta name="keywords" content="computer hire, hiring computers, ireland, event management, office equipment, conference, hire, technology, laptops, printers, technical, support,  corporate event, technical support, event, display, equipment, dublin, ireland">
<meta name="author" content="www.tdhinteractive.ie">
<meta http-equiv="Content-Language" content="en-GB">
<meta name="resource-type" content="document">
<meta name="revisit-after" content="30 days">
<meta name="robots" content="index,follow">
<meta name="subjects" content="Computer Hire">
<meta name="classification" content="Computer Hire">
<meta name="copyright" content="Compu Hire">
<meta http-equiv="Reply-to" content="info@compuhire.ie">
<meta http-equiv="Pragma" content="no-cache">

<link rel="stylesheet" href="css/compuhire.css" type="text/css">

<script type="text/javascript" language="text/javascript">
<!--
var note = "Compu - Hire";
function statusbar()
{
  defaultStatus = note.substr()
}
statusbar();
//-->
</script>

<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
<!--
// #############################################
// these are the user defined globals
// modify the following variables to customize the inspection behaviour

var requiredVersion = 5;			// version the user needs to view site (max is 5, min is 2)
var useRedirect = true; 			// "true" loads new flash or non-flash page into browser
									// "false" embeds movie or alternate html code into current page

// set next three vars if useRedirect is true...
var flashPage = "_self"		// the location of the flash movie page
var noFlashPage = "needflash.html"	// send user here if they don't have the plugin or we can't detect it
var upgradePage = "needflash.html"	// send user here if we detect an old plugin
// #############################################



// *************
// everything below this point is internal until after the body tag
// do not modify! 
// *************

// system globals
var flash2Installed = false;		// boolean. true if flash 2 is installed
var flash3Installed = false;		// boolean. true if flash 3 is installed
var flash4Installed = false;		// boolean. true if flash 4 is installed
var flash5Installed = false;		// boolean. true if flash 5 is installed
var flash6Installed = false;		// boolean. true if flash 6 is installed
var maxVersion = 6;					// highest version we can actually detect
var actualVersion = 0;				// version the user really has
var hasRightVersion = false;		// boolean. true if it's safe to embed the flash movie in the page
var jsVersion = 1.0;				// the version of javascript supported

// -->
</SCRIPT>

<SCRIPT LANGUAGE="JavaScript1.1" type="text/javascript">
<!--

// check the browser...we're looking for ie/win
var isIE = (navigator.appVersion.indexOf("MSIE") != -1) ? true : false;		// true if we're on ie
var isWin = (navigator.appVersion.indexOf("Windows") != -1) ? true : false; // true if we're on windows

// this is a js1.1 code block, so make note that js1.1 is supported.
jsVersion = 1.1;

// write vbscript detection if we're not on mac.
if(isIE && isWin){ // don't write vbscript tags on anything but ie win
	document.write('<SCR' + 'IPT LANGUAGE=VBScript\> \n');
	document.write('on error resume next \n');
	document.write('flash2Installed = (IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.2"))) \n');
	document.write('flash3Installed = (IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.3"))) \n');
	document.write('flash4Installed = (IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.4"))) \n');
	document.write('flash5Installed = (IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.5"))) \n');	
	document.write('flash6Installed = (IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.6"))) \n');	
	document.write('</SCR' + 'IPT\> \n'); // break up end tag so it doesn't end our script
}
// -->
</SCRIPT>

<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
<!--

// next comes the standard javascript detection that uses the navigator.plugins array
// we pack the detector into a function so it loads before we run it

function detectFlash(){	

	if (navigator.plugins){								// does navigator.plugins exist?
		if (navigator.plugins["Shockwave Flash 2.0"] 	// yes>> then is Flash 2 
		|| navigator.plugins["Shockwave Flash"]){		// or flash 3+ installed?

			// set convenient references to flash 2 and the plugin description
			var isVersion2 = navigator.plugins["Shockwave Flash 2.0"] ? " 2.0" : "";
			var flashDescription = navigator.plugins["Shockwave Flash" + isVersion2].description;
			// a flash plugin-description looks like this: Shockwave Flash 4.0 r5
			// so we can get the major version by grabbing the character before the period
			// note that we don't bother with minor version detection. do that in your movie with $version
			var flashVersion = parseInt(flashDescription.charAt(flashDescription.indexOf(".") - 1));

			// we know the version, now set appropriate version flags
			flash2Installed = flashVersion == 2;		
			flash3Installed = flashVersion == 3;
			flash4Installed = flashVersion == 4;
			flash5Installed = flashVersion == 5;
			flash6Installed = flashVersion == 6;
		}
	}
	
	// loop through all versions we're checking, and set actualVersion to highest detected version
	for (var i = 2; i <= maxVersion; i++) {	
		if (eval("flash" + i + "Installed") == true) actualVersion = i;
	}
	// if we're on webtv, the version supported is 2 (pre-summer2000, or 3, post-summer2000)
	// note that we don't bother sniffing varieties of webtv. you could if you were sadistic...
	if(navigator.userAgent.indexOf("WebTV") != -1) actualVersion = 2;	
	
	// uncomment next line to display flash version during testing
	// alert("version detected: " + actualVersion);


	// we're finished getting the version. time to take the appropriate action

	if (actualVersion >= requiredVersion) { 		// user has a new enough version
		hasRightVersion = true;						// flag: it's okay to write out the object/embed tags later

		if (useRedirect) {							// if the redirection option is on, load the flash page
			if(jsVersion > 1.0) {					// need javascript1.1 to do location.replace
				window.location.self;	// use replace() so we don't break the back button
			} 
		}
	} else {	// user doesn't have a new enough version.
	
		if (useRedirect) {		// if the redirection option is on, load the appropriate alternate page
			if(jsVersion > 1.0) {	// need javascript1.1 to do location.replace
				window.location.replace((actualVersion >= 2) ? upgradePage : noFlashPage);
			} else {
				window.location = (actualVersion >= 2) ? upgradePage : noFlashPage;
			}
		}
	}
}


//detectFlash();	// call our detector now that it's safely loaded.	
	
// -->

</script>

<style fprolloverstyle>
.optimization {
 Z-INDEX: 6; WIDTH: 500px; POSITION: absolute; TOP: -800px; LEFT: 0px; HEIGHT: 200px
}

</style>
           <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#000000" text="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<div class=optimization>
<H1>computer, hire, rental, ireland, office equipment, photocopier, conference, training, www.compuhire.ie</H1>
<br><B>computer, hire, rental, ireland, office equipment, photocopier, conference, training, www.compuhire.ie</b>
<a href="http://www.contingex.com">
<img src=./logo.gif width=1 height=1 border=0 alt="computer, hire, rental, ireland, office equipment, photocopier, conference, training, www.compuhire.ie">
computer, hire, rental, ireland, office equipment, photocopier, conference, training, www.compuhire.ie </a>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="2">
<?PHP

$req = $show.".php";
if(!file_exists($req)) $req = "main.php";
 require($req);?>
</td></tr>
<TR><TD colspan=2 height=2 bgcolor=red>
<TR><TD valign=top align=left style="padding-top: 10; padding-left: 16px; font-family: verdana; font-size: 18px; font-weight: bold;">
 Ireland's Number One Technology Hire Company
 <TD align=right style="padding-top: 4; padding-right: 16px; font-family: verdana; font-size: 14px; font-weight: bold;">
 Telephone : 01 6219128<BR>
 International: ++353 1 6219128
</td></tr></table>
</body>
</html>
