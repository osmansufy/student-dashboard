<?php

// woocommerce user  subscription page display ;
$user_subscription_page = get_option('woocommerce_myaccount_subscriptions_endpoint');
$user_subscription_page_url = get_permalink(get_option('woocommerce_myaccount_subscriptions_endpoint'));
$user_subscription_page_url = add_query_arg('subscription_key', $subscription_key, $user_subscription_page_url);

// print_r($user_id);
$userCourses = SaCourse::sa_get_user_courses_by_status($user_id);
$complete_courses = array();

$certificate_list = bp_course_get_user_certificates($user_id);

$last_login = get_user_meta($user_id, 'last_login', true);

// $diff_min = round(abs(time() - $last_login) / 60, 1);

$rewards = SaRewards::get_all_rewards_by_user_id($user_id);
$total_rewards = $rewards[0]->total_reward;
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

$args = array(
    'post_type' => 'message',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    // 'author' => $user_id,
);

$messages = get_posts($args);
wp_reset_query();

// get all recomended courses from option
$recomended_courses = get_option('recomended_courses');
// get all courses from database and show them in a select form element
$all_args = array(
    'post_type' => 'course',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'post__in' => $recomended_courses,
);
$get_recomended_courses = get_option('recomended_courses') ? SaHelper::convert_to_viewCourses($all_args) : array();
$ads_banner_id = get_option('sal_banner_image_id');
$ads_banner_url = wp_get_attachment_url($ads_banner_id);
$ads_banner_link = get_option('sal_banner_image_link');
$certificate_image = get_option('sal_certificate_image_url');
$certificate_image_link = get_option('sal_certificate_image_link');
?><div>

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
            <h2>Enrolled Courses</h2>
            <div class="circular-progress" data-percent="<?php
                                                            echo is_array($userCourses['enrolled_courses']) ? count($userCourses['enrolled_courses']) : 0; ?>">
                <div class="value-container">0%</div>
            </div>

        </div>
        <div class="allcourse">
            <h2>Course Completed</h2>
            <div class="circular-progress" data-percent="<?php
                                                            echo is_array($userCourses['complete_courses']) ? count($userCourses['complete_courses']) : 0; ?>">
                <div class="value-container">0%</div>
            </div>

        </div>
        <div class="allcourse">
            <h2>Course Certificate</h2>
            <div class="circular-progress" data-percent="<?php
                                                            echo is_array($certificate_list) ? count($certificate_list) : 0; ?>">
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
                    <span><?php echo $login_day_count ?> <sup><i class="fas fa-arrow-up"></i></sup></span>
                </div>
                <div class="number-text">
                    <p>Days Logged In</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-rounded dash-details">
                <div class="Reward-number">
                    <span><img src="<?php echo plugin_dir_url(dirname(__FILE__)) . '../assets/images/award.png' ?>" alt="award" /> <?php echo $total_rewards ?></span>
                </div>
                <div class="number-text">
                    <p>Reward Points</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-rounded dash-details">
                <div class="banner-number">
                    <a href="<?php echo $certificate_image_link ?>">
                        <img src="<?php echo $certificate_image ?>" alt="cpd">

                    </a>
                </div>
            </div>
        </div>
    </div> <!-- Award days banner section END -->
    <!-- banner offer -->

    <div class="banner-offer">
        <a href="<?php echo $ads_banner_link ?>">
            <img style="
    max-height: 280px;
    width: 100%;
    border-radius: 20px;
" src="<?php echo $ads_banner_url ?>" alt="Offer">
        </a>
    </div>
    <div class="other-course">
        <h3 class="Title">Other courses you might like...</h3>
        <div class="row">
            <?php
            foreach ($get_recomended_courses as $course) {
            ?>

                <div class="col-12 col-md-6 col-lg-3 col-sm-6">
                    <!-- col-start  -->
                </div><!-- col-end  -->
            <?php
            }
            ?>
        </div><!-- row--end  -->
    </div>
</div>