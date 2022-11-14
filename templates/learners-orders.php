<?php
$head = "Dashboard";

include_once('common-parts/dashboard-head.php');

// woocommere subscription page display style

// get woocommerce orders items for a specific all orders for a specific user
$user_id = get_current_user_id();
$order_controller = new SaOrders();
$orders = $order_controller->get_orders_for_user($user_id);

// $subscription_users = wcs_get_users_subscriptions($user_id);


// echo '<pre>';
// print_r($subscription_users);
// echo '</pre>';

?>


<?php include_once('views/learners-orders.view.php'); ?>
<?php include_once('common-parts/dashboard-footer.php') ?>