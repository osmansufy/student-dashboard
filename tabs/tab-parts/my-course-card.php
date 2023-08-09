<?php
$Sa_course_class = new SaCourse();
$course_id = $course['id'];
$course_url = get_site_url() . '/courses/' . $course['slug'];

?>
<div class="col-12 col-md-6 col-lg-4 col-sm-6 ">
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
            <h3 class="text-center">
                <a class="sal-course-title " href="<?php echo $course_url ?>">
                    <?php echo $course['title'] ?>
                </a>

            </h3>

            <div style="display: flex; justify-content: space-around; align-items: center; margin-top: 10px;
                flex-wrap: wrap;
                ">
                <div class="sa-custom-course-button">
                    <?php the_course_button($course_id); ?>
                </div>



                <a href="<?php
                            echo get_site_url() . '/certificate' ?>" target="_blank" role="button"
                    class="btn btn-outline-primary btn-lg extra-radius">
                    Order Certificate</a>
            </div>
        </div>
    </div>

</div>