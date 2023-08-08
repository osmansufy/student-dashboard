<?php
$page_title = 'Help & Support';
include plugin_dir_path(__FILE__) . '../../tab-parts/page-title.php';
?>

<section class="content-main-body text-left">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="active"><a href="#submitATicket" role="tab" data-toggle="tab">Submit a Ticket</a></li>
        <li><a href="#Coursefeedback" role="tab" data-toggle="tab">Course feedback</a></li>
        <li class="help"><a href="#HelpVideos" role="tab" data-toggle="tab">Help Videos</a></li>
        <li><a href="#FAQ" role="tab" data-toggle="tab">FAQ's</a></li>
    </ul>
    <div class="container-fluid " id="PD">
        <!-- container-fluid-start  -->
        <div class="profile white-board">
            <div class="tab-content">
                <div class="tab-pane active " id="submitATicket">
                    <h1>Create a Ticket</h1>
                    <div class="myDetail">
                        <?php
                        // gravity_form(33, false, false, false, '', false);

                        ?>
                        <a href="<?php
                                    echo $sal_submit_ticket_page_url
                                    ?>">
                            Submit a Ticket
                        </a>

                    </div>
                </div>
                <div class="tab-pane " id="Coursefeedback">
                    <h1>Submit your feedback</h1>
                    <div class="myDetail">
                        <?php
                        // gravity_form(35, false, false, false, '', false);
                        ?>
                        <a href="<?php
                                    echo $sal_course_feedback_page_url
                                    ?>">
                            Feedback Form
                        </a>

                    </div>
                </div>
                <div class="tab-pane" id="HelpVideos">
                    <a href="<?php
                                echo esc_url($sal_help_n_support_page_url)
                                ?>">
                        Help & Support
                    </a>

                </div>
                <div class="tab-pane" id="FAQ">
                    <a href="<?php
                                echo $sal_faq_page_url
                                ?>">
                        Faq Sections
                    </a>


                </div>
            </div>
        </div>
    </div><!-- container-fluid-end  -->
</section>