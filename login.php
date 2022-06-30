<?php 
	/*configuration base*/
	require('config.php');

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$mail = $_POST['mail'];
	$mdp = $_POST['mdp'];

	$sql = "SELECT * FROM user where mail = '$mail' and mdp = '$mdp'";
	$result = $conn->query($sql)->fetch_assoc();
	
	if (count($result) > 0){
		header('location: affichage.php');

		session_start();
		$_SESSION['id'] = $result['id'];
	}else{
		header('location: index.html');
	}
?>