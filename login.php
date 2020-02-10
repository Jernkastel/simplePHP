<!DOCTYPE html>
<?php session_start(); 
if(isset($_SESSION["logged"])) {
	header("Location:home.php");
}
?>
<html>
	<head>
		<title>Projekt</title>
			<link rel='StyleSheet' href='smokingstyles.css' type='text/css'/>
			<script type="text/javascript" src='smokingfunctions.js'></script>
			<script type="text/javascript" src='jquery.js'></script>
			<meta charset="UTF-8">
			<script>
				$(function () {
					setTimeout("displaytime()", 1000);
				})
					function displaytime() {
					var dt = new Date();
					$('#idtime').html(dt.toLocaleTimeString());
					setTimeout("displaytime()", 1000)
				}
			</script>
	</head>
    <body>
		<header id="header">
			<img id="webLogo" src="logo2.png" alt="Website Logo">
			<?php include('navbar_normal.html')	?>		
		</header>
		<section id="container">
			<div id="content">
				<div id = "logForm">
					<h1>Mata in uppgifter för att logga in</h1>
					<form method="post" action="">
					Användarnamn: <br/>
					<input type="text" name="usr"><br/>
					Lösenord:<br/>
					<input type="password" name="psw"><br/>
					<input type="submit" value="Logga In">
					</form> 
				</div>
				</br>
				<input type="submit" value ="Skapa Konto" onclick="toggleReg()" id="but">
				<div id="hiddenReg">
					<form method="post" action="create.php">
					Ange användarnamn:<br/>
					<input type="text" name="usr"><br/>
					Ange lösenord:<br/>
					<input type="password" name="psw"><br/>
					<input type="submit" value="Registrera Konto">
					</form> 
				</div>
			</div>
		</section>
		<?php include "footer.html"?>
    </body>
</html>
<?php
if(isset($_POST['usr']) && isset($_POST['psw'])){
    $usr = $_POST['usr'];
    $psw = $_POST['psw'];

$mysqli = new mysqli("localhost", "root", "", "maje0019");

//Kollar anslutning
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//Matchar användarinmatningar med data i databas
if ($stmt = $mysqli->prepare("SELECT usr FROM login WHERE usr=? AND psw=? ")) {

    $stmt->bind_param("ss", $usr, $psw);

    $stmt->execute();

     $result = $stmt->get_result();
	 
      while ($myrow = $result->fetch_assoc()) {
		//Omdirigerar till login sidan och sätter session
        $_SESSION["logged"] = "true";
        header("Location:home.php");
    }
}
//Stänger anslutning
$mysqli->close();
}
?>