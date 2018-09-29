<?php

#################################################
#                                               #
#                                               #
#            ||~~ BY ~~ vKAB   ~~||             #
#                                               #
#                                               #
#################################################


$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}


$user_os        =   getOS();
$user_browser   =   getBrowser();

if(isset($_REQUEST["changelanguage"]))
{
	$_SESSION["COUNTRY_CODE"]=$_REQUEST["changelanguage"];
}


if(isset($_SESSION["COUNTRY_CODE"]))
{

$C_CODE=$_SESSION["COUNTRY_CODE"];

include('language/'.$C_CODE.'.php');

} 
else
{
	
$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
//echo $xml->geoplugin_countryName ;

$C_CODE=$xml->geoplugin_countryCode;

//echo $xml->geoplugin_countryCode;

$COUNTRY_ARR=array('SE','FI','DE','FR','DK','IT','ES','CH','AT','LI','LU');



switch ($C_CODE) {
	
		case "SE":
		
			include('language/SE.php');
			break;
			
		case "FI":
		
			include('language/FI.php');
			break;			
			
		case "DE":
		
			include('language/DE.php');
			break;
		
		case "FR":
		
			include('language/FR.php');
			break;
		
		case "DK":
		
			include('language/DK.php');
			break;
		
		case "IT":
		
			include('language/IT.php');
			break;
		
		case "ES":
			include('language/ES.php');
			break;
			
		case "CH":
		
			include('language/DE.php');
			break;
							
		case "AT":
		
			include('language/DE.php');
			break;
							
		case "LI":
		
			include('language/DE.php');
			break;
						
		case "LU":
		
			include('language/DE.php');
			break;	
			
		default:
			include('language/EN.php');
}

}

  
/*echo "<pre>";
foreach ($xml as $key => $value)
{
    echo $key , "= " , $value ,  " \n" ;
}
echo "</pre>";
*/


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
	
	//$ip="91.217.181.0";
	
	//$ip="2.16.6.0";
	
	//$ip="2.21.244.0";
	
	//$ip="185.30.28.0";
	
	//$ip="2.16.70.0";
	
	//$ip="193.189.92.0";

    return $ip;
}
?>