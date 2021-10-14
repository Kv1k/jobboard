<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>LinkGoals</title>

      <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">
      <!-- stylesheet -->
      <style>
            <?php include "style.css" ?>
      </style>    

      <!-- add scroll -->
      <script>
        setTimeout(function(){ 
          document.querySelector('body').style.overflow="scroll"
        }, 3800);
      </script>

      <!-- greensock -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
</head>

<body id="home">
      <div id="gauche" class="gauche">
            <h2>JOBI</h2>
      </div>

      <div id="droite" class="droite">
            <h2>JOBA</h2>
      </div>
   
      <section>
        <div class="nav" id>
            <ul>
                  <li><a href="./accueil.php">Home</a></li>
                  <li><a href="./annonce.php">Jobs</a></li>
                  <li><a href="./employers.php">Employers</a></li>
                  <li id="login"><a href="./index.php">Login</a></li>
                  <a href="./index.php"><li id="register">Register</li></a>
                  
            </ul>
        </div>
      
       
        <h1>Work with JobiJoba.</h1>
        <a href="#sec-2">
           <div class="scroll-down">
          </div>
        </a>
       
      </section>
      <section id="sec-2">
        ok
      </section>
  
      <script src="./js/app.js"></script>
</body>

</html>