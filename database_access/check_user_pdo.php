<?php 



 include 'con_pdo.php';



  function getTodayDateFunction(){
    date_default_timezone_set('Asia/Dhaka');
    return  Date("Y-m-d");
  }

  function test_input_trimer($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data="'".$data."'";
  return $data;
 }


 function itemProductId(){     //generate user product id using time stamp

    $date = Date("Y-m-d H:i:s"); 
    $d=explode(':', $date);
    $p=explode('-', $d[0]);

    $product_id=$p[0].$p[1].$p[2].$d[1].$d[2].$d[3];
    $k=explode(' ', $product_id);
    $product_id=$k[0].$k[1];
   return $product_id;
 }




   function check_user_mail_id($mail_id)
   {

     $mail_id  = "'".$mail_id ."'";
       // $sql = "SELECT * FROM myDiaryDB.user_logIn_info_tb";

          $sql = "SELECT user_mail FROM myDiaryDB.user_logIn_info_tb where user_mail=$mail_id";
         
         $dbconn=connectivityDB();// check connection
          $stmt = $dbconn->prepare($sql); //prepare sql
          $stmt->execute();  //execute the prepared sql

        $count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
        // echo $count;
        if($count==0){
          
          return true;
        }
        else{
          return false; 
        }

   }

   
 
   function check_user_avilableity($mail_id,$password)
   {

     $mail_id  = "'".$mail_id ."'";
      $password  = "'".$password ."'";
       // $sql = "SELECT * FROM myDiaryDB.user_logIn_info_tb";

          $sql = "SELECT user_mail FROM myDiaryDB.user_logIn_info_tb where user_mail=$mail_id AND password=$password";
         
         $dbconn=connectivityDB();// check connection
          $stmt = $dbconn->prepare($sql); //prepare sql
          $stmt->execute();  //execute the prepared sql

        $count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
        if($count==0){
          
          return false;
        }
        else{
          return true; 
        }

   }


  function fresherClientCheck($mail_id)
   {

    $mail_id  = "'".$mail_id ."'";
    
    $sql = "SELECT activity FROM myDiaryDB.user_logIn_info_tb where user_mail= $mail_id";
         
      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql


      $result=$stmt->fetchAll();

      if(($result['0']['activity'])=='yes'){
              return 'yes';
          }
          elseif (($result['0']['activity'])=='no') {
            return 'no';
          }
          else{
            return 'disable';
          }

   }
 ?>




<?php 

   function insert_new_user_log_info($first_name,$mail_id,$dob,$password_first){

          $mail_id  = "'".$mail_id ."'";
          $password_first  = "'".$password_first ."'";
          $first_name  = "'".$first_name ."'";
          $dob  = "'".$dob ."'";
          $reg_date=date("Y-m-d");              //generate date 
          $reg_date  = "'".$reg_date ."'";

      $sql = "INSERT into myDiaryDB.user_logIn_info_tb 
          VALUES($mail_id,$first_name,$password_first,$dob, $reg_date,'no')";


                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql


              $count = $stmt->rowCount();//no of row


              include 'disable_connection.php';  //disconnect to database
               // echo $count;
              if($count!=0){
                
                return true;
              }
              else{
                return false; 
              }
    }





  function insert_user_information($product_id,$user_mail_id,$Gender,$BloodGroup,$city,$zip,$phone,$division,$address, $occupation,$religion){


      $sql = "INSERT into myDiaryDB.user_information_tbl 
          VALUES($product_id,$user_mail_id,$address,$city,$zip,$division,$BloodGroup,$Gender,$religion,$occupation,$phone)";

      $sql1 ="UPDATE myDiaryDB.user_logIn_info_tb SET activity='yes'  WHERE user_mail=$user_mail_id";

      $sql2 = "INSERT into myDiaryDB.user_pro_pic_schema VALUES($product_id,null)";



                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql
                
                $stmt1 = $dbconn->prepare($sql1); //prepare update sql

                $stmt1->execute();  //execute the prepared sql

                $stmt2 = $dbconn->prepare($sql2); //prepare update sql

                $stmt2->execute();  //execute the prepared sql





                 $count = $stmt->rowCount();//no of row


              include 'disable_connection.php';  //disconnect to database
               // echo $count;
              if($count!=0){
                
                return true;
              }
              else{
                return false; 
              }
    }
 ?>



