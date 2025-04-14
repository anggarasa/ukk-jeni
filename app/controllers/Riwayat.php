<?php

class Riwayat extends Controller
{
    public function index()
    {
        $data['transaksis'] = $this->model('RiwayatModel')->getAllTransaksi();
        $this->view('riwayat/index', $data);
    }

    public function detail($transaksi_id)
    {
        $items = $this->model('RiwayatModel')->getDetailTransaksi($transaksi_id);

        if ($items) {
            // Ambil data transaksi umum dari item pertama
            $transaksiInfo = !empty($items[0]) ? [
                'transaksi_id' => $items[0]['transaksi_id'],
                'tgl_transaksi' => $items[0]['tgl_transaksi'],
                'nama_pelanggan' => $items[0]['nama_pelanggan'],
                'email' => $items[0]['email'],
                'no_hp' => $items[0]['no_hp'],
                'alamat' => $items[0]['alamat'],
                'uang_diberikan' => $items[0]['uang_diberikan'],
                'total_harga' => $items[0]['total_harga'],
                'kembalian' => $items[0]['kembalian']
            ] : [];

            echo json_encode([
                'status' => 'success',
                'data' => $items,
                'transaksi' => $transaksiInfo
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data transaksi tidak ditemukan.'
            ]);
        }
    }
}
