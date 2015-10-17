<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <a id="close" class="searchform__close" href="">X</a>
    <label class="searchform__label" for="s">Entrez votre recherche</label>
    <input type="text" class="searchform__input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Votre recherche..." />
    <button class="searchform__submit" id="searchsubmit">
        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                 viewBox="0 0 63.6 63.7" enable-background="new 0 0 63.6 63.7" xml:space="preserve">
            <circle fill="none" stroke="#1F1E21" stroke-width="5" stroke-miterlimit="10" cx="23.3" cy="23.4" r="20.2"/>
            <line fill="none" stroke="#1F1E21" stroke-width="5" stroke-miterlimit="10" x1="37.5" y1="37.7" x2="61.3" y2="61.5"/>
        </svg>
    </button>
    <span id="errorMsg" class="searchform__error"></span>
</form>

<?php wp_nav_menu([
    'theme_location'  => 'header-menu',
    'container'       => 'ul',
    'menu_class'      => 'nav nav--hidden',
    'echo'            => true,
    'items_wrap'      => '<ul id="hiddenNav" class="%2$s">%3$s</ul>'
]); ?>