<?php 
$data = json_decode(file_get_contents("php://input"));
// $bname = mysql_real_escape_string($data->bname);
// $bauthor = mysql_real_escape_string($data->bphone);

$bid    = $data->bid;
$fid    = $data->fid;
$bname  = $data->bname;
$bemail = $data->bemail;
$email = $data->email;


mysql_connect("localhost", "root", ""); 
mysql_select_db("testjs");

if($bid=="0" || $bname=="" || $bemail="")
	echo "Sorry! there is a problem, try again later!";
else
	mysql_query("INSERT INTO `email`(`fid`, `tid`, `message`)
    VALUES ('".$fid."', '".$bid."','".$email."') ") or die(mysql_error());

?>