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

//$id="1234567";

$type = $_POST["type"];
//$type="getSpots";

//for saveGame

if (isset($_POST["stageScore"])) {
	$stageScore = $_POST["stageScore"];
}
if (isset($_POST["stageTime"])) {
	$stageTime = $_POST["stageTime"];
}	
if (isset($_POST["clue"])) {
	$clue = $_POST["clue"];
}

//for gameOver

if (isset($_POST["finalScore"])) {
	$finalScore = $_POST["finalScore"];
}
if (isset($_POST["finalPhoto"])) {
	$finalPhoto = $_POST["finalPhoto"];
}
	//finalTime(?)

/*
$gameType="hard";
$stage=rand(1, 15);
$stage=str_pad($stage, 3, '0', STR_PAD_LEFT);*/

$easyTotal = 65;
$hardTotal = 200;
$easyLast = 20;

define('SALT', 'fddGD624df3F654SfX3'); 

function encrypt($text) 
{ 
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))); 
} 

function decrypt($text) 
{ 
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, SALT, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))); 
} 

function encode($input)
{
	$temp = '';
	$length = strlen($input);
	for($i = 0; $i < $length; $i++)
	$temp .= '%' . bin2hex($input[$i]);
	return $temp;
}
	
function base64_encode_image ($filename=string,$filetype=string) {
	if ($filename) {
		$imgbinary = fread(fopen($filename, "r"), filesize($filename));
		return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
	}
}

function getStageInfo ($gameTypeIn, $stageIn) {

	$stageIn=str_pad($stageIn, 3, '0', STR_PAD_LEFT);

	$result = mysql_query("SELECT * FROM ".$gameTypeIn." where name = '".$stageIn."' ORDER BY  'name' ASC ")
	or die(mysql_error());

	while ($row = mysql_fetch_assoc($result)) {
		
		//encode the size and positions to make it harder for users to get the positions
		//but can be decoded, this just makes it slightly harder
		$newRow[0] = encode($row['xpos']); 
		$newRow[1] = encode($row['ypos']); 
		$newRow[2] = encode($row['xsize']);  
		$newRow[3] = encode( $row['ysize']); 

		$arr[0][] = $newRow;		
	}

	//encrypt url to the 2 images (don't let users know how to get the images directly from browser)
	$arr[1][0] = encrypt($gameTypeIn."/".$stageIn."_a.jpg","jpg");
	$arr[1][1] = encrypt($gameTypeIn."/".$stageIn."_b.jpg","jpg");

	//echo json_encode($arr);
	return $arr;

}

include("dbconnect.php");

if ($type == "check") {

	$str = "new";
	$removeads = 1;

	$result = mysql_query("SELECT score, photo, status FROM savestate LEFT JOIN removeads ON removeads.fid=savestate.fid where savestate.fid='".$id."'")
	or die(mysql_error());
	
	
	$row = mysql_fetch_assoc($result);
	
	if (!$row["status"]) {
		$removeads = 0;
	} else if ($row["status"]<1) {
		$removeads = 0;
	}
		
	if ($row["photo"]<1) {
		$str = "new".",".$removeads;
	} else {
		$str = $row["score"].",".$row["photo"].",".$removeads;
	}
	
	echo $str;

}

