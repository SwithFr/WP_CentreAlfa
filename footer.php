<div class="footer">
    <div class="wrapper">
        <div class="footer__service">
            <p class="footer__block__title">Les services</p>
            <?php wp_nav_menu([
                'theme_location'  => 'services-menu-footer',
                'container'       => 'ul',
                'menu_class'      => '',
                'echo'            => true,
                'items_wrap'      => '<ul>%3$s</ul>'
            ]); ?>
        </div>
        <div class="footer__nav">
            <p class="footer__block__title">Navigation</p>
            <?php wp_nav_menu([
                'theme_location'  => 'footer-menu-1',
                'container'       => false,
                'menu_class'      => 'footer__subDiv',
                'echo'            => true,
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
            ]); ?>
            <?php wp_nav_menu([
                'theme_location'  => 'footer-menu-2',
                'container'       => false,
                'menu_class'      => 'footer__subDiv',
                'echo'            => true,
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
            ]); ?>
        </div>
        <div class="footer__addresses">
            <p class="footer__block__title">Contact</p>
            <div class="footer__subDiv h-card" itemtype="http://microformats.org/profile/hcard" itemscope>
                <meta class="visuallyhidden org" content="Centre alfa"/>
                <?php $location = get_field('google_maps', 75); ?>
                <p class="street-address locality postal-code country-name"><?= $location['address']; ?></p>
                <div class="footer__phones">
                    <p itemprop="tel">Tel : <?= the_field('telephone', 75); ?></p>
                    <p itemprop="tel">Fax : <?= the_field('fax', 75); ?></p>
                </div>
            </div>
            <div class="footer__subDiv h-card" itemtype="http://microformats.org/profile/hcard" itemscope>
                <meta class="visuallyhidden org" content="Centre alfa antene réduction des risques"/>
                <?php $location = get_field('google_maps', 76); ?>
                <p class="street-address locality postal-code country-name"><?= $location['address']; ?></p>
                <div class="footer__phones">
                    <p itemprop="tel">Tel : <?= the_field('telephone', 76); ?></p>
                    <p itemprop="tel">Fax : <?= the_field('fax', 76); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= get_template_directory_uri(); ?>/js/main.js"></script>
</body>
</html>