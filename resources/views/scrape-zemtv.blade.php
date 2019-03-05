<?php


include(app_path().'/scrapping/libraries/dbConfig.php');
include(app_path().'/scrapping/libraries/simple_html_dom.php');
// include_once '..../scrapping/libraries/dbConfig.php';
// include_once '..../scrapping/libraries/simple_html_dom.php';

$FetchURL = 'http://www.zemtv.com/category/pakistani/';
$fectchUrlArr = array();
$_curl = curl_init();
curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($_curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; InfoPath.1)');
//                 curl_setopt($_curl, CURLOPT_FOLLOWLOCATION, true); //new added
curl_setopt($_curl, CURLOPT_URL, $FetchURL);
$r_html = curl_exec($_curl);
curl_close($_curl);
$counter = 0;
$fetchedHTML = str_get_html($r_html);
foreach ($fetchedHTML->find('#ajaxcontent') as $container) {
	foreach ($container->find('.image') as $element) {
		foreach ($element->find('img') as $img) {
			if ($element->href) {
				$fectchUrlArr[] = array(
					'url' => $element->href,
					'thumbnail' => $img->src,
				);
			}

		}

	}

}

foreach ($fectchUrlArr as $fectchUrlArrRow) {
	$_curl = curl_init();
	curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($_curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; InfoPath.1)');
	//                 curl_setopt($_curl, CURLOPT_FOLLOWLOCATION, true); //new added
	curl_setopt($_curl, CURLOPT_URL, $fectchUrlArrRow['url']);
	$r_html = curl_exec($_curl);
	curl_close($_curl);

	$fetchedHTML = str_get_html($r_html);

	$title = $fetchedHTML->find('div[class=ui top attached header]', 0)->plaintext;
	$title = trim(substr($title, 0, strpos($title, "Posted")));
	$videoIframe = $fetchedHTML->find('iframe', 0);
	$videoIframe = $videoIframe->src;
	$thumbCounter = 1;
	if (isset($videoIframe) && $videoIframe != '') {
		$escapedString = $videoIframe;
		// check if iframe exist in database for people are awesome.
		$query = "Select * From posts where uniqueCustomKey = '$escapedString'";
		$result = $conn->query($query);
		if ($result->num_rows > 0) {
			continue;
		} else {
			$date = time();
			$thumbnail = createThumbnail($fectchUrlArrRow['thumbnail'], $thumbCounter);
			$sql = "INSERT INTO posts (postTitle, postDescription, postThumbnail, uniqueCustomKey, websiteId, categoryId, post, postTags, createdOn, userId, postStatus, isScrapped, postViewed)
                                       VALUES ('" . $title . "','','" . $thumbnail . "', '" . $videoIframe . "', 2, 2, '" . $videoIframe . "','news,politics,media,pakistan', $date, '1', 1, 1, " . rand(10, 100) . ")";
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully!";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
	$thumbCounter++;

}
function createThumbnail($thumbnail, $thumbCounter) {
	$thumbnailName = $thumbCounter . time() . '.jpg';
	$img = base_path() .'/assets/images/posts/' . $thumbnailName;
	file_put_contents($img, file_get_contents($thumbnail));
	return $thumbnailName;
}

?>