<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();
$error = '';
$validate = '';
//mengecek apakah form registrasi di submit atau tidak
if( isset($_POST['submit']) ){
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($con, $username);

        $nama     = stripslashes(isset($_POST['fullname']));
        $nama     = mysqli_real_escape_string($con, $nama);

        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        
        $phone    = stripslashes(isset($_POST['phone']));
        $phone    = mysqli_real_escape_string($con, $phone);

        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $repass   = stripslashes($_POST['repassword']);
        $repass   = mysqli_real_escape_string($con, $repass);
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($nama)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($phone)) && !empty(trim($password)) && !empty(trim($repass))){
            //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
            if($password == $repass){
                //memanggil method cekNama untuk mengecek apakah user sudah terdaftar atau belum
                if(cekNama($nama, $con) == 0 ){
                    //hashing password sebelum disimpan didatabase
                    $pass  = password_hash($password, PASSWORD_DEFAULT);
                    //insert data ke database
                    $query = "INSERT INTO users (username, fullname, email, phone, password) VALUES ('$username','$nama','$email', $phone, '$pass')";
                    $result   = mysqli_query($con, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        $_SESSION['username'] = $username;
                        
                        header('Location: index.php');
                     
                    //jika gagal maka akan menampilkan pesan error
                    } else {
                        $error =  'Register User Gagal !!';
                    }
                }else{
                        $error =  'Username sudah terdaftar !!';
                }
            }else{
                $validate = 'Password tidak sama !!';
            }
             
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    } 
    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cekNama($username, $con){
        $nama = mysqli_real_escape_string($con, $username);
        $query = "SELECT * FROM users WHERE username = '$nama'";
        if( $result = mysqli_query($con, $query) ) return mysqli_num_rows($result);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- costum css -->
    <link rel="stylesheet" href="style.css">
    <style>
        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <section class="container-fluid mb-4 vertical-center">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="register.php" method="POST">
                    <h4 class="text-center font-weight-bold"> Daftar </h4>
                    <?php if($error != ''){ ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="username">Nama Pengguna</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Masukkan nama pengguna">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="fullname" name="fullname"
                            placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Alamat Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="email"
                            aria-describeby="emailHelp" placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label for="username">No Hp</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan No HP">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Kata Sandi</label>
                        <input type="password" class="form-control" id="InputPassword" name="password"
                            placeholder="Masukan Kata Sandi">
                        <?php if($validate != '') {?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Ulangi Kata Sandi</label>
                        <input type="password" class="form-control" id="InputRePassword" name="repassword"
                            placeholder="Ulangi Kata Sandi">
                        <?php if($validate != '') {?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Daftar</button>
                    <div class="form-footer mt-2">
                        <p> Sudah punya akun? <a href="login.php">Masuk</a></p>
                    </div>
                </form>
            </section>
        </section>
    </section>
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>