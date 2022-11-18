<?
class User_Model
{

    private $table = 'tb_users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByNim($nim)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE user_nim=:nim');
        $this->db->bind('nim', $nim);
        return $this->db->single();
    }

    public function getAllMhs()
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE user_status = 'M'");
        return $this->db->resultSet();
    }

    public function searchMhs()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tb_users WHERE user_name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
