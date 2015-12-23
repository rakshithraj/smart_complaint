<?php
require_once('loader.php');
if( isset($_POST['message']) )
{
    //be sure to validate and clean your variables
    $val1 = htmlentities($_POST['message']);
	 $userId = htmlentities($_POST['userId']);
	 
	 $GcmIdresult=mysql_query("SELECT * FROM logintable WHERE Email = '$userId'") or die(mysql_error());
             while ($row = mysql_fetch_assoc($GcmIdresult))
              {
               $gcmRegID=$row['GcmId'];
              }
            $registatoin_ids = array($gcmRegID);
	
            $completeId=$val1;	
			  	
		 $message = array("message" => $completeId);
            $push_notif_result = send_push_notification($registatoin_ids, $message);
	 
	 
	   exit();
}
?>