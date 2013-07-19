<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/CSS/bootstrap.css">

	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/JS/bootstrap.js">


	<script type="text/javascript">
		$(document).ready(function(){
			$('#register_form').submit(function(){
				$.post
				(
					$(this).attr('action'),
					$(this).serialize(),
					function(data){
						console.log(data);
						$('#alert_box').html(data);
					},
					"json"
				);
				return false;
			});
			$('#login_form').submit(function(){
				$.post
				(
					$(this).attr('action'),
					$(this).serialize(),
					function(data){
						if(data != "success"){
							console.log(data);
							$('#alert_box').html(data);
						} else {
							window.location.href = "/nav/main";
						}
					},
					"json"
				);
				return false;
			});
		});
	</script>

</head>
<body>
	<div class="container">
		<div class="row">
			
			<div class="span6">

				<!-- Login Form -->
				<h3>Login:</h3>
				<form method="post" action="../user/process_login" id="login_form">
					<input type="hidden" name="action" value="login">

					<label>Email Address:</label>
					<input type="text" id="email" name="email" placeholder="Email" />
					
					
					<label>Password:</label>
					<input type="password" id="password1" name="password0" placeholder="Password" />
					<br />

					<input type="submit" id="submitbtn" placeholder="Submit" class="btn"/>
				</form>
				<br />
				<br />

				<!-- Alert Boxs -->
				<div id="alert_box">
				</div>
			</div>
			
			<div class="span6">
				<br />

				<!-- Register Form -->
				<h3>Register:</h3>
				<form method="post" action="../user/process_registration" id="register_form">

					<input type="hidden" name="action" value="register">
					
					<label>First Name:</label>
					<input type="text" id="first_name" name="first_name" placeholder="First Name" />
					
					<label>Last Name:</label>
					<input type="text" id="last_name" name="last_name" placeholder="Last Name" />
					
					
					<label>Email Address:</label>
					<input type="text" id="email" name="email" placeholder="Email" />
					
					
					<label>Password:</label>
					<input type="password" id="password1" name="password1" placeholder="Password" />
					
					
					<label>Confirm Your Password:</label>
					<input type="password" id="password2" name="password2" placeholder="Confirm Password" />
					<br />
					
					<input type="submit" id="submitbtn" placeholder="Submit" class="btn"/>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>