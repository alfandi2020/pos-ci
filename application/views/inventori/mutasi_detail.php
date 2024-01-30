<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .table th,
    .table td {
        padding: 0.3rem;
    }
</style>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Mutasi gudang</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('inventori/mutasi') ?>">Mutasi gudang</a>
                        </li>
                        <li class="breadcrumb-item">
                            <?= $mutasi['no_mutasi'] ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <!-- <div class="card-body" style="padding: 10px !important"> -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message_name') ?>
                        <!-- <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatStockOpname">Buat baru</button> -->
                        <div class="row">
                            <div class="col-12 text-end">
                                <a href="<?= base_url('inventori/mutasi_barang') ?>" class="btn btn-primary btn-sm">Kembali</a>
                                <?php
                                if ($this->session->userdata('username') == "admin" or $this->session->userdata('username') == "adin") {
                                ?>
                                    <a href="<?= base_url('inventori/mutasi_approve_all/' . $mutasi['id']) ?>" class="btn btn-primary btn-sm btn-process">Setujui semua</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="hidden" name="no_urut" id="no_urut" class="form-control" value="<?= $mutasi['no_urut'] ?>">
                                    <label class="form-label" for="no_mutasi">No. Mutasi gudang</label>
                                    <input class="form-control" id="no_mutasi" name="no_mutasi" type="text" value="<?= $mutasi['no_mutasi'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="Tanggal">Tanggal</label>
                                    <input type="date" name="tanggal_mutasi" id="tanggal_mutasi" class="form-control" value="<?= $mutasi['tanggal_mutasi'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="padding: 10px !important; min-width: 0px !important;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama barang</th>
                                    <th>Stok Awal</th>
                                    <th>Jumlah mutasi</th>
                                    <th>Stok ditambahkan</th>
                                    <th>Status</th>
                                    <th>Act.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $no_mutasi = $mutasi['no_mutasi'];
                                foreach ($list as $l) :
                                    $barang_detail = $this->db->select('nama, id_satuan_kecil_konv, id_satuan_kecil, id_satuan_besar, qty_konv, qty_kecil, qty_besar')->where('id', $l->id_barang)->get('barang')->row_array();
                                    $status = $l->status_mutasi;

                                    $satuan = $l->satuan;
                                    $jumlah = $l->jumlah;

                                    // if ($satuan == "konv") {
                                    //     $ket_satuan = $barang_detail['id_satuan_kecil_konv'];
                                    //     $stok = $jumlah * $barang_detail['qty_konv'];
                                    // } else if ($satuan == "kecil") {
                                    //     $ket_satuan = $barang_detail['id_satuan_kecil'];
                                    //     $stok = $jumlah * $barang_detail['qty_kecil'];
                                    // } else if ($satuan == "besar") {
                                    //     $ket_satuan = $barang_detail['id_satuan_besar'];
                                    //     $stok = $jumlah * $barang_detail['qty_besar'];
                                    // }

                                    if ($satuan == "konv") {
                                        $stok = $jumlah;
                                        $ket_satuan = $barang_detail['id_satuan_kecil_konv'];
                                    } else if ($satuan == "kecil" && $barang_detail['qty_konv']) {
                                        $stok = $jumlah * $barang_detail['qty_kecil'];
                                        $ket_satuan = $barang_detail['id_satuan_kecil'];
                                    } else if ($satuan == "kecil" && !$barang_detail['qty_konv']) {
                                        $stok = $jumlah;
                                        $ket_satuan = $barang_detail['id_satuan_kecil'];
                                    } else if ($satuan == "besar" && $barang_detail['qty_kecil'] && $barang_detail['qty_konv']) {
                                        $stok = $jumlah * $barang_detail['qty_kecil'] * $qty_besar;
                                        $ket_satuan = $barang_detail['id_satuan_besar'];
                                    } else if ($satuan == "besar" && $barang_detail['qty_kecil'] && !$barang_detail['qty_konv']) {
                                        $stok = $jumlah * $barang_detail['qty_kecil'];
                                        $ket_satuan = $barang_detail['id_satuan_besar'];
                                    } else if ($satuan == "besar" && !$barang_detail['qty_kecil'] && !$barang_detail['qty_konv']) {
                                        $stok = $jumlah;
                                        $ket_satuan = $barang_detail['id_satuan_besar'];
                                    }

                                    if ($status == 0) {
                                        $ket = "Belum disetujui";
                                    } else {
                                        $ket = "Sudah disetujui";
                                    } ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $barang_detail['nama'] ?></td>
                                        <td><?= $l->stok ?> <?= $ket_satuan ?></td>
                                        <td><?= $jumlah ?> <?= $ket_satuan ?></td>
                                        <td><?= $stok ?></td>
                                        <td><?= $ket ?></td>
                                        <td>
                                            <!-- <a href='<?= base_url("inventori/delete_detail_mutasi/$no_mutasi/$l->Id") ?>' class="btn btn-danger btn-sm btn-delete" data-bs-toggle="tooltip" title="Hapus <?= $barang_detail['nama'] ?>">&times;</a> -->
                                            <a href='<?= base_url("inventori/delete_detail_mutasi/$no_mutasi/$l->Id") ?>' class="btn btn-sm btn-delete <?= ($status == '1') ? 'btn-success disabled' : 'btn-danger' ?>" data-bs-toggle="tooltip" title="Hapus <?= $barang_detail['nama'] ?>">
                                                <i class="fa fa-<?= ($status == '1') ? 'thumbs-up' : 'times' ?>"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                <!-- <form action="<?= base_url('inventori/add_detail_mutasi') ?>" method="post">
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td style="width: 200px;">
                                            <input type="hidden" name="id_mutasi" value="<?= $mutasi['id'] ?>">
                                            <input type="hidden" name="no_mutasi" value="<?= $mutasi['no_mutasi'] ?>">
                                            <select name="barang" id="barang" class="form-select input-air-primary digits select2" onchange="showBarangDetail()" required>
                                                <option value="">--</option>
                                                <?php
                                                foreach ($barang as $b) {
                                                ?>
                                                    <option value="<?= $b->id ?>"><?= $b->nama ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="satuan" id="satuan" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="qty_sistem" id="qty_sistem" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="qty_fisik" id="qty_fisik" oninput="hitung()">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="selisih" id="selisih" readonly>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-light btn-sm">&plus;</button>
                                        </td>
                                    </tr>
                                </form> -->
                            </tbody>
                        </table>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.select2').select2();
</script>
<script>
    function showBarangDetail() {
        // Pastikan barangId tidak kosong
        var barangId = document.getElementById('barang').value;

        if (barangId) {
            // Lakukan pengambilan detail barang berdasarkan ID barang
            $.ajax({
                type: 'POST',
                url: '<?= base_url('inventori/getbarangdetail') ?>',
                data: {
                    barang_id: barangId
                },
                success: function(detailData) {
                    // Tampilkan detail barang ke dalam elemen HTML yang sesuai
                    var barangDetail = JSON.parse(detailData);

                    $('#satuan').val(barangDetail.id_satuan_kecil);
                    $('#qty_sistem').val(barangDetail.stok);
                }
            });
        } else {
            // Barang tidak dipilih, atur kembali elemen HTML menjadi kosong atau nilai default
            $('#satuan').val('');
            $('#qty_sistem').val('');
        }
    }


    function hitung() {
        var qty_sistem = document.getElementById('qty_sistem').value;
        var qty_fisik = document.getElementById('qty_fisik').value;

        var hitungSelisih = Number(qty_fisik) - Number(qty_sistem);

        document.getElementById('selisih').value = hitungSelisih;
    }


    // jquery tolong carikan btn-delete yang ketika diklik jalankan fungsi berikut ini
    $(".btn-delete").on("click", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");

        console.log(href);
        Swal.fire({
            title: "Anda yakin?",
            // text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    });
    $(".btn-process").on("click", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");

        console.log(href);
        Swal.fire({
            title: "Anda yakin?",
            // text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Setujui!",
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    });
</script>