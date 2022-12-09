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

    public function getProdiById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE prod_id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getProdiByName($name)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE prod_name=:name");
        $this->db->bind('name', $name);
        return $this->db->single();
    }

    public function insertProdi($data)
    {
        $query = "INSERT INTO tb_prodi(prod_name) VALUES (:prod_name)";
        $this->db->query($query);
        $this->db->bind('prod_name', $data['prod_name']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function changeProdi($data)
    {
        $query = "UPDATE tb_prodi SET prod_name = :prod_name WHERE prod_id=:prod_id";
        $this->db->query($query);
        $this->db->bind('prod_name', $data['prod_name']);
        $this->db->bind('prod_id', $data['prod_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteProdi($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE prod_id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
