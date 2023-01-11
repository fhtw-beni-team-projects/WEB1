<?php require 'i/session_start.php'?>
<!DOCTYPE html>
<html>
  <head>
    <title>Rooms</title>
    <?php require 'i/head.php'?>
  </head>
  <body>
    <?php include 'i/navbar.php'?>
    

    <div class="grid maingrid" id="mainpage">
      <div class="feed" id="infoposts">
        <?php
          # filter is an associativ array with all table columns as possible filters
          # TODO: get request for filter
        
          $rooms = new room_list($filter);

          $rooms->room_list();

        ?>

      </div>
    </div>
  

  </body>
</html>