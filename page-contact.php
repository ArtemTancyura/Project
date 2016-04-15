<?php get_header(); ?>

    <!-- site content -->
    <div class="contact-page container clearfix">
        <!--main-column-->
        <div class="main-column">
            <?php if (have_posts()):
                while (have_posts()): the_post(); ?>

                    <p class="contact-page-title">
                        <?php echo get_the_content(); ?>
                    </p>

                <?php endwhile;
            else:
                ?>
                <p>
                    <?php __('No content found' , 'theme_text_domain'); ?>
                </p>

            <?php endif;


            $query = new WP_Query(
            array(
                'category_name' => 'contacts',
                'posts_per_page' =>'-1')
            );?>

            <div class="our-contacts first-coloumn-contact">
                <ul class="contact-list clearfix">
                        <?php if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                        <li class="clearfix">
<!--                               <h3 class="contact-title">--><?php //the_title(); ?><!--</h3>-->

                               <div class="contact-content  col-xs-4 col-sm-4 col-md-3 col-lg-3"> <i class="fa fa-<?php echo get_post_field( 'post_name', get_post() ); ?>"> </i></div> <div class="contact-content col-md-9 col-lg-9"> <?php echo get_the_content();?> </div>
                        </li>
                        <?php } } ?>

                </ul>
            </div>
            <div class="second-coloumn-contact">
               <?php if (is_active_sidebar('googel_map')) :?>
                    <div class="widget_google_map">
                        <?php dynamic_sidebar('googel_map'); ?>
                    </div>
                   <div id="googleMap" class="googleMap"></div>
                <?php endif; ?>

            </div>
        </div>

        <!--main-column-->
        <div class="sidebar">
            <?php get_sidebar(); ?>
        </div>

    </div>
    <!--site content-->
<?php get_footer();?>