<!-- Posting HTML -->
<div class="row">
	<div class="large-12 columns">
		<br />
		<!-- Posted Messages -->
		<?php 
	echo "<pre>";
	var_dump($message_data);
	echo "</pre>"; ?>
		<blockquote>
			<p><?php echo $text ?></p>
			<small><?php echo $author_name ?> : <?php $created_at ?></small>
		</blockquote>
		<br />