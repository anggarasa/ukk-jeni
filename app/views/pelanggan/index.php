<?php require_once '../app/views/layouts/header.php'?>

<?php if (isset($_SESSION['flash_message'])): ?>
    <div id="flashModal" class="fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-xl p-6 space-y-4">
            <h2 class="text-lg font-medium <?= $_SESSION['flash_type'] === 'success' ? 'text-green-600' : 'text-red-600' ?>">
                <?= $_SESSION['flash_type'] === 'success' ? 'Sukses' : 'Gagal' ?>
            </h2>
            <p><?= $_SESSION['flash_message'] ?></p>
            <button onclick="document.getElementById('flashModal').remove();" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Tutup</button>
        </div>
    </div>
    <?php unset($_SESSION['flash_message'], $_SESSION['flash_type']); ?>
<?php endif; ?>

<!-- Page Content -->
<main class="p-4 md:p-6">
    <!-- Header & Actions -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold mb-1">Daftar Pelanggan</h1>
            <p class="text-gray-600">Kelola dan temukan semua data pelanggan</p>
        </div>

        <a href="<?= BASE_URL ?>/pelanggan/tambah" class="flex items-center justify-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-blue-600">
            <i class="fas fa-user-plus mr-2"></i>
            <span>Tambah Pelanggan</span>
        </a>
    </div>

    <!-- Search & Filter Section -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <form id="searchForm" class="flex items-stretch">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" id="searchCustomer" name="keyword" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" placeholder="Cari pelanggan...">
                    </div>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-r-lg hover:bg-blue-600 flex items-center justify-center">
                        <span>Cari</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="bg-white rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="bg-gray-50 text-left text-gray-600">
                    <th class="p-4 font-medium">Nama</th>
                    <th class="p-4 font-medium">Email</th>
                    <th class="p-4 font-medium">No. Telepon</th>
                    <th class="p-4 font-medium">Alamat</th>
                    <th class="p-4 font-medium">Aksi</th>
                </tr>
                </thead>
                <tbody class="divide-y">
                <!-- Customer Row 1 -->
                <?php foreach ($data['pelanggans'] as $pelanggan): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="p-4"><?= $pelanggan['nama'] ?></td>
                        <td class="p-4"><?= $pelanggan['email'] ?></td>
                        <td class="p-4"><?= $pelanggan['no_hp'] ?></td>
                        <td class="p-4">
                            <?= substr($pelanggan['alamat'], 0, 20) . (strlen($pelanggan['alamat']) > 20 ? '...' : '') ?>
                        </td>
                        <td class="p-4">
                            <div class="flex space-x-2">
                                <button class="p-1.5 bg-blue-50 text-primary rounded hover:bg-blue-100" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="<?= BASE_URL ?>/pelanggan/edit/<?= $pelanggan['id'] ?>" class="p-1.5 bg-gray-50 text-gray-600 rounded hover:bg-gray-100" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="p-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 flex flex-col sm:flex-row items-center justify-between border-t">
            <div class="mb-4 sm:mb-0">
                <p class="text-sm text-gray-500">Menampilkan 1-6 dari 248 pelanggan</p>
            </div>
            <div class="flex space-x-1">
                <button class="px-3 py-1.5 text-sm rounded border border-gray-200 text-gray-400 cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-3 py-1.5 text-sm rounded border border-primary bg-primary text-white">1</button>
                <button class="px-3 py-1.5 text-sm rounded border border-gray-200 hover:border-primary hover:bg-blue-50">2</button>
                <button class="px-3 py-1.5 text-sm rounded border border-gray-200 hover:border-primary hover:bg-blue-50">3</button>
                <button class="px-3 py-1.5 text-sm rounded border border-gray-200 hover:border-primary hover:bg-blue-50">4</button>
                <button class="px-3 py-1.5 text-sm rounded border border-gray-200 hover:border-primary hover:bg-blue-50">5</button>
                <button class="px-3 py-1.5 text-sm rounded border border-gray-200 hover:border-primary hover:bg-blue-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>

    <?php require_once '../app/views/layouts/footer.php'?>
