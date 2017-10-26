<?php



       function connectivityDB(){


        	try{
        			
            $servername = "localhost";
            $username = "root";
            $password = "birat123";
            $dbname = "myDiaryDB";
           $dBconnection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                 
            }
              
			catch(PDOException $e)
			  {
			   echo '<script type="text/javascript">alert("!!! Connection Failed");</script>';
			    echo "Connection failed: " . $e->getMessage();
			  }
          return $dBconnection;
           }

?>