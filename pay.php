<?php 
    include("./inc/header.php");
    include("./inc/conn.php");
    
?>
    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-4">
                        <?php
                            $fee_id = $_GET['fee_id'];
                            $sql_fee_details = "SELECT * FROM fee_type WHERE id = '".$fee_id."'";
                            $query_fee_datails = mysqli_query($conn, $sql_fee_details);
                            $fetch_fee_details = mysqli_fetch_assoc($query_fee_datails);
                                                        
                        ?>
                        <form class="row contact_form" action="save_payment.php" method="POST" id="contactForm"
                            novalidate="novalidate">
                            <div class="col-md-12">
                                <input type="hidden" name="student_id" value="<?php echo $_GET['student_id']?>">
                                <input type="hidden" name="fee_id" value="<?php echo $_GET['fee_id']?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Card Number">
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="email" class="form-control" id="card_expiry" name="card_expiry" placeholder="Card Expiry">
                                    </div>
                                    <div class="form-group col-6">
                                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" value="submit" class="btn primary-btn">Pay NGN<?php echo $fetch_fee_details['amount']?></button>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->
<?php include("./inc/footer.php")?>