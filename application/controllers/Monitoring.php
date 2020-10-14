<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
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
        $data['title'] = 'Monitoring';
        $data['script'] = 'monitoring/script';
        $this->db->from('monitoring');
        // $this->db->join('tb_unit', 'tb_unit.id_unit=tb_user.unit');
        $query = $this->db->get();
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('monitoring/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah monitoring';
        $data['script'] = 'monitoring/script';
        
        
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('monitoring/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $latitude = $this->input->post('latitude', true);
		$longitude = $this->input->post('longitude', true);
		$heading = $this->input->post('heading', true);
		$tilt = $this->input->post('tilt', true);
		$speed = $this->input->post('speed', true);
		$waktu = $this->input->post('waktu', true);
        $data_to_save = array(
            'latitude' => $latitude,
			'longitude'=> $longitude,
			'heading'=> $heading,
			'tilt'=> $tilt,
			'speed'=> $speed,
			'waktu'=> $waktu,
        );
        $simpan = $this->db->insert('monitoring', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'monitoring";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id){
        $hapus = $this->db->delete('monitoring', array('id' => $id));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'monitoring";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id)
    {
        $query = $this->db->get_where('monitoring', array('id' => $id));
        $data['title'] = 'Edit monitoring';
        $data['script'] = 'monitoring/script';
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('monitoring/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
		$id = $this->input->post('id', true);
		
        $latitude = $this->input->post('latitude', true);
		$longitude = $this->input->post('longitude', true);
		$heading = $this->input->post('heading', true);
		$tilt = $this->input->post('tilt', true);
		$speed = $this->input->post('speed', true);
		$waktu = $this->input->post('waktu', true);
        $data_to_save = array(
            'latitude' => $latitude,
			'longitude'=> $longitude,
			'heading'=> $heading,
			'tilt'=> $tilt,
			'speed'=> $speed,
			'waktu'=> $waktu,
        );

        $simpan = $this->db->update('monitoring', $data_to_save, array('id' => $id));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'monitoring";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
