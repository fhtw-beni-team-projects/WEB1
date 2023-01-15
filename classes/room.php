<?php
class room
{
    public $id;
	public $room;

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

	public function display_room($room = false) {
        if (!$room) {
            $room = $this->room;
        }

        ?>
        <div class="post main grid imagegrid" id="room<?=$room['id']?>" onclick="open_room(<?=$room['id']?>)">
            <img class="gridleft" src="<?=glob("img/".$room['id']."_thumb.jpg")?>"/>
            <div class="gridright">
                <h2 class="title">Room: <?=$room['name']?></h2>
                <a onclick="noClick()"><?=$room['descr']?></a>
                <p>Price: € <?=$room['price']?>/night</p>
                <p>Beds:<?=str_repeat(' <i class="fas fa-user"></i>', $room['beds'])?></p>
            </div>
        </div>
        <?php

        # the room needs to have onclick="room(<?=$open_room['id'])"
	}

    static public function available($start, $end, $room_id = false) {
        $conn = new mysqli_init();
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        $sql = "SELECT DISTINCT room_id FROM orders WHERE start < ? AND end > ?";
        if ($id) {
            $sql .= " AND room_id = ?";
        }

        $stmt = $conn->prepare($sql);
        $types = "ss";
        $parameters = array($end, $start);
        if ($id) {
            $types .= "i";
            $parameters[] = $room_id;
        }

        $stmt->bind_param($types, ...$parameters);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        if ($room_id && $result->num_rows > 0) {
            return false;
        } elseif ($room_id) {
            return true;
        } else {
            # TODO: list of id's
            return $available;
        }
    }
}