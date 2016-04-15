<?php

add_filter('excerpt_more', 'new_excerpt_more',10);
function new_excerpt_more($more) {
    global $post;
    return '<div class="read-more"> <a href="'. get_permalink($post->ID) . '"> <i class="fa fa-arrow-circle-o-right "></i> Дізнатись більше</a></div>';
}
add_filter('excerpt_length', 'new_excerpt_length',10);
function new_excerpt_length($length) {
    global $post;
    return 10;
}


function project_scripts(){

//    Style css
    wp_enqueue_style('style', get_stylesheet_uri());

//    Main styles
    wp_enqueue_style('main-style', get_template_directory_uri().'/css/main.css');

//    Main styles
    wp_enqueue_style('main-s-style', get_template_directory_uri().'/css/main-s.css');

//    Main styles
    wp_enqueue_style('main-a-style', get_template_directory_uri().'/css/main-a.css');

//    Bootstrap grid
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');

//    Animete css
    wp_enqueue_style('animate-css', get_template_directory_uri().'/css/animate.css');



//    FlexSlider Styles
    wp_enqueue_style('flexslider-style', get_template_directory_uri().'/css/flexslider.css');

//    font Roboto
    wp_enqueue_style( 'font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic' );

//    font Awesome
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );

//Flexslider fonts
    wp_enqueue_style( 'flexslider-fonts', get_template_directory_uri().'/css/fonts.css' );

//    Include jQuery
    wp_enqueue_script('jquery',get_template_directory_uri(). '/js/jquery.js', true);
//    Include Custom JS
    wp_enqueue_script('custom-js',get_template_directory_uri(). '/js/custom.js', array('jquery'), true);

//    FlexSlider JS
    wp_enqueue_script('flexslider-js',get_template_directory_uri(). '/js/flexslider.js', array('jquery'), true);

//    Google map
    wp_enqueue_script('google-map','http://maps.googleapis.com/maps/api/js', true);

}

add_action('wp_enqueue_scripts', 'project_scripts');



// Theme setup
function project_setup() {

    // Navigation Menus
    register_nav_menus(array(
        'primary' => __( 'Primary Menu'),
        'footer' => __( 'Footer Menu'),
    ));
// Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, array( 'center', 'center'));
    add_image_size('banner-image',320 , 240, array('center', 'center'));

}

add_action('after_setup_theme', 'project_setup');
function extra_setup() {
    register_nav_menu ('primary mobile', __( 'Navigation Mobile', 'lesson21' ));
}
add_action( 'after_setup_theme', 'extra_setup' );

function set_container_class ($args) {
    $args['container_class'] = str_replace(' ','-',$args['theme_location']).'-nav'; return $args;
}
add_filter ('wp_nav_menu_args', 'set_container_class');



//Add our widgets location
function ourWidgetsInits(){
    register_sidebar( array(
        'name' => 'Contact Form',
        'id' => 'contact-form',
        'before_widget' => '<div class="contact-form">',
        'after_widget' => '</div>',
        'before_title'  => '<h1 class="contact-form-title">',
        'after_title'   => '</h1>',
    ));

    register_sidebar( array(
        'name' => 'Social',
        'id' => 'social-head',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
    ));

    register_sidebar( array(
        'name' => 'Recent Products',
        'id' => 'recent_products',
        'before_widget' => '<div class="recent-products">',
        'after_widget' => '</div>',
        'before_title'  => '<h1 class="recent-products-title">',
        'after_title'   => '</h1>',
    ));

    register_sidebar( array(
        'name' => 'Googel map',
        'id' => 'googel_map',
        'before_widget' => '<div class="google-map">',
        'after_widget' => '</div>',
        'before_title'  => '<h1 class="google-map-title">',
        'after_title'   => '</h1>',
    ));

}
add_action('widgets_init','ourWidgetsInits');



class products_widget extends WP_Widget {


    function __construct() {
        parent::__construct(
            'products_widget',
            'Recent products',
            array( 'description' => 'Список продукції', 'classname' => 'products-widget' )
        );

    }


    function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
       echo '<ul>';

        $args = array(
            'numberposts' => '15',
            'post_type' => 'product',
                );
                $recent_posts = wp_get_recent_posts( $args );
                foreach( $recent_posts as $recent ){
                    echo '<li class="footer-recent-posts-item"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                }

        echo '</ul> </div>';
        echo $args['after_widget'];
    }


