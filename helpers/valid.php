<?php 
$data = json_decode(file_get_contents("php://input"));
// $bname = mysql_real_escape_string($data->bname);
// $bauthor = mysql_real_escape_string($data->bphone);

$bid = $data->bid;
$isv = $data->isv;


mysql_connect("localhost", "root", ""); 
mysql_select_db("testjs");

if($isv=="1")
	mysql_query("UPDATE `test` SET `valid`='0' WHERE `id`=".$bid) or die(mysql_error());
if($isv=="0")
	mysql_query("UPDATE `test` SET `valid`='1' WHERE `id`=".$bid) or die(mysql_error());

?>