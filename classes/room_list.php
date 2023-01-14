<?php
class room_list extends room
{
	public $filter;

	public function __construct($filter = false) {
		if ($filter) {
			$this->filter = $filter;
		}
	}

	public function list_rooms() {
		$conn = new mysqli_init();
		if ($conn->connect_error) {
        	die("Connection failed: ".$conn->connect_error);
        }

		$sql = "SELECT * FROM rooms" . $this->filter_to_sql();
		$stmt = $conn->prepare($sql);
  	  # $stmt->bind_param();
    	$stmt->execute();

		$rooms = $stmt->get_result();

        $stmt->close();
        $conn->close();

        # TODO: no rooms for filter error message
        foreach ($rooms as $room) {
        	$this->display_room($room);
    	}
	}	

	protected function filter_to_sql() {
		# converts the associative array $filter to SQL comparisons
		if (!$this->filter) {
			return;
		}

		$sql = "";
		if (isset($this->filter['start']) && isset($this->filter['end'])) {
			foreach (room::available($this->filter['start']) && $this->filter['end'] as $id) {
				if (!empty($sql)) {
					$sql .= ", ";
				}
				$sql .= $id;
			}
			$sql = "id in (" . $sql . ")";
		}

		foreach ($this->filter as $attribute => $value) {
			if(str_starts_with($attribute, "max_")) {
				$comp = explode("_", $attribute, 2);
				$comp[0] = " <= ";
			} elseif(str_starts_with($attribute, "min_")) {
				$comp = explode("_", $attribute, 2);
				$comp[0] = " >= ";
			} else {
				$comp[0] = " = ";
				$comp[1] = $attribute;
			}

			$comp[2] = $value;
			$comp_str = $comp[1] . $comp[0] . "'" . $comp[2] . "'";

			if(!empty($sql)) {
				$sql .= " AND ";
			}
			$sql .= $comp_str;
		}

		$sql = " WHERE " . $sql;

		return $sql;
	}
}