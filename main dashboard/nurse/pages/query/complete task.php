<?php
include "../../../../conn.inc.php";
session_start();

$ID = $_GET['id'];
$nurse_name = $_SESSION["UserName_employ"];
$current_date = date("Y/m/d");
$sql = "UPDATE nurse_audit_tasks SET stauts = 'complete', complete_task_date = '$current_date', task_complete_by_nurse_name ='$nurse_name'  WHERE id = $ID";
$query = mysqli_query($conn,$sql);
if($query){
    header('Location: http://localhost/my%20hospital/main%20dashboard/nurse/pages/all%20task.php');
    die();
}


?>