<?php

class user
{
    // TODO: separate subclasses for displaying user and getting information

    // TODO: proper documentation

    // user only includes informations, as further details are rarely needed

    public $id; # unique userid
    public $name; # user name
    public $user; # user as an array

    public function __construct($id = false)
    {
        if (isset($_GET['login'])) {
            $this->login();
        } elseif (isset($_GET['signup'])) {
            $this->signup();
        }

        if (!$id) {

            # try already stored id
            if (isset($_GET['userid'])) {
                $id = $_GET['userid'];
            } elseif (isset($_SESSION['userid'])) {
                $id = $_SESSION['userid'];
            } else {
                $id = null;
            }
        }

        # load user data from db
        if($id) {
            $conn = new mysqli_init();

            // TEMP: error handling as is
            // TODO: proper error handling

            if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
            }

            # prepared statement

            $sql = "SELECT * FROM users WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $user = $stmt->get_result()->fetch_assoc();

            $stmt->close();
            $conn->close();

            $this->id = $id;
            $this->user = $user;
            $this->name = $user['username'];
        }
    }

    public function displayUser() // TODO: remove/rework
    {

        # convert timestamp to usable string

        $created_at = new DateTime($this->user['created_at']);
        $created_at = $created_at->format('j.n.Y');

        # echo post as html
        #
        # TODO: proper way to include html

        echo "<div class=\"profile sidebar\"><h3>".$this->user['name']."</h3><p>Member since ".$created_at."</p>";
        if (strlen($this->user['about']) != 0) {
            echo "<br /><p>".$this->user['about']."</p>";
        }
        echo "</div>";
    }

    public function login()
    {
        # functioned assumed to only be called with correct POST requests

        $conn = new mysqli_init();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);

        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $url = $_POST['url']; # source url, redundant for asynchronous login

        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        $stmt->close();

        if ($user && password_verify($pwd, $user['pwd_hash'])) {
            $_SESSION['userid'] = $user['id'];
            $statusMessage = "Login successful";
        } else {
            $statusMessage = "Username and password don't match<br>";
        }

        $conn->close();
    }

    public function signup()
    {
        $conn = new mysqli_init();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $error = false;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $gender = $_POST['gender'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $url = $_POST['url'];
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $statusMessage = "Please enter a vaild e-mail adress<br>";
            $error = true;
        }
    
        // TODO: pwd requirements
        if (!strlen($pwd)) {
            $statusMessage = "Please enter a password<br>";
            $error = true;
        }
    
        // TODO: verify all fields
    
        /*if (!$error) {
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $success = $stmt->get_result();
    
            if ($success) {
                $statusMessage = "Username already taken<br>";
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
                $statusMessage = "E-mail already in use<br>";
                $error = true;
            }
        }*/
    
        if (!$error) {
            $pwd_hash = password_hash($pwd, PASSWORD_BCRYPT);
    
    
            // TODO: seperate table for contact details
            // users table just for login details
            $sql = "INSERT INTO users (username, email, pwd_hash) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $pwd_hash);
    
            if ($stmt->execute()) {
                $sql = "SELECT * FROM users WHERE email = ?";
                $stmt2 = $conn->prepare($sql);
                $stmt2->bind_param("s", $email);
                $stmt2->execute();
                $user = $stmt2->get_result()->fetch_assoc();
    
                $_SESSION['userid'] = $user['id'];
                header("Location: $url");
                $statusMessage = "Success! Affected rows: " . $stmt->affected_rows;
            } else {
                $statusMessage = "Couldn't send data<br>";
            }
    
            $stmt->close();
        }

        $conn->close();
    }

    static public function is_admin($id) {

        $conn = new mysqli_init();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT perm_lvl FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $perm_lvl = $stmt->get_result()->fetch_assoc();

        $stmt->close();
        $conn->close();   

        return $perm_lvl;
    }
};
