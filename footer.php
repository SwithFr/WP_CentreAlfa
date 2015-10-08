<div class="footer">
    <div class="wrapper">
        <section class="footer__service">
            <h3 class="footer__block__title">Les services</h3>
            <?php wp_nav_menu([
                'theme_location'  => 'services-menu-footer',
                'container'       => 'ul',
                'menu_class'      => '',
                'echo'            => true,
                'items_wrap'      => '<ul>%3$s</ul>'
            ]); ?>
        </section>
        <section class="footer__nav">
            <h3 class="footer__block__title">Navigation</h3>
            <?php wp_nav_menu([
                'theme_location'  => 'footer-menu-1',
                'container'       => 'div',
                'menu_class'      => 'footer__subDiv',
                'echo'            => true,
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
            ]); ?>
            <?php wp_nav_menu([
                'theme_location'  => 'footer-menu-2',
                'container'       => 'div',
                'menu_class'      => 'footer__subDiv',
                'echo'            => true,
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
            ]); ?>
        </section>
        <section class="footer__addresses">
            <h3 class="footer__block__title">Contact</h3>
            <div class="footer__subDiv">
                <?php $location = get_field('google_maps', 75); ?>
                <p><?= $location['address']; ?></p>
                <div class="footer__phones">
                    <p>Tel : <?= the_field('telephone', 75); ?></p>
                    <p>Fax : <?= the_field('fax', 75); ?></p>
                </div>
            </div>
            <div class="footer__subDiv">
                <?php $location = get_field('google_maps', 76); ?>
                <p><?= $location['address']; ?></p>
                <div class="footer__phones">
                    <p>Tel : <?= the_field('telephone', 76); ?></p>
                    <p>Fax : <?= the_field('fax', 76); ?></p>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>