<div class="row" id="top-content">
<div class="row">
	<div class="small-6 columns">
		<h1>This message board is for:</h1>
		<ul id="user-info">
			<li>	
				<span>
				<?php
				$user_info;
				echo $user_info[0]['first_name'] . " " . $user_info[0]['last_name']; 
				?>
				</span>
			</li>
			<li>
				<span>
				<?php echo $user_info[0]['email']; ?>
				</span>
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div cass="small-12 columns">
		<form method="post" action="/wall/add_post/" id="post-form">
			<input type="hidden" name="receiver_id" value="<?= $this->uri->segment(3) ?>">
			<input type="hidden" name="user_id" value="<?= $user_info[0]['id'] ?>">
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




