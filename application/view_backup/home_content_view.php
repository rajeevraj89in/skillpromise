<?php

$this->load->view('header_view');
if (!$_SESSION['user_id']) {
    $this->load->view('slider_view');
}
switch ($_SESSION['role_name']) {
    case 'Guest': {
            $this->load->view('home_left_view');
            $this->load->view('student_content_view');
            $this->load->view('quick_link_view');
            break;
        }
    case 'Student': {
            $this->load->view('home_left_view');
            $this->load->view('student_content_view');
//            $this->load->view('quick_link_view');
            break;
        }
    case 'Manager': {
            $this->load->view('manager_left_view');
            $this->load->view('manager_content_view');
            break;
        }
    case 'Administrator': {
            $this->load->view('manager_left_view');
            $this->load->view('manager_content_view');
            break;
        }
    case 'Super Admin': {
            $this->load->view('manager_left_view');
            $this->load->view('manager_content_view');
            break;
        }
    default: {
            $this->load->view('home_left_view');
            $this->load->view('student_content_view');
            $this->load->view('quick_link_view');
            break;
        }
}

$this->load->view('footer_view');
?>
