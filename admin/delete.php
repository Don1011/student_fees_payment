<?php
    include("./inc/conn.php");
    if(isset($_GET['fee_id'])){
        $fee_id = $_GET['fee_id'];
        $sql_delete = "DELETE FROM fee_type WHERE id = '".$fee_id."'";
        $query_delete = mysqli_query($conn, $sql_delete);
        header("location: fees_type.php");
    }elseif(isset($_GET['student_id'])){
        $student_id = $_GET['student_id'];
        $sql_delete = "DELETE FROM all_students WHERE id = '".$student_id."'";
        $query_delete = mysqli_query($conn, $sql_delete);
        header("location: index.php");
    }else{
        header("location: logout.php");
    }
?>  