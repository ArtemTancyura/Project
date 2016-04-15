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
        <div class="sidebar">
            <?php get_sidebar(); ?>
        </div>
        </div>

    <!--site content-->
<?php get_footer();?>