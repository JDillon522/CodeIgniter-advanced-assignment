<div class="row">
	<div class="small-6 columns">
		<h1>User Info</h1>
		<ul>
			<li>	
			<?php $temp_session = $this->session->userdata('user_session');
			echo $temp_session->first_name; 
			?>
			</li>
			<li>
				<?= $temp_session->last_name; ?>
			</li>
			<li>
				<?= $temp_session->email; ?>
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div cass="small-12 columns">
		<form method="post" action="../wall/add_post">
			<input type="hidden" name="user_id" value="<?= $temp_session->id ?>">
			<label>Leave a Message:</label>
			<textarea rows="6" placeholder="Type your message..." name="post-text"></textarea>
			<input type="submit" name="submit-button" value="Submit">
		</form>
	</div>
</div>

<div id="row post-content">
	<!-- posts appended here -->
	<?php 
	echo $posts ?>
</div>




