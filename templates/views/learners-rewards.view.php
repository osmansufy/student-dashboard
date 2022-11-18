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
                <div class="col-12 retext">
                    <p>Only additional rewards points collected after 12/06/21 will apply to your total</p>
                </div>
            </div>
        </div>
        <div class="Claim-reward">
            <div class="col-12 col-md-8 white-rounded">
                <h3>Claimed Rewards</h3>
                <?php include_once(plugin_dir_path(__FILE__) . '../template-parts/Rewards/claimed-rewards.php'); ?>

            </div>
        </div>

        <div class="leaderBoard mycertificate">
            <!--leader-Board -->
            <div class="row">
                <div class="col-12 col-md-8  white-rounded notification ">

                    <?php include_once(plugin_dir_path(__FILE__) . '../template-parts/Rewards/leader-board.php'); ?>
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