<?php

use Elementor\Modules\WpCli\Update;

class SaLearnersDbActivator
{
    public function __construct()
    {
    }

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

    static function sal_create_table()
    {
        global $wpdb;
        // create table for  Acchivements 
        $table_name = $wpdb->prefix . 'sa_learner_achievements';
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE {$table_name} (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
         achievement_id mediumint(9) NOT NULL,
         achievement_name varchar(255) NOT NULL,
         achievement_type varchar(255) NOT NULL,
         rewards_points int(9) NOT NULL,
         rewards_type varchar(255) NOT NULL,
         PRIMARY KEY  (id)
            ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        // create table mapping with user and achievements
        $table_name_mapping = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $charset_collate = $wpdb->get_charset_collate();
        $sqlMap = "CREATE TABLE {$table_name_mapping} (
         id mediumint(9) NOT NULL AUTO_INCREMENT,
         user_id mediumint(9) NOT NULL,
         achievement_id mediumint(9) NOT NULL,
         achievement_name varchar(255) NOT NULL,
         achievement_type varchar(255) NOT NULL,
         rewards_points int(9) NOT NULL,
         rewards_type varchar(255) NOT NULL,
         created_at datetime NOT NULL,
         PRIMARY KEY  (id)
            ) $charset_collate;";
        dbDelta($sqlMap);
        add_option("SA_LEARNERS_DASHBOARD_PLUGIN_VERSION", SA_LEARNERS_DASHBOARD_PLUGIN_VERSION);
        if (get_option('sa_learner_dashboard_db_version') != SA_LEARNERS_DASHBOARD_PLUGIN_VERSION) {
            $query = " ALTER TABLE {$table_name_mapping} DROP COLUMN updated_at";
            $wpdb->query($query);
            $sqlMap = "CREATE TABLE {$table_name_mapping} (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        user_id mediumint(9) NOT NULL,
        achievement_id mediumint(9) NOT NULL,
        achievement_name varchar(255) NOT NULL,
        achievement_type varchar(255) NOT NULL,
        rewards_points int(9) NOT NULL,
        rewards_type varchar(255) NOT NULL,
        created_at datetime NOT NULL,
        PRIMARY KEY  (id)
           ) $charset_collate;";
            dbDelta($sqlMap);
            update_option('sa_learner_dashboard_db_version', SA_LEARNERS_DASHBOARD_PLUGIN_VERSION);
        }
        $wpdb->insert(
            $table_name_mapping,
            [
                'user_id' => 1,
                'achievement_id' => 25,
                'achievement_name' => 'Complete 10 modules',
                'achievement_type' => 'Complete  modules',
                'rewards_points' => 1,
                'rewards_type' => 'points',
            ],
            [
                '%d',
                '%d',
                '%s',
                '%s',
                '%d',
                '%s',
            ]
        );
    }
}
