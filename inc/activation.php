<?php
/*
* File Name: activation.php
* Created on 10/31/2021
* (c)2021 Bill Banks
*/


function ourwebseo_activation() {
         wp_schedule_event(time(), 'daily', 'ourwebseo_cron_hook');
         $ourwebseo_opts = get_option('ourwebseo_opts');
         if (!$ourwebseo_opts) {
            $opts = [
                'keywords' => '',
                'description' => '',
                'title' => '',
                'only_on_homepage' => 0,
                'paid' => 0
                           ];
            add_option('ourwebseo_opts', $opts);
         }
}