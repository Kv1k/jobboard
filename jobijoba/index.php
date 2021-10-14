<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>JOBIJOBA</title>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">
      <!-- stylesheet -->
      <style>
            <?php include "style.css" ?>
      </style>    
      
     
</head>
<body id="employer-jobboard">
   
   
      <div id="employers">
        <div class="nav" id="nav-employers">
              <ul>
                    <li><a href="./accueil.php">Home</a></li>
                    <li><a href="./annonce.php">Jobs</a></li>
                    <li><a href="./employers.php">Employers</a></li>
                    <li id="login"><a href="./index.php">Login</a></li>
                    <a href="./index.php"><li id="register">Register</li></a>
                    
              </ul>
        </div>
      </div>
       
       
   <div>
   <div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
  <button type="button" class="btn btn-danger btn-sm" id="getRegister">Register</button>
  <button type="button" class="btn btn-success btn-sm" id="getLogin">Login</button>
	
	<form id="register_form" name="form1" method="POST">
		<div class="form-group">
			<label >Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <div class="form-group">
			<label >Last Name:</label>
			<input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName">
        </div>
        <div class="form-group">
			<label >Skill:</label>
			<input type="text" class="form-control" id="skill" placeholder="Skill" name="skill">
        </div>
        <div class="form-group">
			<label >Address:</label>
			<input type="text" class="form-control" id="addresse" placeholder="Address" name="adress">
		</div>
		
		<div class="form-group">
			<label >Phone:</label>
			<input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
		</div>
		<div class="form-group">
			<label >Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type="password" class="form-control" id="password" placeholder="Password" name="password">
		</div>
		<input type="button" name="save" class="btn button" value="Register" id="butsave">
	</form>
	<form id="login_form" name="form1" method="POST" style="display:none;">
		
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email_log" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password_log" placeholder="Password" name="password">
		</div>
		<input type="button" name="save" class="btn button" value="Login" id="butlogin">
	</form>
</div>

<script>
  $(document).ready(function() {
	$('#getLogin').on('click', function() {
		$("#login_form").show();
		$("#register_form").hide();
	});
	$('#getRegister').on('click', function() {
		$("#register_form").show();
		$("#login_form").hide();
	});
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
        var namePostulant = $('#name').val();
        var lastNamePostulant = $('#lastName').val();
        var skillPostulant = $('#skill').val();
        var adressePostulant = $('#addresse').val();
        var phonePostulant = $('#phone').val();
		var emailPostulant = $('#email').val();
		var passwordPostulant = $('#password').val();
		if(namePostulant!="" && emailPostulant!="" && phonePostulant!="" && passwordPostulant!="" ){
			$.ajax({
				url: "./API/postulantApi.php",
				type: "POST",
				data: {
                    type: 1,
                    namePostulant: namePostulant,
                    lastNamePostulant: lastNamePostulant,
                    skillPostulant: skillPostulant,
                    adressePostulant: adressePostulant,
                    phonePostulant: phonePostulant,
					emailPostulant: emailPostulant,					
                    passwordPostulant: passwordPostulant						
                },
                cache: false,
				success: function(dataResult){

					var result = JSON.parse(dataResult)
					console.log(result)
					if(result.statusCode==201){
						$("#error").show();
						$('#error').html('Email already exists !');
					} 
					else if (result.statusCode==200){
						window.location.href = 'http://localhost:8888/postulant-jobboard.php';
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
	$('#butlogin').on('click', function() {
		var emailPostulant = $('#email_log').val();
		var passwordPostulant = $('#password_log').val();
		if(emailPostulant!="" && passwordPostulant!="" ){
			$.ajax({
				url: "./API/postulantApi.php",
				type: "POST",
				data: {
					type:2,
					emailPostulant: emailPostulant,
					passwordPostulant: passwordPostulant						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						window.location.href = 'http://localhost:8888/postulant-jobboard.php';	
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Invalid EmailId or Password !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
</body>
</html>