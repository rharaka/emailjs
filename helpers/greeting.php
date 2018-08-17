<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "testjs");

$resultR = $conn->query("SELECT id, nom, email, valid, role, intro FROM test WHERE email='jamal@email.com'");
$rsR = $resultR->fetch_array(MYSQLI_ASSOC);
$idR = $rsR['id'];
$idN = $rsR['nom'];

$outp = "";

$greeting = $idN;

$outp .= '{"loggedName":"'.$greeting.'", "FID":"'.$idR.'", "Role":"'.$rsR['role'].'", "Intro":"'.$rsR['intro'].'", "Nom":"'.$rsR['nom'].'", "Email":"'.$rsR['email'].'"}';

$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);

?>
