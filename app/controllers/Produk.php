<?php

class Produk  extends Controller
{
    // Produk.php
    public function index()
    {
        $limit = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $produkModel = $this->model('ProdukModel');
        $data['produks'] = $produkModel->getPaginated($limit, $offset);
        $data['total_pages'] = ceil($produkModel->countAll() / $limit); // Hitung total halaman
        $data['current_page'] = $page;

        $this->view('produk/index', $data);
    }

    public function tambah()
    {
        $this->view('produk/tambah');
    }

    // Produk.php
    public function store()
    {
        // Mengambil data dari input POST
        $data = [
            'nama_produk' => trim($_POST['nama']),
            'harga_produk' => $_POST['harga'] != '' ? (int) $_POST['harga'] : null,
            'stok' => $_POST['stok'] != '' ? (int) $_POST['stok'] : null
        ];

        // Validasi input
        $errors = [];

        if (empty($data['nama_produk'])) {
            $errors['nama'] = 'Nama produk wajib diisi.';
        } elseif (strlen($data['nama_produk']) < 3) {
            $errors['nama'] = 'Nama produk harus memiliki panjang minimal 3 karakter.';
        }

        if (!is_null($data['harga_produk']) && $data['harga_produk'] < 0) {
            $errors['harga'] = 'Harga tidak boleh kurang dari 0.';
        }

        if (is_null($data['stok']) || $data['stok'] < 0) {
            $errors['stok'] = 'Stok wajib diisi dan tidak boleh kurang dari 0.';
        }

        // Jika ada error kembalikan ke halaman tambah produk
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_input'] = $data;
            header('Location: ' . BASE_URL . '/produk/tambah');
            exit;
        }

        // Simpan ke database
        $produkModel = $this->model('ProdukModel');
        if ($produkModel->add($data)) {
            $_SESSION['success_message'] = 'Produk berhasil ditambahkan!';
            header('Location: ' . BASE_URL . '/produk');
        } else {
            $_SESSION['error_message'] = 'Terjadi kesalahan saat menyimpan produk.';
            header('Location: ' . BASE_URL . '/produk');
        }
        exit;
    }

    public function edit($id)
    {
        $data['produk'] = $this->model('ProdukModel')->getById($id);
        $this->view('produk/edit', $data);
    }

    // Produk.php
    public function update($id)
    {
        // Mengambil data dari input POST
        $data = [
            'id' => (int)$id,
            'nama_produk' => trim($_POST['nama']),
            'harga_produk' => $_POST['harga'] != '' ? (int)$_POST['harga'] : null,
            'stok' => $_POST['stok'] != '' ? (int)$_POST['stok'] : null
        ];

        // Validasi input
        $errors = [];

        if (empty($data['nama_produk'])) {
            $errors['nama'] = 'Nama produk wajib diisi.';
        } elseif (strlen($data['nama_produk']) < 3) {
            $errors['nama'] = 'Nama produk harus memiliki panjang minimal 3 karakter.';
        }

        if (!is_null($data['harga_produk']) && $data['harga_produk'] < 0) {
            $errors['harga'] = 'Harga tidak boleh kurang dari 0.';
        }

        if (is_null($data['stok']) || $data['stok'] < 0) {
            $errors['stok'] = 'Stok wajib diisi dan tidak boleh kurang dari 0.';
        }

        // Jika ada error kembalikan ke halaman edit produk
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_input'] = $data;
            header('Location: ' . BASE_URL . '/produk/edit/' . $id);
            exit;
        }

        // Update data ke database
        $produkModel = $this->model('ProdukModel');
        if ($produkModel->update($data)) {
            $_SESSION['success_message'] = 'Produk berhasil diperbarui!';
            header('Location: ' . BASE_URL . '/produk');
        } else {
            $_SESSION['error_message'] = 'Terjadi kesalahan saat memperbarui produk.';
            header('Location: ' . BASE_URL . '/produk/edit/' . $id);
        }
        exit;
    }
}
