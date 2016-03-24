<?php

class Share_service extends CI_Model {

    function __construct() {

        parent::__construct();
    }
    
     public function get_user_generated_graph() {


        $this->db->select('*');
        $this->db->from('share');
        //$this->db->where('del_ind','1');
        $this->db->order_by("share.graph_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
}


