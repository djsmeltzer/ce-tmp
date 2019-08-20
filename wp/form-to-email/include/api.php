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
            
        }
    }
}

new FTE_API();