    function form( $instance ) {
        $title = @ $instance['title'] ?: 'Заголовок за замовчуванням';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }


    function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

}

function register_products_widget() {
    register_widget( 'products_widget' );
}
add_action( 'widgets_init', 'register_products_widget' );




//Custom post type products


add_action('init', 'my_products');
function my_products()
{
    $labels = array(
        'name' => 'Продукція', // Основное название типа записи
        'singular_name' => 'Продукція', // отдельное название записи типа Product
        'add_new' => 'Добавить новую',
        'add_new_item' => 'Додатиь нову продукцію',
        'edit_item' => 'Редагувати продукцію',
        'new_item' => 'Нова продукція',
        'view_item' => 'Подивитись продукцію',
        'search_items' => 'Знайти продукцію',
        'not_found' =>  'Продукцію не знайдено',
        'not_found_in_trash' => 'В корзині продукциї не знайдено',
        'parent_item_colon' => '',
        'menu_name' => 'Продукція'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'exclude_from_search' => false,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail','excerpt','comments', 'custom-fields')
    );
    register_post_type('product',$args);
    flush_rewrite_rules();
}

// Добавляем фильтр, который изменит сообщение при публикации при изменении типа записи Product
add_filter('post_updated_messages', 'products_updated_messages');
function products_updated_messages( $messages ) {
    global $post, $post_ID;

    $messages['product'] = array(
        0 => '', // Не используется. Сообщения используются с индекса 1.
        1 => sprintf( 'Product обновлено. <a href="%s">Посмотреть запись product</a>', esc_url( get_permalink($post_ID) ) ),
        2 => 'Довільне поле оновлено',
        3 => 'Довільне поле видалено.',
        4 => 'Запис Product оновлена.',
        /* %s: дата и время ревизии */
        5 => isset($_GET['revision']) ? sprintf( 'Запис Product повернена з ревізії %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( 'Запис Product опублікована. <a href="%s">Прейти до запису product</a>', esc_url( get_permalink($post_ID) ) ),
        7 => 'Запись Product сохранена.',
        8 => sprintf( 'Запис Product збережена. <a target="_blank" href="%s">Предперегляд запису product</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( 'Запис Product запланована на: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предперегляд запису product</a>',
            // Как форматировать даты в PHP можно посмотреть тут: http://php.net/date
            date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( 'Чорновик запису Product оновлений. <a target="_blank" href="%s">Предперегляд запису product</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );

    return $messages;
}

//Custom post type products
//Поле ціни

add_action("admin_init", "old_price", 1);
function old_price() {
    add_meta_box( "extra_fields1", "Цена продукции", "fields_box1", "product", "normal", "high" );
}
function fields_box1(){
    global $post;
    $custom = get_post_custom($post->ID);
    $price = $custom["old_price"][0];
    ?>
    <label><strong>Ціна: </strong></label>
    <input type="text" name="old_price" value="<?php echo $price; ?>" /> грн.
<?php
}
add_action('save_post', 'save_old_price', 0);
function save_old_price( $post_id ){
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return false; // выходим если это автосохранение
if ( !current_user_can('edit_post', $post_id) ) return false; // выходим если юзер не имеет право редактировать запись
global $post;
update_post_meta($post->ID, "old_price", $_POST["old_price"]);
}


//Поле нової ціни


add_action("admin_init", "new_price", 1);
function new_price() {
    add_meta_box( "extra_fields2", "Новая цена продукции", "fields_box2", "product", "normal", "high" );
}
function fields_box2(){
    global $post;
    $custom = get_post_custom($post->ID);
    $price = $custom["new_price"][0];
    ?>
    <label><strong>Ціна: </strong></label>
    <input type="text" name="new_price" value="<?php echo $price; ?>" /> грн.
    <?php
}
add_action('save_post', 'save_new_price', 0);
function save_new_price( $post_id ){
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return false; // выходим если это автосохранение
    if ( !current_user_can('edit_post', $post_id) ) return false; // выходим если юзер не имеет право редактировать запись
    global $post;
    update_post_meta($post->ID, "new_price", $_POST["new_price"]);
};

//Цена: <?php echo (get_post_meta($post->ID, 'price', true));



add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function tgm_io_cpt_search( $query ) {

    if ( $query->is_search ) {
        $query->set( 'post_type', array( 'post', 'product' ) );
    }

    return $query;

}

include_once 'function-a.php';
include_once 'function-s.php';



