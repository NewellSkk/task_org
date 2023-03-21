<?php
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
    <link rel="stylesheet" href="report.css">
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
        <form action="" method="post">
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
                </table>
            </div>

            <div class="list plumbing">
                <table>
                    <tr><td>
                        <input type="checkbox" name="drain">
                        <label for="drain">clogged drain</label>
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
                        <input type="checkbox" name="toilet">
                        <label for="toilet">Toilet</label>
                    </td></tr>
                </table>
            </div>
            <div class="list electric">
                <table>
                    <tr><td>
                        <input type="checkbox" name="drain">
                        <label for="drain">Light Switch</label>
                    </td></tr>
                    <tr><td>
                        <input type="checkbox" name="taps">
                        <label for="drain">Blown Fuse</label>
                    </td></tr>
                    <tr><td>
                        <input type="checkbox" name="pipes">
                        <label for="pipes">Bulb Replacement</label>
                    </td></tr>
                    <tr><td>
                        <input type="checkbox" name="toilet">
                        <label for="toilet">Flickering Lights</label>
                    </td></tr>
                </table>
            </div>
        </form>
    </div>        

    <script src="ten_maintenance.js"></script> 
</body>
</html>