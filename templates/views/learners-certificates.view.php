<section class="content-main-body">
    <div class="container-fluid">
        <!-- container-fluid-start  -->
        <div class="subscribeUpsell">
            <a href="https://www.janets.org.uk/subscription-offer/" target="_blank"><i class="fad fa-medal"></i>
                Get access to all 2000+ courses (and MORE) for only £49. Find out more.
            </a>
        </div>


        <div class="my-certificate">
            <!-- banner offer -->
            <div class="banner-offer">
                <a href="#">
                    <img src="<?php echo esc_url($sal_certificate_banner_image) ?>" alt="Offer">
                </a>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 certificate-list ">
                    <h4 style="margin-bottom: 30px;">Certificates and Transcripts</h4>
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
                            foreach ($all_certificates as $certificate) {
                            ?>
                                <tr>
                                    <!-- <th>
                                        <?php

                                        // echo $certificate->course_id; 
                                        ?>

                                    </th> -->
                                    <td data-label="Course">
                                        <a href="<?php echo $certificate->slug ?>">
                                            <!-- <img style="height: 100px; width:100px; display:block" src="<?php echo $certificate->featured_image ?>" alt=""> -->
                                            <?php echo $certificate->title ?>


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
                                </tr><?
                                        ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- row--end  -->
        </div>
        <!--certificate End-->


    </div><!-- container-fluid-end  -->
</section>