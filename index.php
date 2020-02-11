<?php include 'connection.php'; ?>
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
						<div class="login_form job_form">
							<span class="login_icon">
								<i class="fas fa-user"></i>
							</span>

							<?php
							
							if (($_POST))
							{
							$email=$_POST['email'];
							$password=$_POST['password'];
							$status=1;

							$query="SELECT * FROM users WHERE email='$email' AND password='".md5($password)."' AND status='1'";
							$res=mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($res);
							$num=mysqli_num_rows($res); 

							if ($num > 0)
							{

							$_SESSION['user_id'] = $row['id']; 
							$_SESSION['logged_in']=true;
								  
								  echo "<script>window.location='dashboard.php';</script>";

							}
							else
							{
								echo "<div class='btn btn-primary'>login fail</div>";
							}
							}
 
						?>

							<form action="#" method="post" autocomplete="off">
								<div class="form_group">
									<label class="input_lable">Email</label>
									<div class="input_group">
										<input type="email" name="email" placeholder="Enter Email" autocomplete="off">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">password</label>
									<div class="input_group">
										<input type="password" name="password" placeholder="Enter Password" autocomplete="off">
									</div>
								</div>
								<div class="form_group">
				          <button type="submit" name="login" class="submit_btn"><span>Login</span></button>
				        </div>
				        <div class="form_group alerady_reg_text">
			            <p>You Don't have account <a href="register.php">Register Now</a></p>
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
