<?php

class user
{
    // TODO: separate subclasses for displaying user and getting information

    // TODO: proper documentation

    // user only includes informations, as further details are rarely needed

    public $id; # unique userid
    public $name; # user name
    public $user; # user as an array

    public function __construct($id)
    {
        if (!$id) {

            # search for an ID to use if non is given

            if (isset($_GET['userid'])) {
                $id = $_GET['userid'];
            } elseif (isset($_SESSION['userid'])) {
                $id = $_SESSION['userid'];
            } else {
                $id = null;
            }
        }

        # load user data from db

        // TODO: change to MySQLi

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

        /* pdo, previously used

        $pdo = new MyPDO();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(array('id' => $id));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $id;
        $this->user = $user;
        $this->name = $user['username'];

        */
    }

    public function displayUser() // TODO: remove
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
};
