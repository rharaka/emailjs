<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "testjs");

$result = $conn->query("SELECT id, nom, email, valid FROM test WHERE email='rachid@email.com'");

$outp = "";
$rs = $result->fetch_array(MYSQLI_ASSOC);
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"ID":"'  . $rs["id"] . '",';
    $outp .= '"Nom":"'   . $rs["nom"]        . '",';
    $outp .= '"Email":"'. $rs["email"]     . '",';
    if($rs["valid"]==0) {
    	$outp .= '"Valid":"Enable",';
    	$outp .= '"isValid":"0",';
    }
    else {
    	$outp .= '"Valid":"Disable",';
    	$outp .= '"isValid":"1",';
    }
    
    // $result1 = $conn->query("SELECT COUNT(tid) as nb FROM email WHERE tid='".$rs["id"]."'");
    // $rs1 = $result1->fetch_array(MYSQLI_ASSOC);

    // $nb  = $rs1["nb"];
    // $tid = $rs["id"];

    // $outp .= '"emailCnt":"'.$nb.'",';

    // $result2 = $conn->query("SELECT message FROM email WHERE tid='".$rs["id"]."'");
    // $emails = "";
    // $ie = 0;
    // while($rs2 = $result2->fetch_array(MYSQLI_ASSOC)) {
    // 	$ie++;
    // 	$emails .= '\n'.$ie.'- '.$rs2['message'].'\n'; 
    // }

    // $outp .= '"Emails":"'.$emails.'"}';

$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>