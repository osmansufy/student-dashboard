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

    wp_deregister_script('jquery');

    global $wp_scripts;
    $jquery_version = isset($wp_scripts->registered['jquery']->ver) ? str_replace("-wp", "", $wp_scripts->registered['jquery']->ver) : '3.5.1';

    wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/{$jquery_version}/jquery.min.js", false, null, true);
}
function sa_learners_dashboard_plugin_scripts_and_styles()
{
    $common = new SaCommon();
    $page_template_array = $common->all_page_templates;

    $page_templates = array_map(function ($page) {
        $page_with_php = $page['template'];
        return $page_with_php;
    }, $page_template_array);

    $current_page_slug = basename(get_permalink());
    $is_page_exist =  in_array($current_page_slug, $page_templates);
    if ($is_page_exist) {
        use_jquery_from_google();
        wp_enqueue_style(
            'sa-learner-dashboard-style',
            plugins_url(
                'assets/css/learner-dashboard.css',
                __FILE__
            ),
            array(),
            time(),
            'all'
        );
        // cdn load css from bootstrap
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
        wp_enqueue_style(
            'new-style',
            plugins_url(
                'assets/css/new-dashboard.css',
                __FILE__
            ),
            array(),
            time(),
            'all'
        );

        // check if page is learners dashboard page ,
        wp_enqueue_script(
            'sa-learner-dashboard-js',
            plugins_url(
                'assets/js/Learners.js',
                __FILE__
            ),
            array('jquery'),
            time(),
            true
        );
        // enqueue bootstrap js
        wp_enqueue_script(
            'bootstrap-js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
            array(),
            "",
            true
        );
        // enqueue fontawesome
        wp_enqueue_style(
            'sabd-fontawesome-css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'
        );
    }

    $action = 'sa_learners_update';
    $sal_nonce = wp_create_nonce($action);
    wp_localize_script('sa-learner-dashboard-js', 'pluginData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'sal_nonce' => $sal_nonce,
        'plugin_url' => plugins_url('', __FILE__),
    ));
}


add_action('admin_enqueue_scripts', 'sa_learners_dashboard_plugin_scripts_and_styles_admin');
function sa_learners_dashboard_plugin_scripts_and_styles_admin($screen)
{


    if ('learners-dashboard_page_sal-dashboard-management' == $screen || 'toplevel_page_saldashboard' == $screen) {
        //Add the Select2 CSS file
        wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), '4.1.0-rc.0');

        //Add the Select2 JavaScript file
        wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', 'jquery', '4.1.0-rc.0');

        wp_enqueue_script(
            'sa-learner-dashboard-admin-js',
            plugins_url(
                'assets/js/admin/admin.js',
                __FILE__
            ),
            array('jquery', 'select2-js'),
            time(),
            true
        );
    }
}
// Administrator | Editor | Author | Contributor | Subscriber | Student | Instructor | Employee | Customer | Production Team | Admin | Developer | Marketing | Accounts | Customer Support | Business Development | Course Maintenance | Super Admin | Customer Success | Marketing Team | Accounts Team | Brand Manager | PPC | SEO Manager | SEO Editor
$user_roles_for_redirect = array('administrator', 'editor', 'author', 'contributor', 'subscriber', 'student', 'instructor', 'employee', 'customer', 'productionteam', 'admin', 'developer', 'marketing', 'accounts', 'customersupport', 'businessdevelopment', 'coursemaintenance', 'superadmin', 'customersuccess', 'marketingteam', 'accountsteam', 'brandmanager', 'ppc', 'wpseo_manager', 'wpseo_editor');
// redirect to dashboard after login if user is role is in array
function sa_redirect_to_dashboard_after_login($redirect_to, $request, $user)
{
    global $user_roles_for_redirect;
    if (isset($user->roles) && is_array($user->roles)) {
        if (array_intersect($user_roles_for_redirect, $user->roles)) {
            return home_url('/learners-dashboard/');
        }
    }
    return $redirect_to;
}

// high piroty to redirect to dashboard after login
add_filter('login_redirect', 'sa_redirect_to_dashboard_after_login', 9999, 3);
add_action('wp_login', array('SaLoginRewards', 'sa_user_last_login'), 10, 2);
add_action("user_register", array('SaRewards', 'sa_user_rewards_for_registration'));
add_action(
    'badgeos_wplms_submit_course',
    array(
        'CourseCompleteRewards',
        'sa_badgeos_wplms_submit_course'
    )
);
add_action('wplms_unit_complete', array('SaRewards', 'sa_wplms_unit_complete'), 5, 4);
add_action('wp_enqueue_scripts', 'sa_learners_dashboard_plugin_scripts_and_styles');
add_action('wp_ajax_sa_learners_update', array('SaLearners', 'sa_learners_update_callback'));
add_action(
    'wp_ajax_sa_learners_update_profile_picture',
    array('SaLearners', 'sa_learners_update_profile_picture_callback')
);
add_action('wp_ajax_sa_learners_change_password', array('SaLearners', 'sa_learners_change_password_callback'));
add_action('wp_ajax_sa_learners_add_to_cart', array('SaCourse', 'sa_learners_add_to_cart'));
add_action('wp_ajax_sa_learners_remove_wishlist', array('SaCourse', 'sa_remove_from_wishlist'));
add_action('wp_ajax_sa_learners_change_reward', array('SaRewards', 'sal_ajax_get_reward_by_date_range'));
add_action('wp_ajax_sa_learners_claim_reward', array('SaCoupon', 'sa_learners_claim_reward'));
add_action(
    'wp_ajax_sa_learners_claim_gf_reward',
    array('SaCoupon', 'sal_gf_coupon_generator')
);
add_action(
    'wp_ajax_sa_learners_change_leaderBoard_reward',
    array('SaRewards', 'sa_learners_change_leaderBoard_reward')
);
add_action('woocommerce_order_status_completed', array('SaCoupon', 'sa_remove_email_restriction_from_coupon'), 10, 1);
add_action('wp_ajax_sa_learners_start_course', array('SaCourse', 'sa_learners_start_course'));
