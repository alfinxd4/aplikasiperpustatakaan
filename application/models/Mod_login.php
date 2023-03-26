<?php
// model login
class Mod_login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    // function autenticaiton dosen
    function auth($username, $password)
    {
        // connect to db tb dosen
        $query = $this->db->query("SELECT * FROM account WHERE username='$username' AND
password=MD5('$password') LIMIT 1");
        return $query;
    }
}
