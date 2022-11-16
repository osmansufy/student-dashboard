<section class="content-main-body">
    <div class="container-fluid">

        <!-- container-fluid-start  -->
        <div class="subscribeUpsell">
            <a href="#"><i class="fad fa-medal"></i>
                Get access to all 700+ courses (and MORE) for only £12 per
                month. Find out more.

            </a>


        </div>


        <div class="circle-box-percentage">
            <!-- <div class="allcourse">
                            <h2>All course</h2>
                            <div class="circular-progress" data-percent="<?php
                                                                            echo bp_course_get_total_course_count() ?>">
                                >
                                <div class="value-container">0%</div>
                            </div>

                        </div> -->

            <div class="allcourse">
                <h2>Enroll Courses</h2>
                <div class="circular-progress" data-percent="<?php
                                                                echo  is_array($userCourses['enrolled_courses']) ? count($userCourses['enrolled_courses']) : 0; ?>">
                    >
                    <div class="value-container">0%</div>
                </div>

            </div>
            <div class="allcourse">
                <h2>Course Completed</h2>
                <div class="circular-progress" data-percent="<?php
                                                                echo  is_array($userCourses['complete_courses']) ? count($userCourses['complete_courses']) : 0; ?>">
                    >
                    <div class="value-container">0%</div>
                </div>

            </div>
            <div class="allcourse">
                <h2>Course Certificate</h2>
                <div class="circular-progress" data-percent="<?php
                                                                echo  is_array($certificate_list) ? count($certificate_list) : 0; ?>">
                    >
                    <div class="value-container">0%</div>
                </div>
                <!-- <div class="progressdiv" data-percent="10">
                                <svg class="progress_bar" height="250" width="250" id="svg">
                                    <circle id="progressbg" cx="125" cy="125" r="85" stroke-width="29" fill="transparent" stroke-dasharray="753.9822368615503" />
                                    <circle id="progress" class="bar" cx="125" cy="125" r="85" stroke-width="30" fill="transparent" stroke-dasharray="553.9822368615503" />
                                </svg>
                            </div> -->
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
                        <span><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award" /> <?php echo $total_rewards ?></span>
                    </div>
                    <div class="number-text">
                        <p>Reward Points</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="white-rounded dash-banner">
                    <div class="banner-number">
                        <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2019/10/cpd-member.png" alt="cpd">
                        <p>Get access to exclusive student discounts</p>
                        <a href="
                                    <?php echo get_site_url() . '/student-id-card' ?>" class="btn btn-outline-light">GET YOUR STUDENT CARD NOW</a>
                    </div>
                </div>
            </div>
        </div> <!-- Award days banner section END -->
        <!-- banner offer -->

        <div class="banner-offer">
            <a href="#">
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
                        <!-- col-start  -->
                        <?php include(plugin_dir_path(__FILE__) . '../template-parts/course-card.php'); ?>
                    </div><!-- col-end  -->
                <?php
                }
                ?>



            </div><!-- row--end  -->
        </div>
        <div class="leaderBoard">
            <!--leader-Board -->
            <!-- <div class="row" > -->
            <div class="col-12 col-md-5  white-rounded notification useFlex">
                <?php include(plugin_dir_path(__FILE__) . '../template-parts/Rewards/leader-board.php'); ?>
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
                            $url = get_site_url() . '/message/' . $message->post_name;
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
        <!--leader-Board  end-->

    </div><!-- container-fluid-end  -->
</section>