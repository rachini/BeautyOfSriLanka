<?php



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Share_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
//  $this->load->model('upload_files_stuff/upload_files_stuff_model');
//        $this->load->model('upload_files_stuff/upload_files_stuff_service');

        }
        
  
    function manage_share() {
              $data['heading'] = "Share and print your graphs";
   
            $partials = array('content' => 'share/share_view');
            $this->template->load('template/main_template', $partials, $data);
      
    }
    
    public function print_graph_pdf_report() {
        $share_service = new Share_service();



        $current_graphs = $share_service->get_user_generated_graph();
        $data['graphs'] = $current_graphs;

        $data['title'] = 'Graph';
        $SResultString = $this->load->view('reports/view_graph', $data, TRUE);
        $footer = $this->load->view('reports/pdf_footer', $data, TRUE);
        $this->load->library('MPDF56/mpdf');
        $mpdf = new mPDF('utf-8', 'A4');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter($footer);
        $mpdf->WriteHTML($SResultString);
        $mpdf->Output();
    }
    
      function manage_graphs() {
              $data['heading'] = "select graphs category";
   
            $partials = array('content' => 'graph/view_graph');
            $this->template->load('template/main_template', $partials, $data);
      
    }


}