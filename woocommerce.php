<?php
get_header();
?>

<div class="woocommerce">
<div class="row">
	<div class="header-product-single" style="background-image: url('<?= PLSWB_THEME_ASSETS . 'images/icon-back-OWL.png' ?>');">
		<div class="title">
			<h1><?php the_title() ?></h1>
		</div>
		<?php woocommerce_breadcrumb() ?>
	</div>
</div>
    <?php woocommerce_content(); ?>
</div>

<?php

get_footer();
