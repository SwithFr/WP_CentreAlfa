<!DOCTYPE html>
<html <?php language_attributes( 'lang' ); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0">
        <title><?php bloginfo( 'name' ); ?></title>
        <link rel="stylesheet" href="<?= get_stylesheet_uri(); ?>"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- Nav-->
        <input type="checkbox" id="show__nav" class="nav__input">
        <label for="show__nav" class="menu">Menu</label>
        <?php wp_nav_menu([
            'theme_location'  => 'header-menu',
            'container'       => 'ul',
            'menu_class'      => 'nav nav--sticky',
            'echo'            => true,
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
        ]); ?>
        <!-- header-->
        <header class="header"><img src="<?= get_bloginfo('template_directory'); ?>/img/logo.svg" alt="Logo du centre alfa" class="header__logo">
            <h1 class="header__title"><span class="visuallyhidden">Centre </span>A.L.F.A</h1>
            <p class="header__description"><?php bloginfo('description'); ?></p>
        </header>
