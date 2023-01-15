<?php
class profile
{
	public $profile;

	public function __construct($id) {
		$conn = new mysqli_init();
		if ($conn->connect_error) {
        	die("Connection failed: ".$conn->connect_error);
        }

        $sql = "SELECT * FROM profile WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $room = $stmt->get_result()->fetch_assoc();

        $stmt->close();
        $conn->close();

		$this->profile = $profile;
	}

	public function display_profile($profile = false) {
		if (!$profile) {
			$profile = $this->profile;
		}
		# TODO: html
	}
}