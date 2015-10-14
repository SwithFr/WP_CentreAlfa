<?php get_header( 'simple' ); ?>
    <section class="wrapper content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="content__item">
                    <h2 class="content__item__title"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>