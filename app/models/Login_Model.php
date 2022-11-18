<?
class Login_Model
{
    private $table = 'tb_users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function run()
    {

        $nim = $_POST['nim'];
        $password = md5($_POST['password']);

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE user_nim=:nim');
        $this->db->bind('nim', $nim);
        $count = $this->db->rowCount();
    }
}
