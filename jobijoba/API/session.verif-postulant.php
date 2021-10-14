<?php
	include 'connect.php';	
	global $conn;	
 session_start();
 if (!isset($_SESSION['loggedPostulant'])|| !$_SESSION['loggedPostulant']){
    header('Location: ../index.php');
 }
 $email = isset($_SESSION['emailPostulant']) ? $_SESSION["emailPostulant"] : " ";
 $req = "SELECT * FROM jobseeker WHERE mailPostulant = '$email'";
 $res = $conn->query($req);
	while ($data = mysqli_fetch_array($res)) {
		$namePostulant= $data['namePostulant'];
		$lastNamePostulant = $data['lastNamePostulant'];
		$skills = $data['skills'];
		$adressePostulant = $data['adressePostulant'];
		$telPostulant = $data['telPostulant'];
		$mailPostulant = $data['mailPostulant'];
	}    
?>