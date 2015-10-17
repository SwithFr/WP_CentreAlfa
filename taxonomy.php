<?php get_header('simple'); ?>
    <?php wp_nav_menu([
        'theme_location'  => 'services-menu',
        'container'       => 'ul',
        'menu_class'      => 'nav nav--bordered',
        'echo'            => true,
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
    ]); ?>
    <section class="wrapper services">
        <h2><?= $wp_query->queried_object->name; ?></h2>
        <?php $query = new WP_Query([
            'post_type' => 'services',
            'orderby' => 'date',
            'order' => 'ASC',
            'tax_query' => [
                [
                    'taxonomy' => 'services-categories',
                    'field' => 'slug',
                    'terms' => $wp_query->queried_object->slug
                ],
            ]
        ]); ?>
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article class="subservice">
                    <h3 id="<?= $post->post_name; ?>" class="subservice__title"><?php the_title() ; ?></h3>
                    <div class="subservice__content"><?php the_content(); ?></div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>
