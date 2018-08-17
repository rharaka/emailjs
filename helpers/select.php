<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "testjs");

$result = $conn->query("SELECT id, nom, email, valid, intro FROM test WHERE email<>'jamal@email.com'");

$resultR = $conn->query("SELECT id, nom, email, valid, intro FROM test WHERE email='jamal@email.com'");
$rsR = $resultR->fetch_array(MYSQLI_ASSOC);
$idR = $rsR['id'];

$outp = "";

$ii = 0;

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

    $ii++;

    $idB = $rs['id'];

    $resultB = $conn->query("SELECT COUNT(id) as nbB FROM blocking WHERE idBlocking='$idR' AND idBlocked='$idB'");
    $rsB = $resultB->fetch_array(MYSQLI_ASSOC);

    $nbB = $rsB['nbB'];

    if ($outp != "") {$outp .= ",";}
    $outp .= '{"II":"'  . $ii        . '",';
    $outp .= '"ID":"'  . $rs['id']        . '",';
    $outp .= '"Nom":"'   . $rs['nom']        . '",';
    $outp .= '"Intro":"'   . $rs['intro']        . '",';
    $outp .= '"Email":"'. $rs['email']     . '",';
    if($rs['valid']==0) {
    	$outp .= '"Valid":"Enable",';
    	$outp .= '"isValid":"0",';
    }
    else {
    	$outp .= '"Valid":"Disable",';
    	$outp .= '"isValid":"1",';
    }
    if($nbB>0) {
        $outp .= '"Block":"DeBlock",';
        $outp .= '"isBlocked":"1",';
    }
    else {
        $outp .= '"Block":"Block",';
        $outp .= '"isBlocked":"0",';
    }
    
    // =============================================================================================================

    $tid = $rs['id'];

    $result1 = $conn->query("SELECT COUNT(tid) as nb FROM email WHERE fid='$idR' AND tid='$tid'");
    $rs1 = $result1->fetch_array(MYSQLI_ASSOC);

    $nb  = $rs1['nb'];

    $outp .= '"emailCnt":"'.$nb.'",';

    $result2 = $conn->query("SELECT message FROM email WHERE fid='$idR' AND tid='$tid'");
    $emails = "";
    $ie = 0;
    while($rs2 = $result2->fetch_array(MYSQLI_ASSOC)) {

    	$ie++;

    	$result4 = $conn->query("SELECT email FROM test WHERE id='$tid'");
	    $rs4 = $result4->fetch_array(MYSQLI_ASSOC);

	    $emailFrom = $rs4['email'];
	    $messageFrom = $rs2['message'];

    	//$emails .= str_replace(PHP_EOL,"\n",json_encode($ie.' - '.$emailFrom.': '.$messageFrom.'\n'));
        $emails .= $ie.'- '.$messageFrom.'                                                              ';

    }

    $outp .= '"Emails":"'.$emails.'",';

    // =============================================================================================================

    $fid = $rs['id'];

    $result2 = $conn->query("SELECT COUNT(tid) as nb FROM email WHERE fid='$fid' AND tid='$idR'");
    $rs2 = $result2->fetch_array(MYSQLI_ASSOC);

    $nb1  = $rs2['nb'];

    $outp .= '"emailCntI":"'.$nb1.'",';

    $result3 = $conn->query("SELECT message FROM email WHERE fid='$fid' AND tid='$idR'");
    $emailsI = "";
    $ie1 = 0;
    while($rs3 = $result3->fetch_array(MYSQLI_ASSOC)) {

    	$ie1++;

    	$result5 = $conn->query("SELECT email FROM test WHERE id='$fid'");
	    $rs5 = $result5->fetch_array(MYSQLI_ASSOC);

        $emailTo = $rs5['email'];
        $messageTo = $rs3['message'];

        //$emailsI .= str_replace(PHP_EOL,"\n",json_encode($ie1.' - '.$emailTo.': '.$messageTo.'\n'));
        $emailsI .= $ie1.'- '.$messageTo.'                                                              ';

    }

    $outp .= '"EmailsI":"'.$emailsI.'"}';

    // =============================================================================================================

}

$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);

?>
