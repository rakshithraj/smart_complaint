<?php


 function getAllUsers() {
        $result = mysql_query("select * FROM traffictable");
        return $result;
    }


  function myfunction() {
       echo "hai";
    }


   //Storing new user and returns user details
   
   function storeUser($Email, $Password, $Name,$Age,$Contact,$City,$State,$sex,$GcmId,$profile_pic) {
	   
        // insert user into database
        $result = mysql_query("INSERT INTO logintable(Email, Password, Name,Age,Contact,City,State,sex,GcmId,profile_pic) VALUES('$Email', '$Password', '$Name','$Age','$Contact','$City','$State','$sex','$GcmId','$profile_pic')");
		
        // check for successful store
        if ($result) {
			
            // get user details
            $id = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM logintable WHERE Email = '$Email'") or die(mysql_error());
            // return user details
            if (mysql_num_rows($result) > 0) {
                return mysql_fetch_array($result);
            } else {
                return false;
            }
			
        } else {
            return false;
        }
    }
	
	function storeFacebookUser($Email, $Password, $Name,$Age,$Contact,$City,$State,$sex,$GcmId,$profile_pic) {
	   
        // insert user into database
        $result = mysql_query("INSERT INTO logintable(Email, Password, Name,Age,Contact,City,State,sex,GcmId,profile_pic,Type) VALUES('$Email', '$Password', '$Name','$Age','$Contact','$City','$State','$sex','$GcmId','$profile_pic','FACEBOOK')");
		
        // check for successful store
        if ($result) {
			
            // get user details
            $id = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM logintable WHERE Email = '$Email'") or die(mysql_error());
            // return user details
            if (mysql_num_rows($result) > 0) {
                return mysql_fetch_array($result);
            } else {
                return false;
            }
			
        } else {
            return false;
        }
    }

	
	function isUserExisted($Email) {
        $result    = mysql_query("SELECT email from logintable WHERE Email = '$Email'");
        $NumOfRows = mysql_num_rows($result);
        if ($NumOfRows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }
   	
	function getUserDetail($Email) {
        $result    = mysql_query("SELECT * from logintable WHERE Email = '$Email'");
		 $NumOfRows = mysql_num_rows($result);
        if ($NumOfRows <= 0) {
		   echo "null";
		    return;
		}
        $rows = array();
        while($r = mysql_fetch_assoc($result)) 
          $rows[] = $r;		
        echo json_encode($rows);
    }


   function login($LoginEmail,$LoginPassword) {
      $result    = mysql_query("SELECT * from logintable WHERE Email = '$LoginEmail' and Password ='$LoginPassword'" );
	  $NumOfRows = mysql_num_rows($result);
        if ($NumOfRows <= 0) {
		   echo "failed";
		    return;
		}
        $rows = array();
        while($r = mysql_fetch_assoc($result)) 
          $rows[] = $r;		
        echo json_encode($rows);
    }
   
   
   function storeComplaint( $Priority, $myLocation, $User,$message,$Category,$filename) {
	   
	   if($Category=="traffictable")
	      $value="traffic";
	  else
        if($Category=="policetable")
	      $value="police";
	   else
        if($Category=="mescomtable")
	      $value="mescom";
       else
        if($Category=="mnpotable")
	      $value="mnpo";		  
	   
	   
        // insert user into database
        $result = mysql_query("INSERT INTO ".$Category."(Priority, myLocation, userId,message,image) VALUES('$Priority', '$myLocation', '$User','$message','$filename')");
		
        // check for successful store
        if ($result) {
			
            // get user details
            $id = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM ".$Category." WHERE image = '$filename'") or die(mysql_error());
            // return user details
            if (mysql_num_rows($result) > 0) {
		 	 $GcmIdresult=mysql_query("SELECT * FROM logintable WHERE Email = '$User'") or die(mysql_error());
             while ($row = mysql_fetch_assoc($GcmIdresult))
              {
               $gcmRegID=$row['GcmId'];
              }
            $registatoin_ids = array($gcmRegID);
	
            $completeId="complete registred ID ".$value."_".$id;	
			  	
		 $message = array("message" => $completeId);
            $push_notif_result = send_push_notification($registatoin_ids, $message);	
                return mysql_fetch_array($result);
            } else {
                return false;
            }
			
        } else {
            return false;
        }
    }
   
    function updateProfilePic( $User,$filename) {
	   
		  
	   
	   
        // insert user into database
        $result = mysql_query("UPDATE `logintable` SET `profile_pic`='$filename' WHERE Email='$User'");
		
        // check for successful store
        if ($result) {
			return true;
        } else {
            return false;
        }
    }
   
   
   function sendNotification( $id,$User,$Category){
     
     }
   
   
    function send_push_notification($registatoin_ids, $message) {
        

        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );

        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
		//print_r($headers);
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
        echo $result;
    }
   
   
   function updateUser($Email, $Password, $Name,$Age,$Contact,$City,$State,$sex,$GcmId,$profile_pic) {
	   
	 
	    $result = mysql_query("UPDATE logintable SET Name='$Name',Name='$Name',Age='$Age',Contact='$Contact',
		State='$State',sex='$sex',GcmId='$GcmId',profile_pic='$profile_pic' WHERE Email='$Email'");
	 
      
    }
?>