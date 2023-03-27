<?php
   session_start();
   require'../connect.php';
   
   $building=$_SESSION['building'];
   $message="";
   if(isset($_POST['Submit'])){
        $task_id=0;
         if(isset($_POST['done'])){
            $task_id=$_POST['done'];
            $sql="SELECT * FROM tasks WHERE id='$task_id';";
            $result=mysqli_query($database,$sql);
            $task=mysqli_fetch_assoc($result);
            $house_no=$task['house_no']; 
            $category=$task['category'];
            $db_task=$task['task'];
            $time_reported=$task['time'];
            
            $sql="INSERT INTO completed(id,house_no,building,category,task,time_reported)
            VALUES('$task_id','$house_no','$building','$category','$db_task','$time_reported')";
            if ($database->query($sql)===TRUE) 
            {
                $sql="DELETE FROM tasks WHERE id='$task_id';";
                if($database->query($sql)===TRUE){
                    $message="DONE";
                }
            }else{
               $message="ERROR";
            }
           
        }
   }

   
  
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
    <link rel="stylesheet" href="tasks.css">
</head>
<body>
    <?php 
    require'nav.php';
    if(!empty($message)){
        echo $message;
    }
    ?>
    <div class='container'>
            <div class="category">
                <span class="active general">General</span>
                <span class="electric">Electric</span>
                <span class="plumbing">Plumbing</span>
            </div> 
            

            
        <form action="tasks.php" method="post">
            <input type="Submit" value="DONE" name="Submit">

            <div class="list show general" >
                <?php
                    function card($res){
                        while($row=mysqli_fetch_assoc($res)){
                            $current=date('Y-m-d H:i:s');
                            $datetime1 = new DateTime($row['time']);//start time
                            $datetime2 = new DateTime($current);//end time
                            $interval = $datetime1->diff($datetime2);
                            $days= $interval->format('%a');
                            if($days<3){
                                echo '<div class="card" style="order:-'.$days.'"><p>TASK ID:'.$row['id']
                                .'</p><p>HOUSE NUMBER:'.$row['house_no']
                                .'</p><p>TASK:'.$row['task']
                                .'</p><p>EMAIL'.$row['email']
                                .'</p><p>REPORTED:'.$days
                                .' DAYS AGO</p><input type="radio" value="'.$row['id'].'" name="done">COMPLETE</div>';
                            }else{
                                echo '<div class="overdue" style="order:-'.$days.'"><div class="card"><p>TASK ID:'.$row['id']
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