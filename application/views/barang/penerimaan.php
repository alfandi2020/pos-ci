<style>
    .table th,
    .table td {
        padding: 0rem;
    }
</style>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <br><br>
            <div class="row">
                <div class="col-6">
                    <h4>Penerimaan</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Default </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($this->uri->segment(2) == "add_pb") {
    ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">No. PB</label>
                                    <?php
                                    $date = date('d') . date('m') . date('Y');
                                    $urutan = $this->db->where('tgl_pb', date('Y-m-d'))->get('penerimaan')->num_rows(); ?>
                                    <input type="text" readonly class="form-control no_pb" value="PB-<?= date('d') . date('m') . date('y') . sprintf('%04d', $urutan + 1) ?>">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">Tgl. PB</label>
                                    <input type="date" value="<?= date('Y-m-d') ?>" class="form-control tgl_pb">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">No. Surat Jalan</label>
                                    <input type="text" class="form-control srt_jln">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">Tgl. Surat Jalan</label>
                                    <input type="date" value="<?= date('Y-m-d') ?>" class="form-control tgl_srt_jln">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">No. Faktur Pajak</label>
                                    <input type="text" class="form-control fp">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">Tgl. Faktur Pajak</label>
                                    <input type="date" value="<?= date('Y-m-d') ?>" class="form-control tgl_fp">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">Cara bayar</label>
                                    <select name="" id="" class="form-control c_bayar" onchange="metode_bayar()">
                                        <option value="Tunai">Tunai</option>
                                        <option value="Kredit">Kredit</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">Tempo</label>
                                    <input type="number" class="form-control tempo" readonly value="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">Supplier</label>
                                    <select name="" id="" class="form-control supplier select2" required>
                                        <option value="">Pilih Supplier</option>
                                        <?php
                                        $this->db->where('nama_supplier !=', 'UMUM');
                                        $supplier = $this->db->get('supplier')->result();

                                        foreach ($supplier as $x) { ?>
                                            <option value="<?= $x->kode_supplier ?>"><?= $x->nama_supplier ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <label class="form-label" for="no_mutasi">Type PPN</label>
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="form-check radio radio-secondary"> <!-- non ppn 1, include 2,exclude 3 -->
                                            <input class="form-check-input ppn" id="radio21" type="radio" name="ppn" value="1">
                                            <label class="form-check-label" for="radio21">NonPPN </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check radio radio-secondary">
                                            <input class="form-check-input ppn" checked id="radio22" type="radio" name="ppn" value="2">
                                            <label class="form-check-label" for="radio22">Include PPN </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check radio radio-secondary">
                                            <input class="form-check-input ppn" id="radio24" type="radio" name="ppn" value="3">
                                            <label class="form-check-label" for="radio24">Exclude PPN </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">Keterangan</label>
                                    <textarea name="" class="form-control keterangan" id="" cols="30" rows="2"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-1">
                            <div class="col-6">
                                <div class="mt-3">
                                    <button type="button" id="submitButton" class="btn btn-primary btn-sm">Simpan</button>
                                    <a href="<?= base_url('pembelian') ?>" class="btn btn-warning btn-sm">Kembali</a>
                                </div>
                            </div>
                            <div class="col-6 text-end">

                                <div class="mb-3">
                                    <label class="form-label" for="no_mutasi">Total</label>
                                    <h4 class="total_pb">Rp.0</h4>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table display">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Satuan</th>
                                        <th width="70" scope="col">Qty PB</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th width="70" scope="col">Dis1</th>
                                        <th width="70" scope="col">Dis2</th>
                                        <th width="70" scope="col">Dis.Rp</th>
                                        <th scope="col">Harga Netto</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Gudang</th>
                                        <th width="70" scope="col">Stok awal</th>
                                    </tr>
                                </thead>
                                <tbody id="pb-wrapper">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else if ($this->uri->segment(2) == "histori_pb") {
    ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?= $this->uri->segment(2) == 'approve' ? 'Approve ' . $approve_p['no_pb'] . ' - ' . $approve_p['total_barang'] . ' Barang' : 'List Pembelian ' ?></h4><br>
                        <form action="<?= base_url('pembelian/change_date') ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-2">
                                    <a href="<?= base_url('pembelian/add_pb') ?>" class="btn btn-secondary">Add</a>
                                </div>

                                <div class="col-lg-2">
                                    <!-- <label>Start Date</label> -->
                                    <input type="date" class="form-control" value="<?= $this->session->userdata('date_pembelian') == null ? date('Y-m-d') : $this->session->userdata('date_pembelian') ?>" name="date" onchange="this.form.submit()">
                                </div>
                                -
                                <div class="col-lg-2">
                                    <!-- <label>End Date</label> -->
                                    <input type="date" class="form-control" value="<?= $this->session->userdata('date_pembelian2') == null ? date('Y-m-d') : $this->session->userdata('date_pembelian2') ?>" name="date2" onchange="this.form.submit()">
                                </div>
                                <div class="col-lg-5 text-end">
                                    <a href="<?= base_url('pembelian') ?>" class="btn btn-primary btn-square">Kembali</a>
                                </div>
                            </div>
                            <!-- <div class="row mt-2"> -->
                            <!-- </div> -->
                        </form>
                    </div>
                    <div class="card-body">

                        <?= $this->session->flashdata('message_name') ?>
                        <div class="table-responsive" style="height: 450px;">
                            <table class="display" id="t_barang">
                                <thead>
                                    <tr>
                                        <th width="" scope="col">No.PB</th>
                                        <th width="" scope="col">Tanggal</th>
                                        <th width="" scope="col">No. Surat jalan</th>
                                        <th width="" scope="col">Nama Supplier</th>
                                        <th width="" scope="col">Jumlah</th>
                                        <th width="" scope="col">Jumlah(FC)</th>
                                        <th width="" scope="col">Total penerimaan</th>
                                        <th width="" scope="col">Keterangan</th>
                                        <th width="" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($penerimaan as $x) { ?>
                                        <tr>
                                            <td>
                                                <?= $x->no_pb ?>
                                            </td>
                                            <td>
                                                <?= $x->tgl_pb ?>
                                            </td>
                                            <td>
                                                <?= $x->no_srt_jln ?>
                                            </td>
                                            <td>
                                                <?= $x->nama_supplier ?>
                                            </td>
                                            <td>
                                                <?= $x->total_barang ?>
                                            </td>
                                            <td>
                                                <?= $x->total_barang ?>
                                            </td>
                                            <td class="text-end">
                                                Rp<?= number_format($x->total_penerimaan) ?>
                                            </td>
                                            <td>
                                                <?= $x->keterangan ?>
                                            </td>
                                            <td>
                                                <!-- <button type="button" class="btn btn-primary btn-square" data-bs-toggle="modal" data-original-title="test" data-bs-target="#penerimaan_edit<?= $x->id_penerimaan ?>"><i class="fa fa-edit"></i></button> -->
                                                <button type="button" id="<?= $x->id_penerimaan ?>" class="btn btn-danger btn-square delete_penerimaan"><i class="fa fa-trash-o"></i></button>
                                                <button type="button" class="btn btn-warning btn-square" onclick="location.href='<?= base_url('pembelian/approve/' . $x->id_penerimaan) ?>'"><i class="fa fa-check-square-o"></i></buttpn>

                                            </td>

                                        </tr>
                                        <div class="modal fade bd-example-modal-lg" id="penerimaan_edit<?= $x->id_penerimaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5>Edit penerimaan</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="modal-toggle-wrapper">
                                                            <?= $this->session->flashdata(
                                                                'msg'
                                                            ) ?>
                                                            <form action="<?= base_url('pembelian') ?>" method="post">
                                                                <div class="row">
                                                                    <!-- <div class="modal-img"> <img src="../assets/images/gif/online-shopping.gif" alt="online-shopping"></div> -->
                                                                    <div class="col">
                                                                        <h6>Nama penerimaan</h6>
                                                                        <input type="hidden" value="edit" name="action">
                                                                        <input type="hidden" value="<?= $x->id_penerimaan ?>" name="id_penerimaan">
                                                                        <input required type="text" placeholder="Bungkus" value="" name="penerimaan" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-xl-8"></div>
                                                                    <div class="col-xl-2">
                                                                        <button class="btn bg-primary d-flex align-items-center gap-2 text-light ms-auto" type="submit">Submit</button>
                                                                    </div>
                                                                    <div class="col-xl-2">
                                                                        <button class="btn bg-secondary d-flex align-items-center gap-2 text-light ms-auto" type="button" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <!-- <h4>Up to <strong class="txt-danger">85% OFF</strong>, Hurry Up Online Shopping</h4> -->
                                                            <!-- <p class="text-sm-center">Our difficulty in finding regular clothes that was of great quality, comfortable, and didn't impact the environment given way to Creatures of Habit.</p> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else if ($this->uri->segment(2) == 'approve') {
    ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('pembelian/approve') ?>" method="post">
                            <div class="row">
                                <!-- <div class="col-xl-6 col-sm-6 col-md-8">
                                        <label>Gudang</label>
                                        <input type="hidden" value="approve" name="action">
                                        <input type="hidden" value="<?= $approve_p['id_penerimaan'] ?>" name="id_penerimaan">
                                        <select class="form-control" name="gudang">
                                            <option value="">Pilih Gudang</option>
                                            <?php $gudang = $this->db->get('gudang')->result();
                                            foreach ($gudang as $xx) {
                                                echo "<option value='" . $xx->kode . "'>" . $xx->nama . "</option>";
                                            } ?>
                                        </select>
                                    </div> -->

                                <input type="hidden" value="approve" name="action">
                                <input type="hidden" value="<?= $approve_p['id_penerimaan'] ?>" name="id_penerimaan">
                                <div class="col-xl-6 col-sm-6 col-md-8">
                                    <label>Supplier</label>
                                    <input value="<?= $approve_p['nama_supplier'] ?>" name="supplier" class="form-control" readonly>
                                </div>
                                <div class="col-xl-6 col-sm-6 text-end">
                                    <label for="">Total penerimaan</label>
                                    <h4>Rp<?= number_format($approve_p['total_penerimaan']) ?></h4>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xl-3">
                                    <button type="submit" class="btn btn-primary btn-square">Approve</button>
                                    <a href="<?= base_url('pembelian/histori_pb') ?>" class="btn bg-secondary btn-square">Back</a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="table-responsive">
                                    <table class="display" id="t_barang">
                                        <thead>
                                            <tr>
                                                <th width="400" scope="col">Nama Barang</th>
                                                <th width="80" scope="col">Satuan</th>
                                                <th width="80" scope="col">qty</th>
                                                <th width="80" scope="col">Harga</th>
                                                <th width="80" scope="col">dis1</th>
                                                <th width="80" scope="col">dis2</th>
                                                <th width="80" scope="col">Harga netto</th>
                                                <th width="80" scope="col">Jumlah</th>
                                                <!-- <th width="80" scope="col">gudang</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($penerimaan2 as $x) { ?>
                                                <tr>
                                                    <td>
                                                        <?= $x->nama_barang ?>
                                                    </td>
                                                    <td>
                                                        <?= $x->satuan ?>
                                                    </td>
                                                    <td>
                                                        <?= $x->qty_pb ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($x->harga_satuan, 0, '.', '.') ?>
                                                    </td>
                                                    <td>
                                                        <?= $x->dis1 ?>
                                                    </td>
                                                    <td>
                                                        <?= $x->dis2 ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($x->harga_netto, 0, '.', '.') ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($x->jumlah, 0, '.', '.') ?>
                                                    </td>
                                                    <!-- <td><?= $x->gudang ?></td> -->
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('pembelian/add_pb') ?>" class="btn btn-secondary">Add</a>
                            <!-- <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatStockOpname">Buat baru</button> -->
                            <!-- <a href="<?= base_url('inventori/pending_sop') ?>" class="btn btn-danger btn-sm">Butuh persetujuan</a> -->
                            <a href="<?= base_url('pembelian/histori_pb') ?>" class="btn btn-primary btn-sm">Riwayat penerimaan barang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>


<script>
    var counter = 0;
    $(function() {
        //add row
        $('.select2').select2();
        // var counter = 0;

        function cek_barang() {
            $(".barang" + counter + "").focus();
            var data = "<?= base_url('pos/get_barang') ?>";
            $(".barang" + counter + "").autocomplete({
                source: data,
                select: function(event, ui) {
                    $('.barang' + counter + '').val(ui.item.label);
                    $('.id_pb_list' + counter + '').val(ui.item.description);
                    $('.kd_pb_list' + counter + '').val(ui.item.kode_barang);
                    $.ajax({
                        url: "<?= site_url('pos/search_barang') ?>",
                        method: "POST",
                        data: {
                            id: ui.item.description
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            var satuann = '';
                            if (!data.id_satuan_besar == "") {
                                satuann += '<option value="besar" data-stok=' + data.stok + ' data-hpp-konv=' + data.hpp_konv + '  data-hpp-kecil=' + data.hpp_kecil + '  data-hpp-besar=' + data.hpp_besar + ' data-qty-konv=' + data.qty_konv + '  data-qty-kecil=' + data.qty_kecil + '  data-qty-besar=' + data.qty_besar + '>' + data.id_satuan_besar + '</option>';

                            }
                            if (!data.id_satuan_kecil == "") {
                                satuann += '<option value="kecil" data-stok=' + data.stok + ' data-hpp-konv=' + data.hpp_konv + '  data-hpp-kecil=' + data.hpp_kecil + '  data-hpp-besar=' + data.hpp_besar + ' data-qty-konv=' + data.qty_konv + '  data-qty-kecil=' + data.qty_kecil + '  data-qty-besar=' + data.qty_besar + '>' + data.id_satuan_kecil + '</option>';
                            }
                            if (!data.id_satuan_kecil_konv == "") {
                                satuann += '<option value="konv" data-stok=' + data.stok + ' data-hpp-konv=' + data.hpp_konv + '  data-hpp-kecil=' + data.hpp_kecil + '  data-hpp-besar=' + data.hpp_besar + ' data-qty-konv=' + data.qty_konv + '  data-qty-kecil=' + data.qty_kecil + '  data-qty-besar=' + data.qty_besar + '>' + data.id_satuan_kecil_konv + '</option>';
                            }

                            $('.harga' + counter + '').val(data.hpp_besar.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                            $('.stok_gudang' + counter + '').val(data.stok.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                            $('.satuan' + counter + '').html(satuann);
                            // $('.qty' + counter + '').val("1");


                            // var row = $('#r' + counter);
                            // row.find('.qty' + counter).on('input', function() {
                            //     hitung(this, counter);
                            // });
                            cekStok(counter);
                            updateHarga(counter); // Menambah pemanggilan fungsi untuk meng-update harga
                        }
                    });
                }
            });
        }
        document.onkeyup = function(e) {
            if (e.which == 16) {

                var max_fields = 100;
                var wrapper = $("#pb-wrapper");
                // var add_kom = $("#add-sampel");

                if ($(".barang" + counter + "").val() == "") {
                    swal({
                        title: "Opss..!",
                        text: "Barang sebelumnya harus di isi",
                        icon: "warning",
                        dangerMode: true,
                    }).then((r) => {
                        if (r) {
                            // location.reload();
                            //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                            // swal({
                            //   text : "oke"
                            // })
                            $(".barang" + counter + "").focus();
                        }
                    });
                } else if ($(".harga" + counter + "").val() == "") {
                    swal({
                        title: "Opss..!",
                        text: "stock barang " + $(".barang" + counter + "").val() + " kurang dari batas minimum",
                        icon: "warning",
                        dangerMode: true,
                    }).then((r) => {
                        if (r) {
                            // location.reload();
                            //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                            // swal({
                            //   text : "oke"
                            // })
                            $(".barang" + counter + "").focus();
                        }
                    });
                } else {
                    if (counter < max_fields) {
                        counter++;

                        // $('.harga'+counter).prop('disabled',true)
                        $(wrapper).append(
                            '<tr class="cb" id=r' + counter + '>' +
                            '<td>' +
                            '<button id=' + counter + ' type="button" class="btn btn-danger btn-square delete_item"><i class="icon-trash"></i></button>' +
                            '<td>' +
                            '<input class="form-control barang' + counter + '">' +
                            '<input type="hidden" class="form-control id_pb_list' + counter + '">' +
                            '<input type="hidden" class="form-control kd_pb_list' + counter + '">' +
                            '</td>' +
                            '<td>' +
                            '<select id="ids' + counter + '" class="form-control satuan-select satuan' + counter + '" onchange="updateHarga(' + counter + ')" style="cursor: text;">' +
                            '<option value="">Pilih satuan</option>' +
                            '</select>' +
                            '</td>' +
                            '<td>' +
                            '<input id="idq' + counter + '" type="text" name="qty[]" style="text-align:center;" class="form-control qty' + counter + '">' +
                            '</td>' +
                            '<td>' +
                            '<input type="text" class="form-control uang' + counter + ' harga' + counter + '" name="harga[]" readonly>' +
                            '</td>' +
                            '<td>' +
                            '<input type="text" id="dis1' + counter + '" placeholder="0" style="text-align:center;" class="form-control dis1' + counter + '">' +
                            '</td>' +
                            '<td>' +
                            '<input type="text" id="dis1' + counter + '" placeholder="0" style="text-align:center;" class="form-control dis2' + counter + '">' +
                            '</td>' +
                            '<td>' +
                            '<input type="text" placeholder="0" style="text-align:center;" class="form-control dis_rp' + counter + '">' +
                            '</td>' +
                            '<td>' +
                            '<input type="text" name="netto[]" class="form-control uang' + counter + ' netto' + counter + '">' +
                            '</td>' +
                            '<td>' +
                            '<input type="text" name="jumlah[]" class="form-control uang' + counter + ' jumlah' + counter + '">' +
                            '</td>' +
                            '<td>' +
                            '<select id="idg' + counter + '" class="form-control gudang' + counter + '" style="cursor: text;" onchange="cekStok(' + counter + ')">' +
                            // '<option value="">Pilih gudang</option>' +
                            <?php if (
                                $this->uri->segment(2) == 'add_pb'
                            ) {
                                foreach ($gudang as $x) { ?> '<option value="<?= $x->id ?>"><?= $x->nama ?></option>' +
                            <?php }
                            } ?> '</select>' +
                            // '<input type="text" class="form-control gudang'+counter+'">'+
                            '</td>' +
                            '<td>' +
                            '<input type="hidden" class="form-control stok_gudang' + counter + '">' +
                            '<input type="text" class="form-control stok_awal' + counter + '">' +
                            '</td>' +
                            '</tr>'
                        );
                    }



                    $('.delete_item').click(function() {
                        e.preventDefault();
                        // var total_pos_fix = $('.total_pos').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') - parseInt($(".jumlah"+this.id+"")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                        // $('.total_pos').html("Rp."+total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

                        var child = $(this).closest('tr').nextAll();

                        child.each(function() {

                            // Getting <tr> id.
                            var id = $(this).attr('id');
                            // Getting the <p> inside the .row-index class.
                            var idx = $(this).children('.row-index').children('p');

                            // Gets the row number from <tr> id.
                            var dig = parseInt(id.substring(1));

                            // Modifying row index.
                            idx.html(`Row ${dig - 1}`);

                            // Modifying row id.
                            $(this).attr('id', `r${dig - 1}`);
                            $('.barang' + counter + '').removeClass('barang' + counter + '').addClass('barang' + parseInt(dig - 1) + '');
                            $('.id_pb_list' + counter + '').removeClass('id_pb_list' + counter + '').addClass('id_pb_list' + parseInt(dig - 1) + '');
                            $('.kd_pb_list' + counter + '').removeClass('kd_pb_list' + counter + '').addClass('kd_pb_list' + parseInt(dig - 1) + '');
                            $('.qty' + counter + '').removeClass('qty' + counter + '').addClass('qty' + parseInt(dig - 1) + '');
                            $('.satuan' + counter + '').removeClass('satuan' + counter + '').addClass('satuan' + parseInt(dig - 1) + '');
                            $('.diskon_item' + counter + '').removeClass('diskon_item' + counter + '').addClass('diskon_item' + parseInt(dig - 1) + '');
                            $('.harga' + counter + '').removeClass('harga' + counter + '').addClass('harga' + parseInt(dig - 1) + '');
                            $('.jumlah' + counter + '').removeClass('jumlah' + counter + '').addClass('jumlah' + parseInt(dig - 1) + '');
                            $('.stock' + counter + '').removeClass('stock' + counter + '').addClass('stock' + parseInt(dig - 1) + '');
                            $('.stock-c' + counter + '').removeClass('stock-c' + counter + '').addClass('stock-c' + parseInt(dig - 1) + '');
                            $('#idq' + counter + '').attr("id", "idq" + parseInt(dig - 1) + "");
                            $('#ids' + counter + '').attr("id", "ids" + parseInt(dig - 1) + "");
                            $('#idd' + counter + '').attr("id", "idd" + parseInt(dig - 1) + "");
                            $('button[id=' + counter + ']').attr("id", "" + parseInt(dig - 1) + "");
                        });
                        $(this).closest('tr').remove();
                        // Decreasing total number of rows by 1.
                        counter--;
                        updateTotalPB(counter);
                        // });
                    });
                    $(".uang" + counter + "").keyup(function(e) {
                        $(this).val(format($(this).val()));
                    });
                    var format = function(num) {
                        var str = num.toString().replace("", ""),
                            parts = false,
                            output = [],
                            i = 1,
                            formatted = null;
                        if (str.indexOf(".") > 0) {
                            parts = str.split(".");
                            str = parts[0];
                        }
                        str = str.split("").reverse();
                        for (var j = 0, len = str.length; j < len; j++) {
                            if (str[j] != ",") {
                                output.push(str[j]);
                                if (i % 3 == 0 && j < (len - 1)) {
                                    output.push(",");
                                }
                                i++;
                            }
                        }
                        formatted = output.reverse().join("");
                        return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
                    };
                    cek_barang()

                }
            }
            // else if (e.which == 113) { // submit f2

            //     var barang = ''
            //     var xx = []
            //     for (let i = 1; i <= counter; i++) {
            //         xx.push({ // loop table
            //             id_barang: $('.id_pb_list' + i + '').val(),
            //             nama_barang: $('.barang' + i + '').val(),
            //             qty: $('.qty' + i + '').val(),
            //             satuan: $('.satuan' + i + '').val(),
            //             harga_satuan: $('.harga' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
            //             // diskon_item : $('.diskon_item'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, ''),
            //             netto: $('.netto' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
            //             gudang: $('.gudang' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
            //         })
            //     }

            //     var datax = {
            //         cek: 'submit',
            //         no_pb: $('.no_pb').val(),
            //         tgl_pb: $('.tgl_pb').val(),
            //         // member : $('.member').val(),
            //         supplier: $('.supplier').val(),
            //         srt_jln: $('.srt_jln').val(),
            //         tgl_srt_jln: $('.tgl_srt_jln').val(),
            //         c_bayar: $('.c_bayar').val(),
            //         tempo: $('.tempo').val(),
            //         ppn: $('.ppn').val(),
            //         fp: $('.fp').val(),
            //         tgl_fp: $('.tgl_fp').val(),
            //         keterangan: $('.keterangan').val(),
            //         total_penerimaan: $('.total_pb').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, ''),
            //         // id_transaksi : <?= $this->uri->segment(3) == true ? $this->uri->segment(3) : 0 ?>,
            //         item: xx
            //     }
            //     var supplierVal = $('.supplier').val();
            //     if (supplierVal === "") {
            //         swal({
            //             title: "Peringatan",
            //             text: "Supplier harus diisi",
            //             icon: "warning",
            //         });
            //         return; // Menghentikan proses submit jika supplier belum dipilih
            //     }
            //     if (xx.length == 0) {
            //         swal({
            //             title: "Opss..!",
            //             text: "Barang tidak boleh kosong",
            //             icon: "warning",
            //         });
            //         return;
            //     } else {
            //         $.ajax({
            //             url: "<?= site_url('pembelian/submit_pb') ?>",
            //             method: "POST",
            //             data: datax,
            //             async: true,
            //             dataType: 'json',
            //             success: function(data) {
            //                 if (data == 'berhasil') {
            //                     swal({
            //                         title: "Berhasil..!",
            //                         text: "Penerimaan barang " + $('.no_pb').val() + " berhasil",
            //                         icon: "success",
            //                     }).then((willDelete) => {
            //                         if (willDelete) {
            //                             window.location = '<?= base_url() ?>pembelian/add_pb';
            //                         }
            //                     });
            //                 }
            //             }
            //         })
            //     }
            // }
        }
    });
    // $(document).ready(function() {
    $("#submitButton").on("click", function() {
        submitForm(counter);
    });

    // Function to submit the form
    function submitForm(counter) {
        var barang = '';
        var xx = [];

        for (let i = 1; i <= counter; i++) {
            xx.push({
                id_barang: $('.id_pb_list' + i + '').val(),
                nama_barang: $('.barang' + i + '').val(),
                qty: $('.qty' + i + '').val(),
                satuan: $('.satuan' + i + '').val(),
                harga_satuan: $('.harga' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                netto: $('.netto' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                jumlah: $('.jumlah' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                gudang: $('.gudang' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                stok_awal: $('.stok_awal' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
            });
        }

        var datax = {
            cek: 'submit',
            no_pb: $('.no_pb').val(),
            tgl_pb: $('.tgl_pb').val(),
            supplier: $('.supplier').val(),
            srt_jln: $('.srt_jln').val(),
            tgl_srt_jln: $('.tgl_srt_jln').val(),
            c_bayar: $('.c_bayar').val(),
            tempo: $('.tempo').val(),
            ppn: $('.ppn').val(),
            fp: $('.fp').val(),
            tgl_fp: $('.tgl_fp').val(),
            keterangan: $('.keterangan').val(),
            total_penerimaan: $('.total_pb').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, ''),
            item: xx
        };

        var supplierVal = $('.supplier').val();
        var suratJalanVal = $('.srt_jln').val();

        if (suratJalanVal === "") {
            swal({
                title: "Peringatan",
                text: "Surat jalan harus diisi",
                icon: "warning",
            });
            return; // Menghentikan proses submit jika supplier belum dipilih
        }

        if (supplierVal === "") {
            swal({
                title: "Peringatan",
                text: "Supplier harus diisi",
                icon: "warning",
            });
            return; // Menghentikan proses submit jika supplier belum dipilih
        }

        if (xx.length == 0) {
            swal({
                title: "Opss..!",
                text: "Barang tidak boleh kosong",
                icon: "warning",
            });
            return;
        }

        $.ajax({
            url: "<?= site_url('pembelian/submit_pb') ?>",
            method: "POST",
            data: datax,
            async: true,
            dataType: 'json',
            success: function(data) {
                if (data == 'berhasil') {
                    swal({
                        title: "Berhasil..!",
                        text: "Penerimaan barang " + $('.no_pb').val() + " berhasil",
                        icon: "success",
                    }).then((willDelete) => {
                        if (willDelete) {
                            window.location = '<?= base_url() ?>pembelian/add_pb';
                        }
                    });
                } else {
                    swal({
                        title: "Gagal",
                        text: data,
                        icon: "success",
                    }).then((willDelete) => {
                        if (willDelete) {
                            window.location = '<?= base_url() ?>pembelian/add_pb';
                        }
                    });
                }
            }
        });
    }
    // });

    function cekStok(counter) {
        // Ambil nilai kd_pb_list dan id_gudang
        var kd_pb_list = $('.kd_pb_list' + counter).val();
        var id_gudang = $('#idg' + counter).val();

        // Pastikan kd_pb_list dan id_gudang tidak kosong
        if (kd_pb_list && id_gudang) {
            // Lakukan permintaan AJAX ke server
            $.ajax({
                url: "<?= site_url('pembelian/search_barang') ?>",
                type: 'POST',
                data: {
                    kode_barang: kd_pb_list,
                    id_gudang: id_gudang
                },
                success: function(response) {
                    // Handle respons dari server
                    // Response dapat berisi data stok yang kemudian ditampilkan pada kolom stok_awal

                    var responseData = JSON.parse(response);
                    var stok;
                    if (responseData !== null) {
                        stok = responseData.stok;
                    } else {
                        stok = 0;
                    }
                    // Sekarang Anda dapat mengakses propertinya
                    $('.stok_gudang' + counter).val(stok);

                    // Setelah menerima respons stok, panggil fungsi updateHarga
                    updateHarga(counter);
                },
                error: function(error) {
                    console.error('Error fetching stok data:', error);
                }
            });
        }
    }

    function updateHarga(counter) {
        var row = $('#r' + counter);
        var selectedOption = row.find('.satuan' + counter).find(':selected').val();
        var hppKonv = row.find('.satuan' + counter).find(':selected').data('hpp-konv');
        var hppKecil = row.find('.satuan' + counter).find(':selected').data('hpp-kecil');
        var hppBesar = row.find('.satuan' + counter).find(':selected').data('hpp-besar');
        var qtyKonv = row.find('.satuan' + counter).find(':selected').data('qty-konv');
        var qtyKecil = row.find('.satuan' + counter).find(':selected').data('qty-kecil');
        var qtyBesar = row.find('.satuan' + counter).find(':selected').data('qty-besar');
        var stok = row.find('.stok_gudang' + counter).val(); // Ambil nilai stok_gudang dari input
        var qty = row.find('.qty' + counter).val(); // Ambil nilai stok_gudang dari input

        var jumlah;
        var harga;

        switch (selectedOption) {
            case "konv":
                jumlah = stok;
                harga = hppKonv;
                break;
            case "kecil":
                if (qtyKonv) {
                    jumlah = Math.floor(stok / qtyKonv);
                    harga = hppKecil;
                } else {
                    jumlah = stok;
                    harga = hppKecil;
                }
                break;
            case "besar":
                if (qtyKecil && qtyKonv) {
                    jumlah = Math.floor(stok / qtyKecil / qtyKonv);
                    harga = hppBesar;
                } else if (qtyKecil && !qtyKonv) {
                    jumlah = Math.floor(stok / qtyKecil);
                    harga = hppBesar;
                } else if (!qtyKecil && !qtyKonv) {
                    jumlah = Math.floor(stok / qtyBesar);
                    harga = hppBesar;
                }
                break;
        }
        var total;
        if (qty) {
            total = harga * qty;
        } else {
            total = harga;
        }

        row.find('[name="harga[]"]').val(harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
        row.find('[name="netto[]"]').val(harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
        row.find('[name="jumlah[]"]').val(total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
        row.find('.stok_awal' + counter).val(jumlah); // Tampilkan jumlah ke dalam input .qty
        row.find('.qty' + counter).on('input', function() {
            hitung(this, counter);
        });

        updateTotalPB(counter);
        // cekStok(counter);
    }

    function updateTotalPB(counter) {

        var total_pos_fix = 0;
        for (let t = 1; t <= counter; t++) {
            total_pos_fix += parseInt($(".jumlah" + t + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
        }
        $('.total_pb').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    }

    function hitung(input, counter) {
        var row = $(input).closest('tr');
        var qty = parseInt(row.find('[name="qty[]"]').val()) || 0; // Mengambil nilai qty, default ke 0 jika input tidak valid
        var harga = parseInt(row.find('[name="harga[]"]').val().replace(/[^a-zA-Z0-9 ]/g, '')) || 0; // Mengambil nilai harga, default ke 0 jika input tidak valid

        // Memeriksa apakah nilai harga telah didefinisikan sebelum mencoba replace
        if (isNaN(harga)) {
            // Menghitung jumlah dan memasukkan hasil ke input jumlah
            harga = 0;
        }
        console.log(qty, harga)
        var jumlah = qty * harga;
        row.find('[name="jumlah[]"]').val(jumlah.toLocaleString());

        updateTotalPB(counter);
    }

    function metode_bayar() {
        var metodeBayarSelect = document.querySelector('.c_bayar');
        var tempoInput = document.querySelector('.tempo');

        if (metodeBayarSelect.value === 'Kredit') {
            // Jika opsi "Kredit" dipilih, buat input tempo tidak readonly dan kosongkan nilainya
            tempoInput.readOnly = false;
            tempoInput.value = '';
        } else {
            // Jika opsi selain "Kredit" dipilih, buat input tempo menjadi readonly dan beri nilai 0
            tempoInput.readOnly = true;
            tempoInput.value = '0';
        }
    }
</script>