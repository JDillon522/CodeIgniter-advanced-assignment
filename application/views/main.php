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



<!--  notes
dashboard
classes:
- post message
- display message
- post comment
- display comment
 -->


