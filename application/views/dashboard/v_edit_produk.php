<div class="dashboard-content">
    
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1>Edit Produk</h1>
                <p>Perbarui informasi produk di sistem Nine Shop.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('produk') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <h3>Form Edit Produk</h3>
        </div>
        <div style="padding:30px;">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('produk/update/' . $produk->id_produk) ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= htmlspecialchars($produk->nama_produk, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="id_kategori" name="id_kategori" required>
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k->id_kategori; ?>" <?= $k->id_kategori == $produk->id_kategori ? 'selected' : ''; ?>>
                                <?= $k->nama_kategori; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $produk->harga; ?>" required min="0">
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Per Ukuran</label>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">S</label>
                            <input type="number" class="form-control" name="stok_s" id="stok_s" value="<?= $produk->stok_s; ?>" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">M</label>
                            <input type="number" class="form-control" name="stok_m" id="stok_m" value="<?= $produk->stok_m; ?>" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">L</label>
                            <input type="number" class="form-control" name="stok_l" id="stok_l" value="<?= $produk->stok_l; ?>" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">XL</label>
                            <input type="number" class="form-control" name="stok_xl" id="stok_xl" value="<?= $produk->stok_xl; ?>" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">XXL</label>
                            <input type="number" class="form-control" name="stok_xxl" id="stok_xxl" value="<?= $produk->stok_xxl; ?>" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">Total</label>
                            <input type="number" class="form-control" name="stok" id="stok_total" value="<?= $produk->stok; ?>" readonly style="background: #1a1f2e; font-weight: 600;">
                        </div>
                    </div>
                    <small class="text-muted">Total stok akan dihitung otomatis</small>
                </div>

                <script>
                function calculateTotalStok() {
                    const stok_s = parseInt(document.getElementById('stok_s').value) || 0;
                    const stok_m = parseInt(document.getElementById('stok_m').value) || 0;
                    const stok_l = parseInt(document.getElementById('stok_l').value) || 0;
                    const stok_xl = parseInt(document.getElementById('stok_xl').value) || 0;
                    const stok_xxl = parseInt(document.getElementById('stok_xxl').value) || 0;
                    const total = stok_s + stok_m + stok_l + stok_xl + stok_xxl;
                    document.getElementById('stok_total').value = total;
                }
                </script>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Produk</label>
                    <?php if (!empty($produk->gambar)): ?>
                        <div class="mb-2">
                            <img src="<?= base_url('public/assets/upload/' . $produk->gambar) ?>" alt="Current Image" style="max-width: 200px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                            <p class="text-muted mt-1" style="font-size: 13px;">Gambar saat ini</p>
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    <small class="text-muted">Format: JPG, JPEG, PNG, GIF, WEBP (Max 2MB). Kosongkan jika tidak ingin mengganti gambar.</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="<?= base_url('produk') ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
