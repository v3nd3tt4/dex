<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dryer2 extends CI_Controller
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
        $data['title'] = 'Dryer2';
        $data['script'] = 'dryer2/script';
        $this->db->from('dryer2');
        // $this->db->join('tb_unit', 'tb_unit.id_unit=tb_user.unit');
        $query = $this->db->get();
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('dryer2/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Dryer2';
        $data['script'] = 'dryer2/script';
        
        
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('dryer2/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $humidity = $this->input->post('humidity', true);
		$temp = $this->input->post('temp', true);
		$tanggal = $this->input->post('tanggal', true);
        $data_to_save = array(
            'humidity' => $humidity,
			'temp'=> $temp,
			'tanggal'=> $tanggal,
        );
        $simpan = $this->db->insert('dryer2', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'dryer";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id){
        $hapus = $this->db->delete('dryer2', array('id' => $id));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'dryer";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id)
    {
        $query = $this->db->get_where('dryer2', array('id' => $id));
        $data['title'] = 'Edit Dryer2';
        $data['script'] = 'dryer2/script';
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('dryer2/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
		$id = $this->input->post('id', true);
		
        $humidity = $this->input->post('humidity', true);
		$temp = $this->input->post('temp', true);
		$tanggal = $this->input->post('tanggal', true);
        $data_to_save = array(
            'humidity' => $humidity,
			'temp'=> $temp,
			'tanggal'=> $tanggal,
        );

        $simpan = $this->db->update('dryer2', $data_to_save, array('id' => $id));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'dryer";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
