<?php

class SaLearnersDbDeActivator
{
    public static function deactivate()
    {
        $common = new SaCommon();
        $page_template = $common->all_page_templates;
        foreach ($page_template as $page) {
            // get page by slug
            $page = get_page_by_path($page['slug']);
            // delete page

            if ($page) {
                wp_delete_post($page->ID, true);
            }
        }

        // Testing Purposes only - Delete all coupons
        // self::delete_coupon_code();
    }

    // public static function delete_coupon_code()
    // {
    //     $coupon = new SaCommon();
    //     $coupon_data = $coupon->all_coupons;
    //     foreach ($coupon_data as $coupon_code) {
    //         $coupon = new WC_Coupon($coupon_code['coupon_code']);
    //         $coupon->delete(true);
    //     }
    // }
}
