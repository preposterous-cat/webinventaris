<?php


class Admin_model
{
	
	private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function login($uname, $password) 
    {
        $this->db->query('SELECT * FROM tb_admin WHERE username = :username');

        //simpan nilai
        $this->db->bind(':username', $uname);

        $row = $this->db->single();
        if (!empty($row)) {
            $password_base = $row->password;

            if ($password_base == $password) {
                return $row;
            } else {
                return false;
            }
        }else{
            return false;
        } 
    }

}