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
            $user_id = get_current_user_id();
            $saved_courses = SaCourse::sa_get_saved_courses($user_id);
            //  check product is in cart or not
            function is_product_in_cart($product_id)
            {
                $product_cart_id = WC()->cart->generate_cart_id($product_id);
                if (WC()->cart->find_product_in_cart($product_cart_id)) {
                    return true;
                }
                return false;
            }


            ?>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="other-course">

                        <div class="row">
                            <?php
                            foreach ($saved_courses as $course) {
                            ?>
                                <div class="col-12 col-md-6 col-lg-4 col-sm-6 sal-save-course-wrap_<?php echo $course->ID ?>">
                                    <!-- col-start  -->
                                    <div class="category-box" style="background-image: url('<?php echo $course->featured_image ?>');">
                                        <div class="Popular-title-top"><i class="far fa-user"></i> 149 students enrolled </div>
                                        <div class="Popular-title-bottom"><?php echo $course->post_title; ?>
                                            <h3>£<?php
                                                    echo $course->sale_price;
                                                    ?></h3>
                                        </div>
                                        <div class="popular-box-overlay">
                                            <p><strong><?php echo $course->post_title; ?></strong></p>
                                            <div class="button-box">
                                                <div class="popular-overlay-btn">
                                                    <button type="button" class="btn btn-outline-primary btn-lg extra-radius"> <?php echo count($course->curriculums) ?> Modules </button>
                                                </div>
                                                <div class="popular-overlay-btn">
                                                    <button type="button" class="btn btn-outline-primary btn-lg extra-radius"> 0% Finance </button>
                                                </div>
                                            </div>
                                            <h3>£<?php
                                                    echo $course->sale_price;
                                                    ?></h3>
                                            <div class="popular-overlay-btn-btm">

                                                <a href="<?php echo get_site_url() . '/course/' . $course->post_name ?>" role="button" class="btn btn-outline-primary btn-lg extra-radius nsa_course_more_info">More Info</a>

                                                <?php
                                                if (!is_product_in_cart($course->product_id)) {

                                                ?>
                                                    <a role="button" data-course-title="<?php echo $course->post_title ?>" data-product_id="<?php echo $course->product_id ?>" class="btn btn-outline-primary btn-lg extra-radius sal_add_to_cart_button
                                                    sa-cart-btn_<?php echo $course->product_id ?>
                                                    ">Add to Cart</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?php echo wc_get_cart_url() ?>" target="_blank" role="button" class="btn sa-go-to-cart btn-outline-primary btn-lg extra-radius">
                                                        Go to cart
                                                    </a>
                                                <?php
                                                }

                                                ?>
                                                <a href="<?php echo wc_get_cart_url() ?>" role="button" target="_blank" class="btn sa-go-to-cart btn-outline-primary btn-lg extra-radius  sa-gotoCart-btn_<?php echo $course->product_id ?>" style="display:none">
                                                    Go to cart
                                                </a>
                                                <a class="saveHeart sal-remove-wishlist saveCourse29 nav-item  active " data-user_id="<?php echo $user_id ?>" data-course_id="<?php echo $course->ID ?>">

                                                    <i class="far fa-heart"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col-end  -->
                            <?php
                            }
                            ?>


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