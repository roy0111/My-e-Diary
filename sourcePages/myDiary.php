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

    $heading = test_input_trimer($_POST["heading"]);
    $description = test_input_trimer($_POST["description"]);
    $emotion = test_input_trimer($_POST["emotion"]);


      $myItemProId = "MD".itemProductId();
      $myItemProId = test_input_trimer($myItemProId);

      $date = getTodayDateFunction();
      $date = test_input_trimer($date);

      $time = date("h:i:s");
      $time = test_input_trimer($time);

      if(addPost($user_pro_id,$myItemProId,$heading,$description,$emotion,$date,$time)){

         popupMsg("Success"," New Post Added.");
      }
      else{

      	popupMsg("Error","!!! Connection failed, Please try later.");
      }

     



  }


 ?>



<style type="text/css">
	body{
		 background-image: url( 'diaryPost/back.png');
     background-repeat: no-repeat;
     background-attachment: fixed;
     background-size: 100%;
	}

</style>





<!DOCTYPE html>
<html>
<head>
	<title>Notebook</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body>

<div class="container">


  <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal" style="background-color: #2BBBAD" >
  <span class="glyphicon glyphicon-plus"></span>Add Experience</button>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #64b5f6">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Account </h4>
        </div>
        <div class="modal-body">
          

         <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


         	<label> About</label>
         	<input type="text" class="form-control" name="heading" placeholder="enter what about" required minlength="3" maxlength="49"><br>

         	<label> Description</label>
         	<textarea  class="form-control" name = "description" placeholder = "Descrive your experience " required minlength="3" maxlength="499"></textarea><br>

         	     <label >Feelings :</label>
				      <select name="emotion" id="emotion" style="" >
				     
				      <option >Alone</option>
				      <option >Adventure</option>
				       <option >Alarmed</option>
				      <option >Anxious</option>
				      <option >Cool</option>
				      <option >Hot</option>
				      <option >Depressed</option>
				       <option >Naughty</option>
				      <option >Curious</option>
				      <option >Success</option>
				      <option >Danger</option>
				      <option >Joy</option>
				      <option >Surprise</option>
				      <option >Strange</option>
				      <option >Disgust</option>
				      <option >Love</option>
				      <option >Broke</option>
				      <option >Satisfied</option>
				     <option >confident</option>
				      <option >Close</option>
				      <option >Extrovert</option>
				      <option >Introvert</option>
				      <option >Hostile</option>
				      <option >Crushed</option>
				      <option >Restless</option>
				      <option >Pained</option>
				      <option >Happy</option>
				      <option >Sad</option>
				      <option >Lonely</option>
				      <option >Worried</option>
				      <option >Rejected</option>
				      <option >Nervous</option>
				      <option >Tortured</option>
				      <option >Hungry</option>
				      <option >Sleep</option>
				      <option >Hateful</option>
				      <option >Insulted</option>
				      <option >Powerless</option>
				      <option >Shy</option>

				    </select> <br><br>

           <button type="submit" class="btn btn-success btn-lg btn-block"  >Save</button>
         </form>


        </div>


        <div class="modal-footer" style="background-color: #64b5f6;">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>
      
    </div>
  </div>
  

</div>



<?php 

   include 'diaryPost/diaryInnerPage.php';
 ?>

