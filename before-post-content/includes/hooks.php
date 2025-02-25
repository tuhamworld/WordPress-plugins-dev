<?php

if (!defined ('ABSPATH')) exit;


function modify_title( $title ) {
    return '🚀 ' . $title;
}

add_filter( 'the_title', 'modify_title' );
