<?php 
		
			// DB verbinden! 	
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
	

	







			//Schauen ob der user in der DB
			session_start();
			if($_POST["email"]!=null && $_POST["password"]!=null){
			
			$ergebnis = $mysqli->query("SELECT * FROM `$tabelle_mysql`.`user`");
			
			//Für die Weiterleitung nachher
			$host = htmlspecialchars($_SERVER['HTTP_HOST']);
			$uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "\//");
			
			
			
			
			
			
			$eingabe_passwort = $_POST["password"];
			
			
			while($zeile = $ergebnis->fetch_array())
			{
				
				
				
				
				$hash_vom_server = $zeile["password"];
				
				//$stimmts = password_verify('$eingabe_passwort', $hash_vom_server);
				$stimmts = ($eingabe_passwort == $hash_vom_server);
				
				
				
				
				//Check ob der User vorhanden ist und ob das passwort stimmt
				if($zeile['user']==$_POST["email"] && $stimmts)
				{
				
					
					$_SESSION["email"] = $_POST["email"];
					$_SESSION["login"] = "ok";
					
					//echo"Login erfolgreich!";
					
					
					$extra = "user_bereich.php";
					
					
					//Serververbindung wieder schließen.
					$mysqli->close();
				
				}
					//Nutzer vorhanden - aber passwort falsch
					else if($zeile["user"]==$_POST["email"])
					{
			
					//echo"Nutzer vorhanden aber Passwort falsch!";
					//echo "<br>";
					//echo $_POST["password"];
					//echo $eingabe_passwort;
					//echo "<br>";
					//echo $zeile["password"];
					//echo $hash_vom_server;
					
					
					
					//Serververbindung wieder schließen.
					$mysqli->close();
					}
					
						
						
					
				}
			}
			else
			{
			$host = htmlspecialchars($_SERVER["HTTP_HOST"]);
			$uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "\//");
			$extra = "index.php?login=fehler";
			}
			
			//Serververbindung wieder schließen.
			$mysqli->close();
			//Weiterleitung zum User-Bereich
			
			//echo "<br>Hier klappt die Weiterleitung auf dem Servier ums Verrecken nicht :(<br><a href='http://$host$uri/$extra'>User Bereich</a>";
			
			header("Location: http://$host$uri/$extra");
			exit;
?>