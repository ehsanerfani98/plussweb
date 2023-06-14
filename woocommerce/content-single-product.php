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

		<?php
		global $product;
		$args = array(
			'post_type'     =>  'product',
			'post_id'       =>  $product->id,
			'status'        =>  "approve"
		);
		$comments = get_comments($args);

		function ifCommentIsBuyer($comment, $product)
		{
			$bought = false;
			$customerOrders = get_posts(array(
				'numberposts'   =>  -1,
				'meta_key'      =>  '_customer_user',
				'meta_value'    =>  $comment->user_id,
				'post_type'     =>  'shop_order',
				'post_status'   =>  'wc-completed'
			));
			foreach ($customerOrders as $customerOrder) {
				$order = wc_get_order($customerOrder);
				foreach ($order->get_items() as $item) {
					$productId = $item['product_id'];
					if ($productId == $product->id) $bought = true;
				}
			}
			return $bought;
		}

		function echoFirstLevelComment($comment)
		{ ?>
			<div class="border rounded p-2 p-lg-6 mb-5" id="comment-<?php echo $comment->comment_ID ?>">
				<div class="mb-0">
					<div class="d-flex flex-stack flex-wrap mb-5">
						<div class="d-flex align-items-center py-1">
							<div class="symbol symbol-35px me-2">
								<?php echo get_avatar($comment) ?>
							</div>
							<div class="d-flex flex-column align-items-start justify-content-center">
								<span class="text-gray-800 fs-7 fw-bold lh-1 mb-2">
									<span class="comment-author">
										<?php echo $comment->comment_author ?>
									</span>
									<?php if (user_can($comment->user_id, 'manage_options')) : ?>
										<span class="badge badge-light-success ms-1">پشتیبانی پیدوگیم</span>
									<?php else : ?>
										<?php global $product; ?>
										<?php if (ifCommentIsBuyer($comment, $product)) : ?>
											<span class="badge badge-light-primary ms-1">خریدار محصول</span>
										<?php endif ?>
									<?php endif ?>
								</span>
								<span class="text-muted fs-8 fw-bold lh-1 ss02"><?php comment_date('', $comment) ?></span>
							</div>
						</div>
						<div class="d-flex align-items-center py-1">
							<!-- <div class="rating me-2">
                        <?php $rating = get_comment_meta($comment->comment_ID, 'rating', true) ?>
                        <?php if ($rating > 0) : ?>
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <div class="rating-label <?php if ($i <= $rating) echo 'checked' ?>">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </div>
                            <?php endfor ?>
                        <?php endif ?>
                    </div> -->
							<div class="d-flex align-items-center flex-column">
								<span class="d-flex align-items-center mb-2">
									<span onclick="setLikeComment(this, <?= $comment->comment_ID ?>)" style="cursor: pointer;" class="svg-icon <?= isset($_COOKIE[$comment->comment_ID]) ? 'svg-icon-danger' : 'svg-icon-muted' ?>"><svg xmlns="http://www.w3.org/2000/svg" class="h-25px w-25px" viewBox="0 0 24 24" fill="none">
											<path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black" />
										</svg></span>
									<span class="text-muted mr-1" id="like-total">
										<?php if (!empty(get_comment_meta($comment->comment_ID, 'total_like', true))) : ?>
											<?= "(" . get_comment_meta($comment->comment_ID, 'total_like', true) . ")" ?>
										<?php endif; ?>
									</span>
								</span>

								<a data-reply-id="<?php echo $comment->comment_ID ?>" href="#comment" class="reply-comment btn btn-sm btn-flex btn-color-gray-500 btn-active-light me-1" data-kt-scroll-toggle>پاسخ</a>
							</div>

						</div>
					</div>
					<div class="comment-content fs-5 fw-normal text-gray-800"><?php echo $comment->comment_content ?></div>
				</div>
				<div class="ps-10 mb-0"></div>
			</div>
		<?php }

		function echoChildrenComment($comment)
		{ ?>
			<?php foreach ($comment->get_children() as $comment) : ?>
				<div class="<?= user_can($comment->user_id, 'manage_options') ? 'border-dashed border-primary bg-gray-100' : 'border' ?> rounded p-2 p-lg-6 mb-5 ms-5 ms-lg-10" id="comment-<?php echo $comment->comment_ID ?>">
					<div class="mb-0">
						<div class="d-flex flex-stack flex-wrap mb-5">
							<div class="d-flex align-items-center py-1">
								<div class="symbol symbol-35px me-2">
									<?php echo get_avatar($comment) ?>
								</div>
								<div class="d-flex flex-column align-items-start justify-content-center">
									<span class="text-gray-800 fs-7 fw-bold lh-1 mb-2">
										<span class="comment-author">
											<?php echo $comment->comment_author ?>
										</span>
										<?php if (user_can($comment->user_id, 'manage_options')) : ?>
											<span class="badge badge-light-success ms-1">پشتیبانی پیدوگیم</span>
										<?php else : ?>
											<?php global $product; ?>
											<?php if (ifCommentIsBuyer($comment, $product)) : ?>
												<span class="badge badge-light-primary ms-1">خریدار محصول</span>
											<?php endif ?>
										<?php endif ?>
										در پاسخ به <a href="#comment-<?php echo $comment->comment_parent ?>" data-kt-scroll-toggle><?php echo get_comment_author($comment->comment_parent) ?></a>
									</span>
									<span class="text-muted fs-8 fw-bold lh-1 ss02"><?php comment_date('', $comment) ?></span>
								</div>
							</div>
							<div class="d-flex align-items-center py-1">
								<!-- <div class="rating me-2">
                            <?php $rating = get_comment_meta($comment->comment_ID, 'rating', true) ?>
                            <?php if ($rating > 0) : ?>
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <div class="rating-label <?php if ($i <= $rating) echo 'checked' ?>">
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </div>
                                <?php endfor ?>
                            <?php endif ?>
                        </div> -->
								<div class="d-flex align-items-center flex-column">

									<span class="d-flex align-items-center mb-2">
										<span onclick="setLikeComment(this, <?= $comment->comment_ID ?>)" style="cursor: pointer;" class="svg-icon <?= isset($_COOKIE[$comment->comment_ID]) ? 'svg-icon-danger' : 'svg-icon-muted' ?>"><svg xmlns="http://www.w3.org/2000/svg" class="h-25px w-25px" viewBox="0 0 24 24" fill="none">
												<path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black" />
											</svg></span>
										<span class="text-muted mr-1" id="like-total">
											<?php if (!empty(get_comment_meta($comment->comment_ID, 'total_like', true))) : ?>
												<?= "(" . get_comment_meta($comment->comment_ID, 'total_like', true) . ")" ?>
											<?php endif; ?>
										</span>
									</span>
									<a data-reply-id="<?php echo $comment->comment_ID ?>" href="#comment" class="reply-comment btn btn-sm btn-flex btn-color-gray-500 btn-active-light me-1" data-kt-scroll-toggle>پاسخ</a>
								</div>
							</div>
						</div>
						<div class="comment-content fs-5 fw-normal text-gray-800"><?php echo $comment->comment_content ?></div>
					</div>
					<div class="ps-10 mb-0"></div>
				</div>
				<?php if ($comment->get_children()) echoChildrenComment($comment) ?>
			<?php endforeach ?>
		<?php } ?>

		<?php if ($comments) : ?>
			<div class="row">
				<div class="col-12 col-xl-12">
					<div class="mt-17">
						<div class="d-flex flex-stack mb-5">
							<h3 class="text-dark ss02">دیدگاه ها (<?php echo count($comments) ?> مورد)</h3>
						</div>
						<div class="separator separator-dashed mb-9"></div>
						<div class="row">
							<div class="flex-column-fluid">
								<?php
								foreach ($comments as $comment) {
									if ($comment->comment_parent == 0) {
										echoFirstLevelComment($comment);
										echoChildrenComment($comment);
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>






		<?php $options = get_option('pidogame_framework');
		global $product; ?>
		<div id="comment" class="row">
			<div class="col-12 col-xl-12">
				<div class="mt-17">
					<div class="d-flex flex-stack mb-5">
						<h3 class="text-dark">دیدگاه خود را بنویسید</h3>
					</div>
					<div class="separator separator-dashed mb-9"></div>
					<div class="row g-10">
						<form id="kt_product_submit_comment_form" class="form">
							<div class="mb-5 fv-row">
								<label class="d-inline-block fs-6 fw-bold text-gray-700">امتیاز شما به محصول:</label>
								<div class="d-inline-block ms-2">
									<input class="rating-input" name="rating" value="0" checked type="radio" id="kt_rating_input_0" />
									<label class="rating-label" for="kt_rating_input_1">
										<span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
											</svg>
										</span>
									</label>
									<input class="rating-input" name="rating" value="1" type="radio" id="kt_rating_input_1" />
									<label class="rating-label" for="kt_rating_input_2">
										<span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
											</svg>
										</span>
									</label>
									<input class="rating-input" name="rating" value="2" type="radio" id="kt_rating_input_2" />
									<label class="rating-label" for="kt_rating_input_3">
										<span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
											</svg>
										</span>
									</label>
									<input class="rating-input" name="rating" value="3" type="radio" id="kt_rating_input_3" />
									<label class="rating-label" for="kt_rating_input_4">
										<span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
											</svg>
										</span>
									</label>
									<input class="rating-input" name="rating" value="4" type="radio" id="kt_rating_input_4" />
									<label class="rating-label" for="kt_rating_input_5">
										<span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
											</svg>
										</span>
									</label>
									<input class="rating-input" name="rating" value="5" type="radio" id="kt_rating_input_5" />
								</div>
							</div>
							<?php if (!is_user_logged_in()) : ?>
								<div class="row mb-3">
									<div class="col-md-6 fv-row">
										<input type="text" class="form-control" placeholder="نام" name="first_name" />
									</div>
									<div class="col-md-6 fv-row">
										<input type="text" class="form-control" placeholder="نام خانوادگی" name="last_name" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-12 fv-row">
										<input type="text" class="form-control" placeholder="ایمیل" name="email" />
									</div>
								</div>
							<?php endif ?>
							<div class="reply-alert alert bg-light-info d-flex flex-column flex-sm-row p-5 d-none">
								<div class="symbol symbol-35px me-3 mb-4"></div>
								<div class="d-flex flex-column pe-0 pe-sm-10">
									<span class="text-info fw-bold fs-7">در حال پاسخ دادن به <span class="reply-author"></span></span>
									<span class="reply-content fs-7 mt-1"></span>
								</div>
								<button type="button" class="reply-dismiss position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto">
									<span class="svg-icon svg-icon-1 svg-icon-info">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
											<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
										</svg>
									</span>
								</button>
							</div>
							<div class="form-group fv-row">
								<textarea name="comment" class="form-control mb-2 ss02" rows="4" placeholder="دیدگاه خود را در این قسمت وارد کنید..." maxlength="1000" data-kt-autosize="true"></textarea>
							</div>
							<div class="d-flex align-items-center justify-content-between py-2 mb-5">
								<div class="text-primary fs-base fw-bold cursor-pointer" data-bs-toggle="collapse" data-bs-target="#kt_comments_rules"><?php echo $options['opt-comments-rules-title'] ?></div>
								<button type="submit" class="btn btn-primary" data-comment-author-id="<?php echo get_current_user_id() ?>" data-product-id="<?php echo $product->id ?>" id="kt_product_comment_submit">
									<span class="indicator-label">ثبت دیدگاه</span>
									<span class="indicator-progress">در حال ارسال...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<div class="collapse" id="kt_comments_rules">
								<div class="text-gray-700 fs-6"><?php echo wpautop($options['opt-comments-rules-content']) ?></div>
							</div>
						</form>
					</div>
				</div>
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