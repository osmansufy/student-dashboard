<?php
$user_id = get_current_user_id();
$user_info = get_userdata($user_id);
$user_email =      $user_info->user_email;
$user_reward =  get_user_meta($user_id, 'user_remaining_rewards', true);
$coupon_arr = SaCoupon::convert_couponInfo_from_options_values();

if (is_array($coupon_arr)) {
    foreach ($coupon_arr as $coupon) {
        if (!isset($coupon->rewards_coupon_code)) {
            include(__DIR__ . '/single-rewards.php');
        } else {
            echo '<div class="no-rewards"> 
            Rewards are not set from admin.
            </div>';
        }
    }
} else {
    echo '<div class="no-rewards"> 
    Rewards are not available at this time. Please check back later.
    </div>';
}
