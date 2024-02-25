<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pos extends CI_Controller
{
    // private $param;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('username', 'nama')  != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        // $this->load->view('body/header');
        $tipe = $this->input->post('tipe');
        if ($tipe == true) {
            $this->session->set_userdata('tipe_penjualan', $tipe);
            // $id_plg = explode(',', $this->input->post('tipe_penjualan'))[1];
            // $this->db->where('pelanggan_piutang', $id_plg);
            // $this->db->where('status', 1);
            // $cek_piutang_user = $this->db->get('piutang');
            // if ($cek_piutang_user->num_rows()) {
            //     $this->session->set_flashdata('msg', 'piutang');
            //     redirect('pos/load_piutang/' . $cek_piutang_user->row_array()['id_transaksi']);
            // }
        } else {
            $this->session->set_userdata('tipe_penjualan', 'umum,273,1');
        }
        $this->db->select('*,sum(c.jumlah) as total_transaksi');
        $this->db->from('transaksi as a');
        $this->db->join('customers as b', 'a.pelanggan=b.id_customer');
        $this->db->join('transaksi_item as c', 'a.id=c.id_transaksi');
        $this->db->where('a.trash', 0);
        $this->db->where('a.tahan', 1);
        $this->db->group_by('a.no_struk');
        $load = $this->db->get()->result();
        $id = $this->uri->segment(3);
        if ($id == true) {
            $transkasi = $this->db->get_where('transaksi', ['id' => $id])->row_array();
            $transkasi_item = $this->db->get_where('transaksi_item', ['id_transaksi' => $id])->result();
        } else {
            $transkasi = '';
            $transkasi_item = '';
        }
        $date = date('d') . date('m') . date('Y');
        $tgl_urutan = $this->db->query("SELECT max(urutan) as t FROM transaksi where no_struk like '%" . $date . "%'")->row_array();
        $data = [
            "product" => $this->db->get('barang')->result(),
            "satuan" => $this->db->get('satuan')->result(),
            "customers" => $this->db->get_where('customers', ['tipe_penjualan !=' => null])->result(),
            "ekspedisi" => $this->db->get('ekspedisi')->result(),
            "transaksi" => $transkasi,
            "transaksi_item" => $transkasi_item,
            "load" => $load,
            "tgl_urutan" => $tgl_urutan,
            "unik" => time() . rand(111, 999)
        ];
        // $this->session->unset_userdata('tipe_penjualan');
        $this->load->view('pos/sale', $data);
        // $this->load->view('body/foot/er');
    }
    function search_barang()
    {
        $id = $this->input->post('id');
        $set_unik = $this->input->post('unik');
        $cek = $this->input->post('cek');
        $qty = $cek == 'qty' ? $this->input->post('qty') : 1;
        $cek_unik = $this->db->get_where('temporary_transaksi_item',['unik' => $set_unik,'id_barang' => $id])->num_rows();
        // $this->db->select('*,CASE WHEN c.kd_barang IS NULL THEN a.stok ELSE FLOOR(a.stok / a.qty_kecil) - SUM(c.qty) END  as sisa_stock,CASE WHEN (c.unik="'.$set_unik.'" and id_barang="'.$id.'") THEN "yes" else "no" END AS cek_sisa_stok ');
        // $this->db->where('a.id', $id);
        // if ($cek_unik == true) {
        //     $this->db->where('c.unik', $set_unik);
        // }
        // $this->db->from('barang as a');
        // $this->db->join('satuan as b', 'a.id=b.barang_id', 'LEFT');
        // $this->db->join('temporary_transaksi_item as c', 'a.kode_barang=c.kd_barang', 'LEFT');
        // $this->db->order_by('a.id', 'ASC');
        // $this->db->group_by('kode_barang');
        // $this->db->group_by('nama');
        // // $cek_unik = $this->db->get_where('temporary_transaksi_item',['unik' => $set_unik])->num_rows();
        // // if ($cek_unik == true) {
        // //     $unik = "AND c.unik='".$set_unik."'";
        // // }else{
        // //     $unik = "";
        // // }
        // // $data = $this->db->query("SELECT *,  
		// // CASE WHEN kd_barang IS NULL THEN b.stok ELSE FLOOR(b.stok / b.qty_kecil) - SUM(tti.qty) END  as sisa_stock
		// // FROM barang b LEFT JOIN temporary_transaksi_item tti ON b.kode_barang = tti.kd_barang
		// // WHERE b.id = '".$id."'
		// // GROUP BY id, nama");
        // $data = $this->db->get();


        // Custom Query By : HRS //
        $data = $this->db->query("
                SELECT *, 
                FLOOR( (stok / qty_kecil ) ) - (SELECT IFNULL(SUM(qty),0) FROM temporary_transaksi_item WHERE kd_barang = a.kode_barang AND unik IS NOT NULL) as sisa_stock
                FROM 
                barang as a LEFT JOIN satuan b ON a.id=b.barang_id
                WHERE a.id = '".$id."'
                GROUP BY kode_barang");
        // End Custom

        
        // var_dump($data);
        // echo $data->row_array()['kode_barang'];
        if (explode(',', $this->session->userdata('tipe_penjualan'))[0] == 'umum') {
            $harga = $data->row_array()['hargajualk_retail'];
        }elseif (explode(',', $this->session->userdata('tipe_penjualan'))[0] == 'retail') {
            $harga = $data->row_array()['hargajualk_retail'];
        }elseif (explode(',', $this->session->userdata('tipe_penjualan'))[0] == 'grosir') {
            $harga = $data->row_array()['hargajualk_grosir'];
        }elseif (explode(',', $this->session->userdata('tipe_penjualan'))[0] == 'partai') {
            $harga = $data->row_array()['hargajualk_partai'];
        }
        $stok = $data->row_array()['stok'] / $data->row_array()['qty_kecil'] - 1;
        $temp = [
            "unik" => $set_unik,
            "id_kasir" => $this->session->userdata('id_user'),
            "id_barang" => $id,
            "kd_barang" => $data->row_array()['kode_barang'],
            "barang" => $data->row_array()['nama'],
            "qty" => $qty,
            "qty_satuan" => $data->row_array()['qty_kecil'],
            "satuan" => $data->row_array()['id_satuan_kecil'],
            "harga_satuan" => $harga,
            "diskon_item" => 0,
            "jumlah" => 0,
            "trash" => 0,
            "stok_akhir" => $stok
        ];
        echo json_encode($data->row_array());
        if ($cek == 'selain_search_barang') {
            $this->db->where('satuan',$this->input->post('qty_satuan'));
            $this->db->where('kd_barang', $id);
            $this->db->where('unik',$set_unik);
            $this->db->set('qty');
            $this->db->update('temporary_transaksi_item');
        }
        if ($data->row_array()['stok'] >= 10 && $cek != 'selain_search_barang') {
            $this->db->insert('temporary_transaksi_item', $temp);
        }
    }
    function update_temp_transaksi()
    {
        $kd_barang = $this->uri->segment(3);
        $sql = "SELECT  
        CASE WHEN kd_barang IS NULL THEN stok ELSE FLOOR(stok / qty_kecil) - SUM(qty) END  as sisa_stock
        FROM barang b LEFT JOIN temporary_transaksi_item tti ON b.kode_barang = tti.kd_barang
        WHERE b.id = '".$kd_barang."'
        GROUP BY id, nama";
        echo json_encode($this->db->query($sql)->row_array());
    }
    function get_customers()
    {
        // $this->db->where('tipe_penjualan !=',null);
        $id = $this->input->post('id');
        $db = $this->db->query('select id_customer,nama_toko,tipe_penjualan, case when id_customer = ' . $id . ' then "1" else "0" end as cek from customers where tipe_penjualan is not null')->result();
        echo json_encode($db);
    }
    function get_pengiriman()
    {
        // $this->db->where('tipe_penjualan !=',null);
        $id = $this->input->post('id');
        $db = $this->db->query('select *, case when id = ' . $id . ' then "1" else "0" end as cek from ekspedisi')->result();
        echo json_encode($db);
    }
    function get_barang()
    {
        $title = $_GET['term'];
        // $this->db->where('status', 'Aktif');
        $this->db->like('a.nama', $title, 'both');
        $this->db->order_by('a.nama', 'asc');
        $this->db->limit(10);
        $this->db->from('barang as a');
        $this->db->group_by('a.nama');
        // $this->db->join('satuan as b','a.id_satuan=b.id_satuan','LEFT');
        $result = $this->db->get();
        if (count($result->result()) > 0) {
            foreach ($result->result() as $row)
                $arr_result[] = array(
                    'label'         => $row->nama,
                    'description'   => $row->id,
                    'kode_barang'   => $row->kode_barang
                );
            echo json_encode($arr_result);
        }
    }
    function get_satuan()
    {
        $id = $this->input->post('id');
        $data = $this->db->get_where('satuan', ['id_satuan' => $id])->row_array();
        echo json_encode($data);
    }
    function change_customer()
    {
        $tipe = $this->input->post('tipe');
        $xx = $this->session->set_userdata('tipe_penjualan', $tipe);
        if ($xx == true) {
            redirect('pos/sale');
        }
    }
    function cetak()
    {
        $id_transaksi = $this->input->get('id');
        // $mpdf = new \Mpdf\Mpdf([
        //     // 'tempDir' => '/tmp',
        //     'mode' => '',
        //     'format' => array(90, 80),
        //     'default_font_size' => 0,
        //     'default_font' => '',
        //     'margin_left' => 15,
        //     'margin_right' => 15,
        //     'margin_top' => 5,
        //     'margin_bottom' => 10,
        //     'margin_header' => 10,
        //     'margin_footer' => 5,
        //     'orientation' => 'P',
        //     'showImageErrors' => true
        // ]);
        $this->db->select('*,sum(c.nominal_bayar) as bayar_piutang,sum(d.jumlah) as t_transaksi');
        $this->db->where('a.id', $id_transaksi);
        $this->db->join('piutang as b', 'a.id=b.id_transaksi', 'LEFT');
        $this->db->join('histori_transaksi as c', 'a.id=c.id_transaksi', 'LEFT');
        $this->db->join('transaksi_item as d', 'a.id=d.id_transaksi', 'LEFT');
        $get_transaksi = $this->db->get("transaksi as a")->row_array();
        $this->db->where('trash', 0);
        $this->db->where('id_transaksi', $id_transaksi);
        $get_transaksi_item = $this->db->get("transaksi_item")->result();
        $data = [
            "transkasi" => $get_transaksi,
            "transaksi_item" => $get_transaksi_item
        ];
        $this->load->view('pos/cetak', $data);
        // $mpdf->defaultfooterline=0;
        // // $mpdf->setFooter('<div style="text-align: left;">F.7.1.1</div>');
        // $mpdf->WriteHTML($html);
        // $mpdf->SetJS('this.print();');
        // $mpdf->Output();
    }
    function submit()
    {
        $id_barang = $this->input->post('id_barang');
        $cek = $this->input->post('cek');
        $update = $this->input->post('update');
        $id_transaksi = $this->input->post('id_transaksi');
        $edit_transaksi = $this->input->post('edit_transaksi');
        $urutan = substr($this->input->post('no_struk'), 8);

        if ($edit_transaksi == 'edit_transaksi') {
            $data = [
                "no_struk" => $this->input->post('no_struk'),
                "pelanggan" => explode(',', $this->input->post('tipe'))[1],
                "diskon" => $this->clean($this->input->post('diskon_all')),
                "total_netto" => $this->clean($this->input->post('total_netto')),
                "total_bayar" => $this->clean($this->input->post('total_bayar')),
                "total_transaksi" => $this->clean($this->input->post('total_transaksi')),
                "tunai" => $this->clean($this->input->post('tunai')),
                "kembali" => $this->input->post('piutang') == '1' ? 0 : $this->clean($this->input->post('kembali')),
                "jumlah_item" => $this->input->post('jumlah_item'),
                "keterangan" => $this->input->post('keterangan'),
                "pengiriman" => $this->input->post('pengiriman'),
                "tahan" => $this->clean($this->input->post('tahan')),
                "pembayaran" => $this->input->post('pembayaran'),
                "info_pembayaran" => $this->input->post('info_pembayaran'),
                "piutang" => $this->input->post('piutang')
            ];
        } else { //submit
            $data = [
                "no_struk" => $this->input->post('no_struk'),
                "tgl_transaksi" => $this->input->post('tgl_transaksi'),
                "urutan" => $urutan,
                "pelanggan" => explode(',', $this->input->post('tipe'))[1],
                "diskon" => $this->clean($this->input->post('diskon_all')),
                "total_netto" => $this->clean($this->input->post('total_netto')),
                "total_bayar" => $this->clean($this->input->post('total_bayar')),
                "total_transaksi" => $this->clean($this->input->post('total_transaksi')),
                "tunai" => $this->clean($this->input->post('tunai')),
                "kembali" => $this->input->post('piutang') == '1' ? 0 : $this->clean($this->input->post('kembali')),
                "jumlah_item" => $this->input->post('jumlah_item'),
                "keterangan" => $this->input->post('keterangan'),
                "kasir" => $this->session->userdata('id_user'),
                "pengiriman" => $this->input->post('pengiriman'),
                "tahan" => $this->clean($this->input->post('tahan')),
                "pembayaran" => $this->input->post('pembayaran'),
                "info_pembayaran" => $this->input->post('info_pembayaran'),
                "piutang" => $this->input->post('piutang')
            ];
        }
        if ($update == 'update') {
            $this->db->where('id', $id_transaksi); //update data hold
            $this->db->update('transaksi', $data);
        } else if ($edit_transaksi == 'edit_transaksi') {
            $this->db->where('id', $id_transaksi); //update data transaksi
            $this->db->update('transaksi', $data);
        } else {
            $cek_transaksi = $this->db->get_where('transaksi', ['no_struk' => $this->input->post('no_struk')])->num_rows();
            if ($cek_transaksi == false) {
                $this->db->insert('transaksi', $data); //submit
            }
        }
        $get_transkasi = $this->db->query("SELECT MAX(id) as id_transaksi from transaksi")->row_array();
        $total_transaksii = 0;
        foreach ($this->input->post('item') as $x) {
            $ex_satuan = explode(',', $x['satuan']);
            $total_transaksii += $x['jumlah'];
            $output[] = array(
                "id_transaksi" => $get_transkasi['id_transaksi'],
                "kd_barang" => $x['kd_barang'],
                "barang" => $x['barang'],
                "qty" => $x['qty'],
                "qty_satuan" => $ex_satuan[0],
                "satuan" => $ex_satuan[1],
                "harga_satuan" => $x['harga_satuan'],
                "diskon_item" => $x['diskon_item'],
                "jumlah" => $x['jumlah'],
            );
            if ($cek == 'BAYAR') {
                $barang = $this->db->get_where('barang', ['id' => $x['kd_barang']])->row_array();

                if ($ex_satuan[2] == "konv") {
                    $jumlah = $x['qty'];
                } else if ($ex_satuan[2] == "kecil" && $barang['qty_konv']) {
                    $jumlah = $x['qty'] * $barang['qty_kecil'];
                } else if ($ex_satuan[2] == "kecil" && !$barang['qty_konv']) {
                    $jumlah = $x['qty'];
                } else if ($ex_satuan[2] == "besar" && $barang['qty_kecil'] && $barang['qty_konv']) {
                    $jumlah = $x['qty'] * $barang['qty_kecil'] * $barang['qty_besar'];
                } else if ($ex_satuan[2] == "besar" && $barang['qty_kecil'] && !$barang['qty_konv']) {
                    $jumlah = $x['qty'] * $barang['qty_kecil'];
                } else if ($ex_satuan[2] == "besar" && !$barang['qty_kecil'] && !$barang['qty_konv']) {
                    $jumlah = $x['qty'];
                }

                $total_qty_pcs = $barang['stok'] - $jumlah;

                $this->db->set('stok', $total_qty_pcs);
                $this->db->where('id', $x['kd_barang']);
                $this->db->update('barang');

                //update transaksi item
                if ($update == 'update') {
                    $cek_item = $this->db->get_where('transaksi_item', ['id_transaksi_item' => isset($x['id_transaksi_item']) ? $x['id_transaksi_item'] : 0, 'trash' => 0])->num_rows();
                    if ($cek_item == true) {
                        $this->db->set('kd_barang', $x['kd_barang']);
                        $this->db->set('barang', $x['barang']);
                        $this->db->set('qty', $x['qty']);
                        $this->db->set('qty_satuan', $ex_satuan[0]);
                        $this->db->set('satuan', $ex_satuan[1]);
                        $this->db->set('harga_satuan', $x['harga_satuan']);
                        $this->db->set('diskon_item', $x['diskon_item']);
                        $this->db->set('jumlah', $x['jumlah']);
                        $this->db->where('id_transaksi_item', $x['id_transaksi_item']);
                        $this->db->update('transaksi_item');
                    }

                    //jika ada penambahan row di transaksi hold
                    if ($cek_item == false) {
                        $insert_hold = [
                            "id_transaksi" => $id_transaksi,
                            "kd_barang" => $x['kd_barang'],
                            "barang" => $x['barang'],
                            "qty" => $x['qty'],
                            "qty_satuan" => $ex_satuan[0],
                            "satuan" => $ex_satuan[1],
                            "harga_satuan" => $x['harga_satuan'],
                            "diskon_item" => $x['diskon_item'],
                            "jumlah" => $x['jumlah'],
                        ];
                        $this->db->insert('transaksi_item', $insert_hold);
                    }
                } else if ($update == 'update_hold') { //tahan
                    // if ($update == 'update') { //update hold dan update transaksi
                    $cek_item = $this->db->get_where('transaksi_item', ['id_transaksi_item' => isset($x['id_transaksi_item']) ? $x['id_transaksi_item'] : 0])->num_rows();
                    if ($cek_item == true) {
                        $this->db->set('kd_barang', $x['kd_barang']);
                        $this->db->set('barang', $x['barang']);
                        $this->db->set('qty', $x['qty']);
                        $this->db->set('qty_satuan', $ex_satuan[0]);
                        $this->db->set('satuan', $ex_satuan[1]);
                        $this->db->set('harga_satuan', $x['harga_satuan']);
                        $this->db->set('diskon_item', $x['diskon_item']);
                        $this->db->set('jumlah', $x['jumlah']);
                        $this->db->where('id_transaksi_item', $x['id_transaksi_item']);
                        $this->db->update('transaksi_item');
                    }
                    //jika ada penambahan row di transaksi hold
                    if ($cek_item == false) {
                        $insert_hold = [
                            "id_transaksi" => $id_transaksi,
                            "kd_barang" => $x['kd_barang'],
                            "barang" => $x['barang'],
                            "qty" => $x['qty'],
                            "qty_satuan" => $ex_satuan[0],
                            "satuan" => $ex_satuan[1],
                            "harga_satuan" => $x['harga_satuan'],
                            "diskon_item" => $x['diskon_item'],
                            "jumlah" => $x['jumlah'],
                            "trash" => 0
                        ];
                        $this->db->insert('transaksi_item', $insert_hold);
                    }
                    // }
                }
            }
        }
        if ($update != 'update' || $edit_transaksi != 'edit_transaksi') {
            if ($this->input->post('tahan') == 0 && $this->clean($this->input->post('total_bayar')) < $total_transaksii - intval($this->clean($this->input->post('diskon_all')))) {
                $this->db->where('id', $get_transkasi['id_transaksi']); //update data transaksi
                $this->db->set('piutang', 1);
                $this->db->update('transaksi');
                $piutang = [
                    "id_transaksi" => $get_transkasi['id_transaksi'],
                    // "pelanggan_piutang" => $get_transkasi['pelanggan'],
                    "total_bayar_piutang" => $this->clean($this->input->post('total_bayar')),
                    "total_transkasi" => $total_transaksii,
                    "status" => 1
                ];
                $piutang_history = [
                    "id_transaksi" => $get_transkasi['id_transaksi'],
                    "nominal_bayar" => $this->clean($this->input->post('total_bayar')),
                ];
                $this->db->insert('piutang', $piutang);
                $this->db->insert('histori_transaksi', $piutang_history);
            }
        }
        $cek_insert_pertama = $this->db->get_where('transaksi', ['id' => $id_transaksi])->num_rows();
        if ($cek_insert_pertama == false) {
            $this->db->insert_batch('transaksi_item', $output); //submit pertama kali transaksi
        }
        if ($edit_transaksi == 'edit_transaksi') {
            $cek_id = $id_transaksi;
        } else {
            $cek_id = $get_transkasi['id_transaksi'];
        }
        $data_ec = [
            "id_transaksi" => $cek_id,
            'no_struk' => $this->input->post('no_struk'),
            'tahan' => $this->input->post('tahan'),
            'edit_transaksi' => $cek_id,
            "status" => 200
        ];
        echo json_encode($data_ec);
    }
    function check_tgl_pos()
    {
        $date = date('d') . date('m') . date('Y');
        $d = date('d', strtotime($this->input->post('tgl')));
        $m = date('m', strtotime($this->input->post('tgl')));
        $y = date('Y', strtotime($this->input->post('tgl')));
        $date = $d . $m . $y;
        $tgl_urutan = $this->db->query("SELECT max(urutan) as t FROM transaksi where no_struk like '%" . $date . "%'")->row_array();
        if ($tgl_urutan['t'] == null) {
            echo json_encode($d . $m . $y . sprintf('%04d', $tgl_urutan['t'] + 1));
        } else {
            // echo json_encode($d . $m . $y . $tgl_urutan['t'] + 1);
            echo json_encode($d . $m . $y . ($tgl_urutan['t'] + 1));
        }
    }
    function tes()
    {
        //contoh get array dalam kolom
        $xx = $this->db->get_where('transaksi', ['id' => 385])->row_array();
        echo json_decode($xx['info_pembayaran'])->tujuan;
    }
    function reprint_date()
    {
        $date = $this->input->post('date_print');
        $date2 = $this->input->post('date_print2');
        $pelanggan = $this->input->post('pelanggan');
        $this->session->set_userdata('reprint_date_penjualan', $date);
        $this->session->set_userdata('reprint_date_penjualan2', $date2);
        $this->session->set_userdata('reprint_tipe_penjualan', $pelanggan);
        echo json_encode($date);
        // redirect('pos/index/');
    }
    function load() //load edit transaksi
    {
        $id = $this->input->post('id');
        // $draw=intval($this->input->get("draw"));
        // $start=intval($this->input->get("start"));
        // $length=intval($this->input->get("length"));
        $this->db->where('id_transaksi', $id);
        $this->db->where('a.trash !=', 1);
        $this->db->from('transaksi_item as a');
        $this->db->join('barang as b', 'a.kd_barang=b.id', 'LEFT');
        $this->db->join('transaksi as c', 'c.id=a.id_transaksi', 'LEFT');
        $this->db->join('customers as d', 'c.pelanggan=d.id_customer', 'LEFT');
        $this->db->join('ekspedisi as e', 'c.pengiriman=e.id', 'LEFT');
        $query = $this->db->get()->result();
        echo json_encode($query);
    }
    function load_hold()
    {
        $this->db->select('*,sum(c.jumlah) as total_transaksi');
        $this->db->from('transaksi as a');
        $this->db->join('customers as b', 'a.pelanggan=b.id_customer', 'LEFT');
        $this->db->join('transaksi_item as c', 'a.id=c.id_transaksi', 'LEFT');
        $this->db->where('c.trash', 0);
        $this->db->where('a.tahan', 1);
        $this->db->where('a.kasir', $this->session->userdata('id_user'));
        $this->db->group_by('a.no_struk');
        $load = $this->db->get()->result();
        echo json_encode($load);
    }
    function load_trash_item()
    {
        $this->db->select('*');
        $this->db->from('transaksi as a');
        $this->db->join('customers as b', 'a.pelanggan=b.id_customer');
        $this->db->join('transaksi_item as c', 'a.id=c.id_transaksi');
        $this->db->where('c.trash', 1);
        $this->db->where('c.id_transaksi', 3);
        $this->db->where('a.kasir', $this->session->userdata('id_user'));
        // $this->db->group_by('a.no_struk');
        $load = $this->db->get()->result();
        echo json_encode($load);
    }
    function load_transaksi()
    {
        // $this->db->from('transaksi as a');
        // $this->db->join('customers as b', 'a.pelanggan=b.id_customer');
        // $this->db->join('transaksi_item as c', 'a.id=c.id_transaksi');
        // $this->db->join('users as d', 'd.id=a.kasir');

        $first_date = $this->session->userdata('reprint_date_penjualan');
        // $second_date = date('Y-m-d', strtotime('+1 days', strtotime($this->session->userdata('reprint_date_penjualan2'))));
        $second_date = $this->session->userdata('reprint_date_penjualan2');
        $this->db->select('*,sum(d.nominal_bayar) as bayar_piutang,a.id as i_transaksi');
        $this->db->from('transaksi as a');
        $this->db->join('customers as b', 'a.pelanggan=b.id_customer', 'LEFT');
        $this->db->join('transaksi_item as c', 'a.id=c.id_transaksi', 'LEFT');
        $this->db->join('histori_transaksi as d', 'a.id=d.id_transaksi', 'LEFT');
        $this->db->where('a.trash', 0);
        // $this->db->where('a.tahan',0);
        $this->db->where('a.cencel', 0);
        $this->db->where('a.kasir', $this->session->userdata('id_user'));
        // $this->db->group_by('a.no_struk');
        if ($first_date == true && $second_date == true) {
            $this->db->where('a.tgl_transaksi >=', $first_date);
            $this->db->where('a.tgl_transaksi <=', $second_date);
        } else {
            $this->db->where('a.tgl_transaksi >=', date('Y-m-d'));
            $this->db->where('a.tgl_transaksi <=', date('Y-m-d'));
        }
        if ($this->session->userdata('reprint_tipe_penjualan') != 0) {
            $this->db->where('b.id_customer', $this->session->userdata('reprint_tipe_penjualan'));
        }
        $this->db->group_by('a.no_struk');
        $load = $this->db->get()->result();
        echo json_encode($load);
    }
    function load_piutang()
    {
        $id = $this->input->post('id');
        // $draw=intval($this->input->get("draw"));
        // $start=intval($this->input->get("start"));
        // $length=intval($this->input->get("length"));
        $this->db->where('a.id_transaksi', $id);
        $this->db->where('a.trash !=', 1);
        $this->db->from('transaksi_item as a');
        $this->db->join('barang as b', 'a.kd_barang=b.id');
        $this->db->join('transaksi as c', 'c.id=a.id_transaksi');
        $this->db->join('customers as d', 'c.pelanggan=d.id_customer');
        $this->db->join('ekspedisi as e', 'c.pengiriman=e.id');
        $this->db->join('piutang as f', 'a.id_transaksi=f.id_transaksi');
        $query = $this->db->get()->result();
        echo json_encode($query);
        exit();
    }
    function del_row_hold()
    {
        $id = $this->input->post('id'); //id_transaksi_item
        $this->db->where('id_transaksi_item', $id);
        $this->db->set('trash', 1);
        $this->db->set('trash_by', $this->session->userdata('id_user'));
        $this->db->update('transaksi_item');
        echo json_encode('berhasil');
    }
    function delete_transaksi()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->set('trash', 1);
        $this->db->set('trash_by', $this->session->userdata('id_user'));
        $this->db->update('transaksi');

        $this->db->where('id_transaksi', $id);
        $this->db->set('trash', 1);
        $this->db->update('transaksi_item');
        echo json_encode('berhasil');
    }
    function cancel_transaksi()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->set('cencel', 1);
        $this->db->update('transaksi');
        echo json_encode('berhasil');
    }
    function closing2()
    {
        require_once(APPPATH . 'libraries/PHPExcel/IOFactory.php');
        // require_once 'PHPExcel/PHPExcel.php';
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
            ->setLastModifiedBy('My Notes Code')
            ->setTitle("Data Siswa")
            ->setSubject("Siswa")
            ->setDescription("Laporan Semua Data Siswa")
            ->setKeywords("Data Siswa");

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

        // $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
        // $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        // $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        // $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "Tanggal");
        $excel->setActiveSheetIndex(0)->setCellValue('B1', "No.Bukti"); //no struk
        $excel->setActiveSheetIndex(0)->setCellValue('C1', "Kode Barang");
        $excel->setActiveSheetIndex(0)->setCellValue('D1', "Nama Barang");
        $excel->setActiveSheetIndex(0)->setCellValue('E1', "Nama Pelanggan");
        $excel->setActiveSheetIndex(0)->setCellValue('F1', "Jenis pembayaran");
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "Total Belanja");
        $excel->setActiveSheetIndex(0)->setCellValue('H1', "Total Bayar");
        $excel->setActiveSheetIndex(0)->setCellValue('I1', "Retur Jual");
        $excel->setActiveSheetIndex(0)->setCellValue('J1', "Kurang Bayar");
        $excel->setActiveSheetIndex(0)->setCellValue('K1', "Bayar BON");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $pembayaran = $this->input->post('pembayaran_closing');
        $start_date = $this->input->post('date_print_closing');
        $end_date = date('Y-m-d', strtotime('+1 days', strtotime($this->input->post('date_print_closing2'))));
        $pelanggan = $this->input->post('closing_customers');

        if ($pelanggan == true) {
            $pelangganx = "and a.pelanggan='" . $pelanggan . "'";
        } else {
            $pelangganx = "";
        }
        $today = date('Y-m-d');
        $penjualan = $this->db->query("SELECT *,a.tgl_transaksi as tgl_transaksi,d.nama as nama_kasir,g.nama as nama_pengirim from transaksi as a left join transaksi_item as b on(a.id=b.id_transaksi)
        left join customers as c on(a.pelanggan=c.id_customer)
        left join users d on (a.kasir=d.id)
        left join barang as e on(b.kd_barang=e.id)
        left join kategori as f on(e.kategori_id=f.id)
        left join ekspedisi as g on(a.pengiriman = g.id) WHERE a.tahan=0 and a.trash=0 and a.kasir='" . $this->session->userdata('id_user') . "' and a.pembayaran='" . $pembayaran . "' and a.tgl_transaksi BETWEEN '" . $start_date . "' and '" . $end_date . "' " . $pelangganx . " ")->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
        $jumlah_row = 0;
        foreach ($penjualan as $data) {
            if ($data->pembayaran == 'GIRO' && isset(json_decode($data->info_pembayaran)->tempo) == true) {
                $tempo = json_decode($data->info_pembayaran)->tempo;
            } else {
                $tempo = "";
            }
            $excel->setActiveSheetIndex(0)->setCellValue('D1', "Nama Barang");
            $excel->setActiveSheetIndex(0)->setCellValue('E1', "Nama Pelanggan");
            $excel->setActiveSheetIndex(0)->setCellValue('F1', "Jenis pembayaran");
            $excel->setActiveSheetIndex(0)->setCellValue('G1', "Total Belanja");
            $excel->setActiveSheetIndex(0)->setCellValue('H1', "Total Bayar");
            $excel->setActiveSheetIndex(0)->setCellValue('I1', "Retur Jual");
            $excel->setActiveSheetIndex(0)->setCellValue('J1', "Kurang Bayar");
            $excel->setActiveSheetIndex(0)->setCellValue('K1', "Bayar BON");


            $jumlah_row += $data->jumlah;
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $data->tgl_transaksi);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->no_struk);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->kode_barang);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->barang);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nama_toko);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->pembayaran);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->jumlah);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->total_bayar);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, 0);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, 0);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, 0);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);


            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, 'CASH');
        $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $jumlah_row);


        // Set width kolom
        // $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        // $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        // $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        // $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        // $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Rename worksheet
        $excel->getActiveSheet()->setTitle('closing' . date('Y-m-d') . '');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="closing' . date('Y-m-d') . '.xls"');
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
    function closing()
    {
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

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $pembayaran = $this->input->get('pembayaran_closing');
        $start_date = $this->input->get('date_print_closing');
        // $end_date = date('Y-m-d', strtotime('+1 days', strtotime($this->input->get('date_print_closing2'))));
        $end_date = $this->input->get('date_print_closing2');
        $pelanggan = $this->input->get('closing_customers');

        if ($pelanggan == true) {
            $pelangganx = "and a.pelanggan='" . $pelanggan . "'";
        } else {
            $pelangganx = "";
        }
        if ($pembayaran == true) {
            $pembayaranx = "and a.pembayaran='" . $pembayaran . "'";
        } else {
            $pembayaranx = "";
        }
        $today = date('Y-m-d');
        $SQL = "SELECT a.no_struk,a.kembali,a.piutang, c.nama_toko,  d.nama as nama_kasir, a.tgl_transaksi as tgl_transaksi, g.nama as nama_pengirim, pembayaran,
                total_transaksi  AS total_transaksi,
                    j.nominal_bayar AS bayar_bon,
                    CASE WHEN total_bayar > total_transaksi THEN total_transaksi ELSE total_bayar END AS total_bayar,
                CASE
                        
                        WHEN (
                            ( total_bayar - total_transaksi  - diskon ) 
                            ) < 0 THEN
                            (
                                ( total_bayar- total_transaksi  - diskon ) 
                            ) ELSE 0 
                        END AS kurang_bayar
                FROM transaksi a 
                left join customers as c on(a.pelanggan=c.id_customer)
                left join users d on (a.kasir=d.id)
                left join ekspedisi as g on(a.pengiriman = g.id)
                left join transaksi_item as i on(a.id=i.id_transaksi)
                left join histori_transaksi as j on(a.id=j.id_transaksi) 
                WHERE a.tahan= 0  and a.trash= 0 and a.kasir='" . $this->session->userdata('id_user') . "' " . $pembayaranx . " and a.tgl_transaksi BETWEEN '" . $start_date . "' and '" . $end_date . "'  
                GROUP BY a.no_struk, a.pembayaran, a.tgl_transaksi, c.nama_toko, d.nama, g.nama

                UNION

                SELECT 
								
								'GrandTotal' as GrandTotal, '' as nama_toko, '' as nama_kasir, '' as tgl_bukti, '' as nama_pengirim, '' as pembayaran, '' as kembali, 
								'' as piutang, SUM(total_transaksi) as total_belanja, SUM(j.nominal_bayar) as bayar_bon,  
								SUM( CASE WHEN total_bayar > total_transaksi THEN total_transaksi ELSE total_bayar END ) as total_bayar,  

                 (	SUM(  CASE WHEN total_bayar < total_transaksi THEN total_bayar - total_transaksi - diskon ELSE 0 END  ) 
--                         - SUM(  CASE WHEN total_bayar < total_transaksi THEN total_bayar ELSE 0 END  ) 
--                         - SUM( diskon ) 

                        ) 
                AS kurang_bayar 
		
                FROM transaksi a 
                left join customers as c on(a.pelanggan=c.id_customer)
                left join users d on (a.kasir=d.id)
                 LEFT JOIN (SELECT id_transaksi, sum(nominal_bayar) as nominal_bayar FROM histori_transaksi GROUP BY id_transaksi ) j ON ( a.id = j.id_transaksi ) 
                WHERE a.tahan= 0  and a.trash= 0 and a.kasir='" . $this->session->userdata('id_user') . "' " . $pembayaranx . " and a.tgl_transaksi BETWEEN '" . $start_date . "' and '" . $end_date . "'";

        // echo $SQL;
        // die();

        $penjualan = $this->db->query($SQL)->result();
        // $penjualan = $this->db->query("SELECT *,a.tgl_transaksi as tgl_transaksi,d.nama as nama_kasir,g.nama as nama_pengirim,sum(i.jumlah) as t_transaksi,sum(j.nominal_bayar) as bayar_piutang from transaksi as a left join transaksi_item as b on(a.id=b.id_transaksi)
        //  left join customers as c on(a.pelanggan=c.id_customer)
        //  left join users d on (a.kasir=d.id)
        //  left join barang as e on(b.kd_barang=e.id)
        //  left join kategori as f on(e.kategori_id=f.id)
        //  left join ekspedisi as g on(a.pengiriman = g.id)
        //  left join piutang as h on(a.id=h.id_transaksi)
        //  left join transaksi_item as i on(a.id=i.id_transaksi)
        //  left join histori_transaksi as j on(a.id=j.id_transaksi) 
        //   WHERE a.tahan=0  and a.trash=0 and a.kasir='" . $this->session->userdata('id_user') . "' " . $pembayaranx . " and a.tgl_transaksi BETWEEN '" . $start_date . "' and '" . $end_date . "' " . $pelangganx . " GROUP BY a.no_struk ")->result();

        // echo '<pre>';
        // print_r($penjualan);
        // echo '</pre>';
        // exit;

        $data = [
            "penjualan" => $penjualan,
            "tgl_closing" => $start_date . '-' . $end_date
        ];
        $html = $this->load->view('pos/closing', $data, true);
        $mpdf->defaultfooterline = 0;
        // $mpdf->setFooter('<div style="text-align: left;">F.7.1.1</div>');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        // $mpdf->Output('closing'.$start_date.'-' . $end_date.' .pdf', 'D');
    }
    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
    //  function remove_session_customer() {
    //     $this->session->unset_userdata('tipe_penjualan');
    //  }
    // }
    // }
}
