


<!DOCTYPE html>
<html>

<?php  
$first_name = $mail_id = $datepicker = $password_first =$confirm_password= "";
$mailerror=$dateerror=$passerror=$logInerror="";

// $p="dddddd";
// $p="'".$p."'";
// echo $p;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $first_name = test_input($_POST["first_name"]);
  $mail_id = test_input($_POST["mail_id"]);
  $datepicker = test_input($_POST["datepicker"]);
  $password_first = test_input($_POST["password_first"]);
  $confirm_password = test_input($_POST["confirm_password"]);
  $flag=0;

  
    include 'database_access/check_user_pdo.php';
 

     if(!check_user_mail_id($mail_id)){

                $mailerror=" !!! Mail already used";
                $flag++;
      }

      if(!validateDate($datepicker)){
             $dateerror="!!! Invalid Date";
             $flag++;
      }

     if($password_first!=$confirm_password){
       $passerror="!!! Password not matched";
        
         $flag++;
       }

       if($flag!=0){
        echo '<script type="text/javascript">alert("!!! InValid Input");</script>';
       }

       else{
          if(insert_new_user_log_info($first_name,$mail_id,$datepicker,$password_first)){
              $first_name = $mail_id = $datepicker = $confirm_password= "";
             $password_first =$mailerror=$dateerror=$passerror="";
             

               header('Location:confirmationPage.php');
            }
            else{
              echo '<script type="text/javascript">alert("!!! Database Disconnected, please try again.");</script>';
            }


       }



}


    elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logIN'])){

         include 'database_access/check_user_pdo.php';
         
          $user_mail_login_id = test_input($_POST["user_mail_login_id"]);
          $user_password_login = test_input($_POST["user_password_login"]);

          if(check_user_avilableity($user_mail_login_id,$user_password_login)){

           

                 session_start();
                 
                 $_SESSION["user_mail_id"] = $user_mail_login_id;



                 if(fresherClientCheck($user_mail_login_id)=='yes'){

                      header('Location:sourcePages/myProfilePage.php');
                    

                 }
                 elseif(fresherClientCheck($user_mail_login_id)=='no'){
                  
                        header('Location:form/form_info.php');

                 }
                 else{
                   session_destroy();
                 }


          }

          else{
            echo '<script type="text/javascript">alert("!!! Id and Password not match");</script>';
            $logInerror="!!! Invalid User Id  or Password. ";
          }
    }





 function validateDate($date, $format = 'Y-m-d'){
       $d = DateTime::createFromFormat($format, $date);
      return $d && $d->format($format) == $date;
     }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>



<title>Log In</title>
<head>
  <meta charset="utf-8">
  
 <link rel="stylesheet" type="text/css" href="css/login_page.css">

  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 </head>


<body>

  <div class="All">

      <h1 style="color:#76EEC6; text-align: center;" >Join Us with your e-Diary.</h1>

      <a href="home.php" target="_blank" style="width :120px"> 
        <p style="width :120px"><button class="w3-btn w3-grey w3-xlarge" style="height: 60px;margin-left: 50px; border-radius: 10px;">Home <i class="fa fa-home"></i></button></p>
      </a>


    <div class="container">
      <div class="content">
        <div class="sign-up">
          <h2>Create an account. </h2>
          <p>We Recommended you to sign up in our application you will be up-to-date of all the new of technology</p>
          <button class="signup">Sign Up</button>
        </div>
        <div class="sign-in">
          <h2>Have an account ? </h2>
          <p>The Right path is start from here ... </p>
          <button class="signin">Log In</button>
        </div>
      </div>


      <div class="signover">
        <div class="first">
          <h2>SIGN UP</h2>
          <form id="registration-form" method="post" 
               action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <input type="text" placeholder="Full Name" 
            name="first_name" id="first_name"  value= "<?php echo $first_name;?>"  maxlength="31" required>

            <input type="email" placeholder="E-mail Id"
             name="mail_id" id="mail_id" value= "<?php echo $mail_id;?>" maxlength="31" required>

                 <span style="color: red;"><?php echo $mailerror;?></span>


            <input type ="dateOfBirth" id="datepicker" name="datepicker"
                placeholder="Date OF Birth (yy-mm-dd)" oninput="check_date()"
                 value= "<?php echo $datepicker;?>" required>

                 <span style="color: red;"><?php echo $dateerror;?></span>

            <input type="password" name="password_first" id="password_first"  placeholder="Enter Password" oninput="check_passwd_length()" value= "<?php echo $password_first;?>" maxlength="31" required>

              <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value= "<?php echo $confirm_password;?>" oninput= "check_password_function()" maxlength="31"  required>
                <span style="color: red;"><?php echo $passerror;?></span>
          
            <input type="submit" value="Submit" name="submit">

          </form>
        </div>





        <div class="second" style="display:none">
          <h2>LOG IN</h2>
        <form method="post" 
               action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <input type="email" name="user_mail_login_id" value= "<?php echo $user_mail_login_id;?>" placeholder="Enter Your E-mail" required>
            <input type="password"  name="user_password_login" value= "<?php echo $user_password_login;?>" placeholder="Enter Password" required>

             <span style="color: red;"><?php echo $logInerror;?></span>

            <input type="submit" value="log in" name="logIN">
              
          </form>
        </div>
      </div>
    </div>
  </div>

 <!--  <script src="log_js/plugins.js"></script> -->
</body>

<script type="text/javascript">

function isValidDate(s) {
  var bits = s.split('-');
  var d = new Date(bits[0] + '/' + bits[1] + '/' + bits[2]);
  return !!(d && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[2])
       && bits[0]>Number(1900) && bits[0]<Number(3000));
}

  function check_date(){
    var y=document.getElementById("datepicker").value;
    
    if(isValidDate(y.toString())){
      document.getElementById("datepicker").style.color = "green";
    }
    else{
     document.getElementById("datepicker").style.color = "red";

    }

  }



function check_passwd_length(){
    if(document.getElementById("password_first").value.length>12){
      document.getElementById("password_first").style.color = "green";
      
    }
    else if(document.getElementById("password_first").value.length>7){
      document.getElementById("password_first").style.color = "blue";
      
    }
    else if(document.getElementById("password_first").value.length==0){
 
     document.getElementById("password_first").style.color = "red";
    }



    }

</script>



<!-- <script>
function check_password_function() {
    
    if(document.getElementById("password_first").value== 
           document.getElementById("confirm_password").value){
      document.getElementById("confirm_password").style.color = "green";
      
    }
    else{
 
     document.getElementById("confirm_password").style.color = "red";
    }
    
}
</script> -->



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>


<link rel='stylesheet prefetch' href='http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css'>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

  <script  src="js/log_js/index.js"></script>
  





</html>