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
                    <h1>Saved Courses</h1>
                </div>
            </section>
            <?php
            $new_wishlist = get_user_meta($user_id, 'wishlist_course', false);
            foreach ($new_wishlist as $i => $cid) {
                if ($i >= $paged) {
                    $wishlist[] = $cid;
                }
            }
            $args = array('post_type' => 'course', 'post__in' => $wishlist, 'orderby' => 'post__in', 'posts_per_page' => -1);
            $the_query = new WP_Query($args);
            while ($the_query->have_posts()) {
                $the_query->the_post();
                global $post;
                echo '<pre>';
                print_r($post->ID);
                echo '</pre>';
            }

            ?>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="other-course">

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 col-sm-6">
                                <!-- col-start  -->
                                <div class="category-box" style="background-image: url('https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/shutterstock_332643533-1709b6af0cc58bf0030a64336c112d8a-1.png');">
                                    <div class="Popular-title-top"><i class="far fa-user"></i> 149 students enrolled </div>
                                    <div class="Popular-title-bottom">Emergency Procedures in the Workplace Certificate
                                        <h3>£20.00</h3>
                                    </div>
                                    <div class="popular-box-overlay">
                                        <p><strong>Emergency Procedures in the Workplace Certificate</strong></p>
                                        <div class="button-box">
                                            <div class="popular-overlay-btn">
                                                <button type="button" class="btn btn-outline-primary btn-lg extra-radius">1 Modules </button>
                                            </div>
                                            <div class="popular-overlay-btn">
                                                <button type="button" class="btn btn-outline-primary btn-lg extra-radius"> 0% Finance </button>
                                            </div>
                                        </div>
                                        <h3>£20.00</h3>
                                        <div class="popular-overlay-btn-btm"> <a href="#" role="button" class="btn btn-outline-primary btn-lg extra-radius nsa_course_more_info">More Info</a> <a href="#" role="button" class="btn btn-outline-primary btn-lg extra-radius">Add to Cart</a>
                                            <a class="saveHeart saveCourse29 nav-item " href="javascript:;" role="button" onclick="saveCourse(29); $('#courseRemove45300').remove();"> <i class="far fa-heart"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-end  -->
                            <div class="col-12 col-md-6 col-lg-4 col-sm-6">
                                <!-- col-start  -->
                                <div class="category-box" style="background-image: url('https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/shutterstock_332643533-1709b6af0cc58bf0030a64336c112d8a-1.png');">
                                    <div class="Popular-title-top"><i class="far fa-user"></i> 149 students enrolled </div>
                                    <div class="Popular-title-bottom">Emergency Procedures in the Workplace Certificate
                                        <h3>£20.00</h3>
                                    </div>
                                    <div class="popular-box-overlay">
                                        <p><strong>Emergency Procedures in the Workplace Certificate</strong></p>
                                        <div class="button-box">
                                            <div class="popular-overlay-btn">
                                                <button type="button" class="btn btn-outline-primary btn-lg extra-radius">1 Modules </button>
                                            </div>
                                            <div class="popular-overlay-btn">
                                                <button type="button" class="btn btn-outline-primary btn-lg extra-radius"> 0% Finance </button>
                                            </div>
                                        </div>
                                        <h3>£20.00</h3>
                                        <div class="popular-overlay-btn-btm"> <a href="#" role="button" class="btn btn-outline-primary btn-lg extra-radius nsa_course_more_info">More Info</a> <a href="#" role="button" class="btn btn-outline-primary btn-lg extra-radius">Add to Cart</a> </div>
                                    </div>
                                </div>
                            </div><!-- col-end  -->
                            <div class="col-12 col-md-6 col-lg-4 col-sm-6">
                                <!-- col-start  -->
                                <div class="category-box" style="background-image: url('https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/shutterstock_332643533-1709b6af0cc58bf0030a64336c112d8a-1.png');">
                                    <div class="Popular-title-top"><i class="far fa-user"></i> 149 students enrolled </div>
                                    <div class="Popular-title-bottom">Emergency Procedures in the Workplace Certificate
                                        <h3>£20.00</h3>
                                    </div>
                                    <div class="popular-box-overlay">
                                        <p><strong>Emergency Procedures in the Workplace Certificate</strong></p>
                                        <div class="button-box">
                                            <div class="popular-overlay-btn">
                                                <button type="button" class="btn btn-outline-primary btn-lg extra-radius">1 Modules </button>
                                            </div>
                                            <div class="popular-overlay-btn">
                                                <button type="button" class="btn btn-outline-primary btn-lg extra-radius"> 0% Finance </button>
                                            </div>
                                        </div>
                                        <h3>£20.00</h3>
                                        <div class="popular-overlay-btn-btm"> <a href="#" role="button" class="btn btn-outline-primary btn-lg extra-radius nsa_course_more_info">More Info</a> <a href="#" role="button" class="btn btn-outline-primary btn-lg extra-radius">Add to Cart</a> </div>
                                    </div>
                                </div>
                            </div><!-- col-end  -->

                        </div><!-- row--end  -->
                    </div>

                    <!-- </div>row--end  -->
                </div>
                <!--leader-Board  end-->

        </div><!-- container-fluid-end  -->
        </section>
    </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>