<?php
$user_id = get_current_user_id();
$course_controller = new SaCourse();
$all_certificates = $course_controller->sa_get_courses_certificates($user_id);
$head = "My Certificates";
$certificate_page = get_option('certificate_page');
$certificate_page_url = get_permalink($certificate_page);
$sal_certificate_banner_image = get_option('sal_certificate_banner_image_url');
$sal_certificate_banner_image_link = get_option('sal_certificate_image_link');
$user_course = $course_controller::sa_get_user_courses_by_status($user_id);
$user_not_completed_courses = $user_course['inprogress_courses'];


?>
<?php include_once('views/learners-certificates-view.php'); ?>