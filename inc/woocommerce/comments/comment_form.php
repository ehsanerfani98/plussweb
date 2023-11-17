<?php $maktabyar_theme_options = get_option('PLSWB_MAKTABYAR_SETTINGS', true); ?>

<div class="new-comment mb-4">

	<div class="icon">
		<i class="fa fa-comments"></i>
	</div>

	<div class="total">
		<?= get_comment_count(get_the_ID())['approved'] ?>
	</div>

	<div class="title">
		پرسش و پاسخ
	</div>

	<button type="button" class="btn-success" data-bs-toggle="modal" data-bs-target="#newcomment">ثبت پرسش</button>

</div>

<?php if ($maktabyar_theme_options['opt-product-rules-display-comments']) : ?>
	<div class="card">
		<div class="title-rules">
			<i class="fa fa-balance-scale"></i>
			قوانین پرسش و پاسخ
		</div>
		<div class="content-card rules-comments">
			<?= @$maktabyar_theme_options['opt-product-rules-comments'] ?>
		</div>
	</div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="newcomment" tabindex="-1" role="dialog" aria-labelledby="newcommentTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form action="" class="comment-form">
				<div class="card">
					<div class="card-loading"><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span></div>
					<div class="content-card">
						<div class="row">
							<?php if ($maktabyar_theme_options['opt-product-display-rating-comments']) : ?>
								<div class="col-lg-12 mb-3">
									<div class="rating-section justify-content-start">
										<span class="rating">امتیاز : </span>
										<div class="rating-stars">
											<ul class="stars">
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
							<?php endif; ?>

							<?php if (!is_user_logged_in()) : ?>
								<div class="col-lg-6 mb-4">
									<input name="name-comment" type="text" class="form-control" placeholder="نام">
								</div>
								<div class="col-lg-6 mb-4">
									<input name="email-comment" type="email" class="form-control" placeholder="ایمیل">
								</div>
							<?php endif; ?>
							<div class="col-lg-12">
								<textarea name="message-comment" class="form-control" rows="5" placeholder="متن پرسش"></textarea>
							</div>
							<div class="col-lg-12 mt-4">
								<input type="hidden" name="product-id" value="<?= get_the_ID() ?>">
								<button type="submit" class="btn-primary">
									ارسال
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>