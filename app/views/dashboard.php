    <?php require_once 'layouts/header.php'?>

        <!-- Page Content -->
        <main class="p-4 md:p-6">
            <div class="mb-6">
                <h1 class="text-2xl font-bold mb-2">Dashboard</h1>
                <p class="text-gray-600">Selamat datang kembali, lihat ringkasan bisnis Anda hari ini</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500 font-medium">Total Pendapatan</h3>
                        <span class="rounded-full p-2 bg-blue-100 text-primary">
                                <i class="fas fa-money-bill-wave"></i>
                            </span>
                    </div>
                    <div class="flex items-center">
                        <h2 class="text-2xl font-bold">Rp 8,350,000</h2>
                    </div>
                    <div class="mt-2 text-xs text-success flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>12% dari bulan lalu</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500 font-medium">Transaksi</h3>
                        <span class="rounded-full p-2 bg-green-100 text-success">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                    </div>
                    <div class="flex items-center">
                        <h2 class="text-2xl font-bold">156</h2>
                    </div>
                    <div class="mt-2 text-xs text-success flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>8% dari bulan lalu</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500 font-medium">Produk Terjual</h3>
                        <span class="rounded-full p-2 bg-orange-100 text-warning">
                                <i class="fas fa-box"></i>
                            </span>
                    </div>
                    <div class="flex items-center">
                        <h2 class="text-2xl font-bold">523</h2>
                    </div>
                    <div class="mt-2 text-xs text-success flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>5% dari bulan lalu</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-500 font-medium">Pelanggan Baru</h3>
                        <span class="rounded-full p-2 bg-purple-100 text-purple-500">
                                <i class="fas fa-users"></i>
                            </span>
                    </div>
                    <div class="flex items-center">
                        <h2 class="text-2xl font-bold">36</h2>
                    </div>
                    <div class="mt-2 text-xs text-danger flex items-center">
                        <i class="fas fa-arrow-down mr-1"></i>
                        <span>3% dari bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions & Best Selling Products -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Recent Transactions -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg">Transaksi Terbaru</h3>
                        <a href="#" class="text-primary text-sm hover:underline">Lihat Semua</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                            <tr class="text-gray-500 text-sm border-b">
                                <th class="pb-3 font-medium">ID</th>
                                <th class="pb-3 font-medium">Pelanggan</th>
                                <th class="pb-3 font-medium">Total</th>
                                <th class="pb-3 font-medium">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b">
                                <td class="py-3">#INV-2304</td>
                                <td class="py-3">Budi Santoso</td>
                                <td class="py-3">Rp 450,000</td>
                                <td class="py-3"><span class="text-xs py-1 px-2 rounded-full bg-green-100 text-success">Selesai</span></td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3">#INV-2303</td>
                                <td class="py-3">Siti Rahmah</td>
                                <td class="py-3">Rp 275,000</td>
                                <td class="py-3"><span class="text-xs py-1 px-2 rounded-full bg-green-100 text-success">Selesai</span></td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3">#INV-2302</td>
                                <td class="py-3">Andi Wijaya</td>
                                <td class="py-3">Rp 120,000</td>
                                <td class="py-3"><span class="text-xs py-1 px-2 rounded-full bg-yellow-100 text-warning">Diproses</span></td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3">#INV-2301</td>
                                <td class="py-3">Dewi Anggraini</td>
                                <td class="py-3">Rp 350,000</td>
                                <td class="py-3"><span class="text-xs py-1 px-2 rounded-full bg-green-100 text-success">Selesai</span></td>
                            </tr>
                            <tr>
                                <td class="py-3">#INV-2300</td>
                                <td class="py-3">Rudi Hartono</td>
                                <td class="py-3">Rp 185,000</td>
                                <td class="py-3"><span class="text-xs py-1 px-2 rounded-full bg-green-100 text-success">Selesai</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Best Selling Products -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg">Produk Terlaris</h3>
                        <a href="#" class="text-primary text-sm hover:underline">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center p-3 border rounded-lg">
                            <div class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center mr-4">
                                <i class="fas fa-tshirt text-gray-500"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium">Kaos Premium XL</h4>
                                <p class="text-sm text-gray-500">89 terjual</p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">Rp 150,000</p>
                                <div class="text-xs text-success flex items-center justify-end">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>12%</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 border rounded-lg">
                            <div class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center mr-4">
                                <i class="fas fa-shoe-prints text-gray-500"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium">Sepatu Sport Nike</h4>
                                <p class="text-sm text-gray-500">76 terjual</p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">Rp 900,000</p>
                                <div class="text-xs text-success flex items-center justify-end">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>8%</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 border rounded-lg">
                            <div class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center mr-4">
                                <i class="fas fa-headphones text-gray-500"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium">Headphone Bluetooth</h4>
                                <p class="text-sm text-gray-500">65 terjual</p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">Rp 350,000</p>
                                <div class="text-xs text-danger flex items-center justify-end">
                                    <i class="fas fa-arrow-down mr-1"></i>
                                    <span>3%</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 border rounded-lg">
                            <div class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center mr-4">
                                <i class="fas fa-mobile-alt text-gray-500"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium">Smartphone XYZ</h4>
                                <p class="text-sm text-gray-500">54 terjual</p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">Rp 2,500,000</p>
                                <div class="text-xs text-success flex items-center justify-end">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>15%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Access -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h3 class="font-bold text-lg mb-4">Akses Cepat</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <a href="#" class="flex flex-col items-center justify-center p-4 border rounded-lg hover:bg-gray-50">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mb-2">
                            <i class="fas fa-shopping-cart text-primary"></i>
                        </div>
                        <span class="text-center">Transaksi Baru</span>
                    </a>
                    <a href="#" class="flex flex-col items-center justify-center p-4 border rounded-lg hover:bg-gray-50">
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mb-2">
                            <i class="fas fa-box-open text-success"></i>
                        </div>
                        <span class="text-center">Tambah Produk</span>
                    </a>
                    <a href="#" class="flex flex-col items-center justify-center p-4 border rounded-lg hover:bg-gray-50">
                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center mb-2">
                            <i class="fas fa-user-plus text-purple-500"></i>
                        </div>
                        <span class="text-center">Tambah Pelanggan</span>
                    </a>
                </div>
            </div>

<?php require_once 'layouts/footer.php'?>
