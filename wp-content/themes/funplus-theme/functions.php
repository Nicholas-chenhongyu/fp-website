<?php

// The version of the assets
global $assetVersion;
$assetVersion = '3.0.0';

// Disable use XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Disable X-Pingback to header
add_filter('wp_headers', 'disable_x_pingback');
function disable_x_pingback($headers)
{
    unset($headers['X-Pingback']);
    return $headers;
}

// Stop resizing images on upload
add_filter('big_image_size_threshold', '__return_false');

// Theme setup
add_action('after_setup_theme', 'funplus_setup');
function funplus_setup()
{
    load_theme_textdomain('funplus', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
    register_nav_menus(
        array(
            'desktop-menu' => esc_html__('Desktop Menu', 'funplus'),
            'mobile-menu' => esc_html__('Mobile Menu', 'funplus'),
            'footer-1' => esc_html__('Footer 1', 'funplus'),
            'footer-2' => esc_html__('Footer 2', 'funplus'),
            'footer-3' => esc_html__('Footer 3', 'funplus'),
            'footer-contact' => esc_html__('Footer Contact', 'funplus'),
        )
    );
}

// CSS
add_action('wp_enqueue_scripts', 'funplus_load_styles');
function funplus_load_styles()
{
    global $assetVersion;
    wp_enqueue_style('vendor-styles', get_template_directory_uri() . '/public/css/vendor.css', array(), $assetVersion);
    wp_enqueue_style('app-styles', get_template_directory_uri() . '/public/css/app.css', array(), $assetVersion);
}

// Scripts
add_action('wp_enqueue_scripts', 'funplus_load_scripts');
remove_action('wp_head', 'wp_resource_hints', 2);
function funplus_load_scripts()
{
    global $assetVersion;
    // wp_deregister_script('jquery');
    wp_enqueue_script('jquery');
    wp_enqueue_script('vendor-js', get_template_directory_uri() . '/public/js/vendor.js', NULL, $assetVersion, true);
    wp_enqueue_script('wow-js', get_template_directory_uri() . '/public/js/wow.js', NULL, $assetVersion, true);
    wp_register_script('app-js', get_template_directory_uri() . '/public/js/app.js', NULL, $assetVersion, true);
    // wp_localize_script( 'app-js', 'AjaxFront', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
    wp_enqueue_script('app-js');
}

// ACF
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => __('Theme Settings', 'funplus'),
        'menu_title' => __('Theme Settings', 'funplus'),
        'menu_slug'  => 'funplus-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}

/**
 * Register Custom Post Types
 */
add_action('init', 'fp_custom_post_types');
function fp_custom_post_types()
{
    register_post_type('global_block', [
        'labels'         => [
            'name'               => _x('Global Blocks', 'post type general name'),
            'singular_name'      => _x('Global Blocks', 'post type singular name'),
            'add_new'            => _x('Add New', 'game'),
            'add_new_item'       => __('Add New Block'),
            'edit_item'          => __('Edit Block'),
            'new_item'           => __('New Block'),
            'all_items'          => __('All Blocks'),
            'view_item'          => __('View Block'),
            'search_items'       => __('Search Blocks'),
            'not_found'          => __('No Blocks found'),
            'not_found_in_trash' => __('No Blocks found in the Trash'),
            'menu_name'          => __('Global Blocks'),
        ],
        'public'        => true,
        'menu_position' => 5,
        'supports'      => ['title'],
        'has_archive'   => false,
        'publicly_queryable' => false
    ]);

    register_post_type('game', [
        'labels'         => [
            'name'               => _x('Games', 'post type general name'),
            'singular_name'      => _x('Game', 'post type singular name'),
            'add_new'            => _x('Add New', 'game'),
            'add_new_item'       => __('Add New Game'),
            'edit_item'          => __('Edit Game'),
            'new_item'           => __('New Game'),
            'all_items'          => __('All Games'),
            'view_item'          => __('View Game'),
            'search_items'       => __('Search Games'),
            'not_found'          => __('No Games found'),
            'not_found_in_trash' => __('No Games found in the Trash'),
            'menu_name'          => __('Games'),
        ],
        'public'        => true,
        'menu_position' => 5,
        'supports'      => ['title', 'thumbnail', 'excerpt'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'        => 'games'
        ]
    ]);
    register_post_type('comic', [
        'labels'         => [
            'name'               => _x('Comic', 'post type general name'),
            'singular_name'      => _x('Comic', 'post type singular name'),
            'add_new'            => _x('Add New', 'comic'),
            'add_new_item'       => __('Add New Comic'),
            'edit_item'          => __('Edit Comic'),
            'new_item'           => __('New Comic'),
            'all_items'          => __('All Comics'),
            'view_item'          => __('View Comic'),
            'search_items'       => __('Search Comics'),
            'not_found'          => __('No Comics found'),
            'not_found_in_trash' => __('No Comic found in the Trash'),
            'menu_name'          => __('Comic Entry'),
        ],
        'public'        => true,
        'menu_position' => 5,
        'supports'      => ['title', 'thumbnail', 'excerpt'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'        => 'comic'
        ]
    ]);

    register_post_type('studio', [
        'labels'         => [
            'name'               => _x('Studios', 'post type general name'),
            'singular_name'      => _x('Studio', 'post type singular name'),
            'add_new'            => _x('Add New', 'Studio'),
            'add_new_item'       => __('Add New Studio'),
            'edit_item'          => __('Edit Studio'),
            'new_item'           => __('New Studio'),
            'all_items'          => __('All Studios'),
            'view_item'          => __('View Studio'),
            'search_items'       => __('Search Studios'),
            'not_found'          => __('No Studios found'),
            'not_found_in_trash' => __('No Studios found in the Trash'),
            'menu_name'          => __('Studios in map'),
        ],
        'public'        => true,
        'menu_position' => 5,
        'supports'      => ['title', 'thumbnail', 'excerpt'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'       => 'studio',
            'pages'      => false
        ]
    ]);

    register_taxonomy('region', 'studio', [
        'labels' => [
            'name'               => _x('Region', 'Taxonomy general name'),
            'singular_name'      => _x('Regions', 'Taxonomy singular name'),
            'menu_name'          => __('Regions'),
        ],
        'hierarchical' => true
    ]);

    register_post_type('page_studio', [
        'labels'         => [
            'name'               => _x('Page Studios', 'post type general name'),
            'singular_name'      => _x('Page Studio', 'post type singular name'),
            'add_new'            => _x('Add New', 'Studio'),
            'add_new_item'       => __('Add New Studio'),
            'edit_item'          => __('Edit Studio'),
            'new_item'           => __('New Studio'),
            'all_items'          => __('All Studios'),
            'view_item'          => __('View Studio'),
            'search_items'       => __('Search Studios'),
            'not_found'          => __('No Studios found'),
            'not_found_in_trash' => __('No Studios found in the Trash'),
            'menu_name'          => __('Page Studios'),
        ],
        'public'        => true,
        'menu_position' => 5,
        'supports'      => ['title', 'thumbnail', 'excerpt'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'       => 'ourstudios',
            'pages'      => false
        ]
    ]);

    register_post_type('career', [
        'labels'         => [
            'name'               => _x('Careers', 'post type general name'),
            'singular_name'      => _x('Career', 'post type singular name'),
            'add_new'            => _x('Add New', 'funplus'),
            'add_new_item'       => __('Add New Career'),
            'edit_item'          => __('Edit Career'),
            'new_item'           => __('New Career'),
            'all_items'          => __('All Careers'),
            'view_item'          => __('View Career'),
            'search_items'       => __('Search Careers'),
            'not_found'          => __('No Careers found'),
            'not_found_in_trash' => __('No Careers found in the Trash'),
            'menu_name'          => __('Careers'),
        ],
        'public'        => true,
        'menu_position' => 6,
        'supports'      => ['title', 'excerpt'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'       => 'careers',
        ]
    ]);

    register_taxonomy('country', 'career', [
        'labels' => [
            'name'               => _x('Country', 'Taxonomy general name'),
            'singular_name'      => _x('Countries', 'Taxonomy singular name'),
            'menu_name'          => __('Countries'),
        ],
        'hierarchical' => true
    ]);

    register_post_type('game_update', [
        'labels'         => [
            'name'               => _x('Game Updates', 'post type general name'),
            'singular_name'      => _x('Game Update', 'post type singular name'),
            'add_new'            => _x('Add New', 'funplus'),
            'add_new_item'       => __('Add New Update'),
            'edit_item'          => __('Edit Update'),
            'new_item'           => __('New Update'),
            'all_items'          => __('All Update'),
            'view_item'          => __('View Update'),
            'search_items'       => __('Search Update'),
            'not_found'          => __('No Update found'),
            'not_found_in_trash' => __('No Update found in the Trash'),
            'menu_name'          => __('Game Updates'),
        ],
        'public'        => true,
        'menu_position' => 5,
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'       => 'updates',
        ]
    ]);

    register_taxonomy('cat_game', 'game_update', [
        'labels' => [
            'name'               => _x('Games', 'Taxonomy general name'),
            'singular_name'      => _x('Game', 'Taxonomy singular name'),
            'menu_name'          => __('Games'),
        ],
        'hierarchical' => true,
        'rewrite' => [
            'slug' => 'game-updates'
        ]
    ]);

    register_post_type('insider_info', [
        'labels'         => [
            'name'               => _x('Insider Info', 'post type general name'),
            'singular_name'      => _x('Insider Info', 'post type singular name'),
            'add_new'            => _x('Add New', 'funplus'),
            'add_new_item'       => __('Add New Info'),
            'edit_item'          => __('Edit Info'),
            'new_item'           => __('New Info'),
            'all_items'          => __('All Info'),
            'view_item'          => __('View Info'),
            'search_items'       => __('Search Info'),
            'not_found'          => __('No Info found'),
            'not_found_in_trash' => __('No Info found in the Trash'),
            'menu_name'          => __('Insider Info'),
        ],
        'public'        => true,
        'menu_position' => 6,
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'       => 'info',
        ]
    ]);

    register_post_type('awards', [
        'labels'         => [
            'name'               => _x('Events & Awards', 'post type general name'),
            'singular_name'      => _x('Events & Awards', 'post type singular name'),
            'add_new'            => _x('Add New', 'funplus'),
            'add_new_item'       => __('Add New Award'),
            'edit_item'          => __('Edit Award'),
            'new_item'           => __('New Award'),
            'all_items'          => __('All Awards'),
            'view_item'          => __('View Award'),
            'search_items'       => __('Search Award'),
            'not_found'          => __('No Award found'),
            'not_found_in_trash' => __('No Award found in the Trash'),
            'menu_name'          => __('Events & Awards'),
        ],
        'public'        => true,
        'menu_position' => 7,
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'       => 'award',
        ]
    ]);

    register_post_type('partnership', [
        'labels'         => [
            'name'               => _x('Partnerships', 'post type general name'),
            'singular_name'      => _x('Partnerships', 'post type singular name'),
            'add_new'            => _x('Add New', 'funplus'),
            'add_new_item'       => __('Add New Partnership'),
            'edit_item'          => __('Edit Partnership'),
            'new_item'           => __('New Partnership'),
            'all_items'          => __('All Partnerships'),
            'view_item'          => __('View Partnership'),
            'search_items'       => __('Search Partnership'),
            'not_found'          => __('No Partnership found'),
            'not_found_in_trash' => __('No Partnership found in the Trash'),
            'menu_name'          => __('Partnerships'),
        ],
        'public'        => true,
        'menu_position' => 8,
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'       => 'partnership',
        ]
    ]);

    register_post_type('people', [
        'labels'         => [
            'name'               => _x('People', 'post type general name'),
            'singular_name'      => _x('People', 'post type singular name'),
            'add_new'            => _x('Add New', 'funplus'),
            'add_new_item'       => __('Add New People'),
            'edit_item'          => __('Edit People'),
            'new_item'           => __('New People'),
            'all_items'          => __('All People'),
            'view_item'          => __('View People'),
            'search_items'       => __('Search People'),
            'not_found'          => __('No People found'),
            'not_found_in_trash' => __('No People found in the Trash'),
            'menu_name'          => __('People'),
        ],
        'public'        => true,
        'menu_position' => 9,
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => false,
        'rewrite'         => [
            'with_front' => false,
            'slug'       => 'people',
        ]
    ]);
}


