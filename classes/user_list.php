<?php
class user_list extends user
{
	static public function list_users() {

		$conn = new mysqli_init();
		if ($conn->connect_error) {
    		die("Connection failed: ".$conn->connect_error);
    	}

		$sql = "SELECT * FROM users ORDER BY join_date DESC";
		$stmt = $conn->prepare($sql);
  	  # $stmt->bind_param();
    	$stmt->execute();

		$user_list = $stmt->get_result();

		?>
			<table>
  				<tr>
  				  	<th>ID</th>
  				  	<th>Username</th>
  				  	<th>E-mail</th>
  				  	<th>Title</th>
  				  	<th>First Name</th>
  				  	<th>Last Name</th>
  				  	<th>Permissions</th>
  				  	<th>Joined</th>
  				</tr>
		<?php
    	foreach ($user_list as $user) {
    		?>
    		<tr id="user_<?=$user['id']?>">
    			<td><?=$user['id']?></td>
    			<td><?=$user['username']?></td>
    			<td><?=$user['email']?></td>
    			<td><?=$user['title']?></td>
    			<td><?=$user['fname']?></td>
    			<td><?=$user['lname']?></td>
    			<td><?=$user['join_date']?></td>
    			<td>
    				<?php
    				switch ($user['perm_lvl']) {
    					case -1:
    						echo "deactive";
    						break;
    					case 0:
    						echo "active";
    						break;
    					case 1:
    						echo "admin";
    						break;
    				}
    				?>
    			</td>
    			<td><button type="button" class="btn" onclick="change_order(<?=$order['id']?>, -1)">Deactivate</button></td>
            	<td><button type="button" class="btn" onclick="change_order(<?=$order['id']?>, 1)">Set admin</button></td>
    		</tr>
    		<?php
    	}
    	echo "</table>";

    	$stmt->close();
    	$conn->close();
	}
}