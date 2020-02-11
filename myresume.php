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

	<div class="search_content_area">
		<div class="search_content_inner">
			<div class="top_panel">
				<div class="left_heading">
					<h5>My Resume</h5>
				</div>
			</div>
		<div class="row">
		
		<?PHP 
										
					//$resume_id=$row['id'];

		$query1 = "SELECT * FROM resumes WHERE user_id = '$user_id'";  
		$res1=mysqli_query($conn,$query1);
		$row=mysqli_num_rows($res1);

		?>							
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
			
				
			
								
				$sql = "SELECT COUNT(*) AS cntrows FROM resumes WHERE user_id='$user_id'";       
				$result = mysqli_query($conn,$sql);
				$res1 = mysqli_fetch_array($result);
				$allrow = $res1['cntrows']; 			// count total no of row
				

				$query1 ="SELECT * FROM  resumes WHERE user_id='$user_id' ORDER BY ID ASC limit $rowcount,".$rowperpage; 
				
			
								
				if ($res=mysqli_query($conn,$query1)) {
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
							
							<div>

													
							<?php if($row){ ?>
							
								<a href="view_detail.php?id=<?php echo base64_encode(base64_encode($row['id'])) ;?>" class="view_span">View</a>
								<a href="edit_resume.php?id=<?php echo base64_encode(base64_encode($row['id'])) ;?>" class="view_link">Edit</a>
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
							<form action="#" method="post">
							<div id="div_pagination" style="text-align: center; margin-bottom: 17px;" > 
								<input type="hidden" name="rowcount" value="<?php echo $rowcount; ?>">
								<input type="hidden" name="allcount" value="<?php echo $allrow; ?>">
								<input type="submit" class="button" name="btn_prev" value="Previous">
								<input type="submit" class="button" name="btn_next" value="Next">
							</div>
							</form>
						</div>
						

					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>