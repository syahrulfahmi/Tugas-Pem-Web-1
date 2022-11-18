<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5 mb-1">
                <h4 class="text-uppercase">Data Mahasiswa</h4>
            </div>
        </div>

        <div class="row mb-3 justify-content-between">
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
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
                            <a href="#" data-id="<?php echo $mhs['user_nim'] ?>" id="detail" class="badge badge-primary mr-2" onclick="goToDetail(<?php echo $mhs['user_nim'] ?>)">Detail</a>
                            <a href="<?php echo BASEURL; ?>/mahasiswa/ubah/<?php echo $mhs['id'] ?>" class="badge badge-success mr-2 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?php echo $mhs['id'] ?>">Ubah</a>
                            <a href="<?php echo BASEURL; ?>/mahasiswa/hapus/<?php echo $mhs['id'] ?>" class="badge badge-danger mr-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    function goToDetail(nim) {
        console.log(nim);
        loadContent('http://localhost/pemweb/public/dashboard/detail/' + nim);
    }
</script>

</html>