<?php include 'check.php'; ?>
<?php include 'connection.php'; ?> 
<?php include 'header.php'; ?>
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

			$id = base64_decode(base64_decode($_GET['id']));
			$query1 = "SELECT * FROM resumes WHERE id = '$id'";  
			$res1=mysqli_query($conn,$query1);
			$row1 = mysqli_fetch_assoc($res1);

			if (isset($_POST['submits'])) {


				
	
			$name=$_POST['name']; 
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$position=$_POST['position'];
			$experience=$_POST['experience'];
			$ctc=$_POST['ctc'];
			$location=$_POST['location'];
			// $user_id=$_POST['user_id'];
			if (!empty($_FILES['fileToUpload']['tmp_name'])) {
			$target_dir = "upload/";	
			$filename = time().basename($_FILES['fileToUpload']['name']);		
			$target_file = $target_dir .time().basename($_FILES['fileToUpload']['name']);
			$uploadOk = 1;
			$imageFileType = pathinfo($filename)['extension'];

			$allowed_type = ['docs','doc','pdf'];



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

		 		$query = "SELECT * FROM resumes WHERE id = '$id'";
				$res=mysqli_query($conn,$query);
				$row = mysqli_fetch_assoc($res);	
				$num1=mysqli_num_rows($res);
										
				if ($num1 > 0)
				{	
		 			
				 $sql = "UPDATE resumes SET name='$name',email='$email',contact='$contact',position='$position',experience='$experience',ctc='$ctc',location='$location',filename='$filename' WHERE id='$id'"; 
				
				$result=mysqli_query($conn,$sql);

				$query = "SELECT * FROM resumes WHERE id = '$id'";
				$res=mysqli_query($conn,$query);
				$row1 = mysqli_fetch_assoc($res);	
				$num1=mysqli_num_rows($res);
				if(mysqli_affected_rows($conn))
				{				
							
					echo "<div class='btn btn-success'>Resume update Successfully</div>";
				}
				
					
					}
		 		}
		 	}
		}else{
			$sql = "UPDATE resumes SET name='$name',email='$email',contact='$contact',position='$position',experience='$experience',ctc='$ctc',location='$location' WHERE id='$id'"; 
				$result=mysqli_query($conn,$sql);

				$query = "SELECT * FROM resumes WHERE id = '$id'";
				$res=mysqli_query($conn,$query);
				$row1 = mysqli_fetch_assoc($res);	
				$num1=mysqli_num_rows($res);
				if(mysqli_affected_rows($conn))
				{				
							
					echo "<div class='btn btn-success'>Resume update Successfully</div>";
				}
		}		 	
			
		}
		 ?>


							<h4 class="form_heading">Update Resume</h4>
							<form class="form_inline" action="#" method="post" enctype="multipart/form-data">
								<div class="form_group">
									<label class="input_lable">Name</label>
									<div class="input_group">
										<input type="text" name="name" value="<?php echo $row1['name'] ;?>" placeholder="Enter Your Name" required="">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Email</label>
									<div class="input_group">
										<input type="email" name="email" value="<?php echo $row1['email'] ;?>" placeholder="Enter Email Address" required="">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Contact</label>
									<div class="input_group">
										<input type="text" name="contact" value="<?php echo $row1['contact'] ;?>" placeholder="Enter Mobile Number" required="">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Position</label>
									<div class="input_group">
										<select name="position" value="">
											<option value="<?php echo $row1['position'] ;?>"><?php echo $row1['position'] ;?></option>
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
											<option value="<?php echo $row1['experience'] ;?>"><?php echo $row1['experience'] ;?></option>
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
										<input type="text" name="ctc" value="<?php echo $row1['ctc'] ;?>" placeholder="Enter CTC" required="">
									</div>
								</div>
								<div class="form_group">
									<label class="input_lable">Location</label>
									<div class="input_group">
										<select name="location">
											<option value="<?php echo $row1['location'] ;?>"><?php echo $row1['location'] ;?></option>
											<option value="Indore">Indore</option>
											<option value="Bhopal">Bhopal</option>
											<option value="Ujjain">Ujjain</option>
											<option value="Betul">Betul</option>
											<option value="Dewas">Dewas</option>
											<option value="Gwalior">Gwalior</option>
											<option value="Jablpur">Jablpur</option>
											<option value="Sagar">Sagar</option>
										</select>
									</div>
								</div>
				 				<div class="form_group">
									<label class="input_lable">Upload Resume</label>
									<div class="input_group">
										<label class="img_upload_btn">
											<input type="file"  name="fileToUpload" value="<?php echo $row1['filename'] ;?>">
											<span><i class="fas fa-cloud-upload-alt"></i> Upload Resume</span>
										</label>
										<span class="upload_file_path"></span>
									</div>	
								</div>
								<div>
									<input type="hidden" name="id" value="<?php echo $id ; ?>">
								</div>
								<div class="form_group">
				                    <button type="submit" class="submit_btn" name="submits"><span>Update</span></button>
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

