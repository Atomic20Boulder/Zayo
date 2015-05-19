<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

if ( ! is_active_sidebar( 'page-sidebar' ) ) {
	return;
}
?>
<div class="page-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'page-sidebar' ); ?>
</div><!-- #page-sidebar -->
