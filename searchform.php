<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="searchform__label" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
    <input type="text" class="searchform__input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Votre recherche..." />
    <input type="submit" class="searchform__submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
</form>