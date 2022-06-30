<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "album_photo";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$mdp = $_POST['mdp'];

	$sql = "INSERT INTO user (nom, prenom, mail, mdp) VALUES ('$nom', '$prenom', '$mail', '$mdp')";
	if ($conn->query($sql) === TRUE) {
	  header('location: index.html');
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>