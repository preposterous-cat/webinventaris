<?php


class User_model
{
	
	private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function login($uname, $password) 
    {
        $this->db->query('SELECT * FROM tb_users WHERE username = :username');

        //simpan nilai
        $this->db->bind(':username', $uname);

        $row = $this->db->single();

        if (!empty($row)) {
            $password_base = $row->password;
            if (password_verify($password, $password_base)) {
                return $row;
            } else {
                return false;
            }
        }else{
            return false;
        } 
    }
    
    public function register($data) 
    {
        $this->db->query('INSERT INTO tb_users (nama, username, bagian, password) VALUES(:nama, :username, :bagian, :password)');

        //Ambil Nilai
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':bagian', $data['bagian']);
        $this->db->bind(':password', $data['password']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByUsername($uname) 
    {
        //Perintah Query
        $this->db->query('SELECT * FROM tb_users WHERE username = :username');

        $this->db->bind(':username', $uname);

        //Cek Username sudah digunakan atau belum
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllDataByID($id)
    {
        $this->db->query('SELECT * FROM tb_users WHERE id_user = :id_user');
        $this->db->bind(':id_user', $id);

        $row = $this->db->single(); 

        return $row;
    }

    public function getPWByID($id)
    {
        $this->db->query('SELECT * FROM tb_users WHERE id_user = :id_user');
        $this->db->bind(':id_user', $id);

        $row = $this->db->single();
        $pw = $row->password;

        return $pw;
    }

    public function getUnameByID($id)
    {
        $this->db->query('SELECT * FROM tb_users WHERE id_user = :id_user');
        $this->db->bind(':id_user', $id);

        $row = $this->db->single();
        $uname = $row->username;

        return $uname;
    }

    public function getAllDataStaff()
    {
        $this->db->query('SELECT * FROM tb_users WHERE bagian = :bagian ORDER BY id_user DESC');

        $this->db->bind(':bagian', 'Staff');
        $results = $this->db->resultSet();

        return $results;
    }



    public function getAllDataSekretaris()
    {
        $this->db->query('SELECT * FROM tb_users WHERE bagian = :bagian ORDER BY id_user DESC');

        $this->db->bind(':bagian', 'Sekretaris');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getStaffCount()
    {
        $this->db->query('SELECT * FROM tb_users WHERE bagian = :bagian');

        $this->db->bind(':bagian', "Staff");
        $results = $this->db->rowCount();

        return $results;
    }

    public function getSekretarisCount()
    {
        $this->db->query('SELECT * FROM tb_users WHERE bagian = :bagian');

        $this->db->bind(':bagian', "Sekretaris");
        $results = $this->db->rowCount();

        return $results;
    }

    public function hapus($id)
    {
        $this->db->query('DELETE FROM tb_users WHERE id_user = :id_user');

        $this->db->bind(':id_user', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($data)
    {
        $this->db->query('UPDATE tb_users SET username = :username, nama = :nama, 
        password = :password WHERE id_user = :id_user');

        $this->db->bind(':id_user', $data['id_user']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }

}