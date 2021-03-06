<div class="row">
	<div class="large-8 large-centered columns">
		<table>
			<thead>
				<tr>
					<div class='small-6 large-2 columns'>
						<th>ID</th>
					</div>
					<div class='small-6 large-3 columns'>
						<th>Name</th>
					</div>
					<div class='small-8 large-3 columns'>	
						<th>Email</th>
					</div>	
					<div class='small-2 large-2 columns'>
						<th>Status</th>
					</div>
					<div class='small-2 large-2 columns'>
						<th>Send a Message</th>
					</div>
				</tr>	
			</thead>
			<tbody>
				<?php  
				foreach ($user_data as $key)
				{
					$html = "
					<tr>
					<div class='small-4 large-2 columns'>
						<td>
						#{$key['id']}
						</td>
					</div>
					<div class='small-4 large-2 columns'>
						<td>
						{$key['first_name']} {$key['last_name']}
						</td>
					</div>
					<div class='small-4 large-2 columns'>
						<td>
						{$key['email']}
						</td>
					</div>
					<div class='small-4 large-2 columns'>
						<td>
						";
						if ($key['id'] == 1) 
						{
							$html .="Admin";
						}
						else
						{
							$html .="User";
						}

					$html .= "
					</div>
						</td>
					<div class='small-4 large-2 columns'>
						<td>
							<a class='button' href='/wall/index/{$key['id']}'>Go</a>
						</td>
					</div>	
					</tr>";
					echo $html;
				} ?>
			</tbody>
		</table>
	</div>
</div>

