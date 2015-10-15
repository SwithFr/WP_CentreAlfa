<?php get_header( 'simple' ); ?>
    <section class="wrapper content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php if($post->post_type === "emails"): ?>
                    <p class="result__type">Emails :</p>
                <?php endif; ?>
                
                <?php if($post->post_type === "services"): ?>
                    <p class="result__type">Services :</p>
                <?php endif; ?>

                <?php if($post->post_type === "addresses"): ?>
                    <p class="result__type">Adresses :</p>
                <?php endif; ?>

                <?php if($post->post_type === "membres"): ?>
                    <p class="result__type">Membres :</p>
                <?php endif; ?>

                <?php if($post->post_type === "page"): ?>
                    <p class="result__type">Pages :</p>
                <?php endif; ?>

                <div class="content__item">
                    <h2 class="content__item__title"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>