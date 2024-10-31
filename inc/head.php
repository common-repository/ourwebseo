<?php
/*
* File Name: head.php
* Created on 11/11/2021
* (c)2021 Bill Banks
*/

function ourwebseo_wp_head() {
    $ourwebseo_opts = get_option('ourwebseo_opts');
    $ourwebseo_keywords = wp_kses($ourwebseo_opts['keywords']);
    $ourwebseo_description = wp_kses( $ourwebseo_opts['description']);
    $ourwebseo_frontpage = wp_kses( $ourwebseo_opts['only_on_homepage']);
    $nl = "\r\n";

    if ((is_home() || !$ourwebseo_frontpage)) {
        echo '<!-- Our SEO by Bill Banks from ourweb.net -->'.$nl;
        echo '<meta name="keywords"  content="' . $ourwebseo_keywords . '" />'.$nl;
        echo '<meta name="description"  content="' . $ourwebseo_description . '" />' . $nl;
    }

}