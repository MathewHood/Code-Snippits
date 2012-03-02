<?php
/*
This code displays the parent page as a title, and then child pages below it. When on a child page, the parent page title is still displayed.
*/
<?php $parent_title = get_the_title($post->post_parent); echo $parent_title;?>
	<?php
	if($post->post_parent) 
	$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
	else
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	if ($children) { ?>
	<ul>
	<?php echo $children; ?>
	</ul>
<?php } ?>

	