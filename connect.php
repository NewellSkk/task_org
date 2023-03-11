<?php
    $database=mysqli_connect('localhost','root','','task_org');
    if(!$database){
        echo "databaSe failed to connect" .mysqli_connect_error();
    } else{
      echo "<p style='color:white'>Database connected";
    }
?>