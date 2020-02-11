<?php include 'check.php'; ?>
<?php include 'connection.php'; ?>
<?php include 'header.php'; ?>
	
	<div class="section page_banner_section">
		<div class="container">
			<!-- row start -->
			<div class="row">
				<div class="col-sm-12">
					<div class="page_banner_text">
						<div class="banner_heading">
							<h1>Dashboard</h1>
						</div>
						<div class="breadcrumbs">
							<ul>
								<li><a href="dashboard.php">Home</a></li>
								<li>Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

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

							if (isset($_POST['update'])) {
										
								$oldpass=md5($_POST['oldpass']); 
								$newpass=md5($_POST['newpass']);
								$confirmpass=md5($_POST['confirmpass']); 

								$query ="SELECT password FROM users WHERE id='$user_id'";
								$res =mysqli_query($conn,$query);
								$row =mysqli_fetch_assoc($res);
								$userpass =$row['password'];

								if ($userpass == $oldpass)
								{
									if ($newpass == $confirmpass)
									{
									$sql ="UPDATE users SET password='$confirmpass' WHERE id='$user_id'"; 
									$num =mysqli_query($conn,$sql);
									if ($num > 0)
									{
									echo "password successfully updated...!!!";

										// session_distroy();

									// echo "window.location='dashboard.php'";		
									}
									}
									 else
									{
								 	echo "Confirm password not match...!!!";
									}
								}
								else
								{
								echo "Old password not match...!!!";
								}
							}	
						?>


							
							<h4 class="form_heading">Change Password</h4>
							<form action="#" method="post" autocomplete="off">
								<div class="form_group">
									<label class="input_lable">Old Password</label>
									<div class="input_group">
										<input type="password" name="oldpass" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter,and at least 8 or more character" required="" >
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">New Password</label>
									<div class="input_group">
										<input type="password" name="newpass" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter,and at least 8 or more character" required="" >
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Confirm Password</label>
									<div class="input_group">
										<input type="password"  name="confirmpass" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase and lowercase letter,and at least 8 or more character" required="" >
									</div>
								</div>
								
								<div class="form_group">
				          <button type="submit" class="submit_btn" name="update"><span>Update</span></button>
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
	
	</body>
</html>


<?php include 'footer.php'; ?>
