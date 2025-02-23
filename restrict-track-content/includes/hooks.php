<?php

add_action('template_redirect', 'members_only');

function members_only(){

    if ( is_page('super-demo') && ! is_user_logged_in() ){
        do_action('user_redirected', date("F, j, Y, g:i a"));
        wp_redirect( home_url() );
        die();

    }

}

add_action('user_redirected', 'log_when_accessed');

function log_when_accessed ( $date ){

    $access_log = plugin_dir_path(__FILE__) . '/access_log.txt';
    $message = "Someone just tried to access our super demo page on " . $date;

    
if ( file_exists( $access_log ) ){
    $file = fopen($access_log, 'a');
    fwrite($file, $message."/n");
} else {
    $file = fopen ( $access_log, 'w' );
    fwrite ( $file, $message. "\n" );
}


fclose($file);


}

