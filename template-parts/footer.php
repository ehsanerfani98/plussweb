<div class="row footer">
    <div class="col-lg-9">
        <div class="footer-content">
            <div class="footer-menu">
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['footer-menu']);
                $menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));

                foreach ($menuitems as $child) {
                    if ($child->menu_item_parent != 0) {
                        $children[] = $child;
                    }
                }

                foreach ($menuitems as $parent) {
                    if (!empty($children)) {
                        foreach ($children as $child) {
                            if ($child->menu_item_parent == $parent->ID) {
                                $menu_children[] = $child;
                            }
                        }
                        $parent->children = $menu_children;
                        $menu_children = [];
                    }
                }
                if (!empty($menuitems)) : ?>
                    <ul class="list-nav">
                        <?php foreach ($menuitems as $item) : ?>
                            <?php if ($item->menu_item_parent == 0) :
                                $meta = get_post_meta($item->ID, '_prefix_menu_options', true);
                            ?>
                                <li class="nav-item"><a href="<?= !empty($item->children) ? 'javascript:void(0);' : $item->url ?>"><?php if (!empty($meta['icon'])) : ?><i class="<?= str_replace('fas', 'fa', $meta['icon']) ?> icon-main-menu"></i><?php endif; ?><?= $item->title ?> <?= !empty($item->children) ? '<i class="fa fa-caret-down"></i>' : '' ?></a>
                                    <?php if (!empty($item->children)) : ?>
                                        <ul class="submenu">
                                            <?php foreach ($item->children as $sub) : ?>
                                                <li class="sub-item"><a class="nav-title" href="<?= $sub->url ?>"><span><?= $sub->title ?></span> <?= !empty($sub->children) ? '<i class="fa fa-caret-down"></i>' : '' ?></a>
                                                    <?php if (!empty($sub->children)) : ?>
                                                        <ul class="submenu2">
                                                            <?php foreach ($sub->children as $sub2) : ?>
                                                                <li class="sub2-item"><a class="nav-title" href="<?= $sub2->url ?>"><?= $sub2->title ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>برای این قسمت یک منو تنظیم کنید</p>
                <?php endif; ?>
            </div>
            <div class="copy-right">
                <h6>کپی از محتوای این سایت تحت هیچ شرایطی مجاز نیست.</h6>
                <h6><a style="color:white" href="https://diarasoft.com/">طراحی و توسعه : دیاراسافت</a></h6>
            </div>
            <div class="social">
                <a href="https://www.instagram.com/plussweb.ir">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://youtube.com/@plussweb">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://linkedin.com/in/plussweb">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="footer-permission">

        </div>
    </div>
</div>

</div>
<div class="plswb-alert">دیدگاه شما با موفقیت ثبت شد</div>
<?php wp_footer(); ?>
</body>

</html>
