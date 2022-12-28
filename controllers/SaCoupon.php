<?php
class SaCoupon
{
    public static $sa_gf_coupon_nonce = 'sa_gf_coupon_nonce';
    // insert user email in coupon code
    public static function sa_learners_claim_reward()
    {
        $coupon_id = $_POST['coupon_id'];
        $reward_used = $_POST['reward_used'];
        $user_id = $_POST['userId'];
        $email = $_POST['user_email'];
        $nonce = $_POST['nonce'];

        // $common = new SaCommon();
        // $get_coupon = $common->get_single_coupon($coupon_id);
        // $coupon_code = $get_coupon['coupon_code'];
        // $coupon_title = $common::coupon_prefix($coupon_code);
        try {
            if (!wp_verify_nonce($nonce, $coupon_id)) {
                throw new Exception('Sorry, your nonce did not verify.');
            }
            global $woocommerce;
            $coupon = new WC_Coupon($coupon_id);
            $emails = $coupon->get_email_restrictions();
            array_push($emails, $email);
            $coupon->set_email_restrictions($emails);
            $coupon->save();
            self::update_user_reward_meta($user_id, $reward_used);
            // return $emails;
            wp_send_json_success([
                'message' => 'Reward Successfully Claimed .', 'coupon_code' => $coupon_id,
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
    public function sal_gf_coupon_generator()
    {

        $user_id = $_POST['user_id'];
        $reward_used = $_POST['reward_used'];
        $sal_nonce = $_POST['sal_nonce'];
        $amount = "100";
        $type = 'percentage';
        // $entry = $_POST['entry'];
        $form = "20";
        $coupon_name = "Certificate Reward Coupon";
        // random coupon code generator
        $coupon_random_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
        $coupon_code = $coupon_random_code . $user_id;


        $nonce_name = "sa_gf_coupon_nonce";
        try {
            if (wp_verify_nonce($sal_nonce, $nonce_name)) {
                $gf_coupon_code = new SaGravityFormCoupon();
                $gf_coupon_code->create_coupon_gf($coupon_name, $coupon_code, $amount, $type, $form);
                self::update_user_reward_meta($user_id, $reward_used);


                if (get_user_meta($user_id, 'gf_user_coupon', true) == '' || get_user_meta($user_id, 'gf_user_coupon', true) == null) {
                    update_user_meta($user_id, "gf_user_coupon", $coupon_code);
                } else {
                    throw new Exception('Sorry, coupon already created.');
                }
                wp_send_json_success(array(
                    'message' => 'coupon created',
                    'success' => true,
                    'coupon_code' => $coupon_code
                ));
            } else {
                throw new Exception('Sorry, your nonce did not verify.');
            }
        } catch (Exception $e) {
            wp_send_json_error(array(
                'message' => $e->getMessage(),
                'success' => false
            ));
        }

        wp_die();
    }
    static  function sal_create_coupon($couponInfo)
    {
        // create random 6 digit 
        $coupon_code = $couponInfo->rewards_coupon_code;
        $discount_type = $couponInfo->rewards_coupon_type;
        $amount = $couponInfo->coupon_discount_amount;
        $coupon_description = $couponInfo->rewards_coupon_description;
        $admin_email[] = get_bloginfo('admin_email');

        $coupon_individual_use = true;



        try {


            // check if coupon code already exist then update coupon 

            if (self::check_coupon_exist($coupon_code)) {
                $coupon = new WC_Coupon($coupon_code);
                $coupon->set_amount($amount);
                $coupon->set_discount_type($discount_type);
                $coupon->set_description($coupon_description);
                $coupon->set_individual_use($coupon_individual_use);
                $coupon->set_email_restrictions($admin_email);
                $coupon->save();
                return $coupon;
            } else {
                // create new coupon 
                $coupon = new WC_Coupon();


                $coupon->set_code($coupon_code); // (string)
                $coupon->set_description($coupon_description); // (string)
                $coupon->set_discount_type($discount_type); // (string)
                $coupon->set_amount($amount); // (float)

                $coupon->set_individual_use($coupon_individual_use); // (boolean) 

                $coupon->set_usage_limit(1); // (integer)
                $coupon->set_usage_limit_per_user(1); // (integer)

                $coupon->set_email_restrictions($admin_email); // (array)

                $coupon->set_free_shipping(false); // (boolean)
                $coupon->save();
                return $coupon;
            }
        } catch (Exception $e) {
            wp_send_json_error(array(
                'message' => $e->getMessage(),
                'success' => false
            ));
        }
    }


    static function convert_couponInfo_from_options_values()
    {
        $common = new SaCommon();
        $all_rewards_coupon = $common->all_rewards_coupon;
        $coupon_arr = array();
        foreach ($all_rewards_coupon as $single_coupon) {
            $coupon_info = new stdClass();

            $coupon_fields = SaCommon::option_page_coupon_fields($single_coupon['id']);
            foreach ($coupon_fields as $field) {
                $field_name = $field['name'];
                $field_option = $field['option_name'];

                $coupon_info->$field_name = get_option($field_option);
            }
            $coupon_arr[] = $coupon_info;
        }
        return $coupon_arr;
    }

    static function sal_create_all_coupon()
    {
        $coupon_arr = self::convert_couponInfo_from_options_values();
        foreach ($coupon_arr as $couponInfo) {
            if (isset($couponInfo->rewards_coupon_code)) {
                self::sal_create_coupon($couponInfo);
            } else {
                continue;
            }
        }
    }
    static function sa_remove_email_restriction_from_coupon($order_id)
    {
        $order = wc_get_order($order_id);
        $coupons = $order->get_coupon_codes();
        //   only remove customer email restriction  
        // Get the current email address restriction list
        // check if coupon is used or not 
        if (count($coupons) > 0) {
            foreach ($coupons as $coupon) {
                $customer_email = $order->get_billing_email();

                // check coupon match with plugin options value coupon code 
                $coupon_arr = SaCoupon::convert_couponInfo_from_options_values();
                foreach ($coupon_arr as $couponInfo) {
                    if (isset($couponInfo->rewards_coupon_code)) {
                        if ($coupon == $couponInfo->rewards_coupon_code) {
                            $wc_coupon = new WC_Coupon($coupon);
                            //   only remove customer email restriction  
                            // Get the current email address restriction list
                            $email_restrictions = $wc_coupon->get_email_restrictions();
                            // Remove the customer email from the list
                            $email_restrictions = array_diff($email_restrictions, array($customer_email));
                            $wc_coupon->set_email_restrictions($email_restrictions);
                            $wc_coupon->save();
                        } else {
                            continue;
                        }
                    } else {
                        continue;
                    }
                }
            }
        }
    }

    static function check_coupon_exist($coupon_code)
    {
        $coupon = new WC_Coupon($coupon_code);
        if ($coupon->get_code() == $coupon_code) {
            return true;
        } else {
            return false;
        }
    }
}
