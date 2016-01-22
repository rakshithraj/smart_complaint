<?php 
require_once('loader.php');
$User   = urldecode($_POST['User']);

 $tmpfile=$_FILES["file"]["tmp_name"];
                                $size=$_FILES["file"]["size"];
                                $filename=basename($_FILES["file"]["name"]);                              
                                $type=$_FILES["file"]["type"];
                                $destination="profile";
                                $file_upload=move_uploaded_file ( $tmpfile  ,$destination."/".$filename );
                                if($file_upload)		
$res = updateProfilePic($User,$destination."/".$filename);
if($res ){
echo $destination."/".$filename;

}else{
echo "fail";
}

?>