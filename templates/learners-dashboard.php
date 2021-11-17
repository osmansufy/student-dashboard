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
                    <h1>Dashboard</h1>
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
                    <!-- percentage circle -->
                    <div class="circle-box-percentage">
                        <div class="allcourse">
                            <h2>All course</h2>
                            <div class="progressdiv" data-percent="10">
                                <svg class="progress_bar" height="250" width="250" id="svg">
                                    <circle id="progressbg" cx="125" cy="125" r="85" stroke-width="29"
                                        fill="transparent" stroke-dasharray="753.9822368615503" />
                                    <circle id="progress" class="bar" cx="125" cy="125" r="85" stroke-width="30"
                                        fill="transparent" stroke-dasharray="553.9822368615503" />
                                </svg>
                            </div>
                        </div>
                        <div class="allcourse">
                            <h2>All course</h2>
                            <div class="progressdiv" data-percent="10">
                                <svg class="progress_bar" height="250" width="250" id="svg">
                                    <circle id="progressbg" cx="125" cy="125" r="85" stroke-width="29"
                                        fill="transparent" stroke-dasharray="753.9822368615503" />
                                    <circle id="progress" class="bar" cx="125" cy="125" r="85" stroke-width="30"
                                        fill="transparent" stroke-dasharray="553.9822368615503" />
                                </svg>
                            </div>
                        </div>
                        <div class="allcourse">
                            <h2>All course</h2>
                            <div class="progressdiv" data-percent="10">
                                <svg class="progress_bar" height="250" width="250" id="svg">
                                    <circle id="progressbg" cx="125" cy="125" r="85" stroke-width="29"
                                        fill="transparent" stroke-dasharray="753.9822368615503" />
                                    <circle id="progress" class="bar" cx="125" cy="125" r="85" stroke-width="30"
                                        fill="transparent" stroke-dasharray="553.9822368615503" />
                                </svg>
                            </div>
                        </div>
                        <div class="allcourse">
                            <h2>All course</h2>
                            <div class="progressdiv" data-percent="10">
                                <svg class="progress_bar" height="250" width="250" id="svg">
                                    <circle id="progressbg" cx="125" cy="125" r="85" stroke-width="29"
                                        fill="transparent" stroke-dasharray="753.9822368615503" />
                                    <circle id="progress" class="bar" cx="125" cy="125" r="85" stroke-width="30"
                                        fill="transparent" stroke-dasharray="553.9822368615503" />
                                </svg>
                            </div>
                        </div>
                    </div><!-- percentage circle end-->
                    <!-- Award days banner section -->
                    <div class="row award-section">
                        <div class="col-md-4 ">
                            <div class="white-rounded dash-details">
                                <div class="count-number">
                                    <span>2 <sup><i class="fas fa-arrow-up"></i></sup></span>
                                </div>
                                <div class="number-text">
                                    <p>Days Logged In</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="white-rounded dash-details">
                                <div class="Reward-number">
                                    <span><img
                                            src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                            alt="award" /> 2</span>
                                </div>
                                <div class="number-text">
                                    <p>Reward Points</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="white-rounded dash-banner">
                                <div class="banner-number">
                                    <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2019/10/cpd-member.png"
                                        alt="cpd">
                                    <p>Get access to exclusive student discounts</p>
                                    <a href="#" class="btn btn-outline-light">GET YOUR STUDENT CARD NOW</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Award days banner section END -->
                    <!-- banner offer -->
                    <div class="banner-offer">
                        <a href="#">
                            <img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/study-group-banner-1-1.png"
                                alt="Offer"></a>
                    </div>
                    <div class="other-course">
                        <h3 class="Title">Other courses you might like...</h3>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3 col-sm-6">
                                <!-- col-start  -->
                                <div class="category-box"
                                    style="background-image: url('https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/shutterstock_332643533-1709b6af0cc58bf0030a64336c112d8a-1.png');">
                                    <div class="Popular-title-top"><i class="far fa-user"></i> 149 students enrolled
                                    </div>
                                    <div class="Popular-title-bottom">Emergency Procedures in the Workplace Certificate
                                        <h3>£20.00</h3>
                                    </div>
                                    <div class="popular-box-overlay">
                                        <p><strong>Emergency Procedures in the Workplace Certificate</strong></p>
                                        <div class="button-box">
                                            <div class="popular-overlay-btn">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-lg extra-radius">1 Modules
                                                </button>
                                            </div>
                                            <div class="popular-overlay-btn">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-lg extra-radius"> 0% Finance
                                                </button>
                                            </div>
                                        </div>
                                        <h3>£20.00</h3>
                                        <div class="popular-overlay-btn-btm"> <a href="#" role="button"
                                                class="btn btn-outline-primary btn-lg extra-radius nsa_course_more_info">More
                                                Info</a> <a href="#" role="button"
                                                class="btn btn-outline-primary btn-lg extra-radius">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-end  -->
                            <div class="col-12 col-md-6 col-lg-3 col-sm-6">
                                <!-- col-start  -->
                                <div class="category-box"
                                    style="background-image: url('https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/shutterstock_332643533-1709b6af0cc58bf0030a64336c112d8a-1.png');">
                                    <div class="Popular-title-top"><i class="far fa-user"></i> 149 students enrolled
                                    </div>
                                    <div class="Popular-title-bottom">Emergency Procedures in the Workplace Certificate
                                        <h3>£20.00</h3>
                                    </div>
                                    <div class="popular-box-overlay">
                                        <p><strong>Emergency Procedures in the Workplace Certificate</strong></p>
                                        <div class="button-box">
                                            <div class="popular-overlay-btn">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-lg extra-radius">1 Modules
                                                </button>
                                            </div>
                                            <div class="popular-overlay-btn">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-lg extra-radius"> 0% Finance
                                                </button>
                                            </div>
                                        </div>
                                        <h3>£20.00</h3>
                                        <div class="popular-overlay-btn-btm"> <a href="#" role="button"
                                                class="btn btn-outline-primary btn-lg extra-radius nsa_course_more_info">More
                                                Info</a> <a href="#" role="button"
                                                class="btn btn-outline-primary btn-lg extra-radius">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-end  -->
                            <div class="col-12 col-md-6 col-lg-3 col-sm-6">
                                <!-- col-start  -->
                                <div class="category-box"
                                    style="background-image: url('https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/shutterstock_332643533-1709b6af0cc58bf0030a64336c112d8a-1.png');">
                                    <div class="Popular-title-top"><i class="far fa-user"></i> 149 students enrolled
                                    </div>
                                    <div class="Popular-title-bottom">Emergency Procedures in the Workplace Certificate
                                        <h3>£20.00</h3>
                                    </div>
                                    <div class="popular-box-overlay">
                                        <p><strong>Emergency Procedures in the Workplace Certificate</strong></p>
                                        <div class="button-box">
                                            <div class="popular-overlay-btn">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-lg extra-radius">1 Modules
                                                </button>
                                            </div>
                                            <div class="popular-overlay-btn">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-lg extra-radius"> 0% Finance
                                                </button>
                                            </div>
                                        </div>
                                        <h3>£20.00</h3>
                                        <div class="popular-overlay-btn-btm"> <a href="#" role="button"
                                                class="btn btn-outline-primary btn-lg extra-radius nsa_course_more_info">More
                                                Info</a> <a href="#" role="button"
                                                class="btn btn-outline-primary btn-lg extra-radius">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-end  -->
                            <div class="col-12 col-md-6 col-lg-3 col-sm-6">
                                <!-- col-start  -->
                                <div class="category-box"
                                    style="background-image: url('https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/shutterstock_332643533-1709b6af0cc58bf0030a64336c112d8a-1.png');">
                                    <div class="Popular-title-top"><i class="far fa-user"></i> 149 students enrolled
                                    </div>
                                    <div class="Popular-title-bottom">Emergency Procedures in the Workplace Certificate
                                        <h3>£20.00</h3>
                                    </div>
                                    <div class="popular-box-overlay">
                                        <p><strong>Emergency Procedures in the Workplace Certificate</strong></p>
                                        <div class="button-box">
                                            <div class="popular-overlay-btn">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-lg extra-radius">1 Modules
                                                </button>
                                            </div>
                                            <div class="popular-overlay-btn">
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-lg extra-radius"> 0% Finance
                                                </button>
                                            </div>
                                        </div>
                                        <h3>£20.00</h3>
                                        <div class="popular-overlay-btn-btm"> <a href="#" role="button"
                                                class="btn btn-outline-primary btn-lg extra-radius nsa_course_more_info">More
                                                Info</a> <a href="#" role="button"
                                                class="btn btn-outline-primary btn-lg extra-radius">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-end  -->

                        </div><!-- row--end  -->
                    </div>
                    <div class="leaderBoard">
                        <!--leader-Board -->
                        <!-- <div class="row" > -->
                        <div class="col-12 col-md-5  white-rounded notification useFlex">
                            <div class="leaderboard">
                                <h3>Student leaderboard</h3>
                                <div class="bs-dropdown" style="float: right;">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle"
                                                id="drop6" data-toggle="dropdown" role="button" aria-haspopup="true"
                                                aria-expanded="false"> Dropdown <span class="caret"></span> </a>
                                            <ul class="dropdown-menu" id="menu3" aria-labelledby="drop6">
                                                <li><a href="#">This Month</a></li>
                                                <li><a href="#">Last Month</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            1</th>
                                        <th>Thilliar V
                                            <!---->
                                        </th>
                                        <th>5224 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            2</th>
                                        <th>Paul Martyn S
                                            <!---->
                                        </th>
                                        <th>783 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            3</th>
                                        <th>amelia w
                                            <!---->
                                        </th>
                                        <th>644 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            4</th>
                                        <th>Leanne A
                                            <!---->
                                        </th>
                                        <th>486 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            5</th>
                                        <th>Zoe B
                                            <!---->
                                        </th>
                                        <th>417 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            6</th>
                                        <th>Aneta K
                                            <!---->
                                        </th>
                                        <th>393 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            7</th>
                                        <th>Janine O
                                            <!---->
                                        </th>
                                        <th>382 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            8</th>
                                        <th>Angela M
                                            <!---->
                                        </th>
                                        <th>375 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            9</th>
                                        <th>Parveen B
                                            <!---->
                                        </th>
                                        <th>363 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                    <tr class="">
                                        <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png"
                                                alt="award">
                                            10</th>
                                        <th>Tina C
                                            <!---->
                                        </th>
                                        <th>360 pts</th>
                                        <th>
                                            <!---->
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- col-notification-end  -->
                        <div class="col-12 col-md-5  white-rounded notification useFlex">
                            <div class="leaderboard">
                                <h3>Messages</h3>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Get Access to All of Our Courses</a></td>
                                        <td>16/08/2021 @ 14:31</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Module time limits</a></td>
                                        <td>16/06/2021 @ 11:10</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Welcome to our new website</a></td>
                                        <td>01/06/2021 @ 07:19</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- col-notification-end  -->
                        <!-- </div>row--end  -->
                    </div>
                    <!--leader-Board  end-->

                </div><!-- container-fluid-end  -->
            </section>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>