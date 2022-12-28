<?php
$user_id = get_current_user_id();
$user_info = get_userdata($user_id);
$user_email =      $user_info->user_email;
$user_reward =  get_user_meta($user_id, 'user_remaining_rewards', true);
$coupon_arr = SaCoupon::convert_couponInfo_from_options_values();

foreach ($coupon_arr as $coupon) {
    include(__DIR__ . '/single-rewards.php');
}
