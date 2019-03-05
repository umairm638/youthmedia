<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './libraries/dbConfig.php';
include_once './libraries/simple_html_dom.php';
$FetchURL = 'http://www.zemtv.com/category/bol-tv/meri-jang/';
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
foreach ($fetchedHTML->find('.image') as $element) {
    $fectchImgUrl = $fetchedHTML->find('.image img', $counter)->src;
    if ($element->href) {
        $fectchUrlArr[] = array(
            'url' => $element->href,
            'thumbnail' => $fectchImgUrl
            );
    }
    $counter++;
}

/////////////////////////
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
    $VideosWrapper = $fetchedHTML->find('#selectorElement');
    if ($VideosWrapper) {
        foreach ($VideosWrapper as $key => $videoDiv) {
            $videos = $videoDiv->find('iframe');
            if ($videos) {
                $thumbCounter = 1;
                foreach ($videos as $key => $vid) {
                    $videoIframe = isset($vid->attr) ? $vid->attr : '';
                    if (isset($videoIframe['src']) && $videoIframe['src'] != '') {
                        $escapedString = $videoIframe['src'];
                        // check if iframe exist in database for people are awesome.
                        $query = "Select * From posts where uniqueCustomKey = '$escapedString'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            continue;
                        } else {
                            $date = time();
                            $thumbnail = createThumbnail($fectchUrlArrRow['thumbnail'], $thumbCounter);
                            $sql = "INSERT INTO posts (postTitle, postDescription, postThumbnail, uniqueCustomKey, websiteId, categoryId, post, postTags, createdOn, userId, postStatus, isScrapped, postViewed)
                                    VALUES ('".$title."','','".$thumbnail."', '". $videoIframe['src'] . "', 2, 2, '".$videoIframe['src'] ."','news,politics,media,pakistan', $date, '1', 1, 1, ".rand(10,100).")";
                            if ($conn->query($sql) === TRUE) {
                                echo "New record created successfully!";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    }
                    $thumbCounter++;
                }
            }
        }
    }
}

$conn->close();

function createThumbnail($thumbnail, $thumbCounter) {
    $thumbnailName = $thumbCounter . time() . '.jpg';
    $img = '../assets/images/posts/' . $thumbnailName;
    file_put_contents($img, file_get_contents($thumbnail));
    return $thumbnailName;
}
