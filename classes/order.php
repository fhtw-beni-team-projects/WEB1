<?php
class order
{
    public $order;

    public function __construct($id = false) {
        if(!$id) {
            return;
        }

        $conn = new mysqli_init();

        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        $sql = "SELECT * FROM orders WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $this->order = $stmt->get_result()->fetch_assoc();

        $stmt->close();
        $conn->close();
    }

	public function place_order() {

		$conn = new mysqli_init();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $error = false;

        $room_id = $_POST['room_id'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $breakfast = $_POST['breakfast'];
        $parking = $_POST['parking'];
        $pets = $_POST['pets'];

        $user = new user();
        $profile_id = $user->user['profile_id'];


        if ((!$start || !$end) && !$error) {
            $statusMessage = "No start or end date specified<br>";
            $error = true;
            $warn = true;
        }

        if (!room::available($start, $end, $room_id) && !$error) {
            $statusMessage = "The selected room is unfortunately not available anymore<br>";
            $error = true;
            $warn = true;
        }

        if (!$profile_id && !$error) {
            $statusMessage  = "Couldn't find a profile<br>";
            $error = true;
        }

        if (!$error) {
            $sql = "INSERT INTO orders (room_id, profile_id, start, end, breakfast, parking, pets) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iissiii", $room_id, $profile_id, $start, $end, $breakfast, $parking, $pets);
    
            if ($stmt->execute()) {
                # TODO: order confirmation
                $statusMessage = "Success! Checkin starts at 16:00";
            } else {
            }
    
            $stmt->close();
        }
        $conn->close();

        if (isset($statusMessage)) {
            if ($warn) {
                echo '<p class="feedback warning">'.$statusMessage.'</p>';
            } elseif ($error) {
                echo '<p class="feedback error">'.$statusMessage.'</p>';
            } else {
                echo '<p class="feedback">'.$statusMessage.'</p>';
            }
        }
	}
}