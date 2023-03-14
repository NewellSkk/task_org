<?php
   
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
    <link rel="stylesheet" href="home.css">


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
                        <div class="fl iconBox"><i class="material-icons">location_city</i></div>
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
                        <div class="fl iconBox"><i class="material-icons">vpn_key</i></div>
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
        <p>WAGWAN_TEST_TEXT</p>
    </div>
    <script src="tenants.js"></script>
</body>
</html>