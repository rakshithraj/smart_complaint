<?php
require_once('loader.php');
         
		   if( isset($_GET['complaint_status']) ){
                 $complaint_status= htmlentities($_GET['complaint_status']);
                   $userId= htmlentities($_GET['userId']);
                   $complaintId= htmlentities($_GET['complaintId']);
                $tablename = htmlentities($_GET['table']);
                $rowid= htmlentities($_GET['rowid']);
                $table=$tablename."table";

                if($complaint_status == "pending")
                  $mystatus=0;
                    else
                 if($complaint_status == "inprogress")
                        $mystatus=1;
                    else
                         $mystatus=2;
						 
                //echo $table." ".$complaint_status." ".$userId." ".$complaintId." ".$mystatus." ";
                   
                  $result=mysql_query("UPDATE $table SET status='$mystatus' WHERE complaintId='$rowid'");
              


                
	              $GcmIdresult=mysql_query("SELECT * FROM logintable WHERE Email = '$userId'") or die(mysql_error());
	 
	              $gcmRegID=null;
                  while ($row = mysql_fetch_assoc($GcmIdresult))
                  {
                   $gcmRegID=$row['GcmId'];
                   }
			  
			       if($gcmRegID){
                       $registatoin_ids = array($gcmRegID);
 
                        $completeId=$complaintId." compaint is ".$complaint_status;	
 
		                 $message = array("message" => $completeId);
                       $push_notif_result = send_push_notification($registatoin_ids, $message);
                     }
                }

//if($result)
            //     header('Location: index.php');
                 //header("location:javascript://history.go(-1)");
            //         else
            //    echo "fail";
            
?>