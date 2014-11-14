<?php
//------------------PHP-Funktionen-------------------




$host = "mysql.webhosting49.1blu.de";

$user_mysql = "s213644_2158741";

$password_mysql = "benjamin";

$tabelle_mysql ="db213644x2158741";

//------Für die Email registrierung--------------


$empfaenger = $_POST["email_reg"];
$betreff = 'Bitte Registrierung bestätigen';
$nachricht = 'Bitte bestätige deinen Registrierung indem du auf diesen Link klickst: http://www.njamin.de';
$header = 'From: webmaster@example.com' . "\r\n" .'Reply-To: webmasterrxx@example.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();

//--------------------------------------------








?>