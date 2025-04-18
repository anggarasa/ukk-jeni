<?php require_once 'layouts/header.php'?>

<!-- Page Content -->
<main class="min-h-screen p-4 md:p-8 bg-gradient-to-br from-blue-50 to-indigo-50">
    <div class="max-w-7xl mx-auto">
        <!-- Welcome Section with Gradient -->
        <div class="mb-8 bg-gradient-to-r from-indigo-600 to-blue-500 rounded-xl shadow-lg p-6 md:p-8">
            <h1 class="text-2xl md:text-3xl font-bold mb-2 text-white">Dashboard</h1>
            <p class="text-indigo-100">Selamat datang kembali, lihat ringkasan bisnis Anda hari ini</p>
        </div>

        <!-- Stats Cards with Improved Visual Design -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <!-- Total Pendapatan Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-blue-500 transform transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 font-medium">Total Pendapatan</h3>
                    <span class="rounded-full p-3 bg-blue-100 text-blue-600">
                        <i class="fas fa-money-bill-wave"></i>
                    </span>
                </div>
                <div class="flex items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Rp <?= number_format($data['total_pendapatan'], 0, ',', '.') ?></h2>
                </div>
                <div class="mt-4 text-sm text-blue-600">
                    <i class="fas fa-chart-line mr-1"></i> Ringkasan keuangan
                </div>
            </div>

            <!-- Transaksi Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-green-500 transform transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 font-medium">Transaksi</h3>
                    <span class="rounded-full p-3 bg-green-100 text-green-600">
                        <i class="fas fa-shopping-cart"></i>
                    </span>
                </div>
                <div class="flex items-center">
                    <h2 class="text-2xl font-bold text-gray-800"><?= $data['jumlah_transaksi']['jumlah_transaksi'] ?></h2>
                </div>
                <div class="mt-4 text-sm text-green-600">
                    <i class="fas fa-check-circle mr-1"></i> Total transaksi
                </div>
            </div>

            <!-- Produk Terjual Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-amber-500 transform transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 font-medium">Produk Terjual</h3>
                    <span class="rounded-full p-3 bg-amber-100 text-amber-600">
                        <i class="fas fa-box"></i>
                    </span>
                </div>
                <div class="flex items-center">
                    <h2 class="text-2xl font-bold text-gray-800"><?= $data['produk_terjual'] ?></h2>
                </div>
                <div class="mt-4 text-sm text-amber-600">
                    <i class="fas fa-box-open mr-1"></i> Total penjualan
                </div>
            </div>

            <!-- Pelanggan Baru Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-purple-500 transform transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600 font-medium">Pelanggan Baru</h3>
                    <span class="rounded-full p-3 bg-purple-100 text-purple-600">
                        <i class="fas fa-users"></i>
                    </span>
                </div>
                <div class="flex items-center">
                    <h2 class="text-2xl font-bold text-gray-800"><?= $data['pelanggan_baru']['pelanggan_baru'] ?></h2>
                </div>
                <div class="mt-4 text-sm text-purple-600">
                    <i class="fas fa-user-plus mr-1"></i> Pelanggan baru
                </div>
            </div>
        </div>

        <!-- Recent Transactions & Best Selling Products with Enhanced Style -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Recent Transactions -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-lg text-gray-800">
                        <i class="fas fa-receipt text-blue-500 mr-2"></i>Transaksi Terbaru
                    </h3>
                    <a href="#" class="text-blue-500 hover:text-blue-700 text-sm font-medium">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                        <tr class="text-xs font-medium text-gray-500 border-b border-gray-200">
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Pelanggan</th>
                            <th class="px-4 py-3 text-left">Tanggal</th>
                            <th class="px-4 py-3 text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data['transaksi_terbaru'] as $transaksi): ?>
                            <tr class="border-b border-gray-100 hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-blue-600">#<?= $transaksi['id'] ?></td>
                                <td class="px-4 py-3"><?= $transaksi['nama_pelanggan'] ?></td>
                                <td class="px-4 py-3 text-gray-500"><?= $transaksi['tgl_transaksi'] ?></td>
                                <td class="px-4 py-3 text-right font-medium">Rp <?= number_format($transaksi['total_harga'], 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Best Selling Products -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-lg text-gray-800">
                        <i class="fas fa-crown text-green-500 mr-2"></i>Produk Terlaris
                    </h3>
                    <a href="#" class="text-green-500 hover:text-green-700 text-sm font-medium">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="space-y-4">
                    <?php foreach($data['produk_terlaris'] as $index => $produk): ?>
                        <div class="flex items-center p-3 rounded-lg <?= $index % 2 == 0 ? 'bg-green-50' : 'bg-white' ?> hover:bg-green-100 transition-colors duration-200">
                            <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-10 w-10 rounded-full flex items-center justify-center text-white font-bold mr-4">
                                <?= $index + 1 ?>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800"><?= $produk['nama_produk'] ?></h4>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-green-600"><?= $produk['total_terjual'] ?> terjual</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once 'layouts/footer.php'?>
