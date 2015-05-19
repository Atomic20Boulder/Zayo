<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if (empty($woocommerce_loop['loop']))
	$woocommerce_loop['loop'] = 0;

if (empty($woocommerce_loop['columns']))
	$woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 4);

if (! $product || ! $product->is_visible())
	return;

$woocommerce_loop['loop']++;

$classes = array('inline-column');
if($woocommerce_loop['columns'] == 2) {
	$classes[] = 'col-xs-6';
} elseif($woocommerce_loop['columns'] == 3) {
	$classes[] = 'col-sm-4 col-xs-6';
}elseif($woocommerce_loop['columns'] == 4) {
	$classes[] = 'col-sm-3 col-xs-6';
}
if(0 == ($woocommerce_loop['loop'] - 1) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'])
	$classes[] = 'first';
if(0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'])
	$classes[] = 'last';
?>
<div <?php post_class($classes); ?>>
	<div class="product-inner rounded-corners shadow-box">

		<?php do_action('woocommerce_before_shop_loop_item'); ?>

		<a href="<?php the_permalink(); ?>" class="product-image">
			<?php do_action('woocommerce_before_shop_loop_item_title'); ?>
		</a>

		<div class="product-info clearfix">
			<div class="product-title"><?php the_title(); ?></div>
			<?php echo '<div class="product-categories">'; the_terms(get_the_ID(), 'product_cat', '', ' | ', ''); echo '</div>'; ?>
			<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
		</div>

		<div class="product-bottom clearfix">
			<?php do_action('woocommerce_after_shop_loop_item'); ?>
		</div>

	</div>
</div>