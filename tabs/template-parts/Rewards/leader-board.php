<?php
$current_month = date('Y-m-d', strtotime('first day of this month'));
$current_date_is = date('Y-m-d H:i:s');
$leaderBoard = SaRewards::get_all_rewards_of_user_id_with_time_range($current_month, $current_date_is);
?>
<div class="leaderboard">
    <h3>Student leaderboard</h3>
    <div id="leader_board_table_loading"></div>
    <div class="form-group">
        <select style="-webkit-appearance: button;" class="form-control monthly_leaderBoard" name="monthly">
            <option value="this_month">This Month</option>
            <option value="last_month">Last Month</option>

        </select>
    </div>
</div>
<table class="table">
    <tbody id="leader_board_table">
        <?php

        $i = 1;
        foreach ($leaderBoard as $leader) {
        ?>
            <tr class="">
                <th style="
    display: flex;
    align-items: center;
"><img style="
    padding: 0 0.5rem;
" src="<?php echo plugin_dir_url(dirname(__FILE__)) . '../../assets/images/award.png' ?>" alt="award">
                    <?php echo _e($i) ?></th>
                <th style="text-align: center;
                vertical-align: middle;
                "><?php echo _e(strtoupper($leader->display_name)) ?>
                    <!---->
                </th>
                <th style="vertical-align: middle;"><?php echo $leader->total_reward ?> pts</th>
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