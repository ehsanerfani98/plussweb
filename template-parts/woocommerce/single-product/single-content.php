<?php // do_action('view_content_card'); 
?>
<?php $PLSWB_COURSE_OPTION = get_post_meta(get_the_ID(), 'PLSWB_COURSE_OPTION', true); ?>

<?php if (isset($PLSWB_COURSE_OPTION['opt-show-youtube-video'])) :  ?>
    <?php if ($PLSWB_COURSE_OPTION['opt-show-youtube-video']) :  ?>
        <?php if (!empty($PLSWB_COURSE_OPTION['opt-youtube-video-code'])) :  ?>
            <?php
                stream_context_set_default(array(
                    'ssl'                => array(
                    'peer_name'          => 'generic-server',
                    'verify_peer'        => FALSE,
                    'verify_peer_name'   => FALSE,
                    'allow_self_signed'  => TRUE
                     )));
              $country = unserialize(file_get_contents('https://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']), false)['geoplugin_countryName'];
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