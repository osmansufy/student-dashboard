<?php

wp_head();

// include_once('views/learners-support.view.php');
$frontend = new \Elementor\Frontend();
echo '<div class="elementor content-elementor">';
$content = $frontend->get_builder_content(1050);
echo $content;
echo '</div>';
wp_footer();
