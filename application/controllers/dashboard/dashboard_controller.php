<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html 
     */
    function __construct() {

        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {

            $this->load->model('user/user_model');
            $this->load->model('user/user_service');


        }
    }

    function index() {
        
        //echo "test";die;
        
        $user_service = new User_service();

          $data['users'] = $this->session->userdata('USERS');

        $partials = array('content' => 'dashboard/dashboard_view');
        $this->template->load('template/main_template', $partials,$data);
    }

}