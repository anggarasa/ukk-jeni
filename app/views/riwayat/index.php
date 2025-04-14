<?php require_once '../app/views/layouts/header.php'?>

<div class="container mx-auto px-4 py-8 max-w-6xl" x-data="{
        show: false,
        transaksi: null,
        detailItems: [],
        showModal(id) {
            this.show = true;
            this.fetchDetail(id);
        },
        fetchDetail(id) {
            fetch(`<?= BASE_URL ?>/riwayat/detail/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        this.transaksi = data.transaksi;
                        this.detailItems = Array.isArray(data.data) ? data.data : [data.data];
                    } else {
                        alert(data.message);
                        this.show = false;
                    }
                })
                .catch(error => {
                    console.error('Error fetching detail:', error);
                    alert('Gagal mengambil data transaksi.');
                    this.show = false;
                });
        }
    }">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Riwayat Transaksi</h1>
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="relative">
                <input type="text" placeholder="Cari transaksi..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full sm:w-64">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <button class="bg-blue-600 px-4 py-2 text-center text-white rounded-lg hover:bg-blue-500">
                Cari
            </button>
        </div>
    </div>

    <!-- Table for desktop -->
    <div class="hidden md:block bg-white rounded-lg shadow-sm overflow-hidden mb-8">
        <table class="w-full">
            <thead>
            <tr class="bg-gray-50 border-b">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Harga</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pembayaran</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kembalian</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <?php foreach ($data['transaksis'] as $transaksi): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= date('d/m/Y', strtotime($transaksi['tgl_transaksi'])) ?></td>
                    <td class="px-6 py-4 text-sm">
                        <div class="font-medium text-gray-800"><?= $transaksi['nama_pelanggan'] ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp <?= number_format($transaksi['total_harga'], 0, ',', '.') ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp <?= number_format($transaksi['uang_diberikan'], 0, ',', '.') ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp <?= number_format($transaksi['kembalian'], 0, ',', '.') ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                        <button @click="showModal($el.dataset.id)"
                                data-id="<?= $transaksi['transaksi_id'] ?>" class="text-blue-600 hover:text-blue-900 mr-2"><i class="far fa-eye"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="flex items-center justify-between px-6 py-3 bg-white border-t border-gray-200">
            <div class="flex-1 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Menampilkan
                        <span class="font-medium"><?= max(1, (($data['current_page'] - 1) * 10) + 1) ?></span>
                        sampai
                        <span class="font-medium"><?= min($data['current_page'] * 10, $data['total_data']) ?></span>
                        dari
                        <span class="font-medium"><?= $data['total_data'] ?></span>
                        hasil
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <?php if ($data['current_page'] > 1): ?>
                            <a href="<?= BASE_URL ?>/riwayat/index/<?= $data['current_page'] - 1 ?>"
                               class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php
                        $start = max(1, $data['current_page'] - 2);
                        $end = min($data['total_pages'], $data['current_page'] + 2);

                        if ($start > 1): ?>
                            <a href="<?= BASE_URL ?>/riwayat/index/1" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                            <?php if ($start > 2): ?>
                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php for ($i = $start; $i <= $end; $i++): ?>
                            <a href="<?= BASE_URL ?>/riwayat/index/<?= $i ?>"
                               class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium <?= $i === $data['current_page'] ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' ?>">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>

                        <?php if ($end < $data['total_pages']): ?>
                            <?php if ($end < $data['total_pages'] - 1): ?>
                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                            <?php endif; ?>
                            <a href="<?= BASE_URL ?>/riwayat/index/<?= $data['total_pages'] ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"><?= $data['total_pages'] ?></a>
                        <?php endif; ?>

                        <?php if ($data['current_page'] < $data['total_pages']): ?>
                            <a href="<?= BASE_URL ?>/riwayat/index/<?= $data['current_page'] + 1 ?>"
                               class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 

0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Card view for mobile -->
    <div class="md:hidden space-y-4 mb-8">
        <?php foreach ($data['transaksis'] as $transaksi): ?>
            <div class="bg-white rounded-lg shadow-sm p-4">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h3 class="font-medium text-gray-800"><?= $transaksi['nama_pelanggan'] ?></h3>
                    </div>
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Transaksi</span>
                </div>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-sm text-gray-500"><?= date('d/m/Y', strtotime($transaksi['tgl_transaksi'])) ?></span>
                    <span class="font-medium text-blue-600">Rp <?= number_format($transaksi['total_harga'], 0, ',', '.') ?></span>
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Total Harga</span>
                        <span class="font-medium text-gray-800">Rp <?= number_format($transaksi['total_harga'], 0, ',', '.') ?></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Pembayaran</span>
                        <span class="font-medium text-gray-800">Rp <?= number_format($transaksi['uang_diberikan'], 0, ',', '.') ?></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Kembalian</span>
                        <span class="font-medium text-gray-800">Rp <?= number_format($transaksi['kembalian'], 0, ',', '.') ?></span>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-3">
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Berhasil</span>
                    <div>
                        <button @click="showModal($el.dataset.id)"
                                data-id="<?= $transaksi['transaksi_id'] ?>" class="text-blue-600 hover:text-blue-900 p-1"><i class="far fa-eye"></i></button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Pagination -->
        <div class="flex justify-center">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <?php if ($data['current_page'] > 1): ?>
                    <a href="<?= BASE_URL ?>/riwayat/index/<?= $data['current_page'] - 1 ?>"
                       class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                <?php endif; ?>

                <?php
                $start = max(1, $data['current_page'] - 2);
                $end = min($data['total_pages'], $data['current_page'] + 2);

                if ($start > 1): ?>
                    <a href="<?= BASE_URL ?>/riwayat/index/1" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                    <?php if ($start > 2): ?>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                    <?php endif; ?>
                <?php endif; ?>

                <?php for ($i = $start; $i <= $end; $i++): ?>
                    <a href="<?= BASE_URL ?>/riwayat/index/<?= $i ?>"
                       class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium <?= $i === $data['current_page'] ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($end < $data['total_pages']): ?>
                    <?php if ($end < $data['total_pages'] - 1): ?>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                    <?php endif; ?>
                    <a href="<?= BASE_URL ?>/riwayat/index/<?= $data['total_pages'] ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"><?= $data['total_pages'] ?></a>
                <?php endif; ?>

                <?php if ($data['current_page'] < $data['total_pages']): ?>
                    <a href="<?= BASE_URL ?>/riwayat/index/<?= $data['current_page'] + 1 ?>"
                       class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </div>

    <!-- Modal Detail -->
    <div x-show="show"
         class="fixed inset-0 bg-gray-600 bg-opacity-50 z-30 flex items-center justify-center" x-transition>
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto" @click.stop>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">Detail Transaksi</h2>
                <button @click="show = false" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Informasi Pelanggan</h3>
                    <p><strong>Nama:</strong> <span x-text="transaksi.nama_pelanggan || '-'"></span></p>
                    <p><strong>Email:</strong> <span x-text="transaksi.email || '-'"></span></p>
                    <p><strong>No. HP:</strong> <span x-text="transaksi.no_hp || '-'"></span></p>
                    <p><strong>Alamat:</strong> <span x-text="transaksi.alamat || '-'"></span></p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Informasi Transaksi</h3>
                    <p><strong>ID Transaksi:</strong> <span x-text="transaksi.transaksi_id || '-'"></span></p>
                    <p><strong>Tanggal:</strong> <span x-text="transaksi.tgl_transaksi ? new Date(transaksi.tgl_transaksi).toLocaleDateString('id-ID') : '-'"></span></p>
                    <p><strong>Total Harga:</strong> <span x-text="transaksi.total_harga ? 'Rp ' + Number(transaksi.total_harga).toLocaleString('id-ID') : '-'"></span></p>
                    <p><strong>Pembayaran:</strong> <span x-text="transaksi.uang_diberikan ? 'Rp ' + Number(transaksi.uang_diberikan).toLocaleString('id-ID') : '-'"></span></p>
                    <p><strong>Kembalian:</strong> <span x-text="transaksi.kembalian ? 'Rp ' + Number(transaksi.kembalian).toLocaleString('id-ID') : '-'"></span></p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Detail Produk</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2 text-left text-sm font-medium text-gray-600">Produk</th>
                                <th class="border p-2 text-left text-sm font-medium text-gray-600">Harga Satuan</th>
                                <th class="border p-2 text-left text-sm font-medium text-gray-600">Jumlah</th>
                                <th class="border p-2 text-left text-sm font-medium text-gray-600">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            <template x-for="item in detailItems" :key="item.nama_produk">
                                <tr>
                                    <td class="border p-2 text-sm text-gray-600" x-text="item.nama_produk"></td>
                                    <td class="border p-2 text-sm text-gray-600" x-text="'Rp ' + Number(item.harga_produk).toLocaleString('id-ID')"></td>
                                    <td class="border p-2 text-sm text-gray-600" x-text="item.jumlah"></td>
                                    <td class="border p-2 text-sm text-gray-600" x-text="'Rp ' + Number(item.subtotal).toLocaleString('id-ID')"></td>
                                </tr>
                            </template>
                            <tr x-show="!detailItems.length">
                                <td colspan="4" class="border p-2 text-sm text-gray-600 text-center">Tidak ada produk</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button @click="show = false" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php require_once '../app/views/layouts/footer.php'?>
