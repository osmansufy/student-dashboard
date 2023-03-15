<section class="content-main-body">
    <div class="container-fluid">
        <!-- container-fluid-start  -->
        <?php
include plugin_dir_path(__FILE__) . '../template-parts/page-hero.php';
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
                        <p>Inprogress Courses</p>
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
        ?>

                <div class="col-12 col-md-6 col-lg-4 col-sm-6 sal-course-wrapper">
                    <!-- col-start  -->
                    <div class="progress-box"
                        style="  background-image: url('<?php echo $course['featured_image'] ?>');">
                        <div class="Popular-title-top">
                            <div class="progress">
                                <div role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    class="progressbar bg-secondary" style="width: <?php echo $course_progress ?>%;">
                                    <?php echo $course_progress ?>%</div>
                            </div>
                        </div>
                        <div class="Popular-title-bottom">
                            <h3 class="sal-course-title"> <?php echo $course['title'] ?> </h3>
                            <a href="<?php echo get_site_url() . '/course/' . $course['slug'] ?>" target="_blank"
                                role="button" class="btn btn-outline-primary btn-lg extra-radius">Start Course</a>
                        </div>

                    </div>
                </div>
                <!-- col-end  -->
                <?php
}
    echo "</div>";
}
?>
                <!-- row-end -->
            </div>


        </div><!-- container-fluid-end  -->
</section>