<?php
    session_start();
    require'../connect.php';
    if(isset($_POST['Login'])){
        $building=$password='';

        $building=htmlspecialchars($_POST['building']);
        $password=htmlspecialchars($_POST['password']);

        $message='';
        if(empty($building)){
            $message='Enter building name';
        }
        elseif(empty($password)){
            $message='Enter password';
        }

        //CROSS CHECKING LOGIN DATA WITH DATABASE
        $sql="SELECT * FROM admin WHERE building='$building';";
        $result=mysqli_query($database,$sql);
        $db_data=mysqli_fetch_assoc($result);
        $db_pass=$db_data['password'];
        if(password_verify($password,$db_pass)){
            $_SESSION['building']=$building;
            $_SESSION['name']=$db_data['name'];

            header("Location:index.php");

        }
        else{
            $message="Error";
        }
        

    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="sign-up.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<!-- Body of Form starts -->
    <div class="container">
        <div class='title'>
            login
        </div>
        <form method="post" action="#">
       
        <!--Building name-->
            <div class="box">
                <label for="buildingName" class="fl label"> Building name: </label>
                <div class="fl iconBox"><i class="material-icons">location_city</i></div>
                <div class="fl">
                        <input type="text" required name="building"
                placeholder="Building Name" class="textBox">
                </div>
                
            </div>
        <!--Building name-->

        <!---Password-->
            <div class="box">
            <label for="password" class="fl label"> Password </label>
                <div class="fl iconBox"><i class="material-icons">vpn_key</i></div>
                <div class="fl">
                        <input type="Password" required name="password" placeholder="Password" class="textBox">
                </div>
                
            </div>
       <!---Password-->

        <!--Login Button-->
            <div class="box" >
                <input type="Submit" name="Login" class="fr submit" value="LOGIN">
            </div>
        <!--Login Button-->
        </form>
        <div><a href="signup.php">Create account</a></div>
        <div style='color:red; text-align:center'>
            <?php 
                if(!empty($message)){echo '<p>'.$message.'</p>';}                
            ?>
        </div>
    </div>
<!--Body of Form ends-->
</body>
</html>