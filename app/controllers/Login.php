<?php
class Login extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function signin()
    {
        $userNim =  $_POST['nim'];
        $password = $_POST['password'];
        $userData = $this->model('User_model')->getUserByNim($userNim);
        if (password_verify($password, $userData['user_password'])) {
            if ($userData['user_status'] == 'A') {
                header('Location:' . BASEURL . '/dashboard');
            } else {
                echo 'kehalaman mahasiswa';
                // header('Location:' . BASEURL . '/dashboard');
            }
            exit;
        } else {
            Flasher::setFlash('Login belum berhasil, pastikan nim dan password benar',  'danger');
            header('Location:' . BASEURL . '/login');
            exit;
        }
    }
}