/**
 * Remove P tags from CF7 output
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Add a span to the last word of a string
 */
function fp_span_last_word($string)
{
    $words = explode(' ', $string);
    $words[count($words) - 1] = '<span>' . $words[count($words) - 1] . '</span>';

    return implode(' ', $words);
}

/**
 * Remove the content editor from pages and posts
 */
add_action('admin_init', 'fp_remove_content_editor');
function fp_remove_content_editor()
{
    remove_post_type_support('page', 'editor');
    remove_post_type_support('post', 'editor');
    // remove_post_type_support('career', 'editor');
}

/**
 * AJAX Load More
 */
add_action('wp_ajax_nopriv_ajax_load_more', 'fp_ajax_load_more');
add_action('wp_ajax_ajax_load_more', 'fp_ajax_load_more');
function fp_ajax_load_more()
{
    $args = $_POST['args'];
    $index = isset($_POST['args']['posts_per_page']) ? $_POST['args']['posts_per_page'] : 0;
    query_posts($args);
    while (have_posts()) {
        the_post('post_status=publish');
        get_template_part('template-parts/global/' . $args['post_type'], false, ['index' => $index]);
        $index++;
    }

    wp_die();
}

/**
 * Hidden Code Submit
 */
add_action('wp_ajax_nopriv_hidden_code_submit', 'fp_hidden_code_submit');
add_action('wp_ajax_hidden_code_submit', 'fp_hidden_code_submit');
function fp_hidden_code_submit()
{
    $code_submit = $_REQUEST['code'];
    $current_lore = $_REQUEST['current_lore'];
    $nonce = $_REQUEST['form_nonce'];

    if (! wp_verify_nonce($nonce, 'hidden_code_nonce')) {
        exit('The form is not valid');
    }
    $code = [
        1 => 'Griffin',
        2 => 'Corpsehead cove',
        3 => 'Whispershell',
        4 => 'The eye sees through time',
        5 => 'Ancient order',
        6 => 'Arise',
        7 => 'Cradle',
        8 => 'Fear the undead',
        9 => 'Compass',
        10 => 'Treasure'
    ];
    if (strtolower($code_submit) === strtolower($code[$current_lore])) {
        get_template_part('template-parts/objects/lore', 'item', [
            'status' => 'unlocked',
            'id' => $current_lore
        ]);
    } else {
        echo 'false';
    }
    wp_die();
}

