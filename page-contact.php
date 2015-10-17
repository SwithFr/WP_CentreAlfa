<?php get_header( 'simple' ); ?>
    <section class="wrapper">
        <h2>Nous contacter</h2>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <div class="wrapper">
        <!-- subnav-->
        <?php wp_nav_menu([
            'theme_location'  => 'addresses-menu',
            'container'       => 'ul',
            'menu_class'      => 'nav nav--bordered',
            'echo'            => true,
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
        ]); ?>
        <section class="address">
            <?php $query = new WP_Query([
                'post_type' => 'addresses',
                'p' => 75
            ]); ?>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php $location = get_field('google_maps'); ?>
                    <div class="address__map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                    <div class="address__coords">
                        <div class="address__block">
                            <h3 id="ourAddress"><?php the_title(); ?></h3>
                            <p><?= $location['address']; ?></p>
                        </div>
                        <div class="address__block">
                            <p class="address__title">Coordonnées</p>
                            <p>Tel : <?php the_field('telephone') ?></p>
                            <p>Fax : <?php the_field('fax'); ?></p>
                            <p class="horaires">Ouvert du lundi au vendredi de 9h à 18h</p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="address__emails">
                <p class="address__title">Emails des services</p>
                <?php $query = new WP_Query([
                    'post_type' => 'emails',
                    'order' => 'ASC'
                ]); ?>
                <dl>
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <dt class="address__service-name"><?php the_title(); ?> :</dt>
                            <dd class="address__emails__item"><?php the_field('email'); ?></dd>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </dl>
            </div>
        </section>
        <section class="address">
            <?php $query = new WP_Query([
                'post_type' => 'addresses',
                'p' => 76
            ]); ?>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php $location = get_field('google_maps'); ?>
                    <div class="address2__coords">
                        <div class="address__block">
                            <h3 id="ourAntenne"><?php the_title(); ?></h3>
                            <p><?= $location['address']; ?></p>
                        </div>
                        <div class="address__block">
                            <p class="address__title">Coordonnées</p>
                            <p>Tel / Fax : <?php the_field('fax'); ?></p>
                            <p>GSM : <?php the_field('telephone') ?></p>
                            <p><?= the_field('email'); ?></p>
                        </div>
                    </div>
                    <div class="address__map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?= get_template_directory_uri(); ?>/js/jquery.js"></script>
    <script src="<?= get_template_directory_uri(); ?>/js/maps.js"></script>
<?php get_footer(); ?>