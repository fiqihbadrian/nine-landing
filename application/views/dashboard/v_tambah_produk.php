<div class="dashboard-content">
    
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1>Tambah Produk</h1>
                <p>Tambahkan produk baru ke dalam sistem Nine Shop.</p>
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
            <h3>Form Tambah Produk</h3>
        </div>
        <div style="padding:30px;">
            <form action="<?= base_url('produk/simpan') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                </div>

                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="id_kategori" name="id_kategori" required>
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required min="0">
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Per Ukuran</label>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">S</label>
                            <input type="number" class="form-control" name="stok_s" id="stok_s" value="0" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">M</label>
                            <input type="number" class="form-control" name="stok_m" id="stok_m" value="0" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">L</label>
                            <input type="number" class="form-control" name="stok_l" id="stok_l" value="0" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">XL</label>
                            <input type="number" class="form-control" name="stok_xl" id="stok_xl" value="0" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">XXL</label>
                            <input type="number" class="form-control" name="stok_xxl" id="stok_xxl" value="0" min="0" onchange="calculateTotalStok()">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="font-size: 12px; color: #a0a4b8;">Total</label>
                            <input type="number" class="form-control" name="stok" id="stok_total" value="0" readonly style="background: #1a1f2e; font-weight: 600;">
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
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    <small class="text-muted">Format: JPG, JPEG, PNG, GIF, WEBP (Max 2MB)</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('produk') ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
