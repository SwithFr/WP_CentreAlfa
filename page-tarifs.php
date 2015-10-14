<?php get_header( 'simple' ); ?>
    <section class="wrapper content">
        <h2>Les tarifs</h2>
        <?php $query = new WP_Query([
            'post_type' => 'tarifs',
            'orderby' => 'date',
            'order' => 'ASC',
        ]); ?>
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article class="content__item">
                    <h3 class="content__item__title"><?php the_field('service') ; ?></h3>
                    <div class="content__item__content"><?php the_field('tarifs'); ?></div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>