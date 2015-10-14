<?php get_header( 'simple' ); ?>
    <section class="wrapper equipes">
        <h2>Les équipes</h2>
        <?php
            $member_group_terms = get_terms( 'equipes' );
            foreach ( $member_group_terms as $member_group_term ) {
                $member_group_query = new WP_Query( array(
                    'post_type' => 'membres',
                    'orderby' => 'name',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'equipes',
                            'field' => 'slug',
                            'terms' => array( $member_group_term->slug ),
                            'operator' => 'IN'
                        )
                    )
                ) );
                ?>
                <section class="team">
                    <h3 class="team__name" id="<?= $member_group_term->slug; ?>"><?= $member_group_term->name; ?></h3>
                    <ul>
                        <?php
                        if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post(); ?>
                            <li class="team__member">
                                <p class="team__member__name"><?= the_field('name'); ?></p>
                                <p class="team__member__role"><?= the_field('fonction'); ?></p>
                            </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </section>
                <?php
                $member_group_query = null;
                wp_reset_postdata();
            }
        ?>
    </section>
<?php get_footer(); ?>