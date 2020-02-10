<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<title>Projekt</title>
			<link rel='StyleSheet' href='smokingstyles.css' type='text/css'/>
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
	<!-- Inkluderar header beroende på om användaren är inloggad eller ej--> 
		<header id="header">
			<img id="webLogo" src="logo2.png" alt="Website Logo">
			<?php if(isset($_SESSION["logged"])) {
				include('navbar_loggedin.html'); 
			}
			else 
				include('navbar_normal.html')			
			?>
		</header>
		<section id="container">
			<div id="content">
			<h1>Välkomen till min sida</h1>
			<p id="cont">Detta är en sida innehållande listor av olika medier såsom film och serier. <br>
			För att navigera till dessa listor, vänligen klicka på respektive knapp i navigationsbaren. <br>
			En film, serie eller spel kommer att slumpas fram när du navigerar till sidan. Önskas ny info är det bara till latt uppdatera sidan eller navigera vidare<br>
			För att komma åt fliken "Mina Sidor" krävs en inloggning. Inloggningsformuläret kommer du till genom att klicka på "Logga In" uppe i högra hörnet.<br>
			För att kunna logga in krävs ett registrerat användarnamn och lösenord. Detta går att fixa genom att klicka på knappen "Skapa Konto" under loggin formulären.</p>
			</div>
		</section>
		<!-- Inkluderar vanlig footer--> 
		<?php include "footer.html"?>
    </body>
</html>