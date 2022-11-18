<?php
if (!defined('ABSPATH')) exit;
$head = 'Student Portal';
include_once('common-parts/dashboard-head.php');
$student_portal_page = get_option('student_portal_page');

$pluginElementor = \Elementor\Plugin::instance();
// $frontend = new \Elementor\Frontend(); is not working to js
// $content = $frontend->get_builder_content(1050);
$elementor_content = $pluginElementor->frontend->get_builder_content($student_portal_page);
$contentElementor = $elementor_content ? $elementor_content : get_post_field('post_content', $student_portal_page);
echo '<div class="mx-2" style="margin: 0 20px;">' . $contentElementor . '</div>';
include_once('common-parts/dashboard-footer.php');
