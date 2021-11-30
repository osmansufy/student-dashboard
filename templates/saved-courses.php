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
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>

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
                                    <?php include_once('template-parts/course-card.php'); ?>
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