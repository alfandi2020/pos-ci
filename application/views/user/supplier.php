<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
                <br><br>
              <div class="row">
                <div class="col-6">
                  <h4>supplier</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Default      </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <?php
          if ($this->session->flashdata('msg') == 'double_suppliers') { ?>
          <script>
            $(document).ready(function() {
                swal({
                        title: "Opss",
                        text: "Data <?= $this->session->flashdata('msg_val') ?> tidak boleh sama",
                        icon: "warning",
                    })
                })
          </script>
         <?php } ?>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List supplier</h4><br>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add</button>
                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Tambah Supplier <span class="badge bg-primary"><i data-feather="file-text"></i> <?= $kd_supplier ?></span></h5>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="modal-toggle-wrapper">
                                <?= $this->session->flashdata('msg') ?>
                                <form action="<?= base_url('user/supplier') ?>" method="post">
                                    <div class="row">
                                            <div class="col-xl-4">
                                                <h6>Nama supplier</h6>
                                                <input type="hidden" name="kd_supplier" value="<?= $kd_supplier ?>">
                                                <input required type="text" placeholder="" name="nama" class="form-control">
                                            </div>
                                            <div class="col-xl-4">
                                                <h6>Alamat</h6>
                                                <input required type="text" placeholder="" name="alamat" class="form-control">
                                            </div>
                                            <div class="col-xl-4">
                                                <h6>Kota</h6>
                                                <input required type="text" placeholder="" name="kota" class="form-control">
                                            </div>
                                            <div class="col-xl-4 mt-3">
                                                <h6>No telp</h6>
                                                <input required type="text" placeholder="08111" name="telp" class="form-control">
                                            </div>
                                            <div class="col-xl-4 mt-3">
                                                <h6>Email</h6>
                                                <input required type="text" placeholder="" name="email" class="form-control">
                                            </div>
                                            <div class="col-xl-4 mt-3">
                                                <h6>Contact</h6>
                                                <input required type="text" placeholder="" name="contact" class="form-control">
                                            </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <select name="tipe" id="" class="form-control">
                                                <option value="">Pilih tipe pembayaran</option>
                                                <option value="Transfer">Transfer</option>
                                                <option value="Cash">Cash</option>
                                            </select>
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
                  </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="t_barang">
                                <thead>
                                            <tr>
                                            <th width="400" scope="col">Kode Supplier</th>
                                            <th width="400" scope="col">Nama</th>
                                            <th width="80" scope="col">Tipe Penjualan</th>
                                            <th width="80" scope="col">Telp</th>
                                            <th width="80" scope="col">Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($supplier as $x) {  ?>
                                            <tr>
                                                <td>
                                                    <?= $x->kode_supplier ?>
                                                </td>
                                                <td>
                                                    <?= $x->nama_supplier ?>
                                                </td>
                                                <td>
                                                    <?= $x->tipe_pembayaran ?>
                                                </td>
                                                <td>
                                                    <?= $x->telpon ?>
                                                </td>
                                                <td>
                                                 <button type="button" class="btn btn-primary btn-square" data-bs-toggle="modal" data-original-title="test" data-bs-target="#satua_edit<?= $x->id ?>"><i class="fa fa-edit"></i></button>
                                                    <button type="button" id="<?= $x->id ?>" class="btn btn-danger btn-square delete_suppliers"><i class="fa fa-trash-o"></i></button>
                                                </td>

                                            </tr>
                                            <div class="modal fade bd-example-modal-lg" id="satua_edit<?= $x->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5>Edit supplier</h5>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="modal-toggle-wrapper">
                                                        <?= $this->session->flashdata('msg') ?>
                                                        <form action="<?= base_url('user/supplier') ?>" method="post">
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <h6>Nama supplier</h6>
                                                                <input type="hidden" name="id" value="<?= $x->id ?>">
                                                                <input type="hidden" name="action" value="edit">
                                                                <input required type="text" placeholder="" value="<?= $x->nama_supplier ?>" name="nama" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <h6>Alamat</h6>
                                                                <input required type="text" placeholder="" value="<?= $x->alamat ?>" name="alamat" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <h6>Kota</h6>
                                                                <input required type="text" placeholder="" value="<?= $x->kota ?>" name="kota" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mt-3">
                                                                <h6>No telp</h6>
                                                                <input required type="text" value="<?= $x->telpon ?>" name="telp" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mt-3">
                                                                <h6>Email</h6>
                                                                <input required type="text" value="<?= $x->email ?>" name="email" class="form-control">
                                                            </div>
                                                            <div class="col-xl-4 mt-3">
                                                                <h6>Contact</h6>
                                                                <input required type="text" value="<?= $x->contact ?>" name="contact" class="form-control">
                                                            </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <select name="tipe" id="" class="form-control">
                                                                <option value="">Pilih tipe pembayaran</option>
                                                                <option value="Transfer">Transfer</option>
                                                                <option value="Cash">Cash</option>
                                                            </select>
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
                <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                            <form enctype="multipart/form-data" action="<?= base_url('user/import_supplier') ?>" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Import supplier</label>
                                        <input type="file" class="form-control" required name="supplier_imp">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->

<script>
                    $(document).on('click', '.delete_suppliers', function (e) {
                    e.preventDefault();
                    var pid = this.id;
                    swal({
                        title: "Delete",
                        text: "Apakah anda yakin ingin delete supplier?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                                $.ajax({
                                url : "<?= site_url('user/delete_supplier');?>",
                                method : "POST",
                                data : {id: pid},
                                async : true,
                                dataType : 'json',
                                    success: function(data){
                                        swal({
                                                                title: "Berhasil..!",
                                                                text: "supplier berhasil didelete",
                                                                icon: "success",
                                                                }).then((willDelete) => {
                                                                if (willDelete) {
                                                                    location.reload();
                                                                }
                                                            });
                                    }
                                })
                            }
                    });
                })
</script>
