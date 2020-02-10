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
				<?php $mysqli = new mysqli("localhost", "root", "", "maje0019");
				//Kollar anslutning
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				} 
				//Väljer all data från en slumpmässig rad till den har gått igenom en hel
				$sql = "SELECT serName, serYear, serDir, serGen, serDesc FROM ser ORDER BY RAND() LIMIT 1";
				$result = $mysqli->query($sql);

				if ($result->num_rows > 0) {
					//Kopplar alla inlägg till variabler
					while($row = $result->fetch_assoc()) {
					$serName=$row["serName"];
					$serYear=$row["serYear"];
					$serDir=["serDir"];
					$serGen=$row["serGen"];
					$serDesc=$row["serDesc"];
					}
				} 
				else {
					//Utskrift om något går fel
					echo "Kunde inte hitta databas för serielistan.";
				}
				//Stänger anslutning
				$mysqli->close();
				?>
				<h1><?php echo $serName; ?></h1>
				<p><?php echo "År: ". $serYear . " " . "Skapare: ". $serYear . " " . "Genre: " . $serGen; ?> </p>
				<p><?php echo "Synopsis:" . "</br>" . "</br>" . $serDesc; ?></p>
			</div>
		</section>
		<?php include "footer.html"?>
    </body>
</html>