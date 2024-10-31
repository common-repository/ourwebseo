<?php
/*
* File Name: admin_enqueue_scripts.php
* Created on 11/6/2021
* (c)2021 Bill Banks
*/

function ourwebseo_admin_enqueue_scripts() {
    if (!isset($_GET['page']) || $_GET['page'] != 'ourwebseo_seo_opts') {
        return;
    }

    wp_register_style('ourwebseo_bootstrap', plugins_url('/assets/css/bootstrap.css', ourwebseo_SEO_URL));
    wp_enqueue_script('ourwebseo_bootstrap');
}