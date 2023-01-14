<div class="darkener" id="darkener" onclick="closeForm()"></div>

<ul class="navBox" id="navbar" aria-label="Navigation bar">
	<li class="navPoint">
		<a class="navLink" href="/index.php">
			<i class="fas fa-home"></i>
			<p class="navText">&nbsp;Home</p>
		</a>
	</li>
 	<li class="navPoint">
 		<a class="navLink" href="/about.php">
 			<i class="fas fa-info"></i>
 			<p class="navText">&nbsp;About</p>
 		</a>
 	</li>
 	<li class="navPoint">
 		<a class="navLink" href="/faq.php">
 			<i class="fas fa-question"></i>
 			<p class="navText">&nbsp;FAQ</p>
 		</a>
 	</li>
 	<li class="navPoint">
 		<a class="navLink" href="/rooms.php">
 			<i class="fas fa-bed"></i>
 			<p class="navText">&nbsp;Rooms</p>
 		</a>
 	</li>



<?php
	if (!(isset($_SESSION['userid']) || isset($_GET['login']) || isset($_GET['signup']) || isset($_GET['logout']))) {
		$url = $_SERVER['REQUEST_URI'];
?>

	<li class="navPoint right">
		<button class="navLink" onclick="openForm('login')">
			<i class="navIcon fas fa-sign-in-alt"></i>
			<p class="navText">&nbsp;Login</p>
		</button>
	</li>

<!--<li class="navPoint right">
		<form method="post" action="signup?signup"><input type="hidden" name="url" value="<?=$url?>" />
			<button class="navLink" type="submit">
				<i class="navIcon fas fa-edit"></i>
				<p class="navText">&nbsp;Sign up</p>
			</button>
		</form>
	</li>-->

<?php
	} else {
		$id = null;
		if(isset($_SESSION['userid'])) {
			$id = $_SESSION['userid'];
		}
    	$user = new user($id);
	#   TODO: new post should only be diplayed for admin users
?>

	<!--<li class="navPoint"><form method="post" aria-label="Make a new post" action="post?newpost"><button class="navLink" type="submit"><i class="navIcon fas fa-edit"></i><p class="navText">&nbsp;New Post</p></button></form></li>-->

    <li class="navPoint right">
    	<form method="post" aria-label="Your account" action="user?userid='<?=$user->id?>'">
    		<button class="navLink" type="submit">
    			<i class="navIcon fas fa-user"></i>
    			<p class="navText">&nbsp;<?=$user->name?></p>
    		</button>
    	</form>
    </li>
    <li class="navPoint right">
    	<button class="navLink" onclick="openForm('logout')">
    		<i class="navIcon fas fa-sign-out-alt"></i>
    		<p class="navText">&nbsp;Logout</p>
    	</button>
    </li>
	
<?php
	}
?>

</ul>

<?php
	include 'logout.php';
	include 'login.php';
?>