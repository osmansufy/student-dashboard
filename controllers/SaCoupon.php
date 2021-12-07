<?php
class SaCoupon
{
    // insert user email in coupon code
    public static function sa_learners_claim_reward()
    {
        $coupon_code = $_POST['coupon_code'];
        $reward_used = $_POST['reward_used'];
        $user_id = $_POST['userId'];
        $email = $_POST['user_email'];
        $nonce = $_POST['nonce'];


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
            echo json_encode(array('status' => 'success', 'message' => 'Reward Successfully Claimed .', 'coupon_code' => $coupon_code));
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', 'message' => 'Error in claiming reward coupon.'));
        }
    }
    public static function update_user_reward_meta($user_id, $reward_used)
    {
        $user_reward =  get_user_meta($user_id, 'user_reward', true);
        $user_reward = $user_reward - $reward_used;
        update_user_meta($user_id, 'user_reward', $user_reward);
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
