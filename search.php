<?php get_header( 'simple' ); ?>
    <section class="wrapper content">
        <h2>Résultats de la recherche <span class="searchQuery"><?= get_search_query(); ?></span></h2>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php if($post->post_type === "emails"): ?>
                    <?php if(!$eDisplayed): ?>
                        <p class="result__type">Emails :</p>
                        <?php $eDisplayed = true; ?>
                    <?php endif; ?>

                    <section class="content__item address__emails">
                        <h3 class="content__item__title"><?php the_title(); ?></h3>
                        <p class="content__item__content"><?php the_field('email'); ?></p>
                    </section>
                <?php endif; ?>
                
                <?php if($post->post_type === "services"): ?>
                    <?php if(!$sDisplayed): ?>
                        <p class="result__type">Services :</p>
                        <?php $sDisplayed = true; ?>
                    <?php endif; ?>

                    <section class="content__item">
                        <h3 class="content__item__title"><?php the_title(); ?></h3>
                        <p class="content__item__content"><?php the_content(); ?></p>
                    </section>
                <?php endif; ?>

                <?php if($post->post_type === "addresses"): ?>
                    <?php if(!$aDisplayed): ?>
                        <p class="result__type">Adresses :</p>
                        <?php $aDisplayed = true; ?>
                    <?php endif; ?>

                    <section class="content__item">
                        <h3 class="content__item__title"><?php the_title(); ?></h3>
                        <div class="content__item__content">
                            <p><?php the_field('adresse'); ?></p>
                            <p><?php the_field('telephone'); ?></p>
                        </div>
                    </section>
                <?php endif; ?>

                <?php if($post->post_type === "membres"): ?>
                    <?php if(!$mDisplayed): ?>
                        <p class="result__type">Membres :</p>
                        <?php $mDisplayed = true; ?>
                    <?php endif; ?>

                    <section class="content__item">
                        <h3 class="content__item__title"><?php the_field('name'); ?></h3>
                        <div class="content__item__content">
                            <p><?php the_field('fonction'); ?></p>
                        </div>
                    </section>
                <?php endif; ?>

                <?php if($post->post_type === "page"): ?>
                    <?php if(!$pDisplayed): ?>
                        <p class="result__type">Pages :</p>
                        <?php $pDisplayed = true; ?>
                    <?php endif; ?>

                    <section class="content__item">
                        <h3 class="content__item__title"><?php the_title(); ?></h3>
                        <div class="content__item__content">
                            <p><?= wp_trim_words( the_content(), 30, '...' ); ?></p>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="error">Aucun résultat</p>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>