<?php

$slug = 'special-offers'; // Replace with your actual page slug

// Retrieve the page object using the slug
$page = get_page_by_path($slug);

// Check if the page object exists
if ($page) {
    // Get the Elementor data for the page
    $elementor_data = get_post_meta($page->ID, '_elementor_data', true);

    echo '<div class="container-fluid">';
    // title
    echo '<div class="row">';
    echo '<div class="col-12">';
    echo '<h1 class="text-center">' . $page->post_title . '</h1>';
    echo '</div>';
    echo '</div>';


    // Check if Elementor data is available
    if ($elementor_data) {
        // Display the Elementor content with its classes
        echo '<div class="elementor-wrapper">';
        echo \Elementor\Plugin::$instance->frontend->get_builder_content($page->ID);
        echo '</div>';
    } else {
        // Display the default page content
        echo apply_filters('the_content', $page->post_content);
    }
    echo '</div>';
} else {
    echo 'Page not found.';
}
