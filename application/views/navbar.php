<div class='large-12'>
	<nav class="top-bar">
	  <ul class="title-area">
	    <!-- Title Area -->
	    <li class="name">
	      <h1 id='top-bar-title'>Welcome: </h1>
	    </li>
	    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
	    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	  </ul>

	  <section class="top-bar-section">
	    <!-- Left Nav Section -->
	    <ul class="left">
	      <li class="divider"></li>
	      <li><a href="/dashboard/index">Dashboard</a></li>
	      <li class="divider"></li>
	      <li><a href="#" data-reveal-id="profile">Personal Profile</a></li>
	      <li class="divider"></li>          
	    </ul>
	    <ul class="right">
	    	<li class="divider"></li>
	    	<li><a href="/user/logout">Logout</a></li>
	    	<li class="divider"></li>
	    </ul>
	</nav>
</div>

<!-- Pofile -->
<div class="reveal-modal small" id="profile">
	<?php $temp_session = $this->session->userdata('user_session'); ?>
	<h3>Personal Profile</h3>
	<p>Name: <?php echo $temp_session->first_name . " " . $temp_session->last_name ?></p>
	<p>Eamil: <?php echo $temp_session->email ?></p>
	<p>ID #: <?php echo $temp_session->id?></p>
	<p>Status: <?php if ($temp_session->id == 1) 
						{
						echo "Admin";
						}
						else{ echo "User"; } ?></p>
	<button class='button' data-reveal-id='profile_edit'>Edit Your Information</button>
	<a class="close-reveal-modal">&#215;</a>
</div>

<!-- Edit profile -->
<div class="reveal-modal small" id="profile_edit">
	<?php $temp_session = $this->session->userdata('user_session'); ?>

	<form method='post' action='/user/edit_user' id='edit_user_form'>
		<input type='hidden' name='user_id' value='<?php echo $temp_session->id?>'>
		<label>First Name:</label>
		<input type='text' id='first_name' name='first_name' placeholder='<?php echo $temp_session->first_name ?>' />
		<label>Last Name:</label>
		<input type='text' id='last_name' name='last_name' placeholder='<?php echo $temp_session->last_name ?>' />
		<label>Email Address:</label>
		<input type='text' id='email' name='email' placeholder='<?php echo $temp_session->email ?>' />	
		<label>Password:</label>
		<input type='password' id='password1' name='password1' placeholder='New Password' />
		<label>Confirm Your Password:</label>
		<input type='password' id='password2' name='password2' placeholder='Confirm New Password' />
		<div class='row'>
		<input type='submit' id='submitbtn' placeholder='Submit' class='button'/>	
	</form>	
	<button class='button alert' data-reveal-id='profile'>Cancle</button>
		</div>
	<a class="close-reveal-modal">&#215;</a>
</div>

