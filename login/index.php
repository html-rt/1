<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>LOGIN</title>
</head>

<body>
	<!--Hier kann man noch das Get von der Registreunr iwie einbauen "ERFOLGREICH" -->
    <p><?php
	echo $_GET["reg"];
	echo $_GET["login"];
	?>
    
    <!-- LOGIN -->
    <div style="background-color:#FC0; width:250px">
		<h1 style="font-family:Arial, Helvetica, sans-serif;">Login</h1>
        <form id="login" action="login.php" method="post">
    	
			<label for="email">E-Mailadresse:</label>
			<input type="email" id="email" name="email">
   	 		<br>
    		<br>
    	
    		<label for="password">Passwort:</label>
    		<input type="password" id="password" name="password">
    	
    		<input type="submit" value="LOGIN">
    	 </form>
  </div>  
  
  <!-- REGISTRIERUNG -->
  <div style="background-color:#FF0; width:250px">
		<h1 style="font-family:Arial, Helvetica, sans-serif;">Registrierung</h1>
        <form id="login" action="register.php" method="post">
    	
			<label for="email_reg">E-Mailadresse:</label>
			<input type="email_reg" id="email_reg" name="email_reg">
   	 		<br>
    		<br>
    	
    		<label for="password_reg">Passwort:</label>
    		<input type="password" id="password_reg" name="password_reg">
    		<!--<script type="text/javascript"> 
            Irgendwie muss in das Script rein dass man nur registrieren kann wenn auch ne echte email eigetragen wurde!!
				var login = document.getElementById('login');
				login.addEventListener('textInput', sh......
				
				-->
				
    		<input type="submit" value="Registrieren">
    	 </form>
  </div> 
    
   

</body>
</html>
