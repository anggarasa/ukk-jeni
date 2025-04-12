<?php require_once '../app/views/layouts/header.php'?>

<!-- Page Content -->
<main class="p-4 md:p-6">
    <!-- Header & Actions -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold mb-1">Daftar Pelanggan</h1>
            <p class="text-gray-600">Kelola dan temukan semua data pelanggan</p>
        </div>

        <button id="btnAddCustomer" class="flex items-center justify-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-blue-600">
            <i class="fas fa-user-plus mr-2"></i>
            <span>Tambah Pelanggan</span>
        </button>
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
                    <th class="p-4 font-medium">Terdaftar</th>
                    <th class="p-4 font-medium">Aksi</th>
                </tr>
                </thead>
                <tbody class="divide-y">
                <!-- Customer Row 1 -->
                <tr class="hover:bg-gray-50">
                    <td class="p-4">Jeni islam</td>
                    <td class="p-4">Jeni@gmail.com</td>
                    <td class="p-4">0812-3456-7890</td>
                    <td class="p-4">
                     lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </td>
                    <td class="p-4 text-gray-500">15 Jan 2025</td>
                    <td class="p-4">
                        <div class="flex space-x-2">
                            <button class="p-1.5 bg-blue-50 text-primary rounded hover:bg-blue-100" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="p-1.5 bg-gray-50 text-gray-600 rounded hover:bg-gray-100" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
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

    <!-- Customer Modal -->
    <div id="customerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-30 hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full max-h-90vh overflow-y-auto">
            <div class="flex justify-between items-center border-b p-4">
                <h3 class="text-lg font-bold">Tambah Pelanggan Baru</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-4">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">Nama Depan</label>
                            <input type="text" id="firstName" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" placeholder="Nama depan">
                        </div>
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Nama Belakang</label>
                            <input type="text" id="lastName" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" placeholder="Nama belakang">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" placeholder="email@contoh.com">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="text" id="phone" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" placeholder="08xx-xxxx-xxxx">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <textarea id="address" rows="3" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" placeholder="Alamat lengkap..."></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="membership" class="block text-sm font-medium text-gray-700 mb-1">Keanggotaan</label>
                        <select id="membership" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                            <option value="regular">Regular</option>
                            <option value="silver">Silver</option>
                            <option value="gold">Gold</option>
                            <option value="platinum">Platinum</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="active" class="w-4 h-4 text-primary focus:ring-primary" checked>
                                <span class="ml-2">Aktif</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="inactive" class="w-4 h-4 text-primary focus:ring-primary">
                                <span class="ml-2">Tidak Aktif</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Tambahan</label>
                        <textarea rows="2" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" placeholder="Catatan tambahan..."></textarea>
                    </div>
                    <div class="flex space-x-3 justify-end">
                        <button type="button" id="cancelAddCustomer" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-blue-600">
                            Simpan Pelanggan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once '../app/views/layouts/footer.php'?>
