<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    wp_head();
    add_filter('show_admin_bar', '__return_false');
    ?>
</head>

<body>
    <div class="sidebar-menu-farhan">
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>

        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>My Order</h1>
                </div>
            </section>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="subscribeUpsell">
                        <a href="#"><i class="fad fa-medal"></i>
                            Get access to all 700+ courses (and MORE) for only £12 per
                            month. Find out more.
                        </a>
                    </div>

                    <?php
                    // get woocommerce orders items for a specific all orders for a specific user
                    $user_id = get_current_user_id();
                    $orders = wc_get_orders(
                        array(
                            'limit' => -1,
                            'customer_id' => $user_id,
                            'status' => array('completed', 'processing', 'on-hold'),
                        )
                    );
                    $orders_data = array();
                    class NewOrder
                    {
                        public $order_id;
                        public $order_date;
                        public $order_status;
                        public $order_total;
                        public $order_items = array();
                        public $order_item_count;
                        public $order_item_total;
                        public $order_payment_method;
                        // public $order_item_total_price;
                    }
                    class NewOrderItem
                    {
                        public $order_item_id;
                        public $order_item_name;
                        public $order_item_quantity;
                        public $order_item_price;
                        public $order_item_total_price;
                    }
                    foreach ($orders as $order) {
                        $current_order = new NewOrder();
                        $current_order->order_id = $order->get_id();
                        $current_order->order_date  = date('d-m-Y', strtotime($order_date));

                        $current_order->order_total = $order->get_total();
                        $current_order->order_status = $order->get_status();
                        $current_order->order_payment_method = $order->get_payment_method_title();
                        $order_itemsObj = $order->get_items();
                        $current_order->order_item_count = count($current_order->order_items);
                        if (!is_wp_error($order_itemsObj)) {
                            $current_order->order_item_total = 0;
                            foreach ($order_itemsObj as $order_item) {
                                $current_order_item = new NewOrderItem();
                                $current_order_item->order_item_id = $order_item->get_id();
                                $current_order_item->order_item_name = $order_item->get_name();
                                $current_order_item->order_item_quantity = $order_item->get_quantity();
                                $current_order_item->order_item_price = $order_item->get_total() / $order_item->get_quantity();
                                $current_order_item->order_item_total_price = $order_item->get_total();
                            }
                        }
                        $orders_data[] = $current_order;
                    }




                    // echo '<pre>';
                    // print_r($orders_data);
                    // echo '</pre>';

                    ?>
                    <div class="my-certificate">

                        <div class="row">
                            <div class="col-12 col-md-12 certificate-list ">
                                <table class="table" id="desktopCerts">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Your Order</th>
                                            <th scope="col">Date / Time</th>
                                            <th scope="col">Total Cost</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($orders_data as $order) {

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $order->order_id ?></th>
                                                <th>
                                                    <ul>
                                                        <?php
                                                        foreach ($order->order_items as $order_item) {
                                                        ?>
                                                            <li> <?php echo $order_item->order_item_name ?> (£<?php echo $order_item->order_item_total_price ?>) </li>
                                                            <hr />
                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </th>
                                                <th><?php echo $order->order_date ?></th>
                                                <th>£<?php echo $order->order_total ?></th>
                                                <th><?php echo strtoupper($order->order_status) ?></th>
                                                <th><?php echo $order->order_payment_method ?></th>
                                                <th><a class="btn btn-primary" href="<?php echo get_site_url() . '/my-account/view-order/' . $order->order_id ?>" target="_blank"><i class="far fa-file-pdf" style="margin-right:7px;"></i> View PDF</a></th>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div><!-- row--end  -->
                    </div>
                    <!--certificate End-->


                </div><!-- container-fluid-end  -->
            </section>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>