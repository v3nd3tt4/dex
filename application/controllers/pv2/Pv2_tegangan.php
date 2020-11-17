<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pv2_tegangan extends CI_Controller
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
        $data['title'] = 'pv2_tegangan';
        $data['script'] = 'pv2/pv2_tegangan/script';
        $this->db->from('pv2_volt');
        // $this->db->join('tb_unit', 'tb_unit.id_unit=tb_user.unit');
        
        
        if(!empty($_POST)){
            $tgl_awal = $this->input->post('tanggal_awal', true);
            $tgl_akhir = $this->input->post('tanggal_akhir', true);

            if(strtotime($tgl_akhir) < strtotime($tgl_awal)){
                echo '<script>alert("Tanggal Akhir tidak boleh lebih kecil dari tanggal awal");</script>';
                echo '<script>window.location.href = "'.base_url().'pv2/pv2_tegangan";</script>';
                exit();
            }

            if(strtotime($tgl_awal) == strtotime($tgl_akhir)){
                $this->db->where(array('DATE(tanggal)' => $tgl_awal));
                // $que = "SELECT * FROM pv2_volt WHERE DATE(tanggal) = '$tgl_awal'  and humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ";
                $que = "SELECT * FROM pv2_volt WHERE DATE(tanggal) = '$tgl_awal'";
            }

            if(strtotime($tgl_akhir) > strtotime($tgl_awal)){
                $this->db->where(array('DATE(tanggal) >=' => $tgl_awal));
                $this->db->where(array('DATE(tanggal) <=' => $tgl_akhir));

                // $que = "SELECT * FROM pv2_volt WHERE (DATE(tanggal) between '$tgl_awal' and '$tgl_akhir') and humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ";
                $que = "SELECT * FROM pv2_volt WHERE (DATE(tanggal) between '$tgl_awal' and '$tgl_akhir')";
            }

        }else{
            // $que = "SELECT * FROM pv2_volt
            // WHERE humidity NOT LIKE '%t%' AND humidity NOT LIKE '%n%' AND humidity != '' AND temp NOT LIKE '%t%' AND temp NOT LIKE '%n%' AND temp != '' ";
            $que = "SELECT * FROM pv2_volt";
        }


        $query = $this->db->get();
        // echo $que;exit();
        $data['row'] = $query;

        $q = $this->db->query($que);
		$data['row_chart'] = $q;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pv2/pv2_tegangan/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'pv2_tegangan';
        $data['script'] = 'pv2/pv2_tegangan/script';
        
        
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pv2/pv2_tegangan/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $data = $this->input->post('data', true);
		$tanggal = $this->input->post('tanggal', true);
        $data_to_save = array(
            'data' => $data,
			'tanggal'=> $tanggal,
        );
        $simpan = $this->db->insert('pv2_volt', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'pv2/pv2_tegangan";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id){
        $hapus = $this->db->delete('pv2_tegangan', array('id' => $id));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'pv2/pv2_tegangan";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id)
    {
        $query = $this->db->get_where('pv2_volt', array('id' => $id));
        $data['title'] = 'pv2_tegangan';
        $data['script'] = 'pv2/pv2_tegangan/script';
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pv2/pv2_tegangan/edit', $data);
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

        $simpan = $this->db->update('pv2_volt', $data_to_save, array('id' => $id));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'pv2/pv2_tegangan";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
