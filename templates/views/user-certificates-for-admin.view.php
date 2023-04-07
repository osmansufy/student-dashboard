<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open
    modal for @mdo</button>





<section class="content-main-body">
    <div class="container-fluid">

        <!-- container-fluid-start  -->
        <?php
        include plugin_dir_path(__FILE__) . '../template-parts/page-hero.php';
        ?>

        <div class="my-certificate">
            <!-- banner offer -->
            <div class="banner-offer">
                <a href="<?php echo $sal_certificate_banner_image_link ?>">
                    <img src="<?php echo esc_url($sal_certificate_banner_image) ?>" alt="Offer">
                </a>
            </div>
            <h3>

                My Certificates & Transcripts
            </h3>
            <div style="margin-top: 60px; margin-bottom: 30px; border: 1px solid #e5e5e5;">
                <div class="row">
                    <div class="col-12 col-md-12 certificate-list ">
                        <h4 style="margin-bottom: 30px;">
                            <i class="fas fa-certificate"></i>
                            Completed Courses (<?php echo count($all_certificates) ?>)

                        </h4>
                        <table class="table" id="desktopCerts">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">Course Id</th> -->
                                    <!-- <th scope="col">Date / Time</th> -->
                                    <th scope="col">Course</th>
                                    <!-- <th scope="col">Certificate </th> -->
                                    <th scope="col">View </th>
                                    <th>Buy</th>
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
                                    <!-- <th>
                                        <?php

                                        // echo $certificate->course_id;
                                        ?>

                                    </th> -->
                                    <td data-label="Course">
                                        <a href="<?php echo $course_url ?>">
                                            <!-- <img style="height: 100px; width:100px; display:block" src="<?php echo $certificate->featured_image ?>" alt=""> -->
                                            <?php echo $certificate->title ?>


                                        </a>
                                    </td>
                                    <td data-label="Certificate">
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                            data-whatever="@mdo"><i class="far fa-file-pdf"
                                                style="margin-right:7px;"></i>
                                            View Certificate</a>
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#transcriptModal"
                                            data-whatever="@mdo"><i class="far fa-file-pdf"
                                                style="margin-right:7px;"></i>
                                            View Transcript</a>

                                    </td>
                                    <td data-label="PDF">
                                        <a class="btn btn-primary" target="_blank"
                                            href="<?php echo site_url() . '/certificate' ?>">
                                            <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                                            Buy
                                        </a>
                                    </td>

                                    <?php
                                        include plugin_dir_path(__FILE__) . '../template-parts/certificate/singleCertificate.php';
                                        ?>
                                    <?php
                                        include plugin_dir_path(__FILE__) . '../template-parts/transcript/singleTranscript.php';
                                        ?>
                                </tr>
                                <?
                                    ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- row--end  -->
            </div>
            <div style="margin-top: 60px; margin-bottom: 30px; border: 1px solid #e5e5e5;">
                <!-- not completed course certificate -->
                <div class="row">
                    <div class="col-12 col-md-12 certificate-list ">
                        <h4>
                            <i class="fas fa-certificate"></i>
                            Not Completed Courses (<?php echo count($user_not_completed_courses) ?>)
                        </h4>
                        <caption style="margin-bottom: 30px;"> Pre order Certificates for Your Courses in Progress
                        </caption>
                        <table class="table" id="desktopCerts">
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
                                        <a class="btn btn-primary" target="_blank"
                                            href="<?php echo site_url() . '/certificate' ?>">
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
                                        <a class="btn btn-primary" target="_blank"
                                            href="<?php echo site_url() . '/certificate' ?>">
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
</section>