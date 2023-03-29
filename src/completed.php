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
    <title>Completed Tasks</title>
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
          
            

            
        <form action="tasks.php" method="post">
            <input type="Submit" value="DONE" name="Submit">

            <div class="list show" >
                <?php
                    function card($res){
                        while($row=mysqli_fetch_assoc($res)){
                            $current=date('Y-m-d H:i:s');
                            $datetime1 = new DateTime($row['time_reported']);//start time
                            $datetime2 = new DateTime($row['time_completed']);//end time
                            $interval = $datetime1->diff($datetime2);
                            $days= $interval->format('%a');
                            
                                echo '<div class="card" style="order:-'.$days.'"><p>TASK ID:'.$row['id']
                                .'</p><p>HOUSE NUMBER:'.$row['house_no']
                                .'</p><p>TASK:'.$row['task']
                                .'</p><p>CATEGORY'.$row['category']
                                .'</p><p>COMPLETED IN:'.$days
                                .' DAYS</p></div>';
                            

                         }
                    } 

                     $sql="SELECT * FROM completed WHERE building='$building';";
                     $result=mysqli_query($database,$sql);
                     card($result);
                     
                ?>
            </div>    
         </form>

    </div>
<script src="ten_maintenance.js"></script>
</body>
</html>