<?
class Register extends Controller
{

    public  function index()
    {
        $data['judul'] = "Daftar";
        $this->view('templates/header', $data);
        $this->view('register/index');
    }

    public function daftar()
    {
        $userNim =  $_POST['nim'];
        $userData = $this->model('User_model')->getUserByNim($userNim);
        $pass = $_POST['password'];
        $rePass = $_POST['re_password'];
        if ($pass == $rePass) {
            if (!empty($userData)) {
                Flasher::setFlash('NIM sudah ada', 'danger');
                header('Location:' . BASEURL . '/register');
                exit;
                return;
            }
            if ($this->model('Register_model')->addUser($_POST) > 0) {
                Flasher::setFlash('Berhasil mendaftar silahkan masuk', 'success');
                header('Location:' . BASEURL . '/login');
                exit;
            } else {
                Flasher::setFlash('Gagal mendaftar', 'danger');
                header('Location:' . BASEURL . '/register');
                exit;
            }
        } else {
            Flasher::setFlash('Password tidak sama', 'danger');
            header('Location:' . BASEURL . '/register');
            exit;
        }
    }
}
