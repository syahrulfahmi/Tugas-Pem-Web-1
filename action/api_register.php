<?php
require_once('../koneksi.php');

header('Content-Type: application/json');
$username   = stripslashes($_POST['username']);
$username   = mysqli_real_escape_string($con, $username);
$nim        = stripslashes(isset($_POST['nim']));
$nim        = mysqli_real_escape_string($con, $nim);
$status     = stripslashes($_POST['status']);

$password   = stripslashes($_POST['password']);
$password   = mysqli_real_escape_string($con, $password);
$repass     = stripslashes($_POST['re_password']);
$repass     = mysqli_real_escape_string($con, $repass);
//cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
if (!empty(trim($username)) && !empty(trim($nim)) && !empty(trim($status)) && !empty(trim($password)) && !empty(trim($repass))) {
    //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
    if ($password == $repass) {
        //memanggil method cekNama untuk mengecek apakah user sudah terdaftar atau belum
        if (cekNama($username, $con) == 0) {
            //hashing password sebelum disimpan didatabase
            $pass  = password_hash($password, PASSWORD_DEFAULT);
            //insert data ke database
            $query = "INSERT INTO tb_users (user_name, user_nim, user_password, user_status) VALUES ('$username','$nim', '$pass', '$status')";
            $result   = mysqli_query($con, $query);
            //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
            if ($result) {
                // $_SESSION['username'] = $username;
                // header('Location: login.php');
                $response["status"] = 200;
                $response["message"] = "Sukses";
                $response["data"] = null;
                echo json_encode($response);
                //jika gagal maka akan menampilkan pesan error
            } else {
                $response["status"] = 500;
                $response["message"] = "Gagal";
                $response["data"] = null;
                echo json_encode($response);
            }
        } else {
            $response["status"] = 400;
            $response["message"] = "NIM sudah terdaftar";
            $response["data"] = null;
            echo json_encode($response);
        }
    }
} else {
    $response["status"] = 400;
    $response["message"] = "Data yang anda masukan tidak valid";
    $response["data"] = null;
    echo json_encode($response);
}

//fungsi untuk mengecek username apakah sudah terdaftar atau belum
function cekNama($username, $con)
{
    $nama = mysqli_real_escape_string($con, $username);
    $query = "SELECT * FROM users WHERE username = '$nama'";
    if ($result = mysqli_query($con, $query)) return mysqli_num_rows($result);
}
