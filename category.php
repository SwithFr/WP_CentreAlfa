<?php get_header(); ?>
    <h1>Salut les Steaks !</h1>

    <section>
        <h2>Category</h2>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <arcticle id="<?php the_ID(); ?>">
                    <h3><?php the_title(); ?></h3>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </arcticle>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>