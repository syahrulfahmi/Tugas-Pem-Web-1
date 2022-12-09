<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-5 mb-1">
            <h4 class="text-uppercase">Data Program Studi</h4>
        </div>
    </div>

    <div class="row mb-3 justify-content-between">
        <div class="col-lg-6">
            <button type="button" id="btn_modal" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Program Studi
            </button>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <?php Flasher::getFlash(); ?>
            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Program Studi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['prodi'] as $key => $prodi) : ?>
                <tr>
                    <th scope="row"><? echo $key + 1; ?></th>
                    <td><? echo $prodi['prod_name'] ?></td>
                    <td>
                        <a href="<?php echo BASEURL; ?>/prodi/ubah/<?php echo $prodi['prod_id'] ?>" class="badge badge-success mr-2 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?php echo $prodi['prod_id'] ?>">Ubah</a>
                        <a href="<?php echo BASEURL; ?>/prodi/hapus/<?php echo $prodi['prod_id'] ?>" class="badge badge-danger mr-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASEURL ?>/prodi/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="prod_name">Nama Program Studi</label>
                        <input type="text" class="form-control" id="prod_name" name="prod_name" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo BASEURL; ?>/js/script-modal-prodi.js"></script>