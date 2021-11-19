<?php

class SaLearnersDbDeActivator
{
    public static function deactivate(){
        $page1 =  get_page_by_title('My Courses');
        $pid1 = $page1->ID;
        if (is_user_logged_in()) {
            wp_delete_post($pid1,true);
        }
    }
}