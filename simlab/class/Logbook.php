<?php

class Logbook
{
  private $table = 'logbook';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getLogbook()
  {
    $query = 'SELECT logbook.id, bahan.Nama_Bahan, bahan.Satuan, bahan.Merk, bahan.Serial, bahan.Exp, bahan.Letak, users.username, logbook.qty, logbook.date FROM (((logbook INNER JOIN users ON logbook.user_id=users.id) INNER JOIN bahan ON logbook.id_bahan=bahan.id))';
    $this->db->query($query);
    // $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getLogbookById($id)
  {
    $query = 'SELECT logbook.id, bahan.Nama_Bahan, bahan.Satuan, bahan.Merk, bahan.Serial, bahan.Exp, bahan.Letak, users.username, logbook.qty, logbook.date FROM (((logbook INNER JOIN users ON logbook.user_id=users.id) INNER JOIN bahan ON logbook.id_bahan=bahan.id)) WHERE logbook.id=:id';
    $this->db->query($query);
    // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
  public function getLogbookQtyById($id_bahan)
  {
    // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_bahan=:id_bahan');
    $query = 'SELECT SUM(qty) AS data FROM ' . $this->table . ' WHERE id_bahan=:id_bahan'; #status belum disertakan
    $this->db->query($query);
    $this->db->bind('id_bahan', $id_bahan);
    return $this->db->single();
  }

  public function getLogbookScheduleById($id_bahan, $sd, $ed)
  {
    // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_bahan=:id_bahan');
    $query = 'SELECT * FROM ' . $this->table . ' WHERE id_bahan=:id_bahan AND NOT (start_date < :ed AND end_date > :sd )';
    $this->db->query($query);
    $this->db->bind('id_bahan', $id_bahan);
    $this->db->bind('sd', $sd);
    $this->db->bind('ed', $ed);
    return $this->db->resultSet();
  }



  public function addLog($data)
  {
    $query = "INSERT INTO " . $this->table . " VALUES 
    (:id, :id_bahan, :user_id, :qty, :date)";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('id_bahan', $data['id_bahan']);
    $this->db->bind('user_id', $data['user_id']);
    $this->db->bind('qty', $data['qty']);
    $this->db->bind('date', $data['date']);
    $this->db->execute();
    return $this->db->rowCount();
  }


  public function hapusLog($id)
  {
    $query = "DELETE FROM logbook WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);


    $this->db->execute();

    return $this->db->rowCount();
  }
}
