<?php
//Add dynamic title
add_theme_support('title_tags');

function dung_register_styles()
{
    $version = wp_get_theme()->get('Version');
    // wp_enqueue_style('dung-style', get_template_directory_uri() . "/style.css", array('dung-boostrap'), $version, 'all');
    wp_enqueue_style('dung-boostrap', "https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap", array(), '4.4.1', 'all');
    wp_enqueue_style('dung-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css", array(), '5.0.2', 'all');
    wp_enqueue_style('dung-fontawnsome', "https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css", array(), '5.0.2', 'all');
}

add_action('wp_enqueue_scripts', 'dung_register_styles');

function dung_register_scripts()
{
    wp_enqueue_script('dung-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', 'all', true);
    wp_enqueue_script('dung-jqueryui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array(), '1.12.1', 'all', true);
    wp_enqueue_script('dung-moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js', array(), '2.18.1', 'all', true);
    wp_enqueue_script('dung-fullcalendar', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js', array(), '3.4.0', 'all', true);
    wp_enqueue_script('dung-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', 'all', true);
}

add_action('wp_enqueue_scripts', 'dung_register_scripts');


add_action('template_redirect', 'redirect_front_page');

function redirect_front_page()
{
    if (is_front_page()) {
        if (!is_user_logged_in()) {
            wp_redirect(site_url() . '/wp-login.php');
        }
    }
}

add_action('wp_login', 'login_success', 10, 2);
function login_success($user_login, $user)
{
    $custom_db = custom_database_connection();

    // Example query on the custom database
    $count = $custom_db->get_results("SELECT count(*) AS count_result FROM M03_User WHERE UserName = '$user_login'");
    // var_dump((int)$count[0]->count_result);
    // exit;
    if ((int)$count[0]->count_result > 0) {
        wp_redirect(site_url());
        die;
    } else {
        wp_redirect(site_url() . '/wp-login.php');
        die;
    }


}

function custom_database_connection()
{
    global $wpdb; // This is the default WordPress database connection

    // Define the credentials for the custom database
    $custom_db_host = 'localhost';
    $custom_db_name = 'meo_center';
    $custom_db_user = 'root';
    $custom_db_password = '123456';

    // Establish a connection to the custom database
    $custom_db = new wpdb($custom_db_user, $custom_db_password, $custom_db_name, $custom_db_host);

    return $custom_db;
}
?>