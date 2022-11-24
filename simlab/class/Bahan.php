<?php

class Bahan
{
  protected $table = 'bahan';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  // query Bahan from database
  public function getBahan()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }
  // query Bahan from database berdasar id
  public function getBahanById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
  // tambah Bahan ke database
  public function tambahBahan($data)
  {
    $query = "INSERT INTO " . $this->table .
      " VALUES
    ('', :Nama_Bahan, :Jumlah, :Satuan, :Merk, :Serial, :Exp, :Letak)";

    $this->db->query($query);
    $this->db->bind('Nama_Bahan', $data['Nama_Bahan']);
    $this->db->bind('Jumlah', $data['Jumlah']);
    $this->db->bind('Satuan', $data['Satuan']);
    $this->db->bind('Merk', $data['Merk']);
    $this->db->bind('Serial', $data['Serial']);
    $this->db->bind('Exp', $data['Exp']);
    $this->db->bind('Letak', $data['Letak']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  // update Bahan
  public function ubahBahan($data)
  {
    $query = "UPDATE " . $this->table . " SET
    Nama_Bahan = :Nama_Bahan,
    Jumlah = :Jumlah,
    Satuan = :Satuan,
    Merk = :Merk,
    Serial = :Serial,
    Exp = :Exp,
    Letak = :Letak,
    WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('Nama_Bahan', $data['Nama_Bahan']);
    $this->db->bind('Jumlah', $data['Jumlah']);
    $this->db->bind('Satuan', $data['Satuan']);
    $this->db->bind('Merk', $data['Merk']);
    $this->db->bind('Serial', $data['Serial']);
    $this->db->bind('Exp', $data['Exp']);
    $this->db->bind('Letak', $data['Letak']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  // hapus Bahan
  public function hapusBahan($id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);


    $this->db->execute();

    return $this->db->rowCount();
  }

  public function updateByBook($id, $Stok, $ambil)
  {
    $Jumlah = $Stok - $ambil;
    $query = 'UPDATE ' . $this->table . ' SET
    Jumlah = :Jumlah WHERE id = :id';
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->bind('Jumlah', $Jumlah);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
