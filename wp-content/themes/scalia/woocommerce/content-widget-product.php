<?php global $product; ?>
<li>
	<?php woocommerce_show_product_loop_sale_flash(); ?>
	<div class="sc-products-image">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>">
		<?php echo $product->get_image(); ?>
		</a>
	</div>
	<div class="sc-products-content">
		<div class="sc-products-title">
			<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
				<?php echo $product->get_title(); ?>
			</a>
		</div>
		<div class="sc-products-rating"><?php echo $product->get_rating_html(); ?></div>
		<div class="sc-products-price"><?php echo $product->get_price_html(); ?></div>
	</div>
</li>
