<?php
require_once('../koneksi.php');

header('Content-Type: application/json');
$username   =  isset($_POST['username'])  ? $_POST['username'] : "";
$username   = mysqli_real_escape_string($con, $username);
$nim        = isset($_POST['nim'])  ? $_POST['nim'] : "";
$nim        = mysqli_real_escape_string($con, $nim);
$status     = isset($_POST['status'])  ? $_POST['status'] : "";

$password   = isset($_POST['password'])  ? $_POST['password'] : "";
$password   = mysqli_real_escape_string($con, $password);
$repass     = isset($_POST['re_password'])  ? $_POST['re_password'] : "";
$repass     = mysqli_real_escape_string($con, $repass);
//cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
if (!empty(trim($username)) && !empty(trim($nim)) && !empty(trim($status)) && !empty(trim($password)) && !empty(trim($repass))) {
    //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
    if ($password == $repass) {
        //memanggil method cekNim untuk mengecek apakah user sudah terdaftar atau belum
        if (cekNim($nim, $con) == 0) {
            //hashing password sebelum disimpan didatabase
            $pass  = password_hash($password, PASSWORD_DEFAULT);
            //insert data ke database
            $query = "INSERT INTO tb_users (user_name, user_nim, user_password, user_status) VALUES ('$username','$nim', '$pass', '$status')";
            $result   = mysqli_query($con, $query);
            //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
            if ($result) {
                // $_SESSION['username'] = $username;
                // header('Location: login.php');
                http_response_code(200);
                $response["status"] = 200;
                $response["message"] = "Sukses";
                $response["data"] = null;
                echo json_encode($response);
                //jika gagal maka akan menampilkan pesan error
            } else {
                http_response_code(500);
                $response["status"] = 500;
                $response["message"] = "Gagal";
                $response["data"] = null;
                echo json_encode($response);
            }
        } else {
            http_response_code(400);
            $response["status"] = 400;
            $response["message"] = "NIM sudah terdaftar";
            $response["data"] = null;
            echo json_encode($response);
        }
    } else {
        http_response_code(400);
        $response["status"] = 400;
        $response["message"] = "Password tidak sama";
        $response["data"] = null;
        echo json_encode($response);
    }
} else {
    http_response_code(400);
    $response["status"] = 400;
    $response["message"] = "Data yang anda masukan tidak valid";
    $response["data"] = null;
    echo json_encode($response);
}

//fungsi untuk mengecek username apakah sudah terdaftar atau belum
function cekNim($nim, $con)
{
    $nama = mysqli_real_escape_string($con, $nim);
    $query = "SELECT * FROM tb_users WHERE user_nim = '$nama'";
    if ($result = mysqli_query($con, $query)) return mysqli_num_rows($result);
}
