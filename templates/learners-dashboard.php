<?php
$head = "Dashboard";

include_once 'common-parts/dashboard-head.php';

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
// echo '<pre>';
// var_dump($ads_banner_url);
// echo '</pre>';
?>
<?php include_once 'views/learners-dashboard.view.php'; ?>
<?php include_once 'common-parts/dashboard-footer.php' ?>