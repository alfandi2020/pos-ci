<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Transaksi per item</h4>
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
                            <a href="<?= base_url('inventori') ?>">Inventori</a>
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
                        <!-- <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatStockkoreksi">Buat baru</button> -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <h4><?= $lists[0]->nama_barang ?></h4>
                            </div>
                            <div class="col-6 text-end">
                                <div class="btn-group">
                                    <a href="<?= base_url('inventori') ?>" class="btn btn-primary btn-sm">Kembali</a>
                                    <form action="<?= base_url('inventori/transaksi_item') ?>" method="post">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit" data-toggle="tooltip" title="Cetak Excel" value="cetak_excel" style="margin-left: 5px;">Cetak excel</button>
                                        <input type="hidden" class="form-control" name="item_barang" value="<?= $this->input->post('item_barang') ?>">
                                        <input type="hidden" class="form-control" name="tanggal_dari" value="<?= $this->input->post('tanggal_dari') ?>">
                                        <input type="hidden" class="form-control" name="tanggal_sampai" value="<?= $this->input->post('tanggal_sampai') ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Asal</th>
                                        <th>No. Transaksi</th>
                                        <th>Customer</th>
                                        <th>Stok awal</th>
                                        <th>Satuan</th>
                                        <th>Qty</th>
                                        <th>Tanggal</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($lists as $l) :

                                        if ($l->source == "Transaksi") {
                                            $satuan_nama = $l->satuan_nama;
                                        } else {
                                            $satuan = $this->db->select('id_satuan_' . $l->satuan_nama . ' as satuan_baru')->where('id', $l->id_barang)->get('barang')->row_array();

                                            $satuan_nama = $satuan['satuan_baru'];
                                        }

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= strtoupper($l->source) ?></td>
                                            <td><?= $l->nomor ?></td>
                                            <td><?= $l->customer ?></td>
                                            <td><?= $l->stok_awal ?></td>
                                            <td><?= $satuan_nama ?></td>
                                            <td><?= $l->qty ?></td>
                                            <td><?= format_indo2($l->date_created) ?></td>
                                            <td><?= $l->kasir ?></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
</script>