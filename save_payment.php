<?php
    include("./inc/conn.php");
    $date = date("Y-m-d");
    $student_id = $_POST['student_id'];
    $fee_id = $_POST['fee_id'];

    $sql_fee_details = "SELECT * FROM fee_type WHERE id = '".$fee_id."'";
    $query_fee_datails = mysqli_query($conn, $sql_fee_details);
    $fetch_fee_details = mysqli_fetch_assoc($query_fee_datails);

    $fee_title = $fetch_fee_details['title'];
    $fee_amount = $fetch_fee_details['amount'];

    // To save the payment data to the database
    $sql_save_payment = "INSERT INTO payments(student_id, fee_type_id, fee_title, fee_amount, date) VALUES('".$student_id."', '".$fee_id."', '".$fee_title."', '".$fee_amount."', '".$date."')";
    $query_save_payment = mysqli_query($conn, $sql_save_payment);

    // redirect back to home page
    header("location: index.php");

?>