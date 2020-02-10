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
				$sql = "SELECT movName, movYear, movDir, movGen, movDesc FROM mov ORDER BY RAND() LIMIT 1";
				$result = $mysqli->query($sql);

				if ($result->num_rows > 0) {
					//Kopplar alla inlägg till variabler
					while($row = $result->fetch_assoc()) {
					$movName=$row["movName"];
					$movYear=$row["movYear"];
					$movDir=["movDir"];
					$movGen=$row["movGen"];
					$movDesc=$row["movDesc"];
					}
				} 
				else {
					//Utskrift om något går fel
					echo "Kunde inte hitta databas för filmlistan.";
				}
				//Stänger anslutning
				$mysqli->close();
				?>
				<h1><?php echo $movName; ?></h1>
				<p><?php echo "År: ". $movYear . " " . "Skapare: ". $movYear . " " . "Genre: " . $movGen; ?> </p>
				<p><?php echo "Synopsis:" . "</br>" . "</br>" . $movDesc; ?></p>
			</div>
		</section>
		<?php include "footer.html"?>
    </body>
</html>