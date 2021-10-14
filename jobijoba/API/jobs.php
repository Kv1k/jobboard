<?php
  // Se connecter à la base de données
  include("connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];
 
  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        // Récupérer un seul job
        $id = intval($_GET["id"]);
        getJob($id);
      }
      else
      {
        // Récupérer tous les jobs
        getAllJobs();
      }
    break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
    break;

    case 'POST':
      // Ajouter une annonce
      AddJob();
    break;

    case 'PUT':
        // Modifier un job
        $id = intval($_GET["id"]);
        updateJob($id);
    break;
    case 'DELETE':
        // Supprimer un job
        $id = intval($_GET["id"]);
        deleteJob($id);
    break;
  }



  function getAllJobs()
  {
    global $conn;
    $query = "SELECT * FROM ANNONCE";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  function getJob($id)
  {
    global $conn;
    $query = "SELECT * FROM ANNONCE";
    if($id != 0)
    {
      $query .= " WHERE id=".$id." LIMIT 1";
    }
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  function AddJob()
  {
    global $conn;
    $nameSociete = $_POST["nameSociete"];
    $skill = $_POST["skill"];
    $poste = $_POST["poste"];
    $salaire = $_POST["salaire"];
    $desc = $_POST["descJob"];
    $lieu = $_POST["lieu"];
    $contrat = $_POST["contrat"];
    
    echo $query="INSERT INTO ANNONCE(NOM_SOCIETE,SKILL, POSTE, SALAIRE, DESCJOB ,LIEU,CONTRAT ) VALUES('$nameSociete','$skill', '$poste', '$salaire', '$desc', '$lieu', '$contrat')";
    if(mysqli_query($conn, $query))
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Produit ajoute avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'ERREUR!.'. mysqli_error($conn)
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  function updateJob($id)
  {
    global $conn;
    $_PUT = array(); //tableau qui va contenir les données reçues
    parse_str(file_get_contents('php://input'), $_PUT);
    
    $nameSociete = $_PUT["nameSocietePUT"];
    $skill = $_PUT["skillPUT"];
    $poste = $_PUT["postePUT"];
    $salaire = $_PUT["salairePUT"];
    $desc = $_PUT["descPUT"];
    $lieu = $_PUT["lieuPUT"];
    $contrat = $_PUT["contratPUT"];
    //construire la requête SQL
    $query="UPDATE ANNONCE SET NOM_SOCIETE='$nameSociete', SKILL='$skill', POSTE='$poste', SALAIRE='$salaire', DESCJOB='$desc', LIEU='$lieu', CONTRAT='$contrat' WHERE id=$id";
    
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

  function deleteJob($id)
  {
    global $conn;
    $query = "DELETE FROM ANNONCE WHERE id=$id";
    if(mysqli_query($conn, $query))
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Produit supprime avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'La suppression du produit a echoue. '. mysqli_error($conn)
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
?>