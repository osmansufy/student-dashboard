<?php
/*
Redirect to login page if user is not logged in
*/


if (!is_user_logged_in()) {
    wp_redirect(site_url('/login'));
    exit;
}


include plugin_dir_path(__FILE__) . './common-parts/dashboard-header.php';
include plugin_dir_path(__FILE__) . '../tabs/menu-items/index.php';

include plugin_dir_path(__FILE__) . '../tabs/tab-contents/index.php';

include plugin_dir_path(__FILE__) . './common-parts/dashboard-footer.php';
