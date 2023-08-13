<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  Link with href
</a>
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  Button with data-bs-target
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
</div>
    <div class="container-fluid main">

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

        <?php if (!is_home()) : ?>
            <div class="row">
                <div class="header-product-single" style="background-image: url('<?= PLSWB_THEME_ASSETS . 'images/icon-back-OWL.png' ?>');">
                    <div class="title">
                        <?php if (is_category()) : ?>
                            <h1><?php single_cat_title() ?></h1>
                        <?php elseif (is_shop()) : ?>
                            <h1><?php woocommerce_page_title() ?></h1>
                        <?php else : ?>
                            <h1><?php the_title() ?></h1>
                        <?php endif; ?>
                    </div>
                    <?php woocommerce_breadcrumb() ?>
                </div>
            </div>
        <?php endif; ?>