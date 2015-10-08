<?php get_header(); ?>
<section class="wrapper">
    <h2>Les services</h2>
    <?php wp_nav_menu([
        'theme_location'  => 'services-menu',
        'container'       => 'ul',
        'menu_class'      => 'nav nav--bordered',
        'echo'            => true,
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
    ]); ?>
    <div class="wrapper">
        <?php $query = new WP_Query([
            'category_name' => 'Services',
            'cat' => -6,
            'order' => 'ASC',
            'posts_per_page' => 2
        ]); ?>
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article id="<?php the_ID(); ?>" class="service">
                    <h3 class="service__title"><?php the_title(); ?></h3>
                    <p class="service__description">
                        <?php the_content(); ?>
                    </p>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="wrapper">
        <?php $query = new WP_Query([
            'category_name' => 'Services',
            'cat' => -6,
            'order' => 'ASC'
        ]); ?>
        <?php if ($query->have_posts()) : ?>
            <?php $i = 0; ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php if($i >= 2): ?>
                    <article id="<?php the_ID(); ?>" class="service">
                        <h3 class="service__title"><?php the_title(); ?></h3>
                        <p class="service__description">
                            <?php the_content(); ?>
                        </p>
                    </article>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
    <section class="wrapper">
        <h2>Nous contacter</h2>
        <!-- subnav-->
        <?php wp_nav_menu([
            'theme_location'  => 'addresses-menu',
            'container'       => 'ul',
            'menu_class'      => 'nav nav--bordered',
            'echo'            => true,
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
        ]); ?>
        <section class="address">
            <?php $query = new WP_Query([
                'post_type' => 'addresses',
                'p' => 75
            ]); ?>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php $location = get_field('google_maps'); ?>
                    <div class="address__map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                    <div class="address__coords">
                        <div class="address__block">
                            <h3 id="ourAddress"><?php the_title(); ?></h3>
                            <p><?= $location['address']; ?></p>
                        </div>
                        <div class="address__block">
                            <h3>Coordonnées</h3>
                            <p>Tel : <?php the_field('telephone') ?></p>
                            <p>Fax : <?php the_field('fax'); ?></p>
                            <p class="horaires">Ouvert du lundi au vendredi de 9h à 18h</p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="address__emails">
                <h3>Emails des services</h3>
                <dl>
                    <dt class="address__service-name">Thérapeutique :</dt>
                    <dd class="address__emails__item">alfa.therapeutique@gmail.com</dd>
                    <dt class="address__service-name">Prévention : </dt>
                    <dd class="address__emails__item">alfa.prevention.gmail</dd>
                    <dt class="address__service-name">Parentatlité : </dt>
                    <dd class="address__emails__item">alfa.parentalite@gmail.com</dd>
                    <dt class="address__service-name">Social : </dt>
                    <dd class="address__emails__item">alfa.servicesocial@gmail.com</dd>
                    <dt class="address__service-name">Direction : </dt>
                    <dd class="address__emails__item">alfa.dungelhoeff@gmail.com</dd>
                    <dt class="address__service-name">Administration - compatibilité : </dt>
                    <dd class="address__emails__item">alfa.yvettepetit@gmail.com</dd>
                </dl>
            </div>
        </section>
        <section class="address">
            <?php $query = new WP_Query([
                'post_type' => 'addresses',
                'p' => 76
            ]); ?>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php $location = get_field('google_maps'); ?>
                    <div class="address2__coords">
                        <div class="address__block">
                            <h3 id="ourAntenne"><?php the_title(); ?></h3>
                            <p><?= $location['address']; ?></p>
                        </div>
                        <div class="address__block">
                            <h3>Coordonnées</h3>
                            <p>Tel / Fax : <?php the_field('fax'); ?></p>
                            <p>GSM : <?php the_field('telephone') ?></p>
                            <p><?= the_field('email'); ?></p>
                        </div>
                    </div>
                    <div class="address__map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?= get_template_directory_uri(); ?>/js/jquery.js"></script>
    <script type="text/javascript">
        (function($) {

            function new_map( $el ) {

                // var
                var $markers = $el.find('.marker');


                // vars
                var args = {
                    zoom		: 16,
                    center		: new google.maps.LatLng(0, 0),
                    mapTypeId	: google.maps.MapTypeId.ROADMAP
                };


                // create map
                var map = new google.maps.Map( $el[0], args);


                // add a markers reference
                map.markers = [];


                // add markers
                $markers.each(function(){

                    add_marker( $(this), map );

                });


                // center map
                center_map( map );


                // return
                return map;

            }

            function add_marker( $marker, map ) {

                // var
                var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

                // create marker
                var marker = new google.maps.Marker({
                    position	: latlng,
                    map			: map
                });

                // add to array
                map.markers.push( marker );

                // if marker contains HTML, add it to an infoWindow
                if( $marker.html() )
                {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        content		: $marker.html()
                    });

                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, 'click', function() {

                        infowindow.open( map, marker );

                    });
                }

            }

            function center_map( map ) {

                // vars
                var bounds = new google.maps.LatLngBounds();

                // loop through all markers and create bounds
                $.each( map.markers, function( i, marker ){

                    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                    bounds.extend( latlng );

                });

                // only 1 marker?
                if( map.markers.length == 1 )
                {
                    // set center of map
                    map.setCenter( bounds.getCenter() );
                    map.setZoom( 16 );
                }
                else
                {
                    // fit to bounds
                    map.fitBounds( bounds );
                }

            }

            var map = null;

            $(document).ready(function(){

                $('.address__map').each(function(){

                    // create map
                    map = new_map( $(this) );

                });

            });

        })(jQuery);
    </script>
<?php get_footer(); ?>