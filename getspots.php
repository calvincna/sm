<?php

$type="hard";
$stage=rand(1, 15);
//$stage="6";
$stage=str_pad($stage, 3, '0', STR_PAD_LEFT);

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

//$encryptedmessage = encrypt("your message"); 

//$type = $_POST["type"];
//$id = $_POST["id"];

	//mysql_connect("localhost", "playsp5_admin", "09163610") or die(mysql_error());
	//mysql_select_db("playsp5_spotmania") or die(mysql_error());

	//mysql_connect("localhost", "root", "") or die(mysql_error());
	//mysql_select_db("spotmania") or die(mysql_error());
	
	include("dbconnect.php");
	
	function base64_encode_image ($filename=string,$filetype=string) {
		if ($filename) {
			$imgbinary = fread(fopen($filename, "r"), filesize($filename));
			return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
		}
	}


	$result = mysql_query("SELECT * FROM ".$type." where name = '".$stage."' ORDER BY  'name' ASC ")
	or die(mysql_error());

	while ($row = mysql_fetch_assoc($result)) {
		//$arr['spots'][] = $row;	
		
		//convert('To be or not to be, that is the question', 'mysecretkey'); 
		
		$newRow[0] =  encode($row['xpos']); 
		$newRow[1] =  encode($row['ypos']); 
		$newRow[2] =  encode($row['xsize']);  
		$newRow[3] = encode( $row['ysize']); 

		$arr[0][] = $newRow;
		
	}
	//$arr['img']['a'] = "easy/001_a.jpg";
	//$arr['img']['b'] = "easy/001_b.jpg";
	
	//$arr['img']['a'] = base64_encode_image("easy/001_a.jpg","jpg");
	//$arr['img']['b'] = base64_encode_image("easy/001_b.jpg","jpg");
	
	$arr[1][0] = encrypt($type."/".$stage."_a.jpg","jpg");
	$arr[1][1] = encrypt($type."/".$stage."_b.jpg","jpg");
	
	//encrypt("your message"); 
	
	echo json_encode($arr);

?>
