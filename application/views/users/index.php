<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
        <div class="flash-data-user" data-flashdata="<?= $this->session->flashdata('flash-user'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Users Management</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<a href=" <?= base_url('users') ?>">Users</a></li>
                        <li class="breadcrumb-item active">Users Management</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Users Management</h4>
                        <!-- <p class="card-text">
                            This is the most basic example of the datatables with zero configuration. Use the
                            <code>.datatable</code> class to initialize datatables.
                        </p> -->
                    </div>
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#con-close-modal">Tambah User</button>
                        </div>
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Active</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $no = 1;
                                    foreach ($users as $user) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $user->name; ?></td>
                                        <td><?= $user->email; ?></td>
                                        <td><?= $user->telp; ?></td>
                                        <td>IMAGE</td>
                                        <td><?= $user->role; ?></td>
                                        <td><?php if ($user->is_active == 1) {
                                                    echo '<span class="badge rounded-pill badge-outline-success">Active</span>';
                                                } else {
                                                    echo '<span class="badge badge-soft-danger badge-border">Deactive</span>';
                                                } ?></td>
                                        <td><?= date("d-M-Y", $user->date_created) ?></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#delete_bank_details<?= $user->id ?>"
                                                class="btn btn-outline-danger btn-sm"><i data-feather="trash-2"></i></a>
                                            </a>
                                            <a href="#" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit_menu<?= $user->id ?>"><i class="fa fa-edit"></i>
                                            </a>
                                            <div id="delete_bank_details<?= $user->id ?>" class="modal fade"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="form-header">
                                                                <h3>Delete Menu</h3>
                                                                <p>Are you sure want to delete?</p>
                                                            </div>
                                                            <div class="modal-btn delete-action">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <a href="<?= base_url('users/delete/' . $user->id) ?>"
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
                                            <div id="edit_menu<?= $user->id ?>" class="modal fade text-start"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit User</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?= base_url('users/update/' . $user->id) ?>"
                                                            method="post">
                                                            <div class="modal-body p-4">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="role"
                                                                                class="form-label">Role</label>
                                                                            <select class="form-control select2"
                                                                                name="role" required>
                                                                                <option value="<?= $user->role_id ?>">
                                                                                    <?= $user->role ?>
                                                                                </option>
                                                                                <?php foreach ($role as $r) : ?>
                                                                                <option value="<?= $r->id ?>">
                                                                                    <?= $r->role ?></option>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="role"
                                                                                class="form-label">Active</label>
                                                                            <select class="form-control select2"
                                                                                name="active" required>
                                                                                <?php if ($user->is_active == 1) { ?>
                                                                                <option value="1">Active</option>
                                                                                <option value="0">Deactive</option>
                                                                                <?php } else { ?>
                                                                                <option value="0">Deactive</option>
                                                                                <option value="1">Active</option>
                                                                                <?php } ?>
                                                                            </select>
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
                <h4 class="modal-title">Tambah User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('users/index') ?>" method="post">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" id="email" class="form-control" placeholder="Your Email"
                                            name="email" aria-describedby="basic-addon2" disabled>
                                        <input type="hidden" name="email-h" id="email-h" value="">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="telp" class="form-label">Telp</label>
                                <input type="number" name="telp" class="form-control" id="telp"
                                    placeholder="Your Phone Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control select2" name="role" required>
                                    <option disabled selected>Choose...</option>
                                    <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r->id ?>">
                                        <?= $r->role ?></option>
                                    <?php endforeach ?>
                                </select>
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
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- <div class="modal-header text-center">
                <h4 class="text-center" id="myCenterModalLabel">Data User</h4>
                <h3 class="text-center">Data User</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body px-2">
                <div class="modal-footer">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h4 class="text-center">Data User</h4>
                <table class="mx-auto mb-4">
                    <tr class="text-start">
                        <td>Email</td>
                        <td> : </td>
                        <td><?= $this->session->flashdata('flash-email'); ?></td>
                    </tr>
                    <tr class="text-start">
                        <td>Password</td>
                        <td> : </td>
                        <td>
                            <small id="password"> <?= $this->session->flashdata('flash-password'); ?> </small><small
                                onclick="copyText()"><i data-feather="copy"></i></small>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const flashUser = $('.flash-data-user').data('flashdata');
    if (flashUser) {
        $('#userModal').modal('show');
    }
    $("#name").keyup(function() {
        var value = $("#name").val();
        var nsp = value.replace(/\s/g, '');
        var val = nsp.toLowerCase();
        $("#email").val(val + '@palm.site');
        $("#email-h").val(val + '@palm.site');
    });
});

function copyText() {
    var valueText = $("#password").select().text();
    let q = document.execCommand("copy");
    if (q) {
        alert('Password copied!')
    }
}
</script>