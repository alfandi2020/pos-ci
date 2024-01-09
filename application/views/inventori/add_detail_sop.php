<link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
<div class="page-body">

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Stock opname <?= $no_stock_opname ?></h4>
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
                        <li class="breadcrumb-item">Stok opname</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <form action="<?= base_url('inventori/add_detail_sop') ?>" method="post">
                        <input type="hidden" name="no_urut" value="<?= $no_urut ?>">
                        <div class="card-body">
                            <?= $this->session->flashdata('message_name') ?>
                            <!-- <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#buatStockOpname">Buat baru</button> -->
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_sop">No. Stock Opname</label>
                                        <input class="form-control" id="no_sop" name="no_sop" type="text" value="<?= $no_stock_opname ?>" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_sop">Gudang</label>

                                        <select name="gudang" id="gudang" class="form-select input-air-primary digits" onchange="getBarang()" required>
                                            <option value="">--</option>
                                            <?php
                                            foreach ($gudang2 as $g) {
                                            ?>
                                                <option <?= ($g->id == $id_gudang) ? 'selected' : '' ?> value="<?= $g->id ?>">(<?= $g->kode ?>) <?= $g->nama ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="Tanggal">Tanggal</label>
                                        <input type="date" name="tanggal_sop" id="tanggal_sop" class="form-control" value="<?= $tanggal_opname ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" cols="30" rows="2" class="form-control"><?= $keterangan ?></textarea>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary btn-sm mt-5">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="stock-opname">
                                    <thead>
                                        <tr>
                                            <th>Nama barang</th>
                                            <th>Satuan</th>
                                            <th>Stok Sistem</th>
                                            <th>Stok Aktual</th>
                                            <th>Selisih</th>
                                            <th>Act.</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sample-wrapper">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // $(document).ready(function() {
    var counter = 0;
    <?php

    $barangOptions = [];
    foreach ($barang as $b) {
        $barangOptions[] = [
            'id' => $b->id,
            'label' => $b->nama,
            'satuan' => $b->id_satuan_kecil,
            'stok' => $b->stok,
        ];
    }
    ?>

    var optionsBarang = <?php echo json_encode($barangOptions); ?>;

    function showBarangDetail(element) {
        // var barangId = $(element).val();
        var barangId = $(element).closest('tr').find('.id_barang' + counter + '').val();

        if (barangId) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('inventori/getbarangdetail') ?>',
                data: {
                    barang_id: barangId
                },
                success: function(detailData) {
                    var barangDetail = JSON.parse(detailData);
                    // console.log(barangDetail.id_satuan_kecil);
                    var row = $(element).closest('tr');
                    row.find('[name="satuan' + counter + '"]').val(barangDetail.id_satuan_kecil);
                    row.find('[name="qty_sistem' + counter + '"]').val(barangDetail.stok);
                }
            });
        } else {
            var row = $(element).closest('tr');
            row.find('[name="satuan' + counter + '"]').val('');
            row.find('[name="qty_sistem' + counter + '"]').val('');
        }
    }

    function hitung(element) {
        var row = $(element).closest('tr');
        var qty_sistem = row.find('[name="qty_sistem[]"]').val();
        var qty_fisik = row.find('[name="qty_fisik[]"]').val();
        var selisih = Number(qty_fisik) - Number(qty_sistem);
        row.find('[name="selisih[]"]').val(selisih);
    }

    // });

    function check_pos() {
        $(".barang" + counter + "").focus();
        $(".barang" + counter + "").autocomplete({
            source: function(request, response) {
                var term = request.term.toLowerCase();
                var matchingItems = $.grep(optionsBarang, function(item) {
                    return item.label.toLowerCase().indexOf(term) !== -1;
                });
                response(matchingItems);
            },
            select: function(event, ui) {
                // console.log(ui);
                $('.barang' + counter + '').val(ui.item.nama);
                $('.id_barang' + counter + '').val(ui.item.id);
                $('.satuan' + counter + '').val(ui.item.satuan);
                $('.qty_sistem' + counter + '').val(ui.item.stok);
                // Additional logic if needed
                // showBarangDetail('.barang' + counter);
            }
        })
    }
    document.onkeyup = function(e) {
        if (e.which == 16) {
            var max_fields = 5;
            var wrapper = $("#sample-wrapper");

            if ($(".barang" + counter + "").val() == "") {
                swal({
                    title: "Opss..!",
                    text: "Harap isi dulu row sebelumnya",
                    icon: "warning",
                    dangerMode: true,
                }).then((r) => {
                    if (r) {
                        $(".barang" + counter + "").focus();
                    }
                });
            } else {
                if (counter < max_fields) {
                    counter++;
                    $(wrapper).append(
                        '<tr id=r' + counter + '>' +
                        '<td style="width: 200px;">' +
                        '<input class="form-control barang' + counter + '">' +
                        '<input type="hidden" class="form-control id_barang' + counter + '" name="id_barang[]">' +
                        '</td>' +
                        '<td>' +
                        '<input type="text" class="form-control satuan' + counter + '" name="satuan[]" id="satuan[]" readonly>' +
                        '</td>' +
                        '<td>' +
                        '<input type="text" class="form-control qty_sistem' + counter + '" name="qty_sistem[]" id="qty_sistem[]" readonly>' +
                        '</td>' +
                        '<td>' +
                        '<input type="number" class="form-control" name="qty_fisik[]" id="qty_fisik[" oninput="hitung(this)">' +
                        '</td>' +
                        '<td>' +
                        '<input type="number" class="form-control" name="selisih[]" id="selisih[]" readonly>' +
                        '</td>' +
                        '<td>' +
                        '<button id=' + counter + ' type="button" class="btn btn-danger btn-square delete_item"><i class="icon-trash"></i></button>' +
                        '<td>' +
                        '</tr>'
                    );
                    $('.select2').select2();
                }
                check_pos();
            }
        }
    }
    $(document).on('click', '.delete_item', function(e) {
        e.preventDefault();

        var rowId = $(this).attr('id');

        // Hapus baris dengan id yang sesuai
        $('#r' + rowId).remove();

        // Perbarui counter jika diperlukan
        if (counter > 1) {
            counter--;
        }

        // Lakukan penanganan lainnya jika diperlukan
        check_pos();
    });

    $(".btn-delete").on("click", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");
        Swal.fire({
            title: "Anda yakin?",
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
</script>