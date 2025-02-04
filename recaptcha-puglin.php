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

function recaptcha_add_admin_menu(){
    add_options_page(
        'Configurações do reCAPTCHA',
        'reCAPTCHA',
        'manage_options',
        'recaptcha-settings',
        'recaptcha_settings_page'
    );
}
add_action ('admin_menu', 'recatpcha_add_admin_menu');

function recaptcha_register_settings(){
    register_settings('recaptcha_settings_group', 'recaptcha_site_key');
    register_settings('recaptcha_settings_group', 'recaptcha_secret_key');
}
add_action('admin_init', 'recaptcha_register_settings');

function recaptcha_settings_page() {
    ?>
    <div class="wrap">
        <h1>Configurações do reCAPTCHA</h1>
        <form method="post" action="options.php">
            <?php settings_fields('recaptcha_settings_group'); ?>
            <?php do_settings_sections('recaptcha_settings_group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Chave Pública (Site Key)</th>
                    <td><input type="text" name="recaptcha_site_key" value="<?php echo esc_attr(get_option('recaptcha_site_key')); ?>" size="50" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Chave Secreta (Secret Key)</th>
                    <td><input type="text" name="recaptcha_secret_key" value="<?php echo esc_attr(get_option('recaptcha_secret_key')); ?>" size="50" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
function recaptcha_add_to_forms($content) {
    if (is_admin()) return $content;
    
    $site_key = get_option('recaptcha_site_key');
    if (!$site_key) return $content;
    
    $recaptcha_html = '<div class="g-recaptcha" data-sitekey="' . esc_attr($site_key) . '"></div>';
    $recaptcha_script = '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
    
    return str_replace('</form>', $recaptcha_html . '</form>' . $recaptcha_script, $content);
}
add_filter('the_content', 'recaptcha_add_to_forms');