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
                'posts_per_page' => 8,
                'post_status' => 'publish',
                'post__not_in' => $enrolledCourses,
            );
        } else {
            $args = array(
                'post_type' => 'course',
                'posts_per_page' => 8,
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
            $recommended_course->curriculums = bp_course_get_full_course_curriculum($recommended_course->ID);
            $recommended_course->product_id = $product_id;
        }
        return $recommended_courses->posts;
        // return $recommended_courses;
    }
    static function sa_learners_add_to_cart()
    {
        $product_id = $_POST['product_id'];
        // $user_id = get_current_user_id();
        // $course_id = $_POST['course_id'];
        $product_cart_id = WC()->cart->generate_cart_id($product_id);
        if (!WC()->cart->find_product_in_cart($product_cart_id)) {
            WC()->cart->add_to_cart($product_id);
            // wp_safe_redirect(wc_get_checkout_url());
            // exit();
        }
    }
    function sa_get_courses_by_user($user_id)
    {
        $args = array(
            'post_type'   => 'course',
            'numberposts' => -1,
            'post_status' => 'publish'
        );
        $enrolledCourses = array();
        $allCourses = get_posts($args);
        foreach ($allCourses as $allCourse) {
            if (wplms_user_course_check($user_id, $allCourse->ID) == 1) {
                $enrolledCourses[] = $allCourse->ID;
            }
        }

        $course_data = array();
        if ($enrolledCourses) :
            foreach ($enrolledCourses as $enrolledCourse) :

                $product_id = get_post_meta($enrolledCourse, 'vibe_product', true);

                $curriculums               = bp_course_get_full_course_curriculum($enrolledCourse);
                $total_duration_in_seconds = 0;
                foreach ($curriculums as $curriculum) {
                    if (array_key_exists('id', $curriculum)) $total_duration_in_seconds += bp_course_get_unit_duration($curriculum['id']);
                }

                $enrolledCourse_details = get_post($enrolledCourse);
                $author_id = $enrolledCourse_details->post_author;

                $course_data[] = array(
                    'id'                        => $enrolledCourse,
                    'title'                     => get_the_title($enrolledCourse),
                    'featured_image'            => get_the_post_thumbnail_url($enrolledCourse),
                    'progress'                  => bp_course_get_user_progress($user_id, $enrolledCourse),
                    'category'                  => array(),
                    'sale_price'                => get_post_meta($product_id, '_sale_price', true),
                    'regular_price'             => get_post_meta($product_id, '_regular_price', true),
                    'student_count'             => get_post_meta($enrolledCourse, 'vibe_students', true),
                    'review_count'              => get_post_meta($enrolledCourse, 'rating_count', true),
                    'average_rating'            => get_post_meta($enrolledCourse, 'average_rating', true),
                    'slug'                      => get_post_field('post_name', $enrolledCourse),
                    'course_status'             => get_user_meta(
                        $user_id,
                        'course_status' . $enrolledCourse,
                        true
                    ),
                    'total_duration_in_seconds' => $total_duration_in_seconds,
                    'author_name'               => get_userdata($author_id)->display_name

                );



            endforeach;
        endif;
        return $course_data;
    }
}
// new SaCourse();
