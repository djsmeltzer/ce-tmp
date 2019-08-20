<?php
/*
Plugin Name: Form To Email
Plugin URI: https://www.codecompost.com/fte
Description: Takes a form post and emails the data to an address
Author: Daniel Smeltzer
Author URI: https://www.codecompost.com
Version: 0.1.0
*/

if (!class_exists('FormToEmail')) {
    class FormToEmail {

        function __construct() {
            require('include/admin.php');
            require('include/api.php');
        }

    }
}

new FormToEmail();