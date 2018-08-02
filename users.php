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

echo "<h1>SPOTMANIA USERS</h1>";
	
	
?>



<?php

if (isset($_GET["users"])) {
	$users = $_GET["users"];
} else {
	$users = "50";

}
if (isset($_GET["type"])) {
	$type = "?type=large";
} else {
	$type = "";

}
?>

<div>USERS:</div>


<?php


$result = mysql_query("SELECT fid FROM user ORDER BY joindate DESC limit ".$users)
	or die(mysql_error());
	


// printing table rows
while ($row = mysql_fetch_assoc($result)) {	
	
	//echo "<div>".$row["fid"]."</div>";
	?>
	<a href="http://www.facebook.com/profile.php?id=<?php echo $row["FID"]; ?>"><div id="playerImage" style="float:left"><img src='http://graph.facebook.com/<?php echo $row["FID"]; ?>/picture<?php echo $type; ?>'/></div></a>
	<?php


}

?>
