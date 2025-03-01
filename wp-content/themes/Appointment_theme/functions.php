<?php
function appointment_theme_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'appointment_theme_scripts');

function handle_appointment_submission() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'appointments';

        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $date = sanitize_text_field($_POST['date']);

        echo "<pre>";
        // var_dump($name, $email, $date);
        echo "</pre>";

        $result = $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'email' => $email,
                'date' => $date
            ),
            array('%s', '%s', '%s')
        );

        if ($result) {
            echo '<div class="alert alert-success text-center mt-3">Janji temu berhasil dikirim!</div>';
        } else {
            echo '<div class="alert alert-danger text-center mt-3">Gagal menyimpan data.</div>';
            echo "<pre>";
            print_r($wpdb->last_error);
            echo "</pre>";
        }
    }
}
add_action('wp', 'handle_appointment_submission');

// Register menu navigasi
function register_my_menu() {
    register_nav_menu('primary', __('Primary Menu'));
}
add_action('after_setup_theme', 'register_my_menu');

?>
