<?php
// get recomended courses page content
$args = array(
    'name' => 'learners-recommend-friends',
    'post_type' => 'page',
    'post_status' => 'publish',
    'numberposts' => 1
);
$my_posts = get_posts($args);
if ($my_posts) {
    $post = $my_posts[0];
    setup_postdata($post);
    // title

?>

<?php
    the_content();
?>

<?php
    wp_reset_postdata();
}
