<section class="content-main-body">
    <div class="container-fluid">
        <!-- container-fluid-start  -->
        <?php
        if (is_plugin_active('wplms-wishlist/wplms-wishlist.php')) {
        ?>
        <div class="other-course">
            <?php if (!empty($saved_courses)) { ?>
            <div class="row">
                <?php
                        foreach ($saved_courses as $course) {
                        ?>
                <div class="col-12 col-md-6 col-lg-4 col-sm-6 sal-save-course-wrap_<?php echo $course->ID ?>">
                    <!-- col-start  -->
                    <?php include(plugin_dir_path(__FILE__) . '../template-parts/course-card.php'); ?>
                </div><!-- col-end  -->
                <?php
                        }
                        ?>


            </div><!-- row--end  -->
            <?php
                } else {
                ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info">
                        <p>You have not saved any courses yet.</p>
                    </div>
                </div>
            </div>
            <?php
                }
                ?>
        </div>
        <?php } else { ?>
        <div class="not-active-wishlist">
            <h3>Wishlist plugin is not active</h3>
            <p>Please activate wishlist plugin to see saved courses</p>
            <a target="_blank" href="https://wplms.io/downloads/wplms-wishlist/">
                <button class="btn btn-primary">Download Wishlist</button>
            </a>
        </div>
        <?php } ?>
        <!-- </div>row--end  -->
    </div>
    <!--leader-Board  end-->

</section>