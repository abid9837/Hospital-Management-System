<?php
include "../../../../../conn.inc.php";



if($conn){
    echo "connected";

    $curentDate_for_payment = date("Y/m/d");

    $id = $_GET['id'];
    $admit_fee =$_POST['admit_fee'];
    $room_fee = $_POST['room_fee'];
    $OT_fee = $_POST['OT_fee'];
    $medicine_fee = $_POST['medicine_fee'];
    $extra_services_fee = $_POST['extra_services_fee'];
    $discount_in_fees = $_POST['discount_in_fees'];
    $bill_payed_now = $_POST['bill_payed'];
    if(empty($bill_payed_now)){
        $bill_payed_now = 0;
    }
    $discount_in_fees = $_POST['discount_in_fees'];
    if(empty($discount_in_fees)){
        $discount_in_fees = 0;
    }
    
    
    $update = $_POST['update'];



    // search for bill and update billl
    $search_sql = "SELECT * FROM `patient` WHERE id=$id";
    $search_query = mysqli_query($conn,$search_sql);
    $search_num_rows = mysqli_num_rows($search_query);
    $search_fetch_assoc = mysqli_fetch_assoc($search_query);

    // bill pay update 
    $bill_payed_before = $search_fetch_assoc['bill_payed'];
    $bill_payed = $bill_payed_before+$bill_payed_now;

    // check if patient paid some bills then update date otherwise update date with emty
    if($bill_payed<1){
        $curentDate_for_payment = "";
    }else{

    }
    
    
    
    

    if(isset($_POST['update'])){
        $sql = "UPDATE patient SET admit_fee = '$admit_fee', room_fee='$room_fee', OT_fee = '$OT_fee', medicine_fee = '$medicine_fee',discount_in_fees = '$discount_in_fees',
        extra_services_fee = '$extra_services_fee', discount_in_fees = '$discount_in_fees', bill_payed= '$bill_payed', bill_paid_date='$curentDate_for_payment' WHERE id = '$id'";
        $query = mysqli_query($conn,$sql);
        if($query){
            header("Location: http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Patient/Patient%20Bill%20Process.php");
        }
    }
    
}


?>