<?php  
   function profileDataFetch($mail_id)
   {

       $sql = "SELECT user_product_id,Full_name,birth_date,reg_date,address,
        city,zip,division,blood_group,gender,religion,occupation,phone FROM myDiaryDB.user_logIn_info_tb join myDiaryDB.user_information_tbl  ON myDiaryDB.user_logIn_info_tb.user_mail=myDiaryDB.user_information_tbl.user_mail WHERE myDiaryDB.user_information_tbl.user_mail=$mail_id";
         
      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        $count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result;


   }

    function checkFrienIdAvailAbility($frnd_product_id,$frnd_mail_id){

      $sql ="SELECT * from myDiaryDB.user_information_tbl where
            myDiaryDB.user_information_tbl.user_mail = $frnd_mail_id AND
            myDiaryDB.user_information_tbl.user_product_id = $frnd_product_id;";
    

                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql 

                $count = $stmt->rowCount();//no of row


              include 'disable_connection.php';  //disconnect to database
               // echo $count;
              if($count!=0){
                
                return true;
              }
              else{
                return false; 
              }
    }


    function addContractFunction($user_product_id,$frnd_product_id){

      $sql ="INSERT into myDiaryDB.contactTbl VALUES ($user_product_id,$frnd_product_id)";
      

                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql 

              include 'disable_connection.php';  //disconnect to database
               

    }



    function isAlreadyInList($user_product_id,$frnd_product_id){

      $sql ="SELECT * from myDiaryDB.contactTbl where
            myDiaryDB.contactTbl.user_pro_id = $user_product_id AND
            myDiaryDB.contactTbl.friend_pro_id = $frnd_product_id;";
    

                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql 

                $count = $stmt->rowCount();//no of row


              include 'disable_connection.php';  //disconnect to database
               // echo $count;
              if($count!=0){
                
                return true;
              }
              else{
                return false; 
              }
    }

 

?>






<?php

   function editUserInfo($userMail){
     
       $sql = "SELECT Full_name,birth_date,address,
        city,zip,division,blood_group,gender,religion,occupation,phone FROM myDiaryDB.user_logIn_info_tb join myDiaryDB.user_information_tbl  ON myDiaryDB.user_logIn_info_tb.user_mail=myDiaryDB.user_information_tbl.user_mail WHERE myDiaryDB.user_information_tbl.user_mail=$userMail";


      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        $count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
   
          
        return $result;
   }



?>




<?php  
  function updateUserProfile($user_mail,$first_name,$dob,$division,$blood_group, $gender,$religion, $occupation, $phone,$city,$Zip,$address){

    try {
      
      $sql ="UPDATE myDiaryDB.user_logIn_info_tb 
              SET myDiaryDB.user_logIn_info_tb.Full_name= $first_name,
                 myDiaryDB.user_logIn_info_tb.birth_date = $dob 
                 WHERE $user_mail= myDiaryDB.user_logIn_info_tb .user_mail";


       $sql2 ="UPDATE myDiaryDB.user_information_tbl 
               SET myDiaryDB.user_information_tbl.address = $address , 
                myDiaryDB.user_information_tbl.city = $city , 
                myDiaryDB.user_information_tbl.zip = $Zip,
                myDiaryDB.user_information_tbl.division = $division,  
                myDiaryDB.user_information_tbl.blood_group = $blood_group, 
                myDiaryDB.user_information_tbl.gender = $gender,
                myDiaryDB.user_information_tbl.religion = $religion, 
                myDiaryDB.user_information_tbl.occupation = $occupation,
                myDiaryDB.user_information_tbl.phone = $phone                  
              WHERE $user_mail=  myDiaryDB.user_information_tbl .user_mail";

                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql 

                $count = $stmt->rowCount();//no of row

                $stmt2 = $dbconn->prepare($sql2); //prepare sql

                $stmt2->execute();  //execute the prepared sql 

                include 'disable_connection.php';  //disconnect to database

                if($count!=0){
                  return true;
                }
                else{

                  return false;
                }




    } catch (Exception $e) {
      return false;
    }

  }                 

?>




<?php
   function fetchContactList($product_id){
      try {

        $sql = "SELECT Full_name,address,division,gender,blood_group,religion,occupation,phone,
               myDiaryDB.user_information_tbl.user_mail,friend_pro_id
              FROM myDiaryDB.contactTbl,myDiaryDB.user_information_tbl,
                                            myDiaryDB.user_logIn_info_tb
               WHERE (myDiaryDB.contactTbl.user_pro_id = $product_id AND 
                myDiaryDB.contactTbl.friend_pro_id = myDiaryDB.user_information_tbl.user_product_id) 
                AND myDiaryDB.user_information_tbl.user_mail = myDiaryDB.user_logIn_info_tb.user_mail
                ORDER BY Full_name ";

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result;


           } catch (Exception $e) {
             return null;
           }     

   }



