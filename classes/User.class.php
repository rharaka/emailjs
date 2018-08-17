<?php

$password = 'salam5858';
$salt = 'ljfqçèé!é^GSDFSh^SDGSDKGHKvbsxkhJFGHJFLfsdèé!é^GSDFSh^SDGSDKGHKvbsxkhkfqsdubcw@*ù$!';
$md5 = md5($salt.$password);
echo $md5;

?>
