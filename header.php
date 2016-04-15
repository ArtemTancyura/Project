<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title> <?php bloginfo('name'); ?> </title>
    <?php wp_head(); ?>
</head>
<body>

<!-- site-header -->
    <header class="site-header clearfix">

        <!--container-->
        <div class="container clearfix">
<!-- Site logo-->
            <div class="site-logo col-xs-6 col-sm-6 col-md-4 col-lg-4 clearfix">
                <a href="<?php echo home_url(); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Site-logo"> </a>
            </div>
    <!--Site logo-->

    <!-- hd-search -->
            <div class="hd-search col-xs-12 col-sm-6 col-md-4 col-lg-4 clearfix">
                <?php get_search_form(); ?>
            </div>
    <!-- hd-search -->
    <!-- Social -->
            <div class="clearfix social col-xs-10 col-sm-6 col-md-4 col-lg-4" id="social">
                <ul class="social">
                    <li><a href="#"><span class="fa fa-youtube" aria-hidden="true"></span></a></li>
                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                 </ul>

            </div>

    <!-- Social --><div class="gamburger clearfix " onclick="showmenu()"></div>
            <nav class="site-nav clearfix">

                <?php

                $args = array(
                    'theme_location' => 'primary'
                );

                ?>

                <?php wp_nav_menu($args);
                    wp_nav_menu( array( 'theme_location' => 'primary mobile', 'menu_class' => 'nav-menu' ) );

                ?>

            </nav>

</div><!--container-->
        <a href="#" class="scrollToTop"><i class="fa fa-arrow-circle-up fa-3x"></i></i></a>
    </header>
<!-- site-header -->
