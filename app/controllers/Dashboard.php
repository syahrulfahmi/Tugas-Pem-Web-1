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
        if (isset($params['page'])) {
            $param = $params['page'];
            switch ($param) {
                case 'mahasiswa':
                    $data['mhs'] = $this->model('User_model')->getAllMhs();
                    $data['prodi'] = $this->model('Programstudi_Model')->getProdi();
                    $this->view('dashboard/mahasiswa', $data);
                    break;
                case 'program-studi':
                    $data['prodi'] = $this->model('Programstudi_Model')->getProdi();
                    $this->view('dashboard/prodi', $data);
                    break;
                case 'semester':
                    $this->view('dashboard/semester', $data);
                    break;
                case 'transaksi':
                    var_dump("transaksi");
                    break;
                case 'main':
                    $data['jml_mhs'] = $this->model('User_model')->getAllMhs();
                    $data['jml_prodi'] = $this->model('Programstudi_Model')->getProdi();
                    $this->view('dashboard/index', $data);
                    break;
                default:
            }
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
        $data['mhs'] = $this->model('User_model')->getMhsByNim($nim);
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
