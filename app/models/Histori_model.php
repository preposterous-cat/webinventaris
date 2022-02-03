<?php


class Histori_model
{
	
	private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function tambah($data) 
    {
        $this->db->query('INSERT INTO tb_histori (username, tanggal) VALUES(:username, :tanggal)');

        //Ambil Nilai
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':tanggal', $data['tanggal']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataBulanIni($bulan)
    {
      $this->db->query('SELECT * FROM tb_histori WHERE MONTH(tanggal) = :bulan ORDER BY id_histori DESC');

      $this->db->bind(':bulan', $bulan);
      $results = $this->db->resultSet();

      return $results;
    }

    public function getDataByUserBulanIni($uname, $bulan)
    {
      $this->db->query('SELECT * FROM tb_histori WHERE MONTH(tanggal) = :bulan AND username = :username ORDER BY id_histori DESC');

      $this->db->bind(':bulan', $bulan);
      $this->db->bind(':username', $uname);
      $results = $this->db->resultSet();

      return $results;
    }

}