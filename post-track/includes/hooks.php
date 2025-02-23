<?php

if (!defined ('ABSPATH')) exit;

add_action('save_post', 'log_when_saved');
function log_when_saved ( $post_id ){

    // Avoid auto-saves and revisions
    // if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
    //     return;
    // }

    if ( ! ( wp_is_post_revision( $post_id ) ) || wp_is_post_autosave( $post_id ) ) {
        return;
    }


    $post_log = plugin_dir_path(__FILE__) . '/post_log.txt';
    $post_title = get_the_title( $post_id );
    $save_time = current_time('mysql');
    $message = "$post_title was saved! (Date: $save_time) \n";

    
if ( file_exists( $post_log ) ){
    $file = fopen($post_log, 'a');
    fwrite($file, $message."/n");
} else {
    $file = fopen ( $post_log, 'w' );
    fwrite ( $file, $message. "\n" );
}


fclose($file);

}

