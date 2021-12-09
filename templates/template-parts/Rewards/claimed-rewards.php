<?php
$user_id = get_current_user_id();
$user_info = get_userdata($user_id);
$user_email =      $user_info->user_email;
$all_coupons = new SaCommon();
$coupons = $all_coupons->all_coupons_except_dependency_coupons();
$all_coupons_with_dependency_80 = array_values($all_coupons->all_coupons_with_dependency_80());
$all_coupons_with_dependency_90 = array_values($all_coupons->all_coupons_with_dependency_90());
$user_reward =  get_user_meta($user_id, 'user_remaining_rewards', true);
$percentage_coupons_80 = $all_coupons->percentage_coupons_80;
$percentage_coupons_90 = $all_coupons->percentage_coupons_90;
foreach ($coupons as $coupon) {

    include(__DIR__ . '/single-rewards.php');
}
$check_user = SaCoupon::check_email_exist_coupon($percentage_coupons_80, $user_email);
if ($check_user) {
    $coupon = $all_coupons_with_dependency_80[0];
    // var_dump($coupon);
    include(__DIR__ . '/single-rewards.php');

    foreach ($all_coupons_with_dependency_80 as $key => $coupon_with_dependency_80) {
        $check_user_email = SaCoupon::check_email_exist_coupon($coupon_with_dependency_80['coupon_code'], $user_email);
        if ($all_coupons_with_dependency_80[$key + 1]) {


            if ($check_user_email) {
                $coupon = $all_coupons_with_dependency_80[$key + 1];
                include(__DIR__ . '/single-rewards.php');
            }
        }
    }
}
// echo "<pre>";
// var_dump($all_coupons_with_dependency_90);
// echo "</pre>";
$check_user_90 = SaCoupon::check_email_exist_coupon($percentage_coupons_90, $user_email);
if ($check_user_90) {
    $coupon = $all_coupons_with_dependency_90[0];
    // var_dump($coupon);
    include(__DIR__ . '/single-rewards.php');

    foreach ($all_coupons_with_dependency_90 as $key => $coupon_with_dependency_90) {
        $check_user_email = SaCoupon::check_email_exist_coupon($coupon_with_dependency_90['coupon_code'], $user_email);
        if ($all_coupons_with_dependency_90[$key + 1]) {

            if ($check_user_email) {
                $coupon = $all_coupons_with_dependency_90[$key + 1];
                include(__DIR__ . '/single-rewards.php');
            }
        }
    }
}
?>
<?php
$gf = new SaGravityFormCoupon();
$user_gf_coupons = get_user_meta($user_id, 'gf_user_coupon', true);
$nonce_certificate = wp_create_nonce("sa_gf_coupon_nonce");
?>
<div class="rewards-inner <?php if ($user_reward >= 1 || $user_gf_coupons) {
                                echo "sal-active";
                            } else {
                                echo "sal-not-active";
                            }
                            ?>">
    <a class="btn btn-primary"><img src="https://newskillsacademy.co.uk/assets/user/images/trophy-white.png" alt="trophy">X12</a>
    <p class="sal_gf_coupon_code"> Free Certificate -> <?php if ($user_gf_coupons) { ?>
            <span>Coupon code: <strong> <?php echo $user_gf_coupons ?></strong> </span>
        <?php } elseif ($user_reward >= 1) { ?>
            <a class="btn btn-primary" id="sal_gf_coupon" data-nonce="<?php echo $nonce_certificate ?>" data-userid="<?php echo $user_id ?>" data-reward="12">
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
</div>