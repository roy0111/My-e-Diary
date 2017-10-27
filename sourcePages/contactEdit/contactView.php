

<?php 


   $product_Id = test_input_trimer($_SESSION["user_product_id"]);

   $fetchResult = fetchContactList($product_Id);

   //echo count($fetchResult);

   if(count($fetchResult)==0){
       echo '
           <div style="padding-top: 10%;" class="container">
       
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


					<div style="padding-top: 40px;" class="container">

					<table class="table">
					  <thead>
					    <tr >
					      <th style="text-align: center; width:40%;"><h3> Name</h3></th>
					      <th style="text-align: center; width:40%;"><h3>E-mail </h3></th>
					      <th style="text-align: center; width:20%;"><h3>Phone No</h3></th>
					    </tr>
					  </thead>

					  </table>';



for ($i=0; $i < count($fetchResult); $i++) { 


			  echo'<div style="padding-top: 6px; " class="container">

			    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="'."#view".$fetchResult[$i]["friend_pro_id"].'  "
			        style="background-color: #D8D8D8; height: 8%; border-radius: 15px; border:1;">

							<table class="table">
							    <tr >

								      <td scope="row" colspan="1" style="text-align: center;width:40%;">
								         <h5> '.$fetchResult[$i]["Full_name"].'</h5>
								       </td>
								      <td colspan="1" style="text-align: center;  width:40%;">
								         <h5>'.$fetchResult[$i]["user_mail"].' </h5>
								      </td>
								      <td colspan="1" style="text-align: center;width:20%;">
								         <h5>'."(+"."880".") ".$fetchResult[$i]["phone"].'</h5>

								      </td>
							    </tr>
							  </table>

			  </button>


			  <!-- Modal -->
			  <div class="modal fade" id="'."view".$fetchResult[$i]["friend_pro_id"].'" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal"></button>

			          <h2 class="modal-title" style="text-align: center;" >Details</h2>
			       </div>


			        <div class="modal-body">
			
							  <table class="table table-hover" style="width: 100%;">

							       
							    
							      <tr>
							          <td>
							                  <h4>Name</h4>
							          </td>
							          <td>
							                <h4> '.$fetchResult[$i]["Full_name"].'   </h4>
							          </td>
							      </tr>


							      <tr>
							          <td>
							                  <h4>Date Of Birth </h4>
							          </td>
							          <td>
							                <h4>  '.$fetchResult[$i]["address"].'    </h4>
							          </td>
							      </tr>

							      <tr>
							          <td>
							                  <h4>Division</h4>
							          </td>
							          <td>
							                <h4>  '.$fetchResult[$i]["division"].'     </h4>
							          </td>
							      </tr>


							      <tr>
							          <td>
							                  <h4>Gender </h4>
							          </td>
							          <td>
							                <h4>   '.$fetchResult[$i]["gender"].'   </h4>
							          </td>
							      </tr>

							            <tr>
							          <td>
							                  <h4>Religion</h4>
							          </td>
							          <td>
							                <h4>  '.$fetchResult[$i]["religion"].'   </h4>
							          </td>
							      </tr>

							      <tr>
							          <td>
							                  <h4>Blood Group </h4>
							          </td>
							          <td>
							                <h4>  '.$fetchResult[$i]["blood_group"].' </h4>
							          </td>
							      </tr>

							      <tr>
							          <td>
							                  <h4>Occupation </h4>
							          </td>
							          <td>
							                <h4>  '.$fetchResult[$i]["occupation"].' </h4>
							          </td>
							      </tr>

							  </table>

			        </div>



			        <div class="modal-footer">
							<table class="table">
							    <tr >
							      <th style="text-align: center;"> 
							         <button type="button"  class="btn btn-danger btn-lg" data-toggle="modal" data-target="'."#del".$fetchResult[$i]["friend_pro_id"].'">Delete</button>   <!--  myMod  =  del.id -->
							       </th>
							      <th style="text-align: center;"> 
							          <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">Close</button>
							       </th>
							    </tr>
							  </table>

			        </div>
			      </div>
			      
			    </div>
			  </div>




			  <!-- Delete Confirmation modal-->

			  <div class="modal fade" style="padding-top: 27%" id="'."del".$fetchResult[$i]["friend_pro_id"].'" role="dialog"> 
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
					onClick="window.location = \'contactEdit/deleteContact.php?id='.$fetchResult[$i]["friend_pro_id"].'\';"


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
