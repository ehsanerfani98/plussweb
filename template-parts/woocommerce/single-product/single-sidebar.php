<?php
$product = wc_get_product(get_the_ID());
$rating  = $product->get_average_rating();
$PLSWB_COURSE_OPTION = get_post_meta(get_the_ID(), 'PLSWB_COURSE_OPTION', true);

var_dump($PLSWB_COURSE_OPTION);
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
                                <del>۳۵۰,۰۰۰ تومان</del>
                                <span class="orginal">رایـــــگـان</span>
                                <!-- <span class="orginal">۱۰۰۰,۰۰۰ تومان</span> -->
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
                            <del>۳۵۰,۰۰۰ تومان</del>
                            <span class="orginal">رایـــــگـان</span>
                            <!-- <span class="orginal">۱۰۰۰,۰۰۰ تومان</span> -->
                        </span>
                    </div>
                    <form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
                        <button type="submit" name="add-to-cart" value="<?= get_the_ID() ?>" class="single_add_to_cart_button btn-primary">ثبت نام در دوره</button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
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