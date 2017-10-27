<?php 
session_start();
 
 include '../../database_access/check_user_pdo.php';

	 $MD_pro_id = test_input_trimer($_GET['id']);

	 $user_pro_id = test_input_trimer($_SESSION["user_product_id"]);

	deletePostMD($user_pro_id,$MD_pro_id);

	  header('Location: ../myDiary.php');
?>