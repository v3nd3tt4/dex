<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pv1_daya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level', true) != 'Admin'){
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function index()
    {
        $data['title'] = 'pv1_daya';
        $data['script'] = 'pv1/pv1_daya/script';
        $this->db->from('pv1_daya');
        // $this->db->join('tb_unit', 'tb_unit.id_unit=tb_user.unit');
        
        
        if(!empty($_POST)){
            $tgl_awal = $this->input->post('tanggal_awal', true);
            $tgl_akhir = $this->input->post('tanggal_akhir', true);

            if(strtotime($tgl_akhir) < strtotime($tgl_awal)){
                echo '<script>alert("Tanggal Akhir tidak boleh lebih kecil dari tanggal awal");</script>';
                echo '<script>window.location.href = "'.base_url().'pv1/pv1_daya";</script>';
                exit();
            }

            if(strtotime($tgl_awal) == strtotime($tgl_akhir)){
                $this->db->where(array('DATE(tanggal)' => $tgl_awal));
                // $que = "SELECT * FROM pv1_daya WHERE DATE(tanggal) = '$tgl_awal'  and humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ";
                $que = "SELECT * FROM pv1_daya WHERE DATE(tanggal) = '$tgl_awal'";
            }

            if(strtotime($tgl_akhir) > strtotime($tgl_awal)){
                $this->db->where(array('DATE(tanggal) >=' => $tgl_awal));
                $this->db->where(array('DATE(tanggal) <=' => $tgl_awal));

                // $que = "SELECT * FROM pv1_daya WHERE (DATE(tanggal) between '$tgl_awal' and '$tgl_akhir') and humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ";
                $que = "SELECT * FROM pv1_daya WHERE (DATE(tanggal) between '$tgl_awal' and '$tgl_akhir')";
            }

        }else{
            // $que = "SELECT * FROM pv1_daya
            // WHERE humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ";
            $que = "SELECT * FROM pv1_daya";
        }


        $query = $this->db->get();
        // echo $que;exit();
        $data['row'] = $query;

        $q = $this->db->query($que);
		$data['row_chart'] = $q;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pv1/pv1_daya/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'pv1_daya';
        $data['script'] = 'pv1/pv1_daya/script';
        
        
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pv1/pv1_daya/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $data = $this->input->post('data', true);
		$tanggal = $this->input->post('tanggal', true);
        $data_to_save = array(
            'data' => $data,
			'tanggal'=> $tanggal,
        );
        $simpan = $this->db->insert('pv1_daya', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'pv1/pv1_daya";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id){
        $hapus = $this->db->delete('pv1_daya', array('id' => $id));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'pv1/pv1_daya";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id)
    {
        $query = $this->db->get_where('pv1_daya', array('id' => $id));
        $data['title'] = 'pv1_daya';
        $data['script'] = 'pv1/pv1_daya/script';
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pv1/pv1_daya/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
		$id = $this->input->post('id', true);
		
        $data = $this->input->post('data', true);
		$tanggal = $this->input->post('tanggal', true);
        $data_to_save = array(
            'data' => $data,
			'tanggal'=> $tanggal,
        );

        $simpan = $this->db->update('pv1_daya', $data_to_save, array('id' => $id));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'pv1/pv1_daya";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
