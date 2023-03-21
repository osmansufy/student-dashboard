<?php
class OptionsDemoTwo
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'sal_dashboard_page'));
        add_action('admin_post_sal_admin_page', array($this, 'sal_save_main_form'));
        add_action('admin_post_sal_recomended_courses', array($this, 'sal_save_dashboard_management'));
        add_action('admin_post_sal_rewards_coupon', array($this, 'sal_save_rewards_coupon'));
    }

    public function sal_save_rewards_coupon()
    {
        check_admin_referer('sal_rewards_coupon_form');
        $common = new SaCommon();
        $all_rewards_coupon = $common->all_rewards_coupon;

        foreach ($all_rewards_coupon as $single_coupon) {

            $coupon_fields = SaCommon::option_page_coupon_fields($single_coupon['id']);
            foreach ($coupon_fields as $field) {
                $field_name = $field['option_name'];
                if (isset($_POST[$field_name]) && $_POST[$field_name] != '') {
                    $field_value = $_POST[$field_name];
                    update_option($field_name, $field_value);
                }
            }
        }
        // create coupon with the option values

        SaCoupon::sal_create_all_coupon();
        wp_redirect(admin_url('admin.php?page=sa-rewards-coupon'));
    }

    public function sal_dashboard_page()
    {
        $page_title = __('Learners Dashboard', 'sa-learners-dashboard');
        $menu_title = __('Learners Dashboard', 'sa-learners-dashboard');
        $capability = 'manage_options';
        $slug       = 'saldashboard';
        $callback   = array($this, 'sal_dashboard_content');
        // add_options_page($page_title, $menu_title, $capability, $slug, $callback);
        add_menu_page($page_title, $menu_title, $capability, $slug, $callback);
        add_submenu_page($slug, 'Dashboard Management', 'Dashboard Management', $capability, 'sal-dashboard-management', array($this, 'sal_dashboard_management'));
        add_submenu_page($slug, 'Rewards Coupon', 'Rewards Coupon', $capability, 'sa-rewards-coupon', array($this, 'sal_rewards_coupon'));
    }

    public function sal_dashboard_content()
    {
        require_once plugin_dir_path(__FILE__) . "../settings-page/main_page_form.php";
    }

    public function sal_dashboard_management()
    {
        require_once plugin_dir_path(__FILE__) . "../settings-page/dashboard_management.php";
    }

    public function sal_rewards_coupon()
    {
        require_once plugin_dir_path(__FILE__) . "../settings-page/rewards_coupon.php";
    }

    public function sal_save_dashboard_management()
    {
        check_admin_referer('sal_recomended_courses');
        if (isset($_POST['recomended_courses']) && !empty($_POST['recomended_courses'])) {
            $recomended_courses = $_POST['recomended_courses'];
            update_option('recomended_courses', $recomended_courses);
        }
        if (isset($_POST['sal_submit_ticket_page']) && $_POST['sal_submit_ticket_page'] != '') {
            $sal_submit_ticket_page = $_POST['sal_submit_ticket_page'];
            update_option('sal_submit_ticket_page', $sal_submit_ticket_page);
        }
        if (isset($_POST['sal_course_feedback_page']) && $_POST['sal_course_feedback_page'] != '') {
            $sal_course_feedback_page = $_POST['sal_course_feedback_page'];
            update_option('sal_course_feedback_page', $sal_course_feedback_page);
        }
        if (isset($_POST['sal_help_n_support_page']) && $_POST['sal_help_n_support_page'] != '') {
            $sal_help_n_support_page = $_POST['sal_help_n_support_page'];
            update_option('sal_help_n_support_page', $sal_help_n_support_page);
        }
        if (isset($_POST['sal_faq_page']) && $_POST['sal_faq_page'] != '') {
            $sal_faq_page = $_POST['sal_faq_page'];
            update_option('sal_faq_page', $sal_faq_page);
        }
        wp_redirect(admin_url('admin.php?page=sal-dashboard-management'));
    }
    public function sal_save_main_form()
    {
        check_admin_referer("sal_dashboard_form");
        if (isset($_POST['sal_banner_image_url']) && !empty($_POST['sal_banner_image_url'])) {
            update_option('sal_banner_image_url', sanitize_text_field($_POST['sal_banner_image_url']));
        }
        if (isset($_POST['sal_banner_image_id']) && !empty($_POST['sal_banner_image_id'])) {
            update_option('sal_banner_image_id', sanitize_text_field($_POST['sal_banner_image_id']));
        }
        if (isset($_POST['sal_banner_image_link']) && !empty($_POST['sal_banner_image_link'])) {
            update_option('sal_banner_image_link', sanitize_text_field($_POST['sal_banner_image_link']));
        }

        if (isset($_POST['sal_certificate_banner_image_url']) && !empty($_POST['sal_certificate_banner_image_url'])) {
            update_option('sal_certificate_banner_image_url', sanitize_text_field($_POST['sal_certificate_banner_image_url']));
        }
        if (isset($_POST['sal_certificate_banner_image_id']) && !empty($_POST['sal_certificate_banner_image_id'])) {
            update_option('sal_certificate_banner_image_id', sanitize_text_field($_POST['sal_certificate_banner_image_id']));
        }
        if (isset($_POST['sal_certificate_image_link']) && !empty($_POST['sal_certificate_image_link'])) {
            update_option('sal_certificate_image_link', sanitize_text_field($_POST['sal_certificate_image_link']));
        }
        if (isset($_POST['sal_dashboard_logo_url']) && !empty($_POST['sal_dashboard_logo_url'])) {
            update_option('sal_dashboard_logo_url', sanitize_text_field($_POST['sal_dashboard_logo_url']));
        }
        if (isset($_POST['sal_certificate_banner_image_link']) && !empty($_POST['sal_certificate_banner_image_link'])) {
            update_option('sal_certificate_banner_image_link', sanitize_text_field($_POST['sal_certificate_banner_image_link']));
        }
        if (isset($_POST['sal_certificate_image_url']) && !empty($_POST['sal_certificate_image_url'])) {
            update_option('sal_certificate_image_url', sanitize_text_field($_POST['sal_certificate_image_url']));
        }
        wp_redirect('admin.php?page=saldashboard');
        // wp_redirect(admin_url('options-general.php?page=optionsdemopage'));
    }
}

new OptionsDemoTwo();