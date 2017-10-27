  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
.icon-size{
  font-size:1.5em;
 }  

 #ulfont {
    font-size: 120%;
}


</style>

<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<body data-spy="scroll" data-target=".navbar"  style=" padding-left: 10px;" >

  <nav  class="navbar navbar-inverse" data-spy="affix"  style=" padding-left: 10px;width: 99%;">
  <div class="container-fluid">

    <div class="navbar-header" >
      <span class="navbar-brand" style="font-size:2.1em;" >My Diary </span>
    </div>

    <ul id="ulfont" class="nav navbar-nav">
      <li class="active"><a  href="../home.php" target="_blank"><span style="font-size:1.5em;" class="glyphicon glyphicon-home"></span> Home</a></li>

      <li ><a href="../sourcePages/myProfilePage.php"><span  class="glyphicon glyphicon-user icon-size"></span>   My Profile</a></li>

      <li><a href="../sourcePages/lastPass.php"><span class="glyphicon glyphicon-tasks icon-size"></span>   LastPass</a></li>

      <li><a href="../sourcePages/myDiary.php"><span  class="glyphicon glyphicon-book icon-size"></span>     My Diary</a></li>

      <li><a href="../sourcePages/event.php"><span  class="glyphicon glyphicon-bell icon-size" ></span>   Events</a></li>

      <li><a href="../sourcePages/todayNews.php"><span class="glyphicon glyphicon-gift icon-size"></span>    What's Today</a></li>

      <li><a href="../sourcePages/contract.php"><span class="glyphicon glyphicon-earphone icon-size"></span>   Contacts</a></li>

      <li><h3 style=" padding-left:25px;  color: white;">
             <?php session_start();
               echo $_SESSION["user_mail_id"]; ?>
         </h3>

      </li>
    </ul>
   


    <ul class="nav navbar-nav navbar-right">

      <li><a style="font-size:1.5em;" href="../logOut.php"><span class="glyphicon glyphicon-off "></span> Log out</a></li>
    </ul>
  </div>


</nav>
<div>
  
</div>
<div style="height: 10%"></div>

<div>
  <?php include 'sideNavBar.php';  ?>
</div>
</body>

</html>