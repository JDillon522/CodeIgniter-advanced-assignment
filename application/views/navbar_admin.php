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
	      
	      <li class="has-dropdown"><a>Admin</a>
	      	<ul class="dropdown">
	      		<li><a href="#" data-reveal-id="add_user">Add User</a></li>
	      		<li><a href="#" data-reveal-id="remove_user">Remove User</a></li>
	      		<li><a href="#" data-reveal-id="edit_user">Edit User Details</a> </li>
	      	</ul>
	      	</li>

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

<!-- Modals -->

<!-- Add User -->
<div class="reveal-modal small" id="add_user">
	<h3>Add User:</h3>
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
	<a class="close-reveal-modal">&#215;</a>
</div>

<!-- Remove User -->
<div class="reveal-modal small" id="remove_user">
	<h3>Remove a User:</h3>
		<div class="row">
			<table>
				<thead>
					<tr>
						<div class='large-3 columns'>
							<th>ID</th>
						</div>
						<div class='arge-3 columns'>
							<th>Name</th>
						</div>
						<div class='large-3 columns'>	
							<th>Email</th>
						</div>	
						<div class='large-3 columns'>
							<th>Delete</th>
						</div>
					</tr>	
				</thead>
				<tbody>
					<?php  
					foreach ($view_data as $key)
					{
						$html = "
						<tr>
							<div class='large-3 columns'>
								<td>
								#{$key['id']}
								</td>
							</div>
							<div class='large-3 columns'>
								<td>
								{$key['first_name']} {$key['last_name']}
								</td>
							</div>
							<div class='large-3 columns'>
								<td>
								{$key['email']}
								</td>
							</div>	
							<div class='large-3 columns'>
							<th><button class='button alert'>Delete</button></th>
						</div>
						</tr>";
						echo $html;
					} ?>
				</tbody>
			</table>
		</div>
	<a class="close-reveal-modal">&#215;</a>
</div>

<!-- Edit User -->
<div class="reveal-modal small" id="edit_user">
	<h3>Remove a User:</h3>
		<div class="row">
			<table>
				<thead>
					<tr>
						<div class='large-3 columns'>
							<th>ID</th>
						</div>
						<div class='arge-3 columns'>
							<th>Name</th>
						</div>
						<div class='large-3 columns'>	
							<th>Email</th>
						</div>	
						<div class='large-3 columns'>
							<th>Edit</th>
						</div>
					</tr>	
				</thead>
				<tbody>
					<?php  
					foreach ($view_data as $key)
					{
						$html = "
						<tr>
							<div class='large-3 columns'>
								<td>
								#{$key['id']}
								</td>
							</div>
							<div class='large-3 columns'>
								<td>
								{$key['first_name']} {$key['last_name']}
								</td>
							</div>
							<div class='large-3 columns'>
								<td>
								{$key['email']}
								</td>
							</div>	
							<div class='large-3 columns'>
							<th><button class='button success'>Edit</button></th>
						</div>
						</tr>";
						echo $html;
					} ?>
				</tbody>
			</table>
		</div>
	<a class="close-reveal-modal">&#215;</a>
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