/**
 * wp_nav_menu CSS classes
 * Add animations to the mobile nav
 */
add_filter('nav_menu_css_class', 'fp_nav_item_class', 10, 3);
function fp_nav_item_class($classes, $item, $args)
{
    // Add classes to the desktop nav menu items
    if ($args->theme_location == 'desktop-menu') {
        $classes[] = 'squeezeIn';
    }

    // Add classes to mobile nav menu items
    if ($args->theme_location == 'mobile-menu') {
        $classes[] = 'fadeInUpwards';
    }

    return $classes;
}

/// Dumps data on page - allows to see what data is pulling through from Wordpress

if (!function_exists('debug')) {
    function debug()
    {
        $vars = func_get_args();
        $flag = end($vars);
        echo '<pre>';
        array_map(function ($var) {
            print_r($var);
            echo '<br>';
        }, $vars);
        echo '</pre>';
        if (is_bool($flag) && $flag == true) die;
    }
}

// Get user IP

function get_the_user_ip()
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {


        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {

        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Privacy pages redirect

define("AREACONF", "https://user-privacy.kingsgroupgames.com/user/privacy/areaconf");

function account_redirects()
{

    $country_code = isset($_GET['country_code']) ? $_GET['country_code'] : '';
    $language = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

    if (is_page('user-privacy-policy')) {

        //Check page version
        $response = wp_remote_get(AREACONF, array('headers' => array('X-Forwarded-For' => get_the_user_ip())));
        if (is_wp_error($response)) {
            return false;
        }
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);
        if (!empty($data)) {
            $version = $data->ret->user_privacy_version;
        }

        //Redirect
        if ($version == '1') { // 亚太

            if (strtolower($language[0]) == 'zh-tw') {
                wp_redirect(site_url() . '/funplus-account-privacy-policy/tw/');
                die;
            } else {
                wp_redirect(site_url() . '/funplus-account-privacy-policy/');
                die;
            }
        }
    }

    if (is_page('user-agreement')) {

        //Check page version
        $response = wp_remote_get(AREACONF, array('headers' => array('X-Forwarded-For' => get_the_user_ip())));
        if (is_wp_error($response)) {
            return false;
        }
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);
        if (!empty($data)) {
            $version = $data->ret->user_privacy_version;
        }

        //Redirect
        if ($version == '1') { // 亚太
            wp_redirect(site_url() . '/funplus-account-services-terms-of-service-and-user-agreement');
            die;
        }
    }
}
add_action('template_redirect', 'account_redirects');

