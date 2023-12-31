<?php
$page_title = 'My Certificates';
include plugin_dir_path(__FILE__) . '../../template-parts/page-title.php';
?>
<div class="container-fluid">

    <!-- container-fluid-start  -->
    <?php
    include plugin_dir_path(__FILE__) . '../../template-parts/page-hero.php';
    ?>

    <div class="my-certificate">
        <!-- banner offer -->
        <div class="banner-offer">
            <a href="<?php echo $sal_certificate_banner_image_link ?>">
                <img src="<?php echo esc_url($sal_certificate_banner_image) ?>" alt="Offer">
            </a>
        </div>
        <h3 class="mb-4 ">

            My Certificates & Transcripts
        </h3>
        <div class="my-5 border pt-2">
            <div class="row">
                <div class="col-12 col-md-12 certificate-list ">
                    <h4 class="mb-5">
                        <i class="fas fa-certificate"></i>
                        Completed Courses (<?php echo count($all_certificates) ?>)

                    </h4>
                    <table class="table m-0" id="desktopCerts">
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
                                        <a href="<?php echo $course_url ?>">

                                            <?php echo $certificate->title ?>
                                            <!-- badge if course certificate purchased -->
                                            <?php if ($certificate->is_course_purchased) { ?>
                                                <span class="badge badge-success">Purchased</span>
                                            <?php } ?>



                                        </a>
                                    </td>
                                    <td data-label="Certificate">

                                        <?php if ($certificate->certificate_url) { ?>
                                            <a class="btn btn-primary" data-toggle="modal" data-target="#certificateModal" data-whatever="@mdo">
                                                <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                                                View Certificate</a>
                                        <?php
                                            include plugin_dir_path(__FILE__) . '../../template-parts/certificate/singleCertificateForAdmin.php';
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
                                            include plugin_dir_path(__FILE__) . '../../template-parts/transcript/singleTranscriptForAdmin.php';
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
            </div><!-- row--end  -->
        </div>
        <div class="my-5 border pt-2">
            <!-- not completed course certificate -->
            <div class="row">
                <div class="col-12 col-md-12 certificate-list ">
                    <h4 class="mb-4">
                        <i class="fas fa-certificate"></i>
                        Not Completed Courses (<?php echo count($user_not_completed_courses) ?>)
                    </h4>
                    <caption style="margin-bottom: 30px;"> Pre order Certificates for Your Courses in Progress
                    </caption>
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
                                        <a href="<?php echo $course_url ?>">
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
            </div><!-- row--end  -->
        </div>
    </div>
    <!--certificate End-->


</div><!-- container-fluid-end  -->