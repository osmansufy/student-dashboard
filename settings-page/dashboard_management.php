<div>
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
        $page_args = array(
            'post_type' => 'page',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        );
        $student_portal_page = get_option('student_portal_page');
        $unlimited_learning_page = get_option('unlimited_learning_page');
        $recomended_friends_page = get_option('recomended_friends_page');
        $certificate_page = get_option('certificate_page');
        $all_pages = get_posts($page_args);
        ?>
        <select id="recomended_courses" name="recomended_courses[]" multiple>
            <?php foreach ($allCourses as $course) {
                $selected = in_array($course->ID, $recomendedCourses) ? 'selected' : '';
            ?>
                <option <?php echo $selected ?> value="<?php echo $course->ID ?>"><?php echo $course->post_title ?></option>
            <?php }; ?>
        </select>
</div>
<div style="margin:20px 0 ;">
    <h4>Student portal page</h4>
    <select style="margin:10px 0 ;" id="student_portal_page" name="student_portal_page">
        <option value="">Select page</option>
        <?php foreach ($all_pages as $page) {
            $selected = $student_portal_page == $page->ID ? 'selected' : '';
        ?>
            <option <?php echo $selected ?> value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
        <?php }; ?>
    </select>
</div>
<div style="margin:20px 0 ;">
    <h4 style="margin:10px 0 ;">Unlimited Learning page</h4>
    <select style="margin:10px 0 ;" id="unlimited_learning_page" name="unlimited_learning_page">
        <option value="">Select page</option>
        <?php foreach ($all_pages as $page) {
            $selected = $unlimited_learning_page == $page->ID ? 'selected' : '';
        ?>
            <option <?php echo $selected ?> value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
        <?php }; ?>
    </select>
</div>
<div>
    <h4 style="margin:10px 0 ;">Recommend Friends page</h4>
    <select style="margin:10px 0 ;" id="recomended_friends_page" name="recomended_friends_page">
        <option value="">Select page</option>
        <?php foreach ($all_pages as $page) {
            $selected = $recomended_friends_page == $page->ID ? 'selected' : '';
        ?>
            <option <?php echo $selected ?> value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
        <?php }; ?>
    </select>
</div>
<div>
    <h4 style="margin:10px 0 ;">Certificate page</h4>
    <select style="margin:10px 0 ;" id="certificate_page" name="certificate_page">
        <option value="">Select page</option>
        <?php foreach ($all_pages as $page) {
            $selected = $certificate_page == $page->ID ? 'selected' : '';
        ?>
            <option <?php echo $selected ?> value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
        <?php }; ?>
    </select>
</div>
<input type="hidden" name="action" value="sal_recomended_courses">
<?php
submit_button('Save');
?>
</form>