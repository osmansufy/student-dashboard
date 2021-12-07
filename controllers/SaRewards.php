<?php

use Elementor\Modules\WpCli\Update;

class SaRewards
{
    public function __construct()
    {
    }
    public static $sign_in_id_1 = 1;
    public static $sign_in_id_2 = 2;
    public static $sign_in_id_3 = 3;
    public static $sign_in_id_4 = 4;
    public static $sign_in_id_5 = 5;
    public static $sign_in_id_6 = 6;
    public static $unit_id_1 = 7;
    public static $unit_id_2 = 8;
    public static $unit_id_3 = 9;
    public static $unit_id_4 = 10;
    public static $unit_id_5 = 11;
    public static $unit_id_6 = 12;
    public static $course_id_1 = 13;
    public static $course_id_2 = 14;
    public static $course_id_3 = 15;
    public static $course_id_4 = 16;
    public static $registration_achievement_id = 17;




    public static function get_rewards_by_user_id($user_id)
    {
        global $wpdb;
        $table_name_map = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $table_name = $wpdb->prefix . 'sa_learner_achievements';
        $sql = "SELECT * FROM $table_name_map join $table_name on $table_name_map.achievement_id = $table_name.achievement_id WHERE $table_name_map.user_id = $user_id";
        $results = $wpdb->get_results($sql);
        return $results;
    }
    public static function get_all_rewards_by_user_id($user_id)
    {
        global $wpdb;
        $table_name_map = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $table_name = $wpdb->prefix . 'sa_learner_achievements';
        $sql = "SELECT SUM($table_name.rewards_points) as total_reward FROM $table_name_map join $table_name on $table_name_map.achievement_id = $table_name.achievement_id WHERE $table_name_map.user_id = $user_id";
        $results = $wpdb->get_results($sql);
        return $results;
    }
    public static function get_all_rewards_of_user_id_with_time_range($start_date, $end_date)
    {
        global $wpdb;
        $table_name_map = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $table_name = $wpdb->prefix . 'sa_learner_achievements';
        $table_user = $wpdb->prefix . 'users';
        // return $end_date;
        $sql = "SELECT SUM($table_name.rewards_points)as total_reward,$table_name_map.user_id,$table_user.display_name  FROM $table_name_map join $table_name on $table_name_map.achievement_id = $table_name.achievement_id join $table_user on $table_user.ID=$table_name_map.user_id  WHERE  $table_name_map.created_at BETWEEN '$start_date' AND '$end_date' GROUP BY $table_name_map.user_id";
        $results = $wpdb->get_results($sql);
        return $results;
    }
    public static function get_reward_by_date_range($user_id, $start_date, $end_date)
    {
        global $wpdb;
        $table_name_map = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $table_name = $wpdb->prefix . 'sa_learner_achievements';

        $sql = "SELECT SUM($table_name.rewards_points) as total_reward FROM $table_name_map join $table_name on $table_name_map.achievement_id = $table_name.achievement_id WHERE $table_name_map.user_id = $user_id AND $table_name_map.created_at BETWEEN '$start_date' AND '$end_date'";
        // return $sql;
        $results = $wpdb->get_results($sql);
        return $results;
    }
    public static function sal_ajax_get_reward_by_date_range()
    {
        $first_day_week = date('Y-m-d H:i:s', strtotime('monday this week'));
        $first_day_year = date('Y-m-d H:i:s', strtotime('first day of january this year'));
        $day_start = date('Y-m-d 00:00:00');
        $current_month = date('Y-m-d H:i:s', strtotime('first day of this month'));
        $current_date_is = date('Y-m-d H:i:s');
        $date_range = $_POST['date_range'];
        $user_id = $_POST['user_id'];
        if ($date_range != "allTime") {
            switch ($date_range) {
                case 'week':
                    $start_date = $first_day_week;
                    $end_date = $current_date_is;
                    break;
                case 'month':
                    $start_date = $current_month;
                    $end_date = $current_date_is;
                    break;
                case 'year':
                    $start_date = $first_day_year;
                    $end_date = $current_date_is;
                    break;
                case 'today':
                    $start_date = $day_start;
                    $end_date = $current_date_is;
                    break;
                default:
                    $start_date = $first_day_week;
                    $end_date = $current_date_is;
                    break;
            }
            $results = self::get_reward_by_date_range($user_id, $start_date, $end_date);
        } elseif ($date_range == "allTime") {
            $results = self::get_all_rewards_by_user_id($user_id);
        }
        // string to number

        $total_reward = intval($results[0]->total_reward);
        if ($total_reward == null) {
            $total_reward = 0;
        }
        echo json_encode($total_reward);
        wp_die();
    }
    public static function get_all_user_reward_with_date_range($start_date, $end_date)
    {
        global $wpdb;
        $table_name_map = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $table_name = $wpdb->prefix . 'sa_learner_achievements';

        $sql = "SELECT SUM($table_name.rewards_points) as total_reward, $table_name_map.user_id FROM $table_name_map join $table_name on $table_name_map.achievement_id = $table_name.achievement_id  GROUP BY $table_name_map.user_id BETWEEN '$start_date' AND '$end_date'";
        $results = $wpdb->get_results($sql);
        return $results;
    }

