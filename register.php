<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <h2>Aplikasi Pembayaran SPP Universitas Mercubuana</h2>
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Daftar</h4>
                            <form method="POST" class="my-login-validation" id="register_form">
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
                                    Sudah punya akun? <a href="login.php">Masuk</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="footer">
                        Copyright &copy; 2022 &mdash; Your Company
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="js/validation.js"></script> -->
    <script>
        $(function() {
            $('form').on('submit', function(e) {
                e.preventDefault()
                location.href = 'http://localhost/web1/login.php';
                $.ajax({
                    type: 'post',
                    url: 'action/register.php',
                    data: $('form').serialize(),
                    success: function(res) {
                        var json = jQuery.parseJSON(res.responseText);
                        alert(json.message);
                        location.href = 'http://localhost/web1/login.php';
                    },
                    error: function(res, ajaxOptions, thrownError) {
                        var json = jQuery.parseJSON(res.responseText);
                        alert(json.message);
                    }
                });
                // form.addClass('was-validated');
            });
        });
    </script>
</body>

</html>