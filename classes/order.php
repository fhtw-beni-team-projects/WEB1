<?php
class order
{
	public $order;

	public function place_order($profile_id) {

		$conn = new mysqli_init();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $error = false;

        $room_id = $_POST['room_id'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        if (room::available($start, $end, $room_id) = $room_id) {
            $statusMessage = "The selected room is unfortunately not available<br>";
            $error = true;
        }

        if (!isset($profile_id)) {
            $error = true;
        }

        if (!$error) {
            $sql = "INSERT INTO orders (room_id, profile_id, start, end) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $room_id, $profile_id, $start, $end);
    
            if ($stmt->execute()) {
                # TODO: order confirmation

                $statusMessage = "Success! Affected rows: " . $stmt->affected_rows;
            } else {
                $statusMessage = "Couldn't send data<br>";
            }
    
            $stmt->close();
        }
        $conn->close();
	}
}