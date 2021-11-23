<?php
class SaCourse
{
    function __construct()
    {
    }
    static function get_recommended_courses($user_id)
    {
        $args = array(
            'post_type' => 'course',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        );


        $allCourses = get_posts($args);
        $enrolledCourses = array();
        foreach ($allCourses as $allCourse) {
            if (wplms_user_course_check($user_id, $allCourse->ID) == 1) {
                $enrolledCourses[] = $allCourse->ID;
            }
        }
        if (!empty($enrolledCourses)) {
            $args = array(
                'post_type' => 'course',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'post__not_in' => $enrolledCourses,
            );
        } else {
            $args = array(
                'post_type' => 'course',
                'posts_per_page' => -1,
                'post_status' => 'publish',
            );
        }
        $recommended_courses = new WP_Query($args);
        foreach ($recommended_courses->posts as $recommended_course) {
            $recommended_course->featured_image = get_the_post_thumbnail_url($recommended_course->ID);
            $recommended_course->student_count = get_post_meta($recommended_course->ID, 'vibe_students', true);
            $recommended_course->average_rating = get_post_meta($recommended_course->ID, 'average_rating', true);
            $product_id = get_post_meta($recommended_course->ID, 'vibe_product', true);
            $recommended_course->sale_price = get_post_meta($product_id, '_sale_price', true);
            $recommended_course->regular_price = get_post_meta($product_id, '_regular_price', true);
            // $$recommended_course->curriculums = bp_course_get_full_course_curriculum($recommended_course->ID);
        }
        return $recommended_courses->posts;
        // return $recommended_courses;
    }
}
// new SaCourse();
