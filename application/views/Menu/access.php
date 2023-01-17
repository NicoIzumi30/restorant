<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Access Management</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<a href=" <?= base_url('menu') ?>">Menu</a></li>
                        <li class="breadcrumb-item active">Access Management</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Access Management</h4>
                        <!-- <p class="card-text">
                            This is the most basic example of the datatables with zero configuration. Use the
                            <code>.datatable</code> class to initialize datatables.
                        </p> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead class="text-start">
                                    <tr>
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th>Access</th>
                                    </tr>
                                </thead>
                                <tbody class="text-start">
                                    <?php
                                    $no = 1;
                                    foreach ($menu as $mm) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $mm->menu; ?></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    <?= check_access($role['id'], $mm->id) ?>
                                                    data-role="<?= $role['id']; ?>" data-menu="<?= $mm->id; ?>">
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

<script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>


<script>
$('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
        url: "<?= base_url('menu/changeaccess') ?>",
        type: 'POST',
        data: {
            menuId: menuId,
            roleId: roleId
        },

        success: function() {
            document.location.href = "<?= base_url('menu/access/') ?>" + roleId;
        }
    });
});
</script>