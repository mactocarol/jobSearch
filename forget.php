<?php  include 'connection.php';?>
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

				if(isset($_POST['submit']))
				{
				$email = $_POST['email'];
				
				$sql = "SELECT * FROM users WHERE email = '$email' "; 
				$res = mysqli_query($conn,$sql);
				$row = mysqli_num_rows($res);
				if($row)
				{
					function makepassword($length)
					{
					$validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
					$validCharNumber = strlen($validCharacters);
					$result ="";
					for ($i = 0; $i < $length; $i++) 
					{
					$index = mt_rand(0, $validCharNumber - 1);
					$result .= $validCharacters[$index];
					}
					return $result;
					}
					
					$random_password = makepassword(6);

					$query = "UPDATE users SET password ='".md5($random_password)."' WHERE email = '$email' " ;  
					$res1 = mysqli_query($conn,$query);
					if($res1)
					{
					// echo "Your Password is:".$random_password;

						$to = $email;
						$subject = "Your recovered password,";

						$message = "Please use this password to login   "  .$random_password ;
						$headers = "from : chanchal@gmail.com ";

						if (mail($to , $subject , $message , $headers)) {
						 	
						 	echo "Your password has been send to your email id";
						 } 
						 else{
						 	echo "Failed to recover your password,try again";
						 }
					}
				}
				else
				{
					echo  "Email Not Found";
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
				          <button type="submit" name="submit" class="submit_btn"><span>Forget Password</span></button>
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




			