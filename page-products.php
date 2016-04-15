<?php get_header(); ?>

    <!-- site content -->
    <div class="site-content container clearfix ">
        <!--main-column-->
        <div class="main-column ">

            <div class="products-posts">
                <ul class="clearfix products-list">
                    <?php
                    $query = new WP_Query(
                        array(
                            'post_type' => 'product',
                            'posts_per_page' => '-1')
                    );

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                       ?>
                            <li class="products-item col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <h3 class="product-title"> <a href="<?php the_permalink(); ?>"> <?php the_title();?></a></h3>

                                <div class="post-thumbnail">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                       <a  href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('thumbnail');?> </a>
                                    <?php }
                                    else {?> <a href="<?php the_permalink(); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/default_image.png" alt="No thumbnail"" alt=""> </a>

                                    <?php } ?>
                                </div>
                                <p class="product-excerpt">
                                    <?php echo get_the_excerpt(); ?>
                                </p>

                                <?php if (get_post_meta($post->ID, 'old_price', true)) { ?>
                                <p class="old-price-posts">
                                    Ціна: <?php echo get_post_meta($post->ID, 'old_price', true);?> грн.
                                </p>
                                <?php }
                                else {
                                   ?>
                                <a class="no-price" href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?> ">
                                    Зв'яжіться з нами для уточнення ціни
                                </a>
                                <?php } ?>
                            </li>
                            <?php
                        }
                    } else {
                        // Постов не найдено
                    }
                    ?>
                </ul>
        </div>
        <!--main-column-->

    </div>

        <div class="sidebar">
           <?php get_sidebar(); ?>
        </div>


    </div>
    <!--site content-->
<?php get_footer();?>