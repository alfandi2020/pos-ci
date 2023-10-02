<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	// private $param;

	public function __construct() {
        parent::__construct();
        // $this->load->library('Pdf');
        // $this->load->model('M_admin');
        $this->load->helper(array('form', 'url'));
        // $this->load->library(array('form_validation','Routerosapi'));
        //cek jika user blm login maka redirect ke halaman login
        if ($this->session->userdata('username', 'nama')  != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }
	}
	public function index()
	{
        $this->db->order_by('id','ASC');
        $barang = $this->db->get('barang')->result();
        $data = [
            "barang" => $barang
        ];
		$this->load->view('body/header');
		$this->load->view('barang/index',$data);
		$this->load->view('body/footer');
	}
    function satuan()
    {
        $satuan = $this->input->post('satuan');
        $singkat = $this->input->post('singkat');
        if ($satuan == true && $singkat == true) {
            $datax = [
                "satuan" => $satuan,
                "singkatan" => strtoupper($singkat)
            ];
            $this->db->insert('satuan',$datax);
            redirect('barang/satuan');
        }
        $data = [
            "satuan" => $this->db->get('satuan')->result()
        ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('barang/satuan',$data);
            $this->load->view('body/footer');

    }
    function get_barang()
    {
        $id = $this->input->post('id');
        $this->db->where('a.id',$id);
        $this->db->from('barang as a');
        $this->db->join('kategori as b','a.kategori_id=b.id');
        $data=  $this->db->get()->row_array();
        echo json_encode($data);
    }
}
