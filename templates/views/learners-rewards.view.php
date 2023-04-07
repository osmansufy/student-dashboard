<?php
// rewards type array with value and label
$rewards_date_types = array(
    'today' => array(
        'value' => 'today',
        'label' => 'Today',
    ),
    'week' => array(
        'value' => 'week',
        'label' => 'This Week',
    ),
    'month' => array(
        'value' => 'month',
        'label' => 'This Month',
    ),
    'year' => array(
        'value' => 'year',
        'label' => 'This Year',
    ),
    'allTime' => array(
        'value' => 'allTime',
        'label' => 'All Time',
    ),
);

?>
<section class="content-main-body">
    <div class="container-fluid">
        <!-- container-fluid-start  -->
        <div class="row pl-3 pr-3">
            <div class="col-12 col-md-2">
                <div class="regular-full pointsEarned text-center pointPicker">
                    <div>
                        <!-- <label class="control-label" for="user_reward">Company</label> -->
                        <select id="sa_user_reward" data-userid="<?php echo $user_id ?>" style="-webkit-appearance: button;
    background-image: none;" class=" sal-reward-select" name="sa_user_reward">
                            <?php foreach ($rewards_date_types as $rewards_date_type) { ?>
                                <option value="<?php echo $rewards_date_type['value'] ?>">
                                    <?php echo $rewards_date_type['label'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="points mr-0">
                        <p>Points Earned</p>
                        <h2 id="sal_user_point_earned">
                            <?php echo $total_reward_today ?>
                        </h2>
                    </div>
                </div>
            </div><!-- col end -->
            <div class="col-12 col-md-10">
                <div class=" regular-full pointsEarned align-items-center">
                    <div class="trophy">
                        <?php

                        for ($i = 0; $i < $total_reward; $i++) {
                            $image_src = plugin_dir_url(dirname(__FILE__)) . '../assets/images/award.png';
                        ?>
                            <img src="<?php echo $image_src ?>" style="margin:0 5px ;" alt="trophy">
                        <?php

                        }
                        ?>


                    </div>
                </div>
            </div> <!--  col end -->
            <div>
                <?php

                echo '<h2> Reward Reaimaing: ' . $user_reward . '</h2>';
                ?>
            </div>
        </div> <!-- row end -->
        <div class="col-12 regular-full white-rounded achievements">
            <h3>Your Achievements</h3>
            <div class="row">

                <div class="col-12 col-md-4">
                    <ul>
                        <?php
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

            </div>
        </div>
        <div class="Claim-reward">
            <div class="col-12 col-md-8 white-rounded">
                <h3>Claimed Rewards</h3>
                <?php include_once plugin_dir_path(__FILE__) . '../template-parts/Rewards/claimed-rewards.php'; ?>

            </div>
        </div>

        <div class="leaderBoard mycertificate">
            <!--leader-Board -->
            <div class="row">
                <div class="col-12 col-md-8  white-rounded notification ">

                    <?php include_once plugin_dir_path(__FILE__) . '../template-parts/Rewards/leader-board.php'; ?>
                </div><!-- col-notification-end  -->
            </div> <!-- row -->
            <!-- </div>row--end  -->
        </div>
        <!--leader-Board  end-->

    </div><!-- container-fluid-end  -->
</section>