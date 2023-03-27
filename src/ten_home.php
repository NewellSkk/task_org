<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="sign-up.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
</head>
<body>
    <?php
     require'ten_nav.php';
    ?>
    <div class="container">
        <!-- DISPLAY ACCOUNT DETAILS -->
        <div class="box records"> 
            <div class="fl iconBox">
                <i class="material-icons">list</i>
            </div>
            <label class="fl label"> Account Details </label>
        </div>

     
        <div class='toggle tenant_form'>

            <p>Name:<?php echo $_SESSION['ten_name']?></p>
            <p>House Number:<?php echo $_SESSION['house_no']?></p>
            <p>Email:<?php echo $_SESSION['ten_email']?></p>
        </div> 

        <!-- CHANGE PASSWORD -->
        <div class="box">
            <div class="fl iconBox">
                <i class="material-icons">mode_edit</i>
            </div>
            <label class="fl label"> Change Password </label>
        </div>
        <!-- 
            DISPLAY FORM HERE
         -->
    </div> 
    <script src="tenants.js"></script>   
</body>
</html>