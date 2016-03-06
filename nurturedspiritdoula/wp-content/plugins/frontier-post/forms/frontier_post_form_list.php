<?php 

//test comment icon
	/*
	echo "<hr>";
	$theme_icon 	= get_template_directory_uri()."/images/comments.png";
	$frontier_icon	= get_stylesheet_directory_uri()."/plugins/frontier-post/comments.png";
	$wp_icon		= includes_url()."/images/wlw/wp-comments.png";
	echo "Theme Icon: get_template_directory_uri() -->".$theme_icon."/plugins/frontier-post/comments.png"." | icon: <img src='".$theme_icon."'></img>"."<br>";
	echo "Child theme Icon: get_stylesheet_directory_uri() -->".$frontier_icon." | icon: <img src='".$frontier_icon."'></img>"."<br>";
	echo "WP Icon: includes_url() -->".$wp_icon." | icon: <img src='".$wp_icon."'></img>"."<br>";
	echo "<hr>";
	*/
	
$concat= get_option("permalink_structure")?"?":"&";    
//set the permalink for the page itself
$frontier_permalink = get_permalink();

//Display before text from shortcode
if ( strlen($frontier_list_text_before) > 1 )
	echo '<div id="frontier_list_text_before">'.$frontier_list_text_before.'</div>';


//Display message
frontier_post_output_msg();

$fp_cat_list = implode(",", $frontier_cat_id); 

/*
echo "post_type: ".$frontier_add_post_type."<br>";
echo "Label: ".fp_get_posttype_label_singular($frontier_add_post_type);
*/

if (frontier_can_add() && !fp_get_option_bool("fps_hide_add_on_list"))
	{
	if (strlen(trim($frontier_add_link_text))>0)
		$tmp_add_text = $frontier_add_link_text;
	else
		$tmp_add_text = __("Create New", "frontier-post")." ".fp_get_posttype_label_singular($frontier_add_post_type);
		
?>
	<table class="frontier-menu" >
		<tr class="frontier-menu">
			<th class="frontier-menu" >&nbsp;</th>
			<th class="frontier-menu" ><a id="frontier-post-add-new-link" href='<?php echo frontier_post_add_link($tmp_p_id) ?>'><?php echo $tmp_add_text; ?></a></th>
			<th class="frontier-menu" >&nbsp;</th>
		</tr>
	</table>

<?php
	
	} // if can_add

if( $user_posts->found_posts > 0 )
	{
	
	$tmp_status_list = get_post_statuses( );

	// If post for all users is viewed, show author instead of category
	if ($frontier_list_all_posts == "true" || $frontier_list_pending_posts == "true")
		$cat_author_heading = __("Author", "frontier-post");
	else	
		$cat_author_heading = __("Category", "frontier-post");
?>

<table class="frontier-list" id="user_post_list">
 	<div id="frontier-post-list-heading">
	<thead>
		<tr>
			<th class="frontier-list-posts" id="frontier-list-posts-date"><?php _e("Date", "frontier-post"); ?></th>
			<th class="frontier-list-posts" id="frontier-list-posts-title"><?php _e("Title", "frontier-post"); ?></th>	
			<?php
			// do not show Status if list all posts, as all are published
			if ( $frontier_list_all_posts != "true" || current_user_can( 'edit_private_posts' ) )
				echo '<th class="frontier-list-posts" id="frontier-list-posts-status">'.__("Status", "frontier-post").'</th>';
			?>
			<th class="frontier-list-posts" id="frontier-list-posts-category"><?php echo $cat_author_heading ?></th>
			<th class="frontier-list-posts" id="frontier-list-posts-cmt"><?php echo frontier_get_icon('comments'); ?></th> <!--number of comments-->
			<th class="frontier-list-posts" id="frontier-list-posts-action"><?php _e("Action", "frontier-post"); ?></th>
		</tr>
	</thead> 
	<!--</div>-->
	<tbody>
	<?php 
	while ($user_posts->have_posts()) 
		{
			$user_posts->the_post();
	?>
			<tr>
				<td class="frontier-list-posts" id="frontier-list-posts-date"><?php echo mysql2date('Y-m-d', $post->post_date); ?></td>
				<td class="frontier-list-posts" id="frontier-list-posts-title">
				<?php if ($post->post_status == "publish")
						{ ?>
						<a class="frontier-list-posts" id="frontier-list-posts-title-link" href="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title;?></a>
				<?php	} 
					else
						{
						echo $post->post_title;
						} ?>
						
				</td>
				<?php
				if ( $frontier_list_all_posts != "true" || current_user_can( 'edit_private_posts' ) )
					echo '<td class="frontier-list-posts" id="" >'.( isset($tmp_status_list[$post->post_status]) ? $tmp_status_list[$post->post_status] : $post->post_status );
					// check if moderation comments
					if ($post->post_status == "draft" || $post->post_status == "pending")
						{
						$tmp_flag = get_post_meta( $post->ID, 'FRONTIER_POST_MODERATION_FLAG', true );
						if (isset($tmp_flag) && $tmp_flag == "true")
							echo " ".frontier_get_icon('moderation');
						}
					echo '</td>';
				?>
				<?php  
					// If post for all users is viewed, show author instead of category
					if ($frontier_list_all_posts == "true" || $frontier_list_pending_posts == "true")
						{
						echo '<td class="frontier-list-posts" id="frontier-list-posts-author">';
						echo get_the_author_meta( 'display_name', $post	->author);
						}
					else
						{
						echo '<td class="frontier-list-posts" id="frontier-list-posts-category">';
						// List categories
						$categories=get_the_category( $post->ID );
						$cnt = 0;
						foreach ($categories as $category) :
							$cnt = $cnt+1;
							if ($cnt > 1)
								echo "</br>".$category->cat_name; 
							else
								echo $category->cat_name; 
						endforeach;
						}
				?></td>
				<td class="frontier-list-posts" id="frontier-list-posts-cmt"><?php  echo $post->comment_count;?></td>
				<td class="frontier-list-posts" id="frontier-list-posts-action">
					<?php
					echo frontier_post_display_links($post, $fp_show_icons, $frontier_permalink);
					/*
					echo frontier_post_edit_link($post, $fp_show_icons, $frontier_permalink);
					echo frontier_post_delete_link($post, $fp_show_icons, $frontier_permalink);
					echo frontier_post_preview_link($post, $fp_show_icons);
					*/
							
					?>
					&nbsp;
				</td>
			</tr>
		<?php 
		} 
		?>
	</tbody>
</table>
<?php

	if ($frontier_pagination == "true")
		{
	
		$pagination = paginate_links( 
			array(
				'base' => add_query_arg( 'pagenum', '%#%' ),
				'format' => '',
				'prev_text' => __( '&laquo;', 'frontier-post' ),
				'next_text' => __( '&raquo;', 'frontier-post' ),
				'total' => $user_posts->max_num_pages,
				'current' => $pagenum,
				'add_args' => false  //due to wp 4.1 bug (trac ticket 30831)
				) 
			);

		if ( $pagination ) 
			echo $pagination;
		}
	if ( $frontier_list_all_posts != "true" )
		echo "</br>".__("Number of posts already created by you: ", "frontier-post").$user_posts->found_posts."</br>";
	}
	
else
	{
		echo "</br><center>";
		_e('Sorry, you do not have any posts (yet)', 'frontier-post');
		echo "</center><br></br>";
	} // end post count
	
//Re-instate $post for the page
wp_reset_postdata();

?>