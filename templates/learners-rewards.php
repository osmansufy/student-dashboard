<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    wp_head();
    add_filter('show_admin_bar', '__return_false');




    ?>
</head>

<body>
    <div class="sidebar-menu-farhan">
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>
        <?php
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
        // var_dump($results);
        ?>
        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>My Rewards

                    </h1>
                </div>
            </section>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="row pl-3 pr-3">
                        <div class="col-12 col-md-2">
                            <div class="regular-full pointsEarned text-center pointPicker">
                                <div>
                                    <!-- <label class="control-label" for="user_reward">Company</label> -->
                                    <select id="sa_user_reward" data-userid="<?php echo $user_id ?>" class="sal-reward-select" name="sa_user_reward">
                                        <option value="today">Today</option>
                                        <option value="week">This week</option>
                                        <option value="month">This Month</option>
                                        <option value="year">This Year</option>
                                        <option value="allTime">All Time</option>
                                    </select>
                                </div>
                                <div class="points mr-0">
                                    <p>Points Earned</p>
                                    <h2 id="sal_user_point_earned">
                                        <?php echo $total_reward_today  ?>
                                    </h2>
                                </div>
                            </div>
                        </div><!-- col end -->
                        <div class="col-12 col-md-10">
                            <div class=" regular-full pointsEarned align-items-center">
                                <div class="trophy">
                                    <?php
                                    $total_rewards = SaRewards::get_all_rewards_by_user_id($user_id);
                                    $total_reward = $total_rewards[0]->total_reward;
                                    // var_dump($total_rewards);
                                    if ($total_reward == null) {
                                        $total_reward = 0;
                                    }
                                    if ($total_reward > 12) {
                                        $total_reward = 12;
                                    }
                                    for ($i = 0; $i < $total_reward; $i++) {
                                    ?>
                                        <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy">
                                    <?php

                                    }
                                    ?>

                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/trophy.png" alt="trophy" class="not-earned">

                                </div>
                            </div>
                        </div> <!--  col end -->
                        <div>
                            <?php
                            $user_reward =  get_user_meta($user_id, 'user_remaining_rewards', true);
                            if ($user_reward == null) {
                                $user_reward = 0;
                            }
                            echo '<h2> Reward Reaimaing: ' . $user_reward . '</h2>';
                            ?>
                        </div>
                    </div> <!-- row end -->
                    <div class="col-12 regular-full white-rounded achievements">
                        <h3>Your Achievements</h3>
                        <div class="row">
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
                            // echo "<pre>";
                            // print_r($signedInRewards);
                            // echo "</pre>";
                            ?>
                            <div class="col-12 col-md-4">
                                <ul>
                                    <?php
                                    $user_id = get_current_user_id();
                                    foreach ($signedInRewards as $signedInReward) {

                                        $isActive = SaRewards::get_rewards_from_acchivement_id($user_id, $signedInReward->achievement_id)[0];

                                    ?>
                                        <li <?php
                                            if ($isActive) {
                                                echo 'style="opacity: 0.5;"';
                                            }
                                            ?>>
                                            <?php echo $signedInReward->achievement_name ?>
                                        </li>
                                    <?php

                                    }
                                    ?>

                                </ul>
                            </div>
                            <div class="col-12 col-md-4">
                                <ul>
                                    <?php
                                    foreach ($unitRewards as $reward) {

                                        $isActive = SaRewards::get_rewards_from_acchivement_id($user_id, $reward->achievement_id)[0];

                                    ?>
                                        <li <?php
                                            if ($isActive) {
                                                echo 'style="opacity: 0.5;"';
                                            }
                                            ?>>
                                            <?php echo $reward->achievement_name ?>
                                        </li>
                                    <?php

                                    }
                                    ?>


                                </ul>
                            </div>
                            <div class="col-12 col-md-4">
                                <ul>
                                    <?php
                                    foreach ($otherRewards as $reward) {

                                        $isActive = SaRewards::get_rewards_from_acchivement_id($user_id, $reward->achievement_id)[0];

                                    ?>
                                        <li <?php
                                            if ($isActive) {
                                                echo 'style="opacity: 0.5;"';
                                            }
                                            ?>>
                                            <?php echo $reward->achievement_name ?>
                                        </li>
                                    <?php

                                    }
                                    ?>


                                </ul>
                            </div>
                            <div class="col-12 retext">
                                <p>Only additional rewards points collected after 12/06/21 will apply to your total</p>
                            </div>
                        </div>
                    </div>
                    <div class="Claim-reward">
                        <div class="col-12 col-md-8 white-rounded">
                            <h3>Claimed Rewards</h3>
                            <?php include_once('template-parts/Rewards/claimed-rewards.php'); ?>

                        </div>
                    </div>

                    <div class="leaderBoard mycertificate">
                        <!--leader-Board -->
                        <div class="row">
                            <div class="col-12 col-md-8  white-rounded notification ">

                                <div class="leaderboard">
                                    <h3>Student leaderboard</h3>
                                    <div id="leader_board_table_loading"></div>
                                    <div class="form-group">
                                        <select id="monthly_leaderBoard" class="form-control" name="monthly">
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>

                                        </select>
                                    </div>
                                    <!-- <div class="bs-dropdown" style="float: right;">
                                        <ul class="nav nav-pills" role="tablist">
                                            <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Dropdown <span class="caret"></span> </a>
                                                <ul class="dropdown-menu" id="menu3" aria-labelledby="drop6">
                                                    <li><a href="#">This Month</a></li>
                                                    <li><a href="#">Last Month</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                                <table class="table">
                                    <tbody id="leader_board_table">
                                        <?php
                                        $leaderBoard = SaRewards::get_all_rewards_of_user_id_with_time_range($current_month, $current_date_is);
                                        // short  leaderBoard with rewards
                                        function cmp($a, $b)
                                        {
                                            return strcmp($b->total_reward, $a->total_reward);
                                        }

                                        usort($leaderBoard, "cmp");
                                        $i = 1;
                                        foreach ($leaderBoard as $leader) {
                                        ?>
                                            <tr class="">
                                                <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
                                                    <?php echo _e($i) ?></th>
                                                <th><?php echo _e(strtoupper($leader->display_name)) ?>
                                                    <!---->
                                                </th>
                                                <th><?php echo $leader->total_reward ?> pts</th>
                                                <th>
                                                    <!---->
                                                </th>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div><!-- col-notification-end  -->
                        </div> <!-- row -->
                        <!-- </div>row--end  -->
                    </div>
                    <!--leader-Board  end-->
                    <div class="last-line">
                        <p style="margin: 30px 0; font-size: 16px;   text-align: left;">
                            <em>Please note that language courses do not count towards your rewards totals.</em>

                        </p>
                    </div>
                </div><!-- container-fluid-end  -->
            </section>
        </div>
        </section>
    </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>