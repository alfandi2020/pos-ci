   <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Pembelian extends CI_Controller
    {
        // private $param;

        public function __construct()
        {
            parent::__construct();
            // $this->load->library('Pdf');
            // $this->load->model('M_admin');
            $this->load->helper(['form', 'url']);
            // $this->load->library(array('form_validation','Routerosapi'));
            //cek jika user blm login maka redirect ke halaman login
            if ($this->session->userdata('username', 'nama') != true) {
                $this->session->set_flashdata(
                    'massage',
                    '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>'
                );
                redirect('login');
            }
        }

        function histori_pb()
        {
            $brand = $this->input->post('brand');
            $action = $this->input->post('action');
            $id = $this->input->post('id_brand');
            if ($brand == true) {
                $cek = $this->db->query("SELECT * FROM brand where nama_brand='$brand'")->num_rows();
                if ($cek == true) {
                    $this->session->set_flashdata('msg', 'double_satuan');
                    $this->session->set_flashdata('msg_val', $brand);
                    redirect('barang/penerimaan');
                } else {
                    $datax = [
                        'nama_brand' => $brand,
                    ];
                    $this->db->insert('penerimaan', $datax);
                    redirect('barang/brand');
                }
            }
            if ($action == 'edit') {
                $datax = [
                    'penerimaan' => $brand,
                ];
                $this->db->where('id', $id);
                $this->db->update('penerimaan', $datax);
                redirect('barang/penerimaan');
            }
            $this->db->select('*,count(*) as total_barang');
            $this->db->from('penerimaan as a');
            $this->db->join('penerimaan_list as b', 'a.id_penerimaan=b.id_pb');
            $this->db->join('supplier as c', 'a.supplier=c.kode_supplier');
            $first_date = $this->session->userdata('date_pembelian') == null ? date('Y-m-d') : $this->session->userdata('date_pembelian');
            $second_date = $this->session->userdata('date_pembelian2') == null ? date('Y-m-d') : $this->session->userdata('date_pembelian2');
            $this->db->where('a.tgl_pb >=', $first_date);
            $this->db->where('a.tgl_pb <=', $second_date);
            $this->db->where('approve', '0');
            $this->db->group_by('b.id_pb');
            $penerimaan = $this->db->get()->result();
            $data = [
                'penerimaan' => $penerimaan,
            ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('barang/penerimaan', $data);
            $this->load->view('body/footer');
        }
        function index()
        {
            $brand = $this->input->post('brand');
            $action = $this->input->post('action');
            $id = $this->input->post('id_brand');
            if ($brand == true) {
                $cek = $this->db->query("SELECT * FROM brand where nama_brand='$brand'")->num_rows();
                if ($cek == true) {
                    $this->session->set_flashdata('msg', 'double_satuan');
                    $this->session->set_flashdata('msg_val', $brand);
                    redirect('barang/penerimaan');
                } else {
                    $datax = [
                        'nama_brand' => $brand,
                    ];
                    $this->db->insert('penerimaan', $datax);
                    redirect('barang/brand');
                }
            }
            if ($action == 'edit') {
                $datax = [
                    'penerimaan' => $brand,
                ];
                $this->db->where('id', $id);
                $this->db->update('penerimaan', $datax);
                redirect('barang/penerimaan');
            }
            $this->db->select('*,count(*) as total_barang');
            $this->db->from('penerimaan as a');
            $this->db->join('penerimaan_list as b', 'a.id_penerimaan=b.id_pb');
            $this->db->join('supplier as c', 'a.supplier=c.kode_supplier');
            $first_date = $this->session->userdata('date_pembelian') == null ? date('Y-m-d') : $this->session->userdata('date_pembelian');
            $second_date = $this->session->userdata('date_pembelian2') == null ? date('Y-m-d') : $this->session->userdata('date_pembelian2');
            $this->db->where('a.tgl_pb >=', $first_date);
            $this->db->where('a.tgl_pb <=', $second_date);
            $this->db->where('approve', '0');
            $this->db->group_by('b.id_pb');
            $penerimaan = $this->db->get()->result();
            $data = [
                'penerimaan' => $penerimaan,
            ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('barang/penerimaan', $data);
            $this->load->view('body/footer');
        }
        function approve()
        {
            $brand = $this->input->post('brand');
            $action = $this->input->post('action');
            $id = $this->input->post('id_penerimaan');
            if ($brand == true) {
                $cek = $this->db
                    ->query("SELECT * FROM brand where nama_brand='$brand' ")
                    ->num_rows();
                if ($cek == true) {
                    $this->session->set_flashdata('msg', 'double_satuan');
                    $this->session->set_flashdata('msg_val', $brand);
                    redirect('barang/penerimaan');
                } else {
                    $datax = [
                        'nama_brand' => $brand,
                    ];
                    $this->db->insert('penerimaan', $datax);
                    redirect('barang/brand');
                }
            }
            if ($action == 'approve') {
                // ambil item dari tabel penerimaan_list
                $tampil = $this->db->where('id_pb', $id)->get('penerimaan_list')->result();

                // print_r($tampil);
                // exit;

                foreach ($tampil as $t) {
                    $satuan = $t->satuan;
                    $qty_pb = $t->qty_pb;
                    $barang = $this->db->where('id', $t->id_barang)->get('barang')->row_array();

                    if ($satuan == "besar" && !$barang['qty_kecil'] && !$barang['qty_konv']) {
                        $stok_tambah = $qty_pb * 1;
                    } else if ($satuan == "besar" && $barang['qty_kecil'] && !$barang['qty_konv']) {
                        $stok_tambah = $qty_pb * $barang['qty_kecil'];
                    } else if ($satuan == "besar" && $barang['qty_kecil'] && $barang['qty_konv']) {
                        $stok_tambah = $qty_pb * $barang['qty_kecil'] * $barang['qty_konv'];
                    } else if ($satuan == "kecil" && !$barang['qty_konv']) {
                        $stok_tambah = $qty_pb;
                    } else if ($satuan == "kecil" && $barang['qty_konv']) {
                        $stok_tambah = $qty_pb * $barang['qty_konv'];
                    } else if ($satuan == "konv") {
                        $stok_tambah = $qty_pb * 1;
                    }

                    $stok_baru = $stok_tambah + $barang['stok'];
                    // echo '<pre>';
                    // print_r($barang);
                    // var_dump($satuan, $barang['qty_kecil'], $barang['qty_konv'], $qty_pb, $stok_tambah, $barang['stok'], $stok_baru);
                    // echo '</pre>';
                    // var_dump($barang['kode_barang'], $t->gudang);

                    $data_update = [
                        'stok' => $stok_baru,
                        'tgl_last_update' => date('Y-m-d H:i:s')
                    ];

                    $this->db->where('kode_barang', $barang['kode_barang'])->where('id_gudang', $t->gudang)->update('barang', $data_update);
                }
                // exit;

                $datax = [
                    'approve' => '1',
                    'approve_by' => $this->session->userdata('id_user')
                ];

                $this->db->where('id_penerimaan', $id);
                $this->db->update('penerimaan', $datax);


                $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Penerimaan berhasil disetujui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('pembelian');
            }
            $this->db->select('*,count(*) as total_barang');
            $this->db->from('penerimaan as a');
            $this->db->join('penerimaan_list as b', 'a.id_penerimaan=b.id_pb');
            $this->db->join('supplier as c', 'a.supplier=c.kode_supplier');
            $this->db->where('a.id_penerimaan', $this->uri->segment(3));
            $penerimaan = $this->db->get()->row_array();

            $penerimaan2 = $this->db->get_where('penerimaan_list', ['id_pb' => $this->uri->segment(3)])->result();
            $data = [
                'approve_p' => $penerimaan,
                'penerimaan2' => $penerimaan2
            ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('barang/penerimaan', $data);
            $this->load->view('body/footer');
        }

        function search_barang()
        {
            $kode_barang = $this->input->post('kode_barang');
            $id_gudang = $this->input->post('id_gudang');

            $this->db->where('kode_barang', $kode_barang);
            $this->db->where('id_gudang', $id_gudang);
            $this->db->from('barang');
            $data = $this->db->get();

            echo json_encode($data->row_array());
        }
        function submit_pb()
        {
            $no_pb = $this->input->post('no_pb');
            $tgl_pb = $this->input->post('tgl_pb');
            $supplier = $this->input->post('supplier');
            $srt_jln = $this->input->post('srt_jln');
            $tgl_srt_jln = $this->input->post('tgl_srt_jln');
            $pembayaran = $this->input->post('c_bayar');
            $tempo = $this->input->post('tempo');
            $ppn = $this->input->post('ppn');
            $fp = $this->input->post('fp');
            $tgl_fp = $this->input->post('tgl_fp');
            $keterangan = $this->input->post('keterangan');
            $total_penerimaan = $this->input->post('total_penerimaan');

            // echo json_encode($this->input->post('item'));
            // exit;

            $pb = [
                'no_pb' => $no_pb,
                'tgl_pb' => $tgl_pb,
                'supplier' => $supplier,
                'no_srt_jln' => $srt_jln,
                'tgl_srt_jln' => $tgl_srt_jln,
                'pembayaran' => $pembayaran,
                'tempo' => $tempo,
                'no_faktur' => $fp,
                'tgl_faktur' => $tgl_fp,
                'type_ppn' => $ppn,
                'keterangan' => $keterangan,
                'total_penerimaan' => $total_penerimaan,
                "user_input" => $this->session->userdata('id_user'),
            ];
            $this->db->insert('penerimaan', $pb);
            $pb_get = $this->db
                ->query('SELECT MAX(id_penerimaan) as id_penerimaan from penerimaan')->row_array();
            foreach ($this->input->post('item') as $x) {
                $output[] = [
                    'id_pb' => $pb_get['id_penerimaan'],
                    'id_barang' => $x['id_barang'],
                    'nama_barang' => $x['nama_barang'],
                    'satuan' => $x['satuan'],
                    'stok_awal' => $x['stok_awal'],
                    'qty_pb' => $x['qty'],
                    'harga_satuan' => $this->clean($x['harga_satuan']),
                    'harga_netto' => $this->clean($x['netto']),
                    'jumlah' => $this->clean($x['jumlah']),
                    'gudang' => $x['gudang'],
                ];
            }
            $this->db->insert_batch('penerimaan_list', $output); //submit
            // if ($this->db->error()) {
            //     // Log the database error
            //     // $abc = ;

            //     echo json_encode(log_message('error', 'Database Error: ' . $this->db->error()));
            // } else {

            echo json_encode('berhasil');
            // }
        }
        function clean($string)
        {
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

            return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        }
        function add_pb()
        {
            $data_b = $this->db
                ->query('SELECT max(no_pb) as no_pb FROM penerimaan')
                ->row_array();
            $kode_pb = $data_b['no_pb'];
            $urutan = (int) substr($kode_pb, 3, 6);
            $urutan++;
            $huruf = 'PB-';
            $kode_pb = $huruf . sprintf('%03d', $urutan);

            $satuan = $this->db->get('satuan')->result();
            $this->db->from('penerimaan as a');
            $this->db->join('supplier as b', 'a.supplier=b.kode_supplier', 'LEFT');
            $penerimaan = $this->db->get()->result();
            $data = [
                'kode_pb' => $kode_pb,
                'penerimaan' => $penerimaan,
                'satuan' => $satuan,
                'gudang' => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            ];

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit;
            $this->load->view('body/header');
            $this->load->view('barang/penerimaan', $data);
            $this->load->view('body/footer');
        }
        function change_date()
        {
            $date = $this->input->post('date');
            $date2 = $this->input->post('date2');
            $this->session->set_userdata('date_pembelian', $date);
            $this->session->set_userdata('date_pembelian2', $date2);
            redirect('pembelian/histori_pb');
        }
    }
