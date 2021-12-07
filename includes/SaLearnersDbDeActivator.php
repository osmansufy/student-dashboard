<?php

class SaLearnersDbDeActivator
{
    public static function deactivate()
    {
        $page1 =  get_page_by_title('My Courses');
        $pid1 = $page1->ID;
        if (is_user_logged_in()) {
            wp_delete_post($pid1, true);
        }
        self::delete_coupon_code();
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
