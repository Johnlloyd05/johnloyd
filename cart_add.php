<?php
	require 'session.php';
    require 'db.php';
    //require 'header.php';
    confirm_login();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $add_to_cart_query="insert into users_items(user_id,item_id,status) values ('$user_id','$item_id','Added to cart')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    echo "<script> location.href='product.php'; </script>";
					exit();
?>