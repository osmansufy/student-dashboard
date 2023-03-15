<?php
$head = "Help & Support";
include_once('common-parts/dashboard-head.php');
$sal_submit_ticket_page = get_option('sal_submit_ticket_page');
$sal_submit_ticket_page_url = get_page_link($sal_submit_ticket_page);
$sal_course_feedback_page = get_option('sal_course_feedback_page');
$sal_course_feedback_page_url = get_permalink($sal_submit_ticket_page);
$sal_help_n_support_page = get_option('sal_help_n_support_page');
$sal_help_n_support_page_url = get_permalink($sal_help_n_support_page);
$sal_faq_page = get_option('sal_faq_page');
$sal_faq_page_url = get_permalink($sal_faq_page);


include_once('views/learners-support.view.php');

include_once('common-parts/dashboard-footer.php');
