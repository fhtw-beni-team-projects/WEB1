<?php require 'i/session_start.php'?>
<!DOCTYPE html>
<html>
  <head>
    <title>placeholder</title>
    <?php require 'i/head.php'?>
  </head>
  <body>
    <?php
    if (!isset($_GET['article'])) {
    ?>
    <img id="title-bg" src="https://images.unsplash.com/photo-1499346030926-9a72daac6c63?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8">
    <h1 id="title">HOTEL NULL</h1>
    <?php } ?>

    <?php include 'i/navbar.php'?>

    <div class="grid maingrid" id="mainpage">
      <div class="feed" id="news">
        <?php
        if (isset($_GET['submit'])) {
          news::submit_news();
          $url = $_POST['url'];
          header("Location: $url");
        }
        if (isset($_GET['article'])) { 
          $article = new news($_GET['article']);
          if(isset($_GET['edit'])) {
            $article->edit_form();
          } else {
            $article->display_news();
          }
        } elseif (isset($_GET['new'])) {
         news::news_form();
        } else { ?>
          <button type="button" class="mobile" onclick="switchFeed('sidebar')">
            <i class="fas fa-exchange-alt"></i>&nbsp;Sidebar
          </button>

          <?php 
            $feed = new news_list();
            $feed->list_news()
          ?>

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
