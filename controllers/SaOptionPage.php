<?php
class OptionsDemoTwo
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'sal_dashboard_page'));
        add_action('admin_post_sal_admin_page', array($this, 'sal_save_form'));
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
        require_once plugin_dir_path(__FILE__) . "../settings-page/form.php";
    }

    public function sal_dashboard_management()
    {
        require_once plugin_dir_path(__FILE__) . "../settings-page/set_courses_form.php";
    }
    public function sal_save_dashboard_management()
    {
        check_admin_referer('sal_recomended_courses');
        if (isset($_POST['recomended_courses'])) {
            $recomended_courses = $_POST['recomended_courses'];
            update_option('recomended_courses', $recomended_courses);
        }
        wp_redirect(admin_url('admin.php?page=sal-dashboard-management'));
    }
    public function sal_save_form()
    {
        check_admin_referer("sal_dashboard_form");

        if (isset($_POST['sal_title'])) {
            update_option('sal_title', sanitize_text_field($_POST['sal_title']));
        }
        if (isset($_POST['sal_banner_image_url'])) {
            update_option('sal_banner_image_url', sanitize_text_field($_POST['sal_banner_image_url']));
        }
        wp_redirect('admin.php?page=saldashboard');
        // wp_redirect(admin_url('options-general.php?page=optionsdemopage'));
    }
}

new OptionsDemoTwo();
