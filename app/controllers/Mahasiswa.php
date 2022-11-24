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
}
