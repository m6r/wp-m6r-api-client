<?php
/**
* Plugin Name: M6R API
* Plugin URI: https://github.com/m6r/
* Description: Plugin fournissant des shortcodes pour afficher des résultats de l'API (m6r.fr/api). Shortcodes actuellement disponibles : [m6r-signatures]: nombre de signatures
* Version: 0.0.1
* Author: Guillaume Robin
* Author URI: http://guillaumerobin.github.io
* License: AGPL3
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function m6r_api_signatures( $atts ){
    $body = wp_remote_retrieve_body(wp_remote_get('https://www.m6r.fr/api/stats/show/signatures'));
    try {
        $data = json_decode($body);
    } catch (Error $e) {
        return '';
    }

    return $data->value;
}
add_shortcode('m6r-signatures', 'm6r_api_signatures');
