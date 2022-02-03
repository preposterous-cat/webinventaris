<?php


class Supplier_model
{
	
	private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function tambah_supplier ($data)
    {
        $this->db->query('INSERT INTO tb_supplier (nama_sup, alamat, nomor) VALUES(:nama_sup, :alamat, :nomor)');

        //Ambil Nilai
        $this->db->bind(':nama_sup', $data['nama_sup']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':nomor', $data['nomor']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllData()
    {
        $this->db->query('SELECT * FROM tb_supplier ORDER BY id_supplier DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllNama()
    {
        $this->db->query('SELECT nama_sup FROM tb_supplier ORDER BY id_supplier DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllDataByID($id)
    {
        $this->db->query('SELECT * FROM tb_supplier WHERE id_supplier = :id_supplier');

        $this->db->bind(':id_supplier', $id);
        $row = $this->db->single();

        return $row;
    }

    public function getAllDataCount()
    {
        $this->db->query('SELECT * FROM tb_supplier');

        $results = $this->db->rowCount();

        return $results;
    }

    public function edit($data)
    {
        $this->db->query('UPDATE tb_supplier SET nama_sup = :nama_sup, alamat = :alamat, nomor = :nomor WHERE id_supplier = :id_supplier');

        $this->db->bind(':id_supplier', $data['id_supplier']);
        $this->db->bind(':nama_sup', $data['nama_sup']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':nomor', $data['nomor']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }

    public function hapus($id)
    {
        $this->db->query('DELETE FROM tb_supplier WHERE id_supplier = :id_supplier');

        $this->db->bind(':id_supplier', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}