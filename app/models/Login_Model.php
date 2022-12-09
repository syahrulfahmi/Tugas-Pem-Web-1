<?
class Login_Model
{
    private $table = 'tb_users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}
