<?php
$page_title = 'Messages';
include plugin_dir_path(__FILE__) . '../../tab-parts/page-title.php';
?>

<div class="container-fluid h-100">
    <!-- container-fluid-start  -->
    <?php include plugin_dir_path(__FILE__) . '../../tab-parts/page-hero.php'; ?>
    <div class="sal-message">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php
            foreach ($messages as $key => $message) {
                $message_id = $message->ID;
                $message_title = $message->post_title;
                $message_content = $message->post_content;
                $message_date = $message->post_date;
                $message_date = date('d M Y', strtotime($message_date));
                $date_diff = date_diff(date_create($message_date), date_create(date('d M Y')));
                $date_diff = $date_diff->format('%a');
                $month_diff = $date_diff / 30;
                $month_diff = round($month_diff);
                $year_diff = $date_diff / 365;
                $year_diff = round($year_diff);
                $message_date = $date_diff < 30 ?
                    $date_diff . ' days ago' : ($month_diff < 12 ? $month_diff . ' months ago' : $year_diff . ' years ago');
            ?>
                <div class="accordion-item my-4">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $message_id ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $message_id ?>">
                            <a class="btn btn-primary">
                                <?php echo $message_date ?>
                            </a>
                            <h3><?php echo $message_title; ?></h3>
                        </button>
                    </h2>
                    <div id="flush-collapse<?php echo $message_id ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <?php echo $message_content; ?>
                        </div>
                    </div>
                </div>

            <?php

            } ?>

        </div>

    </div>
</div><!-- container-fluid-end  -->