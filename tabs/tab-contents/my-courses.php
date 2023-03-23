<?php

$user_courses = SaCourse::sa_get_user_courses_by_status($user_id);
$head = "My Courses";

include_once('views/my-courses-view.php');
