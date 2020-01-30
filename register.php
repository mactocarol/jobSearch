<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Job Search</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<meta name="description" content="">
	<meta name="Keyword" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" type="image/icon" href="images/fevicon.png">
	<link href="css/main.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>
  <body>
	<!-- slider End -->
	<div class="login_form_wrap pad_top_bottom_50">
		<div class="container">
			<div class="row">
				<div class="form_center">
					<div class="login_form_cover">
						<div class="reg_form form_inline job_form">

						<?php
						function isValidEmail($email)
						{
							return filter_var($email,FILTER_VALIDATE_EMAIL)
							&& preg_match('/@.+\./',$email);
						}
					?>
					<?php 
						include 'connection.php';
						
						if ($_POST) {

							$firstname=$_POST['firstname'];
							$lastname=$_POST['lastname'];
							$email=$_POST['email'];
							$password=$_POST['password'];

							$query="SELECT * FROM 	users WHERE email='$email'";
							$res=mysqli_query($conn,$query);
							$num=mysqli_affected_rows($conn);

							if ($num == 0) 
							{
								$sql="INSERT INTO users (firstname, lastname, email, password,status) VALUES ('$firstname', '$lastname', '$email', '".md5($password)."','1')"; 
								$result=mysqli_query($conn,$sql);
								$numq=mysqli_affected_rows($conn);

								if ($numq > 0)
								{	
									
									  echo "<div class='btn btn-success'>You are successfully register.You can login to continue</div>"; 
								}
								else {
									
									echo "Fail to register"; 
								
								}
								
							}
							else{

								echo "<div class='btn btn-danger'>Email already exist.</div>";
							}
							
						}

					?>


							<h4 class="form_heading">Please Create An Account</h4>
							<form action="#" method="post" autocomplete="off">
								<div class="profile_imgbox">
									<div class="profile_img">
										<img src="images/login/user_icon.png" alt="" id="profile_img">
										<label class="img_upload_icon">
											<input type="file" name="upload" onchange="document.getElementById('profile_img').src = window.URL.createObjectURL(this.files[0])">
											<i class="fas fa-camera"></i>
										</label>
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">First Name</label>
									<div class="input_group">
										<input type="text" name="firstname" placeholder="First Name">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Last Name</label>
									<div class="input_group">
										<input type="text" name="lastname" placeholder="Last Name">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Email</label>
									<div class="input_group">
										<input type="email" name="email" placeholder="Enter Email">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Password</label>
									<div class="input_group">
										<input type="password" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter,and at least 8 or more character" required="" >
									</div>
								</div>
								
								<div class="form_group">
				          <button type="submit" class="submit_btn" name="signup"><span>Sign Up</span></button>
				        </div>
                <div class="form_group alerady_reg_text">
	                <p>already registered please <a href="login.php">Login Now</a></p>
			          </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- slider End -->
	<!-- jquery library js -->
	<script src="js/jquery.min.js"></script>
	<!-- jquery library js -->
	<!-- bootstrap js file-->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<!-- bootstrap js file-->
	<!-- owl-carousel js file-->
	<script src="js/plugins/owl_carousel/owl.carousel.min.js"></script>
    <!-- owl-carousel js file-->
    <!-- gallery js file-->
	<script src="js/plugins/gallery/jquery.magnific-popup.js"></script>
    <!-- gallery js file-->
    <!-- jquery ui js file-->
	<script src="js/plugins/jquery_ui/jquery-ui.min.js"></script>
    <!-- jquery ui js file-->
	<!-- bootstrap selectpicker -->
    <script src="js/plugins/selectpicker/bootstrap-select.js"></script>
    <!-- bootstrap selectpicker -->
	<script src="js/custom_script.js"></script>
	</body>
</html>
