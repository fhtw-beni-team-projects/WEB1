<?php require 'i/session_start.php'?>
<!DOCTYPE html>
<html>
  <head>
    <title>placeholder</title>
    <?php require 'i/head.php'?>
  </head>
  <body>
    <img id="title-bg" src="https://images.unsplash.com/photo-1499346030926-9a72daac6c63?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8">
    <h1 id="title">HOTEL NULL</h1>

    <?php include 'i/navbar.php'?>

    <div class="grid maingrid" id="mainpage">
      <div class="feed" id="news">
    
        <button type="button" class="mobile" onclick="switchFeed('sidebar')">
          <i class="fas fa-exchange-alt"></i>&nbsp;Sidebar
        </button>

        <?php   
        if (isset($_POST['delete'])) {
          news::delete($_POST['postid']);
        }
        ?>


        <div class="post main" id="WIP-text">WIP placeholder for the semester project</div>


        <?php news_list::list_rooms()?>
    
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
