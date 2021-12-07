<?php

class SaLearnersDbActivator
{
    public function __construct()
    {
    }
    public static $achievements = [
        [
            'achievement_id' => 1,
            'achievement_name' => 'Signed in 2 days in a row',
            'achievement_description' => 'Signed in 2 days in a row',
            'rewards_points' => 1,
            'rewards_type' => 'Signed in',


        ],
        [
            'achievement_id' => 2,
            'achievement_name' => 'Signed in 5 days in a row',
            'achievement_description' => 'Signed in 2 days in a row',
            'rewards_points' => 1,
            'rewards_type' => 'Signed in',


        ],
        [
            'achievement_id' => 3,
            'achievement_name' => 'Signed in 7 days in a row',
            'achievement_description' => 'Signed in 7 days in a row',
            'rewards_points' => 1,
            'rewards_type' => 'Signed in',
        ],
        [
            'achievement_id' => 4,
            'achievement_name' => 'Signed in 14 days in a row',
            'achievement_description' => 'Signed in 14 days in a row',
            'rewards_points' => 1,
            'rewards_type' => 'Signed in',
        ],
        [
            'achievement_id' => 5,
            'achievement_name' => 'Signed in 21 days in a row',
            'achievement_description' => 'Signed in 21 days in a row',
            'rewards_points' => 1,
            'rewards_type' => 'Signed in',
        ],
        [
            'achievement_id' => 6,
            'achievement_name' => '2 rewards for every consecutive day after',
            'achievement_description' => '2 rewards for every consecutive day after',
            'rewards_points' => 2,
            'rewards_type' => 'Signed in',
        ],
        [
            'achievement_id' => 7,
            'achievement_name' => 'Complete 10 modules',
            'achievement_description' => 'Complete 10 modules',
            'rewards_points' => 1,
            'rewards_type' => 'Complete modules',
        ],
        [
            'achievement_id' => 8,
            'achievement_name' => 'Complete 25 modules',
            'achievement_description' => 'Complete 25 modules',
            'rewards_points' => 1,
            'rewards_type' => 'Complete modules',
        ],
        [
            'achievement_id' => 9,
            'achievement_name' => 'Complete 50 modules',
            'achievement_description' => 'Complete 50 modules',
            'rewards_points' => 1,
            'rewards_type' => 'Complete modules',
        ],
        [
            'achievement_id' => 10,
            'achievement_name' => 'Complete 75 modules',
            'achievement_description' => 'Complete 75 modules',
            'rewards_points' => 1,
            'rewards_type' => 'Complete modules',
        ],
        [
            'achievement_id' => 11,
            'achievement_name' => 'Complete 100 modules',
            'achievement_description' => 'Complete 100 modules',
            'rewards_points' => 1,
            'rewards_type' => 'Complete modules',
        ],
        [
            'achievement_id' => 12,
            'achievement_name' => '2 rewards for every module after',
            'achievement_description' => '2 rewards for every module after',
            'rewards_points' => 2,
            'rewards_type' => 'Complete modules',
        ],
        [
            'achievement_id' => 13,
            'achievement_name' => 'Complete 1 course',
            'achievement_description' => 'Complete 1 course',
            'rewards_points' => 1,
            'rewards_type' => 'Complete courses',
        ],
        [
            'achievement_id' => 14,
            'achievement_name' => 'Complete 2 course',
            'achievement_description' => 'Complete 2 course',
            'rewards_points' => 1,
            'rewards_type' => 'Complete courses',
        ],
        [
            'achievement_id' => 15,
            'achievement_name' => 'Complete 3 course',
            'achievement_description' => 'Complete 3 course',
            'rewards_points' => 1,
            'rewards_type' => 'Complete courses',
        ],
        [
            'achievement_id' => 16,
            'achievement_name' => '3 rewards for every course completion after',
            'achievement_description' => '3 rewards for every course completion after',
            'rewards_points' => 3,
            'rewards_type' => 'Complete courses',
        ],
        [
            'achievement_id' => 17,
            'achievement_name' => 'Register an Account',
            'achievement_description' => 'Register an Account',
            'rewards_points' => 1,
            'rewards_type' => 'Registeration',
        ],
        [
            'achievement_id' => 18,
            'achievement_name' => 'Subscribe to our newsletter',
            'achievement_description' => 'Subscribe to our newsletter',
            'rewards_points' => 1,
            'rewards_type' => 'Subscribe',
        ],

    ];
    public static function activate()
    {
        self::SaLearnersDbCreate(['title' => 'My Courses', 'slug' => 'my-courses-dashboard', 'template' => 'my-courses-dashboard']);
        self::SaLearnersDbCreate(['title' => 'Learners Dashboard', 'slug' => 'learners-dashboard', 'template' => 'learners-dashboard']);
        self::SaLearnersDbCreate(['title' => 'Learners Profile', 'slug' => 'learners-profile', 'template' => 'learners-profile']);
        self::SaLearnersDbCreate(['title' => 'Learners Orders', 'slug' => 'learners-orders', 'template' => 'learners-orders']);
        self::SaLearnersDbCreate(['title' => 'Learners Certificates', 'slug' => 'learners-certificates', 'template' => 'learners-certificates']);
        self::SaLearnersDbCreate(['title' => 'Learners Rewards', 'slug' => 'learners-rewards', 'template' => 'learners-rewards']);
        self::SaLearnersDbCreate(['title' => 'Learners saved courses', 'slug' => 'learners-saved-courses', 'template' => 'learners-saved-courses']);
        self::SaLearnersDbCreate(['title' => 'Learners support', 'slug' => 'learners-support', 'template' => 'learners-support']);
        self::sal_create_table();
        self::sal_create_woocomerce_coupons();
    }
    protected function SaLearnersDbCreate($data)
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

            self::sal_create_coupon($coupon);
        }
    }
    static  function sal_create_coupon($coupon)
    {
        // create random 6 digit 


        $isMultiple = $coupon['isMultiple'];
        $amount = $coupon['coupon_discount'];
        $discount_type = 'percent';
        $coupon_code = $coupon['coupon_code'];
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
            foreach (self::$achievements as $achievement) {
                $wpdb->insert($table_name, $achievement);
            }
        }
    }
}
