<?php 

	/*configuration base*/
	require('config.php');

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


	$sqlSelect = "SELECT * FROM user where mail = '$mail'";
	$resultSelect = $conn->query($sqlSelect);

	if ($resultSelect->num_rows > 0 || $nom == '' || $prenom == '' || $mail == '' || $mdp == '') {
		 header('location: creationCompte.html');
	}else{
		$sql = "INSERT INTO user (nom, prenom, mail, mdp) VALUES ('$nom', '$prenom', '$mail', '$mdp')";
		if ($conn->query($sql) === TRUE) {
		  header('location: index.php');
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

?>