<?php

get_header(vibe_get_header());

// include_once('views/learners-support.view.php');
$frontend = new \Elementor\Frontend();
$content = $frontend->get_builder_content(390878, true);
echo $content;
get_footer(vibe_get_footer());
