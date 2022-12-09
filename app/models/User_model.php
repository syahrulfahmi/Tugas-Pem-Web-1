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

    public function getMhsByNim($nim)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE user_nim=:nim AND user_status= 'M'");
        $this->db->bind('nim', $nim);
        return $this->db->single();
    }

    public function getAllMhs()
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE user_status = 'M'");
        return $this->db->resultSet();
    }

    public function insertMhs($data)
    {
        $hashPassword = password_hash("123456789", PASSWORD_DEFAULT); // default password
        $query = "INSERT INTO tb_users(user_name, user_nim, user_prod, user_password, user_status) VALUES (:nama, :nim, :jurusan, :password, 'M')";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('password', $hashPassword);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function changeMhs($data)
    {

        $query = "UPDATE tb_users SET user_name = :nama, user_nim=:nim, user_prod=:jurusan WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteMhs($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE user_nim=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
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
