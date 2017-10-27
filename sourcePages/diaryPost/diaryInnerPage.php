
<?php
  function colorFunction($emotion){
     if($emotion=='Pained' || $emotion=='Hot' || $emotion=='Naughty' || $emotion=='Depressed'
     	 || $emotion=='Anxious' ||$emotion=='Worried' ||$emotion=='Alarmed'){
     	return '#e53935';
     }
      else if($emotion=='Joy' || $emotion=='Happy'|| $emotion=='Satisfied'  ){
     	return '#fff176';
     }
     else if($emotion=='Love' || $emotion=='Crushed' ||$emotion=='Close' ){
     	return '#ffb74d';
     }
     
     else if($emotion=='Powerless' || $emotion=='Sleep' ||$emotion=='Lonely' || $emotion=='Sad' 
     	   ||$emotion=='Broke' ||$emotion=='Anxious' || $emotion=='Rejected'  ){
     	return '#bdbdbd ';
     }

     else if($emotion=='Hostile' || $emotion=='Disgust' || $emotion=='Danger' ||$emotion=='Hateful' || 
        $emotion=='Pained' ){
     	return '#ff1744 ';
     }
     else if($emotion=='confident' || $emotion=='Strange' ||$emotion=='Surprise' ||$emotion=='Adventure'  ){
     	return '#8bc34a ';
     }
     else{

     	return '#b2dfdb';
     }

  }
?>

<!DOCTYPE html>
<html>


<head>
	<title>my Diary</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body>


<!-- 
<?php 
 
  //$getTodayDate = getTodayDateFunction();

  //$getTodayDate = test_input_trimer($getTodayDate);

  ?> -->




  <?php  

  $product_id = test_input_trimer($_SESSION["user_product_id"]);
 


   $fetchResult = diaryPostFetch($product_id);


   if(count($fetchResult)==0 ){
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
              
              $color = colorFunction($fetchResult[$i]["emotion"]);

			  echo'<div style="padding-top: 6px; " class="container">

			    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="'."#view".$i.'  "
			        style="background-color: '.$color.'; height: 12%; border-radius: 15px; border:1;">

						<table class="table">
						   <tr >
							     <h3 style="color: black; text-align: left">'.$fetchResult[$i]["heading"].' </h3>
							      
						    </tr>
							   <tr >
							     <p style="color: black;">'.$fetchResult[$i]["description"].' </p>
						    </tr>
						  </table>
			  </button>


			  <!-- Modal -->
			  <div  class="modal fade" id="'."view".$i.'" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
				       <div class="modal-header" style="background-color:'.$color.' ;">

				       	<p style="text-align: center;" >  '.$fetchResult[$i]["postDate"]."  ".$fetchResult[$i]["postTime"].' </p>
				          <h4 class="modal-title" style="text-align: center;" >'.$fetchResult[$i]["heading"].'</h4>
 							

				        </div>


			           <div class="modal-body">

                          <p style="text-align: center;" >'.$fetchResult[$i]["description"].'</p>
			            </div>



			        <div class="modal-footer">
							<table class="table">
							    <tr >
							      <th style="text-align: center;"> 
							         <button type="button"  class="btn btn-danger btn-lg" data-toggle="modal" data-target="'."#del".$i.'">Delete</button>  
							       </th>
							      
							<th style="text-align: center;"> 

								<button type="button" style="width: 45%" class="btn btn-warning btn-lg" data-toggle="modal" 
								onClick="window.location = \'diaryPost/postAccEditPage.php?id='.$fetchResult[$i]["diaryPostId"].'\';"
								  > Edit </button>  
							       </th>
							    </tr>
							  </table>

			        </div>
			      </div>
			      
			    </div>
			  </div>




			  <!-- Delete Confirmation modal-->

			  <div class="modal fade" style="padding-top: 9%" id="'."del".$i.'" role="dialog"> 
			    <div class="modal-dialog">
			    
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal"></button>
			          <h2 class="modal-title" style="text-align: center;">Delete Confirmation</h2>
			        </div>

			        <div class="modal-body">

			            <h4 style="text-align: center;color: red">Do you want to delete it permanently? </h4>

							<table class="table">
							    <tr >
							      <th style="text-align: center;"> 
							         <button type="button" style="width : 35%" class="btn btn-info btn-lg" data-dismiss="modal">No</button>  
							       </th>
							      <th style="text-align: center;"> 
					<button type="button" style="width : 35%" class="btn btn-info btn-lg" 
					data-toggle="modal" 
					onClick="window.location = \'diaryPost/postAccDeletePage.php?id='.$fetchResult[$i]["diaryPostId"].'\';"

							         >Yes</button>  
							       </th>
							    </tr>
							  </table>

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