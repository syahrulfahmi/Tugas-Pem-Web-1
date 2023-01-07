<?
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Mahasiswa';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index');
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $userNim = $_POST['nim'];
        $userData = $this->model('User_model')->getMhsByNim($userNim);
        if (empty($userData)) {
            if ($this->model('User_model')->insertMhs($_POST) > 0) {
                Flasher::setFlash('Berhasil menambahkan data', 'success');
                header('Location:' . BASEURL . '/dashboard?page=mahasiswa');
                exit;
            } else {
                Flasher::setFlash('Gagal menambahkan data', 'danger');
                header('Location:' . BASEURL . '/dashboard?page=mahasiswa');
                exit;
            }
        } else {
            Flasher::setFlash('Mahasiswa sudah terdaftar', 'danger');
            header('Location:' . BASEURL . '/dashboard?page=mahasiswa');
            exit;
        }
    }

    public function ubah()
    {
        if ($this->model('User_model')->changeMhs($_POST) > 0) {
            Flasher::setFlash('Berhasil mengubah data', 'success');
            header('Location:' . BASEURL . '/dashboard?page=mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Berhasil mengubah data', 'success');
            header('Location:' . BASEURL . '/dashboard?page=mahasiswa');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('User_model')->getMhsByNim($_POST['user_nim']));
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->deleteMhs($id) > 0) {
            Flasher::setFlash('Berhasil menghapus data', 'success');
            header('Location:' . BASEURL . '/dashboard?page=mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal menghapus data', 'success');
            header('Location:' . BASEURL . '/dashboard?page=mahasiswa');
            exit;
        }
    }
}
