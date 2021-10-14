<?php
 require_once('./API/session.verif-recruiter.php');
 
 
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
                    <h2>RECRUITER BOARD.</h2>       
                </div>
            
                <div class="nav">
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
            <H4 style="text-align: center;">Modify your information:</H4>
            <div class="col-6"> 
            <label for="nameRecruiter" class="form-label">Name</label>
            <input type="text" class="form-control" id="nameRecruiter" name="nameRecruiter" value="<?php echo $nameRecruiter;?>">
            </div>
            <div class="col-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email"value="<?php echo $email;?>">
            </div>
            <div class="col-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>">
            </div>
            <input type="hidden" value="<?php echo $id;?>" name="id" id="id">
            <button type="submit" class="btn button" id="submit">Modify</button>
    </form>

    <script>
        $(document).ready(function() {
            $("#submit").click(function(){
                var nameRecruiterPUT = $("#nameRecruiter").val();
                var emailPUT = $("#email").val();
                var phonePUT = $("#phone").val();
                var id = $("#id").val();
               
                $.ajax({
                    type: "POST",
                    url: "./API/modify-employer.php",
                    data: {
                        nameRecruiterPUT: nameRecruiterPUT,
                        emailPUT: emailPUT,           
                        phonePUT: phonePUT,            
                        id: id                               
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