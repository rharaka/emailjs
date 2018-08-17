<?php 
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));
// $bname = mysql_real_escape_string($data->bname);
// $bauthor = mysql_real_escape_string($data->bphone);

$bid = $data->bid;
$fid = $data->fid;

// $connBl = new mysqli("localhost", "root", "", "testjs");

mysql_connect("localhost", "root", ""); 
mysql_select_db("testjs");

// $resultBl = $connBl->query("SELECT id FROM blocking WHERE idBlocking='$fid' AND idBlocked='$bid'");
// $rsBl = $resultBl->fetch_array(MYSQLI_ASSOC);

// $idBl = $rsBl['id'];

// if($idBl>0) {
    // mysql_query("DELETE FROM blocking WHERE id='$idBl'") or die(mysql_error());
// }
// else {
    mysql_query("INSERT INTO `blocking`(`idBlocking`, `idBlocked`) VALUES ('$fid', '$bid') ") or die(mysql_error());
// }

// $connBl->close();

?>
