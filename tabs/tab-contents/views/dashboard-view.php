<div>
    <?php
    include plugin_dir_path(__FILE__) . '../../template-parts/page-hero.php';
    ?>
    <div class="circle-box-percentage">
        <div class="allcourse">
            <h2>Enrolled Courses</h2>
            <div class="circular-progress" data-percent="<?php echo $enrolled_courses_count ?>">
                <div class="value-container">0%</div>
            </div>

        </div>
        <div class="allcourse">
            <h2>Course Completed</h2>
            <div class="circular-progress" data-percent="<?php
                                                            echo $complete_courses_count ?>">
                <div class="value-container">0%</div>
            </div>

        </div>
        <div class="allcourse">
            <h2>Course Certificate</h2>
            <div class="circular-progress" data-percent="<?php echo $certificate_count ?>">
                <div class="value-container">0%</div>
            </div>

        </div>
    </div><!-- percentage circle end-->
    <!-- Award days banner section -->
    <div class="row award-section">
        <div class="col-md-4 ">
            <div class="white-rounded dash-details">
                <div class="count-number">
                    <span><?php echo $login_day_count ?> <sup><i class="fas fa-arrow-up"></i></sup></span>
                </div>
                <div class="number-text">
                    <p>Days Logged In</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-rounded dash-details">
                <div class="Reward-number">
                    <span><img src="<?php echo
                                    plugins_url('sa-learners-dashboard/assets/images/award.png')
                                    ?>" alt="award" /> <?php echo $total_rewards ?></span>
                </div>
                <div class="number-text">
                    <p>Reward Points</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-rounded dash-details">
                <div class="banner-number">
                    <a href="<?php echo $certificate_image_link ?>">
                        <img src="<?php echo $certificate_image ?>" alt="cpd">

                    </a>
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
    <div class="other-course">
        <h3 class="Title">Other courses you might like...</h3>
        <div class="row">
            <?php
            foreach ($get_recomended_courses as $course) {
            ?>

                <div class="col-12 col-md-6 col-lg-3 col-sm-6">
                    <?php include plugin_dir_path(__FILE__) . '../../template-parts/course-card.php'; ?>
                    <!-- col-start  -->
                </div><!-- col-end  -->
            <?php
            }
            ?>
        </div><!-- row--end  -->
    </div>
    <?php
    include plugin_dir_path(__FILE__) . '../../template-parts/dashboard/leader-board.php';
    ?>
</div>