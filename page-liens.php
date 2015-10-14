<?php get_header( 'simple' ); ?>
    <section class="wrapper content">
        <h2>Les liens</h2>
        <?php $query = new WP_Query([
            'post_type' => 'liens',
            'orderby' => 'date',
            'order' => 'ASC'
        ]); ?>
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="content__item link">
                    <a class="content__item__title" href="<?php the_field('lien'); ?>"><?php the_title(); ?></a>
                    <div class="content__item__content"><?php the_field('description'); ?></div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>