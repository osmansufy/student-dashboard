<?php
class SaOrders
{
    function __construct()
    {
    }
    // get all woocommerce orders for a specific user 

    function get_orders_for_user($user_id)
    {

        $orders = wc_get_orders(
            array(
                'limit' => -1,
                'customer_id' => $user_id,
                'status' => array('completed', 'processing', 'on-hold'),
            )
        );
        $orders_data = array();
        foreach ($orders as $order) {
            $current_order = new stdClass();
            $current_order->order_id = $order->get_id();
            $current_order->order_date  = date('d-m-Y', strtotime($order->order_date));

            $current_order->order_total = $order->get_total();
            $current_order->order_status = $order->get_status();
            $current_order->order_payment_method = $order->get_payment_method_title();
            $order_itemsObj = $order->get_items();
            $current_order->order_item_count = count($current_order->order_items);
            if (!is_wp_error($order_itemsObj)) {
                $current_order->order_item_total = 0;
                foreach ($order_itemsObj as $order_item) {
                    $current_order_item = new stdClass();
                    $current_order_item->order_item_id = $order_item->get_id();
                    $current_order_item->order_item_name = $order_item->get_name();
                    $current_order_item->order_item_quantity = $order_item->get_quantity();
                    $current_order_item->order_item_total_price = $order_item->get_total();
                    $current_order->order_items[] = $current_order_item;
                }
            }
            $orders_data[] = $current_order;
        }
        return $orders_data;
    }
}
