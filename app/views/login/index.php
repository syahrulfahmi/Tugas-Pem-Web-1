<?
if (isset($_SESSION['user']['is_login'])) {
    if ($_SESSION['user']['data']['user_status'] == 'A') {
        header('Location: http://localhost/pemweb/public/dashboard');
    } else {
        echo 'ke halaman mahasiswa';
        // header('Location: http://localhost/pemweb/public/dashboard');
    }
    exit();
}
?>

<body class="my-login-page">
    <section class="mt-4">
        <div class=" container h-100">
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
                            <h4 class="card-title">Masuk</h4>
                            <form method="post" action="<?php echo BASEURL; ?>/login/signin" class="my-login-validation">
                                <div class="form-group">
                                    <label for="email">NIM</label>
                                    <input type="number" class="form-control" id="nim" name="nim" value="" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" class="form-control" id="password" name="password" required data-eye>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                                        Masuk
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Belum punya akun? <a href="<? echo BASEURL; ?>/register">Daftar</a> disini
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>