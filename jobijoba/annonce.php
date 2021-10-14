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
      
      <div class="nav">
            <ul>
                  <li><a href="./accueil.php">Home</a></li>
                  <li><a href="./annonce.php">Jobs</a></li>
                  <li><a href="./employers.php">Employers</a></li>
                  <li id="login"><a href="./index.php">Login</a></li>
                  <a href="./index.php"><li id="register">Register</li></a>
                  
            </ul>
      </div>
      <div class="firstElement">
            <h2>Découvrez les offres d’emploi</h2>
            <form class="row"  method = "GET">
                  

                  <div class="col-auto">
                        
                        <input type="text" class="form-control input-search"  id="input-search" placeholder="Search">
                  </div>
                  <div class="col-auto">
                        <input  type="submit" class="btn mb-3 button button-search"  id="submit-search" value = "Search">
                  </div>
            </form>
      </div>
     
   
      <div  class="col-8" id="content-job">
      
      </div>
      <div  class="col-8" id="search-result">
      
      </div>
           
      <div id="myOverlay" class="overlay">
                  <span class="closebtn" onclick="closeForm()" title="Close Overlay">
                  &#215
                  </span>
                  <div class="wrap">
                        <h2 id="h2-apply">Sign In</h2>
                        <form method="POST" id="form-apply">
                              
                              <input class="input-apply" type="email" placeholder="Enter Email">
                              <input  class="input-apply"type="password" placeholder="Enter Password">
                             
                              <p class="have-account-apply" onclick="dontAccount()">You don't have an account ?</p>
                              <button id="submit-apply" type="submit" class="button">Sign in</button>
                        </form>
                  </div>
      </div>
           
         
      <script>
            $(document).ready(function(){ 
                  var contentOpen= false;

                  $.ajax({
                        url: './API/jobs.php',
                        type: 'get',
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
                                    $("#content-job").append(content);

                                   
                                   
                                          
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
                  document.getElementById('submit-search').addEventListener('click',function(e){
                        e.preventDefault();
                        var info = $("#input-search").val(); 
                        if(info!=""){
                              $.ajax({                                    
                                    type:"GET",
                                    url:"./API/search.php",
                                    data:"info=" + encodeURIComponent(info), 
                                    success: function(data){
                                          if(data){
                                                
                                                document.getElementById('content-job').style.display="none";
                                                
                                                $("#search-result").append(data);
                                               
                                                
                                              
                                          }else{
                                                document.getElementById('search-result').innerHTML=`No results found`
                                                document.getElementById('content-job').style.display="none";
                                          }                                          
                                    },
                                    error: function(xhr, status, error) {
                                          console.error(xhr);
                                    }                                    
                              })                              
                        }else{
                              document.getElementById('content-job').style.display="block";
                              document.getElementById('search-result').style.display="none";
                        }                     
                  })
                
                  

                    
            });      
            

                        
                  
                  function openForm(){
                  document.getElementById("myOverlay").style.display = "block";
                       
                 }
                 function closeForm(){
                       document.getElementById("myOverlay").style.display = "none";
                 }
                   
                  var alreadyAccount = true;

                  function haveAccount(){
                        alreadyAccount = true;
                        if(alreadyAccount===true){
                        document.querySelector(".wrap").innerHTML= `
                        <h2 id="h2-apply">Sign In</h2>
                        <form method="POST" id="form-apply">
                              
                              <input class="input-apply" type="email" placeholder="Enter Email">
                              <input  class="input-apply"type="password" placeholder="Enter Password">
                              <p class="have-account-apply" onclick="dontAccount()">You don't have an account ?</p>
                              <button id="submit-apply" type="submit" class="button">Sign in</button>
                        </form>`
                        
                        
                  }
                  }
                  function dontAccount(){
                        alreadyAccount = false;
                        
                        if(alreadyAccount ===false){
                        document.querySelector(".wrap").innerHTML= `
                        <h2 id="h2-apply">Sign Up Here</h2>
                        <form method="POST" id="form-apply">
                              <input class="input-apply" type="text" placeholder="Enter First and Last Name">
                              <input class="input-apply" type="email" placeholder="Enter Email">
                              <input class="input-apply" type="password" placeholder="Enter Password">
                              <textarea class="input-apply" type="textarea" placeholder="Enter a description"></textarea>
                              <input class="input-apply" type="text" placeholder="Enter your skills">
                              <p class="have-account-apply" onclick="haveAccount()">Already have an account ?</p>
                              <button id="submit-apply" type="submit" class="button">Join Now</button>
                        </form>`

                        
                       

                        }
                  }
                
                  
                 
             </script>
       
</body>

</html>