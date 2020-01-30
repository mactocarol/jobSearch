
<?php include'check.php'; ?>
<?php include'connection.php'; ?>
<?php include'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Job Search</title>

	
	

	
	<!-- header End -->
	<!-- page banner section start -->
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
	<!-- page banner section End -->
	<!-- middle area -->
	<div class="section middle_content_area dashboard_page pad_top_bottom_50">
		<div class="container">
			<div class="row">
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
						
						
						if ($_POST) {

							$firstname=$_POST['firstname'];
							$lastname=$_POST['lastname'];
							$email=$_POST['email'];
							$password='';
							

							$query="SELECT * FROM 	users WHERE email='$email'";
							$res=mysqli_query($conn,$query);
							$num=mysqli_affected_rows($conn);

							if ($num == 0) 
							{
								$sql="INSERT INTO users (firstname, lastname, email,password,status) VALUES ('$firstname', '$lastname', '$email','','1')"; 
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


							<h4 class="form_heading">Update Your Profile</h4>
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
				          <button type="submit" class="submit_btn" name="signup"><span>Update</span></button>
				        </div>
                
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
			</div>
		</div>
	</div>
	<!-- middle area -->
	
	
<?php include'footer.php'; ?>

<?php

		if ($_POST) {
			
			$target_dir = "upload/";	
			$filename = time().basename($_FILES['fileToUpload']['name']);		
			$target_file = $target_dir .time().basename($_FILES['fileToUpload']['name']);
			$uploadOk = 1;
			$imageFileType = pathinfo($filename)['extension'];

			$allowed_type = ['png','jpg','jpeg','gif'];

			if ($target_file == 'upload/') {
		 		$msg = "can not be empty";
		 		$uploadOk = 0;
		 	}
		 	else if (file_exists($target_file)) {
		 		$msg = "file already exists.";
		 		$uploadOk = 0;
		 	}else if (!in_array($imageFileType, $allowed_type)) {
		 		$msg = "your file type is not allowed.";
		 		$uploadOk = 0;
		 	}
		 	else if ($_FILES['fileToUpload']['size'] > 5000000) {
		 		$msg = "your file is too large.";
		 		$uploadOk = 0;
		 	}
		 	if ($uploadOk == 0) {
		 		echo "Sorry,your file was not uploaded. ".$msg;
		 	}
		 	else{
		 		if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file)) {

		 		echo	$query1="UPDATE users WHERE filename='$filename'"; die(); 
					$result=mysqli_query($conn,$query1);
					if(mysqli_affected_rows($conn))
						{
							echo "Image upload successfully";
						}
						else
						{
							echo "Image not uploaded";
						}

		 		}

		}
	}

	?>