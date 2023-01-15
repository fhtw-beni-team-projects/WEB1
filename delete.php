<?php
require 'class.php';
if(!isset($_SESSION)) {
	session_start();
}
if (isset($_POST['delete'])) {
	news::delete($_POST['id']);
} else {
?>
<div class="popup" class="popup" id="delete_article">
	<div class="formcontent formsimple">
		<p class="descr formlarge">Are you sure? This action cannot be undone!</p>
		<button type="button" class="btn btnA formleft" onclick="closeForm()"><i class="far fa-window-close"></i>&nbsp;Cancel</button>
		<button type="button" class="btn btnB formright" id="deletePostConfirm"><i class="fas fa-trash-alt"></i>&nbsp;Delete</button>
	</div>
</div>

<?php
}
?>