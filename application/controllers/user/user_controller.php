<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        //if (!$this->session->userdata('USER_LOGGED_IN')) {
           // redirect(site_url() . '/login/login_controller');
        //} else {

            $this->load->model('user/user_model');
            $this->load->model('user/user_service');
            
            

            $this->load->library('email');

            

            
        //}
    }

    function manage_users() {

        $user_service = new User_service();
        
        $data['heading'] = "Manage User";
        $data['users'] = $user_service->get_all_user_details($this->session->userdata('USER_ID'));

        //$data['wages_categories'] = $wages_category_service->get_all_wages_categories();


        $partials = array('content' => 'user/manage_user_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    /* this function use to add new user */

    function user_registration() {
      

        

        $user_model = new User_model();
        $user_service = new User_service();
        $privilege_master_service = new Privilege_master_service();
        $privilege_service = new Privilege_service();
        $user_privilege_model = new User_privileges_model();
        $user_privilege_service = new User_privileges_service();

        $user_model->set_user_name($this->input->post('txtUserName', TRUE));
        $user_model->set_user_email($this->input->post('txtUserEmail', TRUE));
        $user_model->set_user_password(md5($this->input->post('txtUserPassword', TRUE)));
        $user_model->set_user_job($this->input->post('txtUserJob', TRUE));
        $user_model->set_user_comapny_name($this->input->post('txtUserCompanyName', TRUE));
        //$user_model->set_account_activation_code(md5($token));
        $user_model->set_del_ind('2'); //account not activated
        $user_model->set_added_date(date("Y-m-d H:i:s"));
       




        $user_id = $user_service->add_new_user_registration($user_model);

      

        //$name = ucfirst($this->input->post('txtUserName', TRUE));
        //$email = $this->input->post('txtUserEmail', TRUE);
        //$token = $this->generate_random_string(); //generate account activation token

        

        

        //assign default privileges in the beginning 
        $privilege_masters = $privilege_master_service->get_available_master_privileges();

        foreach ($privilege_masters as $privilege_master) {
            $privileges = $privilege_service->get_privileges_by_master_privilege_assigned_for($privilege_master->privilege_master_code, $this->config->item('ADMIN'));
            foreach ($privileges as $privilege) {

                $user_privilege_model->set_user_id($user_id);
                $user_privilege_model->set_privilege_code($privilege->privilege_code);
                $user_privilege_service->add_new_user_privilege_system($user_privilege_model);
            }
        }


//        $link = base_url() . "index.php/user/user_controller/account_activation/" . urlencode($user_id) . "/" . md5($token);
//
//
//        if ($user_id) {
//
//             $data['name'] = $name;
//            $data['link'] = $link;
//            $data['pasword'] = $this->input->post('txtUserPassword', TRUE);
//            $data['user_name'] = $this->input->post('txtUserEmail', TRUE);
//
//
//
//            $email_subject = "VisualizeInYourWay :Activate Your New Account ";
//
//
//            $msg = $this->load->view('template/mail_template/body', $data, TRUE);
//
//            $headers = 'MIME-Version: 1.0' . "\r\n";
//            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//            $headers .= 'From: VisualizeInYourWay <VisualizeInYourWay@gmail.com>' . "\r\n";
//            $headers .= 'Cc:kaumadi2014@gmail.com' . "\r\n";
//
//            if (mail($email, $email_subject, $msg, $headers)) {
//                echo "1";
//            } else {
//                echo "0";
//            }
//        } else {
//            echo "0";
//        }
    }

    /* This Function use to delete user */

    function delete_user() {


        $user_service = new User_service();

        echo $user_service->delete_user(trim($this->input->post('id', TRUE)));
    }


    /* this functon use to manage edit user view */

    function edit_user_view($user_id) {
//        $perm = Access_controller_service :: checkAccess('EDIT_USER');
//        if ($perm) {

        $user_service = new user_service();
        

        $data['heading'] = "Edit User Details";
        $data['user'] = $user_service->get_user_by_id($user_id);
        


        $partials = array('content' => 'user/edit_user_view');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    /* this function use to edit user details using update_user function */

    function edit_user() {

//        $perm = Access_controller_service :: checkAccess('EDIT_USER');
//        if ($perm) {

        $user_model = new user_model();
        $user_service = new user_service();

        //$user_model->set_user_no($this->input->post('user_no', TRUE));
        $user_model->set_user_name($this->input->post('user_name', TRUE));
        //$user_model->set_user_lname($this->input->post('user_lname', TRUE));
        $user_model->set_user_password(md5($this->input->post('user_password', TRUE)));
        $user_model->set_user_email($this->input->post('user_email', TRUE));
        //$user_model->set_user_type($this->input->post('user_type', TRUE));
        //$user_model->set_user_bday($this->input->post('user_bday', TRUE));
        //$user_model->set_user_contact($this->input->post('user_contact', TRUE));
        //$user_model->set_user_wages_category($this->input->post('user_wages_category', TRUE));
        //$user_model->set_user_contract($this->input->post('user_contract', TRUE));
        $user_model->set_user_avatar($this->input->post('user_avatar', TRUE));
        $user_model->set_user_job($this->input->post('user_job',TRUE));
        $user_model->set_user_name($this->input->post('user_name',TRUE));
        $user_model->set_updated_date(date("Y-m-d H:i:s"));

        $user_model->set_user_id($this->input->post('user_id', TRUE));

        if ($this->input->post('user_id', TRUE) == $this->session->userdata('USER_ID')) {
            $this->session->set_userdata('USER_PROPIC', $this->input->post('user_avatar', TRUE));
        }


        echo $user_service->update_user($user_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    /* this function use to upload image */

    function upload_image() {

        $uploaddir = './uploads/user_avatar/';
        $unique_tag = 'user_avatar';

        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile']['name']); //this is the file name
        $file = $uploaddir . $filename; // this is the full path of the uploaded file

        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
            echo $filename;
        } else {
            echo "error";
        }
    }

    //generate token
    public function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $random_string;
    }

    public function account_activation($user_id, $token) {

        $user_service = new User_service();
        $user_model = new User_model();

        $user_model->set_user_id($user_id);
        $user_model->set_account_activation_code($token);

        $count = $user_service->check_user_id_token_combination($user_model);

        if ($count == 1) {
            $data['user_id'] = $user_id;
            $user_model->set_del_ind('1');
            $user_service->activate_user_account($user_model);

            echo $this->load->view('template/success_account_activated_view', $data);
        } else {
            $data['heading'] = "Invalid URL Request";

            echo $this->load->view('users/invalid_url', $data);
        }
    }

    

    

}

?>