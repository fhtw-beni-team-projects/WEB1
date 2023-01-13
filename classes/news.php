<?php
class news
{
	public $id;
	private $news;

	public function __construct($id) {

		if (isset($id)) {
			$this->id = $id;
			get_news();
		}
	}

	public function display_news($news = $this->news) {
		?>
		
		<div class="post main" id="article_<?=$news['id']?>" onclick="open_article(<?=$news['id']?>)">
			<p class="info">Posted by <?=-----?> on <?=$news['timestamp']?></p>
        	<h2 class="title"><?=$news['title']?></h2>
        	<a onclick="noClick()"><?=$news['text']?></a>

        	<?php
        	if (isset($_SESSION['userid']) && user::is_admin($_SESSION['userid'])) {
        	?>

        	<!-- TODO: edit function -->
           	<br><p class="info">&nbsp;&nbsp;<a class="actionlink" onclick="editPost(<?=$news['id']?>)"><i class="far fa-edit"></i>&nbsp;Edit</a></p>
            <p class="info">&nbsp;&nbsp;<a class="actionlink" onclick="deletePost(<?=$news['id']?>)"><i class="far fa-trash-alt"></i>&nbsp;Delete</a></p>
            
            <?php
        	}
        	?>

      	</div>

      	<?php
	}

	protected function get_news($id = $this->id) {

		if (!isset($id)) {
			return;
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