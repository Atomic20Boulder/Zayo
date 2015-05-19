<?php
	$item_data = scalia_get_sanitize_testimonial_data(get_the_ID());
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('sc-testimonial-item'); ?>>
	<div class="sc-testimonial-image">
		<?php scalia_post_thumbnail('scalia-person'); ?>
	</div>
	<blockquote class="sc-testimonial-text">
		<?php the_content(); ?>
	</blockquote>
	<?php echo scalia_get_data($item_data, 'name', '', '<div class="sc-testimonial-name">', '</div>'); ?>
	<?php echo scalia_get_data($item_data, 'position', scalia_get_data($item_data, 'company'), '<div class="sc-testimonial-position">', ', '.scalia_get_data($item_data, 'company').'</div>'); ?>
</div>