<?php
include("connection/connect.php"); //connection to db
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM adv_orders WHERE a_id = '".$_GET['order_del']."'"); 
header("location:your_adv_orders.php"); 

?>
