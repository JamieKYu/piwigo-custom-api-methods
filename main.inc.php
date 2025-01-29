<?php

/*
Plugin Name: Custom API methods
Version: 1.0
Description: Custom ws endpoints for bulk getInfo
*/

if (!defined('PHPWG_ROOT_PATH')) {
    die('Hacking attempt!');
}

// Defer loading of API until Piwigo is fully initialized
add_event_handler('ws_add_methods', 'load_custom_api_methods');

function load_custom_api_methods() {
    global $service;

    if (!isset($service) || !is_object($service)) {
        error_log("ERROR: Web service is not available during plugin load.");
        return;
    }

    include_once(PHPWG_PLUGINS_PATH . 'piwigo-custom-api-methods/include/ws_functions.inc.php');
}
