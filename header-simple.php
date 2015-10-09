<!DOCTYPE html>
<html class="noHeader" <?php language_attributes( 'lang' ); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0">
        <?php
            $title = single_cat_title( 'Service ', false );
            $title = empty($title) ? get_the_title() : $title;
        ?>
        <title><?= $title; ?> - <?php bloginfo( 'name' ); ?></title>
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
        <h1 class="visuallyhidden"><?= $title; ?></h1>