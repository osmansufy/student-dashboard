<?php
if (!defined('ABSPATH')) exit;
$head = 'Unlimited Learning';
include_once('common-parts/dashboard-head.php');

$pluginElementor = \Elementor\Plugin::instance();
$unlimited_learning_page = get_option('unlimited_learning_page');
$elementor_content = $pluginElementor->frontend->get_builder_content($unlimited_learning_page);
$contentElementor = $elementor_content ? $elementor_content : get_post_field('post_content', $unlimited_learning_page); ?>
<section class="content-main-body">
    <div class="container-fluid">
        <?php
        echo '<div class="mx-2" style="margin: 0 20px;">' . $contentElementor . '</div>';
        ?>
    </div>
</section>
<?php
include_once('common-parts/dashboard-footer.php');
