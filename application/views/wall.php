<div class="row" id="top-content">
<div class="row">
	<div class="small-6 columns">
		<h1>User Info</h1>
		<ul id="user-info">
			<li>	
				<span>
				<?php $temp_session = $this->session->userdata('user_session');
				echo $temp_session->first_name; 
				?>
				</span>
			</li>
			<li>
				<span>
				<?= $temp_session->last_name; ?>
				</span>
			</li>
			<li>
				<span>
				<?= $temp_session->email; ?>
				</span>
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div cass="small-12 columns">
		<form method="post" action="../wall/add_post" id="post-form">
			<input type="hidden" name="user_id" value="<?= $temp_session->id ?>">
			<label><h3>Leave a Message:</h3></label>
			<textarea rows="6" placeholder="Type your message..." name="post-text" id="post-text"></textarea>
			<input type="submit" name="submit-button" value="Submit" class="button">
		</form>
	</div>
</div>
</div>
	<!-- posts appended here -->
	<?php 
	echo $posts ?>




