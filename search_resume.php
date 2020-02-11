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
							<h1>Search Resume</h1>
						</div>
						<div class="breadcrumbs">
							<ul>
								<li><a href="dashboard.php">Home</a></li>
								<li>Search Resume</li>
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
					<div class="search_resume_wrap">
						<!-- sidebar start -->
						<div class="search_sidebar">
							<div class="sidebar_heading">
								<span class="filter_toggle filter_m"><i class="fas fa-sliders-h"></i> Filter</span>
								<span class="filter_toggle filter_d"><i class="fas fa-sliders-h"></i> Filter</span>
							</div>
							<form action="search_resume.php" method="get">
							<div class="filter_forms">
								<div class="filter_row select_box">
									<div class="f_heading">Location</div>
									<div class="f_content">
										<select class="selectpicker" name="location[]" multiple="">
											<option value="Indore" <?php if(isset($_GET['location']) && in_array('Indore',$_GET['location']) ) echo "selected";  ?> >Indore</option>
											<option value="Bhopal" <?php if(isset($_GET['location']) && in_array('Bhopal',$_GET['location']) ) echo "selected"; ?> >Bhopal</option>
											<option value="Ujjain" <?php if(isset($_GET['location']) && in_array('Ujjain',$_GET['location']) ) echo "selected"; ?> > Ujjain</option>
											<option value="Betul" <?php if(isset($_GET['location']) && in_array('Betul',$_GET['location']) ) echo "selected"; ?> > Betul</option>
											<option value="Dewas" <?php if(isset($_GET['location']) && in_array('Dewas',$_GET['location']) ) echo "selected"; ?> >Dewas</option>
											<option value="Gwalior" <?php if(isset($_GET['location']) && in_array('Gwalior',$_GET['location']) ) echo "selected"; ?> >Gwalior</option>
											<option value="Jablpur" <?php if(isset($_GET['location']) && in_array('Jablpur',$_GET['location']) ) echo "selected"; ?> >Jablpur</option>
											<option value="Sagar" <?php if(isset($_GET['location']) && in_array('Sagar',$_GET['location']) ) echo "selected"; ?> >Sagar</option>
										</select>
									</div>
								</div>
								<div class="filter_row select_box">
									<div class="f_heading">Position</div>
									<div class="f_content">
										<select class="selectpicker" name="position[]" multiple="">
											<option value="Php Developer" <?php if(isset($_GET['position']) && in_array('Php Developer',$_GET['position']) ) echo "selected";  ?> >Php Developer</option>
											<option value="Android Developer" <?php if(isset($_GET['position']) && in_array('Android Developer',$_GET['position']) ) echo "selected"; ?> >Android Developer</option>
											<option value="Angular Developer" <?php if(isset($_GET['position']) && in_array('Angular Developer',$_GET['position']) ) echo "selected"; ?> >Angular Developer</option>
											<option value="Web Designer" <?php if(isset($_GET['position']) && in_array('Web Designer',$_GET['position']) ) echo "selected"; ?>>Web Designer</option>
											<option value="Graphic Designer" <?php if(isset($_GET['position']) && in_array('Graphic Designer',$_GET['position']) ) echo "selected"; ?> >Graphic Designer</option>
										</select>
									</div>
								</div>
								<div class="filter_row select_box">	
									<div class="f_heading">Experience</div>
									<div class="f_content">
										<select class="selectpicker" name="experience[]" multiple="">
											<option value="Fresher" <?php if(isset($_GET['experience']) && in_array('Fresher',$_GET['experience']) ) echo "selected"; ?> >Fresher</option>
											<option value="1 Year" <?php if(isset($_GET['experience']) && in_array('1 Year',$_GET['experience']) ) echo "selected"; ?> >1 Year</option>
											<option value="2 Year" <?php if(isset($_GET['experience']) && in_array('2 Year',$_GET['experience']) ) echo "selected"; ?>>2 Year</option>
											<option value="3 Year" <?php if(isset($_GET['experience']) && in_array('3 Year',$_GET['experience']) ) echo "selected"; ?> >3 Year</option>
											<option value="4 Year" <?php if(isset($_GET['experience']) && in_array('4 Year',$_GET['experience']) ) echo "selected"; ?> >4 Year</option>
											<option value="5 Year" <?php if(isset($_GET['experience']) && in_array('5 Year',$_GET['experience']) ) echo "selected"; ?> >5 Year</option>
											<option value="6 Year" <?php if(isset($_GET['experience']) && in_array('6 Year',$_GET['experience']) ) echo "selected"; ?> >6 Year</option>
											<option value="7 Year" <?php if(isset($_GET['experience']) && in_array('7 Year',$_GET['experience']) ) echo "selected"; ?> >7 Year</option>
										</select>
									</div>
								</div>

								<div class="filter_row select_box">
									<div class="f_heading" name="ctc" value="<?php if(isset($_GET['ctc'])) { echo $_GET['ctc']; } ?>">Select CTC</div>
									<!-- <div class="f_heading" name="ctc" value="Select CTC" <?php if(isset($_GET['ctc']) && in_array('Select CTC',$_GET['ctc']) ) echo "selected"; ?> >Select CTC</div> -->
									<div class="f_content">
										<div class="range_wrap">
										 <!--  <label for="amount"></label> -->
										   <div class="ctc_range"></div>
										   <input type="text" id="amount" name="amount" readonly>
										</div>	
									</div>
									
								</div>
								<div class="form-group">
									<button type="submit" name="submi_search" class="btn btn-info">Search</button>
								</div>
							</div>
						</div>
						</form>
						<!-- sidebar End -->
						<!-- content area start -->
						<div class="search_content_area">
							<div class="search_content_inner">
								<div class="top_panel">
									<div class="left_heading">
										<h5>Search Resume</h5>
									</div>
								</div>
								<div class="row">
									
								<?php

								$rowperpage = 4;
								$rowcount = 0 ;

								if (isset($_POST['btn_prev'])) {
									
								 $rowcount = $_POST['rowcount'];
									$rowcount -= $rowperpage ;

										if ($rowcount < 0) {
											
										$rowcount = 0;
										}
									} 		
								

								if (isset($_POST['btn_next'])) {
							
									$rowcount = $_POST['rowcount'];
									$allcount = $_POST['allcount'];	
									
								$val = $rowcount + $rowperpage ;
									if ($val < $allcount) {
										
										$rowcount =$val;
									}
								}
							
							
							?>
 

							<?php 
							if($_GET){

								$sql = "SELECT COUNT(*) AS cntrows FROM resumes WHERE status = 1";
								$result = mysqli_query($conn,$sql);
								$res1 = mysqli_fetch_array($result);
								$allcount = $res1['cntrows'];

								$query = "SELECT * FROM  resumes WHERE status = 1 "; 
									
									if(isset($_GET['location'])){
										$location = implode("','",$_GET['location']);
										$query .= "AND location IN ('$location') ";	
									}

									if(isset($_GET['position'])){
										$position = implode("','",$_GET['position']);
										$query .= "AND position IN ('$position') ";	
									}

									if(isset($_GET['experience'])){
										$experience = implode("','",$_GET['experience']) ;
										$query .= "AND experience IN ('$experience') ";
									}

									if(isset($_GET['amount'])){
									  $ctc = ($_GET['amount']);
									  $ctc=explode('-',$ctc);
									  
									  $query .="AND ctc > $ctc[0] and ctc < $ctc[1]  ORDER BY ID ASC limit $rowcount,".$rowperpage;
								}

								//echo $query; die;
							}else{
								
								// count total no of row
								$sql = "SELECT COUNT(*) AS cntrows FROM resumes"; 
								$result = mysqli_query($conn,$sql);
								$res1 = mysqli_fetch_array($result);
								$allcount = $res1['cntrows'];

								$query="SELECT * FROM  resumes ORDER BY ID ASC limit $rowcount,".$rowperpage; 

							}
								
								 if ($res=mysqli_query($conn,$query)) {
								  	if ($num1=mysqli_num_rows($res) >0) {
								  		
								  		

								  	while ($row=mysqli_fetch_array($res)) 
								  	{ 
							?>

									<div class="col-md-6 col-12">
										<div class="white_box  resume_boxs">
											<div class="r_thumb">
												<img src="images/login/user_icon.png" alt="" class="img-fluid">
											</div>
											<div class="r_content">
												<h4> <?php echo $row['name'] ;?></h4>
												<div class="location_ctc">
													<span class="location"><?php echo $row['location'] ;?></span>
													<span class="ctc_r"><?php echo $row['ctc'] ;?></span>
												</div>
													<?php 
													
													

														$resume_id=$row['id'];

														$query1 = "SELECT * FROM view_detail WHERE user_id = '$user_id' AND resume_id = '$resume_id'";
														$res1=mysqli_query($conn,$query1);
														$num_row=mysqli_num_rows($res1);
												
												?>
												<div>

													<?php 


														$points = 0;
														$query2 = "SELECT * FROM user_points WHERE user_id = $user_id";
														$res2 = mysqli_query($conn,$query2);
														if ($num1=mysqli_num_rows($res2) >0){
											  				$row2 = mysqli_fetch_assoc($res2);	
											  				$points = $row2['points'];  	
														}

													 ?> 
													<?php if($num_row){ ?>
														<span class="view_span"><i class="far fa-eye"></i>viewed</span>
														<a href="candidate_detail.php?id=<?php echo base64_encode(base64_encode($row['id'])) ;?>" class="view_link">View more</a>
													<?php } ?>

													<?php if($points && $num_row == 0){ ?>
														<a href="candidate_detail.php?id=<?php echo base64_encode(base64_encode($row['id'])) ;?>" class="view_link">View more</a>
													<?php }else if($points == 0 && $num_row == 0) { ?>	
														<a class="view_link" onclick="alert('Your points is zero, Submit new resume to get more points')">View more</a>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
									<?php
	  		
	  		
								  		
								  	}
								  	
								  	mysqli_free_result($res);
								  }
								
							} else{
								  	echo "no record matching your query were found.";
								  }
							?>
									
									<!--  -->
								

								</div>
							</div>
						</div>
						<!-- content area End -->
						<form action="#" method="post">
									<div id="div_pagination"> 
										<input type="hidden" name="rowcount" value="<?php echo $rowcount; ?>">
										<input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
										<input type="submit" class="button" name="btn_prev" value="Previous">
										<input type="submit" class="button" name="btn_next" value="Next">
									</div>
								</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle area -->
	<!-- Footer start -->
	<?php include 'footer.php'; ?>
	<?php 
		$firstvalue=5000;
		$lastvalue= 7000;
	if(isset($_GET['amount'])){
		$amount=$_GET['amount']; 
		$amtarr=explode('-',$amount);
		$lastvalue = $amtarr[1];
		$firstvalue = $amtarr[0];
	}?>
	<script type="text/javascript">
		
		//ctc range slider
	$( ".ctc_range" ).slider({
		range: true,
		min: 5000,
		max: 25000,
		values: [ <?php echo $firstvalue; ?>, <?php echo $lastvalue; ?> ],
		slide: function( event, ui ) {
		$( "#amount" ).val( "" + ui.values[ 0 ] + " -" + ui.values[ 1 ] );
		}
	});
	$( "#amount" ).val( "" + $( ".ctc_range" ).slider( "values", 0 ) +
	" -" + $( ".ctc_range" ).slider( "values", 1 ) );
	</script>

	

		
		
	
		
