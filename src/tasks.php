<?php
   session_start();
   require'../connect.php';
   
   $building=$_SESSION['building'];
   $sql="SELECT * FROM tasks WHERE building='$building';";
   $result=mysqli_query($database,$sql);
    // while($row=mysqli_fetch_assoc($result)){
    //     $row
    // }    
   
  
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
            
        <form action="#" method="post">

            <div class="list show general" >
                <input type="submit" value="DONE">
                <?php
                    function card($res){
                        while($row=mysqli_fetch_assoc($res)){
                            $current=date('Y-m-d H:i:s');
                            $datetime1 = new DateTime($row['time']);//start time
                            $datetime2 = new DateTime($current);//end time
                            $interval = $datetime1->diff($datetime2);
                            $days= $interval->format('%a days');
                            $days=2;
                            if($days<3){
                                echo '<div class="card"><p>TASK ID:'.$row['id']
                                .'</p><p>HOUSE NUMBER:'.$row['house_no']
                                .'</p><p>TASK:'.$row['task']
                                .'</p><p>EMAIL'.$row['email']
                                .'</p><p>REPORTED:'.$days
                                .' DAYS AGO</p><input type="radio" value="'.$row['id'].'" name="done">COMPLETE</div>';
                            }else{
                                echo '<div class="overdue"><div class="card"><p>TASK ID:'.$row['id']
                                .'</p><p>HOUSE NUMBER:'.$row['house_no']
                                .'</p><p>TASK:'.$row['task']
                                .'</p><p>EMAIL'.$row['email']
                                .'</p><p>REPORTED:'.$days
                                .' DAYS AGO</p><input type="radio" value="'.$row['id'].'" name="done">COMPLETE</div></div>';
                            }
                         }
                    } 

                     $sql="SELECT * FROM tasks WHERE (category='general'AND building='$building');";
                     $result=mysqli_query($database,$sql);
                     card($result);
                     
                ?>
            </div>    
            <div class="list plumbing">
                <?php
                    $sql="SELECT * FROM tasks WHERE (category='plumbing'AND building='$building');";
                    $result=mysqli_query($database,$sql);
                    card($result);
                ?>
            </div>
            <div class="list electric">
                <?php
                    $sql="SELECT * FROM tasks WHERE (category='electric'AND building='$building');";
                    $result=mysqli_query($database,$sql);
                    card($result);
                ?>

            </div>
         </form>

    </div>
<script src="ten_maintenance.js"></script>
</body>
</html>