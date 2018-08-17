<?php 
$data = json_decode(file_get_contents("php://input"));
// $bname = mysql_real_escape_string($data->bname);
// $bauthor = mysql_real_escape_string($data->bphone);

$bname = $data->bname;
$bemail = $data->bemail;


mysql_connect("localhost", "root", ""); 
mysql_select_db("testjs");

mysql_query("INSERT INTO `test`(`nom`,`email`)
    VALUES ('".$bname."','".$bemail."') ") or die(mysql_error());

?>