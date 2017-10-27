

<?php 


   $product_Id = test_input_trimer($_SESSION["user_product_id"]);

   $fetchResult = fetchLPList($product_Id);

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
					      <th style="text-align: center; width:40%; "><h3> organization</h3></th>
					      <th style="text-align: center; width:40%; "><h3>User name </h3></th>
					      <th style="text-align: center; width:20%;"><h3>Date</h3></th>
					    </tr>
					  </thead>
					  </table>';



for ($i=0; $i < count($fetchResult); $i++) { 


			  echo'<div style="padding-top: 6px; " class="container">

			    <button  class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="'."#view".$fetchResult[$i]["lpId"].'  "
			        style="background-color: #ffb74d; height: 8%; border-radius: 15px; ">

							<table class="table" >
							    <tr >
								      <td scope="row" colspan="1" style="text-align: center; width:40%;">
								         <h5> '.$fetchResult[$i]["websiteName"].'</h5>
								       </td>
								      <td colspan="1" style="text-align: center;  width:40%; ">
								         <h5>'.$fetchResult[$i]["userNameOrg"].' </h5>
								      </td>
								      <td colspan="1" style="text-align: center;width:20%;">
								         <h5>'.$fetchResult[$i]["updateDate"].'</h5>

								      </td>
							    </tr>
							  </table>

			  </button>


			  <!-- Modal -->
			  <div class="modal fade" id="'."view".$fetchResult[$i]["lpId"].'" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header" style=" background-color: #FF8800;">
			          <button type="button" class="close" data-dismiss="modal"></button>

			          <h2 class="modal-title"  style="text-align: center;" >Account Details</h2>
			       </div>


			        <div class="modal-body">
			
							  <table class="table table-hover" style="width: 100%;">

							       
							    
							      <tr>
							          <td>
							                  <h4>Company/ Org.: </h4>
							          </td>
							          <td>
							                <p> '.$fetchResult[$i]["websiteName"].'   </p>
							          </td>
							      </tr>


							      <tr>
							          <td>
							                  <h4>User Name: </h4>
							          </td>
							          <td>
							                <p>  '.$fetchResult[$i]["userNameOrg"].'    </p>
							          </td>
							      </tr>

							      <tr>
							          <td>
							                  <h4>Url : </h4>
							          </td>
							          <td>
							                <p>  '.$fetchResult[$i]["urlOrg"].'     </p>
							          </td>
							      </tr>


							      <tr>
							          <td>
							                  <p>Password : </p>
							          </td>
							          <td>
							                <p>   '.$fetchResult[$i]["passwordOrg"].'   </p>
							          </td>
							      </tr>

							            <tr>
							          <td>
							                  <h4>Commit Text : </h4>
							          </td>
							          <td>
							                <p>  '.$fetchResult[$i]["commitMsg"].'   </p>
							          </td>
							      </tr>

							      <tr>
							          <td>
							                  <h4>Last update : </h4>
							          </td>
							          <td>
							                <p>  '.$fetchResult[$i]["updateDate"].' </p>
							          </td>
							      </tr>


							  </table>

			        </div>



			        <div class="modal-footer">
							<table class="table">
							    <tr >
							      <th style="text-align: center;"> 
							         <button type="button"  class="btn btn-danger btn-lg" data-toggle="modal" data-target="'."#del".$fetchResult[$i]["lpId"].'">Delete</button>  
							       </th>
							      
							<th style="text-align: center;"> 

								<button type="button" style="width: 45%" class="btn btn-warning btn-lg" data-toggle="modal" 
								onClick="window.location = \'lastPassEdit/editLpAccount.php?id='.$fetchResult[$i]["lpId"].'\';"
								  > Edit </button>  
							       </th>
							    </tr>
							  </table>

			        </div>
			      </div>
			      
			    </div>
			  </div>




			  <!-- Delete Confirmation modal-->

			  <div class="modal fade" style="padding-top: 27%" id="'."del".$fetchResult[$i]["lpId"].'" role="dialog"> 
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
					onClick="window.location = \'lastPassEdit/deleteLpAccount.php?id='.$fetchResult[$i]["lpId"].'\';"


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
