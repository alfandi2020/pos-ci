<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <title>POS</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.css">
    <!-- ico-font-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/datatables.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url() ?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsive.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.min.css"> -->
    <link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
</head>

<body style="background-color: #eee;">

    <!-- loader starts-->
    <!-- <div class="loader-wrapper">
      <div class="loader-index"> <span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div> -->
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <!-- <div  class="page-wrapper horizontal-wrapper" id="pageWrapper"> -->
    <div id="pageWrapper">
        <!-- Page Header Start-->
        <!-- <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="<?= base_url() ?>">
                POS
            </a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div class="notification-slider">
              <div class="d-flex h-100"> <img src="<?= base_url() ?>assets/images/giftools.gif" alt="gif">
                <h6 class="mb-0 f-w-400">Application POS </h6><i class="icon-arrow-top-right f-light"></i>
              </div>
            </div>
          </div>
          <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
              <li class="onhover-dropdown">
                <div class="notification-box">
                  <svg>
                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#notification"></use>
                  </svg><span class="badge rounded-pill badge-secondary">4 </span>
                </div>
                <div class="onhover-show-div notification-dropdown">
                  <h6 class="f-18 mb-0 dropdown-title">Notitications                               </h6>
                  <ul>
                    <li class="b-l-primary border-4">
                      <p>Delivery processing <span class="font-danger">10 min.</span></p>
                    </li>
                    <li class="b-l-success border-4">
                      <p>Order Complete<span class="font-success">1 hr</span></p>
                    </li>
                    <li class="b-l-secondary border-4">
                      <p>Tickets Generated<span class="font-secondary">3 hr</span></p>
                    </li>
                    <li class="b-l-warning border-4">
                      <p>Delivery Complete<span class="font-warning">6 hr</span></p>
                    </li>
                    <li><a class="f-w-700" href="#">Check all</a></li>
                  </ul>
                </div>
              </li>
              <li class="profile-nav onhover-dropdown pe-0 py-0">
                <div class="media profile-media"><img class="b-r-10" src="<?= base_url() ?>assets/images/dashboard/profile.png" alt="">
                  <div class="media-body"><span><?= $this->session->userdata('nama') ?></span>
                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                  <li><a href="<?= base_url('registrasi/logout') ?>"><i data-feather="log-in"> </i><span>Logout</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div> -->
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <!-- <div class="sidebar-wrapper" sidebar-layout="stroke-svg">
          <div>
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="<?= base_url() ?>assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?= base_url() ?>assets/images/logo/logo_dark.png" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url() ?>assets/images/logo/logo-icon.png" alt=""></a></div>
            <?php // $this->load->view('body/sidebar')
            ?>
          </div>
        </div> -->
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <!-- <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>School Management</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">School Manage</li>
                  </ol>
                </div>
              </div>
            </div>
          </div> -->
                <!-- Container-fluid starts-->
                <div class="modal fade" id="modal_penjualan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Penjualan</h5>

                                <button class="btn-close py-0 clear_penjualan" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-toggle-wrapper">
                                    <!-- <form action="<?= base_url('pos/reprint_date') ?>" method="POST"> -->
                                    <div class="row">
                                        <div class="col">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control date_print" value="<?= $this->session->userdata('reprint_date_penjualan') == "" ? date('Y-m-d') : $this->session->userdata('reprint_date_penjualan') ?>" name="date">
                                        </div>
                                        <div class="col">
                                            <label>End Date</label>
                                            <input type="date" class="form-control date_print2" value="<?= $this->session->userdata('reprint_date_penjualan2') == "" ? date('Y-m-d') : $this->session->userdata('reprint_date_penjualan2') ?>" name="date2">
                                        </div>
                                        <div class="col">
                                            <label>Pelanggan</label>
                                            <!-- <input type="text" class="form-control reprint_customers" value="<?= $this->session->userdata('reprint_tipe_penjualan') ?>"> -->
                                            <select id="" class="reprint_customers select2x">
                                                <option value="0">Pilih Pelanggan</option>
                                                <?php foreach ($customers as $x) {
                                                    ?>
                                                        <option value="<?= $x->id_customer ?>"><?= $x->nama_toko ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                    <div class="row justify-content-md-center">
                                        <div class="col-xl-12">
                                            <div class="table-responsive">
                                                <table id="load-transaksi" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th width="70"></th>
                                                            <th width="70"></th>
                                                            <th width="400" scope="col">No Struk</th>
                                                            <th width="80" scope="col">Pelanggan</th>
                                                            <th width="180" scope="col">Total Item</th>
                                                            <th width="180" scope="col">Total Transaksi</th>
                                                            <th width="180" scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal_closing" style="overflow:hidden;" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Closing</h5>

                                <button class="btn-close py-0 clear_penjualan" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-toggle-wrapper">
                                    <form action="<?= base_url('pos/closing') ?>" method="GET">
                                        <div class="row">
                                            <div class="col">
                                                <label>Pembayaran</label>
                                                <select name="pembayaran_closing" id="" class="form-control">
                                                    <option value="">Pilih pembayaran</option>
                                                    <option value="CASH">CASH</option>
                                                    <option value="TRANSFER">TRANSFER</option>
                                                    <option value="VOCHER">VOCHER</option>
                                                    <option value="EDC">EDC</option>
                                                    <option value="GIRO">GIRO</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label>Start Date</label>
                                                <input type="date" class="form-control date_print_closing" value="<?= date('Y-m-d') ?>" name="date_print_closing">
                                            </div>
                                            <div class="col">
                                                <label>End Date</label>
                                                <input type="date" class="form-control date_print_closing2" value="<?= date('Y-m-d') ?>" name="date_print_closing2">
                                            </div>
                                            <div class="col">
                                                <label>Pelanggan</label>
                                                <!-- <input type="text" class="form-control reprint_customers" value="<?= $this->session->userdata('closing_tipe_penjualan') ?>"> -->
                                                <select id="" name="closing_customers" class="form-control select2x">
                                                    <option value="0">Pilih Pelanggan</option>
                                                    <?php foreach ($customers as $x) {
                                                        ?>
                                                            <option value="<?= $x->id_customer ?>"><?= $x->nama_toko ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-square">Export</button>
                                            </div>
                                        </div>

                                    </form>
                                    <!-- <div class="row justify-content-md-center">
                                                                            <div class="col-xl-12">
                                                                            <div class="table-responsive">
                                                                            <table id="load-transaksi" class="display table">
                                                                                <thead>
                                                                                    <tr>
                                                                                    <th width="70"></th>
                                                                                    <th width="400" scope="col">No Struk</th>
                                                                                    <th width="80" scope="col">Pelanggan</th>
                                                                                    <th width="180" scope="col">Total Item</th>
                                                                                    <th width="180" scope="col">Total Transaksi</th>
                                                                                    <th width="180" scope="col"></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                </tbody>
                                                                                </table>
                                                                            </div>

                                                                        </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mt-1">
                    <div class="col-xxl-12 box-col-12">
                        <div class="row">
                            <div class="col-xxl-9 col-md-7">
                                <div class="card">
                                    <div class="card-body pt-0">
                                        <div class="row mt-3">
                                            <?php if ($this->uri->segment(3) == true) { ?>
                                                    <div class="col">
                                                        <div class="table-responsive" style="min-height:650px; max-height: 650px;">
                                                            <table id="load-list">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th width="400" scope="col">Nama Barang</th>
                                                                        <th width="80" scope="col">Qty</th>
                                                                        <th width="180" scope="col">Satuan</th>
                                                                        <th width="180" scope="col">Harga Satuan</th>
                                                                        <th width="180" scope="col">Diskon</th>
                                                                        <th width="280" scope="col">Jumlah</th>
                                                                        <th width="280" scope="col">Stock</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="sampel-wrapper">
                                                                    <!-- <?php foreach ($transaksi_item as $x) { ?>
                                                <tr style="background-color: white;">
                                                    <td>
                                                        <button type="button" class="btn btn-danger delete_satuan"><i class="icon-trash"></i></button>
                                                    </td>
                                                        <td class="order">
                                                        <input class="form-control barang1" value="<?= $x->barang ?>">
                                                        <input type="hidden" value="<?= $x->kd_barang ?>" class="form-control id_barang1">
                                                                </td>
                                                        <td>
                                                            <input id="idq1" type="number" <?= $x->qty ?> style="text-align:center;" value="1" class="form-control qty1">
                                                        </td>
                                                        <td>
                                                            <select id="ids1" class="form-control satuan1" style="cursor: text;">
                                                                <option value="">Pilih satuan</option>
                                                            </select>
                                                            <input type="hidden" class="qty_isi1">
                                                        </td>
                                                        <td>
                                                            <input readonly type="text" value="<?= number_format($x->harga_satuan, 0, '.', '.') ?>" id="idh1" class="form-control harga1">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="idd1" placeholder="0" style="text-align:center;" class="form-control diskon_item1">
                                                        </td>
                                                        <td>
                                                        <input readonly type="text" value="<?= number_format($x->jumlah, 0, '.', '.') ?>" class="form-control jumlah1">
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <input type="text" class="form-control stock1">
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <input type="text" class="form-control stock-c1">
                                                                    </div>
                                                            </div>
                                                        </td>
                                                </tr>
                                                <?php } ?> -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                            <?php } else { ?>
                                                    <div class="col">
                                                        <div class="table-responsive" style="min-height:650px; max-height: 650px;">
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th width="400" scope="col">Nama Barang</th>
                                                                        <th width="80" scope="col">Qty</th>
                                                                        <th width="180" scope="col">Satuan</th>
                                                                        <th width="180" scope="col">Harga Satuan</th>
                                                                        <th width="180" scope="col">Diskon</th>
                                                                        <th width="280" scope="col">Jumlah</th>
                                                                        <th width="280" scope="col">Stock</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="sampel-wrapper">
                                                                    <!-- <tr style="background-color: white;">
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-square delete_satuan"><i class="icon-trash"></i></button>
                                                    </td>
                                                    <td class="order">
                                                    <input class="form-control barang1">
                                                    <input type="hidden" class="form-control id_barang1">
                                                            </td>
                                                    <td>
                                                        <input id="idq1" type="number" style="text-align:center;" value="1" class="form-control qty1">
                                                    </td>
                                                    <td>
                                                        <select id="ids1" class="form-control satuan1" style="cursor: text;">
                                                            <option value="">Pilih satuan</option>
                                                        </select>
                                                        <input type="hidden" class="qty_isi1">
                                                    </td>
                                                    <td>
                                                        <input readonly type="text" id="idh1" class="form-control harga1">
                                                    </td>
                                                    <td>
                                                        <input type="text" id="idd1" placeholder="0" style="text-align:center;" class="form-control diskon_item1">
                                                    </td>
                                                    <td>
                                                    <input readonly type="text" class="form-control jumlah1">
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                                <div class="col-xl-6">
                                                                    <input type="text" class="form-control stock1">
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <input type="text" class="form-control stock-c1">
                                                                </div>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card widget-hover overflow-hidden">
                                            <div class="card-header card-no-border pb-2">
                                                <!-- <h5>Menu</h5> -->
                                            </div>
                                            <div class="card-body pt-0 count-student">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div class="row">
                                                            CETAK
                                                            <!-- <div class="col"> -->
                                                            <div class="form-check radio radio-primary">
                                                                <input class="form-check-input" id="radio111" type="radio" name="radio3" value="option1" checked="">
                                                                <label class="form-check-label" for="radio111">Struk</label>
                                                            </div>
                                                            <!-- </div> -->
                                                            <!-- <div class="col"> -->
                                                            <div class="form-check radio radio-primary">
                                                                <input class="form-check-input" id="radio112" type="radio" name="radio3" value="option1">
                                                                <label class="form-check-label" for="radio112">Kwitansi</label>
                                                            </div>
                                                            <!-- </div>  -->
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <div class="row">
                                                            <!-- SHORTCUT <br> -->
                                                            <!-- <div class="col"> -->
                                                            [TAB] = Selanjutnya<br>
                                                            [SHIFT + TAB] = Sebelumnya <br>
                                                            F2 = BAYAR
                                                            <!-- </div> -->
                                                            <!-- <div class="col"> -->
                                                            <!-- <div class="form-check radio radio-primary">
                                                                <input class="form-check-input" id="radio112" type="radio" name="radio3" value="option1">
                                                                <label class="form-check-label" for="radio112">Kwitansi</label>
                                                            </div> -->
                                                            <!-- </div>  -->
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        [+] : Tambah Transaksi<br>
                                                        [CTRL + R] : Batal Transaksi <br>
                                                        F8 = TAHAN dan F4 LOAD
                                                    </div>
                                                    <!-- <div class="col">
                                                    <button data-bs-toggle="modal" data-original-title="test" data-bs-target="#modaload" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">PENJUALAN</button>
                                                </div> -->
                                                    <div class="col">
                                                        <button class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">PELUNASAN</button>
                                                    </div>
                                                    <div class="col">
                                                        <button class="btn btn-square btn-outline-primary col-xl-12" data-bs-toggle="modal" data-original-title="test" data-bs-target="#modal_closing" style="font-size:20px;">CLOSING</button>

                                                    </div>
                                                    <!-- <div class="col">
                                                    <button class="btn btn-square btn-outline-danger col-xl-12" data-bs-toggle="modal" data-original-title="test" data-bs-target="#modal_trash" style="font-size:20px;">TRASH</button>
                                                </div> -->

                                                    <!-- <div class="col">
                                                    <button class="btn btn-square btn-outline-primary col-xl-12" data-bs-toggle="modal" data-original-title="test" data-bs-target="#modaload" style="font-size:20px;">LOAD</button>
                                                </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card widget-1">
                                    <div class="card-body">
                                        <div class="widget-content">
                                            <div class="widget-round secondary">
                                                <div class="bg-round">
                                                    <svg class="svg-fill">
                                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#cart"> </use>
                                                    </svg>
                                                    <svg class="half-circle svg-fill">
                                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="total_pos">Rp.0</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <div class="card">
                                        <div class="card-header card-no-border pb-2">
                                            <h5>Informasi <?= $this->uri->segment(4) == 'edit_transaksi' ? 'Edit Transaksi' : ($this->uri->segment(4) == 'edit_hold' ? 'Edit Hold' : '') ?></h5>

                                            <span>Toko Ling Ling</span>
                                            <b><?= $this->session->userdata('nama') ?></b>
                                        </div>
                                        <br><br>
                                        <hr>
                                        <div class="card-body pt-0 count-student">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <p>No Struk</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="text" readonly class="form-control no_struk" value="<?= date('d') . date('m') . date('Y') . sprintf('%04d', $tgl_urutan['t'] + 1); ?>">
                                                    <input type="hidden" readonly class="form-control edit_transaksi" value="<?= $this->uri->segment(4) ?>">
                                                    <input type="hidden" class="unik" value="<?= $unik ?>">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-4">
                                                    <p>Tanggal</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="date" class="form-control tgl_transaksi" value="<?= date('Y-m-d') ?>">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-4">
                                                    <p>Pelanggan <?= explode(',', $this->session->userdata('tipe_penjualan'))[0] ?></p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <form action="<?= base_url('pos') ?>" method="POST">
                                                        <select <?= $this->uri->segment(3) != true ? 'onchange="this.form.submit()"' : "" ?> name="tipe" id="" class="form-control select2p">
                                                            <!-- <option <?= $this->session->userdata('tipe_penjualan') == 'umum' ? 'selected' : '' ?> value="">UMUM</option> -->
                                                            <?php foreach ($customers as $x) {
                                                                ?>
                                                                    <option <?= strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == strtolower($x->tipe_penjualan) && explode(',', $this->session->userdata('tipe_penjualan'))[1] == $x->id_customer ? 'selected' : '' ?> value="<?= strtolower($x->tipe_penjualan) . "," . $x->id_customer . "," . $x->nama_toko ?>"><?= $x->nama_toko ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-4">
                                                    <p>Member</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="text" class="form-control member" value="">
                                                </div>
                                            </div>
                                            <!-- <div class="row mt-3">
                                        <div class="col-xl-4">
                                            <p>Diskon</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" id="diskon_all" class="form-control diskon_all">
                                        </div>
                                    </div> -->

                                            <div class="row mt-3">
                                                <div class="col-xl-4">
                                                    <p>Total Netto</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="text" class="form-control total_netto">
                                                </div>
                                            </div>
                                            <!-- <div class="row mt-3">
                                        <div class="col-xl-4">
                                            <p>Total Bayar</p>
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" id="total_bayar" class="form-control total_bayar">
                                        </div>
                                    </div> -->
                                            <div class="row mt-3">
                                                <div class="col-xl-4">
                                                    <p>Jumlah Item</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="text" class="form-control total_item" value="0">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-4">
                                                    <p>Keterangan</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="text" class="form-control keterangan">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-4">
                                                    <p>Pengiriman</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <select name="" id="" class="form-control select2kurir pengiriman">
                                                        <option value="">Pilih Pengiriman</option>
                                                        <?php foreach ($ekspedisi as $x) { ?>
                                                                <option <?= $x->nama == "Ambil di toko" ? 'selected' : '' ?> value="<?= $x->id ?>"><?= $x->nama ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <p>Status PPN</p>
                                                </div>
                                                <div class="col-xl">
                                                    <!-- <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="radio111" type="radio" name="radio3" value="option1" checked="">
                                                <label class="form-check-label" for="radio111">NonPPN</label>
                                            </div>
                                            <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="radio112" type="radio" name="radio3" value="option1">
                                                <label class="form-check-label" for="radio112">Include PPN</label>
                                            </div>
                                            <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="radio113" type="radio" name="radio3" value="option1">
                                                <label class="form-check-label" for="radio113">Exclude PPN</label>
                                            </div> -->
                                                    Non PPN
                                                </div>
                                            </div>
                                            <!-- <div class="row mt-3">
                                        <div class="col">
                                            <input id="BAYAR" class="btn btn-square btn-primary col-xl-12 submit" value="BAYAR" style="font-size:20px;">
                                        </div>
                                        <div class="col">
                                            <input id="TAHAN" class="btn btn-square btn-danger col-xl-12 submit" style="font-size:20px;" value="TAHAN">
                                        </div>
                                    </div> -->
                                            <!-- <hr>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <button id="bayar3332312" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Cek POIN</button>
                                        </div>
                                        <div class="col">
                                            <button id="tahan" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">POIN CUST</button>
                                        </div>
                                    </div> -->
                                            <!-- <div class="row mt-3">
                                        <div class="col">
                                            <button id="bayar" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Barang</button>
                                        </div>
                                        <div class="col">
                                            <button id="tahan" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Penjualan</button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <button id="bayar" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Stock</button>
                                        </div>
                                        <div class="col">
                                            <button id="tahan" class="btn btn-square btn-outline-primary col-xl-12" style="font-size:20px;">Cek Poin</button>
                                        </div>
                                    </div> -->

                                            <!-- <div class="row mt-2">
                                    <button class="btn btn-square btn-warning" style="font-size:14px;">Stok Barang</button>
                                    </div>
                                    <div class="row mt-2">
                                    <button class="btn btn-square btn-primary" style="font-size:14px;">Data Penjualan</button>
                                    </div> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
    <!-- <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2023 © Cuba theme by pixelstrap  </p>
              </div>
            </div>
          </div>
        </footer> -->
    </div>
    </div>

    <div class="modal fade" id="payment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pembayaran</h5>
                    <!-- <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body mdl-payment">
                    <div class="modal-toggle-wrapper">
                        <!-- <?= $this->session->flashdata('msg') ?> -->
                        <!-- <div class="row justify-content-md-center">
                                    <div class="col-xl-4">
                                       <h6> Informasi POS </h6>
                                    </div>
                                </div> -->
                        <div class="row justify-content-md-center">
                            <div class="col-xl-4">
                                <h6 class="total_bayar_text"> Total Bayar </h6>
                            </div>
                            <div class="col-xl-6">
                                <input type="text" class="form-control total_bayar" id="total_bayar">
                                <!-- <span style="font-size:20px" class="bayar_show"></span> -->
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-3 tunai_vis">
                            <div class="col-xl-4">
                                <h6>Tunai </h6>
                            </div>
                            <div class="col-xl-6">
                                <input type="text" class="form-control tunaii" id="tunaii">
                                <!-- <i>Bayar sisa transfer dengan tunai</i> -->
                                <!-- <span style="font-size:20px" class="diskon_show"></span> -->
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-2">
                            <div class="col-xl-4">
                                <h6> Total Transaksi </h6>
                            </div>
                            <div class="col-xl-6">
                                <input type="text" class="form-control transaksi_show" readonly>
                                <!-- <span style="font-size:20px" class="transaksi_show"></span> -->
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-2">
                            <div class="col-xl-4">
                                <h6>Diskon </h6>
                            </div>
                            <div class="col-xl-6">
                                <input type="text" class="form-control diskon_all" id="diskon_all">
                                <!-- <span style="font-size:20px" class="diskon_show"></span> -->
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-xl-4">
                                <h6> Sisa Utang </h6>
                            </div>
                            <div class="col-xl-6">
                                <span style="font-size:20px" class="utang">Rp.0</span>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-xl-4">
                                <h6> Kembali </h6>
                            </div>
                            <div class="col-xl-6">
                                <span style="font-size:20px" class="kembali">Rp.0</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-md-center mt-3">
                            <div class="col-xl-6">
                                <span style="font-size:20px;text-align:center;">Metode Pembayaran</span>
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-3">
                            <div class="col">
                                <div class="form-check radio radio-secondary">
                                    <input class="form-check-input pembayaran" id="radio21" type="radio" name="radio_pembayaran" value="TRANSFER">
                                    <label class="form-check-label" for="radio21">TRANSFER </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check radio radio-secondary">
                                    <input class="form-check-input pembayaran" id="radio22" type="radio" checked name="radio_pembayaran" value="CASH">
                                    <label class="form-check-label" for="radio22">CASH </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check radio radio-secondary">
                                    <input class="form-check-input pembayaran" id="radio24" type="radio" name="radio_pembayaran" value="GIRO">
                                    <label class="form-check-label" for="radio24">GIRO </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check radio radio-secondary">
                                    <input class="form-check-input pembayaran" id="radio25" type="radio" name="radio_pembayaran" value="EDC">
                                    <label class="form-check-label" for="radio25">EDC </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check radio radio-secondary">
                                    <input class="form-check-input pembayaran" id="radio26" type="radio" name="radio_pembayaran" value="VOCHER">
                                    <label class="form-check-label" for="radio26">VOCHER </label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-3 transfer_vis">
                            <div class="col-xl-6">
                                <label for="">Dari Bank</label>
                                <input type="text" class="form-control bank">
                            </div>
                            <div class="col-xl-6">
                                <label for="">No Tujuan Rek</label>
                                <input type="text" class="form-control tujuan">
                            </div>
                            <!-- <div class="col-xl-4">
                                            <label for="">Nomor</label>
                                            <input type="text" class="form-control no_giro">
                                        </div> -->
                        </div>
                        <div class="row justify-content-md-center mt-3 giro_vis">
                            <div class="col-xl-2">
                                <label for="">Dari Bank</label>
                                <input type="text" class="form-control bank">
                            </div>
                            <div class="col-xl-4">
                                <label for="">Nomor</label>
                                <input type="text" class="form-control nomor">
                            </div>
                            <div class="col-xl-3">
                                <label for="">Rekening Pencairan</label>
                                <input type="text" class="form-control rekening_giro">
                            </div>
                            <div class="col-xl-3">
                                <label for="">Jatoh Tempo</label>
                                <input type="date" class="form-control tempo">
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-3 edc_vis">
                            <div class="col-xl-3">
                                <label for="">Bank Kartu</label>
                                <input type="text" class="form-control bank_edc">
                            </div>
                            <div class="col-xl-5">
                                <label for="">No Kartu</label>
                                <input type="text" class="form-control rekening_edc">
                            </div>
                            <div class="col-xl-4">
                                <label for="">Nama</label>
                                <input type="text" class="form-control nama_edc">
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-3 vocher_vis">
                            <div class="col-xl-6">
                                <label for="">No Vocher</label>
                                <input type="text" class="form-control vocher">
                            </div>
                            <div class="col-xl-6">
                                <label for="">Rupiah</label>
                                <input type="text" class="form-control rekening_edc">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xl-8"></div>
                            <div class="col-xl-2">
                                <!-- <input class="btn btn-square btn-primary submit" value="BAYAR"> -->
                                <button id="BAYAR" class="btn bg-primary d-flex align-items-center gap-2 text-light ms-auto submit" type="button">BAYAR</button>
                            </div>
                            <div class="col-xl-2">
                                <!-- <input class="btn btn-square btn-primary submit" value="BAYAR"> -->
                                <button class="btn bg-secondary d-flex align-items-center gap-2 text-light ms-auto" type="button" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modaload" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Load Data POS</h5>
                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-toggle-wrapper">
                        <div class="row justify-content-md-center">
                            <div class="col-xl-12">
                                <div class="table-responsive">
                                    <table id="load-hold" class="display table">
                                        <thead>
                                            <tr>
                                                <th width="70"></th>
                                                <th width="400" scope="col">No Struk</th>
                                                <th width="80" scope="col">Pelanggan</th>
                                                <th width="180" scope="col">Total Item</th>
                                                <th width="180" scope="col">Total Transaksi</th>
                                                <th width="180" scope="col">Load</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <?php foreach ($load as $x) { ?>
                                                    <tr style="background-color: white;">
                                                            <td>
                                                                <a type="button" id="<?= $x->id . ',' . $x->no_struk ?>" class="delete_transaksi badge badge-danger"><i data-feather="trash-2"></i></a>
                                                            </td>
                                                            <td class="order">
                                                            <?= $x->no_struk ?>
                                                                    </td>
                                                            <td>
                                                                <?= $x->nama_toko ?>
                                                            </td>
                                                            <td>
                                                                <?= $x->jumlah_item ?>
                                                            </td>
                                                            <td>
                                                                <?= number_format($x->total_transaksi, 0, ".", ".") ?>
                                                            </td>
                                                            <td><a class="badge badge-primary" href="<?= base_url('pos/index/' . $x->id) ?>" ><i data-feather="edit-3"></i></a></td>
                                                    </tr>
                                                    <?php } ?> -->

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xl-3">
                                    <span style="font-size:20px" class="bayar_show"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- latest jquery-->
        <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>

        <script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap js-->
        <script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <script src="<?= base_url() ?>assets/js/scrollbar/simplebar.js"></script>
        <script src="<?= base_url() ?>assets/js/scrollbar/custom.js"></script>
        <!-- Sidebar jquery-->
        <script src="<?= base_url() ?>assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <script src="<?= base_url() ?>assets/js/sidebar-menu.js"></script>
        <script src="<?= base_url() ?>assets/js/slick/slick.min.js"></script>
        <script src="<?= base_url() ?>assets/js/slick/slick.js"></script>
        <script src="<?= base_url() ?>assets/js/header-slick.js"></script>
        <!-- <script src="<?= base_url() ?>assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?= base_url() ?>assets/js/chart/apex-chart/stock-prices.js"></script> -->
        <script src="<?= base_url() ?>assets/js/sweet-alert/sweetalert.min.js"></script>
        <script src="<?= base_url() ?>assets/js/datepicker/date-picker/datepicker.js"></script>
        <script src="<?= base_url() ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
        <script src="<?= base_url() ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
        <script src="<?= base_url() ?>assets/js/dashboard/dashboard_7.js"></script>
        <script src="<?= base_url() ?>assets/js/height-equal.js"></script>
        <script src="<?= base_url() ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/js/datatable/datatables/datatable.custom.js"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="<?= base_url() ?>assets/js/script.js"></script>
        <!-- <script src="<?= base_url() ?>assets/js/theme-customizer/customizer.js"></script> -->
        <!-- Plugin used-->
        <script>
            $(document).ready(function() {
                $('.select2x').select2();
                $('.select2p').select2();
                $('.select2kurir').select2();
                $('.stock1').attr('disabled', true)
                $('.stock-c1').attr('disabled', true)
                var counter = 0;
                var stock_temporary = 0;
                // function cek_stock_temporary(kode_barang) {
                //     var stock_temporary = 0;
                //     return $.ajax({
                //                 url: "<?= site_url('pos/cek_stock_temp/'); ?>"+kode_barang,
                //         method: "GET",
                //         // data: {
                //         //     kd_barang: kode_barang
                //         // },
                //         async: true,
                //         dataType: 'json',
                //         // success: function (data) {
                //         //     // stock_temporary = (data.sisa_stock <= 10 ? 0 : data.sisa_stock);
                //         //     // console.log(data.sisa_stock)
                //         //     cek_stock_res(data)
                //         //     return data
                //         // }
                //     })
                    
                // }

                function check_pos() {
                    $(".barang" + counter + "").focus();
                    var data = "<?= base_url('pos/get_barang') ?>";

                    var qty = $(".qty" + counter + "")
                    var diskon_item = $(".diskon_item" + counter + "")
                    var satuan_x = $(".satuan" + counter + "")
                    $(".barang" + counter + "").autocomplete({
                        source: data,
                        select: function(event, ui) {
                            $('.barang' + counter + '').val(ui.item.label);
                            $('.id_barang' + counter + '').val(ui.item.description);
                            var i, j;
                            // cek_stock_temporary(ui.item.description);
                            
                            $.ajax({
                                url: "<?= site_url('pos/search_barang'); ?>",
                                method: "POST",
                                data: {
                                    id: ui.item.description,
                                    unik : $('.unik').val()
                                },
                                async: true,
                                dataType: 'json',
                                success: function(data) {

                                   

                                    var satuann = ''
                                    if (!data.id_satuan_kecil_konv == "") {
                                        localStorage.setItem( data.nama, data.sisa_stock * data.qty_konv );

                                        satuann += '<option value=' + data.qty_konv + "," + data.id_satuan_kecil_konv + ',konv,' + data.qty_konv + ' data-stok=' + data.stok + ' data-qty-konv=' + data.qty_konv + '  data-qty-kecil=' + data.qty_kecil + '  data-qty-besar=' + data.qty_besar + '>' + data.id_satuan_kecil_konv + ' </option>';
                                        // cek_satuan = data.id_satuan_kecil_konv;
                                        // cek_isi_satuan = data.qty_konv;
                                    }
                                    if (!data.id_satuan_kecil == "") {
                                        localStorage.setItem( data.nama, data.sisa_stock * data.qty_kecil );

                                        satuann += '<option value=' + data.qty_kecil + "," + data.id_satuan_kecil + ',kecil,' + data.qty_konv + ' data-stok=' + data.stok + ' data-qty-konv=' + data.qty_konv + '  data-qty-kecil=' + data.qty_kecil + '  data-qty-besar=' + data.qty_besar + '>' + data.id_satuan_kecil + ' </option>';
                                        // cek_satuan = data.id_satuan_kecil;
                                        // cek_isi_satuan = data.qty_kecil;
                                    }
                                    if (!data.id_satuan_besar == "") {
                                        satuann += '<option value=' + data.qty_besar + "," + data.id_satuan_besar + ',besar,' + data.qty_konv + ' data-stok=' + data.stok + ' data-qty-konv=' + data.qty_konv + '  data-qty-kecil=' + data.qty_kecil + '  data-qty-besar=' + data.qty_besar + '>' + data.id_satuan_besar + ' </option>';
                                        // cek_satuan = data.id_satuan_besar;
                                        // cek_isi_satuan = data.qty_besar;
                                    }


                                    <?php if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'umum') { ?>
                                            //  if (data.hargajual_konv_retail != "" || !data.hargajual_konv_retail != null) {
                                            if (data.qty_besar != 0 && data.qty_kecil == 0 && data.qty_konv == 0) { //kondisi besar ok,kecil null,konv null
                                                var satuan_pp = data.hargajualb_retail;
                                            } else {
                                                if ((data.hargajual_konv_retail == null || data.hargajual_konv_retail == 0) && data.hargajualk_retail != "") {
                                                    var satuan_pp = data.hargajualk_retail;
                                                } else {
                                                    var satuan_pp = data.hargajual_konv_retail;
                                                }
                                            }
                                            // }
                                            // else if (data.hargajualk_retail != "" || !data.hargajualk_retail != null) {
                                            //     var satuan_pp = data.hargajualk_retail;
                                            // } else if (!data.hargajualb_retail == "") {
                                            //     var satuan_pp = data.hargajualb_retail;
                                            // }
                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'retail') { ?>
                                                if (data.qty_besar != 0 && data.qty_kecil == 0 && data.qty_konv == 0) { //kondisi besar ok,kecil null,konv null
                                                    var satuan_pp = data.hargajualb_retail;
                                                } else {
                                                    if ((data.hargajual_konv_retail == null || data.hargajual_konv_retail == 0) && data.hargajualk_retail != "") {
                                                        var satuan_pp = data.hargajualk_retail;
                                                    } else {
                                                        var satuan_pp = data.hargajual_konv_retail;
                                                    }
                                                }
                                                // if (!data.hargajual_konv_retail == "") {
                                                //     var satuan_pp = data.hargajual_konv_retail;
                                                // }else if (!data.hargajualk_retail == "") {
                                                //     var satuan_pp = data.hargajualk_retail;
                                                // }else if (!data.hargajualb_retail == "") {
                                                //     var satuan_pp = data.hargajualb_retail;
                                                // }
                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'grosir') { ?>
                                                    if (data.qty_besar != 0 && data.qty_kecil == 0 && data.qty_konv == 0) { //kondisi besar ok,kecil null,konv null
                                                        var satuan_pp = data.hargajualb_grosir;
                                                    } else {
                                                        if ((data.hargajual_konv_grosir == null || data.hargajual_konv_grosir == 0) && data.hargajualk_grosir != "") {
                                                            var satuan_pp = data.hargajualk_grosir;
                                                        } else {
                                                            var satuan_pp = data.hargajual_konv_grosir;
                                                        }
                                                    }
                                                    // if (!data.hargajual_konv_grosir == "") {
                                                    //     var satuan_pp = data.hargajual_konv_grosir;
                                                    // }else if (!data.hargajualk_grosir == "") {
                                                    //     var satuan_pp = data.hargajualk_grosir;
                                                    // }else if (!data.hargajualb_grosir == "") {
                                                    //     var satuan_pp = data.hargajualb_grosir;
                                                    // } 
                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'partai') { ?>
                                                        if (data.qty_besar != 0 && data.qty_kecil == 0 && data.qty_konv == 0) { //kondisi besar ok,kecil null,konv null
                                                            var satuan_pp = data.hargajualb_partai;
                                                        } else {
                                                            if ((data.hargajual_konv_partai == null || data.hargajual_konv_partai == 0) && data.hargajualk_partai != "") {
                                                                var satuan_pp = data.hargajualk_partai;
                                                            } else {
                                                                var satuan_pp = data.hargajual_konv_partai;
                                                            }
                                                        }
                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'promo') { ?>

                                                            if (data.qty_besar != 0 && data.qty_kecil == 0 && data.qty_konv == 0) { //kondisi besar ok,kecil null,konv null
                                                                var satuan_pp = data.hargajualb_promo;
                                                            } else {
                                                                if ((data.hargajual_konv_promo == null || data.hargajual_konv_promo == 0) && data.hargajualk_promo != "") {
                                                                    var satuan_pp = data.hargajualk_promo;
                                                                } else {
                                                                    var satuan_pp = data.hargajual_konv_promo;
                                                                }
                                                            }
                                                            //  if (!data.hargajual_konv_promo == "") {
                                                            //     var satuan_pp = data.hargajual_konv_promo;
                                                            // }else if (!data.hargajualk_promo == "") {
                                                            //     var satuan_pp = data.hargajualk_promo;
                                                            // } else if (!data.hargajualb_promo == "") {
                                                            //     var satuan_pp = data.hargajualb_promo;
                                                            // }

                                    <?php } ?>
                                    var stok = localStorage.getItem(data.nama);
                                    var min_stok = 10
                                    // console.log(stok, min_stok);
                                    if (stok < min_stok) {
                                        swal({
                                            title: "Opss..!",
                                            text: "Barang " + data.nama + " sisa " + stok, //sisa
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
                                        $("#diskon_item").prop('disabled', false);
                                        $('.satuan' + counter + '').html(satuann);
                                        $('.harga' + counter + '').val(satuan_pp.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                        // $('.qty_isi'+counter+'').val(qtyyyx);
                                        $('.jumlah' + counter + '').val(satuan_pp.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                        var total_pos_fix = 0;
                                        for (let t = 1; t <= counter; t++) {
                                            total_pos_fix += parseInt($(".jumlah" + t + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                        }
                                        $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                        var qty_isi = $(".satuan" + counter + "")[0].value //qty isi satuan
                                        var tipe_satuan = qty_isi.split(',')[2];
                                        var satuan_xxx = qty_isi.split(',')[1];

                                        // var qty = $("input[id='idq" + counter + "']")[0].value * qty_isi.split(',')[0]
                                        var qty = $("input[id='idq" + counter + "']")[0].value
                                       
                                        if (data.cek_sisa_stok == 'yes') {
                                            $('.stock' + counter + '').val(Math.ceil(data.sisa_stock));
                                            $('.stock-c' + counter + '').val(Math.ceil(data.sisa_stock - qty));
                                        }else{
                                            if (tipe_satuan == 'kecil') {
                                                kalkulasi_satuan(tipe_satuan, data.stok, data.qty_kecil, qty, counter, satuan_x[0].value.split(',')[3])
                                            } else if (tipe_satuan == 'besar') {
                                                kalkulasi_satuan(tipe_satuan, data.stok, data.qty_konv, qty, counter, satuan_x[0].value.split(',')[3])
                                            } else if (tipe_satuan == 'konv') {
                                                kalkulasi_satuan(tipe_satuan, data.stok, data.qty_konv, qty, counter,satuan_x[0].value.split(',')[3])
                                            }
                                        }
                                        
                                        
                                        //localStorage.setItem("id_barang", ui.item.description);
                                        // localStorage.setItem("satuan", satuan_xxx);//pengurangan stok dengan localstorage
                                        // localStorage.setItem("stok_terakhir", satuan_xxx);
                                        // kalkulasi_satuan(tipe_satuan,data.stok,data.qty_konv,qty,counter)
                                        // }
                                        // console.log(data.nama)
                                        $('.total_item').val(counter)
                                        // console.log(satuan_x[0].value.split(',')[3])
                                    }

                                }
                            });
                            return false;
                            // });
                        }
                    });

                    qty.keyup(function() {
                        var id = $(this).val();
                        i = this.id.slice(3);
                        j = this.value;
                        var qty_isi = satuan_x[0].value //isi satuan
                        var diskon_item = $("input[id='idd" + i + "']")[0].value
                        var stock_c = $('.stock-c' + i + '').val()
                        // var stock = $('.stock' + i + '').val()
                        if (stock_c < 0) {
                            swal({
                                title: "Opss..!",
                                text: "Stock sisa di bawah 10",
                                icon: "warning",
                                dangerMode: true,
                            }).then((r) => {
                                if (r) {
                                    // location.reload();
                                    //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                                    // swal({
                                    //   text : "oke"
                                    // })
                                }
                            });

                        } else {
                            // var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * j * qty_isi.split(',')[0] - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                            var jumlah = $('.harga' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, '') * j - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                            $('.jumlah' + i + '').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                            // $('.stock-c' + i + '').val($('.stock' + i + '').val() - j * qty_isi.split(',')[0]);
                            var total_pos_fix = 0;
                            for (let t = 1; t <= counter; t++) {
                                total_pos_fix += parseInt($(".jumlah" + t + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                            }
                            $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                            var qty_isi = $(".satuan" + i + "")[0].value //qty isi satuan
                            var tipe_satuan = qty_isi.split(',')[2];
                            var id_barangg = $('.id_barang' + i + '').val();

                            $.ajax({
                                url: "<?= site_url('pos/search_barang'); ?>",
                                method: "POST",
                                data: {
                                    id: id_barangg
                                },
                                async: true,
                                dataType: 'json',
                                success: function(data2) {
                                    

                                    if (tipe_satuan == 'kecil') {
                                        kalkulasi_satuan(tipe_satuan, data2.stok, data2.qty_kecil, j, i, qty_isi.split(',')[3])
                                    } else if (tipe_satuan == 'besar') {
                                        if (data2.qty_konv != '0') {
                                            var cek_satuan_x = data2.qty_konv;
                                        } else {
                                            var cek_satuan_x = data2.qty_kecil;
                                        }
                                        kalkulasi_satuan(tipe_satuan, data2.stok, cek_satuan_x, j, i, qty_isi.split(',')[3])
                                    } else if (tipe_satuan == 'konv') {
                                        kalkulasi_satuan(tipe_satuan, data2.stok, data2.qty_konv, j, i,qty_isi.split(',')[3])
                                    }
                                    // console.log(tipe_satuan)
                                }
                            })

                        }

                    });

                    diskon_item.keyup(function() {
                        i = this.id.slice(3);
                        j = this.value;
                        var qty = $("input[id='idq" + i + "']")[0].value
                        var qty_isi_satuan = satuan_x[0].value //qty satuan

                        var jumlah = $('.harga' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, '') * qty - j.replace(/[^a-zA-Z0-9 ]/g, '')
                        $('.jumlah' + i + '').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                        $('.stock-c' + i + '').val($('.stock' + i + '').val() - qty * qty_isi_satuan.split(',')[0]);
                        var total_pos_fix = 0;
                        for (let t = 1; t <= counter; t++) {
                            total_pos_fix += parseInt($(".jumlah" + t + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                        }
                        $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                    })

                    function kalkulasi_satuan(satuan,stok,qty_konv,qty,counter,konv = 0){
                        var barang = $('.barang' + counter).val();

                        if (localStorage.getItem(barang) >= 1) {
                            var stok = localStorage.getItem(barang)
                        }else{
                            var stok = stok
                        }

                        console.log(satuan, stok, qty_konv, qty);


                        if( (satuan == 'besar' || satuan == 'kecil') && konv == '0' && qty_konv != '0') {
                            konv = qty_konv;
                        }
                        if (konv != '0') { // jika lebih dari 0
                            // if(satuan == 'besar' ) { qty_konv = 1}
                            $('.stock' + counter + '').val(Math.ceil(stok / qty_konv));
                            $('.stock-c' + counter + '').val(Math.ceil(stok / qty_konv) - qty);

                            localStorage.setItem(barang, Math.ceil(stok  - qty_konv ) );
                        } else {
                            $('.stock' + counter + '').val(Math.ceil(stok));
                            $('.stock-c' + counter + '').val(Math.ceil(stok - qty));

                            localStorage.setItem(barang, Math.ceil(stok - qty ));
                        }
                    }

                    satuan_x.change(function() {
                        var id = $(this).val();
                        i = this.id.slice(3);
                        j = this.value; //isi satuan
                        // updateStok(counter);
                        var qty = $("input[id='idq" + i + "']")[0].value
                        var diskon_item = $("input[id='idd" + i + "']")[0].value
                        var id_barangg = $('.id_barang' + i + '').val();
                        var tipe_satuan = j.split(',')[2];
                        var stock_c = $('.stock-c' + i + '').val()
                        if (stock_c <= 0) {
                            swal({
                                title: "Opss..!",
                                text: "Stock sisa di bawah 10",
                                icon: "warning",
                                dangerMode: true,
                            })
                        } else {
                            $.ajax({
                                method: "POST",
                                url: "<?= site_url('pos/search_barang'); ?>",
                                data: {
                                    id: id_barangg
                                },
                                async: true,
                                dataType: 'json',
                                success: function(data2) {

                                    <?php if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'umum') { ?>
                                            if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                var qtyyyx = data2.qty_kecil;
                                                var satuan_p = data2.hargajualk_retail;

                                            }
                                            if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                var qtyyyx = data2.qty_konv;
                                                var satuan_p = data2.hargajual_konv_retail
                                            }

                                            if (data2.id_satuan_besar == j.split(',')[1]) {
                                                var qtyyyx = data2.qty_besar;
                                                var satuan_p = data2.hargajualb_retail;
                                            }


                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'retail') { ?>
                                                if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                    var qtyyyx = data2.qty_kecil;
                                                    var satuan_p = data2.hargajualk_retail;

                                                }
                                                if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                    var qtyyyx = data2.qty_konv;
                                                    var satuan_p = data2.hargajual_konv_retail
                                                }

                                                if (data2.id_satuan_besar == j.split(',')[1]) {
                                                    var qtyyyx = data2.qty_besar;
                                                    var satuan_p = data2.hargajualb_retail;

                                                }


                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'grosir') { ?>
                                                    if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                        var qtyyyx = data2.qty_kecil;
                                                        var satuan_p = data2.hargajualk_grosir;

                                                    }
                                                    if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                        var qtyyyx = data2.qty_konv;
                                                        var satuan_p = data2.hargajual_konv_grosir
                                                    }

                                                    if (data2.id_satuan_besar == j.split(',')[1]) {
                                                        var qtyyyx = data2.qty_besar;
                                                        var satuan_p = data2.hargajualb_grosir;
                                                    }


                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'partai') { ?>
                                                        if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                            var qtyyyx = data2.qty_kecil;
                                                            var satuan_p = data2.hargajualk_partai;

                                                        }
                                                        if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                            var qtyyyx = data2.qty_konv;
                                                            var satuan_p = data2.hargajual_konv_partai
                                                        }

                                                        if (data2.id_satuan_besar == j.split(',')[1]) {
                                                            var qtyyyx = data2.qty_besar;
                                                            var satuan_p = data2.hargajualb_partai;
                                                        }


                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'promo') { ?>
                                                            if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                                var qtyyyx = data2.qty_kecil;
                                                                var satuan_p = data2.hargajualk_promo;

                                                            }
                                                            if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                                var qtyyyx = data2.qty_konv;
                                                                var satuan_p = data2.hargajual_konv_promo
                                                            }

                                                            if (data2.id_satuan_besar == j.split(',')[1]) {
                                                                var qtyyyx = data2.qty_besar;
                                                                var satuan_p = data2.hargajualb_promo
                                                            }


                                    <?php } ?>
                                    var jumlah = satuan_p * qty - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                                    $('.harga' + i + '').val(satuan_p.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                    $('.jumlah' + i + '').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));


                                    // if (j.split(',')[1] == 'SLOP') {
                                    //     $('.stock' + i + '').val(data2.stok / j.split(',')[0]);
                                    //     $('.stock-c' + i + '').val(data2.stok / j.split(',')[0] - qty);
                                    // }else{
                                    //     $('.stock' + i + '').val(data2.stok / j.split(',')[0]);
                                    //     $('.stock-c' + i + '').val(data2.stok - qty * j.split(',')[0]);
                                    // }
                                    var total_pos_fix = 0;
                                    for (let t = 1; t <= counter; t++) {
                                        total_pos_fix += parseInt($(".jumlah" + t + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                    }
                                    // if (tipe_satuan == 'kecil') {
                                    //     kalkulasi_satuan(tipe_satuan,data2.stok,data2.qty_kecil,qty,i)
                                    // }else if(tipe_satuan == 'besar'){
                                    //     // var cek_satuan_x = data2.qty_konv == null ? 0 : data2.qty_kecil
                                    //     if((data2.hargajual_konv_retail == null || data2.hargajual_konv_retail == 0) && data2.hargajualk_retail != ""){
                                    //             var cek_satuan_x = data2.hargajualk_retail;
                                    //     }      
                                    //     kalkulasi_satuan(tipe_satuan,data2.stok,cek_satuan_x,qty,i)
                                    // }else if(tipe_satuan == 'konv'){
                                    //     kalkulasi_satuan(tipe_satuan,data2.stok,1,qty,i)//dibagi 1
                                    // }
                                    if (tipe_satuan == 'kecil') {
                                        kalkulasi_satuan(tipe_satuan, data2.stok, data2.qty_kecil, qty, i, j.split(',')[3])
                                    } else if (tipe_satuan == 'besar') {
                                        if (data2.qty_konv != '0') {
                                            var cek_satuan_x = data2.qty_konv;
                                        } else {
                                            var cek_satuan_x = data2.qty_kecil;
                                        }
                                        kalkulasi_satuan(tipe_satuan, data2.stok, cek_satuan_x, qty, i, j.split(',')[3])
                                    } else if (tipe_satuan == 'konv') {
                                        kalkulasi_satuan(tipe_satuan, data2.stok, 1, qty, i)
                                    }
                                    // var stok = data2.stok;
                                    // if (tipe_satuan == "besar" && !data2.qty_kecil && !data2.qty_konv) {
                                    //     jumlah = stok;
                                    // } else if (tipe_satuan == "besar" && data2.qty_kecil && !data2.qty_konv) {
                                    //     if (data2.qty_kecil == '0') {
                                    //         jumlah = stok;
                                    //     } else {
                                    //         jumlah = Math.floor(stok / data2.qty_kecil);
                                    //     }
                                    // } else if (tipe_satuan == "besar" && data2.qty_kecil && data2.qty_konv) {
                                    //     if (data2.qty_kecil == '0') {
                                    //         jumlah = stok;
                                    //     } else {
                                    //         if (data2.qty_konv == '0') {
                                    //             jumlah = Math.floor(stok / data2.qty_kecil);
                                    //         } else {
                                    //             jumlah = Math.floor(stok / (data2.qty_kecil * data2.qty_konv));
                                    //         }
                                    //     }
                                    // } else if (tipe_satuan == "kecil" && !data2.qty_konv) {
                                    //     jumlah = stok;
                                    // } else if (tipe_satuan == "kecil" && data2.qty_konv) {
                                    //     if (data2.qty_konv == '0') {
                                    //         jumlah = stok;
                                    //     } else {
                                    //         jumlah = Math.floor(stok / data2.qty_konv);
                                    //     }
                                    // } else if (tipe_satuan == "konv") {
                                    //     jumlah = stok;
                                    // }

                                    // console.log(tipe_satuan, data2.qty_kecil, jumlah)

                                    // $('.stock' + i + '').val(Math.ceil(jumlah));
                                    // $('.stock-c' + i + '').val(Math.ceil(jumlah) - qty);

                                    // if (j.split(',')[1] == 'BAL') {
                                    //     $('.stock' + counter + '').val(data2.stok / data2.qty_konv);
                                    //     $('.stock-c' + counter + '').val(Math.ceil(data2.stok / data2.qty_konv - qty));
                                    // }else if (j.split(',')[1] == 'SLOP') {
                                    //     $('.stock' + counter + '').val(data2.stok / data2.qty_kecil);
                                    //     $('.stock-c' + counter + '').val(data2.stok / data2.qty_kecil - qty);
                                    // }else{
                                    //     if (j.split(',')[1] == data2.id_satuan_besar) {
                                    //         if (j.split(',')[1] == 'KARUNG') {
                                    //             $('.stock' + counter + '').val(data2.stok / data2.qty_kecil);
                                    //             $('.stock-c' + counter + '').val(data2.stok - qty * data2.qty_besar);           
                                    //         }
                                    //         else{
                                    //             $('.stock' + counter + '').val(data2.stok);
                                    //             $('.stock-c' + counter + '').val(data2.stok - qty * data2.qty_besar);
                                    //         }
                                    //     }else if(j.split(',')[1] == data2.id_satuan_kecil){
                                    //         $('.stock' + counter + '').val(data2.stok);
                                    //         $('.stock-c' + counter + '').val(data2.stok - qty);
                                    //     }else if(j.split(',')[1] == data2.id_satuan_kecil_konv){
                                    //          $('.stock' + counter + '').val(data2.stok);
                                    //         $('.stock-c' + counter + '').val(data2.stok - qty * data2.qty_konv);
                                    //     }

                                    // }
                                    $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                }
                            })
                        }
                        // var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * qty / j.split(',')[0] - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')


                    })
                    var rupiah = document.getElementById('idd' + counter + '');
                }
                // var counter = <?= $this->uri->segment(3) == true ? 1 : 0 ?>;
                <?php if ($this->uri->segment(4) == 'edit_transaksi' || $this->uri->segment(4) == 'edit_hold') { ?> //load hold atau edit transaksi yang sudah di bayar
                        $.ajax({
                            url: "<?= site_url('pos/load'); ?>",
                            method: "POST",
                            data: {
                                id: <?= $this->uri->segment(3) ?>
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                var row_data = '';
                                var total_pos = 0;
                                console.log(data[0].pelanggan)
                                $.ajax({
                                    url: "<?= site_url('pos/get_customers'); ?>",
                                    method: "POST",
                                    data: {
                                        id: data[0].pelanggan
                                    },
                                    async: true,
                                    dataType: 'json',
                                    success: function(data3) {
                                        var cust = "";
                                        for (var k = 0; k < data3.length; k++) {
                                            if (data3[k].cek == '1') {
                                                cust += '<option selected value=' + data3[k].tipe_penjualan.toLowerCase() + "," + data3[k].id_customer + "," + data3[k].nama_toko + '>' + data3[k].nama_toko + '</option>'
                                            } else {
                                                cust += '<option value=' + data3[k].tipe_penjualan.toLowerCase() + "," + data3[k].id_customer + "," + data3[k].nama_toko + '>' + data3[k].nama_toko + '</option>'
                                            }
                                        }
                                        $('select[name="tipe"]').html(cust);
                                    }
                                })

                                $.ajax({
                                    url: "<?= site_url('pos/get_pengiriman'); ?>",
                                    method: "POST",
                                    data: {
                                        id: data[0].pengiriman
                                    },
                                    async: true,
                                    dataType: 'json',
                                    success: function(data4) {
                                        var pengirimann = "";
                                        for (var k = 0; k < data4.length; k++) {
                                            if (data4[k].cek == '1') {
                                                pengirimann += '<option selected value=' + data4[k].id + '>' + data4[k].nama + '</option>'
                                            } else {
                                                pengirimann += '<option value=' + data4[k].id + '>' + data4[k].nama + '</option>'

                                            }
                                        }
                                        $('.pengiriman').html(pengirimann);
                                    }
                                })

                                for (let i = 0; i < data.length; i++) {
                                    // barang += '';
                                    counter++;
                                    var satuan_option = '';
                                    if (data[i].id_satuan_besar == data[i].satuan) { //satuan besar
                                        var kd_satuan = data[i].id_satuan_besar
                                        var qty_satuan = data[i].qty_besar + "," + data[i].id_satuan_besar + ",besar," + data[i].qty_konv
                                        satuan_option += '<option selected value="' + qty_satuan + '">' + kd_satuan + '</option>'
                                    } else if (data[i].id_satuan_besar != data[i].satuan && !data[i].id_satuan_besar == "") {
                                        var kd_satuan = data[i].id_satuan_besar
                                        var qty_satuan = data[i].qty_besar + "," + data[i].id_satuan_besar + ",besar," + data[i].qty_konv
                                        satuan_option += '<option value="' + qty_satuan + '">' + kd_satuan + '</option>'
                                    }

                                    if (data[i].id_satuan_kecil == data[i].satuan) { // satuan kecil
                                        var kd_satuan = data[i].id_satuan_kecil
                                        var qty_satuan = data[i].qty_kecil + "," + data[i].id_satuan_kecil + ",kecil," + data[i].qty_konv
                                        satuan_option += '<option selected value="' + qty_satuan + '">' + kd_satuan + '</option>'
                                    } else if (data[i].id_satuan_kecil != data[i].satuan && !data[i].id_satuan_kecil == "") {
                                        var kd_satuan = data[i].id_satuan_kecil
                                        var qty_satuan = data[i].qty_kecil + "," + data[i].id_satuan_kecil + ",kecil," + data[i].qty_konv
                                        satuan_option += '<option value="' + qty_satuan + '">' + kd_satuan + '</option>'
                                    }

                                    if (data[i].id_satuan_kecil_konv == data[i].satuan) { // satuan kecil kov
                                        var kd_satuan = data[i].id_satuan_kecil_konv
                                        var qty_satuan = data[i].qty_konv + "," + data[i].id_satuan_kecil_konv + ",konv," + data[i].qty_konv
                                        satuan_option += '<option selected value="' + qty_satuan + '">' + kd_satuan + '</option>'
                                    } else if (data[i].id_satuan_kecil_konv != data[i].satuan && !data[i].id_satuan_kecil_konv == "") {
                                        var kd_satuan = data[i].id_satuan_kecil_konv
                                        var qty_satuan = data[i].qty_konv + "," + data[i].id_satuan_kecil_konv + ",konv," + data[i].qty_konv
                                        satuan_option += '<option value="' + qty_satuan + '">' + kd_satuan + '</option>'
                                    }
                                    var qty_kurangi = data[i].stok - parseInt(qty_satuan)

                                    // var tipe_cust = "<?= strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) ?>"
                                    // var id_cust = "<?= explode(',', $this->session->userdata('tipe_penjualan'))[1] ?>"
                                    // if (tipe_cust == data[i].tipe_penjualan.toLowerCase() && data[i].id_customer) {
                                    //     var action_tipe = 'selected'
                                    // }

                                    $('.no_struk').val(data[i].no_struk);
                                    $('.tgl_transaksi').val(data[i].tgl_transaksi);

                                    // $('.pengiriman').html('<option value=' + data[i].pengiriman + ' selected>' + data[i].nama + '</option>');
                                    total_pos += parseInt(data[i].jumlah)
                                    // var qty_isi = $(".satuan"+counter+"")[0].value //qty isi satuan
                                    // var tipe_satuan = qty_isi.split(',')[2];
                                    // if (tipe_satuan == 'kecil') {
                                    //     kalkulasi_satuan(tipe_satuan,data.stok,data.qty_kecil,qty,counter,satuan_x[0].value.split(',')[3])
                                    // }else if(tipe_satuan == 'besar'){
                                    //     kalkulasi_satuan(tipe_satuan,data.stok,data.qty_konv,qty,counter,satuan_x[0].value.split(',')[3])
                                    // }else if(tipe_satuan == 'konv'){
                                    //     kalkulasi_satuan(tipe_satuan,data.stok,1,qty,counter)
                                    // }
                                    $('#load-list tbody').append(
                                        '<tr class="cb" id=r' + counter + '>' +
                                        '<td>' +
                                        '<button id=' + counter + ' value="' + data[i].id_transaksi_item + '" type="button" class="btn btn-danger btn-square delete_item"><i class="icon-trash"></i></button>' +
                                        '</td>' +
                                        '<td>' +
                                        '<input class="form-control barang' + counter + '" value="' + data[i].barang + '">' +
                                        '<input type="hidden" value="' + data[i].kd_barang + '" class="form-control id_barang' + counter + '">' +
                                        '<input type="hidden" value="' + data[i].id_transaksi_item + '" class="form-control id_item' + counter + '">' +
                                        '</td>' +
                                        '<td>' +
                                        '<input id="idq' + counter + '" value="' + data[i].qty + '" type="number" style="text-align:center;" value="1" class="form-control qty' + counter + '">' +
                                        '</td>' +
                                        '<td>' +
                                        '<select id="ids' + counter + '" class="form-control satuan' + counter + '" style="cursor: text;">' +
                                        // '<option value="">Pilih satuan</option>'+
                                        satuan_option +
                                        '</select>' +
                                        '</td>' +
                                        '<td>' +
                                        '<input readonly type="text" value="' + data[i].harga_satuan.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + '" class="form-control harga' + counter + '">' +
                                        '</td>' +
                                        '<td>' +
                                        '<input type="text" id="idd' + counter + '" value="' + data[i].diskon_item.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + '" placeholder="0" style="text-align:center;" class="form-control diskon_item' + counter + '">' +
                                        '</td>' +
                                        '<td>' +
                                        '<input readonly type="text" value="' + data[i].jumlah.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + '" class="form-control jumlah' + counter + '">' +
                                        '</td>' +
                                        '<td>' +
                                        '<div class="row">' +
                                        '<div class="col-xl-6">' +
                                        '<input readonly type="text" value="' + data[i].stok + '" class="form-control stock' + counter + '">' +
                                        '</div>' +
                                        '<div class="col-xl-6">' +
                                        '<input readonly type="text" value=' + qty_kurangi + ' class="form-control stock-c' + counter + '">' +
                                        ' </div>' +
                                        '</div>' +
                                        '</td>' +
                                        '</tr>');
                                    // '</tr>');
                                    // check_pos()
                                }

                                $('.total_pos').html('Rp.' + total_pos.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                $('.total_item').val(data.length);
                                for (let xx = 0; xx <= counter; xx++) {
                                    var data = "<?= base_url('pos/get_barang') ?>";
                                    $(".barang" + xx + "").autocomplete({
                                        source: data,
                                        select: function(event, ui) {
                                            $('.barang' + xx + '').val(ui.item.label);
                                            $('.id_barang' + xx + '').val(ui.item.description);
                                            var i, j;
                                            $.ajax({
                                                url: "<?= site_url('pos/search_barang'); ?>",
                                                method: "POST",
                                                data: {
                                                    id: ui.item.description
                                                },
                                                async: true,
                                                dataType: 'json',
                                                success: function(data) {
                                                    var satuann = ''
                                                    if (data.id_satuan_kecil_konv != "") {
                                                        satuann += '<option value=' + data.qty_konv + "," + data.id_satuan_kecil_konv + ',konv,' + data.qty_konv + '>' + data.id_satuan_kecil_konv + ' </option>';
                                                    }
                                                    if (data.id_satuan_kecil != "") {
                                                        satuann += '<option value=' + data.qty_kecil + "," + data.id_satuan_kecil + ',kecil,' + data.qty_konv + '>' + data.id_satuan_kecil + ' </option>';
                                                    }
                                                    if (data.id_satuan_besar != "") {
                                                        satuann += '<option value=' + data.qty_besar + "," + data.id_satuan_besar + ',besar,' + data.qty_konv + '>' + data.id_satuan_besar + ' </option>';
                                                    }


                                                    <?php if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'umum') { ?>
                                                            var harga1 = formatRupiah(data.hargajualb_retail)
                                                            if (data.id_satuan_besar != "") {
                                                                var qtyyy = data.qty_besar
                                                            }
                                                            var jumlah = data.hargajualb_retail * qtyyy
                                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'retail') { ?>
                                                                var harga1 = formatRupiah(data.hargajualb_retail)
                                                                if (data.id_satuan_besar != "") {
                                                                    var qtyyy = data.qty_besar
                                                                }
                                                                var jumlah = data.hargajualb_retail * qtyyy
                                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'grosir') { ?>
                                                                    var harga1 = formatRupiah(data.hargajualb_grosir)
                                                                    if (data.id_satuan_kecil != "") {
                                                                        var qtyyy = data.qty_kecil
                                                                    }
                                                                    var jumlah = data.hargajualk_grosir * qtyyy
                                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'partai') { ?>
                                                                        var harga1 = formatRupiah(data.hargajualb_partai)
                                                    <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'promo') { ?>
                                                                            var harga1 = formatRupiah(data.hargajualb_promo)
                                                    <?php } ?>
                                                    var stok = data.stok
                                                    var min_stok = data.min_stok
                                                    if (stok < min_stok) {
                                                        swal({
                                                            title: "Opss..!",
                                                            text: "Barang " + data.nama + " sisa " + data.stok,
                                                            icon: "warning",
                                                            dangerMode: true,
                                                        }).then((r) => {
                                                            if (r) {
                                                                // location.reload();
                                                                //   $('input[id="idq'+i+'"').val($('p.stock'+i+'').text() - $('p.stock-c'+i+'').text())
                                                                // swal({
                                                                //   text : "oke"
                                                                // })
                                                            }
                                                        });
                                                    } else {
                                                        $("#diskon_item").prop('disabled', false);
                                                        $('.satuan' + xx + '').html(satuann);
                                                        $('.harga' + xx + '').val(harga1);
                                                        $('.qty_isi' + xx + '').val(qtyyy);
                                                        $('.jumlah' + xx + '').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                        var total_pos_fix = 0;
                                                        for (let t = 1; t <= xx; t++) {
                                                            total_pos_fix += parseInt($(".jumlah" + t + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                                        }
                                                        $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                        $('.stock' + xx + '').val(stok);
                                                        var qty_isi = $(".satuan" + xx + "")[0].value //qty isi satuan
                                                        var qty = $("input[id='idq" + xx + "']")[0].value * qty_isi.split(',')[0]
                                                        $('.stock-c' + xx + '').val(stok - qty);
                                                        // console.log(data.nama)
                                                        $('.total_item').val(counter)

                                                    }

                                                }
                                            });
                                            return false;
                                            // });
                                        }
                                    });
                                    var qty = $(".qty" + xx + "")
                                    var diskon_item = $(".diskon_item" + xx + "")
                                    var satuan_x = $(".satuan" + xx + "")
                                    qty.keyup(function() {
                                        var id = $(this).val();
                                        i = this.id.slice(3);
                                        j = this.value;
                                        var qty_isi = satuan_x[0].value //isi satuan
                                        var diskon_item = $("input[id='idd" + i + "']")[0].value
                                        var stock_c = $('.stock-c' + i + '').val()
                                        if (stock_c == 0) {
                                            swal({
                                                title: "Opss..!",
                                                text: "Stock sisa 10",
                                                icon: "warning",
                                                dangerMode: true,
                                            }).then((r) => {
                                                if (r) {
                                                    location.reload();
                                                }
                                            });

                                        } else {
                                            // var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * j * qty_isi.split(',')[0] - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                                            var jumlah = $('.harga' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, '') * j - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                                            $('.jumlah' + i + '').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                            // $('.stock-c' + i + '').val($('.stock' + i + '').val() - j * qty_isi.split(',')[0]);
                                            var qty_isi = $(".satuan" + i + "")[0].value //qty isi satuan
                                            var tipe_satuan = qty_isi.split(',')[2];
                                            var id_barangg = $('.id_barang' + i + '').val();

                                            $.ajax({
                                                url: "<?= site_url('pos/search_barang'); ?>",
                                                method: "POST",
                                                data: {
                                                    id: id_barangg
                                                },
                                                async: true,
                                                dataType: 'json',
                                                success: function(data2) {
                                                    // if (tipe_satuan == 'kecil') {
                                                    //     kalkulasi_satuan(tipe_satuan, data2.stok, data2.qty_kecil, j, counter, qty_isi.split(',')[3])
                                                    // } else if (tipe_satuan == 'besar') {
                                                    //     if (data2.qty_konv != '0') {
                                                    //         var cek_satuan_x = data2.qty_konv;
                                                    //     } else {
                                                    //         var cek_satuan_x = data2.qty_kecil;
                                                    //     }
                                                    //     kalkulasi_satuan(tipe_satuan, data2.stok, cek_satuan_x, j, counter, qty_isi.split(',')[3])
                                                    // } else if (tipe_satuan == 'konv') {
                                                    //     kalkulasi_satuan(tipe_satuan, data2.stok, 1, j, counter)
                                                    // }

                                                    var stok = data2.stok;
                                                    if (tipe_satuan == "besar" && !data2.qty_kecil && !data2.qty_konv) {
                                                        jumlah = stok;
                                                    } else if (tipe_satuan == "besar" && data2.qty_kecil && !data2.qty_konv) {
                                                        if (data2.qty_kecil == '0') {
                                                            jumlah = stok;
                                                        } else {
                                                            jumlah = Math.floor(stok / data2.qty_kecil);
                                                        }
                                                    } else if (tipe_satuan == "besar" && data2.qty_kecil && data2.qty_konv) {
                                                        if (data2.qty_kecil == '0') {
                                                            jumlah = stok;
                                                        } else {
                                                            if (data2.qty_konv == '0') {
                                                                jumlah = Math.floor(stok / data2.qty_kecil);
                                                            } else {
                                                                jumlah = Math.floor(stok / (data2.qty_kecil * data2.qty_konv));
                                                            }
                                                        }
                                                    } else if (tipe_satuan == "kecil" && !data2.qty_konv) {
                                                        jumlah = stok;
                                                    } else if (tipe_satuan == "kecil" && data2.qty_konv) {
                                                        if (data2.qty_konv == '0') {
                                                            jumlah = stok;
                                                        } else {
                                                            jumlah = Math.floor(stok / data2.qty_konv);
                                                        }
                                                    } else if (tipe_satuan == "konv") {
                                                        jumlah = stok;
                                                    }

                                                    $('.stock' + i + '').val(Math.ceil(jumlah));
                                                    $('.stock-c' + i + '').val(Math.ceil(jumlah) - qty);
                                                }
                                            })
                                            var total_pos_fix = 0;
                                            for (let t = 1; t <= counter; t++) {
                                                total_pos_fix += parseInt($(".jumlah" + t + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                            }
                                            $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));


                                        }

                                    });

                                    diskon_item.keyup(function() {
                                        i = this.id.slice(3);
                                        j = this.value;
                                        var qty = $("input[id='idq" + i + "']")[0].value
                                        var qty_isi_satuan = satuan_x[0].value //qty satuan

                                        var jumlah = $('.harga' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, '') * qty - j.replace(/[^a-zA-Z0-9 ]/g, '')
                                        $('.jumlah' + i + '').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                        $('.stock-c' + i + '').val($('.stock' + i + '').val() - qty * qty_isi_satuan.split(',')[0]);
                                        var total_pos_fix = 0;
                                        for (let t = 1; t <= counter; t++) {
                                            total_pos_fix += parseInt($(".jumlah" + t + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                        }
                                        $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                    })

                                    function kalkulasi_satuan(satuan, stok, qty_konv, qty, counter, konv = 0) {

                                        if (satuan == 'besar' && konv == '0' && qty_konv != '0') {
                                            konv = qty_konv;
                                        }

                                        if (konv != '0') {
                                            // if(satuan == 'besar' ) { qty_konv = 1}
                                            $('.stock' + i + '').val(Math.ceil(stok / qty_konv));
                                            $('.stock-c' + i + '').val(Math.ceil(stok / qty_konv) - qty);
                                        } else {
                                            $('.stock' + i + '').val(Math.ceil(stok));
                                            $('.stock-c' + i + '').val(Math.ceil(stok - qty));
                                        }
                                    }
                                    satuan_x.change(function() {
                                        var id = $(this).val();
                                        i = this.id.slice(3);
                                        j = this.value; //isi satuan
                                        var qty = $("input[id='idq" + i + "']")[0].value
                                        var diskon_item = $("input[id='idd" + i + "']")[0].value
                                        var id_barangg = $('.id_barang' + counter + '').val();
                                        var tipe_satuan = j.split(',')[2];
                                        $.ajax({
                                            url: "<?= site_url('pos/search_barang'); ?>",
                                            method: "POST",
                                            data: {
                                                id: id_barangg
                                            },
                                            async: true,
                                            dataType: 'json',
                                            success: function(data2) {
                                                <?php if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'umum') { ?>
                                                        if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                            var qtyyyx = data2.qty_kecil;
                                                            var satuan_p = data2.hargajualk_retail;

                                                        }
                                                        if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                            var qtyyyx = data2.qty_konv;
                                                            var satuan_p = data2.hargajual_konv_retail
                                                        }

                                                        if (data2.id_satuan_besar == j.split(',')[1]) {
                                                            var qtyyyx = data2.qty_besar;
                                                            var satuan_p = data2.hargajualb_retail;
                                                        }


                                                <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'retail') { ?>
                                                            if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                                var qtyyyx = data2.qty_kecil;
                                                                var satuan_p = data2.hargajualk_retail;

                                                            }
                                                            if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                                var qtyyyx = data2.qty_konv;
                                                                var satuan_p = data2.hargajual_konv_retail
                                                            }

                                                            if (data2.id_satuan_besar == j.split(',')[1]) {
                                                                var qtyyyx = data2.qty_besar;
                                                                var satuan_p = data2.hargajualb_retail;

                                                            }


                                                <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'grosir') { ?>
                                                                if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                                    var qtyyyx = data2.qty_kecil;
                                                                    var satuan_p = data2.hargajualk_grosir;

                                                                }
                                                                if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                                    var qtyyyx = data2.qty_konv;
                                                                    var satuan_p = data2.hargajual_konv_grosir
                                                                }

                                                                if (data2.id_satuan_besar == j.split(',')[1]) {
                                                                    var qtyyyx = data2.qty_besar;
                                                                    var satuan_p = data2.hargajualb_grosir;
                                                                }


                                                <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'partai') { ?>
                                                                    if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                                        var qtyyyx = data2.qty_kecil;
                                                                        var satuan_p = data2.hargajualk_partai;

                                                                    }
                                                                    if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                                        var qtyyyx = data2.qty_konv;
                                                                        var satuan_p = data2.hargajual_konv_partai
                                                                    }

                                                                    if (data2.id_satuan_besar == j.split(',')[1]) {
                                                                        var qtyyyx = data2.qty_besar;
                                                                        var satuan_p = data2.hargajualb_partai;
                                                                    }


                                                <?php } else if (strtolower(explode(',', $this->session->userdata('tipe_penjualan'))[0]) == 'promo') { ?>
                                                                        if (j.split(',')[1] == data2.id_satuan_kecil) {
                                                                            var qtyyyx = data2.qty_kecil;
                                                                            var satuan_p = data2.hargajualk_promo;

                                                                        }
                                                                        if (data2.id_satuan_kecil_konv == j.split(',')[1]) {
                                                                            var qtyyyx = data2.qty_konv;
                                                                            var satuan_p = data2.hargajual_konv_promo
                                                                        }

                                                                        if (data2.id_satuan_besar == j.split(',')[1]) {
                                                                            var qtyyyx = data2.qty_besar;
                                                                            var satuan_p = data2.hargajualb_promo
                                                                        }


                                                <?php } ?>
                                                if (tipe_satuan == 'kecil') {
                                                    kalkulasi_satuan(tipe_satuan, data2.stok, data2.qty_kecil, qty, i, j.split(',')[3])
                                                } else if (tipe_satuan == 'besar') {
                                                    if (data2.qty_konv != '0') {
                                                        var cek_satuan_x = data2.qty_konv;
                                                    } else {
                                                        var cek_satuan_x = data2.qty_kecil;
                                                    }
                                                    kalkulasi_satuan(tipe_satuan, data2.stok, cek_satuan_x, qty, i, j.split(',')[3])
                                                } else if (tipe_satuan == 'konv') {
                                                    kalkulasi_satuan(tipe_satuan, data2.stok, 1, qty, i)
                                                }

                                                var jumlah = satuan_p * qty - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')
                                                $('.harga' + i + '').val(satuan_p.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                $('.jumlah' + i + '').val(jumlah.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                // $('.stock-c' + i + '').val($('.stock' + i + '').val() - qty * j.split(',')[0]);
                                                var total_pos_fix = 0;
                                                for (let t = 1; t <= counter; t++) {
                                                    total_pos_fix += parseInt($(".jumlah" + t + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                                }
                                                $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                            }
                                        })
                                        // var jumlah = $('.harga'+i+'').val().replace(/[^a-zA-Z0-9 ]/g, '') * qty / j.split(',')[0] - diskon_item.replace(/[^a-zA-Z0-9 ]/g, '')


                                    })
                                }
                                $('.delete_item').click(function() {
                                    // e.preventDefault();

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
                                        $('.id_barang' + counter + '').removeClass('id_barang' + counter + '').addClass('id_barang' + parseInt(dig - 1) + '');
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
                                    var total_pos_fix = $('.total_pos').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') - parseInt($(".jumlah" + this.id + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                    $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

                                    $(this).closest('tr').remove();
                                    <?php if ($this->uri->segment(3) == true) { ?>
                                            $.ajax({
                                                url: "<?= site_url('pos/del_row_hold'); ?>",
                                                method: "POST",
                                                data: {
                                                    id: this.value
                                                },
                                                async: true,
                                                dataType: 'json',
                                                success: function(data) {
                                                    console.log(data)
                                                }
                                            })
                                    <?php } ?>
                                    // Decreasing total number of rows by 1.
                                    counter--;
                                    $('.total_item').val(counter)

                                    // });
                                });

                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                <?php } ?>


                // var rupiah3 = document.getElementById('diskon_all');
                // // var rupiah = document.getElementsByClassName('diskon_all');
                // rupiah3.addEventListener('keyup', function(e){
                //     rupiah3.value = formatRupiah(this.value, '');
                // });
                // function formatRupiah(angka, prefix){
                //     var number_string = angka.replace(/[^,\d]/g, '').toString(),
                //     split   		= number_string.split(','),
                //     sisa     		= split[0].length % 3,
                //     rupiah     		= split[0].substr(0, sisa),
                //     ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                //     // tambahkan titik jika yang di input sudah menjadi angka ribuan
                //     if(ribuan){
                //     separator = sisa ? '.' : '';
                //     rupiah += separator + ribuan.join('.');
                //     }

                //     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                //     return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                // }

                // var rupiah4 = document.getElementById('total_bayar');
                // rupiah4.addEventListener('keyup', function(e){
                //     rupiah4.value = formatRupiah(this.value, '');
                // });
                // function formatRupiah(angka, prefix){
                //     var number_string = angka.replace(/[^,\d]/g, '').toString(),
                //     split   		= number_string.split(','),
                //     sisa     		= split[0].length % 3,
                //     rupiah     		= split[0].substr(0, sisa),
                //     ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                //     // tambahkan titik jika yang di input sudah menjadi angka ribuan
                //     if(ribuan){
                //     separator = sisa ? '.' : '';
                //     rupiah += separator + ribuan.join('.');
                //     }

                //     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                //     return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                // }
                // var rupiah5 = document.getElementById('tunaii');
                // rupiah5.addEventListener('keyup', function(e){
                //     rupiah5.value = formatRupiah(this.value, '');
                // });

                $(".diskon_all").keyup(function(e) {
                    $(this).val(format($(this).val()));
                });
                $(".total_bayar").keyup(function(e) {
                    $(this).val(format($(this).val()));
                });
                $(".tunaii").keyup(function(e) {
                    $(this).val(format($(this).val()));
                });
                var format = function(num) {
                    var str = num.toString().replace("", ""),
                        parts = false,
                        output = [],
                        i = 1,
                        formatted = null;
                    if (str.indexOf(",") > 0) {
                        parts = str.split(".");
                        str = parts[0];
                    }
                    str = str.split("").reverse();
                    for (var j = 0, len = str.length; j < len; j++) {
                        if (str[j] != ".") {
                            output.push(str[j]);
                            if (i % 3 == 0 && j < (len - 1)) {
                                output.push(".");
                            }
                            i++;
                        }
                    }
                    formatted = output.reverse().join("");
                    return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
                };


                document.onkeyup = function(e) {
                    if (e.which == 18) {
                        window.location = '<?= base_url() ?>pos/';
                    } else if (e.which == 16) { //shift add barang
                        var max_fields = 100;
                        var wrapper = $("#sampel-wrapper");
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
                            // var barang = localStorage.getItem( $(".barang" + counter + "").val() );


                            if (counter < max_fields) {
                                counter++;
                                $(wrapper).append(
                                    '<tr class="cb" id=r' + counter + '>' +
                                    '<td>' +
                                    '<button id=' + counter + ' type="button" class="btn btn-danger btn-square delete_item"><i class="icon-trash"></i></button>' +
                                    '<td>' +
                                    '<input class="form-control barang' + counter + '">' +
                                    '<input type="hidden" class="form-control id_barang' + counter + '">' +
                                    '</td>' +
                                    '<td>' +
                                    '<input id="idq' + counter + '" type="number" style="text-align:center;" value="1" class="form-control qty' + counter + '">' +
                                    '</td>' +
                                    '<td>' +
                                    '<select id="ids' + counter + '" class="form-control satuan' + counter + '" style="cursor: text;">' +
                                    '<option value="">Pilih satuan</option>' +
                                    '</select>' +
                                    '</td>' +
                                    '<td>' +
                                    '<input readonly type="text" class="form-control harga' + counter + '">' +
                                    '</td>' +
                                    '<td>' +
                                    '<input type="text" id="idd' + counter + '" placeholder="0" style="text-align:center;" class="form-control diskon_item' + counter + '">' +
                                    '</td>' +
                                    '<td>' +
                                    '<input readonly type="text" class="form-control jumlah' + counter + '">' +
                                    '</td>' +
                                    '<td>' +
                                    '<div class="row">' +
                                    '<div class="col-xl-6">' +
                                    '<input readonly type="text" class="form-control stock' + counter + '">' +
                                    '</div>' +
                                    '<div class="col-xl-6">' +
                                    '<input readonly type="text" class="form-control stock-c' + counter + '">' +
                                    ' </div>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>'
                                );
                                $('.select2x').select2();

                                // if((typeof(Storage) == "undefined" && $('#id_barang' + ( counter - 1) ).val() !== '' )) {
                                //     localStorage.setItem( 'id_barang' + ( counter - 1),  $('#idq' + (counter - 1)).val() );
                                // }
                            }

                                // if( $(".barang" +  ( counter - 1)  ).val() !== "" && counter > 1) {
                                //     localStorage.setItem( $(".barang" + ( counter - 1) ).val(), $(".stock-c" + ( counter - 1) ).val() );
                                // }

                            $('.delete_item').click(function() {
                                e.preventDefault();
                                var total_pos_fix = $('.total_pos').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') - parseInt($(".jumlah" + this.id + "")[0].value.replace(/[^a-zA-Z0-9 ]/g, ''))
                                $('.total_pos').html("Rp." + total_pos_fix.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

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
                                    $('.id_barang' + counter + '').removeClass('id_barang' + counter + '').addClass('id_barang' + parseInt(dig - 1) + '');
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
                                // alert($('.barang'+counter).val())
                                localStorage.removeItem($('.barang'+counter).val())
                                $(this).closest('tr').remove();
                                // Decreasing total number of rows by 1.
                                counter--;
                                // });
                                
                                $('.total_item').val(counter)

                            });
                            check_pos()
                            // rupiah.addEventListener('keyup', function(e){
                            //     rupiah.value = formatRupiah(this.value, '');
                            // });
                            // function formatRupiah(angka, prefix){
                            //     var number_string = angka.replace(/[^,\d]/g, '').toString(),
                            //     split   		= number_string.split(','),
                            //     sisa     		= split[0].length % 3,
                            //     rupiah     		= split[0].substr(0, sisa),
                            //     ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                            //     // tambahkan titik jika yang di input sudah menjadi angka ribuan
                            //     if(ribuan){
                            //     separator = sisa ? '.' : '';
                            //     rupiah += separator + ribuan.join('.');
                            //     }

                            //     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                            //     return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                            // }
                        }
                    } else if (e.which == 113 || e.which == 119) { // bayar dan tahan
                        if (e.which == 113) {
                            var arrr = []
                            var arrr_satuan = []
                            for (let b = 1; b <= counter; b++) {
                                arrr.push($(".id_barang" + b + "").val())
                                arrr_satuan.push($(".satuan" + b + "").val().split(',')[1])
                            }

                            function hasDuplicates(array) {
                                return new Set(array).size !== array.length;
                            }

                            function hasDuplicates2(array) {
                                return new Set(array).size !== array.length;
                            }
                            var cekk_barang = hasDuplicates(arrr);
                            var cekk_satuan = hasDuplicates2(arrr_satuan);
                            // function inArray(aValue) {
                            //     var value = parseInt(value),
                            //         array = arrr;

                            //     return array.indexOf(value) !== -1
                            // }
                            console.log(cekk_barang)
                            var value_ac = "BAYAR"
                            if (counter < 1) {
                                swal({
                                    title: "Opss..!",
                                    text: "Data transaksi kosong",
                                    icon: "warning",
                                    dangerMode: true,
                                })
                            } else if (cekk_barang == true && cekk_satuan == true) {
                                swal({
                                    title: "Opss..!",
                                    text: "Data barang dan satuan tidak boleh sama",
                                    icon: "warning",
                                    dangerMode: true,
                                })
                            } else {
                                if ($(".id_barang" + counter + "").val() == "") {
                                    swal({
                                        title: "Opss..!",
                                        text: "Barang tidak boleh kosong",
                                        icon: "warning",
                                    })
                                } else {
                                    // if ($('.edit_transaksi').val() == 'edit_transaksi') {
                                    $('.value_ac').val(value_ac);
                                    if (value_ac == 'TAHAN') {
                                        $('.submit').attr('id', 'TAHAN');
                                        $('.submit').html('TAHAN');
                                        $('.submit').attr('class', 'btn btn-warning submit');
                                    } else if (value_ac == 'BAYAR') {
                                        $('.submit').attr('id', 'BAYAR');
                                        $('.submit').html('BAYAR');
                                        $('.submit').attr('class', 'btn btn-primary');
                                    }
                                    // var total_final = $('.total_bayar').val().replace(/[^a-zA-Z0-9 ]/g, '') - $('.total_pos').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') + parseInt($('.diskon_all').val() == "" ? 0 : $('.diskon_all').val().replace(/[^a-zA-Z0-9 ]/g, ''))
                                    $('.transaksi_show').val($('.total_pos').html())
                                    $('.total_bayar').val($('.total_pos').html().slice(3))
                                    // $('.diskon_all').val($('.diskon_all').val() == "" ? 0 : "Rp."+$('.diskon_all').val())
                                    $('.bayar_show').html("Rp." + $('.total_bayar').val().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                                    $('#payment').modal('show');
                                    $('#payment').on('shown.bs.modal', function() {
                                        $('.total_bayar').focus();
                                        $('.total_bayar').select();
                                        //  $("#BAYAR").focus();
                                    })

                                }
                            }
                        } else if (e.which == 119) { //tahan
                            var urii = "<?= $this->uri->segment(4) ?>"
                            if (counter < 1) {
                                swal({
                                    title: "Opss..!",
                                    text: "Data transaksi kosong",
                                    icon: "warning",
                                    dangerMode: true,
                                })
                            } else if (urii == null && (urii != 'edit_hold' || urii != 'edit_transaksi')) {
                                swal({
                                    title: "Opss..!",
                                    text: "Data transaksi tidak bisa di tahan",
                                    icon: "warning",
                                    dangerMode: true,
                                })
                            } else if ($('.pengiriman').val() == "") {
                                swal({
                                    title: "Opss..!",
                                    text: "Pengiriman harus di pilih",
                                    icon: "warning",
                                    dangerMode: true,
                                })
                            } else {
                                var value_ac = "TAHAN"
                                var barang = ''
                                var xx = []
                                for (let i = 1; i <= counter; i++) { //tahan
                                    xx.push({
                                        id_transaksi_item: $('.id_item' + i + '').val(),
                                        kd_barang: $('.id_barang' + i + '').val(),
                                        barang: $('.barang' + i + '').val(),
                                        qty: $('.qty' + i + '').val(),
                                        satuan: $('.satuan' + i + '').val(),
                                        harga_satuan: $('.harga' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                        diskon_item: $('.diskon_item' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                        jumlah: $('.jumlah' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                    })
                                }
                                var datax = {
                                    id_transaksi: <?= $this->uri->segment(3) == true ? $this->uri->segment(3) : 0 ?>,
                                    cek: "TAHAN",
                                    no_struk: $('.no_struk').val(),
                                    tgl_transaksi: $('.tgl_transaksi').val(),
                                    tipe: $('select[name="tipe"]').val(),
                                    member: $('.member').val(),
                                    diskon_all: $('.diskon_all').val(),
                                    total_netto: $('.total_netto').val(),
                                    total_bayar: $('.total_bayar').val(),
                                    total_transaksi: $('.total_pos').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, ''),
                                    tunai: $('.tunaii').val(),
                                    kembali: $('.kembali').html().toString().slice(2).replace(/[^a-zA-Z0-9 ]/g, ''),
                                    jumlah_item: $('.total_item').val(),
                                    keterangan: $('.keterangan').val(),
                                    pengiriman: $('.pengiriman').val(),
                                    tahan: value_ac == "TAHAN" ? 1 : 0,
                                    pembayaran: $('.pembayaran:checked').val(),
                                    piutang: $('.total_bayar').val() == 0 && $('.pembayaran:checked').val() == "CASH" && value_ac != "TAHAN" ? 1 : 0,
                                    update: <?= $this->uri->segment(4) == 'edit_hold' ? 1 : 0 ?> == 1 ? "update_hold" : "",
                                    item: xx
                                }
                                $.ajax({
                                    url: "<?= site_url('pos/submit'); ?>",
                                    method: "POST",
                                    data: datax,
                                    async: true,
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data.tahan == '1') {
                                            swal({
                                                    title: "Berhasil..!",
                                                    text: "Transaksi " + data.no_struk + "  berhasil ditahan",
                                                    icon: "success",
                                                })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                        window.location = '<?= base_url() ?>pos/';
                                                    }
                                                });
                                        } else {
                                            swal({
                                                title: "Berhasil..!",
                                                text: "Transaksi " + data.no_struk + data.tahan + "  berhasil disimpan",
                                                icon: "success",
                                            }).then((willDelete) => {
                                                if (willDelete) {
                                                    window.open('<?= base_url() ?>pos/cetak?id=' + data.id_transaksi, '_blank');
                                                    window.location = '<?= base_url() ?>pos'
                                                }
                                            });
                                        }
                                    },
                                    error: function(data) {
                                        console.log(data)
                                    }
                                })
                            }
                        }


                        // })
                    } else if (e.which == 115) { //load transaksi
                        $('#t-load').DataTable({
                            order: [
                                [0, "desc"]
                            ]
                        })
                        $.ajax({
                            url: "<?= site_url('pos/load_hold'); ?>",
                            method: "GET",
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                var row_data = '';
                                var total_pos = 0;
                                $('#modaload').modal('show');
                                for (let i = 0; i < data.length; i++) {
                                    $('#load-hold tbody').append(
                                        '<tr style="background-color: white;">' +
                                        '<td><a type="button" id="' + data[i].id + ',' + data[i].no_struk + '" class="delete_transaksi badge badge-danger">Delete</a></td>' +
                                        '<td class="order">' + data[i].no_struk + '</td>' +
                                        '<td>' + data[i].nama_toko + '</td>' +
                                        '<td>' + data[i].jumlah_item + '</td>' +
                                        '<td>' + data[i].total_transaksi.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + '</td>' +
                                        '<td><a class="badge badge-primary" href="<?= base_url('pos/index/') ?>' + data[i].id + '/edit_hold" >Edit</a></td>' +
                                        '</tr>');
                                    // check_pos()
                                }
                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                    } else if (e.which == 192) { //load penjualan print
                        $.ajax({
                            url: "<?= site_url('pos/load_transaksi'); ?>",
                            method: "GET",
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                var row_data = '';
                                var total_pos = 0;
                                $(".select2x").select2({
                                    dropdownParent: $("#modal_penjualan")
                                });
                                $.fn.modal.Constructor.prototype._enforceFocus = function() {};
                                $('#modal_penjualan').modal('show');
                                // var kurang_bayar = 0
                                for (let i = 0; i < data.length; i++) {
                                    // kurang_bayar += data[i].total_transkasi - data[i].total_bayar_piutang;
                                    <?php if ($this->session->userdata('level') == '1') { ?>
                                            var invs_level = ''
                                    <?php } else { ?>
                                            var invs_level = 'invisible'
                                    <?php } ?>
                                    if (data[i].piutang == 1) {
                                        var total_fix = data[i].total_transaksi - data[i].bayar_piutang; //cicilan piutang
                                    } else {
                                        var total_fix = data[i].total_transaksi; //cicilan piutang
                                    }
                                    $('#load-transaksi tbody').append(
                                        '<tr style="background-color: white;">' +
                                        '<td><a type="button" id="' + data[i].i_transaksi + ',' + data[i].no_struk + '" class="cencel_transaksi ' + invs_level + ' badge badge-danger">Cencel</a></td>' +
                                        '<td><a type="button" id="' + data[i].i_transaksi + ',' + data[i].no_struk + '" class="edit_transaksi_kasir badge badge-success">Edit</a></td>' +
                                        '<td class="order">' + data[i].no_struk + '</td>' +
                                        '<td>' + data[i].nama_toko + '</td>' +
                                        '<td>' + data[i].jumlah_item + '</td>' +
                                        '<td>' + data[i].total_transaksi.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + '</td>' +
                                        '<td><a target="_blank" class="badge badge-primary" href="<?= base_url('pos/cetak?id=') ?>' + data[i].i_transaksi + '" >Cetak</a></td>' +
                                        '</tr>');
                                    // check_pos()
                                }
                                console.log('data penjualan shortcut `')
                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                    } else if (e.which == 188) { // open pelanggan <
                        $('.select2p').select2();
                        $('.select2p').select2('open');
                    } else if (e.which == 190) { // open pengiriman >
                        $('.select2kurir').select2();
                        $('.select2kurir').select2('open');
                    }
                    // else if (e.which == 82) {
                    //     // window.location = '<?= base_url() ?>pos/';
                    // }
                };

                function reverseInt(int) {
                    const intRev = int.toString().split('').reverse().join('');
                    return parseInt(intRev) * Math.sign(int);
                }
                var bayar = $(".total_bayar");
                var diskon_all2 = $(".diskon_all");
                var tunaiii = $(".tunaii");


                bayar.keyup(function() {
                    var diskon_al = diskon_all2[0].value.replace(/[^a-zA-Z0-9 ]/g, '') == "" ? 0 : diskon_all2[0].value.replace(/[^a-zA-Z0-9 ]/g, '')
                    var tunai_vall = tunaiii[0].value.replace(/[^a-zA-Z0-9 ]/g, '')
                    var bayar_val = this.value.toString().replace(/[^a-zA-Z0-9 ]/g, '') == "" ? 0 : this.value.toString().replace(/[^a-zA-Z0-9 ]/g, '')
                    var total_transaksi = $('.transaksi_show').val().slice(2).replace(/[^a-zA-Z0-9 ]/g, '')
                    // var value_bayar = this.value.replace(/[^a-zA-Z0-9 ]/g, '') - $('.transaksi_show').val().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') + diskon_al
                    if (diskon_al) {
                        var total_xxx = parseInt(total_transaksi - bayar_val - tunai_vall) + parseInt(diskon_al)
                    } else {
                        var total_xxx = total_transaksi - bayar_val - tunai_vall
                    }
                    // if ($('input[type=radio][name=radio_pembayaran]:checked').val() == 'TRANSFER') {
                    if (total_xxx > 0) {
                        var xxx_total = Math.abs(total_xxx) * -1
                    } else {
                        var xxx_total = Math.abs(total_xxx)
                    }
                    if (bayar_val >= total_transaksi) {
                        $('.kembali').html("Rp." + xxx_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                        $('.utang').html("Rp.0")
                    } else {
                        var piutang_cek = total_transaksi - bayar_val
                        $('.utang').html("Rp." + piutang_cek.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                        $('.kembali').html("Rp.0")
                    }
                    // }else{
                    //     $('.kembali').html("Rp."+total_xxx.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                    // }
                })
                tunaiii.keyup(function() {
                    var diskon_al = diskon_all2[0].value.replace(/[^a-zA-Z0-9 ]/g, '') == "" ? 0 : diskon_all2[0].value.replace(/[^a-zA-Z0-9 ]/g, '')
                    var bayar_val = $(".total_bayar").val().toString().replace(/[^a-zA-Z0-9 ]/g, '')
                    var tunai_vall = this.value.toString().replace(/[^a-zA-Z0-9 ]/g, '') == "" ? 0 : this.value.toString().replace(/[^a-zA-Z0-9 ]/g, '')
                    var total_transaksi = $('.transaksi_show').val().toString().slice(2).replace(/[^a-zA-Z0-9 ]/g, '')
                    var value_bayar = this.value.replace(/[^a-zA-Z0-9 ]/g, '') - bayar.val().replace(/[^a-zA-Z0-9 ]/g, '') - $('.transaksi_show').val().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') + diskon_al
                    if (diskon_al) {
                        var total_xxx = parseInt(total_transaksi - bayar_val - tunai_vall) + parseInt(diskon_al)
                    } else {
                        var total_xxx = total_transaksi - bayar_val - tunai_vall
                    }
                    if ($('input[type=radio][name=radio_pembayaran]:checked').val() == 'TRANSFER' || $('input[type=radio][name=radio_pembayaran]:checked').val() == 'GIRO' || $('input[type=radio][name=radio_pembayaran]:checked').val() == 'EDC') {
                        if (total_xxx > 0) {
                            var xxx_total = Math.abs(total_xxx) * -1
                        } else {
                            var xxx_total = Math.abs(total_xxx)
                        }
                        var cek_tunai = tunai_vall == "" ? bayar_val : xxx_total
                        if (bayar_val >= total_transaksi) {
                            $('.kembali').html("Rp." + xxx_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                            $('.utang').html("Rp.0")
                        } else {
                            var piutang_cek = total_transaksi - bayar_val
                            $('.utang').html("Rp." + piutang_cek.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                            $('.kembali').html("Rp.0")
                        }
                        //    $('.kembali').html("Rp."+xxx_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                    } else {
                        $('.kembali').html("Rp." + total_xxx.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                    }
                })
                diskon_all2.keyup(function() {
                    var tunai_vall = tunaiii[0].value.replace(/[^a-zA-Z0-9 ]/g, '')
                    var bayar_val = bayar.val().toString().replace(/[^a-zA-Z0-9 ]/g, '')
                    var diskon_al = this.value.replace(/[^a-zA-Z0-9 ]/g, '') == "" ? 0 : this.value.replace(/[^a-zA-Z0-9 ]/g, '')
                    var total_transaksi = $('.transaksi_show').val().slice(2).replace(/[^a-zA-Z0-9 ]/g, '')
                    var value_bayar = this.value.replace(/[^a-zA-Z0-9 ]/g, '') - $('.transaksi_show').val().slice(2).replace(/[^a-zA-Z0-9 ]/g, '') + diskon_al
                    if (diskon_al) {
                        var total_xxx = parseInt(total_transaksi - bayar_val - tunai_vall) - parseInt(diskon_al)
                    } else {
                        var total_xxx = total_transaksi - bayar_val - tunai_vall
                    }
                    // if ($('input[type=radio][name=radio_pembayaran]:checked').val() == 'TRANSFER') {
                    if (total_xxx > 0) {
                        var xxx_total = Math.abs(total_xxx) * -1
                    } else {
                        var xxx_total = Math.abs(total_xxx)
                    }
                    var cek_tunai = tunai_vall == "" ? bayar_val : xxx_total

                    if (bayar_val >= total_transaksi) {
                        $('.kembali').html("Rp." + xxx_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                        $('.utang').html("Rp.0")
                    } else {
                        var piutang_cek = total_transaksi - bayar_val
                        $('.utang').html("Rp." + piutang_cek.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                        $('.kembali').html("Rp.0")
                    }
                    //    $('.kembali').html("Rp."+xxx_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                    // }else{
                    //     $('.kembali').html("Rp."+total_xxx.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                    // }
                })
                var action = $(".submit")
                action.on('click', function() {//submit
                    if ($('.pembayaran').val() == false) {
                        swal({
                            title: "Opss..!",
                            text: "Pembayaran harus dipilih..!",
                            icon: "warning",
                        })
                    } else if ($('.total_bayar').val() == "") {
                        swal({
                            title: "Opss..!",
                            text: "Total Pembayaran harus diisi..!",
                            icon: "warning",
                        })
                    } else {
                        if ($('.total_bayar').val() == 0 && ($('.pembayaran:checked').val() == "TRANSFER" || $('.pembayaran:checked').val() == "UTANG" || $('.pembayaran:checked').val() == "VOCHER")) {
                            swal({
                                title: "Opss..!",
                                text: "Pembayaran 0 hanya boleh cash untuk piutang..!",
                                icon: "warning",
                            })
                        } else {
                            var value_ac = this.id
                            var barang = ''
                            if ($('input[type=radio][name=radio_pembayaran]:checked').val() == 'TRANSFER') {
                                var info_pembayaran = '{"bank" : "' + $('.bank').val() + '" ,"tujuan" : "' + $('.tujuan').val() + '"}';
                            } else if ($('input[type=radio][name=radio_pembayaran]:checked').val() == 'EDC') {
                                var info_pembayaran = '{"bank" : "' + $('.bank_edc').val() + '" ,"no_kartu" : "' + $('.tujuan').val() + '","nama" : "' + $('.nama_edc').val() + '"}';
                            } else if ($('input[type=radio][name=radio_pembayaran]:checked').val() == 'GIRO') {
                                var info_pembayaran = '{"bank" : "' + $('.bank_giro').val() + '","Nomor" : "' + $('.no_giro').val() + '" ,"tujuan" : "' + $('.rekening_giro').val() + '","tempo" : "' + $('.tempo').val() + '" }';
                            } else {
                                var info_pembayaran = ''; //cash
                            }
                            var xx = []
                            var total_transaksi_row = 0;
                            for (let i = 1; i <= counter; i++) {
                                total_transaksi_row += $('.jumlah' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, '');
                                xx.push({
                                    id_transaksi_item: $('.id_item' + i + '').val(),
                                    kd_barang: $('.id_barang' + i + '').val(),
                                    barang: $('.barang' + i + '').val(),
                                    qty: $('.qty' + i + '').val(),
                                    satuan: $('.satuan' + i + '').val(),
                                    harga_satuan: $('.harga' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                    diskon_item: $('.diskon_item' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                    jumlah: $('.jumlah' + i + '').val().replace(/[^a-zA-Z0-9 ]/g, ''),
                                    stock: $('.stock' + i + '').val(),
                                    stock_c: $('.stock-c' + i + '').val(),
                                })
                            }
                            var datax = {
                                cek: value_ac,
                                no_struk: $('.no_struk').val(),
                                tgl_transaksi: $('.tgl_transaksi').val(),
                                tipe: $('select[name="tipe"]').val(),
                                member: $('.member').val(),
                                diskon_all: $('.diskon_all').val(),
                                total_netto: $('.total_netto').val(),
                                total_bayar: $('.total_bayar').val(),
                                total_transaksi: $('.total_pos').html().slice(2).replace(/[^a-zA-Z0-9 ]/g, ''),
                                tunai: $('.tunaii').val(),
                                kembali: $('.kembali').html().toString().slice(2).replace(/[^a-zA-Z0-9 ]/g, ''),
                                jumlah_item: $('.total_item').val(),
                                keterangan: $('.keterangan').val(),
                                pengiriman: $('.pengiriman').val(),
                                tahan: value_ac == "TAHAN" ? 1 : 0,
                                pembayaran: $('.pembayaran:checked').val(),
                                info_pembayaran: info_pembayaran.toString(),
                                piutang: $('.total_bayar').val() == 0 && $('.pembayaran:checked').val() == "CASH" ? 1 : 0,
                                update: <?= $this->uri->segment(3) == true ? 1 : 0 ?> == 1 ? "update" : "",
                                id_transaksi: <?= $this->uri->segment(3) == true ? $this->uri->segment(3) : 0 ?>,
                                edit_transaksi: <?= $this->uri->segment(4) == 'edit_transaksi' ? 1 : 0 ?> == 1 ? "edit_transaksi" : "",
                                item: xx
                            }
                            $.ajax({
                                url: "<?= site_url('pos/submit'); ?>",
                                method: "POST",
                                data: datax,
                                async: true,
                                dataType: 'json',
                                success: function(data) {
                                    if (data.tahan == '1') {
                                        // swal({
                                        //         title: "Berhasil..!",
                                        //         text: "Transaksi "+data.no_struk+"  berhasil ditahan",
                                        //         icon: "success",
                                        //         })
                                        //         .then((willDelete) => {
                                        //             if (willDelete) {
                                        window.location = '<?= base_url() ?>pos/';
                                        //     }
                                        // });
                                    } else {
                                        // swal({
                                        //     title: "Berhasil..!",
                                        //     text: "Transaksi "+data.no_struk+data.tahan+"  berhasil disimpan",
                                        //     icon: "success",
                                        //     }).then((willDelete) => {
                                        //     if (willDelete) {
                                        setTimeout(() => {
                                            window.open('<?= base_url() ?>pos/cetak?id=' + data.id_transaksi, '_blank');
                                            window.location = '<?= base_url() ?>pos'
                                        }, 500);

                                        //     }
                                        // });
                                    }
                                },
                                error: function(data) {
                                    console.log(data)
                                }
                            })
                        }
                    }
                })


                $('.transfer_vis').hide()
                $('.tunai_vis').hide()
                $('.cash_vis').hide()
                $('.giro_vis').hide()
                $('.edc_vis').hide()
                $('.vocher_vis').hide()
                $('input[type=radio][name=radio_pembayaran]').change(function() {
                    if (this.value == 'TRANSFER') {
                        // $('.total_bayar').val($('.transaksi_show').val().slice(3))
                        $('.total_bayar').val("")
                        $('.total_bayar_text').html('Transfer');
                        $('.transfer_vis').show()
                        $('.cash_vis').hide()
                        $('.giro_vis').hide()
                        $('.edc_vis').hide()
                        $('.vocher_vis').hide()
                        $('.tunai_vis').show()

                    } else if (this.value == 'CASH') {
                        $('.total_bayar').val($('.transaksi_show').val().slice(3))
                        $('.total_bayar_text').html('Total Bayar');
                        $('.transfer_vis').hide()
                        $('.cash_vis').hide()
                        $('.giro_vis').hide()
                        $('.edc_vis').hide()
                        $('.vocher_vis').hide()
                        $('.tunai_vis').hide()
                    } else if (this.value == 'GIRO') {
                        $('.total_bayar').val($('.transaksi_show').val().slice(3))
                        $('.total_bayar_text').html('Giro / Cek');
                        $('.total_bayar').val(0)
                        $('.giro_vis').show()
                        $('.cash_vis').hide()
                        $('.transfer_vis').hide()
                        $('.edc_vis').hide()
                        $('.vocher_vis').hide()
                        $('.tunai_vis').show()
                    } else if (this.value == 'EDC') {
                        $('.total_bayar_text').html('EDC');
                        $('.total_bayar').val(0)
                        $('.giro_vis').hide()
                        $('.cash_vis').hide()
                        $('.transfer_vis').hide()
                        $('.edc_vis').show()
                        $('.vocher_vis').hide()
                        $('.tunai_vis').show()
                    } else if (this.value == 'VOCHER') {
                        $('.total_bayar_text').html('Total bayar');
                        $('.giro_vis').hide()
                        $('.cash_vis').hide()
                        $('.vocher_vis').show()
                        $('.edc_vis').hide()
                        $('.tunai_vis').hide()

                    }
                });



                // console.log(localStorage.getItem("page-wrapper"))
                // if (localStorage.getItem("page-wrapper") === null) {
                $(".page-wrapper").attr(
                    "class",
                    "page-wrapper horizontal-wrapper "
                );
                $(".logo-wrapper")
                    .find("img")
                    .attr("src", "<?= base_url() ?>assets/images/logo/logo.png");
                localStorage.setItem("page-wrapper", "horizontal-wrapper");
                // }
            });
            $(document).on('click', '.delete_transaksi', function(e) { //delete transksai di hold
                e.preventDefault();
                var pid = this.id.split(',')[0];
                var struk = this.id.split(',')[1];
                swal({
                    title: "Struk " + struk + "",
                    text: "Apakah anda yakin ingin delete hold transaksi?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "<?= site_url('pos/delete_transaksi'); ?>",
                            method: "POST",
                            data: {
                                id: pid
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data2) {
                                swal({
                                    title: "Berhasil..!",
                                    text: "transaksi berhasil didelete",
                                    icon: "success",
                                }).then((willDelete) => {
                                    if (willDelete) {
                                        $.ajax({
                                            url: "<?= site_url('pos/load_hold'); ?>",
                                            method: "GET",
                                            // data : {id: pid},
                                            async: true,
                                            dataType: 'json',
                                            success: function(data) {
                                                // $('#modaload').modal('toggle');
                                                $('#modaload tbody').empty();
                                                setTimeout(() => {
                                                    $('#modaload').modal('show');
                                                    for (let i = 0; i <= data.length; i++) {
                                                        $('#load-hold tbody').append(
                                                            '<tr style="background-color: white;">' +
                                                            '<td><a type="button" id="' + data[i].id + ',' + data[i].no_struk + '" class="delete_transaksi badge badge-danger">Delete</a></td>' +
                                                            '<td class="order">' + data[i].no_struk + '</td>' +
                                                            '<td>' + data[i].nama_toko + '</td>' +
                                                            '<td>' + data[i].jumlah_item + '</td>' +
                                                            '<td>' + data[i].total_transaksi + '</td>' +
                                                            '<td><a class="badge badge-primary" href="<?= base_url('pos/index/') ?>' + data[i].id + '/edit_hold" >Edit</a></td>' +
                                                            '</tr>');
                                                        // check_pos()
                                                    }
                                                }, 500);
                                            }
                                        })
                                    }
                                });
                            }
                        })
                    }
                });
            })
            $(document).on('click', '.cencel_transaksi', function(e) { //cancel transksai di ketika data sudah di cetak / submit
                e.preventDefault();
                var pid = this.id.split(',')[0];
                var struk = this.id.split(',')[1];
                swal({
                    title: "Struk " + struk + "",
                    text: "Apakah anda yakin ingin cancel transaksi?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "<?= site_url('pos/cancel_transaksi'); ?>",
                            method: "POST",
                            data: {
                                id: pid
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data2) {
                                swal({
                                    title: "Berhasil..!",
                                    text: "transaksi berhasil dicancel",
                                    icon: "success",
                                }).then((willDelete) => {
                                    if (willDelete) {
                                        $.ajax({
                                            url: "<?= site_url('pos/load_hold'); ?>",
                                            method: "GET",
                                            // data : {id: pid},
                                            async: true,
                                            dataType: 'json',
                                            success: function(data) {
                                                // $('#modaload').modal('toggle');
                                                $('#modal_penjualan tbody').empty();
                                                setTimeout(() => {
                                                    $('#modal_penjualan').modal('show');
                                                    for (let i = 0; i < data.length; i++) {
                                                        <?php if ($this->session->userdata('level') == '1') { ?>
                                                                var invs_level = ''
                                                        <?php } else { ?>
                                                                var invs_level = 'invisible'
                                                        <?php } ?>
                                                        if (data[i].piutang == 1) {
                                                            var total_fix = data[i].total_transaksi - data[i].bayar_piutang; //cicilan piutang
                                                        } else {
                                                            var total_fix = data[i].total_transaksi; //cicilan piutang
                                                        }
                                                        $('#load-transaksi tbody').append(
                                                            '<tr style="background-color: white;">' +
                                                            '<td><a type="button" id="' + data[i].i_transaksi + ',' + data[i].no_struk + '" class="cencel_transaksi ' + invs_level + ' badge badge-danger">Cencel</a></td>' +
                                                            '<td class="order">' + data[i].no_struk + '</td>' +
                                                            '<td>' + data[i].nama_toko + '</td>' +
                                                            '<td>' + data[i].jumlah_item + '</td>' +
                                                            '<td>' + data[i].total_transaksi.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + '</td>' +
                                                            '<td><a target="_blank" class="badge badge-primary" href="<?= base_url('pos/cetak?id=') ?>' + data[i].i_transaksi + '" >Cetak</a></td>' +
                                                            '</tr>');
                                                    }
                                                    console.log('cencel transaksi')
                                                }, 500);
                                            }
                                        })
                                    }
                                });
                            }
                        })
                    }
                });
            })
            $(document).on('click', '.edit_transaksi_kasir', function(e) { //edit transksai di ketika data sudah di cetak / submit
                e.preventDefault();
                var pid = this.id.split(',')[0];
                var struk = this.id.split(',')[1];
                $('#modal_penjualan').on('shown.bs.modal', function() {
                    $(document).off('focusin.modal');
                });
                swal({
                    title: "Verifikasi Admin?",
                    text: "Silahkan masukan password admin..!",
                    icon: "warning",
                    buttons: true,
                    content: {
                        element: "input",
                        attributes: {
                            placeholder: "Type your password",
                            type: "password",
                        },
                    },
                    dangerMode: true,
                }).then((value) => {
                    if (value) {
                        $.ajax({
                            url: "<?= site_url('user/check_admin'); ?>",
                            method: "POST",
                            data: {
                                id: pid,
                                password: value
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                if (data == 'berhasil') {
                                    swal('Data admin terverifikasi..!', {
                                        icon: "success",
                                    }).then((d) => {
                                        if (d) {
                                            window.location = '<?= base_url() ?>pos/index/' + pid + '/edit_transaksi';
                                        }
                                    });
                                } else {
                                    swal('Password salah..!', {
                                        icon: "error",
                                    });
                                }

                            }
                        })

                    }
                });
                // $('#modal_edit_transaksi_kasir').modal('show')
            })
            $('.date_print').on('change', function() {
                // alert( this.value );
                $.ajax({
                    url: "<?= site_url('pos/reprint_date'); ?>",
                    method: "POST",
                    data: {
                        date_print: this.value
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                    }

                })
            });
            $('.date_print2').on('change', function() {
                $.ajax({
                    url: "<?= site_url('pos/reprint_date'); ?>",
                    method: "POST",
                    data: {
                        date_print: $('.date_print').val(),
                        date_print2: this.value
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $.ajax({
                            url: "<?= site_url('pos/load_transaksi'); ?>",
                            method: "GET",
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                $('#modal_penjualan tbody').empty();
                                setTimeout(() => {
                                    $('#modal_penjualan').modal('show');
                                    for (let i = 0; i < data.length; i++) {
                                        <?php if ($this->session->userdata('level') == '1') { ?>
                                                var invs_level = ''
                                        <?php } else { ?>
                                                var invs_level = 'invisible'
                                        <?php } ?>
                                        if (data[i].piutang == 1) {
                                            var total_fix = data[i].total_transaksi - data[i].bayar_piutang; //cicilan piutang
                                        } else {
                                            var total_fix = data[i].total_transaksi; //cicilan piutang
                                        }
                                        $('#load-transaksi tbody').append(
                                            '<tr style="background-color: white;">' +
                                            '<td><a type="button" id="' + data[i].i_transaksi + ',' + data[i].no_struk + '" class="cencel_transaksi ' + invs_level + ' badge badge-danger">Cencel</a></td>' +
                                            '<td class="order">' + data[i].no_struk + '</td>' +
                                            '<td>' + data[i].nama_toko + '</td>' +
                                            '<td>' + data[i].jumlah_item + '</td>' +
                                            '<td>' + data[i].total_transaksi.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + '</td>' +
                                            '<td><a target="_blank" class="badge badge-primary" href="<?= base_url('pos/cetak?id=') ?>' + data[i].i_transaksi + '" >Cetak</a></td>' +
                                            '</tr>');
                                    }
                                    console.log('change date')
                                }, 500)
                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                    }

                })
            });
            $('.reprint_customers').on('change', function() {
                $.ajax({
                    url: "<?= site_url('pos/reprint_date'); ?>",
                    method: "POST",
                    data: {
                        date_print: $('.date_print').val(),
                        date_print2: $('.date_print2').val(),
                        pelanggan: this.value
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $.ajax({
                            url: "<?= site_url('pos/load_transaksi'); ?>",
                            method: "GET",
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                $('#modal_penjualan tbody').empty();
                                setTimeout(() => {
                                    $('#modal_penjualan').modal('show');
                                    for (let i = 0; i < data.length; i++) {
                                        <?php if ($this->session->userdata('level') == '1') { ?>
                                                var invs_level = ''
                                        <?php } else { ?>
                                                var invs_level = 'invisible'
                                        <?php } ?>
                                        if (data[i].piutang == 1) {
                                            var total_fix = data[i].total_transaksi - data[i].bayar_piutang; //cicilan piutang
                                        } else {
                                            var total_fix = data[i].total_transaksi; //cicilan piutang
                                        }
                                        if (data.length == true) {
                                            $('#load-transaksi tbody').append(
                                                '<tr style="background-color: white;">' +
                                                '<td><a type="button" id="' + data[i].i_transaksi + ',' + data[i].no_struk + '" class="cencel_transaksi badge ' + invs_level + ' badge-danger">Cencel</a></td>' +
                                                '<td class="order">' + data[i].no_struk + '</td>' +
                                                '<td>' + data[i].nama_toko + '</td>' +
                                                '<td>' + data[i].jumlah_item + '</td>' +
                                                '<td>' + data[i].total_transaksi.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + '</td>' +
                                                '<td><a target="_blank" class="badge badge-primary" href="<?= base_url('pos/cetak?id=') ?>' + data[i].i_transaksi + '" >Cetak</a></td>' +
                                                '</tr>');
                                        } else {
                                            swal({
                                                title: "Opss..!",
                                                text: "Pelanggan di transaksi tidak ada..!",
                                                icon: "warning",
                                                dangerMode: true,
                                            })
                                        }
                                    }
                                }, 500)
                            },
                            error: function(e) {
                                console.log(e)
                            }
                        });
                    }

                })
            });
            $(document).on('click', '.clear_penjualan', function(e) {
                $('#modal_penjualan tbody').empty();
            })


            $('.tgl_transaksi').change(function() {
                var tgl = $(this).val();
                $.ajax({
                    url: "<?= site_url('pos/check_tgl_pos'); ?>",
                    method: "POST",
                    data: {
                        tgl: tgl
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        $('.no_struk').val(data)
                    }

                })
            })

            // function updateStok(counter) {
            //     var row = $('#r' + counter);
            //     var selectedOption = row.find('.satuan' + counter).find(':selected').val();
            //     var stok = parseInt(row.find('.satuan' + counter).find(':selected').data('stok'));
            //     var qtyKonv = parseInt(row.find('.satuan' + counter).find(':selected').data('qty-konv'));
            //     var qtyKecil = parseInt(row.find('.satuan' + counter).find(':selected').data('qty-kecil'));
            //     var qtyBesar = parseInt(row.find('.satuan' + counter).find(':selected').data('qty-besar'));

            //     var splitOptions = selectedOption.split(',');

            //     // Nilai "SLOP" akan ada pada indeks kedua (index 1) setelah pemisahan
            //     var jenis = splitOptions[2];
            //     var jumlah;

            //     // saya  punya stok 1900. saya memilih jenis besar, qtyKecil = 10, qtyKonv = 10. saat saya console.log(jumlah), hasilnya benar 19. tetapi kenapa yang keluar 190?
            //     console.log('Sebelum Perhitungan - Stok:', stok, 'Jenis:', jenis, 'QtyBesar:', qtyBesar, 'QtyKecil:', qtyKecil, 'QtyKonv:', qtyKonv);

            //     if (jenis == "besar" && !qtyKecil && !qtyKonv) {
            //         jumlah = stok;
            //         console.log(1);
            //     } else if (jenis == "besar" && qtyKecil && !qtyKonv) {
            //         jumlah = Math.floor(stok / qtyKecil);
            //         console.log(2);
            //     } else if (jenis == "besar" && qtyKecil && qtyKonv) {
            //         console.log('Sebelum Perhitungan - Stok:', stok, 'Jenis:', jenis, 'QtyBesar:', qtyBesar, 'QtyKecil:', qtyKecil, 'QtyKonv:', qtyKonv);
            //         jumlah = Math.floor(stok / (qtyKecil * qtyKonv));
            //         console.log('Setelah Perhitungan - Jumlah:', jumlah);
            //         console.log(3);
            //     } else if (jenis == "kecil" && !qtyKonv) {
            //         jumlah = stok;
            //         console.log(4);
            //     } else if (jenis == "kecil" && qtyKonv) {
            //         jumlah = Math.floor(stok / qtyKonv);
            //         console.log(5);
            //     } else if (jenis == "konv") {
            //         jumlah = stok;
            //         console.log(6);
            //     }

            //     console.log('Setelah Perhitungan Akhir - Jumlah:', jumlah);

            //     row.find('[name="stock[]"]').val(jumlah);

            //     // hitung(row.find('[name="jumlah[]"]')[0]);
            // }
            
        </script>
</body>

</html>