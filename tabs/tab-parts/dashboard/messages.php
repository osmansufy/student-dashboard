<div class="bg-white w-100 sa-rounded-theme-1 p-3">

    <h3 class="text-center mt-3 mb-4">Messages</h3>

    <div class="w-75 mx-auto">

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php

            foreach ($messages as $message) {
                $message_id = $message->ID;
                $message_title = $message->post_title;
                $message_content = $message->post_content;
                $message_date = $message->post_date;
                $url = get_permalink($message_id);
            ?>
                <?php include plugin_dir_path(__FILE__) . './single-message.php'; ?>
            <?php
            }
            ?>
        </div>



    </div>

</div>