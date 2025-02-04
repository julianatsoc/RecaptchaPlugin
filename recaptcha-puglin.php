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

function recaptcha_settings_page(){
    ?>
    <div class="wrap">
        <h1>Configurar reCAPTCHA</h1>
        <form method= "POST" action="options.php">
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
        </form>
    </div>
}