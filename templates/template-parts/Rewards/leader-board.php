<?php
$current_month = date('Y-m-d', strtotime('first day of this month'));
$current_date_is = date('Y-m-d H:i:s');
?>
<div class="leaderboard">
    <h3>Student leaderboard</h3>
    <div id="leader_board_table_loading"></div>
    <div class="form-group">
        <select id="monthly_leaderBoard" class="form-control" name="monthly">
            <option value="this_month">This Month</option>
            <option value="last_month">Last Month</option>

        </select>
    </div>
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