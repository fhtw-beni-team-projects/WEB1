<?php

if (isset($_GET['logout'])) {
    $url = $_POST['url'];
    session_destroy();
    header("Location: $url");
};
if (isset($errorMessage)) {
    ?>
    <p class="feedback error">".$errorMessage."</p>
    <?php
};

$url = $_SERVER['REQUEST_URI'];

?>

<form method="post" action="?logout" class="popup" id="logout">
  <div class="formcontent formsimple">
    <p class="descr formlarge">Are you sure you want to log out?</p>
    <button type="button" class="btn btnA formleft" onclick="closeForm()"><i class="far fa-window-close"></i>&nbsp;Cancel</button>
    <button type="submit" class="btn btnB formright" name="formaction"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</button>
    <input type="hidden" name="url" value="<?=$url?>" />
  </div>
</form>