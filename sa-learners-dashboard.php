<?php

/**
 * Plugin Name:      SA Learners Dashboard
 * Plugin URI:        https://staffasia.org
 * Description:       This plugin  for custom learners dashboard for wplms theme . DO NOT DEACTIVATE THIS PLUGIN UNDER ANY CIRCUMSTANCE. Please contact the Technology Team for anything. 
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Technology Team
 * Author URI:        https://staffasia.org
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sa-learners-dashboard
 */
include_once 'controllers/SaLearners.php';
include_once 'controllers/SaCourse.php';
include_once 'controllers/SaOrders.php';
include_once 'controllers/SaRewards.php';
include_once 'controllers/SaCommon.php';
include_once 'controllers/SaCoupon.php';
include_once 'controllers/SaGravityFormCoupon.php';

define('SA_LEARNERS_DASHBOARD_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SA_LEARNERS_DASHBOARD_PLUGIN_URL', plugin_dir_url(__FILE__));
define('SA_LEARNERS_DASHBOARD_PLUGIN_VERSION', '1.0.0');


function sa_learners_dashboard_activate_sabd()
{
    require_once plugin_dir_path(__FILE__) . 'includes/SaLearnersDbActivator.php';
    SaLearnersDbActivator::activate();
}
register_activation_hook(__FILE__, 'sa_learners_dashboard_activate_sabd');

function sa_learners_dashboard_deactivate_sabd()
{
    require_once plugin_dir_path(__FILE__) . 'includes/SaLearnersDbDeActivator.php';
    SaLearnersDbDeActivator::deactivate();
};
register_deactivation_hook(__FILE__, 'sa_learners_dashboard_deactivate_sabd');

function sa_learners_dashboard_including($template)
{
    $plugindir = dirname(__FILE__);
    if (is_page_template('my-courses-dashboard.php')) {
        $template = $plugindir . '/templates/my-courses-dashboard.php';
    } elseif (is_page_template('learners-dashboard.php')) {
        $template = $plugindir . '/templates/learners-dashboard.php';
    } elseif (is_page_template('learners-profile.php')) {
        $template = $plugindir . '/templates/learners-profile.php';
    } elseif (is_page_template('learners-orders.php')) {
        $template = $plugindir . '/templates/learners-orders.php';
    } elseif (is_page_template('learners-certificates.php')) {
        $template = $plugindir . '/templates/learners-certificates.php';
    } elseif (is_page_template('learners-rewards.php')) {
        $template = $plugindir . '/templates/learners-rewards.php';
    } elseif (is_page_template('learners-saved-courses.php')) {
        $template = $plugindir . '/templates/saved-courses.php';
    } elseif (is_page_template('learners-support.php')) {
        $template = $plugindir . '/templates/learners-support.php';
    }
    return $template;
}
add_action('template_include', 'sa_learners_dashboard_including');

// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// if ($uri == '/wplms/learners-dashboard/') {
//     add_action('template_include', function ($template) {
//         return SA_LEARNERS_DASHBOARD_PLUGIN_DIR . '/templates/learners-dashboard.php';
//     });
// }

function sa_learners_dashboard_load_plugin_textdomain()
{
    load_plugin_textdomain('sa-learners-dashboard', false, basename(dirname(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'sa_learners_dashboard_load_plugin_textdomain');

function sa_learners_dashboard_plugin_scripts_and_styles()
{
    $common = new SaCommon();
    $page_template = $common->all_page_templates;
    $plugin_page = array_map(function ($page) {
        $page_with_php = $page['template'] . '.php';
        return $page_with_php;
    }, $page_template);
    if (is_page_template($plugin_page)) {
        wp_enqueue_style('sa-learner-dashboard-style', plugins_url('assets/css/learner-dashboard.css', __FILE__), array(), time(), 'all');
    }
    // cdn load css from bootstrap
    wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), time(), 'all');
    wp_enqueue_script('googleapis-js', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array('jquery'), "", false);
    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), "", true);
    wp_enqueue_script('sa-learner-dashboard-js', plugins_url('assets/js/Learners.js', __FILE__), array('jquery'), time(), true);
    wp_enqueue_style('sabd-fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css');
    $action = 'sa_learners_update';
    $sal_nonce = wp_create_nonce($action);
    wp_localize_script('sa-learner-dashboard-js', 'pluginData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'sal_nonce' => $sal_nonce
    ));
}

add_action('wp_login', array('SaLoginRewards', 'sa_user_last_login'), 10, 2);
add_action("user_register", array('SaRewards', 'sa_user_rewards_for_registration'));
add_action('badgeos_wplms_submit_course', array('CourseCompleteRewards', 'sa_badgeos_wplms_submit_course'));
add_action('wplms_unit_complete', array('SaRewards', 'sa_wplms_unit_complete'), 5, 4);
add_action('wp_enqueue_scripts', 'sa_learners_dashboard_plugin_scripts_and_styles');
add_action('wp_ajax_sa_learners_update', array('SaLearners', 'sa_learners_update_callback'));
add_action('wp_ajax_sa_learners_update_profile_picture', array('SaLearners', 'sa_learners_update_profile_picture_callback'));
add_action('wp_ajax_sa_learners_change_password', array('SaLearners', 'sa_learners_change_password_callback'));
add_action('wp_ajax_sa_learners_add_to_cart', array('SaCourse', 'sa_learners_add_to_cart'));
add_action('wp_ajax_sa_learners_remove_wishlist', array('SaCourse', 'sa_remove_from_wishlist'));
add_action('wp_ajax_sa_learners_change_reward', array('SaRewards', 'sal_ajax_get_reward_by_date_range'));
add_action('wp_ajax_sa_learners_claim_reward', array('SaCoupon', 'sa_learners_claim_reward'));
add_action('wp_ajax_sa_learners_claim_gf_reward', array('SaCoupon', 'sal_gf_coupon_generator'));
add_action('wp_ajax_sa_learners_change_leaderBoard_reward', array('SaRewards', 'sa_learners_change_leaderBoard_reward'));
