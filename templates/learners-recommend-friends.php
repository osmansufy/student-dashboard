<?php
include_once('common-parts/dashboard-head.php');

$pluginElementor = \Elementor\Plugin::instance();
// $frontend = new \Elementor\Frontend(); is not working to js
// $content = $frontend->get_builder_content(1050);
$contentElementor = $pluginElementor->frontend->get_builder_content(1050);
echo $contentElementor;
include_once('common-parts/dashboard-footer.php');
