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
		<form method="post" action="../post/add_post">
			<input type="hidden" name="user_id" value="<?= $temp_session->id ?>">
			<label>Leave a Message:</label>
			<textarea rows="6" placeholder="Type your message..." name="post-text"></textarea>
			<input type="submit" name="submit-button" value="Submit">
		</form>
	</div>
</div>

<?php 
	// include('');
	// $wall = new Wall(); 
	// echo "<pre>";
	// var_dump($wall);
	// echo "</pre>";
	// die();

	// foreach ($wall as $post) 
	// {
	// 	$post_entry = $this->wall->display_post($post);
	// }
?>

<div class="row post-content">
	<div class="small-12 columns">
		<blockquote>
			Text messageText message Text message Text message Text message Text message 
			Text message Text message Text message 
			Text message Text message Text message Text message 
			<cite>Joseph Dillon</cite>
		</blockquote>
	</div>
	<div class="small-12 columns">
		<blockquote class="comment">
			Text messageText message Text message Text message Text message Text message 
			Text message Text message Text message 
			Text message Text message Text message Text message 
			<cite>Joseph Dillon</cite>
		</blockquote>
	</div>
</div>


<!--  notes
dashboard
classes:
- post message
- display message
- post comment
- display comment
 -->


