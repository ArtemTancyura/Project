<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

    <!-- site content -->
    <div class="site-content container ">
        <!--main-column-->
        <div class="main-column ">

            <div class="products-posts">
                <ul class="clearfix">
                    <?php


                    if ( have_posts() ) {
                    ?>
                        <h2>Search results for: <?php the_search_query(); ?></h2>
                    <?php
                        while ( have_posts() ) {
                            the_post();
                            ?>
                            <li class="products-item-search">
                                <h3 class="product-title"> <a href="<?php the_permalink(); ?>"> <?php the_title();?></a></h3>

                                <div class="post-thumbnail-search">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('full');?> </a>
                                    <?php } ?>
                                </div>

                                <?php if ($post->post_excerpt) { ?>

                                    <p class="product-content-search">
                                        <?php echo get_the_excerpt(); ?>
                                        <a href="<?php the_permalink(); ?>">Read more&raquo;</a>
                                    </p>

                                <?php } else {?>
                                    <p class="product-content-search">
                                    <?php the_content();?>
                                    </p>

                               <?php } ?>


                                <?php if (get_post_meta($post->ID, 'old_price', true)) { ?>
                                    <p class="old-price-posts-seach">
                                        Цена: <?php echo get_post_meta($post->ID, 'old_price', true);?> грн.
                                    </p>
                                <?php }
                                else {
                                    echo __('Свяжитесь с нами для уточнения цены','index.php');
                                }
                                ?>
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
    </div>
    <!--site content-->
<?php get_footer();?>