function deleteContact($user_id,$friend_id){


      $sql = "DELETE FROM  myDiaryDB.contactTbl 
             where myDiaryDB.contactTbl.user_pro_id = $user_id AND
             myDiaryDB.contactTbl.friend_pro_id = $friend_id";


                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql

              //$count = $stmt->rowCount();//no of row
              include 'disable_connection.php';  //disconnect to database


}



function todayList($getdate){
  try{
          $sql = "SELECT * FROM myDiaryDB.whatsToday
                  WHERE myDiaryDB.whatsToday.eventDate = $getdate";

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result;


           } catch (Exception $e) {
             return null;
           } 

  }


    function isUserBirthDay($getTodayDate,$user_mail){
      try{
            
          $sql = "SELECT birth_date FROM myDiaryDB.user_logIn_info_tb
                      WHERE myDiaryDB.user_logIn_info_tb.user_mail = $user_mail";

          $dbconn=connectivityDB();// check connection
          $stmt = $dbconn->prepare($sql); //prepare sql
          $stmt->execute();  //execute the prepared sql
          $result=$stmt->fetchAll();

          
          $date= $result[0]['birth_date'];
          $year=date("Y");
          $date[0]=$year[0];
          $date[1]=$year[1];
          $date[2]=$year[2];
          $date[3]=$year[3];
          $date="'".$date."'";



          $sql = "SELECT * FROM myDiaryDB.user_logIn_info_tb
                      WHERE $date = $getTodayDate
                      AND myDiaryDB.user_logIn_info_tb.user_mail = $user_mail";

          $stmt = $dbconn->prepare($sql); //prepare sql
          $stmt->execute();  //execute the prepared sql



            $count = $stmt->rowCount();//no of row

            include 'disable_connection.php';  //disconnect to database
             //echo $count;
              if($count>0){
                return true;
              }
              else{
                return false;
              }
            } 

            catch (Exception $e) {
                 return false;
               } 

    }


    function isUserRegDay($getTodayDate,$user_mail){
      try{
            
          $sql = "SELECT reg_date FROM myDiaryDB.user_logIn_info_tb
                      WHERE myDiaryDB.user_logIn_info_tb.user_mail = $user_mail";

          $dbconn=connectivityDB();// check connection
          $stmt = $dbconn->prepare($sql); //prepare sql
          $stmt->execute();  //execute the prepared sql
          $result=$stmt->fetchAll();

          
          $date= $result[0]['reg_date'];
          $year=date("Y");
          $date[0]=$year[0];
          $date[1]=$year[1];
          $date[2]=$year[2];
          $date[3]=$year[3];
          $date="'".$date."'";



          $sql = "SELECT * FROM myDiaryDB.user_logIn_info_tb
                      WHERE $date = $getTodayDate
                      AND myDiaryDB.user_logIn_info_tb.user_mail = $user_mail";

          $stmt = $dbconn->prepare($sql); //prepare sql
          $stmt->execute();  //execute the prepared sql



            $count = $stmt->rowCount();//no of row

            include 'disable_connection.php';  //disconnect to database
             //echo $count;
              if($count>0){
                return true;
              }
              else{
                return false;
              }
            } 

            catch (Exception $e) {
                 return false;
               } 

    }
?>

<?php 
   function addLPAccount($user_pro_id,$lpItemProId,$websiteName,$userNameOrg,$urlOrg,$passwordOrg,
             $commitMsg,$date){

           try {

             $sql = "INSERT into myDiaryDB.lastpass 
                  VALUES($user_pro_id,$lpItemProId,$websiteName,$userNameOrg,$urlOrg,$passwordOrg,
             $commitMsg,$date) ";


                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql

                $count = $stmt->rowCount();//no of row


              include 'disable_connection.php';  //disconnect to database
               // echo $count;
              if($count!=0){
                
                return true;
              }
              else{
                return false; 
              }
             
           } catch (Exception $e) {
             return false;
           }

  }





  function fetchLPList($product_Id){
    try{
     $sql = "SELECT * FROM myDiaryDB.lastpass
                  WHERE myDiaryDB.lastpass.user_P_id = $product_Id
                  ORDER BY websiteName";

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result;


           } catch (Exception $e) {
             return null;
           } 

  }


  function  deleteLpAccount($user_pro_id,$lp_pro_id){

          $sql = "DELETE FROM  myDiaryDB.lastpass 
                    where myDiaryDB.lastpass.user_P_id = $user_pro_id AND
                          myDiaryDB.lastpass.lpId = $lp_pro_id";


                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql

              //$count = $stmt->rowCount();//no of row
              include 'disable_connection.php';  //disconnect to database

  }


  function fetchLpDataForEdit($lp_pro_id){
        try{
         $sql = "SELECT * FROM myDiaryDB.lastpass
                  WHERE myDiaryDB.lastpass.lpId = $lp_pro_id ";
        

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result[0];

           } catch (Exception $e) {
             return null;
           } 
  }


