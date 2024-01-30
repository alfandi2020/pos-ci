<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('Pdf');
        $this->load->model('M_Barang');
        $this->load->helper(array('form', 'url', 'date'));

        $this->load->library('PHPExcel');
        // $this->load->library(array('form_validation','Routerosapi'));
        //cek jika user blm login maka redirect ke halaman login
        if ($this->session->userdata('username', 'nama')  != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }
    }

    public function getBarang()
    {
        $kategoriId = $this->input->post('kategori_id');

        $barang =  $this->db->where('kategori_id', $kategoriId)->order_by('nama', 'ASC')->get('barang')->result();

        // Mengembalikan data dalam format JSON
        echo json_encode($barang);
    }

    public function getBarangGudang()
    {
        $gudang_id = $this->input->post('gudang_id');

        $barang =  $this->db->where('id_gudang', $gudang_id)->order_by('nama', 'ASC')->get('barang')->result();

        // Mengembalikan data dalam format JSON
        echo json_encode($barang);
    }

    public function getBarangDetail()
    {
        $id_barang = $this->input->post('barang_id');

        $barang =  $this->db->where('id', $id_barang)->get('barang')->row_array();

        // Mengembalikan data dalam format JSON
        echo json_encode($barang);
    }

    public function index()
    {
        $data = [
            "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
            "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
            "barang" => $this->db->where('id_gudang', '7')->order_by('nama', 'ASC')->get('barang')->result(),
            'title' => 'inventori'
        ];

        $this->load->view('body/header', $data);
        $this->load->view('inventori/index', $data);
        $this->load->view('body/footer');
    }

    public function stock_opname()
    {
        $max_num = $this->db->select('max(no_urut) as max')->get('stock_opname')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_stock_opname = 'STP-' . date('ym') . '-' . $no_urut;
        $data = [
            "gudang2" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "no_sop" => $no_stock_opname,
            "no_urut" => $no_urut,
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/stock_opname', $data);
        $this->load->view('body/footer');
    }

    public function histori_sop()
    {
        $now = date("Y-m-d");
        if (!$_POST) {
            $data = [
                "lists" => $this->db->where('tanggal_opname', $now)->order_by('no_stock_opname', 'DESC')->get('stock_opname')->result(),
            ];
        } else {
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $data = [
                "lists" => $this->db->where('tanggal_opname >=', $dari)->where('tanggal_opname <=', $sampai)->order_by('no_stock_opname', 'DESC')->get('stock_opname')->result(),
            ];
        }

        $this->load->view('body/header');
        $this->load->view('inventori/histori_sop', $data);
        $this->load->view('body/footer');
    }

    public function process_stock_opname()
    {
        $data = [
            "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
            "tanggal" => $this->input->post('tanggal'),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/stock_opname', $data);
        $this->load->view('body/footer');
    }

    public function approve()
    {
        $id = $this->uri->segment(3);
        print_r($id);

        $sop_detail = $this->db->where('Id', $id)->get('stock_opname_details')->row_array();

        $data_sop_detail = ['status' => '1'];

        $data_stok = ['stok' => $sop_detail['qty_fisik']];

        $this->db->where('id', $sop_detail['id_barang'])->update('barang', $data_stok);
        $update = $this->db->where('Id', $id)->update('stock_opname_details', $data_sop_detail);

        if ($update) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Stok barang sudah diperbarui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Terjadi kesalahan. Silahkan dicoba lagi.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function sop_approve_all($id)
    {
        $sop_details = $this->db->where('id_stock_opname', $id)->where('status', '0')->get('stock_opname_details')->result();

        foreach ($sop_details as $s) {
            $id_barang = $s->id_barang;

            $query = $this->db->where('id', $id_barang)->get('barang');
            $detail = $query->row_array();

            $kode_barang = $detail['kode_barang'];
            $stok = $detail['stok'];
            $qty_konv = $detail['qty_konv'];
            $qty_kecil = $detail['qty_kecil'];
            $qty_besar = $detail['qty_besar'];

            $jumlah_stok = $s->selisih;

            $satuan = $s->satuan;

            if ($satuan == "konv") {
                $jumlah = $jumlah_stok;
            } else if ($satuan == "kecil" && $qty_konv) {
                $jumlah = $jumlah_stok * $qty_kecil;
            } else if ($satuan == "kecil" && !$qty_konv) {
                $jumlah = $jumlah_stok;
            } else if ($satuan == "besar" && $qty_konv) {
                $jumlah = $jumlah_stok * $qty_konv * $qty_kecil * $qty_besar;
            } else if ($satuan == "besar" && !$qty_konv) {
                $jumlah = $jumlah_stok * $qty_kecil;
            }

            $stok_baru = $stok + $jumlah;
            $data = [
                'nama' => $detail['nama'],
                'satuan' => $satuan,
                'konv' => $qty_konv,
                'kecil' => $qty_kecil,
                'besar' => $qty_besar,
                'stok' => $stok,
                'jumlah' => $jumlah,
                'sop' => $jumlah_stok,
            ];
            $data_sop_detail = ['status' => '1'];

            $data_stok = ['stok' => $stok_baru];
            // echo '<pre>';
            // print_r($data);
            // print_r($data_stok);
            // echo '</pre>';

            $this->db->where('id', $s->id_barang)->update('barang', $data_stok);
            $this->db->where('Id', $s->Id)->update('stock_opname_details', $data_sop_detail);
        }
        // exit;

        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Stok barang sudah diperbarui.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function koreksi_barang()
    {
        $max_num = $this->db->select('max(no_urut) as max')->get('koreksi')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_koreksi = 'STP-' . date('ym') . '-' . $no_urut;
        $data = [
            "gudang2" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "lists" => $this->db->order_by('no_koreksi', 'DESC')->get('koreksi')->result(),
            "no_koreksi" => $no_koreksi,
            "no_urut" => $no_urut,
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/koreksi_barang', $data);
        $this->load->view('body/footer');
    }

    public function proses_koreksi_barang()
    {
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');

        $data_koreksi = [
            "id_barang" => $id_barang,
            "tanggal_koreksi" => date('Y-m-d'),
            "stok_awal" => $this->input->post('stok'),
            "debit_kredit" => $this->input->post('debit_kredit'),
            "jumlah_koreksi" => $this->input->post('jumlah'),
            "alasan_koreksi" => $this->input->post('alasan_koreksi'),
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => $this->session->userdata('id_user'),
        ];

        $this->db->insert('koreksi', $data_koreksi);

        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok ' . $nama_barang . ' telah dikoreksi. Menunggu persetujuan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

        redirect('inventori/koreksi_barang');
    }

    public function histori_koreksi()
    {
        $now = date("Y-m-d");

        if (!$_POST) {
            $data = [
                "lists" => $this->db->where('tanggal_koreksi', $now)->order_by('no_koreksi', 'DESC')->get('koreksi')->result(),
            ];
        } else {
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $data = [
                "lists" => $this->db->where('tanggal_koreksi >=', $dari)->where('tanggal_koreksi <=', $sampai)->order_by('no_koreksi', 'DESC')->get('koreksi')->result(),
            ];
        }

        $this->load->view('body/header');
        $this->load->view('inventori/histori_koreksi', $data);
        $this->load->view('body/footer');
    }

    public function mutasi_barang()
    {
        $max_num = $this->db->select('max(no_urut) as max')->get('mutasi')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_mutasi = 'MTG-' . date('ym') . '-' . $no_urut;
        $data = [
            "gudang2" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "lists" => $this->db->order_by('no_mutasi', 'DESC')->get('mutasi')->result(),
            "no_mutasi" => $no_mutasi,
            "no_urut" => $no_urut,
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/mutasi_barang', $data);
        $this->load->view('body/footer');
    }

    public function add_mutasi()
    {
        $tanggal = $this->input->post('tanggal');
        $lokasi_asal = $this->input->post('lokasi_asal');
        $lokasi_tujuan = $this->input->post('lokasi_tujuan');
        $keterangan = $this->input->post('keterangan');
        $no_urut = $this->input->post('no_urut');
        $no_mutasi = $this->input->post('no_mutasi');

        $data = [
            'no_urut' => $no_urut,
            'no_mutasi' => $no_mutasi,
            'tanggal_mutasi' => $tanggal,
            'id_gudang_asal' => $lokasi_asal,
            'id_gudang_tujuan' => $lokasi_tujuan,
            'keterangan' => $keterangan,
            "gudang" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "barang" =>  $this->db->where('id_gudang', $lokasi_asal)->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/add_detail_mutasi', $data);
        $this->load->view('body/footer');
    }

    public function add_detail_mutasi()
    {
        // Assuming you have received the form data through POST
        $no_mutasi = $this->input->post('no_mutasi');
        $tanggal_mutasi = $this->input->post('tanggal_mutasi');

        // Create a new mutasi record
        $mutasi_data = array(
            'no_urut' => $this->input->post('no_urut'),
            'keterangan' => $this->input->post('keterangan'),
            'no_mutasi' => $no_mutasi,
            'tanggal_mutasi' => $tanggal_mutasi,
            'id_gudang_asal' => $this->input->post('lokasi_asal'),
            'id_gudang_tujuan' => $this->input->post('lokasi_tujuan'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('id_user'),
        );

        // Insert into mutasi table
        $this->db->insert('mutasi', $mutasi_data);

        // Get the inserted mutasi ID
        $mutasi_id = $this->db->insert_id();

        // Get data from the dynamic rows
        $barang_ids = $this->input->post('id_barang');
        $stok_values = $this->input->post('stok');
        $jumlah_values = $this->input->post('jumlah');
        $satuan_values = $this->input->post('satuan');
        $now = date('Y-m-d H:i:s');

        // echo '<pre>';
        // print_r($barang_ids);
        // print_r($stok_values);
        // print_r($jumlah_values);
        // print_r($satuan_values);
        // echo '</pre>';
        // exit;

        // Loop through the rows and insert into mutasi_details
        if (is_array($barang_ids)) {

            for ($i = 0; $i < count($barang_ids); $i++) {
                $barang_id = $barang_ids[$i];
                $jumlah = $jumlah_values[$i];
                $stok = $stok_values[$i];
                $satuan = $satuan_values[$i];

                $mutasi_detail_data = [
                    'id_mutasi' => $mutasi_id,
                    'id_barang' => $barang_id,
                    'satuan' => $satuan,
                    'stok' => $stok,
                    'jumlah' => $jumlah,
                    'created_at' => $now,
                    'created_by' => $this->session->userdata('id_user'),
                ];

                // Insert into mutasi_details table
                $this->db->insert('mutasi_details', $mutasi_detail_data);
            }

            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Mutasi berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            // Redirect or show a success message
            redirect('inventori/mutasi_barang');
        } else {
            // Redirect or show a success message
            redirect('inventori/mutasi_barang');
        }
    }

    public function detail_mutasi()
    {
        $id = $this->uri->segment(3);

        $mutasi = $this->db->where('no_mutasi', $id)->get('mutasi')->row_array();

        $data = [
            "mutasi" => $mutasi,
            "list" => $this->db->where('id_mutasi', $mutasi['id'])->get('mutasi_details')->result(),
            "barang" =>  $this->db->where('id_gudang', $mutasi['id_gudang_asal'])->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/mutasi_detail', $data);
        $this->load->view('body/footer');
    }

    public function mutasi_approve_all($id)
    {
        $mutasi = $this->db->get_where('mutasi', ['id' => $id])->row_array();
        $mutasi_details = $this->db->where('id_mutasi', $id)->where('status_mutasi', '0')->get('mutasi_details')->result();

        $gudang_asal = $mutasi['id_gudang_asal'];
        $gudang_tujuan = $mutasi['id_gudang_tujuan'];

        foreach ($mutasi_details as $k) {
            $data_mutasi_detail = ['status_mutasi' => 1];
            $id_barang = $k->id_barang;

            $query = $this->db->where('id', $id_barang)->get('barang');
            $detail = $query->row_array();

            $kode_barang = $detail['kode_barang'];
            $stok = $detail['stok'];
            $qty_konv = $detail['qty_konv'];
            $qty_kecil = $detail['qty_kecil'];
            $qty_besar = $detail['qty_besar'];

            $jumlah_mutasi_stok = $k->jumlah;

            $satuan = $k->satuan;

            if ($satuan == "konv") {
                $jumlah = $jumlah_mutasi_stok;
            } else if ($satuan == "kecil" && $qty_konv) {
                $jumlah = $jumlah_mutasi_stok * $qty_kecil;
            } else if ($satuan == "kecil" && !$qty_konv) {
                $jumlah = $jumlah_mutasi_stok;
            } else if ($satuan == "besar" && $qty_konv) {
                $jumlah = $jumlah_mutasi_stok * $qty_kecil * $qty_besar;
            } else if ($satuan == "besar" && !$qty_konv) {
                $jumlah = $jumlah_mutasi_stok * $qty_kecil;
            }

            $sisa_stok = $stok - $jumlah;

            // $data = [
            //     'nama' => $detail['nama'],
            //     'satuan' => $satuan,
            //     'konv' => $qty_konv,
            //     'kecil' => $qty_kecil,
            //     'besar' => $qty_besar,
            //     'stok' => $stok,
            //     'jumlah' => $jumlah,
            //     'mutasi' => $jumlah_mutasi_stok,
            //     'sisa' => $sisa_stok,
            // ];

            $cek = $this->db->where(['kode_barang' => $kode_barang, 'id_gudang' => $gudang_tujuan])->get('barang')->num_rows();
            // echo '<pre>';
            // print_r($data) . '<br>';
            // echo '</pre>';

            if ($cek == 0) {
                $this->insertNewBarang($kode_barang, $gudang_tujuan, $jumlah);
            } else {
                $this->updateStokBarang($kode_barang, $gudang_tujuan, $jumlah);
            }

            $this->db->where(['kode_barang' => $kode_barang, 'id_gudang' => $gudang_asal])->update('barang', ['stok' => $sisa_stok]);

            $this->db->where('Id', $k->Id)->update('mutasi_details', $data_mutasi_detail);
        }
        // exit;

        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Mutasi gudang sudah disetujui.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

        redirect($_SERVER['HTTP_REFERER']);
    }

    private function updateStokBarang($kode_barang, $gudang_tujuan, $jumlah)
    {
        $row = $this->db->where(['kode_barang' => $kode_barang, 'id_gudang' => $gudang_tujuan])->get('barang')->row_array();
        $stok_baru = $row['stok'] + $jumlah;
        $this->db->where(['kode_barang' => $kode_barang, 'id_gudang' => $gudang_tujuan])->update('barang', ['stok' => $stok_baru]);
    }

    private function insertNewBarang($kode_barang, $gudang_tujuan, $jumlah)
    {
        $get_data = $this->db->get_where('barang', ['kode_barang' => $kode_barang])->row_array();
        $data_insert = [
            "kode_barang" => $get_data['kode_barang'],
            "nama" => $get_data['nama'],
            "id_satuan_besar" => $get_data['id_satuan_besar'],
            "id_satuan_kecil" => $get_data['id_satuan_kecil'],
            "id_satuan_kecil_konv" => $get_data['id_satuan_kecil_konv'],
            "qty_besar" => $get_data['qty_besar'],
            "qty_kecil" => $get_data['qty_kecil'],
            "qty_konv" => $get_data['qty_konv'],
            "hpp_besar" => $get_data['hpp_besar'],
            "hpp_kecil" => $get_data['hpp_kecil'],
            "hpp_konv" => $get_data['hpp_konv'],
            "hargajualb_retail" => $get_data['hargajualb_retail'],
            "hargajualk_retail" => $get_data['hargajualk_retail'],
            "hargajual_konv_retail" => $get_data['hargajual_konv_retail'],
            "hargajualb_grosir" => $get_data['hargajualb_grosir'],
            "hargajualk_grosir" => $get_data['hargajualk_grosir'],
            "hargajual_konv_grosir" => $get_data['hargajual_konv_grosir'],
            "hargajualb_partai" => $get_data['hargajualb_partai'],
            "hargajualk_partai" => $get_data['hargajualk_partai'],
            "hargajual_konv_partai" => $get_data['hargajual_konv_partai'],
            "hargajualb_promo" => $get_data['hargajualb_promo'],
            "hargajualk_promo" => $get_data['hargajualk_promo'],
            "hargajual_konv_promo" => $get_data['hargajual_konv_promo'],
            "brand" => $get_data['brand'],
            "stok" => $jumlah,
            "tgl_input" => date('Y-m-d H:i:s'),
            "user_id" => $this->session->userdata('id_user'),
            "id_gudang" => $gudang_tujuan
        ];

        $this->db->insert('barang', $data_insert);
    }


    public function process()
    {
        $kelompok_barang = $this->input->post('kelompok_barang');
        $barang = $this->input->post('barang1');
        $barang2 = $this->input->post('barang2');
        $gudang1 = $this->input->post('gudang1');
        $gudang2 = $this->input->post('gudang2');
        $opsi_stok = $this->input->post('opsi_stok');
        $input_nama_barang = $this->input->post('input_nama_barang');

        $data = [
            "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
            "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
            "barang" => $this->db->where('id_gudang', '7')->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        if (!empty($kelompok_barang) && (empty($barang) || empty($barang2) || empty($gudang1) || empty($gudang2) || empty($input_nama_barang))) {
            if ($opsi_stok == "all") {
                $data["tampil"] = $this->db->where('kategori_id', $kelompok_barang)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "sisa_stok") {
                $data["tampil"] = $this->db->where('kategori_id', $kelompok_barang)->where('stok !=', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_0") {
                $data["tampil"] = $this->db->where('kategori_id', $kelompok_barang)->where('stok =', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_minus") {
                $data["tampil"] = $this->db->where('kategori_id', $kelompok_barang)->where('stok <', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_0_dan_minus") {
                $data["tampil"] = $this->db->where('kategori_id', $kelompok_barang)->where('stok <=', 0)->order_by('nama', 'ASC')->get('barang')->result();
            }
        } else if (!empty($barang) && !empty($barang2) && (empty($kelompok_barang) || empty($gudang1) || empty($gudang2) || empty($input_nama_barang))) {
            // $nama_barang1 = $this->db->where('id', $barang)->get('barang')->row_array();
            // $nama_barang2 = $this->db->where('id', $barang2)->get('barang')->row_array();

            if ($opsi_stok == "all") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('nama >=', $barang)->where('nama <=', $barang2)->order_by('nama', 'ASC')->get()->result();
            } else if ($opsi_stok == "sisa_stok") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('nama >=', $barang)->where('nama <=', $barang2)->where('stok !=', 0)->order_by('nama', 'ASC')->get()->result();
            } else if ($opsi_stok == "stok_0") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('nama >=', $barang)->where('nama <=', $barang2)->where('stok =', 0)->order_by('nama', 'ASC')->get()->result();
            } else if ($opsi_stok == "stok_minus") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('nama >=', $barang)->where('nama <=', $barang2)->where('stok <', 0)->order_by('nama', 'ASC')->get()->result();
            } else if ($opsi_stok == "stok_0_dan_minus") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('nama >=', $barang)->where('nama <=', $barang2)->where('stok <=', 0)->order_by('nama', 'ASC')->get()->result();
            }
        } else if (!empty($gudang1) && !empty($gudang2) && (empty($kelompok_barang) || empty($barang) || empty($barang2) || empty($input_nama_barang))) {

            if ($opsi_stok == "all") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('id_gudang >=', $gudang1)->where('id_gudang >=', $gudang2)->order_by('nama', 'ASC')->get()->result();
            } else if ($opsi_stok == "sisa_stok") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('id_gudang >=', $gudang1)->where('id_gudang >=', $gudang2)->where('stok !=', 0)->order_by('nama', 'ASC')->get()->result();
            } else if ($opsi_stok == "stok_0") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('id_gudang >=', $gudang1)->where('id_gudang >=', $gudang2)->where('stok =', 0)->order_by('nama', 'ASC')->get()->result();
            } else if ($opsi_stok == "stok_minus") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('id_gudang >=', $gudang1)->where('id_gudang >=', $gudang2)->where('stok <', 0)->order_by('nama', 'ASC')->get()->result();
            } else if ($opsi_stok == "stok_0_dan_minus") {
                $data["tampil"] = $this->db->select('*')->from('barang')->where('id_gudang >=', $gudang1)->where('id_gudang >=', $gudang2)->where('stok <=', 0)->order_by('nama', 'ASC')->get()->result();
            }
        } else if (!empty($input_nama_barang) && (empty($kelompok_barang) || empty($barang) || empty($barang2) || empty($gudang1) || empty($gudang2))) {
            // print_r($opsi_stok);
            // exit;

            if ($opsi_stok == "all") {
                $data["tampil"] = $this->db->like('nama', trim($input_nama_barang), 'after')->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "sisa_stok") {
                $data["tampil"] = $this->db->like('nama', trim($input_nama_barang), 'after')->where('stok !=', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_0") {
                $data["tampil"] = $this->db->like('nama', trim($input_nama_barang), 'after')->where('stok =', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_minus") {
                $data["tampil"] = $this->db->like('nama', trim($input_nama_barang), 'after')->where('stok <', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_0_dan_minus") {
                $data["tampil"] = $this->db->like('nama', trim($input_nama_barang), 'after')->where('stok <=', 0)->order_by('nama', 'ASC')->get('barang')->result();
            }
        } else {
            if ($opsi_stok == "all") {
                $data["tampil"] = $this->db->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "sisa_stok") {
                $data["tampil"] = $this->db->where('stok !=', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_0") {
                $data["tampil"] = $this->db->where('stok =', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_minus") {
                $data["tampil"] = $this->db->where('stok <', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_0_dan_minus") {
                $data["tampil"] = $this->db->where('stok <=', 0)->order_by('nama', 'ASC')->get('barang')->result();
            }
        }

        // print_r($data['tampil']);
        // exit;
        $this->load->view('body/header');
        $this->load->view('inventori/index', $data);
        $this->load->view('body/footer');
    }

    public function unduh_stock()
    {
        $kelompok_barang = $this->input->post('kelompok_barang');
        $barang = $this->input->post('barang');
        $barang2 = $this->input->post('barang2');
        $gudang1 = $this->input->post('gudang1');
        $gudang2 = $this->input->post('gudang2');
        $opsi_stok = $this->input->post('opsi_stok');
        $input_nama_barang = $this->input->post('input_nama_barang');

        if (!empty($kelompok_barang) && (empty($barang) || empty($barang2) || empty($gudang1) || empty($gudang2) || empty($opsi_stok) || empty($input_nama_barang))) {
            $data["tampil"] = $this->db->where('kategori_id', $kelompok_barang)->order_by('nama', 'ASC')->get('barang')->result();
        } else if (!empty($barang) && !empty($barang2) && (empty($kelompok_barang) || empty($gudang1) || empty($gudang2) || empty($opsi_stok) || empty($input_nama_barang))) {
            $nama_barang1 = $this->db->where('id', $barang)->get('barang')->row_array();
            $nama_barang2 = $this->db->where('id', $barang2)->get('barang')->row_array();

            $data["tampil"] = $this->db->select('*')->from('barang')->where('nama >=', $nama_barang1['nama'])->where('nama <=', $nama_barang2['nama'])->order_by('nama', 'ASC')->get()->result();
        } else if (!empty($gudang1) && !empty($gudang2) && (empty($kelompok_barang) || empty($barang) || empty($barang2) || empty($opsi_stok) || empty($input_nama_barang))) {
            $data["tampil"] = $this->db->select('*')->from('barang')->where('id_gudang >=', $gudang1)->where('id_gudang >=', $gudang2)->order_by('nama', 'ASC')->get()->result();
        } else if (!empty($opsi_stok) && (empty($kelompok_barang) || empty($barang) || empty($barang2) || empty($gudang1) || empty($gudang2) || empty($input_nama_barang))) {

            if ($opsi_stok == "all") {
            } else if ($opsi_stok == "sisa_stok") {
                $data["tampil"] = $this->db->where('stok !=', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_0") {
                $data["tampil"] = $this->db->where('stok =', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_minus") {
                $data["tampil"] = $this->db->where('stok <', 0)->order_by('nama', 'ASC')->get('barang')->result();
            } else if ($opsi_stok == "stok_0_dan_minus") {
                $data["tampil"] = $this->db->where('stok <=', 0)->order_by('nama', 'ASC')->get('barang')->result();
            }
        } else if (!empty($input_nama_barang) && (empty($kelompok_barang) || empty($barang) || empty($barang2) || empty($gudang1) || empty($gudang2) || empty($opsi_stok))) {

            $data["tampil"] = $this->db->like('nama', $input_nama_barang)->order_by('nama', 'ASC')->get('barang')->result();
        }
        if ($_POST['submit'] == "cetak") {

            $mpdf = new \Mpdf\Mpdf([
                'tempDir' => 'assets/pdf',
                'mode' => '',
                'format' => 'A4',
                'default_font_size' => 0,
                'default_font' => '',
                'margin_left' => 15,
                'margin_right' => 15,
                'margin_top' => 5,
                'margin_bottom' => 10,
                'margin_header' => 10,
                'margin_footer' => 10,
                'orientation' => 'L',
            ]);
            $html = $this->load->view('inventori/cetak_pdf_sisa_stok', $data, true);
            $mpdf->defaultfooterline = 0;
            // $mpdf->setFooter('<div style="text-align: left;">F.7.1.1</div>');
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else if ($_POST['submit'] == "cetak_excel") {

            require_once(APPPATH . 'libraries/PHPExcel/IOFactory.php');

            $excel = new PHPExcel();
            // Settingan awal fil excel
            $excel->getProperties()->setCreator('My Notes Code')
                ->setLastModifiedBy('My Notes Code')
                ->setTitle("Sisa Stok")
                ->setSubject("Stok")
                ->setDescription("Laporan Semua Sisa Stok")
                ->setKeywords("Sisa Stok");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // bagian header
            $excel->setActiveSheetIndex(0)->setCellValue('A1', "No.");
            $excel->setActiveSheetIndex(0)->setCellValue('B1', "Kode barang");
            $excel->setActiveSheetIndex(0)->setCellValue('C1', "Nama barang");
            $excel->setActiveSheetIndex(0)->setCellValue('D1', "Satuan");
            $excel->setActiveSheetIndex(0)->setCellValue('E1', "Sisa stok");
            $excel->setActiveSheetIndex(0)->setCellValue('F1', "Saldo stok");

            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);

            $no = 1;
            $numrow = 2;
            foreach ($data['tampil'] as $t) {
                $saldo_stock = $t->stok * $t->hpp_kecil;

                $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $t->kode_barang);
                $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $t->nama);
                $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $t->id_satuan_kecil);
                $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $t->stok);
                $excel->setActiveSheetIndex(0)->setCellValue('f' . $numrow, $saldo_stock);

                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);


                $no++; // Tambah 1 setiap kali looping
                $numrow++; // Tambah 1 setiap kali looping
            }

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Rename worksheet
            $excel->getActiveSheet()->setTitle('Sisa stok');


            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $excel->setActiveSheetIndex(0);


            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Sisa stok.xls"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $objWriter->save('php://output');
            exit;
        }
    }

    public function cetak_pdf()
    {
        $dataArray = $this->input->get('data');
        echo json_encode($dataArray);
        // Tidak perlu exit di sini, kecuali Anda memang ingin menghentikan eksekusi lebih lanjut.
    }

    public function add_stock_opname()
    {
        $tanggal = $this->input->post('tanggal');
        $gudang = $this->input->post('gudang');
        $keterangan = $this->input->post('keterangan');

        $max_num = $this->db->select('max(no_urut) as max')->get('stock_opname')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_stock_opname = 'STP-' . date('ym') . '-' . $no_urut;

        $nama_gudang = $this->db->get_where('gudang', ['id' => $gudang])->row_array();

        $data = [
            'no_urut' => $no_urut,
            'no_stock_opname' => $no_stock_opname,
            'tanggal_opname' => $tanggal,
            'id_gudang' => $gudang,
            'keterangan' => $keterangan,
            'nama_gudang' => $nama_gudang,
            "gudang2" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "barang" =>  $this->db->where('id_gudang', $gudang)->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/add_detail_sop', $data);
        $this->load->view('body/footer');
    }

    public function add_koreksi()
    {
        $tanggal = $this->input->post('tanggal');
        $gudang = $this->input->post('gudang');
        $keterangan = $this->input->post('keterangan');

        $max_num = $this->db->select('max(no_urut) as max')->get('koreksi')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_koreksi = 'STP-' . date('ym') . '-' . $no_urut;

        $data = [
            'no_urut' => $no_urut,
            'no_koreksi' => $no_koreksi,
            'tanggal_koreksi' => $tanggal,
            'id_gudang' => $gudang,
            'keterangan' => $keterangan,
            "gudang2" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "barang" =>  $this->db->where('id_gudang', $gudang)->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/add_detail_koreksi', $data);
        $this->load->view('body/footer');
    }

    public function detail_koreksi()
    {
        $id = $this->uri->segment(3);

        $koreksi = $this->db->where('no_koreksi', $id)->get('koreksi')->row_array();

        $data = [
            "koreksi" => $koreksi,
            "list" => $this->db->where('id_koreksi', $koreksi['id'])->get('koreksi_details')->result(),
            "barang" =>  $this->db->where('id_gudang', $koreksi['id_gudang'])->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/koreksi_detail', $data);
        $this->load->view('body/footer');
    }

    public function detail_sop()
    {
        $id = $this->uri->segment(3);

        $sop = $this->db->where('no_stock_opname', $id)->get('stock_opname')->row_array();

        $data = [
            "sop" => $sop,
            "list" => $this->db->where('id_stock_opname', $sop['id'])->get('stock_opname_details')->result(),
            "barang" =>  $this->db->where('id_gudang', $sop['id_gudang'])->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/stock_opname_detail', $data);
        $this->load->view('body/footer');
    }

    public function add_detail_sop()
    {
        // Assuming you have received the form data through POST
        $no_stock_opname = $this->input->post('no_sop');
        $tanggal_opname = $this->input->post('tanggal_sop');

        // Create a new stock_opname record
        $stock_opname_data = array(
            'no_urut' => $this->input->post('no_urut'),
            'no_stock_opname' => $no_stock_opname,
            'tanggal_opname' => $tanggal_opname,
            'id_gudang' => $this->input->post('gudang'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('id_user'),
        );

        // Insert into stock_opname table
        $this->db->insert('stock_opname', $stock_opname_data);

        // Get the inserted stock_opname ID
        $stock_opname_id = $this->db->insert_id();

        // Get data from the dynamic rows
        $barang_ids = $this->input->post('id_barang');
        $qty_fisik_values = $this->input->post('qty_fisik');
        $qty_sistem_values = $this->input->post('qty_sistem');
        $satuan_values = $this->input->post('satuan');
        $selisih_values = $this->input->post('selisih');
        $now = date('Y-m-d H:i:s');

        // Loop through the rows and insert into stock_opname_details
        if (is_array($barang_ids)) {

            for ($i = 0; $i < count($barang_ids); $i++) {
                $barang_id = $barang_ids[$i];
                $qty_fisik = $qty_fisik_values[$i];
                $qty_sistem = $qty_sistem_values[$i];
                $satuan = $satuan_values[$i];
                $selisih = $selisih_values[$i];

                $stock_opname_detail_data = [
                    'id_stock_opname' => $stock_opname_id,
                    'id_barang' => $barang_id,
                    'satuan' => $satuan,
                    'qty_sistem' => $qty_sistem,
                    'qty_fisik' => $qty_fisik,
                    'selisih' => $selisih,
                    'created_at' => $now,
                    'created_by' => $this->session->userdata('id_user'),
                ];

                // Insert into stock_opname_details table
                $this->db->insert('stock_opname_details', $stock_opname_detail_data);
            }

            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok opname berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            // Redirect or show a success message
            redirect('inventori/stock_opname');
        } else {
            // Redirect or show a success message
            redirect('inventori/stock_opname');
        }
    }

    public function add_detail_koreksi()
    {
        // Assuming you have received the form data through POST
        $no_koreksi = $this->input->post('no_koreksi');
        $tanggal_koreksi = $this->input->post('tanggal_koreksi');

        // Create a new koreksi record
        $koreksi_data = array(
            'no_urut' => $this->input->post('no_urut'),
            'no_koreksi' => $no_koreksi,
            'tanggal_koreksi' => $tanggal_koreksi,
            'id_gudang' => $this->input->post('gudang'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('id_user'),
        );

        // Insert into koreksi table
        $this->db->insert('koreksi', $koreksi_data);

        // Get the inserted koreksi ID
        $koreksi_id = $this->db->insert_id();

        // Get data from the dynamic rows
        $barang_ids = $this->input->post('id_barang');
        $debit_kredit_values = $this->input->post('debit_kredit');
        $qty_sistem_values = $this->input->post('qty_sistem');
        $satuan_values = $this->input->post('satuan');
        $jumlah_values = $this->input->post('jumlah');
        $now = date('Y-m-d H:i:s');

        // Loop through the rows and insert into koreksi_details
        if (is_array($barang_ids)) {

            for ($i = 0; $i < count($barang_ids); $i++) {
                $barang_id = $barang_ids[$i];
                $debit_kredit = $debit_kredit_values[$i];
                $qty_sistem = $qty_sistem_values[$i];
                $satuan = $satuan_values[$i];
                $jumlah = $jumlah_values[$i];

                $koreksi_detail_data = [
                    'id_koreksi' => $koreksi_id,
                    'id_barang' => $barang_id,
                    'satuan' => $satuan,
                    'stok_awal' => $qty_sistem,
                    'debit_kredit' => $debit_kredit,
                    'jumlah_koreksi' => $jumlah,
                    'created_at' => $now,
                    'created_by' => $this->session->userdata('id_user'),
                ];

                // Insert into koreksi_details table
                $this->db->insert('koreksi_details', $koreksi_detail_data);
            }

            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok koreksi berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            // Redirect or show a success message
            redirect('inventori/koreksi_barang');
        } else {
            // Redirect or show a success message
            redirect('inventori/koreksi_barang');
        }
    }

    public function pending_sop()
    {
        $data = [
            "barang" => $this->db->where('a.status', 0)->from('stock_opname_details a')->join('stock_opname b', 'a.id_stock_opname = b.id', 'left')->join('barang c', 'a.id_barang = c.id', 'left')->order_by('no_stock_opname', 'ASC')->order_by('nama', 'ASC')->get()->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/pending_sop', $data);
        $this->load->view('body/footer');
    }

    public function pending_koreksi()
    {
        $data = [
            "barang" => $this->db->where('a.status_koreksi', 0)->from('koreksi_details a')->join('koreksi b', 'a.id_koreksi = b.id', 'left')->join('barang c', 'a.id_barang = c.id', 'left')->order_by('no_koreksi', 'ASC')->order_by('nama', 'ASC')->get()->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/pending_koreksi', $data);
        $this->load->view('body/footer');
    }

    public function pending_mutasi()
    {
        $data = [
            "barang" => $this->db->where('a.status', 0)->from('mutasi_details a')->join('mutasi b', 'a.id_mutasi = b.id', 'left')->join('barang c', 'a.id_barang = c.id', 'left')->order_by('no_mutasi', 'ASC')->order_by('nama', 'ASC')->get()->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/pending_mutasi', $data);
        $this->load->view('body/footer');
    }

    public function delete_sop()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);
        $this->db->delete('stock_opname');
        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok opname berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        // After that you need to used redirect function instead of load view such as 
        redirect("inventori/stock_opname");
    }

    public function delete_detail_sop()
    {
        $no_stock_opname = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        $this->db->where('id', $id);
        $this->db->delete('stock_opname_details');
        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok opname berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        // After that you need to used redirect function instead of load view such as 
        redirect("inventori/detail_sop/$no_stock_opname");
    }

    public function delete_detail_mutasi()
    {
        $no_mutasi = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        $this->db->where('id', $id);
        $this->db->delete('mutasi_details');
        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data mutasi berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        // After that you need to used redirect function instead of load view such as 
        redirect("inventori/detail_mutasi/$no_mutasi");
    }

    public function delete_detail_koreksi()
    {
        $no_koreksi = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        $this->db->where('id', $id);
        $this->db->delete('koreksi_details');
        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data koreksi berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        // After that you need to used redirect function instead of load view such as 
        redirect("inventori/detail_sop/$no_koreksi");
    }

    public function getData()
    {
        $results = $this->M_Barang->getDataBarang();

        $data = [];

        $no = $this->input->post('start', true);

        foreach ($results as $r) {
            $row = array();

            $gudang = $this->db->where('id', $r->id_gudang)->get('gudang')->row_array();
            if ($r->id_gudang) {
                $nama_gudang = $gudang['nama'];
            } else {
                $nama_gudang = '-';
            }

            $row[] = ++$no . '.';
            $row[] = $r->kode_barang;
            $row[] = $r->nama;
            $row[] = $r->stok;
            $row[] = $nama_gudang;
            $row[] = '<button type="button" data-id="' . $r->id . '" class="btn btn-primary btn-square barang_v"><i class="fa fa-eye"></i></button>';

            $row[] = $r->id;
            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw', true),
            "recordsTotal" => $this->M_Barang->count_all_data(),
            "recordsFiltered" => $this->M_Barang->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function approve_koreksi()
    {
        $id = $this->uri->segment(3);
        $koreksi_detail = $this->db->where('Id', $id)->get('koreksi_details')->row_array();

        // echo '<pre>';
        // print_r($koreksi_detail);
        // echo ' </pre>';
        // exit;

        if ($koreksi_detail['debit_kredit'] == "debit") {
            $stok_baru = $koreksi_detail['stok_awal'] + $koreksi_detail['jumlah_koreksi'];
        } else if ($koreksi_detail['debit_kredit'] == "kredit") {
            $stok_baru = $koreksi_detail['stok_awal'] - $koreksi_detail['jumlah_koreksi'];
        }

        $data_koreksi_detail = ['status_koreksi' => 1];

        $data_stok = ['stok' => $stok_baru];

        $this->db->where('id', $koreksi_detail['id_barang'])->update('barang', $data_stok);
        $update = $this->db->where('Id', $id)->update('koreksi_details', $data_koreksi_detail);

        if ($update) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Stok barang sudah diperbarui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Terjadi kesalahan. Silahkan dicoba lagi.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function koreksi_approve_all($id)
    {
        $koreksi_details = $this->db->where('id_koreksi', $id)->where('status_koreksi', '0')->get('koreksi_details')->result();

        foreach ($koreksi_details as $k) {
            $id_barang = $k->id_barang;

            $query = $this->db->where('id', $id_barang)->get('barang');
            $detail = $query->row_array();

            $kode_barang = $detail['kode_barang'];
            $stok = $detail['stok'];
            $qty_konv = $detail['qty_konv'];
            $qty_kecil = $detail['qty_kecil'];
            $qty_besar = $detail['qty_besar'];

            $jumlah_koreksi_stok = $k->jumlah_koreksi;

            $satuan = $k->satuan;

            $jumlah = 0;

            if ($satuan == "konv") {
                $jumlah = $jumlah_koreksi_stok;
            } else if ($satuan == "kecil" && $qty_konv) {
                $jumlah = $jumlah_koreksi_stok * $qty_kecil;
            } else if ($satuan == "kecil" && !$qty_konv) {
                $jumlah = $jumlah_koreksi_stok;
            } else if ($satuan == "besar" && $qty_kecil && $qty_konv) {
                $jumlah = $jumlah_koreksi_stok * $qty_kecil * $qty_besar;
            } else if ($satuan == "besar" && $qty_kecil && !$qty_konv) {
                $jumlah = $jumlah_koreksi_stok * $qty_kecil;
            } else if ($satuan == "besar" && !$qty_kecil && !$qty_konv) {
                $jumlah = $jumlah_koreksi_stok;
            }

            $data = [
                'nama' => $detail['nama'],
                'satuan' => $satuan,
                'konv' => $qty_konv,
                'kecil' => $qty_kecil,
                'besar' => $qty_besar,
                'stok' => $stok,
                'jumlah' => $jumlah,
                'koreksi' => $jumlah_koreksi_stok,
                'dk' => $k->debit_kredit,
            ];

            if ($k->debit_kredit == "debit") {
                $stok_baru = $stok + $jumlah;
            } else if ($k->debit_kredit == "kredit") {
                $stok_baru = $stok - $jumlah;
            }

            $data_koreksi_detail = ['status_koreksi' => 1];

            $data_stok = ['stok' => $stok_baru];

            $this->db->where('id', $k->id_barang)->update('barang', $data_stok);
            $this->db->where('Id', $k->Id)->update('koreksi_details', $data_koreksi_detail);
        }
        // exit;

        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Stok barang sudah diperbarui.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function histori_mutasi()
    {
        $now = date("Y-m-d");

        if (!$_POST) {
            $data = [
                "lists" => $this->db->where('tanggal_mutasi', $now)->order_by('no_mutasi', 'DESC')->get('mutasi')->result(),
            ];
        } else {
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $data = [
                "lists" => $this->db->where('tanggal_mutasi >=', $dari)->where('tanggal_mutasi <=', $sampai)->order_by('no_mutasi', 'DESC')->get('mutasi')->result(),
            ];
        }

        $this->load->view('body/header');
        $this->load->view('inventori/histori_mutasi', $data);
        $this->load->view('body/footer');
    }

    public function transaksi_item()
    {
        $id_barang = $this->input->post('item_barang');
        $id_gudang = $this->input->post('gudang');

        $barang = $this->db->select('nama')->where('id', $id_barang)->get('barang')->row_array();

        $start_date = $this->input->post('tanggal_dari') . " 00:00:00";
        $end_date = $this->input->post('tanggal_sampai') . " 23:59:59";

        if (!$id_gudang or $id_gudang == "7") {

            // query penerimaan
            $this->db->select('pl.id_barang, pl.nama_barang, pl.satuan, pl.qty_pb as qty, pl.date_created, "Penerimaan" as source, satuan as satuan_nama, no_pb as nomor, nama as kasir, nama_supplier as customer, stok_awal as stok_awal');
            $this->db->from('penerimaan_list pl');
            $this->db->join('penerimaan p', 'pl.id_pb = p.id_penerimaan', 'left'); // JOIN dengan tabel satuan
            $this->db->join('users u', 'p.user_input = u.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('supplier sup', 'p.supplier = sup.kode_supplier', 'left'); // JOIN dengan tabel satuan
            $this->db->where('pl.id_barang', $id_barang);

            if ($id_gudang == "7") {
                $this->db->where('pl.gudang', $id_gudang);
            }

            $this->db->where('pl.date_created >=', $start_date);
            $this->db->where('pl.date_created <=', $end_date);

            $query1 = $this->db->get_compiled_select();

            // query transaksi
            $this->db->select('ti.kd_barang, ti.barang as nama_barang, ti.satuan, (qty * qty_satuan) as qty, ti.date_created, "Transaksi" as source, ti.satuan as satuan_nama, no_struk as nomor, nama as kasir, nama_toko as customer, "-" as stok_awal');
            $this->db->from('transaksi_item ti');
            $this->db->join('transaksi t', 'ti.id_transaksi = t.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('users u', 't.kasir = u.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('customers cus', 't.pelanggan = cus.id_customer', 'left'); // JOIN dengan tabel satuan
            $this->db->where('ti.kd_barang', $id_barang);
            $this->db->where('ti.date_created >=', $start_date);
            $this->db->where('ti.date_created <=', $end_date);

            $query2 = $this->db->get_compiled_select();

            // query stock opname
            $this->db->select('sop_d.id_barang, b.nama as nama_barang, sop_d.satuan, qty_fisik as qty, sop_d.created_at as date_created, "Stock opname" as source, sop_d.satuan as satuan_nama, no_stock_opname as nomor, u.nama as kasir, "-" as customer, qty_sistem as stok_awal');
            $this->db->from('stock_opname_details sop_d');
            $this->db->join('stock_opname s', 'sop_d.id_stock_opname = s.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('users u', 's.created_by = u.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('barang b', 'sop_d.id_barang = b.id', 'left'); // JOIN dengan tabel satuan
            $this->db->where('sop_d.id_barang', $id_barang);
            $this->db->where('sop_d.created_at >=', $start_date);
            $this->db->where('sop_d.created_at <=', $end_date);

            $query3 = $this->db->get_compiled_select();

            // query koreksi
            $this->db->select('kor_d.id_barang, b.nama as nama_barang, kor_d.satuan, jumlah_koreksi as qty, kor_d.created_at as date_created, "Koreksi" as source, kor_d.satuan as satuan_nama, no_koreksi as nomor, u.nama as kasir, "-" as customer, stok_awal');
            $this->db->from('koreksi_details kor_d');
            $this->db->join('koreksi s', 'kor_d.id_koreksi = s.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('users u', 's.created_by = u.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('barang b', 'kor_d.id_barang = b.id', 'left'); // JOIN dengan tabel satuan
            $this->db->where('kor_d.id_barang', $id_barang);
            $this->db->where('kor_d.created_at >=', $start_date);
            $this->db->where('kor_d.created_at <=', $end_date);

            $query4 = $this->db->get_compiled_select();

            // query mutasi
            $this->db->select('mut_d.id_barang, b.nama as nama_barang, mut_d.satuan, jumlah as qty, mut_d.created_at as date_created, "Mutasi" as source, mut_d.satuan as satuan_nama, no_mutasi as nomor, u.nama as kasir, "-" as customer, mut_d.stok as stok_awal');
            $this->db->from('mutasi_details mut_d');
            $this->db->join('mutasi s', 'mut_d.id_mutasi = s.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('users u', 's.created_by = u.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('barang b', 'mut_d.id_barang = b.id', 'left'); // JOIN dengan tabel satuan
            $this->db->where('mut_d.id_barang', $id_barang);
            if ($id_gudang == "7") {
                $this->db->where('s.id_gudang_tujuan', '7');
            }
            $this->db->where('mut_d.created_at >=', $start_date);
            $this->db->where('mut_d.created_at <=', $end_date);

            $query5 = $this->db->get_compiled_select();

            $final_query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' UNION ' . $query4 . ' UNION ' . $query5 . ' ORDER BY date_created DESC');

            $result = $final_query->result();
        } else {

            // query penerimaan
            $this->db->select('pl.id_barang, pl.nama_barang, pl.satuan, pl.qty_pb as qty, pl.date_created, "Penerimaan" as source, satuan as satuan_nama, no_pb as nomor, nama as kasir, nama_supplier as customer, stok_awal as stok_awal');
            $this->db->from('penerimaan_list pl');
            $this->db->join('penerimaan p', 'pl.id_pb = p.id_penerimaan', 'left'); // JOIN dengan tabel satuan
            $this->db->join('users u', 'p.user_input = u.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('supplier sup', 'p.supplier = sup.kode_supplier', 'left'); // JOIN dengan tabel satuan
            $this->db->where('pl.id_barang', $id_barang);
            $this->db->where('pl.gudang', $id_gudang);
            $this->db->where('pl.date_created >=', $start_date);
            $this->db->where('pl.date_created <=', $end_date);

            $query1 = $this->db->get_compiled_select();

            // query mutasi
            $this->db->select('mut_d.id_barang, b.nama as nama_barang, mut_d.satuan, jumlah as qty, mut_d.created_at as date_created, "Mutasi" as source, mut_d.satuan as satuan_nama, no_mutasi as nomor, u.nama as kasir, "-" as customer, mut_d.stok as stok_awal');
            $this->db->from('mutasi_details mut_d');
            $this->db->join('mutasi s', 'mut_d.id_mutasi = s.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('users u', 's.created_by = u.id', 'left'); // JOIN dengan tabel satuan
            $this->db->join('barang b', 'mut_d.id_barang = b.id', 'left'); // JOIN dengan tabel satuan
            $this->db->where('mut_d.id_barang', $id_barang);
            $this->db->where('s.id_gudang_tujuan', $id_gudang);
            $this->db->where('mut_d.created_at >=', $start_date);
            $this->db->where('mut_d.created_at <=', $end_date);

            $query5 = $this->db->get_compiled_select();

            $final_query = $this->db->query($query1 . ' UNION ' . $query5 . ' ORDER BY date_created DESC');

            $result = $final_query->result();
        }

        if ($this->input->post('submit') == "cetak_excel") {

            require_once(APPPATH . 'libraries/PHPExcel/IOFactory.php');

            $excel = new PHPExcel();
            // Settingan awal fil excel
            $excel->getProperties()->setCreator('POS App')
                ->setLastModifiedBy('POS App')
                ->setTitle("Transaksi per Item")
                ->setSubject("Stok")
                ->setDescription("Laporan Transaksi per Item")
                ->setKeywords("Transaksi per Item");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // bagian header
            $headerColumns = array("No.", "Asal", "No. Transaksi", "Customer", "Satuan", "Qty", "Tanggal", "User");

            foreach ($headerColumns as $colIndex => $columnName) {
                $cellCoordinate = chr(65 + $colIndex) . '1'; // A, B, C, ...
                $excel->setActiveSheetIndex(0)->setCellValue($cellCoordinate, $columnName);
                $excel->getActiveSheet()->getStyle($cellCoordinate)->applyFromArray($style_col);
            }

            $no = 1;
            $numrow = 2;
            foreach ($result as $t) {

                $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, strtoupper($t->source));
                $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $t->nomor, PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $t->customer);
                $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $t->satuan_nama);
                $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $t->qty);
                $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, format_indo2($t->date_created));
                $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $t->kasir);

                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
                $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

                $no++; // Tambah 1 setiap kali looping
                $numrow++; // Tambah 1 setiap kali looping
            }

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Auto size kolom
            foreach (range('A', $excel->getActiveSheet()->getHighestDataColumn()) as $col) {
                $excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }
            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Rename worksheet
            $excel->getActiveSheet()->setTitle($result[0]->nama_barang);

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $excel->setActiveSheetIndex(0);

            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Transaksi per item ' . $result[0]->nama_barang . '".xls"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $objWriter->save('php://output');
            exit;
        } else {

            if (!$result) {

                $this->session->set_flashdata('message_name', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Tidak ada transaksi <strong>' . $barang['nama'] . '</strong> dari tanggal ' . format_indo2($start_date) . ' s/d ' . format_indo2($end_date) . '.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

                redirect($_SERVER['HTTP_REFERER']);
            } else {

                $data = [
                    'lists' => $result
                ];

                $this->load->view('body/header');
                $this->load->view('inventori/transaksi_item', $data);
                $this->load->view('body/footer');
            }
        }
    }
}
