<?php

class Booking
{
  private $table = 'booking';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getBooking()
  {
    $query = 'SELECT booking.id, alat.Nama_Alat, users.username, booking.qty, booking.start_date, booking.end_date, status.name FROM (((booking INNER JOIN users ON booking.user_id=users.id) INNER JOIN alat ON booking.id_alat=alat.id) INNER JOIN status ON booking.status=status.id)';
    $this->db->query($query);
    // $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getBookingById($id)
  {
    $query = 'SELECT booking.id, alat.Nama_Alat, users.username, booking.qty, booking.start_date, booking.end_date, status.name FROM (((booking INNER JOIN users ON booking.user_id=users.id) INNER JOIN alat ON booking.id_alat=alat.id) INNER JOIN status ON booking.status=status.id) WHERE booking.id=:id';
    $this->db->query($query);
    // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
  public function getBookingQtyById($id_alat)
  {
    // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_alat=:id_alat');
    $query = 'SELECT SUM(qty) AS data FROM ' . $this->table . ' WHERE id_alat=:id_alat'; #status belum disertakan
    $this->db->query($query);
    $this->db->bind('id_alat', $id_alat);
    return $this->db->single();
  }

  public function getBookingScheduleById($id_alat, $sd, $ed)
  {
    // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_alat=:id_alat');
    $query = 'SELECT * FROM ' . $this->table . ' WHERE id_alat=:id_alat AND NOT (start_date < :ed AND end_date > :sd )';
    $this->db->query($query);
    $this->db->bind('id_alat', $id_alat);
    $this->db->bind('sd', $sd);
    $this->db->bind('ed', $ed);
    return $this->db->resultSet();
  }



  public function addBook($data)
  {
    $query = "INSERT INTO " . $this->table . " VALUES 
    (:id, :id_alat, :user_id, :qty, :start_date, :end_date, :status)";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('id_alat', $data['id_alat']);
    $this->db->bind('user_id', $data['user_id']);
    $this->db->bind('qty', $data['qty']);
    $this->db->bind('start_date', $data['start_date']);
    $this->db->bind('end_date', $data['end_date']);
    $this->db->bind('status', $data['status']);
    $this->db->execute();
    return $this->db->rowCount();
  }


  public function hapusBook($id)
  {
    $query = "DELETE FROM booking WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);


    $this->db->execute();

    return $this->db->rowCount();
  }
}
