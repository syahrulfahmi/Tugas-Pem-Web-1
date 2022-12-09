<?
class Prodi extends Controller
{

    public function getProdi()
    {
        echo json_encode($this->model('Programstudi_Model')->getProdi());
    }
}
