<?php
class room
{
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

	public function displayRoom($room = $this->room) {
		# TODO: html
        $thumbnail = glob("img/".$room['id']."_thumb.jpg");
        ?>
        <img src="<?=$thumbnail?>"/>
        <?php
	}
}