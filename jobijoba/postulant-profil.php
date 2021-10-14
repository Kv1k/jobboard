<?php
 require_once('./API/session.verif-postulant.php');
 
 
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LinkGoals</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">
      <!-- stylesheet -->
    <style>
        <?php include "style.css" ?>
    </style>    
      
</head>
<body id="annonce">
   
   
    <div id="postulant-nav">
        <div class="nav" id="nav-employers" style="text-align:center">  
            <div class="column-jobboard">                
                <div class="row-jobboard">                          
                    <h2 >POSTULANT BOARD.</h2>       
                </div>
            
                <div class="nav">
                    <ul>
                                    
                        <li><a href="./postulant-jobboard.php">Job</a></li>
                        <li><a href="./postulant-profil.php">Profil</a></li>
                        <a href="./API/logout-postulant.php"><li id="logout">Logout</li></a>
                    </ul>
                </div>
                <div>
                    <?php          
                    
                      echo "<div>Bonjour &nbsp;"  .$namePostulant."</div>";
                  
                    ?> 
                </div>
            </div>   
        </div>
    </div>
    <form method="POST" id="form-employer-jobboard">
            <H4 style="text-align: center;">Modify your information:</H4>
            <div class="col-6"> 
            <label for="namePostulant" class="form-label">Name</label>
            <input type="text" class="form-control" id="namePostulant" name="namePostulant" value="<?php echo $namePostulant;?>">
            </div>
            <div class="col-6">
                  <label for="lastNamePostulant" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastNamePostulant" name="lastNamePostulant"value="<?php echo $lastNamePostulant;?>">
            </div>
            <div class="col-6">
            <label for="skills" class="form-label">Skills</label>
            <input type="text" class="form-control" id="skills" name="skills" value="<?php echo $skills;?>">
            </div>
            <div class="col-6">
                  <label for="adressePostulant" class="form-label">Address</label>
                  <input type="text" class="form-control" id="adressePostulant" name="adressePostulant" value="<?php echo $adressePostulant;?>">
            </div>
            <div class="col-6">
                  <label for="telPostulant" class="form-label">Telephone</label>
                  <input type="text" class="form-control" id="telPostulant" name="telPostulant" value="<?php echo $telPostulant;?>">
            </div>
            <div class="col-6">
                  <label for="mailPostulant" class="form-label">Email</label>
                  <input type="text" class="form-control" id="mailPostulant" name="mailPostulant" value="<?php echo $mailPostulant;?>">
            </div>
            <div class="col-6">
                  <label for="passPostulant" class="form-label">Password</label>
                  <input type="text" class="form-control" id="passPostulant" name="passPostulant" >
            </div>
            
            <button type="submit" class="btn button" id="submit">Modify</button>
    </form>
     
</body>
</html>