<div id="login_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		
		<div class="modal-header">
			<h3 id="loginModalLabel">Login:</h3>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		</div>
		
		<div class="modal-body">
			<form method="post" action="../user/process_login" id="login_form">
				<input type="hidden" name="action" value="login">

				<label>Email Address:</label>
				<input type="text" id="email" name="email" placeholder="Email" />
				
				
				<label>Password:</label>
				<input type="password" id="password1" name="password0" placeholder="Password" />
				<br />
		</div>
		
		<div class="modal-footer">
				<input type="submit" id="submitbtn" placeholder="Submit" class="btn"/>
			</form>
			<br />
			<br />

			<!-- Alert Boxs -->
			<div id="alert_box">
			</div>
		</div>
	</div>