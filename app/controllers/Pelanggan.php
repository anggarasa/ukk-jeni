<?php

class Pelanggan extends Controller
{
    public function index()
    {
        $data['pelanggans'] = $this->model('PelangganModel')->getAll();
        $this->view('pelanggan/index', $data);
    }

    public function tambah()
    {
        $this->view('pelanggan/tambah');
    }

    public function store()
    {
        // Validasi input
        $errors = [];

        // Input Lama (untuk ditampilkan kembali saat ada error)
        $oldInput = $_POST;

        if (empty($_POST['nama'])) {
            $errors['nama'] = 'Nama pelanggan wajib diisi';
        }

        if (empty($_POST['no_hp'])) {
            $errors['no_hp'] = 'No. Telepon wajib diisi';
        } elseif (!preg_match('/^[0-9]{10,13}$/', $_POST['no_hp'])) {
            $errors['no_hp'] = 'Format No. Telepon tidak valid (masukkan 10-13 angka)';
        }

        if (!empty($_POST['email'])) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Format Email tidak valid';
            } else {
                // Periksa apakah email sudah pernah terdaftar
                if ($this->model('PelangganModel')->isEmailExist($_POST['email'])) {
                    $errors['email'] = 'Email sudah digunakan, silakan gunakan email lain';
                }
            }
        }

        // Jika ada error, kembalikan ke form tambah pelanggan
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_input'] = $oldInput;
            header('Location: ' . BASE_URL . '/pelanggan/tambah');
            exit;
        }

        $pelanggan = $this->model('PelangganModel');
        $result = $pelanggan->add($_POST);

        if ($result) {
            // Set flash message sukses
            $_SESSION['flash_message'] = 'Data pelanggan berhasil ditambahkan!';
            $_SESSION['flash_type'] = 'success';
        } else {
            // Set flash message gagal
            $_SESSION['flash_message'] = 'Gagal menambahkan data pelanggan!';
            $_SESSION['flash_type'] = 'error';
        }

        // Redirect ke halaman index
        header('Location: ' . BASE_URL . '/pelanggan');
        exit;
    }

    public function edit($id)
    {
        $data['pelanggan'] = $this->model('PelangganModel')->getById($id);
        $this->view('pelanggan/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        $errors = [];
        $oldInput = $_POST;

        if (empty($_POST['nama'])) {
            $errors['nama'] = 'Nama pelanggan wajib diisi';
        }

        if (empty($_POST['no_hp'])) {
            $errors['no_hp'] = 'No. Telepon wajib diisi';
        } elseif (!preg_match('/^[0-9]{10,13}$/', $_POST['no_hp'])) {
            $errors['no_hp'] = 'Format No. Telepon tidak valid (masukkan 10-13 angka)';
        }

        if (!empty($_POST['email'])) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Format Email tidak valid';
            } else {
                // Periksa jika email sudah digunakan oleh pelanggan lain
                if ($this->model('PelangganModel')->isEmailExistForOtherUser($_POST['email'], $id)) {
                    $errors['email'] = 'Email sudah digunakan oleh pelanggan lain, silakan gunakan email lain';
                }
            }
        }

        // Jika ada error, kembalikan ke halaman edit pelanggan
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_input'] = $oldInput;
            header('Location: ' . BASE_URL . '/pelanggan/edit/' . $id);
            exit;
        }

        // Simpan pembaruan data pelanggan
        $pelangganModel = $this->model('PelangganModel');
        $result = $pelangganModel->update($id, $_POST);

        if ($result) {
            // Set flash message untuk sukses
            $_SESSION['flash_message'] = 'Data pelanggan berhasil diperbarui!';
            $_SESSION['flash_type'] = 'success';
        } else {
            // Set flash message untuk gagal
            $_SESSION['flash_message'] = 'Gagal memperbarui data pelanggan!';
            $_SESSION['flash_type'] = 'error';
        }

        // Redirect ke halaman index
        header('Location: ' . BASE_URL . '/pelanggan');
        exit;
    }
}
