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


    $user_pro_id=  test_input_trimer($_SESSION["user_product_id"]);

    $websiteName = test_input_trimer($_POST["websiteName"]);
    $userNameOrg = test_input_trimer($_POST["userNameOrg"]);
    $urlOrg = test_input_trimer($_POST["urlOrg"]);
    $passwordOrg = test_input_trimer($_POST["passwordOrg"]);  
    $commitMsg = test_input_trimer($_POST["commitMsg"]);

      $lpItemProId = "LP".itemProductId();
      $lpItemProId = test_input_trimer($lpItemProId);

      $date = getTodayDateFunction();
      $date = test_input_trimer($date);

      if(addLPAccount($user_pro_id,$lpItemProId,$websiteName,$userNameOrg,$urlOrg,$passwordOrg,
      	   $commitMsg,$date)){

         popupMsg("Success"," New Account Added.");
      }
      else{

      	popupMsg("Error","!!! Connection failed, Please try later.");
      }

     



  }


 ?>









<!DOCTYPE html>
<html>
<head>
	<title>LastPass</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body>

<div class="container">


  <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal"  >
  <span class="glyphicon glyphicon-plus"></span>Add New</button>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #FF8800">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Account </h4>
        </div>
        <div class="modal-body">
          

         <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

         	<label> Website Name</label>
         	<input type="text" class="form-control" name="websiteName" placeholder="enter Website Name (Facebook, google etc.) " required minlength="4" maxlength="19"><br>


         	<label> user name</label>
         	<input type="text" class="form-control" name="userNameOrg" placeholder="enter user Name" required minlength="3" maxlength="31"><br>

         	 <label> url</label>
         	<input type="text" class="form-control" name="urlOrg" placeholder="enter url (http://fontawesome.io/icons/)" required minlength="3" maxlength="31"><br>

         	 <label> Password</label>
         	<input type="text" class="form-control" name="passwordOrg" placeholder="enter password" required minlength="3" maxlength="31"><br>

         	<label> Commit</label>
         	<textarea  class="form-control" name = "commitMsg" placeholder = "Commit About It" required minlength="3" maxlength="49"></textarea><br>

           <button type="submit" class="btn btn-success btn-lg btn-block"  >Confirm</button>
         </form>


        </div>


        <div class="modal-footer" style="background-color: #FF8800;">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>
      
    </div>
  </div>
  

</div>

<?php 
include 'lastPassEdit/lpEdit.php';

 ?>



</body>
</html>
