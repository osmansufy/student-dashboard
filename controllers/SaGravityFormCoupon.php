<?php
class SaGravityFormCoupon
{
    public $coupon_code_for_user = '';

    public function __construct()
    {
    }
    public function create_coupon_gf($coupon_name, $coupon_code, $amount, $type, $form)
    {

        if (!class_exists('GFCoupons')) {
            return;
        }

        // hack to load GF Coupons data.php file
        if (is_callable('gf_coupons')) {
            gf_coupons()->get_config(array('id' => 0), false);
        } else {
            /** @noinspection PhpDynamicAsStaticMethodCallInspection */
            GFCoupons::get_config(array('id' => 0), false);
        }
        $coupon_args = array();

        $meta = wp_parse_args($coupon_args, array(
            'form_id'           => $form,
            'coupon_name'       => $coupon_name,
            'coupon_code'       => strtoupper($coupon_code),
            'coupon_type'       => $type, // 'flat', 'percentage'
            'coupon_amount'     => $amount,
            'coupon_start'      => '', // MM/DD/YYYY
            'coupon_expiration' => date("MM/DD/YYYY", strtotime('+1 year')), // MM/DD/YYYY
            'coupon_limit'      => '1',
            'coupon_stackable'  => false,
        ));

        $form_id = $meta['form_id'] ? $meta['form_id'] : 0;
        unset($meta['form_id']);

        // foreach ($meta as $key => $value) {
        //     if ($value instanceof Closure && is_callable($value)) {
        //         $meta[$key] = call_user_func($value, $entry, $form, $this);
        //     }
        // }

        if (is_callable('gf_coupons')) {
            $meta['gravityForm']      = $form_id ? $form_id : 0;
            $meta['couponName']       = $meta['coupon_name'];
            $meta['couponCode']       = $meta['coupon_code'];
            $meta['couponAmountType'] = $meta['coupon_type'];
            $meta['couponAmount']     = $meta['coupon_amount'];
            $meta['startDate']        = $meta['coupon_start'];
            $meta['endDate']          = $meta['coupon_expiration'];
            $meta['usageLimit']       = $meta['coupon_limit'];
            $meta['isStackable']      = $meta['coupon_stackable'];
            $meta['usageCount']       = 0;
            gf_coupons()->insert_feed($form_id, true, $meta);
        } else {
            /** @noinspection PhpUndefinedClassInspection */
            // GFCouponsData::update_feed(0, $form_id, true, $meta);
        }
    }
}
