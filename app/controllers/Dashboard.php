<?
class Dashboard extends Controller
{
    public function index()
    {
        $data['judul'] = "Dashboard";
        $this->view('templates/dashboard', $data);

        $url = basename($_SERVER['REQUEST_URI']);
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);
        $test = $params['page'];
        switch ($test) {
            case 'mahasiswa':
                $data['mhs'] = $this->model('User_model')->getAllMhs();
                $this->view('dashboard/mahasiswa', $data);
                break;
            case 'program-studi':
                var_dump("program-studi");
                break;
            case 'semester':
                $this->view('dashboard/semester', $data);
                break;
            case 'transaksi':
                var_dump("transaksi");
                break;
            case 'main':
                $this->view('dashboard/index', $data);
                break;
            default:
        }
    }


    //get detail mahasiswa
    public function mahasiswa()
    {
        $url = basename($_SERVER['REQUEST_URI']);
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);
        $nim = $params['detail'];
        $data['judul'] = "Dashboard";
        $this->detail($nim);
    }

    public function detail($nim)
    {
        $data['mhs'] = $this->model('User_model')->getUserByNim($nim);
        $data['judul'] = "Dashboard";
        $this->view('templates/dashboard', $data);
        $this->view('dashboard/mahasiswa/mahasiswa_detail', $data);
    }

    public function search()
    {
        $data['judul'] = "Dashboard";
        $data['mhs'] = $this->model('User_model')->searchMhs();
        $this->view('templates/dashboard', $data);
        $this->view('dashboard/mahasiswa', $data);
    }
}
