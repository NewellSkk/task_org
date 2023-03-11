<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="report.css">
</head>
<body>
    <div class="container">
        <div class="category">
          <span class="active" id="general">General</span>
          <span id="electric">Electric</span>
          <span id="plumbing">Plumbing</span>
        </div>
        <form action="" method="post">
            <div class="list general" >
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

            <!-- <div class="list plumbing">
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
            </div> -->
        </form>
    </div>    

    <script src="report.js"></script>
</body>
</html>