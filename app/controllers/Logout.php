<?
class Logout extends Controller
{

    public function index()
    {
        unset($_SESSION['user']);
        Flasher::setFlash('Logout berhasil',  'success');
        header('Location:' . BASEURL . '/login');
    }
}
