<?php
session_start();
require'../connect.php';

$house_no=$_SESSION['house_no'];
if(isset($_POST['Submit'])){
    $locks=isset($_POST['locks']);
    $window=isset($_POST['window']);
    $tiles=isset($_POST['tiles']);
    $other=isset($_POST['other']);
    $drains=isset($_POST['drains']);
    $taps=isset($_POST['taps']);
    $pipes=isset($_POST['pipes']);
    $cistern=isset($_POST['cistern']);
    $switch=isset($_POST['switch']);
    $fuse=isset($_POST['fuse']);
    $bulb=isset($_POST['bulb']);
    $lights=isset($_POST['lights']);;
    $gen=array('locks','window','tiles','other');
    $gen_checked=array();
    foreach($gen as $i){
        if(isset($_POST[$i])){
           $gen_checked[count($gen_checked)]=$i;
        }       
    } 
    $plumbing=array('drain','taps','pipes','cistern');
    $plumbing_checked=array();
    foreach($plumbing as $i){
        if(isset($_POST[$i])){
           $plumbing_checked[count($plumbing_checked)]=$i;
        }       
    } 
    $elec=array('switch','fuse','bulb','lights');
    $elec_checked=array();
    foreach($elec as $i){
        if(isset($_POST[$i])){
           $elec_checked[count($elec_checked)]=$i;
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
        <?php echo $gen_checked[0];?>
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
        </form>
    </div>        

    <script src="ten_maintenance.js"></script> 
</body>
</html>