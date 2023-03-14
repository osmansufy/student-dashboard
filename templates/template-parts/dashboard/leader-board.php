<div class="leaderBoard">
            <!--leader-Board -->
            <!-- <div class="row" > -->
            <div class="col-12 col-md-5  white-rounded notification useFlex">
                <?php include(plugin_dir_path(__FILE__) . '../Rewards/leader-board.php'); ?>
            </div><!-- col-notification-end  -->
            <div class="col-12 col-md-5  white-rounded notification useFlex">
                <div class="leaderboard">
                    <h3>Messages</h3>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Subject</th>
                            <th>Date</th>
                        </tr>
                        <?php

                        foreach ($messages as $message) {
                            $message_id = $message->ID;
                            $message_title = $message->post_title;
                            $message_content = $message->post_content;
                            $message_date = $message->post_date;
                            $url = get_permalink($message_id);
                        ?>
                            <tr>
                                <td><a href="<?php echo $url ?>"><?php echo $message_title ?></a></td>
                                <td style="color:black"><?php echo $message_date ?></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div><!-- col-notification-end  -->
            <!-- </div>row--end  -->
        </div>