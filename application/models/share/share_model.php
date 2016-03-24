<?php

class Share_model extends CI_Model {

    var $graph_id;
    var $graph_type;
    

    function __construct() {
        parent::__construct();
    }
    
    public function get_graph_id() {
        return $this->graph_id;
    }

    public function set_graph_id($graph_id) {
        $this->graph_id = $graph_id;
    }
    
    public function get_graph_type() {
        return $this->graph_type;
    }

    public function set_graph_type($graph_type) {
        $this->graph_type = $graph_type;
    }




}


