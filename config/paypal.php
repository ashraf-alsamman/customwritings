 <?php
return array(
/** set your paypal credential **/
'client_id' =>'AR02RP3HoBSdt21o6weE9zoFENeLfx1TGvIwicrQqXOucM8BF2BWBs7Yy8E88dEECKkq2S0iUCxVSO5X',
'secret' => 'ELG48ns-L0VgIWypNY6Y9RiDnQ_8lDlfYOMOGRRTqHqY0DSjY_NLBdVaMvKuf2MKU9uTHI1jMMwPM-m-',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 90000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);