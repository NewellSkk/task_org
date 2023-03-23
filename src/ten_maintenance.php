<?php
session_start();
require'../connect.php';

$house_no=$_SESSION['house_no'];
$building=$_SESSION['building'];
if(isset($_POST['Submit'])){
  
    $gen=array('locks','window','tiles','other');
    $gen_checked=array();
    foreach($gen as $i){
        if(isset($_POST[$i])){
            $sql="INSERT INTO tasks(house_no,building,category,task)
            VALUES('$house_no','$building','general','$i')";
          
            if($database->query($sql)===TRUE){
              $message="<p style='color:green'>Management will respond accordingly.</p>";
            }else {
              $message="<p style='color:red'>ERROR.</p>";
            }   
        }       
    } 
    $plumbing=array('drain','taps','pipes','cistern');
    foreach($plumbing as $i){
        if(isset($_POST[$i])){
           $sql="INSERT INTO tasks(house_no,building,category,task)
           VALUES('$house_no','$building','plumbing','$i')";
           if($database->query($sql)===TRUE){
             $message="<p style='color:green'>Management will respond accordingly.</p>";
           }else {
             $message="<p style='color:red'>ERROR.</p>";
           }   
        }       
    } 
    $elec=array('switch','fuse','bulb','lights');
    foreach($elec as $i){
        if(isset($_POST[$i])){
           $sql="INSERT INTO tasks(house_no,building,category,task)
           VALUES('$house_no','$building','electric','$i') ";
           if($database->query($sql)===TRUE){
            $message="<p style='color:green'>Management will respond accordingly.</p>";
           }else {
             $message="<p style='color:red'>ERROR.</p>";
           }   
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
    <title>Home Page</title>
    <link rel="stylesheet" href="sign-up.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="ten_maintenance.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
</head>
<body>
    <?php
     require'ten_nav.php';
    ?>
    <div class="container">
        
        <div class="category">
          <span class="active general">General</span>
          <span class="electric">Electric</span>
          <span class="plumbing">Plumbing</span>
        </div>
        
        <form action="#" method="post">
            <div class="list show general" >
                <table>
                   <tr><td> 
                    <input type="checkbox" name="locks">
                    <label for="locks">Door locks</label>
                   </td></tr>
                   <tr><td>
                    <input type="checkbox" name="window">
                    <label for="window">Window pane</label>
                   </td></tr>
                   <tr><td> 
                    <input type="checkbox" name="tiles">
                    <label for="tiles">Lose tiles</label>
                   </td></tr> 
                   <tr><td> 
                    <input type="checkbox" name="other">
                    <label for="tiles">Other</label>
                   </td></tr>
                </table>
            </div>

            <div class="list plumbing">
                <table>
                    <tr><td>
                        <input type="checkbox" name="drain">
                        <label for="drain">Clogged drain</label>
                    </td></tr>
                    <tr><td>
                        <input type="checkbox" name="taps">
                        <label for="drain">Broken tap</label>
                    </td></tr>
                    <tr><td>
                        <input type="checkbox" name="pipes">
                        <label for="pipes">Leaky pipes</label>
                    </td></tr>
                    <tr><td>
                        <input type="checkbox" name="cistern">
                        <label for="toilet">Cistern</label>
                    </td></tr>
                </table>
            </div>
            <div class="list electric">
                <table>
                    <tr><td>
                        <input type="checkbox" name="switch">
                        <label for="drain">Light Switch</label>
                    </td></tr>
                    <tr><td>
                        <input type="checkbox" name="fuse">
                        <label for="drain">Blown Fuse</label>
                    </td></tr>
                    <tr><td>
                        <input type="checkbox" name="bulb">
                        <label for="pipes">Bulb Replacement</label>
                    </td></tr>
                    <tr><td>
                        <input type="checkbox" name="lights">
                        <label for="toilet">Flickering Lights</label>
                    </td></tr>
                </table>
            </div>
            <div>
                                       <input type="Submit" name="Submit" class="fl" value="SUBMIT">
            </div>
            <?php echo $message;?>
        </form>
    </div>        

    <script src="ten_maintenance.js"></script> 
</body>
</html>