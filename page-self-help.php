<?php get_header( 'simple' ); ?>
    <section class="wrapper selfHelps">
        <h2>Self-Help</h2>
        <?php
            $sh_group_terms = get_terms( 'self-help-types' );
            foreach ( $sh_group_terms as $sh_group_term ) {
                $sh_group_query = new WP_Query( array(
                    'post_type' => 'contact-self-help',
                    'orderby' => 'ID',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'self-help-types',
                            'field' => 'slug',
                            'terms' => array( $sh_group_term->slug ),
                            'operator' => 'IN'
                        )
                    )
                ) );
                ?>
                <section class="selfHelp">
                    <h3 class="selfHelp__name" id="<?= $sh_group_term->slug; ?>"><?= $sh_group_term->name; ?></h3>
                    <span class="selfHelp__period"><?= get_field( 'periode', $sh_group_term ); ?></span>
                    <ul>
                        <?php
                        if ( $sh_group_query->have_posts() ) : while ( $sh_group_query->have_posts() ) : $sh_group_query->the_post(); ?>
                            <li class="selfHelp__contact">
                                <p class="selfHelp__contact__name"><?= the_title(); ?></p>
                                <p class="selfHelp__contact__phone"><?= the_field('telephone'); ?></p>
                            </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </section>
                <?php
                $sh_group_query = null;
                wp_reset_postdata();
            }
        ?>
    </section>
<?php get_footer(); ?>