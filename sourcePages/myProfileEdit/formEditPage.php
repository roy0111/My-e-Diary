


<?php 
       include '../../database_access/check_user_pdo.php';

         session_start();

?>





<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      try {
        $user_mail=test_input_trimer($_SESSION["user_mail_id"]);
        $address = test_input_trimer($_POST["address"]);
        $division = test_input_trimer($_POST["division"]);
        $phone = test_input_trimer($_POST["phone"]);
        $Zip = test_input_trimer($_POST["Zip"]);
        $city = test_input_trimer($_POST["city"]);
        $blood_group = test_input_trimer($_POST["blood_group"]);
        $gender = test_input_trimer($_POST["gender"]);
        $occupation = test_input_trimer($_POST["occupation"]);
        $religion = test_input_trimer($_POST["religion"]);
        $first_name = test_input_trimer($_POST["first_name"]);
        $day= $_POST["day"];
        $month=$_POST["month"];
        $year=$_POST["year"];

        $dob = $year."-".$month."-".$day;
        $dob = test_input_trimer($dob); 

                // echo $first_name.$dob.$division.$blood_group.$gender.$religion. $occupation.$phone.
                //  $city.$Zip.$address;

           if(updateUserProfile($user_mail,$first_name,$dob,$division,$blood_group,$gender,$religion,$occupation,$phone,$city,$Zip,$address)){
              
             
           }
           else{
                echo '<script type="text/javascript">alert("!!! Error occurs. Try Later.");</script>';
           }
          
           header('Location: ../myProfilePage.php');

      } catch (Exception $e) {
          echo $e." error occurs";
      }
}


 ?>


  
