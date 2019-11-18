	<div class="bg0 m-t-65 p-b-140">
		<div class="container">
			<div class="container" style="margin-top: 20vh;">
				<div class="row justify-content-center">
					<div class="col-md-6 col-9 shadow-lg" >
						<div style="border-bottom: 1px solid #6c7ae0;">
							<p class="pb-2" style="text-align: center;">
								<font size="4" color="#333" face="Poppins-Medium"> Login</font>
							</p>
						</div>
						<div class="row justify-content-center pt-3">
							<div class="col-md-10 col-12 text-align-center shadow-lg">
								<?php 
									echo form_open('Login/logging_in');
									
									echo "<div class='form-group'>";
									echo form_label('Email ','email', $label_attr);
									echo "<div class='col-sm-12'>";
									echo form_input($email_attr, set_value('email'));
									echo "<small class='text-danger'>".form_error('email')."</small>";
									echo "</div></div>";
									
									echo "<div class='form-group'>";
									echo form_label('Password', 'password', $label_attr);
									echo "<div class='col-sm-12'>";
									echo form_input($password_attr, set_value('password'));
									echo "<small class='text-danger'>".form_error('password')."</small>";
									echo "</div></div>";

									if($error !='') echo "<div class='alert alert-danger mx-3'>".$error."</div>";
									echo "<div class='form-group pl-3'>";
									echo form_submit('','Login',$submit_attr);
									echo '	<a href="'.base_url('index.php/NewArrivals').'" style="margin-right: 15px;" class="btn btn-secondary"> 
										Sign Up
										</a>';
									echo "</div>";


									echo form_close(); 
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?=$footer?>