// Game Privacy and terms redirect

function site_legal_redirects()
{

    /**
     * Game Privacy Version
     * 1. 欧洲
     * 2. 韩国
     * 3. 日本
     * 4. 亚太
     * 
     * */

    $language = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

    if (is_page('privacy-policy')) { // 欧洲Privacy

        //Check page version
        $response = wp_remote_get(AREACONF, array('headers' => array('X-Forwarded-For' => get_the_user_ip())));
        if (is_wp_error($response)) {
            return false;
        }
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);
        if (!empty($data)) {
            $version = $data->ret->game_privacy_version;
        }

        //Redirect
        if ($version == '2') {
            wp_redirect(site_url() . '/privacy-policy-en-as/kr');
            exit();
        } elseif ($version == '3') {
            wp_redirect(site_url() . '/privacy-policy-en-as/ja');
            exit();
        } elseif ($version == '4') {
            switch (strtolower($language[0])) {
                case 'ar':
                    wp_redirect(site_url() . '/privacy-policy-en-as/ar');
                    exit();
                    break;
                case 'ms':
                    wp_redirect(site_url() . '/privacy-policy-en-as/ms');
                    exit();
                    break;
                case 'id':
                    wp_redirect(site_url() . '/privacy-policy-en-as/id');
                    exit();
                    break;
                case 'th':
                    wp_redirect(site_url() . '/privacy-policy-en-as/tha');
                    exit();
                    break;
                case 'vi':
                    wp_redirect(site_url() . '/privacy-policy-en-as/vie');
                    exit();
                    break;
                case 'tr':
                    wp_redirect(site_url() . '/privacy-policy-en-as/tr');
                    exit();
                    break;
                case 'zh-tw':
                    wp_redirect(site_url() . '/privacy-policy-en-as/tw');
                    exit();
                    break;
                case 'zh-hk':
                    wp_redirect(site_url() . '/privacy-policy-en-as/tw');
                    exit();
                    break;
                default:
                    wp_redirect(site_url() . '/privacy-policy-en-as');
                    exit();
            }
        } else {
            wp_redirect(site_url() . '/privacy-policy/en');
            exit();
        }
    }
    if (is_page('terms-conditions')) { // 欧洲Terms

        //Check page version
        $response = wp_remote_get(AREACONF, array('headers' => array('X-Forwarded-For' => get_the_user_ip())));
        if (is_wp_error($response)) {
            return false;
        }
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);
        if (!empty($data)) {
            $version = $data->ret->game_privacy_version;
        }

        //Redirect

        if ($version == '2') {
            wp_redirect(site_url() . '/terms-conditions-en-as/kr');
            exit();
        } elseif ($version == '3') {
            wp_redirect(site_url() . '/terms-conditions-en-as/ja');
            exit();
        } elseif ($version == '4') {
            switch (strtolower($language[0])) {
                case 'ar':
                    wp_redirect(site_url() . '/terms-conditions-en-as/ar');
                    exit();
                    break;
                case 'ms':
                    wp_redirect(site_url() . '/terms-conditions-en-as/ms');
                    exit();
                    break;
                case 'id':
                    wp_redirect(site_url() . '/terms-conditions-en-as/id');
                    exit();
                    break;
                case 'th':
                    wp_redirect(site_url() . '/terms-conditions-en-as/tha');
                    exit();
                    break;
                case 'vi':
                    wp_redirect(site_url() . '/terms-conditions-en-as/vie');
                    exit();
                    break;
                case 'tr':
                    wp_redirect(site_url() . '/terms-conditions-en-as/tr');
                    exit();
                    break;
                case 'zh-tw':
                    wp_redirect(site_url() . '/terms-conditions-en-as/tw');
                    exit();
                    break;
                case 'zh-hk':
                    wp_redirect(site_url() . '/terms-conditions-en-as/tw');
                    exit();
                    break;
                default:
                    wp_redirect(site_url() . '/terms-conditions-en-as');
                    exit();
            }
        } else {
            wp_redirect(site_url() . '/terms-conditions/en');
            exit();
        }
    }
}
add_action('template_redirect', 'site_legal_redirects');

