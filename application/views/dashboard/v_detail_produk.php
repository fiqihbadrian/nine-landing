<div class="dashboard-content">
    
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1>Detail Produk</h1>
                <p>Informasi lengkap produk di sistem Nine Shop.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('produk') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <a href="<?= base_url('produk/edit/' . $produk->id_produk) ?>" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        
        <?php if (!empty($produk->gambar)): ?>
        <div class="col-lg-4 mb-4">
            <div class="table-card">
                <div class="table-header">
                    <h3>Gambar Produk</h3>
                </div>
                <div style="padding:20px; text-align: center;">
                    <img src="<?= base_url('public/assets/upload/' . $produk->gambar) ?>" alt="<?= htmlspecialchars($produk->nama_produk, ENT_QUOTES, 'UTF-8'); ?>" style="max-width: 100%; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="<?= !empty($produk->gambar) ? 'col-lg-8' : 'col-lg-8'; ?>">
            <div class="table-card">
                <div class="table-header">
                    <h3>Informasi Produk</h3>
                </div>
                <div style="padding:30px;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="200" style="color: #a0a4b8;"><strong>ID Produk</strong></td>
                                <td style="color: #fff;">: #PRD-<?= str_pad($produk->id_produk, 3, '0', STR_PAD_LEFT); ?></td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Nama Produk</strong></td>
                                <td style="color: #fff;">: <?= htmlspecialchars($produk->nama_produk, ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Kategori</strong></td>
                                <td style="color: #fff;">: <span class="badge bg-primary"><?= htmlspecialchars($produk->nama_kategori ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></span></td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Harga</strong></td>
                                <td style="color: #fff;">: <strong style="color: #10b981;">Rp <?= number_format($produk->harga, 0, ',', '.'); ?></strong></td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Stok</strong></td>
                                <td style="color: #fff;">: <?= $produk->stok; ?> items (Total)</td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Stok Per Ukuran</strong></td>
                                <td style="color: #fff;">: 
                                    <div style="margin-top: 8px;">
                                        <?php if ($produk->stok_s > 0): ?>
                                            <span class="badge bg-secondary" style="margin-right: 5px; margin-bottom: 5px;">S: <?= $produk->stok_s; ?></span>
                                        <?php endif; ?>
                                        <?php if ($produk->stok_m > 0): ?>
                                            <span class="badge bg-secondary" style="margin-right: 5px; margin-bottom: 5px;">M: <?= $produk->stok_m; ?></span>
                                        <?php endif; ?>
                                        <?php if ($produk->stok_l > 0): ?>
                                            <span class="badge bg-secondary" style="margin-right: 5px; margin-bottom: 5px;">L: <?= $produk->stok_l; ?></span>
                                        <?php endif; ?>
                                        <?php if ($produk->stok_xl > 0): ?>
                                            <span class="badge bg-secondary" style="margin-right: 5px; margin-bottom: 5px;">XL: <?= $produk->stok_xl; ?></span>
                                        <?php endif; ?>
                                        <?php if ($produk->stok_xxl > 0): ?>
                                            <span class="badge bg-secondary" style="margin-right: 5px; margin-bottom: 5px;">XXL: <?= $produk->stok_xxl; ?></span>
                                        <?php endif; ?>
                                        <?php if ($produk->stok == 0): ?>
                                            <span class="badge bg-danger">Semua ukuran habis</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Status Stok</strong></td>
                                <td style="color: #fff;">: 
                                    <?php if ($produk->stok > 10): ?>
                                        <span class="badge bg-success">Stok Aman</span>
                                    <?php elseif ($produk->stok > 0): ?>
                                        <span class="badge bg-warning">Stok Rendah</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Habis</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Total Nilai</strong></td>
                                <td style="color: #fff;">: <strong style="color: #dc2626;">Rp <?= number_format($produk->harga * $produk->stok, 0, ',', '.'); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Quick Actions</h3>
                </div>
                <div style="padding:20px;">
                    <a href="<?= base_url('produk/edit/' . $produk->id_produk) ?>" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-edit"></i> Edit Produk
                    </a>
                    <a href="<?= base_url('produk') ?>" class="btn btn-secondary w-100 mb-2">
                        <i class="fas fa-list"></i> Lihat Semua Produk
                    </a>
                    <a href="<?= base_url('produk/hapus/' . $produk->id_produk) ?>" class="btn btn-danger w-100" onclick="return confirm('Yakin hapus produk ini?')">
                        <i class="fas fa-trash"></i> Hapus Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
