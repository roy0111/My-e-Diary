<?php 
  include '../includes/header.php';
  include '../database_access/check_user_pdo.php';
 session_start();

?>

<style type="text/css">
	body{
		 background-image: url( 'eventShow/event.jpg');
	}

</style>


<!DOCTYPE html>
<html>


<head>
	<title>What's Today</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body>



<?php 
 
  $getTodayDate = getTodayDateFunction();

  $getTodayDate = test_input_trimer($getTodayDate);

  ?>




  <?php  

  $user_mail = $_SESSION["user_mail_id"];
  $user_mail = test_input_trimer($user_mail);
  $flag=0;
  
      if(isUserBirthDay($getTodayDate,$user_mail)){
         $flag++;


         echo '<div style="padding-top: 1%;" class="container">
       
					<div class="alert " style="text-align:center;background-color:#ffa726;">

					  <h1 class="glyphicon glyphicon-gift"></h1>
					  <h2><strong> Happy Birthday To you</strong></h2>
					</div>

	     	</div>'; 



      }
      if (isUserRegDay($getTodayDate,$user_mail)) {
      	$flag++;

         echo '<div style="padding-top: 1%;" class="container">
       
					<div class="alert alert-info" style="text-align:center;">

					  <h1 class="fa fa-id-card" style="font-size:30px"> </h1>
					  
					  <h2 ><strong> Cheers! Today is your membership Anniversary.</strong></h2>
					</div>

	     	</div>'; 

      }

  ?>



  <?php

   $fetchResult = todayList($getTodayDate);


   if(count($fetchResult)==0 && $flag==0){
       echo '
           <div style="padding-top: 7%;" class="container">
       
					<div class="alert alert-danger" style="text-align:center;">

					  <h1 class="glyphicon glyphicon-remove-sign"></h1>
					  <h2><strong> No Record !</strong></h2>
					</div>

	     	</div>';    
   }


   else{
			echo '<!DOCTYPE html>
					<html>
					<head>

					</head>
					<body>

					 <div style="padding-top: 40px;" class="container">';



for ($i=0; $i < count($fetchResult); $i++) { 


			  echo'<div style="padding-top: 6px; " class="container">

			    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="'."#view".$i.'  "
			        style="background-color: #d4e157; height: 12%; border-radius: 15px; border:1;">

						<table class="table">
						   <tr >
							     <h3 style="color: black;">'.$fetchResult[$i]["headings"].' </h3>
							      
						    </tr>
						  </table>
			  </button>


			  <!-- Modal -->
			  <div  class="modal fade" id="'."view".$i.'" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
				       <div class="modal-header" style="background-color:'.$fetchResult[$i]["colorChoice"].' ;">

				          <h4 class="modal-title" style="text-align: center;" >'.$fetchResult[$i]["headings"].'</h4>


				        </div>


			           <div class="modal-body">

                          <p style="text-align: center;" >'.$fetchResult[$i]["description"].'</p>
			            </div>



			        <div class="modal-footer"  style="background-color:#a5d6a7 ;">
                              <p style="text-align: center;" >  '.$fetchResult[$i]["eventDate"].' </p>
			        </div>  


			      </div>
			      
			    </div>
			  </div>

             </div> 
			';



	# code...
}
            echo '</div> 
				</body>
				</html>
			';

   }
?>


</body>
</html>