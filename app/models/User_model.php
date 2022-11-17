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
}
