<?php

namespace app\models;

use Database;

class RiwayatModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTransaksi()
    {
        $this->db->query('SELECT 
                            t.id as transaksi_id,
                            t.tgl_transaksi,
                            t.uang_diberikan,
                            t.total_harga,
                            t.kembalian,
                            p.nama as nama_pelanggan,
                            pr.nama_produk as nama_produk,
                            dt.jumlah,
                            dt.subtotal
                          FROM transaksi t
                          JOIN pelanggan p ON t.pelanggan_id = p.id
                          JOIN detail_transaksi dt ON dt.transaksi_id = t.id
                          JOIN produk pr ON dt.produk_id = pr.id
                          ORDER BY t.tgl_transaksi DESC');
        return $this->db->resultSet();
    }

    public function getDetailTransaksi($transaksi_id)
    {
        $this->db->query('SELECT 
                        t.id as transaksi_id,
                        t.tgl_transaksi,
                        t.uang_diberikan,
                        t.total_harga,
                        t.kembalian,
                        p.nama as nama_pelanggan,
                        p.email,
                        p.no_hp,
                        p.alamat,
                        pr.nama_produk,
                        pr.harga_produk,
                        dt.jumlah,
                        dt.subtotal
                      FROM transaksi t
                      JOIN pelanggan p ON t.pelanggan_id = p.id
                      JOIN detail_transaksi dt ON dt.transaksi_id = t.id
                      JOIN produk pr ON dt.produk_id = pr.id
                      WHERE t.id = :transaksi_id');
        $this->db->bind(':transaksi_id', (int)$transaksi_id);
        return $this->db->resultSet(); // Gunakan resultSet() bukan single() untuk mendapatkan semua item
    }
}
