<?
class Register_model
{
    private $table = 'tb_users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addUser($data)
    {
        $query = "INSERT INTO tb_users(user_name, user_nim, user_password, user_status) VALUES (:user_name, :user_nim, :user_password, :user_status)";
        $hashPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->db->query($query);
        $this->db->bind('user_name', $data['username']);
        $this->db->bind('user_nim', $data['nim']);
        $this->db->bind('user_password', $hashPassword);
        $this->db->bind('user_status', $data['status']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
