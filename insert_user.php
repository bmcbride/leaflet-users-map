<?php
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$website = htmlspecialchars(trim($_POST['website']));
$city = htmlspecialchars(trim($_POST['city']));
$lat = htmlspecialchars(trim($_POST['lat']));
$lng = htmlspecialchars(trim($_POST['lng']));
$token = mt_rand(100000, 999999);

$db = new PDO('sqlite:leaflet.sqlite');
$db->exec("INSERT INTO users (name, email, website, city, lat, lng, token) VALUES ('$name', '$email', '$website', '$city', '$lat', '$lng', '$token');");
$db = NULL;

$subject = "Welcome to the Leaflet Users Map!";
$body = '
<html>
<head>
</head>
<body>
	<p>Thanks for adding yourself to the map!</p>
	Your account information:<br>
	-------------------------<br>
	Email: '.$email.'<br>
	Token: '.$token.'<br>
	-------------------------<br><br>
	Should you need to edit your information, please visit the map and click on the Remove me button.<br>
	Enter your email and unique token to remove your entry from the database.<br>
	Feel free to add yourself back to the map at any time!
</body>
</html>
';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Leaflet Users Map <noreply@bryanmcbride.com>' . "\r\n";
mail($email, $subject, $body, $headers, "-fnoreply@bryanmcbride.com");
?>