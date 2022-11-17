<!-- TODO: Layout for signup or login paralell -->

<?php

// TODO: method for login, signup, settings

$conn = new mysqli_init();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if (isset($_GET['login'])) {
    /*$username = $_POST['username']; // TODO: fix
    $pwd = $_POST['pwd'];
    $url = $_POST['url']; // source url
    // TODO: verify if url is needed
    // => login without reloading the page



    $sql = "SELECT pwd_hash FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $user = $stmt->get_result()->fetch_assoc();

    $stmt->close();

    if ($pwd_hash !== false && password_verify($pwd, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        header("Location: $url");
        die("Login successful");
    } else {
        $errorMessage = "Username and password don't match<br>";
    }*/

    if($_POST['email'] == "asd@asd.at" && $_POST['pwd'] == "asd") {
        $_SESSION['userid'] = 123;
    }
}



if (isset($_GET['register'])) {
    $error = false;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $gender = $_POST['gender'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $url = $_POST['url'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a vaild e-mail adress<br>";
        $error = true;
    }

    // TODO: pwd requirements
    if (strlen($pwd) == 0) {
        $errorMessage = "Please enter a password<br>";
        $error = true;
    }

    // TODO: verify all fields

    if (!$error) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $success = $stmt->get_result();

        if ($success) {
            $errorMessage = "Username already taken<br>";
            $error = true;
        }
    }
    if (!$error) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $success = $stmt->get_result();
        
        if ($success) {
            $errorMessage = "E-mail already in use<br>";
            $error = true;
        }
    }
    if (!$error) {
        $pwd_hash = password_hash($pwd, PASSWORD_BCRYPT);


        // TODO: seperate table for contact details
        // users table just for login details
        $sql = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $username, $email, $pwd_hash);
        $stmt->execute();
        $success = $stmt->get_result();

        if ($success) {
            header("Location: $url");
            die("Success!");
        } else {
            $errorMessage = "Couldn't send data<br>";
        }

        $stmt->close();
    }
}

if (isset($errorMessage)) {
?>
    <p class="feedback error"><?=$errorMessage?></p>
<?php
}



$url = $_SERVER['REQUEST_URI'];
?>

<form method="post" action="?login" class="popup" id="login">
    <div class="formcontent grid">

        <!-- TODO: email or username as login -->
        <!-- NOTE: just email is safer -->

        <label class="descr formleft" for="email">E-Mail</label><input class="popup_input formright forminput" type="email" name="email" />

        <label class="descr formleft" for="pwd">Passwort</label><input class="popup_input formright forminput" type="password" name="pwd" placeholder="Gib dein Passwort ein" />

        <!-- TODO: make second password a dummy -->



        <!-- TODO: seperate sign up / login page for js disabled browsers-->
    </div>
    <div class="formcontent grid equal">
        <p class="formtext formfull" id="signup-prompt">Don't&nbsp;have&nbsp;an&nbsp;account&nbsp;yet? <a target="_blank" onclick="changeForm('signup');">Sign&nbsp;up</a>&nbsp;now!</p>

        <button type="button" class="btn formleft" onclick="closeForm('login')"><i class="far fa-window-close"></i>&nbsp;Cancel</button>
        <button type="submit" class="btn formright" name="formaction"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</button>

        <!-- TODO: verify login without reloading page -->

        <!-- TEMP: redirecting user back to origin page after logging in -->
        <input type="hidden" name="url" value=".$url." />


    </div>
</form>

<form method="post" action="?signup" class="popup" id="signup">
    <div class="formcontent grid">

        <label class="descr formleft" for="gender">Anrede</label>
        <select class="popup_input formright forminput" name="gender">
            <option value="male">Herr</option>
            <option value="female">Frau</option>
            <option value="divers">Divers</option>
        </select>

        <label class="descr formleft" for="firstname">Vorname</label><input class="popup_input formright forminput" type="text" name="firstname" />
        <label class="descr formleft" for="lastname">Nachname</label><input class="popup_input formright forminput" type="text" name="lastname" />

        <label class="descr formleft" for="email">E-Mail</label><input class="popup_input formright forminput" type="email" name="email" />

        <label class="descr formleft" for="username">Nutzername</label><input class="popup_input formright forminput" type="text" name="username" />

        <!-- TODO: fix overflow of text / width of parent element -->
        <label class="descr formleft" for="pwd">Passwort</label><input class="popup_input formright forminput" type="password" name="pwd" placeholder="Gib ein Passwort ein" />

        <!-- TODO: make second password a dummy -->

        <label class="descr formleft" for="pwd2">Wiederhole&nbsp;Passwort</label><input class="popup_input formright forminput" type="password" name="pwd2" placeholder="Wiederhole dein Passwort" />


        <!-- TODO: seperate sign up / login page for js disabled browsers-->
    </div>
    <div class="formcontent grid equal">
        <p class="formtext formfull formtextelement" id="login-prompt">Already&nbsp;have&nbsp;an&nbsp;account? <a target="_blank" onclick="changeForm('login');">Log&nbsp;in</a>&nbsp;instead!</p>


        <button type="button" class="btn formleft" onclick="closeForm('signup')"><i class="far fa-window-close"></i>&nbsp;Cancel</button>
        <button type="submit" class="btn formright" name="formaction"><i class="fas fa-sign-in-alt"></i>&nbsp;Signup</button>

        <!-- TODO: verify sign up without reloading page -->

        <!-- TEMP: redirecting user back to origin page after signing up -->
        <input type="hidden" name="url" value=".$url." />


    </div>
</form>

<?php 
$conn->close();
?>