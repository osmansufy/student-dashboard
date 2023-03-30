<?php

/**
 * Plugin Name:      SA Learners Dashboard
 * Plugin URI:        https://staffasia.org
 * Description:       This plugin  for custom learners dashboard for wplms theme .
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Technology Team
 * Author URI:        https://staffasia.org
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sa-learners-dashboard
 */
include_once 'controllers/SaHelper.php';
include_once 'controllers/SaLearners.php';
include_once 'controllers/SaCourse.php';
include_once 'controllers/SaOrders.php';
include_once 'controllers/SaRewards.php';
include_once 'controllers/SaCommon.php';
include_once 'controllers/SaCoupon.php';
include_once 'controllers/SaGravityFormCoupon.php';
include_once 'controllers/SaOptionPage.php';
include_once 'controllers/SaCPT.php';

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

// function sa_learners_dashboard_including($template)
// {
//     $plugindir = dirname(__FILE__);
//     if (is_page_template('my-courses-dashboard.php')) {
//         $template = $plugindir . '/templates/my-courses-dashboard.php';
//     } elseif (is_page_template('learners-dashboard.php')) {
//         $template = $plugindir . '/templates/learners-dashboard.php';
//     } elseif (is_page_template('learners-profile.php')) {
//         $template = $plugindir . '/templates/learners-profile.php';
//     } elseif (is_page_template('learners-orders.php')) {
//         $template = $plugindir . '/templates/learners-orders.php';
//     } elseif (is_page_template('learners-certificates.php')) {
//         $template = $plugindir . '/templates/learners-certificates.php';
//     } elseif (is_page_template('learners-rewards.php')) {
//         $template = $plugindir . '/templates/learners-rewards.php';
//     } elseif (is_page_template('learners-saved-courses.php')) {
//         $template = $plugindir . '/templates/saved-courses.php';
//     } elseif (is_page_template('learners-support.php')) {
//         $template = $plugindir . '/templates/learners-support.php';
//     } elseif (is_page_template('special-offers.php')) {
//         $template = $plugindir . '/templates/special-offers.php';
//     } elseif (is_page_template('learners-messages.php')) {
//         $template = $plugindir . '/templates/learners-messages.php';
//     }
//     return $template;
// }
// add_action('template_include', 'sa_learners_dashboard_including');
function sa_elementor_pages($template)
{
    $common = new SaCommon();
    $page_template_array = $common->all_page_templates;

    $page_templates = array_map(function ($page) {
        $page_with_php = $page['template'];
        return $page_with_php;
    }, $page_template_array);
    global $post;
    $page_slug = $post->post_name;
    // $current_page_slug = basename(get_permalink());
    $is_page_exist =  in_array($page_slug, $page_templates);
    if ($is_page_exist) {
        $plugindir = dirname(__FILE__);
        $template = $plugindir . '/templates/' . $page_slug . '.php';
        return $template;
    } else {

        return $template;
    }
}

add_action('template_include', 'sa_elementor_pages');

function sa_learners_dashboard_load_plugin_textdomain()
{
    load_plugin_textdomain('sa-learners-dashboard', false, basename(dirname(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'sa_learners_dashboard_load_plugin_textdomain');
// load Jquery from google cdn
function use_jquery_from_google()
{
    if (is_admin()) {
        return;
    }

    global $wp_scripts;
    if (isset($wp_scripts->registered['jquery']->ver)) {
        $ver = $wp_scripts->registered['jquery']->ver;
        $ver = str_replace("-wp", "", $ver);
    } else {
        $ver = '1.12.4';
    }

    wp_deregister_script('jquery');
    wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/$ver/jquery.min.js", false, $ver);
}
// add_action('init', 'use_jquery_from_google');
function sa_learners_dashboard_plugin_scripts_and_styles()
{
    $common = new SaCommon();
    $page_template_array = $common->all_page_templates;

    $page_templates = array_map(function ($page) {
        $page_with_php = $page['template'];
        return $page_with_php;
    }, $page_template_array);
    // $elementor_pages = ['unlimited-learning', 'student-portal', 'learners-recommend-friends'];
    // $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    // echo "<pre>";
    // print_r($plugin_page);
    // var_dump($uri == '/wplms/student-portal/');
    // echo "</pre>";
    // die();
    // check current page is plugin page or not
    $current_page_slug = basename(get_permalink());
    $is_page_exist =  in_array($current_page_slug, $page_templates);
    if ($is_page_exist) {
        use_jquery_from_google();
        wp_enqueue_style(
            'sa-learner-dashboard-style',
            plugins_url('assets/css/learner-dashboard.css', __FILE__),
            array(),
            time(),
            'all'
        );
        // cdn load css from bootstrap
        wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), time(), 'all');
        // check if page is learners dashboard page ,
        wp_enqueue_script('sa-learner-dashboard-js', plugins_url('assets/js/Learners.js', __FILE__), array('jquery'), time(), true);
        // enqueue vue file
        // wp_enqueue_script('sa-learner-dashboard-vue', plugins_url('assets/js/vue.js', __FILE__), array('vue-js'), time(), true);
        wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), "", true);
        wp_enqueue_style('sabd-fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css');
        // add vue js
        // wp_enqueue_script('vue-js', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', array(), '2.6.12', true);
        // add axios js
        // wp_enqueue_script('axios-js', 'https://unpkg.com/axios/dist/axios.min.js', array(), '0.21.1', true);
    }

    $action = 'sa_learners_update';
    $sal_nonce = wp_create_nonce($action);
    wp_localize_script('sa-learner-dashboard-js', 'pluginData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'sal_nonce' => $sal_nonce
    ));
}


add_action('admin_enqueue_scripts', 'sa_learners_dashboard_plugin_scripts_and_styles_admin');
function sa_learners_dashboard_plugin_scripts_and_styles_admin($screen)
{


    if ('learners-dashboard_page_sal-dashboard-management' == $screen || 'toplevel_page_saldashboard' == $screen) {
        //Add the Select2 CSS file
        wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), '4.1.0-rc.0');
        // Add the Select2 JavaScript file
        wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', 'jquery', '4.1.0-rc.0');

        wp_enqueue_script('sa-learner-dashboard-admin-js', plugins_url('assets/js/admin/admin.js', __FILE__), array('jquery', 'select2-js'), time(), true);
    }
}

// redirect to dashboard after login if user is student or subscriber
function sa_redirect_to_dashboard_after_login($redirect_to, $request, $user)
{
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('subscriber', $user->roles) || in_array('student', $user->roles)) {
            return home_url('/learners-dashboard/');
        } else {
            return $redirect_to;
        }
    }
}

// high piroty to redirect to dashboard after login
add_filter('login_redirect', 'sa_redirect_to_dashboard_after_login', 9999, 3);
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
add_action('woocommerce_order_status_completed', array('SaCoupon', 'sa_remove_email_restriction_from_coupon'), 10, 1);
add_action('wp_ajax_sa_learners_start_course', array('SaCourse', 'sa_learners_start_course'));