else if ($type == "startGame") {
	//check if user exists

	$result = mysql_query("SELECT user.fid, country, status FROM user LEFT JOIN removeads ON removeads.fid=user.fid where user.fid='".$id."'")
	or die(mysql_error());
	
	$removeads = 1;
	

	if (mysql_num_rows($result)<1) {
		//if not exists, create user in user table
		/*$name = "test user";
		$first_name = "test";
		$last_name = "user";
		$username = "testuser";
		$birthday = "03/25/1975";
		$gender = "female";
		$email = "test@testuser.com";
		$link = "http://www.facebook.com/profile.php?id=1234567";*/
		
		$name = $user_profile[name];
		$first_name = $user_profile[first_name];
		$last_name = $user_profile[last_name];
		$username = $user_profile[username];
		$birthday = $user_profile[birthday];
		$gender = $user_profile[gender];
		$email = $user_profile[email];
		$link = $user_profile[link];
		
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$queryStr = "INSERT INTO user (fid,email,name,first_name,last_name,username,birthday,gender,link,joindate, browser, country) VALUES ('".$id."','".$email."','".$name."','".$first_name."','".$last_name."','".$username."','".$birthday."','".$gender."','".$link."', '".date('Y-m-d H:i:s')."', '".$browser."', '".$ip."')";

		$result = mysql_query($queryStr) or die(mysql_error());	
		
		$removeads = 0;
		
	} else {
	
		$row = mysql_fetch_assoc($result);
		
		if (!$row["status"]) {
			$removeads = 0;
		} else if ($row["status"]<1) {
			$removeads = 0;
		}
		
		if (!$row["country"]) {
			$queryStr = "UPDATE user SET country='".$_SERVER['REMOTE_ADDR']."' WHERE fid='".$id."'";
			$result = mysql_query($queryStr) or die(mysql_error());	
		}
	
		//remove player data if any
		$queryStr = "DELETE FROM savestate WHERE fid='".$id."'";	
		$result = mysql_query($queryStr) or die(mysql_error());		
	
	}
	
	//generate/reset player's data


	$easyGamesArr = range(1, $easyTotal);
	shuffle($easyGamesArr);
	$easyGames = implode(",", $easyGamesArr);
	
	$hardGamesArr = range(1, $hardTotal);
	shuffle($hardGamesArr);
	$hardGames = implode(",", $hardGamesArr);
	
	$clues=3;
	
	//add additional clues where applicable
	
	$response_applike = $facebook->api('/me/likes/124612367640366','GET');
	//https://graph.facebook.com/me/likes/124612367640366
	
	if (count($response_applike['data'])>0) {
		$clues++;
	}
	
	if ($removeads>0) {
		$clues++;
	} 
	
	
	//insert new player savestate data
	$queryStr = "INSERT INTO savestate (fid, experience, changeStamp, photo, score, totaltime, clue, easy, hard, easypointer, hardpointer) VALUES ('".$id."',0,'".date('Y-m-d H:i:s')."',0,0,0,".$clues.",'".$easyGames."','".$hardGames."',1,0)";	
	
	//echo $queryStr;
	
	$result = mysql_query($queryStr) or die(mysql_error());		
		
	//fetch first stage
	$gameType = "easy";
	$stage = $easyGamesArr[0];
	$arr = getStageInfo($gameType,$stage);
	
	//$arr[0] = spot data
	//$arr[1] = image url (encrypted)
	//$arr[2] = score
	//$arr[3] = photos
	//$arr[4] = clues
	
	$arr[2] = "0";
	$arr[3] = "0";
	$arr[4] = $clues;
	
	$arr[5] = $id;
	//$arr[6] = $response_applike['data'];
	
	echo json_encode($arr);
	
}


else if ($type == "saveGame") {

//change: to have 2 pointers: easypointer and hardpointer

	//required:
	//stageScore
	//stageTime
	//clue

	//get player data
	$result = mysql_query("SELECT photo, score, totaltime, clue, easy, hard, easypointer, hardpointer FROM savestate where fid='".$id."'")
	or die(mysql_error());	
	
	//SELECT `fid`, `experience`, `changestamp`, `photo`, `score`, `totaltime`, `timeextend`, `slowmo`, `clue`, `easy`, `hard`, `easypointer`, `hardpointer` FROM `savestate`
	
	$row = mysql_fetch_assoc($result);
	
	//add to score
	//$scoreNow = $row["score"] + $stageScore;
	$scoreNow = $stageScore;
	
	//add to time
	$timeNow = $row["totaltime"] + $stageTime;
	
	$clueNow = $clue;
	
	$photoNow = $row["photo"] + 1;
	
	if ($row["photo"]>=$easyLast-1) {	
	
		$gameType = "hard";
		
		if ($row["hardpointer"]>=$hardTotal) {
			$hardGamesArr = range(1, $hardTotal);
			shuffle($hardGamesArr);
			$hardGames = implode(",", $hardGamesArr);

			$stage = $hardGamesArr[0];		
	
			$stagesStr = ", hardpointer=1, hard='".$hardGames."'";	
		} else {
			$hardGamesArr = explode(",", $row["hard"]);
			$stage = $hardGamesArr[$row["hardpointer"]];	
			
			$stagesStr = ", hardpointer=hardpointer+1";
		}		
		
	} else {
		$gameType = "easy";
		
		if ($row["easypointer"]>=$easyTotal) {
			$easyGamesArr = range(1, $easyTotal);
			shuffle($easyGamesArr);
			$easyGames = implode(",", $easyGamesArr);
			
			$stage = $easyGamesArr[0];		
	
			$stagesStr = ", easypointer=1, easy='".$easyGames."'";	
		} else {
			$easyGamesArr = explode(",", $row["easy"]);
			
			$stage = $easyGamesArr[$row["easypointer"]];	
			
			$stagesStr = ", easypointer=easypointer+1";
		}		
		
	}
	
	$queryStr = "UPDATE savestate SET photo=photo+1, changeStamp='".date('Y-m-d H:i:s')."', clue='".$clueNow."', totaltime='".$timeNow."', score='".$scoreNow."'".$stagesStr." WHERE fid='".$id."'";
	$result = mysql_query($queryStr) or die(mysql_error());	
		
	//based on pointer, retrieve next image to be shown and its spots
	$arr = getStageInfo($gameType,$stage);
	
	//$arr[0] = spot data
	//$arr[1] = image url (encrypted)
	//$arr[2] = score
	//$arr[3] = photos
	//$arr[4] = clues
	
	$arr[2] = $scoreNow;
	$arr[3] = $photoNow;
	$arr[4] = $clueNow;
	
	echo json_encode($arr);

}

