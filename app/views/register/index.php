<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <h2>Aplikasi Pembayaran SPP Universitas Mercubuana</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <?php Flasher::getFlash(); ?>
                        </div>
                    </div>

                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Daftar</h4>
                            <form method="POST" action="<? echo BASEURL; ?>/register/daftar" class="my-login-validation" id="register_form">
                                <div class="form-group">
                                    <label for="username">Nama Lengkap</label>
                                    <input id="username" type="text" class="form-control" name="username" autofocus>
                                    <div class="invalid-feedback">
                                        Nama Lengkap Harus diisi
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nim">Nomor NIM</label>
                                    <input id="nim" type="number" class="form-control" name="nim">
                                    <div class="invalid-feedback">
                                        NIM harus diisi
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="custom-select" id="status" name="status">
                                        <option selected>Pilih Status</option>
                                        <option value="A">Admin</option>
                                        <option value="M">Mahasiswa</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input id="password" type="password" class="form-control" name="password" data-eye>
                                    <div class="invalid-feedback">
                                        Kata sandi harus diisi
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="re_password">Ulangi Kata Sandi</label>
                                    <input id="re_password" type="password" class="form-control" name="re_password" data-eye>
                                    <div class="invalid-feedback">
                                        Kata
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                                        Daftar
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Sudah punya akun? <a href="<? echo BASEURL; ?>/login">Masuk</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>