<?php   
    session_start();
    require'../connect.php';

    $ten_name=$ten_email=$ten_house=$message='';
    $password='123';
    $building=$_SESSION['building'];
    if(isset($_POST['Add'])){
        $ten_name=htmlspecialchars($_POST['name']);
        $ten_email=htmlspecialchars($_POST['email']);
        $ten_house=htmlspecialchars($_POST['house']);
        

            // CHECKING IF THE DATA IS ALREADY SET
        $sql="SELECT * FROM tenant WHERE (house_no='$ten_house'AND building='$building');";
        $result=mysqli_query($database,$sql);    
        if((mysqli_num_rows($result))>0)
        {
            $message='<p style="color:red">HOUSE NUMBER IS ALREADY IN THE DATABASE';
        }else {
            // INSERTING DATA IN DATABASE
        $password=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO tenant(name,email,house_no,building,password)
        VALUES('$ten_name','$ten_email','$ten_house','$building','$password')";
        if ($database->query($sql)===TRUE) 
        {
            $message='<p style="color:green">TENANT ADDED';
        }
        }
     


 
    }
    if(isset($_POST['Remove'])){
        $ten_house=htmlspecialchars($_POST['house']);
        $sql="SELECT * FROM tenant WHERE (house_no='$ten_house'AND building='$building');";
        $result=mysqli_query($database,$sql);    
        if((mysqli_num_rows($result))>0)
        {
            $sql="DELETE FROM tenant WHERE house_no = '$ten_house' AND building='$building'";
            if ($database->query($sql)===TRUE) 
            {
                $message='<p style="color:red">DELETED SUCCESSFULLY';
            }
    
        }else{
            $message='<p style="color:red">HOUSE NUMBER NOT FOUND';
        }
    }
    $database->close();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sign-up.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="index.css">


</head>
<body>
    <?php 
    require'nav.php'
    ?>
    <div class='container'>
        <p class='records'>MODIFY TENANT RECORDS</p>
        <div class='toggle tenant_form'>
            <form method="post" action="#">
        
                <!--House Number-->
                    <div class="box">
                        <label for="buildingName" class="fl label"> House Number: </label>
                        <div class="fl iconBox"><i class="material-icons">home</i></div>
                        <div class="fl">
                                <input type="text" required name="house"
                        placeholder="House Number" class="textBox">
                        </div>
                        
                    </div>
                <!--House Number-->

                <!---Email ID-->
                    <div class="box">
                    <label for="email" class="fl label"> Email Address: </label>
                        <div class="fl iconBox"><i class="material-icons" >email</i></div>
                        <div class="fl">
                                <input type="email" required name="email" placeholder="Email " class="textBox">
                        </div>
                        
                    </div>
                <!--Email ID-->


                <!--Name-->
                    <div class="box">
                    <label for="password" class="fl label"> Name </label>
                        <div class="fl iconBox"><i class="material-icons">person</i></div>
                        <div class="fl">
                                <input type="text" required name="name" placeholder="Name" class="textBox">
                        </div>
                        
                    </div>
                <!---Password-->

                <!--Buttons-->
                    <div class="box" >
                        <input type="Submit" name="Add" class="submit" value="ADD">
                        <input type="Submit" name="Remove" class="fr submit" value="DELETE">
                    </div>
                <!--Buttons-->
            </form>
        </div>
        <p><?php 
                if(!empty($message)){echo $message.'</p>';}
                ?>    
        </p>        
        <p>WAGWAN_TEST_TEXT</p>
    </div>
    <script src="tenants.js"></script>
</body>
</html>