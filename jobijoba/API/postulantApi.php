<?php
	
	include 'connect.php';
	
	global $conn;
	if($_POST['type']==1){

		$namePostulant=$_POST['namePostulant'];
        $lastNamePostulant=$_POST['lastNamePostulant'];
        $skillPostulant=$_POST['skillPostulant'];
        $adressePostulant=$_POST['adressePostulant'];
        $phonePostulant=$_POST['phonePostulant'];
		$emailPostulant=$_POST['emailPostulant'];             	
		$passwordPostulant = password_hash($_POST["passwordPostulant"], PASSWORD_DEFAULT);
		
		
		

		

		$select = mysqli_query($conn, "SELECT * FROM jobseeker WHERE mailPostulant = '".$_POST['emailPostulant']."'");
		if(mysqli_num_rows($select)) {
			echo json_encode(array("statusCode"=>201));
		}
		else{
			session_start();
			$_SESSION['emailPostulant']= $_POST['emailPostulant'];
			$_SESSION['loggedPostulant']= true;
			$query="INSERT INTO jobseeker(namePostulant,lastNamePostulant,skills,adressePostulant,telPostulant,mailPostulant,passPostulant) VALUES('$namePostulant','$lastNamePostulant', '$skillPostulant', '$adressePostulant', '$phonePostulant', '$emailPostulant', '$passwordPostulant')";
			
			if (mysqli_query($conn, $query)) 
			{
				echo json_encode(array("statusCode"=>200));
			$response=array('status' => 1,);
			
			}
			else 
			{
				echo json_encode(array("statusCode"=>201));
			$response=array('status' => 0,);
			}

		}
		
	}
	
	if($_POST['type']==2){

		$emailPostulant=$_POST['emailPostulant'];
		$passwordPostulant=$_POST['passwordPostulant'];
		$valid= false;
		

		$sql= "SELECT * FROM jobseeker WHERE mailPostulant = '$emailPostulant' ";

		$result = mysqli_query($conn, $sql);
		$num=mysqli_num_rows($result);
		
		if($num== 1){
			while($row=mysqli_fetch_assoc($result)){
				if(password_verify($passwordPostulant, $row['passPostulant'])){
					echo json_encode(array("statusCode"=>200));
					$valid=true;
				}else{
					echo json_encode(array("statusCode"=>201));
				}
			}
		}else{
			echo json_encode(array("statusCode"=>201));
		}
		
		if($valid===true){
			session_start();
			$_SESSION['emailPostulant']= $_POST['emailPostulant'];
			$_SESSION['loggedPostulant']= true;
		}
		
	}		
?>
  