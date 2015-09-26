<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/hauth/endpoint',

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => false
			),

			"Yahoo" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array (
				"enabled" => false
			),
			//google
'Google' => array (
				'enabled' => true,
				'keys'    => array ( 'id' => '567519663924-lcssud29ri7ke9h3hou1dlslqu7epc57.apps.googleusercontent.com', 'secret' => 'gsnrnG_gmfyeim1ICXIgH2Di' )
			),//google
			
			//facebook
'Facebook' => array (
				'enabled' => true,
				'keys'    => array ( 'id' => '1072550936103157', 'secret' => '335344270f5085d99a13873cd90da8c7' ),
                'scope'   => 'email, user_about_me, user_birthday, user_hometown, user_website,publish_actions'
			),
//facebook
			
			//twitter
'Twitter' => array (
				'enabled' => true,
				'keys'    => array ( 'key' => '33vWD8ADW7VcZhxLkaVsUeqwI', 'secret' =>'lr8dK6i23oSKbhDojbb9zHIOOyW55yq8mfbTCsf3HkDPrsbqaL' )
			),
//twitter

			// windows live
			"Live" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => false,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"LinkedIn" => array (
				"enabled" => false,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"Foursquare" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" )
			),
			//instagram
'Google' => array (
				'enabled' => true,
				'keys'    => array ( 'id' => '5eefc5f1645d45dcb97ff14610f38bdc', 'secret' => '6916d43d2aec456486a2a41de155a17c' )
			),
//instagram
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */