<?php 
    session_start();
    include_once "connect.php";
    $admin_id = $_SESSION['admin_id'];
    date_default_timezone_set('Asia/Manila');
				$time = date('H:i:s');
    mysqli_query($conn, "INSERT INTO activity_log(admin_id,activity_description,activity_date,activity_time) VALUES($admin_id,'Logout',CURRENT_TIMESTAMP,'$time')");

    session_unset();
    session_destroy();
    header("Location: ../../DashboardAuthentication/Login UI v2/html/AdminLogin.php");
?>