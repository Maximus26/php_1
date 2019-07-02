<?php


function getNews()
{

	$sql = "SELECT * FROM news ORDER BY `news`.`date_create` DESC";

	return getAssocResult($sql);
}


function renderNews($news)
{

	$newsContent = '';
	foreach ($news as $newsItem) {
		if (empty($newsItem['image'])) {
			$newsItem['image'] = 'img/no-image.jpeg';
		}

		$newsContent .= render(TEMPLATES_DIR . 'newsitem.tpl', [
			'title' => $newsItem['title'],
			'content' => $newsItem['content'],
			'image' => $newsItem['image'],
			'date_create' => $newsItem['date_create'],
			'link' => 'newsitem.php?id=' . $newsItem['id']
		]);
	}
	return $newsContent;
}
