<?php 

	/*session start*/
	session_start();
	if(isset($_SESSION['id']) && !is_null($_SESSION['id'])) {
		$UserId = $_SESSION['id'];
	} else {
		header('location: index.php');
	}

	/*configuration base*/
	require('config.php');


	/*recuperation fichier*/
	ini_set('memory_limit', '96M');
	$file_nom = $_FILES['fichier']['name'];
	if ($file_nom != "") {
		$file_type = $_FILES['fichier']['type'];
		$file_tmp_name = $_FILES['fichier']['tmp_name'];
		$file_dest = 'FILES/'.$file_nom;
		$fileNameCmps = explode(".", $file_nom);
		$fileExtension = strtolower(end($fileNameCmps));
		/*max_file_uploads = 20;*/
		move_uploaded_file($file_tmp_name, $file_dest);

		$motCle = $_POST['motCle'];

		/*recuperation date*/
		$ObjectName = new DateTime();
		$date_insertion = $ObjectName->format('d/m/Y'); 

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
			$sql = "INSERT INTO album (file_nom, file_url, date_insertion, motCle, userId, type)
			VALUES ('$file_nom', '$file_dest', '$date_insertion', '$motCle', '$UserId', 0)";
		

		if ($conn->query($sql) === TRUE) {
		  header('location: insertion.php');
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}



	$file_nom_video = $_FILES['fichier_video']['name'];
	if ($file_nom_video != "") {
		$file_type = $_FILES['fichier_video']['type'];
		$file_tmp_name = $_FILES['fichier_video']['tmp_name'];
		$file_dest = 'FILES/'.$file_nom_video;
		$fileNameCmps = explode(".", $file_nom_video);
		$fileExtension = strtolower(end($fileNameCmps));
		/*max_file_uploads = 20;*/
		move_uploaded_file($file_tmp_name, $file_dest);

		$motCle = $_POST['motCle'];

		/*recuperation date*/
		$ObjectName = new DateTime();
		$date_insertion = $ObjectName->format('d/m/Y'); 

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO album (file_nom, file_url, date_insertion, motCle, userId, type)
		VALUES ('$file_nom_video', '$file_dest', '$date_insertion', '$motCle', '$UserId', 1)";
		

		if ($conn->query($sql) === TRUE) {
		  header('location: insertion.php');
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


?>