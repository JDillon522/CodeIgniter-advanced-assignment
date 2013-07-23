
<div class='large-12'>
	<nav class="top-bar">
	  <ul class="title-area">
	    <!-- Title Area -->
	    <li class="name">
	      <h1 id='top-bar-title'>Begin: </h1>
	    </li>
	    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
	    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	  </ul>

	  <section class="top-bar-section">
	    <!-- Left Nav Section -->
	    <ul class="left">
	      <li class="divider"></li>
	      <li><a href="#" data-reveal-id="login-modal">Login</a></li>
	      <li class="divider"></li>
	      <li><a href="#" data-reveal-id="register-modal">Register</a></li>
	      <li class="divider"></li>          
	    </ul>
	</nav>
</div>

<div class="row">
	<div class="large-4 columns">
		<h1>Come see the beauty of 1's and 0's :<small> We seek to make what is digital impact what is reality - one computation at a time.</small></h1></p>
	</div>
	<div class="large-8 columns">
		<ul data-orbit>
			<li>
				<img class="orbit-img-size" src="../../assets/img/index/binary0.png" />
				<div class="orbit-caption">Math ( Numbers ) is essentially the language of God.</div>
			</li>
			<li>
				<img class="orbit-img-size" src="../../assets/img/index/binary1.png" />
				<div class="orbit-caption">To understand Math, is to understand order admist the chaos.</div>
			</li>
			<li>
				<img class="orbit-img-size" src="../../assets/img/index/binary2.png" />
				<div class="orbit-caption">The very act of study then becomes an act of worship, for you are able to look upon the masterful hand of the Creator.</div>
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="small-3 columns">
		<h5 class="subheader">Made with Foundation</h5>
	</div>
</div>

<!-- Modals -->
<div class="reveal-modal small" id="login-modal">
	<h3>Login:</h3>
		<form method="post" action="../user/process_login" id="login_form">
			<input type="hidden" name="action" value="login">
				<label>Email Address:</label>
				<input type="text" id="email" name="email" placeholder="Email" />
				<label>Password:</label>
				<input type="password" id="password1" name="password0" placeholder="Password" />
			<input type="submit" id="submitbtn" placeholder="Submit" class="button"/>
		</form>
		<!-- Alert Boxs -->
		<div id="alert_box">
		</div>
	<a class="close-reveal-modal">&#215;</a>
</div>
<div class="reveal-modal small" id="register-modal">
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
			<input type="submit" id="submitbtn" placeholder="Submit" class="button"/>	
		</form>
		<!-- Alert Boxs -->
		<div id="alert_box2">
		</div>
	<a class="close-reveal-modal">&#215;</a>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#register_form').submit(function(){
			$.post
			(
				$(this).attr('action'),
				$(this).serialize(),
				function(data){
					console.log(data);
					$('#alert_box2').html(data);
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
					if (data == "success") {
						window.location.href = "wall/index";

					}
					else{
						console.log(data);
						$('#alert_box').html(data);
					};
				},
				"json"
			);
			return false;
		});
	});
</script>