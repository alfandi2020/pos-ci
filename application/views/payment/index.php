<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    td.no-pad {
        padding: 0rem;
    }
</style>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Pembayaran</h4>
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
                        <li class="breadcrumb-item">Pembayaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($this->input->post()) {
    ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="<?= base_url('payment/buat_transaksi') ?>" method="post">
                            <input type="hidden" name="no_urut" value="<?= $this->input->post('no_urut') ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="no_bukti">No. Bukti</label>
                                            <input class="form-control" id="no_bukti" name="no_bukti" type="text" value="<?= $no_bukti ?>" required>
                                            <input type="hidden" name="no_urut" value="<?= $no_urut ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="tgl_bukti">Tgl. Bukti</label>
                                            <input class="form-control" id="tgl_bukti" name="tgl_bukti" type="date" value="<?= date('Y-m-d') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="Tanggal">Supplier</label>
                                            <select name="supplier" id="supplier" class="form-select input-air-primary digits select2" required>
                                                <option value="">--</option>
                                                <?php
                                                foreach ($suppliers as $g) {
                                                ?>
                                                    <option <?= ($this->input->post('supplier') == $g->kode_supplier ? "selected" : "") ?> value="<?= $g->kode_supplier ?>"><?= $g->nama_supplier ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <label for="debit_kredit" class="form-label">Debit/Kredit</label>
                                            <select name="debit_kredit" id="debit_kredit" class="form-select input-air-primary digits">
                                                <option value="">--Pilih debit/kredit</option>
                                                <option value="debit">Debit</option>
                                                <option value="kredit">Kredit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-3">
                                        <div class="mb-3">
                                            <label for="nominal" class="form-label">Nominal</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                                <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal" aria-describedby="basic-addon1" value="0">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <label for="kode_akun" class="form-label">Kode akun (Kredit)</label>
                                            <select name="kode_akun" id="kode_akun" class="form-select input-air-primary digits select2">
                                                <option value="">--Pilih kode akun</option>
                                                <option value="1111">1111</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="nama_akun" class="form-label">Nama akun (Kredit)</label>
                                            <select name="nama_akun" id="nama_akun" class="form-select input-air-primary digits select2">
                                                <option value="">--Pilih nama akun</option>
                                                <option value="kas_harian">Kas harian</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="Keterangan" class="form-label">Keterangan</label>
                                            <textarea name="keterangan" id="keterangan" cols="30" rows="2" class="form-control" required><?= $this->input->post('keterangan') ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end ">
                                        <div class="mt-5">
                                            <a href="<?= base_url('payment') ?>" class="btn btn-warning btn-sm">Kembali</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No. Pembelian</th>
                                                <th>Tgl. Pembelian</th>
                                                <th>Tgl. Jatuh tempo</th>
                                                <th>Sisa hutang</th>
                                                <th>Pilih
                                                    <!-- <input class="form-check-input" id="checkAllCheckbox" type="checkbox"> -->
                                                </th>
                                                <th>Jml yang dibayar</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($penerimaan as $p) {
                                            ?>
                                                <tr>
                                                    <td><?= $p->no_pb ?> </td>
                                                    <td><?= $p->tgl_pb ?> </td>
                                                    <td><?= $p->tgl_pb ?> </td>
                                                    <td class="text-end"><?= number_format($p->total_penerimaan) ?> </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck<?= $p->id_penerimaan ?>" name="pilih[]" data-id="<?= $p->id_penerimaan ?>" value="<?= $p->id_penerimaan ?>">
                                                        <!-- <input type="hidden" name="nominal_penerimaan" id="nominal_penerimaan" value="<?= $p->total_penerimaan ?>"> -->
                                                    </td>
                                                    <td class="text-end no-pad">
                                                        <input type="text" class="form-control" name="nominal_bayar[]" disabled>
                                                    </td>
                                                    <td><?= $p->keterangan ?> </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <?= $this->session->flashdata('message_name') ?>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatPembayaran">Buat baru</button>
                                    <a href="<?= base_url('inventori/histori_koreksi') ?>" class="btn btn-primary btn-sm">Riwayat koreksi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="modal fade" id="buatPembayaran" tabindex="-1" role="dialog" aria-labelledby="buatPembayaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buatPembayaranLongTitle">Buat Pembayaran Hutang</h5>
                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('payment') ?>" method="post" class="form theme-form dark-inputs" id="barangForm">
                <div class="modal-body">
                    <!-- <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <input type="hidden" name="no_urut" id="no_urut" class="form-control" value="<?= $no_urut ?>">
                                <label for="No. Koreksi" class="form-label">No. Bukti</label>
                                <input type="text" class="form-control" name="no_bukti" id="no_bukti" value="<?= $no_bukti ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="Tanggal">Tanggal</label>
                                <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">

                        <div class="mb-3">
                            <label class="form-label" for="Tanggal">Supplier</label>
                            <select name="supplier" id="supplier" class="form-select input-air-primary digits select2" required>
                                <option value="">--</option>
                                <?php
                                foreach ($suppliers as $g) {
                                ?>
                                    <option value="<?= $g->kode_supplier ?>"><?= $g->nama_supplier ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="debit_kredit" class="form-label">Debit/Kredit</label>
                                <select name="debit_kredit" id="debit_kredit" class="form-select input-air-primary digits select2">
                                    <option value="">--Pilih debit/kredit</option>
                                    <option value="debit">Debit</option>
                                    <option value="kredit">Kredit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nominal" class="form-label">Nominal</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="kode_akun" class="form-label">Kode akun (Kredit)</label>
                                <select name="kode_akun" id="kode_akun" class="form-select input-air-primary digits select2">
                                    <option value="">--Pilih kode akun</option>
                                    <option value="1111">1111</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nama_akun" class="form-label">Nama akun (Kredit)</label>
                                <select name="nama_akun" id="nama_akun" class="form-select input-air-primary digits select2">
                                    <option value="">--Pilih nama akun</option>
                                    <option value="kas_harian">Kas harian</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="Keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-12 text-end">
                            <div class="">
                                <label for="submit" class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Simpan" value="proses">Buat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.select2').select2();
    $('#supplier').select2({
        dropdownParent: $('#buatPembayaran')
    });
    $(document).ready(function() {
        // Ketika kotak centang berubah
        $('input[name="pilih[]"]').on('change', function() { // Periksa apakah kotak centang dicentang atau tidak
            if ($(this).prop('checked')) {
                // Jika dicentang, maka aktifkan input "nominal_bayar" terkait
                $(this).closest('tr').find('input[name="nominal_bayar[]"]').prop('disabled', false);
            } else {
                // Jika tidak dicentang, maka nonaktifkan input "nominal_bayar" terkait dan atur nilainya ke kosong
                $(this).closest('tr').find('input[name="nominal_bayar[]"]').prop('disabled', true).val('');
            }
            // hitungTotalNominal();
        });

        // Tambahkan event listener untuk checkAllCheckbox
        // $('#checkAllCheckbox').on('change', function() {
        //     // Periksa apakah checkAllCheckbox dicentang atau tidak
        //     var isChecked = $(this).prop('checked');
        //     // Ubah status kotak centang lainnya sesuai dengan checkAllCheckbox
        //     $('input[name="pilih[]"]').prop('checked', isChecked);
        //     // Hitung total nominal jika checkAllCheckbox dicentang
        //     if (isChecked) {
        //         hitungTotalNominal();
        //     } else {
        //         // Bersihkan nilai input nominal jika checkAllCheckbox tidak dicentang
        //         nol = 0;
        //         $('#nominal').val(nol);
        //     }
        // });

        // Fungsi untuk menghitung total nominal dan memperbarui input nominal
        // function hitungTotalNominal() {
        //     var totalNominal = 0;
        //     // Iterasi setiap kotak centang yang diceklis
        //     $('input[name="pilih[]"]:checked').each(function() {
        //         // Ambil nilai nominal_penerimaan dari baris terkait
        //         var nominalPenerimaan = $(this).closest('tr').find('input[name="nominal_bayar"]').val();
        //         // Jika nilai nominal_penerimaan adalah angka yang valid, tambahkan ke totalNominal
        //         if (!isNaN(nominalPenerimaan) && nominalPenerimaan !== '') {
        //             totalNominal += parseFloat(nominalPenerimaan);
        //         }
        //     });
        //     // Perbarui nilai input nominal dengan totalNominal
        //     // $('#nominal').val(totalNominal);
        //     $('#nominal').val(totalNominal.toLocaleString('id-ID'));
        // }

        $('input[name="nominal_bayar[]"]').on('input', function() {
            // Hapus karakter non-angka dari nilai input
            var sanitizedValue = $(this).val().replace(/[^0-9]/g, '');
            // Jika nilai input tidak kosong, format nilai input menggunakan localeString untuk bahasa Indonesia
            if (sanitizedValue !== '') {
                var formattedValue = parseInt(sanitizedValue).toLocaleString('id-ID');
                // Perbarui nilai input dengan nilai yang diformat
                $(this).val(formattedValue);
            }
        });
    });
</script>