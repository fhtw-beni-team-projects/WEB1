<?php
class room_list extends room
{
	public $filter;

	public function list_rooms() {
		$sql = "SELECT * FROM rooms WHERE " . filter_to_sql();
		$stmt = $conn->prepare($sql);
      # $stmt->bind_param();
        $stmt->execute();

		$rooms = $stmt->get_result();

        $stmt->close();
        $conn->close();

        # TODO: no rooms for filter error message
        foreach ($rooms as $room) {
        	$this->displayRoom($room->fetch_assoc());
    	}
	}

	protected function filter_to_sql() {
		# converts the associative array $filter to SQL comparisons
		$sql = "";

		foreach (this->$filter as $attribute => $value) {
			if(str_starts_with($attribute, "max_")) {
				$comp = explode($attribute, "_", 2);
				$comp[0] = ">=";
			} elseif(str_starts_with($attribute, "min_")) {
				$comp = explode($attribute, "_", 2);
				$comp[0] = "<=";
			} else {
				$comp[0] = "=";
				$comp[1] = $attribute;
			}

			$comp[2] = $value;
			$comp_str = '"' . $comp[1] . '"' . $comp[0] . '"' . $comp[2] . '"';

			if(!empty($sql)) {
				$sql .= " AND ";
			}
			$sql .= $comp_str;
		}

		return $sql;
	}
}