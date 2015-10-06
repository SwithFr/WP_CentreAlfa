<?php get_header(); ?>
<section class="wrapper">
    <h2>Les services</h2>
    <?php wp_nav_menu([
        'theme_location'  => 'services-menu',
        'container'       => 'ul',
        'menu_class'      => 'nav nav--bordered',
        'echo'            => true,
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
    ]); ?>
    <div class="wrapper">
        <?php $query = new WP_Query([
            'category_name' => 'Services',
            'cat' => -6,
            'order' => 'ASC',
            'posts_per_page' => 2
        ]); ?>
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article id="<?php the_ID(); ?>" class="service">
                    <h3 class="service__title"><?php the_title(); ?></h3>
                    <p class="service__description">
                        <?php the_content(); ?>
                    </p>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="wrapper">
        <?php $query = new WP_Query([
            'category_name' => 'Services',
            'cat' => -6,
            'order' => 'ASC'
        ]); ?>
        <?php if ($query->have_posts()) : ?>
            <?php $i = 0; ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php if($i >= 2): ?>
                    <article id="<?php the_ID(); ?>" class="service">
                        <h3 class="service__title"><?php the_title(); ?></h3>
                        <p class="service__description">
                            <?php the_content(); ?>
                        </p>
                    </article>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
    <section class="wrapper">
        <h2>Nous contacter</h2>
        <!-- subnav-->
        <ul class="nav nav--bordered">
            <li class="nav__item"><a title="Notre adresse" href="#ourAddress">Notre adresse</a></li>
            <li class="nav__item"><a title="Contacter notre antenne de réduction des risques" href="#ourAntenne">Antenne réduction des risques</a></li>
        </ul>
        <section class="address"><img src="./img/map.jpg" alt="Google maps" class="address__map">
            <div class="address__coords">
                <div class="address__block">
                    <h3 id="ourAddress">Notre adresse</h3>
                    <p>Rue de la Madeleine, 17 4000 Liège</p>
                </div>
                <div class="address__block">
                    <h3>Coordonnées</h3>
                    <p>Tel : 04 223 09 03</p>
                    <p>Fax : 04 223 56 86</p>
                    <p class="horaires">Ouvert du lundi au vendredi de 9h à 18h</p>
                </div>
            </div>
            <div class="address__emails">
                <h3>Emails des services</h3>
                <dl>
                    <dt class="address__service-name">Thérapeutique :</dt>
                    <dd class="address__emails__item">alfa.therapeutique@gmail.com</dd>
                    <dt class="address__service-name">Prévention : </dt>
                    <dd class="address__emails__item">alfa.prevention.gmail</dd>
                    <dt class="address__service-name">Parentatlité : </dt>
                    <dd class="address__emails__item">alfa.parentalite@gmail.com</dd>
                    <dt class="address__service-name">Social : </dt>
                    <dd class="address__emails__item">alfa.servicesocial@gmail.com</dd>
                    <dt class="address__service-name">Direction : </dt>
                    <dd class="address__emails__item">alfa.dungelhoeff@gmail.com</dd>
                    <dt class="address__service-name">Administration - compatibilité : </dt>
                    <dd class="address__emails__item">alfa.yvettepetit@gmail.com</dd>
                </dl>
            </div>
        </section>
        <section class="address">
            <div class="address2__coords">
                <div class="address__block">
                    <h3 id="ourAntenne">Antenne Réduction des risques</h3>
                    <p>Place Xavier Neujean, 40 4000 Liège</p>
                </div>
                <div class="address__block">
                    <h3>Coordonnées</h3>
                    <p>Tel / Fax : 04 221 21 14</p>
                    <p>GSM : 0498 87 10 91</p>
                    <p>alfa.rdr@gmail.com</p>
                </div>
            </div>
            <div class="address__map"><img src="./img/map.jpg" alt="Google maps"></div>
        </section>
    </section>
<?php get_footer(); ?>