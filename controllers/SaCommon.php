<?php
class SaCommon
{
    public $all_page_templates = [
        [
            'title' => 'My Courses Dashboard',
            'slug' => 'my-courses-dashboard',
            'template' => 'my-courses-dashboard'
        ],
        [
            'title' => 'Learners Dashboard',
            'slug' => 'learners-dashboard',
            'template' => 'learners-dashboard'
        ],
        [
            'title' => 'Learners Profile',
            'slug' => 'learners-profile',
            'template' => 'learners-profile'
        ],
        [
            'title' => 'Learners Orders',
            'slug' => 'learners-orders',
            'template' => 'learners-orders'
        ],
        [
            'title' => 'Learners Certificates',
            'slug' => 'learners-certificates',
            'template' => 'learners-certificates'
        ],
        [
            'title' => 'Learners Rewards',
            'slug' => 'learners-rewards',
            'template' => 'learners-rewards'
        ],
        [
            'title' => 'Learners saved courses',
            'slug' => 'learners-saved-courses',
            'template' => 'learners-saved-courses'
        ],
        [
            'title' => 'Learners support',
            'slug' => 'learners-support',
            'template' => 'learners-support'
        ]
    ];


    public  $achievements = [
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

    public $dependency_percentage_80 = "dependency_percentage_80";
    public $dependency_percentage_90 = "dependency_percentage_90";
    public $percentage_coupons_80 = "lprc_12486752_uo";
    public $percentage_coupons_90 = "lprc_28258695_uo";


    public function all_coupons_except_dependency_coupons()
    {
        $coupons = $this->all_coupons;
        $filter_coupon =   array_filter($coupons, function ($coupon) {
            if ($coupon['rewards_type'] != $this->dependency_percentage_80 && $coupon['rewards_type'] != $this->dependency_percentage_90) {
                return $coupon;
            }
        });
        return $filter_coupon;
    }
    public function all_coupons_with_dependency_80()
    {
        $coupons = $this->all_coupons;
        $filter_coupon =   array_filter($coupons, function ($coupon) {
            if ($coupon['rewards_type'] == $this->dependency_percentage_80) {
                return $coupon;
            }
        });
        return $filter_coupon;
    }
    public function all_coupons_with_dependency_90()
    {
        $coupons = $this->all_coupons;
        $filter_coupon =   array_filter($coupons, function ($coupon) {
            if ($coupon['rewards_type'] == $this->dependency_percentage_90) {
                return $coupon;
            }
        });
        return $filter_coupon;
    }
    public function get_single_coupon($rewards_coupon_id)
    {
        $coupon = $this->all_coupons;
        foreach ($coupon as $key => $value) {
            if ($value['rewards_coupon_id'] == $rewards_coupon_id) {
                return $value;
            }
        }
        return false;
    }
    public function get_single_achievement($achievement_id)
    {
        foreach ($this->achievements as $achievement) {
            if ($achievement['achievement_id'] == $achievement_id) {
                return $achievement;
            }
        }
    }
    static function coupon_prefix($coupon)
    {
        $siteName = strtolower(get_bloginfo('name'));
        $siteName = substr($siteName, 0, 3);
        $codeWithPrefix = $siteName . '_' . $coupon;
        return $codeWithPrefix;
    }

    public $all_coupons = [
        [
            'coupon_code' => 'reward_i1_80_r2',
            'coupon_type' => 'percentage',
            'displays_on' => '80% off courses coupon code',
            'rewards_type' => 'percentage',
            'rewards_coupon_id' => '1',
            'coupon_description' => '80% off courses coupon code',
            'coupon_discount' => '80',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '2',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i2_90_r5',
            'coupon_type' => 'percentage',
            'displays_on' => '90% off courses coupon code',
            'rewards_type' => 'percentage',
            'rewards_coupon_id' => '2',
            'coupon_description' => '90% off for courses coupon code',
            'coupon_discount' => '90',
            'coupon_maximum_amount' => '0',
            'rewards_points_need' => '5',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i3_free_r8_u100',
            'coupon_type' => 'percentage',
            'displays_on' => 'Free Course (up to £100.00)',
            'rewards_type' => 'full free courses',
            'rewards_coupon_id' => '3',
            'coupon_description' => 'Free Course (up to £100.00)',
            'coupon_discount' => '100',
            'coupon_maximum_amount' => '100.00',
            'rewards_points_need' => '8',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i4_free_r15_u240',
            'coupon_type' => 'percentage',
            'displays_on' => 'Free Mega Course (up to £240.00)',
            'rewards_type' => 'mega course',
            'rewards_coupon_id' => '4',
            'coupon_description' => 'Free Mega Course (up to £240.00)',
            'coupon_discount' => '100',
            'rewards_points_need' => '15',
            'coupon_maximum_amount' => '240.00',
            'isMultiple' => "no"
        ],
        [
            'coupon_code' => 'reward_i101_80_r6',
            'coupon_type' => 'percentage',
            'displays_on' => '80% off courses coupon code (2)',
            'rewards_type' => 'dependency_percentage_80',
            'rewards_coupon_id' => '101',
            'coupon_description' => '80% off courses coupon code 2nd time',
            'coupon_discount' => '80',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '6',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i102_80_r10',
            'coupon_type' => 'percentage',
            'displays_on' => '80% off courses coupon code (3)',
            'rewards_type' => 'dependency_percentage_80',
            'rewards_coupon_id' => '102',
            'coupon_description' => '80% off courses coupon code 3rd time',
            'coupon_discount' => '80',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '10',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i103_80_12',
            'coupon_type' => 'percentage',
            'displays_on' => '80% off courses coupon code (4)',
            'rewards_type' => 'dependency_percentage_80',
            'rewards_coupon_id' => '103',
            'coupon_description' => '80% off courses coupon code 4th time',
            'coupon_discount' => '80',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '12',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i104_80_r14',
            'coupon_type' => 'percentage',
            'displays_on' => '80% off courses coupon code (5)',
            'rewards_type' => 'dependency_percentage_80',
            'rewards_coupon_id' => '104',
            'coupon_description' => '80% off courses coupon code 5th time',
            'coupon_discount' => '80',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '14',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i105_80_r20',
            'coupon_type' => 'percentage',
            'displays_on' => '80% off courses coupon code (5)',
            'rewards_type' => 'dependency_percentage_80',
            'rewards_coupon_id' => '105',
            'coupon_description' => '80% off courses coupon code 5th time',
            'coupon_discount' => '80',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '20',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i201_90_r16',
            'coupon_type' => 'percentage',
            'displays_on' => '90% off courses coupon code (2)',
            'rewards_type' => 'dependency_percentage_90',
            'rewards_coupon_id' => '201',
            'coupon_description' => '90% off courses coupon code 2nd time',
            'coupon_discount' => '90',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '16',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i202_90_r18',
            'coupon_type' => 'percentage',
            'displays_on' => '90% off courses coupon code (3)',
            'rewards_type' => 'dependency_percentage_90',
            'rewards_coupon_id' => '202',
            'coupon_description' => '90% off courses coupon code 3rd time',
            'coupon_discount' => '90',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '18',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i203_90_r20',
            'coupon_type' => 'percentage',
            'displays_on' => '90% off courses coupon code (4)',
            'rewards_type' => 'dependency_percentage_90',
            'rewards_coupon_id' => '203',
            'coupon_description' => '90% off courses coupon code 4th time',
            'coupon_discount' => '90',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '20',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i204_90_r22',
            'coupon_type' => 'percentage',
            'displays_on' => '90% off courses coupon code (5)',
            'rewards_type' => 'dependency_percentage_90',
            'rewards_coupon_id' => '204',
            'coupon_description' => '90% off courses coupon code 5th time',
            'coupon_discount' => '90',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '22',
            'isMultiple' => "no",
        ],
        [
            'coupon_code' => 'reward_i205_90_r24',
            'coupon_type' => 'percentage',
            'displays_on' => '90% off courses coupon code (5)',
            'rewards_type' => 'dependency_percentage_90',
            'rewards_coupon_id' => '205',
            'coupon_description' => '90% off courses coupon code 5th time',
            'coupon_discount' => '90',
            'coupon_minimum_amount' => '0',
            'rewards_points_need' => '24',
            'isMultiple' => "no",
        ],
    ];
}
