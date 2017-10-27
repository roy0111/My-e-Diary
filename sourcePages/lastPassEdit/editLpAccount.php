<?php
session_start();
 
 include '../../database_access/check_user_pdo.php';
?>



<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      try {

        $lp_pro_id = test_input_trimer($_SESSION["Lp_pro_id"]);
        $websiteName = test_input_trimer($_POST["websiteName"]);
        $userNameOrg = test_input_trimer($_POST["userNameOrg"]);
        $urlOrg = test_input_trimer($_POST["urlOrg"]);
        $passwordOrg = test_input_trimer($_POST["passwordOrg"]);
        $commitMsg = test_input_trimer($_POST["commitMsg"]);
        $date = test_input_trimer(getTodayDateFunction());


           if(updateLpAccountId($lp_pro_id,$websiteName,$userNameOrg,$urlOrg,$passwordOrg,$commitMsg,$date)){
              
           }
           else{
                echo '<script type="text/javascript">alert("!!! Error occurs. Try Later.");</script>';
           }

           $_SESSION["Lp_pro_id"] = 0;
          
           header('Location: ../lastPass.php');

      } catch (Exception $e) {
          echo $e." error occurs";
      }
}


?>



<?php 



   

  try {

	  if ($_SERVER["REQUEST_METHOD"] == "GET") {
	    	 $lp_pro_id = test_input_trimer($_GET['id']);
	    	 $fetchResult = fetchLpDataForEdit($lp_pro_id);

             $_SESSION["Lp_pro_id"] = $_GET['id'];  //include  lp_id int session

	  }



       $websiteName = $fetchResult['websiteName'];
       $userNameOrg = $fetchResult['userNameOrg'];
       $urlOrg = $fetchResult['urlOrg'];
       $passwordOrg = $fetchResult['passwordOrg'];
       $commitMsg = $fetchResult['commitMsg'];

       


    
  } catch (Exception $e) {
    echo $e.com_message_pump();
  }
  // $first_name,$year, $month, $day,$address,$city,$Zip,$division=0;
  // $gender,$blood_group,$religion,$occupation,$phone=0;
  // $dob=0;
 ?>






<!DOCTYPE html>
<html>
<head>
	<title>Edit LastPass </title>

	   <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script  src="../../js/bootstrap.js"></script>
	 <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
      <script  src="../../js/bootstrap.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
     <script  src="../../js/jquery-2.1.3.min.js"></script>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



</head>

<body class="container" style="margin-top: 2%; width: 50%">

  <div class="alert alert-primary" role="alert" >
   <div class="row" >
    <div style="text-align: left; height: 45px;" class="col-sm-2" >
      <button class=" glyphicon glyphicon-arrow-left " class="btn" onclick="location.href='../lastPass.php' " style="  width: 80px; height: 40px; color: black;"  data-toggle="tooltip" data-placement="bottom" title="Back"></button>
    </div>

    <div style="text-align: center; height: 45px;" class="col-sm-6" >
      <p style="font-size: 22px; color: black"><?php echo $_SESSION["user_mail_id"]; ?></p> 
    </div>
   </div>
  </div>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <div class="alert alert-success" style="height: 100%; text-align:center;">


  <div class="well">
     <label >Comapany Name: </label>

      <input type="text" class="form-control"  placeholder="Enter company name" name="websiteName" minlength="4" maxlength="19"      <?php  echo ' value="'.$websiteName.'"'?> > 
  </div>



    <div class="well">
     <label >User Name:</label>
      <input type="text" class="form-control"  placeholder="Enter user name" name="userNameOrg" minlength="3" maxlength="31"  <?php  echo ' value="'.$userNameOrg.'"'?>>
  </div>


   <div class="well">
     <label >Url:</label>
      <input type="text" class="form-control"  placeholder="Enter url" name="urlOrg"
       maxlength="31" minlength="3" <?php  echo ' value="'.$urlOrg.'"'?>>
   </div>

  <div class="well">
     <label >Password : </label>
      <input type="text" class="form-control" placeholder="Enter your password" name="passwordOrg" maxlength="31" minlength="3" <?php  echo ' value="'.$passwordOrg.'"'?>>
  </div>

  <div class="well">
     <label >Commmit Message : </label>
      <input type="text" class="form-control"  placeholder="Enter  Comment" name="commitMsg" maxlength="49" minlength="3" <?php  echo ' value="'.$commitMsg.'"'?>>
  </div>





 </div>

  <div class="alert alert-primary" role="alert" style="background-color:  #17202a  ;">
    <div  style="text-align: center;" >
      <button   class="btn btn-success"  style="height: 40px; width: 280px;"  data-toggle="tooltip" data-placement="bottom" title="Submit" ><span class="glyphicon glyphicon-saved"></span></button>
    </div>
  </div>


</form>



</body>
</html>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>