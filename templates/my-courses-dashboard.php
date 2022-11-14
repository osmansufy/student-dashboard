<?php
$user_id = get_current_user_id();
$user_courses = SaCourse::sa_get_user_courses_by_status($user_id);
$head = "My Courses";

include_once('common-parts/dashboard-head.php');

?>



<?php
// include_once('views/my-courses-dashboard.view.php');

function show_post($path)
{
    $post = get_page_by_path($path);
    $content = apply_filters('the_content', $post->post_content);
    echo $content;
}

show_post('subscription-offer');
?>
<?php include_once('common-parts/dashboard-footer.php') ?>