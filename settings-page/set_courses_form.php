<h4>Recomended Courses for users</h4>

<form method="post" action="<?php echo admin_url('admin-post.php') ?>">
    <?php
    wp_nonce_field("sal_recomended_courses");
    // get all courses from database and show them in a select form element

    $all_args = array(
        'post_type' => 'course',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );
    $recomendedCourses = get_option('recomended_courses');
    $allCourses = get_posts($all_args);
    wp_reset_query();
    ?>
    <select id="recomended_courses" name="recomended_courses[]" multiple>
        <?php foreach ($allCourses as $course) {
            $selected = in_array($course->ID, $recomendedCourses) ? 'selected' : '';
        ?>
            <option <?php echo $selected ?> value="<?php echo $course->ID ?>"><?php echo $course->post_title ?></option>
        <?php }; ?>
    </select>

    <input type="hidden" name="action" value="sal_recomended_courses">
    <?php
    submit_button('Save');
    ?>
</form>