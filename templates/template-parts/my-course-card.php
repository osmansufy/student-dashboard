<?php
$Sa_course_class = new SaCourse();
$course_id = $course['id'];

?>
<div class="col-12 col-md-6 col-lg-4 col-sm-6 sal-course-wrapper">
    <!-- col-start  -->
    <div class="progress-box" style="background-image: url('<?php echo $course['featured_image'] ?>');">
        <div class="Popular-title-top">
            <div class="progress">
                <div role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                    class="progressbar bg-secondary" style="width: <?php echo $course_progress ?>%;">
                    <?php echo $course_progress ?>%</div>
            </div>
        </div>
        <div class="Popular-title-bottom">
            <h3 class="sal-course-title"> <?php echo $course['title'] ?> </h3>

            <div class="sa-custom-course-button" style="display: flex; justify-content: space-around; align-items: center; margin-top: 10px;
                flex-wrap: wrap;
                ">
                <?php the_course_button($course_id); ?>


                <a href="<?php echo get_site_url() . '/certificate' ?>" target="_blank" role="button"
                    class="btn btn-outline-primary btn-lg extra-radius">Order Certificate</a>
            </div>
        </div>
    </div>

</div>
<!-- col-end  -->

<!--  -->
<!-- <a>
                <?php the_course_button($course_id); ?></a>
            <a role="button" id="start-course-btn-<?php echo $course_id ?>" class="btn start-course-btn btn-outline-primary btn-lg extra-radius" data-user-id="<?php echo $user_id ?>" data-course-id="<?php echo $course_id ?>">Start Course</a> -->
<!--
            <a role="button" id="start-course-loader-<?php echo $course_id ?>"
                class="btn start-course-btn btn-outline-primary btn-lg extra-radius" style="display: none;"><i
                    class="fas fa-spinner fa-1x fa-pulse" style="color: red"></i></a> -->