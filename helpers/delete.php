<?php 
$data = json_decode(file_get_contents("php://input"));
// $bname = mysql_real_escape_string($data->bname);
// $bauthor = mysql_real_escape_string($data->bphone);

$bidd = $data->bidd;


mysql_connect("localhost", "root", ""); 
mysql_select_db("testjs");

mysql_query("DELETE FROM `test` WHERE `id`=".$bidd) or die(mysql_error());
mysql_query("DELETE FROM `email` WHERE `tid`=".$bidd) or die(mysql_error());

?>