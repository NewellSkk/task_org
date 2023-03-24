<?php
   session_start();
   require'../connect.php';
   
   $building=$_SESSION['building'];
  
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="ten_maintenance.css">
</head>
<body>
    <?php 
    require'nav.php'
    ?>
     <div class='container'>
            <div class="category">
            <span class="active general">General</span>
            <span class="electric">Electric</span>
            <span class="plumbing">Plumbing</span>
            </div>
            
            <div class="list show general" >
                <?php
                     $sql="SELECT * FROM tasks WHERE (category='general'AND building='$building');";
                     $result=mysqli_query($database,$sql);
                     while($row=mysqli_fetch_assoc($result)){
                        echo '<p>'.$row['task'].' '.$row['house_no'].'</p>';
                     }
                ?>
            </div>    
            <div class="list plumbing">
            
            </div>
            <div class="list electric">

            </div>
     </div>
    <script src="ten_maintenance.js"></script>
</body>
</html>