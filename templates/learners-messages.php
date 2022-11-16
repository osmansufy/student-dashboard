<?php
$head = "My Courses";

include_once('common-parts/dashboard-head.php');

// get all messages type post 

$args = array(
    'post_type' => 'message',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
);

$messages = get_posts($args);
wp_reset_query();

?>

<section class="content-main-body">
    <div class="container-fluid">
        <!-- container-fluid-start  -->
        <div class="container-fluid">
            <!-- container-fluid-start  -->
            <div class="subscribeUpsell">
                <a href="#"><i class="fad fa-medal"></i>
                    Get access to all 700+ courses (and MORE) for only £12 per
                    month. Find out more.
                </a>
            </div>
            <div class="sal-message">
                <div class="panel-group" id="accordion">
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
                        $message_date = $date_diff < 30 ? $date_diff . ' days ago' : ($month_diff < 12 ? $month_diff . ' months ago' : $year_diff . ' years ago');
                    ?>
                        <div class="panel panel-default">
                            <div class="panel-heading accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <a class="btn btn-primary">
                                            <?php echo $message_date ?>

                                        </a>
                                        <h3><?php
                                            echo $message_title;
                                            ?></h3>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <?php
                                    echo $message_content;
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div><!-- container-fluid-end  -->
</section>
<?php include_once('common-parts/dashboard-footer.php') ?>