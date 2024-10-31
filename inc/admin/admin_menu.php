<?php
/*
* File Name: admin_menu.php
* Created on 11/4/2021
* (c)2021 Bill Banks
*/

function ourwebseo_admin_menu() {
         add_menu_page(
             'Our SEO',
             'Our SEO',
             'edit_theme_options',
             'ourwebseo_seo_opts',
             'ourwebseo_seo_opts_page'
         );
}