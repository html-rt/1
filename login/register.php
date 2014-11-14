<?php
	//DB verbinden--------------
	require("settings.php");
	$mysqli = new MySQLi($host,$user_mysql,$password_mysql,$tabelle_mysql);
	
	if($mysqli -> connect_error)
	{
		//echo "Fehler beim Verbinden mit der DB! ".mysqli_connect_error();
	}
	else
	{	
		//echo "Verdung zur DB steht!<br>";
	}
	//----------------------
	
	
	//DB durchalufen und schauen ob der User schon existiert sonst 
	$ergebnis = $mysqli->query("SELECT * FROM `user`");
	$alredy_exists = false;
	while($zeile = $ergebnis->fetch_array())
	{
		if($zeile["user"]==$_POST["email_reg"])
		{
			$alredy_exists = true;
		}
	}
	
	
	if($_POST["email_reg"] != null && $_POST["password_reg"] != null)
	{
		//wenn der User nicht schon existiert
		if($alredy_exists != true)
		{
			
			$email_reg = $_POST['email_reg'];
			//Vom Passwort wird ein hash generiert!
			//$password_reg = password_hash($_POST['password_reg'], PASSWORD_DEFAULT);
							
			$password_reg = $_POST["password_reg"];
			
	
			// schauen welche ID jetzt benötigt wird!
			$answer = $mysqli->query("SELECT max(ID) as maximum FROM `$tabelle_mysql`.`user`;");
			while($answerObj = $answer->fetch_object())
			{
				$id = $answerObj->maximum;
				$id++;
		
			}
			
			//reinschreiben in die DB
			$ergebnis = $mysqli->query("INSERT INTO `$tabelle_mysql`.`user` (`ID`, `user`, `password`) VALUES ('$id', '$email_reg', '$password_reg')");
	
			//Ausgabe
			//echo $id.". ";
			//echo("Registrierung erfolgreich!");
			
			//Bestätigungsmail versenden-----------
			
			

			mail($empfaenger, $betreff, $nachricht, $header);
			
			//-------------------------------------
			
			$extra = "index.php?reg=Erfolgreich";

			
		}
		else
		{
			//echo "Der Beutzer <strong>".$_POST["email_reg"]."</strong> ist bereits registriert!<br>Wählen Sie einen anderen Nutzernamen!";
		}
	
	}
	else
	{
		//$host = htmlspecialchars($_SERVER["HTML_HOST"]);
		//$uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "\//");
		$extra = "index.php?reg=nicht_erfogreich";
		header("Location: http://$host$uri/$extra");
			
		
		
		
	}
		$host = htmlspecialchars($_SERVER["HTTP_HOST"]);
		$uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "\//");
	//echo "<br><br><a href='http://$host$uri/$extra'>Zurück zum login</a>";
	header("Location: http://$host$uri/$extra");
?>