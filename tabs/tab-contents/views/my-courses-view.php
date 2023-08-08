<?php
$page_title = 'My Courses';
include plugin_dir_path(__FILE__) . '../../tab-parts/page-title.php';
?>
<div class="container-fluid">
    <!-- container-fluid-start  -->
    <?php
    include plugin_dir_path(__FILE__) . '../../tab-parts/page-hero.php';
    ?>

    <!-- Award days banner section -->
    <div class="row award-section">
        <div class="col-md-4 ">
            <div class="white-rounded dash-details">
                <div class="count-number">
                    <span><?php echo count($user_courses['enrolled_courses']) ?></span>
                </div>
                <div class="number-text">
                    <p>Enrolled Courses</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-rounded dash-details">
                <div class="Reward-number">
                    <span><?php echo count($user_courses['complete_courses']) ?></span>
                </div>
                <div class="number-text">
                    <p>Completed Courses</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-rounded dash-details">
                <div class="Reward-number">
                    <span><?php echo count($user_courses['inprogress_courses']) ?></span>
                </div>
                <div class="number-text">
                    <p>In Progress Courses</p>
                </div>
            </div>
        </div>
    </div> <!-- Award days banner section END -->
    <!-- Search Field Start -->
    <div class="search-field">
        <div class="input-group ">
            <input type="text" class="form-control" placeholder="Search my courses..." id="txtSearch" />
            <div class="input-group-btn ">
                <button class="btn btn-primary" style="margin: 0;">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </div>
    </div>
    <!-- Search Field END -->
    <div class="my-course">
        <?php
        if ($user_courses['enrolled_courses']) {
        ?>
            <div class="row" id="sal-my-course">
            <?php
            foreach ($user_courses['enrolled_courses'] as $course) {
                $course_progress = $course['progress'];
                if (empty($course_progress)) {
                    $course_progress = 0;
                }
                include plugin_dir_path(__FILE__) . '../../tab-parts/my-course-card.php';
            }
            echo "</div>";
        }
            ?>
            <!-- row-end -->
            </div>


    </div><!-- container-fluid-end  -->