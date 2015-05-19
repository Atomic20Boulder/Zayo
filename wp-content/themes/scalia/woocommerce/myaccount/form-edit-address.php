<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $current_user;

$page_title = ( $load_address === 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );

get_currentuserinfo();
?>

	<?php
		$collumns = 2;
		$fields_per_collumn = ceil(count($address) / $collumns);
		$index = 0;
		$index_collumns = 1;
	?>

<?php wc_print_notices(); ?>

<?php if ( ! $load_address ) : ?>

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php else : ?>

	<form class="form-edit-adress" method="post">

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h3>

		<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

		<div class="row shadow-box form-edit-adress-fields rounded-corners">

			<div class="col-sm-6 col-xs-12">

				<?php foreach ( $address as $key => $field ) : ?>

				<?php if ($index >= $fields_per_collumn && $index_collumns < $collumns): ?>
					<?php
						$index_collumns++;
					?>
					</div><div class="col-sm-6 col-xs-12">
				<?php endif; ?>

					<?php
					woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); $index++; ?>

				<?php endforeach; ?>

				<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

				<p>
					<button type="submit" class="sc-button button" name="save_address" value="<?php _e( 'Save Address', 'woocommerce' ); ?>"><?php _e( 'Save Address', 'woocommerce' ); ?></button>
					<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
					<input type="hidden" name="action" value="edit_address" />
				</p>
		</div>

	</form>

<?php endif; ?>
