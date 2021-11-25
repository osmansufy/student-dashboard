<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    wp_head();
    add_filter('show_admin_bar', '__return_false');
    ?>
</head>

<body>
    <div class="sidebar-menu-farhan">
        <?php include_once('template-parts/dashboard-sidebar.php'); ?>
        <?php include_once('template-parts/dashboard-top-nav.php'); ?>

        <div class="main-content">
            <section class="page-title">
                <div class="container-fluid">
                    <h1>My Certificates</h1>
                </div>
            </section>
            <section class="content-main-body">
                <div class="container-fluid">
                    <!-- container-fluid-start  -->
                    <div class="subscribeUpsell">
                        <a href="#"><i class="fad fa-medal"></i>
                            Get access to all 700+ courses (and MORE) for only £12 per
                            month. Find out more.
                        </a>
                    </div>

                    <?php
                    $user_id = get_current_user_id();
                    $all_certificates = bp_course_get_user_certificates($user_id);
                    $certificate_link_list = array();
                    foreach ($all_certificates as $certificate) {
                        $args = array(
                            'course_id' => $certificate,
                            'user_id' => $user_id
                        );
                        $certificate_link = bp_get_course_certificate($args);
                        $certificate_link_list[] = $certificate_link;
                    }

                    echo '<pre>';
                    print_r($user_id);
                    print_r($all_certificates);
                    echo '</pre>';
                    ?>
                    <?php
                    $user_id = get_current_user_id();
                    $all_course_ids = bp_course_get_user_certificates($user_id);
                    $server_url = site_url() . '/wp-content/uploads/course_certificates/';
                    $aws_url = '********************************************/course_certificates/';
                    $certificate_link_list = array();
                    foreach ($all_course_ids as $course_id) {
                        $certificate_meta = 'course_' . $course_id . '_certificate_pdf_url';
                        $certificate_purchased = get_user_meta($user_id, $certificate_meta, true);
                        if ($certificate_purchased) {
                            $check_on_server = $server_url . $course_id . 'c' . $user_id;
                            if (file_get_contents($certificate_purchased)) {
                                $certificate_link = '<a href="' . $certificate_purchased . '" target="_blank">Download Certificate</a>';
                            } else {
                                $check_on_aws = $aws_url . $course_id . 'c' . $user_id;
                                if (file_get_contents($check_on_aws)) {
                                    $certificate_link = '<a href="' . $check_on_aws . '" target="_blank">Download Certificate</a>';
                                } else {
                                    $certificate_link = '<a href="' . site_url() . '/claim-your-certificate" target="_blank">Claim Your Certificate</a>';
                                }
                            }
                        } else {
                            $certificate_link = '<a href="' . site_url() . '/certificate" target="_blank">Purchase Your Certificate</a>';
                        }
                        echo $certificate_link;
                    }


                    ?>
                    <div class="my-certificate">
                        <!-- banner offer -->
                        <div class="banner-offer">
                            <a href="#">
                                <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/10/cert-offer-1.jpg" alt="Offer">
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 certificate-list ">
                                <table class="table" id="desktopCerts">
                                    <thead>
                                        <tr>
                                            <th scope="col">Course</th>
                                            <th scope="col">Ref</th>
                                            <th scope="col">Date / Time</th>
                                            <th scope="col"></th>
                                            <th scope="col">Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#">Twinkle Twinkle Little Start</a></th>
                                            <th>1 items</th>
                                            <th>15th May 2017 @ 11:06</th>
                                            <th>£0.00</th>
                                            <th><a class="btn btn-primary" href="https://newskillsacademy.co.uk/invoice/30933?id=30933" target="_blank"><i class="far fa-file-pdf" style="margin-right:7px;"></i> View PDF</a></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- row--end  -->
                    </div>
                    <!--certificate End-->


                </div><!-- container-fluid-end  -->
            </section>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>