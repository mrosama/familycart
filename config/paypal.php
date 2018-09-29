<?php 

return array(

	//set your paypal credential
	'client_id' => '....................................',
	'secret' 	=>'.........................................',


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
