<?php
require_once('loader.php');
if( isset($_POST['image']) )
{
   $image= htmlentities($_POST['image']);
   $path="/uploads/".$image;
  echo $path;

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
        <img src=<?php echo $path ?> alt="Smiley face">
      
        
        
    </body>
</html>


