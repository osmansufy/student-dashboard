<?php

use Elementor\Modules\WpCli\Update;

class SaRewards
{
    public function __construct()
    {
    }
    static function sa_user_last_login($user_login, $user)
    {
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
                }
            } else {
                update_user_meta($user->ID, 'login_day_count', 1);
            }

            update_user_meta($user->ID, 'last_login', time());
        } else {
            update_user_meta($user->ID, 'last_login', time());
        }
        if (!get_user_meta($user->ID, 'rewards', true)) {
            update_user_meta($user->ID, 'rewards', 1);
        }
    }

    static function sa_user_rewards_for_login($user)
    {
        $login_day_count = get_user_meta($user->ID, 'login_day_count', true);
        $rewards = get_user_meta($user->ID, 'rewards', true);
        if ($rewards) {
            if ($login_day_count <= 21) {
                switch ($login_day_count) {
                    case 2:
                        $rewards++;
                        break;
                    case 5:
                        $rewards++;
                        break;
                    case  7:
                        $rewards++;
                        break;
                    case 14:
                        $rewards++;
                        break;
                    case 21:
                        $rewards++;
                        break;
                    default:
                        $rewards = $rewards;
                        break;
                }
            } elseif ($login_day_count > 21) {
                $rewards = $rewards + 2;
            }
            update_user_meta($user->ID, 'rewards', $rewards);
        } else {
            // if user has no rewards then insert rewards
            update_user_meta($user->ID, 'rewards', 1);
        }
    }
    function sa_badgeos_wplms_submit_course($course_id)
    {
        echo '<pre>';
        print_r($course_id);
        echo '</pre>';
    }
    function sa_wplms_unit_complete($unit_id, $course_progress, $course_id, $user_id)
    {
        $courses = SaCourse::sa_get_user_courses_by_status($user_id);
        $completed_courses = $courses['complete_courses'];
        $curriculums = 0;
        foreach ($completed_courses as $key => $value) {
            $courseId = $value;
            $curriculums = $curriculums + count(bp_course_get_full_course_curriculum($courseId));
        }
        $curriculums = $curriculums + count(bp_course_get_full_course_curriculum($course_id));

        global $wpdb;
        $table_name = $wpdb->prefix . 'sa_learner_achievements_mapping';
        $wpdb->insert(
            $table_name,
            [
                'user_id' => $user_id,
                'achievement_id' => 25,
                'achievement_name' => 'Complete 10 modules',
                'achievement_type' => 'Complete  modules',
                'reward_points' => 1,
                'reward_type' => 'points',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                '%d',
                '%d',
                '%s',
                '%s',
                '%d',
                '%s',
                '%s',
            ]
        );
    }
}
