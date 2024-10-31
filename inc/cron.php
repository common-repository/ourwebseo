<?php
/*
* File Name: cron.php
* Created on 11/1/2021
* (c)2021 Bill Banks
*/

include (ourwebseo_SEO_URL.'/our_sitemap.php');

function ourwebseo_cron() {
    @unlink(ABSPATH.'sitemap.xml');
        $sitemap = new ourwebseo_sitemap();
        $sitemap->buildSitemap();

}