function updateLpAccountId($lp_pro_id,$websiteName,$userNameOrg,$urlOrg,$passwordOrg,$commitMsg,$date){

  try {
      
      $sql ="UPDATE myDiaryDB.lastpass 
              SET myDiaryDB.lastpass.websiteName= $websiteName,
                 myDiaryDB.lastpass.userNameOrg = $userNameOrg,
                  myDiaryDB.lastpass.urlOrg= $urlOrg,
                 myDiaryDB.lastpass.passwordOrg = $passwordOrg,
                 myDiaryDB.lastpass.updateDate= $date,
                 myDiaryDB.lastpass.commitMsg = $commitMsg
                 WHERE $lp_pro_id= myDiaryDB.lastpass .lpId";

              
                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql 

                $count = $stmt->rowCount();//no of row


                include 'disable_connection.php';  //disconnect to database

                if($count!=0){
                  return true;
                }
                else{

                  return false;
                }




    } catch (Exception $e) {
      return false;
    }

 }


 function diaryPostFetch($product_id){

      try{
        $sql = "SELECT * FROM myDiaryDB.DiaryPostSchema
                  WHERE myDiaryDB.DiaryPostSchema.user_P_id = $product_id 
                  ORDER BY postDate ASC,postTime DESC";
        

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result;

           } catch (Exception $e) {
             return null;
           } 
 }

 function addPost($user_pro_id,$myItemProId,$heading,$description,$emotion,$date,$time){

           try {

             $sql = "INSERT into myDiaryDB.DiaryPostSchema 
                  VALUES ($user_pro_id,$myItemProId,$heading,$description,$emotion,$date,$time) ";


                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql

                $count = $stmt->rowCount();//no of row


              include 'disable_connection.php';  //disconnect to database
               // echo $count;
              if($count!=0){
                
                return true;
              }
              else{
                return false; 
              }
             
           } catch (Exception $e) {
             return false;
           }

 }




function deletePostMD($user_pro_id,$MD_pro_id){

               $sql = "DELETE FROM  myDiaryDB.DiaryPostSchema 
                    where myDiaryDB.DiaryPostSchema.user_P_id = $user_pro_id AND
                          myDiaryDB.DiaryPostSchema.diaryPostId = $MD_pro_id";


                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql

              //$count = $stmt->rowCount();//no of row
              include 'disable_connection.php';  //disconnect to database
}



  function updateMDPostAccount($MD_pro_id,$heading,$description,$emotion){
  try {
      
      $sql ="UPDATE myDiaryDB.DiaryPostSchema 
              SET myDiaryDB.DiaryPostSchema.description= $description,
                 myDiaryDB.DiaryPostSchema.heading = $heading,
                  myDiaryDB.DiaryPostSchema.emotion= $emotion
                 WHERE $MD_pro_id= myDiaryDB.DiaryPostSchema .diaryPostId";

              
                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql 

                $count = $stmt->rowCount();//no of row


                include 'disable_connection.php';  //disconnect to database

                if($count!=0){
                  return true;
                }
                else{

                  return false;
                }




    } catch (Exception $e) {
      return false;
    }

  }

  function fetchMdPostDataForEdit($MD_pro_id){
        try{
         $sql = "SELECT * FROM myDiaryDB.DiaryPostSchema
                  WHERE myDiaryDB.DiaryPostSchema.diaryPostId = $MD_pro_id ";
        

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result[0];

           } catch (Exception $e) {
             return null;
           } 


  }
?>

