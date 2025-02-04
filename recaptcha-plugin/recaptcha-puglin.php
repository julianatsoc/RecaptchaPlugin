<?php 

/**
 * Puglin Name: reCAPTCHA para formulários
 * Description: Adiciona o reCAPTCHA para todos os formulários HTML presentes no site
 * Version: 1.0.0
 * Author: julianatsoc
 * Author URI: https://www.linkedin.com/in/julianatsoc/
 */

if (!defined('ABSPATH')){
    exit;
}
class RecaptchaPlugin {
    public function __construct() {
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_init', [$this, 'register_settings']);
        add_filter('the_content', [$this, 'add_recaptcha_to_forms']);
    }

    public function add_admin_menu() {
        add_options_page(
            'Configurações do reCAPTCHA',
            'reCAPTCHA',
            'manage_options',
            'recaptcha-settings',
            [$this, 'settings_page']
        );
    }

    public function register_settings() {
        register_setting('recaptcha_settings_group', 'recaptcha_site_key');
        register_setting('recaptcha_settings_group', 'recaptcha_secret_key');
    }

    public function settings_page() {
        include plugin_dir_path(__FILE__) . 'includes/admin-settings.php';
    }

    public function add_recaptcha_to_forms($content) {
        if (is_admin()) return $content;

        $site_key = get_option('recaptcha_site_key');
        if (!$site_key) return $content;

        ob_start();
        include plugin_dir_path(__FILE__) . 'includes/recaptcha-handler.php';
        $recaptcha_html = ob_get_clean();

        return str_replace('</form>', $recaptcha_html . '</form>', $content);
    }
}

new RecaptchaPlugin();