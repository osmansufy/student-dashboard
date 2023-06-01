<?php
$rewards_need = $coupon->rewards_points_need;
$coupon_code = $coupon->rewards_coupon_code;
$coupon_description = $coupon->rewards_coupon_description;
$coupon_discount_amount = $coupon->coupon_discount_amount;

$check_user_email_exist = SaCoupon::check_email_exist_coupon($coupon_code, $user_email);
$nonce = wp_create_nonce($coupon_code);
?>

<div class="rewards-inner nav-item
<?php if (
    $user_reward >= $rewards_need
    || $check_user_email_exist
) {
    echo "sal-active";
} else {
    echo "sal-not-active";
}
?> ">
    <a class="btn  btn-primary">
        <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . '../../assets/images/trophy-white.png' ?>" alt="trophy">X<?php echo $rewards_need ?></a>

    <p id="sal_reward_btn_text" class="sal_coupon_<?php echo $coupon_code ?>"> <?php echo $coupon_description ?> ->
        <?php if ($check_user_email_exist) { ?>
            <span>Coupon code: <strong style="color: #0099ff"> <?php echo $coupon_code ?> </strong> --Unclaimed </span>
        <?php } elseif ($user_reward >= $rewards_need) { ?>
            <a class="btn btn-primary sal-claim-reward" data-nonce="<?php echo $nonce ?>" data-userid="<?php echo $user_id ?>" data-user_email="<?php echo $user_email ?>" data-couponid="<?php echo $coupon_code ?>" data-reward="<?php echo $rewards_need ?>">
                Click here to claim
            </a>

        <?php
        } else {
            if ($user_reward) {
                echo "You need " . ($rewards_need - $user_reward) . " more points to claim this coupon";
            } else {
                echo "You need " . ($rewards_need) . " points to claim this coupon";
            }
        }
        ?>

    </p>
</div>