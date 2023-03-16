    <div class="leaderboard">
        <h3 style="
    text-align: center;
        width: 100%;
    ">Messages</h3>
    </div>
    <div style="
    height: 100%;
    width: 80%;
    padding: 10px;">
        <div style="  color: black;
    display: flex;
    justify-content: space-between;">
            <h4>Subject</h4>
            <h4 style="text-align:center;margin: 0 4rem;">Date</th>
        </div>
        <div class="panel-group" id="accordion">
            <?php

foreach ($messages as $message) {
    $message_id = $message->ID;
    $message_title = $message->post_title;
    $message_content = $message->post_content;
    $message_date = $message->post_date;
    $url = get_permalink($message_id);
    ?>
            <?php include plugin_dir_path(__FILE__) . './single-message.php';?>
            <?php
}
?>
        </div>

    </div>