<?php 
    session_start();
    include("./inc/header.php");
    include("./inc/conn.php");
?>

<!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="banner_content">
							<h2>
								Login Admin
							</h2>
							<?php
								if(isset($_POST['email']) && isset($_POST['password'])){
                                    if(!empty($_POST['email']) && !empty($_POST['password'])){
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];

                                        $sql_admin = "SELECT * FROM admin WHERE email = '".$email."'";
                                        $query_admin = mysqli_query($conn, $sql_admin);
                                        $num_rows = mysqli_num_rows($query_admin);
                                        if($num_rows > 0){
                                            $fetch_admin = mysqli_fetch_assoc($query_admin);
                                            if($password == $fetch_admin['password']){
                                                $_SESSION['admin_id'] = $fetch_admin['id'];
                                                header("location: ./admin/");
                                            }else{
                                                echo "<div style = 'text-align: left;'><p class = 'text-danger white_back'>Login Error.</p></div>";
                                            }
                                        }else{
                                            echo "<div style = 'text-align: left;'><p class = 'text-danger white_back'>Login Error.</p></div>";
                                        }
                                    }
                                }
							?>
							<div class="search_course_wrap">
								<form class="row contact_form" action="login.php" method="POST" id="contactForm" >
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
										</div>
										<div class="form-group">
											<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
										</div>
										
									</div>
									<div class="col-md-12 text-center">
										<button type="submit" value="submit" class="btn primary-btn">Login</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->
<?php include("./inc/footer.php")?>