<?php
$siteName = strtolower(get_bloginfo('name'));
$code = $coupon['coupon_code'];
$coupon_code = SaCommon::coupon_prefix($code);
$coupon_rewards = $coupon['rewards_points_need'];
$rewards_coupon_id = $coupon['rewards_coupon_id'];
$coupon_description = $coupon['coupon_description'];
$coupon_id = $coupon['rewards_coupon_id'];
$check_user_email_exist = SaCoupon::check_email_exist_coupon($coupon_code, $user_email);
$nonce = wp_create_nonce($coupon['coupon_code']);
?>
<div class="rewards-inner nav-item <?php if ($user_reward >= $coupon_rewards || $check_user_email_exist) {
                                        echo "sal-active";
                                    } else {
                                        echo "sal-not-active";
                                    }
                                    ?> ">
    <a class="btn btn-primary"><img src="https://newskillsacademy.co.uk/assets/user/images/trophy-white.png" alt="trophy">X<?php echo $coupon['rewards_points_need'] ?></a>
    <p id="sal_reward_btn_text" class="sal_coupon_<?php echo $rewards_coupon_id ?>"> <?php echo $coupon_description ?> -> <?php if ($check_user_email_exist) { ?>
            <span>Coupon code: <strong> <?php echo $coupon_code ?></strong> </span>
        <?php } elseif ($user_reward >= $coupon['rewards_points_need']) { ?>
            <a class="btn btn-primary sal-claim-reward" data-nonce="<?php echo $nonce ?>" data-userid="<?php echo $user_id ?>" data-user_email="<?php echo $user_email ?>" data-couponid="<?php echo $coupon_id ?>" data-reward="<?php echo $coupon_rewards ?>">
                Click here to claim
            </a>

        <?php
                                                                                                                            } else {
                                                                                                                                if ($user_reward) {
                                                                                                                                    echo "You need " . ($coupon_rewards - $user_reward) . " more points to claim this coupon";
                                                                                                                                } else {
                                                                                                                                    echo "You need " . ($coupon_rewards) . " points to claim this coupon";
                                                                                                                                }
                                                                                                                            }
        ?>
    </p>


</div>