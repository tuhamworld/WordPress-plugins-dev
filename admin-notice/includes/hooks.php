<?php

if (!defined('ABSPATH')) exit;


function rt_show_admin_notice_success() {
    $screen = get_current_screen();
    if ($screen && $screen-> base === 'plugins') {
        $message = __( 'This a admin notice - Hook Test.', 'sample-text-domain' );
        ?>
        <div class="notice notice-success is-dismissible">
            <p>
                <?php echo esc_html($message);?>
            </p>
        </div>
        <?php
        }
    }

add_action('admin_notices', 'rt_show_admin_notice_success');


function modify_title( $title ) {
    return '🚀 ' . $title;
}

add_filter( 'the_title', 'modify_title' );