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

<div class="row p-lg-5 p-md-5" id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<div class="col-12 col-sm-12 col-md-12 col-lg-8">
		<div class="video-card mt-4 mt-lg-0">
			<video width="100%" poster="https://plussweb.ir/wp-content/uploads/2023/03/thumbnail-youtube.png" controls>
				<source type="video/mp4" src="https://plussweb.ir/wp-content/uploads/2023/03/Rec-0004.mp4">
			</video>
		</div>
		<div class="card">
			<div class="content-card">
				<?php the_content() ?>
			</div>
		</div>

		<div class="card">
			<div class="content-card">
				<?php
				do_action('woocommerce_after_single_product_summary');
				?>
			</div>
		</div>

	</div>
	<div class="col-12 col-sm-12 col-md-12 col-lg-4">
		<div class="sidebar">
			<div class="card-v2">
				<div class="content-card">
					<div class="rating-section">
						<span class="rating">امتیاز : </span>
						<div class="rating-stars text-center">
							<ul id="stars">
								<li class="star" data-value="1" title="خیلی ضعیف">
									<i class="fa fa-star fa-fw"></i>
								</li>
								<li class="star" data-value="2" title="ضعیف">
									<i class="fa fa-star fa-fw"></i>
								</li>
								<li class="star" data-value="3" title="متوسط">
									<i class="fa fa-star fa-fw"></i>
								</li>
								<li class="star" data-value="4" title="خوب">
									<i class="fa fa-star fa-fw"></i>
								</li>
								<li class="star" data-value="5" title="عالی">
									<i class="fa fa-star fa-fw"></i>
								</li>
							</ul>
						</div>
						<span class="votes"> ۲ رای</span>
					</div>
				</div>
			</div>
			<div class="card-v2">
				<div class="content-card">
					<div class="product-order">
						<span class="title">قیمت دوره</span>
						<span class="price">
							<del>۳۵۰,۰۰۰ تومان</del>
							<span class="orginal">رایـــــگـان</span>
							<!-- <span class="orginal">۱۰۰۰,۰۰۰ تومان</span> -->
						</span>
					</div>

					<form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
						<button type="submit" name="add-to-cart" value="<?= get_the_ID() ?>" class="single_add_to_cart_button primary-btn">ثبت نام در دوره</button>
					</form>
				</div>
			</div>
			<!-- <div class="card-v2">
                        <div class="d-flex align-items-center justify-content-center">
                            <lottie-player src="https://assets10.lottiefiles.com/datafiles/KZAksH53JBd6PNu/data.json"
                                background="transparent" speed="1" style="width: 60px; height: 60px;" loop
                                autoplay></lottie-player>
                            <span class="congratulations">تبریک! شما دانشجوی دوره هستید</span>
                        </div>
                    </div> -->
			<div class="card-v2">
				<div class="content-card">
					<div class="product-info">
						<div class="block-info">
							<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none">
								<path d="M6 3L10 4.5L12 5V9V21L9 20.5L5.5 19L3 18.5L2 16.5V10L2.5 3H6Z" fill="#3772FF" fill-opacity="0.25"></path>
								<path d="M22 16.74V4.67001C22 3.47001 21.02 2.58001 19.83 2.68001H19.77C17.67 2.86001 14.48 3.93001 12.7 5.05001L12.53 5.16001C12.24 5.34001 11.76 5.34001 11.47 5.16001L11.22 5.01001C9.44 3.90001 6.26 2.84001 4.16 2.67001C2.97 2.57001 2 3.47001 2 4.66001V16.74C2 17.7 2.78 18.6 3.74 18.72L4.03 18.76C6.2 19.05 9.55 20.15 11.47 21.2L11.51 21.22C11.78 21.37 12.21 21.37 12.47 21.22C14.39 20.16 17.75 19.05 19.93 18.76L20.26 18.72C21.22 18.6 22 17.7 22 16.74Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
								</path>
								<path d="M12 5.48999V20.49" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M7.75 8.48999H5.5" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M8.5 11.49H5.5" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
							<div class="title">
								تعداد جلسات
							</div>
							<div class="content">
								۱۴
							</div>
						</div>
						<div class="block-info">
							<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none">
								<path d="M5.5 12C5.5 8.41 8.41 5.5 12 5.5C15.59 5.5 18.5 8.41 18.5 12C18.5 14.08 17.52 15.94 16 17.13H15.99C14.89 17.99 13.51 18.5 12 18.5C10.51 18.5 9.14 18 8.04 17.15H8.03C6.49 15.96 5.5 14.1 5.5 12Z" fill="#FFD166" fill-opacity="0.45" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M12 9.65997V12.45L13.4 13.85" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M8.03003 17.15H8.04003C9.14003 18 10.51 18.5 12 18.5C13.51 18.5 14.89 17.99 15.99 17.13H16L15.49 19.6C15 21.5 13.9 22 12.55 22H11.46C10.11 22 9.00003 21.5 8.52003 19.59L8.03003 17.15Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
								</path>
								<path d="M8.03003 6.85H8.04003C9.14003 6 10.51 5.5 12 5.5C13.51 5.5 14.89 6.01 15.99 6.87H16L15.49 4.4C15 2.5 13.9 2 12.55 2H11.46C10.11 2 9.00003 2.5 8.52003 4.41L8.03003 6.85Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
								</path>
							</svg>
							<div class="title">
								مدت دوره
							</div>
							<div class="content">
								۳:۲۵:۰۰
							</div>
						</div>
						<div class="block-info">
							<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
								<path d="M22.5446 16.1546L31.0346 10.4696C31.8896 9.8996 32.1146 8.7296 31.5446 7.8896L28.8146 3.82457C28.2446 2.96957 27.0746 2.74457 26.2346 3.31457L17.7446 8.99958L22.5446 16.1546Z" fill="#FF6838" fill-opacity="0.45" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M18.2608 9.71874L11.0942 14.5186L14.9341 20.2518L22.1006 15.452L18.2608 9.71874Z" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								</path>
								<path d="M8.74482 23.8499L14.6698 19.8899L11.3098 14.8799L5.38481 18.8399C4.69481 19.3049 4.51482 20.2349 4.97982 20.9249L6.67481 23.4449C7.12481 24.1199 8.05482 24.2999 8.74482 23.8499Z" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								</path>
								<path d="M18.0749 18.2998L11.3398 32.9998" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M18 18.2998L24.66 32.9998" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
							<div class="title">
								نوع دوره
							</div>
							<div class="content">
								غیر حضوری
							</div>
						</div>
						<div class="block-info">
							<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
								<path d="M31.6202 12.8701V23.13C31.6202 24.81 30.7202 26.3701 29.2652 27.2251L20.3552 32.3701C18.9002 33.2101 17.1002 33.2101 15.6302 32.3701L6.72025 27.2251C5.26525 26.3851 4.36523 24.825 4.36523 23.13V12.8701C4.36523 11.1901 5.26525 9.62999 6.72025 8.77499L15.6302 3.63C17.0852 2.79 18.8852 2.79 20.3552 3.63L29.2652 8.77499C30.7202 9.62999 31.6202 11.1751 31.6202 12.8701Z" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								</path>
								<path d="M14.625 18.0003V16.2003C14.625 13.8903 16.26 12.9454 18.255 14.1004L19.815 15.0003L21.375 15.9003C23.37 17.0553 23.37 18.9454 21.375 20.1004L19.815 21.0003L18.255 21.9003C16.26 23.0553 14.625 22.1104 14.625 19.8004V18.0003Z" fill="#9757D7" fill-opacity="0.45" stroke="#23262F" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
								</path>
							</svg>
							<div class="title">
								نحوه دریافت
							</div>
							<div class="content">
								اسپات پلیر
							</div>
						</div>
						<div class="block-info">
							<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
								<path d="M24.6602 13.3496C30.0602 13.8146 32.2652 16.5896 32.2652 22.6646V22.8596C32.2652 29.5646 29.5802 32.2496 22.8752 32.2496H13.1102C6.40521 32.2496 3.72021 29.5646 3.72021 22.8596V22.6646C3.72021 16.6346 5.89521 13.8596 11.2052 13.3646" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								</path>
								<path d="M18 3V22.32" stroke="#58BD7D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M23.0251 18.9746L18.0001 23.9996L12.9751 18.9746" stroke="#58BD7D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
							<div class="title">
								حجم دوره
							</div>
							<div class="content">
								۱ گیگ
							</div>
						</div>
						<div class="block-info">
							<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none">
								<path d="M17.22 2H8.96005C8.56005 2 8.18002 2.14 7.87002 2.38L5.68002 4.13C4.80002 4.83 4.80002 6.15999 5.68002 6.85999L7.87002 8.60999C8.18002 8.85999 8.57005 8.98999 8.96005 8.98999H17.22C18.19 8.98999 18.97 8.20999 18.97 7.23999V3.73999C18.97 2.77999 18.19 2 17.22 2Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
								</path>
								<path d="M6.80005 12H15.0601C15.4601 12 15.8401 12.14 16.1501 12.38L18.3401 14.13C19.2201 14.83 19.2201 16.16 18.3401 16.86L16.1501 18.61C15.8401 18.86 15.4501 18.99 15.0601 18.99H6.80005C5.83005 18.99 5.05005 18.21 5.05005 17.24V13.74C5.05005 12.78 5.83005 12 6.80005 12Z" fill="#CDB4DB" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M12 12V9" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M12 22V19" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								<path d="M9 22H15" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
							<div class="title">
								وضعیت
							</div>
							<div class="content">
								در حال آپدیت
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-v2">
				<div class="d-flex align-items-center justify-content-center">
					<lottie-player src="https://assets8.lottiefiles.com/packages/lf20_qedmivnw.json" background="transparent" speed="1" style="width: 50px; height: 50px;" loop autoplay></lottie-player>
					<span class="customer">تعداد دانشجویان دوره : <?= empty(get_post_meta(get_the_ID(), '_total_sales', true)) ? 'بدون دانشجو' :  get_post_meta(get_the_ID(), '_total_sales', true) . ' نفر' ?></span>
				</div>
			</div>
			<div class="card-v2">
				<div class="content-card">
					<div class="copy-text">
						<input type="text" class="text" value="<?= wp_get_shortlink() ?>" />
						<button><i class="fa fa-clone"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>