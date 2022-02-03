<?php
class BarangKeluar_model
{
	
	private $db;
    public function __construct() 
    {
        $this->db = new Database;
    }

    public function tambah ($data)
    {
        $this->db->query('INSERT INTO tb_barang_keluar (id_barang, nama_barang, supplier, jumlah, keterangan, diunggah, tanggal) VALUES(:id_barang, :nama_barang, :supplier, :jumlah, :keterangan, :diunggah, :tanggal)');

        //Ambil Nilai
        $this->db->bind(':id_barang', $data['id_barang']);
        $this->db->bind(':nama_barang', $data['nama_barang']);
        $this->db->bind(':supplier', $data['supplier']);
        $this->db->bind(':jumlah', $data['jumlah']);
        $this->db->bind(':keterangan', $data['keterangan']);
        $this->db->bind(':diunggah', $data['diunggah']);
        $this->db->bind(':tanggal', $data['tanggal']);

        //Cek apakah fungsi berhasil dieksekusi
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllDataToday($tanggal)
    {
        $this->db->query('SELECT * FROM tb_barang_keluar WHERE CAST(tanggal AS DATE) = :tanggal ORDER BY id_bk DESC');
        $this->db->bind(':tanggal', $tanggal);
        
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllDataByTanggal($tanggalAwal, $tanggalAkhir)
    {
        $this->db->query('SELECT * FROM tb_barang_keluar WHERE CAST(tanggal AS DATE) BETWEEN :tanggal_awal AND :tanggal_akhir' );

        $this->db->bind(':tanggal_awal', $tanggalAwal);
        $this->db->bind(':tanggal_akhir', $tanggalAkhir);
        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllDataByNama($nama)
    {
        $this->db->query('SELECT * FROM tb_barang_keluar WHERE nama_barang = :nama');

        $this->db->bind(':nama', $nama);
        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllDataByID($id)
    {
        $this->db->query('SELECT * FROM tb_barang_keluar WHERE id_bk = :id_bk ORDER BY id_bk DESC');
        $this->db->bind(':id_bk', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getAllData()
    {
        $this->db->query('SELECT * FROM tb_barang_keluar ORDER BY id_bk DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllDataCount()
    {
        $this->db->query('SELECT * FROM tb_barang_keluar');

        $results = $this->db->rowCount();

        return $results;
    }

    public function getJumlahByID($id)
    {
        $this->db->query('SELECT jumlah FROM tb_barang_keluar WHERE id_bk = :id_bk');

        $this->db->bind(':id_bk', $id);
        $row = $this->db->single();
        $jumlah = $row->jumlah;

        return $jumlah;
    }

    public function edit($data)
    {
        $this->db->query('UPDATE tb_barang_keluar SET jumlah = :jumlah, keterangan = :keterangan WHERE id_bk = :id_bk');

        $this->db->bind(':id_bk', $data['id_bk']);
        $this->db->bind(':jumlah', $data['jumlah']);
        $this->db->bind(':keterangan', $data['keterangan']);

        if ($this->db->execute()) 
        {
            return true;
        } else {
            return false;
        }
    }

    public function hapus($id)
    {
        $this->db->query('DELETE FROM tb_barang_keluar WHERE id_bk = :id_bk');

        $this->db->bind(':id_bk', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}