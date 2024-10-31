<?php
/*
* File Name: deactivation.php
* Created on 11/1/2021
* (c)2021 Bill Banks
*/

function ourwebseo_deactivation() {
    wp_clear_scheduled_hook('ourwebseo_cron_hook');

}
