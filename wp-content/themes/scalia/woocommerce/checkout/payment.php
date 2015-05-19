<?php
/**
 * Checkout Payment Section
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


<?php if ( ! is_ajax() ) : ?>
	<?php do_action( 'woocommerce_review_order_before_payment' ); ?>
<?php endif; ?>

	<div id="payment" class="woocommerce-checkout-payment">
		<?php if ( WC()->cart->needs_payment() ) : ?>
		<ul class="payment_methods methods">
			<?php
				$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
				if ( ! empty( $available_gateways ) ) {

					foreach ( $available_gateways as $gateway ) {
						wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
					}
				} else {

					if ( ! WC()->customer->get_country() )
						$no_gateways_message = __( 'Please fill in your details above to see available payment methods.', 'woocommerce' );
					else
						$no_gateways_message = __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' );

					echo '<p>' . apply_filters( 'woocommerce_no_available_payment_methods_message', $no_gateways_message ) . '</p>';

				}
			?>
		</ul>
		<?php endif; ?>

		<div class="form-row place-order">

			<noscript><?php _e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?><br/><button type="submit" class="sc-button button alt" name="woocommerce_checkout_update_totals"><?php _e( 'Update totals', 'woocommerce' ); ?></button></noscript>

			<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>

			<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

			<?php
			$order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );

			echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="sc-button button alt" name="woocommerce_checkout_place_order" id="place_order" data-value="' . esc_attr( $order_button_text ) . '">' . esc_attr( $order_button_text ) . '</button>' );
			?>

			<?php if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) {
				$terms_is_checked = apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) );
				?>
				<p class="form-row terms">
					<input type="checkbox" class="input-checkbox sc-checkbox" name="terms" <?php checked( $terms_is_checked, true ); ?> id="terms" />
					<label for="terms" class="checkbox"><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank">terms &amp; conditions</a>', 'woocommerce' ), esc_url( get_permalink( wc_get_page_id( 'terms' ) ) ) ); ?></label>
				</p>
			<?php } ?>

			<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		</div>

		<div class="clear"></div>

	</div>

	<?php if ( ! is_ajax() ) : ?>
		<?php do_action( 'woocommerce_review_order_after_payment' ); ?>
	<?php endif; ?>