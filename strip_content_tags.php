<?php
/*
Place this code in your functions.php file to strip shortcode, img tags, divs, objects, blockquotes and tables from appearing before the <!--more--> tag.
*/
function wpt_strip_content_tags($content) {
    $content = strip_shortcodes($content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = preg_replace('/<img[^>]+./','',$content);
    $content = preg_replace('%<div.+?</div>%is', '', $content);
    $content = preg_replace('%<object.+?</object>%is', '', $content);
	$content = preg_replace('/<blockquote>/is', '', $content);
	$content = preg_replace('%<table.+?</table>%is', '', $content);
    return $content;
}

/*
Use this code in your template file to call the_content();
*/
$content = get_the_content('Read More Text Here');
$content = apply_filters('the_content', $content);
echo wpt_strip_content_tags($content); 
?>