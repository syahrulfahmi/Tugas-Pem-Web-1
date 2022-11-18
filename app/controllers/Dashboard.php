<?
class Dashboard extends Controller
{
    public function index()
    {
        $data['judul'] = "Dashboard";
        $this->view('templates/dashboard', $data);
    }

    public function mahasiswa()
    {
        $data['mhs'] = $this->model('User_model')->getAllMhs();
        $this->view('dashboard/mahasiswa', $data);
    }

    public function detail($nim)
    {
        $data['mhs'] = $this->model('User_model')->getUserByNim($nim);
        $data['judul'] = "Dashboard";
        // $this->view('templates/dashboard', $data);
        $this->view('dashboard/mahasiswa_detail', $data);
    }

    public function search()
    {
        $data['judul'] = "Dashboard";
        $data['mhs'] = $this->model('User_model')->searchMhs();
        $this->view('templates/dashboard', $data);
        $this->view('dashboard/mahasiswa', $data);
    }
}
