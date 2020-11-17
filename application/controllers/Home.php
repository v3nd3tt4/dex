<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('login', true))){
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function index()
    {
       	// $q = $this->db->query("SELECT * FROM dryer
		//    WHERE humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ");
		// $data['row'] = $q;

		// $q2 = $this->db->query("SELECT * FROM dryer2
		//    WHERE humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ");
		// $data['row2'] = $q2;

		// $q3 = $this->db->query("SELECT * FROM dryer3
		//    WHERE humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ");
		// $data['row3'] = $q3;

		// $q4 = $this->db->query("SELECT * FROM dryer4
		//    WHERE humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ");
		// $data['row4'] = $q4;

		// $q5 = $this->db->query("SELECT * FROM dryer5
		//    WHERE humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ");
		// $data['row5'] = $q5;

		// $q6 = $this->db->query("SELECT * FROM dryer6
		//    WHERE humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ");
		// $data['row6'] = $q6;

        $data['title'] = 'Dashboard';
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('sifa/index', $data);
        $this->load->view('_layout_sifa/footer');
    }
}
