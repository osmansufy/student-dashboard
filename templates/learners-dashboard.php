<?php
$head = "Dashboard";

include_once('common-parts/dashboard-head.php');



// woocommerce user  subscription page display ;
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



?>
<?php include_once('views/learners-dashboard.view.php'); ?>
<?php include_once('common-parts/dashboard-footer.php') ?>