<?php get_header(); ?>

    <!-- site content -->
    <div class="site-content container ">
    <!--main-column-->
    <div class="main-column ">

        <div class="products-posts clearfix">
                <?php


                if ( have_posts() ) {
                    while ( have_posts() ) {
                       the_post();
                        ?>

                            <h1 class="product-title">  <?php the_title();?></h1>

                        <div class="left-single-post col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="single-thumbnail ">
                                <?php if ( has_post_thumbnail() ) { ?>
                                     <?php the_post_thumbnail('full');?>
                                <?php } else {?> <a href="<?php the_permalink(); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/default_image.png" alt="No thumbnail"" alt=""> </a>

                                <?php } ?>

                            </div>

                            <?php if (get_post_meta($post->ID, 'old_price', true)) { ?>
                                <p class="old-price-single">
                                    Ціна: <?php echo get_post_meta($post->ID, 'old_price', true);?> грн.
                                </p>
                            <?php }
                            else {
                                ?>
                                <a class="no-price" href="<?php echo  esc_url(get_permalink(get_page_by_path('contact')));?> ">
                                    <?php echo __(' Зв\'яжіться з нами для уточнення ціни','index.php'); ?>
                                </a>
                            <?php } ?>

                        </div>

                        <div class="right-single-post col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <p class="product-content">
                                       <?php echo get_the_content(); ?>
                            </p>
                        </div>



                        <?php
                    }
                } else {
                    // Постов не найдено
                }
                ?>
        </div>
        <!--main-column-->

    </div>

        <div class="sidebar">
           <?php get_sidebar(); ?>
        </div>


    </div>
    <!--site content-->
<?php get_footer();?>