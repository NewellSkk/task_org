<?php
 session_start();
 $building=$_SESSION['building'];
 $house_no=$_SESSION['house_no'];
?>
    <div>
       <div class='building'>
          <?php
           echo $building.' Tenant';
          ?>
       </div>
 
      <nav>
   
        <ul class="menuItems">
          <li><a href='ten_home.php' data-item='Home'>Home</a></li>
          <li><a href='ten_maintenance.php' data-item='Maintenance'>Maintenance</a></li>
          <li><a class='logout' href='ten_login.php' data-item='Log-out'>Log-out</a></li>
        </ul>
      </nav>
 
    </div>