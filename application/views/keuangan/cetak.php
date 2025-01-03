<script>
    setTimeout(() => {
        window.print()
    }, 2000);
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
        font-size: 12px;
        font-family: Arial;
    }

    table {
        font-size: 14px;
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
            <td colspan="2" style="text-align: center; vertical-align: middle;"><b style="font-size:28px;">TOKO
                    LINGLING</b>
                <?= $setting['alamat'] ?>
            </td>
        </tr>
        <!-- <tr>
        <td style="text-align:right">JL.RAYA TENGAH NO.1</td>
    </tr> -->
        <tr>
            <td>
                No.
                <?= $transkasi['no_struk'] ?>
            </td>
            <td style="text-align:right">
                <?= date('d/m/Y', strtotime($transkasi['tgl_transaksi'])) ?>
            </td>
        </tr>
        <tr>
            <td>Cus :
                <?= $this->db->get_where('customers', ['id_customer' => $transkasi['pelanggan']])->row_array()['nama_toko']; ?>
            </td>
            <td style="text-align:right">
                <?= date('H:i:s') ?>
            </td>
        </tr>
        <tr>
            <td>Ksr :
                <?= $this->db->get_where('users', ['id' => $transkasi['kasir']])->row_array()['nama']; ?>
            </td>
            <!-- <td style="text-align:right"><?= $this->db->get_where('ekspedisi', ['id' => $transkasi['pengiriman']])->row_array()['kurir'] == "Internal" ? "Ambil ditoko" : "Ekspedisi"; ?></td> -->
            <td style="font-size:14px;text-align:right">
                <?= $this->db->get_where('ekspedisi', ['id' => $transkasi['pengiriman']])->row_array()['nama']; ?>
            </td>
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
                <td style="float:left;width:250px;">
                    <?= $x->barang ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $x->qty ?> &nbsp;&nbsp;&nbsp;
                    <?= $x->satuan ?> &nbsp;&nbsp;&nbsp;
                    <?= number_format($x->harga_satuan, 0, ',', ',') ?>
                </td>
                <td style="text-align:right">
                    <?= number_format($x->harga_satuan * $x->qty, 0, ',', ',') ?>
                </td>
            </tr>
            <?php if ($x->diskon_item != 0) { ?>
                <tr>
                    <td style="text-align:right">Diskon</td>
                    <td style="text-align:right">
                        <?= number_format($x->diskon_item, 0, ',', ',') ?>
                    </td>
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
                <div style="float:left;width:50%;text-align:center">
                    <?= count($transaksi_item) ?> item
                </div>
            </td>
            <td style="text-align:left"></td>
        </tr>
        <tr>
            <td>Sub Total</td>
            <td style="text-align:right">
                <?= number_format($sub_total, 0, ',', ',') ?>
            </td>
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
        //             $sum = $this->db->query("SELECT
// 	a.total_transaksi,
// CASE
// 		WHEN sum( a.total_transaksi - (SELECT sum(nominal_bayar) FROM histori_transaksi where id_transaksi=a.id)) != 0 THEN
// 		sum( a.total_transaksi - (SELECT sum(nominal_bayar) FROM histori_transaksi where id_transaksi=a.id))
// 		ELSE 'lunas'
// 	END AS cek_piutang,
// 	CASE WHEN (SELECT count(*) from histori_transaksi where id_transaksi=a.id) > 1 THEN
// 		'2'
// 	ELSE
// 		'1'
// END AS piutang_dua
// FROM
// 	transaksi AS a
// WHERE
// 	a.pelanggan ='".$pelanggan."' ")->row_array();
        $sum2 = $this->db->query("SELECT id, pelanggan, MONTH(tgl_transaksi), YEAR(tgl_transaksi), 
	total_transaksi, total_bayar, kembali, diskon, 
	( total_bayar - ( (total_transaksi - diskon) + kembali )  ) as nilai_transaksi, 
	IFNULL( (select ( SUM(total_bayar) - ( ( SUM(total_transaksi) - SUM(diskon)) + SUM(kembali) )  ) FROM transaksi ax WHERE pelanggan = a.pelanggan 
		AND id < a.id
	 ),0) as sisa_bon_sebelumnya
	FROM transaksi a WHERE a.id = '" . $this->input->get('id') . "'
	ORDER BY id ASC ")->row_array();
        $total_transaksii = 0;
        $total_nominal_bayar = 0;
        //if ($sum['cek_piutang'] != 'lunas' && $sum['piutang_dua'] > 1) {
        ?>
        <tr>
            <td></td>
            <td>
                <hr>
            </td>
        </tr>
        <tr>
            <td>Sisa Bon Yang lalu</td>
            <td style="text-align:right">
                <?= number_format($sum2['sisa_bon_sebelumnya'], 0, ',', ',') ?>
            </td>
            <td style="text-align:right">
                <?= number_format(abs($sum2['sisa_bon_sebelumnya']), 0, ',', ',') ?>
            </td>
        </tr>
        <?php
        // }
        ?>
        <tr>
            <td>
                <div style="float:left;width:50%;"> Tunai / Transfer</div>
                <?php
                $bank = json_decode($transkasi['info_pembayaran']) == "" ? 'Cash' : json_decode($transkasi['info_pembayaran'])->bank;
                ?>
                <div style="float:left;width:50%;text-align:center">
                    <?= $bank ?>
                </div>
            </td>
            <?php //if ($sum2['cek_piutang'] == 'lunas') { ?>
            <!-- <td style="text-align:right">
                    <?= number_format($sub_total, 0, ',', ',') ?> - jika sudah lunas--
                </td> -->
            <?php //} else { ?>
            <td style="text-align:right">
                <?= number_format($transkasi['total_bayar'], 0, ',', ',') ?>
            </td>
            <?php //} ?>
        </tr>
        <?php if ($transkasi['tunai'] == true) { ?>
            <tr>
                <td>
                    <div style="float:left;width:50%;"> Tunai</div>
                </td>
                <td style="text-align:right">
                    <?= number_format($transkasi['tunai'], 0, ',', ',') ?>
                </td>
            </tr>
        <?php } ?>
        <?php if ($transkasi['pembayaran'] == 'VOCHER') { ?>
            <tr>
                <td>
                    <div style="float:left;width:50%;"> Vocher</div>
                    <div style="float:left;width:50%;text-align:center">NC00001</div>
                </td>
                <td style="text-align:right">
                    <?= number_format($transkasi['total_bayar'], 0, ',', ',') ?>
                </td>
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
            <td style="text-align:right">
                <?= number_format($transkasi['diskon'], 0, ',', ',') ?>
            </td>
        </tr>
        <?php
        if ($transkasi['total_bayar'] > $transkasi['total_transaksi']) {
            ?>
            <tr>
                <td>Kembali</td>
                <td style="text-align:right">
                    <?= number_format($transkasi['kembali'], 0, ',', ',') ?>
                </td>
            </tr>
            <?php
        }
        ?>
        <?php
        //                 $sum2 = $this->db->query("SELECT id, pelanggan, MONTH(tgl_transaksi), YEAR(tgl_transaksi), 
        // total_transaksi, total_bayar, kembali, diskon, 
        // ( total_bayar - ( (total_transaksi - diskon) + kembali )  ) as nilai_transaksi, 
        // IFNULL( (select ( SUM(total_bayar) - ( ( SUM(total_transaksi) - SUM(diskon)) + SUM(kembali) )  ) FROM transaksi ax WHERE pelanggan = a.pelanggan 
        // 	AND id < a.id
        //  ),0) as sisa_bon_sebelumnya
        // FROM transaksi a WHERE a.id = '". $this->input->get('id')."'
        // ORDER BY id ASC ")->row_array();
        if ($transkasi['piutang'] == 1) {
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
                <td>Saldo Bon</td>
                <td style="text-align:right">
                    <?= number_format(((($sum2['nilai_transaksi'] * -1) - $sum2['sisa_bon_sebelumnya']) + $transkasi['tunai']), 0, ',', ',') ?>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- <tr>
            <th colspan="2">
                <hr>
            </th>
        </tr> -->
        <tr>
            <td colspan="3" width="290" style="padding:10px;text-align: center; vertical-align: middle;font-size:14px;">
                <?php
                echo $setting['struk'];
                ?>
            </td>
        </tr>
    </table>
</body>

</html>