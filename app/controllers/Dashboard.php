<?
class Dashboard extends Controller
{
    public function index()
    {
        $this->view('templates/dashboard');
    }

    public function mahasiswa()
    {
        $this->view('templates/dashboard');
        $this->view('dashboard/mahasiswa');
    }
}
