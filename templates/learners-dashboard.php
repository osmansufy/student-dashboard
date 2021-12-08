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
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>

        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>Dashboard</h1>
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

                        <?php


                        // woocommerce user  subscription page display
                        $user_subscription_page = get_option('woocommerce_myaccount_subscriptions_endpoint');
                        $user_subscription_page_url = get_permalink(get_option('woocommerce_myaccount_subscriptions_endpoint'));
                        $user_subscription_page_url = add_query_arg('subscription_key', $subscription_key, $user_subscription_page_url);




                        // print_r($user_id);
                        $userCourses = SaCourse::sa_get_user_courses_by_status($user_id);
                        $complete_courses = array();

                        $certificate_list = bp_course_get_user_certificates($user_id);

                        $recomended_courses = SaCourse::get_recommended_courses($user_id);

                        $last_login = get_user_meta($user_id, 'last_login', true);

                        $diff_min = round(abs(time() - $last_login) / 60, 1);
                        // if ($the_login_date < 24) {
                        //     $the_login_date = $the_login_date . ' ago';
                        // } else {
                        //     $the_login_date = date('d M Y', $last_login);
                        // }
                        // get date difference between last login and current date
                        $current_date = date('d-m-Y H:i:s');
                        $last_login_date = date('d-m-Y H:i:s', $last_login);
                        $date_diff = date_diff(date_create($current_date), date_create($last_login_date));

                        // if date difference is greater than 30 days then show the message
                        // if ($date_diff->days > 1) {
                        //     $show_message = true;
                        // } else {
                        //     $show_message = false;
                        // }


                        $login_day_count = get_user_meta($user_id, 'login_day_count', true);

                        //  check product is in cart or not
                        function is_product_in_cart($product_id)
                        {
                            $product_cart_id = WC()->cart->generate_cart_id($product_id);
                            if (WC()->cart->find_product_in_cart($product_cart_id)) {
                                return true;
                            }
                            return false;
                        }

                        $testCop = new SaGravityFormCoupon();
                        $test = $testCop->create_coupon_gf("test", "testforcertificate", "10", "percentage", "20");
                        var_dump($test);

                        ?>
                    </div>


                    <div class="circle-box-percentage">
                        <!-- <div class="allcourse">
                            <h2>All course</h2>
                            <div class="circular-progress" data-percent="<?php
                                                                            echo bp_course_get_total_course_count() ?>">
                                >
                                <div class="value-container">0%</div>
                            </div>

                        </div> -->

                        <div class="allcourse">
                            <h2>Enroll Courses</h2>
                            <div class="circular-progress" data-percent="<?php
                                                                            echo  is_array($userCourses['enrolled_courses']) ? count($userCourses['enrolled_courses']) : 0; ?>">
                                >
                                <div class="value-container">0%</div>
                            </div>

                        </div>
                        <div class="allcourse">
                            <h2>Course Completed</h2>
                            <div class="circular-progress" data-percent="<?php
                                                                            echo  is_array($userCourses['complete_courses']) ? count($userCourses['complete_courses']) : 0; ?>">
                                >
                                <div class="value-container">0%</div>
                            </div>

                        </div>
                        <div class="allcourse">
                            <h2>Course Certificate</h2>
                            <div class="circular-progress" data-percent="<?php
                                                                            echo  is_array($certificate_list) ? count($certificate_list) : 0; ?>">
                                >
                                <div class="value-container">0%</div>
                            </div>
                            <!-- <div class="progressdiv" data-percent="10">
                                <svg class="progress_bar" height="250" width="250" id="svg">
                                    <circle id="progressbg" cx="125" cy="125" r="85" stroke-width="29" fill="transparent" stroke-dasharray="753.9822368615503" />
                                    <circle id="progress" class="bar" cx="125" cy="125" r="85" stroke-width="30" fill="transparent" stroke-dasharray="553.9822368615503" />
                                </svg>
                            </div> -->
                        </div>
                    </div><!-- percentage circle end-->
                    <!-- Award days banner section -->
                    <div class="row award-section">
                        <div class="col-md-4 ">
                            <div class="white-rounded dash-details">
                                <div class="count-number">
                                    <span>2 <sup><i class="fas fa-arrow-up"></i></sup></span>
                                </div>
                                <div class="number-text">
                                    <p>Days Logged In</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="white-rounded dash-details">
                                <div class="Reward-number">
                                    <span><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award" /> 2</span>
                                </div>
                                <div class="number-text">
                                    <p>Reward Points</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="white-rounded dash-banner">
                                <div class="banner-number">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2019/10/cpd-member.png" alt="cpd">
                                    <p>Get access to exclusive student discounts</p>
                                    <a href="
                                    <?php echo get_site_url() . '/student-id-card' ?>" class="btn btn-outline-light">GET YOUR STUDENT CARD NOW</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Award days banner section END -->
                    <!-- banner offer -->
                    <div class="banner-offer">
                        <a href="#">
                            <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/study-group-banner-1-1.png" alt="Offer"></a>
                    </div>
                    <div class="other-course">
                        <h3 class="Title">Other courses you might like...</h3>
                        <div class="row">
                            <?php
                            foreach ($recomended_courses as $course) {
                            ?>

                                <div class="col-12 col-md-6 col-lg-3 col-sm-6">
                                    <!-- col-start  -->
                                    <?php include('template-parts/course-card.php'); ?>
                                </div><!-- col-end  -->
                            <?php
                            }
                            ?>



                        </div><!-- row--end  -->
                    </div>
                    <div class="leaderBoard">
                        <!--leader-Board -->
                        <!-- <div class="row" > -->
                        <div class="col-12 col-md-5  white-rounded notification useFlex">
                            <div class="leaderboard">
                                <h3>Student leaderboard</h3>
                                <div class="bs-dropdown" style="float: right;">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Dropdown <span class="caret"></span> </a>
                                            <ul class="dropdown-menu" id="menu3" aria-labelledby="drop6">
                                                <li><a href="#">This Month</a></li>
                                                <li><a href="#">Last Month</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            1</th>
                                        <th>Thilliar V
                                            <!---->
                                        </th>
                                        <th>5224 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            2</th>
                                        <th>Paul Martyn S
                                            <!---->
                                        </th>
                                        <th>783 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            3</th>
                                        <th>amelia w
                                            <!---->
                                        </th>
                                        <th>644 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            4</th>
                                        <th>Leanne A
                                            <!---->
                                        </th>
                                        <th>486 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            5</th>
                                        <th>Zoe B
                                            <!---->
                                        </th>
                                        <th>417 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            6</th>
                                        <th>Aneta K
                                            <!---->
                                        </th>
                                        <th>393 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            7</th>
                                        <th>Janine O
                                            <!---->
                                        </th>
                                        <th>382 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            8</th>
                                        <th>Angela M
                                            <!---->
                                        </th>
                                        <th>375 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            9</th>
                                        <th>Parveen B
                                            <!---->
                                        </th>
                                        <th>363 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                            10</th>
                                        <th>Tina C
                                            <!---->
                                        </th>
                                        <th>360 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- col-notification-end  -->
                        <div class="col-12 col-md-5  white-rounded notification useFlex">
                            <div class="leaderboard">
                                <h3>Messages</h3>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Get Access to All of Our Courses</a></td>
                                        <td>16/08/2021 @ 14:31</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Module time limits</a></td>
                                        <td>16/06/2021 @ 11:10</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Welcome to our new website</a></td>
                                        <td>01/06/2021 @ 07:19</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- col-notification-end  -->
                        <!-- </div>row--end  -->
                    </div>
                    <!--leader-Board  end-->

                </div><!-- container-fluid-end  -->
            </section>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>