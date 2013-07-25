

<script type="text/javascript">
	$(document).ready(function(){
		$('#register_form').submit(function(){
			$.post
			(
				$(this).attr('action'),
				$(this).serialize(),
				function(data){
					console.log(data);
					$('#add_user_alert_box').html(data);
				},
				"json"
			);
			return false;
		});
	});
</script>
<script type="text/javascript">
	$(document).on('submit', '#delete_form', function(){ 
		$.post
		(
			$(this).attr('action'),
			$(this).serialize(),
			function(data){
				console.log(data);
				$('#delete_alert_box').html(data);
			},
			"json"
		);
		return false;
	});
</script>

<!-- Navbar -->
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
	<form method="post" action="../user/process_registration_admin" id="register_form">
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
		<div id="add_user_alert_box">
		</div>
	<a class="close-reveal-modal">&#215;</a>
</div>

<!-- Remove User -->
<div class="reveal-modal medium" id="remove_user">
	<h3>Remove a User:</h3>
	
			<table>
		<thead>
			<tr>
				<th width="50">ID</th>
				<th width="180">Name</th>
				<th width="280">Email</th>
				<th width="110">Delete</th>
			</tr>	
		</thead>
		<tbody>
			<?php  
			foreach ($user_data as $key)
			{
				$html = "
				<tr>
					<td>#{$key['id']}</td>
					<td>{$key['first_name']} {$key['last_name']}</td>
					<td>{$key['email']}</td>
					<td><form method='post' action='/user/delete_user/' id='delete_form'>
							<input type='hidden' name='user_id' value='{$key['id']}'>
							<input type='submit' name='submit' class='button alert' value='Delete'>
						</form></td>
				</tr>";
				echo $html;
			} ?>
		</tbody>
	</table>
	<!-- Alert Boxs -->
	<div id="delete_alert_box">
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>

<!-- Edit User -->
<div class="reveal-modal medium" id="edit_user">
	<h3>Edit a User:</h3>
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
					foreach ($user_data as $key)
					{
						$html = "
						<tr>
							<td>#{$key['id']}</td>
							<td>{$key['first_name']} {$key['last_name']}</td>
							<td>{$key['email']}</td>
							<td><button class='button' data-reveal-id='edit_user_{$key['id']}'>Edit</button></td>				
						</tr>";	

						echo $html;
					} ?>
				</tbody>
			</table>
		</div>
	<a class="close-reveal-modal">&#215;</a>
</div>

<!-- Edit User 2 -->
<?php
foreach ($user_data as $key) 
{	
	$edit_user_modal = "
	<div class='reveal-modal small' id='edit_user_{$key['id']}'>
		<h3>Edit {$key['first_name']} {$key['last_name']}'s Account:</h3>

		<form method='post' action='../user/edit_user' id='edit_user_form'>
			<input type='hidden' name='action' value='register'>
			<label>First Name:</label>
			<input type='text' id='first_name' name='first_name' placeholder='{$key['first_name']}' />
			<label>Last Name:</label>
			<input type='text' id='last_name' name='last_name' placeholder='{$key['last_name']}' />
			<label>Email Address:</label>
			<input type='text' id='email' name='email' placeholder='{$key['email']}' />	
		
			<input type='submit' id='submitbtn' placeholder='Submit' class='button'/>	
		</form>				 
			
		<a class='close-reveal-modal'>&#215;</a>
	</div>";
	echo $edit_user_modal;	
}

?>






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




