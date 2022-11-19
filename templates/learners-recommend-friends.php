<?php
$head = 'Recommend Friends';

include_once('common-parts/dashboard-head.php');

$pluginElementor = \Elementor\Plugin::instance();
$recomended_friends_page = get_option('recomended_friends_page');
$elementor_content = $pluginElementor->frontend->get_builder_content($recomended_friends_page);
$contentElementor = $elementor_content ? $elementor_content : get_post_field('post_content', $recomended_friends_page);
?>
<section class="content-main-body">
    <div class="container-fluid">
        <?php
        echo '<div class="mx-2" style="margin: 0 20px;">' . $contentElementor . '</div>';
        ?>
    </div>
</section>
<?php
include_once('common-parts/dashboard-footer.php');
