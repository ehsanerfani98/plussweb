<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (is_singular()) : ?>
        <meta property="og:title" content="<?php the_title() ?>" />
        <meta property="og:description" content="<?= strip_tags(get_the_excerpt()) ?>" />
        <meta property="og:image" content="<?= get_the_post_thumbnail_url() ?>" />
    <?php endif; ?>
</head>

<body <?php body_class(); ?>>
    <div style="padding: 10px; background: #ffed1b; color: #977600; text-align: center; position: fixed; top: 0; width: 100%; z-index: 9999;">قالب سایت در دست طراحی می باشد</div>
    <div class="container-fluid" style="margin-top: 42px;">
        <div class="row nav d-none d-lg-flex">
            <div class="col-lg-9">
                <div class="menu">
                    <div class="logo">
                        <img class="img-fluid" src="<?= PLSWB_THEME_ASSETS ?>images/logo.png" alt="">
                    </div>
                    <?php
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations['main-menu']);
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
            </div>
            <div class="col-lg-3"></div>
        </div>