    public static function get_rewards_from_acchivement_id($user_id, $achievement_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $results = $wpdb->get_results("SELECT * FROM $table_name WHERE user_id =$user_id and achievement_id = $achievement_id");
        return $results;
    }


    public static function get_rewards_from_acchivement_table($reward_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'sa_learner_achievements';
        $sql = "SELECT * FROM $table_name WHERE achievement_id = $reward_id";
        $results = $wpdb->get_results($sql);
        return $results;
    }
    public static function get_all_rewards()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'sa_learner_achievements';
        $sql = "SELECT * FROM $table_name";

        $results = $wpdb->get_results($sql);
        return $results;
    }
    public static function sal_insert_reward($user_id, $achievement_id)
    {
        global $wpdb;
        $table_rewards = $wpdb->prefix . 'sa_learner_achievements_mapping';


        $user_reward = $wpdb->get_results("SELECT * FROM $table_rewards WHERE user_id =$user_id and achievement_id = $achievement_id");
        if (empty($user_reward)) {
            $wpdb->insert($table_rewards, array(
                'user_id' => $user_id,
                'achievement_id' => $achievement_id,
                'created_at' => date('Y-m-d H:i:s')
            ));
        }
        self::sal_update_remaining_rewards($user_id);
    }
    public static function sal_update_remaining_rewards($user_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'sa_learner_achievements';
        $table_rewards = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $sql = "SELECT SUM($table_name.rewards_points) as total_reward FROM $table_rewards join $table_name on $table_rewards.achievement_id = $table_name.achievement_id WHERE $table_rewards.user_id = $user_id";
        $results = $wpdb->get_results($sql);
        update_user_meta($user_id, 'user_reward', $results[0]->total_reward);
    }
    public static function sal_insert_reward_repeat($user_id, $achievement_id)
    {
        global $wpdb;
        $table_rewards = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $wpdb->insert($table_rewards, array(
            'user_id' => $user_id,
            'achievement_id' => $achievement_id,
            'created_at' => date('Y-m-d H:i:s')
        ));
        self::sal_update_remaining_rewards($user_id);
    }

    static function sa_user_last_login($user_login, $user)
    {


        $registration_achievement_id = self::$registration_achievement_id;

        self::sal_insert_reward($user->ID, $registration_achievement_id);

        if (get_user_meta($user->ID, 'last_login', true)) {
            $last_login = get_user_meta($user->ID, 'last_login', true);
            // time difference in hours from current time
            $diff = round(abs(time() - $last_login) / 3600, 1);
            // time difference in minutes from current time
            $diff_min = round(abs(time() - $last_login) / 60, 1);
            // if user logged in within 10 minutes

            $the_login_date = human_time_diff($last_login);
            // if time diff is less than 24 hours then show the time diff
            if (get_user_meta($user->ID, 'login_day_count', true)) {
                switch ($diff_min) {
                    case $diff_min > 2 && $diff_min < 4:
                        $login_day_count = get_user_meta($user->ID, 'login_day_count', true);
                        $login_day_count++;
                        update_user_meta($user->ID, 'last_login', time());
                        update_user_meta($user->ID, 'login_day_count', $login_day_count);
                        self::sa_user_rewards_for_login($user);
                        break;
                    case $diff_min < 2:
                        $login_day_count = get_user_meta($user->ID, 'login_day_count', true);
                        update_user_meta($user->ID, 'login_day_count', $login_day_count);
                        break;
                    case $diff_min > 4:
                        $login_day_count = 1;
                        update_user_meta($user->ID, 'login_day_count', $login_day_count);
                        update_user_meta($user->ID, 'last_login', time());
                }
            } else {
                update_user_meta($user->ID, 'login_day_count', 1);
            }
        } else {
            update_user_meta($user->ID, 'last_login', time());
        }
    }

    static function sa_user_rewards_for_login($user)
    {
        $login_day_count = 22;
        // $login_day_count = get_user_meta($user->ID, 'login_day_count', true);
        $achievement_id = '';

        if ($login_day_count <= 21) {
            switch ($login_day_count) {
                case 2:
                    $achievement_id = self::$sign_in_id_1;
                    break;
                case 5:
                    $achievement_id = self::$sign_in_id_2;
                    break;
                case  7:
                    $achievement_id = self::$sign_in_id_3;
                    break;
                case 14:
                    $achievement_id = self::$sign_in_id_4;
                    break;
                case 21:
                    $achievement_id = self::$sign_in_id_5;
                    break;
                default:
                    break;
            }
            self::sal_insert_reward($user->ID, $achievement_id);
        } elseif ($login_day_count > 21) {
            $achievement_repeat_id = self::$sign_in_id_6;
            self::sal_insert_reward_repeat($user->ID, $achievement_repeat_id);
        } else {
            return;
        }
    }
    function sa_badgeos_wplms_submit_course($course_id)
    {
        $user_id = get_current_user_id();
        $courses = SaCourse::sa_get_user_courses_by_status($user_id);
        $completed_courses = $courses['complete_courses'];
        $total_courses = count($completed_courses);
        if ($total_courses <= 3) {
            switch ($total_courses) {
                case 1:
                    $achievement_id = self::$course_id_1;
                    break;
                case 2:
                    $achievement_id = self::$course_id_2;
                    break;
                case 3:
                    $achievement_id = self::$course_id_3;
                    break;
            }
            if (!empty($achievement_id)) {
                self::sal_insert_reward($user_id, $achievement_id);
            }
        } elseif ($total_courses > 3) {
            $achievement_id = self::$course_id_4;
            self::sal_insert_reward_repeat($user_id, $achievement_id);
        } else {
            return;
        }
    }


    // reward after registration
    static function sa_user_rewards_for_registration($user_id)
    {
        global $wpdb;
        $table_rewards = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $id = self::$registration_achievement_id;
        $user_registration_rewards = $wpdb->get_results("SELECT * FROM $table_rewards WHERE user_id = $user_id and achievement_id = $id");
        if (empty($user_registration_rewards)) {
            $wpdb->insert($table_rewards, array(
                'user_id' => $user_id,
                'achievement_id' => $id,
                'rewards' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ));
        }
    }
    function sa_wplms_unit_complete($unit_id, $course_progress, $course_id, $user_id)
    {

        $courses = SaCourse::sa_get_user_courses_by_status($user_id);
        $enrolled_courses = $courses['enrolled_courses'];

        $done_units = [];
        $incomplete_units = [];
        foreach ($enrolled_courses as $enrolled_course) {
            $curriculums_enrolled = bp_course_get_full_course_curriculum($enrolled_course['id']);

            foreach ($curriculums_enrolled as $curriculum) {
                if ($curriculum['type'] == 'unit') {
                    if (get_user_meta($user_id, 'complete_unit_' . $curriculum['id'] . '_' . $enrolled_course['id'], true) != "") {
                        $done_units[] = $curriculum['id'];
                    } else {
                        $incomplete_units[] = $curriculum['id'];
                    }
                }
            }
        }

        $curriculums = count($done_units);

        $achievement_id = '';

        // string to integer

        update_user_meta($user_id, 'login_day_count', $curriculums);
        if ($curriculums <= 100) {
            switch ($curriculums) {
                case 10:
                    $achievement_id = self::$unit_id_1;
                    break;
                case 25:
                    $achievement_id = self::$unit_id_2;
                    $unit_id_1 = self::$unit_id_1;
                    self::sal_insert_reward($user_id, $unit_id_1);

                    break;
                case 75:
                    $achievement_id = self::$unit_id_3;
                    $unit_id_1 = self::$unit_id_1;
                    self::sal_insert_reward($user_id, $unit_id_1);
                    $unit_id_2 = self::$unit_id_2;
                    self::sal_insert_reward($user_id, $unit_id_2);
                    break;
                case 100:
                    $achievement_id = self::$unit_id_4;
                    $unit_id_1 = self::$unit_id_1;
                    self::sal_insert_reward($user_id, $unit_id_1);
                    $unit_id_2 = self::$unit_id_2;
                    self::sal_insert_reward($user_id, $unit_id_2);
                    $unit_id_3 = self::$unit_id_3;
                    break;
            }
            if (!empty($achievement_id)) {
                self::sal_insert_reward($user_id, $achievement_id);
            }
        } elseif ($curriculums > 100) {
            $unit_id_1 = self::$unit_id_1;
            self::sal_insert_reward($user_id, $unit_id_1);
            $unit_id_2 = self::$unit_id_2;
            self::sal_insert_reward($user_id, $unit_id_2);
            $unit_id_3 = self::$unit_id_3;
            self::sal_insert_reward($user_id, $unit_id_3);
            $unit_id_4 = self::$unit_id_4;
            self::sal_insert_reward($user_id, $unit_id_4);
            $achievement_id = self::$unit_id_6;
            self::sal_insert_reward_repeat($user_id, $achievement_id);
        } else {
            return;
        }
    }
}
