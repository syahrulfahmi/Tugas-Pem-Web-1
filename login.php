<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
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
                            <h4 class="card-title">Masuk</h4>
                            <form method="POST" class="my-login-validation" novalidate="">
                                <div class="form-group">
                                    <label for="email">NIM</label>
                                    <input id="nim" type="number" class="form-control" name="nim" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Kata Sandi
                                        <!-- <a href="forgot.html" class="float-right">
                                            Forgot Password?
                                        </a> -->
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password" required data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                        <label for="remember" class="custom-control-label">Remember Me</label>
                                    </div>
                                </div> -->

                                <div class="form-group m-0">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                                        Masuk
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Belum punya akun? <a href="register.php">Daftar</a> disini
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="footer">
                        Copyright &copy; 2017 &mdash; Your Company
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('form').on('submit', function(e) {
                e.preventDefault()
                location.href = 'http://localhost/web1/index.php';
                // $.ajax({
                //     type: 'post',
                //     url: 'action/login.php',
                //     data: $('form').serialize(),
                //     success: function(res) {
                //         var json = jQuery.parseJSON(res.responseText);
                //         alert(json.message);
                //         location.href = 'http://localhost/web1/index.php';
                //     },
                //     error: function(res, ajaxOptions, thrownError) {
                //         var json = jQuery.parseJSON(res.responseText);
                //         alert(json.message);
                //     }
                // });
                // form.addClass('was-validated');
            });
        });
    </script>
</body>

</html>