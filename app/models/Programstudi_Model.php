<?
class Programstudi_Model
{
    private $table = 'tb_prodi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProdi()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }
}
