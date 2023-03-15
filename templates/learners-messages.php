<?php
$head = "Your Messages";

include_once 'common-parts/dashboard-head.php';

// get all messages type post

$args = array(
    'post_type' => 'message',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
);

$messages = get_posts($args);
wp_reset_query();
include_once 'views/learners-messages.view.php';
include_once 'common-parts/dashboard-footer.php';
