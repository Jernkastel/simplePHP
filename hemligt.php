<!DOCTYPE html>
<?php session_start();
//Sparkar användaren från sidan om denne inte är inloggad
if(!$_SESSION["logged"]) {
	header("Location:home.php");
}
?>
<html>
	<head>
		<title>Projekt</title>
			<link rel='StyleSheet' href='smokingstyles.css' type='text/css'/>
			<script type="text/javascript" src='functions.js'></script>
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
			<?php include('navbar_loggedin.html'); ?>
		</header>
		<section id="container">
			<div id="content">
				<p>Detta kan du bara se om du är inloggad</p>
			</div>
		</section>
		<?php include "footer.html"?>
    </body>
</html>