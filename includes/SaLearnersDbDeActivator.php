<?php

class SaLearnersDbDeActivator
{
    public static function deactivate()
    {
        $common = new SaCommon();
        $page_template = $common->all_page_templates;
        foreach ($page_template as $page) {
            $page1 =  get_page_by_title($page['title']);
            $pid1 = $page1->ID;
            if (is_user_logged_in()) {
                wp_delete_post($pid1, true);
            }
        }

        // Testing Purposes only - Delete all coupons
        // self::delete_coupon_code();
    }

    public static function delete_coupon_code()
    {
        $coupon = new SaCommon();
        $coupon_data = $coupon->all_coupons;
        foreach ($coupon_data as $coupon_code) {
            $coupon = new WC_Coupon($coupon_code['coupon_code']);
            $coupon->delete(true);
        }
    }
}
