<?php
$saved_courses = SaCourse::sa_get_saved_courses($user_id);

$head = "Saved Courses";

include 'views/saved-courses-view.php';
