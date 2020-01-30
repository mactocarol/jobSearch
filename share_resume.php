<?php
	
	include 'check.php';
	
	include 'connection.php'; 

	include 'header.php';

	?>

	<!-- header End -->
	<!-- page banner section start -->
	<div class="section page_banner_section">
		<div class="container">
			<!-- row start -->
			<div class="row">
				<div class="col-sm-12">
					<div class="page_banner_text">
						<div class="banner_heading">
							<h1>Share Resume</h1>
						</div>
						<div class="breadcrumbs">
							<ul>
								<li><a href="dashboard.php">Home</a></li>
								<li>Share Resume</li>
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
				<div class="col-xl-8 offset-lg-2">
					<div class="login_form_cover resume_frm_cover">
						<div class="share_resume_form job_form">

							<?php

			if ($_POST) {
			//print_r($_FILES['fileToUpload']['name']);die;
			$name=$_POST['name'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$position=$_POST['position'];
			$experience=$_POST['experience'];
			$ctc=$_POST['ctc'];
			$location=$_POST['location'];
			// $user_id=$_POST['user_id'];

			$target_dir = "upload/";	
			$filename = time().basename($_FILES['fileToUpload']['name']);		
			$target_file = $target_dir .time().basename($_FILES['fileToUpload']['name']);
			$uploadOk = 1;
			$imageFileType = pathinfo($filename)['extension'];

			$allowed_type = ['html','xls'];



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
		 	}else{
		 		if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file)) {
		 			
				 	 $sql="INSERT INTO resumes (name,email,contact,position,experience,ctc,location,filename,user_id) VALUES ('$name','$email','$contact','$position','$experience','$ctc','$location','$filename','$user_id')"; 
							$result=mysqli_query($conn,$sql);
							$num=mysqli_affected_rows($conn);

							if ($num > 0)
							{				
								$query="SELECT * FROM user_points WHERE user_id='$user_id'"; 
								$res=mysqli_query($conn,$query);
									$num1=mysqli_num_rows($res); 
									if($num1){

										$row = mysqli_fetch_assoc($res);
										//print_r($row['points']); 
										$old_points=$row['points'];
										$new_points=$old_points+2;
										$query1="UPDATE user_points SET  points='$new_points' WHERE user_id='$user_id'"; 
										$result=mysqli_query($conn,$query1);
										if(mysqli_affected_rows($conn)){
											//echo "points updated successfully";
										}else{
											//echo "points not updated";
										}
									}else{
										
										$points=2;

									$sql1="INSERT INTO user_points (user_id, points) VALUES ('$user_id' ,'$points')"; 
										$result1=mysqli_query($conn,$sql1);
										if(mysqli_affected_rows($conn)){
											//echo "points insert successfully";
										}else{
											//echo "points not insert";
										}
									}
								echo "<div class='btn btn-success'>Resume Uploaded Successfully</div>";
							}
							else
							{
								echo "<div class='btn btn-danger'>Resume Submission failed</div>";
							}
					
					}else{
						echo "Resume Uploading failed";
					}
		 		}
		 	}

			
		
		 ?>


							<h4 class="form_heading">Share Resume</h4>
							<form class="form_inline" action="#" method="post" enctype="multipart/form-data">
								<div class="form_group">
									<label class="input_lable">Name</label>
									<div class="input_group">
										<input type="text" name="name" placeholder="Enter Your Name" required="">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Email</label>
									<div class="input_group">
										<input type="email" name="email" placeholder="Enter Email Address" required="">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Contact</label>
									<div class="input_group">
										<input type="text" name="contact" placeholder="Enter Mobile Number" required="">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Position</label>
									<div class="input_group">
										<select name="position">
											<option value="">Select Position</option>
											<option value="Php Developer">Php Developer</option>
											<option value="Android Developer">Android Developer</option>
											<option value="Angular Developer">Angular Developer</option>
											<option value="Web Designer">Web Designer</option>
											<option value="Graphic Designer">Graphic Designer</option>
										</select>
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Experience</label>
									<div class="input_group">
										<select name="experience">
											<option value="">Your Experience</option>
											<option value="Fresher">Fresher</option>
											<option value="1 Year">1 Year</option>
											<option value="2 Year">2 Year</option>
											<option value="3 Year">3 Year</option>
											<option value="4 Year">4 Year</option>
											<option value="5 Year">5 Year</option>
											<option value="6 Year">6 Year</option>
											<option value="7 Year">7 Year</option>
										</select>
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">CTC</label>
									<div class="input_group">
										<input type="text" name="ctc" placeholder="Enter CTC" required="">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Location</label>
									<div class="input_group">
										<input type="text" name="location" placeholder="Enter Your Location" required="">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Upload Resume</label>
									<div class="input_group">
										<label class="img_upload_btn">
											<input type="file" id="fileToUpload" name="fileToUpload" value="upload" required="" >
											<span><i class="fas fa-cloud-upload-alt"></i> Upload Resume</span>
										</label>
										<span class="upload_file_path"></span>
									</div>	
								</div>
								<div>
									<input type="hidden" name="user_id" value="<?php echo $user_id ; ?>">
								</div>
								<div class="form_group">
				                    <button type="submit" class="submit_btn"><span>Submit</span></button>
				                </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle area -->
	<!-- Footer start -->
		<?php include 'footer.php'; ?>
			
			<?php

				function validate_contact($contact)
				{
					return preg_match('/^[0-9]{10}+$/',$contact);
				}
			?>

			