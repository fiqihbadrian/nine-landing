<div class="min-vh-100 py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="bg-light border border-danger border-2 rounded-4 shadow-lg p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h2 class="text-primary fw-bold mb-2">Form Pre-Order</h2>
                        <p class="text-dark">Isi formulir di bawah untuk melakukan pre-order produk Nine Store</p>
                    </div>

                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success rounded-4" role="alert">
                            <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger rounded-4" role="alert">
                            <i class="fas fa-exclamation-circle"></i> <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form id="preorderForm" action="<?= base_url('home/submit_preorder') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-4" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">No. Telepon<span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control rounded-4" id="whatsapp" name="whatsapp" placeholder="08123456789" required pattern="[0-9]{10,13}">
                                    <small class="text-muted">Format: 08xxxxxxxxxx</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control rounded-4" id="email" name="email" placeholder="email@example.com">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Produk<span class="text-danger">*</span></label>
                            <select class="form-select rounded-4" id="id_produk" name="id_produk" required>
                                <option value="">Pilih Produk</option>
                                <?php if (!empty($produk_list)): ?>
                                    <?php foreach ($produk_list as $p): ?>
                                        <?php if ($p->stok > 0): ?>
                                            <option value="<?= $p->id_produk; ?>" 
                                                    data-stok="<?= $p->stok; ?>"
                                                    data-stok-s="<?= $p->stok_s; ?>"
                                                    data-stok-m="<?= $p->stok_m; ?>"
                                                    data-stok-l="<?= $p->stok_l; ?>"
                                                    data-stok-xl="<?= $p->stok_xl; ?>"
                                                    data-stok-xxl="<?= $p->stok_xxl; ?>"
                                                    data-harga="<?= number_format($p->harga, 0, ',', '.'); ?>"
                                                    data-kategori="<?= htmlspecialchars($p->nama_kategori ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                                <?= htmlspecialchars($p->nama_produk, ENT_QUOTES, 'UTF-8'); ?> - Rp <?= number_format($p->harga, 0, ',', '.'); ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="">Tidak ada produk tersedia</option>
                                <?php endif; ?>
                            </select>
                            <small class="text-muted" id="produkInfo"></small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Ukuran<span class="text-danger">*</span></label>
                                    <select class="form-select rounded-4" id="ukuran" name="ukuran" required>
                                        <option value="">Pilih Ukuran</option>
                                    </select>
                                    <small class="text-muted" id="stokUkuranInfo"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Jumlah<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control rounded-4" id="jumlah" name="jumlah" placeholder="1" min="1" required>
                                    <small class="text-muted" id="stokInfo"></small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Lengkap<span class="text-danger">*</span></label>
                            <textarea class="form-control rounded-4" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap untuk pengiriman" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Catatan Tambahan</label>
                            <textarea class="form-control rounded-4" id="catatan" name="catatan" placeholder="Catatan khusus untuk pesanan Anda (opsional)" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-secondary w-100 rounded-4 py-3 fw-semibold">
                            <i class="fas fa-paper-plane"></i> Kirim Pre-Order
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
