<?php
require_once('loader.php');
         
		   if( isset($_POST['table']) ){
   $tablename = htmlentities($_POST['table']);
   $resultUsers =mysql_query("SELECT * FROM ".$tablename."table");
   }else{
   $tablename="traffic";
    $resultUsers =mysql_query("SELECT * FROM traffictable");
	}
	if ($resultUsers != false)
		$NumOfUsers = mysql_num_rows($resultUsers);
	else
		$NumOfUsers = 0;
		 
		 
		  if( !isset($_POST['table'])  ){
        if( isset($_POST['username']) &&  isset($_POST['password']))  {
		 $username = htmlentities($_POST['username']);
	     $password = htmlentities($_POST['password']);
		 $login=false;
		 $getadmin = mysql_query("SELECT * FROM admintable WHERE username = '$username' LIMIT 1");
		 while ($row = mysql_fetch_assoc($getadmin))
              {
               $myusername=$row['username'];
			   $mypassword=$row['password'];
			   if($mypassword == $password){
			   $login=true;
			   break;
			   }
			   
              }
		
		if($login){	
		
		}else{
		echo "not admin";
	   return "not admin";
	   exit();
		
		}
		
		
    }else{
	
	   echo "not admin";
	   return "not admin";
	   exit();
	}
	
	}
		
  
 
		
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
               
            });
          
        </script>
        <style type="text/css">
            
            h1{
                font-family:Helvetica, Arial, sans-serif;
                font-size: 24px;
                color: #777;
            }
            div.clear{
                clear: both;
            }
            
            textarea{
                float: left;
                resize: none;
            }
            
        </style>
    </head>
    <body>
        
        <form action="new.php" method="post">
              <select name="table">
                <option value="traffic">traffic</option>
                <option value="mescom">mescom</option>
                <option value="mnpo">mnpo</option>
                <option value="police" selected>police</option>
              </select>
			  <input type="submit" value="Go"></input>
			  </form>
			    
        <table  width="910" cellpadding="1" cellspacing="1" style="padding-left:10px;">
         <tr>
           <td align="left">
		   <h1><?php echo $tablename ?> No of complaint <?php echo $NumOfUsers; ?></h1>
			
              <hr/>
           </td>
          </tr> 
          <tr>
            <td align="center">
              <table width="100%" border='1'>
                <tr>
                  <th>complaintId</th>
				  <th>userId </th>
				  <th>myLocation </th>
				  <th>message</th>
				  <th>status</th>
				  <th>Image</th>
				  <th>send message </th>
				               <?php
                if ($NumOfUsers > 0) {
                    $i=1;
                    while ($rowUsers = mysql_fetch_array($resultUsers)) {
						if($i%3==-1)
						
                 ?>
                     <tr>
					 <td><?php echo $rowUsers["Category"] ?>_<?php echo $rowUsers["complaintId"] ?></td>
					 <td><?php echo $rowUsers["userId"] ?></td>
					 <td><?php echo $rowUsers["myLocation"] ?></td>
					 <td><?php echo $rowUsers["message"] ?></td>
					    <?php 
                        if($rowUsers["status"]==0) {?> 
						 <td>pending</td>
						   <?php 
                         } ?> 
						   <?php 
                        if($rowUsers["status"]==1) {?> 
						 <td>inprogress</td>
						   <?php 
                         } ?> 
						   <?php 
                        if($rowUsers["status"]==2) {?> 
						 <td>Resolved</td>
						   <?php 
                         } ?> 
						 
						 <td>
						 <form action="seeimage.php" method="post">                          
                         <input type="hidden" name="image" id="image" value=<?php echo $rowUsers["image"] ?>></input>
                             <input type="submit" value="see Image"></input>
                              </form>
						 </td>
						 
						 
						 
						 
						 <td>
						 
                            <form action="urphpfilename.php" method="post">
   
                           <input type="text" name="message" id="message"></input>
                         <input type="hidden" name="userId" id="message" value=<?php echo $rowUsers["userId"] ?>></input>
                             <input type="submit" value="send"></input>
                              </form>
						</td>
					 
					 </tr>
					 
					 
                    <?php }
                } else { ?> 
                      
                <?php } ?>
          
                    
                </tr>
                </table>
            </td>
          </tr>  
        </table>
        
        
    </body>
</html>
