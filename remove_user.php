<?php
$email = $_REQUEST['email'];
$token = $_REQUEST['token'];

$db = new PDO('sqlite:leaflet.sqlite');
$sql = "DELETE FROM users WHERE email = '$email' AND token = '$token';";

$rs = $db->query($sql);
$count = $rs->rowCount();
echo $count;
$db = NULL;
?>