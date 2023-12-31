<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
                <br><br>
              <div class="row">
                <div class="col-6">
                  <h4>brand</h4>
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
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List Brand</h4><br>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add</button>
                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modal-toggle-wrapper">
                                <?= $this->session->flashdata('msg') ?>
                                <form action="<?= base_url('barang/brand') ?>" method="post">
                                    <div class="row">
                                            <div class="modal-img"> <img src="../assets/images/gif/online-shopping.gif" alt="online-shopping"></div>
                                            <div class="col-xl-4">
                                                <h6>Nama brand</h6>
                                                <input required type="text" placeholder="abc" name="brand" class="form-control">
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
                  <?php
          if ($this->session->flashdata('msg') == 'double_satuan') { ?>
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
                    <div class="card-body">
                        <div class="table-responsive" style="height: 450px;">
                            <table class="display" id="t_barang">
                                <thead>
                                            <tr>
                                            <th width="400" scope="col">Nama</th>
                                            <th width="80" scope="col">Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($brand as $x) {  ?>
                                            <tr>
                                                <td>
                                                    <?= $x->nama_brand ?>
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-primary btn-square" data-bs-toggle="modal" data-original-title="test" data-bs-target="#brand_edit<?= $x->id_brand ?>"><i class="fa fa-edit"></i></button>
                                                    <button type="button" id="<?= $x->id_brand ?>" class="btn btn-danger btn-square delete_brand"><i class="fa fa-trash-o"></i></button>

                                                </td>

                                            </tr>
                                            <div class="modal fade bd-example-modal-lg" id="brand_edit<?= $x->id_brand ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5>Edit brand</h5>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="modal-toggle-wrapper">
                                                        <?= $this->session->flashdata('msg') ?>
                                                        <form action="<?= base_url('barang/brand') ?>" method="post">
                                                            <div class="row">
                                                                    <!-- <div class="modal-img"> <img src="../assets/images/gif/online-shopping.gif" alt="online-shopping"></div> -->
                                                                    <div class="col">
                                                                        <h6>Nama brand</h6>
                                                                        <input type="hidden" value="edit" name="action">
                                                                        <input type="hidden" value="<?= $x->id_brand ?>" name="id_brand">
                                                                        <input required type="text" placeholder="Bungkus" value="<?= $x->nama_brand ?>" name="brand" class="form-control">
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
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->

<script>
               $(document).on('click', '.delete_brand', function (e) {
                        e.preventDefault();
                        var pid = this.id;
                        swal({
                            title: "Delete",
                            text: "Apakah anda yakin ingin delete brand?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                url : "<?= site_url('barang/delete_brand');?>",
                                method : "POST",
                                data : {id: pid},
                                async : true,
                                dataType : 'json',
                                    success: function(data){
                                        swal({
                                                                title: "Berhasil..!",
                                                                text: "brand berhasil didelete",
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
