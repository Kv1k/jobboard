
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
			<label for="email">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Phone:</label>
			<input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
		</div>
		
		<div class="form-group">
			<label for="pwd">Password:</label>
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
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var city = $('#city').val();
		var password = $('#password').val();
		if(name!="" && email!="" && phone!="" && password!="" ){
			$.ajax({
				url: "./API/recruiter.php",
				type: "POST",
				data: {
                    type: 1,
					name: name,
					email: email,
					phone: phone,
                    password: password						
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
						window.location.href = 'http://localhost:8888/employer-jobboard.php';
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
	$('#butlogin').on('click', function() {
		var email = $('#email_log').val();
		var password = $('#password_log').val();
		if(email!="" && password!="" ){
			$.ajax({
				url: "./API/recruiter.php",
				type: "POST",
				data: {
					type:2,
					email: email,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						window.location.href = 'http://localhost:8888/employer-jobboard.php';	
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