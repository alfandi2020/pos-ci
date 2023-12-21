<?= $this->session->flashdata('new_tab') ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
/* .table-sm th {
        padding: 0.2rem;
    } */

.table-sm td {
    padding: 0.5rem;
}

input.nominal {
    width: 100px;
}
.input-error{
  outline: 1px solid red;
}
</style>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Keuangan</h4>
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
                        <li class="breadcrumb-item">Keuangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs border-tab border-0 mb-0 nav-primary" id="topline-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active nav-border pt-0 txt-primary nav-primary"
                                    id="topline-top-user-tab" data-bs-toggle="tab" href="#topline-top-user" role="tab"
                                    aria-controls="topline-top-user" aria-selected="true"><i
                                        class="icofont icofont-file-text"></i>Input Data</a></li>
                            <li class="nav-item"><a class="nav-link nav-border txt-primary nav-primary"
                                    id="topline-top-description-tab" data-bs-toggle="tab"
                                    href="#topline-top-description" role="tab" aria-controls="topline-top-description"
                                    aria-selected="false"><i class="icofont icofont-file-document"></i>List
                                    Transaksi</a></li>
                        </ul><br>
                        <?= $this->session->flashdata('message_name') ?>
                        <div class="tab-content" id="topline-tabContent">
                            <div class="tab-pane fade show active" id="topline-top-user" role="tabpanel"
                                aria-labelledby="topline-top-user-tab">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label>No Bukti</label>
                                        <input type="text" value="PBT-<?= date('y'). date('m') . '-'   ?>" class="form-control no_bukti">
                                        <input type="hidden" class="form-control row_piutang">
                                    </div>
                                    <div class="col-xl-4">
                                        <label>D/K</label>
                                        <input type="text" class="form-control dk"> <!--debit atau kredit -->
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-xl-4">
                                        <label>Tgl Bukti</label>
                                        <input type="date" class="form-control tgl_bukti">
                                    </div>
                                    <div class="col-xl-4">
                                        <label>Kode Akun</label>
                                        <input type="text" class="form-control kd_akun">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-xl-4">
                                        <label>Pelanggan</label>
                                        <select class="form-control plg select2">
                                            <option>Pilih Pelanggan</option>
                                            <?php foreach ($pelanggan as $x) { ?>
                                                <option value="<?= $x->id_customer ?>"><?= $x->nama_toko ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-4">
                                
                                        <label>Nama Akun</label>
                                           <select class="form-control select2 nama_akun">
                                            <option>Pilih Akun</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-xl-4">
                                                <label>Salesman</label>
                                                <input type="text" class="form-control salesman">
                                    </div>
                                    <div class="col-xl-4">
                                                <label>Keterangan</label>
                                                <input type="text" class="form-control keterangan">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-xl-4">
                                                <label>Pembayaran</label>
                                            <div class="form-check-size">
                                            <div class="form-check form-check-inline radio radio-primary">
                                                <input class="form-check-input" id="radioinline1" type="radio" name="radio5" value="Tunai" checked="">
                                                <label class="form-check-label mb-0" for="radioinline1">Tunai</label>
                                            </div>
                                            <div class="form-check form-check-inline radio radio-primary">
                                                <input class="form-check-input" id="radioinline2" type="radio" name="radio5" value="Transfer">
                                                <label class="form-check-label mb-0" for="radioinline2">Transfer</label>
                                            </div>
                                            <div class="form-check form-check-inline radio radio-primary">
                                                <input class="form-check-input" id="radioinline3" type="radio" name="radio5" value="Giro">
                                                <label class="form-check-label mb-0" for="radioinline3">Giro</label>
                                            </div>
                                            <div class="form-check form-check-inline radio radio-primary">
                                                <input class="form-check-input" id="radioinline4" type="radio" name="radio5" value="Cek">
                                                <label class="form-check-label mb-0" for="radioinline4">Cek</label>
                                            </div>
                                            <div class="form-check form-check-inline radio radio-primary">
                                                <input class="form-check-input" id="radioinline5" type="radio" name="radio5" value="Bank">
                                                <label class="form-check-label mb-0" for="radioinline5">Bank</label>
                                            </div>
                                            <input type="text" class="form-control bank_view">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-xl-4">
                                        <button class="btn btn-primary simpan">Simpan</button>
                                    </div>
                                </div>
                                <div class="table-responsive mt-5">
                                    <table class="display table" id="load-piutang">
                                        <thead>
                                            <tr>
                                                <th style="display: none"></th>
                                                <th>No. Faktur</th>
                                                <!--- nomor faktur dari table piutang --->
                                                <th>Tgl.Faktur</th>
                                                <th>Tgl Jth Tempo</th>
                                                <th>Sisa Piutang</th>
                                                <th>Jumlah yg dibayar</th>
                                                <th>Pilih</th>
                                                <!-- <th>Action</th> -->
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <?php foreach ($payment as $p) {
                                                $sisa_bayar =
                                                    $p->total_transaksi -
                                                    $p->total_bayar; ?>
                                            <tr>
                                                <td style="display: none"><?= $p->id ?></td>
                                                <td><?= $p->no_struk ?></td>
                                                <td><?= $p->tgl_transaksi ?></td>
                                                <td><?= $p->tgl_transaksi ?></td>
                                                <td><?= $p->total_transaksi ?></td>
                                                <td>
                                                    <input class="form-control">
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input me-2" id="inlineCheckbox1"
                                                            type="checkbox" value="option1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input class="form-control">
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="update_payment<?= $p->no_struk ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="update_payment" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="update_paymentLongTitle">No.
                                                                Struk <?= $p->no_struk ?></h5>
                                                            <button class="btn-close py-0" type="button"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?= base_url(
                                                                'keuangan/bayar_angsuran/'
                                                            ) .
                                                                $p->id ?>" method="post"
                                                            class="form theme-form dark-input" id="myForm">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="category"
                                                                            class="form-label">Tagihan</label>
                                                                        <div class="input-group">
                                                                            <input type="text"
                                                                                class="form-control form-control-sm nominal"
                                                                                value="<?= $sisa_bayar ?>"
                                                                                name="sisa_bayar"
                                                                                id="sisa_bayar<?= $p->no_struk ?>"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="category" class="form-label">Nominal
                                                                            bayar</label>
                                                                        <div class="input-group">
                                                                            <input type="text"
                                                                                class="form-control form-control-sm nominal"
                                                                                name="nominal_bayar"
                                                                                id="nominal_bayar<?= $p->no_struk ?>"
                                                                                autofocus>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="category" class="form-label">Sisa
                                                                            bayar</label>
                                                                        <div class="input-group">
                                                                            <input type="text"
                                                                                class="form-control form-control-sm nominal"
                                                                                name="sisa" id="sisa<?= $p->no_struk ?>"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary"
                                                                    type="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            } ?> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="topline-top-description" role="tabpanel"
                                aria-labelledby="topline-top-description-tab">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
$('.simpan').hide()
$('.select2').select2();

var action = $(".simpan")
action.on('click', function() {
    var row_piutang = []
    var total_transaksi_row = 0;
    var count_row = $('.row_piutang').val()
    for (let i = 0; i < count_row; i++) {
        // total_transaksi_row += $('.row_piutang' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, '');
        row_piutang.push({
            no_faktur: $('.faktur' + i + '').html(),
            tgl_faktur: $('.tgl_transaksi' + i + '').html(),
            tgl_tempo: $('.tempo' + i + '').html(),
            sisa_piutang: $('.sisa_piutang' + i + '').html(),
            nominal_bayar: $('.nominal_bayar' + i + '').html(),
            keterangan: $('.keterangan' + i + '').z(),
        })
        console.log(row_piutang)
    }
    $.ajax({
        url: "<?= site_url('keuangan/simpan'); ?>",
        method: "POST",
        data: {
            no_bukti : $('.no_bukti').val(),
            dk : $('.dk').val(),
            tgl_bukti : $('.tgl_bukti').val(),
            id_pelanggan : $('.plg').val(),
            kd_akun : $('.kd_akun').val(),
            nama_akun : $('.nama_akun').val(),
            salesman : $('.salesman').val(),
            keterangan : $('.keterangan').val(),
            pembayaran : $('.pembayaran').val(),
            piutang_pelanggan : row_piutang
        },
        async: true,
        dataType: 'json',
        success: function (data) {
        }
    })
})
$('.plg').change( function() {
            var id = this.value
            $.ajax({
            url: "<?= site_url('keuangan/get_piutang_customers'); ?>",
            method: "POST",
            data: {
                id: this.value
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                $("#load-piutang tbody").empty().append(data);
                $('.row_piutang').val(data.length);
                for (let i = 0; i < data.length; i++) {
                    if (data.length == 0) {
                        $('#load-piutang tbody').append(
                        '<tr style="background-color: white;">' +
                        '<td class="order">Tidak ada</td>' +
                        '</tr>');
                    }else{
                        console.log(i)
                        $('.simpan').show()
                        $('#load-piutang tbody').append(
                        '<tr style="background-color: white;">' +
                        '<td class="faktur'+i+'">' + data[i].no_faktur + '</td>' +
                        '<td class="tgl_transaksi'+i+'">' + data[i].tgl_transaksi + '</td>' +
                        '<td class="tempo'+i+'">' + data[i].tgl_tempo_faktur + '</td>' +
                        '<td class="sisa_piutang'+i+'">' + data[i].jumlah_bayar_piutang.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + '</td>' +
                        '<td><input type="number" class="form-control nominal_bayar'+i+'"></td>' +
                        '<td><div class="form-check form-check-inline">'+
                              '<input class="form-check-input pilih_lunas'+i+'" name="name_lunas'+i+'" id="inlineCheckbox1" type="checkbox" value="val'+i+'">'+
                            '</div></td>' +
                        // '<td><button class="btn btn-primary bayar'+data[i].id+'">Bayar</button></td>' +
                        '<td><input class="form-control keterangan'+i+'"></td>' +
                        '</tr>');
                    }
                    $('.nominal_bayar'+i+'').keyup(function() {
                        var nominal_bayar = $(this).val();
                        // if(isNaN(String.fromCharCode(event.which))){
                            if (parseInt(nominal_bayar) > parseInt(data[i].jumlah_bayar_piutang)) {
                                $('.nominal_bayar'+i+'').val(data[i].jumlah_bayar_piutang)
                            }
                            // $(this).val(nominal_bayar.substr(0,nominal_bayar.length-1));
                        // }
                    })
                    $('.pilih_lunas'+i+'').click(function() {
                        if ($('.pilih_lunas'+i+'').prop('checked') == true) {
                            $('.nominal_bayar'+i+'').val(data[i].jumlah_bayar_piutang)
                        }else if($('.pilih_lunas'+i+'').prop('checked') == false){
                            $('.nominal_bayar'+i+'').val('');
                        }
                    })
                    $('.bayar'+i+'').click(function(){
                        $.ajax({
                            url: "<?= site_url('keuangan/bayar_angsuran'); ?>",
                            method: "POST",
                            data: {
                                id: data[i].id_transaksi ,//id Transaksi,
                                nominal_bayar : $('.nominal_bayar'+i+'').val()
                            },
                            async: true,
                            dataType: 'json',
                            success: function (data) {
                                swal({
                                    title: "Berhasil",
                                    text: "Bayar piutang berhasil..!",
                                    icon: "success",
                                    buttons: true,
                                    dangerMode: true,
                                })
                            }
                        })
                    })
                      
                }
            }

        })
    });

// var paymentOptions = <?= json_encode($payment) ?>;

// // auto complete function
// function autoComplete(arr, input) {
//     return arr.filter((e) => {
//         if (typeof e === 'string') {
//             return e.toLowerCase().includes(input.toLowerCase());
//         }
//         return false;
//     });
// }
   
// function getValue(val) {
//     // if no value
//     if (!val) {
//         result.innerHTML = "";
//         return;
//     }

//     // Search di sini
//     var data = autoComplete(paymentOptions, val);

//     // Tambahkan list data
//     var res = "<ul>";
//     data.forEach((e) => {
//         res += "<li>" + e + "</li>";
//     });
//     res += "</ul>";
//     result.innerHTML = res;
// }

// $(document).ready(function() {
//     // Basic table example
//     $("#payment").DataTable({
//         "order": [
//             [0, "DESC"]
//         ],
//     });
//     $('.bank_view').hide()
// });
// </script>
<?php foreach ($payment as $p): ?>
 <script>
// document.getElementById('nominal_bayar<?= $p->no_struk ?>').addEventListener('input', function() {
//     // Menghapus semua karakter selain angka dan koma
//     var sanitizedInput = this.value.replace(/[^\d,]/g, '');

//     // Mengganti koma ribuan (,) dengan kosong ('') kecuali yang terakhir
//     sanitizedInput = sanitizedInput.replace(/(,)(?=\d)/g, '');

//     // Memastikan nilai numerik valid atau set ke nilai kosong jika NaN
//     var currentInputValue = isNaN(parseFloat(sanitizedInput)) ? '' : parseFloat(sanitizedInput).toLocaleString(
//         'en-US');

//     // Menetapkan nilai yang telah diformat ke dalam input
//     this.value = currentInputValue;

//     var nominalTransaksiValue = parseFloat(document.getElementById('sisa_bayar<?= $p->no_struk ?>').value);
//     var nominalBayarValue = parseFloat(sanitizedInput.replace(/,/g, ''));

    // if (nominalBayarValue > nominalTransaksiValue) {
    //     // Mengatur nilai input menjadi nilai maksimal yang diperbolehkan
    //     this.value = nominalTransaksiValue.toLocaleString('en-US');
    //     nominalBayarValue = nominalTransaksiValue;
    // }

//     var hasilPengurangan = nominalTransaksiValue - nominalBayarValue;
//     document.getElementById('sisa<?= $p->no_struk ?>').value = hasilPengurangan.toLocaleString('en-US');
// });

//         // document.getElementById("myForm").addEventListener("submit", function() {
//         //     // Formulir disubmit, buka tab baru dengan URL yang diinginkan
//         //     window.open('<?= base_url('pos/cetak?id=') . $p->id ?>', '_blank');
//             // });
            
//     </script>
     <?php endforeach; ?>