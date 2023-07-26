<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>


<div class="col-12 col-sm-6 col-md-4 col-lg-3 px-0">

	<a href="<?php the_permalink() ?>" class="card mt-4 mb-5 mx-2">
		<div class="content-card p-2">
			<div class="card-image-list">
				<?php the_post_thumbnail('normal', ['loading' => 'lazy']) ?>
			</div>
			<div class="card-title-list">
				<h2><?= mb_strlen(get_the_title())  > 65 ? mb_substr(get_the_title(), 0, 65) . '...' : get_the_title() ?></h2>
			</div>
		</div>
	</a>
</div>