<?php 
require_once('loader.php');
 $tmpfile=$_FILES["file"]["tmp_name"];
                                $size=$_FILES["file"]["size"];
                                $filename=basename($_FILES["file"]["name"]);                              
                                $type=$_FILES["file"]["type"];
                                $destination="uploads";
                                $file_upload=move_uploaded_file ( $tmpfile  ,$destination."/".$filename );
                                if($file_upload)
		

$Priority   = urldecode($_POST['Priority']);
$myLocation   = urldecode($_POST['myLocation']);
$User   = urldecode($_POST['User']);
$message   = urldecode($_POST['message']);
$Category   = urldecode($_POST['Category']);
$Priority = (int)$Priority;

$res = storeComplaint( $Priority, $myLocation, $User,$message,$Category,$filename);
if($res ){


}else{
echo "fail";
}

?>