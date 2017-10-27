<?php 
session_start();
 
 include '../../database_access/check_user_pdo.php';

	$lp_pro_id = test_input_trimer($_GET['id']);

	$user_pro_id = test_input_trimer($_SESSION["user_product_id"]);

	deleteLpAccount($user_pro_id,$lp_pro_id);

	  header('Location: ../lastPass.php');
?>