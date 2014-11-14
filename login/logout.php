<?php 
		
			session_start();
			$_SESSION = array();
			if(isset($_COOKIE[session_name()]))
			{
				setcookie(session_name(), "", time()-420000, "/");
			}
			
			session_destroy();
			
			
			
			//Für die Weiterleitung nachher
			$host = htmlspecialchars($_SERVER["HTTP_HOST"]);
			$uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "\//");
			$extra = "index.php";
			
	
	
			
			//Weiterleitung zum User-Bereich
			header("Location: http://$host$uri/$extra");
			
?>
			
			
			
