<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    public function index()
    {
        $max_num = $this->db->select('max(no_urut) as max')->get('hutang')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_bukti = 'BHS-' . date('ym') . '-' . $no_urut;
        $data = [
            "title" => "Pembayaran",
            "suppliers" => $this->db->order_by('nama_supplier', 'ASC')->get('supplier')->result(),
            "no_bukti" => $no_bukti,
            "no_urut" => $no_urut,
        ];

        if ($this->input->post()) {
            $data['penerimaan'] =  $this->db->where('supplier', $this->input->post('supplier'))->where('approve', '1')->order_by('date_created', 'DESC')->get('penerimaan')->result();
        }

        $this->load->view('body/header', $data);
        $this->load->view('payment/index', $data);
        $this->load->view('body/footer');
    }

    public function pilih_transaksi()
    {
        echo '<pre>';
        print_r($this->input->post());
        echo '</pre>';

        $this->load->view('body/header');
        $this->load->view('payment/pilih_transaksi');
        $this->load->view('body/footer');
    }

    public function buat_transaksi()
    {
        $pilihs = $this->input->post('pilih');
        $nominal_bayars = $this->input->post('nominal_bayar');

        $hutang = [
            'no_urut' => $this->input->post('no_urut'),
            'no_bukti' => $this->input->post('no_bukti'),
            'tanggal_bukti' => $this->input->post('tgl_bukti'),
            'supplier' => $this->input->post('supplier'),
            'debit_kredit' => $this->input->post('debit_kredit'),
            // 'nominal' => $this->input->post(''),
            'kode_akun' => $this->input->post('kode_akun'),
            'nama_akun' => $this->input->post('nama_akun'),
            'keterangan' => $this->input->post('keterangan'),
            'created_by' => $this->session->userdata('id_user'),
        ];


        echo '<pre>';
        print_r($hutang);
        echo '</pre>';
        exit;

        $this->db->insert('hutang', $hutang);
        //  Array
        // (
        //     [no_urut] => 000001
        //     [no_bukti] => BHS-2403-000001
        //     [tgl_bukti] => 2024-03-09
        //     [supplier] => SPL00001
        //     [debit_kredit] => debit
        //     [kode_akun] => 1111
        //     [nama_akun] => kas_harian
        //     [keterangan] => Testing
        //     [pilih] => Array
        //         (
        //             [0] => 18
        //         )

        //     [nominal_bayar] => Array
        //         (
        //             [0] => 503.000
        //         )

        // )
        if (is_array($pilihs)) {
            for ($i = 0; $i < count($pilihs); $i++) {
                $id = $pilihs[$i];
                $nominal_bayar = $nominal_bayars[$i];

                $data = [
                    'id' => $id,
                    'nominal_bayar' => $nominal_bayar,
                ];
                echo '<pre>';
                print_r($data);
                echo '</pre>';
            }
        }
    }
}
