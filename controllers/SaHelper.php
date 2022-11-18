<?php
class SaHelper
{
    public static function convert_to_viewCourses($args)
    {
        $view_courses = new WP_Query($args);
        foreach ($view_courses->posts as $view_course) {
            $view_course->featured_image = get_the_post_thumbnail_url($view_course->ID);
            $view_course->student_count = get_post_meta($view_course->ID, 'vibe_students', true);
            $view_course->average_rating = get_post_meta($view_course->ID, 'average_rating', true);
            $product_id = get_post_meta($view_course->ID, 'vibe_product', true);
            $view_course->sale_price = get_post_meta($product_id, '_sale_price', true);
            $view_course->regular_price = get_post_meta($product_id, '_regular_price', true);
            $view_course->curriculums = bp_course_get_full_course_curriculum($view_course->ID);
            $view_course->product_id = $product_id;
        }
        wp_reset_query();
        return $view_courses->posts;
    }
}

new SaHelper();
