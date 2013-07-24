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
	<a class="close-reveal-modal">&#215;</a>
</div>