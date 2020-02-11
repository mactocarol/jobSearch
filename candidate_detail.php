<?php include 'check.php'; ?>
<?php include 'connection.php'; ?>
<?php include 'header.php'; ?>

	
<?php
	
	if($_GET){

		$resume_id=$_GET['id'];

		// user id and resume-id already in db , then not insert
		$query = "SELECT * FROM view_detail WHERE user_id = '$user_id' AND resume_id = '$resume_id'"; 
		$res=mysqli_query($conn,$query);
		$num_row=mysqli_num_rows($res);

		//print_r($res); die;
		$query2= "SELECT * FROM user_points WHERE user_id='$user_id'";
		$res=mysqli_query($conn,$query2);
		$num1=mysqli_num_rows($res); 
		$row = mysqli_fetch_assoc($res);

		
			if($num_row == 0){
				$sql = "INSERT INTO view_detail (user_id,resume_id) VALUES ('$user_id','$resume_id')";
				$result = mysqli_query($conn,$sql);
				$num = mysqli_affected_rows($conn);
				

				if($num1){				
					$old_points=$row['points'];
					$new_points=$old_points-1;
					$query1="UPDATE user_points SET  points='$new_points' WHERE user_id='$user_id'"; 
					$result=mysqli_query($conn,$query1);
				
				}
				
			}
				
	}
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
							<h1>Candidate Details</h1>
						</div>
						<div class="breadcrumbs">
							<ul>
								<li><a href="dashboard.php">Home</a></li>
								<li>Candidate Details</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- page banner section End -->
	<!-- middle area -->
	<div class="section middle_content_area search_resume_page">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-12">
					<div class="candidate_details_wrap">
						<div class="candidate_details_box white_box">
							<div class="r_thumb_wrap">
								<div class="r_thumb">
									<img src="images/login/user_icon.png" alt="" class="img-fluid">
								</div>
							</div>

							<div class="candidate_table_content">
								<div class="table-responsive">
									<table class="table">
										<?php

											if($_GET){
												
											$id = base64_decode(base64_decode($_GET['id']));

												$query="SELECT * FROM  resumes WHERE id='$id'";
												if ($res=mysqli_query($conn,$query)) 
											  	if ($num1=mysqli_num_rows($res) >0){
											  	$row = mysqli_fetch_assoc($res);

											  	
											}
										}
										?>
										<tr>
											<td>Name</td><td><?php echo $row['name'] ;?></td>
										</tr>
										<tr>
											<td>contact</td><td><?php echo $row['contact'] ;?></td>
										</tr>
										<tr>
											<td>Email</td><td><?php echo $row['email'] ;?></td>
										</tr>
										<tr>
											<td>Position</td><td><?php echo $row['position'] ;?></td>
										</tr>
										<tr>
											<td>Experience</td><td><?php echo $row['experience'] ;?></td>
										</tr>
										<tr>
											<td>Location</td><td><?php echo $row['location'] ;?></td>
										</tr>
										<tr>
											<td>CTC</td><td><?php echo $row['ctc'] ;?></td>
										</tr>
										<tr>
											<td>Download Resume</td><td><a href="download.php?name=<?php echo $row['filename'] ;?>" target="_blank" class="blue_button"><i class="fas fa-cloud-download-alt"></i>download</a></td>
										</tr>
									</table>
							    </div>
						    </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle area -->
	<!-- Footer start -->

<?php include 'footer.php'; ?>


