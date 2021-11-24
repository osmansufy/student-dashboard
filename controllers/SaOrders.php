<?php
class SaOrders
{
    function __construct()
    {
    }
    // get all woocommerce orders for a specific user 
    function get_orders_for_user($user_id)
    {
        global $wpdb;
        $query = "SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_author = $user_id";
        $orders = $wpdb->get_results($query);
        return $orders;
    }
}
