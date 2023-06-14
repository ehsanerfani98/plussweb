	<?php defined('ABSPATH') || exit; ?>

	<div class="card">
		<div class="content-card">
			<div class="row">
				<div class="col-lg-12 mb-3">
					<div class="rating-section justify-content-start">
						<span class="rating">امتیاز : </span>
						<div class="rating-stars">
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
					</div>
				</div>
				<?php if (!is_user_logged_in()) : ?>
					<div class="col-lg-6 mb-4">
						<input id="name-comment" type="text" class="form-control" placeholder="نام">
					</div>
					<div class="col-lg-6 mb-4">
						<input id="email-comment" type="email" class="form-control" placeholder="ایمیل">
					</div>
				<?php endif; ?>
				<div class="col-lg-12">
					<textarea id="message-comment" class="form-control" rows="5" placeholder="متن پیام"></textarea>
				</div>
				<div class="col-lg-12 mt-4">
					<input type="hidden" id="product-id" value="<?= get_the_ID() ?>">
					<button id="btn-comment-woocommerce" type="button" class="primary-btn">ارسال نظر</button>
				</div>
			</div>
		</div>
	</div>

	<?php if (have_comments()) : ?>
		<div class="card">
			<div class="content-card">

				<ol class="commentlist">
					<?php
					wp_list_comments([
						'callback' => 'better_comments'
					]);
					?>
				</ol>

				<?php
				if (get_comment_pages_count() > 1 && get_option('page_comments')) :
					echo '<nav class="woocommerce-pagination">';
					paginate_comments_links(
						apply_filters(
							'woocommerce_comment_pagination_args',
							array(
								'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
								'next_text' => is_rtl() ? '&larr;' : '&rarr;',
								'type'      => 'list',
							)
						)
					);
					echo '</nav>';
				endif;
				?>
			</div>
		</div>
	<?php endif; ?>