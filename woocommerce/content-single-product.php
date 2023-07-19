<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<?php $PLSWB_COURSE_OPTION = get_post_meta(get_the_ID(), 'PLSWB_COURSE_OPTION', true); ?>

<div class="row p-lg-5 p-md-5" id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>



	<div class="col-12 col-sm-12 col-md-12 col-lg-8">
		<div class="header-tab mb-3">
			<a href="<?= get_permalink() ?>" class="tab-item <?= get_query_var('pagename') == '' ? 'tab-active' : '' ?>">توضیحات</a>
			<a href="#" class="tab-item">سرفصل ها</a>
			<a href="<?= get_permalink() . 'discussions' ?>" class="tab-item <?= get_query_var('pagename') == 'discussions' ? 'tab-active' : '' ?>">پرسش و پاسخ</a>
			<a href="#" class="tab-item">سوالات متداول</a>
		</div>
		<?php if (get_query_var('pagename') == 'discussions') : ?>
			<?php include PLSWB_THEME_PATH . 'template-parts/woocommerce/single-product/single-discussions.php'; ?>
		<?php else : ?>
			<?php include PLSWB_THEME_PATH . 'template-parts/woocommerce/single-product/single-content.php'; ?>
		<?php endif; ?>
	</div>
	<div class="col-12 col-sm-12 col-md-12 col-lg-4">
		<?php include PLSWB_THEME_PATH . 'template-parts/woocommerce/single-product/single-sidebar.php'; ?>
	</div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>