<?php
class OptionsDemoTwo
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'sal_dashboard_page'));
        add_action('admin_post_sal_admin_page', array($this, 'sal_save_main_form'));
        add_action('admin_post_sal_recomended_courses', array($this, 'sal_save_dashboard_management'));
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
    }

    public function sal_dashboard_content()
    {
        require_once plugin_dir_path(__FILE__) . "../settings-page/main_page.php";
    }

    public function sal_dashboard_management()
    {
        require_once plugin_dir_path(__FILE__) . "../settings-page/dashboard_management.php";
    }
    public function sal_save_dashboard_management()
    {
        check_admin_referer('sal_recomended_courses');
        if (isset($_POST['recomended_courses'])) {
            $recomended_courses = $_POST['recomended_courses'];
            update_option('recomended_courses', $recomended_courses);
        }
        if (isset($_POST['student_portal_page'])) {
            $student_portal_page = $_POST['student_portal_page'];
            update_option('student_portal_page', $student_portal_page);
        }
        if (isset($_POST['unlimited_learning_page'])) {
            $unlimited_learning_page = $_POST['unlimited_learning_page'];
            update_option('unlimited_learning_page', $unlimited_learning_page);
        }
        if (isset($_POST['recomended_friends_page'])) {
            $recomended_friends_page = $_POST['recomended_friends_page'];
            update_option('recomended_friends_page', $recomended_friends_page);
        }
        wp_redirect(admin_url('admin.php?page=sal-dashboard-management'));
    }
    public function sal_save_main_form()
    {
        check_admin_referer("sal_dashboard_form");

        if (isset($_POST['sal_title'])) {
            update_option('sal_title', sanitize_text_field($_POST['sal_title']));
        }
        if (isset($_POST['sal_banner_image_url'])) {
            update_option('sal_banner_image_url', sanitize_text_field($_POST['sal_banner_image_url']));
        }
        if (isset($_POST['sal_banner_image_id'])) {
            update_option('sal_banner_image_id', sanitize_text_field($_POST['sal_banner_image_id']));
        }
        wp_redirect('admin.php?page=saldashboard');
        // wp_redirect(admin_url('options-general.php?page=optionsdemopage'));
    }
}

new OptionsDemoTwo();
