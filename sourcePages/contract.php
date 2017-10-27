<?php 
  include '../includes/header.php';
  include '../database_access/check_user_pdo.php';
 session_start();

?>

<?php
    function popupMsg($messageType,$messageText){

    	if ($messageType=='Error') {
    		$color='#FA5858';
    	}
    	else{
         $color='#58FAAC';

    	}
echo '


  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header"  style="background-color:'.$color.';>
          <h2 class="modal-title"">'.$messageType.'</h2>
        </div>
        <div class="modal-body">
          <p><strong>'.$messageText.'</strong></p>
        </div>
      </div>
      
    </div>
  </div>

 
<script>
$(document).ready(function(){
    // Show the Modal on load
    $("#myModal1").modal("show");

    
});
</script>';

  }
  ?>

<?php 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $user_mail_id =  test_input_trimer($_SESSION["user_mail_id"]);
    $user_pro_id=  test_input_trimer($_SESSION["user_product_id"]);

    $frnd_mail_id = test_input_trimer($_POST["frnd_mail_id"]);
    $frnd_product_id = test_input_trimer($_POST["frnd_product_id"]);


    

     if(strcmp($user_mail_id,$frnd_mail_id)==0){
         popupMsg("Error","!!! How could you be your friend.");
     }
     elseif (isAlreadyInList($user_pro_id,$frnd_product_id)) {
     	
     	popupMsg("Error","!!! Already is in List.");
     }
     elseif (checkFrienIdAvailAbility($frnd_product_id,$frnd_mail_id)) {

     	 addContractFunction($user_pro_id,$frnd_product_id);  
     	 popupMsg("Success"," New Contract Added.");
     }
     else{
        popupMsg("Error","!!! Invalid Input or Not Available.");

     }

  }


 ?>









<!DOCTYPE html>
<html>
<head>
	<title>Contacts</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body>

<div class="container">


  <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" style="background-color: black;" >
  <span class="glyphicon glyphicon-plus"></span>Add New</button>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Contact </h4>
        </div>
        <div class="modal-body">
          

         <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         	<label> Product Id</label>
         	<input type="text" class="form-control" name="frnd_product_id" placeholder="enter friend's product id " required><br>
         	<label> Mail Id</label>
         	<input type="text" class="form-control"  name="frnd_mail_id" placeholder="enter friend's mail id " required><br>
           <button type="submit" class="btn btn-success btn-lg btn-block"  >Confirm</button>
         </form>


        </div>


        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>
      
    </div>
  </div>
  

</div>

<?php include 'contactEdit/contactView.php'

  ?>



</body>
</html>
