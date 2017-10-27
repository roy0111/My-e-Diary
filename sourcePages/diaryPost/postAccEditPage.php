<?php
session_start();
 
 include '../../database_access/check_user_pdo.php';
?>



<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      try {

        $MD_pro_id = test_input_trimer($_SESSION["MD_pro_id"]);
        $heading = test_input_trimer($_POST["heading"]);
        $description = test_input_trimer($_POST["description"]);

        $emotion = test_input_trimer($_POST["emotion"]);


           if(updateMDPostAccount($MD_pro_id,$heading,$description,$emotion)){
              
           }
           else{
                echo '<script type="text/javascript">alert("!!! Error occurs. Try Later.");</script>';
           }

           $_SESSION["MD_pro_id"] = 0;
          
           header('Location: ../myDiary.php');

      } catch (Exception $e) {
          echo $e." error occurs";
      }
}


?>



<?php 



   

  try {

	  if ($_SERVER["REQUEST_METHOD"] == "GET") {
	    	 $MD_pro_id = test_input_trimer($_GET['id']);
	    	 $fetchResult = fetchMdPostDataForEdit($MD_pro_id);

             $_SESSION["MD_pro_id"] = $_GET['id'];  //include  lp_id int session

	  }



       $heading = $fetchResult['heading'];
       $description = $fetchResult['description'];
       $emotion = $fetchResult['emotion'];


  

    
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
	<title>Edit Post </title>

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
      <button class=" glyphicon glyphicon-arrow-left " class="btn" onclick="location.href='../myDiary.php' " style="  width: 80px; height: 40px; color: black;"  data-toggle="tooltip" data-placement="bottom" title="Back"></button>
    </div>

    <div style="text-align: center; height: 45px;" class="col-sm-6" >
      <p style="font-size: 22px; color: black"><?php echo $_SESSION["user_mail_id"]; ?></p> 
    </div>
   </div>
  </div>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <div class="alert alert-success" style="height: 50%; text-align:center;">


  <div class="well">
     <label >Heading  </label>

      <input type="text" class="form-control"  placeholder="Enter Heading" name="heading" minlength="4" maxlength="49" <?php  echo ' value="'.$heading.'"'?> > 
  </div>



    <div class="well">
     <label >Description  </label>
      <input type="text" class="form-control"  placeholder="Enter description" name="description" minlength="3" maxlength="499"  <?php  echo ' value="'.$description.'"'?>>
  </div>



   <div class="well"  class="form-control" class="emotion">
     <label >Emotion :</label>
      <select name="emotion"  >

              <option <?php if ($emotion =='Alone') echo 'selected' ; ?>>Alone</option>
              <option <?php if ($emotion =='Adventure') echo 'selected' ; ?>>Adventure</option>
              <option <?php if ($emotion =='Alarmed') echo 'selected' ; ?>>Alarmed</option>
              <option <?php if ($emotion =='Anxious') echo 'selected' ; ?>>Anxious</option>
              <option <?php if ($emotion =='Cool') echo 'selected' ; ?>>Cool</option>
              <option <?php if ($emotion =='Hot') echo 'selected' ; ?>>Hot</option>
              <option <?php if ($emotion =='Depressed') echo 'selected' ; ?>>Depressed</option>
              <option <?php if ($emotion =='Naughty') echo 'selected' ; ?>>Naughty</option>
              <option <?php if ($emotion =='Curious') echo 'selected' ; ?>>Curious</option>
              <option <?php if ($emotion =='Success') echo 'selected' ; ?>>Success</option>
              <option <?php if ($emotion =='Danger') echo 'selected' ; ?>>Danger</option>
              <option <?php if ($emotion =='Joy') echo 'selected' ; ?>>Joy</option>
              <option <?php if ($emotion =='Surprise') echo 'selected' ; ?>>Surprise</option>
              <option <?php if ($emotion =='Strange') echo 'selected' ; ?>>Strange</option>
              <option <?php if ($emotion =='Disgust') echo 'selected' ; ?>>Disgust</option>
              <option <?php if ($emotion =='Love') echo 'selected' ; ?>>Love</option>
              <option <?php if ($emotion =='Broke') echo 'selected' ; ?>>Broke</option>
              <option <?php if ($emotion =='Satisfied') echo 'selected' ; ?>>Satisfied</option>
              <option <?php if ($emotion =='confident') echo 'selected' ; ?>>confident</option>
              <option <?php if ($emotion =='Close') echo 'selected' ; ?>>Close</option>
              <option <?php if ($emotion =='Extrovert') echo 'selected' ; ?>>Extrovert</option>
              <option <?php if ($emotion =='Introvert') echo 'selected' ; ?>>Introvert</option>
              <option <?php if ($emotion =='Hostile') echo 'selected' ; ?>>Hostile</option>
              <option <?php if ($emotion =='Crushed') echo 'selected' ; ?>>Crushed</option>
              <option <?php if ($emotion =='Restless') echo 'selected' ; ?>>Restless</option>
              <option <?php if ($emotion =='Pained') echo 'selected' ; ?>>Pained</option>
              <option <?php if ($emotion =='Happy') echo 'selected' ; ?>>Happy</option>
              <option <?php if ($emotion =='Sad') echo 'selected' ; ?>>Sad</option>
              <option <?php if ($emotion =='Lonely') echo 'selected' ; ?>>Lonely</option>
              <option <?php if ($emotion =='Worried') echo 'selected' ; ?>>Worried</option>
              <option <?php if ($emotion =='Rejected') echo 'selected' ; ?>>Rejected</option>
              <option <?php if ($emotion =='Nervous') echo 'selected' ; ?>>Nervous</option>
              <option <?php if ($emotion =='Tortured') echo 'selected' ; ?>>Tortured</option>
              <option <?php if ($emotion =='Hungry') echo 'selected' ; ?>>Hungry</option>
              <option <?php if ($emotion =='Sleep') echo 'selected' ; ?>>Sleep</option>
              <option <?php if ($emotion =='Hateful') echo 'selected' ; ?>>Hateful</option>
              <option <?php if ($emotion =='Insulted') echo 'selected' ; ?>>Insulted</option>
              <option <?php if ($emotion =='Powerless') echo 'selected' ; ?>>Powerless</option>
              <option <?php if ($emotion =='Shy') echo 'selected' ; ?>>Shy</option>
    </select>  
  </div> 




 </div>

  <div class="alert alert-primary" role="alert" style="background-color:  #17202a  ;">
    <div  style="text-align: center;" >
      <button   class="btn btn-success"  style="height: 40px; width: 280px;"  data-toggle="tooltip" data-placement="bottom" title="Save" ><span class="glyphicon glyphicon-saved"></span></button>
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