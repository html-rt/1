<?php
	session_start();
	if(isset($_SESSION["email"]) && $_SESSION["login"] == "ok")
	{
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Loggend in</title>
<?php
	//Einbinden von späteren Funktionen
	require 'functions.php';
?>

        








</head>

<body>
<h1>Welcome</h1>

<p><a href="http://mysql.webhosting49.1blu.de/phpMyAdmin/">Zur DB</a>
<p>s213644_2158741</p>

<form method="post" action="logout.php">
 <input type="submit" value="Logout!">
</form>




</body>
</html>




<?php
	}
	else
	{
		//Für die Weiterleitung nachher
		$host = htmlspecialchars($_SERVER["HTML_HOST"]);
		$uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "\//");
		$extra = "index.php";
		header("Location: http://$host$uri/$extra");
	}
		
?>
			