function add_query_vars_filter($vars)
{
    $vars[] = "location";
    return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');

//Remove Gutenberg Block Library CSS from loading on the frontend
function remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);

// Add id to enable local scroll
function add_id_to_heading($content)
{
    if (is_page_template('page-blank.php') || is_page_template('page-blank-new.php')) {
        $i = 1;
        while (strpos($content, '<h4>') !== false) {
            $content = preg_replace('/<h4>/', '<h4 id=section-' . $i++ . '>', $content, 1);
        }
    }
    return $content;
}
add_filter('acf_the_content', 'add_id_to_heading');


/**
 * Change ACF field to be read-only.
 *
 * @param array $field Field attributes.
 *
 * @return array
 */
function acf_read_only_field($field)
{

    if ('soc_comic_reader_clicks' === $field['name']) {
        $field['disabled'] = true;
    }

    return $field;
}

add_filter('acf/load_field', 'acf_read_only_field');

// Track Clicks

add_action('wp_ajax_nopriv_updateReads', 'updateReads');
add_action('wp_ajax_updateReads', 'updateReads');

function updateReads()
{
    // Update SOC reads
    $count = get_field('field_667924a1b4c25', 'option');
    update_field('field_667924a1b4c25', $count + 1, 'option');
}

// comic use custom permalinks

function custom_permalink($post_type)
{
    // Replace 'custompost' with your post type name
    if ('comic' === $post_type) {
        return '__false';
    }

    return '__true';
}
add_filter('custom_permalinks_exclude_post_type', 'custom_permalink');
