<?php
$product = wc_get_product(get_the_ID());
$rating  = $product->get_average_rating();
?>

<div class="card-v2">
    <div class="content-card">
        <div class="rating-section">
            <span class="rating">امتیاز : </span>
            <div class="rating-stars text-center">
                <ul id="stars">
                    <li class="star-rated <?= $rating >= 1 ? 'selected' : '' ?>">
                        <i class="fa fa-star fa-fw"></i>
                    </li>
                    <li class="star-rated <?= $rating >= 2 ? 'selected' : '' ?>">
                        <i class="fa fa-star fa-fw"></i>
                    </li>
                    <li class="star-rated <?= $rating >= 3 ? 'selected' : '' ?>">
                        <i class="fa fa-star fa-fw"></i>
                    </li>
                    <li class="star-rated <?= $rating >= 4 ? 'selected' : '' ?>">
                        <i class="fa fa-star fa-fw"></i>
                    </li>
                    <li class="star-rated <?= $rating >= 5 ? 'selected' : '' ?>">
                        <i class="fa fa-star fa-fw"></i>
                    </li>
                </ul>
            </div>
            <span class="votes"> <?= $product->get_review_count() ?> رای</span>
        </div>
    </div>
</div>
<div class="sidebar">
    <?php if (!$status_order) : ?>
        <div class="card-v2">
            <div class="content-card">
                <?php if ($product->stock_status == 'outofstock') : ?>
                    <button type="button" class="btn-primary">ظرفیت تکمیل شد</button>
                    <?php else :
                    $manage_stock = get_post_meta(get_the_ID(), '_manage_stock', true);
                    if ($manage_stock == 'yes') :
                    ?>
                        <?php if ($product->get_stock_quantity() > 0) : ?>
                            <div class="product-order">
                                <span class="title">قیمت دوره</span>
                                <span class="price">
                                    <?php if ($product->get_sale_price() && $product->get_sale_price() != 0 && $product->get_sale_price() != '') : ?>
                                        <del><?= number_format($product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() ?></del>
                                        <span class="orginal"><?= number_format($product->get_sale_price()) . ' ' . get_woocommerce_currency_symbol() ?></span>
                                    <?php else : ?>
                                        <?php if ($product->get_regular_price() && $product->get_regular_price() != 0 && $product->get_regular_price() != '') : ?>
                                            <span class="orginal"><?= number_format($product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() ?></span>
                                        <?php else : ?>
                                            <span class="orginal">رایـــــگـان</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
                                <button type="submit" name="add-to-cart" value="<?= get_the_ID() ?>" class="single_add_to_cart_button btn-primary">ثبت نام در دوره</button>
                            </form>
                        <?php else : ?>
                            <button type="button" class="btn-primary">ظرفیت تکمیل شد</button>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="product-order">
                            <span class="title">قیمت دوره</span>
                            <span class="price">
                                <?php if ($product->get_sale_price() && $product->get_sale_price() != 0 && $product->get_sale_price() != '') : ?>
                                    <del><?= number_format($product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() ?></del>
                                    <span class="orginal"><?= number_format($product->get_sale_price()) . ' ' . get_woocommerce_currency_symbol() ?></span>
                                <?php else : ?>
                                    <?php if ($product->get_regular_price() && $product->get_regular_price() != 0 && $product->get_regular_price() != '') : ?>
                                        <span class="orginal"><?= number_format($product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() ?></span>
                                    <?php else : ?>
                                        <span class="orginal">رایـــــگـان</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </span>
                        </div>
                        <form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
                            <button type="submit" name="add-to-cart" value="<?= get_the_ID() ?>" class="single_add_to_cart_button btn-primary">ثبت نام در دوره</button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php else : ?>
        <div class="card-v2">
            <div class="d-flex align-items-center justify-content-center">
                <i class="fa fa-check"></i>
                <!-- <lottie-player src="https://assets10.lottiefiles.com/datafiles/KZAksH53JBd6PNu/data.json" background="transparent" speed="1" style="width: 60px; height: 60px;" loop autoplay></lottie-player> -->
                <span class="congratulations">تبریک! شما دانشجوی دوره هستید</span>
            </div>
        </div>
    <?php endif; ?>

    <div class="card-v2">
        <div class="content-card">
            <div class="product-info">
                <div class="block-info">
                    <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.17,2.06A13.1,13.1,0,0,0,19,1.87a12.94,12.94,0,0,0-7,2.05,12.94,12.94,0,0,0-7-2,13.1,13.1,0,0,0-2.17.19,1,1,0,0,0-.83,1v12a1,1,0,0,0,1.17,1,10.9,10.9,0,0,1,8.25,1.91l.12.07.11,0a.91.91,0,0,0,.7,0l.11,0,.12-.07A10.9,10.9,0,0,1,20.83,16a1,1,0,0,0,1.17-1v-12A1,1,0,0,0,21.17,2.06ZM11,15.35a12.87,12.87,0,0,0-6-1.48c-.33,0-.66,0-1,0v-10a8.69,8.69,0,0,1,1,0,10.86,10.86,0,0,1,6,1.8Zm9-1.44c-.34,0-.67,0-1,0a12.87,12.87,0,0,0-6,1.48V5.67a10.86,10.86,0,0,1,6-1.8,8.69,8.69,0,0,1,1,0Zm1.17,4.15A13.1,13.1,0,0,0,19,17.87a12.94,12.94,0,0,0-7,2.05,12.94,12.94,0,0,0-7-2.05,13.1,13.1,0,0,0-2.17.19A1,1,0,0,0,2,19.21,1,1,0,0,0,3.17,20a10.9,10.9,0,0,1,8.25,1.91,1,1,0,0,0,1.16,0A10.9,10.9,0,0,1,20.83,20,1,1,0,0,0,22,19.21,1,1,0,0,0,21.17,18.06Z" fill="#0bc480"></path>
                    </svg>
                    <div class="title">
                        تعداد جلسات
                    </div>
                    <div class="content">
                        <?= @$PLSWB_COURSE_OPTION['opt-info-box-sessions'] ?>
                    </div>
                </div>
                <div class="block-info">
                    <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17,8.61,16,2.84A1,1,0,0,0,15,2H9a1,1,0,0,0-1,.84l-1,5.77a6,6,0,0,0,0,6.78l1,5.77A1,1,0,0,0,9,22h6a1,1,0,0,0,1-.84l1-5.77a6,6,0,0,0,0-6.78ZM9.85,4h4.3l.44,2.59a6,6,0,0,0-5.18,0Zm4.3,16H9.85l-.44-2.59a6,6,0,0,0,5.18,0ZM12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Z" fill="#0bc480"></path>
                    </svg>
                    <div class="title">
                        مدت دوره
                    </div>
                    <div class="content">
                        <?= @$PLSWB_COURSE_OPTION['opt-info-box-time'] ?>
                    </div>
                </div>
                <div class="block-info">
                    <svg width="36" height="36" data-name="Layer 1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.9,7.59l-1-3.87A3,3,0,0,0,17.19,1.6l-1.93.52a1,1,0,0,0-.71,1.23l.26,1L4.19,7.16a1,1,0,0,0-.71,1.22l.26,1-1,.26a1,1,0,0,0,.25,2,1.09,1.09,0,0,0,.26,0l1-.27.26,1a1,1,0,0,0,.46.6,1,1,0,0,0,.5.14.75.75,0,0,0,.26,0L9,12.08v.42a2.9,2.9,0,0,0,.3,1.28l-5,5a1,1,0,0,0,1.41,1.42l5-5,.28.11V21.5a1,1,0,0,0,2,0V15.32a2.52,2.52,0,0,0,.29-.12l5,5a1,1,0,1,0,1.41-1.42l-5-5A3.09,3.09,0,0,0,15,12.5v-2l1.35-.36.25,1a1,1,0,0,0,1,.74l.26,0,1.93-.52A3,3,0,0,0,21.9,7.59ZM13,12.5a1,1,0,0,1-.28.69h0v0a1,1,0,0,1-.69.28,1,1,0,0,1-.7-.29h0a1,1,0,0,1-.29-.7v-1L13,11ZM6.19,10.76,5.67,8.83l9.66-2.59.26,1,.26,1Zm13.68-1.9a1,1,0,0,1-.61.47l-1,.26-.78-2.9L17,4.76h0l-.26-1,1-.26a1,1,0,0,1,1.23.71l1,3.87A1,1,0,0,1,19.87,8.86Z" fill="#0bc480"></path>
                    </svg>
                    <div class="title">
                        نوع دوره
                    </div>
                    <div class="content">
                        <?= @$PLSWB_COURSE_OPTION['opt-info-box-type'] ?>
                    </div>
                </div>
                <div class="block-info">
                    <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18,6H14.41l2.3-2.29a1,1,0,1,0-1.42-1.42L12,5.54l-1.17-2a1,1,0,1,0-1.74,1L10,6H6A3,3,0,0,0,3,9v8a3,3,0,0,0,3,3v1a1,1,0,0,0,2,0V20h8v1a1,1,0,0,0,2,0V20a3,3,0,0,0,3-3V9A3,3,0,0,0,18,6Zm1,11a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V9A1,1,0,0,1,6,8H18a1,1,0,0,1,1,1Z" fill="#0bc480"></path>
                    </svg>
                    <div class="title">
                        نحوه دریافت
                    </div>
                    <div class="content">
                        <?= @$PLSWB_COURSE_OPTION['opt-info-box-download'] ?>
                    </div>
                </div>
                <div class="block-info">
                    <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.29,13.29a1,1,0,0,0,0,1.42l3,3a1,1,0,0,0,1.42,0l3-3a1,1,0,0,0-1.42-1.42L13,14.59V3a1,1,0,0,0-2,0V14.59l-1.29-1.3A1,1,0,0,0,8.29,13.29ZM18,9H16a1,1,0,0,0,0,2h2a1,1,0,0,1,1,1v7a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H8A1,1,0,0,0,8,9H6a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V12A3,3,0,0,0,18,9Z" fill="#0bc480"></path>
                    </svg>
                    <div class="title">
                        حجم دوره
                    </div>
                    <div class="content">
                        <?= @$PLSWB_COURSE_OPTION['opt-info-box-volume'] ?>
                    </div>
                </div>
                <div class="block-info">
                    <!--?xml version="1.0" ?--><svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.53,7.15a1,1,0,0,0-1,0L17,8.89A3,3,0,0,0,14,6H5A3,3,0,0,0,2,9v6a3,3,0,0,0,3,3h9a3,3,0,0,0,3-2.89l3.56,1.78A1,1,0,0,0,21,17a1,1,0,0,0,.53-.15A1,1,0,0,0,22,16V8A1,1,0,0,0,21.53,7.15ZM15,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V9A1,1,0,0,1,5,8h9a1,1,0,0,1,1,1Zm5-.62-3-1.5V11.12l3-1.5Z" fill="#0bc480"></path>
                    </svg>
                    <div class="title">
                        وضعیت
                    </div>
                    <div class="content">
                        <?= @$PLSWB_COURSE_OPTION['opt-info-box-status'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="card-v2">
        <div class="d-flex align-items-center justify-content-center">
            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_qedmivnw.json" background="transparent" speed="1" style="width: 50px; height: 50px;" loop autoplay></lottie-player>
            <span class="customer">تعداد دانشجویان دوره : <?= empty($product->get_total_sales()) ? 'بدون دانشجو' : $product->get_total_sales() . ' نفر' ?></span>
        </div>
    </div> -->
    <div class="card-v2">
        <div class="content-card">
            <div class="copy-text">
                <input type="text" class="text" value="<?= wp_get_shortlink() ?>" />
                <button><i class="fa fa-clone"></i></button>
            </div>
        </div>
    </div>
</div>