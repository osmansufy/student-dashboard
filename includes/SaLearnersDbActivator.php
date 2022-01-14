<?php

class SaLearnersDbActivator
{
    public function __construct()
    {
    }

    public static function activate()
    {
        $common = new SaCommon();
        $page_templates = $common->all_page_templates;
        foreach ($page_templates as $page_template) {
            self::SaLearnersPageTemplateCreate($page_template);
        }

        self::sal_create_table();
        self::sal_create_woocomerce_coupons();
    }
    protected function SaLearnersPageTemplateCreate($data)
    {
        $post_id = -1;
        $slug = $data['slug'];
        $title = $data['title'];
        if (null == get_page_by_title($title)) {
            $uploader_page = array(
                'comment_status'        => 'closed',
                'ping_status'           => 'closed',
                'post_name'             => $slug,
                'post_title'            => $title,
                'post_status'           => 'publish',
                'post_type'             => 'page'
            );
            $post_id = wp_insert_post($uploader_page);
            if (!$post_id) {
                wp_die('Error creating template page');
            } else {
                update_post_meta($post_id, '_wp_page_template', $data['template'] . '.php');
            }
        }
    }
    static function sal_create_woocomerce_coupons()
    {
        // if woocommerce is not active
        if (!class_exists('WooCommerce')) {
            return;
        }

        $coupons = new SaCommon();
        $all_coupons =  $coupons->all_coupons;
        foreach ($all_coupons as $coupon) {
            // if coupon is not exist in woocommerce
            $code = $coupon['coupon_code'];
            $coupon_title = SaCommon::coupon_prefix($code);
            if (!self::coupon_title_exists($coupon_title)) {
                self::sal_create_coupon($coupon);
            }
        }
    }
    static function coupon_title_exists($title)
    {
        global $wpdb;
        $coupon_title = $wpdb->get_var($wpdb->prepare("SELECT post_title FROM $wpdb->posts WHERE post_title = %s AND post_type = 'shop_coupon'", $title));
        return $coupon_title;
    }
    static  function sal_create_coupon($coupon)
    {
        // create random 6 digit 
        $code = $coupon['coupon_code'];
        $coupon_title = SaCommon::coupon_prefix($code);
        $isMultiple = $coupon['isMultiple'];
        $amount = $coupon['coupon_discount'];
        $discount_type = 'percent';
        $coupon_code = $coupon_title;
        $coupon_description = $coupon['coupon_description'];
        $coupon_minimum_amount = $coupon['coupon_minimum_amount'];
        $coupon_maximum_amount = $coupon['coupon_maximum_amount'];
        $reward_type = $coupon['rewards_type'];
        $reward_id = $coupon['rewards_id'];
        $reward_points_need = $coupon['rewards_points_need'];
        $coupon_individual_use = false;
        $coupon_exclude_sale_items = false;
        $coupon_expiry_date = '';
        $coupon = array(
            'post_title' => $coupon_code,
            'post_content' => $coupon_description,
            // 'post_excerpt' => $coupon_description,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'shop_coupon'
        );


        try {
            $new_coupon_id = wp_insert_post($coupon);
            update_post_meta($new_coupon_id, 'discount_type', $discount_type);
            update_post_meta($new_coupon_id, 'coupon_amount', $amount);
            update_post_meta($new_coupon_id, 'individual_use', $coupon_individual_use);
            // update_post_meta($new_coupon_id, 'product_ids', $coupon_product_ids);
            // update_post_meta($new_coupon_id, 'exclude_product_ids', $coupon_exclude_product_ids);
            update_post_meta($new_coupon_id, 'usage_limit', '1');
            update_post_meta($new_coupon_id, 'usage_limit_per_user', '1');
            update_post_meta($new_coupon_id, 'limit_usage_to_x_items', '1');
            update_post_meta($new_coupon_id, 'expiry_date', $coupon_expiry_date);

            // update_post_meta($new_coupon_id, 'minimum_amount', $coupon_minimum_amount);
            update_post_meta($new_coupon_id, 'maximum_amount', $coupon_maximum_amount);
            update_post_meta($new_coupon_id, 'exclude_sale_items', $coupon_exclude_sale_items);
            update_post_meta($new_coupon_id, 'reward_type', $reward_type);
            update_post_meta($new_coupon_id, 'reward_count', $reward_points_need);
            update_post_meta($new_coupon_id, 'isMultiple', $isMultiple);
        } catch (Exception $e) {
        }


        return $coupon_code;
    }
    static function sal_create_table()
    {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        global $wpdb;
        // create table for  Acchivements 
        $table_name = $wpdb->prefix . 'sa_learner_achievements';
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE {$table_name} (
         achievement_id mediumint(9) NOT NULL,
         achievement_name varchar(255) NOT NULL,
         achievement_description varchar(255) NOT NULL,
         rewards_points int(9) NOT NULL,
         rewards_type varchar(255) NOT NULL,
         PRIMARY KEY  (achievement_id)
            ) $charset_collate;";

        dbDelta($sql);

        // create table mapping with user and achievements table with foreign key
        $table_name_mapping = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $charset_collate = $wpdb->get_charset_collate();
        $sql_map = "CREATE TABLE {$table_name_mapping} (
         id mediumint(9) NOT NULL AUTO_INCREMENT,
         user_id mediumint(9) NOT NULL,
         achievement_id mediumint(9) NOT NULL,
         created_at datetime NOT NULL,
         PRIMARY KEY  (id)
            ) $charset_collate;";

        dbDelta($sql_map);
        add_option("SA_LEARNERS_DASHBOARD_PLUGIN_VERSION", SA_LEARNERS_DASHBOARD_PLUGIN_VERSION);
        // if sa_learner_achievements is empty then insert default data
        $achievements = $wpdb->get_results("SELECT * FROM {$table_name}");
        if (empty($achievements)) {
            $common = new SaCommon();
            $all_achievements = $common->achievements;
            foreach ($all_achievements as $achievement) {
                $wpdb->insert($table_name, $achievement);
            }
        }
    }
}