//used when player returns to saved game
else if ($type == "getSpots") {

	//get player data
	$result = mysql_query("SELECT photo, score, totaltime, clue, easy, hard, easypointer, hardpointer FROM savestate where fid='".$id."'")
	or die(mysql_error());	
	
	$row = mysql_fetch_assoc($result);	
	
	if ($row["photo"]>=$easyLast-1) {		
	
		$gameType = "hard";
		
		if ($row["hardpointer"]>=$hardTotal) {
			$hardGamesArr = range(1, $hardTotal);
			shuffle($hardGamesArr);
			$hardGames = implode(",", $hardGamesArr);

			$stage = $hardGamesArr[0];		
	
			$stagesStr = ", hardpointer=1, hard='".$hardGames."'";	
		} else {
			$hardGamesArr = explode(",", $row["hard"]);
			$stage = $hardGamesArr[$row["hardpointer"]];	
			
			$stagesStr = ", hardpointer=hardpointer+1";
		}		
		
	} else {
		$gameType = "easy";
		
		if ($row["easypointer"]>=$easyTotal) {
			$easyGamesArr = range(1, $easyTotal);
			shuffle($easyGamesArr);
			$easyGames = implode(",", $easyGamesArr);
			
			$stage = $easyGamesArr[0];		
	
			$stagesStr = ", easypointer=1, easy='".$easyGames."'";	
		} else {
			$easyGamesArr = explode(",", $row["easy"]);
			$stage = $easyGamesArr[$row["easypointer"]];	
			
			$stagesStr = ", easypointer=easypointer+1";
		}		
		
	}
	
	$queryStr = "UPDATE savestate SET changeStamp='".date('Y-m-d H:i:s')."'".$stagesStr." WHERE fid='".$id."'";
	$result = mysql_query($queryStr) or die(mysql_error());	
		
	//based on pointer, retrieve next image to be shown and its spots
	$arr = getStageInfo($gameType,$stage);
	
	//$arr[0] = spot data
	//$arr[1] = image url (encrypted)
	//$arr[2] = score
	//$arr[3] = photos
	//$arr[4] = clues
	
	$arr[2] = $row["score"];
	$arr[3] = $row["photo"];
	$arr[4] = $row["clue"];
	
	echo json_encode($arr);
	
	

}

else if ($type == "gameOver") {

	//required:
	//finalScore
	//finalPhoto
	//finalTime(?)
	

	//save result to history
	//history: fid, score, photo, time(x), experience(x), date, browser
	$queryStr = "INSERT INTO history(fid, score, photo, date, browser) VALUES ('".$id."','".$finalScore."','".$finalPhoto."','".date('Y-m-d H:i:s')."', '".$_SERVER['HTTP_USER_AGENT']."')";
	$result = mysql_query($queryStr) or die(mysql_error());	
	
	//remove player data
	$queryStr = "DELETE FROM savestate WHERE fid='".$id."'";	
	$result = mysql_query($queryStr) or die(mysql_error());	
	
	//check if new highscore in gamedata
	
	$result = mysql_query("SELECT highscore FROM gamedata where fid='".$id."'")
	or die(mysql_error());	
	
	//$num_rows = mysql_num_rows($result);
	
	$row = mysql_fetch_assoc($result);	
	
	//$appId = '58657993420';
	//$secret = '3b60010c06d382de6f80ecb343e36c95';
	$score = $finalScore;
	
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

	$app_access_token = get_app_access_token($appId, $secret);
	$facebook->setAccessToken($app_access_token);
	$response = $facebook->api('/' . $user . '/scores', 'post', array(
		'score' => $score,
	));
	

	//print($response);
	
	//if ($num_rows<1) {
	if (!$row) {
		$queryStr = "INSERT INTO gamedata (fid,highscore,photo,changestamp) VALUES ('".$id."','".$finalScore."','".$finalPhoto."', '".date('Y-m-d H:i:s')."')";

		$result = mysql_query($queryStr) or die(mysql_error());	
	
	} else if ($row["highscore"]<$finalScore) {	
		$queryStr = "UPDATE gamedata SET highscore=".$finalScore.", photo=".$finalPhoto.", changestamp='".date('Y-m-d H:i:s')."' WHERE fid='".$id."'";
		$result = mysql_query($queryStr) or die(mysql_error());	
		
		//todo:submit to facebook game api
		
		echo "highscore";
		

	
	
	} else {
		echo "no";
	}

}



?>
