<?php




$user_id = get_current_user_id();
$course_controller = new SaCourse();
$all_certificates = $course_controller->sa_get_courses_certificates($user_id);


// echo '<pre>';
// print_r($user_id);
// print_r($all_certificates);
// echo '</pre>';


// $user_id = get_current_user_id();
// $all_course_ids = bp_course_get_user_certificates($user_id);
// $server_url = site_url() . '/wp-content/uploads/course_certificates/';
// $aws_url = '********************************************/course_certificates/';
// $certificate_link_list = array();
// foreach ($all_course_ids as $course_id) {
//     $certificate_meta = 'course_' . $course_id . '_certificate_pdf_url';
//     $certificate_purchased = get_user_meta($user_id, $certificate_meta, true);
//     if ($certificate_purchased) {
//         $check_on_server = $server_url . $course_id . 'c' . $user_id;
//         if (file_get_contents($certificate_purchased)) {
//             $certificate_link = '<a href="' . $certificate_purchased . '" target="_blank">Download Certificate</a>';
//         } else {
//             $check_on_aws = $aws_url . $course_id . 'c' . $user_id;
//             if (file_get_contents($check_on_aws)) {
//                 $certificate_link = '<a href="' . $check_on_aws . '" target="_blank">Download Certificate</a>';
//             } else {
//                 $certificate_link = '<a href="' . site_url() . '/claim-your-certificate" target="_blank">Claim Your Certificate</a>';
//             }
//         }
//     } else {
//         $certificate_link = '<a href="' . site_url() . '/certificate" target="_blank">Purchase Your Certificate</a>';
//     }
//     echo $certificate_link;
// }

$head = "My Certificates";

include_once('common-parts/dashboard-head.php');
$certificate_page = get_option('certificate_page');
$certificate_page_url = get_permalink($certificate_page);
$sal_certificate_banner_image = get_option('sal_certificate_banner_image_url');
$sal_certificate_banner_image_link = get_option('sal_certificate_image_link');

?>
<?php include_once('views/learners-certificates.view.php'); ?>

<?php include_once('common-parts/dashboard-footer.php'); ?>