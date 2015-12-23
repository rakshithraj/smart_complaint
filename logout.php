<?php

setcookie("login",false,time()-3600);
header('Location: admin.html');
?>