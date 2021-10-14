<?php
	include 'connect.php';	
	global $conn;	
 session_start();
 if (!isset($_SESSION['logged'])|| !$_SESSION['logged']){
    header('Location: ../employers.php');
 }
 $email = isset($_SESSION['email']) ? $_SESSION["email"] : " ";
 $req = "SELECT * FROM crud WHERE email = '$email'";
 $res = $conn->query($req);
 while ($data = mysqli_fetch_array($res)) {
	$nameRecruiter= $data['nameRecruiter'];
	$email = $data['email'];
	$phone = $data['phone'];
	$id = $data['id'];
}    
?>