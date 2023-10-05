<?php

class main extends CI_Controller {
    var $url = null;
//    var $Url = "https://paynetzuat.atomtech.in/paynetz/epi/fts";
    var $Url = "https://api.razorpay.com/v1/payments/";
    var $userName = "rzp_test_ZIuKMztAVE02xK";
    var $password = "fUXTgRoX6FjqoevTspjWe5yu";
//  var $Login = "160";
//  var $Password = "Test@123";
    var $MerchantName = "razorpay";
    var $TxnCurr = "INR";
    var $TxnScAmt = "0";
//    var $cus = 28;
    var $keylen = 8; // recommended lengths 8,10,12,14,16,20
    var $basechar = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ'; //32 symbols
    var $formatstr = '44444444'; //characters in each segment, max 5 segments
    var $isvalid = "YES"; //returns this value for valid keys
    var $invalid = "NO"; //returns this value for invalid keys
    var $software = "skillpromise"; //name of software for which key is to be generated
    var $cus = 1;

    public function __construct() {
        parent::__construct();
        $this->custom->initialise_session();
        $this->custom->load_user_acl($_SESSION['user_id']);
        $this->load->helper('text');
        $this->load->library('pagination');
        $this->load->library('cart');
        $this->load->helper('url');
        $controller_name = $this->uri->segment(1);
        $page_name = $this->uri->segment(2);
        $resource_id = $this->uri->segment(3);
        if ($page_name) {//to extract requested page name from #anchor tags in pagination
            $page_name_array = explode('#', $page_name);
            $page_name = $page_name_array[0];
        }
        
        $exempted_controllers = array('add','mailUnsubscribedConfirm','set_data_home_wellness','home_sheets_wellness','exportsubscribe','exportunsubscribe','creative','unsubs_newsletter','upload_applications','testimonials','package_sub_master','testimonial_category','mailUnsubscribedConfirm','nodescategory','UploadOptions','checkemail','UploadQuestionAnswer','node_api_preetek_questions','node_api_preetek_quizstart','node_api_preetek','cover_letter_save','set_cv_data','validate','registrationMail2','contact_us_action','cv','cover_letter_mail', 'set_like_for_node', 'set_dislike_for_node', 'generate_word', 'manage', 'edit', 'delete', 'show_sheets', 'show_nodes', 'test', 'testimonials', 'payment_details', 'requestMerchant', 'sendInfo', 'set', 'node', 'automatic', 'verify', 'print_receipt_new', 'login_handler', 'category', 'mailUnSubscribed', 'mailSubscribed', 'checkout', 'blogComment', 'SaveBlogComment', 'blogDetail', 'blogList','blog', 'show_sections', 'signin', 'change_password', 'do_password_change', 'logout', 'set_many', 'ajax_feeder', 'ajax_fetch', 'loadGrid', 'saveImage', 'submit', 'add_request', 'subscribNewsLetter','successmailUnSubscribed', 'registrationMail', 'register', 'value_action', 'showsheet', 'set_comments', 'get_comments', 'set_like', 'set_dislike', 'like_counts', 'create', 'set_data', 'manage_sheet_values', 'testing_view', 'skill_talk_slider', 'slider', 'skill-talk-slider', 'assessment-center-slider', 'employability-zone-slider', 'about-us', 'contact-us','testimonialall', 'privacy-policy', 'terms-of-use', 'our-values', 'news-letter', 'our-benefits', 'add_excel_user', 'execl_upload', 'is_validate_application', 'home_sheets', 'set_data_home', 'sana-for-school', 'sana-for-higher', 'sana-for-professionals', 'learning-objectives-school', 'program-benefits-school', 'course-content-school', 'learning-objectives-higher', 'program-benefits-higher', 'course-content-higher', 'learning-objectives-professional', 'program-benefits-professional', 'course-content-professional', 'blog', 'blog-detail', 'my-cart', 'blog_main', 'datetime', 'blog_nav', 'add_blog', 'add_cart', 'my_cart', 'remove_cart', 'get_node_child', 'get_package', 'sana-for-school', 'sana-for-professionals', 'sana-for-school', 'confirm_mail', 'aptitude-devlopment-home','Programs','Student_dashboard','test_center','blogs','custom_node_assignment_to_package','copy_node','sheet_copy','copy_question','copy_subjectivequestions','copy_quiz','curl','printPdf','cover_letter_save_PDF','cover_letter_save_ajax','Footer','myassetsinventory_PDF','QuizAnalatics','sheets_pdf','cv_edit','self_introduction_data_save','self_introduction_data_pdf','forgotpassowrd','recover_password','programedetails','otp_verification','verify_otp','reset_account','analytics','SummaryReport','QuestionReport','pdf_generation_action_sheet','node_api','add_package_master','save_add_package_master','add-program_category','add_sub_package_master','save_add_sub_package_master','get_subMasterData','report_date_range','options');
        if (($controller_name) && !(in_array($controller_name, $exempted_controllers, true))) {

            $octal_perm_code = $this->custom->validate_permissions($controller_name, $page_name, $resource_id);

            switch ($octal_perm_code) {
                case 0: {
                        if ($controller_name) {//not home page, and permission says not allowed
                            header('Location: ' . base_url());
                        }
                        break;
                    }
                case 1: {//not permissible
                        header('Location: ' . base_url());
                        break;
                    }
                case 2: {//not permissible
                        header('Location: ' . base_url());
                        break;
                    }
                case 3: {//not permissible
                        header('Location: ' . base_url());
                        break;
                    }
                case 4: {
                        if ($page_name) {//page specified in url but permission not allowing
                            header('Location: ' . base_url()); //not permissible
                        }
                        break;
                    }
                case 5: {
                        if ($page_name) {//page specified in url but permission not allowing
                            header('Location: ' . base_url()); //not permissible
                        }
                        break;
                    }
                case 6: {
                        if ($resource_id) {//resource specified in url but permission not allowing
                            header('Location: ' . base_url()); //not permissible
                        }
                        break;
                    }
                case 7: {//allowed
                        break;
                    }

                default: //not allowing precautionary
                    {
                        header('Location: ' . base_url()); //not permissible
                        break;
                    }
            }
        }
    }

    function index() {
        // echo $_SESSION['role_name'];
        // die;
        switch ($_SESSION['role_name']) {
            case 'Guest': {
                    $home_package = array();
                   // $home_package1 = array();
                    // $package_master = $this->main_model->select('package_master','id,name','name',array('is_deleted' => 0));
                    $package_master = $this->db->where('is_deleted' , 0)->get('package_master')->result();
                    $home_package =  $this->main_model->program_category('package_sub_master');
                    //$this->main_model->select('program_category','id,name,image','name',array('is_deleted' => 0,'id' => $value->id));
                    // }
                    // foreach($package_master as $key => $value)
                    //   {
                    //     $home_package[$value->name] = $this->main_model->select('program_category','*',array('is_deleted' => 0,'id' => $value->id));
                    //   }  
                    //   $home_package=   $this->main_model->select('package_sub_master','id,name,image','name',array('is_deleted' => 0,'package_master_id' => $value->id));
                    //   foreach($home_package as $values)
                    //   {
                   $testimonials = $this->main_model->select('testimonials','*','id',array('status' => active));
                   $data['home_packagea'] = $home_package;
                   $data['testimonials'] = $testimonials;
                //   $testimonialactive =  $this->main_model->testimonial('testimonial_category');
                //   $data['testimonialactive'] = $testimonialactive;
                    $this->load->view('aftersubscribepage',$data);
                    break;
                }
       case 'Student': {
				$_SESSION['page'] == 'Other';
                    $this->load->view('home_content_view');
                    break;
                }
       case 'Manager': {
                    $this->load->view('manager_content_view');
                    break;
                }
       case 'Content Creator': {
                    $this->load->view('manager_content_view');
                    break;
                }

       case 'Administrator': {
                    $this->load->view('manager_content_view');
                    break;
                }
            case 'Super Admin': {
                    $this->load->view('manager_content_view');
                    break;
                }
            default: {
                    $this->load->view('home_view'); // for temparoryction 
                    // $this->load->view('home_content_view');
                    break;
                }
        }
    }
   public function testicatdata(){
     $catId=  $this->input->post('catId');
   echo $catId;
       die();
   }
    public function signin() {
        $this->load->view('signin');
    }
    
    public function forgotpassowrd(){
        $this->load->view('forgot_password');
    }
    
    public function recover_password(){
        $email = htmlspecialchars($this->input->post('email'));
        $checkData = $this->main_model->checkData('*','users',array('email' => $email,'is_deleted'=> 0));
        $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'coskillpromise@skillpromise.co', // change it to yours
                'smtp_pass' => 'sq4q^s5%ZXzeH^4+', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
              );
                    $otp = rand(0,999999);    
                    $message = "Your OTP is $otp";
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('coskillpromise@skillpromise.co'); // change it to yours
                    $this->email->to($email);// change it to yours
                    $this->email->subject('SkillPromise');
                    $this->email->message($message);
                    if($this->email->send())
                   {
        if($checkData){
            $selectdata = $this->main_model->selectsingleData('users','*',array('email' => $email,'is_deleted'=> 0));
            
            // $otp = rand(0,999999);
            
            // $data['send_sms_Mobile'] = $selectdata->mobile.',';
            // $data['send_sms_Message'] = 'Dear ' . $selectdata->name.', '.$otp.' is Your one time password (OTP). Please enter the OTP to reset Account. Thank You, Team Skill Promise.$@#@$';
            // $data['email'] = 'vikas@skillpromise.com';
            // $data['password'] = 'lexicon321';
            // $data['send_method'] = 'Tranactional';
            // $data['type'] = 'Now';
            
            // $ch = curl_init();
            // $url = "http://sms.lexiconcpl.com/webservics/";
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // $output = curl_exec($ch);
            // curl_close($ch);
            
            // echo $output;
            // die;
            $_SESSION['forgot_email'] = $selectdata->email;
            $_SESSION['forgot_id'] = $selectdata->id;
            $_SESSION['mobile'] = $selectdata->mobile;
            $_SESSION['otp'] = $otp;                       
            header('Location: ' . base_url('otp_verification'));
                        }
                        else{
                              $_SESSION['msg_str'] .= 'Email Not Found';
                             $_SESSION['msg_hdr'] = 'Warning !';
                             header('Location: ' . base_url('forgotpassowrd'));
                        }
                        
                   }
             else
                  {
                   show_error($this->email->print_debugger());
                  }
    }
    
    public function otp_verification(){
        $data['email'] = $_SESSION['forgot_email'];
        $data['id'] = $_SESSION['forgot_id'];
        $data['mobile'] = $_SESSION['mobile'];
        $data['otp'] = $_SESSION['otp'];
        $data['start_mob'] = substr($data['mobile'],0,2);
        $data['end_mob'] = substr($data['mobile'],-3);
        //  echo "<pre>";
        //  print_r($data);
        //  die;
        $this->load->view('enter_otp',$data);
        $expireAfter = 3;
        //Check to see if our "last action" session
        //variable has been set.
    if(isset($_SESSION['last_action'])){
      //Figure out how many seconds have passed
      //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
      //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
      //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        unset($_SESSION['otp']);
        session_unset();
        session_destroy();
    }
}
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();
        if($data['otp'])
        {  
            
        }
        else{
          header('Location: ' . base_url('forgotpassowrd'));   
        }
    }
    
    public function verify_otp(){
        $dataotp = $_SESSION['otp'];
        $otp = $this->input->post('otp');
        
        if($dataotp == $otp){
          $this->load->view('reset_password');
        }else{
           $_SESSION['msg_str'] .= 'OTP Not Match Please Re-enter !';
           $_SESSION['msg_hdr'] = 'Warning !';
           header('Location: ' . base_url('otp_verification')); 
        }
        
        if($dataotp)
         { }
         else{
            header('Location: ' . base_url('forgotpassowrd'));   
         }
    }
    
    public function reset_account(){
        $password = $this->input->post();
        unset($password['submit']);
        // var_dump($password['password'] === $password['password2']);
        // echo "<pre>";
        // print_r($password);die;
        if($password['password'] === $password['password2']){
            $email = $_SESSION['forgot_email'];
            $id = $_SESSION['forgot_id'];
            $mobile = $_SESSION['mobile'];
            $otp = $_SESSION['otp'];
            $encrypt_password = hash('MD5',$password['password2']);
            $update_data = array(
                'password' => $encrypt_password
                );
            $this->main_model->update('users',$update_data,array('id' => $id,'email' => $email));
            $_SESSION['msg_str'] .= 'Password Reset Successfully';
            $_SESSION['msg_hdr'] = 'Done !';
            header('Location: ' . base_url('signin'));
            // echo "password match";die;
            }else{
           $_SESSION['msg_str'] .= 'Password Not Match';
           $_SESSION['msg_hdr'] = 'Warning !';
           header('Location: ' . base_url('forgotpassowrd'));
        }
    }

    public function showcontent($table = '', $id = "") {
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        $max_level = 0;
        $node = $this->main_model->get_name_from_id('node-users', 'node', $id, 'users');
        if ($node) {

//var_dump($node);

            $level = $this->main_model->get_node_level($node);
            $max_level = $level;
//var_dump($level);die;
            for ($i = 1; $i <= $level; $level--) {
                $base_node[$level]['id'] = $node;
                $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                $node = $base_node[$level]['parent_id'];
            }
//$row_data->node = $node;
//                echo "<pre>";
//                print_r($base_node);die;
            $data['max_level'] = $max_level;
            $data['baseNodes'] = $base_node;
        } else {
            $data['max_level'] = 0;
            $data['baseNodes'] = 0;
        }


        $this->load->view('assign-permission_sub_nodes', $data);
    }

    public function change_password() {
        $this->load->view('change_password');
    }

    public function do_password_change() {
        $this->form_validation->set_rules('old_pwd', 'old_password', 'required|alpha_numeric|trim|xss_clean|exact_length[32]');
        $this->form_validation->set_rules('new_pwd', 'new_password', 'required|alpha_numeric|trim|xss_clean|exact_length[32]|matches[cng_pwd]');
        $this->form_validation->set_rules('cng_pwd', 'cnf_password', 'required|alpha_numeric|trim|xss_clean|exact_length[32]');
        if ($this->form_validation->run() == FALSE) {
            $_SESSION['msg_str'] .= 'Please Check Javascript on your Browser is enabled and updated. Please try again.';
            $_SESSION['msg_hdr'] = "Alert !";
            header('Location: ' . base_url() . 'change_password');
        } else {//validation passed
            if ($_POST['old_pwd'] == $this->main_model->get_name_from_id('users', 'password', $_SESSION['user_id'])) {//old password matches
                $data['id'] = $_SESSION['user_id'];
                $data['password'] = $_POST['new_pwd'];
                $return_id = $this->main_model->add_update_record('users', $data, 'id');
                if ($return_id == $_SESSION['user_id']) {//database update confirmation passed
                    $_SESSION['msg_str'] .= 'Password updated Successfully !';
                    $_SESSION['msg_hdr'] = 'Information !';
                    header('Location: ' . base_url());
                } else {//database update confirmation failed
                    $_SESSION['msg_str'] .= 'Cannot update Password. Try again or contact Website Administrator.';
                    $_SESSION['msg_hdr'] = 'Alert !';
                    header('Location: ' . base_url());
                }
            } else {//validation failed
                $_SESSION['msg_str'] .= 'Wrong Old Password! Please verify and try again.';
                $_SESSION['msg_hdr'] = "Alert !";
                header('Location: ' . base_url() . 'change_password');
            }
        }
    }

    public function login_handler($user_id = "") {
        $user_details = $this->main_model->get_records_from_id('users', $user_id, "id");
        $_POST['email'] = $_POST['email'] ? $_POST['email'] : $user_details['email'];
        $_POST['pwd'] = $_POST['pwd'] ? $_POST['pwd'] : $user_details['password'];
        if (isset($_POST['email']) && isset($_POST['pwd'])) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|email');
            $this->form_validation->set_rules('pwd', 'Password', 'required|alpha_numeric|trim|xss_clean|exact_length[32]');
            if ($this->form_validation->run() == FALSE) {
                $_SESSION['msg_str'] .= 'Please Check Javascript on your Browser is enabled and updated. Please try again.';
                $_SESSION['msg_hdr'] = "Alert !";
                header('Location: ' . base_url() . 'signin');
            } else {
                $req_fields = array("id", "name", "password", "packages");
                $result = $this->main_model->get_selected_records('users', 'email', $_POST['email'], $req_fields);
                if ($result[0]['password'] == $_POST['pwd']) {
                    $_SESSION['user_id'] = $result[0]['id'];
                    $_SESSION['user_name'] = $result[0]['name'];
                    $_SESSION['packages'] = $result[0]['packages'];
                    $this->custom->load_user_acl($result[0]['id']);
                    switch ($_SESSION['role_name']) {
                        case 'Student':
                            header('Location: ' . base_url());
                            break;
                        case 'Manager':
                            header('Location: ' . base_url() . 'manage');
                            break;
                        default:header('Location: ' . base_url());
                            break;
                    }
                } else {
                    $_SESSION['msg_str'] .= 'Wrong Credentials. Please Check for Valid Email and Password.';
                    $_SESSION['msg_hdr'] = 'Alert !';
                    header('Location: ' . base_url() . 'signin');
                }
            }
        }
    }

    public function logout() {
        $this->load->view('logout');
    }

    public function blogList($cat = 0) {
        $cat_detail['act'] = $cat;
        $cat_detail['blog_details'] = array();
        $blog = $this->main_model->get_many_records('blog', '', '', 'id');
        foreach ($blog as $v) {
            $cat_detail['blog_details'][$v['category_id']][] = $v;
        }

        $cat_detail['category_details'] = $this->main_model->get_many_records('blog_category', '', '', 'id');
        foreach ($cat_detail['category_details'] as $key => $value) {
            if ($cat == 0 && $key == 0) {
                $cat_detail['act'] = $value['id'];
            }
            if (!isset($cat_detail['blog_details'][$value['id']])) {
                $cat_detail['blog_details'][$value['id']] = array();
            }
        }
//        echo '<pre>';
//        print_r($cat_detail);
//        die;
        $this->load->view('blog', $cat_detail);
    }

    public function blogDetail($id) {/////28/05/2018
//        $blog_id['id'] = $id;
        $blog = $this->main_model->get_records_from_id('blog', $id, 'id');
        $blog['category_details'] = $this->main_model->get_many_records('blog_category', '', '', 'id');
        $fil_data[0]['id'] = 'blog';
        $fil_data[0]['value'] = $id;
        $fil_data[1]['id'] = 'status';
        $fil_data[1]['value'] = 'Approve';
        $blog['comments'] = $this->main_model->get_many_records("blog_comments", $fil_data, '', 'id');
//        echo '<pre>';
//        print_r($blog);
//        die;
        $this->load->view('blogDetail', $blog);
    }

    public function SaveBlogComment() {
        $_POST['created_date'] = date('Y-m-d H:i:s');
        $return_id = $this->main_model->add_update_record('blog_comments', $_POST);
        $blog = $this->main_model->get_records_from_id('blog', $_POST['blog'], 'id');
        $email = '<h3>Category: ' . $this->main_model->get_name_from_id('blog_category', 'name', $blog['category_id'], 'id') . '</h3>'
                . '<br>'
                . '<p><b>Comment:  </b>' . $_POST['comment_text'] . '</p>'
                . '<a href="' . base_url() . 'blogComment/' . $return_id . '/Approve" style="background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  border-color: #00897b;
  cursor: pointer;">Aprprove</a>'
                . '<a href="' . base_url() . 'blogComment/' . $return_id . '/Reject" style="background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 100px;
  border-color: #00897b;
  cursor: pointer;">Reject</a>';
        $data['mail_to'] = 'blog@skillpromise.com';
//        $data['mail_to'] = 'jyoti.chopra@lexiconcpl.com';
        $data['subject'] = $blog['name'];
        $data['name_from'] = 'SkillPromise Admin.';
        $data['message'] = $email;
        $bcc = "jyoti.chopra@lexiconcpl.com";
        $data['mail_from'] = $_POST['email'];
        $data['cc'] = '';
        $data['bcc'] = $bcc;
        $data['name_from'] = $_POST['name'];

//        echo '<pre>';
//        print_r($data);
//        die;


        $ch = curl_init();                    // initiate curl
// $data = http_build_query($data);
        $ch = curl_init();                    // initiate curl
// $url = "http://166.62.121.164/lexi-mailer/send-mail-V-2.php"; // where you want to post data
        $url = "http://mailer.lexiconcpl.com/sendGrid/"; // where you want to post data
//      $url = "http://localhost/sendMail/sendGrid/";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute
        curl_close($ch); // close curl handle
        header('Location: ' . base_url() . 'blogDetail/' . $_POST['blog']);
    }
    public function exportsubscribe()
    {
       $export = $this->main_model->select('news_letter','','id',array('status' => active,'is_deleted'=>0));  
       $data['export']=$export;
       $html='<table><tr><th>Full Name	</th><th>Email</th></tr>';
       foreach($export as $export)
       {
        $html.= '<tr><td>'.$export->first_name.'</td><td>'.$export->email.'</td></tr>';
       }
        header('Content-Type:application/xls');
        header('Content-Disposition:attachment;filename=Subscribe.xls');
        $html.='</table>';
        echo $html;
    }
        public function exportunsubscribe()
    {
       $export = $this->main_model->select('news_letter','*','id',array('status' => inactive,'is_deleted'=>0));  
       $data['export']=$export;
       $html='<table><tr><th>Full Name	</th><th>Email</th><th>Reason</th></tr>';
       foreach($export as $export)
       {
        $html.= '<tr><td>'.$export->first_name.'</td><td>'.$export->email.'</td><td>'.$export->reason.'</td></tr>';
       }
        header('Content-Type:application/xls');
        header('Content-Disposition:attachment;filename=Unsubscribe.xls');
        $html.='</table>';
        echo $html;
    }
    public function blogComment($comment_id = 0, $status = '') {
        $data['id'] = $comment_id;
        $data['status'] = $status;
        $return_id = $this->main_model->add_update_record('blog_comments', $data, 'id');
        $blog_id = $this->main_model->get_name_from_id('blog_comments', 'blog', $comment_id, 'id');
        header('Location: ' . base_url() . 'blogDetail/' . $blog_id);
    }

    public function analytics($report_name = "", $sheet_id = "0", $template_instruction_id = "0") {
         if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        $arr['sheet_id'] = $sheet_id;
        switch ($report_name) {
            case "testsheet":
//=============================== get quiz answer details =============================
                $request_fields = array('id', 'quiz_id', 'user_id', 'start_time', 'submit_time', 'client_time_taken');
                $quiz_answer_details = $this->main_model->get_many_records('quiz_result', '', $request_fields);
//echo"<pre>";
// print_r($quiz_answer_details);//die;
// ================================== get quiz details  ===================================
//$request_fields_1 = array('id','name', 'node' ,'time_limit', 'quiz_type');
// $filter[0]['id'] = 'quiz_type !=';
// $filter[0]['value'] = 'Practice';
// $quiz_details = $this->main_model->get_many_records('quiz', $filter, $request_fields_1);

                $result = array();
                $total_student = $this->main_model->get_record_count('users', 'role', 1);

                foreach ($quiz_answer_details as $key => $answer) {
                    $quiz_id = $answer['quiz_id'];
                    $user_id = $answer['user_id'];
                    $user_type = $this->main_model->get_name_from_id("users", "role", $user_id);

                    if ($user_type == 1) {

                        if (array_key_exists($quiz_id, $result)) {

                            $result[$quiz_id]['total'] = $result[$quiz_id]['total'];

                            if ($answer['submit_time']) {
                                $result[$quiz_id]['completed'] = $result[$quiz_id]['completed'] + 1;
                                $result[$quiz_id]['in_progress'] = $result[$quiz_id]['in_progress'];
                                $result[$quiz_id]['pending'] = $result[$quiz_id]['pending'];
                            } else {
                                $result[$quiz_id]['completed'] = $result[$quiz_id]['completed'];
                                $result[$quiz_id]['in_progress'] = $result[$quiz_id]['in_progress'] + 1;
                                $result[$quiz_id]['pending'] = $result[$quiz_id]['pending'];
                            }
                            $result[$quiz_id]['pending'] = $total_student - ($result[$quiz_id]['completed'] + $result[$quiz_id]['in_progress']);
                        } else {

                            $result[$quiz_id]['name'] = $this->main_model->get_name_from_id("quiz", "name", $quiz_id);
                            $result[$quiz_id]['total'] = $total_student;

                            if ($answer['submit_time']) {
                                $result[$quiz_id]['completed'] = 1;
                                $result[$quiz_id]['in_progress'] = 0;
                            } else {

                                $result[$quiz_id]['completed'] = 0;
                                $result[$quiz_id]['in_progress'] = 1;
                            }
                            $result[$quiz_id]['pending'] = $total_student - ($result[$quiz_id]['completed'] + $result[$quiz_id]['in_progress']);
// echo $user_type.'user_id <br><br><br><br>';
                        }
                    }
                }
//echo '<pre>';
//print_r($result);die;
//var_dump($result);die;
                $data['result'] = $result;
                $this->load->view('testSheet', $data);
                break;
            case "scorecard":
                $this->load->view('scoreCard');
            case "SummaryReport":
                $this->load->view('SummaryReport');
                break;
            case "key_values":
//                echo '<pre>';
//                print_r($_POST);die;
                if (isset($_POST['sheet_id']))
                    $sheet_id = $_POST['sheet_id'];
                if (isset($_POST['section_id']))
                    $template_instruction_id = $_POST['section_id'];
//--------for find the section type used in action sheet-----dew
//                $fil[0]['id'] = 'user_id';
//                $fil[0]['value'] = $_SESSION['user_id'];
//                $fil[1]['id'] = 'sheet_id';
//                $fil[1]['value'] = $sheet_id;
//                $sheet_user_data=  $this->main_model->get_many_records('sheet_user',$fil,array('*'));
//                $template_instruction_id=  $this->main_model->get_name_from_id('sheet_section','section',$sheet_user_data[0]['id'],'sheet_user_id');
                $section_type_id = $this->main_model->get_name_from_id('template_instruction', 'section_type', $template_instruction_id);
                // echo "<pre>";
                // print_r($section_type_id);
                // die;
//----END----for find the section type used in action sheet-----dew
                if ($section_type_id == 1) {// Report for "checkbox_with_tooltip"
                    $request_fields = array('id', 'sheet_id', 'sheetvalue_id', 'user_id', 'reason', '');
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;
                    $filter[3]['id'] = 'is_submit';
                    $filter[3]['value'] = '0';

                    $key_values = $this->main_model->get_many_records('action_sheets', $filter, $request_fields);
                    $result['data'] = $key_values;
                    $result['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $result['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $result['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $result['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
                    // echo '<pre>';
                    // print_r($result);
                    // die;
                    $this->load->view('analytics_for_checkbox_with_tooltip', $result);
                } else if ($section_type_id == 2) {//Report for "Add More Type"
                    $request_fields = array("*");
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;

                    $key_values = $this->main_model->get_many_records('save_data_for_add_more_type', $filter, $request_fields);
                    $result['data'] = $key_values;
//                    $result['sheet_name'] = $this->main_model->get_name_from_id('sheets','name',$sheet_id,'id');
//                    echo '<pre>';
//                    print_r($result['data']);die;
//-----GROUPING OF ARRAY BY CATEGORY NAME WISE
                    $my_array = json_decode(json_encode($result['data']), True);
                    $arr['list'] = array();
                    foreach ($my_array as $key => $item) {
                        $arr['list'][$item['section_id']][$key] = $item;

//                        echo '<pre>';
//                    print_r($arr['list']);die;
                    }
                    ksort($arr['list']);
//-----end GROUPING OF ARRAY BY CATEGORY NAME WISE
                    $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $arr['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $arr['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $arr['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
//                    echo '<pre>';
//                    print_r($arr);die;
                    $this->load->view('analytics_for_add_more_type', $arr);
                } else if ($section_type_id == 3) {// Report for "checkbox_with_no_tooltip"
                    $request_fields = array('id', 'sheet_id', 'sheetvalue_id', 'user_id', 'reason', '');
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;
                    $filter[3]['id'] = 'is_submit';
                    $filter[3]['value'] = '0';


                    $key_values = $this->main_model->get_many_records('save_data_checkbox_with_no_tooltip', $filter, $request_fields);
                    $result['data'] = $key_values;
                    $result['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $result['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $result['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $result['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
//                    echo '<pre>';
//                    print_r($result);die;
                    $this->load->view('analytics_for_checkbox_with_no_tooltip', $result);
                } else if ($section_type_id == 4) {// Report for "tickmark_type"
                    $request_fields = array("*");
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;
                    $filter[3]['id'] = 'is_submit';
                    $filter[3]['value'] = '0';

                    $key_values = $this->main_model->get_many_records('save_data_tickmark_type', $filter, $request_fields);
                    $result['data'] = $key_values;

// $result['sheet_name'] = $this->main_model->get_name_from_id('sheets','name',$sheet_id,'id');
//-----GROUPING OF ARRAY BY OPTION SELECTED(STRENGTH,AOI) WISE
                    $my_array = json_decode(json_encode($result['data']), True);
                    $arr['list'] = array();
                    foreach ($my_array as $key => $item) {
                        $arr['list'][$item['tickmark_type_header_id']][$key] = $item;
                    }
                    ksort($arr['list']);
//-----end GROUPING OF ARRAY BY OPTION SELECTED(STRENGTH,AOI) WISE
                    $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $arr['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $arr['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $arr['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
//                    echo '<pre>';
//                    print_r($arr);
//                    die;
                    $this->load->view('analytics_for_tickmark_type', $arr);


//                    =====================================================================
                } else if ($section_type_id == 9) {// Report for "adv_tickmark_type"
                    $request_fields = array("*");
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;
                    $filter[3]['id'] = 'is_submit';
                    $filter[3]['value'] = '0';

                    $key_values = $this->main_model->get_many_records('save_data_adv_tickmark', $filter, $request_fields);
                    $result['data'] = $key_values;
// $result['sheet_name'] = $this->main_model->get_name_from_id('sheets','name',$sheet_id,'id');
//-----GROUPING OF ARRAY BY OPTION SELECTED(STRENGTH,AOI) WISE
                    $my_array = json_decode(json_encode($result['data']), True);
                    $arr['list'] = array();
                    foreach ($my_array as $key => $item) {
                        $arr['list'][$item['tickmark_adv_header_id']][$key] = $item;
                    }
                    ksort($arr['list']);
//-----end GROUPING OF ARRAY BY OPTION SELECTED(STRENGTH,AOI) WISE
                    $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $arr['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $arr['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $arr['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
//                    echo '<pre>';
//                    print_r($arr);die;
                    $this->load->view('analytics_for_adv_tickmark', $arr);

//
//                    ===========================================================
                } else if ($section_type_id == 10) {// Report for ""
                    $request_fields = array("*");
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;
                    $filter[3]['id'] = 'is_submit';
                    $filter[3]['value'] = '0';

                    $key_values = $this->main_model->get_many_records('save_data_dropdown_with_multi_addmore', $filter, $request_fields);
                    $result['data'] = $key_values;
// $result['sheet_name'] = $this->main_model->get_name_from_id('sheets','name',$sheet_id,'id');
//-----GROUPING OF ARRAY BY OPTION SELECTED(STRENGTH,AOI) WISE
                    $my_array = json_decode(json_encode($result['data']), True);
                    $arr['list'] = array();
                    foreach ($my_array as $key => $item) {
                        $arr['list'][$item['multi_addmore_category_id']][$key] = $item;
                    }
                    ksort($arr['list']);
//-----end GROUPING OF ARRAY BY OPTION SELECTED(STRENGTH,AOI) WISE
                    $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $arr['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $arr['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $arr['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
//                    echo '<pre>';
//                    print_r($arr);die;
                    $this->load->view('analytics_dropdown_with_multi_addmore', $arr);

//
//                    ===========================================================
                } else if ($section_type_id == 5) {// Report for "listing type"
                    $request_fields = array("*");
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;
                    $filter[3]['id'] = 'is_submit';
                    $filter[3]['value'] = '0';

                    $key_values = $this->main_model->get_many_records('save_data_listing_type', $filter, $request_fields);
                    $result['data'] = $key_values;
//-----GROUPING OF ARRAY BY OPTION SELECTED(STRENGTH,AOI) WISE
                    $my_array = json_decode(json_encode($result['data']), True);
                    $arr['list'] = array();
                    foreach ($my_array as $key => $item) {
                        $arr['list'][$item['listing_type_id']][$key] = $item;
                    }
                    ksort($arr['list']);
//-----end GROUPING OF ARRAY BY OPTION SELECTED(STRENGTH,AOI) WISE
                    $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $arr['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $arr['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $arr['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
//                    echo '<pre>';
//                    print_r($arr);die;
                    $this->load->view('analytics_for_listing_type', $arr);
                } else if ($section_type_id == 6) {// Report for "descriptive type"
                    $request_fields = array("*");
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;
                    $filter[3]['id'] = 'is_submit';
                    $filter[3]['value'] = '0';

                    $key_values = $this->main_model->get_many_records('save_data_descriptive_type', $filter, $request_fields);
                    $result['data'] = $key_values;
                    foreach ($result['data'] as $key1 => $value_table) {
                        $result['data'][$key1]['descriptive_type_id'] = $this->main_model->get_name_from_id('descriptive_type_details', 'descriptive_type_id', $value_table['description_details_id'], 'id');
                    }
//-----GROUPING OF ARRAY BY description type WISE
                    $my_array = json_decode(json_encode($result['data']), True);
                    $arr['list'] = array();
                    foreach ($my_array as $key => $item) {
                        $arr['list'][$item['descriptive_type_id']][$key] = $item;
                    }
                    ksort($arr['list']);
//-----end GROUPING OF ARRAY BY description type WISE
                    $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $arr['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $arr['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $arr['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
//                    echo '<pre>';
//                    print_r($arr);die;
                    $this->load->view('analytics_for_descriptive_type', $arr);
                } else if ($section_type_id == 8) {// Report for "range_type"
                    $request_fields = array("*");
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;
                    $filter[3]['id'] = 'is_submit';
                    $filter[3]['value'] = '0';

                    $key_values = $this->main_model->get_many_records('save_data_range_type', $filter, $request_fields);
                    $result['data'] = $key_values;
                    foreach ($result['data'] as $key1 => $value_table) {
                        $result['data'][$key1]['sheet_cat_id'] = $this->main_model->get_name_from_id('range_type', 'category', $value_table['range_type_id'], 'id');
                    }
//-----GROUPING OF ARRAY BY sheet category WISE
                    $my_array = json_decode(json_encode($result['data']), True);
                    $arr['list'] = array();
                    foreach ($my_array as $key => $item) {
                        $arr['list'][$item['sheet_cat_id']][$key] = $item;
                    }
                    ksort($arr['list']);
//-----end GROUPING OF ARRAY BY sheet category WISE
                    $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $arr['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $arr['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $arr['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
//                    echo '<pre>';
//                    print_r($arr);die;
                    $this->load->view('analytics_for_range_type', $arr);
                } else if ($section_type_id == 7) {// Report for "marking_type"
                    $request_fields = array("*");
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;
                    $filter[3]['id'] = 'is_submit';
                    $filter[3]['value'] = '0';

                    $key_values = $this->main_model->get_many_records('save_data_marking_type', $filter, $request_fields);
                    $result['data'] = $key_values;
                    foreach ($result['data'] as $key1 => $value_table) {
                        $result['data'][$key1]['sheet_cat_id'] = $this->main_model->get_name_from_id('marking_type', 'category', $value_table['marking_type_id'], 'id');
                    }
//-----GROUPING OF ARRAY BY sheet category WISE
                    $my_array = json_decode(json_encode($result['data']), True);
                    $arr['list'] = array();
                    foreach ($my_array as $key => $item) {
                        $arr['list'][$item['sheet_cat_id']][$key] = $item;
                    }
                    ksort($arr['list']);
//-----end GROUPING OF ARRAY BY sheet category WISE
                    $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $arr['template_instruction_id'] = $template_instruction_id;
                    $arr['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $arr['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $arr['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
                    // echo '<pre>';
                    // print_r($arr);die;
                    $this->load->view('analytics_for_marking_type', $arr);
                } else if ($section_type_id == 11) {//Report for "Add More checkbox content"
                    $request_fields = array("*");
                    $filter[0]['id'] = 'user_id';
                    $filter[0]['value'] = $_SESSION['user_id'];
                    $filter[1]['id'] = 'sheet_id';
                    $filter[1]['value'] = $sheet_id;
                    $filter[2]['id'] = 'sheet_section_id'; //ie template_instruction_id
                    $filter[2]['value'] = $template_instruction_id;

                    $key_values = $this->main_model->get_many_records('add_more_checkbox_contents', $filter, $request_fields, 'id');
                    $result['data'] = $key_values;
//                    $result['sheet_name'] = $this->main_model->get_name_from_id('sheets','name',$sheet_id,'id');
//                    echo '<pre>';
//                    print_r($result['data']);die;
//-----GROUPING OF ARRAY BY CATEGORY NAME WISE
                    $my_array = json_decode(json_encode($result['data']), True);
                    $arr['list'] = array();
                    foreach ($my_array as $key => $item) {
                        $arr['list'][$item['section_id']][$key] = $item;

//                        echo '<pre>';
//                    print_r($arr['list']);die;
                    }
                    ksort($arr['list']);
//-----end GROUPING OF ARRAY BY CATEGORY NAME WISE
                    $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                    $arr['image_file'] = $this->main_model->get_name_from_id('sheets', 'image_file', $sheet_id, 'id');
                    $arr['image_comment'] = $this->main_model->get_name_from_id('sheets', 'image_comment', $sheet_id, 'id');
                    $arr['analytics_comment'] = $this->main_model->get_name_from_id('sheets', 'analytics_comment', $sheet_id, 'id');
//                    echo '<pre>';
//                    print_r($arr);die;
                    $this->load->view('analytics_for_sheet_addmore_checkbox_content', $arr);
                } else {
                    die("No Report is Prepared of this action sheet");
//$this->load->view('keyvalues', $result);
                }

                break;


            default:
                break;
        }
    }
    
    public function SummaryReport($id = 0,$college='',$course='',$stream='') {
        //echo $college;die;
        $usr_data = array();
        $quiz_id = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
        // echo $this->db->last_query();
        // echo "<pre>";
        // print_r($quiz_id);die;
        $summary['quiz_name'] = $this->main_model->get_name_from_id("quiz", "name", $quiz_id);
        $filter[0]['id'] = "status";
        $filter[0]['value'] = "Active";
        $summary['cat'] = $this->main_model->get_many_records("category", $filter);

        $filter[1]['id'] = "role";
        $filter[1]['value'] = 1;
        $filter[2]['id'] = "scu";
        $filter[2]['value'] = $college;
        $filter[3]['id'] = "course";
        $filter[3]['value'] = $course;
        $filter[4]['id'] = "stream";
        $filter[4]['value'] = $stream;
        // echo "<pre>";
        // print_r($filter);die;
        $req_field = array("id", "name", "email","address");
        $users = $this->main_model->get_many_records("users", $filter, $req_field, "email ASC");
        echo $this->db->last_query();die;
        foreach ($users as $key => $value) {
            $usr_data[$key]['email'] = $value['email'];
            $usr_data[$key]['name'] = $value['name'];
            $usr_data[$key]['address'] = $value['address'];
            $attempt = $this->custom->is_quiz_attempted($quiz_id, $value['id']);
            //var_dump($attempt);die;
            if ($attempt) {
                $submited = $this->custom->is_quiz_submited($attempt);
                if ($submited) {
                    $usr_data[$key]['status'] = "Completed";
                    $filter4[0]['id'] = "quiz_id";
                    $filter4[0]['value'] = $quiz_id;
                    $filter4[1]['id'] = "user_id";
                    $filter4[1]['value'] = $value['id'];
                    $req_field = array("id");
                    $quiz_result_id = $this->main_model->get_many_records("quiz_result", $filter4, $req_field);
//                var_dump($quiz_result_id);
                    $filter5[0]['id'] = "quiz_result_id";
                    $filter5[0]['value'] = $quiz_result_id[0]['id'];
                    $student['quiz_result'] = $this->main_model->get_many_records("quiz_result_answers", $filter5, "", "question_no");
                    $str = "Select";
                    //====================================================================
                    $category = array();

                    foreach ($student['quiz_result'] as $key2 => $answer) {
//                print_r($answer);
//                die;
                        $id = $answer['category'];
                        if (array_key_exists($id, $category)) {

                            $category[$id]['no_of_question'] ++;
                            $category[$id]['visited'] = ($answer['visited'] == 1) ? ($category[$id]['visited'] + 1) : $category[$id]['visited'];
                            $category[$id]['answer'] = ($answer['answered'] == 1) ? ($category[$id]['answer'] + 1) : $category[$id]['answer'];
                            $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? ($category[$id]['marked_for_review'] + 1) : $category[$id]['marked_for_review'];
                            $category[$id]['correct'] = ($answer['marks'] > 0) ? ($category[$id]['correct'] + 1) : $category[$id]['correct'];
                            $category[$id]['marks'] = ($answer['marks'] > 0 ) ? ($category[$id]['marks'] + $answer['marks']) : $category[$id]['marks'];
                        } else {
                            $category[$id]['name'] = $this->main_model->get_name_from_id("category", "name", $id);
                            ;
                            $category[$id]['no_of_question'] = 1;
                            $category[$id]['visited'] = ($answer['visited'] == 1) ? 1 : 0;
                            $category[$id]['answer'] = ($answer['answered'] == 1) ? 1 : 0;
                            $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? 1 : 0;
                            $category[$id]['correct'] = ($answer['marks'] > 0 ) ? 1 : 0;
                            $category[$id]['marks'] = ($answer['marks'] > 0 ) ? $answer['marks'] : 0;
                        }
                    }
                    $usr_data[$key]['category'] = $category;
                } else {

                    $usr_data[$key]['status'] = "Not Submited";
                }
            } else {
                $usr_data[$key]['status'] = "Not Attempted";
            }
            //echo var_dump($category);
            //$summary['category'] = $category;
            //$summary['quiz_id'] = $quiz_id;
        }
        $summary['user'] = $usr_data;
        $summary['quiz_id'] = $quiz_id;
        // echo '<pre>';
        // print_r($summary);
        // die;
        //===========================================================================================
        $this->load->view('SummaryReportView', $summary);
    }

    public function QuestionReport($id = 0) {
        $quiz_data = $this->main_model->get_records_from_id('quiz', $id, 'node');
        $quiz = $quiz_data['id'];
        $quiz_nqme = $quiz_data['name'];
        $result['quiz_name'] = $this->main_model->get_name_from_id("quiz", "name", $quiz);
        $sql = "SELECT question_id,questions.question_text,count(*) AS totalUser,sum(case when answered=1 AND marks=1 then 1 else 0 end) correct,sum(case when answered=1 AND marks=0 then 1 else 0 end) wrong,
    sum(case when answered=0 then 1 else 0 end) notattempted FROM `quiz_result_answers`,`questions` where quiz_result_id IN (SELECT `quiz_result`.id FROM `quiz_result`,`users` WHERE quiz_result.user_id=users.id AND quiz_result.is_deleted=0 AND users.role=1 AND quiz_result.quiz_id = $quiz) AND quiz_result_answers.question_id =questions.id AND "
                . "questions.quiz_id=$quiz AND questions.is_deleted=0 GROUP BY question_id";
        $result['data'] = $this->db->query($sql)->result_array();
        $this->load->view('QuestionReportView', $result);
    }
    
    public function showsheet() {
        $this->load->view('Key_values');
    }

    public function show_nodes() {
        $packages = $_POST['packages'];
        $sql = "SELECT node.id, node.name from `node`,`packages-node` where `packages-node`.packages = $packages and `packages-node`.node = `node`.id";
        $data = $this->db->query($sql)->result_array();
        print_r(json_encode($data));
        die;
    }

    public function show_sheets() {
//        echo '<pre>';
//        print_r($_POST);
//        die;
        // $_POST['node'] = 1256;
        $node = $_POST['node'];
        $filter[0]["id"] = "parent_id";
        $filter[0]["value"] = $node;
        $filter[1]["id"] = "type";
        $filter[1]["value"] = "Sheet";
        $req = array("id");
        $id = $this->main_model->get_many_records("node", $filter, $req);

        if (!empty($id)) {
            foreach ($id as $key => $val) {
                $filter1[0]["id"] = "node";
                $filter1[0]["value"] = $val['id'];
                $req5 = array("name", "id");
                $data[] = $this->main_model->get_many_records("sheets", $filter1, $req5);
            }
        }
        echo(json_encode($data));
        die;
    }

    //   public function show_sheets() {
    //       $node = $_POST['node'];
    //       $sql = "SELECT sheets.id, sheets.name from `sheets`,`packages-node` where `packages-node`.node = $node and `packages-node`.node = `sheets`.node Group By `packages-node`.node";
    //       $data = $this->db->query($sql)->result_array();
    //       print_r(json_encode($data));
    //       die;
    //   }

    public function score_card() {

        $data['quiz_result'] = $this->custom->quiz_result('student_id', $_SESSION['user_id']);
// var_dump($data); die;
        $this->load->view('student_score', $data);
    }

    public function quiz($quiz_mode = '', $quiz_id = 0, $page_no = '', $nav_type = '', $id = '') {//$quiz_mode -> 1->scoring, 2->practice quiz , 3->result

        function is_answered($qid, $answered_array) {
            foreach ($answered_array as $val) {
                if ($val['selected_opt'] == $qid) {
                    return 1;
                }
            }
            return 0;
        }

//========================================pahle ka chala huwa========================================================
        $quiz['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();
        if ($quiz_mode != "practice") {

            $query_str1 = 'SELECT category.id as category_id, category.name as category_name, COUNT(questions.category) as no_of_questions FROM questions JOIN category ON questions.category = category.id
                       WHERE questions.quiz_id = ' . $quiz_id . ' AND questions.status = "Active" AND questions.is_deleted = 0 GROUP BY category.id';
            $quiz['category'] = $this->db->query($query_str1)->result_array();

            $subjectivequestions['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();
            $query_str2 = 'SELECT category.id as category_id, category.name as category_name, COUNT(subjectivequestions.category) as no_of_questions FROM subjectivequestions JOIN category ON subjectivequestions.category = category.id
                       WHERE subjectivequestions.quiz_id = ' . $quiz_id . ' AND subjectivequestions.status = "Active" AND subjectivequestions.is_deleted = 0 GROUP BY category.id';
            $subjectivequestions['category'] = $this->db->query($query_str2)->result_array();

            $quiz['questions'] = $this->main_model->get_records('questions', 'quiz_id', $quiz_id, 'category, id')->result_array();
            $subjectivequestions['subquestions'] = $this->main_model->get_records('subjectivequestions', 'quiz_id', $quiz_id, 'category, id')->result_array();

            foreach ($quiz['questions'] as $question) {
                $options[$question['id']] = $this->main_model->get_records('options', 'question_id', $question['id'], 'option_number')->result_array();
            }

            $quiz['options'] = $options;

            if ($this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id)) {
                $request_fields = array('id', 'quiz_id', 'name', 'story_content');
                $quiz['story'] = $this->main_model->get_selected_records('quiz_story', 'quiz_id', $quiz_id, $request_fields);
                $subjectivequestions['story'] = $this->main_model->get_selected_records('quiz_story', 'quiz_id', $quiz_id, $request_fields);
///   ------------------working ----------------------------
            }
        }
//========================================================================
        switch ($quiz_mode) {

            case "board" :
                $data['quiz_id'] = $quiz_id;
                $data['user_id'] = $_SESSION['user_id'];
                $data['start_time'] = date('Y-m-d H:m:s');

                $quiz_result_id = $this->main_model->add_update_record("quiz_result", $data);

                $quiz['quiz_result_id'] = $quiz_result_id;
                // echo "<pre>";
                // print_r($quiz);
                // die;
                $this->load->view('boardQuiz', $quiz);
                break;

            case "scoring" : $this->load->view('scoringquiz', $quiz);
                break;

            case "flex" : $this->load->view('dashboardquiz', $quiz);
                break;

            case "result" :
                $filter[0]['id'] = 'quiz_id';
                $filter[0]['value'] = $quiz_id;
                $filter[1]['id'] = 'user_id';
                $filter[1]['value'] = $_SESSION['user_id'];
                $quiz['quiz_result_detail'] = $this->main_model->get_many_records('quiz_result', $filter, "", "");
                $filter2[0]['id'] = 'quiz_result_id';
                $filter2[0]['value'] = $quiz['quiz_result_detail'][0]['id'];
                $filter2[1]['id'] = 'select_type';
                $filter2[1]['value'] = 'Single';
                $filter2[2]['id'] = 'answered <>';
                $filter2[2]['value'] = '0';
                $request_fields1 = array("selected as selected_opt");
                $quiz['single_options'] = $this->main_model->get_many_records('quiz_result_answers', $filter2, $request_fields1, "question_id");

                $filter3[0]['id'] = 'quiz_result_id';
                $filter3[0]['value'] = $quiz['quiz_result_detail'][0]['id'];
                $request_fields = array("option_id as selected_opt");
                $quiz['multi_options'] = $this->main_model->get_many_records('quiz_result_options', $filter3, $request_fields, "option_id");

                $answered_options = array_merge($quiz['single_options'], $quiz['multi_options']);


                foreach ($quiz['options'] as $key1 => $q) {
                    foreach ($q as $key2 => $value) {
                        if (is_answered($value['option_id'], $answered_options)) {
                            $quiz['options'][$key1][$key2]['answered'] = 1;
                        } else {
                            $quiz['options'][$key1][$key2]['answered'] = 0;
                        }
                    }
                }
                $this->load->view('resultquiz', $quiz);
                break;

            case "summary" :
                $summary['quiz_name'] = $this->main_model->get_name_from_id("quiz", "name", $quiz_id);
                $filter4[0]['id'] = "quiz_id";
                $filter4[0]['value'] = $quiz_id;
                $filter4[1]['id'] = "user_id";
                $filter4[1]['value'] = $_SESSION['user_id'];
                $req_field = array("id");
                $quiz_result_id = $this->main_model->get_many_records("quiz_result", $filter4, $req_field);
//                var_dump($quiz_result_id);
                $filter5[0]['id'] = "quiz_result_id";
                $filter5[0]['value'] = $quiz_result_id[0]['id'];
                $summary['quiz_result'] = $this->main_model->get_many_records("quiz_result_answers", $filter5, "", "question_no");
                $str = "Select";
//====================================================================
                $category = array();

                foreach ($summary['quiz_result'] as $key => $answer) {
                    $id = $answer['category'];
                    if (array_key_exists($id, $category)) {

                        $category[$id]['no_of_question'] ++;
                        $category[$id]['visited'] = ($answer['visited'] == 1) ? ($category[$id]['visited'] + 1) : $category[$id]['visited'];
                        $category[$id]['answer'] = ($answer['answered'] == 1) ? ($category[$id]['answer'] + 1) : $category[$id]['answer'];
                        $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? ($category[$id]['marked_for_review'] + 1) : $category[$id]['marked_for_review'];
                        $category[$id]['correct'] = ($answer['marks'] == 1) ? ($category[$id]['correct'] + 1) : $category[$id]['correct'];
                    } else {
                        $category[$id]['name'] = $this->main_model->get_name_from_id("category", "name", $id);
                        $category[$id]['no_of_question'] = 1;
                        $category[$id]['visited'] = ($answer['visited'] == 1) ? 1 : 0;
                        $category[$id]['answer'] = ($answer['answered'] == 1) ? 1 : 0;
                        $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? 1 : 0;
                        $category[$id]['correct'] = ($answer['marks'] > 0 ) ? 1 : 0;
                    }
                }

                $summary['category'] = $category;
                $summary['quiz_id'] = $quiz_id;

//================================================================================
                $quiz_cat = $this->main_model->get_name_from_id("quiz", "quiz_category", $quiz_id, "id");
                // echo "<pre>";
                // print_r($quiz_cat);die;
//=========================Checking the quiz category============================
                if ($quiz_cat == "TopicWise") {
                    $this->load->view('topicwisetestcentre', $summary);
                } elseif ($quiz_cat == "Comprehensive") {
                    $this->load->view('compretestcentre', $summary);
                } else {
                    $this->load->view('result_summary', $summary);
                }
                break;

            case "practice" :
                $pagesize = $this->main_model->get_name_from_id('quiz', 'pagination', $quiz_id, 'id');
                $filter[0]['id'] = "quiz_id";
                $filter[0]['value'] = $quiz_id;
                $tcount = ($this->main_model->count_records('questions', $filter));
                $filter[1]['id'] = "story";
                $filter[1]['value'] = 0;
                $count = ($this->main_model->count_records('questions', $filter));
                $scount = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
                $n = intval($count / $pagesize);
                
                $r = $count % $pagesize;
                if($r > 0) {
                    $n++;
                }
                
                $total_pages = $n + $scount;
                $quiz["total_pages"] = $total_pages;
                $quiz["current"] = $page_no;

                $quiz["link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/";
                if(($page_no - 1) > 0) {
                    $quiz["prev_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no - 1) . '/' . $nav_type . '/' . $id;
                } else {
                    $quiz["prev_link"] = "#";
                }
                if(($page_no + 1) > $total_pages) {
                    $quiz["next_link"] = "#";
                } else {
                    $quiz["next_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no + 1) . '/' . $nav_type . '/' . $id;
                }

                if($page_no > $n) 
                {
                    $sques = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
                    if (($page_no - $n) > 1) {
                        $start = ($page_no - $n) - 1;
                    } else {
                        $start = 0;
                    }
                    $quiz['start'] = $count + (($page_no - $n) - 1);
                    $limit = 1;
                    $f[0]['id'] = "quiz_id";
                    $f[0]['value'] = $quiz_id;
                    $story_id = $this->main_model->get_records_with_limit('quiz_story', $f, $start, $limit)->result_array();
                    $quiz['story'] = $story_id;

                    $filter[1]['id'] = "story";
                    $filter[1]['value'] = $story_id[0]['id'];
                    $quiz['questions'] = $this->main_model->get_records_with_limit('questions', $filter)->result_array();
                } else {
                    if ($page_no > 1) {
                        $quiz['start'] = ($page_no - 1) * $pagesize;
                    } else {
                        $quiz['start'] = 0;
                    }
                    $limit = $pagesize;
                    $quiz['questions'] = $this->main_model->get_records_with_limit('questions', $filter, $quiz['start'], $limit, 'category, id')->result_array();
                }

                $quiz['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();

                $query_str1 = 'SELECT category.id as category_id, category.name as category_name, COUNT(questions.category) as no_of_questions FROM questions JOIN category ON questions.category = category.id
                       WHERE questions.quiz_id = ' . $quiz_id . ' AND questions.status = "Active" AND questions.is_deleted = 0 GROUP BY category.id';
                $quiz['category'] = $this->db->query($query_str1)->result_array();

                $options = array();
                foreach ($quiz['questions'] as $question) {
                    $options[$question['id']] = $this->main_model->get_records('options', 'question_id', $question['id'], 'option_number')->result_array();
                    //echo $this->db->last_query();die;
                }

                $quiz['options'] = $options;
                $quiz["nav_type"] = $nav_type;
                $quiz["id"] = $id;
                // echo "<pre>";
                // print_r($quiz);
                // die;
                $this->load->view('practicequiz', $quiz);
                break;

            case "subjective" :
                $pagesize = $pagesize = $this->main_model->get_name_from_id('quiz', 'pagination', $quiz_id, 'id');
                $filter[0]['id'] = "quiz_id";
                $filter[0]['value'] = $quiz_id;
                $tcount = ($this->main_model->count_records('subjectivequestions', $filter));
                $filter[1]['id'] = "story";
                $filter[1]['value'] = 0;
                $count = ($this->main_model->count_records('subjectivequestions', $filter));
                $scount = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
                $n = intval($count / $pagesize);
                $r = $count % $pagesize;
                if ($r > 0) {
                    $n++;
                }
                $total_pages = $n + $scount;
                $subjectivequestions["total_pages"] = $total_pages;
                $subjectivequestions["current"] = $page_no;
                $subjectivequestions["link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/";
                if (($page_no - 1) > 0) {
                    $subjectivequestions["prev_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no - 1) . '/' . $nav_type . '/' . $id;
                } else {
                    $subjectivequestions["prev_link"] = "#";
                }
                if (($page_no + 1) > $total_pages) {
                    $subjectivequestions["next_link"] = "#";
                } else {
                    $subjectivequestions["next_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no + 1) . '/' . $nav_type . '/' . $id;
                }
                if ($page_no > $n) {
                    $sques = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
                    if (($page_no - $n) > 1) {
                        $start = ($page_no - $n) - 1;
                    } else {
                        $start = 0;
                    }
                    $subjectivequestions['start'] = $count + (($page_no - $n) - 1);
                    $limit = 1;
                    $f[0]['id'] = "quiz_id";
                    $f[0]['value'] = $quiz_id;
                    $story_id = $this->main_model->get_records_with_limit('quiz_story', $f, $start, $limit)->result_array();
                    $subjectivequestions['story'] = $story_id;

                    $filter[1]['id'] = "story";
                    $filter[1]['value'] = $story_id[0]['id'];
                    $subjectivequestions['subquestions'] = $this->main_model->get_records_with_limit('subjectivequestions', $filter)->result_array();
                } else {
                    if ($page_no > 1) {
                        $subjectivequestions['start'] = ($page_no - 1) * $pagesize;
                    } else {
                        $subjectivequestions['start'] = 0;
                    }
                    $limit = $pagesize;
                    $subjectivequestions['subquestions'] = $this->main_model->get_records_with_limit('subjectivequestions', $filter, $subjectivequestions['start'], $limit, 'category, id')->result_array();
                }

                $subjectivequestions['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();
                $query_str2 = 'SELECT category.id as category_id, category.name as category_name, COUNT(subjectivequestions.category) as no_of_questions FROM subjectivequestions JOIN category ON subjectivequestions.category = category.id
                       WHERE subjectivequestions.quiz_id = ' . $quiz_id . ' AND subjectivequestions.status = "Active" AND subjectivequestions.is_deleted = 0 GROUP BY category.id';
                $subjectivequestions['category'] = $this->db->query($query_str2)->result_array();
// $subjectivequestions['subquestions'] = $this->main_model->get_records('subjectivequestions', 'quiz_id', $quiz_id, 'category, id')->result_array();
//        var_dump($this->db->last_query());
                $subjectivequestions["nav_type"] = $nav_type;
                $subjectivequestions["id"] = $id;
                //echo "ddd";die;
                $this->load->view('subjectivequiz', $subjectivequestions);
                break;
            default : break;
        }
    }

//     public function quiz($quiz_mode = "practice", $quiz_id = 0, $page_no = 1, $nav_type = '', $id = '') {//$quiz_mode -> 1->scoring, 2->practice quiz , 3->result
//         function is_answered($qid, $answered_array) {
//             foreach ($answered_array as $val) {
//                 if ($val['selected_opt'] == $qid) {
//                     return 1;
//                 }
//             }
//             return 0;
//         }
//         //==============================pahle ka chala huwa
//         $quiz['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();
//  if ($quiz_mode != "practice") {
//         $query_str1 = 'SELECT category.id as category_id, category.name as category_name, COUNT(questions.category) as no_of_questions FROM questions JOIN category ON questions.category = category.id
//                        WHERE questions.quiz_id = ' . $quiz_id . ' AND questions.status = "Active" AND questions.is_deleted = 0 GROUP BY category.id';
//         $quiz['category'] = $this->db->query($query_str1)->result_array();
//         $subjectivequestions['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();
//         $query_str2 = 'SELECT category.id as category_id, category.name as category_name, COUNT(subjectivequestions.category) as no_of_questions FROM subjectivequestions JOIN category ON subjectivequestions.category = category.id
//                        WHERE subjectivequestions.quiz_id = ' . $quiz_id . ' AND subjectivequestions.status = "Active" AND subjectivequestions.is_deleted = 0 GROUP BY category.id';
//         $subjectivequestions['category'] = $this->db->query($query_str2)->result_array();
// //        var_dump($subjectivequestions['category']);
// //        die;
// //        $filter4[0]['id'] = 'status';
// //        $filter4[0]['value'] = 'Active';
// //        $filter4[0]['id'] = 'quiz_id';
// //        $filter4[0]['value'] = $quiz_id;
// //        $quiz['quiz_category'] = $this->main_model->get_many_records('questions', 'status', 'Active', 'id')->result_array();
//         $quiz['questions'] = $this->main_model->get_records('questions', 'quiz_id', $quiz_id, 'category, id')->result_array();
//         $subjectivequestions['subquestions'] = $this->main_model->get_records('subjectivequestions', 'quiz_id', $quiz_id, 'category, id')->result_array();
// //        var_dump($this->db->last_query());
// //        die;
//         $options = '';
//         foreach ($quiz['questions'] as $question) {
//             $options[$question['id']] = $this->main_model->get_records('options', 'question_id', $question['id'], 'option_number')->result_array();
//         }
//         $quiz['options'] = $options;
//         if ($this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id)) {
//             $request_fields = array('id', 'quiz_id', 'name', 'story_content');
//             $quiz['story'] = $this->main_model->get_selected_records('quiz_story', 'quiz_id', $quiz_id, $request_fields);
//             $subjectivequestions['story'] = $this->main_model->get_selected_records('quiz_story', 'quiz_id', $quiz_id, $request_fields);
//             ///   working ------
//         }
// 	}
//         //===============================
//         switch ($quiz_mode) {
//             case "board" :
//                 //var_dump($quiz);die;
//                 //$data['quiz_id'] = $quiz['quiz_detail']->id;
//                 $data['quiz_id'] = $quiz_id;
//                 $data['user_id'] = $_SESSION['user_id'];
//                 $data['start_time'] = date('Y-m-d H:m:s');
//                 //var_dump($data['start_time']);
//                 //var_dump($quiz['quiz_detail']->id);die;
//                 //var_dump($data);die;
//                 $quiz_result_id = $this->main_model->add_update_record("quiz_result", $data);
//                 //die();
//                 $quiz['quiz_result_id'] = $quiz_result_id;
//                 //echo '<pre>';
//                 //print_r($quiz);die;
//                 $this->load->view('boardQuiz', $quiz);
//                 break;
//             case "scoring" : $this->load->view('scoringquiz', $quiz);
//                 break;
//             case "flex" : $this->load->view('dashboardquiz', $quiz);
//                 break;
//             case "result" :
//                 $filter[0]['id'] = 'quiz_id';
//                 $filter[0]['value'] = $quiz_id;
//                 $filter[1]['id'] = 'user_id';
//                 $filter[1]['value'] = $_SESSION['user_id'];
//                 $quiz['quiz_result_detail'] = $this->main_model->get_many_records('quiz_result', $filter, "", "");
//                 // print_r($quiz['quiz_result_detail']);
//                 $filter2[0]['id'] = 'quiz_result_id';
//                 $filter2[0]['value'] = $quiz['quiz_result_detail'][0]['id'];
//                 $filter2[1]['id'] = 'select_type';
//                 $filter2[1]['value'] = 'Single';
//                 $filter2[2]['id'] = 'answered <>';
//                 $filter2[2]['value'] = '0';
//                 $request_fields = array("answered as selected_opt");
//                 $quiz['single_options'] = $this->main_model->get_many_records('quiz_result_answers', $filter2, $request_fields, "question_id");
//                 $filter3[0]['id'] = 'quiz_result_id';
//                 $filter3[0]['value'] = $quiz['quiz_result_detail'][0]['id'];
//                 $request_fields = array("option_id as selected_opt");
//                 $quiz['multi_options'] = $this->main_model->get_many_records('quiz_result_options', $filter3, $request_fields, "option_id");
//                 $answered_options = array_merge($quiz['single_options'], $quiz['multi_options']);
//                 foreach ($quiz['options'] as $key1 => $q) {
//                     foreach ($q as $key2 => $value) {
//                         if (is_answered($value['option_id'], $answered_options)) {
//                             $quiz['options'][$key1][$key2]['answered'] = 1;
//                         } else {
//                             $quiz['options'][$key1][$key2]['answered'] = 0;
//                         }
//                     }
//                 }
//                 $this->load->view('resultquiz', $quiz);
//                 break;
//             case "summary" :
//                 $summary['quiz_name'] = $this->main_model->get_name_from_id("quiz", "name", $quiz_id);
//                 $filter4[0]['id'] = "quiz_id";
//                 $filter4[0]['value'] = $quiz_id;
//                 $filter4[1]['id'] = "user_id";
//                 $filter4[1]['value'] = $_SESSION['user_id'];
//                 $req_field = array("id");
//                 $quiz_result_id = $this->main_model->get_many_records("quiz_result", $filter4, $req_field);
// //                var_dump($quiz_result_id);
//                 $filter5[0]['id'] = "quiz_result_id";
//                 $filter5[0]['value'] = $quiz_result_id[0]['id'];
//                 $summary['quiz_result'] = $this->main_model->get_many_records("quiz_result_answers", $filter5, "", "question_no");
//                 $str = "Select";
// //====================================================================
//                 $category = array();
//                 foreach ($summary['quiz_result'] as $key => $answer) {
//                     $id = $answer['category'];
//                     if (array_key_exists($id, $category)) {
//                         $category[$id]['no_of_question'] ++;
//                         $category[$id]['visited'] = ($answer['visited'] == 1) ? ($category[$id]['visited'] + 1) : $category[$id]['visited'];
//                         $category[$id]['answer'] = ($answer['answered'] == 1) ? ($category[$id]['answer'] + 1) : $category[$id]['answer'];
//                         $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? ($category[$id]['marked_for_review'] + 1) : $category[$id]['marked_for_review'];
//                         $category[$id]['correct'] = ($answer['marks'] == 1) ? ($category[$id]['correct'] + 1) : $category[$id]['correct'];
//                     } else {
//                         $category[$id]['name'] = $this->main_model->get_name_from_id("category", "name", $id);
//                         ;
//                         $category[$id]['no_of_question'] = 1;
//                         $category[$id]['visited'] = ($answer['visited'] == 1) ? 1 : 0;
//                         $category[$id]['answer'] = ($answer['answered'] == 1) ? 1 : 0;
//                         $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? 1 : 0;
//                         $category[$id]['correct'] = ($answer['marks'] > 0 ) ? 1 : 0;
//                     }
//                 }
// //echo var_dump($category);
//                 $summary['category'] = $category;
//                 $summary['quiz_id'] = $quiz_id;
// //                echo "<pre>";
// //                print_r($summary);
// //                die;
// //===========================================================================================
//                 $this->load->view('result_summary', $summary);
//                 break;
//             case "practice" :
//                 $pagesize = $this->main_model->get_name_from_id('quiz', 'pagination', $quiz_id, 'id');
//                 $filter[0]['id'] = "quiz_id";
//                 $filter[0]['value'] = $quiz_id;
//                 $tcount = ($this->main_model->count_records('questions', $filter));
//                 $filter[1]['id'] = "story";
//                 $filter[1]['value'] = 0;
//                 $count = ($this->main_model->count_records('questions', $filter));
//                 $scount = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
//                 $n = intval($count / $pagesize);
//                 $r = $count % $pagesize;
//                 if ($r > 0) {
//                     $n++;
//                 }
//                 $total_pages = $n + $scount;
//                 $quiz["total_pages"] = $total_pages;
//                 $quiz["current"] = $page_no;
//                 $quiz["link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/";
//                 if (($page_no - 1) > 0) {
//                     $quiz["prev_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no - 1) . '/' . $nav_type . '/' . $id;
//                 } else {
//                     $quiz["prev_link"] = "#";
//                 }
//                 if (($page_no + 1) > $total_pages) {
//                     $quiz["next_link"] = "#";
//                 } else {
//                     $quiz["next_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no + 1) . '/' . $nav_type . '/' . $id;
//                 }
//                 if ($page_no > $n) {
//                     $sques = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
//                     if (($page_no - $n) > 1) {
//                         $start = ($page_no - $n) - 1;
//                     } else {
//                         $start = 0;
//                     }
//                     $quiz['start'] = $count + (($page_no - $n) - 1);
//                     //echo $n;die;
//                     $limit = 1;
//                     $f[0]['id'] = "quiz_id";
//                     $f[0]['value'] = $quiz_id;
//                     $story_id = $this->main_model->get_records_with_limit('quiz_story', $f, $start, $limit)->result_array();
//                     //var_dump($story_id);die;
//                     $quiz['story'] = $story_id;
//                     $filter[1]['id'] = "story";
//                     $filter[1]['value'] = $story_id[0]['id'];
//                     $quiz['questions'] = $this->main_model->get_records_with_limit('questions', $filter)->result_array();
//                     // var_dump($quiz['questions']);die;
//                 } else {
//                     if ($page_no > 1) {
//                         $quiz['start'] = ($page_no - 1) * $pagesize;
//                     } else {
//                         $quiz['start'] = 0;
//                     }
//                     $limit = $pagesize;
//                     $quiz['questions'] = $this->main_model->get_records_with_limit('questions', $filter, $quiz['start'], $limit, 'category, id')->result_array();
//                 }
//                 $quiz['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();
//                 $query_str1 = 'SELECT category.id as category_id, category.name as category_name, COUNT(questions.category) as no_of_questions FROM questions JOIN category ON questions.category = category.id
//                        WHERE questions.quiz_id = ' . $quiz_id . ' AND questions.status = "Active" AND questions.is_deleted = 0 GROUP BY category.id';
//                 $quiz['category'] = $this->db->query($query_str1)->result_array();
//                 $options = '';
//                 foreach ($quiz['questions'] as $question) {
//                     $options[$question['id']] = $this->main_model->get_records('options', 'question_id', $question['id'], 'option_number')->result_array();
//                 }
//                 $quiz['options'] = $options;
//                 //var_dump($quiz['questions']);die;
//                 $quiz["nav_type"] = $nav_type;
//                 $quiz["id"] = $id;
//                 $this->load->view('practicequiz', $quiz);
//                 break;
//             case "subjective" :
//                 $pagesize = $pagesize = $this->main_model->get_name_from_id('quiz', 'pagination', $quiz_id, 'id');
//                 $filter[0]['id'] = "quiz_id";
//                 $filter[0]['value'] = $quiz_id;
//                 $tcount = ($this->main_model->count_records('subjectivequestions', $filter));
//                 $filter[1]['id'] = "story";
//                 $filter[1]['value'] = 0;
//                 $count = ($this->main_model->count_records('subjectivequestions', $filter));
//                 $scount = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
//                 $n = intval($count / $pagesize);
//                 $r = $count % $pagesize;
//                 if ($r > 0) {
//                     $n++;
//                 }
//                 $total_pages = $n + $scount;
//                 $subjectivequestions["total_pages"] = $total_pages;
//                 $subjectivequestions["current"] = $page_no;
//                 $subjectivequestions["link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/";
//                 if (($page_no - 1) > 0) {
//                     $subjectivequestions["prev_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no - 1) . '/' . $nav_type . '/' . $id;
//                 } else {
//                     $subjectivequestions["prev_link"] = "#";
//                 }
//                 if (($page_no + 1) > $total_pages) {
//                     $subjectivequestions["next_link"] = "#";
//                 } else {
//                     $subjectivequestions["next_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no + 1) . '/' . $nav_type . '/' . $id;
//                 }
//                 if ($page_no > $n) {
//                     $sques = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
//                     if (($page_no - $n) > 1) {
//                         $start = ($page_no - $n) - 1;
//                     } else {
//                         $start = 0;
//                     }
//                     $subjectivequestions['start'] = $count + (($page_no - $n) - 1);
//                     //echo $n;die;
//                     $limit = 1;
//                     $f[0]['id'] = "quiz_id";
//                     $f[0]['value'] = $quiz_id;
//                     $story_id = $this->main_model->get_records_with_limit('quiz_story', $f, $start, $limit)->result_array();
//                     //var_dump($story_id);die;
//                     $subjectivequestions['story'] = $story_id;
//                     $filter[1]['id'] = "story";
//                     $filter[1]['value'] = $story_id[0]['id'];
//                     $subjectivequestions['subquestions'] = $this->main_model->get_records_with_limit('subjectivequestions', $filter)->result_array();
//                     // var_dump($quiz['questions']);die;
//                     ///   working ------
// //        }
//                 } else {
//                     if ($page_no > 1) {
//                         $subjectivequestions['start'] = ($page_no - 1) * $pagesize;
//                     } else {
//                         $subjectivequestions['start'] = 0;
//                     }
//                     $limit = $pagesize;
//                     $subjectivequestions['subquestions'] = $this->main_model->get_records_with_limit('subjectivequestions', $filter, $subjectivequestions['start'], $limit, 'category, id')->result_array();
//                 }
//                 $subjectivequestions['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();
//                 $query_str2 = 'SELECT category.id as category_id, category.name as category_name, COUNT(subjectivequestions.category) as no_of_questions FROM subjectivequestions JOIN category ON subjectivequestions.category = category.id
//                        WHERE subjectivequestions.quiz_id = ' . $quiz_id . ' AND subjectivequestions.status = "Active" AND subjectivequestions.is_deleted = 0 GROUP BY category.id';
//                 $subjectivequestions['category'] = $this->db->query($query_str2)->result_array();
//                 // $subjectivequestions['subquestions'] = $this->main_model->get_records('subjectivequestions', 'quiz_id', $quiz_id, 'category, id')->result_array();
// //        var_dump($this->db->last_query());
//                 $subjectivequestions["nav_type"] = $nav_type;
//                 $subjectivequestions["id"] = $id;
//                 $this->load->view('subjectivequiz', $subjectivequestions);
//                 break;
//             default : break;
//         }
//     }

    private function evaluate() {
        
    }

    public function score($table, $id) {

//=============================== get quiz id ====================

        $quiz_id = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
//var_dump($quiz_id);die;
        if (!$quiz_id) {
            $student = array();
            $quiz['id'] = '';
            $quiz['name'] = '';
            $quiz['total_marks'] = '';
            $quiz['student'] = $student;
            $this->load->view('score_all', $quiz);
        } else {
//=============================== get quiz name ===========================
            $quiz_name = $this->main_model->get_name_from_id('quiz', 'name', $quiz_id, 'id');

//============================== get quiz_result_id and user_id ====================
            $filter[0]['id'] = "quiz_id";
            $filter[0]['value'] = $quiz_id;
            $req_field = array("id", "user_id");
            $student_quiz_details = $this->main_model->get_many_records("quiz_result", $filter, $req_field);
//var_dump($student_quiz_details);die;
            if ($student_quiz_details) {
//====================================== get all details of quiz ================
                foreach ($student_quiz_details as $key => $answer) {

                    $student[$key]['user_id'] = $answer['user_id'];
                    $student[$key]['name'] = $this->main_model->get_name_from_id('users', 'name', $answer['user_id']);
                    $student[$key]['quiz_result_id'] = $answer['id'];

//===================== get mark obtain ==============================
                    $query_str1 = 'SELECT  sum(`marks`) as marks_obtain
                                FROM  `quiz_result_answers`
                                WHERE  `quiz_result_id` =' . $student[$key]['quiz_result_id'];

                    $mark_obtain = $this->db->query($query_str1)->result_array();
                    $student[$key]['mark_obtain'] = $mark_obtain[0]['marks_obtain'];
                }
//================================ get total marks ===========================
                $query_str2 = 'SELECT SUM(`question_weight`) as total_marks
                                          FROM `questions` WHERE quiz_id =' . $quiz_id;
                $total_marks = $this->db->query($query_str2)->result_array();

//==================================== sort for rank ======================

                function b_sort($a, $b) {
                    return ($a["mark_obtain"] <= $b["mark_obtain"]) ? 1 : -1;
                }

                usort($student, "b_sort");

//================================= set value for a array ===================

                $quiz['id'] = $quiz_id;
                $quiz['name'] = $quiz_name;
                $quiz['total_marks'] = $total_marks[0]['total_marks'];
                $quiz['student'] = $student;

                $this->load->view('score_all', $quiz);
            } else {
                $student = array();
                $quiz['id'] = $quiz_id;
                $quiz['name'] = $quiz_name;
                $quiz['total_marks'] = '';
                $quiz['student'] = $student;
                $this->load->view('score_all', $quiz);
            }
        }
    }

    public function submit($quiz_type = "") {
//      submit quiz
        $answers = $_POST['answers'];
//      var_dump($answers);
//      echo '<pre>';
//      print_r($answers);
//      die;
        $quiz_id = $_POST['quiz_id'];
        unset($_POST['answers']);
//      unset($_POST['quiz_result_id']);
//      echo '<pre>';
//      print_r($_POST);die;
        $_POST['submit_time'] = date('Y-m-d H:m:s');
        $quiz_result_id = $this->main_model->add_update_record("quiz_result", $_POST, 'id');
//        $quiz_questions = $this->main_model->get_records('questions', 'quiz_id', $quiz_id, 'id')->result_array();
        foreach ($answers as $q_no => $answer) {
            $answers[$q_no]['question_id'] = $q_no;
            if ($answer['answered']) {
                $answers[$q_no]['quiz_result_id'] = $quiz_result_id;
                if ($answer['select_type'] == "Single") {
                    $answers[$q_no]['marks'] = $this->custom->get_marks($q_no, $answer['selected'], "");
                } else {//select type - multiple
                    $answers[$q_no]['marks'] = $this->custom->get_marks($q_no, "", $answer['options']);
                    foreach ($answers[$q_no]['options'] as $key => $value) {
                        $option_set['quiz_result_id'] = $quiz_result_id;
                        $option_set['question_id'] = $q_no;
                        $option_set['option_id'] = $value;
                        $saved_option_id = $this->main_model->add_update_record("quiz_result_options", $option_set);
                    }
                    unset($answers[$q_no]["options"]);
                }
            } else {//not answered
                $answers[$q_no]['marks'] = 0;
            }
        }
//        var_dump($answers);
//        die;

        $summary['answers'] = $answers;
        $saved_question_id = $this->main_model->add_update_many_records("quiz_result_answers", $answers, "quiz_result_id", $quiz_result_id);

        header('Location: ' . base_url() . 'quiz/summary/' . $quiz_id);
    }

    public function manage($table = '', $id = 0, $template_id = 0) {
 
        if($_SESSION['role_name'] == "Guest")
         {
            header('Location: ' . base_url('signin'));
         }
        if(empty($table)) {
            $this->load->view('manager_content_view');
         } else {
            $quiz_type = $this->main_model->get_name_from_id('quiz', 'quiz_type', $id, 'node');
            if ($quiz_type == "Subjective")
                $table = 'subjectivequestions';
            if ($table) {
                switch ($table) {
                    case 'questions':
                        if ($id) {
                            $quiz_id = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                            $filter[0]['id'] = "quiz_id";
                            $filter[0]['value'] = $quiz_id;
                            $fields = array("id", "quiz_id", "question_text", "question_weight", "select_type", "status");
                            $query['data']['grid_data'] = $this->main_model->get_many_records('questions', $filter, $fields, 'category, id');
                            $query['data']['parent_id'] = $id;
                            $level = $this->main_model->get_node_level($id);
                            $query['data']['max_level'] = $level;
                            $node = $id;
                            $max_level = $level;
                            for ($i = 1; $i <= $level; $level--) {
                                $base_node[$level]['id'] = $node;
                                $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                                $node = $base_node[$level]['parent_id'];
                            }
                            $query['data']['basenodes'] = $base_node;
                        } else {
                            $query['data'] = 0;
                        }
                        break;
                    case 'subjectivequestions':
                        if($id){
                            $quiz_id = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                            $filter[0]['id'] = "quiz_id";
                            $filter[0]['value'] = $quiz_id;
                            $fields = array("id", "quiz_id", "question_text", "category", "status");
                            $query['data']['grid_data'] = $this->main_model->get_many_records('subjectivequestions', $filter, $fields, 'category, id');
                            $query['data']['parent_id'] = $id;
                            $level = $this->main_model->get_node_level($id);
                            $query['data']['max_level'] = $level;
                            $node = $id;
                            $max_level = $level;
                            for($i = 1; $i <= $level; $level--) {
                                $base_node[$level]['id'] = $node;
                                $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                                $node = $base_node[$level]['parent_id'];
                            }
                      
                            $query['data']['basenodes'] = $base_node;
                          }
                        else {
                            $query['data'] = 0;
                        }

                        break;
                    case 'quiz_story':
                        $data = $this->main_model->get_records($table, "", "", "name")->result_array();
                        foreach ($data as $key => $value){
                            $data[$key]['node'] = $this->main_model->get_name_from_id('quiz', 'node', $value['quiz_id'], 'id');
                        }
                        $query['data'] = $data;
//                        var_dump($query['data']);
//                        die;
                        break;
                    case 'users':
                        if ($_SESSION['role_name'] != 'Super Admin') {
                            $query['data'] = $this->main_model->get_records($table, "role", "1", "name")->result_array(); //allowing only stunent users to be edited by anyone other than Super Admin
                        } else {
                            $query['data'] = $this->main_model->get_records($table, "", "", "name")->result_array();
                        }
                        break;
                    case 'news_letter':
                        $query['data'] = $this->main_model->get_records($table, '', '', "id DESC")->result_array();
                        
                        break;
                    case 'sheet_values':
                        $query['data'] = $this->main_model->get_records($table, "sheet_id", $id, "")->result_array();

                        break;
                    case 'valuesheet':
//$this->load->view('add-' . $table);
                        break;
                    case 'template_instruction':
                        $query['sheet_id'] = $id;
                        $query['template_id'] = $template_id;

                        $filter[0]['id'] = 'sheet_id';
                        $filter[0]['value'] = $id;
                        $filter[1]['id'] = 'template_id';
                        $filter[1]['value'] = $template_id;
                        $req = array('*');
                        $query['data'] = $this->main_model->get_many_records($table, $filter, $req);
                        break;

                    case 'tooltip_details':
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $id;
                        $req = array('*');
                        $query['data'] = $this->main_model->get_many_records('tooltip_details', $filter, $req);
                        //echo $this->db->last_query();die;
                        $query['template_instruction_id'] = $id;
                        break;

                    case 'add_more_checkbox_category':
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $id;
                        $req = array('*');
                        $query['data'] = $this->main_model->get_many_records('add_more_checkbox_category', $filter, $req);
                        $query['template_instruction_id'] = $id;
                        break;
                    case "payment_details":
                        $this->load->view("manage-payment_details");
//                        $details["data"] = $this->main_model->get_records($table, "", "", "id")->result_array();
//                        $this->load->view("manage-payment_details", $details);
                        break;
                    case "descriptive_type":
                        $query['data'] = $this->main_model->get_records($table, "", "", "")->result_array();
//                        $details["data"] = $this->main_model->get_records($table, "", "", "id")->result_array();
//                        $this->load->view("manage-payment_details", $details);
                        break;
                    case "package_sub_master":
                        $query['data'] = $this->main_model->get_package_sub_master();
                        break;
                    case "package_master":
                        $query['data'] = $this->main_model->get_records($table)->result_array();
                     // echo '<pre>';
                        // print_r($query);die;   break;    
                     case "testimonial_category":
                        $query['data'] = $this->main_model->get_records($table)->result_array();
                        break;    
                    // case "program_category":
                    //     $query['data'] = $this->main_model->program_category($table);
                    //     break;    
                    default:
                        $query['data'] = $this->main_model->get_records($table, "", "", "name")->result_array();
                        // echo '<pre>';
                        // print_r($query);die;
                        break;
                }
            }
            if ($id) {
                $query['selected_id'] = $id;
//echo $id;
            } else {
//echo $id. 'as';
                $query['selected_id'] = '';
            }
            // echo "<pre>";
            // print_r($query);
            // die();
            $this->load->view('manage-' . $table, $query);
        }
    }
   public function unsubs_newsletter(){
      // $datas1 = $this->main_model->get_records('news_letter',"",'','id')->result_array();
       $datas1 = $this->main_model->get_records_unsubs('news_letter',array('status' =>active),"","id DESC")->result_array();
        // echo "<pre>";
        //     print_r($datas);
        //     die();
      //    $testimonials = $this->main_model->select('testimonials','*','id',array('status' => active));
        //           $data['home_packagea'] = $home_package;
                 $datas['datas'] = $datas1;
       
        // echo "<pre>";
        //     print_r($datas);
        //     die();
            $this->load->view('unsubs_newsletter',$datas);
   }
    public function add($table = '', $id = "0") {//getting quizid($id) as a parameter in url
    if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
//      $dat = $this->main_model->fill_select('package_category', "name");
        if (($table == "questions" ) && ($id != 0)) {
            $quiz_id['quizId'] = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
            $this->load->view('add-' . $table, $quiz_id); //sending quizid to add question page in url
        } else {
            if(($table == "sheet_values" ) && ($id != 0)) {
// $quiz_id['quizId'] = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                $sheet_id['sheet_id'] = $id;
                $this->load->view('add-' . $table, $sheet_id); //sending quizid to add question page in url
            } elseif (($table == "subjectivequestions" ) && ($id != 0)) {
                $quiz_id['quizId'] = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                $this->load->view('add-' . $table, $quiz_id); //sending quizid to add question page in url
            } else if (($table == "tooltip_details" ) && ($id != 0)) {
                $data['template_instruction_id'] = $id;
                $this->load->view('add-' . $table, $data);
            }else if($table == 'packages'){
                $data['package_master'] = $this->main_model->select('package_master','*','name',array('is_deleted' => 0));
                $data['package_sub_master'] = $this->main_model->select('package_sub_master','*','',array('is_deleted' => 0));
                // echo '<pre>';
                // print_r($data);die;
                $this->load->view('add-' . $table, $data);
            }
           
            else {
            //   echo $table;die;
                $this->load->view('add-'.$table);
            }
        }
    }
    
    public function add_package_master(){
        $this->load->view('add-package_master');
    }
    
    public function add_sub_package_master(){
        $data['package_master'] = $this->main_model->select('package_master','*','name',array('is_deleted' => 0));
        // echo "<pre>";
        // print_r($data);
        // die;
        $data['packages'] = $this->main_model->select('packages','*','name',array('is_deleted' => 0));
        $this->load->view('add_sub_package_master',$data);
    }
    
    public function save_add_package_master(){
        $data = $this->input->post();
        
        if(isset($data['id'])){
            
           $checkData = $this->main_model->checkData('*','package_master',array('name'=> $data['name'], 'is_deleted' => $data['is_deleted']));
           //echo $this->db->last_query();die;
        
            if($checkData){
                $_SESSION['msg_str'] .= 'This Name already exist!!';
                $_SESSION['msg_hdr'] = "Warning !!";
                header('Location: ' . base_url() . 'edit/package_master/'.$data['id']);die;
            }else{
                $id = $data['id'];
                unset($data['id']);
                $data['modify_date'] = date('Y-m-d H:i:s');
                $data['modify_by'] = $_SESSION['user_id'];
                // echo "<pre>";
                // print_r($data);die;
                $this->main_model->update('package_master',$data,array('id' => $id));
                $_SESSION['msg_str'] .= 'Data Updated Successfully!!';
                $_SESSION['msg_hdr'] = "Success";
                header('Location: ' . base_url() . 'manage/package_master');die;
            }
        }else{
           $checkData = $this->main_model->checkData('*','package_master',array('name'=> $data['name'], 'is_deleted' => $data['is_deleted']));
           //echo $this->db->last_query();die;
        
            if($checkData){
                $_SESSION['msg_str'] .= 'This Name already exist!!';
                $_SESSION['msg_hdr'] = "Warning !!";
                header('Location: ' . base_url() . 'manage/package_master');die;
            }else{
                $data['created_by'] = $_SESSION['user_id'];
                $this->main_model->add_update_record('package_master', $data);
                $_SESSION['msg_str'] .= 'Data Inserted Successfully!!';
                $_SESSION['msg_hdr'] = "Success";
                header('Location: ' . base_url() . 'manage/package_master');die;
            } 
        }
        
        
       
    }
    
    public function save_add_sub_package_master(){
        $data = $this->input->post();
        
        // echo "<pre>";
        // print_r($data);
        // die;
        
        if(isset($data['id'])){
            
           $checkData = $this->main_model->checkData('*','package_sub_master',array('name'=> $data['name'], 'is_deleted' => $data['is_deleted']));
           //echo $this->db->last_query();die;
        
            if($checkData){
                $_SESSION['msg_str'] .= 'This Name already exist!!';
                $_SESSION['msg_hdr'] = "Warning !!";
                header('Location: ' . base_url() . 'edit/package_sub_master/'.$data['id']);die;
            }else{
                $id = $data['id'];
                unset($data['id']);
                if(!empty($_FILES['image_file']['name'])){
                    $image              = $_FILES['image_file']['name']; 
                    $expimage           = explode('.',$image);
                    $count              = count($expimage);
                    $image_ext          = $expimage[$count-1];
                    $image_name         = rand().'.'.$image_ext;
                    $data['image']= "assets/sub_package_image/".$image_name;
                
                    move_uploaded_file($_FILES["image_file"]["tmp_name"],$data['image']);
                }else{
                    unset($data['image']);
                }
                $data['modify_date'] = date('Y-m-d H:i:s');
                $data['modify_by'] = $_SESSION['user_id'];
                // echo "<pre>";
                // print_r($data);die;
                $this->main_model->update('package_sub_master',$data,array('id' => $id));
                $_SESSION['msg_str'] .= 'Data Updated Successfully!!';
                $_SESSION['msg_hdr'] = "Success";
                header('Location: ' . base_url() . 'manage/package_sub_master');die;
            }
        }else{
           $checkData = $this->main_model->checkData('*','package_sub_master',array('name'=> $data['name'], 'is_deleted' => $data['is_deleted']));
           //echo $this->db->last_query();die;
        
            if($checkData){
                $_SESSION['msg_str'] .= 'This Name already exist!!';
                $_SESSION['msg_hdr'] = "Warning !!";
                header('Location: ' . base_url() . 'manage/add_sub_package_master');die;
            }else{
                if(!empty($_FILES['image_file']['name'])){
                    $image              = $_FILES['image_file']['name']; 
                    $expimage           = explode('.',$image);
                    $count              = count($expimage);
                    $image_ext          = $expimage[$count-1];
                    $image_name         = rand().'.'.$image_ext;
                    $data['image']= "assets/sub_package_image/".$image_name;
                
                    move_uploaded_file($_FILES["image_file"]["tmp_name"],$data['image']);
                }else{
                    $data['image']  = '';
                }
                $data['created_by'] = $_SESSION['user_id'];
                // echo "<pre>";
                // print_r($data);die;
                $this->main_model->add_update_record('package_sub_master', $data);
                $_SESSION['msg_str'] .= 'Data Inserted Successfully!!';
                $_SESSION['msg_hdr'] = "Success";
                header('Location: ' . base_url() . 'manage/package_sub_master');die;
            } 
        }
        
        
       
    }

    public function get_subMasterData(){
        $id = $this->input->post('val');
        
        $data = $this->main_model->select('package_sub_master','*','name',array('is_deleted' => 0,'package_master_id' => $id));
        //echo $this->db->last_query();
        echo json_encode($data);
    }
    public function edit($table = '', $id = 0, $child_table = '', $foreign_key_name = 0, $order_by_id = 0) {//for add/update form
        $row_data = array();
        $query = $this->main_model->get_records($table, 'id', $id);
        $row_data = $query->row();
        $max_level = 0;
        switch ($table) {
            case "quiz":
                $node = $this->main_model->get_name_from_id('quiz', 'node', $id, 'id');
                $level = $this->main_model->get_node_level($node);
                $max_level = $level;
                for ($i = 1; $i <= $level; $level--) {
                    $base_node[$level]['id'] = $node;
                    $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                    $node = $base_node[$level]['parent_id'];
                }
                $row_data->node = $node;
                break;
            case "node":
                $node = $this->main_model->get_name_from_id('node', 'parent_id', $id, 'id');
                $level = $this->main_model->get_node_level($id);
                $max_level = $level;
                $level--;
                for ($i = 1; $i <= $level; $level--) {
                    $base_node[$level]['id'] = $node;
                    $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                    $node = $base_node[$level]['parent_id'];
                }
                break;
            case "quiz_story":
                $node = $this->main_model->get_name_from_id('quiz', 'node', $row_data->quiz_id, 'id');
                $level = $this->main_model->get_node_level($node);
                $max_level = $level;
                for ($i = 1; $i <= $level; $level--) {
                    $base_node[$level]['id'] = $node;
                    $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                    $node = $base_node[$level]['parent_id'];
                }
                $row_data->node = $node;

                break;
            case "sheets":
                $node = $this->main_model->get_name_from_id('sheets', 'node', $id, 'id');
                $level = $this->main_model->get_node_level($node);
                $max_level = $level;
                for ($i = 1; $i <= $level; $level--) {
                    $base_node[$level]['id'] = $node;
                    $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                    $node = $base_node[$level]['parent_id'];
                }
                $row_data->node = $node;
                break;
            case "package_sub_master":
                  $data = $this->main_model->select('package_master','*','name',array('is_deleted' => 0));
                $row_data->package_master = $data;
                 $data = $this->main_model->select('package_sub_master','*','',array('id' => $id));
                $row_data->package_sub_master = $data;
                 $data = $this->main_model->select('package_sub_master','*','');
                $row_data->package_sub_masters = $data;
                 $data = $this->main_model->select('packages','*','name',array('status' => 'active','is_deleted' => 0));
                $row_data->packages = $data;
                // $data = $this->main_model->select('package_sub_master','*','',array('id' => $id));
                // $row_data['package_sub_master'] = $data;
                // $data = $this->main_model->select('package_sub_master','*','');
                // $row_data['package_sub_masters'] = $data;
                // var_dump($data);
                // die;
            break;
            case "testimonials":
                $data = $this->main_model->select('testimonial_category','*');
                $row_data->testimonials = $data;
            break;    
            case "packages":
                $data = $this->main_model->select('package_master','*','name',array('is_deleted' => 0));
                $row_data->package_master = $data;
                 
            break;
            
            default:
            break;
                
        }

        if (isset($base_node)) {
            $row_data->baseNodes = $base_node;
        }
        // var_dump($row_data);
        // die;
        $row_data->max_level = $max_level;


//conditional reading child data from linked tables
        if (!empty($child_table) && (!empty($foreign_key_name))) {
            $child_data = $this->main_model->get_records($child_table, $foreign_key_name, $id, $order_by_id)->result_array();

            $child_object = (object) $child_data; //problem in converting first array record i.e. [0]
            $row_data->child_data = $child_object;
        }
        // echo "<pre>";
        // print_r($row_data);die;

        $this->load->view('edit-' . $table, $row_data);
    }

    public function do_upload() {
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1001;
        $config['max_width'] = 2048;
        $config['max_height'] = 7681;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('analytics_image')) {
            $error = array('error' => $this->upload->display_errors());
            echo "<pre>";
            print_r($error);
            die;
//            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
//            $this->load->view('upload_success', $data);
        }
    }

    public function set($table = '') {//for inserting/updating database modified by jyoti
        //echo $table;die;
        if (($table == "sheets") && ($_POST['analytics_image']) != "") {
            $_POST['analytics_image'] = $_FILES["analytics_image"]['name'];
            $this->do_upload();
        }
        $multiple_table = 0;
        if ($table == 'action_sheets') {
            $data['sheet_id'] = $_POST['sheet_id'];
            $data['user_id'] = $_SESSION['user_id'];
            if (($_POST['draft']) == '0') {
                $data['is_submit'] = '0';
                //echo "0";
            } else {
                //echo "1";
                $data['is_submit'] = '1';
            }
            unset($_POST['draft']);

            $this->db->where('sheet_id', $_POST['sheet_id']);
            $this->db->where('user_id', $_SESSION['user_id']);
            $this->db->delete($table);

            foreach ($_POST['sheetvalue_id'] as $id => $value) {
                $data['sheetvalue_id'] = $id;
                $data['reason'] = $value;
                $return_id = $this->main_model->add_update_record($table, $data);
            }
            unset($_POST);
//         if($data['is_submit'] == 0){
//             header('Location: ' . base_url() . 'showsheet/');die;
//
//         }else{
            header('Location: ' . base_url() . 'value_action/sheets/' . $data['sheet_id']);
            die;
        }

        if ($table == 'quiz_story') {
            //echo $table;die;
            $quiz = $this->main_model->get_name_from_id('quiz', 'id', $_POST['node'], 'node');
           // echo $this->db->last_query();die;
            if($quiz == null){
                $_SESSION['msg_str'] .= 'This Module has not assing under Quiz';
                $_SESSION['msg_hdr'] = "Message !";
                header('Location: ' . base_url() . 'add/quiz_story');
                 
            }else{
                $_POST['quiz_id'] = $quiz;
                // echo "<pre>";
                // print_r($_POST);
                // DIE;
                    unset($_POST['node']); 
            }
            
        }
//        if ($table == 'users') {
//            unset($_POST['programs']);
//           // $_POST['created_date'];
//        }
//        echo "<pre>";
//        print_r($_POST);die;

        if (isset($_POST['child_table']) && $_POST['child_table'] != "") {//handling secondary table data
            if ($table == 'node') {
                $multi_packages = array();
                if (isset($_POST['children'])) {
                    foreach ($_POST['children'] as $key => $value) {
                        $multi_packages[]["packages"] = $value;
                    }
                    $_POST['children'] = $multi_packages;
                }
                $multiple_table = 1;

                $records = $_POST['children'];
                $child_table = $_POST['child_table'];
                $foreign_id = $_POST['foreign_id'];

                unset($_POST['children']);
                unset($_POST['child_table']);
                unset($_POST['foreign_id']);
            } else {
                $multiple_table = 1;

                $records = $_POST['children'];
                $child_table = $_POST['child_table'];
                $foreign_id = $_POST['foreign_id'];

                unset($_POST['children']);
                unset($_POST['child_table']);
                unset($_POST['foreign_id']);
            }
        }
        $node = array();
        if (isset($_POST['id'])) {//sending different parameters for update and insert
            //var_dump($_POST);
            //var_dump($table);
            //die;
           // code impliment by sk das
            if ($table == "users") {
                if($_POST['password'] == ''){
                    unset($_POST['password']);
                }else{
                  $_POST['password'] = md5($_POST['password']);  
                }
                
            }
            if ($table == 'packages'){
                $_POST['programe_node'] = implode(',',$_POST['programe_node']);
                $_POST['test_center_node'] = implode(',',$_POST['test_center_node']);
                $_POST['test_center_node2'] = implode(',',$_POST['test_center_node2']);
             $_POST['FAQsCoreDomain'] = implode(',',$_POST['FAQsCoreDomain']);
              $_POST['FAQsNonCoreDomain'] = implode(',',$_POST['FAQsNonCoreDomain']);
              $_POST['ApptitudePreAssessment'] = implode(',',$_POST['ApptitudePreAssessment']);
              $_POST['ApptitudePostAssessment'] = implode(',',$_POST['ApptitudePostAssessment']);
              $_POST['SubjectPreAssessment'] = implode(',',$_POST['SubjectPreAssessment']);
              $_POST['SubjectPostAssessment'] = implode(',',$_POST['SubjectPostAssessment']);
                // echo "<pre>";
                // print_r($_FILES);die;
                
                if(!empty($_FILES['slider1_image']['name'])){
                    $image              = $_FILES['slider1_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider1_image"]["tmp_name"],$imagepath);
            		$_POST['slider_1'] = $imagepath;
            		
                }
                if(!empty($_FILES['slider2_image']['name'])){
                    $image              = $_FILES['slider2_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider2_image"]["tmp_name"],$imagepath);
            		$_POST['slider_2'] = $imagepath;
            		
                }
                if(!empty($_FILES['slider3_image']['name'])){
                    $image              = $_FILES['slider3_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider3_image"]["tmp_name"],$imagepath);
            		$_POST['slider_3'] = $imagepath;
            		
                }
                if(!empty($_FILES['slider4_image']['name'])){
                    $image              = $_FILES['slider4_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider4_image"]["tmp_name"],$imagepath);
            	    $_POST['slider_4'] = $imagepath;
            		
                }
                if(!empty($_FILES['slider5_image']['name'])){
                    $image              = $_FILES['slider5_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider5_image"]["tmp_name"],$imagepath);
            		$_POST['slider_5'] = $imagepath;
            		
                }
            }
            // end of code sk das
            // echo "<pre>";
            // print_r($_POST);die;
//            $node["parent_id"] = $_POST["parent_id"];
//            $node["type"] = $_POST["type"];
//            $node["header"] = $_POST["header"];
//            $node["name"] = $_POST["name"];
//            $node["sort_order"] = $_POST["sort_order"];
//            $node["description"] = $_POST["description"];
//            $node["page_content"] = $_POST["page_content"];
//            $node["status"] = $_POST["status"];
//            $node["modify_by"] = $_SESSION["user_id"];
            $_POST["modify_by"] = $_SESSION["user_id"];
            if ($table == "blog") {
                $_POST["article_datetime"] = date("Y-m-d H:i:s", strtotime($_POST["article_datetime"]));
            }
            $return_id = $this->main_model->add_update_record($table, $_POST, 'id');
        } else {
//            $node["parent_id"] = $_POST["parent_id"];
//            $node["type"] = $_POST["type"];
//            $node["header"] = $_POST["header"];
//            $node["name"] = $_POST["name"];
//            $node["sort_order"] = $_POST["sort_order"];
//            $node["description"] = $_POST["description"];
//            $node["page_content"] = $_POST["page_content"];
//            $node["status"] = $_POST["status"];
//            $node["created_by"] = $_SESSION["user_id"];
//            $node["created_date"] = date('Y-m-d H:i:s');
//            $node["modify_by"] = $_SESSION["user_id"];
            $_POST["created_by"] = $_SESSION["user_id"];
            $_POST["created_date"] = date('Y-m-d H:i:s');
            $_POST["modify_by"] = $_SESSION["user_id"];
            // echo "<pre>";
            // print_r($_POST);die;
            if($table == 'packages'){
                $_POST['programe_node'] = implode(',',$_POST['programe_node']);
                $_POST['test_center_node'] = implode(',',$_POST['test_center_node']);
                $_POST['test_center_node2'] = implode(',',$_POST['test_center_node2']);
                $_POST['FAQsCoreDomain'] = implode(',',$_POST['FAQsCoreDomain']);
                $_POST['FAQsNonCoreDomain'] = implode(',',$_POST['FAQsNonCoreDomain']);
                 $_POST['ApptitudePreAssessment'] = implode(',',$_POST['ApptitudePreAssessment']);
              $_POST['ApptitudePostAssessment'] = implode(',',$_POST['ApptitudePostAssessment']);
              $_POST['SubjectPreAssessment'] = implode(',',$_POST['SubjectPreAssessment']);
              $_POST['SubjectPostAssessment'] = implode(',',$_POST['SubjectPostAssessment']);
                
                if(!empty($_FILES['slider1_image']['name'])){
                    $image              = $_FILES['slider1_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider1_image"]["tmp_name"],$imagepath);
            		$_POST['slider_1'] = $imagepath;
            		
                }
                if(!empty($_FILES['slider2_image']['name'])){
                    $image              = $_FILES['slider2_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider2_image"]["tmp_name"],$imagepath);
            		$_POST['slider_2'] = $imagepath;
            		
                }
                if(!empty($_FILES['slider3_image']['name'])){
                    $image              = $_FILES['slider3_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider3_image"]["tmp_name"],$imagepath);
            		$_POST['slider_3'] = $imagepath;
            		
                }
                if(!empty($_FILES['slider4_image']['name'])){
                    $image              = $_FILES['slider4_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider4_image"]["tmp_name"],$imagepath);
            	    $_POST['slider_4'] = $imagepath;
            		
                }
                if(!empty($_FILES['slider5_image']['name'])){
                    $image              = $_FILES['slider5_image']['name'];
            		$expimage           = explode('.',$image);
            		$count              = count($expimage);
            		$image_ext          = $expimage[$count-1];
            		$image_name         = rand(1000,10000) .'.'.$image_ext;
            		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
            		
            		move_uploaded_file($_FILES["slider5_image"]["tmp_name"],$imagepath);
            		$_POST['slider_5'] = $imagepath;
            		
                }
                // echo "<pre>";
                // print_r($_POST);
                // die;
            }
            $return_id = $this->main_model->add_update_record($table, $_POST);
        }

        if (isset($_FILES['slider_img']) && !empty($_FILES['slider_img']['name'])) {//managing image upload
            $extn = end(explode(".", $_FILES['slider_img']['name']));
            $id = trim($return_id);
            switch ($table) {//separate image directory for user photos
                case "package_category":
                    $name = 'slider_img-' . $id . '.' . $extn;
                    echo $this->saveImg('./assets/img/uploads/package_category/', $name, 'slider_img');
                    die;
                    break;

                default:$this->saveImg('./assets/img/uploads/', $table . '-' . $id . '.' . $extn);
                    break;
            }
            $data['id'] = $id;
            $data['slider_img'] = $name;
            $id = $this->main_model->add_update_record($table, $data, 'id');
        }
        if (isset($_FILES['icon_img']) && !empty($_FILES['icon_img']['name'])) {//managing image upload
            $extn = end(explode(".", $_FILES['icon_img']['name']));
            $id = trim($return_id);
            switch ($table) {//separate image directory for user photos
                case "package_category":
                    $name = 'icon_img-' . $id . '.' . $extn;
                    $this->saveImg('./assets/img/uploads/package_category/', $name, 'icon_img');
                    break;

                default:$this->saveImg('./assets/img/uploads/', $table . '-' . $id . '.' . $extn);
                    break;
            }
            $data['id'] = $id;
            $data['icon_img'] = $name;

            $id = $this->main_model->add_update_record($table, $data, 'id');
        }

        if (isset($_FILES['image_file']) && !empty($_FILES['image_file']['name'])) {//managing image upload
            $extn = end(explode(".", $_FILES['image_file']['name']));
            $id = trim($return_id);
            switch ($table) {//separate image directory for user photos
                case "users":$this->saveImage('./assets/img/uploads/users/', $table . '-' . $id . '.' . $extn);
                $data['id'] = $id;
                $data['image_file'] = $table . '-' . $id . '.' . $extn;
                $id = $this->main_model->add_update_record($table, $data, 'id');
                    break;
                case "packages":
                    if(!empty($_FILES['image_file']['name'])){
                            $image              = $_FILES['image_file']['name'];
                    		$expimage           = explode('.',$image);
                    		$count              = count($expimage);
                    		$image_ext          = $expimage[$count-1];
                    		$image_name         = rand(1000,10000) .'.'.$image_ext;
                    		$imagepath          = "assets/img/uploads/packages/".$image_name;
                    		
                    		$maxsize    = 2097152; // set upload upto 2MB
                    		
                    		move_uploaded_file($_FILES["image_file"]["tmp_name"],$imagepath);
                    		  
                    		  $data['image_file'] = $imagepath;
                    		  
                    		$data['id'] = $id;
                    // 		echo "<pre>";
                    // 		print_r($data);die;
                            //$data['image_file'] = $table . '-' . $id . '.' . $extn;
                            $id = $this->main_model->add_update_record($table, $data, 'id');
                    		
                        }
                        if(!empty($_FILES['slider1_image']['name'])){
                            $image              = $_FILES['slider1_image']['name'];
                    		$expimage           = explode('.',$image);
                    		$count              = count($expimage);
                    		$image_ext          = $expimage[$count-1];
                    		$image_name         = rand(1000,10000) .'.'.$image_ext;
                    		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
                    		
                    		//$maxsize    = 2097152; // set upload upto 2MB
                    		
                    		move_uploaded_file($_FILES["slider1_image"]["tmp_name"],$imagepath);
                    		  
                    		  $data['slider_1'] = $imagepath;
                    		  
                    		$data['id'] = $id;
                    		echo "<pre>";
                    		print_r($data);
                    		die;
                            $id = $this->main_model->add_update_record($table, $data, 'id');
                    		
                        }
                        if(!empty($_FILES['slider2_image']['name'])){
                            $image              = $_FILES['slider2_image']['name'];
                    		$expimage           = explode('.',$image);
                    		$count              = count($expimage);
                    		$image_ext          = $expimage[$count-1];
                    		$image_name         = rand(1000,10000) .'.'.$image_ext;
                    		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
                    		
                    		//$maxsize    = 2097152; // set upload upto 2MB
                    		
                    		move_uploaded_file($_FILES["slider2_image"]["tmp_name"],$imagepath);
                    		  
                    		  $data['slider_2'] = $imagepath;
                    		  
                    		$data['id'] = $id;
                            $id = $this->main_model->add_update_record($table, $data, 'id');
                    		
                        }
                        if(!empty($_FILES['slider3_image']['name'])){
                            $image              = $_FILES['slider3_image']['name'];
                    		$expimage           = explode('.',$image);
                    		$count              = count($expimage);
                    		$image_ext          = $expimage[$count-1];
                    		$image_name         = rand(1000,10000) .'.'.$image_ext;
                    		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
                    		
                    		//$maxsize    = 2097152; // set upload upto 2MB
                    		
                    		move_uploaded_file($_FILES["slider3_image"]["tmp_name"],$imagepath);
                    		  
                    		  $data['slider_3'] = $imagepath;
                    		  
                    		$data['id'] = $id;
                            $id = $this->main_model->add_update_record($table, $data, 'id');
                    		
                        }
                        if(!empty($_FILES['slider4_image']['name'])){
                            $image              = $_FILES['slider4_image']['name'];
                    		$expimage           = explode('.',$image);
                    		$count              = count($expimage);
                    		$image_ext          = $expimage[$count-1];
                    		$image_name         = rand(1000,10000) .'.'.$image_ext;
                    		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
                    		
                    		//$maxsize    = 2097152; // set upload upto 2MB
                    		
                    		move_uploaded_file($_FILES["slider4_image"]["tmp_name"],$imagepath);
                    		  
                    		  $data['slider_4'] = $imagepath;
                    		  
                    		$data['id'] = $id;
                            $id = $this->main_model->add_update_record($table, $data, 'id');
                    		
                        }
                        if(!empty($_FILES['slider5_image']['name'])){
                            $image              = $_FILES['slider5_image']['name'];
                    		$expimage           = explode('.',$image);
                    		$count              = count($expimage);
                    		$image_ext          = $expimage[$count-1];
                    		$image_name         = rand(1000,10000) .'.'.$image_ext;
                    		$imagepath          = "assets/img/uploads/package_slider/".$image_name;
                    		
                    		//$maxsize    = 2097152; // set upload upto 2MB
                    		
                    		move_uploaded_file($_FILES["slider5_image"]["tmp_name"],$imagepath);
                    		  
                    		  $data['slider_5'] = $imagepath;
                    		  
                    		$data['id'] = $id;
                            $id = $this->main_model->add_update_record($table, $data, 'id');
                    		
                        }
                    break;
                case "package_category":$this->saveImage('./assets/img/uploads/package_category/', $table . '-' . $id . '.' . $extn);
                        $data['id'] = $id;
                        $data['image_file'] = $table . '-' . $id . '.' . $extn;
                        $id = $this->main_model->add_update_record($table, $data, 'id');
                    break;
         
              case "package_sub_master":$this->saveImage('./assets/sub_package_image/', $table . '-' . $id . '.' . $extn);
                        $data['id'] = $id;
                        $data['image'] = $table . '-' . $id . '.' . $extn;
                        $id = $this->main_model->add_update_record($table, $data, 'id');
                    break;
                case "customer":$this->saveImage('./assets/img/uploads/customer/', $table . '-' . $id . '.' . $extn);
                    $data['id'] = $id;
                    $data['image_file'] = $table . '-' . $id . '.' . $extn;
                    $id = $this->main_model->add_update_record($table, $data, 'id');
                    break;
                default:$this->saveImage('./assets/img/uploads/', $table . '-' . $id . '.' . $extn);
                    $data['id'] = $id;
                    $data['image_file'] = $table . '-' . $id . '.' . $extn;
                    $id = $this->main_model->add_update_record($table, $data, 'id');
                    break;
            }

            
        }

        if ($multiple_table) {//for updating records in child table with foreign key
            switch ($child_table) {
                case "packages-node":
                    foreach ($records as $value) {

                        $this->main_model->add_update_many_records($child_table, $value, $foreign_id, $return_id);
                    }
                    break;
                default:
                    $this->main_model->add_update_many_records($child_table, $records, $foreign_id, $return_id);
                    break;
            }
        }

        if (($table == 'quiz') && (!isset($_POST['id']))) {//redirecting to add questions after adding quiz
            if ((($_POST['quiz_type']) == 'Subjective')) {
                header('Location: ' . base_url() . 'add/subjectivequestions/' . $_POST['node']);
            } else {
                header('Location: ' . base_url() . 'add/questions/' . $_POST['node']);
            }
        } else if (($table == 'sheet_values') && (isset($_POST['sheet_id']))) {
            //print_r($return_id);die;
            header('Location: ' . base_url() . 'manage/sheet_values/' . $_POST['sheet_id']);
        } else {
            switch ($table) {
                case 'questions':
                    $node_id = $this->main_model->get_name_from_id('quiz', 'node', $_POST['quiz_id'], 'id');
                    header('Location: ' . base_url() . 'manage/' . $table . '/' . $node_id);
                    break;
                case 'node-users':
                    header('Location: ' . base_url());
                    break;
                case 'value_for_add_more_type':
                    $section_id = $this->main_model->get_name_from_id('template_instruction', 'section_type', $_POST['template_instruction_id'], 'id');
                    header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/' . $section_id);
                    break;
                case 'values_for_checkbox_with_tooltip':
                    $section_id = $this->main_model->get_name_from_id('template_instruction', 'section_type', $_POST['template_instruction_id'], 'id');
                    header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/' . $section_id);
                    break;
                case 'checkbox_with_no_tooltip':
                    $section_id = $this->main_model->get_name_from_id('template_instruction', 'section_type', $_POST['template_instruction_id'], 'id');
                    header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/' . $section_id);
                    break;
                case 'listing_type':
                    $section_id = $this->main_model->get_name_from_id('template_instruction', 'section_type', $_POST['template_instruction_id'], 'id');
                    header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/' . $section_id);
                    break;
                case 'range_type':
                    $section_id = $this->main_model->get_name_from_id('template_instruction', 'section_type', $_POST['template_instruction_id'], 'id');
                    header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/' . $section_id);
                    break;
                case 'tooltip_details':
                    header('Location: ' . base_url() . 'manage/' . $table . '/' . $_POST['template_instruction_id']);
                    break;

                case 'dropdown_with_multi_addmore':
//                     echo '<pre>';
//                     print_r($_POST);die;
                    $section_id = $this->main_model->get_name_from_id('template_instruction', 'section_type', $_POST['template_instruction_id'], 'id');
                    header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/' . $section_id);
//                    echo '<pre>';
//                    print_r($section_id);die;
                    break;

                case 'add_more_checkbox_category':
//                     echo '<pre>';
//                     print_r($_POST);die;
                    $section_id = $this->main_model->get_name_from_id('template_instruction', 'section_type', $_POST['template_instruction_id'], 'id');
                    header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/' . $section_id);
//                    echo '<pre>';
//                    print_r($section_id);die;
                    break;

                default :
                    header('Location: ' . base_url() . 'manage/' . $table);
            }
        }
//        }
    }

    public function show($table = '', $id = 0) {
        $query = $this->main_model->get_records($table, 'id', $id);
        $row_data = $query->row();
        $row_data->table = $table;
        $this->load->view('show', $row_data);
    }

    public function node($nav_type = '', $id = 0) { //$id means node id
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
// echo $nav_type;
// die();
        $is_subscribe = 1;
        $query = $this->main_model->get_node_level($id);
        // echo "<pre>";
        // print_r($query);
        // die;
        // if($id == 2049){ // for email cover letter action sheet redirect sheet id is 66
        //     $sheet_id = 66;
        //     header('Location: ' . base_url() . 'sheets/sheets/'.$sheet_id);
        // }
        
        switch ($id) 
        {
          case "2049":
            $sheet_id = 66;
            echo header('Location: ' . base_url() . 'sheets/sheets/'.$sheet_id);die;
            break;
          case "3728":
            $sheet_id = 98;
            echo header('Location: ' . base_url() . 'sheets/sheets/'.$sheet_id);die;
            break;
          case "3807":
            $sheet_id = 98;
            echo header('Location: ' . base_url() . 'sheets/sheets/'.$sheet_id);die;
            break;
          default:
            break;
        }
// //============= check for subscription ========================
        if ($query > 2 && $_SESSION['role_name'] == 'Guest') {//page specified in url but permission not allowing
            $id = $this->main_model->get_name_from_id('node', 'parent_id', $id, 'id');
            $is_subscribe = 0;
        }


        $node_type = $this->main_model->get_name_from_id('node', 'type', $id, 'id');
        // echo "<pre>";
        // print_r($node_type);
        // die;
        switch ($node_type) {
            case "Module":
                $query = $this->main_model->get_records('node', 'id', $id);
                $row_data = $query->row();
                // echo "<pre>";
                // print_r($row_data);
                // die;
                break;
            case "Quiz":
                $quiz = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                // echo $this->db->last_query();die;
                $query = $this->main_model->get_records('quiz', 'id', $quiz);
                //echo $this->db->last_query();die;
                $row_data = $query->row();
                $row_data->quiz_id = $quiz;
                $row_data->id = $id;
                $row_data->nav_type = $nav_type;
                // echo "<pre>";
                // print_r($row_data);die;
                if ($row_data->quiz_type == '') {
                    $query = $this->main_model->get_records('node', 'id', $id);
                    $row_data = $query->row();
                }

                if ($row_data->quiz_type == 'Practice') {
                    // echo $row_data;
                    // die();
                    header('Location: ' . base_url() . 'quiz/practice/' . $row_data->quiz_id . '/1' . '/' . $row_data->nav_type . '/' . $row_data->id);
                    die;
                } elseif ($row_data->quiz_type == 'Subjective') {

                    header('Location: ' . base_url() . 'quiz/subjective/' . $row_data->quiz_id . '/1' . '/' . $row_data->nav_type . '/' . $row_data->id);
                }
//                else {
//                    header('Location: ' . base_url() . 'quiz/subjective/' . $row_data->quiz_id . '/1' . '/' . $row_data->nav_type . '/' . $row_data->id);
//                }

                break;
//            case "SubjectiveQuiz":
//                $quiz = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
//                $query = $this->main_model->get_records('quiz', 'id', $quiz);
//                $row_data = $query->row();
//                $row_data->quiz_id = $subquiz;
//                $row_data->id = $id;
//                break;
            case "Sheet":
//                echo"testing";die;
                $sheets = $this->main_model->get_name_from_id('sheets', 'id', $id, 'node');
                $query = $this->main_model->get_records('sheets', 'id', $sheets);
                $row_data = $query->row();
                $row_data->sheet_id = $sheets;
                $row_data->id = $id;
//                $is_packages = $this->custom->check_node_on_package($rec['id']);
//                if ($is_packages) {
                header('Location: ' . base_url() . 'value_action/sheets/' . $row_data->quiz_id . '/' . '/' . $row_data->nav_type . '/' . $row_data->id);
//                } else {
//                    header('Location: ' . base_url());
//                }
                break;
//
            case "Content":
                break;
            case "Group Discussion":
                $query = $this->main_model->get_records('node', 'id', $id);
                //echo $this->db->last_query();die;
                $row_data = $query->row();
                break;
            default:
                break;
        }
        
        $row_data->nav_type = $nav_type;
        // echo "<pre>";
        // print_r($row_data);
        // die;

        if ($is_subscribe == 1) { // ========= this is for subscriber ==============
            if ($nav_type == 'sheets') {
                $is_packages = $this->custom->check_node_on_package($id);
//                if ($is_packages) {
//                header('Location: ' . base_url() . 'value_action/sheets/' . $sheets);
                header('Location: ' . base_url() . 'sheets/sheets/' . $sheets);
//                } else {
//                    header('Location: ' . base_url());
//                }
            } else {
            //     echo $nav_type;
            // echo $id;
            // die();
                $sheet_id = $this->main_model->get_name_from_id('sheets', 'id', $id, 'node');
                // echo $this->db->last_query();
                // die();
                // echo "<pre>";
                // print_r($sheet_id);
                // die;
                if (!empty($sheet_id)) {
                    // echo $sheet_id;
                    // die();
                    header('Location: ' . base_url() . 'sheets/sheets/' . $sheets);
                } else 
                   {
                    // echo "<pre>";
                    // print_r($row_data);die;
                    $cv_header = $row_data->header;
                    if($cv_header == 'Curriculum Vitae Action Sheet'){
                        header('Location:'.base_url('cv'));
                    }else{
                        
                        // echo $nav_type;
                        // die();
                        //if($_SESSION['role_name'] == "Student"){
                            // $child_node_id = $this->main_model->get_name_from_id('node', 'id', $id, $id_name = "parent_id");
                            // echo '<pre>';
                            // print_r($child_node_id);
                            // print_r($row_data);
                            // die;
                            //$this->load->view('show_node_with_student', $row_data);
                        //}else{
                            //echo "ddd";die;
                            // echo "<pre>";
                            // print_r($row_data);
                            // die;
                            $this->load->view('show_node', $row_data);
                        //}
                        //$this->load->view('show_node', $row_data);
                    }
                   
                }
//                $this->load->view('show_node', $row_data);
            }
        } else {
            $this->load->view('registration_form.php', $row_data);
        }
    }
    
    public function self_introduction_data_save(){
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        $data = $_POST['data'];
        $data2 = $_POST['data2'];
        $data3 = $_POST['data3'];
        $data4 = $_POST['data4'];
        $data5 = $_POST['data5'];
        $data6 = $_POST['data6'];
        $data7 = $_POST['data7'];
        $data8 = $_POST['data8'];
        $data9 = $_POST['data9'];
        $id = $_POST['node_id'];
        
        $CheckData = $this->main_model->checkData('*','self_introduction_save_data',array('user_id' => $_SESSION['user_id'],'is_deleted' => 0));
        if($CheckData){
            $update_data = array(
                'data' => $data,
                'data2' => $data2,
                'data3' => $data3,
                'data4' => $data4,
                'data5' => $data5,
                'data6' => $data6,
                'data7' => $data7,
                'data8' => $data8,
                'data9' => $data9,
                'modify_date' => date('Y-m-d H:i:s'),
                'modify_by' => $_SESSION['user_id']
            );
            // echo "<pre>";
            // print_r($update_data);die;
            $this->main_model->update('self_introduction_save_data',$update_data,array('user_id' => $_SESSION['user_id']));
            $_SESSION['msg_str'] .= 'Your information is saved as draft';
            $_SESSION['msg_hdr'] = "Your Information Saved";
            header('Location: ' . base_url() . 'node/program/' . $id);
            die;
        }else{
            $insert_data = array(
                'user_id' => $_SESSION['user_id'],
                'data' => $data,
                'data2' => $data2,
                'data3' => $data3,
                'data4' => $data4,
                'data5' => $data5,
                'data6' => $data6,
                'data7' => $data7,
                'data8' => $data8,
                'data9' => $data9,
                'created_by' => $_SESSION['user_id']
            );
            $this->main_model->insert('self_introduction_save_data',$insert_data);
            // echo "<pre>";
            // print_r($insert_data);die;
            $_SESSION['msg_str'] .= 'Your information is saved as draft';
            $_SESSION['msg_hdr'] = "Your Information Saved";
            header('Location: ' . base_url() . 'node/program/' . $id);
            die;
        }
    }
    
    public function self_introduction_data_pdf(){
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        $CheckData = $this->main_model->checkData('*','self_introduction_save_data',array('user_id' => $_SESSION['user_id'],'is_deleted' => 0));
        
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Action Sheets');
        $pdf->setFooterMargin(10);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);
        $pdf->startPageGroup();
        $pdf->AddPage();
        
        if($CheckData){
            $data_get = $this->main_model->selectsingleData('self_introduction_save_data','*',array('user_id' => $_SESSION['user_id'],'is_deleted' => 0));
            //  heading image
             $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                    </td>
                </tr></table>';
                $pdf->writeHTML($html, true, false, true, false, '');
            // end of heading image
            
            // Heading set-up
            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td align="" valign="middle" style="font-size:16px;">Self-Introduction <hr></td>
                </tr></table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of heading set-up
            
            // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
            //     <tr>
            //         <td align="" valign="middle" style="font-size:14px;">Instructions</td>
            //     </tr></table>';
            // $pdf->writeHTML($html, true, false, true, false, '');
            
            //$html = '<p style="font-size:14px;">Instructions</p><br>';
            //$pdf->writeHTML($html, true, false, true, false, '');
            
            // $html = '<p>Please create your Self-Introduction under the following headings:</p><br>';
            // $pdf->writeHTML($html, true, false, true, false, '');
            
            // Content start Here
            $html = '<p>Place you belong to</p>';
            $html .= '<p style="text-align:justify;">'.$data_get->data.'</p><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of Content
            
            // Content start Here
            $html = '<p>Family</p>';
            $html .= '<p style="text-align:justify;">'.$data_get->data2.'</p><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of Content
            
            // Content start Here
            $html = '<p>Education/ Academic Achievements/ Associated qualities</p>';
            $html .= '<p style="text-align:justify;">'.$data_get->data3.'</p><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of Content
            
            // Content start Here
            $html = '<p>Sports/ Co-curricular Activities/ Achievements/ Associated Qualities</p>';
            $html .= '<p style="text-align:justify;">'.$data_get->data4.'</p><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of Content
            
            // Content start Here
            $html = '<p>Positions of Responsibility Held/ Achievements/ Associated Qualities</p>';
            $html .= '<p style="text-align:justify;">'.$data_get->data5.'</p><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of Content
            
            // Content start Here
            $html = '<p>Hobbies/ Achievements/ Associated Qualities</p>';
            $html .= '<p style="text-align:justify;">'.$data_get->data6.'</p><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of Content
            
            // Content start Here
            $html = '<p>Work Experience/ Achievements/ Associated Qualities</p>';
            $html .= '<p style="text-align:justify;">'.$data_get->data7.'</p><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of Content
            
            // Content start Here
            $html = '<p>Internship</p>';
            $html .= '<p style="text-align:justify;">'.$data_get->data8.'</p><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of Content
            
            // Content start Here
            $html = '<p>Conclusion</p>';
            $html .= '<p style="text-align:justify;">'.$data_get->data9.'</p><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            // end of Content
            
             $pdf->Output('Self-Introduction.pdf', 'D');
        }else{
            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td align="center" valign="middle"><h1>No Data Found!!</h1>
                    </td>
                </tr></table>';
            $pdf->writeHTML($html, true, false, true, false, '');
                
            $pdf->Output('Action_sheets_Blank.pdf', 'D');
        }
        
    }

    public function set_comments() {

//        echo 'jmd';die;
//        $data['user_id'] = $_SESSION['user_id'];
        $data['user_id'] = $_SESSION['user_id'];
        $data['question_id'] = $_POST['question_id'];
        $data['comment_text'] = $_POST['comment'];
        $data['comment_text'] = $_POST['comment'];
        $data['created_date'] = date('Y-m-d H:i:s');
        $data1 = $this->main_model->add_update_record('comments', $data, '');
//        echo 'data is inserted !!';

        $filters[0]['id'] = 'question_id';
        $filters[0]['value'] = $_POST['question_id'];


        $comment['ragini'] = $this->main_model->get_many_records('comments', $filters, '', 'id');
    }

//    public function get_comments($question_id=''){
////        $comment['comment_text'] = $this->main_model->get_records('comments', 'id', $quiz_id)->row();
//
//        $filters[0]['id'] = 'question_id';
//        $filters[0]['value'] = $question_id;
//        $comment['comments'] = $this->main_model->get_many_records('comments', $filters, '', 'id');
//       // $this->load->view('insert_options_view',$comment);
//        var_dump($comment);die;
//    }

    public function set_like() {
        $filter[0]['id'] = "question_id";
        $filter[0]['value'] = $_POST['question_id'];
        $filter[1]['id'] = "user_id";
        $filter[1]['value'] = $_SESSION['user_id'];
        $row = $this->main_model->get_many_records('likes_dislikes', $filter, '');
        if (empty($row)) {
            $data['user_id'] = $_SESSION['user_id'];
            $data['question_id'] = $_POST['question_id'];
            $data['records'] = "1";
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['user_id'];
            $this->main_model->add_update_record('likes_dislikes', $data, '');
        } else {
            if ($row[0]['records'] == 0) {
                $data['records'] = "1";
            } elseif ($row[0]['records'] == 1) {
                $data['records'] = "0";
            } else {
                $data['records'] = "1";
            }
            $data['id'] = $row[0]['id'];
            $this->main_model->add_update_record('likes_dislikes', $data, 'id');
        }
        echo $data['records'];
    }

    public function set_dislike() {
        $filter[0]['id'] = "question_id";
        $filter[0]['value'] = $_POST['question_id'];
        $filter[1]['id'] = "user_id";
        $filter[1]['value'] = $_SESSION['user_id'];
        $row = $this->main_model->get_many_records('likes_dislikes', $filter, '');
        if (empty($row)) {
            $data['user_id'] = $_SESSION['user_id'];
            $data['question_id'] = $_POST['question_id'];
            $data['records'] = "-1";
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['user_id'];
            $this->main_model->add_update_record('likes_dislikes', $data, '');
        } else {
            if ($row[0]['records'] == 0) {
                $data['records'] = "-1";
            } elseif ($row[0]['records'] == -1) {
                $data['records'] = "0";
            } else {
                $data['records'] = "-1";
            }
            $data['id'] = $row[0]['id'];
            $this->main_model->add_update_record('likes_dislikes', $data, 'id');
        }
        echo $data['records'];
    }

//    public function like_counts($question_id=''){
//        $question_id=292;
//        $total_likes = $this->main_model->get_record_count('likes_dislikes', 'records', 1);
//        echo "<pre>";print_r($total_likes);die;
////        $query="SELECT SUM(`records`)as likes FROM `likes_dislikes` where `records`= 1 AND `question_id`= 319";
////        $return = $this->db->query($query)->result_array();
////        echo "<pre>";print_r($return);die;
//    }

    public function register() {

        $this->load->view('registration_form_home.php');
    }

    public function node_old($id = 0) {
//        $query = $this->main_model->get_node_level($id, 0);
//check permission on node level
//check for quiz nodes
        $node_type = $this->main_model->get_name_from_id('node', 'type', $id, 'id');
        switch ($node_type) {
            case "Module":
                $query = $this->main_model->get_records('node', 'id', $id);
                $row_data = $query->row();
                break;
            case "Quiz":
                $quiz = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                $query = $this->main_model->get_records('quiz', 'id', $quiz);
                $row_data = $query->row();
                $row_data->quiz_id = $quiz;
                $row_data->id = $id;
                break;
            case "Content":
                break;
            default:
                break;
        }
        $this->load->view('show_node', $row_data);
    }

    public function update() {
        $table = $this->get_arguments('table');
        $this->main_model->add_update_record($table, 'id' . $_POST);
        $this->loadGrid($table);
    }

    public function delete($table = '', $id = 0, $child_table = "", $foreign_key = "") {//$id is value of primary key "id" to be deleted, - $foreign_key is the foreign key name in the child table
        $sheet_id = $this->main_model->get_name_from_id("sheet_values", "sheet_id", $id, 'id');
//        $tickmark_adv = $this->main_model->get_name_from_id(" tickmark_adv_content", "tickmark_adv_header_id", $id, 'id');
        $sheet = $this->main_model->get_name_from_id("template_instruction", "sheet_id", $id, 'id');
        $template_id = $this->main_model->get_name_from_id("template_instruction", "template_id", $id, 'id');
        $this->main_model->my_delete_record($table, 'id', $id);
        //   echo $this->db->last_query();
        // die();
        if ($child_table != "" && $foreign_key != "") {
            $this->main_model->delete_many_records($child_table, $foreign_key, $id);
        }
        if ($table == 'sheet_values') {
            header('Location: ' . base_url() . 'manage/' . $table . '/' . $sheet_id);
        } elseif ($table == 'template_instruction') {
            header('Location: ' . base_url() . 'manage/' . $table . '/' . $sheet . '/' . $template_id);
        } else {
            header('Location: ' . base_url() . 'manage/' . $table);
        }
    }

    public function assign($table = '', $id = 0) {
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        $assigned_to_tbl = end(explode('-', $table));
        $array_values = explode('-', $table);
        $assigned_from_tbl = $array_values[0];

        $filter_fields[0]['id'] = $assigned_to_tbl;
        $filter_fields[0]['value'] = $id;

        $request_fields[0] = $assigned_from_tbl;
        $assigned_items = $this->main_model->get_many_records($table, $filter_fields, $request_fields, "");
        $source_data = array();

        if ($assigned_items) {
            foreach ($assigned_items as $key => $value) {
                $source_data[$key] = $value[$assigned_from_tbl];
            }
        }
        $data['source_data'] = $source_data;



        $this->load->view('assign-' . $table, $data);
    }

    public function set_many($table = '', $id = '') {
//echo "<pre>";
//echo $table.' '.$id;
//var_dump($_POST);die;


        $assigned_to_tbl = end(explode('-', $table));
        $array_values = explode('-', $table);
        $assigned_from_tbl = $array_values[0];
        if (isset($_POST[$assigned_from_tbl])) {
            $records = $_POST[$assigned_from_tbl];
            $i = 0;
            foreach ($records as $value) {
                $data[$i][$assigned_from_tbl] = $value;
                $data[$i][$assigned_to_tbl] = $id;
                $i++;
            }
        }
//        echo "<pre>";
//
//    var_dump($data);die;
        $this->main_model->add_update_many_records($table, $data, $assigned_to_tbl, $id); //$assigned_to_tbl--is the repititive field name in one-to-many table
        if (($table == 'node-users') && (!isset($_POST['id']))) {
            header('Location: ' . base_url());
        } else {

            header('Location: ' . base_url() . 'manage/' . end(explode('-', $table)));
        }
    }

    public function subscribNewsLetterbackup() {

//var_dump($_POST);

        $_POST['created_by'] = $_SESSION['user_id'];
        $_POST['created_date'] = date('Y-m-d H:m:s');

        $return_id = $this->main_model->add_update_record('news_letter', $_POST);
//        if($return_id){
////            $_SESSION['msg_str'].= 'Thanks For News letter subscription !';
////            $_SESSION['msg_hdr'] = 'Information !';
////
//            $_SESSION['msg_str'].= 'Cannot update Password. Try again or contact Website Administrator.';
//            $_SESSION['msg_hdr'] = 'Alert !';
//            header('Location: ' . base_url());
//
//
//        }else{
//            $_SESSION['msg_str'].= 'Thanks For News letter subscription !';
//            $_SESSION['msg_hdr'] = 'Alert !';
//
//        }

        header('Location: ' . base_url());
    }

    public function add_request($quiz_result_id) {

        $request['quiz_result_id'] = $quiz_result_id;

        $is_requested = $this->main_model->get_name_from_id('request_remove_answer', 'id', $quiz_result_id, 'quiz_result_id');
        
        if (!$is_requested) {

            $filter[0]['id'] = "id";
            $filter[0]['value'] = $request['quiz_result_id'];
            $req_field = array("quiz_id", "user_id");
            $result = $this->main_model->get_many_records("quiz_result", $filter, $req_field);

            $request['quiz_id'] = $result[0]['quiz_id'];
            $request['user_id'] = $result[0]['user_id'];

//echo '<pre>';
//var_dump($result);die;

            $request_id = $this->main_model->add_update_record("request_remove_answer", $request);
            
            $id = $quiz_result_id;
            $this->main_model->delete_many_records('quiz_result', 'id', $id);
            $this->main_model->delete_many_records('quiz_result_answers', 'quiz_result_id', $id);
            $this->main_model->delete_many_records('quiz_result_options', 'quiz_result_id', $id);
            $this->main_model->my_delete_record('request_remove_answer', 'quiz_result_id', $id);
            //echo $this->db->last_query();die;

            header('Location: ' . base_url());
        } else { //============================= already requested for this quiz ===========================
        
            $id = $quiz_result_id;
            $this->main_model->delete_many_records('quiz_result', 'id', $id);
            $this->main_model->delete_many_records('quiz_result_answers', 'quiz_result_id', $id);
            $this->main_model->delete_many_records('quiz_result_options', 'quiz_result_id', $id);
        
            $this->main_model->my_delete_record('request_remove_answer', 'quiz_result_id', $id);
            //echo $this->db->last_query();die;
            header('Location: ' . base_url());
        }
    }

    public function remove($type = '') {
        $quiz_result = array();

        switch ($type) {
            case "all":
                $quiz_result_details = $this->db->get('quiz_result')->result_array();

                foreach ($quiz_result_details as $key => $result) {
                    $quiz_result[$key]['id'] = $result['id'];
                    $quiz_result[$key]['student_name'] = $this->main_model->get_name_from_id('users', 'name', $result['user_id']);
                    $quiz_result[$key]['quiz_name'] = $this->main_model->get_name_from_id('quiz', 'name', $result['quiz_id']);
                    $quiz_result[$key]['start_time'] = date('d-m-y  _  h:i:s a', strtotime($result['start_time']));
                    if ($result['submit_time'])
                        $quiz_result[$key]['submit_time'] = date('d-m-y  _  h:i:s a', strtotime($result['submit_time']));
                    else
                        $quiz_result[$key]['submit_time'] = '';
                }
                break;
            case "incomplete":
                $this->db->where("submit_time IS NULL");
                $quiz_result_details = $this->db->get('quiz_result')->result_array();

                foreach ($quiz_result_details as $key => $result) {
                    $quiz_result[$key]['id'] = $result['id'];
                    $quiz_result[$key]['student_name'] = $this->main_model->get_name_from_id('users', 'name', $result['user_id']);
                    $quiz_result[$key]['quiz_name'] = $this->main_model->get_name_from_id('quiz', 'name', $result['quiz_id']);
                    $quiz_result[$key]['start_time'] = date('d-m-y _ h:i:s a', strtotime($result['start_time']));
                    if ($result['submit_time'])
                        $quiz_result[$key]['submit_time'] = date('d-m-y _ h:i:s a', strtotime($result['submit_time']));
                    else
                        $quiz_result[$key]['submit_time'] = '';
                }
                break;
            case "requested":

                $query_str1 = 'SELECT `request_remove_answer`.`id`,`request_remove_answer`.`quiz_result_id`,
                     `request_remove_answer`.`user_id`, `request_remove_answer`.`quiz_id`,`request_remove_answer`.`request_time`,
                     `quiz_result`.`start_time`,`quiz_result`.`submit_time` FROM `request_remove_answer`,`quiz_result` WHERE `request_remove_answer`.`quiz_result_id` =`quiz_result`.`id` AND
                     `request_remove_answer`.`is_deleted` = 0 ';
                $quiz_result_details = $this->db->query($query_str1)->result_array();

                foreach ($quiz_result_details as $key => $result) {
                    $quiz_result[$key]['quiz_result_id'] = $result['quiz_result_id'];
                    $quiz_result[$key]['id'] = $result['id'];
                    $quiz_result[$key]['student_name'] = $this->main_model->get_name_from_id('users', 'name', $result['user_id']);
                    $quiz_result[$key]['quiz_name'] = $this->main_model->get_name_from_id('quiz', 'name', $result['quiz_id']);
                    $quiz_result[$key]['start_time'] = date('d-m-y  h:i:s a', strtotime($result['start_time']));
                    if ($result['submit_time'])
                        $quiz_result[$key]['submit_time'] = date('d-m-y _ h:i:s a', strtotime($result['submit_time']));
                    else
                        $quiz_result[$key]['submit_time'] = '';

                    $quiz_result[$key]['request_time'] = date('d-m-y _ h:i:s a', strtotime($result['request_time']));
                }

                break;
            case "sheet":
                $filter[0]['id'] = "is_submit";
                $filter[0]['value'] = '1';
                $req_field = array("*");
                $sheet_user = $this->main_model->get_many_records("sheet_user", $filter, $req_field);
                foreach ($sheet_user as $key => $result) {
                    $quiz_result[$key]['id'] = $result['id'];
                    $quiz_result[$key]['sheet_id'] = $result['sheet_id'];
                    $quiz_result[$key]['student_name'] = $this->main_model->get_name_from_id('users', 'name', $result['user_id']);
                    $quiz_result[$key]['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $result['sheet_id']);
                    $quiz_result[$key]['submit_time'] = date('d-m-Y', strtotime($result['modify_date']));
                }
//                echo '<pre>';
//                print_r($quiz_result);
//                die;
                break;
            default :
                break;
        }
        $data['quiz_result'] = $quiz_result;
        $this->load->view('remove-' . $type, $data);
    }

    public function value_action($sheet = '', $id = '', $action = '') {

        $data['sheet_id'] = $id;
//        //echo $data['abc'] = 'mohit';
//       //echo $id;die;
        $submit = $this->custom->is_sheet_submited($id);
//        //var_dump($submit);
        if ($submit) {

            header('Location: ' . base_url() . 'showsheet/');
            die;
        }
//
        $req = array('category');
        $filter[0]['id'] = 'sheet_id';
        $filter[0]['value'] = $id;
        $data['category_name'] = $this->main_model->get_records_group_by('sheet_values', $filter, 'category', $req, 'category');


        foreach ($data['category_name'] as $key => $cat) {

            $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
        }
//$this->var_print($data['max']);die;


        $req = array('name, max');
        $filter1[0]['id'] = 'id';
        $filter1[0]['value'] = $id;
//
//
//
//
//
//
//        $data['max'] = $this->main_model->get_many_records('actionsheet_category', '', $req, 'name');
        $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
        $data['data']['details'] = $details[0]['details'];

//        echo"<pre>";
//        print_r($details);die;

        $i = 0;
        foreach ($data['category_name'] as $key => $category) {
            $req = array('category');
            $filter[0]['id'] = 'sheet_id';
            $filter[0]['value'] = $id;
            $filter[1]['id'] = 'category';
            $filter[1]['value'] = $category['category'];
            $data['data'][$category['category']] = $this->main_model->get_many_records("sheet_values", $filter, '', '');
        }
        $data['submit'] = '';

//if($action == 'edit'){
        $req = array('category');
        $filter[0]['id'] = 'sheet_id';
        $filter[0]['value'] = $id;
        $filter[1]['id'] = 'user_id';
        $filter[1]['value'] = $_SESSION['user_id'];
        $data['submit'] = $this->main_model->get_many_records("action_sheets", $filter, '', '');

        if (!empty($data['submit'])) {
            $action = 'edit-';
        }

        $this->load->view($action . 'values_action_sheet', $data);
    }

    public function delete_result($type = '', $quiz_result_id = 0) {
        $id = $quiz_result_id;
        $this->main_model->delete_many_records('quiz_result', 'id', $id);
        $this->main_model->delete_many_records('quiz_result_answers', 'quiz_result_id', $id);
        $this->main_model->delete_many_records('quiz_result_options', 'quiz_result_id', $id);

        if ($type == 'requested') {
            $this->main_model->my_delete_record('request_remove_answer', 'quiz_result_id', $id);
        }

        header('Location: ' . base_url() . 'remove/' . $type);
    }

    public function delete_sheet($type = '', $sheet_user_id = 0) {
        $this->main_model->delete_many_records('sheet_user', 'id', $sheet_user_id);
        $this->main_model->delete_many_records('sheet_section', 'sheet_user_id', $sheet_user_id);
        header('Location: ' . base_url() . 'remove/' . $type);
    }

    public function testing() {
        $this->load->view('testing');
    }

    public function var_print($data) {
        echo"<pre>";
        print_r($data);
    }

//----------------------------------------- main-class supporting functions starts ------------------------------------------------

    public function ajax_fetch() {
        $requested_text = file_get_contents("php://input");
        $requested_obj = json_decode($requested_text, TRUE);
        $table = $requested_obj['req_table'];
        $key = $requested_obj['search_key'];
        $value = $requested_obj['search_value'];
        $request_fields = $requested_obj['req_fields'];

        if ($_SESSION['role_name'] == 'Content Creator' && $table == 'node') {//page specified in url but permission not allowing
            $is_permitted = $this->custom->get_access_permit_parent($value); //=================== This is to check parent node =========
            if ($is_permitted) {

                $data = $this->main_model->get_selected_records($table, $key, $value, $request_fields);
            } else {
                $is_permitted = $this->custom->get_access_permit($value); //======================= this is to check chield node ===============
                if ($is_permitted) {
                    $data = $this->main_model->get_selected_records($table, $key, $value, $request_fields);
                } else {
//die ;
                    $data = '';
                }
            }
        } else {

            $data = $this->main_model->get_selected_records($table, $key, $value, $request_fields);
        }


        $encoded = json_encode($data, JSON_FORCE_OBJECT);
        die($encoded);
    }

    public function ajax_feeder($function) {
        $requested_text = file_get_contents("php://input");
        $requested_obj = json_decode($requested_text, TRUE);
        switch ($function) {
            case "no_of_childs":
                $node_Id = $requested_obj['data'];
                $result = $this->main_model->get_name_from_id('node', 'count(*)', $node_Id, "parent_id");
                $encoded = json_encode($result, JSON_FORCE_OBJECT);
                die($encoded);
                break;
            default:
                break;
        }
    }

    private function loadGrid($table = '') {
        $data['table_records'] = $this->main_model->get_records($table);
        $this->load->view('manage-' . $table, $data);
    }

    private function saveImage($path, $file_name) {

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|pdf|bmp|jpeg';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image_file')) {
//$upload_data = $this->upload->data();
//@unlink($_FILES[$file_element_name]);
            return true;
        } else {
            die(print_r($this->upload->display_errors()));
        }
    }

//=============================================New Functions ==========================
    public function create($table = '', $id = 0, $template_id = 0) {//getting quizid($id) as a parameter in url
        $data['template_instruction_id'] = $id;
        switch ($table) {
            case 'template_instruction':
                $data['sheet_id'] = $id;
                $data['template_id'] = $template_id;
                $this->load->view('add-' . $table, $data);
                break;
            case 'values_for_checkbox_with_tooltip':
                $data['template_instruction_id'] = $id;
                $this->load->view('add-values_for_checkbox_with_tooltip', $data);
                break;
            case 'value_for_add_more_type':
                $data['template_instruction_id'] = $id;
                $this->load->view('add-value_for_add_more_type', $data);
                break;
            case 'checkbox_with_no_tooltip':
                $data['template_instruction_id'] = $id;
                $this->load->view('add-checkbox_with_no_tooltip', $data);
                break;

            case 'tickmark_adv_content':
                $data['template_instruction_id'] = $id;
                $fil[0]['id'] = 'template_instruction_id';
                $fil[0]['value'] = $id;
                $data['return_data'] = $this->main_model->get_many_records("tickmark_adv_header", $fil, '', '');
                $this->load->view('add-tickmark_adv_content', $data);

                break;
            case 'add_more_checkbox_category':
//
                $data['template_instruction_id'] = $id;
                $fil[0]['id'] = 'template_instruction_id';
                $fil[0]['value'] = $id;
                $data['return_data'] = $this->main_model->get_many_records("add_more_checkbox_category", $fil, '', '');
                $this->load->view('add-addmore_checkbox_category', $data);
//                    echo '<pre>';
//                print_r($data);die;
//
                break;

            case 'dropdown_with_multi_addmore':
                $data['template_instruction_id'] = $id;
                $this->load->view('add-dropdown_with_multi_addmore', $data);
//                     echo '<pre>';
//                print_r($data);die;
                break;


            default :$this->load->view('add-' . $table, $data);
        }
    }

    public function set_data($table = '') {//-==================== save data from user ==============
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        switch ($table) {
            case 'template_instruction':
                if (isset($_POST['id'])) {//sending different parameters for update and insert
                    if (isset($_POST['checkbox'])) {
                        $_POST['checkbox'] = $_POST['checkbox'];
                    } else {
                        $_POST['checkbox'] = "checked";
                    }
                    $return_id = $this->main_model->add_update_record($table, $_POST, 'id');
                } else {
                    $insert_data['sheet_id'] = $_POST['sheet_id'];
                    $insert_data['template_id'] = $_POST['template_id'];
                    $insert_data['section_name'] = $_POST['section_name'];
                    $insert_data['section_type'] = $_POST['section_type'];
                    $insert_data['sort_order'] = $_POST['sort_order'];
                    if ((isset($_POST['custom_label1'])) && (isset($_POST['custom_label2'])) && (isset($_POST['checkbox']))) {
                        $insert_data['custom_label1'] = $_POST['custom_label1'];
                        $insert_data['custom_label2'] = $_POST['custom_label2'];
                        $insert_data['checkbox'] = $_POST['checkbox'];
                    } else {
                        //$insert_data['custom_label1'] = "";
                        //$insert_data['custom_label2'] = "";
                        //$insert_data['checkbox'] = "checked";
                    }
                    $insert_data['instruction_text'] = $_POST['instruction_text'];
                    $insert_data['created_by'] = $_SESSION['user_id'];
                    $insert_data['created_date'] = date('Y-m-d H:i:s');
                    $return_id = $this->main_model->add_update_record($table, $insert_data);
//----if section_type=4 ie: Tick Mark Type , then insert tickmark_header table :dew :4/08/17
                    if ($_POST['section_type'] == 4) {
                        if (isset($_POST['doc'])) {
                            $data = $_POST['doc'];
                            foreach ($data as $key => $value) {
                                $tick_mark['template_instruction_id'] = $return_id;
                                $tick_mark['header_name'] = $value['header_name'];
                                $tick_mark['header_type'] = $value['header_type'];
                                $return_id_tickmark_header = $this->main_model->add_update_record('tickmark_type_header', $tick_mark);
                            }
                        }
                    }
//---end -if section_type=4 ie: Tick Mark Type , then insert tickmark_header table
//----if section_type=7 ie: Marking Type(Agree/Dis Agg) , then insert marking_type_header table :dew :16/08/17
                    if ($_POST['section_type'] == 7) {
                        if (isset($_POST['m_doc'])) {
                            $data = $_POST['m_doc'];
                            foreach ($data as $key => $value) {
                                $tick_mark['template_instruction_id'] = $return_id;
                                $tick_mark['header_name'] = $value['header_name'];
                                $tick_mark['header_type'] = $value['header_type'];
                                $tick_mark['marks'] = $value['marks'];
                                $return_id_marking_type_header = $this->main_model->add_update_record('marking_type_header', $tick_mark);
                            }
                        }
                    }
//---end -if section_type=7 ie: Marking Type(Agree/Dis Agg) , then insert  marking_type_header table :dew :16/08/17
//----if section_type=9 ie: Tick Mark Advance Type , then insert tickmark_header table :musarrat :5/10/17
                    if ($_POST['section_type'] == 9) {
//                        echo '<pre>';
//                        print_r($_POST);die;
                        $tick_mark['template_instruction_id'] = $return_id;
                        $tick_mark['header_name'] = $_POST['header_name1'];
                        $return_id_tickmark_header = $this->main_model->add_update_record('tickmark_adv_header', $tick_mark);

                        $tick_mark1['template_instruction_id'] = $return_id;
                        $tick_mark1['header_name'] = $_POST['header_name2'];
                        $return_id_tickmark_header = $this->main_model->add_update_record('tickmark_adv_header', $tick_mark1);
                    }
//---end -if section_type=8 ie: Tick Mark adv Type , then insert tickmark_header table
//                   if ($_POST['section_type'] == 10) {
////                        echo '<pre>';
////                        print_r($_POST);die;
//                        $multi_addmore['template_instruction_id'] = $return_id;
//                        $multi_addmore['category'] = $_POST['category'];
//                        $return_id_multi_addmore = $this->main_model->add_update_record('dropdown_with_multi_addmore', $multi_addmore);
//
//                }
                }
//                  echo '<pre>';
//                  print_r($_POST);die;

                header('Location: ' . base_url() . 'manage/' . $table . '/' . $_POST['sheet_id'] . '/' . $_POST['template_id']);
                break;
            case 'save_data_for_add_more_type____':
                $posted_data = $_POST;
//                echo '<pre>';
//                print_r($posted_data);
//                die;
                unset($_POST);

                $sheet_id = $posted_data['sheet_id'];
                $sheet_section_id = $posted_data['sheet_section_id'];
                unset($posted_data['sheet_id']);
                unset($posted_data['sheet_section_id']);


                $this->db->where('sheet_id', $sheet_id);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);


                foreach ($posted_data as $value) {
                    foreach ($value as $insert_data) {
                        $insert['sheet_id'] = $sheet_id;
                        $insert['user_id'] = $_SESSION['user_id'];
                        $insert['sheet_section_id'] = $sheet_section_id;
                        $insert['section_id'] = $insert_data['section_id']; //section_id here "value_for_add_more_type" table ka id he,
                        $insert['key_values'] = $insert_data['val'];
                        $insert['created_by'] = $_SESSION['user_id'];
                        $insert['created_date'] = date('Y-m-d H:i:s');
                        $return_id = $this->main_model->add_update_record($table, $insert);
                    }
                }
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                $req_data = array('*');
                $fil_dat[0]['id'] = 'sheet_id';
                $fil_dat[0]['value'] = $sheet_id;
                $fil_dat[1]['id'] = 'user_id';
                $fil_dat[1]['value'] = $_SESSION['user_id'];
                $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                $this->db->set('is_submit', '1');
                $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                $this->db->where('section', $sheet_section_id);
                $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..

                $all_sec_submitted = $this->custom->is_all_section_submit($sheet_id);

                if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                    $this->db->set('is_submit', '1');
                    $this->db->where('user_id', $_SESSION['user_id']);
                    $this->db->where('sheet_id', $sheet_id);
                    $query = $this->db->update('sheet_user');
//---end
                    echo "Thanks for submitting all the sections of this action sheet";
                } else {
                    echo 'Thank you for submitting your responses on this section';
                }

                break;
            case 'save_data_for_add_more_type':
//                echo '<pre>';
//                print_r($_POST);
//                die;
                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
//                    $update_data['is_submit'] = '1';
//                    $update_data['section'] = $_POST['sheet_section_id'];
//                    $this->main_model->add_update_record('sheet_section', $update_data, 'section');
                } else {
                    $data['is_submit'] = '1';
                }
                unset($_POST['draft']);
                unset($_POST['sheet_id']);
                unset($_POST['sheet_section_id']);
                $this->db->where('sheet_id', $data['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST as $value) {
                    foreach ($value as $insert_data) {
                        $insert['sheet_id'] = $data['sheet_id'];
                        $insert['user_id'] = $_SESSION['user_id'];
                        $insert['sheet_section_id'] = $data['sheet_section_id'];
                        $insert['section_id'] = $insert_data['section_id']; //section_id here "value_for_add_more_type" table ka id he,
                        $insert['key_values'] = $insert_data['val'];
                        $insert['created_by'] = $_SESSION['user_id'];
                        $insert['created_date'] = date('Y-m-d H:i:s');
                        $insert['is_submit'] = $data['is_submit'];
                        $return_id = $this->main_model->add_update_record($table, $insert);
                    }
                }
                unset($_POST);
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT(click on Save Button)
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);

                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
//                            $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
//                            $_SESSION['msg_hdr'] = "Success !";
//                            header('Location: ' . base_url() . 'showsheet/');
//                            die;
                        die("go_to_analytics"); //on success ajax will redirect analytics page
                    } else {//after submit current section , next section will appear
//                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
//                        die;
                        die("next_section"); //on success ajax will redirect next section
                    }
                } else {//FOR SAVE AS DRAFT
//                        $_SESSION['msg_str'] .= 'Your Previous data are saved.please complete it and save now';
//                        $_SESSION['msg_hdr'] = "Incomplete !";
//                       header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
//                       die;
                    die("draft_saved"); //on success ajax will redirect same section
                }
//                echo '<pre>';
//                print_r($_POST);
//                die;
                break;
            case'action_sheets'://---for "checkbox_with_tooltip" section type aaction sheet का डाटा सेव होगा जब user action sheet को submit करेगा.
                //echo "<pre>"; print_r($_POST); die;
                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];
//          if(isset($_POST['submit'])){
//              $data['submit'] = '0';
//              unset($_POST['submit']);
//          }
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $_POST['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//                    $update_data['is_submit'] = '1';
//                    $update_data['section'] = $_POST['sheet_section_id'];
//                    $this->main_model->add_update_record('sheet_section', $update_data, 'section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                } else {
                    $data['is_submit'] = '1';
                }
                unset($_POST['draft']);

                $this->db->where('sheet_id', $_POST['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST['sheetvalue_id'] as $id => $value) {
                    $data['sheetvalue_id'] = $id;
                    $data['reason'] = $value;
                    $return_id = $this->main_model->add_update_record($table, $data);
                }

                unset($_POST);
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT--this section only
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);
//                    echo '<pre>';
//                    print_r($all_sec_submitted);die;
                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
                        $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
                        $_SESSION['msg_hdr'] = "Success !";
                        // header('Location: ' . base_url() . 'showsheet/');
                        header('Location: ' . base_url() . 'analytics/key_values/' . $data['sheet_id'] . "/" . $data['sheet_section_id']);
                        die;
                    } else {//after submit current section , next section will appear
                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                        die;
                    }
                } else {//FOR SAVE AS DRAFT
                    $_SESSION['msg_str'] .= 'Your information is saved as draft';
                    $_SESSION['msg_hdr'] = "Your Information Saved";
                    header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                    die;
                }
                break;

            case 'save_data_checkbox_with_no_tooltip':
//                echo '<pre>';
//                print_r($_POST);
//                die;
                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
//                    $update_data['is_submit'] = '1';
//                    $update_data['section'] = $_POST['sheet_section_id'];
//                    $this->main_model->add_update_record('sheet_section', $update_data, 'section');
                } else {
                    $data['is_submit'] = '1';
                }
                unset($_POST['draft']);

                $this->db->where('sheet_id', $_POST['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST['sheetvalue_id'] as $id => $value) {
                    $data['sheetvalue_id'] = $id;
                    $data['reason'] = $value;
                    $return_id = $this->main_model->add_update_record($table, $data);
                }
                unset($_POST);
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);

                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
                        $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
                        $_SESSION['msg_hdr'] = "Success !";
                        // header('Location: ' . base_url() . 'showsheet/');
                        header('Location: ' . base_url() . 'analytics/key_values/' . $data['sheet_id'] . "/" . $data['sheet_section_id']);
                        die;
                    } else {//after submit current section , next section will appear
                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                        die;
                    }
                } else {//FOR SAVE AS DRAFT
                    $_SESSION['msg_str'] .= 'Your information is saved as draft';
                    $_SESSION['msg_hdr'] = "Your Information Saved";
                    header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                    die;
                }
//                echo '<pre>';
//                print_r($_POST);
//                die;
                break;
            case 'tickmark_type':
//                echo '<pre>';
//                print_r($_POST);die;
                $childData = $_POST['doc'];
                foreach ($childData as $insert_childData) {
                    $insert['template_instruction_id'] = $_POST['template_instruction_id'];
                    $insert['name'] = $insert_childData['header_name'];
                    $insert['created_by'] = $_SESSION['user_id'];
                    $insert['created_date'] = date('Y-m-d H:i:s');
                    $this->main_model->add_update_record('tickmark_type', $insert);
                }
                header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/4');
                break;
            case 'save_data_tickmark_type':
//                echo '<pre>';
//                print_r($_POST);die;

                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                } else {
                    $data['is_submit'] = '1';
                }
                unset($_POST['draft']);

                $this->db->where('sheet_id', $_POST['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST['items'] as $id => $value) {
                    $data['tickmark_type_id'] = $value['question_id'];
                    $data['tickmark_type_header_id'] = $value['option_id'];
//                    echo '<pre>';
//                    print_r($data);die;
                    $return_id = $this->main_model->add_update_record($table, $data);
                }
                unset($_POST);
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);

                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
                        $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
                        $_SESSION['msg_hdr'] = "Success !";
                        // header('Location: ' . base_url() . 'showsheet/');
                        header('Location: ' . base_url() . 'analytics/key_values/' . $data['sheet_id'] . "/" . $data['sheet_section_id']);
                        die;
                    } else {//after submit current section , next section will appear
                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                        die;
                    }
                } else {//FOR SAVE AS DRAFT
                    $_SESSION['msg_str'] .= 'Your information is saved as draft';
                    $_SESSION['msg_hdr'] = "Your Information Saved";
                    header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                    die;
                }

                break;
            case 'descriptive_type'://for save the UI design of descriptive type ie design content
                $data['template_instruction_id'] = $_POST['template_instruction_id'];
                $data['created_by'] = $_SESSION['user_id'];
                $data['created_date'] = date('Y-m-d H:i:s');
                $childData = $_POST['doc'];
                unset($_POST['doc']);
                $return_id = $this->main_model->add_update_record($table, $_POST);
                foreach ($childData as $insert_childData) {
                    $insert['descriptive_type_id'] = $return_id;
                    $insert['answer_header_text'] = $insert_childData['answer_header_text'];
                    $insert['created_by'] = $_SESSION['user_id'];
                    $insert['created_date'] = date('Y-m-d H:i:s');
                    $this->main_model->add_update_record('descriptive_type_details', $insert);
                }
                header('Location: ' . base_url() . 'manage_sheet_values/' . $data['template_instruction_id'] . '/6');
                break;
            case 'save_data_descriptive_type':
                // echo '<pre>';
                // print_r($_POST);
                // die;
                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                } else {
                    $data['is_submit'] = '1';
                }
                unset($_POST['draft']);

                $this->db->where('sheet_id', $_POST['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST['list'] as $id => $value) {
                    $data['description_details_id'] = $id;
                    $data['value'] = $value;
                    $return_id = $this->main_model->add_update_record($table, $data);
                    //echo $this->db->last_query();die;
                }
                unset($_POST);
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);

                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
                        $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
                        $_SESSION['msg_hdr'] = "Success !";
                        // header('Location: ' . base_url() . 'showsheet/');
                        header('Location: ' . base_url() . 'analytics/key_values/' . $data['sheet_id'] . "/" . $data['sheet_section_id']);
                        die;
                    } else {//after submit current section , next section will appear
                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                        die;
                    }
                } else {//FOR SAVE AS DRAFT
                    $_SESSION['msg_str'] .= 'Your information is saved as draft';
                    $_SESSION['msg_hdr'] = "Your Information Saved";
                    header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                    die;
                }
                break;


//            case 'tickmark_adv_content':
////                echo '<pre>';
////                print_r($_POST);die;
//
//                $this->main_model->add_update_record('tickmark_adv_content', $_POST);
//                header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/9');
//                break;

            case 'save_data_adv_tickmark':
//
//                $req = array('*');
//                    $filter[0]['id'] = 'template_instruction_id';
//                    $filter[0]['value'] = $active_sheet;
//                    $data['question_data'] = $this->main_model->get_many_records("tickmark_adv_content", $filter, '', '');
////
//                echo '<pre>';
//                print_r($_POST);
//                die;


                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
////                    ----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                } else {
                    $data['is_submit'] = '1';
                }
                unset($_POST['draft']);

                $this->db->where('sheet_id', $_POST['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST['arr'] as $id => $value) {
                    $data['tickmark_adv_content_id'] = $value['tickmark_adv_content_id'];
                    if ($value['tickmark_adv_header_id']) {
                        $data['tickmark_adv_header_id'] = $value['tickmark_adv_header_id'];
                        $return_id = $this->main_model->add_update_record($table, $data);
                    }
                }
                unset($_POST);
//                  echo '<pre>';
//                print_r($data['is_submit']);
//                die;
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);
//                    echo '<pre>';
//                    print_r($all_sec_submitted);die;
                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
                        $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
                        $_SESSION['msg_hdr'] = "Success !";
                        //header('Location: ' . base_url() . 'showsheet/');
                        header('Location: ' . base_url() . 'analytics/key_values/' . $data['sheet_id'] . "/" . $data['sheet_section_id']);
                        die;
                    } else {//after submit current section , next section will appear
                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                        die;
                    }
                } else {//FOR SAVE AS DRAFT
                    $_SESSION['msg_str'] .= 'Your information is saved as draft';
                    $_SESSION['msg_hdr'] = "Your Information Saved";
                    header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                    die;
                }
                break;


            case 'save_data_listing_type':
//                echo '<pre>';
//                print_r($_POST);
//                die;
                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                } else {
                    $data['is_submit'] = '1';
                }
                unset($_POST['draft']);

                $this->db->where('sheet_id', $_POST['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST['list'] as $id => $value) {
                    $data['listing_type_id'] = $value['listing_type_id'];
                    foreach ($value['key_value'] as $key2 => $value_ans) {
                        $data['key_answers'] = $value_ans;
                        $return_id = $this->main_model->add_update_record($table, $data);
                    }
                }
                unset($_POST);
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);

                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
                        $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
                        $_SESSION['msg_hdr'] = "Success !";
                        //header('Location: ' . base_url() . 'showsheet/');
                        header('Location: ' . base_url() . 'analytics/key_values/' . $data['sheet_id'] . "/" . $data['sheet_section_id']);
                        die;
                    } else {//after submit current section , next section will appear
                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                        die;
                    }
                } else {//FOR SAVE AS DRAFT
                    $_SESSION['msg_str'] .= 'Your information is saved as draft';
                    $_SESSION['msg_hdr'] = "Your Information Saved";
                    header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                    die;
                }
                break;
            case 'save_data_range_type': //when submit the sheet by user :Range Type(8)
                // echo '<pre>';
                // print_r($_POST);die;
                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];

                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                } else {
                    $data['is_submit'] = '1';
                }
                unset($_POST['draft']);

                $this->db->where('sheet_id', $_POST['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST['list'] as $id => $value) {
                    $data['range_type_id'] = $value['range_type_id'];
                    $data['your_ans'] = $value['your_ans'];
                    $return_id = $this->main_model->add_update_record($table, $data);
                }
                unset($_POST);
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);

                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
                        $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
                        $_SESSION['msg_hdr'] = "Success !";
                        //  header('Location: ' . base_url() . 'showsheet/');
                        header('Location: ' . base_url() . 'analytics/key_values/' . $data['sheet_id'] . "/" . $data['sheet_section_id']);
                        die;
                    } else {//after submit current section , next section will appear
                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                        die;
                    }
                } else {//FOR SAVE AS DRAFT
                    $_SESSION['msg_str'] .= 'Your information is saved as draft';
                    $_SESSION['msg_hdr'] = "Your Information Saved";
                    header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                    die;
                }
                break;
            case 'marking_type':
//                 echo '<pre>';
//                print_r($_POST);die;
                $childData = $_POST['doc'];
                foreach ($childData as $insert_childData) {
                    $insert['template_instruction_id'] = $_POST['template_instruction_id'];
                    $insert['name'] = $insert_childData['header_name'];
                    $insert['category'] = $_POST['category'];
                    $insert['created_by'] = $_SESSION['user_id'];
                    $insert['created_date'] = date('Y-m-d H:i:s');
                    $this->main_model->add_update_record('marking_type', $insert);
                }
                header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/7');
                break;

            case 'tickmark_adv_content':
//                echo '<pre>';
//                print_r($_POST);
//                die;
                $this->main_model->add_update_record('tickmark_adv_content', $_POST);
                header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/9');
                break;

            case 'save_data_marking_type':
                // echo '<pre>';
                // print_r($_POST);die;
                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';

//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                } else {
                    $data['is_submit'] = '1';
                }
                unset($_POST['draft']);

                $this->db->where('sheet_id', $_POST['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST['items'] as $id => $value) {
                    $data['marking_type_id'] = $value['question_id'];
                    $data['marking_type_header_id'] = $value['option_id'];
                    $return_id = $this->main_model->add_update_record($table, $data);
                }
                unset($_POST);
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);

                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '0');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
                        //$_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
                       // $_SESSION['msg_hdr'] = "Success !";
                        // header('Location: ' . base_url() . 'showsheet/');
                        header('Location: ' . base_url() . 'analytics/key_values/' . $data['sheet_id'] . "/" . $data['sheet_section_id']);
                        die;
                    } else {//after submit current section , next section will appear
                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                        die;
                    }
                } else {//FOR SAVE AS DRAFT
                    $_SESSION['msg_str'] .= 'Your information is saved as draft';
                    $_SESSION['msg_hdr'] = "Your Information Saved";
                    header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                    die;
                }

            case 'add_more_checkbox_category':
//                echo '<pre>';
//                print_r($_POST);die;
//
//                $data['sheet_id'] = $_POST['sheet_id'];
//                $data['user_id'] = $_SESSION['user_id'];
//                $data['sheet_section_id'] = $_POST['sheet_section_id'];
                $this->main_model->add_update_record('add_more_checkbox_category', $_POST);
                header('Location: ' . base_url() . 'manage_sheet_values/' . $_POST['template_instruction_id'] . '/10');
                break;
            case 'save_data_dropdown_with_multi_addmore':
                // echo '<pre>';
                // print_r($_POST);
                // die;
                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];
                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
//                    $update_data['is_submit'] = '1';
//                    $update_data['section'] = $_POST['sheet_section_id'];
//                    $this->main_model->add_update_record('sheet_section', $update_data, 'section');
                } else {
                    $data['is_submit'] = '1';
                }
                  
                unset($_POST['draft']);
                // echo '<pre>';
                // print_r($_POST);
                // die;
                $this->db->where('sheet_id', $_POST['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST['category'] as $id => $value) {
                    //foreach ($value['action_value'] as $key => $value_action) {
                        $data['multi_addmore_category_id'] = $value;
                        $data['statement'] = $_POST['statement'][$id];
                        $data['action_values'] = $_POST['action_value'][$id];
                        $return_id = $this->main_model->add_update_record($table, $data);
                    //}
                }
                unset($_POST);
//                     echo '<pre>';
//                print_r($data['is_submit']);
//                die;
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);

                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
                        $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
                        $_SESSION['msg_hdr'] = "Success !";
//                        header('Location: ' . base_url() . 'showsheet/');
                        header('Location: ' . base_url() . 'analytics/key_values/' . $data['sheet_id'] . "/" . $data['sheet_section_id']);
                        die;
                    } else {//after submit current section , next section will appear
                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                        die;
                    }
                } else {//FOR SAVE AS DRAFT
                    $_SESSION['msg_str'] .= 'Your information is saved as draft';
                    $_SESSION['msg_hdr'] = "Your Information Saved";
                    header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
                    die;
                }
//                echo '<pre>';
//                print_r($_POST);
//                die;
                break;

            case 'add_more_checkbox_contents':
//
                $datamuskan = $_POST;

//                echo '<pre>';
//                print_r($datamuskan);
//                die;

                $data['sheet_id'] = $_POST['sheet_id'];
                $data['user_id'] = $_SESSION['user_id'];
                $data['sheet_section_id'] = $_POST['sheet_section_id'];

//                echo '<pre>';
//                print_r($data);
//                die;
                if (($_POST['draft']) == '0') {
                    $data['is_submit'] = '0';
//----update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
                    $req_data = array('*');
                    $fil_dat[0]['id'] = 'sheet_id';
                    $fil_dat[0]['value'] = $data['sheet_id'];
                    $fil_dat[1]['id'] = 'user_id';
                    $fil_dat[1]['value'] = $_SESSION['user_id'];

                    $sheet_user_data = $this->main_model->get_many_records("sheet_user", $fil_dat, $req_data);
                    $this->db->set('is_submit', '1');
                    $this->db->where('sheet_user_id', $sheet_user_data[0]['id']);
                    $this->db->where('section', $data['sheet_section_id']);
                    $query = $this->db->update('sheet_section');
//                    die("hellox");
//----end update the sheet_section table ,set is_submit=1 where sheet_user_id=.. & section=..
//                    $update_data['is_submit'] = '1';
//                    $update_data['section'] = $_POST['sheet_section_id'];
//                    $this->main_model->add_update_record('sheet_section', $update_data, 'section');
                } else {

                    $data['is_submit'] = '1';
                }

                unset($_POST['draft']);
                unset($_POST['sheet_id']);
                unset($_POST['sheet_section_id']);
                $this->db->where('sheet_id', $data['sheet_id']);
                $this->db->where('user_id', $_SESSION['user_id']);
                $this->db->delete($table);

                foreach ($_POST as $key => $value) {
//                echo '<pre>';
//                print_r($_POST);
//                die;
                    foreach ($value as $key_data => $insert_data) {

//                echo '<pre>';
//                print_r($insert_data);
//                die;
                        $insert['sheet_id'] = $data['sheet_id'];
                        $insert['user_id'] = $_SESSION['user_id'];
                        $insert['sheet_section_id'] = $data['sheet_section_id'];
                        $insert['section_id'] = $insert_data['section_id']; //section_id here "add_more_checkbox_category_id" table ka id he,
                        $insert['skill_value'] = $insert_data['skill_value'];
                        if (isset($insert_data['skill_description'])) {
                            $insert['skill_description'] = $insert_data['skill_description'];
                        }
                        $insert['created_by'] = $_SESSION['user_id'];
                        $insert['created_date'] = date('Y-m-d H:i:s');
                        $insert['is_submit'] = $data['is_submit'];
//                      print_r($insert);die;
                        $return_id = $this->main_model->add_update_record($table, $insert);
//
                    }
                }
                unset($_POST);
                if ($data['is_submit'] == 0) {//FOR SUCCESFULLY SUBMIT-FINAL SUBMIT(click on Save Button)
                    $all_sec_submitted = $this->custom->is_all_section_submit($data['sheet_id']);

                    if ($all_sec_submitted == 1) {
//update sheet_user tabele, set is_submit=1 where user_id=... and sheet_id=...
                        $this->db->set('is_submit', '1');
                        $this->db->where('user_id', $_SESSION['user_id']);
                        $this->db->where('sheet_id', $data['sheet_id']);
                        $query = $this->db->update('sheet_user');
//---end
//                            $_SESSION['msg_str'] .= 'Thank you for submitting your responses. You can access your key data from the “Analytics” section';
//                            $_SESSION['msg_hdr'] = "Success !";
//                            header('Location: ' . base_url() . 'showsheet/');
//                            die;
                        die("go_to_analytics"); //on success ajax will redirect analytics page
                    } else {//after submit current section , next section will appear
//                        header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
//                        die;
                        die("next_section"); //on success ajax will redirect next section
                    }
                } else {//FOR SAVE AS DRAFT
//                        $_SESSION['msg_str'] .= 'Your Previous data are saved.please complete it and save now';
//                        $_SESSION['msg_hdr'] = "Incomplete !";
//                       header('Location: ' . base_url() . 'sheets/sheets/' . $data['sheet_id']);
//                       die;
                    die("draft_saved"); //on success ajax will redirect same section
                }
//                echo '<pre>';
//                print_r($_POST);
//                die;
                break;
        }
    }

    public function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['section_id'] == $id) {
                return $key;
            }
        }
//        $not_index = 'value_not_found';
        return null;
    }

    public function testing_view($sheet_section_id = '') {
        $req = array('*');
        $filter[0]['id'] = 'sheet_section_id';
        $filter[0]['value'] = $sheet_section_id;
        $data['added_data'] = $this->main_model->get_many_records('save_data_for_add_more_type', $filter, $req, '');
        $added_data = $this->main_model->get_many_records('save_data_for_add_more_type', $filter, $req, '');
//        value_for_add_more_type
        $header_value = $this->main_model->get_records('value_for_add_more_type', 'template_instruction_id', '2')->result_array();
        $final_data = array();

        $data1 = $added_data;

        while (count($added_data) >= 1) {

            foreach ($header_value as $rec) {
                $index = $this->searchForId($rec['id'], $added_data);
//                if ($index != null) {
                echo "+" . $index . "+";
                $final_data[] = $added_data[$index]['key_values'];
                unset($added_data[$index]);
//                } else {
//                    $final_data[] = '';
//                }
            }
//            echo '<pre>';
//            print_r($final_data);
//            var_dump($added_data);
//            die;
//            echo $index;
//            die;
        }
//        echo '<pre>';
//        print_r($header_value);
//        print_r($final_data);
//        die;
        $this->load->view('view_submitted_data_add_more', $data);
    }

    public function manage_sheet_values($template_instruction_id = 0, $section_type_id = 0) { //============= call all view by section ==========
        switch ($section_type_id) {
            case 1:
                $query['data'] = $this->main_model->get_records('values_for_checkbox_with_tooltip', "template_instruction_id", $template_instruction_id, "")->result_array();
                $query['template_instruction_id'] = $template_instruction_id;
                $query['section_type_id'] = $section_type_id;
                $this->load->view('manage-values_for_checkbox_with_tooltip', $query);
                break;
            case 2:
                $query['data'] = $this->main_model->get_records('value_for_add_more_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                $query['template_instruction_id'] = $template_instruction_id;
                $query['section_type_id'] = $section_type_id;
//                echo '<pre>';
//                print_r($query);die;
                $this->load->view('manage-value_for_add_more_type', $query);
                break;
            case 3:
                $query['data'] = $this->main_model->get_records('checkbox_with_no_tooltip', "template_instruction_id", $template_instruction_id, "")->result_array();
                $query['template_instruction_id'] = $template_instruction_id;
                $query['section_type_id'] = $section_type_id;
                $this->load->view('manage-checkbox_with_no_tooltip', $query);
                break;
            case 4:
                $query['data'] = $this->main_model->get_records('tickmark_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                $query['template_instruction_id'] = $template_instruction_id;
                $query['section_type_id'] = $section_type_id;
                $this->load->view('manage-tickmark_type', $query);
                break;
            case 5:
                $query['data'] = $this->main_model->get_records('listing_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                $query['template_instruction_id'] = $template_instruction_id;
                $query['section_type_id'] = $section_type_id;
                $this->load->view('manage-listing_type', $query);
                break;
            case 6:
                $query['data'] = $this->main_model->get_records('descriptive_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                $query['template_instruction_id'] = $template_instruction_id;
                $query['section_type_id'] = $section_type_id;
                $this->load->view('manage-descriptive_type', $query);
                break;
            case 8: //Range Type --Manage Page
                $query['data'] = $this->main_model->get_records('range_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                $query['template_instruction_id'] = $template_instruction_id;
                $query['section_type_id'] = $section_type_id;
                $this->load->view('manage-range_type', $query);
                break;
            case 7: //Marking  Type --Manage Page 16/8/17
                $query['data'] = $this->main_model->get_records('marking_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                $query['template_instruction_id'] = $template_instruction_id;
                $query['section_type_id'] = $section_type_id;
                $this->load->view('manage-marking_type', $query);
                break;


            case 9: //advance tickmark  Type --Manage Page 05/10/17-musarrat
                $req = array('*');
                $fil[0]['id'] = 'template_instruction_id';
                $fil[0]['value'] = $template_instruction_id;
                $data['data'] = $this->main_model->get_many_records('tickmark_adv_content', $fil, $req, '');
                $data['template_instruction_id'] = $template_instruction_id;
//                    echo '<pre>';
//                    print_r($data);die;
                $this->load->view('manage-tickmark_adv_content', $data);
                break;

            case 10: // dropdown_with_multi_addmore  Type --Manage Page 29/11/17-musarrat
                $req = array('*');
                $fil[0]['id'] = 'template_instruction_id';
                $fil[0]['value'] = $template_instruction_id;
                $data['data'] = $this->main_model->get_many_records('dropdown_with_multi_addmore', $fil, $req, '');
                $data['template_instruction_id'] = $template_instruction_id;
//                    echo '<pre>';
//                    print_r($data);die;
                $this->load->view('manage-dropdown_with_multi_addmore', $data);
                break;

            case 11: // add_more_checkbox_category  Type --Manage Page 05/12/17-musarrat
                $req = array('*');
                $fil[0]['id'] = 'template_instruction_id';
                $fil[0]['value'] = $template_instruction_id;
                $data['data'] = $this->main_model->get_many_records('add_more_checkbox_category', $fil, $req, '');
                $data['template_instruction_id'] = $template_instruction_id;
//                    echo '<pre>';
//                    print_r($data);die;
                $this->load->view('manage-add_more_checkbox_category', $data);
                break;
        }
    }

    public function sheets($sheets = '', $id = '', $action = '') { //$id=action sheet ka id
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        // echo "<pre>";
        // print_r($id);
        // die;
        // $data = $this->main_model->selectSingleData('node','*',array('id' => $id));
        // echo "<pre>";
        // print_r($data);die;
        //$this->main_model->delete_data($id,$_SESSION['user_id']);
        
        $data['sheet_id'] = $id;
//--for left view---
        $data['nav_type'] = 'sheets';
        $data['id'] = $this->main_model->get_name_from_id('sheets', 'node', $data['sheet_id']); //node_id
        $parent_node = $this->main_model->get_name_from_id('node', 'parent_id', $data['id'], 'id'); //parent_node_id
//end--for left view---
        $submit = $this->custom->is_sheet_submited($id);
        // echo '<pre>';
        // print_r($submit);die;
        if (!empty($submit)) {
            //echo "ddd";die;
//==================== get all section ids of selected sheet ==============
            $req_data = array('*');
            $fil_data[0]['id'] = 'sheet_id';
            $fil_data[0]['value'] = $id;
            $template_instruction_data = $this->main_model->get_many_records("template_instruction", $fil_data, $req_data, 'sort_order ');
            // 	echo $this->db->last_query();
	           // echo '<pre>';
	           // print_r($template_instruction_data);die;
	           
	           $req_data1 = array('*');
                $fil_dat1[0]['id'] = 'sheet_id';
                $fil_dat1[0]['value'] = $id;
                $fil_dat1[1]['id'] = 'user_id';
                $fil_dat1[1]['value'] = $_SESSION['user_id'];
                $sheet_user_data1 = $this->main_model->get_many_records("sheet_user", $fil_dat1, $req_data1, '');
                $this->db->set('is_submit', '0');
                $this->db->where('sheet_user_id', $sheet_user_data1[0]['id']);
                $this->db->where('section', $template_instruction_data[0][id]);
                $query = $this->db->update('sheet_section');
                
            foreach ($template_instruction_data as $value) {
                $req = array('is_submit');
                $filters[0]['id'] = 'sheet_user_id';
                $filters[0]['value'] = $submit[0]['id'];
                $filters[1]['id'] = 'section';
                $filters[1]['value'] = $value['id']; //template_instruction_id;
                $sheet_section_data = $this->main_model->get_many_records("sheet_section", $filters, $req, '');
                // echo $this->db->last_query();die;
//====================== find active sheet =====================
                $active_sheet = '';

                if ($sheet_section_data[0]['is_submit'] == 0) {
//                    $active_sheet = $value['section_type'];
                    $active_sheet = $value['id']; //template_instruction_id;
                    break;
                }
            }
                // echo '<pre>';
                // print_r($active_sheet);die;
//
            if (empty($active_sheet)) {
                $_SESSION['msg_str'] = 'You have already submitted the action sheet';
                $_SESSION['msg_hdr'] = 'Information !';
                header('Location: ' . base_url() . "node/program/" . $parent_node);
                die;
            }


            $section_type = $this->main_model->get_name_from_id('template_instruction', 'section_type', $active_sheet);
            // echo $this->db->last_query();
            // echo '<pre>';
            // print_r($section_type);
            // die;
            switch ($section_type) {

                case 1://=======================================For --checkbox type with tooltip--(Section Type)
                    $req = array('category');
                    $f[0]['id'] = 'template_instruction_id';
                    $f[0]['value'] = $active_sheet;
                    $data['category_id'] = $this->main_model->get_records_group_by('values_for_checkbox_with_tooltip', $f, 'category', $req, 'category');
                    foreach ($data['category_id'] as $key => $cat) {
                        $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
                    }
                    $req = array('name, max');
                    $filter1[0]['id'] = 'id';
                    $filter1[0]['value'] = $id;
                    $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);

                    $i = 0;
                    foreach ($data['category_id'] as $key => $category) {
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $filter[1]['id'] = 'category';
                        $filter[1]['value'] = $category['category'];
                        $data['data'][$category['category']] = $this->main_model->get_many_records("values_for_checkbox_with_tooltip", $filter, '', '');
                        //echo $this->db->last_query();die;
                    }
                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('action_sheets', $fil, array('*'), '');
                    //echo $this->db->last_query();die;
                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
                        // echo '<pre>';
                        // print_r($data);die;
                        $this->load->view($action . 'draft_checkbox_with_description_view', $data);
                    }
//----end check for add or edit UI call--
                    else { // Normally add UI Call
                        $this->load->view($action . 'checkbox_with_description_view', $data);
                    }

                    break;
                case 2://==========================================For --add more type-- (section-type)
                    $data['sheet_id'] = $id;
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $filters_d[0]['id'] = 'template_instruction_id';
                    $filters_d[0]['value'] = $active_sheet;
                    $data['add_more_type_details'] = $this->main_model->get_many_records("value_for_add_more_type", $filters_d, '', '');
                    $data['sheet_section_id'] = $active_sheet;
//                    echo '<pre>';
//                    print_r($data1);die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->get_many_records('save_data_for_add_more_type', $fil, array('*'), '');
                    if (!empty($draft_data)) { //     draft/edit UI call
                        $data['draft_data'] = $draft_data;
                    }
//----end check for add or edit UI call--
//                    echo '<pre>';
//                    print_r($data);die;
                    $this->load->view($action . 'add_more_type_test', $data);
                    break;
                case 3://=======================================For --checkbox with NO tooltip--
                    $req = array('category');
                    $f[0]['id'] = 'template_instruction_id';
                    $f[0]['value'] = $active_sheet;
                    $data['category_id'] = $this->main_model->get_records_group_by('checkbox_with_no_tooltip', $f, 'category', $req, 'category');
                    // if($_SESSION['user_id'] == 1){
                    //     echo $this->db->last_query();die;
                    // }
                    foreach ($data['category_id'] as $key => $cat) {
                        $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
                    }
                    $req = array('name, max_value');
                    $filter1[0]['id'] = 'id';
                    $filter1[0]['value'] = $id;
                    $details = $this->main_model->get_many_records('sheets', $filter1, $req, '');
                    // if($_SESSION['user_id'] == 1){
                    //     echo $this->db->last_query();die;
                    // }
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    // if($_SESSION['user_id'] == 1){
                    //     echo $this->db->last_query();die;
                    // }
                    $i = 0;
                    foreach ($data['category_id'] as $key => $category) {
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $filter[1]['id'] = 'category';
                        $filter[1]['value'] = $category['category'];
                        $data['data'][$category['category']] = $this->main_model->get_many_records("checkbox_with_no_tooltip", $filter, '', '');
                    }
                    $data['sheet_max'] = $details[0]['max_value'];
                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_checkbox_with_no_tooltip', $fil, array('*'), '');
                    // if($_SESSION['user_id'] == 1){
                    //     echo $this->db->last_query();die;
                    // }
                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
                        // if($_SESSION['user_id'] == 1){
                        //     echo "<pre>";
                        //     print_r($data);
                        //     die;
                        // }
                        $this->load->view($action . 'draft_checkbox_with_no_tooltip', $data);
                    }
//----end check for add or edit UI call--
                    else {
                        $this->load->view($action . 'checkbox_with_no_tooltip', $data);
                    }
                    break;
                case 4://=======================================For -TICK MARK-- (section type)


                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);


                    $req = array('category');
                    $filter[0]['id'] = 'template_instruction_id';
                    $filter[0]['value'] = $active_sheet;
                    $data['question_data'] = $this->main_model->get_many_records("tickmark_type", $filter, '', '');


                    $getFilter[0]['id'] = 'template_instruction_id';
                    $getFilter[0]['value'] = $active_sheet;
                    $data['headerName'] = $this->main_model->get_many_records("tickmark_type_header", $getFilter, '', '');


                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->get_many_records('save_data_tickmark_type', $fil, array('*'), '');
                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
//                        echo '<pre>';
//                        print_r($data);die;
                        $this->load->view($action . 'draft_tickmark_type_view', $data);
                    }
//----end check for add or edit UI call--
                    else {
                        $this->load->view($action . 'tickmark_type_view', $data);
                    }
                    break;
                case 5://=======================================For -Listing Type-- (section type)
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $filterd[0]['id'] = 'template_instruction_id';
                    $filterd[0]['value'] = $active_sheet;
                    $data['listing_type_data'] = $this->main_model->get_many_records("listing_type", $filterd, '', '');
                    //echo $this->db->last_query();die;
                    $data['sheet_section_id'] = $active_sheet;
//                    echo '<pre>';
//                    print_r($data1);die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_listing_type', $fil, array('*'), '');
                    // echo $this->db->last_query();die;
                    if (!empty($draft_data)) { //     draft/edit UI call
                        // echo '<pre>';
                        // print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
                        // echo '<pre>';
                        // print_r($data);die;
                        $this->load->view($action . 'draft_listing_type', $data);
                    }
//----end check for add or edit UI call--
                    else {
                        // echo "<pre>";
                        // print_r($data);die;
                        $this->load->view($action . 'listing_type', $data);
                    }
                    break;
                case 6://=======================================For -Descriptive Type-- (section type)
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $filterd[0]['id'] = 'template_instruction_id';
                    $filterd[0]['value'] = $active_sheet;
                    $data['listing_type_data'] = $this->main_model->get_many_records("descriptive_type", $filterd, '', '');
                    $data['sheet_section_id'] = $active_sheet;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_descriptive_type', $fil, array('*'), '');
                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
                        // echo '<pre>';
                        // print_r($data);die;
                        $this->load->view($action . 'draft_descriptive_type_view', $data);
                    }
//----end check for add or edit UI call--
                    else {
                        $this->load->view('descriptive_type_view', $data);
                    }
                    break;

                case 8://=======================================For -Range Type-- (section type)
                    $req = array('category');
                    $f[0]['id'] = 'template_instruction_id';
                    $f[0]['value'] = $active_sheet;
                    $data['category_id'] = $this->main_model->get_records_group_by('range_type', $f, 'category', $req, 'category');
                    foreach ($data['category_id'] as $key => $cat) {
                        $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
                    }
                    $req = array('name, max');
                    $filter1[0]['id'] = 'id';
                    $filter1[0]['value'] = $id;
                    $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);

                    $i = 0;
                    foreach ($data['category_id'] as $key => $category) {
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $filter[1]['id'] = 'category';
                        $filter[1]['value'] = $category['category'];
                        $data['data'][$category['category']] = $this->main_model->get_many_records("range_type", $filter, '', '');
                    }
                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';

//                    echo '<pre>';
//                    print_r($data);die;
//
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_range_type', $fil, array('*'), '');
                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
                        // echo '<pre>';
                        // print_r($data);die;
                        $this->load->view($action . 'draft_range_type_sheet', $data);
                    }
//----end check for add or edit UI call--
                    else {
//                         echo '<pre>';
//                    print_r($data);die;
                        $this->load->view('range_type_sheet', $data);
                    }
                    break;


                case 7://=======================================For -Marking Type-- (section type)
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);


                    $req = array('category');
                    $filter[0]['id'] = 'template_instruction_id';
                    $filter[0]['value'] = $active_sheet;
                    $data['question_data'] = $this->main_model->get_many_records("marking_type", $filter, '', '');


                    $getFilter[0]['id'] = 'template_instruction_id';
                    $getFilter[0]['value'] = $active_sheet;
                    $data['headerName'] = $this->main_model->get_many_records("marking_type_header", $getFilter, '', '');


                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[2]['id'] = 'user_id';
                    $fil[2]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_marking_type', $fil, array('*'), '');
                    // echo $this->db->last_query();die;
                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
                        // echo '<pre>';
                        // print_r($data);die;
                        $this->load->view($action . 'draft_marking_type_sheet', $data);
                    }
//----end check for add or edit UI call--
                    else {
                        // echo "<pre>";
                        // print_r($data);die;
                        $this->load->view('marking_type_sheet', $data);
                    }
                    break;

                case 9://Tickmark Advance Type Sheet [09-10-17---Musarrat]
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $data['sheet_section_id'] = $active_sheet;

                    $req = array('*');
                    $filter[0]['id'] = 'template_instruction_id';
                    $filter[0]['value'] = $active_sheet;
                    $data['question_data'] = $this->main_model->get_many_records("tickmark_adv_content", $filter, '', '');
//
//
                    $getFilter[0]['id'] = 'template_instruction_id';
                    $getFilter[0]['value'] = $active_sheet;
                    $data['headerName'] = $this->main_model->get_many_records("tickmark_adv_header", $getFilter, '', '');
                    //echo $this->db->last_query();die;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_adv_tickmark', $fil, array('*'), '');
//                    echo '<pre>';
//                        print_r($data);die;
                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
                        // echo '<pre>';
                        // print_r($data);
                        // die;
                        $this->load->view($action . 'draft_sheet_tickmark_adv', $data);
                    }
//----end check for add or edit UI call--
                    else {
                        $this->load->view($action . 'sheet_tickmark_adv', $data);
                    }
                    break;

                case 10://=======================================For --dropdown with multiple addmore--
                    $req = array('category');
                    $f[0]['id'] = 'template_instruction_id';
                    $f[0]['value'] = $active_sheet;
                    $data['category_id'] = $this->main_model->get_records_group_by('dropdown_with_multi_addmore', $f, '', $req, '');
//                    foreach ($data['category_id'] as $key => $cat) {
//                        $data[$cat['category']] = $this->main_model->get_name_from_id('dropdown_with_multi_addmore', '', $cat['category']);
//                    }
                    $req = array('*');
                    $filter1[0]['id'] = 'id';
                    $filter1[0]['value'] = $id;
                    $details = $this->main_model->get_many_records('sheets', $filter1, $req, '');
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);

                    $i = 0;
                    foreach ($data['category_id'] as $key => $category) {
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $filter[1]['id'] = 'category';
                        $filter[1]['value'] = $category['category'];
                        $data['data'][$category['category']] = $this->main_model->get_many_records("dropdown_with_multi_addmore", $filter, '', '');
                    }
                    $data['sheet_max'] = $details[0]['max_value'];
                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_dropdown_with_multi_addmore', $fil, array('*'), '');
                    $data['cat_label'] = $this->main_model->get_name_from_id("sheets", "cat_label", $id, "id");
                    $data['button_label'] = $this->main_model->get_name_from_id("sheets", "button_label", $id, "id");
                    $data['act_label'] = $this->main_model->get_name_from_id("sheets", "act_label", $id, "id");
                    $data['checkbox'] = $this->main_model->get_name_from_id("template_instruction", "checkbox", $active_sheet, "id");
                    if (!empty($draft_data)) { //     draft/edit UI call
//-----GROUPING OF ARRAY BY CATEGORY NAME WISE
                        $my_array = json_decode(json_encode($draft_data), True);
                        $arr['list'] = array();
                        foreach ($my_array as $key => $item) {
                            $arr['list'][$item['multi_addmore_category_id']][$key] = $item;
                        }
                        ksort($arr['list']);
//-----end GROUPING OF ARRAY BY CATEGORY NAME WISE
                        $data['draft_data'] = $arr['list'];
                        // echo '<pre>';
                        // print_r($data);
                        // die;
                        $this->load->view($action . 'draft_sheet_dropdown_with_multi_addmore', $data);
                    }
//----end check for add or edit UI call--
                    else {
//                        echo '<pre>';
//                        print_r($data);
//                        die;
//                        $this->load->view($action . 'dew', $data);
                        $this->load->view($action . 'sheet_dropdown_with_multi_addmore', $data);
                    }
                    break;

                case 11://==========================================For --add more checkbox category-- (section-type)

                    $data['sheet_id'] = $id;
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $filters_d[0]['id'] = 'template_instruction_id';
                    $filters_d[0]['value'] = $active_sheet;
                    $data['add_more_type_details'] = $this->main_model->get_many_records("add_more_checkbox_category", $filters_d, '', '');
                    $data['sheet_section_id'] = $active_sheet;

//                    echo '<pre>';
//                    print_r($data);die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->get_many_records('add_more_checkbox_contents', $fil, array('*'), 'id');

                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;

                        foreach ($data['draft_data'] as $key => $category) {
                            $req = array('*');
                            $filter[0]['id'] = 'sheet_section_id';
                            $filter[0]['value'] = $active_sheet;
                            $filter[1]['id'] = 'section_id';
                            $filter[1]['value'] = $category['section_id'];
                            $data['cat_group'][$category['section_id']] = $this->main_model->get_many_records("add_more_checkbox_contents", $filter, $req, 'id');
                        }
//                        echo '<pre>';
//                        print_r($data);die;
                        $this->load->view($action . 'draft_sheet_addmore_checkbox_content', $data);
                    }
//----end check for add or edit UI call--
                    else {
//                         echo '<pre>';
//                        print_r($data);die;
                        $this->load->view($action . 'sheet_addmore_checkbox_content', $data);
                    }
                    break;
                    case 12:
                        $data['sheet_id'] = $id;
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                        $data['template_instruction_id'] = $this->main_model->get_name_from_id('template_instruction', 'id', $active_sheet);
                        $filters_d[0]['id'] = 'template_instruction_id';
                        $filters_d[0]['value'] = $active_sheet;
                        $filters_d[1]['id'] = 'user_id';
                        $filters_d[1]['value'] = $_SESSION['user_id'];
                        $data['cover_letter'] = $this->main_model->get_many_records("cover_letter", $filters_d, '', '');
                        $data['sheet_section_id'] = $active_sheet;
                        // echo $this->db->last_query();die;
                        // echo "<pre>";
                        // print_r($data);die;
                        $this->load->view('cover_letter',$data);
                    break;

                default :
                    die("no action sheet is prepared");
                    break;
            }
        } else {
            $insert['sheet_id'] = $id;
            $insert['user_id'] = $_SESSION['user_id'];
            $insert['is_submit'] = '0';
            $insert['created_by'] = $_SESSION['user_id'];
            $insert['created_date'] = date('Y-m-d H:i:s');
            $return_id = $this->main_model->add_update_record('sheet_user', $insert);
            $req_item = array('*');
            $fil[0]['id'] = 'sheet_id';
            $fil[0]['value'] = $id;
            $template_details = $this->main_model->get_many_records('template_instruction', $fil, $req_item, '');
            foreach ($template_details as $temp_value) {
                $new_data['section'] = $temp_value['id']; //ie template_instruction_id
                $new_data['sheet_user_id'] = $return_id;
                $new_data['is_submit'] = '0';
                $new_data['created_by'] = $_SESSION['user_id'];
                $new_data['created_date'] = date('Y-m-d H:i:s');
                $return_section_id = $this->main_model->add_update_record('sheet_section', $new_data);
            }
//header('Location: ' . base_url().'sheets/sheets'.$id);
            $this->sheets('sheets', $id);
            /*
              $req = array('category');
              $f[0]['id'] = 'template_instruction_id';
              $f[0]['value'] = $temp_value['id'];
              $data['category_id'] = $this->main_model->get_records_group_by('values_for_checkbox_with_tooltip', $f, 'category', $req, 'category');
              foreach ($data['category_id'] as $key => $cat) {
              $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
              }
              $req = array('name, max');
              $filter1[0]['id'] = 'id';
              $filter1[0]['value'] = $id;
              $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
              $data['instruction'] = $temp_value['instruction_text'];

              $i = 0;
              foreach ($data['category_id'] as $key => $category) {
              $req = array('category');
              $filter[0]['id'] = 'template_instruction_id';
              $filter[0]['value'] = $temp_value['id'];
              $filter[1]['id'] = 'category';
              $filter[1]['value'] = $category['category'];
              $data['data'][$category['category']] = $this->main_model->get_many_records("values_for_checkbox_with_tooltip", $filter, '', '');
              }
              $data['submit'] = '';
              //            echo '<pre>';
              //            print_r($data);die;
              $this->load->view($action . 'checkbox_with_description_view', $data); */
        }
    }
    
    public function sheets_pdf($sheets = '', $id = '', $action = '') { //$id=action sheet ka id
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        
        // echo "<pre>";
        // print_r($id);
        // die;
        
        $data['sheet_id'] = $id;
        //--for left view---
        $data['nav_type'] = 'sheets';
        $data['id'] = $this->main_model->get_name_from_id('sheets', 'node', $data['sheet_id']); //node_id
        $parent_node = $this->main_model->get_name_from_id('node', 'parent_id', $data['id'], 'id'); //parent_node_id
//end--for left view---
        $submit = $this->custom->is_sheet_submited($id);
        // echo '<pre>';
        // print_r($submit);die;
        if (!empty($submit)) {
            //echo "ddd";die;
//==================== get all section ids of selected sheet ==============
            $req_data = array('*');
            $fil_data[0]['id'] = 'sheet_id';
            $fil_data[0]['value'] = $id;
            $template_instruction_data = $this->main_model->get_many_records("template_instruction", $fil_data, $req_data, 'sort_order ');
            // 	echo $this->db->last_query();
	           // echo '<pre>';
	           // print_r($template_instruction_data);die;
            foreach ($template_instruction_data as $value) {
                $req = array('is_submit');
                $filters[0]['id'] = 'sheet_user_id';
                $filters[0]['value'] = $submit[0]['id'];
                $filters[1]['id'] = 'section';
                $filters[1]['value'] = $value['id']; //template_instruction_id;
                $sheet_section_data = $this->main_model->get_many_records("sheet_section", $filters, $req, '');
               //echo $this->db->last_query();die;
//====================== find active sheet =====================
                $active_sheet = $value['id'];

//                 if ($sheet_section_data[0]['is_submit'] == 0) {
// //                    $active_sheet = $value['section_type'];
//                     $active_sheet = $value['id']; //template_instruction_id;
//                     break;
//                 }
            }
//                 echo '<pre>';
//                 print_r($active_sheet);die;
// //
            // if (empty($active_sheet)) {
            //     $_SESSION['msg_str'] = 'You have already submitted the action sheet';
            //     $_SESSION['msg_hdr'] = 'Information !';
            //     header('Location: ' . base_url() . "node/program/" . $parent_node);
            //     die;
            // }


            $section_type = $this->main_model->get_name_from_id('template_instruction', 'section_type', $active_sheet);
            // echo $this->db->last_query();
            // echo '<pre>';
            // print_r($section_type);
            // die;
            $this->load->library('Pdf');
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Action Sheets');
            $pdf->setFooterMargin(10);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(true);
            $pdf->startPageGroup();
            $pdf->AddPage();
            switch ($section_type) {
                
                case 1://=======================================For --checkbox type with tooltip--(Section Type)
                    $req = array('category');
                    $f[0]['id'] = 'template_instruction_id';
                    $f[0]['value'] = $active_sheet;
                    $data['category_id'] = $this->main_model->get_records_group_by('values_for_checkbox_with_tooltip', $f, 'category', $req, 'category');
                    foreach ($data['category_id'] as $key => $cat) {
                        $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
                    }
                    $req = array('name, max');
                    $filter1[0]['id'] = 'id';
                    $filter1[0]['value'] = $id;
                    $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);

                    $i = 0;
                    foreach ($data['category_id'] as $key => $category) {
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $filter[1]['id'] = 'category';
                        $filter[1]['value'] = $category['category'];
                        $data['data'][$category['category']] = $this->main_model->get_many_records("values_for_checkbox_with_tooltip", $filter, '', '');
                    }
                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->values_for_checkbox_with_tooltip($active_sheet,$id,$_SESSION['user_id']);
                    
                    $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                    if (!empty($draft_data)) { //     draft/edit UI call
                    
                        $data['draft_data'] = $draft_data;
                        // echo '<pre>';
                        // print_r($data);die;
                        
                         //  heading image
                        //  $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr>
                        //         <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                        //         </td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            // end of heading image
                            // pdf header
                            
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="line-height:2.0;">
                        //         <td align="center" valign="middle" style="background-color:#ff9900;color:white;font-size:13px;"><p>'.ucwords($data['pdf_data_from_sheets'][0]->pdf_header).'</p></td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of pdf header
                            
                            
                            // if(!empty($data['pdf_data_from_sheets'][0]->pdf_image)){
                            //     // pdf image
                            //     $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr style="width:100%;height:200px;line-height:2.0;">
                            //         <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" alt="img">
                            //         </td>
                            //     </tr></table>';
                            //     $pdf->writeHTML($html, true, false, true, false, '');
                            //     // end of pdf image
                            // }
                            
                            
                            // pdf title & description
                        
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Title:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_title.'</td>
                        //     </tr>
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Description:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_description.'</td>
                        //     </tr>
                        //     </table><br>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of title & description
                            
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited </td>
                                    </tr>
                                    <tr style="line-height:0.5;">
                                        <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                    </tr>
                                    <tr style="line-height:1.5;">
                                        <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                    </tr>
                                    <tr style="width:100%;height:200px;line-height:2.0;">
                                        <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr style="line-height:3.0;">
                                        <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                    </tr>
                                    </table><br>';
                        $pdf->writeHTML($html, true, false, true, false, '');
                            
                        foreach($data['draft_data'] as $dkey => $dvalue){
                            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr style="line-height:2.6;">
                                    <td valign="middle" style="font-size:10px;color:#26897a;">'.$dvalue->name.'</td>
                                </tr>
                                <tr>
                                    <td valign="middle" style="font-size:10px;text-align:justify;">'.$dvalue->reason.'<br></td>
                                </tr>
                            </table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                        }
                        
                        
                        
                        $pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                        
                    }
//----end check for add or edit UI call--
                    else { // Normally add UI Call
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" valign="middle"><h1>No Data Found!!</h1>
                                </td>
                            </tr></table>';
                        $pdf->writeHTML($html, true, false, true, false, '');
                            
                        $pdf->Output('Action_sheets_Blank.pdf', 'D');
                    
                    }

                    break;
                case 2:
                    //==========================================For --add more type-- (section-type) ================================ //
                    $data['sheet_id'] = $id;
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $filters_d[0]['id'] = 'template_instruction_id';
                    $filters_d[0]['value'] = $active_sheet;
                    $data['add_more_type_details'] = $this->main_model->get_many_records("value_for_add_more_type", $filters_d, '', '');
                    $data['sheet_section_id'] = $active_sheet;
                    //  echo '<pre>';
                    //  print_r($data1);die;
                    // check for add or edit UI call--//
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->get_many_records('save_data_for_add_more_type', $fil, array('*'), '');
                    if (!empty($draft_data)) { //     draft/edit UI call
                        $data['draft_data'] = $draft_data;
                    }
//----end check for add or edit UI call--
//                    echo '<pre>';
//                    print_r($data);die;
                    $this->load->view($action . 'add_more_type_test', $data);
                    break;
                case 3://=======================================For --checkbox with NO tooltip--
                    $req = array('category');
                    $f[0]['id'] = 'template_instruction_id';
                    $f[0]['value'] = $active_sheet;
                    $data['category_id'] = $this->main_model->get_records_group_by('checkbox_with_no_tooltip', $f, 'category', $req, 'category');
                    // if($_SESSION['user_id'] == 1){
                    //     echo $this->db->last_query();die;
                    // }
                    foreach ($data['category_id'] as $key => $cat) {
                        $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
                    }
                    $req = array('name, max_value');
                    $filter1[0]['id'] = 'id';
                    $filter1[0]['value'] = $id;
                    $details = $this->main_model->get_many_records('sheets', $filter1, $req, '');
                    // if($_SESSION['user_id'] == 1){
                    //     echo $this->db->last_query();die;
                    // }
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    // if($_SESSION['user_id'] == 1){
                    //     echo $this->db->last_query();die;
                    // }
                    $i = 0;
                    foreach ($data['category_id'] as $key => $category) {
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $filter[1]['id'] = 'category';
                        $filter[1]['value'] = $category['category'];
                        $data['data'][$category['category']] = $this->main_model->get_many_records("checkbox_with_no_tooltip", $filter, '', '');
                        //echo $this->db->last_query();die;
                    }
                    $data['sheet_max'] = $details[0]['max_value'];
                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->save_data_checkbox_with_no_tooltip_pdf($active_sheet,$id,$_SESSION['user_id']);
                    
                    $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                    // if($_SESSION['user_id'] == 1){
                    //     echo $this->db->last_query();die;
                    // }
                    if (!empty($draft_data)) { //     draft/edit UI call
                        // echo '<pre>';
                        // print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
                        
                        // echo "<pre>";
                        // print_r($data);die;
                        //  heading image
                        //  $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr>
                        //         <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                        //         </td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            // end of heading image
                            // pdf header
                            
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="line-height:2.0;">
                        //         <td align="center" valign="middle" style="background-color:#ff9900;color:white;font-size:13px;"><p>'.ucwords($data['pdf_data_from_sheets'][0]->pdf_header).'</p></td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of pdf header
                            
                            // if(!empty($data['pdf_data_from_sheets'][0]->pdf_image)){
                            //     // pdf image
                            //     $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr style="width:100%;height:200px;line-height:2.0;">
                            //         <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" alt="img">
                            //         </td>
                            //     </tr></table>';
                            //     $pdf->writeHTML($html, true, false, true, false, '');
                            //     // end of pdf image
                            // }
                            
                            // pdf title & description
                        
                        // $html ='<table width="100%" cellpadding="5" cellspacing="0" border="0">
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">Title:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_title.'</td>
                        //     </tr>
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">Description:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_description.'</td>
                        //     </tr>
                        //     </table><br>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of title & description
                            
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited </td>
                                    </tr>
                                    <tr style="line-height:0.5;">
                                        <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                    </tr>
                                    <tr style="line-height:1.5;">
                                        <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                    </tr>
                                    <tr style="width:100%;height:200px;line-height:2.0;">
                                        <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr style="line-height:3.0;">
                                        <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                    </tr>
                                    </table><br>';
                        $pdf->writeHTML($html, true, false, true, false, '');
                            
                        foreach($data['draft_data'] as $dkey => $dvalue){
                            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr style="line-height:2.6;">
                                    <td valign="middle" style="font-size:10px;color:#26897a;">'.$dvalue->name.'</td>
                                </tr>
                                <tr>
                                    <td valign="middle" style="font-size:10px;text-align:justify;">'.$dvalue->reason.'<br></td>
                                </tr>
                            </table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                        }
                        
                        
                        
                        $pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                    }
//----end check for add or edit UI call--
                    else {
                        
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" valign="middle"><h1>No Data Found!!</h1>
                                </td>
                            </tr></table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                            $pdf->Output('Action_sheets_Blank.pdf', 'D');
                    }
                    break;
                case 4://=======================================For -TICK MARK-- (section type)


                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);


                    $req = array('category');
                    $filter[0]['id'] = 'template_instruction_id';
                    $filter[0]['value'] = $active_sheet;
                    $data['question_data'] = $this->main_model->get_many_records("tickmark_type", $filter, '', '');


                    $getFilter[0]['id'] = 'template_instruction_id';
                    $getFilter[0]['value'] = $active_sheet;
                    $data['headerName'] = $this->main_model->get_many_records("tickmark_type_header", $getFilter, '', '');


                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->get_many_records('save_data_tickmark_type', $fil, array('*'), '');
                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
//                        echo '<pre>';
//                        print_r($data);die;
                        $this->load->view($action . 'draft_tickmark_type_view', $data);
                    }
//----end check for add or edit UI call--
                    else {
                        $this->load->view($action . 'tickmark_type_view', $data);
                    }
                    break;
                case 5://=======================================For -Listing Type-- (section type)
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $filterd[0]['id'] = 'template_instruction_id';
                    $filterd[0]['value'] = $active_sheet;
                    $data['listing_type_data'] = $this->main_model->get_many_records("listing_type", $filterd, '', '');
                    //echo $this->db->last_query();die;
                    $data['sheet_section_id'] = $active_sheet;
//                    echo '<pre>';
//                    print_r($data1);die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_listing_type', $fil, array('*'), '');
                    // echo $this->db->last_query();die;
                    if (!empty($draft_data)) { //     draft/edit UI call
                        // echo '<pre>';
                        // print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
                        // echo '<pre>';
                        // print_r($data);die;
                        $this->load->view($action . 'draft_listing_type', $data);
                    }
//----end check for add or edit UI call--
                    else {
                        // echo "<pre>";
                        // print_r($data);die;
                        $this->load->view($action . 'listing_type', $data);
                    }
                    break;
                case 6://=======================================For -Descriptive Type-- (section type)
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $filterd[0]['id'] = 'template_instruction_id';
                    $filterd[0]['value'] = $active_sheet;
                    $data['listing_type_data'] = $this->main_model->get_many_records("descriptive_type", $filterd, '', '');
                    $data['sheet_section_id'] = $active_sheet;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_descriptive_type', $fil, array('*'), '');
                    
                    $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                    if (!empty($draft_data)) { //     draft/edit UI call
                        $data['draft_data'] = $draft_data;
                        
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr>
                        //         <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                        //         </td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            // end of heading image
                            // pdf header
                            
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="line-height:2.0;">
                        //         <td align="center" valign="middle" style="background-color:#ff9900;color:white;font-size:13px;"><p>'.ucwords($data['pdf_data_from_sheets'][0]->pdf_header).'</p></td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of pdf header
                            
                            // if(!empty($data['pdf_data_from_sheets'][0]->pdf_image)){
                            //     // pdf image
                            //     $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr style="width:100%;height:200px;line-height:2.0;">
                            //         <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" alt="img">
                            //         </td>
                            //     </tr></table>';
                            //     $pdf->writeHTML($html, true, false, true, false, '');
                            //     // end of pdf image
                            // }
                            
                            // pdf title & description
                        
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Title:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_title.'</td>
                        //     </tr>
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Description:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_description.'</td>
                        //     </tr>
                        //     </table><br>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of title & description
                            
                            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited </td>
                                        </tr>
                                        <tr style="line-height:0.5;">
                                            <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                        </tr>
                                        <tr style="line-height:1.5;">
                                            <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                        </tr>
                                        <tr style="width:100%;height:200px;line-height:2.0;">
                                            <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr style="line-height:3.0;">
                                            <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                        </tr>
                                        </table><br>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                            //================================================================//
                               foreach ($data['listing_type_data'] as $value) {
                                    
                                    $html = '<p style="color:#4cae4c;font-size:14px;">'.$value["header_name"].'</p>';
                                    $filter[0]['id'] = 'descriptive_type_id';
                                    $filter[0]['value'] = $value['id'];
                                    $data1 = $this->main_model->get_many_records("descriptive_type_details", $filter, '', '');
                                    foreach ($data1 as $childData) {
                                        $ch = 0;
                                        $prev_content = '';
                                        foreach ($draft_data as $key_d => $val_draft) {
                                        if ($val_draft['description_details_id'] == $childData['id']) {
                                            $ch = 1;
                                            $prev_content = $val_draft['value'];
                                            break;
                                            }
                                        }
                                        
                                        $html .='<p style="font-size:10px;">'.$childData["answer_header_text"].'</p>';
                                        if ($ch) {
                                            $html .='<p style="font-size:10px;">'.$prev_content.'</p>';
                                        }
                                            
                                           
                                    }
                                    
                                    $pdf->writeHTML($html, true, false, true, false);
                                      
                                }
                            //===============================================================//
                            
                            $pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                        
                    }
//----end check for add or edit UI call--
                    else {
                       $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" valign="middle"><h1>No Data Found!!</h1>
                                </td>
                            </tr></table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                        $pdf->Output('Action_sheets_Blank.pdf', 'D');
                    }
                    break;

                case 8://=======================================For -Range Type-- (section type)
                    $req = array('category');
                    $f[0]['id'] = 'template_instruction_id';
                    $f[0]['value'] = $active_sheet;
                    $data['category_id'] = $this->main_model->get_records_group_by('range_type', $f, 'category', $req, 'category');
                    
                    foreach ($data['category_id'] as $key => $cat) {
                        $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
                    }
                    $req = array('name, max');
                    $filter1[0]['id'] = 'id';
                    $filter1[0]['value'] = $id;
                    $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);

                    $i = 0;
                    foreach ($data['category_id'] as $key => $category) {
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $filter[1]['id'] = 'category';
                        $filter[1]['value'] = $category['category'];
                        $data['data'][$category['category']] = $this->main_model->get_many_records("range_type", $filter, '', '');
                    }
                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';

//                    echo '<pre>';
//                    print_r($data);die;
//
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->get_many_records('save_data_range_type', $fil, array('*'), '');
                    
                    $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                    
                    $data['distinct_category_name'] = $this->main_model->wellness_category_name($active_sheet);
                    
                    $data['list_data'] = $this->main_model->wellness_data($active_sheet,$id,$_SESSION['user_id']);
                    
                    // echo "<pre>";
                    // print_r($data['list_data']);
                    // print_r($data['distinct_category_name']);
                    // die;
                    
                    if (!empty($draft_data)) { //     draft/edit UI call

                        $data['draft_data'] = $draft_data;
                        
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr>
                        //         <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                        //         </td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                        //     // end of heading image
                        //     // pdf header
                            
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="line-height:2.0;">
                        //         <td align="center" valign="middle" style="background-color:#ff9900;color:white;font-size:13px;"><p>'.ucwords($data['pdf_data_from_sheets'][0]->pdf_header).'</p></td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                        //     // end of pdf header
                            
                        //   if(!empty($data['pdf_data_from_sheets'][0]->pdf_image)){
                        //         // pdf image
                        //         $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //         <tr style="width:100%;height:200px;line-height:2.0;">
                        //             <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" alt="img">
                        //             </td>
                        //         </tr></table>';
                        //         $pdf->writeHTML($html, true, false, true, false, '');
                        //         // end of pdf image
                        //     }
                            
                        //     // pdf title & description
                        
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Title:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_title.'</td>
                        //     </tr>
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Description:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_description.'</td>
                        //     </tr>
                        //     </table><br>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                        
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited </td>
                                    </tr>
                                    <tr style="line-height:0.5;">
                                        <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                    </tr>
                                    <tr style="line-height:1.5;">
                                        <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                    </tr>
                                    <tr style="width:100%;height:200px;line-height:2.0;">
                                        <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr style="line-height:3.0;">
                                        <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                    </tr>
                                    </table><br>';
                        $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of title & description
                            
                            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td valign="middle">Test</td>
                                <td valign="middle">My Result</td>
                                <td valign="middle">Normal Range</td>
                            </tr>';
                            
                            foreach($data['distinct_category_name'] as $dkey => $dvalue){
                                
                                $html .= '<tr>';
                                $html .= '<td><strong>'.$dvalue->category_name.'</strong></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '</tr>';
                                
                             foreach($data['list_data'] as $lkey => $lvalue){
                                if($dvalue->category_name == $lvalue->category_name){
                                    $html .= '<tr>';
                                    $html .= '<td>&nbsp;&nbsp;'.$lvalue->name.'</td>';
                                    $html .= '<td>'.$lvalue->your_ans.'</td>';
                                    $html .= '<td>'.$lvalue->normal_range.'</td>';
                                    $html .= '</tr>'; 
                                }
                             }   
                                
                            }
                            $html .= '</table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                            $pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');

                      
                    }
                    else
                    {
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" valign="middle"><h1>No Data Found!!</h1>
                                </td>
                            </tr></table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                        $pdf->Output('Action_sheets_Blank.pdf', 'D');
                    }
                    break;


                case 7://=======================================For -Marking Type-- (section type)
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);


                    $req = array('category');
                    $filter[0]['id'] = 'template_instruction_id';
                    $filter[0]['value'] = $active_sheet;
                    $data['question_data'] = $this->main_model->get_many_records("marking_type", $filter, '', '');


                    $getFilter[0]['id'] = 'template_instruction_id';
                    $getFilter[0]['value'] = $active_sheet;
                    $data['headerName'] = $this->main_model->get_many_records("marking_type_header", $getFilter, '', '');


                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->get_many_records('save_data_marking_type', $fil, array('*'), '');
                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;
//                        echo '<pre>';
//                        print_r($data);die;
                        $this->load->view($action . 'draft_marking_type_sheet', $data);
                    }
//----end check for add or edit UI call--
                    else {
                        $this->load->view('marking_type_sheet', $data);
                    }
                    break;

                case 9://Tickmark Advance Type Sheet [09-10-17---Musarrat]
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $data['sheet_section_id'] = $active_sheet;

                    $req = array('*');
                    $filter[0]['id'] = 'template_instruction_id';
                    $filter[0]['value'] = $active_sheet;
                    $data['question_data'] = $this->main_model->get_many_records("tickmark_adv_content", $filter, '', '');
//
//
                    $getFilter[0]['id'] = 'template_instruction_id';
                    $getFilter[0]['value'] = $active_sheet;
                    $data['headerName'] = $this->main_model->get_many_records("tickmark_adv_header", $getFilter, '', '');

                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $fil[3]['id'] = 'user_id';
                    $fil[3]['value'] = $_SESSION['user_id'];
                    $draft_data = $this->main_model->get_many_records('save_data_adv_tickmark', $fil, array('*'), '');
                    
                    $data['save_data'] = $this->main_model->tickmark_adv_content($active_sheet,$id,$_SESSION['user_id']);
                    //echo $this->db->last_query();die;
                   
                   $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                   
                   $data['tickmark_adv_header'] = $this->main_model->select('tickmark_adv_header','*','id',array('template_instruction_id' => $active_sheet));
                    
                    if (!empty($draft_data)) { //     draft/edit UI call
                        
                        // echo '<pre>';
                        // print_r($data['save_data']);
                        // print_r($data['tickmark_adv_header']);
                        // print_r($data['pdf_data_from_sheets']);
                        // die;
                        
                        
                        
                        //  heading image
                        //  $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr>
                        //         <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                        //         </td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                        //     // end of heading image
                        //     // pdf header
                            
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="line-height:2.0;">
                        //         <td align="center" valign="middle" style="background-color:#ff9900;color:white;font-size:13px;"><p>'.ucwords($data['pdf_data_from_sheets'][0]->pdf_header).'</p></td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                        //     // end of pdf header
                            
                        //     if(!empty($data['pdf_data_from_sheets'][0]->pdf_image)){
                        //         // pdf image
                        //         $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //         <tr style="width:100%;height:200px;line-height:2.0;">
                        //             <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" alt="img">
                        //             </td>
                        //         </tr></table>';
                        //         $pdf->writeHTML($html, true, false, true, false, '');
                        //         // end of pdf image
                        //     }
                            
                        //     // pdf title & description
                        
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Title:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_title.'</td>
                        //     </tr>
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Description:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_description.'</td>
                        //     </tr>
                        //     </table><br>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                        
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited </td>
                                    </tr>
                                    <tr style="line-height:0.5;">
                                        <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                    </tr>
                                    <tr style="line-height:1.5;">
                                        <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                    </tr>
                                    <tr style="width:100%;height:200px;line-height:2.0;">
                                        <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr style="line-height:3.0;">
                                        <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                    </tr>
                                    </table><br>';
                        $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of title & description
                            
                            $html ='';
                            
                            foreach($data['tickmark_adv_header'] as $key => $value){
                                $html .= '<p style="color:#4cae4c;">'.$value->header_name.'</p>';
                                $i =1;
                                $j =1;
                                foreach($data['save_data'] as $skey => $svalue){
                                   //$html .= '<ol>';
                                   
                                   if($svalue->header1 == $value->header_name){
                                       
                                       if($svalue->tickmark_type_header == $value->header_name){
                                          $html .= '<p>'.$j.'. '.$svalue->content1.'</p>';
                                          $j++;
                                       }
                                  
                                   }elseif($svalue->header2 == $value->header_name){
                        
                                       if($svalue->tickmark_type_header == $value->header_name){
                                           $html .= '<p>'.$i.'. '.$svalue->content2.'</p>';
                                           $i++;
                                       }
                                    
                                   }
                                  // $html .= '</ol>';
                                  //$i++;
                                }
                            }
                            
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                        $pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                        
                    }
//----end check for add or edit UI call--
                    else {
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" valign="middle"><h1>No Data Found!!</h1>
                                </td>
                            </tr></table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                        $pdf->Output('Action_sheets_Blank.pdf', 'D');
                    }
                    break;

                case 10://=======================================For --dropdown with multiple addmore--
                    $req = array('category');
                    $f[0]['id'] = 'template_instruction_id';
                    $f[0]['value'] = $active_sheet;
                    $data['category_id'] = $this->main_model->get_records_group_by('dropdown_with_multi_addmore', $f, '', $req, '');
//                    foreach ($data['category_id'] as $key => $cat) {
//                        $data[$cat['category']] = $this->main_model->get_name_from_id('dropdown_with_multi_addmore', '', $cat['category']);
//                    }
                    $req = array('*');
                    $filter1[0]['id'] = 'id';
                    $filter1[0]['value'] = $id;
                    $details = $this->main_model->get_many_records('sheets', $filter1, $req, '');
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);

                    $i = 0;
                    foreach ($data['category_id'] as $key => $category) {
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $filter[1]['id'] = 'category';
                        $filter[1]['value'] = $category['category'];
                        $data['data'][$category['category']] = $this->main_model->get_many_records("dropdown_with_multi_addmore", $filter, '', '');
                    }
                    $data['sheet_max'] = $details[0]['max_value'];
                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
//                    echo '<pre>';
//                    print_r($data);
//                    die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->save_data_dropdown_with_multi_addmore($active_sheet,$id,$_SESSION['user_id']);
                    
                    // echo $this->db->last_query();die;
                    
                    // echo "<pre>";
                    // print_r($draft_data);die;
                    
                    $data['cat_label'] = $this->main_model->get_name_from_id("sheets", "cat_label", $id, "id");
                    $data['button_label'] = $this->main_model->get_name_from_id("sheets", "button_label", $id, "id");
                    $data['act_label'] = $this->main_model->get_name_from_id("sheets", "act_label", $id, "id");
                    $data['checkbox'] = $this->main_model->get_name_from_id("template_instruction", "checkbox", $active_sheet, "id");
                    
                    $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                    
                    // echo "<pre>";
                    // print_r($data['pdf_data_from_sheets']);die;
                    if (!empty($draft_data)) { //     draft/edit UI call
                    
                        //  heading image
                        //  $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr>
                        //         <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                        //         </td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                        //     // end of heading image
                        //     // pdf header
                            
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="line-height:2.0;">
                        //         <td align="center" valign="middle" style="background-color:#ff9900;color:white;font-size:13px;"><p>'.ucwords($data['pdf_data_from_sheets'][0]->pdf_header).'</p></td>
                        //     </tr></table>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                        //     // end of pdf header
                            
                        //     if(!empty($data['pdf_data_from_sheets'][0]->pdf_image)){
                        //         // pdf image
                        //         $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //         <tr style="width:100%;height:200px;line-height:2.0;">
                        //             <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" alt="img">
                        //             </td>
                        //         </tr></table>';
                        //         $pdf->writeHTML($html, true, false, true, false, '');
                        //         // end of pdf image
                        //     }
                            
                        //     // pdf title & description
                        
                        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Title:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_title.'</td>
                        //     </tr>
                        //     <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                        //         <td valign="middle">&nbsp;&nbsp;&nbsp;Description:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_description.'</td>
                        //     </tr>
                        //     </table><br>';
                        //     $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of title & description
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited </td>
                                    </tr>
                                    <tr style="line-height:0.5;">
                                        <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                    </tr>
                                    <tr style="line-height:1.5;">
                                        <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                    </tr>
                                    <tr style="width:100%;height:200px;line-height:2.0;">
                                        <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr style="line-height:3.0;">
                                        <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                    </tr>
                                    </table><br>';
                        $pdf->writeHTML($html, true, false, true, false, '');
                            
                            
                            foreach($draft_data as $dkey => $dvalue){
                            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr style="line-height:2.6;">
                                    <td valign="middle" style="font-size:10px;color:#26897a;">'.$dvalue->category.'</td>
                                </tr>
                                <tr>
                                    <td valign="middle" style="font-size:10px;text-align:justify;">'.$dvalue->statement.'<br></td>
                                </tr>
                                <tr>
                                    <td valign="middle" style="font-size:10px;text-align:justify;">'.$dvalue->action_values.'<br></td>
                                </tr>
                            </table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                        }
                            
                            $pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                    }
                    else {
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" valign="middle"><h1>No Data Found!!</h1>
                                </td>
                            </tr></table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                        $pdf->Output('Action_sheets_Blank.pdf', 'D');
                      
                    }
                    break;

                case 11://==========================================For --add more checkbox category-- (section-type)

                    $data['sheet_id'] = $id;
                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                    $filters_d[0]['id'] = 'template_instruction_id';
                    $filters_d[0]['value'] = $active_sheet;
                    $data['add_more_type_details'] = $this->main_model->get_many_records("add_more_checkbox_category", $filters_d, '', '');
                    $data['sheet_section_id'] = $active_sheet;

//                    echo '<pre>';
//                    print_r($data);die;
//----check for add or edit UI call--
                    $fil[0]['id'] = 'sheet_id';
                    $fil[0]['value'] = $id;
                    $fil[1]['id'] = 'sheet_section_id';
                    $fil[1]['value'] = $active_sheet;
                    $fil[2]['id'] = 'is_submit';
                    $fil[2]['value'] = '1';
                    $draft_data = $this->main_model->get_many_records('add_more_checkbox_contents', $fil, array('*'), 'id');

                    if (!empty($draft_data)) { //     draft/edit UI call
//                        echo '<pre>';
//                        print_r($draft_data);die;
                        $data['draft_data'] = $draft_data;

                        foreach ($data['draft_data'] as $key => $category) {
                            $req = array('*');
                            $filter[0]['id'] = 'sheet_section_id';
                            $filter[0]['value'] = $active_sheet;
                            $filter[1]['id'] = 'section_id';
                            $filter[1]['value'] = $category['section_id'];
                            $data['cat_group'][$category['section_id']] = $this->main_model->get_many_records("add_more_checkbox_contents", $filter, $req, 'id');
                        }
//                        echo '<pre>';
//                        print_r($data);die;
                        $this->load->view($action . 'draft_sheet_addmore_checkbox_content', $data);
                    }
//----end check for add or edit UI call--
                    else {
//                         echo '<pre>';
//                        print_r($data);die;
                        $this->load->view($action . 'sheet_addmore_checkbox_content', $data);
                    }
                    break;
                    case 12:
                        $data['sheet_id'] = $id;
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                        $data['template_instruction_id'] = $this->main_model->get_name_from_id('template_instruction', 'id', $active_sheet);
                        $filters_d[0]['id'] = 'template_instruction_id';
                        $filters_d[0]['value'] = $active_sheet;
                        $filters_d[1]['id'] = 'user_id';
                        $filters_d[1]['value'] = $_SESSION['user_id'];
                        $data['cover_letter'] = $this->main_model->get_many_records("cover_letter", $filters_d, '', '');
                        $data['sheet_section_id'] = $active_sheet;
                        // echo $this->db->last_query();die;
                        // echo "<pre>";
                        // print_r($data);die;
                        $this->load->view('cover_letter',$data);
                    break;

                default :
                    die("no action sheet is prepared");
                    break;
            }
        } else {
            $insert['sheet_id'] = $id;
            $insert['user_id'] = $_SESSION['user_id'];
            $insert['is_submit'] = '0';
            $insert['created_by'] = $_SESSION['user_id'];
            $insert['created_date'] = date('Y-m-d H:i:s');
            $return_id = $this->main_model->add_update_record('sheet_user', $insert);
            $req_item = array('*');
            $fil[0]['id'] = 'sheet_id';
            $fil[0]['value'] = $id;
            $template_details = $this->main_model->get_many_records('template_instruction', $fil, $req_item, '');
            foreach ($template_details as $temp_value) {
                $new_data['section'] = $temp_value['id']; //ie template_instruction_id
                $new_data['sheet_user_id'] = $return_id;
                $new_data['is_submit'] = '0';
                $new_data['created_by'] = $_SESSION['user_id'];
                $new_data['created_date'] = date('Y-m-d H:i:s');
                $return_section_id = $this->main_model->add_update_record('sheet_section', $new_data);
            }
//header('Location: ' . base_url().'sheets/sheets'.$id);
            $this->sheets('sheets', $id);
            /*
              $req = array('category');
              $f[0]['id'] = 'template_instruction_id';
              $f[0]['value'] = $temp_value['id'];
              $data['category_id'] = $this->main_model->get_records_group_by('values_for_checkbox_with_tooltip', $f, 'category', $req, 'category');
              foreach ($data['category_id'] as $key => $cat) {
              $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
              }
              $req = array('name, max');
              $filter1[0]['id'] = 'id';
              $filter1[0]['value'] = $id;
              $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
              $data['instruction'] = $temp_value['instruction_text'];

              $i = 0;
              foreach ($data['category_id'] as $key => $category) {
              $req = array('category');
              $filter[0]['id'] = 'template_instruction_id';
              $filter[0]['value'] = $temp_value['id'];
              $filter[1]['id'] = 'category';
              $filter[1]['value'] = $category['category'];
              $data['data'][$category['category']] = $this->main_model->get_many_records("values_for_checkbox_with_tooltip", $filter, '', '');
              }
              $data['submit'] = '';
              //            echo '<pre>';
              //            print_r($data);die;
              $this->load->view($action . 'checkbox_with_description_view', $data); */
        }
    }
    
    public function pdf_generation_action_sheet(){
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Summary Sheet for Higher Education');
        $pdf->setFooterMargin(10);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->startPageGroup();
        $pdf->AddPage();
        
       // $html = '';
        
        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                         <td style="text-align:right;"><img src="assets/img/homepage.png" style="height:1020px; width:720px;"/></td>
                     </tr>
                    <tr>
                        <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited 2</td>
                    </tr>
                    <tr style="line-height:0.5;">
                        <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'."Table of Contents".'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                    </tr>
                    </table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html = '<p style="font-size:17px !important;"><b>1. Introduction</b></p>
                 <p style="font-size:17px !important;"><b>2.  My Work Motivations Assessment</b></p>
                 <p style="font-size:17px !important;"><b>3.  My Key Values</b></p>
                 <p style="font-size:17px !important;"><b>4.  My Key Skills<b></p>
                 <p style="font-size:17px !important;"><b>5.  My Key Strengths</b></p>
                 <p style="font-size:17px !important;"><b>6.  My Attitude Assessment<b></p>
                 <p style="font-size:17px !important;"><b>7.  My Wellness Assessment</b></p>
                 <p style="font-size:17px !important;"><b>8.  My Etiquette Assessment</b></p>
                 <p style="font-size:17px !important;"><b>9.  My Hobbies Assessment</b></p>
                 <p style="font-size:17px !important;"><b>10. My Areas of Improvement</b></p>
                 <p style="font-size:17px !important;"><b>11. My Personal SWOT Assessment</b></p>
                 <p style="font-size:17px !important;"><b>12. My PEST Assessment</b></p>
                 <p style="font-size:17px !important;"><b>13. My Goals Assessment</b></p><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // Footer  //
        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr style="line-height:1.5;">
                        <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                    </tr>
                    </table><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // Footer  //
        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited 3</td>
                    </tr>
                    <tr style="line-height:0.5;">
                        <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'."Introduction".'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                    </tr>
                    <tr style="width:100%;height:200px;line-height:2.0;">
                        <td align="center" style="width:100%;" valign="middle"><img src="assets/img/b_sana.png" alt="img"></td>
                    </tr>
                    <tr style="line-height:2.5;">
                        <td><h3 style="color:#ff9900;">Congratulations! </h3></td>
                    </tr>
                    <tr style="line-height:1.5;">
                        <td>You have successfully completed the Self-Assessment &amp; Development Work Motivation Analysis Program (SANA). We hope that SANA has helped you in taking stock of your Strengths/ Areas of Improvement and creating a compelling action plan for improvement</td>
                    </tr>
                    <tr style="line-height:1.5;">
                        <td><br></td>
                    </tr>
                    <tr style="line-height:1.5;">
                        <td>Self-Assessment is a dynamic process. We recommend you to do Self-Assessment every six months. This will help you track your progress on your action plan and make course corrections</td>
                    </tr>
                    <tr style="line-height:1.5;">
                        <td><br></td>
                    </tr>
                    <tr style="line-height:1.5;">
                        <td>Self-Assessment &amp; Development Need Analysis Program Report will provide you the following data on various sections of the Program:</td>
                    </tr>
                    <tr style="line-height:1.5;">
                        <td><br></td>
                    </tr>
                    <tr style="line-height:1.5;">
                        <td>
                            <ul style="list-style-type: square;">
                                <li>Your Self-Evaluation</li>
                                <li>Your Pre-Assessment Analysis, where ever applicable</li>
                                <li>Your Improvement Plans</li>
                            </ul>
                        </td>
                    </tr>
                    <tr style="line-height:5.5;">
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                    </tr>
                    </table><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // End of introduction page //
                             
        //$id = 6,35,36,37,38,39,40,41,4,46,28,18,62,34;
        $id_aaray = array(6,35,36,37,38,39,40,41,4,46,28,18,62,34,8,65);
        $count = 4;
        foreach($id_aaray as $id){
            $data['sheet_id'] = $id;
            //--for left view---
            $data['nav_type'] = 'sheets';
            $data['id'] = $this->main_model->get_name_from_id('sheets', 'node', $data['sheet_id']); //node_id
            $parent_node = $this->main_model->get_name_from_id('node', 'parent_id', $data['id'], 'id'); //parent_node_id
            //end--for left view---
            $submit = $this->custom->is_sheet_submited($id);
            
            if (!empty($submit)) {
            //==================== get all section ids of selected sheet ==============
                $req_data = array('*');
                $fil_data[0]['id'] = 'sheet_id';
                $fil_data[0]['value'] = $id;
                $template_instruction_data = $this->main_model->get_many_records("template_instruction", $fil_data, $req_data, 'sort_order ');
                
                foreach ($template_instruction_data as $value) {
                    $req = array('is_submit');
                    $filters[0]['id'] = 'sheet_user_id';
                    $filters[0]['value'] = $submit[0]['id'];
                    $filters[1]['id'] = 'section';
                    $filters[1]['value'] = $value['id']; //template_instruction_id;
                    $sheet_section_data = $this->main_model->get_many_records("sheet_section", $filters, $req, '');
                   
                //====================== find active sheet =====================
                    $active_sheet = $value['id'];
                }
    
                $section_type = $this->main_model->get_name_from_id('template_instruction', 'section_type', $active_sheet);
                
                // echo $section_type;
                // die;
               
                switch ($section_type) {
                    
                    case 1://=======================================For --checkbox type with tooltip--(Section Type)
                        $req = array('category');
                        $f[0]['id'] = 'template_instruction_id';
                        $f[0]['value'] = $active_sheet;
                        $data['category_id'] = $this->main_model->get_records_group_by('values_for_checkbox_with_tooltip', $f, 'category', $req, 'category');
                        foreach ($data['category_id'] as $key => $cat) {
                            $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
                        }
                        $req = array('name, max');
                        $filter1[0]['id'] = 'id';
                        $filter1[0]['value'] = $id;
                        $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
    
                        $i = 0;
                        foreach ($data['category_id'] as $key => $category) {
                            $req = array('category');
                            $filter[0]['id'] = 'template_instruction_id';
                            $filter[0]['value'] = $active_sheet;
                            $filter[1]['id'] = 'category';
                            $filter[1]['value'] = $category['category'];
                            $data['data'][$category['category']] = $this->main_model->get_many_records("values_for_checkbox_with_tooltip", $filter, '', '');
                        }
                        $data['sheet_section_id'] = $active_sheet;
                        $data['submit'] = '';
                        //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $draft_data = $this->main_model->values_for_checkbox_with_tooltip($active_sheet,$id,$_SESSION['user_id']);
                        
                        $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                        if (!empty($draft_data)) { //     draft/edit UI call
                        
                            $data['draft_data'] = $draft_data;
                            
                            
                            //if($data['pdf_data_from_sheets'][0]->pdf_title == 'Value'){ // checking where is work motivation from the table sheet 
                                //  workmotivation header //
                                 $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited '.$count.'</td>
                                            </tr>
                                            <tr style="line-height:0.5;">
                                                <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                            </tr>
                                            <tr style="line-height:1.5;">
                                                <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                            </tr>
                                            <tr style="width:100%;height:200px;line-height:2.0;">
                                                <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr style="line-height:3.0;">
                                                <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                            </tr>
                                            </table><br>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                                // end of workmotivation header //
                                
                                
                            //}
                                
                                
                            foreach($data['draft_data'] as $dkey => $dvalue){
                                $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr style="line-height:2.6;">
                                        <td valign="middle" style="font-size:10px;color:#26897a;">'.$dvalue->name.'</td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" style="font-size:10px;text-align:justify;">'.$dvalue->reason.'<br></td>
                                    </tr>
                                </table>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                            }
                            $html ='<br pagebreak="true"/>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                            
                            //$pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                            
                        }
    //----end check for add or edit UI call--
                        else { // Normally add UI Call
                            // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr>
                            //         <td align="center" valign="middle"><h1>No Data Found!!</h1>
                            //         </td>
                            //     </tr></table>';
                            // $pdf->writeHTML($html, true, false, true, false, '');
                                
                            // $pdf->Output('Action_sheets_Blank.pdf', 'D');
                        
                        }
    
                        break;
                    case 2:
                        //==========================================For --add more type-- (section-type) ================================ //
                        $data['sheet_id'] = $id;
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                        $filters_d[0]['id'] = 'template_instruction_id';
                        $filters_d[0]['value'] = $active_sheet;
                        $data['add_more_type_details'] = $this->main_model->get_many_records("value_for_add_more_type", $filters_d, '', '');
                        $data['sheet_section_id'] = $active_sheet;
                        //  echo '<pre>';
                        //  print_r($data1);die;
                        // check for add or edit UI call--//
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $draft_data = $this->main_model->get_many_records('save_data_for_add_more_type', $fil, array('*'), '');
                        if (!empty($draft_data)) { //     draft/edit UI call
                            $data['draft_data'] = $draft_data;
                        }
    //----end check for add or edit UI call--
    //                    echo '<pre>';
    //                    print_r($data);die;
                        $this->load->view($action . 'add_more_type_test', $data);
                        break;
                    case 3://=======================================For --checkbox with NO tooltip--
                        $req = array('category');
                        $f[0]['id'] = 'template_instruction_id';
                        $f[0]['value'] = $active_sheet;
                        $data['category_id'] = $this->main_model->get_records_group_by('checkbox_with_no_tooltip', $f, 'category', $req, 'category');
                        // if($_SESSION['user_id'] == 1){
                        //     echo $this->db->last_query();die;
                        // }
                        foreach ($data['category_id'] as $key => $cat) {
                            $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
                        }
                        $req = array('name, max_value');
                        $filter1[0]['id'] = 'id';
                        $filter1[0]['value'] = $id;
                        $details = $this->main_model->get_many_records('sheets', $filter1, $req, '');
                        // if($_SESSION['user_id'] == 1){
                        //     echo $this->db->last_query();die;
                        // }
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                        // if($_SESSION['user_id'] == 1){
                        //     echo $this->db->last_query();die;
                        // }
                        $i = 0;
                        foreach ($data['category_id'] as $key => $category) {
                            $req = array('category');
                            $filter[0]['id'] = 'template_instruction_id';
                            $filter[0]['value'] = $active_sheet;
                            $filter[1]['id'] = 'category';
                            $filter[1]['value'] = $category['category'];
                            $data['data'][$category['category']] = $this->main_model->get_many_records("checkbox_with_no_tooltip", $filter, '', '');
                            //echo $this->db->last_query();die;
                        }
                        $data['sheet_max'] = $details[0]['max_value'];
                        $data['sheet_section_id'] = $active_sheet;
                        $data['submit'] = '';
    //                    echo '<pre>';
    //                    print_r($data);
    //                    die;
    //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $draft_data = $this->main_model->save_data_checkbox_with_no_tooltip_pdf($active_sheet,$id,$_SESSION['user_id']);
                        
                        $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                        // if($_SESSION['user_id'] == 1){
                        //     echo $this->db->last_query();die;
                        // }
                        if (!empty($draft_data)) { //     draft/edit UI call
                            // echo '<pre>';
                            // print_r($draft_data);die;
                            $data['draft_data'] = $draft_data;
                            
                            
                            //if($data['pdf_data_from_sheets'][0]->pdf_title == 'Work Motivation'){ // checking where is work motivation from the table sheet 
                                //  workmotivation header //
                                $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited '.$count.'</td>
                                            </tr>
                                            <tr style="line-height:0.5;">
                                                <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                            </tr>
                                            <tr style="line-height:1.5;">
                                                <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                            </tr>
                                            <tr style="width:100%;height:200px;line-height:2.0;">
                                                <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr style="line-height:3.0;">
                                                <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                            </tr>
                                            </table><br>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                                // end of workmotivation header //
                           // }
                                
                            
                                
                            foreach($data['draft_data'] as $dkey => $dvalue){
                                $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr style="line-height:2.6;">
                                        <td valign="middle" style="font-size:10px;color:#26897a;">'.$dvalue->name.'</td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" style="font-size:10px;text-align:justify;">'.$dvalue->reason.'<br></td>
                                    </tr>
                                </table>';
                                //$html ='<br pagebreak="true"/>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                            }
                            $html ='<br pagebreak="true"/>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                            
                            
                            //$pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                        }
    //----end check for add or edit UI call--
                        else {
                            
                            // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr>
                            //         <td align="center" valign="middle"><h1>No Data Found!!</h1>
                            //         </td>
                            //     </tr></table>';
                            //     $pdf->writeHTML($html, true, false, true, false, '');
                                
                            //     $pdf->Output('Action_sheets_Blank.pdf', 'D');
                        }
                        break;
                    case 4://=======================================For -TICK MARK-- (section type)
    
    
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
    
    
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $data['question_data'] = $this->main_model->get_many_records("tickmark_type", $filter, '', '');
    
    
                        $getFilter[0]['id'] = 'template_instruction_id';
                        $getFilter[0]['value'] = $active_sheet;
                        $data['headerName'] = $this->main_model->get_many_records("tickmark_type_header", $getFilter, '', '');
    
    
                        $data['sheet_section_id'] = $active_sheet;
                        $data['submit'] = '';
    //                    echo '<pre>';
    //                    print_r($data);
    //                    die;
    //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $draft_data = $this->main_model->get_many_records('save_data_tickmark_type', $fil, array('*'), '');
                        if (!empty($draft_data)) { //     draft/edit UI call
    //                        echo '<pre>';
    //                        print_r($draft_data);die;
                            $data['draft_data'] = $draft_data;
    //                        echo '<pre>';
    //                        print_r($data);die;
                            $this->load->view($action . 'draft_tickmark_type_view', $data);
                        }
    //----end check for add or edit UI call--
                        else {
                            $this->load->view($action . 'tickmark_type_view', $data);
                        }
                        break;
                    case 5://=======================================For -Listing Type-- (section type)
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                        $filterd[0]['id'] = 'template_instruction_id';
                        $filterd[0]['value'] = $active_sheet;
                        $data['listing_type_data'] = $this->main_model->get_many_records("listing_type", $filterd, '', '');
                        //echo $this->db->last_query();die;
                        $data['sheet_section_id'] = $active_sheet;
    //                    echo '<pre>';
    //                    print_r($data1);die;
    //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $fil[3]['id'] = 'user_id';
                        $fil[3]['value'] = $_SESSION['user_id'];
                        $draft_data = $this->main_model->get_many_records('save_data_listing_type', $fil, array('*'), '');
                        // echo $this->db->last_query();die;
                        if (!empty($draft_data)) { //     draft/edit UI call
                            // echo '<pre>';
                            // print_r($draft_data);die;
                            $data['draft_data'] = $draft_data;
                            // echo '<pre>';
                            // print_r($data);die;
                            $this->load->view($action . 'draft_listing_type', $data);
                        }
    //----end check for add or edit UI call--
                        else {
                            // echo "<pre>";
                            // print_r($data);die;
                            $this->load->view($action . 'listing_type', $data);
                        }
                        break;
                    case 6://=======================================For -Descriptive Type-- (section type)
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                        $f[0]['id'] = 'template_instruction_id';
                        $f[0]['value'] = $active_sheet;
                        $data['listing_type_data'] = $this->main_model->get_many_records("descriptive_type", $f, '', '');
                        $data['sheet_section_id'] = $active_sheet;
    //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $fil[3]['id'] = 'user_id';
                        $fil[3]['value'] = $_SESSION['user_id'];
                        $draft_data = $this->main_model->get_many_records('save_data_descriptive_type', $fil, array('*'), '');
                        
                        $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                        if (!empty($draft_data)) { //     draft/edit UI call
                            $data['draft_data'] = $draft_data;
                            
                                
                              //if($data['pdf_data_from_sheets'][0]->pdf_title == 'Work Motivation'){ // checking where is work motivation from the table sheet 
                                //  workmotivation header //
                                $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited '.$count.'</td>
                                            </tr>
                                            <tr style="line-height:0.5;">
                                                <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                            </tr>
                                            <tr style="line-height:1.5;">
                                                <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                            </tr>
                                            <tr style="width:100%;height:200px;line-height:2.0;">
                                                <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr style="line-height:3.0;">
                                                <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                            </tr>
                                            </table><br>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                                // end of workmotivation header //
                           // }
                                
                                //================================================================//
                                   foreach ($data['listing_type_data'] as $value) {
                                        
                                        $html = '<p style="color:#4cae4c;font-size:14px;">'.$value["header_name"].'</p>';
                                        $filterss[0]['id'] = 'descriptive_type_id';
                                        $filterss[0]['value'] = $value['id'];
                                        $data1 = $this->main_model->get_many_records("descriptive_type_details", $filterss, '', '');
                                        foreach ($data1 as $childData) {
                                            $ch = 0;
                                            $prev_content = '';
                                            foreach ($draft_data as $key_d => $val_draft) {
                                            if ($val_draft['description_details_id'] == $childData['id']) {
                                                $ch = 1;
                                                $prev_content = $val_draft['value'];
                                                break;
                                                }
                                            }
                                            
                                            $html .='<p style="font-size:10px;">'.$childData["answer_header_text"].'</p>';
                                            if ($ch) {
                                                $html .='<p style="font-size:10px;">'.$prev_content.'</p>';
                                            }
                                                
                                               
                                        }
                                        
                                        $pdf->writeHTML($html, true, false, true, false);
                                          
                                    }
                                     $html ='<br pagebreak="true"/>';
                                    $pdf->writeHTML($html, true, false, true, false, '');
                                //===============================================================//
                                
                                //$pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                            
                        }
    //----end check for add or edit UI call--
                        else {
                        //   $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        //         <tr>
                        //             <td align="center" valign="middle"><h1>No Data Found!!</h1>
                        //             </td>
                        //         </tr></table>';
                        //         $pdf->writeHTML($html, true, false, true, false, '');
                                
                        //     $pdf->Output('Action_sheets_Blank.pdf', 'D');
                        }
                        break;
    
                    case 8://=======================================For -Range Type-- (section type)
                        $req = array('category');
                        $f[0]['id'] = 'template_instruction_id';
                        $f[0]['value'] = $active_sheet;
                        $data['category_id'] = $this->main_model->get_records_group_by('range_type', $f, 'category', $req, 'category');
                        
                        foreach ($data['category_id'] as $key => $cat) {
                            $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
                        }
                        $req = array('name, max');
                        $filter1[0]['id'] = 'id';
                        $filter1[0]['value'] = $id;
                        $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
    
                        $i = 0;
                        foreach ($data['category_id'] as $key => $category) {
                            $req = array('category');
                            $filter[0]['id'] = 'template_instruction_id';
                            $filter[0]['value'] = $active_sheet;
                            $filter[1]['id'] = 'category';
                            $filter[1]['value'] = $category['category'];
                            $data['data'][$category['category']] = $this->main_model->get_many_records("range_type", $filter, '', '');
                        }
                        $data['sheet_section_id'] = $active_sheet;
                        $data['submit'] = '';
    
    //                    echo '<pre>';
    //                    print_r($data);die;
    //
    //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $draft_data = $this->main_model->get_many_records('save_data_range_type', $fil, array('*'), '');
                        
                        $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                        
                        $data['distinct_category_name'] = $this->main_model->wellness_category_name($active_sheet);
                        
                        $data['list_data'] = $this->main_model->wellness_data($active_sheet,$id,$_SESSION['user_id']);
                        
                        // echo "<pre>";
                        // print_r($data['list_data']);
                        // print_r($data['distinct_category_name']);
                        // die;
                        
                        if (!empty($draft_data)) { //     draft/edit UI call
    
                            $data['draft_data'] = $draft_data;
                            
                            // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr>
                            //         <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                            //         </td>
                            //     </tr></table>';
                            //     $pdf->writeHTML($html, true, false, true, false, '');
                                // end of heading image
                                // pdf header
                                
                            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr style="line-height:2.0;">
                                    <td align="center" valign="middle" style="background-color:#ff9900;color:white;font-size:13px;"><p>'.ucwords($data['pdf_data_from_sheets'][0]->pdf_header).'</p></td>
                                </tr></table>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                                
                                // end of pdf header
                                
                               if(!empty($data['pdf_data_from_sheets'][0]->pdf_image)){
                                    // pdf image
                                    $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr style="width:100%;height:200px;line-height:2.0;">
                                        <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" alt="img">
                                        </td>
                                    </tr></table>';
                                    $pdf->writeHTML($html, true, false, true, false, '');
                                    // end of pdf image
                                }
                                
                                // pdf title & description
                            
                            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                                    <td valign="middle">&nbsp;&nbsp;&nbsp;Title:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_title.'</td>
                                </tr>
                                <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                                    <td valign="middle">&nbsp;&nbsp;&nbsp;Description:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_description.'</td>
                                </tr>
                                </table><br>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                                
                                // end of title & description
                                
                                $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td valign="middle">Test</td>
                                    <td valign="middle">My Result</td>
                                    <td valign="middle">Normal Range</td>
                                </tr>';
                                
                                foreach($data['distinct_category_name'] as $dkey => $dvalue){
                                    
                                    $html .= '<tr>';
                                    $html .= '<td><strong>'.$dvalue->category_name.'</strong></td>';
                                    $html .= '<td></td>';
                                    $html .= '<td></td>';
                                    $html .= '</tr>';
                                    
                                 foreach($data['list_data'] as $lkey => $lvalue){
                                    if($dvalue->category_name == $lvalue->category_name){
                                        $html .= '<tr>';
                                        $html .= '<td>&nbsp;&nbsp;'.$lvalue->name.'</td>';
                                        $html .= '<td>'.$lvalue->your_ans.'</td>';
                                        $html .= '<td>'.$lvalue->normal_range.'</td>';
                                        $html .= '</tr>'; 
                                    }
                                 }   
                                    
                                }
                                $html .= '</table>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                                
                                //$pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
    
                          
                        }
                        else
                        {
                            // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr>
                            //         <td align="center" valign="middle"><h1>No Data Found!!</h1>
                            //         </td>
                            //     </tr></table>';
                            //     $pdf->writeHTML($html, true, false, true, false, '');
                                
                            // $pdf->Output('Action_sheets_Blank.pdf', 'D');
                        }
                        break;
    
    
                    case 7://=======================================For -Marking Type-- (section type)
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
    
    
                        $req = array('category');
                        $filter[0]['id'] = 'template_instruction_id';
                        $filter[0]['value'] = $active_sheet;
                        $data['question_data'] = $this->main_model->get_many_records("marking_type", $filter, '', '');
    
    
                        $getFilter[0]['id'] = 'template_instruction_id';
                        $getFilter[0]['value'] = $active_sheet;
                        $data['headerName'] = $this->main_model->get_many_records("marking_type_header", $getFilter, '', '');
    
    
                        $data['sheet_section_id'] = $active_sheet;
                        $data['submit'] = '';
    //                    echo '<pre>';
    //                    print_r($data);
    //                    die;
    //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $draft_data = $this->main_model->get_many_records('save_data_marking_type', $fil, array('*'), '');
                        if (!empty($draft_data)) { //     draft/edit UI call
    //                        echo '<pre>';
    //                        print_r($draft_data);die;
                            $data['draft_data'] = $draft_data;
    //                        echo '<pre>';
    //                        print_r($data);die;
                            $this->load->view($action . 'draft_marking_type_sheet', $data);
                        }
    //----end check for add or edit UI call--
                        else {
                            $this->load->view('marking_type_sheet', $data);
                        }
                        break;
    
                    case 9://Tickmark Advance Type Sheet [09-10-17---Musarrat]
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                        $data['sheet_section_id'] = $active_sheet;
    
                        // $req = array('*');
                        // $filter[0]['id'] = 'template_instruction_id';
                        // $filter[0]['value'] = $active_sheet;
                        // $data['question_data'] = $this->main_model->get_many_records("tickmark_adv_content", $filter, '', '');
    //
    //
                        $getFilter[0]['id'] = 'template_instruction_id';
                        $getFilter[0]['value'] = $active_sheet;
                        $data['headerName'] = $this->main_model->get_many_records("tickmark_adv_header", $getFilter, '', '');
    
                        $data['submit'] = '';
    //                    echo '<pre>';
    //                    print_r($data);
    //                    die;
    //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $fil[3]['id'] = 'user_id';
                        $fil[3]['value'] = $_SESSION['user_id'];
                        $draft_data = $this->main_model->get_many_records('save_data_adv_tickmark', $fil, array('*'), '');
                        
                        $data['save_data'] = $this->main_model->tickmark_adv_content($active_sheet,$id,$_SESSION['user_id']);
                        //echo $this->db->last_query();die;
                       
                       $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                       
                       $data['tickmark_adv_header'] = $this->main_model->select('tickmark_adv_header','*','id',array('template_instruction_id' => $active_sheet));
                        
                        if (!empty($draft_data)) { //     draft/edit UI call
                            
                            // echo '<pre>';
                            // print_r($data['save_data']);
                            // print_r($data['tickmark_adv_header']);
                            // print_r($data['pdf_data_from_sheets']);
                            // die;
                            
                            
                            //if($data['pdf_data_from_sheets'][0]->pdf_title == 'Work Motivation'){ // checking where is work motivation from the table sheet 
                                //  workmotivation header //
                                $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited '.$count.'</td>
                                            </tr>
                                            <tr style="line-height:0.5;">
                                                <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                            </tr>
                                            <tr style="line-height:1.5;">
                                                <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                            </tr>
                                            <tr style="width:100%;height:200px;line-height:2.0;">
                                                <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr style="line-height:3.0;">
                                                <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                            </tr>
                                            </table><br>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                                // end of workmotivation header //
                           // }
                            
                                
                                $html ='';
                                
                                foreach($data['tickmark_adv_header'] as $key => $value){
                                    $html .= '<p style="color:#4cae4c;">'.$value->header_name.'</p>';
                                    $i =1;
                                    $j =1;
                                    foreach($data['save_data'] as $skey => $svalue){
                                       //$html .= '<ol>';
                                       
                                       if($svalue->header1 == $value->header_name){
                                           
                                           if($svalue->tickmark_type_header == $value->header_name){
                                              $html .= '<p>'.$j.'. '.$svalue->content1.'</p>';
                                              $j++;
                                           }
                                      
                                       }elseif($svalue->header2 == $value->header_name){
                            
                                           if($svalue->tickmark_type_header == $value->header_name){
                                               $html .= '<p>'.$i.'. '.$svalue->content2.'</p>';
                                               $i++;
                                           }
                                        
                                       }
                                      // $html .= '</ol>';
                                      //$i++;
                                    }
                                }
                                $html .='<br pagebreak="true"/>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                                
                            //$pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                            
                        }
    //----end check for add or edit UI call--
                        else {
                            // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr>
                            //         <td align="center" valign="middle"><h1>No Data Found!!</h1>
                            //         </td>
                            //     </tr></table>';
                            //     $pdf->writeHTML($html, true, false, true, false, '');
                                
                            // $pdf->Output('Action_sheets_Blank.pdf', 'D');
                        }
                        break;
    
                    case 10://=======================================For --dropdown with multiple addmore--
                        $req = array('category');
                        $f[0]['id'] = 'template_instruction_id';
                        $f[0]['value'] = $active_sheet;
                        $data['category_id'] = $this->main_model->get_records_group_by('dropdown_with_multi_addmore', $f, '', $req, '');
    //                    foreach ($data['category_id'] as $key => $cat) {
    //                        $data[$cat['category']] = $this->main_model->get_name_from_id('dropdown_with_multi_addmore', '', $cat['category']);
    //                    }
                        $req = array('*');
                        $filter1[0]['id'] = 'id';
                        $filter1[0]['value'] = $id;
                        $details = $this->main_model->get_many_records('sheets', $filter1, $req, '');
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
    
                        $i = 0;
                        foreach ($data['category_id'] as $key => $category) {
                            $req = array('category');
                            $filter[0]['id'] = 'template_instruction_id';
                            $filter[0]['value'] = $active_sheet;
                            $filter[1]['id'] = 'category';
                            $filter[1]['value'] = $category['category'];
                            $data['data'][$category['category']] = $this->main_model->get_many_records("dropdown_with_multi_addmore", $filter, '', '');
                        }
                        $data['sheet_max'] = $details[0]['max_value'];
                        $data['sheet_section_id'] = $active_sheet;
                        $data['submit'] = '';
    //                    echo '<pre>';
    //                    print_r($data);
    //                    die;
    //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $draft_data = $this->main_model->save_data_dropdown_with_multi_addmore($active_sheet,$id,$_SESSION['user_id']);
                        
                        // echo $this->db->last_query();die;
                        
                        // echo "<pre>";
                        // print_r($draft_data);die;
                        
                        $data['cat_label'] = $this->main_model->get_name_from_id("sheets", "cat_label", $id, "id");
                        $data['button_label'] = $this->main_model->get_name_from_id("sheets", "button_label", $id, "id");
                        $data['act_label'] = $this->main_model->get_name_from_id("sheets", "act_label", $id, "id");
                        $data['checkbox'] = $this->main_model->get_name_from_id("template_instruction", "checkbox", $active_sheet, "id");
                        
                        $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $id));
                        
                        // echo "<pre>";
                        // print_r($data['pdf_data_from_sheets']);die;
                        if (!empty($draft_data)) { //     draft/edit UI call
                        
                            //  heading image
                            //  $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr>
                            //         <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                            //         </td>
                            //     </tr></table>';
                            //     $pdf->writeHTML($html, true, false, true, false, '');
                                // end of heading image
                                // pdf header
                                
                             $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td align="" valign="" style="font-size:12px; text-align: right;">&#169; Sana Skillpromise Education Private Limited '.$count.'</td>
                                        </tr>
                                        <tr style="line-height:0.5;">
                                            <td align="" valign="middle" style="font-size:32px; color:#5cb85c;"><p><b>'.$data['pdf_data_from_sheets'][0]->pdf_title.'</b></p><hr style="border: 5px solid #f66b2d;"></td>
                                        </tr>
                                        <tr style="line-height:1.5;">
                                            <td align="" valign="middle" style="font-size:16px; color:#ff9900;"><p>'.$data['pdf_data_from_sheets'][0]->pdf_header.'</p></td>
                                        </tr>
                                        <tr style="width:100%;height:200px;line-height:2.0;">
                                            <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" style="width:700px; height:360px;" alt="img"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr style="line-height:3.0;">
                                            <td align="center"><img src="assets/img/'.$data['pdf_data_from_sheets'][0]->pdf_image2.'" alt="img" style="width:700px; height:320px;"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td style="text-align:right;"><img src="assets/img/summaryreportfooter.png" style="width:150px; height:70px;" alt="img"></td>
                                        </tr>
                                        </table><br>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                                
                            
                                
                                
                                foreach($draft_data as $dkey => $dvalue){
                                $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr style="line-height:2.6;">
                                        <td valign="middle" style="font-size:10px;color:#26897a;">'.$dvalue->category.'</td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" style="font-size:10px;text-align:justify;">'.$dvalue->statement.'<br></td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" style="font-size:10px;text-align:justify;">'.$dvalue->action_values.'<br></td>
                                    </tr>
                                </table>';
                                $pdf->writeHTML($html, true, false, true, false, '');
                            }
                            $html ='<br pagebreak="true"/>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                                
                               // $pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                        }
                        else {
                            // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            //     <tr>
                            //         <td align="center" valign="middle"><h1>No Data Found!!</h1>
                            //         </td>
                            //     </tr></table>';
                            //     $pdf->writeHTML($html, true, false, true, false, '');
                                
                            // $pdf->Output('Action_sheets_Blank.pdf', 'D');
                          
                        }
                        break;
    
                    case 11://==========================================For --add more checkbox category-- (section-type)
    
                        $data['sheet_id'] = $id;
                        $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                        $filters_d[0]['id'] = 'template_instruction_id';
                        $filters_d[0]['value'] = $active_sheet;
                        $data['add_more_type_details'] = $this->main_model->get_many_records("add_more_checkbox_category", $filters_d, '', '');
                        $data['sheet_section_id'] = $active_sheet;
    
    //                    echo '<pre>';
    //                    print_r($data);die;
    //----check for add or edit UI call--
                        $fil[0]['id'] = 'sheet_id';
                        $fil[0]['value'] = $id;
                        $fil[1]['id'] = 'sheet_section_id';
                        $fil[1]['value'] = $active_sheet;
                        $fil[2]['id'] = 'is_submit';
                        $fil[2]['value'] = '1';
                        $draft_data = $this->main_model->get_many_records('add_more_checkbox_contents', $fil, array('*'), 'id');
    
                        if (!empty($draft_data)) { //     draft/edit UI call
    //                        echo '<pre>';
    //                        print_r($draft_data);die;
                            $data['draft_data'] = $draft_data;
    
                            foreach ($data['draft_data'] as $key => $category) {
                                $req = array('*');
                                $filter[0]['id'] = 'sheet_section_id';
                                $filter[0]['value'] = $active_sheet;
                                $filter[1]['id'] = 'section_id';
                                $filter[1]['value'] = $category['section_id'];
                                $data['cat_group'][$category['section_id']] = $this->main_model->get_many_records("add_more_checkbox_contents", $filter, $req, 'id');
                            }
    //                        echo '<pre>';
    //                        print_r($data);die;
                            $this->load->view($action . 'draft_sheet_addmore_checkbox_content', $data);
                        }
    //----end check for add or edit UI call--
                        else {
    //                         echo '<pre>';
    //                        print_r($data);die;
                            $this->load->view($action . 'sheet_addmore_checkbox_content', $data);
                        }
                        break;
                        case 12:
                            $data['sheet_id'] = $id;
                            $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);
                            $data['template_instruction_id'] = $this->main_model->get_name_from_id('template_instruction', 'id', $active_sheet);
                            $filters_d[0]['id'] = 'template_instruction_id';
                            $filters_d[0]['value'] = $active_sheet;
                            $filters_d[1]['id'] = 'user_id';
                            $filters_d[1]['value'] = $_SESSION['user_id'];
                            $data['cover_letter'] = $this->main_model->get_many_records("cover_letter", $filters_d, '', '');
                            $data['sheet_section_id'] = $active_sheet;
                            // echo $this->db->last_query();die;
                            // echo "<pre>";
                            // print_r($data);die;
                            $this->load->view('cover_letter',$data);
                        break;
    
                    default :
                        die("no action sheet is prepared");
                        break;
                }
            } else {
                $insert['sheet_id'] = $id;
                $insert['user_id'] = $_SESSION['user_id'];
                $insert['is_submit'] = '0';
                $insert['created_by'] = $_SESSION['user_id'];
                $insert['created_date'] = date('Y-m-d H:i:s');
                $return_id = $this->main_model->add_update_record('sheet_user', $insert);
                $req_item = array('*');
                $fil[0]['id'] = 'sheet_id';
                $fil[0]['value'] = $id;
                $template_details = $this->main_model->get_many_records('template_instruction', $fil, $req_item, '');
                foreach ($template_details as $temp_value) {
                    $new_data['section'] = $temp_value['id']; //ie template_instruction_id
                    $new_data['sheet_user_id'] = $return_id;
                    $new_data['is_submit'] = '0';
                    $new_data['created_by'] = $_SESSION['user_id'];
                    $new_data['created_date'] = date('Y-m-d H:i:s');
                    $return_section_id = $this->main_model->add_update_record('sheet_section', $new_data);
                }
    
                $this->sheets('sheets', $id);
                
            }
            $count++;
        }
        //ob_clean();
        //ob_flush();
        $pdf->Output('data.pdf', 'I');
        //exit;
        //ob_end_flush();
        //ob_end_clean();
        
    }

    /* Not in use now, May be required
      public function get_arguments($key=0){
      $url=  $_SERVER['PHP_SELF'];
      $arg=  array_filter(explode('/', $url));
      $arg['table']=$arg[4];
      $arg['action']=$arg[2];
      if($key){
      return $arg[$key];
      }
      else{
      return $arg;
      }
      }
     *
     */

    public function show_sections() {
//        echo '<pre>';
//        print_r($_POST);die;
        $filter1[0]['id'] = 'sheet_id';
        $filter1[0]['value'] = $_POST['sheet_id'];
//        $all_section = $this->main_model->get_many_records('template_instruction', $filter1, array('id', 'section_name'), '');
        $all_section = $this->main_model->get_many_records('template_instruction', $filter1, array('id', 'section_name'), '');
//         echo '<pre>';
//        print_r($all_section);die;
        die(json_encode($all_section));
    }

    public function skill_talk_slider() {
        $this->load->view('skill-talk-slider');
    }
    
    public function creative() {
        $this->load->view('skill-talk-slider1');
    }
    //wellness code
    //start here
     public function set_data_home_wellness() {//-==================== save data from user ==============
        $result['data'] = $_POST['items'];
        // echo '<pre>';
        // print_r($result['data']);
        // die;
        foreach ($result['data'] as $key1 => $value_table) {
            $result['data'][$key1]['sheet_cat_id'] = $this->main_model->get_name_from_id('marking_type', 'category', $value_table['question_id'], 'id');
        }
//-----GROUPING OF ARRAY BY sheet category WISE
        $my_array = json_decode(json_encode($result['data']), True);
        $arr['list'] = array();
        foreach ($my_array as $key => $item) {
            $arr['list'][$item['sheet_cat_id']][$key] = $item;
        }
        ksort($arr['list']);
//-----end GROUPING OF ARRAY BY sheet category WISE
        $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $_POST['sheet_id'], 'id');
        $arr['template_instruction_id'] = $_POST['sheet_section_id'];

        $this->load->view('analytics_for_home_marking_type_wellness', $arr);
    }
    
         public function set_data_home_etiquette() {
             
             if($_POST['sheet_id' == '45']){}
             else{}
    }
    
    public function home_sheets_wellness($sheets = '', $id = '', $action = '')
    {
    $data['sheet_id'] = $id;
    $submit = $this->custom->is_sheet_submited($id);

    if (!empty($submit)) {
//==================== get all section ids of selected sheet ==============
        $req_data = array('*');
        $fil_data[0]['id'] = 'sheet_id';
        $fil_data[0]['value'] = $id;
        $template_instruction_data = $this->main_model->get_many_records("template_instruction", $fil_data, $req_data, 'sort_order ');

        foreach ($template_instruction_data as $value) {
            $req = array('is_submit');
            $filters[0]['id'] = 'sheet_user_id';
            $filters[0]['value'] = $submit[0]['id'];
            $filters[1]['id'] = 'section';
            $filters[1]['value'] = $value['id']; //template_instruction_id;
            $sheet_section_data = $this->main_model->get_many_records("sheet_section", $filters, $req, '');
//====================== find active sheet =====================
            $active_sheet = '';

            if ($sheet_section_data[0]['is_submit'] == 0) {
//                    $active_sheet = $value['section_type'];
                $active_sheet = $value['id']; //template_instruction_id;
                break;
            }
        }
        $section_type = $this->main_model->get_name_from_id('template_instruction', 'section_type', $active_sheet);
        ;
        switch ($section_type) {
            case 7://=======================================For -Home Marking Type-- (section type)

                $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);


                $req = array('category');
                $filter[0]['id'] = 'template_instruction_id';
                $filter[0]['value'] = $active_sheet;
                $data['question_data'] = $this->main_model->get_many_records("marking_type", $filter, '', '');


                $getFilter[0]['id'] = 'template_instruction_id';
                $getFilter[0]['value'] = $active_sheet;
                $data['headerName'] = $this->main_model->get_many_records("marking_type_header", $getFilter, '', '');


                $data['sheet_section_id'] = $active_sheet;
                $data['submit'] = '';
                // echo "no";
                // die;
                $this->load->view('home_marking_type_sheetwell', $data);
                break;



            default :
                die("no action sheet is prepared");
                break;
        }
    } else {
        $insert['sheet_id'] = $id;
        $insert['user_id'] = $_SESSION['user_id'];
        $insert['is_submit'] = '0';
        $insert['created_by'] = $_SESSION['user_id'];
        $insert['created_date'] = date('Y-m-d H:i:s');
        $return_id = $this->main_model->add_update_record('sheet_user', $insert);
        $req_item = array('*');
        $fil[0]['id'] = 'sheet_id';
        $fil[0]['value'] = $id;
        $template_details = $this->main_model->get_many_records('template_instruction', $fil, $req_item, '');
        foreach ($template_details as $temp_value) {
            $new_data['section'] = $temp_value['id']; //ie template_instruction_id
            $new_data['sheet_user_id'] = $return_id;
            $new_data['is_submit'] = '0';
            $new_data['created_by'] = $_SESSION['user_id'];
            $new_data['created_date'] = date('Y-m-d H:i:s');
            $return_section_id = $this->main_model->add_update_record('sheet_section', $new_data);
        }
//header('Location: ' . base_url().'sheets/sheets'.$id);
        $this->sheets('home_sheets', $id);
    }
}
    
    //end here

    public function assessment_center_slider() {
        $this->load->view('assessment-center-slider');
    }

    public function employability_zone_slider() {
        $this->load->view('employability-zone-slider');
    }

    public function about_us() {
        $this->load->view('about-us');
    }

    public function contact_us() {
        $this->load->view('contact-us');
    }
    
    public function contact_us_action() {
      //  echo '<pre>';
     //   print_r($_POST);die;
$message_body="<b>Name:</b> $_POST[name]<br><b>Phone No:</b> $_POST[phone]<br><b>Enquiry Type:</b> $_POST[enq_type]<br><b>Enquiry:</b> $_POST[msg]";
           
            
            $data['mail_to'] ="customer.care@skillpromise.com"; // added on 23/06/2020
            // $data['mail_to'] ="customerservice@skillpromise.com";
      //  $data['mail_to'] = 'jyoti.chopra@lexiconcpl.com';
            $data['subject'] = "Enquiry mail from $_POST[name]";
            $data['name_from'] = $_POST['name'];
            $data['message'] = $message_body;
            $bcc = '';
            $data['mail_from'] =  $_POST['email'];
            $data['cc'] = '';
            //$data['bcc'] = $bcc;

            $ch = curl_init();                    // initiate curl
// $data = http_build_query($data);
            $ch = curl_init();                    // initiate curl
// $url = "http://166.62.121.164/lexi-mailer/send-mail-V-2.php"; // where you want to post data
            $url = "http://mailer.lexiconcpl.com/sendGrid/"; // where you want to post data

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
            $output = curl_exec($ch); // execute

            curl_close($ch); // close curl handle
        
$_SESSION['msg_str']="Message Sent Successfully";

        header('Location: ' . base_url());
    }
    

    public function privacy_policy() {
        $this->load->view('privacy-policy');
    }

    public function terms_of_use() {
        $this->load->view('terms-of-use');
    }

    public function our_values() {
        $this->load->view('our-values');
    }

    public function our_benefits() {
        $this->load->view('our-benefits');
    }

    public function news_letter() {
        $this->load->view('news-letter');
    }

    public function programedetails($id ='') {
        if($id == ''){
           header('Location: ' . base_url()); 
        }else{
            $data['ids'] = $id;
          $this->load->view('aptitude-devlopment-home',$data);  
        }
        //echo $id;die;
        
    }

    public function sana_for_higher() {
        $this->load->view('sana-for-higher');
    }

    public function sana_for_professionals() {
        $this->load->view('sana-for-professionals');
    }

    public function learning_objectives_school() {
//$this->load->view('learning-objectives-school');
        $this->load->view('learning-objective');
    }

    public function program_benefits_school() {
//$this->load->view('program-benefits-school');
        $this->load->view('program-benfit');
    }

    public function course_content_school() {
//$this->load->view('course-content-school');
        $this->load->view('course-content');
    }

    public function learning_objectives_higher() {
        $this->load->view('learning-objectives-higher');
    }

    public function program_benefits_higher() {
        $this->load->view('program-benefits-higher');
    }

    public function course_content_higher() {
        $this->load->view('course-content-higher');
    }

    public function learning_objectives_professional() {
        $this->load->view('learning-objectives-professional');
    }

    public function program_benefits_professional() {
        $this->load->view('program-benefits-professional');
    }

    public function course_content_professional() {
        $this->load->view('course-content-professional');
    }

    public function blog_main() {
        $this->load->view('blog');
    }
    public function Programs($id){
        $name = $this->main_model->select('package_sub_master','*','id',array('id' => $id,'is_deleted'=>0));
        $data['name'] = $name[0]->name;
        $data['package'] = $this->main_model->select('packages','*','id',array('package_sub_master_id' => $id,'is_deleted' =>0));
        // echo "<pre>";
        // print_r($data);
        // die;
        $this->load->view('Programs',$data);
    }

    public function testimonials($id) {
        $testimonials = $this->main_model->select('testimonials','*',"id");
        // echo "<pre>";
        // print_r($testimonials);
        // die;
        $data['testimonials'] = $testimonials;
        $this->load->view('testimonials', $data);
    }
    
    public function testimonialall() {
       $home_package = array();
                   // $home_package1 = array();
                    // $package_master = $this->main_model->select('package_master','id,name','name',array('is_deleted' => 0));
        
               
                   $testimonialactive =  $this->main_model->select('testimonials','*',"id");
                   $data['testimonialactive'] = $testimonialactive; // echo "<pre>";
        //             echo "<pre>";
        // ech$testimonialactive);
        // die;
        $this->load->view('testimoniallist',$data);
    }
    
    

    public function blog_detail($id) {/////28/05/2018
        $blog_id['id'] = $id;
        if (isset($id)) {
            $this->load->view('blog-detail', $blog_id);
        } else {
            
        }
    }

//end
//--------new fun for uploading excel sheet users---
    public function add_excel_user() {
        $data['package'] = $this->main_model->select('packages','id,name','id',array('is_deleted'=> 0));
        // echo "<pre>";
        // print_r($data);die;
        $this->load->view('add_excel_user',$data);
    }
    
         public function upload_application(){
        $this->load->library('excel');
        // echo "<pre>";
        // print_r($this->input->post());
        // die;
        if(isset($_FILES["application_data"]["name"]))
		{
	      //  echo "<pre>";
          //  print_r($this->input->post());
          //  print_r($_FILES);
          //  die;
          $package = $this->input->post('package');
          $password = $this->input->post('password');
          $stream = $this->input->post('stream');
          $course = $this->input->post('course');
          $excel_data = array();
          $path = $_FILES["application_data"]["tmp_name"];
		  $object = PHPExcel_IOFactory::load($path);
		  foreach($object->getWorksheetIterator() as $worksheet)
		  {
		        $highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++){
				    
				    $email = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$college_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$address = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$mobile = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$gender = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$age = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$date_of_birth = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$role = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$date_of_birth = date('Y-m-d',strtotime($date_of_birth));
					
					$checkdata = $this->main_model->checkData('*','users',array('email' => $email));
					
					$excel_data = array(
					    'user_name' => $email,
					    'email' => $email,
					    'entity_id' => 0,
					    'name' => $name,
					    'password' =>  md5($password),
					    'scu' => $college_name,
					    'stream' => $stream,
					    'course' => $course,
					    'address' => $address,
					    'mobile' => $mobile,
					    'image_file' => '',
					    'age' => $age,
					    'dob' => $date_of_birth,
					    'gender' => $gender,
					    'role' => $role,
					    'packages' => $package,
					    'status' => 'Active',
					    'created_by' => $_SESSION['user_id'],
					    'created_date' => date('Y-m-d H:i:s'),
					    'modify_by' => $_SESSION['user_id'],
					    'modify_date' => date('Y-m-d H:i:s'),
					    'is_deleted' => 0
					    );
					
                    
					if($checkdata){
					    
					//$email_to = $email;
                    $message = 'Dear ' . $name . ' your have already register with Email ID:   ' . $email . '. if you forgot your password please contact to ' . base_url() . '<br><br>Thanks.';
                   /// $subject = "Credential from Skillpromise";
                   // $this->email($message, $subject, $email_to);
                    $target_email = $email;
                    $data['mail_to'] = $email;
                    $data['subject'] = "Already register with Skillpromiser";
                    $data['name_from'] = "Skillpromise";
                    $data['message'] = $message;
                    $bcc = '';
                    $data['mail_from'] = "customerservice@skillpromise.com";
                    $data['cc'] = '';
                    //$data['bcc'] = $bcc;
                    $ch = curl_init();                    // initiate curl
                    // $data = http_build_query($data);
                    $ch = curl_init();                    // initiate curl
                    // $url = "http://166.62.121.164/lexi-mailer/send-mail-V-2.php"; // where you want to post data
                    $url = "http://mailer.lexiconcpl.com/sendGrid/"; // where you want to post data
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
                    $output = curl_exec($ch); // execute
                    curl_close($ch); // close curl handle
					    $this->main_model->add_update_record('duplicate_user', $excel_data);
					}else{
					   //$email_to = $email;
                    $message = 'Dear ' . $name . ',<br> your User ID:   ' . $email . '<br>Password: ' . $password . '<br>URL:   ' . base_url() . '<br><br>Thanks.';
                   /// $subject = "Credential from Skillpromise";
                   // $this->email($message, $subject, $email_to);
                    $target_email = $email;
                    $data['mail_to'] = $email;
                    $data['subject'] = "Credential from Skillpromiser";
                    $data['name_from'] = "Skillpromise";
                    $data['message'] = $message;
                    $bcc = '';
                    $data['mail_from'] = "ak1419479@gmail.com";
                    $data['cc'] = '';
                    //$data['bcc'] = $bcc;
                    $ch = curl_init();                    // initiate curl
        // $data = http_build_query($data);
                    $ch = curl_init();                    // initiate curl
        // $url = "http://166.62.121.164/lexi-mailer/send-mail-V-2.php"; // where you want to post data
                    $url = "http://mailer.lexiconcpl.com/sendGrid/"; // where you want to post data
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
                    $output = curl_exec($ch); // execute
                    curl_close($ch); // close curl handle
					   $this->main_model->add_update_record('users', $excel_data); 
					}
				}
		  }
		 $_SESSION['msg_str'] .= 'Excel Import Successfully !';
         $_SESSION['msg_hdr'] = 'Successfully !';
		 header('Location: ' . base_url() . "add_excel_user");die;
          
		}else{
		 $_SESSION['msg_str'] .= 'Please Upload Exel Sheet !';
         $_SESSION['msg_hdr'] = 'Warning !';
		 header('Location: ' . base_url() . "add_excel_user");die;
		}
    }


    public function upload_application_old() {
// print_r($FILES);die;
        $numberOfData = 0;
        $rejectedData = 0;
        $reject_data = array();
        $key = 0;
        $return_data = array();
        $upload_error = 'error';
        try {
            if (isset($_FILES)) {
                $temp_file_name = $_FILES['application_data']['tmp_name'];
                $array_data = $this->execl_upload($temp_file_name);
//                echo '<pre>';
//                print_r($_SESSION);
//                die;
                if (!empty($array_data)) {
                    foreach ($array_data as $value) {
                        if (isset($value['email']) &&
                                isset($value['name']) &&
                                isset($value['password']) &&
                                isset($value['address']) &&
                                isset($value['mobile']) &&
                                isset($value['gender']) &&
                                isset($value['role']) &&
                                isset($value['packages'])) {

//                            $email_response = $this->is_validate_application('email', $value['email']);
//                            echo '<pre>';
//                            print_r($email_response);
//                            die;
//                            if (!$email_response) {
//                                $value[$upload_error] = 'Invalid data "' . $value['email'] . '" in email column';
//                                $reject_data[$rejectedData++] = $value;
//                                continue;
//                            }
//
//                            $name_response = $this->is_validate_application('name', $value['name']);
//                            if (!$name_response) {
//                                $value[$upload_error] = 'Invalid data "' . $value['name'] . '" in name column';
//                                $reject_data[$rejectedData++] = $value;
//                                continue;
//                            }
//
//                            $password_response = $this->is_validate_application('password', $value['password']);
//                            if (!$password_response) {
//                                $value[$upload_error] = 'Invalid data "' . $value['password'] . '" in password column';
//                                $reject_data[$rejectedData++] = $value;
//                                continue;
//                            }
//
//                            $address_response = $this->is_validate_application('address', $value['address']);
//                            if (!$address_response) {
//                                $value[$upload_error] = 'Invalid data "' . $value['address'] . '" in address column';
//                                $reject_data[$rejectedData++] = $value;
//                                continue;
//                            }
//
//                            $mobile_response = $this->is_validate_application('mobile', $value['mobile']);
//                            if (!$mobile_response) {
//                                $value[$upload_error] = 'Invalid data "' . $value['mobile'] . '" in mobile column';
//                                $reject_data[$rejectedData++] = $value;
//                                continue;
//                            }
//
//                            $gender_response = $this->is_validate_application('gender', $value['gender']);
//                            if (!$gender_response) {
//                                $value[$upload_error] = 'Invalid data "' . $value['gender'] . '" in gender column';
//                                $reject_data[$rejectedData++] = $value;
//                                continue;
//                            }
//
//                            $role_response = $this->is_validate_application('role', $value['role']);
//                            if (!$role_response) {
//                                $value[$upload_error] = 'Invalid data "' . $value['role'] . '" in role column';
//                                $reject_data[$rejectedData++] = $value;
//                                continue;
//                            }
//
//                            $packages_response = $this->is_validate_application('packages', $value['packages']);
//                            if (!$packages_response) {
//                                $value[$upload_error] = 'Invalid data "' . $value['packages'] . '" in packages column';
//                                $reject_data[$rejectedData++] = $value;
//                                continue;
//                            }
                            $pass = $value['password'];
                            $value['password'] = md5($value['password']);

//                            echo '<pre>';
//                            print_r($value);
//                            die;
                            $user_id = $this->main_model->add_update_record('users', $value);
//--------sending mail to each person's email--
                            $email_to = $value['email'];
                            $message = 'Dear ' . $value['name'] . '<br> your User ID:' . $email_to . '<br>Password:' . $pass . '<br>URL:' . base_url() . '<br><br>Thanks.';
                            $subject = "Credential from Skillpromise";
                            $this->email($message, $subject, $email_to);
//-------end sending mail

                            $numberOfData++;
                        } else {
                            $value[$upload_error] = 'Some requried field not available';
                            $reject_data[$rejectedData++] = $value;
                        }
                    }//loop end
                } else {
                    throw new Exception('Could not read file');
                }
            } else {
                throw new Exception('Invaild Files Type');
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }


        $return_data['success'] = $numberOfData;
        $return_data['failed'] = $rejectedData;
        $return_data['failed_data'] = $reject_data;

        $this->load->view('error_report', $return_data);
    }

    public function execl_upload($file = '') {
        //load the excel library
        $this->load->library('excel');
        //read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($file);
        //get only the Cell Collection
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

        //extract to a PHP readable array format
        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn(); 
            //===========shyam set for csv upload========

            $column_data = '';
            if ($column == 'A' || $column == 'B' || $column == 'C' || $column == 'D' || $column == 'E' || $column == 'F' || $column == 'G' || $column == 'H' || $column == 'I') {

                if ($column == 'A') {
                    $column_data = 'email';
                }
                if ($column == 'B') {
                    $column_data = 'name';
                }
                if ($column == 'C') {
                    $column_data = 'password';
                }
                if ($column == 'D') {
                    $column_data = 'address';
                }
                if ($column == 'E') {
                    $column_data = 'mobile';
                }
                if ($column == 'F') {
                    $column_data = 'gender';
                }
                if ($column == 'G') {
                    $column_data = 'role';
                }
                if ($column == 'H') {
                    $column_data = 'packages';
                }
            }
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

//header will/should be in row 1 only. of course this can be modified to suit your need.
            if (!empty($column_data)) {
                if ($row == 1) {
                    $header[$row][$column_data] = $data_value;
                } elseif (!empty($data_value)) {
                    $arr_data[$row][$column_data] = $data_value;
                }
            }
        }

//send the data in an array format==========================================================
//        $data['header'] = $header;
//       $data['values'] = $arr_data;
//        echo '<pre>';print_r($data);die;
//show if test third party work or not======more help htttps://arjunphp.com/how-to-use-phpexcel-with-codeigniter/==
        if (!empty($arr_data) && isset($arr_data)) {
            return $arr_data;
        } else {
            return 0;
        }
    }

    public function is_validate_application($type, $data) {

        switch ($type) {
            case 'email':
            case 'name':
            case 'password':
            case 'address':
            case 'mobile':
            case 'gender':
            case 'role':
                if (is_numeric($data)) {
                    return 1;
                }
                break;
            case 'packages':
                if (is_numeric($data)) {
                    return 1;
                }
                break;
            default :

                break;
        }
        return 0;
    }

    function email($message, $sub, $email_to, $cc = array(), $bcc = array()) {

//        $data['mail_from'] = "lexiconmail.testing@gmail.com";
//        $data['mail_pass'] = "lexicon321";
        $data['mail_to'] = $email_to;
        $data['cc'] = $cc;
        $data['bcc'] = $bcc;
//        $data['file'] = $file;
        $data['subject'] = $sub;
        $data['name_from'] = "Skill Promise";
        $data['message'] = $message;
        $data = http_build_query($data);
        $ch = curl_init();                    // initiate curl
        $url = "http://166.62.121.164/lexi-mailer/send-mail-V-2.php"; // where you want to post data
//        $url = "http://122.15.239.9:5080/lexi-mailer/send-mail-V-2.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute

        curl_close($ch); // close curl handle
        return $output; // show output
    }

    public function home_sheets($sheets = '', $id = '', $action = '') { 
        //$id =action sheet ka id
     
    if($id == '45'){
        //$id=action sheet ka id
        $data['sheet_id'] = $id;
        $submit = $this->custom->is_sheet_submited($id);

        if (!empty($submit)) {
//==================== get all section ids of selected sheet ==============
            $req_data = array('*');
            $fil_data[0]['id'] = 'sheet_id';
            $fil_data[0]['value'] = $id;
            $template_instruction_data = $this->main_model->get_many_records("template_instruction", $fil_data, $req_data, 'sort_order ');

            foreach ($template_instruction_data as $value) {
                $req = array('is_submit');
                $filters[0]['id'] = 'sheet_user_id';
                $filters[0]['value'] = $submit[0]['id'];
                $filters[1]['id'] = 'section';
                $filters[1]['value'] = $value['id']; //template_instruction_id;
                $sheet_section_data = $this->main_model->get_many_records("sheet_section", $filters, $req, '');
//====================== find active sheet =====================
                $active_sheet = '';

                if ($sheet_section_data[0]['is_submit'] == 0) {
//                    $active_sheet = $value['section_type'];
                    $active_sheet = $value['id']; //template_instruction_id;
                    break;
                }
            }
            $section_type = $this->main_model->get_name_from_id('template_instruction', 'section_type', $active_sheet);
            ;
            switch ($section_type) {
                case 7://=======================================For -Home Marking Type-- (section type)

                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);


                    $req = array('category');
                    $filter[0]['id'] = 'template_instruction_id';
                    $filter[0]['value'] = $active_sheet;
                    $data['question_data'] = $this->main_model->get_many_records("marking_type", $filter, '', '');


                    $getFilter[0]['id'] = 'template_instruction_id';
                    $getFilter[0]['value'] = $active_sheet;
                    $data['headerName'] = $this->main_model->get_many_records("marking_type_header", $getFilter, '', '');


                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
                    $this->load->view('home_marking_etiquette', $data);
                    break;



                default :
                    die("no action sheet is prepared");
                    break;
            }
        } else {
            $insert['sheet_id'] = $id;
            $insert['user_id'] = $_SESSION['user_id'];
            $insert['is_submit'] = '0';
            $insert['created_by'] = $_SESSION['user_id'];
            $insert['created_date'] = date('Y-m-d H:i:s');
            $return_id = $this->main_model->add_update_record('sheet_user', $insert);
            $req_item = array('*');
            $fil[0]['id'] = 'sheet_id';
            $fil[0]['value'] = $id;
            $template_details = $this->main_model->get_many_records('template_instruction', $fil, $req_item, '');
            foreach ($template_details as $temp_value) {
                $new_data['section'] = $temp_value['id']; //ie template_instruction_id
                $new_data['sheet_user_id'] = $return_id;
                $new_data['is_submit'] = '0';
                $new_data['created_by'] = $_SESSION['user_id'];
                $new_data['created_date'] = date('Y-m-d H:i:s');
                $return_section_id = $this->main_model->add_update_record('sheet_section', $new_data);
            }
//header('Location: ' . base_url().'sheets/sheets'.$id);
            $this->sheets('home_sheets', $id);
        } 
    }else{
      
        $data['sheet_id'] = $id;
        $submit = $this->custom->is_sheet_submited($id);

        if (!empty($submit)) {
//==================== get all section ids of selected sheet ==============
            $req_data = array('*');
            $fil_data[0]['id'] = 'sheet_id';
            $fil_data[0]['value'] = $id;
            $template_instruction_data = $this->main_model->get_many_records("template_instruction", $fil_data, $req_data, 'sort_order ');

            foreach ($template_instruction_data as $value) {
                $req = array('is_submit');
                $filters[0]['id'] = 'sheet_user_id';
                $filters[0]['value'] = $submit[0]['id'];
                $filters[1]['id'] = 'section';
                $filters[1]['value'] = $value['id']; //template_instruction_id;
                $sheet_section_data = $this->main_model->get_many_records("sheet_section", $filters, $req, '');
//====================== find active sheet =====================
                $active_sheet = '';

                if ($sheet_section_data[0]['is_submit'] == 0) {
//                    $active_sheet = $value['section_type'];
                    $active_sheet = $value['id']; //template_instruction_id;
                    break;
                }
            }
            $section_type = $this->main_model->get_name_from_id('template_instruction', 'section_type', $active_sheet);
            ;
            switch ($section_type) {
                case 7://=======================================For -Home Marking Type-- (section type)

                    $data['instruction'] = $this->main_model->get_name_from_id('template_instruction', 'instruction_text', $active_sheet);


                    $req = array('category');
                    $filter[0]['id'] = 'template_instruction_id';
                    $filter[0]['value'] = $active_sheet;
                    $data['question_data'] = $this->main_model->get_many_records("marking_type", $filter, '', '');


                    $getFilter[0]['id'] = 'template_instruction_id';
                    $getFilter[0]['value'] = $active_sheet;
                    $data['headerName'] = $this->main_model->get_many_records("marking_type_header", $getFilter, '', '');


                    $data['sheet_section_id'] = $active_sheet;
                    $data['submit'] = '';
                    $this->load->view('home_marking_type_sheet', $data);
                    break;



                default :
                    die("no action sheet is prepared");
                    break;
            }
        } else {
            $insert['sheet_id'] = $id;
            $insert['user_id'] = $_SESSION['user_id'];
            $insert['is_submit'] = '0';
            $insert['created_by'] = $_SESSION['user_id'];
            $insert['created_date'] = date('Y-m-d H:i:s');
            $return_id = $this->main_model->add_update_record('sheet_user', $insert);
            $req_item = array('*');
            $fil[0]['id'] = 'sheet_id';
            $fil[0]['value'] = $id;
            $template_details = $this->main_model->get_many_records('template_instruction', $fil, $req_item, '');
            foreach ($template_details as $temp_value) {
                $new_data['section'] = $temp_value['id']; //ie template_instruction_id
                $new_data['sheet_user_id'] = $return_id;
                $new_data['is_submit'] = '0';
                $new_data['created_by'] = $_SESSION['user_id'];
                $new_data['created_date'] = date('Y-m-d H:i:s');
                $return_section_id = $this->main_model->add_update_record('sheet_section', $new_data);
            }
//header('Location: ' . base_url().'sheets/sheets'.$id);
            $this->sheets('home_sheets', $id);
        }
    }
    }
    
     public function home_sheets_etiquette($sheets = '', $id = '', $action = '') {
    }

    public function set_data_home() {//-==================== save data from user ==============
       if($_POST['sheet_id'] == '61'){
           $result['data'] = $_POST['items'];
        foreach ($result['data'] as $key1 => $value_table) {
            $result['data'][$key1]['sheet_cat_id'] = $this->main_model->get_name_from_id('marking_type', 'category', $value_table['question_id'], 'id');
        }
//-----GROUPING OF ARRAY BY sheet category WISE
        $my_array = json_decode(json_encode($result['data']), True);
        $arr['list'] = array();
        foreach ($my_array as $key => $item) {
            $arr['list'][$item['sheet_cat_id']][$key] = $item;
        }
        ksort($arr['list']);
//-----end GROUPING OF ARRAY BY sheet category WISE
        $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $_POST['sheet_id'], 'id');
        $arr['template_instruction_id'] = $_POST['sheet_section_id'];

        $this->load->view('analytics_for_home_marking_type', $arr);
    }else if($_POST['sheet_id'] == '45'){
        
                 //-==================== save data from user ==============
        $result['data'] = $_POST['items'];
        // echo '<pre>';
        // print_r($result['data']);
        // die;
        foreach ($result['data'] as $key1 => $value_table) {
            $result['data'][$key1]['sheet_cat_id'] = $this->main_model->get_name_from_id('marking_type', 'category', $value_table['question_id'], 'id');
        }
//-----GROUPING OF ARRAY BY sheet category WISE
        $my_array = json_decode(json_encode($result['data']), True);
        $arr['list'] = array();
        foreach ($my_array as $key => $item) {
        $arr['list'][$item['sheet_cat_id']][$key] = $item;
        }
        ksort($arr['list']);
//-----end GROUPING OF ARRAY BY sheet category WISE
        $arr['sheet_name'] = $this->main_model->get_name_from_id('sheets', 'name', $_POST['sheet_id'], 'id');
        $arr['template_instruction_id'] = $_POST['sheet_section_id'];
        $this->load->view('analytics_for_home_marking_type_etiquette', $arr);
    }
    }

    public function add_blog() {//////28/05/2018
        $_POST["article_datetime"] = date("Y-m-d H:i:s", strtotime($_POST["article_datetime"]));
        $return_id = $this->main_model->add_update_record('blog', $_POST);
        if (isset($_FILES['image_file']) && !empty($_FILES['image_file']['name'])) {//managing image upload
            $extn = end(explode(".", $_FILES['image_file']['name']));
            $id = trim($return_id);
            switch ($table) {//separate image directory for user photos
                case "users":$this->saveImage('./assets/img/uploads/users/', $table . '-' . $id . '.' . $extn);
                    break;
                default:$this->saveImage('./assets/img/uploads/', 'blog' . '-' . $id . '.' . $extn);
                    break;
            }
            $_POST['id'] = $id;
            $_POST['image_file'] = 'blog' . '-' . $id . '.' . $extn;
            $id = $this->main_model->add_update_record('blog', $_POST, 'id');
        }
        header('Location: ' . base_url() . 'manage/blog');
    }

/////end

    public function blog_nav($id) {////28/05/2018
        $blog_id = $id;
        $filter[0]['id'] = 'id';
        $filter[0]['value'] = $blog_id;

        $cat_detail['blog'] = $this->main_model->get_many_records('blog', $filter, '', 'id');
        $cat_detail['blog1'] = $this->main_model->get_many_records('blog_category', '', '', 'id');
        $this->load->view('blog-detail', $cat_detail);
    }

//========Mail Subscription function========
    public function subscribNewsLetter() {
        //$_POST['first_name'] = "Gaurav";
        // $_POST['email'] = "gaurav.dey@lexiconcpl.com";echo "<script>alert('hello')</script>";
        // die();
        $_POST['created_by'] = $_SESSION['user_id'];
        $_POST['created_date'] = date('Y-m-d H:m:s');
            $first_name = $this->input->post('first_name');
            $email = $this->input->post('email');
            // echo $email;
            // die();
     $checkmail = $this->main_model->checkemail($email);
    if ($checkmail) {
   
      
  $return_id = $this->main_model->add_update_record('news_letter', $_POST);
 if ($return_id) {
    $first_name = $this->input->post('first_name');
    $email = $this->input->post('email');
//   if(valid_email($checkmail)
//   {  
// $first_name = "Gaurav";
//  $email = "gaurav.dey@lexiconcpl.com";
    $message_body = 'Dear' . ' ' . $first_name
                    . '<br><br>' . 'Thank you for signing up for our Email Newsletter. Click on the link below to confirm your subscription<br>' . '<a href="' . base_url() . 'mailSubscribed/' . $return_id . '" style="background-color:#00897b;;border: none;
color: white;
 padding: 5px 10px;
 text-align: center;
 text-decoration: none;
 display: inline-block;
 font-size: 12px;
 margin: 4px 2px;
 border-color: #00897b;
 cursor: pointer;">Confirm</a>' . '<br><br>' . 'Please note that clicking on the link above will take you to a page where you can download the “Art of Building Credibility e-Book” as your subscription bonus. Get in touch with us at customerservice@skillpromise.com if you have any Query, Suggestion or Request. Thank you again for subscribing to our Email Newsletter. Enjoy using Skillpromise.com programs!<br><br>Regards<br> Team Skillpromise.';
$message_body1 = '<div style="'.'width:452px;heigth:703px;" >
<center >
    <div style="'.'width:450px;height:700px;background-color:#f2f2f2;">
        <img src="'.'' . base_url() . 'assets/img/logo.png"><br>
<h3><b style="'.'color:blue;">Thank you for Subscribing to our Newsletter
    </b></h3><br>
      <img src="'. base_url() . 'assets/img/subscription_image.jpg"><br><br>
<p>Please confirm your email address by clicking on the link below
</p>
    <br>
    <a style="'.'background-color:#FB8511;color:white;padding:1%;border-radius:10%;text-decoration:none"   href="' . base_url() . 'mailSubscribed/' . $return_id . ' "> Confirm </a><br>
<hr style="'.'height:3px;width:100%;background-color:blue;"><br>
<p style="'.'font-size:18px;color:green;">Sana Skillpromise Education Private Limited
</p><br>
    <a href="'.'https://www.facebook.com/skillpromisetool" target="_blank"><i class="fa fa-facebook-square fa-3x"   aria-hidden="true"></i></a>
    <a href="https://twitter.com/skillpromise" target="_blank"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
    <a href="https://www.linkedin.com/company/skill-promise/" target="_blank"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
    <a href="https://www.linkedin.com/company/skill-promise/" target="_blank"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a><br><br>
    <a href="'.base_url() . 'privacy-policy" style="padding-right:1%;color:blue;">Privacy Policy</a>
    <a href="' . base_url() . 'Terms of Service" style="padding-right:1%;color:blue;" >Terms of Service</a>
    <a style="padding-right:1%;color:blue;"   href="' . base_url() . 'mailUnSubscribed/' . $return_id . ' "> Unsubscribe </a><br><br>
    <p style="width:100%;">© 2021 Sana Skillpromise Education Private Limited. All rights reserved. Skillpromise is a registered trademark of Sana Skillpromise Education Private Limited situated at J – 7/123, Third Floor, Rajouri Garden, New Delhi – 110027, Company Identity Number U74999DL2017PTC322230, PAN Number AAZCS0922P
</p>
 </div>
</center>
</div>';
            $target_email = $email;
            $data['mail_to'] = $email;
        //  $data['mail_to'] = 'jyoti.chopra@lexiconcpl.com';
            $data['subject'] = "Thank you for Subscribing to Skillpromise Email Newsletter";
            $subject = "Thank you for Subscribing to Skillpromise Email Newsletter";
            $data['name_from'] = "Skillpromise";
            $data['message'] = $message_body;
            $bcc = '';
            $data['mail_from'] = "customercare@skillpromise.in";
            $data['cc'] = '';
            $data['bcc'] = $bcc;
            $ch = curl_init();                    // initiate curl
         // $data = http_build_query($data);
            $ch = curl_init();                    // initiate curl
         // $url = "http://166.62.121.164/lexi-mailer/send-mail-V-2.php"; // where you want to post data
            $url = "http://mailer.skillpromise.in/sendGrid"; // where you want to post data
            $headers = 'From: <customercare@skillpromise.in>' . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8";
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
            // $output = curl_exec($ch); // execute
            // curl_close($ch); // close curl handle
            
           if(mail($target_email,$subject,$message_body1,$headers)){
               $f = '';
               $this->load->view('aftersubscribed' , $f);
        }else {
            header('Location: ' . base_url());
        }
        
//         }else{
//     $this->session->set_flashdata('msg','Already Subscribed');
//     $this->load->view('aftersubscribed');
// }        
        
        
        
        }else {
            header('Location: ' . base_url());
        }
        
             return false;
    } else {
           $this->session->set_flashdata('msg','You are already subscribed.'); 
   
         //redirect to home page 
         redirect(''); 
        return true;
    }
  
     
    }
 
     public function test(){
         
         $this->load->view('aftersubscribepage');
     }   
 
//==========Mail Subsciption end=========================
//============Subscribed Mail=========
    public function mailSubscribed($return_id) {
        $data['id'] = $return_id;
        $data['is_mailconfirm'] = 1;
        $result = $this->main_model->add_update_record("news_letter", $data, 'id');
        if($return_id) {
            $fs['chec'] = $return_id;
            $this->load->view('aftersubscribed', $fs);
        } else {
            header('Location: ' . base_url());
        }
    }
    

//============ End Subscribed Mail=========
//============UnSubscribed Mail=========
    public function mailUnSubscribed($return_id) {
         $data['id'] = $return_id;
     //   $data['is_mailconfirm'] = 1;
        $data['status']='inactive';
    
     $result = $this->main_model->add_update_record("news_letter", $data, 'id');
   ///  $result = $this->main_model->add_update_record("unsubscribe_reason", $data, 'id');
        // if ($return_id) {
        //     $f['chec'] = $return_id;
        //     $this->load->view('aftersubscribed', $f);
        // } else {
        //     header('Location: ' . base_url());
        // }
        $fs['return_id'] = $return_id;
        $this->load->view('unsubscribepage' , $fs);
    }
    public function mailUnsubscribedConfirm($subscriber_id){
        $subscriber_id = $_POST['subscriber_id'];
        $reason = $_POST['reason'];
        // $this->db->set($data);
        $data = array(
        'reason'=>$reason);
        $query = $this->main_model->update('news_letter' , $data,array('id'=>$subscriber_id));
    //     $dataa['id'] = $subscriber_id;
    //     $dataa['is_mailconfirm'] = 0;
    //     $result = $this->main_model->add_update_record('news_letter', $dataa, 'id');
    //   $fs['return_id'] = $subscriber_id;
    //     $this->load->view('unsubscribepage' , $fs);
    //       
    //         $fs['return_id'] = $subscriber_id;
    //         $this->load->view('unsubscribepage', $fs);
    //     } else {
    //         header('Location: ' . base_url());
    //     }
    // if($subscriber_id){
    //      $fs['unsubmsg'] = $subscriber_id;
    //  echo "<script>alert('hello')</script>";
    header('Location: ' . base_url("successmailUnSubscribed"));
    // 
    }
public function successmailUnSubscribed()
               {
               $this->load->view('successmailUnSubscribed');
             }
//============ End UnSubscribed Mail=========
//============Category=========
    public function category() {
        $data['id'] = $_POST['id'];
        $data['category'] = $_POST['cat'];
        $result = $this->main_model->add_update_record('news_letter', $data, 'id');
    }

//=====================Category==========================
//=================Wrong Question============================
    public function wrongquestions($node = 0) {
        $user_id = $_SESSION['user_id'];

        $filter[0]['id'] = 'quiz_id';
        $filter[0]['value'] = $node;
        $filter[1]['id'] = 'user_id';
        $filter[1]['value'] = $user_id;
        $filter[2]['id'] = 'is_deleted';
        $filter[2]['value'] = 0;

        $req = array('id');

        $data = $this->main_model->get_many_records('quiz_result', $filter, $req);

//======================Counting the no of rows where user has vistied,marked but no marks is given for that================
        foreach ($data as $row) {
            $sql = "SELECT count(*) as totalwrong from quiz_result_answers WHERE quiz_result_id= $row[id] AND visited=1 AND answered=1 AND marks=0";
            $dataw = $this->db->query($sql)->result_array();
        }

        if (isset($dataw) != '') {
            return $dataw[0]['totalwrong'];
        } else {
            return 0;
        }
    }

//=================end of Wrong Question============================
//===================TOpic and comprehension quiz child=========================================
    public function topicandcomprehchildtwo($nodeid = 0) {

        $totalchild = 0;
        $a = array();

//================Take out login user id from session=====
        $user_id = $_SESSION['user_id'];
//===================Take out login user id from session=====
//===================Taking out child of the node id given===
        $filter[0]['id'] = 'parent_id';
        $filter[0]['value'] = $nodeid;
        $filter[1]['id'] = 'is_deleted';
        $filter[1]['value'] = 0;

        $req = array('id');
        $datac = $this->main_model->get_many_records('node', $filter, $req);
//        echo '<pre>';
//        print_r($datac);
//        die;
        if (!empty($datac)) {
//=========================Taking out child of parent id from node table====================
            foreach ($datac as $reca) {

                $filter[0]['id'] = 'parent_id';
                $filter[0]['value'] = $reca['id'];
                $filter[1]['id'] = 'is_deleted';
                $filter[1]['value'] = 0;

                $req = array('id');
                $datacd = $this->main_model->get_many_records('node', $filter, $req);

//========================Checking if there is no child of the parent=======================
                if (empty($datacd)) {
                    foreach ($datac as $child) {

                        $sql4 = "SELECT quiz_id,count(id) as totalchild from quiz_result where quiz_id = $child[id] and user_id=$user_id and is_deleted = 0";
                        $datacz = $this->db->query($sql4)->result_array();
//                        echo '<pre>';
//                        print_r($datacz);
//                        die;
                        foreach ($datacz as $tyu) {
                            $a[] = $tyu;
                        }
                    }
                } else {
                    foreach ($datacd as $child) {
                        $sql4 = "SELECT quiz_id,count(id) as totalchild from quiz_result where quiz_id = $child[id] and user_id=$user_id and is_deleted = 0";
                        $datacz = $this->db->query($sql4)->result_array();
//                        echo '<pre>';
//                        print_r($datacz);
//                        die;
                        foreach ($datacz as $tyu) {
                            $a[] = $tyu;
                        }
                    }
                }
            }

            $new_array = array_values(array_unique($a, SORT_REGULAR));

//=================Checking if there is no child of the parent=====================
//=================Removing Duplicate elements from array==========================
            if (empty($datacd)) {
                $sumchild = 0;
                for ($i = 0; $i < count($new_array); $i++) {
                    $sumchild += array_unique($new_array, SORT_REGULAR)[$i]['totalchild'];
                }
            } else {
                $sumchild = 0;
                for ($i = 0; $i < count($new_array); $i++) {
                    $sumchild += $new_array[$i]['totalchild'];
                }
            }

//============================Removing Duplicate elements from an array======================
            if ($datacz != '') {
                return $sumchild;
            } else {
                return 0;
            }
        } else {
            $sql4 = "SELECT count(id) as childs from quiz_result where quiz_id = $nodeid  and user_id=$user_id and is_deleted = 0";
            $childs = $this->db->query($sql4)->result_array();

//================Checking if the array is empty or not=================
            if ($childs != '') {
                return $childs[0]['childs'];
            } else {
                return 0;
            }
        }
    }

    public function get_node_child($node_id = 0) {
        $user_id = $_SESSION['user_id'];
        $filter[0]['id'] = 'parent_id';
        $filter[0]['value'] = $node_id;
        $filter[1]['id'] = 'is_deleted';
        $filter[1]['value'] = 0;
        $filter[2]['id'] = 'type';
        $filter[2]['value'] = "Quiz";


        $req = array('id');
        $child_node = $this->main_model->get_many_records('node', $filter, $req);

        if (!empty($child_node)) {
            $AllChildNode = $child_node;
            $NextParentNode = $child_node;
        } else {
            $filter3[0]['id'] = 'node';
            $filter3[0]['value'] = $node_id;
            $filter3[1]['id'] = 'is_deleted';
            $filter3[1]['value'] = 0;


            $req = array('id');
            $quiz_ids = $this->main_model->get_many_records('quiz', $filter3, $req);

            $quiz_result_id = 0;
            if (!empty($quiz_ids) && isset($quiz_ids)) {
                foreach ($quiz_ids as $quiz_id) {

                    $sql = "SELECT id from quiz_result where quiz_id = $quiz_id[id]  and user_id=$user_id and is_deleted = 0 and submit_time!=''";
                    $quiz_result_id += $this->db->query($sql)->num_rows;
                }
            }

            return $quiz_result_id;
        }

        while (!empty($NextParentNode) && isset($NextParentNode)) {
            foreach ($NextParentNode as $key => $nextChild) {
                $filter2[0]['id'] = 'parent_id';
                $filter2[0]['value'] = $nextChild['id'];
                $filter2[1]['id'] = 'is_deleted';
                $filter2[1]['value'] = 0;
                $filter2[2]['id'] = 'type';
                $filter2[2]['value'] = "Quiz";


                $req = array('id');
                $Nextchild_node = $this->main_model->get_many_records('node', $filter2, $req);

                if (!empty($Nextchild_node)) {
                    $AllChildNode = array_merge($AllChildNode, $Nextchild_node);
                    $NextParentNode = array_merge($Nextchild_node, $NextParentNode);
                }
                unset($NextParentNode[$key]);
            }
        }
        $sortedChilds = array_values(array_unique($AllChildNode, SORT_REGULAR));

        $quiz_ids = array();
        if (!empty($sortedChilds) && isset($sortedChilds)) {

            foreach ($sortedChilds as $node) {

                $filter3[0]['id'] = 'node';
                $filter3[0]['value'] = $node['id'];
                $filter3[1]['id'] = 'is_deleted';
                $filter3[1]['value'] = 0;


                $req = array('id');
                $r = $this->main_model->get_many_records('quiz', $filter3, $req);
                if (!empty($r)) {
                    $quiz_ids[] = $r[0];
                }
            }
        }
        $quiz_result_id = 0;
        if (!empty($quiz_ids) && isset($quiz_ids)) {
            foreach ($quiz_ids as $quiz_id) {

                $sql = "SELECT id from quiz_result where quiz_id = $quiz_id[id]  and user_id=$user_id and is_deleted = 0 and submit_time!=''";
                $quiz_result_id += $this->db->query($sql)->num_rows;
            }
        }
        return $quiz_result_id;
    }

//===========================================================
//====================Sub_question_category_list=========================================
    public function subnodeslist($quiz_id = 0) {

        $user_id = $_SESSION['user_id'];
        $query_str1 = 'SELECT category.id as category_id, category.name as category_name, COUNT(questions.category) as no_of_questions FROM questions JOIN category ON questions.category = category.id
                       WHERE questions.quiz_id = ' . $quiz_id . ' AND questions.status = "Active" AND questions.is_deleted = 0 GROUP BY category.id';
        $quiz['category'] = $this->db->query($query_str1)->result_array();

        $key = 'category_id';
        $searchdata = $this->array_column_recursive($quiz, $key);
        $sum = count($searchdata);
        $quiz['cat_total'] = $sum;

//        echo '<pre>';
//        print_r($quiz);
//        die;
        if (!empty($quiz)) {
            return $quiz;
        } else {
            return 0;
        }
    }

    public function array_column_recursive(array $haystack, $needle) {
        $found = [];
        array_walk_recursive($haystack, function($value, $key) use (&$found, $needle) {
            if ($key == $needle) {
                $found[] = $value;
            }
        });
        return $found;
    }

//===========================SUbnodelist===============================================
//===================Overallscorestate===========================================
    public function overallscorestate($node = 0) {
        $user_id = $_SESSION['user_id'];
        $states = $this->main_model->get_name_from_id('registration', 'state', $user_id, 'user_id');

//=====================Finding all the user's id who live in same city as login user==============================
        $filter[0]['id'] = 'state';
        $filter[0]['value'] = $states;
        $filter[1]['id'] = 'user_id';
        $filter[1]['value'] = $user_id;
        $filter[2]['id'] = 'is_deleted';
        $filter[2]['value'] = 0;

        $req = array('user_id');
        $user = $this->main_model->get_many_records('registration', $filter, $req);

//======================To Check if other user are present or not more than the login user==========================
        if (count($user) > 1) {

            foreach ($user as $rec) {
                $filter7[0]['id'] = 'user_id';
                $filter7[0]['value'] = $rec['user_id'];
                $filter7[1]['id'] = 'quiz_id';
                $filter7[1]['value'] = $node;
                $filter7[2]['id'] = 'is_deleted';
                $filter7[2]['value'] = 0;

                $req1 = array('scored_marks');

                $marks = $this->main_model->get_many_records('quiz_result', $filter7, $req1);


                foreach ($marks as $inmarks) {

                    $score[] = $inmarks;
                }
            }

            $summarks = 0;
            for ($i = 0; $i < count($score); $i++) {
                $summarks += $score[$i]['scored_marks'];
            }

            $avgstate = $summarks / count($score);

            if ($summarks != '') {
                return $avgstate; //returning average of all scores
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

//===============Overallscorestate===============================================
//==================Overallscore nation=================================

    public function overallscorenation($node = 0) {
        $user_id = $_SESSION['user_id'];
        $nation = $this->main_model->get_name_from_id('registration', 'country', $user_id, 'user_id');

//===================Finding all the user's id who live in same city as login user======
        $filter[0]['id'] = 'country';
        $filter[0]['value'] = $nation;
        $filter[1]['id'] = 'user_id';
        $filter[1]['value'] = $user_id;
        $filter[2]['id'] = 'is_deleted';
        $filter[2]['value'] = 0;

        $req = array('user_id');
        $user = $this->main_model->get_many_records('registration', $filter, $req);

//==========================To Check if other user are present or not more than the login user==========================
        if (count($user) > 1) {
            foreach ($user as $rec) {
                $filter7[0]['id'] = 'user_id';
                $filter7[0]['value'] = $rec['user_id'];
                $filter7[1]['id'] = 'quiz_id';
                $filter7[1]['value'] = $node;
                $filter7[2]['id'] = 'is_deleted';
                $filter7[2]['value'] = 0;

                $req1 = array('scored_marks');

                $marks = $this->main_model->get_many_records('quiz_result', $filter7, $req1);

                foreach ($marks as $inmarks) {

                    $score[] = $inmarks;
                }
            }

            $summarks = 0;
            for ($i = 0; $i < count($score); $i++) {
                $summarks += $score[$i]['scored_marks'];
            }

            $avgnation = $summarks / count($score);



            if ($summarks != '') {
                return $avgnation; //returning average of all scores
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

//==================Overallscore nation=============================================
//====================Overallscorecollege============================================================

    public function overallscorecollege($node = 0) {
        $user_id = $_SESSION['user_id'];
        $college = $this->main_model->get_name_from_id('registration', 'org_name', $user_id, 'user_id');

//=================Finding all the user's id who live in same city as login user==================
        $filter[0]['id'] = 'org_name';
        $filter[0]['value'] = $college;
        $filter[1]['id'] = 'category';
        $filter[1]['value'] = 'College';
        $filter[2]['id'] = 'user_id';
        $filter[2]['value'] = $user_id;
        $filter[3]['id'] = 'is_deleted';
        $filter[3]['value'] = 0;


        $req = array('user_id');
        $user = $this->main_model->get_many_records('registration', $filter, $req);

//==================To Check if other user are present or not more than the login user==========================
        if (count($user) > 1) {

            foreach ($user as $rec) {
                $filter7[0]['id'] = 'user_id';
                $filter7[0]['value'] = $rec['user_id'];
                $filter7[1]['id'] = 'quiz_id';
                $filter7[1]['value'] = $node;
                $filter7[2]['id'] = 'is_deleted';
                $filter7[2]['value'] = 0;

                $req1 = array('scored_marks');

                $marks = $this->main_model->get_many_records('quiz_result', $filter7, $req1);

                foreach ($marks as $inmarks) {

                    $score[] = $inmarks;
                }
            }


            $summarks = 0;
            for ($i = 0; $i < count($score); $i++) {
                $summarks += $score[$i]['scored_marks'];
            }
            $avgclg = $summarks / count($score);



            if ($summarks != '') {
                return $avgclg; //returning average of all scores
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

//===================Overallscorecollege================================================
//==================Average score of user's city========
    public function overallscorecity($node = 0) {
        $user_id = $_SESSION['user_id'];
        $city = $this->main_model->get_name_from_id('registration', 'city', $user_id, 'user_id');

//===================Finding all the user's id who live in same city as login user======
        $filter[0]['id'] = 'city';
        $filter[0]['value'] = $city;
        $filter[1]['id'] = 'user_id';
        $filter[1]['value'] = $user_id;
        $filter[2]['id'] = 'is_deleted';
        $filter[2]['value'] = 0;

        $req = array('user_id');
        $users = $this->main_model->get_many_records('registration', $filter, $req);

//=======================To Check if other user are present or not more than the login user==========================
        if (count($users) > 1) {
            foreach ($users as $rec) {
                $filter7[0]['id'] = 'user_id';
                $filter7[0]['value'] = $rec['user_id'];
                $filter7[1]['id'] = 'quiz_id';
                $filter7[1]['value'] = $node;
                $filter7[2]['id'] = 'is_deleted';
                $filter7[2]['value'] = 0;

                $req1 = array('scored_marks');

                $marks = $this->main_model->get_many_records('quiz_result', $filter7, $req1);


                foreach ($marks as $inmarks) {

                    $score[] = $inmarks;
                }
            }


            $summarks = 0;
            for ($i = 0; $i < count($score); $i++) {
                $summarks += $score[$i]['scored_marks'];
            }
            $avgcity = $summarks / count($score);


            if ($summarks != '') {
                return $avgcity; //returning average of all scores
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

//============================ Average score per city ======================================
//===================header menu child count=========================================

    public function headertotalchild($node = 0) {
        $totalchild = 0;
        $a = array();
//============Take out login user id from session=====
        $user_id = $_SESSION['user_id'];
//===========Take out login user id from session=====
//==========Taking out child of the node id given===
        $filter[0]['id'] = 'parent_id';
        $filter[0]['value'] = $node;
        $filter[1]['id'] = 'is_deleted';
        $filter[1]['value'] = 0;

        $req = array('id');
        $datac = $this->main_model->get_many_records('node', $filter, $req);


        if (!empty($datac)) {
//=========================Taking out child of parent id from node table====================
            foreach ($datac as $reca) {

                $filter[0]['id'] = 'parent_id';
                $filter[0]['value'] = $reca['id'];
                $filter[1]['id'] = 'is_deleted';
                $filter[1]['value'] = 0;

                $req = array('id');
                $datacd = $this->main_model->get_many_records('node', $filter, $req);


                foreach ($datacd as $valu) {
                    $filter[0]['id'] = 'parent_id';
                    $filter[0]['value'] = $valu['id'];
                    $filter[1]['id'] = 'is_deleted';
                    $filter[1]['value'] = 0;

                    $req = array('id');
                    $datacv = $this->main_model->get_many_records('node', $filter, $req);
//========================Checking if there is no child of the parent=======================
                    if (empty($datacv)) {
                        foreach ($datacd as $child) {

                            $sql4 = "SELECT quiz_id, count(id) as totalchild from quiz_result where quiz_id = $child[id] and user_id = $user_id and is_deleted = 0";
                            $datacz = $this->db->query($sql4)->result_array();

                            foreach ($datacz as $tyu) {
                                $a[] = $tyu;
                            }
                        }
                    } else {
                        foreach ($datacv as $child) {
                            $sql4 = "SELECT quiz_id, count(id) as totalchild from quiz_result where quiz_id = $child[id] and user_id = $user_id and is_deleted = 0";
                            $datacz = $this->db->query($sql4)->result_array();


                            foreach ($datacz as $tyu) {
                                $a[] = $tyu;
                            }
                        }
                    }
                }
            }

            $new_array = array_values(array_unique($a, SORT_REGULAR));

//=================Checking if there is no child of the parent=====================
//=================Removing Duplicate elements from array==========================
            if (empty($datacv)) {
                $sumchild = 0;
                for ($i = 0; $i < count($new_array); $i++) {
                    $sumchild += array_unique($new_array, SORT_REGULAR)[$i]['totalchild'];
                }
            } else {
                $sumchild = 0;
                for ($i = 0; $i < count($new_array); $i++) {
                    $sumchild += $new_array[$i]['totalchild'];
                }
            }

//============================Removing Duplicate elements from an array======================
            if ($datacz != '') {
                return $sumchild;
            } else {
                return 0;
            }
        } else {
            $sql4 = "SELECT count(id) as childs from quiz_result where quiz_id = $node and user_id = $user_id and is_deleted = 0";
            $childs = $this->db->query($sql4)->result_array();

//================Checking if the array is empty or not=================
            if ($childs != '') {
                return $childs[0]['childs'];
            } else {
                return 0;
            }
        }
    }

//===================header menu child count=========================================
//==============endchild==========================================
    public function endchild($nodeid = 0) {
//================To get all quizzes given by the user===============
        $user_id = $_SESSION['user_id'];
        $sql4 = "SELECT count(id) as childs from quiz_result where quiz_id = $nodeid and user_id = $user_id and is_deleted = 0";
        $childs = $this->db->query($sql4)->result_array();

//================Checking if the array is empty or not=================
        if ($childs != '') {
            return $childs[0]['childs'];
        } else {
            return 0;
        }
    }

//===================endchild=================================
//====================candidatemarks=====================================
    public function candidatemarks($node = 0) {



        $user_id = $_SESSION['user_id'];

        $filter[0]['id'] = 'quiz_id';
        $filter[0]['value'] = $node;
        $filter[1]['id'] = 'user_id';
        $filter[1]['value'] = $user_id;
        $filter[2]['id'] = 'is_deleted';
        $filter[2]['value'] = 0;

        $req = array('scored_marks');
        $data = $this->main_model->get_many_records('quiz_result', $filter, $req);


        if (!empty($data)) {
            return $data[0]['scored_marks'];
        } else {
            return 0;
        }
    }

//=========================candidatemarks==========================================
////end
//===========================Payment Details=======================================
    public function add_cart() {
        $insert_data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => 1
        );
//        echo "<pre>";
//        print_r($insert_data);
//        die;
// This function add items into cart.
        $output = $this->cart->insert($insert_data);
        header('Location: ' . base_url() . 'my_cart');
    }

    public function remove_cart($rowid) {
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
// Check rowid value.
        if ($rowid == "all") {
// Destroy data which store in  session.
            $this->cart->destroy();
        } else {
            ;
// Destroy selected rowid in session.
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
// Update cart data, after cancle.
            $this->cart->update($data);
        }
        if ($this->cart->total_items() >= 1) {
            header('Location: ' . base_url() . 'my_cart');
        } else {
            header('Location: ' . base_url());
        }
    }

    public function validate() {
        //ALTER TABLE `users` ADD `user_name` VARCHAR(255) NOT NULL AFTER `id`;
//ALTER TABLE `users` ADD UNIQUE(`user_name`);"
        $r = $this->main_model->get_records_from_id('users', $_POST['data'], $_POST['type']);
        if (!empty($r)) {
            $err = 1;
        } else {
            $err = 0;
        }
        echo $err;
        die;
    }

    public function get_package($package_id) {
        switch ($package_id) {
            case 1:
                $this->load->view("sana-for-school", $package_id);
//                header('Location: ' . base_url() . "sana-for-school" . "/" . $package_id);
                break;
            case 2:
                $this->load->view("sana-for-professionals", $package_id);
//                header('Location: ' . base_url() . "sana-for-professionals" . "/" . $package_id);
                break;
            case 3:
                $this->load->view("sana-for-higher", $package_id);
//                header('Location: ' . base_url() . "sana-for-higher" . "/" . $package_id);
                break;
        }
    }

    public function get_node($package_id) {
        
    }

    public function my_cart() {
        $this->load->view('my-cart');
    }

    public function checkout() {
        if ($this->cart->total_items()) {
            $this->load->view('UserRegPart1');
        } else {
            header('Location: ' . base_url());
        }
    }

    public function UserRegPart2() {
        $insert = array();
        $insert["fname"] = $_POST["fname"];
        $insert["lname"] = $_POST["lname"];
        $insert["email"] = $_POST["email"];
        $insert["user_name"] = $_POST["user_name"];
        $insert["password"] = $_POST["password"];
        $insert["category"] = $_POST["category"];
        $insert["created_by"] = $_SESSION['user_id'];
        $insert["created_date"] = date('Y-m-d H:i:s');
//        $_POST['created_by'] = $_SESSION['user_id'];
//        $_POST['created_date'] = date('Y-m-d H:i:s');
        $data['id'] = $this->main_model->add_update_record('registration', $insert);
//        $data['total_amount'] = $_POST["total_amount"];
//        $view = "ProRegPart2";
//        $data['id'] = 1;
        switch ($_POST['category']) {
            case'School':
                $view = "SchoolRegPart2";
                break;
            case 'College':
                $view = "CollegeRegPart2";
                break;
            case 'Professionals':
                $view = "ProRegPart2";
                break;
        }
        $this->load->view($view, $data);
    }

    public function UserRegPart3() {
        $cart_details = $this->cart->contents();
        foreach ($cart_details as $key => $value) {
            
        }
        $package_id = $value["id"];
        $reg_id = $_POST["id"];
        $data["id"] = $_POST["id"];
        $data["org_name"] = $_POST["org_name"];
        $data["city"] = $_POST["city"];
        $data["state"] = $_POST["state"];
        $data["country"] = $_POST["country"];
        $data["class"] = $_POST["class"];
        $data["phone"] = $_POST["phone"];
        $data["stream"] = $_POST["stream"];
        $data["other_stream"] = $_POST["other_stream"];
        $data["course"] = $_POST["course"];
        $data["other_course"] = $_POST["other_course"];
        $data["course"] = $_POST["course"];
        switch ($_POST["specialization_area_parent"]) {
            case 1:
                $_POST["specialization_area_parent"] = "Engineering";
                break;
            case 2:
                $_POST["specialization_area_parent"] = "Management";
                break;
            case 3:
                $_POST["specialization_area_parent"] = "Science";
                break;
            case 4:
                $_POST["specialization_area_parent"] = "Humanities";
                break;
            case 5:
                $_POST["specialization_area_parent"] = "Law";
                break;
            case 6:
                $_POST["specialization_area_parent"] = "Healthcare";
                break;
            case 7:
                $_POST["specialization_area_parent"] = "Hotel Management";
                break;
            case 8:
                $_POST["specialization_area_parent"] = "Commerce";
                break;
            case 9:
                $_POST["specialization_area_parent"] = "Journalism and Mass Communication";
                break;
        }
        $data["specialization_area_parent"] = $_POST["specialization_area_parent"];
        $data["specialization_area_child"] = $_POST["specialization_area_child"];
        $data["dob"] = date('Y-m-d H:i:s', strtotime($_POST['dob']));
        $this->main_model->add_update_record('registration', $data, "id");
        $details["id"] = $_POST["id"];
        if ($_POST["payment_method"] == "online_payment") {
            $this->automatic($package_id, $reg_id);
//            $this->requestMerchant($package_id, $reg_id);
        } else {
            $this->UserRegPart3_of_2($details);
        }
    }

    public function UserRegPart3_of_2($reg) {
        $pack_details["reg_id"] = $_POST["id"];
//        $pack_details["total_amount"] = $_POST["total_amount"];
        $this->load->view('UidRegPart', $pack_details);
    }

//    for payment gateway
//    public function requestMerchant($package = 0, $reg = 0, $payment_id = 0) {
//
//        $this->url = $this->Url;
//        $url_payment = $this->url . $payment_id;
//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_URL, $url_payment);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//        curl_setopt($ch, CURLOPT_USERPWD, 'rzp_test_jkNt9TKk2upOcG' . ':' . 'JLLqBB8Tb3L7ycF8GXKeom7n');
//
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//
//        $result = curl_exec($ch);
//        $response = json_decode($result);
//        if (curl_errno($ch)) {
//            echo 'Error:' . curl_error($ch);
//        }
//        curl_close($ch);
//    }

    function writeLog($data) {
        $fileName = date("Y-m-d") . ".txt";
        $fp = fopen("log/" . $fileName, 'a+');
        $data = date("Y-m-d H:i:s") . " - " . $data;
        fwrite($fp, $data);
        fclose($fp);
    }

    public function payment_details($package = 0, $reg = 0, $payment_id = 0) {

        $this->url = $this->Url;
        $url_payment = $this->url . $payment_id;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url_payment);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_USERPWD, 'rzp_test_ZIuKMztAVE02xK' . ':' . 'fUXTgRoX6FjqoevTspjWe5yu');

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        $response = json_decode($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $_POST['atom_txn_id'] = $response->id;
        $_POST['email'] = $response->email;
        $_POST['mobile'] = $response->contact;
        $_POST['card_number'] = $response->card_id;
        $_POST['amt'] = (($response->amount) / 100);
        $_POST['date'] = date('Y-m-d H:i:s');

        if (isset($response)) {
            $_POST['description'] = $_POST['desc'] = 'Transaction Success';
//            $receipt_data['txn_status'] = 'Successfully Transaction';
        }

        unset($_POST['mmp_txn']);
        unset($_POST['CardNumber']);
//        unset($_POST['udf9']);
//        unset($_POST['udf1']);
        unset($_POST['udf2']);
        unset($_POST['udf3']);
//        unset($_POST['udf4']);
//        unset($_POST['udf5']);
//        unset($_POST['udf6']);
        unset($_POST['desc']);
        $_POST['participant_id'] = $reg;
//        echo "<pre>";
//        print_r($_POST);
//        die;
        $return_data = $this->main_model->add_update_record('payment_details', $this->input->post());

        if (!empty($return_data) && $response->status == 'captured') {
            $cart_details = $this->cart->contents();
            // echo "<pre>";
            // print_r($cart_details);
            // die;
            $user_reg_details = array();
            $user_details = $this->main_model->get_records_from_id('registration', $reg, 'id');
            // echo "<pre>";
            // print_r($user_details);
            // die;
            $user_reg_details["user_name"] = $user_details["user_name"];
            $user_reg_details["email"] = $user_details["email"];
            $user_reg_details["name"] = $user_details["fname"] . " " . $user_details["lname"];
            $user_reg_details["password"] = md5($user_details["password"]);
            $user_reg_details["address"] = $user_details["city"] . "," . $user_details["state"] . "," . $user_details["country"];
            $user_reg_details["mobile"] = $user_details["phone"];
            $user_reg_details["dob"] = $user_details["dob"];
            $user_reg_details["scu"] = $user_details["category"];
            $user_reg_details["course"] = $user_details["course"];
            $user_reg_details["stream"] = $user_details["specialization_area_parent"];
            $user_reg_details['created_date'] = date('Y-m-d H:i:s');
            $user_reg_details['created_by'] = $_SESSION['user_id'];
            $user_reg_details['modify_by'] = $_SESSION['user_id'];
            $user_reg_details['role'] = 1;
            $user_reg_details['status'] = 'Inactive';
            $user = $this->main_model->add_update_record('users', $user_reg_details);
            $this->couponGenerator($type = "set", $no_of_code = 1, $user);
            $roles_users["users"] = $user;
            $roles_users["roles"] = 1;
            $roles_users['created_date'] = date('Y-m-d H:i:s');
            $roles_users['created_by'] = $_SESSION['user_id'];
            $roles_users['modify_by'] = $_SESSION['user_id'];
            $roles_users = $this->main_model->add_update_record('roles-users', $roles_users);
            foreach ($cart_details as $key => $value) {
                $package = $value["id"];
                $data['reference_payment_id'] = $return_data;
                $data['users'] = $user;
                $data['package'] = $package;
                $data['is_paid'] = "1";
                $day = $this->main_model->get_name_from_id('packages', 'duration', $package);
                $data['validity'] = date('Y-m-d', strtotime("+" . $day . " days"));
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['created_by'] = $_SESSION['user_id'];
                $mail_data = $this->main_model->add_update_record('users-package', $data);
                array_push($_SESSION['packages'], $package);
                $update_data = array(
                    'packages' => $package
                    );
                $this->main_model->update('users',$update_data,array('id' => $user));
            }
            $this->registrationMail($mail_data);
            $_SESSION['msg_hdr'] = "Thank you!!";
            $_SESSION['msg_str'] .= 'Payment Successfully Completed..<br> Please check your mail to confirm registration.';
            header('Location: ' . base_url() . "print_receipt_new/" . $user . "/" . $return_data);die;
        } else {
            $_SESSION['msg_str'] .= 'Payment is not completed..';
               header('Location: ' . base_url());die;
        }
//        $_SESSION['msg_hdr'] = "Alert !";
        
    }

    public function report_date_range() {
//        $from_date = "17-07-2019";
//        $to_date = "24-07-2019";
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $sql = ("SELECT id,participant_id,atom_txn_id,coupon_id,amt,coupon_amt,date,description FROM `payment_details` WHERE `payment_details`.is_deleted = 0 AND `payment_details`.date >= '$from_date' AND `payment_details`.date <= '$to_date'" );
        //echo $sql;die;
        $result = $this->db->query($sql)->result_array();
        $i = 1;
        foreach ($result as $key => $value) {
            $user_data = $this->main_model->get_records_from_id("users-package", $value["id"], "reference_payment_id");
            $user_id = $user_data["users"];
            $user_name = $this->main_model->get_name_from_id("users", "name", $user_id, "id");
            echo '<tr>';
            echo '<td class="text-center">' . $i . '</td>';
            if (!empty($user_name)) {
                echo '<td class="text-center">' . $user_name . '</td>';
            } else {
                $reg_id = $this->main_model->get_name_from_id('payment_details', 'participant_id', $value['id'], "id");
                $user_name = $this->main_model->get_name_from_id('registration', 'fname', $reg_id, "id") . " " . $this->main_model->get_name_from_id('registration', 'lname', $reg_id, "id");
                echo '<td class="text-center">' . $user_name . '</td>';
            }
            echo '<td class="text-center">' . $value["atom_txn_id"] . '</td>';
            echo '<td class="text-center">' . $value["coupon_id"] . '</td>';
            echo '<td class="text-center">' . $value["amt"] . '</td>';
            echo '<td class="text-center">' . $value["coupon_amt"] . '</td>';
            echo '<td class="text-center">' . $value["description"] . '</td>';
            echo '<td class="text-center">' . $value["date"] . '</td>';
            echo '</tr>';
            $i++;
        }
    }

////end
//===================================Coupon code generator============================================//
    public function unique_code_applied() {
        $total = array();
        $cart_details = $this->cart->contents();
        foreach ($cart_details as $key => $value) {
            $total["price"] += $value["price"];
        }
        $gst = ((($total["price"]) * 18) / 100);
        $total_amount = (($total["price"]) + $gst);
        $filter[0]['id'] = 'code';
        $filter[0]['value'] = $_POST['coupon'];
        $filter[1]['id'] = 'status';
        $filter[1]['value'] = 'Unused';
        $filter[2]['id'] = 'validity >=';
        $filter[2]['value'] = date('Y-m-d');
        $coupon_code = $this->main_model->get_many_records('coupon_code', $filter, array('*'), "");
        if ($coupon_code[0]["amount"] == $total_amount) {
            echo "yes";
        } else {
            echo "no";
        }
    }

    public function unique_code_verification() {
//        $_SESSION['user_id'] = $_POST['userid'];
        $total = array();
        $cart_details = $this->cart->contents();
        foreach ($cart_details as $key => $value) {
            $total["price"] += $value["price"];
        }
        $filter[0]['id'] = 'code';
        $filter[0]['value'] = $_POST['coupon'];
        $filter[1]['id'] = 'status';
        $filter[1]['value'] = 'Unused';
        $filter[2]['id'] = 'validity >=';
        $filter[2]['value'] = date('Y-m-d');
        $coupon_code = $this->main_model->get_many_records('coupon_code', $filter, array('*'), "");
//        echo "<pre>";
//        print_r($coupon_code);
        $_POST['price'] = $coupon_code[0]["amount"];
        $_POST['due'] = $total["price"];
//        $_POST['due'] = $this->main_model->get_name_from_id('packages', "price", $_POST["id"], "id");
//        die;
        $return = array();
        $return['c_amt'] = $return['coupon_id'] = 0;
        if (!empty($coupon_code)) {
            $update['id'] = $coupon_code[0]['id'];
//            $update['status'] = 'Process';
            $this->main_model->add_update_record('coupon_code', $update, 'id');
            $return['res'] = 1;
            $return['coupon_id'] = $coupon_code[0]['id'];
            $gst = (($_POST['due'] * 18) / 100);
            if ($coupon_code[0]['type'] == 'percentage') {
                $return['c_amt'] = $deduct = $_POST['due'] * ($coupon_code[0]['amount'] / 100);
                $return['due'] = $_POST['price'] - $deduct;
            } else {
                $return['c_amt'] = $coupon_code[0]['amount'];
                $return['due'] = (($_POST['due'] + $gst) - $coupon_code[0]['amount']);
            }
        } else {
            $return['res'] = 0;
        }
//        echo "<pre>";
//        print_r($return);
//        die;
        if ($return['due'] == 0) {
            $update['id'] = $coupon_code[0]['id'];
            $update['status'] = 'Used';
            $this->main_model->add_update_record('coupon_code', $update, 'id');
            $post['participant_id'] = $_POST["reg_id"];
            $post['coupon_id'] = $return['coupon_id'];
            $post['amt'] = $return['due'];
            $post['coupon_amt'] = $return['c_amt'];
            $post['description'] = "Transction Success";
            $post['date'] = date('Y-m-d H:i:s');
            $return_data = $this->main_model->add_update_record('payment_details', $post);
            $f = 0;
            $package = $value["id"];
            if (!empty($return_data)) {
                $f = 1;
                $user_reg_details = array();
                $user_details = $this->main_model->get_records_from_id('registration', $_POST["reg_id"], 'id');
                $user_reg_details["user_name"] = $user_details["user_name"];
                $user_reg_details["email"] = $user_details["email"];
                $user_reg_details["name"] = $user_details["fname"] . " " . $user_details["lname"];
                $user_reg_details["password"] = md5($user_details["password"]);
                $user_reg_details["address"] = $user_details["city"] . "," . $user_details["state"] . "," . $user_details["country"];
                $user_reg_details["mobile"] = $user_details["phone"];
                $user_reg_details["dob"] = $user_details["dob"];
                $user_reg_details['created_date'] = date('Y-m-d H:i:s');
                $user_reg_details['created_by'] = $_SESSION['user_id'];
                $user_reg_details['modify_by'] = $_SESSION['user_id'];
                $user_reg_details['role'] = 1;
                $user_reg_details['status'] = 'Inactive';
                $user = $this->main_model->add_update_record('users', $user_reg_details);
                $this->couponGenerator($type = "set", $no_of_code = 1, $user);
                $roles_users["users"] = $user;
                $roles_users["roles"] = 1;
                $roles_users['created_date'] = date('Y-m-d H:i:s');
                $roles_users['created_by'] = $_SESSION['user_id'];
                $roles_users['modify_by'] = $_SESSION['user_id'];
                $roles_users = $this->main_model->add_update_record('roles-users', $roles_users);
                if ($user) {
                    $package2 = array();
                    foreach ($cart_details as $key => $value) {
                        $package2 = $value["id"];
                        $data['reference_payment_id'] = $return_data;
                        $data['users'] = $user;
                        $data['package'] = $package2;
                        $data['is_paid'] = "1";
                        $day = $this->main_model->get_name_from_id('packages', 'duration', $package2);
                        $data['validity'] = date('Y-m-d', strtotime("+" . $day . " days"));
                        $data['created_date'] = date('Y-m-d H:i:s');
                        $data['created_by'] = $_SESSION['user_id'];
                        $mail_data = $this->main_model->add_update_record('users-package', $data);
//                $customer = $this->main_model->get_name_from_id('users', 'customer', $_SESSION['user_id'], 'id');
//                $p = $this->main_model->get_name_from_id('customer', 'packages', $customer, 'id');
//                $data2['packages'] = ($p - 1);
//                $data2['id'] = $customer;
//                $quiz_story_id = $this->main_model->add_update_record('customer', $data2, 'id');
//                array_push($_SESSION['packages'], $package);
                    }
                }
                $this->registrationMail_student($mail_data);
//                $_SESSION['msg_str'] .= 'Payment Successfully Completed..';
                header('Location: ' . base_url() . 'sucess');
            }
        } else {
            $update['id'] = $coupon_code[0]['id'];
            $update['status'] = 'Unused';
            $this->main_model->add_update_record('coupon_code', $update, 'id');
            $update_reg["is_deleted"] = 1;
            $update_reg["id"] = $_POST["reg_id"];
            $this->main_model->add_update_record('registration', $update_reg, "id");
            $_SESSION['msg_hdr'] = 'info!';
            $_SESSION['msg_str'] .= "Coupon Invalid !";
            header('Location: ' . base_url() . 'UserRegPart3_of_2');
        }
    }

    public function couponGenerator($type, $no_of_code, $user) {
//        $type = "set";
//        $no_of_code = 1;
//        $user = 31;
        $customer = $_SESSION['user_id'];
        switch ($type) {
            case 'manage':
                $query = $this->main_model->get_records('coupon_code', 'customer', $customer);
                $result['data'] = $query->result_array();
                $this->load->view('couponGenerator', $result);
                break;
            case 'set':
                $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                if (!empty($_POST['no_of_code'])) {
                    $no = $_POST['no_of_code'];
                    unset($_POST['no_of_code']);
                    for ($j = 1; $j <= $no; $j++) {
                        $code_length = 6;
                        $code = "";
                        for ($i = 0; $i < $code_length; $i++) {
                            $code .= $characters[mt_rand(0, strlen($characters) - 1)];
                        }
                        $key = $this->codeGenerate($code . $j . time());

                        $_POST['code'] = $key;
                        $_POST['validity'] = date('Y-m-d', strtotime($_POST['validity']));
                        $_POST['created_date'] = date('Y-m-d H:i:s');
                        $_POST['created_by'] = $_SESSION['user_id'];
                        $_POST['customer'] = $_SESSION['user_id'];
//                    echo '<pre>';
//                    echo $no;
//                    print_r($_POST);
//                    die;
                        $this->main_model->add_update_record('coupon_code', $_POST);
                    }
                } else {
                    $no = $no_of_code;
                    unset($no_of_code);
                    for ($j = 1; $j <= $no; $j++) {
                        $code_length = 6;
                        $code = "";
                        for ($i = 0; $i < $code_length; $i++) {
                            $code .= $characters[mt_rand(0, strlen($characters) - 1)];
                        }
                        $key = $this->codeGenerate($code . $j . time());

                        $_user_update['mail_confirm_token'] = $key;
                        $_user_update['id'] = $user;
                        $this->main_model->add_update_record('users', $_user_update, 'id');
                    }
                }
//                $_SESSION['msg_str'] .= 'Saved Successfully';
//                $_SESSION['msg_hdr'] = 'info!';
                header('Location: ' . base_url() . 'couponGenerator/manage');
                break;
        }
    }

    //    for Activation key
    function codeGenerate($name = "") {
        $keylen = $this->keylen;
        $initlen = $this->initLen();
        $initcode = $this->initCode($initlen);
        $fullcode = $this->extendCode($initcode, $name);
        return $this->formatLicense($fullcode);
    }

    function codeValidate($serial, $name = "") {
        //return false on empty serial
        if (empty($serial) || $serial == "")
            return $this->invalid;
        //remove formating to get plain string
        $serial = str_replace("-", "", $serial);
        $serial = strtoupper($serial);
        $serial = str_replace(array("0", "1", "O", "I",), array("", "", "", "",), $serial);
        $keylen = $this->keylen; //default length
        $thislen = strlen($serial);
        //check length of code
        if ($keylen <> $thislen)
            return $this->invalid;
        $initlen = $this->initLen();
        $initcode = substr($serial, 0, $initlen);
        $extendedcode = $this->extendCode($initcode, $name);
        $fullcode = substr($extendedcode, 0, $keylen);
        if ($fullcode == $serial) {
            return $this->isvalid;
        } else {
            return $this->invalid;
        }
    }

    function initCode($length = 14) {
        $list = $this->basechar;
        $lenlist = strlen($list) - 1; //count start from 0
        $codestring = "";
        $length = max($length, 1);
        if ($length > 0) {
            while (strlen($codestring) < $length) {
                $codestring .= $list[mt_rand(0, $lenlist)];
            }
        }
        return $codestring;
    }

    function extendCode($initcode, $name) {
        $software = $this->software;
        $p1str = $this->sumDigit($initcode);
        $p1str .= $this->add32($initcode, $name . $software);
        $p1str = strtoupper($p1str);
        $p1str = str_replace(array("0", "1", "O", "I",), array("", "", "", "",), $p1str);
        $p1len = strlen($p1str);
        $extrabit = "";
        $i = 0;
        while (strlen($extrabit) < $this->keylen - 2) {
            $extrabit .= substr($p1str, $i, 1);
            $extrabit .= substr($p1str, $p1len - $i - 1, 1);
            $i++;
            if (defined('LKM_DEBUG'))
                echo "$p1str $extrabit<br/>";
        }
        return $initcode . $extrabit . "6F75";
    }

    function formatLicense($serial) {
        $farray = str_split($this->formatstr);
        $sarray = str_split($serial);
        $s0 = $farray[0];
        $s1 = $farray[1] + $s0;
        $s2 = $farray[2] + $s1;
        $s3 = $farray[3] + $s2;
        $s4 = $farray[3] + $s3;
        $scount = $this->keylen;
        $sformated = "";
        for ($i = 0; $i < $scount; $i++) {
            if ($i == $s0 || $i == $s1 || $i == $s2 || $i == $s3 || $i == $s4)
//                $sformated .= "-";
                $sformated .= "";
            $sformated .= $sarray[$i];
        }
        if (defined('LKM_DEBUG'))
            echo " $serial FORMATED AS $sformated<br/>";

        return $sformated;
    }

    function initLen() {
        $keylen = $this->keylen;
        $initlen = intval($keylen / 3);
        $initlen = max($initlen, 1);
        return $initlen;
    }

    function add32($a, $b) {
        $sum = base_convert($a, 36, 10) + base_convert($b, 36, 10);
        $sum32 = base_convert($sum, 10, 36);
        $sum32 = str_replace(array("0", "1", "O", "I", "o", "i"), array("", "", "", "", "", "",), $sum32);
        if (defined('LKM_DEBUG'))
            echo " ADD32 $a + $b = $sum32<br/>";
        return $sum32;
    }

    function sumDigit($str) {
        $a = str_split($str);
        $sum = 0;
        for ($i = 0; $i < count($a); $i++)
            $sum = $sum + base_convert($a[$i], 36, 10);
        $sum = str_replace(array("0", "1", "O", "I", "o", "i"), array("AZ", "BY", "29", "38", "29", "38",), $sum);
        if (defined('LKM_DEBUG'))
            echo " sumDigit  $str = $sum<br/>";
        return $sum;
    }

    public function registrationMail($mail_data) {
//        $_POST['first_name'] = "Gaurav";
//        $_POST['email'] = "gaurav.dey@lexiconcpl.com";
//        $_POST['created_by'] = $_SESSION['user_id'];
//        $_POST['created_date'] = date('Y-m-d H:m:s');

        $user_package_details = $this->main_model->get_records_from_id("users-package", $mail_data, "id");
//        echo "<pre>";
//        print_r($user_package_details["users"]);
//        die;
        $filter[0]["id"] = "users";
        $filter[0]["value"] = $user_package_details["users"];
        $req = array("package");
        $packages = $this->main_model->get_many_records("users-package", $filter, $req, "id");
//        echo "<pre>";
//        print_r($packages);
//        die;
        $package_name = "";
        $i++;
        foreach ($packages as $key => $value) {
            $package_name .= $i . ". " . $this->main_model->get_name_from_id("packages", "name", $value["package"], "id") . "<br>";
            $i++;
        }
        $user_package_user_id = $user_package_details["users"];
        $user_reg_details = $this->main_model->get_records_from_id("users", $user_package_user_id, "id");

        $register['first_name'] = $user_reg_details["name"];
        $register['email'] = $user_reg_details["email"];
        $register['is_mailconfirm'] = 1;
        $register['created_by'] = $_SESSION['user_id'];
        $register['created_date'] = date('Y-m-d H:m:s');

        $return_id = $this->main_model->add_update_record('registration_mail', $register);

        if ($return_id) {
//            $first_name = $_POST['first_name'];
//
//            $email = $_POST['email'];
            $unique_code = $user_reg_details['mail_confirm_token'];
            $first_name = $register['first_name'];

            $email = $register['email'];

            $message_body = 'Dear' . ' ' . $first_name
                    . ',<br><br>' . 'Thank you for Order and Registration on Skillpromise.com.<br><br>You have purchased the following programs:<br><br>' . $package_name . '<br><br> Click on the link below to confirm your Registration.Please note that clicking on this link will take you to a page where you can download the “Art of Building Credibility e-Book” as your Registration bonus by clicking on the button “Download <br>' . '<a href="' . base_url() . 'confirm_mail/' . $unique_code . "/" . $user_package_user_id . '" style="background-color:#32CD32;border: none;
                        color: white;
                         padding: 10px 20px;
                         text-align: center;
                         text-decoration: none;
                         display: inline-block;
                         font-size: 16px;
                         margin: 4px 2px;
                         border-color: #00897b;
                         cursor: pointer;">Confirm</a>' . '<br><br>' . '”Get in touch with us at <a href="' . base_url() . '">customer.care@skillpromise.com"</a>, if you have any Query, Suggestion or Request<br>Thank you again for Order and Registration on Skillpromise.com. Please find attached the Receipt for your purchase.<br>Enjoy using our programs!<br><br><br>Regards<br> Team Skillpromise' . '<br><br><select' . 'Sana Skillpromise Education Private Limited is registered in India under Corporate Identity Number U74999DL2017PTC322230 and have our registered office at J-7/123, Third Floor, Rajouri Garden, New Delhi – 110027';


            $target_email = $register['email'];

            $data['mail_to'] = $register['email'];
    //   $data['mail_to'] = 'jyoti.chopra@lexiconcpl.com';
            $data['subject'] = "Thank you for your Registration on Skillpromise.com";
            $data['name_from'] = "Skillpromise";
            $data['message'] = $message_body;
            $bcc = '';
            $data['mail_from'] = "customercare@skillpromise.com";
            $data['cc'] = '';
            $data['bcc'] = $bcc;
            $ch = curl_init();                    // initiate curl
// $data = http_build_query($data);
            $ch = curl_init();                    // initiate curl
// $url = "http://166.62.121.164/lexi-mailer/send-mail-V-2.php"; // where you want to post data
            $url = "http://mailer.lexiconcpl.com/sendGrid/"; // where you want to post data

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
            $output = curl_exec($ch); // execute

            curl_close($ch); // close curl handle
        }
        $_SESSION['modal_flag'] = 2;
        header('Location: ' . base_url());
    }
    
    
     public function registrationMail2() {

        //var_dump($_POST);die;

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $contact_number = $_POST['contact_no'];
        $email = $_POST['email'];

      $m= $massage_body = 'I want to be your subscribe user,'
                . 'Name : ' . $first_name . ' ' . $last_name
                . 'Contact Number : ' . $contact_number
                . 'Email : ' . $email
                . 'This mail is sent from' . base_url() . ' Registration form';

        //$terget_email = 'jyoti.chopra@lexiconcpl.com';


         $data['mail_to'] = $email;
    //   $data['mail_to'] = 'jyoti.chopra@lexiconcpl.com';
            $data['subject'] = "Thank you for your Registration on Skillpromise.com";
            $data['name_from'] = "Skillpromise";
            $data['message'] = $m;
            $bcc = '';
            $data['mail_from'] = "customercare@skillpromise.com";
            $data['cc'] = '';
            $data['bcc'] = '';
            $ch = curl_init();                    // initiate curl
// $data = http_build_query($data);
            $ch = curl_init();                    // initiate curl
// $url = "http://166.62.121.164/lexi-mailer/send-mail-V-2.php"; // where you want to post data
            $url = "http://mailer.lexiconcpl.com/sendGrid/"; // where you want to post data

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
            $output = curl_exec($ch); // execute

            curl_close($ch); // close curl handle
        //echo $this->email->print_debugger();
        $_SESSION['msg_str'] .= 'Thanks For Contact Us !';
        $_SESSION['msg_hdr'] = 'Information !';

        header('Location: ' . base_url());
    }

    public function registrationMail_student($mail_data) {

        $user_package_details = $this->main_model->get_records_from_id("users-package", $mail_data, "id");
        $filter[0]["id"] = "users";
        $filter[0]["value"] = $user_package_details["users"];
        $req = array("package");
        $packages = $this->main_model->get_many_records("users-package", $filter, $req, "id");
        ;
        $package_name = "";
        $i++;
        foreach ($packages as $key => $value) {
            $package_name .= $i . ". " . $this->main_model->get_name_from_id("packages", "name", $value["package"], "id") . "<br>";
            $i++;
        }
        $user_package_user_id = $user_package_details["users"];
        $user_reg_details = $this->main_model->get_records_from_id("users", $user_package_user_id, "id");

        $register['first_name'] = $user_reg_details["name"];
        $register['email'] = $user_reg_details["email"];
        $register['is_mailconfirm'] = 1;
        $register['created_by'] = $_SESSION['user_id'];
        $register['created_date'] = date('Y-m-d H:m:s');

        $return_id = $this->main_model->add_update_record('registration_mail', $register);

        if ($return_id) {
//            $first_name = $_POST['first_name'];
//
//            $email = $_POST['email'];
            $unique_code = $user_reg_details['mail_confirm_token'];
            $first_name = $register['first_name'];

            $email = $register['email'];

            $message_body = 'Dear' . ' ' . $first_name
                    . ',<br><br>' . 'Thank you for your Registration on Skillpromise.com.<br><br>You have purchased the following programs:<br><br>' . $package_name . '<br><br> Click on the link below to confirm your Registration.Please note that clicking on this link will take you to a page where you can download the “Art of Building Credibility e-Book” as your Registration bonus by clicking on the button “Download <br>' . '<a href="' . base_url() . 'confirm_mail/' . $unique_code . "/" . $user_package_user_id . '" style="background-color:#32CD32;border: none;

color: white;
 padding: 10px 20px;
 text-align: center;
 text-decoration: none;
 display: inline-block;
 font-size: 16px;
 margin: 4px 2px;
 border-color: #00897b;
 cursor: pointer;">Confirm</a>' . '<br><br>' . '”Get in touch with us at <a href="' . base_url() . '">customer.care@skillpromise.com"</a>, if you have any Query, Suggestion or Request<br>Thank you again for your Registration on Skillpromise.com.<br>Enjoy using our programs!<br><br><br>Regards<br> Team Skillpromise' . '<br><br><select' . 'Sana Skillpromise Education Private Limited is registered in India under Corporate Identity Number U74999DL2017PTC322230 and have our registered office at J-7/123, Third Floor, Rajouri Garden, New Delhi – 110027';


            $target_email = $register['email'];

            $data['mail_to'] = $register['email'];
//        $data['mail_to'] = 'jyoti.chopra@lexiconcpl.com';
            $data['subject'] = "Thank you for your Registration on Skillpromise.com";
            $data['name_from'] = "Skillpromise";
            $data['message'] = $message_body;
            $bcc = '';
            $data['mail_from'] = "customercare@skillpromise.com";
            $data['cc'] = '';
            $data['bcc'] = $bcc;

            $ch = curl_init();                    // initiate curl
// $data = http_build_query($data);
            $ch = curl_init();                    // initiate curl
// $url = "http://166.62.121.164/lexi-mailer/send-mail-V-2.php"; // where you want to post data
            $url = "http://mailer.lexiconcpl.com/sendGrid/"; // where you want to post data

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
            $output = curl_exec($ch); // execute

            curl_close($ch); // close curl handle
        }
//        $modal = 1;
        $_SESSION['modal_flag'] = 1;
        header('Location: ' . base_url());
    }

    public function confirm_mail($unique_code = '', $user = '') {
        $users_details = $this->main_model->get_records_from_id("users", $user, 'id');
        $mail_reg_id = $this->main_model->get_name_from_id("registration_mail", 'email', $users_details['email']);
//        echo "<pre>";
//        print_r($users_details);
        if ($unique_code == $users_details['mail_confirm_token']) {
            $update['status'] = "Active";
            $update['id'] = $user;
            $this->main_model->add_update_record("users", $update, "id");
            $payment_id = $this->main_model->get_name_from_id("users-package", 'reference_payment_id', $user, "users");
            $update_payment['user_id'] = $user;
            $update_payment['id'] = $payment_id;
            $this->main_model->add_update_record("payment_details", $update_payment, "id");
//            $_SESSION['msg_str'] .= 'Registration Success. Please Click on the download button!';
//            $_SESSION['msg_hdr'] = 'info!';
//            $this->load->view('print_receipt', $update_payment);
            $this->load->view('after_registration', $update_payment);
        } else {
            if (!empty($user)) {
                $update_payment['user_id'] = $user;
                $update_payment['id'] = $payment_id;
                $this->main_model->add_update_record("payment_details", $update_payment, "id");
                $_SESSION['msg_str'] .= 'Registration Failed !';
                $_SESSION['msg_hdr'] = 'info!';
                header('Location: ' . base_url());
            } else {
                $_SESSION['msg_str'] .= 'Registration Failed !';
                $_SESSION['msg_hdr'] = 'info!';
                $this->load->view('after_registration');
            }
            $_SESSION['msg_str'] .= 'Registration Failed !';
            $_SESSION['msg_hdr'] = 'info!';
            $this->load->view('after_registration');
        }
    }

    public function aftersubscribed() {
        $this->load->view('aftersubscribed');
    }

    public function print_receipt_new($user_id = "", $payment_id = "") {
        $data['user_id'] = $user_id;
        $data['payment_id'] = $payment_id;
        $this->load->view('print_receipt', $data);
    }

    public function automatic($package = 0, $reg = 0) {
        $amount['coustmetn_details'] = $this->main_model->selectsingleData('registration','*',array('id'=> $reg));

        $cart_details = $this->cart->contents();
        foreach ($cart_details as $key => $value) {
            $amount['total_amt'] = ($value['subtotal'] + (($value['subtotal'] * 18) / 100));
        }
        $amount['package'] = $package;
        $amount['reg'] = $reg;
        // echo "<pre>";
        // print_r($amount);die;
        $this->load->view('pay', $amount);
    }

    public function verify(){
        $this->load->view('verify');
    }

    public function set_like_for_node() {
//        $_POST['node_id'] = 2016;
        $filter[0]['id'] = "node_id";
        $filter[0]['value'] = $_POST['node_id'];
        $filter[1]['id'] = "user_id";
        $filter[1]['value'] = $_SESSION['user_id'];
        $row = $this->main_model->get_many_records('likes_dislikes', $filter, '');
        if (empty($row)) {
            $data['user_id'] = $_SESSION['user_id'];
            $data['node_id'] = $_POST['node_id'];
            $data['records'] = "1";
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['user_id'];
            $this->main_model->add_update_record('likes_dislikes', $data, '');
        } else {
            if ($row[0]['records'] == 0) {
                $data['records'] = "1";
            } elseif ($row[0]['records'] == 1) {
                $data['records'] = "0";
            } else {
                $data['records'] = "1";
            }
            $data['id'] = $row[0]['id'];
            $this->main_model->add_update_record('likes_dislikes', $data, 'id');
        }
        echo $data['records'];
    }

    public function set_dislike_for_node() {
//        $_POST['node_id'] = 2016;
        $filter[0]['id'] = "node_id";
        $filter[0]['value'] = $_POST['node_id'];
        $filter[1]['id'] = "user_id";
        $filter[1]['value'] = $_SESSION['user_id'];
        $row = $this->main_model->get_many_records('likes_dislikes', $filter, '');
        if (empty($row)) {
            $data['user_id'] = $_SESSION['user_id'];
            $data['node_id'] = $_POST['node_id'];
            $data['records'] = "-1";
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['user_id'];
            $this->main_model->add_update_record('likes_dislikes', $data, '');
        } else {
            if ($row[0]['records'] == 0) {
                $data['records'] = "-1";
            } elseif ($row[0]['records'] == -1) {
                $data['records'] = "0";
            } else {
                $data['records'] = "-1";
            }
            $data['id'] = $row[0]['id'];
            $this->main_model->add_update_record('likes_dislikes', $data, 'id');
        }
        echo $data['records'];
    }

    public function set_comments_for_node() {
//        echo 'jmd';die;
//        $data['user_id'] = $_SESSION['user_id'];
        $data['user_id'] = $_SESSION['user_id'];
        $data['node_id'] = $_POST['node_id'];
        $data['comment_text'] = $_POST['comment'];
        $data['comment_text'] = $_POST['comment'];
        $data['created_date'] = date('Y-m-d H:i:s');
        $data1 = $this->main_model->add_update_record('comments', $data, '');
//        echo 'data is inserted !!';

        $filters[0]['id'] = 'node_id';
        $filters[0]['value'] = $_POST['node_id'];


        $comment['ragini'] = $this->main_model->get_many_records('comments', $filters, '', 'id');
    }


    public function cv() {
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        $data = $this->main_model->get_records_from_id('cv', $_SESSION['user_id'], 'user_id');
        //echo $this->db->last_query();die;
        $f[0]['id'] = "cv_reff_id";
        $f[0]['value'] = $data['id'];
        $data['obj_data'] = $this->main_model->get_many_records('cv_obj_data', $f, array('*'), 'id');
        $data['edu'] = $this->main_model->get_records_from_id('cv_edu', $data['id'], 'cv_reff_id');
        $data['proenc'] = $this->main_model->get_many_records('cv_proenc', $f, array('*'), 'id');
        $data['lang'] = $this->main_model->get_many_records('cv_lang', $f, array('*'), 'id');
        $data['compskill'] = $this->main_model->get_many_records('cv_compskill', $f, array('*'), 'id');
        $ach = $this->main_model->get_many_records('cv_achievements', $f, array('*'), 'id');
        $data['ach'] = array();
        foreach ($ach as $value) {
            $data['ach'][$value['type']][] = $value;
        }


        $data['hobby'] = $this->main_model->get_many_records('cv_hobby', $f, array('*'), 'id');
        $data['per_detail'] = $this->main_model->get_records_from_id('cv_per_detail', $data['id'], 'cv_reff_id');

        if ($data['reference'] == "Asked")
            $data['reff'] = $this->main_model->get_records_from_id('cv_reff', $data['id'], 'cv_reff_id');


        if ($data['internship'] == "1") {
            //$data['int'] = $this->main_model->get_records_from_id('cv_internship', $data['id'], 'cv_reff_id');
            $data['int'] = $this->main_model->get_many_records('cv_internship', $f, array('*'), 'id');
            // $filter[0]['id'] = "int_reff_id";
            // $filter[0]['value'] = $data['int']['id'];
            // $int_data = $this->main_model->get_many_records('cv_internship_data', $filter, array('*'), 'id');
            // foreach ($int_data as $value) {
            //     $data['int'][$value['type']][] = $value;
            // }
            foreach ($data['int'] as $k1 => $v1) {
                $filter[0]['id'] = "int_reff_id";
                $filter[0]['value'] = $v1['id'];
                $int_data = $this->main_model->get_many_records('cv_internship_data', $filter, array('*'), 'id');
                foreach ($int_data as $value1) {
                    $data['int'][$k1][$value1['type']][] = $value1;
                }
            }
        }
        // if ($data['internship'] == "1") {
        //     $data['int'] = $this->main_model->get_many_records('cv_internship', $f,array('*'),'id');
        //     //echo $this->db->last_query();die;
        //     foreach($data['int'] as $k => $v){
        //         $filter[0]['id'] = "int_reff_id";
        //         $filter[0]['value'] = $data['int']['id'];
        //         $int_data = $this->main_model->get_many_records('cv_internship_data', $filter, array('*'), 'id');
        //         foreach ($int_data as $value) {
        //             $data['int'][$k][$value['type']][] = $value;
        //         }
        //     }
           
        //     //$int_data = $this->main_model->get_many_records('cv_internship_data', $filter, array('*'), 'id');
        //     //foreach ($int_data as $value) {
        //     //    $data['int'][$value['type']][] = $value;
        //     //}
        // }
        if ($data['work_exp'] == "1") {
            $data['workexp'] = $this->main_model->get_many_records('cv_workexp', $f, array('*'), 'id');
            foreach ($data['workexp'] as $k => $v) {
                $filter[0]['id'] = "workexp_reff_id";
                $filter[0]['value'] = $v['id'];
                $exp_data = $this->main_model->get_many_records('cv_workexp_data', $filter, array('*'), 'id');
                foreach ($exp_data as $value) {
                    $data['workexp'][$k][$value['type']][] = $value;
                }
            }
        }


            // echo '<pre>';
            // print_r($data);
            // die;
        if ($data['is_submit'] == 0)
            $this->load->view('cv', $data);
        else
            //header('Location: ' . base_url() . 'printPdf');
            $this->load->view('cv_print_preview', $data);
    }
    
    public function cv_edit(){
        
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        //$data = $this->main_model->get_records_from_id('cv', $_SESSION['user_id'], 'user_id');
        // echo "<pre>";
        // print_r($data);
        // die;
        //echo $this->db->last_query();
        
        $data = array(
            'is_submit' => "0"
            );
            
        if($this->main_model->update('cv',$data,array('user_id' => $_SESSION['user_id']))){
            
            header('Location: ' . base_url('cv'));
            
        }else{
            
        }
    }

    public function printPdf(){
        if($_SESSION['role_name'] == "Guest"){
            header('Location: ' . base_url('signin'));
        }
        $data = $this->main_model->get_records_from_id('cv', $_SESSION['user_id'], 'user_id');
        //echo $this->db->last_query();
        $f[0]['id'] = "cv_reff_id";
        $f[0]['value'] = $data['id'];
        $data['obj_data'] = $this->main_model->get_many_records('cv_obj_data', $f, array('*'), 'id');
        $data['edu'] = $this->main_model->get_records_from_id('cv_edu', $data['id'], 'cv_reff_id');
        $data['proenc'] = $this->main_model->get_many_records('cv_proenc', $f, array('*'), 'id');
        $data['lang'] = $this->main_model->get_many_records('cv_lang', $f, array('*'), 'id');
        $data['compskill'] = $this->main_model->get_many_records('cv_compskill', $f, array('*'), 'id');
        $ach = $this->main_model->get_many_records('cv_achievements', $f, array('*'), 'id');
        $data['ach'] = array();
        foreach ($ach as $value) {
            $data['ach'][$value['type']][] = $value;
        }


        $data['hobby'] = $this->main_model->get_many_records('cv_hobby', $f, array('*'), 'id');
        $data['per_detail'] = $this->main_model->get_records_from_id('cv_per_detail', $data['id'], 'cv_reff_id');

        if ($data['reference'] == "Asked")
            $data['reff'] = $this->main_model->get_records_from_id('cv_reff', $data['id'], 'cv_reff_id');


        if ($data['internship'] == "1") {
            $data['int'] = $this->main_model->get_many_records('cv_internship', $f, array('*'), 'id');
            foreach ($data['int'] as $k1 => $v1) {
                $filter[0]['id'] = "int_reff_id";
                $filter[0]['value'] = $v1['id'];
                $int_data = $this->main_model->get_many_records('cv_internship_data', $filter, array('*'), 'id');
                foreach ($int_data as $value1) {
                    $data['int'][$k1][$value1['type']][] = $value1;
                }
            }
        }

        if ($data['work_exp'] == "1") {
            $data['workexp'] = $this->main_model->get_many_records('cv_workexp', $f, array('*'), 'id');
            foreach ($data['workexp'] as $k => $v) {
                $filter[0]['id'] = "workexp_reff_id";
                $filter[0]['value'] = $v['id'];
                $exp_data = $this->main_model->get_many_records('cv_workexp_data', $filter, array('*'), 'id');
                foreach ($exp_data as $value) {
                    $data['workexp'][$k][$value['type']][] = $value;
                }
            }
        }
        // echo "<pre>";
        // print_r($data);die;
        //$this->load->view('cv_print_preview_pdf', $data);
       // $data ="hello";
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Cv');
        //$pdf->SetHeaderMargin(30);
        //$pdf->SetTopMargin(20);
        $pdf->setFooterMargin(10);
        //$pdf->SetAutoPageBreak(true);
        //$pdf->SetAuthor('Author');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);
         // add a page group
        $pdf->startPageGroup();
        // add a page
        $pdf->AddPage();
        // output the HTML content
        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center" valign="middle"><img src="'.$data['photo_path'].'" style="width:120px;" alt="img">
            </td>
        </tr></table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td><h3>'.$data['name'].'</h3></td>
            </tr>
            <tr>
                <td><h5><strong>Mobile</strong>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$data['mobile'].'</h5></td>
            </tr>
            <tr>
                <td><h5><strong>Email</strong>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;'.$data['email'].'</h5></td>
            </tr>
        </table><br><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // end of career object & professnol exp
        if (isset($data['candidate_type']) && ($data['candidate_type'] != '')) {
            $html ='';
            if(isset($data['candidate_type']) && ($data['candidate_type'] == 'Experienced')){ //for experianced
                $html .='<h4>Professional Snapshot</h4><br><hr><br>';
                
                if(isset($data['candidate_data_type']) && ($data['candidate_data_type'] == 'paragraph')){
                    $html .= '<p style="text-align: justify;">'.$data['paragraph_data'].'</p>';
                }else{
                    $html .='<ul>';
                    foreach($data['obj_data'] as $objKey => $objValue){
                        $html .='<li>'.$objValue['data'].'</li>';
                    }
                    $html .='</ul>';
                }
                
            }else{ // if not Experienced the for fresher
                $html .='<h4>Career Objective</h4><br><hr><br>';
                
                if(isset($data['candidate_data_type']) && ($data['candidate_data_type'] == 'paragraph')){
                    $html .= '<p style="text-align: justify;">'.$data['paragraph_data'].'</p>';
                }else{
                    $html .='<ul>';
                    foreach($data['obj_data'] as $objKey => $objValue){
                        $html .='<li>'.$objValue['data'].'</li>';
                    }
                    $html .='</ul>';
                }
            }
            $html .='<br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        // end of career object & professnol exp
        // for work experiance
        if (isset($data['work_exp']) && ($data['work_exp'] == '1')) {
            $html ='<h4>Work Experience</h4><br><hr><br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            
            if(!empty($data['workexp'])){
               
                foreach($data['workexp'] as $wkey => $vkey){
                    $html ='';
                    $html .='<table width="100%" cellpadding="0" cellspacing="0" border="0">';
                    $html .='<tr>
                        <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Name of the Organization:</strong> '.$vkey['org'].'</td>
                        <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Duration:</strong> '.$vkey['duration'].'</td>
                      </tr>';
                    $html .='<tr>
                        <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Designation:</strong> '.$vkey['designation'].'</td>
                        <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Location:</strong> '.$vkey['loc'].'</td>
                      </tr>';
                    $html .='</table>';
                    
                    
                    if(!empty($vkey['Responsibility'])){
                        $html .='<h4>Key Responsibilities</h4>';
                        $html .='<ul>';
                        foreach($vkey['Responsibility'] as $rkey => $rvalue){
                            $html .='<li>'.$rvalue['data'].'</li>';
                        }
                        $html .='</ul>';
                    }
                    
                    if(!empty($vkey['Achievement'])){
                        $html .='<h4>Achievement</h4>';
                        $html .='<ul>';
                        foreach($vkey['Achievement'] as $rkey => $rvalue){
                            $html .='<li>'.$rvalue['data'].'</li>';
                        }
                        $html .='</ul>';
                    }
                //$html .='<br><hr><br>';
                $html .='<br><br>';
                $pdf->writeHTML($html, true, false, true, false, '');
                }
            }
            // $html ='';
            // $html .='<table width="100%" cellpadding="0" cellspacing="0" border="0">';
            // $html .='<tr>
            //     <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Name of the Organization:</strong> ICICI Bank</td>
            //     <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Duration:</strong> February 2014 â€“ Present</td>
            //   </tr>';
            // $html .='<tr>
            //     <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Designation:</strong> Relationship Manager</td>
            //     <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Location:</strong> Ranchi</td>
            //   </tr>';
            // $html .='</table>';
            // $html .='<h4>Key Responsibilities</h4>';
            // $html .='<ul>';
            // $html .='<li>hem</li>';
            // $html .='</ul>';
            // $html .='<h4>Achievement</h4>';
            // $html .='<ul>';
            // $html .='<li>hem</li>';
            // $html .='</ul>';
            // $html .='<br>';
            // $pdf->writeHTML($html, true, false, true, false, '');
            
            // $html ='';
            // $html .='<table width="100%" cellpadding="0" cellspacing="0" border="0">';
            // $html .='<tr>
            //     <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Name of the Organization:</strong> ICICI Bank</td>
            //     <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Duration:</strong> February 2014 â€“ Present</td>
            //   </tr>';
            // $html .='<tr>
            //     <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Designation:</strong> Relationship Manager</td>
            //     <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Location:</strong> Ranchi</td>
            //   </tr>';
            // $html .='</table>';
            // $html .='<h4>Key Responsibilities</h4>';
            // $html .='<ul>';
            // $html .='<li>hem</li>';
            // $html .='</ul>';
            // $html .='<h4>Achievement</h4>';
            // $html .='<ul>';
            // $html .='<li>hem</li>';
            // $html .='</ul>';
            // $pdf->writeHTML($html, true, false, true, false, '');
            
            // work exp key responsibilities
            // $html .='<tr colspan="2">';
            // $html .='<h4>Key Responsibilities</h4><br>';
            // $html .='<ul>';
            // $html .='<li>hem</li>';
            // $html .='</ul>';
            // $html .='</tr>';
            // // end of work exp key responsibilites
            // // work exp achivements
            // $html .='<tr colspan="2">';
            // $html .='<h4>Achievement</h4><br>';
            // $html .='<ul>';
            // $html .='<li>hem</li>';
            // $html .='</ul>';
            // $html .='</tr>';
            // // end of work exp achivements
            // $html .='</table>';
            //$html .='<br><br>';
            
        }
        // end of work experiance
        // for Internships
        if (isset($data['int']) && ($data['internship'] == '1')) {
            $html ='<h4>Internships</h4><br><hr><br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
            
            if(!empty($data['int'])){
               
                foreach($data['int'] as $ikey => $vkeyi){
                    $html ='';
                    $html .='<table width="100%" cellpadding="0" cellspacing="0" border="0">';
                    $html .='<tr>
                        <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Name of the Organization:</strong> '.$vkeyi['org'].'</td>
                        <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Duration:</strong> '.$vkeyi['duration'].'</td>
                      </tr>';
                    $html .='<tr>
                        <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Designation:</strong> '.$vkeyi['designation'].'</td>
                        <td style="padding: 0.5px 0.5px 0.5px 0"><strong>Location:</strong> '.$vkeyi['loc'].'</td>
                      </tr>';
                    $html .='</table>';
                    
                    
                    if(!empty($vkeyi['Responsibility'])){
                        $html .='<h4>Key Responsibilities</h4>';
                        $html .='<ul>';
                        foreach($vkeyi['Responsibility'] as $rkeyi => $rvaluei){
                            $html .='<li>'.$rvaluei['data'].'</li>';
                        }
                        $html .='</ul>';
                    }
                    
                    if(!empty($vkeyi['Achievement'])){
                        $html .='<h4>Achievement</h4>';
                        $html .='<ul>';
                        foreach($vkeyi['Achievement'] as $rkeyi => $rvaluei){
                            $html .='<li>'.$rvaluei['data'].'</li>';
                        }
                        $html .='</ul>';
                    }
                //$html .='<br><hr><br>';
                $html .='<br><br>';
                $pdf->writeHTML($html, true, false, true, false, '');
                }
            }
        }
        // end of Internships
        // start of education
        if (!empty($data['edu'])) {
            $html ='<h4>Education</h4><br><hr><br><br>';
            //$pdf->writeHTML($html, true, false, true, false, '');
            
            $html .= '<ul>';
            if(!empty($data['edu']['doc'])){
                $html .='<li>'.$data['edu']['doc'].'</li>';
            }
            if(!empty($data['edu']['pg'])){
                $html .='<li>'.$data['edu']['pg'].'</li>';
            }
            if(!empty($data['edu']['graduation'])){
                $html .='<li>'.$data['edu']['graduation'].'</li>';
            }
            if(!empty($data['edu']['xiith'])){
                $html .='<li>'.$data['edu']['xiith'].'</li>';
            }
            if(!empty($data['edu']['xth'])){
                $html .='<li>'.$data['edu']['xth'].'</li>';
            }
            $html .='</ul>';
            $html .='<br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        // end of education
        // start of professional enhancements
        if (!empty($data['proenc'])) {
            $html ='<h4>Professional Enhancements</h4><br><hr><br><br>';
            
            $html .='<ul>';
            foreach($data['proenc'] as $kproenc => $vproenc){
                $html .='<li>'.$vproenc['data'].'</li>';
            }
            $html .='</ul>';
            $html .='<br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        // end of professional enhancements
        // start of languegs
        if (!empty($data['lang'])) {
            $html ='<h4>Languages Known</h4><br><hr><br><br>';
            
            $html .='<ul>';
            foreach($data['lang'] as $klan => $vlan){
                $html .='<li>'.$vlan['data'].'</li>';
            }
            $html .='</ul>';
            $html .='<br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        // end of lang
        // computer skill start
        if (!empty($data['compskill'])) {
            $html ='<h3>Computer Skills</h3><br><hr><br><br>';
            
            $html .='<ul>';
            foreach($data['compskill'] as $kcomp => $vcomp){
                $html .='<li>'.$vcomp['data'].'</li>';
            }
            $html .='</ul>';
            $html .='<br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        // end of computer skill
        // start of hobbies
        if (!empty($data['hobby'])) {
            $html ='<h4>Hobbies</h4><br><hr><br><br>';
            
            $html .='<ul>';
            foreach($data['hobby'] as $khob => $vhob){
                $html .='<li>'.$vhob['data'].'</li>';
            }
            $html .='</ul>';
            $html .='<br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        // end of hobbies
        // start of achivemnts and award
        if (!empty($data['ach'])) {
            $html ='<h4>Achievements and Awards</h4><br><hr><br><br>';
            
            $html .='<ul>';
            if(!empty($data['ach']['Academics'])){
               // $html .='<ul>';
                foreach($data['ach']['Academics'] as $key => $value){
                    $html .='<li>'.$value['data'].'</li>';
                }
               // $html .='</ul>';
            }
             if(!empty($data['ach']['Sports'])){
                //$html .='<ul>';
                foreach($data['ach']['Sports'] as $key => $value){
                    $html .='<li>'.$value['data'].'</li>';
                }
                //$html .='</ul>';
            }
             if(!empty($data['ach']['pos_res'])){
               // $html .='<ul>';
                foreach($data['ach']['pos_res'] as $key => $value){
                    $html .='<li>'.$value['data'].'</li>';
                }
               // $html .='</ul>';
            }
             if(!empty($data['ach']['hob_res'])){
                //$html .='<ul>';
                foreach($data['ach']['hob_res'] as $key => $value){
                    $html .='<li>'.$value['data'].'</li>';
                }
                //$html .='</ul>';
            }
             if(!empty($data['ach']['ex_act'])){
                //$html .='<ul>';
                foreach($data['ach']['ex_act'] as $key => $value){
                    $html .='<li>'.$value['data'].'</li>';
                }
                //$html .='</ul>';
            }
            if(!empty($data['ach']['Social'])){
                //$html .='<ul>';
                foreach($data['ach']['Social'] as $key => $value){
                    $html .='<li>'.$value['data'].'</li>';
                }
                //$html .='</ul>';
            }
            if(!empty($data['ach']['Spiritual'])){
                //$html .='<ul>';
                foreach($data['ach']['Spiritual'] as $key => $value){
                    $html .='<li>'.$value['data'].'</li>';
                }
                //$html .='</ul>';
            }
            $html .='</ul>';
            $html .='<br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        // end of achivemnts and award
        // start of personal dossier
        if (!empty($data['per_detail'])) {
            $html ='<h4>Personal Dossier</h4><br><hr><br><br>';
            
            $html .'<p></p><br>';
            $html .='<table width="100%" cellpadding="1" cellspacing="0" border="0">
                <tr>
                    <td width="20%"><strong>Date of Birth</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['per_detail']['dob'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Father' . "'" . ' Name</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['per_detail']['fname'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Address</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['per_detail']['address'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Nationality</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['per_detail']['nationality'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Sex</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['per_detail']['sex'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Marital Status</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['per_detail']['maritial_status'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Linkedin Address</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['per_detail']['linkedin'].'</td>
                </tr>
                
            </table><br><br><br>';
            
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        // end of personal dossier
        // start of reference
        if (isset($data['reference']) && $data['reference'] != "") {
            $html ='<h4>References</h4><br><hr><br><br>';
            
            if($data['reference'] == "Not Asked"){
                $html .='<p style="text-align: justify;">'.((isset($data['req_detail']) && $data['req_detail'] != "") ? $data['req_detail'] : "Available On Request").'</p>';
            }else{
                $html .='<table width="100%" cellpadding="1" cellspacing="0" border="0">
                <tr>
                    <td width="20%"><strong>Name</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['reff']['name'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Designation</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['reff']['designation'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Organization</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['reff']['org'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Mobile No.</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['reff']['mobile'].'</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Email</strong></td>
                    <td width="5%">:</td>
                    <td width="60%">'.$data['reff']['email'].'</td>
                </tr>
            </table><br><br><br>';
            }
            $html .='<br><br>';
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        // end of reference
        //$pdf->SetDisplayMode('real', 'default');
        //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
        $pdf->Output($data["name"].'_cv'.'.pdf', 'D');
    }
    public function set_cv_data() {
        $candidate_type = $_POST['candidate_type'];
        if($candidate_type == 'Fresher'){
            $_POST['candidate_data_type'] = 'paragraph';
        }
        // echo '<pre>';
        // print_r($_POST);
        // die;
        $cvdata['user_id'] = $_SESSION['user_id'];
        $cvdata['name'] = $_POST['name'];
        $cvdata['mobile'] = $_POST['mobile'];
        $cvdata['email'] = $_POST['email'];
        if (isset($_POST['is_submit']))
            $cvdata['is_submit'] = $_POST['is_submit'];
        if (isset($_POST['candidate_type']))
            $cvdata['candidate_type'] = $_POST['candidate_type'];
        if (isset($_POST['candidate_data_type']))
            $cvdata['candidate_data_type'] = $_POST['candidate_data_type'];
        if (isset($_POST['paragraph_data']))
            $cvdata['paragraph_data'] = $_POST['paragraph_data'];
        if (isset($_POST['work_exp']))
            $cvdata['work_exp'] = $_POST['work_exp'];
        if (isset($_POST['internship']))
            $cvdata['internship'] = $_POST['internship'];
        if (isset($_POST['reference'])) {
            $cvdata['reference'] = $_POST['reference'];
            if ($_POST['reference'] == "Not Asked")
                $cvdata['req_detail'] = $_POST['req_detail'];
        }

        if (isset($_POST['id'])) {
            $cvdata['modify_by'] = $_SESSION['user_id'];
            $cvdata['modify_date'] = date('Y-m-d h:i:s');
            $cvdata['id'] = $_POST['id'];
            if(!empty($_FILES['upload']['name'])){
                $image              = $_FILES['upload']['name']; 
                $expimage           = explode('.',$image);
                $count              = count($expimage);
                $image_ext          = $expimage[$count-1];
                $image_name         = rand().'.'.$image_ext;
                $cvdata['photo_path']= "assets/cv_photo/".$image_name;
            
                move_uploaded_file($_FILES["upload"]["tmp_name"],$cvdata['photo_path']);
            }else{
                $cvdata['photo_path']  = $_POST['db_photo'];
            }
            $return_id = $this->main_model->add_update_record('cv', $cvdata, 'id');
        } else {
            $cvdata['created_by'] = $_SESSION['user_id'];
            $cvdata['created_date'] = date('Y-m-d h:i:s');
            if(!empty($_FILES['upload']['name'])){
                $image              = $_FILES['upload']['name']; 
                $expimage           = explode('.',$image);
                $count              = count($expimage);
                $image_ext          = $expimage[$count-1];
                $image_name         = rand().'.'.$image_ext;
                $cvdata['photo_path']= "assets/cv_photo/".$image_name;
                
                move_uploaded_file($_FILES["upload"]["tmp_name"],$cvdata['photo_path']);
            }else{
                $cvdata['photo_path']  = '';
            }
            $return_id = $this->main_model->add_update_record('cv', $cvdata);
        }
        $obj = array();
        if (isset($_POST['candidate_data_type']) && ($_POST['candidate_data_type'] == "bullet")) {
            $this->main_model->delete_many_records('cv_obj_data', 'cv_reff_id', $return_id);
            foreach ($_POST['obj_points'] as $v) {
                if ($v != "") {
                    $obj['cv_reff_id'] = $return_id;
                    $obj['data'] = $v;
                    $obj['created_by'] = $_SESSION['user_id'];
                    $obj['created_date'] = date('Y-m-d h:i:s');
                    $this->main_model->add_update_record('cv_obj_data', $obj);
                }
            }
        }
        $f[0]['id'] = "cv_reff_id";
        $f[0]['value'] = $return_id;
        if (array_filter($_POST['edu'])) {
            $chk = $this->main_model->count_records('cv_edu', $f);
            if ($chk) {
                $_POST['edu']['cv_reff_id'] = $return_id;
                $_POST['edu']['modify_by'] = $_SESSION['user_id'];
                $_POST['edu']['modify_date'] = date('Y-m-d h:i:s');
                $this->main_model->add_update_record('cv_edu', $_POST['edu'], 'cv_reff_id');
            } else {
                $_POST['edu']['cv_reff_id'] = $return_id;
                $_POST['edu']['created_by'] = $_SESSION['user_id'];
                $_POST['edu']['created_date'] = date('Y-m-d h:i:s');
                $this->main_model->add_update_record('cv_edu', $_POST['edu']);
            }
        }

        if (array_filter($_POST['per_detail'])) {
            $chk = $this->main_model->count_records('cv_per_detail', $f);
            if ($chk) {
                $_POST['per_detail']['cv_reff_id'] = $return_id;
                $_POST['per_detail']['modify_by'] = $_SESSION['user_id'];
                $_POST['per_detail']['modify_date'] = date('Y-m-d h:i:s');
                $this->main_model->add_update_record('cv_per_detail', $_POST['per_detail'], 'cv_reff_id');
            } else {
                $_POST['per_detail']['cv_reff_id'] = $return_id;
                $_POST['per_detail']['created_by'] = $_SESSION['user_id'];
                $_POST['per_detail']['created_date'] = date('Y-m-d h:i:s');
                $this->main_model->add_update_record('cv_per_detail', $_POST['per_detail']);
            }
        }
        if (!empty($_POST['org'])) {
            $this->main_model->delete_many_records('cv_workexp', 'cv_reff_id', $return_id);
            $this->main_model->delete_many_records('cv_workexp_data', 'cv_reff_id', $return_id);

            foreach ($_POST['org'] as $val) {


                $res = $val['res'];
                unset($val['res']);
                $ach = $val['ach'];
                unset($val['ach']);
                if ((array_filter($val))) {
                    $val['cv_reff_id'] = $return_id;
                    $val['created_by'] = $_SESSION['user_id'];
                    $val['created_date'] = date('Y-m-d h:i:s');
    //                    print_r($val);
    //                    die;
                    $workexp = $this->main_model->add_update_record('cv_workexp', $val);
                    if (!empty($res)) {
                        foreach ($res as $v) {
                            $work_data = array();
                            if ($v != "") {
                                $work_data['workexp_reff_id'] = $workexp;
                                $work_data['data'] = $v;
                                $work_data['cv_reff_id'] = $return_id;
                                $work_data['type'] = "Responsibility";
                                $work_data['created_by'] = $_SESSION['user_id'];
                                $work_data['created_date'] = date('Y-m-d h:i:s');

                                $this->main_model->add_update_record('cv_workexp_data', $work_data);
                            }
                        }
                    }
                    if (!empty($ach)) {
                        foreach ($ach as $v) {
                            $work_data = array();
                            if ($v != "") {
                                $work_data['workexp_reff_id'] = $workexp;
                                $work_data['data'] = $v;
                                $work_data['cv_reff_id'] = $return_id;
                                $work_data['type'] = "Achievement";
                                $work_data['created_by'] = $_SESSION['user_id'];
                                $work_data['created_date'] = date('Y-m-d h:i:s');
                                $this->main_model->add_update_record('cv_workexp_data', $work_data);
                            }
                        }
                    }
                }
            }
        }
        
        if (!empty($_POST['int'])) {
            $this->main_model->delete_many_records('cv_internship', 'cv_reff_id', $return_id);
            $this->main_model->delete_many_records('cv_internship_data', 'int_reff_id', $return_id);

            foreach ($_POST['int'] as $val) {


                $res = $val['res'];
                unset($val['res']);
                $ach = $val['ach'];
                unset($val['ach']);
                if ((array_filter($val))) {
                    $val['cv_reff_id'] = $return_id;
                    $val['created_by'] = $_SESSION['user_id'];
                    $val['created_date'] = date('Y-m-d h:i:s');
    //                    print_r($val);
    //                    die;
                    $intexp = $this->main_model->add_update_record('cv_internship', $val);
                    if (!empty($res)) {
                        foreach ($res as $v) {
                            $int_data = array();
                            if ($v != "") {
                                $int_data['int_reff_id'] = $intexp;
                                $int_data['data'] = $v;
                                $int_data['type'] = "Responsibility";
                                $int_data['created_by'] = $_SESSION['user_id'];
                                $int_data['created_date'] = date('Y-m-d h:i:s');

                                $this->main_model->add_update_record('cv_internship_data', $int_data);
                            }
                        }
                    }
                    if (!empty($ach)) {
                        foreach ($ach as $v) {
                            $int_data = array();
                            if ($v != "") {
                                $int_data['int_reff_id'] = $intexp;
                                $int_data['data'] = $v;
                                $int_data['type'] = "Achievement";
                                $int_data['created_by'] = $_SESSION['user_id'];
                                $int_data['created_date'] = date('Y-m-d h:i:s');
                                $this->main_model->add_update_record('cv_internship_data', $int_data);
                            }
                        }
                    }
                }
            }
        }

        // if (array_filter($_POST['int'])) {
        //     $chk = $this->main_model->count_records('cv_internship', $f);
        //     $res = $_POST['int']['res'];
        //     unset($_POST['int']['res']);
        //     $ach = $_POST['int']['ach'];
        //     unset($_POST['int']['ach']);
        //     if ($chk) {
        //         $_POST['int']['cv_reff_id'] = $return_id;
        //         $_POST['int']['modify_by'] = $_SESSION['user_id'];
        //         $_POST['int']['modify_date'] = date('Y-m-d h:i:s');
        //         $int = $this->main_model->add_update_record('cv_internship', $_POST['int'], 'cv_reff_id');
        //     } else {
        //         $_POST['int']['cv_reff_id'] = $return_id;
        //         $_POST['int']['created_by'] = $_SESSION['user_id'];
        //         $_POST['int']['created_date'] = date('Y-m-d h:i:s');
        //         $int = $this->main_model->add_update_record('cv_internship', $_POST['int']);
        //     }
        //     $this->main_model->delete_many_records('cv_internship_data', 'int_reff_id', $int);

        //     if (!empty($res)) {
        //         foreach ($res as $v) {
        //             $int_data = array();
        //             if ($v != "") {
        //                 $int_data['int_reff_id'] = $int;
        //                 $int_data['data'] = $v;
        //                 $int_data['type'] = "Responsibility";
        //                 $int_data['created_by'] = $_SESSION['user_id'];
        //                 $int_data['created_date'] = date('Y-m-d h:i:s');
        //                 $this->main_model->add_update_record('cv_internship_data', $int_data);
        //             }
        //         }
        //     }
        //     if (!empty($ach)) {
        //         foreach ($ach as $v) {
        //             $int_data = array();
        //             if ($v != "") {
        //                 $int_data['int_reff_id'] = $int;
        //                 $int_data['data'] = $v;
        //                 $int_data['type'] = "Achievement";
        //                 $int_data['created_by'] = $_SESSION['user_id'];
        //                 $int_data['created_date'] = date('Y-m-d h:i:s');
        //                 $this->main_model->add_update_record('cv_internship_data', $int_data);
        //             }
        //         }
        //     }
        // }


        $proenc = array();
        if (!empty($_POST['proenc'])) {
            $this->main_model->delete_many_records('cv_proenc', 'cv_reff_id', $return_id);
            foreach ($_POST['proenc'] as $v) {
                if ($v != "") {
                    $proenc['cv_reff_id'] = $return_id;
                    $proenc['data'] = $v;
                    $proenc['created_by'] = $_SESSION['user_id'];
                    $proenc['created_date'] = date('Y-m-d h:i:s');
                    $this->main_model->add_update_record('cv_proenc', $proenc);
                }
            }
        }


        $lang = array();
        if (!empty($_POST['lang'])) {
            $this->main_model->delete_many_records('cv_lang', 'cv_reff_id', $return_id);
            foreach ($_POST['lang'] as $v) {
                if ($v != "") {
                    $proenc['cv_reff_id'] = $return_id;
                    $proenc['data'] = $v;
                    $proenc['created_by'] = $_SESSION['user_id'];
                    $proenc['created_date'] = date('Y-m-d h:i:s');
                    $this->main_model->add_update_record('cv_lang', $proenc);
                }
            }
        }

        $compskill = array();
        if (!empty($_POST['compskill'])) {
            $this->main_model->delete_many_records('cv_compskill', 'cv_reff_id', $return_id);
            foreach ($_POST['compskill'] as $v) {
                if ($v != "") {
                    $compskill['cv_reff_id'] = $return_id;
                    $compskill['data'] = $v;
                    $compskill['created_by'] = $_SESSION['user_id'];
                    $compskill['created_date'] = date('Y-m-d h:i:s');
                    $this->main_model->add_update_record('cv_compskill', $compskill);
                }
            }
        }

        $hobby = array();
        if (!empty($_POST['hobby'])) {
            $this->main_model->delete_many_records('cv_hobby', 'cv_reff_id', $return_id);
            foreach ($_POST['hobby'] as $v) {
                if ($v != "") {
                    $hobby['cv_reff_id'] = $return_id;
                    $hobby['data'] = $v;
                    $hobby['created_by'] = $_SESSION['user_id'];
                    $hobby['created_date'] = date('Y-m-d h:i:s');
                    $this->main_model->add_update_record('cv_hobby', $hobby);
                }
            }
        }

        if (!empty($_POST['achievements'])) {
            $this->main_model->delete_many_records('cv_achievements', 'cv_reff_id', $return_id);
            foreach ($_POST['achievements'] as $k => $val) {
                $ach = array();
                $ach['type'] = $k;
                foreach ($val as $v) {
                    if ($v != "") {
                        $ach['cv_reff_id'] = $return_id;
                        $ach['data'] = $v;
                        $ach['created_by'] = $_SESSION['user_id'];
                        $ach['created_date'] = date('Y-m-d h:i:s');
                        $this->main_model->add_update_record('cv_achievements', $ach);
                    }
                }
            }
        }

        if (isset($_POST['reference']) && ($_POST['reference'] == "Asked")) {
            if (array_filter($_POST['reff'])) {
                $chk = $this->main_model->count_records('cv_reff', $f);
                if ($chk) {
                    $_POST['reff']['cv_reff_id'] = $return_id;
                    $_POST['reff']['modify_by'] = $_SESSION['user_id'];
                    $_POST['reff']['modify_date'] = date('Y-m-d h:i:s');
                    $this->main_model->add_update_record('cv_reff', $_POST['reff'], 'cv_reff_id');
                } else {
                    $_POST['reff']['cv_reff_id'] = $return_id;
                    $_POST['reff']['created_by'] = $_SESSION['user_id'];
                    $_POST['reff']['created_date'] = date('Y-m-d h:i:s');
                    $this->main_model->add_update_record('cv_reff', $_POST['reff']);
                }
            }
        }
    //        print_r($cvdata);
    //        die;

        if (isset($_POST['is_submit'])) {
            header('Location: ' . base_url() . 'cv');
        } else {
            echo 1;
        }
    }
    public function cover_letter_save(){
        // echo "<pre>";
        // print_r($_POST);die;
        $id = $this->input->post('id');
        $sheet_id = $this->input->post('sheet_id');
        $array = array(
            'id' => $id,
            'sent_from' => $this->input->post('send_from'),
            'sent_to' => $this->input->post('send_to'),
            'subject' => $this->input->post('subject'),
            'salutation' => $this->input->post('salutation'),
            'paragraph1' => $this->input->post('paragraph1'),
            'paragraph2' => $this->input->post('paragraph2'),
            'paragraph3' => $this->input->post('paragraph3'),
            'closing' => $this->input->post('closing'),
            'signature' => $this->input->post('signature'),
            'signature2' => $this->input->post('signature2'),
            'signature3' => $this->input->post('signature3'),
            'signature4' => $this->input->post('signature4'),
            'is_submit' => ($this->input->post('is_submit')? $this->input->post('is_submit'): 0),
            'status' => "Active",
        );
        if($id !=''){
            $array['modify_by'] = $_SESSION['user_id'];
            $array['modify_date'] = date('Y-m-d h:i:s');
            $this->main_model->add_update_record('cover_letter', $array, 'id');
        }else{
            $array['user_id'] = $_SESSION['user_id'];
            $array['template_instruction_id'] = $this->input->post('template_instruction_id');
            $array['sheet_id'] = $this->input->post('sheet_id');
            $array['sheet_section_id'] = $this->input->post('sheet_section_id');
            $array['created_by'] = $_SESSION['user_id'];
            $array['created_date'] = date('Y-m-d h:i:s');
            $this->main_model->add_update_record('cover_letter', $array);
        }

        if (isset($_POST['is_submit'])) {
            header('Location: ' . base_url() . 'sheets/sheets/'.$sheet_id);
            //echo "daa";die;
        } else {
            //echo 1;

            echo header('Location: ' . base_url() . 'sheets/sheets/'.$sheet_id);die;
        }
    }
    
    public function cover_letter_save_ajax(){
        $id = $this->input->post('id');
        $sheet_id = $this->input->post('sheet_id');
        $array = array(
            'id' => $id,
            'sent_from' => $this->input->post('send_from'),
            'sent_to' => $this->input->post('send_to'),
            'subject' => $this->input->post('subject'),
            'salutation' => $this->input->post('salutation'),
            'paragraph1' => $this->input->post('paragraph1'),
            'paragraph2' => $this->input->post('paragraph2'),
            'paragraph3' => $this->input->post('paragraph3'),
            'closing' => $this->input->post('closing'),
            'signature' => $this->input->post('signature'),
            'signature2' => $this->input->post('signature2'),
            'signature3' => $this->input->post('signature3'),
            'signature4' => $this->input->post('signature4'),
            'is_submit' => ($this->input->post('is_submit')? $this->input->post('is_submit'): 0),
            'status' => "Active",
        );
        if($id !=''){
            $array['modify_by'] = $_SESSION['user_id'];
            $array['modify_date'] = date('Y-m-d h:i:s');
            $this->main_model->add_update_record('cover_letter', $array, 'id');
        }else{
            $array['user_id'] = $_SESSION['user_id'];
            $array['template_instruction_id'] = $this->input->post('template_instruction_id');
            $array['sheet_id'] = $this->input->post('sheet_id');
            $array['sheet_section_id'] = $this->input->post('sheet_section_id');
            $array['created_by'] = $_SESSION['user_id'];
            $array['created_date'] = date('Y-m-d h:i:s');
            $this->main_model->add_update_record('cover_letter', $array);
        }
        
        echo 1;

        // if (isset($_POST['is_submit'])) {
        //     header('Location: ' . base_url() . 'sheets/sheets/'.$sheet_id);
        //     //echo "daa";die;
        // } else {
        //     //echo 1;

        //     echo header('Location: ' . base_url() . 'sheets/sheets/'.$sheet_id);die;
        // }
    }
    
    public function cover_letter_save_PDF(){
        $user_id = $_SESSION['user_id'];
        $data = $this->main_model->select('cover_letter','*',"id",array('user_id'=>$user_id));
        
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Email Cover Letter');
        //$pdf->SetHeaderMargin(30);
        //$pdf->SetTopMargin(20);
        $pdf->setFooterMargin(10);
        //$pdf->SetAutoPageBreak(true);
        //$pdf->SetAuthor('Author');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
         // add a page group
        $pdf->startPageGroup();
        // add a page
        $pdf->AddPage();
        // output the HTML content
        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
        //             <tr>
        //               <td style="font-size:10px;">Email Cover Letter Action Sheet</td>
        //               <td style="text-align:right;font-size:10px;">Skillpromise Confidential</td>
        //             </tr>
        //         </table>';
        // $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p>To:&nbsp;'.$data[0]->sent_to.'</p><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p>From:&nbsp;'.$data[0]->sent_from.'</p><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p>Subject:&nbsp;'.$data[0]->subject.'</p><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p>Dear:&nbsp;'.$data[0]->salutation.'</p><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p style="text-align: justify;">'.$data[0]->paragraph1.'</p><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p style="text-align: justify;">'.$data[0]->paragraph2.'</p><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p style="text-align: justify;">'.$data[0]->paragraph3.'</p><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p style="text-align: justify;">'.$data[0]->closing.'</p><br><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        
        $html ='<p style="text-align: justify;">'.$data[0]->signature.'</p>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p style="text-align: justify;">'.$data[0]->signature2.'</p>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p style="text-align: justify;">'.$data[0]->signature3.'</p>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $html ='<p style="text-align: justify;">'.$data[0]->signature4.'</p>';
        $pdf->writeHTML($html, true, false, true, false, '');
        
        
        // $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
        //             <tr>
        //               <td style="font-size:10px;">&copy;&nbsp;Sana Skillpromise Education Private Limited</td>
        //               <td style="text-align:right;font-size:10px;">1</td>
        //             </tr>
        //         </table>';
        // $pdf->writeHTML($html, true, false, true, false, '');
        // $pdf->SetDisplayMode('real', 'default');
        // $pdf->Write(5, 'CodeIgniter TCPDF Integration');
        $pdf->Output('cover_letter.pdf', 'D');
        // echo "<pre>";
        // print_r($data);die;
    }

    public function student_dashboard() 
      {
        $this->load->view('student_dashboard');
      }
    
    public function test_center()
    {
        // echo "data";die;
        // echo $this->main_model->fill_nav_node_li_quiz_type_two_new_design('node', 'id', 'test_centre');
        // echo $this->db->last_query();die;
        $this->load->view('test_center');
    }
    
    public function blogs($cat = 0) {
        // $cat_detail['act'] = $cat;
        // $cat_detail['blog_details'] = array();
        // $blog = $this->main_model->get_many_records('blog', '', '', 'id');
        // foreach ($blog as $v) {
        //     $cat_detail['blog_details'][$v['category_id']][] = $v;
        // }

        // $cat_detail['category_details'] = $this->main_model->get_many_records('blog_category', '', '', 'id');
        // foreach ($cat_detail['category_details'] as $key => $value) {
        //     if ($cat == 0 && $key == 0) {
        //         $cat_detail['act'] = $value['id'];
        //     }
        //     if (!isset($cat_detail['blog_details'][$value['id']])) {
        //         $cat_detail['blog_details'][$value['id']] = array();
        //     }
        // }
    $this->load->view('blog', $cat_detail);
        //        echo '<pre>';
        //        print_r($cat_detail);
        //        die;
        // $this->load->view('blog', $cat_detail);
    }
    
    public function QuizAnalatics(){
        $this->load->view('QuizAnalatics');
    }
    
    public function myassetsinventory_PDF($sheet_id = '',$section_sheet_id = ''){
        
        $listing_type_data = $this->main_model->select('listing_type','*','id',array('template_instruction_id' => $section_sheet_id,'is_deleted' => 0));
        
        $draft_data = $this->main_model->select('save_data_listing_type','*','id',array('is_deleted' => 0,'sheet_id' => $sheet_id,'sheet_section_id' => $section_sheet_id,'is_submit' => 1,'user_id' => $_SESSION['user_id']));
        $data['pdf_data_from_sheets'] = $this->main_model->select('sheets','*','id',array('id' => $sheet_id));
        // echo "<pre>";
        // print_r($data);die;
        $prev_content = array();
        foreach ($listing_type_data as $key => $value) {
            foreach ($draft_data as $key_d => $val_draft) {
                if ($val_draft->listing_type_id == $value->id) {
                    $prev_content[$value->name][] = $val_draft->key_answers;
                    //break;
                }
            }
        }
        // echo "<pre>";
        // print_r($prev_content);die;
        
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Asset Inventory');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->startPageGroup();
        $pdf->AddPage();
        if(!empty($draft_data)){
            if(!empty($data['pdf_data_from_sheets'][0]->pdf_header)){
                
                 //  heading image
                         $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                                </td>
                            </tr></table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            // end of heading image
                            // pdf header
                            
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr style="line-height:2.0;">
                                <td align="center" valign="middle" style="background-color:#ff9900;color:white;font-size:13px;"><p>'.ucwords($data['pdf_data_from_sheets'][0]->pdf_header).'</p></td>
                            </tr></table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of pdf header
                            
                            // pdf image
                            $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr style="width:100%;height:200px;line-height:2.0;">
                                <td align="center" style="width:100%;" valign="middle"><img src="assets/ActionPdfImage/'.$data['pdf_data_from_sheets'][0]->pdf_image.'" alt="img">
                                </td>
                            </tr></table>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            // end of pdf image
                            
                            // pdf title & description
                        
                        $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                                <td valign="middle">&nbsp;&nbsp;&nbsp;Title:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_title.'</td>
                            </tr>
                            <tr style="background-color:##d7d7c1;color:white;font-size:11px;line-height:2.0;">
                                <td valign="middle">&nbsp;&nbsp;&nbsp;Description:&nbsp;'.$data['pdf_data_from_sheets'][0]->pdf_description.'</td>
                            </tr>
                            </table><br>';
                            $pdf->writeHTML($html, true, false, true, false, '');
                            
                            // end of title & description
                            
                            
                foreach($prev_content as $pkey => $pvalue){
                    $html ='<p style="color:#4cae4c;">'.$pkey.'</p>';
                    $html .= '<ol>';
                    foreach($pvalue as $k => $v){
                        $html .= '<li>'.$v.'</li>';
                    }
                    $html .= '</ol><br><br>';
                    $pdf->writeHTML($html, true, false, true, false, '');
                }
                
                
                $pdf->Output($data['pdf_data_from_sheets'][0]->pdf_header.'.pdf', 'D');
                
            }else{
                $html ='<table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td align="center" valign="middle"><img src="assets/img/logo.png" style="width:120px;" alt="img">
                        </td>
                    </tr></table>';
                $pdf->writeHTML($html, true, false, true, false, '');
                
                $html ='<p align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Asset Inventory Sheet<sup>TM</sup></p><br><br>';
                $pdf->writeHTML($html, true, false, true, false, '');
                
                foreach($prev_content as $pkey => $pvalue){
                    $html ='<p style="color:#4cae4c;">'.$pkey.'</p>';
                    $html .= '<ol>';
                    foreach($pvalue as $k => $v){
                        $html .= '<li>'.$v.'</li>';
                    }
                    $html .= '</ol><br><br>';
                    $pdf->writeHTML($html, true, false, true, false, '');
                }
                
                
                $pdf->Output('AssetsInventory.pdf', 'D');
            }
           
        }else{
            $html ='<center><h1>No Record Found !!</h1></center>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('AssetsInventory.pdf', 'D');
        }
        
        
        
    }
    
    public function custom_node_assignment_to_package($node) {
        $req = array();
        $data = array();
        $parent = array();
        $package = 14;
        $parent['node'] = $node;
        $parent['packages'] = $package;
        $parent['node_type'] = "";
        $parent['created_by'] = $_SESSION['user_id'];
        $parent['created_date'] = date('Y-m-d H:i:s');
        $parent['modify_by'] = $_SESSION['user_id'];
        $this->main_model->add_update_record("packages-node", $parent);
        $child = $this->main_model->get_child("node", "parent_id", $node, $req);
        if (!empty($child)) {
            $i = 0;
            foreach ($child as $subnode) {
                $data[$i]['node'] = $subnode;
                $data[$i]['packages'] = $package;
                $data[$i]['node_type'] = "";
                $data[$i]['created_by'] = $_SESSION['user_id'];
                $data[$i]['created_date'] = date('Y-m-d H:i:s');
                $data[$i]['modify_by'] = $_SESSION['user_id'];
                $this->main_model->add_update_record("packages-node", $data[$i]);
                $i++;
            }
        }
    }
    
    
    public function copy_node($source_node, $destination_node) {
//        $data = $this->main_model->get_records_from_id("node", $source_node, 'id', '*');
//        if (!empty($data)) {
//            $data['id'] = $destination_node;
//            $this->main_model->add_update_record("node", $data, "id");
//        }

        $this->get_child_and_update("node", "parent_id", $source_node, $destination_node);
    }

    public function get_child_and_update($table = "", $col_name = "", $id = 0, $des_node = 0) {
        $result = $this->main_model->get_data_self_table($table, $col_name, $id);
        $newdata = array();
        $i = 0;
        if (!empty($result)) {
            foreach ($result as $key) {
                $newdata[$i]['parent_id'] = $des_node;
                $newdata[$i]['header'] = $key->header;
                $newdata[$i]['name'] = $key->name;
                $newdata[$i]['sort_order'] = $key->sort_order;
                $newdata[$i]['description'] = $key->description;
                $newdata[$i]['page_content'] = $key->page_content;
                $newdata[$i]['type'] = $key->type;
                $newdata[$i]['image_file'] = $key->image_file;
                $newdata[$i]['duration_from'] = $key->duration_from;
                $newdata[$i]['duration_to'] = $key->duration_to;
                $newdata[$i]['status'] = $key->status;
                $newdata[$i]['created_by'] = $key->created_by;
                $newdata[$i]['created_date'] = $key->created_date;
                $newdata[$i]['modify_by'] = $key->modify_by;
                $ret = $this->main_model->add_update_record("node", $newdata[$i]);
                $newdata[$i]['new_parent'] = $ret;
                $newdata[$i]['prev_id'] = $key->id;
                $this->get_child_and_update($table, $col_name, $key->id, $ret);
                $i++;
            }
        }
    }

    //  Data copy for the manage action sheets //
    public function sheet_copy($sheet_id,$node_id){
        //sheet id is the from where we copy data and where we paste data
        // node is define the sheets
        $SheetData = $this->main_model->selectSingleData('sheets','*',array('id' =>$sheet_id));
       
        if(!empty($SheetData)){

            // echo $this->db->last_query();
            // echo "<pre>";
            // print_r($SheetData);
            //die;

            $template_id = $SheetData->template_type; // Getting Template id from template_type table sheets

            $TemplateInstructionData = $this->main_model->selectSingleData('template_instruction','*',array('sheet_id' =>$sheet_id,'template_id'=> $template_id,'is_deleted' => 0));

            $section_type_id = $TemplateInstructionData->section_type;
            $template_instruction_id = $TemplateInstructionData->id;

            // echo $this->db->last_query();
            // echo "<pre>";
            // print_r($TemplateInstructionData);

            $SheetData_array =array( // data creation for sheet for new node id
                'node' => $node_id,
                'name' => $SheetData->name,
                'template_type' => $SheetData->template_type,
                'details' => $SheetData->details,
                'max_value' => $SheetData->max_value,
                'cat_label' => $SheetData->cat_label,
                'act_label' => $SheetData->act_label,
                'button_label' => $SheetData->button_label,
                'analytics_comment' => $SheetData->analytics_comment,
                'image_file' => $SheetData->image_file,
                'image_comment' => $SheetData->image_comment,
                'status' => 'Active',
                'created_by' => $SheetData->created_by,
                'created_date' => $SheetData->created_date,
                'modify_by' => $SheetData->modify_by,
            );
            $ReturnSheetId = $this->main_model->add_update_record('sheets',$SheetData_array);
            //echo $ReturnSheetId;

            $TemplateInstruction_array = array(
                'sheet_id' => $ReturnSheetId,
                'template_id' => $template_id,
                'section_name' => $TemplateInstructionData->section_name,
                'section_type' => $TemplateInstructionData->section_type,
                'sort_order' => $TemplateInstructionData->sort_order,
                'instruction_text' => $TemplateInstructionData->instruction_text,
                'checkbox' => $TemplateInstructionData->checkbox,
                'checkbox2' => $TemplateInstructionData->checkbox2,
                'created_by' => $TemplateInstructionData->created_by,
                'created_date' => $TemplateInstructionData->created_date,
                'modify_by' => $TemplateInstructionData->modify_by
            );
            $ReturnTemplateInstructionId = $this->main_model->add_update_record('template_instruction',$TemplateInstruction_array);
            // echo "<pre>";
            // print_r($SheetData_array);
            // die;

            $insert_batch_data = array();
            switch ($section_type_id) {
                case 1:
                    $data = $this->main_model->get_records('values_for_checkbox_with_tooltip', "template_instruction_id", $template_instruction_id, "")->result_array();
                    // echo "1"."<br>";
                    // echo "<pre>";
                    // print_r($data);
                    //die;
                    //echo "============================================";
                    foreach ($data as $key => $value) {
                        $insert_batch_data[] = array(
                            'template_instruction_id' => $ReturnTemplateInstructionId,
                            'name' => $value['name'],
                            'description' => $value['description'],
                            'tool_tip' => $value['tool_tip'],
                            'category' => $value['category'],
                            'status' => $value['status'],
                            'created_by' => $value['created_by'],
                            'created_date' => $value['created_date'],
                            'modify_by' => $value['modify_by'],
                            'modify_date' => $value['modify_date'],
                            'is_deleted' => $value['is_deleted'],
                        );
                    }
                    // echo "<pre>";
                    // print_r($insert_batch_data);die;
                    $this->main_model->insert_multi_data('values_for_checkbox_with_tooltip',$insert_batch_data);
                    break;
                case 2:
                    $data = $this->main_model->get_records('value_for_add_more_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                    // echo "2"."<br>";
                    // echo "<pre>";
                    // print_r($data);
                    // die;
                    foreach ($data as $key => $value) {
                        $insert_batch_data[] = array(
                            'template_instruction_id' => $ReturnTemplateInstructionId,
                            'name' => $value['name'],
                            'description' => $value['description'],
                            'created_by' => $value['created_by'],
                            'created_date' => $value['created_date'],
                            'modify_by' => $value['modify_by'],
                            'modify_date' => $value['modify_date'],
                            'is_deleted' => $value['is_deleted'],
                        );
                    }
                    $this->main_model->insert_multi_data('value_for_add_more_type',$insert_batch_data);
                    break;
                case 3:
                    $data = $this->main_model->get_records('checkbox_with_no_tooltip', "template_instruction_id", $template_instruction_id, "")->result_array();
                    $query['template_instruction_id'] = $template_instruction_id;
                    //echo "3"."<br>";
                    // echo "<pre>";
                    // print_r($data);
                    // die;
                    foreach ($data as $key => $value) {
                        $insert_batch_data[] = array(
                            'template_instruction_id' => $ReturnTemplateInstructionId,
                            'name' => $value['name'],
                            'description' => $value['description'],
                            'category' => $value['category'],
                            'status' => $value['status'],
                            'created_by' => $value['created_by'],
                            'created_date' => $value['created_date'],
                            'modify_by' => $value['modify_by'],
                            'modify_date' => $value['modify_date'],
                            'is_deleted' => $value['is_deleted'],
                        );
                    }
                    $this->main_model->insert_multi_data('checkbox_with_no_tooltip',$insert_batch_data);
                   
                    break;
                case 4:
                    $data = $this->main_model->get_records('tickmark_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                        // echo "4"."<br>";
                        // echo "<pre>";
                        // print_r($data);
                        // die;
                        foreach ($data as $key => $value) {
                            $insert_batch_data[] = array(
                                'template_instruction_id' => $ReturnTemplateInstructionId,
                                'name' => $value['name'],
                                'created_by' => $value['created_by'],
                                'created_date' => $value['created_date'],
                                'modify_by' => $value['modify_by'],
                                'modify_date' => $value['modify_date'],
                                'is_deleted' => $value['is_deleted'],
                            );
                        }
                        $this->main_model->insert_multi_data('tickmark_type',$insert_batch_data);
                    break;
                case 5:
                    $data = $this->main_model->get_records('listing_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                        // echo "5"."<br>";
                        // echo "<pre>";
                        // print_r($data);
                        // die;
                        foreach ($data as $key => $value) {
                            $insert_batch_data[] = array(
                                'template_instruction_id' => $ReturnTemplateInstructionId,
                                'name' => $value['name'],
                                'description' => $value['description'],
                                'created_by' => $value['created_by'],
                                'created_date' => $value['created_date'],
                                'modify_by' => $value['modify_by'],
                                'modify_date' => $value['modify_date'],
                                'is_deleted' => $value['is_deleted'],
                            );
                        }
                        $this->main_model->insert_multi_data('listing_type',$insert_batch_data);
                    break;
                case 6:
                    $data = $this->main_model->get_records('descriptive_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                        // echo "6"."<br>";
                        // echo "<pre>";
                        // print_r($data);
                        // die;
                        foreach ($data as $key => $value) {
                            $insert_batch_data[] = array(
                                'template_instruction_id' => $ReturnTemplateInstructionId,
                                'header_name' => $value['header_name'],
                                'created_by' => $value['created_by'],
                                'created_date' => $value['created_date'],
                                'modify_by' => $value['modify_by'],
                                'modify_date' => $value['modify_date'],
                                'is_deleted' => $value['is_deleted'],
                            );
                        }
                        $this->main_model->insert_multi_data('descriptive_type',$insert_batch_data);
                    break;
                case 8: //Range Type --Manage Page
                    $data = $this->main_model->get_records('range_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                        // echo "7"."<br>";
                        // echo "<pre>";
                        // print_r($data);
                        // die;
                        foreach ($data as $key => $value) {
                            $insert_batch_data[] = array(
                                'template_instruction_id' => $ReturnTemplateInstructionId,
                                'name' => $value['name'],
                                'normal_range' => $value['normal_range'],
                                'category' => $value['category'],
                                'status' => $value['status'],
                                'created_by' => $value['created_by'],
                                'created_date' => $value['created_date'],
                                'modify_by' => $value['modify_by'],
                                'modify_date' => $value['modify_date'],
                                'is_deleted' => $value['is_deleted'],
                            );
                        }
                        $this->main_model->insert_multi_data('range_type',$insert_batch_data);
                    break;
                case 7: //Marking  Type --Manage Page 16/8/17
                    $data = $this->main_model->get_records('marking_type', "template_instruction_id", $template_instruction_id, "")->result_array();
                        // echo "8"."<br>";
                        // echo "<pre>";
                        // print_r($data);
                        // die;
                        foreach ($data as $key => $value) {
                            $insert_batch_data[] = array(
                                'template_instruction_id' => $ReturnTemplateInstructionId,
                                'name' => $value['name'],
                                'category' => $value['category'],
                                'created_by' => $value['created_by'],
                                'created_date' => $value['created_date'],
                                'modify_by' => $value['modify_by'],
                                'modify_date' => $value['modify_date'],
                                'is_deleted' => $value['is_deleted'],
                            );
                        }
                        $this->main_model->insert_multi_data('marking_type',$insert_batch_data);
                    break;


                case 9: //advance tickmark  Type --Manage Page 05/10/17-musarrat
                    $data = $this->main_model->get_records('tickmark_adv_content', "template_instruction_id", $template_instruction_id, "")->result_array();
                    // echo "9"."<br>";
                    // echo "<pre>";
                    // print_r($data);
                    // die;
                    foreach ($data as $key => $value) {
                        $insert_batch_data[] = array(
                            'template_instruction_id' => $ReturnTemplateInstructionId,
                            'tickmark_adv_header_id' => $value['tickmark_adv_header_id'],
                            'header1' => $value['header1'],
                            'content1' => $value['content1'],
                            'question1' => $value['question1'],
                            'header2' => $value['header2'],
                            'content2' => $value['content2'],
                            'question2' => $value['question2'],
                            'created_by' => $value['created_by'],
                            'created_date' => $value['created_date'],
                            'modify_by' => $value['modify_by'],
                            'modify_date' => $value['modify_date'],
                            'is_deleted' => $value['is_deleted'],
                        );
                    }
                    $this->main_model->insert_multi_data('tickmark_adv_content',$insert_batch_data);
                    break;

                case 10: // dropdown_with_multi_addmore  Type --Manage Page 29/11/17-musarrat
                    $data = $this->main_model->get_records('dropdown_with_multi_addmore', "template_instruction_id", $template_instruction_id, "")->result_array();
                    // echo "10"."<br>";
                    // echo "<pre>";
                    // print_r($data);
                    // die;
                    foreach ($data as $key => $value) {
                        $insert_batch_data[] = array(
                            'template_instruction_id' => $ReturnTemplateInstructionId,
                            'category' => $value['category'],
                            'description' => $value['description'],
                            'created_by' => $value['created_by'],
                            'created_date' => $value['created_date'],
                            'modify_by' => $value['modify_by'],
                            'modify_date' => $value['modify_date'],
                            'is_deleted' => $value['is_deleted'],
                            'status' => $value['status'],
                        );
                    }
                    $this->main_model->insert_multi_data('dropdown_with_multi_addmore',$insert_batch_data);
                    break;

                case 11: // add_more_checkbox_category  Type --Manage Page 05/12/17-musarrat
                    $data = $this->main_model->get_records('add_more_checkbox_category', "template_instruction_id", $template_instruction_id, "")->result_array();
                    // echo "11"."<br>";
                    // echo "<pre>";
                    // print_r($data);
                    // die;
                    foreach ($data as $key => $value) {
                        $insert_batch_data[] = array(
                            'template_instruction_id' => $ReturnTemplateInstructionId,
                            'category' => $value['category'],
                            'description' => $value['description'],
                            'status' => $value['status'],
                            'created_by' => $value['created_by'],
                            'created_date' => $value['created_date'],
                            'modify_by' => $value['modify_by'],
                            'modify_date' => $value['modify_date'],
                            'is_deleted' => $value['is_deleted'],
                            
                        );
                    }
                    $this->main_model->insert_multi_data('add_more_checkbox_category',$insert_batch_data);
                    break;
            }
        }
    }

    //  End of copy data for the manage action sheets//

    public function copy_question($new_quiz_id,$old_quiz_id){
        $data = $this->main_model->select('questions','*','id',array('quiz_id' => $old_quiz_id));
        //echo "<pre>";
        //print_r($data);die;
        $question_array = array();
        foreach($data as $key => $value){
            $question_array[] = array(
                'quiz_id' => $new_quiz_id,
                'category' => $value->category,
                'story' => $value->story,
                'question_text' => $value->question_text,
                'no_of_options' => $value->no_of_options,
                'question_weight' => $value->question_weight,
                'is_weighted' => $value->is_weighted,
                'answer_text' => $value->answer_text,
                'select_type' => $value->select_type,
                'status' => $value->statusIndex,
                'created_by' => $value->created_by,
                'created_date' => $value->created_date,
                'modify_by' => $value->modify_by,
                'modify_date' => $value->modify_date,
                'is_deleted' => $value->is_deleted,
            );
        }
        // echo "<pre>";
        // print_r($question_array);die;
        if($this->main_model->insert_multi_data('questions',$question_array)){
            echo "Data Copy Done";
        }else{
            
        }
        //print_r($question_array);die;
    }

    public function copy_quiz($old_node_id,$new_node_id){
        $data_quiz = $this->main_model->selectSingleData('quiz','*',array('node' => $old_node_id));
        $quiz_id = $data_quiz->id;
        $quiz_type = $data_quiz->quiz_type;

        $new_quiz_data = array(
            'node' => $new_node_id,
            'name' => $data_quiz->name,
            'description' => $data_quiz->description,
            'page_content' => $data_quiz->page_content,
            'image_file' => $data_quiz->image_file,
            'time_limit' => $data_quiz->time_limit,
            'quiz_type' => $data_quiz->quiz_type,
            'pagination' => $data_quiz->pagination,
            'option_numbering' => $data_quiz->option_numbering,
            'status' => $data_quiz->status,
            'created_by' => $data_quiz->created_by,
            'created_date' => $data_quiz->created_date,
            'modify_by' => $data_quiz->modify_by,
            'modify_date' => $data_quiz->modify_date,
            'is_deleted' => $data_quiz->is_deleted,
            'quiz_category' => $data_quiz->quiz_category,
        );

        if($quiz_type == 'Practice' || $quiz_type == 'Dashboard'){
            $new_quiz_id = $this->main_model->add_update_record('quiz',$new_quiz_data);
            $data = $this->main_model->select('questions','*','id',array('quiz_id' => $quiz_id));
            $question_array = array();
            foreach($data as $key => $value){
                $question_array[] = array(
                    'quiz_id' => $new_quiz_id,
                    'category' => $value->category,
                    'story' => $value->story,
                    'question_text' => $value->question_text,
                    'no_of_options' => $value->no_of_options,
                    'question_weight' => $value->question_weight,
                    'is_weighted' => $value->is_weighted,
                    'answer_text' => $value->answer_text,
                    'select_type' => $value->select_type,
                    'status' => $value->status,
                    'created_by' => $value->created_by,
                    'created_date' => $value->created_date,
                    'modify_by' => $value->modify_by,
                    'modify_date' => $value->modify_date,
                    'is_deleted' => $value->is_deleted,
                );
            }
            if($this->main_model->insert_multi_data('questions',$question_array)){
                echo "Data Copy Done";
            }else{
                
            }
        }elseif($quiz_type == 'Subjective'){
            $new_quiz_id = $this->main_model->add_update_record('quiz',$new_quiz_data);
            $data = $this->main_model->select('subjectivequestions','*','id',array('quiz_id' => $quiz_id));
            $question_array = array();
            foreach($data as $key => $value){
                $question_array = array(
                    'quiz_id' => $new_quiz_id,
                    'category' => $value->category,
                    'story' => $value->story,
                    'question_text' => $value->question_text,
                    'answer_text' => $value->answer_text,
                    'status' => $value->status,
                    'created_by' => $value->created_by,
                    'created_date' => $value->created_date,
                    'modify_by' => $value->modify_by,
                    'modify_date' => $value->modify_date,
                    'is_deleted' => $value->is_deleted,
                    //'created_date' => $value->created_date,
                    //'modify_by' => $value->modify_by,
                    //'modify_date' => $value->modify_date,
                    //'is_deleted' => $value->is_deleted,
                );
                $this->main_model->add_update_record('subjectivequestions',$question_array);
            }
        }else{
            echo "Table Not Found";die;
        }
    }

    public function copy_subjectivequestions($new_quiz_id,$old_quiz_id){
        $data = $this->main_model->select('subjectivequestions','*','id',array('quiz_id' => $old_quiz_id));
        //echo $this->db->last_query();
        //echo "<pre>";
        //print_r($data);die;
        $question_array = array();
        foreach($data as $key => $value){
            $question_array = array(
                'quiz_id' => $new_quiz_id,
                'category' => $value->category,
                'story' => $value->story,
                'question_text' => $value->question_text,
                'answer_text' => $value->answer_text,
                'status' => $value->status,
                'created_by' => $value->created_by,
                'created_date' => $value->created_date,
                'modify_by' => $value->modify_by,
                'modify_date' => $value->modify_date,
                'is_deleted' => $value->is_deleted,
                //'created_date' => $value->created_date,
                //'modify_by' => $value->modify_by,
                //'modify_date' => $value->modify_date,
                //'is_deleted' => $value->is_deleted,
            );
            $this->main_model->add_update_record('subjectivequestions',$question_array);
        }
        // if($this->main_model->insert_multi_data('questions',$question_array)){
        //     echo "Data Copy Done";
        // }else{
            
        // }
       // print_r($question_array);die;
    }
    
    public function curl(){
         $data = [
            'phone' => '917654230817', // Receivers phone
            'body' => 'Hello', // Message
        ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $url = 'https://api.chat-api.com/instance149733/sendMessage?token=u42tuq48x5mtcdb1';
        // Make a POST request
        $options = stream_context_create(['http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/json',
                'content' => $json
            ]
        ]);
        // Send a request
        $result = file_get_contents($url, false, $options);
        echo $result;
    }
    
    public function node_api(){
        $start_from = $this->input->post('start_from');
        $end_from = $this->input->post('end_from');
        // $start_from = 0;
        // $end_from = 500;
        $data = $this->main_model->select('node','*','','id between '.$start_from.' and '.$end_from);
        //echo $this->db->last_query();
        //echo "<br>";
        echo json_encode($data);
        //echo "<pre>";
        //print_r($data);
        die;
    }
    
    //Data migration code start here 
     public function node_api_preetek ()      //insert the data in the node tables
    {
        

        $ch = curl_init();                    // initiate curl
        $url = "http://skillpromise.lexiconcpl.com/imt/node_apiimt"; // where you want to post data

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
       // curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute

        curl_close($ch);

       // echo '<pre>';
        $output1 = json_decode($output);
       
        $insert_batch_data = array();
        $insert_batch_data['parent_id'] = $output1[0]->parent_id;
        $insert_batch_data['header'] = $output1[0]->header;
        $insert_batch_data['name'] = $output1[0]->name;
        $insert_batch_data['sort_order'] = $output1[0]->sort_order;
        $insert_batch_data['description'] = $output1[0]->description;
        $insert_batch_data['page_content'] = $output1[0]->page_content;
        $insert_batch_data['type'] = $output1[0]->type;
        $insert_batch_data['image_file'] = $output1[0]->image_file;
        $insert_batch_data['duration_from'] = $output1[0]->duration_from;
        $insert_batch_data['duration_to'] = $output1[0]->duration_to;
        $insert_batch_data['status'] = $output1[0]->status;
        $insert_batch_data['created_by'] = $output1[0]->created_by;
        $insert_batch_data['created_date'] = $output1[0]->created_date;
        $insert_batch_data['modify_by'] = $output1[0]->modify_by;
        $insert_batch_data['modify_date'] = $output1[0]->modify_date;
        $insert_batch_data['is_deleted'] = $output1[0]->is_deleted;
        //print_r($insert_batch_data);
        $this->main_model->insert('node',$insert_batch_data);
      
    }
    
     public function node_api_preetek_quizstart()
    {
        $ch = curl_init();                    // initiate curl
        $url = "http://skillpromise.lexiconcpl.com/imt/node_api_imtquizstart"; // where you want to post data

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
       // curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute
        
        curl_close($ch);
        $output1 = json_decode($output);
        $insert_batch_data = array();
        $insert_batch_data['node'] = 4600;     // node id for the quiz start button
        $insert_batch_data['name'] = $output1[0]->name; 
        $insert_batch_data['description'] = $output1[0]->description; 
        $insert_batch_data['page_content'] = $output1[0]->page_content; 
        $insert_batch_data['image_file'] = $output1[0]->image_file; 
        $insert_batch_data['time_limit'] = $output1[0]->time_limit; 
        $insert_batch_data['quiz_type'] = $output1[0]->quiz_type; 
        $insert_batch_data['pagination'] = $output1[0]->pagination; 
        $insert_batch_data['option_numbering'] = $output1[0]->option_numbering; 
        $insert_batch_data['status'] = $output1[0]->status; 
        $insert_batch_data['created_by'] = $output1[0]->created_by; 
        $insert_batch_data['created_date'] = $output1[0]->created_date; 
        $insert_batch_data['modify_by'] = $output1[0]->modify_by; 
        $insert_batch_data['modify_date'] = $output1[0]->modify_date; 
        $insert_batch_data['is_deleted'] = $output1[0]->is_deleted; 
        //$insert_batch_data['quiz_category'] = $output1[0]->quiz_category; 
        $this->main_model->insert('quiz',$insert_batch_data);

    }
    
    
    //opitons and answer and question are here
    public function node_api_preetek_questions ()
    {
        $ch = curl_init();                    // initiate curl
        $url = "http://skillpromise.lexiconcpl.com/imt/node_api_imtquestions"; // where you want to post data

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
       // curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        $output = curl_exec($ch); // execute
        
        curl_close($ch);
        $output1 = json_decode($output);
        $this->UploadQuestionAnswer($output1);    //call the next function
       // echo '<pre>';
       // print_r($output1);
        die;
       //die;
    }
    
     //insert in the data question with answer
    public function UploadQuestionAnswer($output1)
    {
       
           $arr_length  = count($output1);    // all questions
            $insert_batch_data = array();
            $output;
            for($i = 0 ; $i < $arr_length ; $i++)
            {
                $insert_batch_data['quiz_id'] = 2222;        //quiz_id for the questions and category and answer
               $return_updated_categoryid = $this->nodescategory($output1[$i]->category);
                $insert_batch_data['category'] =  $return_updated_categoryid;
                $insert_batch_data['story'] = $output1[$i]->story;
                $insert_batch_data['question_text'] = $output1[$i]->question_text;
                $insert_batch_data['no_of_options'] = $output1[$i]->no_of_options;
                $insert_batch_data['question_weight'] = $output1[$i]->question_weight;
                $insert_batch_data['is_weighted'] = $output1[$i]->is_weighted;
                $insert_batch_data['answer_text'] = $output1[$i]->answer_text;
                $insert_batch_data['select_type'] = $output1[$i]->select_type;
                $insert_batch_data['status'] = $output1[$i]->status;
                $insert_batch_data['created_by'] = $output1[$i]->created_by;
                $insert_batch_data['created_date'] = date('Y-m-d H:i:s');
                $insert_batch_data['modify_by'] = $output1[$i]->modify_by;
                $insert_batch_data['modify_date'] = date('Y-m-d H:i:s');
                $insert_batch_data['is_deleted'] = $output1[$i]->is_deleted;
                $return_id =  $this->main_model->insert_with_id('questions',$insert_batch_data);     // return the question id's
                $this->UploadOptions($return_id,$output1[$i]->id); 
                
               
            }
            echo "All records inserted successfully Yes";
           die;
    }


    //return options data
    public function UploadOptions($question_id_save,$question_id)
    {
       
                $ch = curl_init();                    // initiate curl
                $url = "http://skillpromise.lexiconcpl.com/imt/node_api_answeropotion_imt"; // where you want to post data
                //$data['id'] = 9253;
                $data['id'] = $question_id;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
                $output = curl_exec($ch); // execute
                $response = json_decode($output);
                curl_close($ch);
              //update the option inside the database
              $arr_length  = count($response);    // all questions
            
              $insert_batch_data = array();
              for($i = 0 ; $i< $arr_length ; $i++ )
              {
                  //$insert_batch_data['quiz_id'] = 2140;
                  $insert_batch_data['question_id'] = $question_id_save;
                  $insert_batch_data['option_number'] = $response[$i]->option_number;
                  $insert_batch_data['option_text'] = $response[$i]->option_text;
                  $insert_batch_data['option_weight'] = $response[$i]->option_weight;
                  $insert_batch_data['is_correct'] = $response[$i]->is_correct;
                  $insert_batch_data['is_deleted'] = $response[$i]->is_deleted;
                  $this->main_model->insert('options',$insert_batch_data);
              }
                

    }
    
     //call for the category 

    public function nodescategory($old_categoryid)

    {
    
               $return_updated_categoryid;
                $ch = curl_init();                    // initiate curl
                $url = "http://skillpromise.lexiconcpl.com/imt/nodescategory_imt"; // where you want to post data
                //$data['id'] = 9253;
                $data['id'] = $old_categoryid;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
                $output = curl_exec($ch); // execute
                $response = json_decode($output);
                curl_close($ch);
                $arr_length  = count($response);    // all questions
                  $insert_batch_data = array();
                  for($i = 0 ; $i< $arr_length ; $i++ )
              {
                  //$insert_batch_data['quiz_id'] = 2140;
                  $insert_batch_data['name'] = $response[$i]->name;
                  $temp_name = $response[$i]->name;
                  $insert_batch_data['description'] = $response[$i]->description;
                  $temp_description = $response[$i]->description;
                  $insert_batch_data['page_content'] = $response[$i]->page_content;
                  $insert_batch_data['status'] = $response[$i]->status;
                  $insert_batch_data['created_by'] = $response[$i]->created_by;
                  $insert_batch_data['created_date'] = date('Y-m-d H:i:s');
                  $insert_batch_data['modify_by'] = $response[$i]->modify_by;
                  $insert_batch_data['is_deleted'] = $response[$i]->is_deleted;
                  $insert_batch_data['modify_date'] =  date('Y-m-d H:i:s');
                  $insert_batch_data['is_deleted'] = $response[$i]->is_deleted;
                  //check the category past id data
                  //start here 
                  $sql = "SELECT * FROM category WHERE name = '$temp_name' AND
                   description = '$temp_description' ";
                  $data = $this->db->query($sql)->result_array();
                  $temp_Category_id = $data[0]['id'];
                  if(empty($temp_Category_id))
                  {
                     // echo "empty";
                     $return_updated_categoryid =  $this->main_model->insert_with_id('category',$insert_batch_data);
                  }
                  else{
                    $return_updated_categoryid = $temp_Category_id;   // return old id's
                    //  echo "not empty";
                  }
              }
              return  $return_updated_categoryid;
          }
          
          public function options(){
              //echo "hello";
                $ch = curl_init();                    // initiate curl
                $url = "https://skillpromise.com/index.php?/option_status"; // where you 
                curl_setopt($ch, CURLOPT_URL, $url);
                //curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
                //curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
                $output = curl_exec($ch); // execute
                
                $output = json_decode($output);
                //echo $output;
                echo "<pre>";
                print_r($output);
                die;
          }

       //Data migration code end here
        public function mail_function(){
            /*===============Loading mail service====================== */
	            $this->load->library('Phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
            /*==============End ofloading mail service================== */
            
            $mail->isSMTP();
            $mail->CharSet   = "UTF-8";
            //$mail->SMTPDebug = 1;                                          // Send using SMTP
            $mail->Host       = 'mail.parinaam.in';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'mycpm@parinaam.in';                     // SMTP username
            $mail->Password   = 'In$ia#00089';
            $mail->Port       = 587;
			
            $mail->setFrom('mycpm@parinaam.in', 'MyCPM App');
            $mail->addAddress('shubham.das@lexiconcpl.com', 'Shubham');// Add a recipient
            //$mail->addCC($data['email'], $data['recep_name']);               // Name is optional
               
   		    $mail->isHTML(true);                                  // Set email format to HTML
   		    $mail->Subject = 'Attendance';
   		    $mail->Body    = 'Hello';
            $mail->AltBody = 'Hello';
            $mail->send();
        }

}

//class end



