<?php
//pagination
function wp_beginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */

    if( $wp_query->max_num_pages <= 1 )

        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */

    if ( $paged >= 1 )

        $links[] = $paged;

    /** Add the pages around the current page to the array */

    if ( $paged >= 3 ) {

        $links[] = $paged - 1;

        $links[] = $paged - 2;

    }

    if ( ( $paged + 2 ) <= $max ) {

        $links[] = $paged + 2;

        $links[] = $paged + 1;

    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    // if ( get_previous_posts_link() )
    //    printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */

    if ( ! in_array( 1, $links ) ) {

        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )

            echo '<li>…</li>';

    }

    /** Link to current page, plus 2 pages in either direction if necessary */

    sort( $links );

    foreach ( (array) $links as $link ) {

        $class = $paged == $link ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );

    }

    /** Link to last page, plus ellipses if necessary */

    if ( ! in_array( $max, $links ) ) {

        if ( ! in_array( $max - 1, $links ) )

            echo '<li>…</li>' . "\n";


        $class = $paged == $max ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );

    }
    /** Next Post Link */
    //if ( get_next_posts_link() )
    //     printf( '<li>%s</li>' . "\n", get_next_posts_link() );
    echo '</ul></div>' . "\n";

}


//widgets location
function ProgectWidgetsInits(){
    register_sidebar( array(
        'name' => 'Наши недавние новости',
        'id' => 'sidebar1',
        'before_widget' => '<div class="most-popular-item">',
        'after_widget' => '</div>',
        'before_title'  => '<h1 class="most-popular-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar( array(
        'name' => 'Конвертер валют',
        'id' => 'sidebar2',
        'before_widget' => '<div class="money-item">',
        'after_widget' => '</div>',
        'before_title'  => '<h1 class="money-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar( array(
        'name' => 'Курс валют',
        'id' => 'sidebar3',
        'before_widget' => '<div class="exchange-item">',
        'after_widget' => '</div>',
        'before_title'  => '<h3 class="exchange-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init','ProgectWidgetsInits');


/* sending form */
function getStyle() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'getStyle');
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_script( 'ajax-script', get_template_directory_uri() .  './ajax-script.js', array('jquery') );
    wp_localize_script(
        'ajax-script',
        'ajax_object',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'send_letter' )
        )
    );
});
add_action( 'wp_ajax_send_letter', 'send_letter' );
add_action('wp_ajax_nopriv_send_letter', 'send_letter');
function my_action() {
    $nonce = $_POST['nonce'];
    if ( !wp_verify_nonce( $nonce, 'send_letter' ) ) {
        echo('Get out robot');
    } else {
        $organization = $_POST['organization'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $area = $_POST['area'];
        $cultures = $_POST['cultures'];
        $analysis = $_POST['analysis'];
        $fertilization = $_POST['fertilization'];
        $countries = $_POST['countries'];
        $european = $_POST['european'];

        $emailTo = get_option('admin_email');
        $subject = 'Повідомлення з сайту від '.$organization;
        $body = "Імя: $organization \n\nE-mail: $email \n\nКонтактный телефон: $telephone \n\nЗемельные площади: $area
                 \n\nВыращиваемые культуры: $cultures \n\nПоследнее проведения анализа земли: $analysis
                 \n\nИспользуемые виды удобрений: $fertilization \n\nПредпочитаемые страны-производители: $countries
                 \n\nПокупали ли Евопейские удобрения: $european";
        $headers = 'From: '.$organization.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
        wp_mail($emailTo, $subject, $body, $headers);
        wp_die();
    }

}

//social links
function progect_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'progect_social_links' , array(
        'title'      => __( 'Social Links', 'progect-icons' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'social_links_youtube' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_youtube', array(
        'label'        => __( 'Youtube', 'progect-icons' ),
        'section'    => 'progect_social_links',
        'settings'   => 'social_links_youtube',
    ) ) );

    $wp_customize->add_setting( 'social_links_facebook' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_facebook', array(
        'label'        => __( 'Facebook', 'progect-icons' ),
        'section'    => 'progect_social_links',
        'settings'   => 'social_links_facebook',
    ) ) );

    $wp_customize->add_setting( 'social_links_twitter' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_twitter', array(
        'label'        => __( 'Twitter', 'progect-icons' ),
        'section'    => 'progect_social_links',
        'settings'   => 'social_links_twitter',
    ) ) );

    $wp_customize->add_setting( 'social_links_instagram' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_instagram', array(
        'label'        => __( 'Instagram', 'progect-icons' ),
        'section'    => 'progect_social_links',
        'settings'   => 'social_links_instagram',
    ) ) );
}
add_action( 'customize_register', 'progect_customize_register' );