<?php
class room
{
    public $id;
	private $room;

	public function __construct($id) {
		$conn = new mysqli_init();
		if ($conn->connect_error) {
        	die("Connection failed: ".$conn->connect_error);
        }

        $sql = "SELECT * FROM rooms WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $room = $stmt->get_result()->fetch_assoc();

        $stmt->close();
        $conn->close();

        $this->id = $id;
		$this->room = $room;
	}

	public function display_room($room = $this->room) {
		# TODO: html

        # snippet for getting correct images
        $thumbnail = glob("img/".$room['id']."_thumb.jpg");
        ?>
        <img src="<?=$thumbnail?>"/>
        <?php

        # the room needs to have onclick="room(<?=$open_room['id'])"
	}

    static public function available($start, $end, $id) {
        $conn = new mysqli_init();
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        $sql = "SELECT room_id FROM orders WHERE (start <= ? AND start >= ?) OR (end <= ? AND end >= ?)";
        if (isset($id)) {
            $sql .= " AND room_id = ?"
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $end, $start, $end, $start);
        $stmt->execute();

        $available = $stmt->get_result()->fetch_assoc();

        $stmt->close();
        $conn->close();

        return $available;
    }
}