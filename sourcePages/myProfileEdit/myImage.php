               
<?php  
  //include '../../database_access/check_user_pdo.php';
   session_start();
?>
<div   style="padding-top:100px; " >
        <div align="center" class ="well" style="border-color: red;">
            <?php echo'<img  style="width: 350px; margin: 0 auto; border: 12;" src="data:image/jpeg;base64,'.$_SESSION['user_img'].'" alt="Image not found" onerror="this.onerror=null;this.src=\'myProfileEdit/imageFolder/userImg.png\';" />'?>
        </div>

         <form method="post" action="myProfileEdit/imageFolder/changeUserProfilePic.php" enctype="multipart/form-data" style="margin: 10px; ">
                       
            <div >
                <input type="file" name="user_img" placeholder="no selection" required />
            </div>

            <button class="btn btn-success" style="margin: 10px" type="submit"
              name="submit"><i class="fa fa-upload">  </i> Upload New
            </button>

          </form>



  </div>