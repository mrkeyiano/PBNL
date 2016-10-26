<?php
function video_info($url) {
$url = parse_url($url);
$vid = parse_str($url['query'], $output);
$video_id = $output['v'];
$data['video_type'] = 'youtube';
$data['video_id'] = $video_id;
$xml = simplexml_load_file("http://gdata.youtube.com/feeds/api/videos?q=$video_id");

foreach ($xml->entry as $entry) {
// get nodes in media: namespace
$media = $entry->children('http://search.yahoo.com/mrss/');

// get video player URL
$attrs = $media->group->player->attributes();
$watch = $attrs['url'];

// get video thumbnail
$data['thumb_1'] = $media->group->thumbnail[0]->attributes(); // Thumbnail 1
$data['thumb_2'] = $media->group->thumbnail[1]->attributes(); // Thumbnail 2
$data['thumb_3'] = $media->group->thumbnail[2]->attributes(); // Thumbnail 3
$data['thumb_large'] = $media->group->thumbnail[3]->attributes(); // Large thumbnail
$data['tags'] = $media->group->keywords; // Video Tags
$data['cat'] = $media->group->category; // Video category
$attrs = $media->group->thumbnail[0]->attributes();
$thumbnail = $attrs['url'];

// get <yt:duration> node for video length
$yt = $media->children('http://gdata.youtube.com/schemas/2007');
$attrs = $yt->duration->attributes();
$data['duration'] = $attrs['seconds'];

// get <yt:stats> node for viewer statistics
$yt = $entry->children('http://gdata.youtube.com/schemas/2007');
$attrs = $yt->statistics->attributes();
$data['views'] = $viewCount = $attrs['viewCount'];
$data['title']=$entry->title;
$data['info']=$entry->content;

// get <gd:rating> node for video ratings
$gd = $entry->children('http://schemas.google.com/g/2005');
if ($gd->rating) {
$attrs = $gd->rating->attributes();
$data['rating'] = $attrs['average'];
} else { $data['rating'] = 0;}
} // End foreach
return $data;
}
?>
