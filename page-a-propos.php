<?php get_header( 'simple' ); ?>
    <section class="wrapper">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>