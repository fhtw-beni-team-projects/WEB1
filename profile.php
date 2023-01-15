<?php require 'i/session_start.php'?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <?php require 'i/head.php'?>
    </head>
    <body>
        <?php include 'i/navbar.php'?>
    
        <?php
            if(isset($_GET['submit'])) {
                user::update_user($_POST('id'));
            }

            elseif(isset($_GET['userid'])) {
                
                $user = new user($_GET['userid']);
                $set = 0;
                ?>
                <div class="grid maingrid">
                    <div class="feed">
                        <form class="post main form formmax" method="post" action="?submit">
                            <div class="formcontent formcontentmax">
                                <p class="descr formleft">Username</p><input class="formright forminput" type="text" name="username" placeholder="Choose a username" value="<?=$user->user['username']?>" />
                                <p class="descr formleft">E-mail</p><input class="formright forminput" type="text" name="email" placeholder="Choose a email" value="<?=$user->user['email']?>" />
                                <p class="descr formleft">Firstname</p><input class="formright forminput" type="text" name="fname" placeholder="Choose a firstname" value="<?=$user->user['fname']?>" />
                                <p class="descr formleft">Lastname</p><input class="formright forminput" type="text" name="lname" placeholder="Choose a lastname" value="<?=$user->user['lname']?>" />
                                <input type="hidden" value="<?=$user->id?>" name="id"/>
                                <button type="submit" class="btn formright" name="formaction"><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp;Save</button>

                            </div>
                        </form>

                        <div class="post main">
                            <div class="formcontent grid">
                                <label class="descr formleft" for="pwd">Altes&nbsp;Passwort</label><input class="popup_input formright forminput" type="password" name="pwd" placeholder="Gib dein altes Passwort ein" />
                                <label class="descr formleft" for="new_pwd">Neues&nbsp;Passwort</label><input class="popup_input formright forminput" type="password" name="new_pwd" placeholder="Gib ein neues Passwort ein" />
                                <label class="descr formleft" for="new_pwd2">Wiederhole&nbsp;Passwort</label><input class="popup_input formright forminput" type="password" name="new_pwd2" placeholder="Wiederhole dein neues Passwort" />
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            else{
                ?>
                <p>No user logged in</p>
                <?php
            }
        ?>
    </body>
</html>
<?php 
    $conn->close();
?>