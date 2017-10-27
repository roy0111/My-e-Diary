

<?php 


   $product_Id = test_input_trimer($_SESSION["user_product_id"]);
   $date = test_input_trimer(getTodayDateFunction());
   $time = test_input_trimer(date("h:i:s"));
   $fetchResult = fetchtodayPassEventList($product_Id,$date,$time);

   //echo count($fetchResult);
   if(!count($fetchResult)==0){
    
   

      echo '<!DOCTYPE html>
          <html>
          <head>

          </head>
          <body> 
           <div style="padding-top: 80px;" class="container">

              <div class="container"  style="background-color: #eeeeee ; border-radius: 15px;  text-align: left;">
                    <h1 ><i style="color: #FF8800; " class="fa fa-smile-o fa-2x "></i>
                      Passed Events on Today
                    </h1>

             </div>
             </div>
          <div class="container">';



for ($i=0; $i < count($fetchResult); $i++) { 


        echo'<div style="padding-top: 6px; " class="container">



          <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="'."#view".$fetchResult[$i]["eventId"].'  "
              style="background-color: #ffbb33; height: 8%; border-radius: 15px; border:1;">
            
 

              <table class="table">
                  <tr >

                      <td scope="row" colspan="1" style="text-align: center;width:20%;">
                       
                         <h5> at '.$fetchResult[$i]["eventTime"].' (passed)</h5>
                       </td>
                      <td scope="row" colspan="1" style="text-align: center;width:30%;">
                           <h3> '.$fetchResult[$i]["eventType"].'</h3>
                       </td>
                      <td colspan="1" style="text-align: center;  width:50%;">
                         <h3>Venue: '.$fetchResult[$i]["venue"].' </h3>

                      </td>

                  </tr>
                </table>



        </button>


        <!-- Modal -->
        <div class="modal fade" id="'."view".$fetchResult[$i]["eventId"].'" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="background-color: red;" >
                <button type="button" class="close" data-dismiss="modal"></button>

                <h2 class="modal-title" style="text-align: center;" >Details</h2>
             </div>


              <div class="modal-body">
      
                <table class="table table-hover" style="width: 100%;">

                     
                  
                    <tr>
                        <td>
                                <h4>Venue </h4>
                        </td>
                        <td>
                              <h4> '.$fetchResult[$i]["venue"].'   </h4>
                        </td>
                    </tr>


                    <tr>
                        <td>
                                <h4>Plan </h4>
                        </td>
                        <td>
                              <h4>  '.$fetchResult[$i]["eventType"].'    </h4>
                        </td>
                    </tr>

                    <tr>
                        <td>
                                <h4>Info </h4>
                        </td>
                        <td>
                              <h4>  '.$fetchResult[$i]["description"].'     </h4>
                        </td>
                    </tr>


                    <tr>
                        <td>
                                <h4>Event Date </h4>
                        </td>
                        <td>
                              <h4>   '.$fetchResult[$i]["eventDate"].'   </h4>
                        </td>
                    </tr>

                          <tr>
                        <td>
                                <h4>Event Time </h4>
                        </td>
                        <td>
                              <h4>  '.$fetchResult[$i]["eventTime"].'   </h4>
                        </td>
                    </tr>

                    <tr>
                        <td>
                                <h4>Post on </h4>
                        </td>
                        <td>
                              <h4>  '.$fetchResult[$i]["eventPostDate"].' </h4>
                        </td>
                    </tr>

                    <tr>
                        <td>
                                <h4>Posting Time </h4>
                        </td>
                        <td>
                              <h4>  '.$fetchResult[$i]["eventPostTime"].' </h4>
                        </td>
                    </tr>

                </table>

              </div>



              <div class="modal-footer">
              <table class="table">
                  <tr >
                    <th style="text-align: center;"> 
                       <button type="button"  class="btn btn-danger btn-lg" data-toggle="modal" data-target="'."#del".$fetchResult[$i]["eventId"].'">Delete</button>   
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

        <div class="modal fade" style="padding-top: 27%"  id="'."del".$fetchResult[$i]["eventId"].'" role="dialog"> 
          <div class="modal-dialog">
          
            <div class="modal-content">
              <div class="modal-header" style="background-color: #ff4444">
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
          onClick="window.location = \'eventShow/deleteEvent.php?id='.$fetchResult[$i]["eventId"].'\';"


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
