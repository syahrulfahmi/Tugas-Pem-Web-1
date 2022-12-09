<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-5 mb-1">
            <h4 class="text-uppercase">Data Mahasiswa</h4>
        </div>
    </div>

    <div class="row mb-3 justify-content-between">
        <div class="col-lg-6">
            <button type="button" id="btn_modal" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>

        <!-- <div class="col-lg-4 float-right">
                <form action="<?php echo BASEURL; ?>/dashboard/search" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari mahasiswa..." name="keyword" id="keyword" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                        </div>
                    </div>
                </form>
            </div> -->

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
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['mhs'] as $key => $mhs) : ?>
                <tr>
                    <th scope="row"><? echo $key + 1; ?></th>
                    <td><? echo $mhs['user_name'] ?></td>
                    <td><? echo $mhs['user_nim'] ?></td>
                    <td>
                        <a href="<?php echo BASEURL; ?>/dashboard/mahasiswa?detail=<?php echo $mhs['user_nim'] ?>" data-id="<?php echo $mhs['user_nim'] ?>" id="detail" class="badge badge-primary mr-2" onclick="goToDetail(<?php echo $mhs['user_nim'] ?>)">Detail</a>
                        <a href="<?php echo BASEURL; ?>/mahasiswa/ubah/<?php echo $mhs['user_nim'] ?>" class="badge badge-success mr-2 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?php echo $mhs['user_nim'] ?>">Ubah</a>
                        <a href="<?php echo BASEURL; ?>/mahasiswa/hapus/<?php echo $mhs['user_nim'] ?>" class="badge badge-danger mr-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
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
                <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASEURL ?>/mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="number" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <?php foreach ($data['prodi'] as $key => $prodi) : ?>
                                <option value="<? echo $prodi['prod_id'] ?>"><? echo $prodi['prod_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
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

<script src="<?php echo BASEURL; ?>/js/script-modal-mahasiswa.js"></script>