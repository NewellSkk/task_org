<?php

$database=mysqli_connect('localhost','newell','Trojan','scheduler');
if(!$database){
    echo "databaSe failed to connect" .mysqli_connect_error();
} else{
  echo "<p style='color:white'>Database connected";
}

if(isset($_POST['Submit'])){
    $name=$building=$email=$phone=$password="";

    $name=htmlspecialchars($_POST['name']);
    $building=htmlspecialchars($_POST['building']);
    $phone=htmlspecialchars($_POST['phoneNo']);
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);

    $message='';
   

    if(empty($name)){
        $message='Fill in name';
    }
    elseif (empty($building)) {
        $message='Fill in building';
    }
    elseif (empty($phone)) {
        $message='Fill in phone';
    }
    elseif(empty($email)){
        $message='Fill in email';
    }
    elseif(empty($password)){
        $message='Fill in password';
    }
    $sql="SELECT name FROM admin WHERE building='$building';";
    $result=mysqli_query($database,$sql);
    $db_account=mysqli_fetch_assoc($result);
   
    
    if((mysqli_num_rows($result))>0)
    {
        $message='ERROR';
    }
 
    if(empty($message)){
        $password=crypt('$password','123');
        $sql="INSERT INTO admin(name,building,phone,email,password)
        VALUES('$name','$building','$phone','$email','$password')";
        if ($database->query($sql)===TRUE) 
        {
            $message='<p style="color:green">SUCCESSFULL SIGNUP';
        }
        else
        {
            $message='ERROR'.$database->error;
        }
    }
  $database->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup form</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<!-- Body of Form starts -->
    <div class="container">
       
        <form action="signup.php" method="post">
        <!--name-->
            <div class="box">
            <label for="Name" class="fl label"> Name: </label>
                <div class= "fl iconBox">
                  <i class="material-icons" >person</i>
                </div>
                <div class="fl">
                        <input type="text" name="name" placeholder="Name"
                class="textBox" autofocus="on" require>
                </div>
                
            </div>
        <!--name-->


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


        <!---Phone No.-->
            <div class="box">
            <label for="phone" class="fl label"> Phone No: </label>
                <div class="fl iconBox"><i class="material-icons">phone</i></div>
                <div class="fl">
                        <input type="text" required name="phoneNo" maxlength="10" placeholder="Phone No." class="textBox">
                </div>
                
            </div>
        <!---Phone No.-->


        <!---Email -->
            <div class="box">
            <label for="email" class="fl label"> Email Address: </label>
                <div class="fl iconBox"><i class="material-icons" >email</i></div>
                <div class="fl">
                        <input type="email" required name="email" placeholder="Email " class="textBox">
                </div>
                
            </div>
       <!--Email ID-->


        <!---Password-->
            <div class="box">
            <label for="password" class="fl label"> Password </label>
                <div class="fl iconBox"><i class="material-icons">vpn_key</i></div>
                <div class="fl">
                        <input type="Password" required name="password" placeholder="Password" class="textBox">
                </div>
                
            </div>
       <!---Password-->

        <!--Terms and Conditions-->
            <div class="box terms">
                    <input type="checkbox" name="Terms" required> &nbsp; I accept the terms and conditions
            </div>
        <!--Terms and Conditions-->



        <!--Submit Button-->
            <div class="box" >
                                       <input type="Submit" name="Submit" class="fr submit" value="SUBMIT">
            </div>
        <!--Submit Button-->
        </form>
        <div><a href="login.php" style="color:greenyellow">Go to login</a></div>
        <div style='color:red; text-align:center'>
            <?php 
                if(!empty($message)){echo '<p>'.$message.'</p>';}
                if(isset($db_account)){echo 'BUILDING ALREADY REGISTERED BY:'.$db_account['name'];}
                
            ?>
        </div>
    </div>
<!--Body of Form ends-->
</body>
</html>
