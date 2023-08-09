<?php
$page_title = 'My Certificates';
include plugin_dir_path(__FILE__) . '../../tab-parts/page-title.php';
?>
<div class="container-fluid mb-4">

    <!-- container-fluid-start  -->
    <?php
    include plugin_dir_path(__FILE__) . '../../tab-parts/page-hero.php';
    ?>

    <div class="my-certificate">
        <!-- banner offer -->
        <div class="banner-offer">
            <a href="<?php echo $sal_certificate_banner_image_link ?>">
                <img src="<?php echo esc_url($sal_certificate_banner_image) ?>" alt="Offer">
            </a>
        </div>
        <h2 class="mb-4 fw-bold text-center">

            My Certificates & Transcripts
        </h2>
        <div class="my-5 shadow rounded-3 pt-4 ">
            <div class="row">
                <div class="col-12 col-md-12    ">
                    <div class="certificate-list ">
                        <h4 class="mb-4 text-center >
                        <i class=" fas fa-certificate"></i>
                            Completed Courses (<?php echo count($all_certificates) ?>)

                        </h4>
                        <table class="table  " id="desktopCerts">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">Course Id</th> -->
                                    <!-- <th scope="col">Date / Time</th> -->
                                    <th scope="col">Course</th>
                                    <!-- <th scope="col">Certificate </th> -->
                                    <th scope="col">View/Buy </th>
                                    <th>Buy </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($all_certificates as $certificate) {
                                    $course_url = site_url() . '/courses/' . $certificate->slug;
                                    $certificate_url = $certificate->certificate_url;
                                    $transcript_url = $certificate->transcript_url;
                                ?>
                                    <tr>

                                        <td data-label="Course">
                                            <a class="text-dark" href="<?php echo $course_url ?>">

                                                <?php echo $certificate->title ?>
                                                <!-- badge if course certificate purchased -->
                                                <?php if ($certificate->is_course_purchased) { ?>
                                                    <span class="badge badge-success">Purchased</span>
                                                <?php } ?>



                                            </a>
                                        </td>
                                        <td data-label="Certificate">

                                            <?php if ($certificate->certificate_url) { ?>
                                                <a class="btn btn-primary " data-toggle="modal" data-target="#certificateModal" data-whatever="@mdo">
                                                    <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                                                    View Certificate</a>
                                            <?php
                                                include plugin_dir_path(__FILE__) . '../../tab-parts/certificate/singleCertificateForAdmin.php';
                                            } else { ?>
                                                <a class="btn btn-primary" target="_blank" href="<?php echo site_url() . '/certificate' ?>">
                                                    <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                                                    Buy Certificate </a>
                                            <?php } ?>
                                            <?php if ($certificate->transcript_url) { ?>
                                                <a class="btn btn-primary" data-toggle="modal" data-target="#transcriptModal" data-whatever="@mdo">
                                                    <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                                                    View Transcript</a>
                                            <?php
                                                include plugin_dir_path(__FILE__) . '../../tab-parts/transcript/singleTranscriptForAdmin.php';
                                            } else { ?>
                                                <a class="btn btn-primary" target="_blank" href="<?php echo site_url() . '/certificate' ?>">
                                                    <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                                                    Buy Transcript </a>
                                            <?php } ?>



                                        </td>
                                        <td data-label="PDF">
                                            <a class="btn btn-primary" target="_blank" href="<?php echo site_url() . '/certificate' ?>">
                                                <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                                                Buy
                                            </a>
                                        </td>
                                    </tr>
                                    <?
                                    ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- row--end  -->
        </div>
        <div class="my-5 shadow rounded-3 pt-4">
            <!-- not completed course certificate -->
            <div class="row">
                <div class="col-12 col-md-12  ">
                    <div class="certificate-list ">
                        <h4 class="mb-1 text-center">
                            <i class="fas fa-certificate"></i>
                            Not Completed Courses (<?php echo count($user_not_completed_courses) ?>)
                        </h4>
                        <p class="mb-3 text-center w-100"> Pre order Certificates for Your Courses in Progress
                        </p>
                        <table class="table m-0" id="desktopCerts">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">Course Id</th> -->
                                    <!-- <th scope="col">Date / Time</th> -->
                                    <th scope="col">Course</th>
                                    <th scope="col">Hard Copy </th>
                                    <!-- <th scope="col">Certificate </th> -->
                                    <th scope="col">PDF </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($user_not_completed_courses as $certificate) {
                                    $course_url = site_url() . '/courses/' . $certificate['slug'];
                                ?>
                                    <tr>
                                        <!-- <th>
                                        <?php

                                        // echo $certificate->course_id;
                                        ?>

                                    </th> -->
                                        <td data-label="Course">
                                            <a class="text-dark" href="<?php echo $course_url ?>">
                                                <!-- <img style="height: 100px; width:100px; display:block" src="<?php echo $certificate->featured_image ?>" alt=""> -->
                                                <?php echo $certificate["title"] ?>


                                            </a>
                                        </td>
                                        <td data-label="Hard Copy">
                                            <a class="btn btn-primary" target="_blank" href="<?php echo site_url() . '/certificate' ?>">
                                                <i class="far
                                            fa-file-pdf
                                            " style="margin-right:7px;"></i>
                                                Buy
                                            </a>
                                        </td>
                                        <!-- <td data-label="Certificate">
                                        <a class="btn btn-primary" href="<?php echo $certificate->certificate_url ?>" target="_blank"><i class="far fa-file-pdf" style="margin-right:7px;"></i> View Certificate</a>
                                    </td> -->
                                        <td data-label="PDF">
                                            <a class="btn btn-primary" target="_blank" href="<?php echo site_url() . '/certificate' ?>">
                                                <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                                                Buy
                                            </a>
                                        </td>
                                    </tr>
                                    <?
                                    ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- row--end  -->
        </div>
    </div>
    <!--certificate End-->


</div><!-- container-fluid-end  -->