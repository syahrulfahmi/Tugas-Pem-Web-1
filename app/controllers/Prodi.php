<?
class Prodi extends Controller
{

    public function getProdi()
    {
        echo json_encode($this->model('Programstudi_Model')->getProdiById($_POST['prod_id']));
    }

    public function tambah()
    {
        $existProdi = $this->model('Programstudi_Model')->getProdiByName($_POST['prod_name']);
        if (empty($existProdi)) {
            if ($this->model('Programstudi_Model')->insertProdi($_POST) > 0) {
                Flasher::setFlash('Berhasil menambahkan data', 'success');
                header('Location:' . BASEURL . '/dashboard?page=program-studi');
                exit;
            } else {
                Flasher::setFlash('Gagal menambahkan data', 'danger');
                header('Location:' . BASEURL . '/dashboard?page=program-studi');
                exit;
            }
        } else {
            Flasher::setFlash('Program Studi sudah terdaftar', 'danger');
            header('Location:' . BASEURL . '/dashboard?page=program-studi');
            exit;
        }
    }

    public function ubah()
    {
        if ($this->model('Programstudi_Model')->changeProdi($_POST) > 0) {
            Flasher::setFlash('Berhasil mengubah data', 'success');
            header('Location:' . BASEURL . '/dashboard?page=program-studi');
            exit;
        } else {
            Flasher::setFlash('Berhasil mengubah data', 'success');
            header('Location:' . BASEURL . '/dashboard?page=program-studi');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->deleteProdi($id) > 0) {
            Flasher::setFlash('Berhasil menghapus data', 'success');
            header('Location:' . BASEURL . '/dashboard?page=program-studi');
            exit;
        } else {
            Flasher::setFlash('Gagal menghapus data', 'success');
            header('Location:' . BASEURL . '/dashboard?page=program-studi');
            exit;
        }
    }
}
