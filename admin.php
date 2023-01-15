<?php require 'i/session_start.php'?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <?php require 'i/head.php'?>
  </head>
  <body>
    <?php include 'i/navbar.php'?>
    
    <div class="grid maingrid" id="mainpage">
      <div class="feed" id="infoposts">
        <?php
          $user = new user();
          if (user::is_admin($user->id)) {
        ?>
        <form method="get" action="" class="post main">
          <div class="equal grid"></div>
            <button type="submit" class="btn" name="users">User management</button>
            <button type="submit" class="btn" name="orders">User management</button>
          </div>
        </form>
        <?php
          } else {
            echo '<p class="feedback warning">You don\'t have permission to access this site!</p>';
          }
        ?>
      </div>
    </div>

  </body>
</html>