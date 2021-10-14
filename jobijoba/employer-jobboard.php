<?php
 require_once('./API/session.verif-recruiter.php');
 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>JOBIJOBA</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">      <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">
      <!-- stylesheet -->
      <style>
            <?php include "style.css" ?>
      </style>    
      
     
</head>
<body id="employer-jobboard">
   
   
      <div id="postulant-nav">
            <div class="nav" id="nav-employers" style="text-align:center">  
                  <div class="column-jobboard">                
                        <div class="row-jobboard">
                              
                                    <h2 >RECRUITER BOARD.</h2>       
                        </div>
            
                        <div class="nav" >
                              <ul>
                                    
                                    <li><a href="./employer-jobboard.php">Home</a></li>
                                    <li><a href="./employer-profil.php">Profil</a></li>
                                    <a href="./API/logout-recruiter.php"><li id="logout">Logout</li></a>
                                    
                              </ul>
                        </div>
                        <div>
                        <?php          
                     
                              echo "<div>Bonjour &nbsp;"  .$nameRecruiter."</div>";
                                
                        ?> 
                        </div>
                  </div>   
            </div>
      </div>
               <form method="POST" id="form-employer-jobboard">
            <H4 style="text-align: center;">Add advertiser:</H4>
            <div class="col-6"> 
            <label for="nameSociete" class="form-label">Name of your company</label>
            <input type="text" class="form-control" id="nameSociete" name="nameSociete" >
            </div>
            <div class="col-6">
                  <label for="skill" class="form-label">The skills you are looking for</label>
                  <input type="text" class="form-control" id="skill" name="skill" >
            </div>
            <div class="col-6">
            <label for="poste" class="form-label">The job</label>
            <input type="text" class="form-control" id="poste" name="poste">
            </div>
            <div class="col-6">
                  <label for="salaire" class="form-label">Salary</label>
                  <input type="text" class="form-control" id="salaire" name="salaire">
            </div>
            <div class="col-6">
                  <label for="lieu" class="form-label">Place</label>
                  <input type="text" class="form-control" id="lieu" name="lieu">
            </div>
            <div class="col-6">
                  <label for="descJob" class="form-label">Description of job</label>
                  <textarea type="text" class="form-control" id="descJob" name="descJob"></textarea>
            </div>
            <div class="col-6">
                  <label for="contrat" class="form-label">Contrat</label>
                  <input type="text" class="form-control" id="contrat" name="contrat">
            </div>
            
            <button type="submit" class="btn button" id="submit">Submit</button>
            </form>
     


      <div id="postulant">
            <H4 style="text-align: center;">Postulant:</H4>
            <div class="row">
                  <div class="col-4">
                        <div class="card mb-3">
                              <div class="card-body"> 
                                    <div class="col-12 user-icon"><i class="fa fa-user"></i></div>
                                    <div class="row">
                                          
                                          <div class="content-postulant">                             
      
                                                <h5 class="card-title">Nom du postulant</h5>
                                                <div class="card-text spacing-content" > <u>Skill:</u> JS / REACT / MongoDB</div>
                                                <div class="card-text spacing-content" > <u>Adress:</u> 10 rue des oliviers, 34920 Montpellier</div>
                                                <div class="card-text spacing-content" > <u>Telephone:</u> 0606060606</div>
                                                <div class="card-text spacing-content" > <u>Mail:</u> titi@hotmail.com</div>
      
                                          </div>
                                          
                                    </div>     
                              </div>
                        </div>
                  </div>  
                  <div class="col-4">
                        <div class="card mb-3">
                              <div class="card-body"> 
                                    <div class="col-12 user-icon"><i class="fa fa-user"></i></div>
                                    <div class="row">
                                          
                                          <div class="content-postulant">                             
      
                                                <h5 class="card-title">Nom du postulant</h5>
                                                <div class="card-text spacing-content" > <u>Skill:</u> JS / REACT / MongoDB</div>
                                                <div class="card-text spacing-content" > <u>Adress:</u> 10 rue des oliviers, 34920 Montpellier</div>
                                                <div class="card-text spacing-content" > <u>Telephone:</u> 0606060606</div>
                                                <div class="card-text spacing-content" > <u>Mail:</u> titi@hotmail.com</div>
      
                                          </div>
                                          
                                    </div>     
                              </div>
                        </div>
                  </div>  
                  <div class="col-4">
                        <div class="card mb-3">
                              <div class="card-body"> 
                                    <div class="col-12 user-icon"><i class="fa fa-user"></i></div>
                                    <div class="row">
                                          
                                          <div class="content-postulant">                             
      
                                                <h5 class="card-title">Nom du postulant</h5>
                                                <div class="card-text spacing-content" > <u>Skill:</u> JS / REACT / MongoDB</div>
                                                <div class="card-text spacing-content" > <u>Adress:</u> 10 rue des oliviers, 34920 Montpellier</div>
                                                <div class="card-text spacing-content" > <u>Telephone:</u> 0606060606</div>
                                                <div class="card-text spacing-content" > <u>Mail:</u> titi@hotmail.com</div>
      
                                          </div>
                                          
                                    </div>     
                              </div>
                        </div>
                  </div>   
            </div>
            
      </div>
    
      <script>
            $(document).ready(function() {

                  $("#submit").click(function(){
                  var nameSociete = $("#nameSociete").val();
                  var skill = $("#skill").val();
                  var poste = $("#poste").val();
                  var salaire = $("#salaire").val();
                  var lieu = $("#lieu").val();
                  var descJob = $("#descJob").val();
                  var contrat = $("#contrat").val();
                  $.ajax({
                  type: "POST",
                  url: "./API/jobs.php",
                  data: {
                        nameSociete: nameSociete,
                        skill: skill,           
                        poste: poste,            
                        salaire: salaire,    
                        lieu: lieu,            
                        descJob: descJob,            
                        contrat: contrat            
                  },
                  success: function(data) {
                        console.log("Données envoyés")
                  },
                  error: function(xhr, status, error) {
                        console.error(xhr);
                  }
                  });
            })
            })
      
           
            
      </script>
 

</body>
</html>