<?php 
  try {
  $user_mail=test_input_trimer($_SESSION["user_mail_id"]);

   $information = editUserInfo($user_mail);
   
   //print_r($information);

       $first_name = $information['0']['Full_name'];
       $dob = $information['0']['birth_date'];
       $division = $information['0']['division'];
       $blood_group = $information['0']['blood_group'];
       $gender = $information['0']['gender'];
       $religion = $information['0']['religion'];
       $occupation= $information['0']['occupation'];
       $phone = $information['0']['phone'];        
       $city =  $information['0']['city'];
       $Zip = $information['0']['zip']; 
       $address =$information['0']['address']; 

        // echo $first_name.$dob.$division.$blood_group.$gender.$religion. $occupation.$phone.
        // $city.$Zip.$address;

        $d=explode('-', $dob);   //birth of date split
        $year=$d[0];
        $month=$d[1];
        $day=$d[2];
    
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
	<title>Edit Profile</title>

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
      <button class=" glyphicon glyphicon-arrow-left " class="btn" onclick="location.href='../myProfilePage.php' " style="  width: 80px; height: 40px; color: black;"  data-toggle="tooltip" data-placement="bottom" title="Back"></button>
    </div>

    <div style="text-align: center; height: 45px;" class="col-sm-6" >
      <p style="font-size: 22px; color: black"><?php echo $_SESSION["user_mail_id"]; ?></p> 
    </div>
   </div>
  </div>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <div class="alert alert-success" style="height: 100%; text-align:center;">


  <div class="well">
     <label >First Name:</label>

      <input type="text" class="form-control" id="first_name" placeholder="Enter your name" name="first_name" minlength="3" maxlength="31"      <?php  echo ' value="'.$first_name.'"'?> > 
  </div>


  <div class="well">
     <label >Birth Of Date(yyyy/mm/dd):</label>

  
        <select name="year" id="year"  >
          <?php 

            for ($i=1950; $i<=2050 ; $i++) {   

                if ($year==$i) {
                       echo  '<option selected>'.$i.'</option>';
                     }     

                else{
                   echo  '<option >'.$i.'</option>';
                }
            }
           ?>
          </select>


          <select name="month" id="month" >
          <?php 

            for ($i=1; $i<=12 ; $i++) {        
               if ($month==$i) {
                       echo  '<option selected>'.$i.'</option>';
                     }     

                else{
                   echo  '<option >'.$i.'</option>';
                }

            }



           ?>

          </select>


          <select name="day" id="day"  >
          <?php 

            for ($i=1; $i<=31 ; $i++) {        
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



    <div class="well">
     <label >Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter your Address" name="address" minlength="6" maxlength="31"  <?php  echo ' value="'.$address.'"'?>>
  </div>


   <div class="well">
     <label >City:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter your City" name="city"
       maxlength="19" minlength="6" <?php  echo ' value="'.$city.'"'?>>
   </div>

    <div class="well">
     <label >Zip:</label>
      <input type="text" class="form-control" id="Zip" placeholder="Enter your Zip" name="Zip" maxlength="7" minlength="4" <?php  echo ' value="'.$Zip.'"'?>>
  </div>

  <div class="well " class="form-control" class="selectpicker" >
     <label >Division:</label>

      <select name="division" id="division">  
      <option <?php if ($division =='Dhaka') echo 'selected' ; ?> >Dhaka</option>
      <option <?php if ($division =='Khulna') echo 'selected' ; ?> >Khulna</option>
      <option <?php if ($division =='Chittagong') echo 'selected' ; ?> >Chittagong</option>
      <option <?php if ($division =='Rangpur') echo 'selected' ; ?> >Rangpur</option>
      <option <?php if ($division =='Shylet') echo 'selected' ; ?> >Shylet</option>
      <option  <?php if ($division =='Barishal') echo 'selected' ; ?> >Barishal</option>
      <option <?php if ($division =='Rajshahi') echo 'selected' ; ?> >Rajshahi</option>
      <option <?php if ($division =='Dinajpur') echo 'selected' ; ?> >Dinajpur</option>
    </select> 

  </div>




   <div class="well"  class="form-control" class="selectpicker">
     <label >Gender:</label>
      <select name="gender" id="gender" style="" >
      <option <?php if ($gender =='Male') echo 'selected' ; ?>>Male</option>
      <option <?php if ($gender =='Female') echo 'selected' ; ?>>Female</option>
      <option <?php if ($gender =='Others') echo 'selected' ; ?>>Others</option>
    </select>  
  </div> 


   <div class="well"  class="form-control" class="selectpicker">
     <label >Blood Group:</label>
      <select name="blood_group" id="blood_group" style="" >
      <option <?php if ($blood_group =='a+') echo 'selected' ; ?>>a+</option>
      <option <?php if ($blood_group =='a-') echo 'selected' ; ?>>a-</option>
      <option <?php if ($blood_group =='b+') echo 'selected' ; ?>>b+</option>
      <option <?php if ($blood_group =='b-') echo 'selected' ; ?>>b-</option>
      <option <?php if ($blood_group =='ab+') echo 'selected' ; ?>>ab+</option>
      <option <?php if ($blood_group =='ab-') echo 'selected' ; ?>>ab-</option>
      <option <?php if ($blood_group =='o+') echo 'selected' ; ?>>o+</option>
      <option <?php if ($blood_group =='o-') echo 'selected' ; ?>>o-</option>
    </select> 
  </div> 


   <div class="well">
     <label >Religion:</label>

      <select name="religion" id="religion" style="" >
      <option <?php if ($religion =='Hindu') echo 'selected' ; ?>>Hindu</option>
      <option <?php if ($religion =='Islam') echo 'selected' ; ?>>Islam</option>
      <option <?php if ($religion =='Christian') echo 'selected' ; ?>>Christian</option>
      <option <?php if ($religion =='Buddhism') echo 'selected' ; ?>> Buddhism</option>
      <option <?php if ($religion =='Other') echo 'selected' ; ?>>Other</option>  
    </select>

  </div>

  <div class="well">
     <label >Occupation:</label>
      <input type="text" class="form-control" id="occupation" placeholder="Enter your occupation" name="occupation" maxlength="15" minlength="4" <?php  echo ' value="'.$occupation.'"'?>>
  </div>

  <div class="well">
     <label >Phone Number (+880 ):</label>
      <input type="tel" class="form-control" id="phone" placeholder="Enter your phone Number" name="phone" maxlength="10" minlength="10" <?php  echo ' value="'.$phone.'"'?>>
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