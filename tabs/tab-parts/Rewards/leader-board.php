<?php
$current_month = date('Y-m-d', strtotime('first day of this month'));
$current_date_is = date('Y-m-d H:i:s');
$leaderBoard = SaRewards::get_all_rewards_of_user_id_with_time_range($current_month, $current_date_is);
?>
<div class="bg-white  sa-rounded-theme-1 p-4 ">
    <div class="d-flex justify-content-between">
        <h3>Student leaderboard</h3>
        <div id="leader_board_table_loading"></div>
        <div class="form-group">
            <select id="<?php echo $leader_board_id ?>" style="-webkit-appearance: button;"
                class="form-control monthly_leaderBoard" name="monthly">
                <option value="this_month">This Month</option>
                <option value="last_month">Last Month</option>

            </select>
        </div>
    </div>
    <table class="table ">
        <tbody id="<?php echo $leader_board_id ?>-table">
            <?php

            $i = 1;
            foreach ($leaderBoard as $leader) {
            ?>
            <tr class="border-0 d-flex justify-content-between align-items-center">
                <th class="border-0"><img style="
    padding: 0 0.5rem;
" src="<?php echo plugin_dir_url(dirname(__FILE__)) . '../../assets/images/award.png' ?>" alt="award">
                    <?php echo _e($i) ?></th>
                <th class="border-0"><?php echo _e(strtoupper($leader->display_name)) ?>
                    <!---->
                </th>
                <th class="border-0"><?php echo $leader->total_reward ?> pts</th>

            </tr>
            <?php
                $i++;
            }
            ?>

        </tbody>
    </table>
</div>