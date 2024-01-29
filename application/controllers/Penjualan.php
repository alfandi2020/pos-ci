<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	// private $param;

	public function __construct() {
        parent::__construct();
        // $this->load->library('Pdf');
        // $this->load->model('M_admin');
        $this->load->helper(array('form', 'url'));
        $this->load->library('PHPExcel');

        // $this->load->library(array('form_validation','Routerosapi'));
        //cek jika user blm login maka redirect ke halaman login
        if ($this->session->userdata('username', 'nama')  != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }
	}
	public function index()
	{
        // date('Y-m-d', strtotime('-1 days', strtotime($this->session->userdata('date_penjualan'))));
        $first_date = $this->session->userdata('date_penjualan');
        // $second_date = date('Y-m-d', strtotime('+1 days', strtotime($this->session->userdata('date_penjualan2'))));
        $second_date = $this->session->userdata('date_penjualan2');
        // $this->db->where('b.tahan',0);
        $this->db->select('*,sum(c.jumlah) as total_transaksi,d.nama as nama_kasir,a.id as id_transaksi,sum(e.nominal_bayar) as bayar_piutang');
        $this->db->from('transaksi as a');
        $this->db->join('customers as b','a.pelanggan=b.id_customer','LEFT');
        $this->db->join('transaksi_item as c','a.id=c.id_transaksi','LEFT');
        $this->db->join('users as d','d.id=a.kasir','LEFT');
        $this->db->join('histori_transaksi as e','e.id=a.id','LEFT');
        $this->db->where('a.trash', 0);
        $this->db->where('c.trash', 0);
        $this->db->where('a.tahan', 0);
        // $this->db->where('a.tahan',0);
        $this->db->where('a.cencel', 0);
        if ($first_date == true && $second_date == true) {
            $this->db->where('a.tgl_transaksi >=',$first_date);
            $this->db->where('a.tgl_transaksi <=',$second_date);
        }
        $this->db->group_by('a.no_struk');
        $penjualan = $this->db->get()->result();
        $data = [
            "penjualan" => $penjualan,
        ];
		$this->load->view('body/header');
		$this->load->view('penjualan/index',$data);
		$this->load->view('body/footer');
    }
    function delete_penjualan()
    {
        $id = $this->input->post('id');//id transaksi
        $this->db->where('id',$id);
         $this->db->set('trash',1);
         $this->db->set('trash_by',$this->session->userdata('id_user'));
         $this->db->update('transaksi');
         echo json_encode('berhasil');
    }
    function excel()
    {
        require_once(APPPATH.'libraries/PHPExcel/IOFactory.php');
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
        $excel->setActiveSheetIndex(0)->setCellValue('F1', "alamat");
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "kontak person");
        $excel->setActiveSheetIndex(0)->setCellValue('H1', "No.kontak");
        $excel->setActiveSheetIndex(0)->setCellValue('I1', "Tipe pelanggan");
        $excel->setActiveSheetIndex(0)->setCellValue('J1', "Jenis pembayaran");
        $excel->setActiveSheetIndex(0)->setCellValue('K1', "Jatuh tempo");
        $excel->setActiveSheetIndex(0)->setCellValue('L1', "Satuan"); // satuan terkecil
        $excel->setActiveSheetIndex(0)->setCellValue('M1', "Qty");//qty terkecil
        $excel->setActiveSheetIndex(0)->setCellValue('N1', "Harga satuan");
        $excel->setActiveSheetIndex(0)->setCellValue('O1', "Jumlah(Rp)");
        $excel->setActiveSheetIndex(0)->setCellValue('P1', "Total Transaksi");
        $excel->setActiveSheetIndex(0)->setCellValue('Q1', "Kategori");
        $excel->setActiveSheetIndex(0)->setCellValue('R1', "Sales");
        $excel->setActiveSheetIndex(0)->setCellValue('S1', "Kasir");
        $excel->setActiveSheetIndex(0)->setCellValue('T1', "Pengiriman");
        $excel->setActiveSheetIndex(0)->setCellValue('U1', "Status");

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
        $excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $first_date = $this->session->userdata('date_penjualan');
        // $second_date = date('Y-m-d', strtotime('+1 days', strtotime($this->session->userdata('date_penjualan2'))));
        $second_date = $this->session->userdata('date_penjualan2');

        $penjualan = $this->db->query("SELECT *,a.tgl_transaksi as tgl_transaksi,d.nama as nama_kasir from transaksi as a left join transaksi_item as b on(a.id=b.id_transaksi)
        left join customers as c on(a.pelanggan=c.id_customer)
        left join users d on (a.kasir=d.id)
        left join barang as e on(b.kd_barang=e.id)
        left join kategori as f on(e.kategori_id=f.id) WHERE a.tahan=0 and DATE(a.tgl_transaksi) BETWEEN '".$first_date."' and '".$second_date."'")->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($penjualan as $data){
            if ($data->pembayaran == 'GIRO' && isset(json_decode($data->info_pembayaran)->tempo) == true) {
                $tempo = json_decode($data->info_pembayaran)->tempo;
            }else{
                $tempo = "";
            }
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->tgl_transaksi);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, "'".$data->no_struk);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kode_barang);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->barang);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nama_toko);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->alamat);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->pic_toko);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->no_telp);
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->tipe_penjualan);
            $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->pembayaran);
            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $tempo);
            $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->satuan);
            $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->qty);
            $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->harga_satuan);
            $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->jumlah);
            $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->total_transaksi);
            $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->nama_kategori);
            $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->salesman);
            $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->nama_kasir);
            $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->pengiriman);
            $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->trash == 1 ? "Delete" : "Ok");//blm tau status ini apa

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

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
        $excel->getActiveSheet()->setTitle('PENJUALAN');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="penjualan.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $objWriter->save('php://output');
        exit;


    }
    function change_date(){
        $date = $this->input->post('date');
        $date2 = $this->input->post('date2');
        $this->session->set_userdata('date_penjualan',$date);
        $this->session->set_userdata('date_penjualan2',$date2);
        redirect('penjualan');
    }

}

