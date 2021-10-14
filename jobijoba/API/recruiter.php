<?php
	
	include 'connect.php';
	
	global $conn;
	
	if($_POST['type']==1){
		
		$nameRecruiter=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
		
		

		

		$select = mysqli_query($conn, "SELECT * FROM crud WHERE email = '".$_POST['email']."'");
		if(mysqli_num_rows($select)) {
			echo json_encode(array("statusCode"=>201));
		}
		else{
			session_start();
			$_SESSION['email']= $_POST['email'];
			$_SESSION['logged']= true;
			$query="INSERT INTO crud(nameRecruiter,email, phone, pass) VALUES('$nameRecruiter','$email', '$phone', '$password')";
			
			 echo json_encode(array("statusCode"=>200));
			if (mysqli_query($conn, $query)) 
			{
			$response=array('status' => 1,);
			
			}
			else 
			{
			$response=array('status' => 0,);
			}

		}
		
	}
	if($_POST['type']==2){

		$email=$_POST['email'];
		$password=$_POST['password'];
		$valid= false;
		

		$sql= "SELECT * FROM crud WHERE email = '$email' ";
		$result = mysqli_query($conn, $sql);
		$num=mysqli_num_rows($result);
		
		if($num== 1){
			while($row=mysqli_fetch_assoc($result)){
				if(password_verify($password, $row['pass'])){
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
			$_SESSION['email']= $_POST['email'];
			$_SESSION['logged']= true;
		}
		
	}		
?>
  
  