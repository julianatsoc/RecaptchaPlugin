<?php

if (!defined('ABSPATH')) exit;
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