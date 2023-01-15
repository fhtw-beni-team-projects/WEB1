<?php
require 'class.php';
if(!isset($_SESSION)) {
	session_start();
}
if (isset($_POST['status'])) {
	user::change_status($_POST['id'], $_POST['status']);
}