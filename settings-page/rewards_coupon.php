<?php
echo '<pre>';
print_r(SaCoupon::sal_create_coupon_from_options_values());
echo '</pre>';
?>
<h3>Rewards Coupon</h3>
<form method="post" action="<?php echo admin_url('admin-post.php') ?>">
    <input type="hidden" name="action" value="sal_rewards_coupon">
    <?php
    wp_nonce_field("sal_rewards_coupon_form");
    $common = new SaCommon();
    $all_rewards_coupon = $common->all_rewards_coupon;
    ?>
    <div style="display: flex;
gap: 20px;
    justify-content: space-between;
    flex-direction: column;
    align-items: baseline;">
        <?php
        foreach ($all_rewards_coupon as $single_coupon) {
            $title = $single_coupon['title'];
            $description = $single_coupon['description'];
            $coupon_fields = SaCommon::option_page_coupon_fields($single_coupon['id']);
            include plugin_dir_path(__FILE__) . 'common/single_reward_coupon.php';
        }


        ?>
    </div>
    <?php
    submit_button('Create Coupon');
    ?>
</form>