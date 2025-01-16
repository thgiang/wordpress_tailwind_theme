<?php

function theme_enqueue_assets() {
    if (defined('WP_ENV') && WP_ENV === 'development') {
        // Load từ Vite Dev Server
        wp_enqueue_script('vite-client', 'http://localhost:5173/@vite/client', [], null, true);
        wp_enqueue_script('theme-main-js', 'http://localhost:5173/assets/js/main.js', [], null, true);
        // Thêm thuộc tính type="module"
        add_filter('script_loader_tag', function($tag, $handle) {
            if (in_array($handle, ['vite-client', 'theme-script'])) {
                return str_replace('script', 'script type="module"', $tag);
            }
            return $tag;
        }, 10, 2);

    } else {
        // Load từ file đã build
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/assets/style.css');
        wp_enqueue_script('theme-main-js', get_template_directory_uri() . '/dist/assets/main.js', [], null, true);
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');
