<?php
class order_list extends order
{
	static public function list_orders() {

		$conn = new mysqli_init();
		if ($conn->connect_error) {
    		die("Connection failed: ".$conn->connect_error);
    	}

		$sql = "SELECT * FROM orders ORDER BY status ASC, timestamp DESC";
		$stmt = $conn->prepare($sql);
  	  # $stmt->bind_param();
    	$stmt->execute();

		$order_list = $stmt->get_result();

		?>
			<table>
  				<tr>
  				  	<th>ID</th>
  				  	<th>Room</th>
  				  	<th>Start</th>
  				  	<th>End</th>
  				  	<th>Brkf.</th>
  				  	<th>Park.</th>
  				  	<th>Pet</th>
  				  	<th>first name</th>
  				  	<th>last name</th>
  				  	<th>booking date</th>
  				  	<th>status</th>
  				</tr>
		<?php
    	foreach ($order_list as $order) {
    		$profile = new profile($order['profile_id']);
    		$room = new room($order['room_id']);
    		?>
    		<tr id="order_<?=$order['id']?>">
    			<td><?=$order['id']?></td>
    			<td><?=$room->room['name']?></td>
    			<td><?=$order['start']?></td>
    			<td><?=$order['end']?></td>
    			<td><?=$order['breakfast']?></td>
    			<td><?=$order['parking']?></td>
    			<td><?=$order['pets']?></td>
    			<td><?=$profile->profile['fname']?></td>
    			<td><?=$profile->profile['lname']?></td>
    			<td><?=$order['timestamp']?></td>
    			<td>
    				<?php
    				switch ($order['status']) {
    					case -1:
    						echo "cancled";
    						break;
    					case 0:
    						echo "new";
    						break;
    					case 1:
    						echo "confirmed";
    						break;
    				}
    				?>
    			</td>
    			<td><button type="button" class="btn" onclick="change_order(<?=$order['id']?>, 1)">Confirm</button></td>
            	<td><button type="button" class="btn" onclick="change_order(<?=$order['id']?>, 1)">Cancel</button></td>
    		</tr>
    		<?php
    	}
    	echo "</table>";

    	$stmt->close();
    	$conn->close();
	}
}