<?php
/**
 * The Content Sidebar
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

if(!is_active_sidebar('page-sidebar')) {
	return;
}
?>
<div class="widget-area">
	<?php dynamic_sidebar('page-sidebar'); ?>
</div>
