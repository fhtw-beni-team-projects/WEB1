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
            if(isset($_GET['userid'])) {
                $user = new user($_GET['userid']);
                ?>
                <div class="grid maingrid">
                    <div class="feed">
                        <div class="post main">
                            <form method="post" action="?submit" class="form formmax">
                                <div class="formcontent formcontentmax">
                                <p class="descr formleft">Username</p><input class="formright forminput" type="text" name="username" placeholder="Choose a username" value="<?=$user->user['username']?>" />
                                <p class="descr formleft">E-mail</p><input class="formright forminput" type="text" name="username" placeholder="Choose a email" value="<?=$user->user['email']?>" />
                                <p class="descr formleft">Firstname</p><input class="formright forminput" type="text" name="fname" placeholder="Choose a firstname" value="<?=$user->user['fname']?>" />
                                <p class="descr formleft">Lastname</p><input class="formright forminput" type="text" name="lname" placeholder="Choose a lastname" value="<?=$user->user['lname']?>" />
                                <p class="descr formleft">Password</p><input class="formright forminput" type="text" name="lname" placeholder="Choose a lastname" value="<?=$user->user['pwd_hash']?>" />
                            </form>
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