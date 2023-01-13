<?php
class news_list extends news
{
	public function __construct() {

	}

	public function list_news() {
		$conn = new mysqli_init();
		if ($conn->connect_error) {
        	die("Connection failed: ".$conn->connect_error);
        }

		$sql = "SELECT * FROM news ORDER BY timestamp DESC";
		$stmt = $conn->prepare($sql);
      # $stmt->bind_param();
        $stmt->execute();

		$news_list = $stmt->get_result();

        foreach ($news_list as $news) {
        	$this->display_news($news);
    	}

    	$stmt->close();
        $conn->close();
	}
};