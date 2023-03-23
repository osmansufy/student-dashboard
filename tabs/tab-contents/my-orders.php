<?php
$order_controller = new SaOrders();
$orders = $order_controller->get_orders_for_user($user_id);

include_once('views/orders-view.php');