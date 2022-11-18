<?php
$head = "Special Offers";
// get all offers post 



include_once('common-parts/dashboard-head.php');
$args = array(
    'post_type' => 'offer',
);

$special_offers = new WP_Query($args);
$special_offers = $special_offers->posts;
wp_reset_query();
// echo '<pre>';
// var_dump($special_offers);
// echo '</pre>';
include_once('views/special-offers.view.php');
include_once('common-parts/dashboard-footer.php');
