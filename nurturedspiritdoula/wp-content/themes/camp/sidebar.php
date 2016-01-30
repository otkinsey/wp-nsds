<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, display default widgets.
 *
 * @subpackage Camp
 * @since Camp 1.0
 */ ?>
<aside>
	<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'Sidebar' ) ) {
		the_widget( 'WP_Widget_Search' );
		the_widget( 'WP_Widget_Recent_Posts', 'number=5' );
		the_widget( 'WP_Widget_Recent_Comments', 'number=3' );
		the_widget( 'WP_Widget_Archives' );
		the_widget( 'WP_Widget_Categories' );
	} ?>
</aside>