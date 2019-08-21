<?php

if (!class_exists('FTE_API')) {

    class FTE_API {
        function __construct() {
            add_action('rest_api_init', [$this, 'addEndpoints']);
        }

        public function addEndpoints() {
            register_rest_route('ce/v1',
                                '/email-form',
                                [
                                    'methods'=>'POST',
                                    'callback'=>[$this, 'emailForm']
                                ]);
        }

        public function emailForm(WP_REST_Request $request) {
            $options = get_option('fte_settings');
            $to = $options['fte_email_address'];
            $params = $request->get_params();
            $message = "A form has been submitted. Here is the data:" . PHP_EOL;
            foreach ($params as $key => $value) {
                $message .= "${key}: ${value}" . PHP_EOL;
            }

            $res = wp_mail($to, 'Test from Wordpress', $message);
            return [$params,$options,$to,$res];
        }
    }
}

new FTE_API();