<?php
require_once('loader.php');
         
//		   if( isset($_POST['table']) ){
 //  $tablename = htmlentities($_POST['table']);
 //  $resultUsers =mysql_query("SELECT * FROM ".$tablename."table");
//   }else{
//   $tablename="traffic";
 //   $resultUsers =mysql_query("SELECT * FROM traffictable");
//	}
//pagination
        $rec_limit = 2;
        if( isset($_GET['table']) ){
		
        $tablename = htmlentities($_GET['table']);
       
		//$sql = "SELECT count(emp_id) FROM ".$tablename."table";
         //$resultUsers =mysql_query("SELECT * FROM ".$tablename."table");
        }else{
          $tablename="traffic";
		  //$sql = "SELECT count(emp_id) FROM employee ";
          //$resultUsers =mysql_query("SELECT * FROM traffictable");
		   
     	}
		
         $sql = "SELECT count(complaintId) FROM ".$tablename."table";
         $retval = mysql_query( $sql );
		  
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysql_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'page'} ) )
         {
		    
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
			 
         }
         else
         {
            $page = 0;
            $offset = 0;
         }
		
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT * FROM ".$tablename."table ".
            "LIMIT $offset, $rec_limit";
			
            
         $retval = mysql_query( $sql );
        
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
       if ($retval != false)
		$NumOfUsers = mysql_num_rows($retval);
	   else
		$NumOfUsers = 0;

//pagination
	//if ($resultUsers != false)
	//	$NumOfUsers = mysql_num_rows($resultUsers);
	//else
		//$NumOfUsers = 0;
		 
		
		  if( !isset($_POST['table']) ){
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
                          setcookie("login", true, time()+3600);
			   break;
			   }
			   
              }
		
		if($login){	
		
		}else{
		 header('Location: admin.php');
		
		}
		
		
    }else if($_COOKIE["login"]){
          


      }else
      {
	
	    header('Location: admin.php');
	   exit();
	}
	
	}
		
  
 
		
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Complaint Page</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="demo/ResponsiveTables/css/style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<style>

	</style>

</head>

<body>

	<div id="page-wrap">

	<form action="index.php" method="get">
              <select name="table">
                <option value="traffic">traffic</option>
                <option value="mescom">mescom</option>
                <option value="mnpo">mnpo</option>
                <option value="police" selected>police</option>
              </select>
			  <input type="submit" value="Go"></input>
			  </form>
	     <a href="admin.html" style="float: right;"   >Logout</a> 

	
	
	
		
	<table>
		<tr>
                  <th>complaintId</th>
				  <th>userId </th>
				  <th>myLocation </th>
				  <th>message</th>
				  <th>status</th>
				  <th>Image</th>
				  <th>send message </th>
                                  <th>update Status</th>
				               <?php
                if ($NumOfUsers > 0) {
                    $i=1;
                    while ($rowUsers = mysql_fetch_array($retval, MYSQL_ASSOC)) {
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
						 <form action=<?php echo "uploads/".$rowUsers["image"] ?> method="post">                          
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
					 
		                <td>
						 
                           <form action="updatestatus.php" method="post">
                            <select name="complaint_status">
                            <option value="pending" <?php if($rowUsers["status"]== 0) echo"selected"; ?> >pending</option>
                            <option value="inprogress" <?php if($rowUsers["status"]== 1) echo"selected"; ?>>inprogress</option>
                            <option value="resolved" <?php if($rowUsers["status"]== 2) echo"selected"; ?>>resolved</option>                          
                           </select>
                            <input type="hidden" name="mytable"  value=<?php echo $tablename ?>></input>
                           <input type="hidden" name="userId"  value=<?php echo $rowUsers["userId"] ?>></input>
                          <input type="hidden" name="rowid"  value=<?php echo $rowUsers["complaintId"] ?>></input>
                           <input type="hidden" name="complaintId"  value=<?php echo $rowUsers["Category"]."_".$rowUsers["complaintId"] ?>></input>                        
			  <input type="submit" value="Update"></input>
			  </form>
						</td>
					 </tr>
					 
					 
                    <?php }
                } else { ?> 
                      
                <?php } ?>
          
          

                </tr>
	</table>
	
	          
		<ul class="pagination">
		
		<?php if( $left_rec < $rec_limit )
         { 
		  
            $last = $page - 2;  
			?>
           <li id="first"><a href=<?php echo "index.php?page=$last&&table=$tablename" ?>>« Previous</a></li>
         <?php  } 
		 
		else
		 if( $page > 0 )
         {  
		 
            $last = $page - 2;  ?>
			
            <li id="first"><a href=<?php echo "index.php?page=$last&&table=$tablename" ?>>« Previous</a></li>
            <li id="last"><a href=<?php echo "index.php?page=$page&&table=$tablename" ?>>Next »</a></li>
         <?php } 
         
         else if( $page == 0 )
         {   ?>
           <li id="last"><a href=<?php echo "index.php?page=$page&&table=$tablename" ?>>Next »</a></li>
		   
			<?php } ?>
			
         
		 
		 
	      
   		</ul>
	
	</div>
		
</body>

</html>