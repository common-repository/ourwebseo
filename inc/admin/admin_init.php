<?php
/*
* File Name: admin_init.php
* Created on 11/6/2021
* (c)2021 Bill Banks
*/

function ourwebseo_admin_init() {
    add_action('admin_enqueue_scripts','ourwebseo_admin_enqueue_scripts');
    add_action('admin_post_ourwebseo_save_options','ourwebseo_save_options' );
}