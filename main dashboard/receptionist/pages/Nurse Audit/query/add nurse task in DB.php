<?php
include "../../../../../conn.inc.php";

if($conn){
   $task_date = date("Y/m/d");
   $task_user_img = $_POST['task_user_img'];
   $task_full_name = $_POST['task_full_name'];
   $task_reason = $_POST['task_reason'];
   $task_referring_by = $_POST['task_referring_by'];
   $task_Sex = $_POST['task_Sex'];
   $task_Blood_Group = $_POST['task_Blood_Group'];
   $task_Room_Number = $_POST['task_Room_Number'];
   $patient_uid = $_POST['patient_uid'];


   $task_sql = "INSERT INTO nurse_audit_tasks(task_full_name,task_referring_by,task_reason,task_Sex,task_Blood_Group,task_Room_Number,task_date,task_user_img,stauts,patient_uid) 
                VALUES('$task_full_name','$task_referring_by','$task_reason','$task_Sex','$task_Blood_Group','$task_Room_Number','$task_date','$task_user_img','active','$patient_uid') ";
   $task_query  = mysqli_query($conn,$task_sql);
   if($task_query){
     header("Location: http://localhost/my%20hospital/main%20dashboard/receptionist/pages/Nurse%20Audit/add%20task.php?task=1&patient_name=$task_full_name&patient_img=$task_user_img");
     die();
   }

   


}



?>