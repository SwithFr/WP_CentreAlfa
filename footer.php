<div class="footer">
    <div class="wrapper">
        <section class="footer__service">
            <h3 class="footer__block__title">Les services</h3>
            <ul>
                <li class="footer__list-item"> <a href="#" title="" class="footer__link">Prévention</a></li>
                <li class="footer__list-item"> <a href="#" title="" class="footer__link">Thérapeutique</a></li>
                <li class="footer__list-item"> <a href="#" title="" class="footer__link">Parentalité</a></li>
                <li class="footer__list-item"><a href="#" title="" class="footer__link">Réduction des risques</a></li>
            </ul>
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
                <p>Rue de la Madeleine, 17 4000 Liège</p>
                <div class="footer__phones">
                    <p>Tel : 04 223 09 03</p>
                    <p>Fax : 04 223 56 86</p>
                </div>
            </div>
            <div class="footer__subDiv">
                <p>Place Xavier Neujean, 40 4000 Liège</p>
                <div class="footer__phones">
                    <p>Tel : 04 221 21 14</p>
                    <p>Fax : 0498 87 10 81</p>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>