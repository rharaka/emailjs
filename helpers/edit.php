<?php 
$data = json_decode(file_get_contents("php://input"));
// $bname = mysql_real_escape_string($data->bname);
// $bauthor = mysql_real_escape_string($data->bphone);

$bid = $data->bid;
$bname = $data->bname;
$bemail = $data->bemail;


mysql_connect("localhost", "root", ""); 
mysql_select_db("testjs");

mysql_query("UPDATE `test` SET `nom`='".$bname."',`email`='".$bemail."' 
	WHERE `id`=".$bid) or die(mysql_error());
echo $bname." ".$bemail;
?>