<?php 
session_start();
 
 include '../../database_access/check_user_pdo.php';

	$eventId = test_input_trimer($_GET['id']);

	$user_id = test_input_trimer($_SESSION["user_product_id"]);

	deleteEvent($user_id,$eventId);


	  header('Location: ../event.php');
?>