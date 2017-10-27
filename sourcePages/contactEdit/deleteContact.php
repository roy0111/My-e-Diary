<?php 
session_start();
 
 include '../../database_access/check_user_pdo.php';

	$friend_id = test_input_trimer($_GET['id']);

	$user_id = test_input_trimer($_SESSION["user_product_id"]);

	deleteContact($user_id,$friend_id);


	  header('Location: ../contract.php');
?>