<?php // do_action('view_content_card'); 
?>

<?php if (isset($PLSWB_COURSE_OPTION['opt-show-youtube-video'])) :  ?>
    <?php if ($PLSWB_COURSE_OPTION['opt-show-youtube-video']) :  ?>
        <?php if (!empty($PLSWB_COURSE_OPTION['opt-youtube-video-code'])) :  ?>
          
                <div class="video-card mt-4 mt-lg-0">
                    <iframe title="<?php the_title() ?>" src="https://www.youtube.com/embed/<?= $PLSWB_COURSE_OPTION['opt-youtube-video-code']  ?>" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen" data-mce-fragment="1"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span></iframe>
                    <!-- <video width="100%" poster="https://plussweb.ir/wp-content/uploads/2023/03/thumbnail-youtube.png" controls>
                <source type="video/mp4" src="https://plussweb.ir/wp-content/uploads/2023/03/Rec-0004.mp4">
            </video> -->
                </div>
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