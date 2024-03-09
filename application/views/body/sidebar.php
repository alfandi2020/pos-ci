<nav class="sidebar-main">
  <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
  <div id="sidebar-menu">
    <ul class="sidebar-links" id="simple-bar">
      <li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?= base_url() ?>assets/images/logo/logo-icon.png" alt=""></a>
        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
      </li>
      <li class="pin-title sidebar-main-title">
        <div>
          <h6>Pinned</h6>
        </div>
      </li>
      <li class="sidebar-main-title">
        <div>
          <h6 class="lan-1">General</h6>
        </div>
      </li>
      <li class="sidebar-list">
        <!-- <i class="fa fa-thumb-tack"></i> -->
        <!-- <label class="badge badge-light-primary">8</label>
                    <a class="sidebar-link sidebar-title" href="#">
                      <svg class="stroke-icon">
                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#fill-home"></use>
                      </svg><span class="lan-3">Dashboard
                      </span></a>
                    <ul class="sidebar-submenu">
                      <li><a class="lan-4" href="index.html">Default</a></li>
                      <li><a class="lan-5" href="dashboard-02.html">Ecommerce</a></li>
                      <li><a href="dashboard-03.html">Online course</a></li>
                      <li><a href="dashboard-04.html">Crypto</a></li>
                      <li><a href="dashboard-05.html">Social</a></li>
                      <li><a href="dashboard-06.html">NFT</a></li>
                      <li> <a href="dashboard-07.html">School management</a></li>
                      <li> <a href="dashboard-08.html">POS</a></li>
                    </ul>
                  </li> -->
      <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="users"></i>
          <span> Kelola User</span></a>
        <ul class="sidebar-submenu">
          <li><a href="<?= base_url('user/pengguna') ?>">Pengguna</a></li>
          <li><a href="<?= base_url('user/level') ?>">Level</a></li>
        </ul>
      </li>
      <!---- Kontak--->
      <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="book"></i>
          <span>Kontak</span></a>
        <ul class="sidebar-submenu">
          <li><a href="<?= base_url('user/supplier') ?>">Supplier</a></li>
          <li><a href="<?= base_url('user/customer') ?>">Customers</a></li>
          <li><a href="<?= base_url('user/ekspedisi') ?>">Ekspedisi</a></li>
        </ul>
      </li>
      <!---- produk--->
      <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="package"></i>
          <span>Barang</span></a>
        <ul class="sidebar-submenu">
          <li><a href="<?= base_url('barang') ?>">List Barang</a></li>
          <li><a href="<?= base_url('barang/satuan') ?>">Satuan</a></li>
          <li><a href="<?= base_url('barang/kategori') ?>">Kategori</a></li>
          <li><a href="<?= base_url('barang/brand') ?>">brand</a></li>
          <li><a href="<?= base_url('barang/gudang') ?>">Gudang</a></li>
          <!-- <li><a href="dashboard-04.html">Role</a></li> -->
        </ul>
      </li>
      <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="package"></i>
          <span>Inventory</span></a>
        <ul class="sidebar-submenu">
          <li><a href="<?= base_url('inventori') ?>">Sisa Stock</a></li>
          <li><a href="<?= base_url('inventori/stock_opname') ?>">Stock Opname</a></li>
          <li><a href="<?= base_url('inventori/koreksi_barang') ?>">Koreksi barang</a></li>
          <li><a href="<?= base_url('inventori/mutasi_barang') ?>">Mutasi barang antar gudang</a></li>
        </ul>
      </li>
      <!---- Pembelian--->
      <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="arrow-down-circle"></i>
          <span>Pembelian</span></a>
        <ul class="sidebar-submenu">
          <li><a href="<?= base_url('pembelian') ?>">Penerimaan Barang</a></li>
          <li><a href="<?= base_url('pembelian/return') ?>">Return Barang</a></li>
          <!-- <li><a href="dashboard-04.html">Role</a></li> -->
        </ul>
      </li>
      <!---- penjualan--->
      <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="arrow-up-circle"></i>
          <span>Penjualan</span></a>
        <ul class="sidebar-submenu">
          <li><a href="<?= base_url('penjualan') ?>">List Penjualan</a></li>
          <li><a href="<?= base_url('penjualan/return') ?>">Return Barang</a></li>

          <!-- <li><a href="dashboard-04.html">Role</a></li> -->
        </ul>
      </li>
      <!-- <li class="sidebar-main-title">
        <div>
          <h6>Payment</h6>
        </div>
      </li> -->
      <!-- <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="arrow-up-circle"></i>
          <span>Keuangan</span></a>
        <ul class="sidebar-submenu">
          <li><a href="<?= base_url('keuangan') ?>">Pembayaran Hutang</a></li>
          <li><a href="<?= base_url('keuangan') ?>">Kas/Bank Keluar</a></li>
        </ul>
      </li>
      <li class="sidebar-main-title">
        <div>
          <h6>Receivable</h6>
        </div>
      </li>
      <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="arrow-up-circle"></i>
          <span>Keuangan</span></a>
        <ul class="sidebar-submenu">
          <li><a href="<?= base_url('keuangan') ?>">Pembayaran Piutang [Faktur]</a></li>
          <li><a href="<?= base_url('keuangan') ?>">Pembayaran Piutang [Parsial]</a></li>
          <li><a href="<?= base_url('keuangan') ?>">Laporan Piutang Pelanggan</a></li>
          <li><a href="<?= base_url('keuangan') ?>">Faktur Pajak</a></li>
          <li><a href="<?= base_url('keuangan') ?>">Kas/Bank Masuk</a></li>
        </ul>
      </li> -->
      <!---- penjualan--->
      <li class="mega-menu sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="arrow-up-circle"></i>
          <span>Keuangan</span></a>
        <div class="mega-menu-container menu-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col mega-box">
                <div class="link-section">
                  <div class="submenu-title">
                    <h5>Payment</h5>
                  </div>
                  <ul class="submenu-content opensubmegamenu">
                    <li><a href="<?= base_url('payment') ?>">Pembayaran [Faktur]</a></li>
                    <li><a href="error-401.html">Kas/Bank Keluar</a></li>
                  </ul>
                </div>
              </div>
              <div class="col mega-box">
                <div class="link-section">
                  <div class="submenu-title">
                    <h5> Receivable</h5>
                  </div>
                  <ul class="submenu-content opensubmegamenu">
                    <li><a href="<?= base_url('keuangan') ?>">Pembayaran Piutang [Faktur]</a></li>
                    <li><a href="<?= base_url('keuangan') ?>">Pembayaran Piutang [Parsial]</a></li>
                    <li><a href="<?= base_url('keuangan') ?>">Laporan Piutang Pelanggan</a></li>
                    <li><a href="<?= base_url('keuangan') ?>">Faktur Pajak</a></li>
                    <li><a href="<?= base_url('keuangan') ?>">Kas/Bank Masuk</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </li>
      <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="activity"></i>
          <span>Laporan</span></a>
        <ul class="sidebar-submenu">
          <li><a href="dashboard-03.html">Pengguna</a></li>
          <!-- <li><a href="dashboard-04.html">Role</a></li> -->
        </ul>
      </li>
      <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#">
          <i data-feather="activity"></i>
          <span>Setting</span></a>
        <ul class="sidebar-submenu">
          <li><a href="<?= base_url('setting/struk') ?>">Struk</a></li>
          <!-- <li><a href="dashboard-04.html">Role</a></li> -->
        </ul>
      </li>
      <!-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">
                      <svg class="stroke-icon">
                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-support-tickets"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#fill-support-tickets"></use>
                      </svg><span>Support Ticket</span></a>
                    </li> -->
    </ul>
  </div>
  <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</nav>