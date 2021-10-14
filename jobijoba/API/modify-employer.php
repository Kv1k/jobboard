<?php
 include("connect.php");
 $request_method = $_SERVER["REQUEST_METHOD"];

 switch($request_method)
 {
   case 'POST':
       updateEmp();
   break;
   case 'GET':
       // Supprimer un job
       $id = intval($_GET["id"]);
       deleteEmp($id);
   break;
 }
 function updateEmp()
  {
    global $conn;
    
    $nameRecruiter = $_POST["nameRecruiterPUT"];
    $email = $_POST["emailPUT"];
    $phone = $_POST["phonePUT"];
    $id = $_POST["id"];

    $query="UPDATE crud SET nameRecruiter='$nameRecruiter', email='$email', phone='$phone' WHERE id=$id";
    
    if(mysqli_query($conn, $query))
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Produit mis a jour avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Echec de la mise a jour de produit. '. mysqli_error($conn)
      );
      
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
  }
?>