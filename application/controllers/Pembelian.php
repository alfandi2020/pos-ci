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

       function index()
       {
           $brand = $this->input->post('brand');
           $action = $this->input->post('action');
           $id = $this->input->post('id_brand');
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
           if ($action == 'edit') {
               $datax = [
                   'penerimaan' => $brand,
               ];
               $this->db->where('id', $id);
               $this->db->update('penerimaan', $datax);
               redirect('barang/penerimaan');
           }
           $this->db->select('*,count(*) as total_penerima');
           $this->db->from('penerimaan as a');
           $this->db->join('penerimaan_list as b', 'a.id_penerimaan=b.id_pb');
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
           ];
           $this->db->insert('penerimaan', $pb);
           $pb_get = $this->db
               ->query(
                   'SELECT MAX(id_penerimaan) as id_penerimaan from penerimaan'
               )
               ->row_array();
           foreach ($this->input->post('item') as $x) {
               $output[] = [
                   'id_pb' => $pb_get['id_penerimaan'],
                   'id_barang' => $x['id_barang'],
                   'nama_barang' => $x['nama_barang'],
                   'satuan' => $x['satuan'],
                   'qty_pb' => $x['qty'],
                   'harga_satuan' => $x['harga_satuan'],
                   'harga_netto' => $x['netto'],
                   'gudang' => $x['gudang'],
               ];
           }
           $this->db->insert_batch('penerimaan_list', $output); //submit
           echo json_encode('berhasil');
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
           $this->db->join('supplier as b','a.supplier=b.kode_supplier','LEFT');
           $penerimaan = $this->db->get()->result();
           $data = [
               'kode_pb' => $kode_pb,
               'penerimaan' => $penerimaan,
               'satuan' => $satuan,
               'gudang' => $this->db->get('gudang')->result(),
           ];
           $this->load->view('body/header');
           $this->load->view('barang/penerimaan', $data);
           $this->load->view('body/footer');
       }
   }

