<?php
 session_start();
 $building=$_SESSION['building'];
?>
    <div>
       <div class='building'>
          <?php echo $building.' admin';?>
       </div>
 
      <nav>
   
        <ul class="menuItems">
          <li><a href='index.php' data-item='Home'>Home</a></li>
          <li><a href='tenants.php' data-item='Tenants'>Tenants</a></li>
          <li><a href='tasks.php' data-item='Tasks'>Tasks</a></li>
          <li><a class='logout' href='login.php' data-item='Log-out'>Log-out</a></li>
        </ul>
      </nav>
 
    </div>