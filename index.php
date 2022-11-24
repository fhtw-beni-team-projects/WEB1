<?php require 'i/session_start.php'?>
<!DOCTYPE html>
<html>
  <head>
    <title>placeholder</title>
    <?php require 'i/head.php'?>
  </head>
  <body>
    <?php include 'i/navbar.php'?>

    <div class="grid maingrid" id="mainpage">
      <div class="feed" id="news">
    
        <button type="button" class="mobile" onclick="switchFeed('sidebar')">
          <i class="fas fa-exchange-alt"></i>&nbsp;Sidebar
        </button>



        <div class="post main" id="WIP-text">WIP placeholder for the semester project</div>
    
        <?php include 'i/fileLoader/fileLoader.php'?>

        <?php
        $files = glob("img/*.jpg");
        foreach($files as $file) {
          ?>

          <div class="post main">
            <img src="<?=$file?>"/>
          </div>

          <?php
        }

        ?>
      </div>

      <div class="feed" id="sidebar">
        <button type="button" class="mobile" onclick="switchFeed('news')">
          <i class="fas fa-exchange-alt"></i>&nbsp;Main
        </button>

        <div class="post sidebar" id="WIP-sidebar">This is the sidebar<br><br>It's very pretty</div>

      </div>
    </div>
  

  </body>
</html>
