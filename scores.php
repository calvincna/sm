<?php
header('p3p: CP="NOI ADM DEV PSAi COM NAV OUR OTR STP IND DEM"');
require 'facebook-php-sdk/src/facebook.php';

include("fbconnect.php");
//$appId = '58657993420';
//$secret = '3b60010c06d382de6f80ecb343e36c95';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
		
		'appId'  => $appId,
		'secret' => $secret,
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


date_default_timezone_set('Asia/Singapore');

include("dbconnect.php");




$result = mysql_query("SELECT gamedata.fid, name, highscore FROM gamedata LEFT JOIN user
ON gamedata.fid=user.fid ORDER BY gamedata.highscore DESC LIMIT 30")
or die(mysql_error());

$dataArr = array();
$scoresArr = array();

	while ($row = mysql_fetch_assoc($result)) {
	
	//{"user":{"name":"Play Chap","id":"1669294166"},"score":1290,"application":{"name":"Spotmania","namespace":"spotmania","id":"58657993420"}},
		
		$scoresArr[] = array("user" => array("name" => $row['name'], "id"=> $row['fid']) , "score" => $row['highscore']);
		
		/*$newRow[0] = encode($row['xpos']); 
		$newRow[1] = encode($row['ypos']); 
		$newRow[2] = encode($row['xsize']);  
		$newRow[3] = encode( $row['ysize']); */

		//$scoresArr[] = $newRow;		
	}
	
	
	
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


$result = mysql_query("SELECT  uo.fid, user.name, uo.highscore,(SELECT COUNT(*) FROM gamedata ui WHERE (ui.highscore, ui.fid) >= (uo.highscore, uo.fid)) AS rank FROM gamedata uo LEFT JOIN user ON uo.fid=user.fid WHERE uo.fid = ".$id)
or die(mysql_error());

$row = mysql_fetch_assoc($result);	

//0:fid
//1:name
//2:highscore
//3:worldrank
//4:friendrank
//5:worldscore
//6:fbscore
	
$dataArr[0] = $row["fid"];
$dataArr[1] = $row["name"];
$dataArr[2] = $row["highscore"];
$dataArr[3] = $row["rank"];

$response = $facebook->api('/' . $appId . '/scores','GET');

//$response2 = $facebook->api('/me/likes/124612367640366','GET');
//https://graph.facebook.com/me/likes/124612367640366

//iterate thru array and find user's friend ranking

foreach ($response['data'] as $key => $value) {
	if ($value['user']['id']==$id) {
		$dataArr[4] = strval($key + 1);
		break;
	};
}


$dataArr[5] = $scoresArr;
$dataArr[6] = $response['data'];
//$dataArr[7] = count($response2['data']);

//sync fb hiscore with mysql hiscore if different

//if mysql score is higher than fbscore, save mysql score to fb
if ($dataArr[2]>$response['data'][($dataArr[4]-1)]['score']) {
	//$appId = '58657993420';
	//$secret = '3b60010c06d382de6f80ecb343e36c95';
	$score = $dataArr[2];
	$app_access_token = get_app_access_token($appId, $secret);
	$facebook->setAccessToken($app_access_token);
	$response = $facebook->api('/' . $user . '/scores', 'post', array(
		'score' => $score,
	));
} else if ($dataArr[2]<$response['data'][($dataArr[4]-1)]['score']) {
	$queryStr = "UPDATE gamedata SET highscore=".$response['data'][($dataArr[4]-1)]['score'].", changestamp='".date('Y-m-d H:i:s')."' WHERE fid='".$id."'";
	$result = mysql_query($queryStr) or die(mysql_error());	
}


echo json_encode($dataArr);
	



// Helper function to get an APP ACCESS TOKEN
function get_app_access_token($appId, $secret) {
	$token_url = 'https://graph.facebook.com/oauth/access_token?'
		. 'client_id=' . $appId
		. '&client_secret=' . $secret
		. '&grant_type=client_credentials';

	$token_response =file_get_contents($token_url);
	$params = null;
	parse_str($token_response, $params);
	return  $params['access_token'];
}


?>
