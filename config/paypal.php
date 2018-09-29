<?php 

return array(

	//set your paypal credential
	'client_id' => 'AUw9aEDOCInC5sTPy4r_Ehh3FXEF3KQcbnanH_p7nvBy8H52zL0qf9bHk0HsMaKHGsTLrkuuRmX-mgjs',
	'secret' 	=>'ENOQGGL-UNqtBHPCheoFp3IRpOYlzhTqC-LkBYtL8_wVFa0U99JU8C01UnzL0h1fupcUygg6gB4zl4LK',


	/**
	* sdk configuration 
	*/
	'settings' =>array(


		// Available option 'sandbox' or 'live'
		'mode' => 'sandbox',

		// Specify the max request time in secinds
		'http.ConnectionTimeOut' => 30,

		// Whether want to log to a file
		'log.LogEnabled' => true,


		// specify the file that want to write on
		'log.FileName' => storage_path('/logs/paypal.log'),

		//Available  option 'FINE', 'INFO' ,'WARN' or 'ERROR'
		'log.LogLevel' =>'FINE'

		),



	);
?>