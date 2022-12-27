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
        $sal_submit_ticket_page = get_option('sal_submit_ticket_page');
        $sal_course_feedback_page = get_option('sal_course_feedback_page');
        $sal_help_n_support_page = get_option('sal_help_n_support_page');
        $sal_faq_page = get_option('sal_faq_page');
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
<div style="display: flex;
flex-wrap: wrap;">
    <div style="width: 100%; margin:2rem 0">
        <h3 style="
        text-align: center;
    border: 1px solid;
    border-radius: 5px;
    padding: 10px 0;
    
    ">
            Support Pages for Learners
        </h3>
    </div>
    <div style="width:50%">
        <h4>Submit ticket page</h4>
        <select style="margin:10px 0 ;" id="sal_submit_ticket_page" name="sal_submit_ticket_page">
            <option value="">Select page</option>
            <?php foreach ($all_pages as $page) {
                $selected = $sal_submit_ticket_page == $page->ID ? 'selected' : '';
            ?>
                <option <?php echo $selected ?> value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
            <?php }; ?>
        </select>
    </div>
    <div style="width:50%">
        <h4 style="margin:10px 0 ;">Feedback Page</h4>
        <select style="margin:10px 0 ;" id="sal_course_feedback_page" name="sal_course_feedback_page">
            <option value="">Select page</option>
            <?php foreach ($all_pages as $page) {
                $selected = $sal_course_feedback_page == $page->ID ? 'selected' : '';
            ?>
                <option <?php echo $selected ?> value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
            <?php }; ?>
        </select>
    </div>
    <div style="width:50% ;">
        <h4>Help and support page</h4>
        <select style="margin:10px 0 ;" id="sal_help_n_support_page" name="sal_help_n_support_page">
            <option value="">Select page</option>
            <?php foreach ($all_pages as $page) {
                $selected = $sal_help_n_support_page == $page->ID ? 'selected' : '';
            ?>
                <option <?php echo $selected ?> value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
            <?php }; ?>
        </select>
    </div>
    <div style="width:50% ;">
        <h4>Faqs Page</h4>
        <select style="margin:10px 0 ;" id="sal_faq_page" name="sal_faq_page">
            <option value="">Select page</option>
            <?php foreach ($all_pages as $page) {
                $selected = $sal_faq_page == $page->ID ? 'selected' : '';
            ?>
                <option <?php echo $selected ?> value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
            <?php }; ?>
        </select>
    </div>
</div>
<input type="hidden" name="action" value="sal_recomended_courses">
<?php
submit_button('Save');
?>
</form>