<?php get_header( 'category' ); ?>
    <section class="wrapper">
        <h2><?php single_cat_title( '', true ); ?></h2>
        <?php wp_nav_menu([
            'theme_location'  => 'services-menu',
            'container'       => 'ul',
            'menu_class'      => 'nav nav--bordered',
            'echo'            => true,
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
        ]); ?>
        <?php $query = new WP_Query([
            'post_type' => 'sections',
            'cat' => $cat
        ]); ?>
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
               <article>
                   <h3><?php the_title(); ?></h3>
                   <div class="content">
                       <?php the_content(); ?>
                   </div>
               </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>