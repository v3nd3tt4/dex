<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cur_wp extends CI_Controller
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
        $data['title'] = 'Cur WP';
        $data['script'] = 'cur_wp/script';
        $this->db->from('cur_wp');
        // $this->db->join('tb_unit', 'tb_unit.id_unit=tb_user.unit');
        $query = $this->db->get();
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('cur_wp/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Cur WP';
        $data['script'] = 'cur_wp/script';
        
        
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('cur_wp/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $latitude = $this->input->post('latitude', true);
        $longitude = $this->input->post('longitude', true);
        $data_to_save = array(
            'latitude' => $latitude,
            'longitude'=> $longitude,
            

        );
        $simpan = $this->db->insert('cur_wp', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'cur_wp";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id){
        $hapus = $this->db->delete('cur_wp', array('id' => $id));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'cur_wp";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id)
    {
        $query = $this->db->get_where('cur_wp', array('id' => $id));
        $data['title'] = 'Edit Cur WP';
        $data['script'] = 'cur_wp/script';
        $data['row'] = $query;

        

        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('cur_wp/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
        $id = $this->input->post('id', true);
        

        $latitude = $this->input->post('latitude', true);
        $longitude = $this->input->post('longitude', true);
        $data_to_save = array(
            'latitude' => $latitude,
            'longitude'=> $longitude,
        );

        $simpan = $this->db->update('cur_wp', $data_to_save, array('id' => $id));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'cur_wp";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
