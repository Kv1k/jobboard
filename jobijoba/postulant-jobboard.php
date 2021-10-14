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
       
      <div  class="col-8" id="jobboard-job">
      
      </div>
     


      <script>
            $(document).ready(function() {
                  var contentOpen= false;

                $.ajax({
                        url: './API/jobs.php',
                        type: 'GET',
                        dataType: 'JSON', 
                        success: function(response){
                              
                              var len = response.length;
                              var idTarget = []
                              for(let i=0; i<len; i++){
                                    var id = response[i].ID;
                                    var nomSociete = response[i].NOM_SOCIETE;
                                    var descJob = response[i].DESCJOB;
                                    var resumeDesc= response[i].DESCJOB.substring(0, 150)
                                    var poste = response[i].POSTE;
                                    var skill = response[i].SKILL;
                                    var lieu = response[i].LIEU;
                                    var salaire = response[i].SALAIRE;
                                    var contrat = response[i].CONTRAT;
                              
                                    var content =` 
                                    
                                          <div class="card mb-3">
                                                <div class="card-body">
                                                            <div class="row">
                                                                  <div class="col-xs-12 col-md-8 content-card" >
                                                                        <div id="content-ad${id}">
                                                                              <h5 class="card-title">${nomSociete}</h5>
                                                                              <p class="card-text spacing-content" > <u>Description:</u> ${resumeDesc}</p>
                                                                        </div>
                                                                        <button class="button learn" id="${id}" >Learn more</button>
                                                                  </div>
                                                            
                                                                  <div class="col-xs-12 col-md-3" id="applyContainer">
                                                                  
                                                                        <button href="#" class="button btnApply openbtn" onclick="openForm()">Apply</button>
                                                            
                                                                  </div>
                                                            </div>     
                                                </div>
                                          </div>
                                    
                                    `
                                    $("#jobboard-job").append(content);

                                   
                                   
                                          
                                    var id = document.getElementById(`${id}`);
                                    id.addEventListener('click',function(){
                                          if(contentOpen===false){
                                                document.getElementById(response[i].ID).innerHTML="Learn less"
                                                document.getElementById(`content-ad${response[i].ID}`).innerHTML= `
                                                <h5 class="card-title">${response[i].NOM_SOCIETE}</h5>
                                                <p class="card-text spacing-content" >
                                                      <u>Description:</u> ${response[i].DESCJOB}                                
                                                </p>
                                                <div class="card-text spacing-content" >
                                                      <u>Job:</u> ${response[i].POSTE}                               
                                                </div>
                                                <div class="card-text spacing-content" >
                                                      <u>Skill:</u> ${response[i].SKILL}                        
                                                </div>
                                                <div class="card-text spacing-content" >
                                                      <u>Place:</u> ${response[i].LIEU}                          
                                                </div>
                                                <div class="card-text spacing-content" >
                                                      <u>Salary:</u> ${response[i].SALAIRE}€ /month                 
                                                </div>
                                                <div class="card-text spacing-content" >
                                                      <u>Type of contrat:</u> ${response[i].CONTRAT}    
                                                </div>
                                                
                                                ` ;
                                                contentOpen=true
                                          }else{
                                                document.getElementById(response[i].ID).innerHTML="Learn more"
                                                document.getElementById(`content-ad${response[i].ID}`).innerHTML= `
                                                <h5 class="card-title">${response[i].NOM_SOCIETE}</h5>
                                                <p class="card-text spacing-content" >
                                                      <u>Description:</u> ${response[i].DESCJOB.substring(0, 150)}                               
                                                </p>
                                                
                                                
                                                ` ;
                                                contentOpen=false
                                          }
                                    })
                                    
                              }
                              
                              
                        },
                        error: function(xhr, status, error) {
                              console.error(xhr);
                        }
                      
                  });
            })
      
           
            
      </script>
 

</body>
</html>