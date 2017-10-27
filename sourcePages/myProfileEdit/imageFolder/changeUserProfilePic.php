<?php
  include '../../../database_access/check_user_pdo.php';


session_start();


$user_product_id = test_input_trimer($_SESSION["user_product_id"]);




if (getimagesize($_FILES['user_img']['tmp_name']) !== false) {

    $image = addslashes($_FILES['user_img']['tmp_name']);

    $name = addslashes($_FILES['user_img']['name']);

    $image = file_get_contents($image);

    $image = base64_encode($image);


    if (uploadUserProfilePic($user_product_id, $image)){
        $_SESSION['user_img']=$image;
    }
    else{

    echo ' <body onload="caller()"></body>';

    }

} else {
    echo ' <body onload="caller()"></body>';
}


        header("Location: ../../myProfilePage.php");

?>



          <script>
            function customAlert(msg,duration)
            {
             var styler = document.createElement("div");
              styler.setAttribute("style","border: solid 5px Red;width:auto;height:auto;top:50%;left:40%;background-color:#444;color:Silver");
             styler.innerHTML = "<h1>"+msg+"</h1>";
             setTimeout(function()
             {
               styler.parentNode.removeChild(styler);
             },duration);
             document.body.appendChild(styler);
            }
              function caller() {
                  customAlert("Plase Upload A Image.","2000");
              }
              </script> 
