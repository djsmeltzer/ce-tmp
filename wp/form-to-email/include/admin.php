<?php 

if (!class_exists('FTE_Adming')) {
    class FTE_Admin {

        private $options;

        function __construct() {
            add_action('admin_menu', [$this, 'registerSettingsPage']);
            add_action('admin_init', [$this, 'registerSettings']);
        }

        function registerSettingsPage() {
            add_options_page('Form to Email Settings',
                             'Form to Email',
                             'manage_options',
                             'fte_settings_page',
                             [$this, 'optionsPage']
            );
        }

        function registerSettings() {
            register_setting('fte_settings_group',
                             'fte_settings'
            );
            add_settings_section(
                'fte_settings_section_email',
                'Form to Email Settings',
                [$this, 'fteSectionInfo'],
                'fte_settings_page'
            );
            add_settings_field(
                'fte_email_address',
                'Email Address',
                [$this, 'fteEmailCallback'],
                'fte_settings_page',
                'fte_settings_section_email'
            );

        }

        function fteSectionInfo() {
            print 'Enter the email address to send form submissions to.';
            print '<pre>';
            var_dump($this->options);
            print '</pre>';
        }

        function fteEmailCallback() {
            printf('<input type="text" id="fte_email" name="fte_settings[fte_email_address]" value="%s" />',
                isset($this->options['fte_email_address']) ? esc_attr($this->options['fte_email_address']) : '');
            
        }

        function optionsPage() {
            $this->options = get_option('fte_settings')
            ?>
            <div class="wrap">
            <form method="post" action="options.php">
            <?php 
                settings_fields('fte_settings_group');
                do_settings_sections('fte_settings_page');
                submit_button(); ?>
            </form>
            </div>
            <?php
        }
    }
}

if (is_admin()) {
    new FTE_Admin();
}