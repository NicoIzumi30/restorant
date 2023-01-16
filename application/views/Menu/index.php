<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Menu Management</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                        <li class="breadcrumb-item active">Menu Management</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Menu Management</h4>
                        <!-- <p class="card-text">
                            This is the most basic example of the datatables with zero configuration. Use the
                            <code>.datatable</code> class to initialize datatables.
                        </p> -->
                    </div>
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#con-close-modal">Tambah Menu</button>
                        </div>
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($menu as $mm) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $mm->menu; ?></td>
                                        <td><i data-feather="<?= $mm->icon ?>"></i></td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#myModal1">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#delete_bank_details"><i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Menu</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/index') ?>" method="post">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-3" class="form-label">Menu</label>
                                <input type="text" name="menu" class="form-control" id="field-3" placeholder="Menu">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-3" class="form-label">Icon</label>
                                <input type="text" name="icon" class="form-control" id="field-3" placeholder="Icon">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary waves-effect"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-info waves-effect waves-light">Tambahkan</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div id="delete_bank_details" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Bank Details</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" data-bs-dismiss="modal"
                                class="btn btn-primary paid-continue-btn">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-bs-dismiss="modal"
                                class="btn btn-primary paid-cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>