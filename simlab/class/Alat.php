<?php

class Alat
{
  private $table = 'alat';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  // query alat from database
  public function getAlat()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }
  // query alat from database berdasar id
  public function getAlatById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
  // tambah alat ke database
  public function tambahAlat($data)
  {
    $query = "INSERT INTO " . $this->table .
      " VALUES
    ('', :Nama_Alat, :Merk, :Qty)";

    $this->db->query($query);
    $this->db->bind('Nama_Alat', $data['Nama_Alat']);
    $this->db->bind('Merk', $data['Merk']);
    $this->db->bind('Qty', $data['Qty']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  // update alat
  public function ubahAlat($data)
  {
    $query = "UPDATE " . $this->table . " SET
    Nama_Alat = :Nama_Alat,
    Merk = :Merk,
    Qty = :Qty
    WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('Nama_Alat', $data['Nama_Alat']);
    $this->db->bind('Merk', $data['Merk']);
    $this->db->bind('Qty', $data['Qty']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  // hapus alat
  public function hapusAlat($id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);


    $this->db->execute();

    return $this->db->rowCount();
  }
}

// $alat = new Alat;
// $alat->nama = "freezer";
// var_dump($alat);
// echo $alat->nama;
