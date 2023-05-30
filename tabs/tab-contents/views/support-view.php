<?php

$slug = 'learners-support'; // Replace with your actual page slug

// Retrieve the page object using the slug
$page = get_page_by_path($slug);

// Check if the page object exists
if ($page) {
    // Get the Elementor data for the page
    $elementor_data = get_post_meta($page->ID, '_elementor_data', true);

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
} else {
    echo 'Page not found.';
}
