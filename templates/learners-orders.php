<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    wp_head();
    add_filter('show_admin_bar', '__return_false');
    // woocommere subscription page display style


    ?>
</head>

<body>
    <div class="sidebar-menu-farhan">
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>

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
                    $order_controller = new SaOrders();
                    $orders = $order_controller->get_orders_for_user($user_id);

                    // $subscription_users = wcs_get_users_subscriptions($user_id);


                    // echo '<pre>';
                    // print_r($subscription_users);
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
                                        foreach ($orders as $order) {

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
                            <div class="col-md-12">
                                <h2>Subscription Status</h2>
                                <hr>
                                <div class="sal-subscription-wrap">
                                    <?php

                                    echo  WC_Subscriptions::get_my_subscriptions_template();;
                                    ?>
                                </div>
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