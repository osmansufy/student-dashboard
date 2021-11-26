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
                    <h1>Support</h1>
                    <ul class="nav nav-tabs" role="tablist" id="myTab">
                        <li class="active"><a href="#submitATicket" role="tab" data-toggle="tab">Submit a Ticket</a></li>
                        <li><a href="#Coursefeedback" role="tab" data-toggle="tab">Course feedback</a></li>
                        <li class="help"><a href="#HelpVideos" role="tab" data-toggle="tab">Help Videos</a></li>
                        <li><a href="#FAQ" role="tab" data-toggle="tab">FAQ's</a></li>
                    </ul>
                </div>
            </section>

            <section class="content-main-body text-left">
                <div class="container-fluid " id="PD">
                    <!-- container-fluid-start  -->
                    <div class="profile white-board">
                        <div class="tab-content">
                            <div class="tab-pane active " id="submitATicket">
                                <h1>Create a Ticket</h1>
                                <div class="myDetail">
                                    <?php gravity_form(33, false, false, false, '', false); ?>
                                    <!-- <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="firstName">First name</label>
                                            <input type="text" id="firstName" class="form-control" name="firstname" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lastName">Last name</label>
                                            <input type="text" id="lastName" class="form-control" name="lastname" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">Email Address</label>
                                            <input type="email" id="email" class="form-control" name="email" value="kaderahmed.cse@gmail.com">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="leaderboard">Contact</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="number" id="number" class="form-control" name="number" value="kaderahmed.cse@gmail.com">
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="leaderboard">Enquiry Details</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <textarea type="text" id="textarea" class="form-control" name="message" rows="8" value=""></textarea>
                                            </label>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Create Ticket</button> -->
                                </div>
                            </div>
                            <div class="tab-pane " id="Coursefeedback">
                                <h1>Submit your feedback</h1>
                                <div class="myDetail">
                                    <?php gravity_form(35, false, false, false, '', false); ?>
                                    <!-- <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="firstName">First name</label>
                                            <input type="text" id="firstName" class="form-control" name="firstname" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lastName">Last name</label>
                                            <input type="text" id="lastName" class="form-control" name="lastname" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">Email Address</label>
                                            <input type="email" id="email" class="form-control" name="email" value="kaderahmed.cse@gmail.com">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="leaderboard">Course you are studying</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <select class="form-control" name="course" required="">
                                                        <option value="">Select Course</option>
                                                        <option value="Level 3 Admin, PA and Secretarial Diploma">Level 3 Admin, PA and Secretarial Diploma</option>
                                                    </select>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="leaderboard">Please let us know what you think of the course:</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <textarea type="text" id="textarea" class="form-control" name="message" rows="8" value=""></textarea>
                                            </label>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Create Ticket</button> -->
                                </div>
                            </div>
                            <div class="tab-pane" id="HelpVideos">
                                <div class="helpvideo">
                                    <div class="row">
                                        <div class="col-12 col-md-4 white-rounded">
                                            <h3>Choose a Support Video</h3>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(12);">
                                                    <p>How to download or print a module</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(11);">
                                                    <p>How to take notes</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(10);">
                                                    <p>How to download and print a certificate</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(9);">
                                                    <p>How to validate a certificate</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(8);">
                                                    <p>How to access an invoice</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(7);">
                                                    <p>How to take a test</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(6);">
                                                    <p>How to download and study worksheets</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(5);">
                                                    <p>How to redeem your rewards</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(4);">
                                                    <p>How to change your password</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(3);">
                                                    <p>How to start your course</p>
                                                </a>
                                            </div>
                                            <div class="download-o">
                                                <a href="javascript:;" onclick="showVideo(2);">
                                                    <p>How to log in</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="video-outer" style="display:block;">
                                                <style>
                                                    .singleVideo {
                                                        display: none;
                                                    }
                                                </style>
                                                <div class="singleVideo video12" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254529"></iframe>
                                                </div>
                                                <div class="singleVideo video11" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254530"></iframe>
                                                </div>
                                                <div class="singleVideo video10" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254531"></iframe>
                                                </div>
                                                <div class="singleVideo video9" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254532"></iframe>
                                                </div>
                                                <div class="singleVideo video8" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254534"></iframe>
                                                </div>
                                                <div class="singleVideo video7" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254533"></iframe>
                                                </div>
                                                <div class="singleVideo video6" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254539"></iframe>
                                                </div>
                                                <div class="singleVideo video5" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254538"></iframe>
                                                </div>
                                                <div class="singleVideo video4" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254536"></iframe>
                                                </div>
                                                <div class="singleVideo video3" style="display: none;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254537"></iframe>
                                                </div>
                                                <div class="singleVideo video2" style="display: block;">
                                                    <iframe src="https://www.youtube.com/watch?v=J0FzvV4otlc" width="100%" height="410" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" __idm_id__="319254535"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="FAQ">
                                <div class="faqq">
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Collapsible Group Item #1
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                        Collapsible Group Item #2
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                        Collapsible Group Item #3
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- container-fluid-end  -->
            </section>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>