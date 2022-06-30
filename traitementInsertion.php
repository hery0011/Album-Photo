<?php 
	/*session start*/
	session_start();
	if(isset($_SESSION['id']) && !is_null($_SESSION['id'])) {
		$UserId = $_SESSION['id'];
	} else {
		header('location: index.html');
	}

	/*recuperation fichier*/
	$file_nom = $_FILES['fichier']['name'];
	$file_type = $_FILES['fichier']['type'];
	$file_tmp_name = $_FILES['fichier']['tmp_name'];
	$file_dest = 'FILES/'.$file_nom;
	move_uploaded_file($file_tmp_name, $file_dest);

	$motCle = $_POST['motCle'];

	/*recuperation date*/
	$ObjectName = new DateTime();
	$date_insertion = $ObjectName->format('d/m/Y'); 

	/*configuration base*/
	require('config.php');

	if (!empty($file_nom)) {

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO album (file_nom, file_url, date_insertion, motCle, userId)
		VALUES ('$file_nom', '$file_dest', '$date_insertion', '$motCle', '$UserId')";
		
		if ($conn->query($sql) === TRUE) {
		  header('location: insertion.html');
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

?>