<?php


    $achievements = SaRewards::get_all_rewards();
    $signedInRewards =  array_filter($achievements, function ($achievement) {
        if ($achievement->rewards_type == "Signed in") {
            return $achievement;
        }
    });
    $unitRewards =  array_filter($achievements, function ($achievement) {
        if ($achievement->rewards_type == "Complete modules") {
            return $achievement;
        }
    });
    $otherRewards =  array_filter($achievements, function ($achievement) {
        if ($achievement->rewards_type != "Complete modules" && $achievement->rewards_type != "Signed in") {
            return $achievement;
        }
    });
    $user_id = get_current_user_id();
    $previous_month = date('Y-m-d', strtotime('first day of previous  month'));
    $last_day_prev_month = date('Y-m-d', strtotime('last day of previous  month'));
    $current_month = date('Y-m-d', strtotime('first day of this month'));
    $last_day_current_month = date('Y-m-d H:i:s', strtotime('last day of this month'));
    $day_start = date('Y-m-d 00:00:00');
    $current_date_is = date('Y-m-d H:i:s');
    $results = SaRewards::get_reward_by_date_range($user_id, $day_start, $current_date_is);


    $total_reward_today = intval($results[0]->total_reward);
    if ($total_reward_today == null) {
        $total_reward_today = 0;
    };
    $total_rewards = SaRewards::get_all_rewards_by_user_id($user_id);
    $total_reward = $total_rewards[0]->total_reward;
    // var_dump($total_rewards);
    if ($total_reward == null) {
        $total_reward = 0;
    }
    if ($total_reward > 12) {
        $total_reward = 12;
    }
    $user_reward =  get_user_meta($user_id, 'user_remaining_rewards', true);
    if ($user_reward == null) {
        $user_reward = 0;
    }
    $head = "My Rewards";


    include_once('common-parts/dashboard-head.php');

    include_once('views/learners-rewards.view.php');

    include_once('common-parts/dashboard-footer.php') ?>