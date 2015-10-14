<?php get_header( 'simple' ); ?>
    <section class="wrapper content">
        <h2>Foire aux questions</h2>
        <?php $query = new WP_Query([
            'post_type' => 'questions',
            'orderby' => 'date',
            'order' => 'ASC',
        ]); ?>
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article class="content__item">
                    <h3 class="content__item__title"><?php the_field('question') ; ?></h3>
                    <div class="content__item__content"><?php the_field('reponse'); ?></div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>