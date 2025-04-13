<?php
namespace app\models;

use Database;

class PelangganModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM pelanggan ORDER BY id DESC");
        return $this->db->resultSet();
    }

    public function add($data)
    {
        $query = "INSERT INTO pelanggan (nama, email, alamat, no_hp) VALUES (:nama, :email, :alamat, :no_hp)";
        $this->db->query($query) ;
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_hp', $data['no_hp']);
        return $this->db->execute();
    }

    public function isEmailExist($email)
    {
        // Gunakan query() untuk mempersiapkan SQL
        $this->db->query("SELECT COUNT(*) as jumlah FROM pelanggan WHERE email = :email");
        $this->db->bind(':email', $email); // Binding parameter
        $result = $this->db->single(); // Ambil hasil satu baris data

        return $result['jumlah'] > 0; // Kembalikan true jika email sudah ada
    }
}
