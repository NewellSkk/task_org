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
        <form action="#" method="post">
            <div>
                <input type="text" name="find_house" placeholder="HOUSE NUMBER">
                <input type="submit" name="find_btn"value="FIND">
            </div>
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
                    
                    if (isset($_POST['find_btn'])) {
                        $find_house=$_POST['find_house'];
                        $sql="SELECT * FROM completed WHERE (building='$building' AND house_no='$find_house');";
                        $result=mysqli_query($database,$sql);
                        card($result);
                        if(!((mysqli_num_rows($result))>0))  {
                            echo "<div>NO TASKS FOUND!</div> ";
                            sleep(2);
                            header("location:completed.php");
                
                        }                      
                    }else{
                        $sql="SELECT * FROM completed WHERE building='$building';";
                        $result=mysqli_query($database,$sql);
                         card($result);
                    } 
                ?>
            </div>    
         </form>

    </div>
<script src="ten_maintenance.js"></script>
</body>
</html>