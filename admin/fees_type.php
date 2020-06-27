<?php include("./inc/header.php")?>
<?php include("./inc/conn.php")?>
<!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Fees Types</h2>
                            <p>
                                See a list of available fees types and delete the ones you think are no more needed on the platform.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
            <?php
                if(isset($_POST['title']) && isset($_POST['amount']) && isset($_POST['start_date']) && isset($_POST['deadline_date'])){
                    if(!empty($_POST['title']) && !empty($_POST['amount']) && !empty($_POST['start_date']) && !empty($_POST['deadline_date'])){
                        $title = $_POST['title'];
                        $amount = $_POST['amount'];
                        $start_date = $_POST['start_date'];
                        $deadline_date = $_POST['deadline_date'];

                        $sql_add_fee = "INSERT INTO fee_type(title, amount, start_date, deadline_date) VALUES('".$title."', '".$amount."', '".$start_date."', '".$deadline_date."')";
                        $query_add_fee = mysqli_query($conn, $sql_add_fee);

                        header("location: fees_type.php");
                    }else{
                        echo "<div style = 'text-align: left;'><p class = 'text-danger'>Finish filling the form before submitting</p></div>";
                    }
                }
            ?>
            <div class="row">
                <div class="col-lg-3">
                    <h3>List of fees types</h3>
                    <div class="contact_info">
                        <?php
                            $sql_fee_type = "SELECT * FROM fee_type";
                            $query_fee_type = mysqli_query($conn, $sql_fee_type);
                            while($fetch_fee_type = mysqli_fetch_assoc($query_fee_type)):
                        ?>
                        <div class="info_item">
                            <p>
                                
                                <div class = "row">
                                    <div class="col-1">
                                        <a href = "delete.php?fee_id=<?php echo $fetch_fee_type['id']?>"><button class="lnr lnr-trash delete_button"></button></a>
                                    </div>
                                    <div class="col-11">
                                        <h6><?php echo $fetch_fee_type['title']?></h6>
                                        <div class = "small">
                                            <ul>
                                                <li class = "fee_sub_list"><b>Amount: </b><?php echo $fetch_fee_type['amount']?></li>
                                                <li class = "fee_sub_list"><b>Start Date: </b><?php echo $fetch_fee_type['start_date']?></li>
                                                <li class = "fee_sub_list"><b>Deadline Date: </b><?php echo $fetch_fee_type['deadline_date']?></li>
                                            </ul>
                                        </div>
                                    </div>                                        
                                </div>
                            </p>
                        </div>
                        <?php
                            endwhile;
                        ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="fees_type.php" method="POST" id="contactForm">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="title">Fee Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Fee Title">
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Fee Amount">
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter Start Date">
                            </div>
                            <div class="form-group">
                                <label for="deadline_date">Deadline Date</label>
                                <input type="date" class="form-control" id="deadline_date" name="deadline_date" placeholder="Enter Deadline Date">
                            </div>
                        </div>
                        <div class="col-md-10 text-center">
                            <button type="submit" value="submit" class="btn primary-btn">Add Fee Type</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->
<?php include("./inc/footer.php")?>