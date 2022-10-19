<?php
//menyertakan file program koneksi.php pada register
require_once('../koneksi.php');

header('Content-Type: application/json');
$nim        = isset($_POST['nim'])  ? $_POST['nim'] : "";
$nim        = mysqli_real_escape_string($con, $nim);

$password   = isset($_POST['password'])  ? $_POST['password'] : "";
$password   = mysqli_real_escape_string($con, $password);
//cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
if (!empty(trim($nim)) && !empty(trim($password))) {
    //select data berdasarkan username dari database
    $query      = "SELECT * FROM tb_users WHERE user_nim = '$nim'";
    $result     = mysqli_query($con, $query);
    $rows       = mysqli_num_rows($result);
    if ($rows != 0) {
        $hash   = mysqli_fetch_assoc($result)['user_password'];
        if (password_verify($password, $hash)) {
            $_SESSION['user_nim'] = $nim;
            http_response_code(200);
            $response["status"] = 200;
            $response["message"] = "Sukses";
            $response["data"] = null;
            echo json_encode($response);
            //jika gagal maka akan menampilkan pesan error
        } else {
            http_response_code(500);
            $response["status"] = 500;
            $response["message"] = "Username atau password salah";
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
} else {
    http_response_code(400);
    $response["status"] = 400;
    $response["message"] = "Mohon maaf login tidak berhasil";
    $response["data"] = null;
    echo json_encode($response);
}
