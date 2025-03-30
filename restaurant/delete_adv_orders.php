<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM adv_orders WHERE a_id = '".$_GET['order_del']."'");
header("location:all_advorders.php");  

?>
