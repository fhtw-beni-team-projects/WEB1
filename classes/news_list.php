<?php
class news_list extends news
{
	static public function list_news() {
		$sql = "SELECT * FROM news ORDER BY timestamp DESC";
		$stmt = $conn->prepare($sql);
      # $stmt->bind_param();
        $stmt->execute();

		$news_list = $stmt->get_result();

        $stmt->close();
        $conn->close();

        foreach ($news_list as $news) {
        	$this->display_news($news->fetch_assoc());
    	}
	}
}