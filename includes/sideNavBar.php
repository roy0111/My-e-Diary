<?php  
  session_start();

?>

<style type="text/css">
	
	a{
       height: 5%;
       text-align: center;
	}

</style>






<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>


<div class="w3-sidebar w3-bar-block w3-black w3-xlarge" style="display:none; width:270px; height: auto;" id="mySidebar">



<?php


 echo'
    <div align="center" style="padding-top:15px; ">
    <img  style="width: 200px; margin: 0 auto; border: 12; border-radius: 50%;" src="data:image/jpeg;base64,'.$_SESSION['user_img'].'" alt="Image not found" onerror="this.onerror=null;this.src=\'myProfileEdit/imageFolder/userImg.png\';" />


    </div>'
?>

  <?php



  echo '<p style="text-align: center; padding-top:15px;">'.$_SESSION["user_product_id"].'</p>';
  ?>

  <a href="../home.php" target="_blank" class="w3-bar-item w3-button">
           <i class="fa fa-home"> Home</i></a> 

  <a href="../sourcePages/myProfilePage.php" class="w3-bar-item w3-button">
          <i class="fa fa-id-card  "> Profile</i></a>

  <a href="../sourcePages/lastPass.php" class="w3-bar-item w3-button"><i class="fa fa-flickr  "> LastPass</i></a>

  <a href="../sourcePages/myDiary.php" class="w3-bar-item w3-button"><i class="fa fa-book"> Diary</i></a>

  <a href="../sourcePages/event.php" class="w3-bar-item w3-button"><i class="fa fa-bell "> Event</i></a> 

  <a href="../sourcePages/todayNews.php" class="w3-bar-item w3-button"><i class="fa fa-gift"> What's Today</i></a> 

  <a href="../sourcePages/contract.php" class="w3-bar-item w3-button"><i class="fa  fa-address-book"> Contacts</i></a>

  
 
  <a href="../logOut.php" class="w3-bar-item w3-button"><i style="color: red;" class="fa fa-sign-out "> Log Out</i></a> 

  <button onclick="w3_close()" style="background-color: gray; text-align: center" 
      class="w3-bar-item  w3-large">Close <i class="fa  fa-times-circle "></i>
  </button>


    <footer   style="padding-top:15%;" ></footer>
</div>

 <button id="button1" style="position: fixed; border-radius: 120px; width:100px ; align-items: center; top: 10%; left:3%" class="w3-button w3-teal w3-xlarge" onclick="w3_open()"><i  class="fa fa-bars"></i></button>
      





</body>
</html>



<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("button1").style.display = "none";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("button1").style.display = "block";

}
</script>