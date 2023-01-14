<?php
class news
{
	public $id;
	private $news;

	public function __construct($id = false) {

		if ($id) {
			$this->get_news($id);
		}
	}

	public function display_news($news = false, $full = true) {
		if (!$news) {
			$news = $this->news;
		}
		?>
		
		<div class="post main" id="article_<?=$news['id']?>" onclick="open_article(<?=$news['id']?>)">
			<p class="info">Writen by <?=$news['author']?> on <?=$news['timestamp']?></p>
        	<h2 class="title"><?=$news['title']?></h2>
        	<?php
        		if (file_exists("img/".$news['id']."_thumb.jpg")) {
        			$image = true
        	?>
        			<img src="<?=glob("img/".$news['id']."_thumb.jpg")?>"/>
        	<?php
        		}
        		if ($image) {
        			$limit = 250;
        		} else {
        			$limit = 750;
        		}
        		if ($full || strlen($news['text']) < $limit + 10) {
					echo '<p onclick="noClick()">'.$news['text'].'</p>';
        		} else {
        			echo '<p onclick="noClick()">'.substr($news['text'], 0, $limit).'... <a>Read More</a></p>';
        		}
        	?>

        	<?php
        		if (isset($_SESSION['userid']) && user::is_admin($_SESSION['userid'])) {
        	?>

        			<!-- TODO: edit function -->
           			<br><p class="info">&nbsp;&nbsp;<a class="actionlink" onclick="edit_article(<?=$news['id']?>)"><i class="far fa-edit"></i>&nbsp;Edit</a></p>
            		<p class="info">&nbsp;&nbsp;<a class="actionlink" onclick="delete_article(<?=$news['id']?>)"><i class="far fa-trash-alt"></i>&nbsp;Delete</a></p>
            
            <?php
        		}
        	?>

      	</div>

      	<?php
	}

	public function edit_form() {
		news::news_form(true, $this->news);
	}

	static public function news_form($edit = false, $news = false) {
		if (!$news) {
			$news = array("title" => "", "text" => "", "author" => ""); #scuffed af
		}
		?>
		<form method="post" action="?submit" class="form formmax" id="article_form">
    		<div class="formcontent formcontentmax">
    		<p class="descr formleft">Title</p><input class="formright forminput" type="text" name="title" placeholder="Choose a title" value="<?=$news['title'] ?>" />
    		<p class="descr formleft">Author</p><input class="formright forminput" type="text" name="author" placeholder="Author name" value="<?=$news['author'] ?>" />
    		<p class="descr formleft">Text</p><textarea class="formright forminput largetext" type="text" name="text" placeholder="Write your text"><?= $news['text'] ?></textarea>
    		<input type="hidden" name="url" value="<?=$_POST['url']?>" />
    		<button type="button" class="btn btnA formleft" onclick="history.back()"><i class="far fa-window-close"></i>&nbsp;Cancel</button>
    		<button type="submit" class="btn btnB formright" name="formaction"><i class="fas fa-edit"></i>&nbsp;Submit</button></div>
    		<?php
    		if ($edit) {
    			echo '<input type="hidden" name="edit" value="1"/>';
    			echo '<input type="hidden" name="id" value="'.$news['id'].'"/>';
    		} else {
    			echo '<input type="hidden" name="edit" value="0"/>';
    		}
    		?>
		</form>
		<?php
	}

	static public function submit_news() {
		if (!user::is_admin($_SESSION['userid'])) {
			return;
		}

		if ($_POST['edit']) {
			$edit = true;
			$id = $_POST['id'];
		}

		$author = $_POST['author'];
		$title = $_POST['title'];
		$text = $_POST['text'];

		$conn = new mysqli_init();
		if ($conn->connect_error) {
        	die("Connection failed: ".$conn->connect_error);
        }

        $types = "sss";
        $parameters = array($author, $title, $text);
        if ($edit) {
        	$sql = "UPDATE news SET author = ?, title = ?, text = ? WHERE id = ?";
        	$types .= "i";
        	$parameters[] = $id;
        } else {
        	$sql = "INSERT INTO news (author, title, text) VALUES (?, ?, ?)";
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$parameters);	
        $stmt->execute();

        $stmt->close();
        $conn->close();
	}

	protected function get_news($id = false) {

		if (!$id) {
			if (isset($this->id)) {
				$id = $this->id;
			} else {
				return;
			}
		}

		$conn = new mysqli_init();
		if ($conn->connect_error) {
        	die("Connection failed: ".$conn->connect_error);
        }

        $sql = "SELECT * FROM news WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $news = $stmt->get_result()->fetch_assoc();

        $stmt->close();
        $conn->close();

        $this->id = $id;
		$this->news = $news;
	}

	public function post_news() {

		$conn = new mysqli_init();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $error = false;

        $author = $_POST['author'];
        $title = $_POST['title'];
        $text = $_POST['text'];

        if (!isset($profile_id)) {
            $error = true;
        }

        if (!$error) {
            $sql = "INSERT INTO news (author, title, text) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $author, $title, $text);
    
            if ($stmt->execute()) {
                # TODO: post confirmation

                $statusMessage = "Success! Affected rows: " . $stmt->affected_rows;
            } else {
                $statusMessage = "Couldn't send data<br>";
            }
    
            $stmt->close();
        }
        $conn->close();
	}

	static public function delete($id) {
		if(!(isset($_SESSION['userid']) && user::is_admin($_SESSION['userid']))) {
			return;
		}

		$conn = new mysqli_init();
		if ($conn->connect_error) {
        	die("Connection failed: ".$conn->connect_error);
        }

        $sql = "DELETE FROM news WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();

        echo 1;
	}
}