<?php
/*
* File Name: saveoptions.php
* Created on 11/8/2021
* (c)2021 Bill Banks
*/

function ourwebseo_save_options() {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die ( __( ' you are not allowed to be on this page'));
    }
    check_admin_referer ( 'ourwebseo_options_verify');
    $ourwebseo_opts = get_option('ourwebseo_opts');
    $ourwebseo_opts['keywords'] = wp_kses($_POST['ourwebseo_keywords']);
    $ourwebseo_opts['description'] = wp_kses($_POST['ourwebseo_description']);
    $ourwebseo_opts['only_on_homepage'] = wp_kses( $_POST['ourwebseo_frontpage']);

    update_option('ourwebseo_opts', $ourwebseo_opts);
    wp_redirect(admin_url('admin.php?page=ourwebseo_seo_opts&status=1'));

}