<?php include("./inc/header.php")?>
<?php include("./inc/conn.php")?>
<!--================ Start Home Banner Area =================-->
<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row">
					<?php 
						$sql_get_student = "SELECT * FROM all_students WHERE id = '".$_GET['student_id']."'";
						$query_get_student = mysqli_query($conn, $sql_get_student);
						$fetch_get_student = mysqli_fetch_assoc($query_get_student);
					?>
					<div class="col-lg-6">
						<div class="banner_content">
							<img src="<?php echo ".".$fetch_get_student['passport']?>" alt="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="banner_content">
							<div class = "written_content">
                                <b>Student Name: </b>  <?php echo $fetch_get_student['student_fullname']?><br><br>
                                <b>Student Email: </b> <?php echo $fetch_get_student['student_email']?> <br><br>
                                <b>Student Guardian Name: </b> <?php echo $fetch_get_student['student_guardian']?> <br><br>
                                <b>Student Class: </b> <?php echo $fetch_get_student['class']?> 
                                <hr>
								<?php 
									$sql_fees = "SELECT * FROM fee_type";
									$query_fees = mysqli_query($conn, $sql_fees);
									
									$sql_check_payment = "SELECT * FROM payments WHERE student_id = '".$fetch_get_student['id']."'";
									$query_check_payment = mysqli_query($conn, $sql_check_payment);
									$num_rows = mysqli_num_rows($query_check_payment);
									if($num_rows > 0):
										while($fetch_check_payment = mysqli_fetch_assoc($query_check_payment)):
								?>
                                			<b><?php echo $fetch_check_payment['fee_title']?>: </b> Paid <br><br>
								<?php
										endwhile;
									else: 
										echo "<b> This student has not paid any fee </b><br>";
									endif;
								?>
                            </div>
						</div>
					</div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a type="submit" href="delete.php?student_id=<?php echo $fetch_get_student['id']?>" value="submit" class="btn primary-btn"> <span style = "color: #fff">Delete Student Data</span> </a>
                    </div>
                    
				</div>
			</div>
		</div>
    </section>
    
	<!--================ End Home Banner Area =================-->

<?php include("./inc/footer.php")?>