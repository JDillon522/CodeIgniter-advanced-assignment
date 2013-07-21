<div class="row">
	<div class="small-6 columns">
		<h1>User Info</h1>
		<ul>

			<li>
				<?php 
				echo "<pre>";
				var_dump($this->session->userdata); 
				echo "</pre>";
			echo $this->session->userdata('user_session')['first_name']; ?></li>
			
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


