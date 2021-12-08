<?php
class SaCoupon
{
    // insert user email in coupon code
    public static function sa_learners_claim_reward()
    {
        $coupon_id = $_POST['coupon_id'];
        $reward_used = $_POST['reward_used'];
        $user_id = $_POST['userId'];
        $email = $_POST['user_email'];
        $nonce = $_POST['nonce'];

        $common = new SaCommon();
        $get_coupon = $common->get_single_coupon($coupon_id);
        $coupon_code = $get_coupon['coupon_code'];
        try {
            if (!wp_verify_nonce($nonce, $coupon_code)) {
                throw new Exception('Sorry, your nonce did not verify.');
            }
            global $woocommerce;
            $coupon = new WC_Coupon($coupon_code);
            $emails = $coupon->get_email_restrictions();
            array_push($emails, $email);
            $coupon->set_email_restrictions($emails);
            $coupon->save();
            self::update_user_reward_meta($user_id, $reward_used);
            // return $emails;
            wp_send_json_success([
                'message' => 'Reward Successfully Claimed .', 'coupon_code' => $coupon_code,
                'success' => true
            ]);
        } catch (Exception $e) {
            wp_send_json_error([
                'message' => $e->getMessage(), 'success' => false
            ]);
        }
    }
    public static function update_user_reward_meta($user_id, $reward_used)
    {
        $user_reward =  get_user_meta($user_id, 'user_remaining_rewards', true);
        $user_reward = $user_reward - $reward_used;
        update_user_meta($user_id, 'user_remaining_rewards', $user_reward);
    }
    public static function check_email_exist_coupon($coupon_code, $email)
    {
        global $woocommerce;
        $coupon = new WC_Coupon($coupon_code);
        $emails = $coupon->get_email_restrictions();
        if (in_array($email, $emails)) {
            return true;
        } else {
            return false;
        }
    }
}
