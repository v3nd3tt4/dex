<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pv1_lux_meter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function store(){
        if($this->input->get('code', true) != 'dex'){
            echo 'Pengaman Salah';
            exit();
        }
        $data = $this->input->get('data', true);
        $data_to_save = array(
            'data' => $data,
			'tanggal'=> date('Y-m-d H:i:s'),
        );
        $simpan = $this->db->insert('pv1_lux_meter', $data_to_save);
        if($simpan){
            echo 'sukses';
        }else{
            echo 'gagal';
        }
    }

    
}