<?php


class BarangMasuk_model
{
	
	private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function tambah ($data)
    {
        $this->db->query('INSERT INTO tb_barang_masuk (id_barang, nama_barang, supplier, jumlah, biaya, sumber, diunggah, tanggal) VALUES(:id_barang, :nama_barang, :supplier, :jumlah, :biaya, :sumber, :diunggah, :tanggal)');

        //Ambil Nilai
        $this->db->bind(':id_barang', $data['id_barang']);
        $this->db->bind(':nama_barang', $data['nama_barang']);
        $this->db->bind(':supplier', $data['supplier']);
        $this->db->bind(':jumlah', $data['jumlah']);
        $this->db->bind(':biaya', $data['biaya']);
        $this->db->bind(':sumber', $data['sumber']);
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
        $this->db->query('SELECT * FROM tb_barang_masuk ORDER BY id_bm DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllDataByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang_masuk WHERE id_bm = :id_bm ORDER BY id_bm DESC');
        $this->db->bind(':id_bm', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getAllDataToday($tanggal)
    {
        $this->db->query('SELECT * FROM tb_barang_masuk WHERE CAST(tanggal AS DATE) = :tanggal ORDER BY id_bm DESC');
        $this->db->bind(':tanggal', $tanggal);
        
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllDataByTanggal($tanggalAwal, $tanggalAkhir)
    {
        $this->db->query('SELECT * FROM tb_barang_masuk WHERE CAST(tanggal AS DATE) BETWEEN :tanggal_awal AND :tanggal_akhir' );

        $this->db->bind(':tanggal_awal', $tanggalAwal);
        $this->db->bind(':tanggal_akhir', $tanggalAkhir);
        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllDataByNama($nama)
    {
        $this->db->query('SELECT * FROM tb_barang_masuk WHERE nama_barang = :nama');

        $this->db->bind(':nama', $nama);
        $results = $this->db->resultSet();

        return $results;
    }

    public function getJumlahByID($id)
    {
        $this->db->query('SELECT jumlah FROM tb_barang_masuk WHERE id_bm = :id_bm');

        $this->db->bind(':id_bm', $id);
        $row = $this->db->single();
        $jumlah = $row->jumlah;

        return $jumlah;
    }

    public function getBiayaByID($id)
    {
        $this->db->query('SELECT biaya FROM tb_barang_masuk WHERE id_bm = :id_bm');

        $this->db->bind(':id_bm', $id);
        $row = $this->db->single();
        $biaya = $row->biaya;

        return $biaya;
    }

    public function edit($data)
    {
        $this->db->query('UPDATE tb_barang_masuk SET jumlah = :jumlah, biaya = :biaya, 
        sumber = :sumber WHERE id_bm = :id_bm');

        $this->db->bind(':id_bm', $data['id_bm']);
        $this->db->bind(':jumlah', $data['jumlah']);
        $this->db->bind(':biaya', $data['biaya']);
        $this->db->bind(':sumber', $data['sumber']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }

    public function getAllDataCount()
    {
        $this->db->query('SELECT * FROM tb_barang_masuk');

        $results = $this->db->rowCount();

        return $results;
    }

    public function hapus($id)
    {
        $this->db->query('DELETE FROM tb_barang_masuk WHERE id_bm = :id_bm');

        $this->db->bind(':id_bm', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}