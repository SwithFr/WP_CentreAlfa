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

                    <section class="content__item result__mail">
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
                        <?php $sc = get_the_terms( get_the_ID(), 'services-categories' ); ?>
                        <h3 class="content__item__title"><a class="content__item__title" href="<?= get_term_link( $sc[0] ); ?>#<?= $post->post_name; ?>"><?php the_title(); ?></a></h3>
                        <p class="content__item__content"><?= wp_trim_words( get_the_content(), 100, '...' ); ?></p>
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
                            <?php
                                $email = get_field('email');
                                if(!empty($email)): ?>
                                <p><?php the_field('email'); ?></p>
                            <?php endif; ?>

                        </div>
                    </section>
                <?php endif; ?>

                <?php if($post->post_type === "membres"): ?>
                    <?php if(!$mDisplayed): ?>
                        <p class="result__type">Membres :</p>
                        <?php $mDisplayed = true; ?>
                    <?php endif; ?>

                    <section class="content__item result__membre">
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
                            <p><?= wp_trim_words( get_the_content(), 100, '...' ); ?></p>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="error">Aucun résultat</p>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>