<?php
  function addEvent($user_pro_id,$eventId,$description,$venue,$eventType,$eventTime,$eventDate,  $eventPostTime,$eventPostDate){

            try {

             $sql = "INSERT into myDiaryDB.eventSchema 
                  VALUES ($user_pro_id,$eventId,$description,$venue,$eventType,$eventTime,$eventDate, 
                          $eventPostTime,$eventPostDate) ";


                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql

                $count = $stmt->rowCount();//no of row


              include 'disable_connection.php';  //disconnect to database
               // echo $count;
              if($count!=0){
                
                return true;
              }
              else{
                return false; 
              }
             
           } catch (Exception $e) {
             return false;
           }
  }



 function fetchEventList($product_Id,$date,$time){
      try{
         $sql = "SELECT * FROM myDiaryDB.eventSchema
                  WHERE (myDiaryDB.eventSchema.eventDate = $date 
                       AND myDiaryDB.eventSchema.eventTime>= $time) AND
                    $product_Id = myDiaryDB.eventSchema.user_P_id
                    ORDER BY myDiaryDB.eventSchema.eventTime";
        

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 
        'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result;

           } catch (Exception $e) {
             return null;
           }
   
 }

  function  fetchUpcomingEventList($product_Id,$date){
      try{
         $sql = "SELECT * FROM myDiaryDB.eventSchema
                  WHERE myDiaryDB.eventSchema.eventDate > $date  AND
                    $product_Id = myDiaryDB.eventSchema.user_P_id
                    ORDER BY myDiaryDB.eventSchema.eventTime, 
                             myDiaryDB.eventSchema.eventDate";
        

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result;

           } catch (Exception $e) {
             return null;
           }
   
 }




 function fetchtodayPassEventList($product_Id,$date,$time){
      try{
         $sql = "SELECT * FROM myDiaryDB.eventSchema
                  WHERE (myDiaryDB.eventSchema.eventDate = $date 
                       AND myDiaryDB.eventSchema.eventTime< $time) AND
                    $product_Id = myDiaryDB.eventSchema.user_P_id
                    ORDER BY myDiaryDB.eventSchema.eventTime";
        

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 
        'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result;

           } catch (Exception $e) {
             return null;
           }
   
 }


 function fetchPassEventList($product_Id,$date){
      try{
         $sql = "SELECT * FROM myDiaryDB.eventSchema
                  WHERE myDiaryDB.eventSchema.eventDate < $date 
                        AND
                    $product_Id = myDiaryDB.eventSchema.user_P_id
                    ORDER BY myDiaryDB.eventSchema.eventTime, 
                            myDiaryDB.eventSchema.eventDate";
        

      $dbconn=connectivityDB();// check connection
      $stmt = $dbconn->prepare($sql); //prepare sql
      $stmt->execute();  //execute the prepared sql

      $result=$stmt->fetchAll();


        //$count = $stmt->rowCount();//no of row

        include 'disable_connection.php';  //disconnect to database
         //echo $count;
          
        return $result;

           } catch (Exception $e) {
             return null;
           }
   
 }

 function deleteEvent($user_id,$eventId){

            $sql = "DELETE FROM  myDiaryDB.eventSchema 
                    where myDiaryDB.eventSchema.user_P_id = $user_id AND
                          myDiaryDB.eventSchema.eventId = $eventId";


                $dbconn=connectivityDB();// check connection

                $stmt = $dbconn->prepare($sql); //prepare sql

                $stmt->execute();  //execute the prepared sql

              //$count = $stmt->rowCount();//no of row
              include 'disable_connection.php';  //disconnect to database
 } 





function uploadUserProfilePic($id, $image){
    try{
        $idSql = "UPDATE myDiaryDB.user_pro_pic_schema SET myDiaryDB.user_pro_pic_schema.user_img = ? WHERE myDiaryDB.user_pro_pic_schema.user_product_id = $id";

        $dbconn=connectivityDB();// check connection


        $idPrepareStmt = $dbconn->prepare($idSql);

        $idPrepareStmt->bindValue(1, $image, PDO::PARAM_STR);

        $idPrepareStmt->execute();

        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}



function fetchImageOfUser($id){
    try{
        $idSql = "SELECT * FROM myDiaryDB.user_pro_pic_schema
                WHERE myDiaryDB.user_pro_pic_schema.user_product_id = $id LIMIT 1";

        $dbconn=connectivityDB();// check connection

        $stmt = $dbconn->prepare($idSql);

        $stmt->execute();
      
         $result=$stmt->fetchAll();

        return $result[0];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}



?>

