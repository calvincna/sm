<style>

body {
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
font-size:12px;
}

table
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
/*width:100%;*/
border-collapse:collapse;
}
table td, table th 
{
font-size:11px;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
table th 
{
font-size:11px;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#A7C942;
color:#ffffff;
}
table tr.alt td 
{
color:#000000;
background-color:#EAF2D3;
}
</style>

<?php

date_default_timezone_set('Asia/Singapore');

$dateNow = date('Y-m-d H:i:s');

//echo $dateNow;

include("dbconnect.php");

echo "<h1>SPOTMANIA STATS</h1>";
	
	//total players
	$usersStr = "SELECT COUNT(*) FROM user";
	
	$result = mysql_query($usersStr)
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$usersAll = $row["COUNT(*)"];
		
	//players added in 1 day
	$result = mysql_query($usersStr . " WHERE joindate > ( '" . $dateNow . "' - INTERVAL 1 DAY )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$users24 = $row["COUNT(*)"];
	
	//players added in 12 hours
	$result = mysql_query($usersStr . " WHERE joindate > ( '" . $dateNow . "' - INTERVAL 12 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$users12 = $row["COUNT(*)"];
	
	//players added in 3 hours
	$result = mysql_query($usersStr . " WHERE joindate > ( '" . $dateNow . "' - INTERVAL 3 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$users3 = $row["COUNT(*)"];
	
	//players added in 1 hour
	$result = mysql_query($usersStr . " WHERE joindate > ( '" . $dateNow . "' - INTERVAL 1 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$users1 = $row["COUNT(*)"];
	
	
	//players who played 0 games after joining
	$nonplayersStr = "SELECT count(*) FROM `user` left join gamedata on user.fid=gamedata.fid where (highscore is NULL OR highscore<1)";
	
	$result = mysql_query($nonplayersStr)
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$nonplayersAll = $row["count(*)"];
	
	$result = mysql_query($nonplayersStr . " AND joindate > ( '" . $dateNow . "' - INTERVAL 1 DAY )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$nonplayers24 = $row["count(*)"];
	
	$result = mysql_query($nonplayersStr . " AND joindate > ( '" . $dateNow . "' - INTERVAL 12 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$nonplayers12 = $row["count(*)"];
	
	$result = mysql_query($nonplayersStr . " AND joindate > ( '" . $dateNow . "' - INTERVAL 3 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$nonplayers3 = $row["count(*)"];
	
	$result = mysql_query($nonplayersStr . " AND joindate > ( '" . $dateNow . "' - INTERVAL 1 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$nonplayers1 = $row["count(*)"];
	
	
	
	//total games
	$gamesStr = "SELECT COUNT(*) FROM history";
	
	$result = mysql_query($gamesStr)
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$gamesAll = $row["COUNT(*)"];
	
	//games in 1 day
	$result = mysql_query($gamesStr . " WHERE date > ( '" . $dateNow . "' - INTERVAL 1 DAY )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$games24 = $row["COUNT(*)"];
	
	//games in 12 hours
	$result = mysql_query($gamesStr . " WHERE date > ( '" . $dateNow . "' - INTERVAL 12 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$games12 = $row["COUNT(*)"];
	
	//games in 3 hours
	$result = mysql_query($gamesStr . " WHERE date > ( '" . $dateNow . "' - INTERVAL 3 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$games3 = $row["COUNT(*)"];
	
	//games in 1 hour
	$result = mysql_query($gamesStr . " WHERE date > ( '" . $dateNow . "' - INTERVAL 1 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$games1 = $row["COUNT(*)"];
	
	
	//significant games
	$sigGamesStr = "SELECT COUNT(*) FROM history WHERE score>0";
	
	$result = mysql_query($sigGamesStr)
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$sigGamesAll = $row["COUNT(*)"];
		
	$result = mysql_query($sigGamesStr . " and date > ( '" . $dateNow . "' - INTERVAL 1 DAY )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$sigGames24 = $row["COUNT(*)"];
	
	$result = mysql_query($sigGamesStr . " and date > ( '" . $dateNow . "' - INTERVAL 12 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$sigGames12 = $row["COUNT(*)"];
	
	$result = mysql_query($sigGamesStr . " and date > ( '" . $dateNow . "' - INTERVAL 3 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$sigGames3 = $row["COUNT(*)"];
	
	$result = mysql_query($sigGamesStr . " and date > ( '" . $dateNow . "' - INTERVAL 1 HOUR )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$sigGames1 = $row["COUNT(*)"];
	
	
	//total removeads
	$result = mysql_query("SELECT COUNT(*) FROM removeads")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$removeAll = $row["COUNT(*)"];
	
	//removeads paid in 1 day
	$result = mysql_query("SELECT COUNT(*) FROM removeads WHERE date > ( '" . $dateNow . "' - INTERVAL 1 DAY )")
	or die(mysql_error());		
	$row = mysql_fetch_assoc($result);
	$remove24 = $row["COUNT(*)"];
	
	?>


<div>Users</div>
<table border='1'>
<tr>
<th>Total</th>
<th>24 hours</th>
<th>12 hours</th>
<th>3 hours</th>
<th>1 hour</th>
</tr>
<tr>
<td><?php echo $usersAll; ?></td>
<td><?php echo $users24; ?></td>
<td><?php echo $users12; ?></td>
<td><?php echo $users3; ?></td>
<td><?php echo $users1; ?></td>
</tr>	
</table>
<br>

<div>Users who didn't play after joining</div>
<table border='1'>
<tr>
<th>Total</th>
<th>24 hours</th>
<th>12 hours</th>
<th>3 hours</th>
<th>1 hour</th>
</tr>
<tr>
<td><?php echo $nonplayersAll; ?></td>
<td><?php echo $nonplayers24; ?></td>
<td><?php echo $nonplayers12; ?></td>
<td><?php echo $nonplayers3; ?></td>
<td><?php echo $nonplayers1; ?></td>
</tr>	
</table>
<br>


<div>Games</div>
<table border='1'>
<tr>
<th>Total</th>
<th>24 hours</th>
<th>12 hours</th>
<th>3 hours</th>
<th>1 hour</th>
</tr>
<tr>
<td><?php echo $gamesAll; ?></td>
<td><?php echo $games24; ?></td>
<td><?php echo $games12; ?></td>
<td><?php echo $games3; ?></td>
<td><?php echo $games1; ?></td>
</tr>	
</table>
<br>


<div>Games with score higher than 0</div>
<table border='1'>
<tr>
<th>Total</th>
<th>24 hours</th>
<th>12 hours</th>
<th>3 hours</th>
<th>1 hour</th>
</tr>
<tr>
<td><?php echo $sigGamesAll; ?></td>
<td><?php echo $sigGames24; ?></td>
<td><?php echo $sigGames12; ?></td>
<td><?php echo $sigGames3; ?></td>
<td><?php echo $sigGames1; ?></td>
</tr>	
</table>
<br>

<div>Remove Ads</div>
<table border='1'>
<tr>
<th>Total</th>
<th>24 hours</th>
</tr>
<tr>
<td><?php echo $removeAll; ?></td>
<td><?php echo $remove24; ?></td>
</tr>	
</table>
<br>



<?php

if (isset($_GET["games"])) {
	$games = $_GET["games"];
} else {
	$games = "30";

}
?>

<div>Last <?php echo $games; ?> games:</div>
<table border='1'><tr>

<?php
if (isset($_GET["browser"])) {
	$browser = ", history.browser";	
} else {
	$browser = "";
}

$result = mysql_query("SELECT name, email, birthday, score, photo,  date, joindate, country".$browser." FROM history LEFT JOIN user ON history.fid=user.fid ORDER BY history.date DESC limit ".$games)
	or die(mysql_error());
	
$fields_num = mysql_num_fields($result);


// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "<th>{$field->name}</th>";
}
echo "<th>Country</th>";
echo "</tr>\n";

// printing table rows
while ($row = mysql_fetch_assoc($result)) {	
	
	echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td>$cell</td>";

	$ip = $row["country"];
	//$ip = "94.65.12.36a";
	
	if ($ip) {
	
	//check if file for this ip already exists
	$file = "cache/".$ip;
	if(!file_exists($file)) {
		// request
		$json = file_get_contents("http://api.easyjquery.com/ips/?ip=".$ip."&full=true");		
		$json = json_decode($json,true);
		
		if($json["countryName"] != "") {		
			$f = fopen($file,"w+");
			fwrite($f,$json);
			fclose($f);		
		}
		
		//$json = json_decode($json,true);
		//$json["countryName"]="ok";
	} else {
		$json = file_get_contents($file);
		$json = json_decode($json,true);
		//$json["countryName"]="ook";
	}

	
	if($json["countryName"] == "") {
		// request
		$json = file_get_contents("http://api.easyjquery.com/ips/?ip=".$ip."&full=true");
		$json = json_decode($json,true);
		
		if($json["countryName"] != "") {		
			$f = fopen($file,"w+");
			fwrite($f,$json);
			fclose($f);		
		}
	}	

	echo "<td>".$json["countryName"]."</td>";
	
	} else {
	
			echo "<td>no ip</td>";
	}
    echo "</tr>\n";	

}

?>
</table>