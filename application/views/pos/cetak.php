<script>
    window.print()
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        font-size: 18px;
        font-family: Arial;
    }

    /* Create two equal columns that floats next to each other */
    .col {
        float: left;
        width: 20%;
        /* padding: 10px; */
        /* height: 1px; Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<body>
    <table>
        <?php $setting = $this->db->get_where('setting', ['id' => 1])->row_array(); ?>
        <tr>
            <td colspan="2" style="text-align: center; vertical-align: middle;"><b style="font-size:28px;">TOKO LINGLING</b> <?= $setting['alamat'] ?></td>
        </tr>
        <!-- <tr>
        <td style="text-align:right">JL.RAYA TENGAH NO.1</td>
    </tr> -->
        <tr>
            <td width="180">
                No. <?= $transkasi['no_struk'] ?>
            </td>
            <td style="text-align:right"><?= date('d/m/Y', strtotime($transkasi['tgl_transaksi'])) ?></td>
        </tr>
        <tr>
            <td>Cus : <?= $this->db->get_where('customers', ['id_customer' => $transkasi['pelanggan']])->row_array()['nama_toko']; ?></td>
            <td style="text-align:right"><?= date('H:i:s') ?></td>
        </tr>
        <tr>
            <td>Ksr : <?= $this->db->get_where('users', ['id' => $transkasi['kasir']])->row_array()['nama']; ?></td>
            <!-- <td style="text-align:right"><?= $this->db->get_where('ekspedisi', ['id' => $transkasi['pengiriman']])->row_array()['kurir'] == "Internal" ? "Ambil ditoko" : "Ekspedisi"; ?></td> -->
            <td style="font-size:14px;text-align:right"><?= $this->db->get_where('ekspedisi', ['id' => $transkasi['pengiriman']])->row_array()['nama']; ?></td>
        </tr>
        <!-- <tr>
        <td>Pengirim </td>
        <td><?= $this->db->get_where('ekspedisi', ['id' => $transkasi['pengiriman']])->row_array()['kurir'] == "Internal" ? "Ambil ditoko" : "Ekspedisi"; ?></td>
    </tr> -->
        <tr>
            <th colspan="2">
                <hr>
            </th>
        </tr>
        <?php
        $sub_total = 0;
        foreach ($transaksi_item as $x) {
            $sub_total += $x->harga_satuan * $x->qty;
        ?>
            <tr>
                <td width="240"><?= $x->barang ?></td>
            </tr>
            <tr>
                <td><?= $x->qty ?> &nbsp;&nbsp;&nbsp; <?= $x->satuan ?> &nbsp;&nbsp;&nbsp; <?= number_format($x->harga_satuan, 0, ',', ',') ?> </td>
                <td style="text-align:right"><?= number_format($x->harga_satuan * $x->qty, 0, ',', ',') ?></td>
            </tr>
            <?php if ($x->diskon_item != 0) { ?>
                <tr>
                    <td style="text-align:right">Diskon</td>
                    <td style="text-align:right"><?= number_format($x->diskon_item,0,',',',') ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        <tr>
            <th colspan="2">
                <hr>
            </th>
        </tr>
        <tr>
            <td>
                <div style="float:left;width:50%;"> Total Item </div>
                <div style="float:left;width:50%;text-align:center"><?= count($transaksi_item) ?> item</div>
            </td>
            <td style="text-align:left"></td>
        </tr>
        <tr>
            <td>Sub Total</td>
            <td style="text-align:right"><?= number_format($sub_total, 0, ',', ',') ?></td>
        </tr>
        <!-- <?php
        if ($this->input->get('status') == "not_first") {
        ?>
            <tr>
                <td>Sisa bon Yang lalu</td>
                <td style="text-align:right"><?= number_format($transkasi['total_transkasi'] - $transkasi['total_bayar'], 0, ',', ',') ?></td>
            </tr>
        <?php
        }
        ?> -->
        <?php
          $pelanggan = $transkasi['pelanggan'];
            $sum = $this->db->query("SELECT
	*,a.total_transaksi - SUM( nominal_bayar ) as cek_piutang
FROM
	transaksi AS a
	LEFT JOIN histori_transaksi AS b ON ( a.id = b.id_transaksi ) 
WHERE a.pelanggan='".$pelanggan."'")->row_array();
            $cek_piutang_customers = $sum['cek_piutang'];
        if ($cek_piutang_customers != 0) {
          
        ?>
            <tr>
                <td></td>
                <td>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Sisa Bon Yang lalu</td>
                <td style="text-align:right"><?= number_format($sum['cek_piutang'], 0, ',', ',') ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td>
                <div style="float:left;width:50%;"> Tunai / Transfer</div>
                <?php
                $bank = json_decode($transkasi['info_pembayaran']) == "" ? 'Cash' : json_decode($transkasi['info_pembayaran'])->bank;
                ?>
                <div style="float:left;width:50%;text-align:center"><?= $bank ?></div>
            </td>
            <?php if ($cek_piutang_customers == '0') { ?>
                <td style="text-align:right">
                    <?=  number_format($sub_total, 0, ',', ',') ?> <!--- jika sudah lunas---->
                </td>

            <?php } else { ?>
                <td style="text-align:right"><?= number_format($transkasi['total_bayar'], 0, ',', ',') ?></td>
            <?php } ?>
        </tr>
        <?php if ($transkasi['tunai'] == true) { ?>
            <tr>
                <td>
                    <div style="float:left;width:50%;"> Tunai</div>
                </td>
                <td style="text-align:right"><?= number_format($transkasi['tunai'], 0, ',', ',') ?></td>
            </tr>
        <?php } ?>
        <?php if ($transkasi['pembayaran'] == 'VOCHER') { ?>
            <tr>
                <td>
                    <div style="float:left;width:50%;"> Vocher</div>
                    <div style="float:left;width:50%;text-align:center">NC00001</div>
                </td>
                <td style="text-align:right"><?= number_format($transkasi['total_bayar'], 0, ',', ',') ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td>
                <!-- <?php if ($transkasi['pembayaran'] == "CASH") {
                            echo "Cash";
                        } else if ($transkasi['pembayaran'] == "TRANSFER") {
                            echo "Transfer";
                        }
                        ?> -->
                Diskon
            </td>
            <td style="text-align:right"><?= number_format($transkasi['diskon'], 0, ',', ',') ?></td>
        </tr>
        <?php
        if ($transkasi['total_bayar'] > $transkasi['total_transaksi']) {
        ?>
            <tr>
                <td>Kembali</td>
                <td style="text-align:right"><?= number_format($transkasi['kembali'], 0, ',', ',') ?></td>
            </tr>
        <?php
        }
        ?>

        <?php
                    $sum2 = $this->db->query("SELECT
	*,a.total_transaksi - SUM( b.nominal_bayar ) as cek_piutang
FROM
	transaksi AS a
	LEFT JOIN histori_transaksi AS b ON ( a.id = b.id_transaksi ) 
WHERE a.pelanggan='".$pelanggan."' AND a.id='".$this->input->get('id')."'")->row_array();
        if ($transkasi['piutang'] == 1 && $cek_piutang_customers != 0) {
            // $pelanggan = $transkasi['pelanggan'];
            // $this->db->select('sum(total_transaksi) as transaksi, sum(total_bayar) as bayar');
            // $this->db->where('pelanggan', $pelanggan);
            // $this->db->where('id', $this->input->get('id'));
            // $sum2 = $this->db->get('transaksi')->row_array();
        ?>
            <tr>
                <td></td>
                <td>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Sisa Bon</td>
                <td style="text-align:right"><?= number_format($sum2['cek_piutang'], 0, ',', ',') ?></td>
            </tr>
        <?php
        }
        ?>

        <tr>
            <th colspan="2">
                <hr>
            </th>
        </tr>
        <tr>
            <td colspan="3" width="290" style="padding:10px;text-align: center; vertical-align: middle;font-size:15px;">
                <?php 
                echo $setting['struk'];
                ?>
            </td>
        </tr>
    </table>
</body>

</html>