<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    wp_head();
    add_filter('show_admin_bar', '__return_false');
    ?>
</head>

<body>
    <div class="sidebar-menu-farhan">
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>

        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>My Courses</h1>
                </div>
            </section>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="subscribeUpsell">
                        <a href="#"><i class="fad fa-medal"></i>
                            Get access to all 700+ courses (and MORE) for only £12 per
                            month. Find out more.

                        </a>
                    </div>

                    <!-- Award days banner section -->
                    <div class="row award-section">
                        <div class="col-md-4 ">
                            <div class="white-rounded dash-details">
                                <div class="count-number">
                                    <span>2 <sup><i class="fas fa-arrow-up"></i></sup></span>
                                </div>
                                <div class="number-text">
                                    <p>Days Logged In</p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $user_id = get_current_user_id();

                        $args = array(
                            'post_type'   => 'course',
                            'numberposts' => -1,
                            'post_status' => 'publish'
                        );
                        $enrolledCourses = array();
                        $allCourses = get_posts($args);
                        foreach ($allCourses as $allCourse) {
                            if (wplms_user_course_check($user_id, $allCourse->ID) == 1) {
                                $enrolledCourses[] = $allCourse->ID;
                            }
                        }

                        $course_data = array();
                        if ($enrolledCourses) :
                            foreach ($enrolledCourses as $enrolledCourse) :

                                $product_id = get_post_meta($enrolledCourse, 'vibe_product', true);

                                $curriculums               = bp_course_get_full_course_curriculum($enrolledCourse);
                                $total_duration_in_seconds = 0;
                                foreach ($curriculums as $curriculum) {
                                    if (array_key_exists('id', $curriculum)) $total_duration_in_seconds += bp_course_get_unit_duration($curriculum['id']);
                                }

                                $enrolledCourse_details = get_post($enrolledCourse);
                                $author_id = $enrolledCourse_details->post_author;

                                $course_data[] = array(
                                    'id'                        => $enrolledCourse,
                                    'title'                     => get_the_title($enrolledCourse),
                                    'featured_image'            => get_the_post_thumbnail_url($enrolledCourse),
                                    'progress'                  => bp_course_get_user_progress($user_id, $enrolledCourse),
                                    'category'                  => array(),
                                    'sale_price'                => get_post_meta($product_id, '_sale_price', true),
                                    'regular_price'             => get_post_meta($product_id, '_regular_price', true),
                                    'student_count'             => get_post_meta($enrolledCourse, 'vibe_students', true),
                                    'review_count'              => get_post_meta($enrolledCourse, 'rating_count', true),
                                    'average_rating'            => get_post_meta($enrolledCourse, 'average_rating', true),
                                    'slug'                      => get_post_field('post_name', $enrolledCourse),
                                    'course_status'             => get_user_meta(
                                        $user_id,
                                        'course_status' . $enrolledCourse,
                                        true
                                    ),
                                    'total_duration_in_seconds' => $total_duration_in_seconds,
                                    'author_name'               => get_userdata($author_id)->display_name

                                );



                            endforeach;
                        endif;
                        ?>
                        <div class="col-md-4">
                            <div class="white-rounded dash-details">
                                <div class="Reward-number">
                                    <span>2</span>
                                </div>
                                <div class="number-text">
                                    <p>Reward Points</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="white-rounded dash-details">
                                <div class="Reward-number">
                                    <span>2</span>
                                </div>
                                <div class="number-text">
                                    <p>Reward Points</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Award days banner section END -->
                    <!-- Search Field Start -->
                    <div class="search-field">
                        <form action="https://www.trainingexpress.org.uk/?s=&post_type=course" method="GET">
                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Search my courses..." id="txtSearch" />
                                <div class="input-group-btn ">
                                    <button class="btn btn-primary" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Search Field END -->
                    <div class="my-course">
                        <?php
                        if ($enrolledCourses) {
                        ?>
                            <div class="row">
                                <?php
                                foreach ($course_data as $course) {
                                    $course_progress = $course['progress'];
                                    if (empty($course_progress)) {
                                        $course_progress = 0;
                                    }
                                ?>

                                    <div class="col-12 col-md-6 col-lg-4 col-sm-6">
                                        <!-- col-start  -->
                                        <div class="progress-box" style="  background-image: url('<?php echo $course['featured_image'] ?>');">
                                            <div class="Popular-title-top">
                                                <div class="progress">
                                                    <div role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" class="progressbar bg-secondary" style="width: <?php echo $course_progress ?>%;">
                                                        <?php echo $course_progress ?>%</div>
                                                </div>
                                            </div>
                                            <div class="Popular-title-bottom">
                                                <h3> <?php $course['title'] ?> </h3>
                                                <a href="#" role="button" class="btn btn-outline-primary btn-lg extra-radius">Add to Cart</a>
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
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>