<div class="col-12 col-md-6 col-lg-4 col-sm-6 sal-course-wrapper">
    <!-- col-start  -->
    <div class="progress-box" style="  background-image: url('<?php echo $course['featured_image'] ?>');">
        <div class="Popular-title-top">
            <div class="progress">
                <div role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                    class="progressbar bg-secondary" style="width: <?php echo $course_progress ?>%;">
                    <?php echo $course_progress ?>%</div>
            </div>
        </div>
        <div class="Popular-title-bottom">
            <h3 class="sal-course-title"> <?php echo $course['title'] ?> </h3>
            <a href="<?php echo get_site_url() . '/course/' . $course['slug'] ?>" target="_blank" role="button"
                class="btn btn-outline-primary btn-lg extra-radius">Start Course</a>
            <a href="<?php echo get_site_url() . '/certificate' ?>" target="_blank" role="button"
                class="btn btn-outline-primary btn-lg extra-radius">Order Certificate</a>
        </div>

    </div>
</div>