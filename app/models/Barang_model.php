<?php


class Barang_model
{
	
	private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function tambah ($data)
    {
        $this->db->query('INSERT INTO tb_barang (nama_barang, supplier, stok, kondisi, biaya_stn, biaya_total, merk, sumber, jenis, diunggah, tanggal) VALUES(:nama_barang, :supplier, :stok, :kondisi, :biaya_stn, :biaya_total, :merk, :sumber, :jenis, :diunggah, :tanggal)');

        //Ambil Nilai
        $this->db->bind(':nama_barang', $data['nama_barang']);
        $this->db->bind(':supplier', $data['supplier']);
        $this->db->bind(':stok', $data['stok']);
        $this->db->bind(':kondisi', $data['kondisi']);
        $this->db->bind(':biaya_stn', $data['biaya_stn']);
        $this->db->bind(':biaya_total', $data['biaya_total']);
        $this->db->bind(':merk', $data['merk']);
        $this->db->bind(':sumber', $data['sumber']);
        $this->db->bind(':jenis', $data['jenis']);
        $this->db->bind(':diunggah', $data['diunggah']);
        $this->db->bind(':tanggal', $data['tanggal']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllData()
    {
        $this->db->query('SELECT * FROM tb_barang ORDER BY id_barang DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllDataCount()
    {
        $this->db->query('SELECT * FROM tb_barang');

        $results = $this->db->rowCount();

        return $results;
    }

    public function getAllDataByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id);
        $row = $this->db->single();

        return $row;
    }

    public function getStokDataByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id);
        $row = $this->db->single();
        $stok = $row->stok;

        return $stok;
    }

    public function getJenisByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id);
        $row = $this->db->single();
        $jenis = $row->jenis;

        return $jenis;
    }

    public function getKondisiByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id);
        $row = $this->db->single();
        $kondisi = $row->kondisi;

        return $kondisi;
    }

    public function getBiayaByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id);
        $row = $this->db->single();
        $biaya = $row->biaya_total;

        return $biaya;
    }

    public function getBiayaSTNByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id);
        $row = $this->db->single();
        $biaya = $row->biaya_stn;

        return $biaya;
    }

    public function getNamaByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id);
        $row = $this->db->single();
        $nama = $row->nama_barang;

        return $nama;
    }

    public function getSupplierByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id);
        $row = $this->db->single();
        $sup = $row->supplier;

        return $sup;
    }

    public function edit($data)
    {
        $this->db->query('UPDATE tb_barang SET nama_barang = :nama_barang, supplier = :supplier, 
        stok = :stok, kondisi = :kondisi, biaya_stn = :biaya_stn, biaya_total = :biaya_total, merk = :merk, sumber = :sumber, jenis = :jenis WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $data['id_barang']);
        $this->db->bind(':nama_barang', $data['nama_barang']);
        $this->db->bind(':supplier', $data['supplier']);
        $this->db->bind(':stok', $data['stok']);
        $this->db->bind(':kondisi', $data['kondisi']);
        $this->db->bind(':biaya_stn', $data['biaya_stn']);
        $this->db->bind(':biaya_total', $data['biaya_total']);
        $this->db->bind(':merk', $data['merk']);
        $this->db->bind(':sumber', $data['sumber']);
        $this->db->bind(':jenis', $data['jenis']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }

    public function hapus($id)
    {
        $this->db->query('DELETE FROM tb_barang WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateBM($data)
    {
        $this->db->query('UPDATE tb_barang SET bm_terakhir = :bm_terakhir, stok = :stok, 
        biaya_total = :biaya WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $data['id_barang']);
        $this->db->bind(':bm_terakhir', $data['tanggal_masuk']);
        $this->db->bind(':stok', $data['stok']);
        $this->db->bind(':biaya', $data['total_biaya']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }

    public function updateBK($data)
    {
        $this->db->query('UPDATE tb_barang SET bk_terakhir = :bk_terakhir, stok = :stok WHERE id_barang = :id_barang');

        $this->db->bind(':id_barang', $data['id_barang']);
        $this->db->bind(':bk_terakhir', $data['tanggal_keluar']);
        $this->db->bind(':stok', $data['stok']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }
}