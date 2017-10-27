<?php

function generateProductId(){     //generate user product id using time stamp

    $date = Date("Y-m-d H:i:s"); 
    $d=explode(':', $date);
    $p=explode('-', $d[0]);

    $product_id=$p[0].$p[1].$p[2].$d[1].$d[2].$d[3];
    $k=explode(' ', $product_id);
    $product_id=$k[0].$k[1];
   return $product_id;
 }

?>


<?php  

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $address = test_input($_POST["address"]);
  $division = test_input($_POST["division"]);
  $phone = test_input($_POST["phone"]);
   $zip = test_input($_POST["zip"]);
  $city = test_input($_POST["city"]);
  $BloodGroup = test_input($_POST["BloodGroup"]);
  $Gender = test_input($_POST["Gender"]);
  $occupation=test_input($_POST["Occupation"]);
  $religion=test_input($_POST["Religion"]);

  $user_mail_id=  test_input($_SESSION["user_mail_id"]);

  $product_id=test_input(generateProductId());  //call product generate id function and trim it


 
  
  include '../database_access/check_user_pdo.php';
 
   if(insert_user_information($product_id,$user_mail_id,$Gender,$BloodGroup,$city,$zip,$phone,$division,$address, $occupation,$religion)){

           header('Location: ../sourcePages/myProfilePage.php');

   }
   else{

       echo '<script type="text/javascript">alert("!!! Please try again.");</script>';
   }

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data="'".$data."'";
  return $data;
}

?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>User Information Validation</title>


  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

      <link rel="stylesheet" href="../css/styleinfo.css">


</head>

<body>
  <div class="container">

    <form class="well form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>User Information! <span class="label label-default"><?php echo $_SESSION["user_mail_id"]?></span></legend>


<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Division</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="division" class="form-control selectpicker" >
      <option value=" " >Please select your Division</option>
      <option>Dhaka</option>
      <option>Khulna</option>
      <option >Chittagong</option>
      <option>Rangpur</option>
      <option>Shylet</option>
      <option >Barishal</option>
      <option>Rajshahi</option>
      <option >Dinajpur</option>
      
    </select>
  </div>
</div>
</div>



<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">City</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="city" placeholder="city" class="form-control"  type="text">
    </div>
  </div>
</div>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Zip Code</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="  glyphicon glyphicon-map-marker"></i></span>
  <input name="zip" placeholder="Zip Code" class="form-control"  type="text">
    </div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Address</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="address" placeholder="Address" class="form-control" type="text">
    </div>
  </div>
</div>
<!-- Text input-->

       
<div class="form-group">
  <label class="col-md-4 control-label">Phone No (+880)</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="16******2" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
      

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">Occupation</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
  <input name="Occupation" placeholder="Occupation" class="form-control"  type="text">
    </div>
  </div>
</div>




<!-- radio checks -->
 <div class="form-group">
                        <label class="col-md-4 control-label">Gender</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="Gender" value="Male" /> Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="Gender" value="Female" /> Female
                                </label>
                            </div>
                       <div class="radio">
                                <label>
                                    <input type="radio" name="Gender" value="other" /> Other
                                </label>
                            </div>
                        </div>
                    </div>



  <div class="form-group"> 
  <label class="col-md-4 control-label">Religion</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i></span>
    <select name="Religion" class="form-control selectpicker" required>
      <option value=" " >Please select Religion</option>
      <option>Islam</option>
      <option>Hindu</option>
      <option >Christian</option>
      <option>Buddism</option>
      <option>other</option>
      
    </select>
  </div>
</div>
</div>
   <!-- Text area -->


<!-- Text area -->
  <div class="form-group"> 
  <label class="col-md-4 control-label">Blood Group</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
    <select name="BloodGroup" class="form-control selectpicker" >
      <option value=" " >Please select Blood Group</option>
      <option>a+</option>
      <option>a-</option>
      <option >b+</option>
      <option>b-</option>
      <option>o+</option>
      <option >o-</option>
      <option>ab+</option>
      <option >ab-</option>
      
    </select>
  </div>
</div>
</div>





<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
      
  </div>
    <button type="submit" class="btn btn-success" >Submit <span class="glyphicon glyphicon-ok-sign"></span></button>
  </div>
</div>


</fieldset>
</form>
</div>
    
</div><!-- /.container -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <script  src="../js/indexinfo.js"></script>

</body>
</html>
