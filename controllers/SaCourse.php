<?php
class SaCourse
{
    function __construct()
    {
    }
    static function get_recommended_courses($user_id)
    {
        $all_args = array(
            'post_type' => 'course',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        );


        $allCourses = get_posts($all_args);
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
        return SaHelper::convert_to_viewCourses($args);
        // $recommended_courses = new WP_Query($args);
        // foreach ($recommended_courses->posts as $recommended_course) {
        //     $recommended_course->featured_image = get_the_post_thumbnail_url($recommended_course->ID);
        //     $recommended_course->student_count = get_post_meta($recommended_course->ID, 'vibe_students', true);
        //     $recommended_course->average_rating = get_post_meta($recommended_course->ID, 'average_rating', true);
        //     $product_id = get_post_meta($recommended_course->ID, 'vibe_product', true);
        //     $recommended_course->sale_price = get_post_meta($product_id, '_sale_price', true);
        //     $recommended_course->regular_price = get_post_meta($product_id, '_regular_price', true);
        //     $recommended_course->curriculums = bp_course_get_full_course_curriculum($recommended_course->ID);
        //     $recommended_course->product_id = $product_id;
        // }

        // return $recommended_courses->posts;
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
    static function sa_get_courses_by_user($user_id)
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
            wp_reset_query();
        endif;
        return $course_data;
    }
    function sa_get_courses_certificates($user_id)
    {
        $user_id = get_current_user_id();
        $all_course_ids = bp_course_get_user_certificates($user_id);

        $certificate_link_list = array();
        if ($all_course_ids && is_array($all_course_ids)) {
            foreach ($all_course_ids as $course_id) {
                $certificate_meta = 'course_' . $course_id . '_certificate_pdf_url';
                $certificate_purchased = get_user_meta($user_id, $certificate_meta, true);


                $certificate_info = new stdClass();
                if ($certificate_purchased) {
                    $certificate_info->course_id = $course_id;
                    $certificate_info->title = get_the_title($course_id);
                    $certificate_info->featured_image = get_the_post_thumbnail_url($course_id);
                    $certificate_info->slug = get_post_field('post_name', $course_id);
                    $certificate_info->certificate_url = $certificate_purchased;
                    $certificate_info->course_duration = get_post_meta($course_id, 'vibe_duration', true);
                    $certificate_info->is_course_purchased = true;
                } else {
                    $certificate_info->id = $course_id;
                    $certificate_info->title = get_the_title($course_id);
                    $certificate_info->featured_image = get_the_post_thumbnail_url($course_id);
                    $certificate_info->slug = get_post_field('post_name', $course_id);
                    $certificate_info->certificate_url = '';
                    $certificate_info->is_course_purchased = false;
                }
                $certificate_link_list[] = $certificate_info;
            }
            wp_reset_query();
        }
        return $certificate_link_list;
    }
    function sal_get_wplms_certificates($user_id)
    {
        $user_id = get_current_user_id();
        $all_course_ids = bp_course_get_user_certificates($user_id);

        $certificate_link_list = array();
        if (!empty($all_course_ids)) {
            foreach ($all_course_ids as $course_id) {
                $certificate_info = new stdClass();
                $args = array(
                    'course_id' => $course_id,
                    'user_id' => $user_id
                );
                $certificate_link = bp_get_course_certificate($args);
                $certificate_info->course_id = $course_id;
                $certificate_info->title = get_the_title($course_id);
                $certificate_info->link = $certificate_link;
                $certificate_info->slug = get_post_field('post_name', $course_id);
                $certificate_link_list[] = $certificate_info;
            }
        }

        return $certificate_link_list;
    }
    static function sa_get_saved_courses($user_id)
    {
        $new_wishlist = get_user_meta($user_id, 'wishlist_course', false);
        // $values = array_values($new_wishlist);
        $args = array('post_type' => 'course', 'post__in' => $new_wishlist, 'orderby' => 'post__in', 'posts_per_page' => -1);
        if (!empty($new_wishlist)) {
            $saved_courses = new WP_Query($args);
            foreach ($saved_courses->posts as $saved_course) {
                $saved_course->featured_image = get_the_post_thumbnail_url($saved_course->ID);
                $saved_course->student_count = get_post_meta($saved_course->ID, 'vibe_students', true);
                $saved_course->average_rating = get_post_meta($saved_course->ID, 'average_rating', true);
                $product_id = get_post_meta($saved_course->ID, 'vibe_product', true);
                $saved_course->sale_price = get_post_meta($product_id, '_sale_price', true);
                $saved_course->regular_price = get_post_meta($product_id, '_regular_price', true);
                $saved_course->curriculums = bp_course_get_full_course_curriculum($saved_course->ID);
                $saved_course->product_id = $product_id;
            }
            wp_reset_query();
            return $saved_courses->posts;
        } else {
            return array();
        }
    }
    // remove course from wishlist 
    static function sa_remove_from_wishlist()
    {
        $course_id = $_POST['course_id'];
        $user_id = $_POST['user_id'];
        $new_wishlist = get_user_meta($user_id, 'wishlist_course', false);
        $values = array_values($new_wishlist);
        $key = array_search($course_id, $values);
        if ($key !== false) {
            delete_user_meta($user_id, 'wishlist_course', $course_id);
            wp_send_json_success(['message' => 'Course Deleted from wishlist', 'status' => 'success']);
        } else {
            wp_send_json_error(['message' => 'Error during remove course from wishlist ', 'status' => 'error']);
        }
        die();
    }
    static function sa_get_user_courses_by_status($user_id)
    {
        $enrolledCourses = self::sa_get_courses_by_user($user_id);
        $complete_courses = array();
        $inprogress_courses = array();
        foreach ($enrolledCourses as $course) {
            $progress = bp_course_get_user_progress($user_id, $course['id']);
            if ($progress > 99) {
                $complete_courses[] =  $course['id'];
            } else {
                $inprogress_courses[] = $course['id'];
            }
        }
        $courses_status = array(
            'complete_courses' => $complete_courses,
            'enrolled_courses' => $enrolledCourses,
            'inprogress_courses' => $inprogress_courses
        );
        return $courses_status;
    }
    public static function get_completed_unit($user_id)
    {
        $courses = self::sa_get_user_courses_by_status($user_id);
        $enrolled_courses = $courses['enrolled_courses'];

        $done_units = [];
        $incomplete_units = [];
        foreach ($enrolled_courses as $enrolled_course) {
            $curriculums_enrolled = bp_course_get_full_course_curriculum($enrolled_course['id']);

            foreach ($curriculums_enrolled as $curriculum) {
                if ($curriculum['type'] == 'unit') {
                    if (get_user_meta($user_id, 'complete_unit_' . $curriculum['id'] . '_' . $enrolled_course['id'], true) != "") {
                        $done_units[] = $curriculum['id'];
                    } else {
                        $incomplete_units[] = $curriculum['id'];
                    }
                }
            }
        }
        $completed_units = array(
            'done_units' => $done_units,
            'incomplete_units' => $incomplete_units
        );
        return $completed_units;
    }
}
// new SaCourse();
