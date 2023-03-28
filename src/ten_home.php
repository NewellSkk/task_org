<?php
    require'../connect.php';
    session_start();
    $house_no=$_SESSION['house_no'];
    if(isset($_POST['pass_change'])){
        $old_pass=htmlspecialchars($_POST['old_pass']);
        $new_pass=htmlspecialchars($_POST['new_pass']);
        $sql="SELECT * FROM tenant WHERE house_no='$house_no';";
        $result=mysqli_query($database,$sql);
        $data=mysqli_fetch_assoc($result);
    
        if(password_verify($old_pass,$data['password'])){
            $new_pass=password_hash($new_pass,PASSWORD_DEFAULT);
            $sql="UPDATE tenant SET password='$new_pass' WHERE house_no='$house_no'";
            if($database->query($sql)===TRUE){
                $message="<p style='color:green'>EDITED SUCCESSFULLY</p>";
            }else{
                $message="<p style='color:red'>ERROR</p>";
            }
        }else{
            $message="<p style='color:red'>INVALID PASSWORD!</p>";
        }

    }

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

     <!-- add tenant_form to classlist  -->
        <div class='toggle'>
            <p>Name:<?php echo $_SESSION['ten_name']?></p>
            <p>House Number:<?php echo $house_no?></p>
            <p>Email:<?php echo $_SESSION['ten_email']?></p>
        </div> 

        <!-- CHANGE PASSWORD -->
        <div class="box records">
            <div class="fl iconBox">
                <i class="material-icons">mode_edit</i>
            </div>
            <label class="fl label"> Change Password </label>
        </div>
        <!-- add tenant_form to classlist  -->
        <div class='toggle'>
        <form action="#" method="post">
            <div class="box">
                <label for="old_pass" class="fl label"> Old Password </label>
                <div class="fl iconBox"><i class="material-icons">vpn_key</i></div>
                <div class="fl">
                        <input type="Password" required name="old_pass" placeholder="Old Password" class="textBox">
                </div>    
            </div>
            <div class="box">
                <label for="new_pass" class="fl label"> New Password </label>
                <div class="fl iconBox"><i class="material-icons">vpn_key</i></div>
                <div class="fl">
                        <input type="Password" required name="new_pass" placeholder="New Password" class="textBox">
                </div>    
            </div>
            <div class="box" >
                <input type="Submit" name="pass_change" class="fr submit" value="CHANGE">
            </div>
            <?php
             if(!empty($message)){
                echo $message;
             }
            ?>
        </form>
        </div>
       
    </div> 
    <script src="tenants.js"></script>   
</body>
</html>