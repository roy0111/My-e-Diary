<?php 
     include '../includes/header.php';

 session_start();

?>

<?php 
       include '../database_access/check_user_pdo.php';
       
       $user_mail_id= "'".$_SESSION["user_mail_id"]."'";

       $userInfoResult=profileDataFetch($user_mail_id);


       $productId = $userInfoResult['0']['user_product_id'];
       $name = $userInfoResult['0']['Full_name'];
       $dob = $userInfoResult['0']['birth_date'];
       $reg_date =  $userInfoResult['0']['reg_date'];
       $division = $userInfoResult['0']['division'];
       $bloodGroup = $userInfoResult['0']['blood_group'];
       $gender = $userInfoResult['0']['gender'];
       $religion = $userInfoResult['0']['religion'];
       $occupation= $userInfoResult['0']['occupation'];
       $phn_no = $userInfoResult['0']['phone'];        
        $city =  $userInfoResult['0']['city'];
       $zip = $userInfoResult['0']['zip']; 
       $address =$userInfoResult['0']['address']; 

        $_SESSION["user_product_id"] = $productId;   //set seesion product id
?>






<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  
  td{

    text-align: center;
  };
</style>

<head>
  <title>profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>




<body style="padding-top: 200px;">

<div class="container">



  <div style="align-items:center; width: 1000px; background-color: #2B2B2B; height: 50px; padding-left: 15px;"><h1 style="color: white;">About</h1>
      
    </div>

  <table class="table table-hover" style="width: 1000px;">

       
    
      <tr>
          <td>
                  <h4>Name</h4>
          </td>
          <td>
                <h4> <?php echo  $name;?>      </h4>
          </td>
      </tr>


      <tr>
          <td>
                  <h4>Date Of Birth </h4>
          </td>
          <td>
                <h4>   <?php echo  $dob;?>     </h4>
          </td>
      </tr>

      <tr>
          <td>
                  <h4>Gender</h4>
          </td>
          <td>
                <h4>   <?php echo  $gender;?>     </h4>
          </td>
      </tr>


      <tr>
          <td>
                  <h4>Blood Group </h4>
          </td>
          <td>
                <h4>    <?php echo  $bloodGroup;?>    </h4>
          </td>
      </tr>

            <tr>
          <td>
                  <h4>Religion</h4>
          </td>
          <td>
                <h4>    <?php echo  $religion;?>     </h4>
          </td>
      </tr>


      <tr>
          <td>
                  <h4>Occupation </h4>
          </td>
          <td>
                <h4>     <?php echo  $occupation;?>    </h4>
          </td>
      </tr>

  </table>



  <div style="align-items:center; width: 1000px; background-color: #2B2B2B; height: 50px; padding-left: 15px;"><h1 style="color: white; ">Address Info</h1></div>
  
    <table class="table table-hover" style="width: 1000px;">

       
    
      <tr>
          <td>
                  <h4>Division</h4>
          </td>
          <td>
                <h4>   <?php echo  $division;?>      </h4>
          </td>
      </tr>


      <tr>
          <td>
                  <h4>City </h4>
          </td>
          <td>
                <h4>  <?php echo  $city;?>     </h4>
          </td>
      </tr>

      <tr>
          <td>
                  <h4>Zip</h4>
          </td>
          <td>
                <h4>    <?php echo  $zip;?>     </h4>
          </td>
      </tr>


      <tr>
          <td>
                  <h4>Street Address </h4>
          </td>
          <td>
                <h4>    <?php echo  $address;?>     </h4>
          </td>
      </tr>

         

  </table>



  <div style="align-items:center; width: 1000px; background-color: #2B2B2B; height: 50px; padding-left: 15px;"><h1 style="color: #FAFAFA;">Contract and Basic Info</h1></div>
  
    <table class="table table-hover" style="width: 1000px;">

       
    
      <tr>
          <td>
                  <h4>Phone No </h4>
          </td>
          <td>
                <h4>     <?php echo "(+880)".$phn_no;?>    </h4>
          </td>
      </tr>


      <tr>
          <td>
                  <h4>Email </h4>
          </td>
          <td>
                <h4>   <?php echo  $user_mail_id;?>      </h4>
          </td>
      </tr>


      <tr>
          <td>
                  <h4>Product Id </h4>
          </td>
          <td>
                <h4 ><b>  <?php echo  $productId;?>    </b>   </h4>
          </td>
      </tr>


        <tr>
          <td>
                  <h4>Rgistration Date </h4>
          </td>
          <td>
                <h4>    <?php echo  $reg_date;?>     </h4>
          </td>
         </tr>

 

  </table>



  <a href="myProfileEdit/formEditPage.php"><button type="button" class="btn btn-success btn-lg btn-block" 
    style="width: 1000px;">
     <span class="glyphicon glyphicon-edit"></span> Edit Profile</button>
  </a>



<?php    include 'myProfileEdit/myImage.php'; ?>

</div>






</body>
</html>
