<?php
session_start();
if(isset($_POST['usr']) && isset($_POST['psw'])){
    $usr = $_POST['usr'];
    $psw = $_POST['psw'];

$mysqli = new mysqli("localhost", "root", "", "maje0019");

//Kollar anslutning
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//Sätter in användarinmatningar
if ($stmt = $mysqli->prepare("INSERT INTO login (usr, psw) VALUES(?,?)")) {

    $stmt->bind_param("ss", $usr, $psw);

    $stmt->execute();

     $result = $stmt->get_result();
	 //Omdirigerar till login sidan
     header("Location:login.php");
    }
}

//Stänger anslutning
$mysqli->close();
?>