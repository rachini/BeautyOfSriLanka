<?php

class User_service extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    
    //update user last login date
       function update_user_lastlogin_date($user_model) {

        $data = array(
            'updated_date' => $user_model->get_current_date(),
        );

        $this->db->where('user_id', $user_model->get_user_id());
        return $this->db->update('user', $data);
    }
    
    /*display user avatar*/
    public function get_all_users() {


        $this->db->select('user_avatar');
        $this->db->from('user');
        $this->db->where('del_ind','1');
        $this->db->order_by("user.user_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    //update online status
    function update_online_status($user_model) {
        $data = array('is_online' => $user_model->get_is_online());
        $this->db->where('user_id', $user_model->get_user_id());
        return $this->db->update('user', $data);
    }

   function get_user_by_email($user_email) {

        $query = $this->db->get_where('user', array('user_email' => $user_email));
        return $query->row();
    }
    
//    function get_users_by_id($user_id) {
//
//        $query = $this->db->get_where('user', array('user_id' => $user_id));
//        return $query->row();
//    }
    
    function authenticate_user($user_model) {

        $data = array('user_email' => $user_model->get_user_email() );

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($data);
        $query = $this->db->get();
      
        return $query->row();
    }

    function authenticate_user_with_password($user_model) {

        $data = array('user_email' => $user_model->get_user_email(), 'user_password' => $user_model->get_user_password());

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($data);
        $query = $this->db->get();
          
        return $query->row();
    }


   

    public function get_user($user_id) {

        $query = $this->db->get_where('user', array('user_id' => $user_id, 'del_ind' => '1'));
        return $query->row();
    }




    

  

    function getUserpasswordbyid($usermodel) {

        $this->db->select('lcs_user.Password');
        $this->db->from('lcs_user');
        $this->db->where('lcs_user.User_Id ', $usermodel->getUser_Id());
        $query = $this->db->get();
        return $query->row()->Password;
    }

    function setnewPassword($usermodel) {

        $data = array('Password' => $usermodel->getPassword());
        $this->db->where('User_Id', $usermodel->getUser_Id());
        $result = $this->db->update('lcs_user', $data);
        return $result;
    }

   

//    //functions to check email and user number availability
//    function checkEmail($user_model) {
//
//        $this->db->select('*');
//        $this->db->from('lcs_user');
//        $this->db->where('lcs_user.Email ', $user_model->get_user_email());
//        if ((int) $user_model->get_user_id() != 0) {
//            $this->db->where('lcs_user.user_id !=', $user_model->get_user_id());
//        }
//        $query = $this->db->get();
//        //echo $this->db->last_query();die;
//        //echo $query->num_rows();die;
//        return $query->num_rows();
//    }

//    function add_new_user_registration($user_model) {
//
//        $this->db->insert('user', $user_model);
//        return $this->db->insert_id();
//    }

}
