<?php

if (!defined('ABSPATH')) exit;


$site_key = get_option('recaptcha_site_key');
if ($site_key):
    ?>
    <div class="g-recaptcha" data-sitekey="<?php echo esc_attr($site_key); ?>"></div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php
endif;