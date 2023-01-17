<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Sub Menu Management</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('menu') ?>">Menu</a></li>
                        <li class="breadcrumb-item active">Sub Menu Management</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Sub Menu Management</h4>
                        <!-- <p class="card-text">
                            This is the most basic example of the datatables with zero configuration. Use the
                            <code>.datatable</code> class to initialize datatables.
                        </p> -->
                    </div>
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#con-close-modal">Tambah Sub Menu</button>
                        </div>
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Sub Menu</th>
                                        <th>Menu</th>
                                        <th>Url</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $no = 1;
                                    foreach ($submenu as $sm) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $sm->submenu; ?></td>
                                        <td><?= $sm->menu; ?></td>
                                        <td><?= $sm->url; ?></td>

                                        <td><?php if ($sm->is_active == 1) {
                                                    echo '<span class="badge rounded-pill badge-outline-success">Active</span>';
                                                } else {
                                                    echo '<span class="badge badge-soft-danger badge-border">Deactive</span>';
                                                } ?></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#delete_bank_details<?= $sm->id ?>"
                                                class="btn btn-outline-danger btn-sm"><i data-feather="trash-2"></i></a>
                                            </a>
                                            <a href="#" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit_submenu<?= $sm->id ?>"><i class="fa fa-edit"></i>
                                            </a>
                                            <div id="delete_bank_details<?= $sm->id ?>" class="modal fade" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="form-header">
                                                                <h3>Delete Sub Menu</h3>
                                                                <p>Are you sure want to delete?</p>
                                                            </div>
                                                            <div class="modal-btn delete-action">
                                                                <div class="row">

                                                                    <div class="col-6">
                                                                        <a href="<?= base_url('menu/delete_submenu/' . $sm->id) ?>"
                                                                            class="btn btn-danger paid-continue-btn">Delete</a>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a href="javascript:void(0);"
                                                                            data-bs-dismiss="modal"
                                                                            class="btn btn-primary paid-cancel-btn">Cancel</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="edit_submenu<?= $sm->id ?>" class="modal fade text-start"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Sub Menu</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?= base_url('menu/update_submenu/' . $sm->id) ?>"
                                                            method="post">
                                                            <div class="modal-body p-4">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="field-3" class="form-label">Sub
                                                                                Menu</label>
                                                                            <input type="text" name="submenu"
                                                                                class="form-control" id="field-3"
                                                                                value="<?= $sm->submenu ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="menu_id"
                                                                                class="form-label">Menu</label>
                                                                            <select class="form-control select2"
                                                                                name="menu_id" required>
                                                                                <option value="<?= $sm->menu_id ?>">
                                                                                    <?= $sm->menu ?>
                                                                                </option>
                                                                                <?php foreach ($menu as $m) : ?>
                                                                                <option value="<?= $m->id ?>">
                                                                                    <?= $m->menu ?></option>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="url"
                                                                                class="form-label">URL</label>
                                                                            <input type="text" name="url"
                                                                                class="form-control" id="field-3"
                                                                                value="<?= $sm->url ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <div class="form-check">
                                                                                <?php if ($sm->is_active == 1) { ?>
                                                                                <input type="checkbox" name="is_active"
                                                                                    id="is_active" value="1"
                                                                                    class="form-check-input" checked>
                                                                                <?php } else { ?>
                                                                                <input type="checkbox" name="is_active"
                                                                                    id="is_active" value="1"
                                                                                    class="form-check-input">
                                                                                <?php } ?>
                                                                                <label for="is_active"
                                                                                    class="form-check-label">Active?</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-outline-secondary waves-effect"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-outline-info waves-effect waves-light">Save
                                                                    Changes</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
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
                <h4 class="modal-title">Tambah Sub Menu</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/submenu') ?>" method="post">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-3" class="form-label">Sub Menu</label>
                                <input type="text" name="submenu" class="form-control" id="field-3"
                                    placeholder="Sub Menu" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="menu_id" class="form-label">Menu</label>
                                <select class="form-control select2" name="menu_id" required>
                                    <option disabled selected>Choose...</option>
                                    <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m->id ?>"><?= $m->menu ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="url" class="form-label">URL</label>
                                <input type="text" name="url" class="form-control" id="field-3" placeholder="Url.."
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" id="is_active" value="1"
                                        class="form-check-input" checked>
                                    <label for="is_active" class="form-check-label">Active?</label>
                                </div>
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