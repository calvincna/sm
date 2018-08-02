<?php

header('p3p: CP="NOI ADM DEV PSAi COM NAV OUR OTR STP IND DEM"');
require 'facebook-php-sdk/src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
		
		'appId'  => '58657993420',
		'secret' => '3b60010c06d382de6f80ecb343e36c95',
		'cookie' => true
		
));

// Get User ID
$user = $facebook->getUser();


// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

$id = 0;

if ($user) {
	try {
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook->api('/me');
		$id = $user_profile[id];
		//echo "***".$id."***";
	} catch (FacebookApiException $e) {
		//error_log($e);
		$id = 0;
	}
} else {
	$id = 0;
}

if ($id == 0) {
	die("error");
}


	$response = $facebook->api('/' . '58657993420' . '/scores','GET');
	//$response = $facebook->api('/me');
	//print($response);
	/*
	echo "<div>";
	print_r($response);
	echo "</div>";
	*/

	/*
$scoresArr[] = array("user" => array("name" => "test1", "id"=> "504947706"), "score" => 9123163);
$scoresArr[] = array("user" => array("name" => "test2", "id"=> "100000353196513"), "score" => 23197);
$scoresArr[] = array("user" => array("name" => "test3", "id"=> "1199687100"), "score" => 13470);
$scoresArr[] = array("user" => array("name" => "test4", "id"=> "657748977"), "score" => 44701);
$scoresArr[] = array("user" => array("name" => "test5", "id"=> "604486203"), "score" => 53599);
$scoresArr[] = array("user" => array("name" => "test6", "id"=> "514439739"), "score" => 5282);
$scoresArr[] = array("user" => array("name" => "test7", "id"=> "714850581"), "score" => 2328);
$scoresArr[] = array("user" => array("name" => "test8", "id"=> "504539618"), "score" => 1938);


$scoresArr[] = array("user" => array("name" => "test9", "id"=> "679064111"), "score" => 1678);
$scoresArr[] = array("user" => array("name" => "test10", "id"=> "1146456085"), "score" => 2320);
$scoresArr[] = array("user" => array("name" => "test11", "id"=> "566070118"), "score" => 1969);
$scoresArr[] = array("user" => array("name" => "test12", "id"=> "1221400096"), "score" => 2231);
$scoresArr[] = array("user" => array("name" => "test13", "id"=> "793925530"), "score" => 711);
$scoresArr[] = array("user" => array("name" => "test14", "id"=> "606076724"), "score" => 662);
$scoresArr[] = array("user" => array("name" => "test15", "id"=> "1691875218"), "score" => 585);
$scoresArr[] = array("user" => array("name" => "test16", "id"=> "1049023231"), "score" => 3559);
$scoresArr[] = array("user" => array("name" => "test17", "id"=> "792719868"), "score" => 2828);
$scoresArr[] = array("user" => array("name" => "test18", "id"=> "1266879418"), "score" => 2044);

$scoresArr[] = array("user" => array("name" => "test19", "id"=> "38315913"), "score" => 1689);
$scoresArr[] = array("user" => array("name" => "test20", "id"=> "688384125"), "score" => 189);


$scoresArr[] = array("user" => array("name" => "test21", "id"=> "717111431"), "score" => 837);
$scoresArr[] = array("user" => array("name" => "test22", "id"=> "1590347590"), "score" => 5335);
$scoresArr[] = array("user" => array("name" => "test23", "id"=> "100000861262529"), "score" => 956);
$scoresArr[] = array("user" => array("name" => "test24", "id"=> "1065011912"), "score" => 649);
$scoresArr[] = array("user" => array("name" => "test25", "id"=> "595237160"), "score" => 2098);
$scoresArr[] = array("user" => array("name" => "test26", "id"=> "1081667871"), "score" => 1079);
$scoresArr[] = array("user" => array("name" => "test27", "id"=> "665112825"), "score" => 2163);
$scoresArr[] = array("user" => array("name" => "test28", "id"=> "1598247814"), "score" => 270);
$scoresArr[] = array("user" => array("name" => "test29", "id"=> "505745739"), "score" => 1576);
$scoresArr[] = array("user" => array("name" => "test30", "id"=> "714064232"), "score" => 2315);
*/
	
	//echo json_encode($scoresArr);
	echo json_encode($response['data']);

	// Helper function to get an APP ACCESS TOKEN
	function get_app_access_token($app_id, $app_secret) {
		$token_url = 'https://graph.facebook.com/oauth/access_token?'
			. 'client_id=' . $app_id
			. '&client_secret=' . $app_secret
			. '&grant_type=client_credentials';

		$token_response =file_get_contents($token_url);
		$params = null;
		parse_str($token_response, $params);
		return  $params['access_token'];
	}

?>
