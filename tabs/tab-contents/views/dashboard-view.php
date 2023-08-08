<?php
$page_title = 'Dashboard';
include plugin_dir_path(__FILE__) . '../../tab-parts/page-title.php';
?>
<div class="container-fluid">

    <!-- container-fluid-start  -->
    <?php


    include plugin_dir_path(__FILE__) . '../../tab-parts/page-hero.php';
    ?>


    <div class="circle-box-percentage my-sm-5">

        <div class="allcourse mb-5">
            <h2>Enrolled Courses</h2>
            <div class="circular-progress" data-percent="<?php
                                                            echo is_array($userCourses['enrolled_courses']) ?
                                                                count($userCourses['enrolled_courses']) :
                                                                0; ?>">
                <div class="value-container">0%</div>
            </div>

        </div>
        <div class="allcourse mb-5">
            <h2>Course Completed</h2>
            <div class="circular-progress" data-percent="<?php
                                                            echo is_array($userCourses['complete_courses']) ?
                                                                count($userCourses['complete_courses']) :
                                                                0; ?>">
                <div class="value-container">0%</div>
            </div>

        </div>
        <div class="allcourse mb-5">
            <h2>Course Certificate</h2>
            <div class="circular-progress" data-percent="<?php
                                                            echo is_array($certificate_list) ?
                                                                count($certificate_list) :
                                                                0;
                                                            ?>">
                <div class="value-container">0%</div>
            </div>

        </div>
    </div><!-- percentage circle end-->
    <!-- Award days banner section -->
    <div class="row award-section">
        <div class="col-md-4 mb-3">
            <div class="white-rounded dash-details ">
                <div class="count-number">
                    <span><?php echo $login_day_count ?> <sup><i class="fas fa-arrow-up"></i></sup></span>
                </div>
                <div class="number-text">
                    <p>Days Logged In</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="white-rounded dash-details">
                <div class="Reward-number" style="display: flex;
    align-items: center;">
                    <span style=" margin-right: 10px; ">
                        <?php echo $total_rewards ?></span>
                    <img src="<?php
                                echo
                                plugin_dir_url(dirname(__FILE__)) .
                                    '../../assets/images/award.png' ?>" alt="award" />
                </div>
                <div class="number-text">
                    <p>Reward Points</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="white-rounded dash-details">
                <div class="banner-number" style="display: flex;
    align-items: center;">
                    <span style=" margin-right: 10px; ">
                        <?php
                        echo is_array($userCourses['inprogress_courses']) ?
                            count($userCourses['inprogress_courses']) :
                            0; ?></span>

                    <i style="font-size: 30px;" class="fas fa-chalkboard-teacher"></i>

                </div>
                <div class="number-text">
                    <p>Courses in progress</p>
                </div>
            </div>
        </div>
    </div> <!-- Award days banner section END -->
    <!-- banner offer -->

    <div class="banner-offer">
        <a href="<?php echo $ads_banner_link ?>">
            <img style="
    max-height: 280px;
    width: 100%;
    border-radius: 20px;
" src="<?php echo $ads_banner_url ?>" alt="Offer">
        </a>
    </div>
    <div class="bg-white sa-rounded-theme-1  p-4">
        <h3 class="fs-2 text-left mb-4">Other courses you might like...</h3>
        <div class="row">
            <?php
            foreach ($get_recomended_courses as $course) {
            ?>

                <div class="col-12 col-md-6 col-lg-3 col-sm-6">
                    <!-- col-start  -->
                    <?php include
                        plugin_dir_path(__FILE__) .
                        '../../tab-parts/course-card.php'; ?>
                </div><!-- col-end  -->
            <?php
            }
            ?>
        </div><!-- row--end  -->
    </div>
    <?php
    $leader_board_id = 'monthly_leaderBoard1';
    include plugin_dir_path(__FILE__) .
        '../../tab-parts/dashboard/leader-board.php';
    ?>
    <!--leader-Board  end-->

</div><!-- container-fluid-end  -->