<?php // do_action('view_content_card'); 
?>
<?php $PLSWB_COURSE_OPTION = get_post_meta(get_the_ID(), 'PLSWB_COURSE_OPTION', true); ?>

<?php if (isset($PLSWB_COURSE_OPTION['opt-show-youtube-video'])) :  ?>
    <?php if ($PLSWB_COURSE_OPTION['opt-show-youtube-video']) :  ?>
        <?php if (!empty($PLSWB_COURSE_OPTION['opt-youtube-video-code'])) :  ?>
            <?php
            $url = 'http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'];
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
              curl_setopt($ch, CURLOPT_HEADER, 0);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36');
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
              $result = curl_exec($ch);
              var_dump($result);
              $country = unserialize($result)['geoplugin_countryName'];
            if ($country == 'Iran') : ?>
                       <div style="padding: 10px; background: #ff5757; margin: 0 0 20px 0; color: white; border-radius: 4px; text-align: center; box-shadow: 0px 0px 17px 0px #fb8988;">برای تماشای ویدیو ابتدا vpn خود را <span style="padding: 4px 10px; background: orange; border-radius: 6px;">روشن</span> کرده و صفحه را رفرش کنید. (ویدیو در یوتیوب بارگذاری شده است)</div>
            <?php else : ?>
                <div class="video-card mt-4 mt-lg-0">
                    <iframe title="<?php the_title() ?>" src="https://www.youtube.com/embed/<?= $PLSWB_COURSE_OPTION['opt-youtube-video-code']  ?>" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen" data-mce-fragment="1"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span></iframe>
                    <!-- <video width="100%" poster="https://plussweb.ir/wp-content/uploads/2023/03/thumbnail-youtube.png" controls>
                <source type="video/mp4" src="https://plussweb.ir/wp-content/uploads/2023/03/Rec-0004.mp4">
            </video> -->
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php else : ?>
        <div class="video-card mt-4 mt-lg-0">
            <?php the_post_thumbnail('normal', ['loading' => 'lazy']) ?>
        </div>
    <?php endif; ?>
<?php else : ?>
    <div class="video-card mt-4 mt-lg-0">
        <?php the_post_thumbnail('normal', ['loading' => 'lazy']) ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="content-card">
        <?php the_content() ?>
    </div>
</div>