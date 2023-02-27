<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<!-- Body of Form starts -->
    <div class="container">
        <form method="post">
       
        <!--Building name-->
            <div class="box">
            <label for="buildingName" class="fl label"> Building name: </label>
                <div class="fl iconBox"><i class="material-icons">location_city</i></div>
                <div class="fr">
                        <input type="text" required name="buildingName"
                placeholder="Building Name" class="textBox">
                </div>
                
            </div>
        <!--Building name-->

        <!---Email ID-->
            <div class="box">
            <label for="email" class="fl label"> Email Address: </label>
                <div class="fl iconBox"><i class="material-icons" >email</i></div>
                <div class="fr">
                        <input type="email" required name="email" placeholder="Email " class="textBox">
                </div>
                
            </div>
       <!--Email ID-->


        <!---Password-->
            <div class="box">
            <label for="password" class="fl label"> Password </label>
                <div class="fl iconBox"><i class="material-icons">vpn_key</i></div>
                <div class="fr">
                        <input type="Password" required name="password" placeholder="Password" class="textBox">
                </div>
                
            </div>
       <!---Password-->

        <!--Login Button-->
            <div class="box" >
                                       <button class="fr submit">LOGIN</button>
            </div>
        <!--Login Button-->
        </form>
        <div><a href="signup.php">Create account</a></div>
    </div>
<!--Body of Form ends-->
</body>
</html>
