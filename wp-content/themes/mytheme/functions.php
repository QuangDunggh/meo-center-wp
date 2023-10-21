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

?>
