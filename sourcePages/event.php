

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

	function checkDateValidity($eventPostDate,$eventDate,$eventPostTime,$eventTime){

            if($eventPostDate >= $eventDate){
                 // popupMsg("Error"," New Post Added.");
		
            	if($eventPostTime > $eventTime){
                        return false;
            	}

            	
            }
         return true;
	}


	function convertDual($value){
		
		if($value<10){
			$value="0".$value;
		}
		return $value;
	}

?>




<?php 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {


      try {
  			

      $user_pro_id=  test_input_trimer($_SESSION["user_product_id"]);

      $description = test_input_trimer($_POST["description"]);
      $eventType = test_input_trimer($_POST["eventType"]);
      $venue = test_input_trimer($_POST["venue"]);

      $eventId = "EI".itemProductId();
      $eventId = test_input_trimer($eventId);

      $eventPostDate = getTodayDateFunction();
      $eventPostDate = test_input_trimer($eventPostDate);

      $eventPostTime = date("h:i:s");
      $eventPostTime = test_input_trimer($eventPostTime);


      $eventDate = test_input_trimer($_POST["year"]."-".convertDual($_POST["month"])."-".convertDual($_POST["day"]));
      $eventTime = test_input_trimer(convertDual($_POST["hour"]).":".convertDual($_POST["minute"]).":"."00");



       if(!checkDateValidity($eventPostDate,$eventDate,$eventPostTime,$eventTime)){
               popupMsg("Error","!!! Inputed Time and Date expired.");
       }

      
      else if(addEvent($user_pro_id,$eventId,$description,$venue,$eventType,$eventTime,$eventDate, 
      	       $eventPostTime,$eventPostDate)){

          popupMsg("Success"," New Post Added.");
       }
       else{

       	popupMsg("Error","!!! Connection failed, Please try later.");
       }



        } catch (Exception $e) {
  			popupMsg("Error","!!! Connection failed, Please try later.");
  		}

     



  }


 ?>





<style type="text/css">
	body{
		 background-image: url( 'eventShow/event.jpg');
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
<body >

<div class="container">


  <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal" style="background-color: #2BBBAD" >
  <span class="glyphicon glyphicon-plus"></span>Explore Event</button>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #64b5f6">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Event </h4>
        </div>
        <div class="modal-body">
          

         <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

 		     <div class="well">
         		<label> About</label>
         		<textarea type="text" class="form-control" name="description" placeholder="enter what About" required minlength="3" maxlength="199"></textarea><br>
             </div>

             <div  class="well">
	         	<label> Venue</label>
	         	<input  class="form-control" name = "venue" placeholder = "event place " required minlength="3" maxlength="49"><br>

			  </div>






  <div class="well"  >
       <label > Set Date (yyyy-mm-dd) ; Time (hh-mm)</label><br><br>
    <div class="row">
    <div class="col-sm-6">

  
        <select name="year"   >
          <?php 
             
            for ($i= date("Y"); $i<=2050 ; $i++) {   

                if ($year==$i) {
                       echo  '<option selected>'.$i.'</option>';
                     }     

                else{
                   echo  '<option >'.$i.'</option>';
                }
            }
           ?>
          </select>


          <select name="month"  >
          <?php


            for ($i=12; $i>=1 ; $i--) {        
               if ($month==$i) {
                       echo  '<option selected>'.$i.'</option>';
                     }     

                else{
                   echo  '<option >'.$i.'</option>';
                }

            }



           ?>

          </select>


          <select name="day" required >
          <?php 

            for ($i=31; $i>=1 ; $i--) {        
                if ($day==$i) {
                       echo  '<option selected>'.$i.'</option>';
                     }     

                else{
                   echo  '<option >'.$i.'</option>';
                }

            }
           ?>
          </select> 

        </div>



        	
       <div class="col-sm-6" style="align-items: center;">

  
        <select name="hour"   >
          <?php 

            for ($i=00; $i<=23 ; $i++) {   

                if ($hour==$i) {
                       echo  '<option selected>'.$i.'</option>';
                     }     

                else{
                   echo  '<option >'.$i.'</option>';
                }
            }
           ?>
          </select>


          <select name="minute"  >
          <?php 

            for ($i=0; $i<=59 ; $i=$i+5) {        
               if ($minute==$i) {
                       echo  '<option selected>'.$i.'</option>';
                     }     

                else{
                   echo  '<option >'.$i.'</option>';
                }

            }



           ?>

          </select>


        </div>
        </div>

      </div>

      <div class="well">
      	        <label >Type :</label>

				    <select name="eventType"  >
					  <option >Appointment</option>
					  <option >Audition</option>
					  <option >Banking</option>
				      <option >Billing</option>					  
				      <option >Break Time</option>
				      <option >Breakfast</option>
				      <option >Call</option>
				      <option >Class</option>
				      <option >Competition</option>
				      <option >Concert</option>
			          <option >Convocation</option>
			          <option >Cooking</option>
				      <option >Dating</option>
				      <option >Dinner</option>
				      <option >Driving</option>
				      <option >Exam</option>
				      <option >Excercise</option>
                      <option >Engagement</option>
                      <option >Gardening</option>    
                      <option >Gaming</option>                   
				      <option >Invitation</option>
				      <option >Medicine</option>
				      <option >Lonely</option>
				      <option >Lunch</option>
				      <option >Office Time</option>
				      <option >Party</option>
				      <option >Prayer</option>
				      <option >Prom</option>
	                  <option >Picnic</option>	
	                  <option >Reading</option>
	                  <option >Ride</option>
	                  <option >Social Activity</option>				      
				      <option >Study</option>
				      <option >Sports</option>
				      <option >Shopping</option>
				      <option >Sleep</option>
				      <option >Test</option>
				      <option >Tipping</option>
				      <option >Travel</option>
				      <option >Walking</option>
				      <option >Wake up</option>
				      <option >Writeing</option>
				      <option >Work</option>

				    </select> <br><br>
      </div>



   <div>

           <button type="submit" class="btn btn-success btn-lg btn-block"  >Confirm Event</button>
           </div>
      </form>


        </div>


        <div class="modal-footer" style="background-color: #64b5f6;">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>
      
    </div>
  </div>
  

</div>

</body>
</html>

<?php 

   include 'eventShow/show.php';
      include 'eventShow/todayPass.php';
  include 'eventShow/showUpcomingevent.php';
  include 'eventShow/passEvents.php';
?>
