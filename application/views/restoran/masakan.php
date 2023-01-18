<style>
td .popup-image {
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, .9);
    height: 100%;
    width: 100%;
    z-index: 10000;
    display: none;

}

td .popup-image span {
    position: absolute;
    top: 5;
    right: 0;
    font-size: 40px;
    font-weight: bolder;
    color: #fff;
    cursor: pointer;
    z-index: 100;
}

td .popup-image img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 5px solid #fff;
    border-radius: 5px;
    width: 750px;
    object-fit: cover;
}

@media(max-width:768px) {
    td .popup-image img {
        width: 95%;
    }
}
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Makanan</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<a href=" <?= base_url('menu') ?>">Restoran</a></li>
                        <li class="breadcrumb-item active">Makanan</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Makanan</h4>
                        <!-- <p class="card-text">
                            This is the most basic example of the datatables with zero configuration. Use the
                            <code>.datatable</code> class to initialize datatables.
                        </p> -->
                    </div>
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#con-close-modal">Tambah Makanan</button>
                        </div>
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead class="text-start">
                                    <tr>
                                        <th>No</th>
                                        <th>Masakan</th>
                                        <th>Image</th>
                                        <th>Tipe Masakan</th>
                                        <th>Status Masakan</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-start">
                                    <?php
                                    $no = 1;
                                    foreach ($masakan as $food) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $food->nama_masakan; ?></td>
                                        <td>
                                            <div class="image-container">
                                                <img src="<?= base_url('assets/image/masakan/' . $food->image) ?>"
                                                    alt="<?= $food->nama_masakan; ?>" width="80px">
                                            </div>
                                            <div class="popup-image">
                                                <span>&times;</span>
                                                <img src="<?= base_url('assets/image/masakan/' . $food->image) ?>">
                                            </div>
                                        </td>
                                        <td><?= $food->type; ?></td>
                                        <td><?= $food->status_masakan; ?></td>
                                        <td><?= $food->harga; ?></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#delete_bank_details<?= $food->id ?>"
                                                class="btn btn-outline-danger btn-sm"><i data-feather="trash-2"></i></a>
                                            </a>
                                            <a href="#" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit_menu<?= $food->id ?>"><i class="fa fa-edit"></i>
                                            </a>
                                            <div id="delete_bank_details<?= $food->id ?>" class="modal fade"
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
                                                                        <a href="<?= base_url('menu/delete_menu/' . $food->id) ?>"
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
                <h4 class="modal-title">Tambah Masakan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('restoran/masakan') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <div class="custom-file-container__image-preview"></div>
                                <label>Image<a href="javascript:void(0)" class="custom-file-container__image-clear"
                                        title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                        accept="image/*" name="image">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 mt-3">
                                <label for="masakan" class="form-label">Masakan</label>
                                <input type="text" name="masakan" class="form-control" id="masakan"
                                    placeholder="masakan">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipe Masakan</label>
                                <select class="form-control select2" name="type" required>
                                    <option disabled selected>Choose...</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Masakan</label>
                                <select class="form-control select2" name="status" required>
                                    <option disabled selected>Choose...</option>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="habis">Habis</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 mt-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga">
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
<script>
document.querySelectorAll('.image-container img').forEach(image => {
    image.onclick = () => {
        document.querySelector('.popup-image').style.display = 'block';
        document.querySelector('.popup-image img').src = image.getAttribute('src');
    }
});
document.querySelector('.popup-image span').onclick = () => {
    document.querySelector('.popup-image').style.display = 'none';
}
</script>