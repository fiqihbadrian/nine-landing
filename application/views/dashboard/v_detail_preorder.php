<div class="dashboard-content">
    
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1>Detail Pre-Order #<?= str_pad($preorder->id_preorder, 4, '0', STR_PAD_LEFT); ?></h1>
                <p>Informasi lengkap pre-order dari pelanggan.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('preorder') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        
        <?php if (!empty($preorder->gambar)): ?>
        <div class="col-lg-4 mb-4">
            <div class="table-card">
                <div class="table-header">
                    <h3>Gambar Produk</h3>
                </div>
                <div style="padding:20px; text-align: center;">
                    <img src="<?= base_url('public/assets/upload/' . $preorder->gambar) ?>" alt="<?= htmlspecialchars($preorder->produk, ENT_QUOTES, 'UTF-8'); ?>" style="max-width: 100%; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="<?= !empty($preorder->gambar) ? 'col-lg-8' : 'col-lg-8'; ?>">
            <div class="table-card">
                <div class="table-header">
                    <h3>Informasi Pre-Order</h3>
                </div>
                <div style="padding:30px;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="200" style="color: #a0a4b8;"><strong>ID Pre-Order</strong></td>
                                <td style="color: #fff;">: #PRE-<?= str_pad($preorder->id_preorder, 4, '0', STR_PAD_LEFT); ?></td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Tanggal Order</strong></td>
                                <td style="color: #fff;">: <?= date('d M Y, H:i', strtotime($preorder->created_at)); ?> WIB</td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Status</strong></td>
                                <td style="color: #fff;">: 
                                    <?php if ($preorder->status == 'pending'): ?>
                                        <span class="badge" style="background: #800000;">Pending</span>
                                    <?php elseif ($preorder->status == 'diproses'): ?>
                                        <span class="badge bg-warning">Diproses</span>
                                    <?php elseif ($preorder->status == 'selesai'): ?>
                                        <span class="badge bg-success">Selesai</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Batal</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="table-card mt-4">
                <div class="table-header">
                    <h3>Data Pelanggan</h3>
                </div>
                <div style="padding:30px;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="200" style="color: #a0a4b8;"><strong>Nama Lengkap</strong></td>
                                <td style="color: #fff;">: <?= htmlspecialchars($preorder->nama, ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>No. Telepon</strong></td>
                                <td style="color: #fff;">: <?= $preorder->whatsapp; ?></td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Email</strong></td>
                                <td style="color: #fff;">: <?= $preorder->email ? htmlspecialchars($preorder->email, ENT_QUOTES, 'UTF-8') : '-'; ?></td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Alamat</strong></td>
                                <td style="color: #fff;">: <?= nl2br(htmlspecialchars($preorder->alamat, ENT_QUOTES, 'UTF-8')); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="table-card mt-4">
                <div class="table-header">
                    <h3>Detail Pesanan</h3>
                </div>
                <div style="padding:30px;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="200" style="color: #a0a4b8;"><strong>Produk</strong></td>
                                <td style="color: #fff;">: <?= htmlspecialchars($preorder->produk, ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                            <?php if (!empty($preorder->nama_kategori)): ?>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Kategori</strong></td>
                                <td style="color: #fff;">: <span class="badge bg-primary"><?= htmlspecialchars($preorder->nama_kategori, ENT_QUOTES, 'UTF-8'); ?></span></td>
                            </tr>
                            <?php endif; ?>
                            <?php if (!empty($preorder->harga)): ?>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Harga Satuan</strong></td>
                                <td style="color: #fff;">: <strong style="color: #10b981;">Rp <?= number_format($preorder->harga, 0, ',', '.'); ?></strong></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Ukuran</strong></td>
                                <td style="color: #fff;">: <?= $preorder->ukuran; ?></td>
                            </tr>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Jumlah</strong></td>
                                <td style="color: #fff;">: <?= $preorder->jumlah; ?> pcs</td>
                            </tr>
                            <?php if (!empty($preorder->harga)): ?>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Total Harga</strong></td>
                                <td style="color: #fff;">: <strong style="color: #dc2626;">Rp <?= number_format($preorder->harga * $preorder->jumlah, 0, ',', '.'); ?></strong></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="color: #a0a4b8;"><strong>Catatan</strong></td>
                                <td style="color: #fff;">: <?= $preorder->catatan ? nl2br(htmlspecialchars($preorder->catatan, ENT_QUOTES, 'UTF-8')) : '-'; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="table-card">
                <div class="table-header">
                    <h3>Update Status</h3>
                </div>
                <div style="padding:20px;">
                    <form action="<?= base_url('preorder/update_status/' . $preorder->id_preorder) ?>" method="post">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Pre-Order</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="pending" <?= $preorder->status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="diproses" <?= $preorder->status == 'diproses' ? 'selected' : ''; ?>>Diproses</option>
                                <option value="selesai" <?= $preorder->status == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                                <option value="batal" <?= $preorder->status == 'batal' ? 'selected' : ''; ?>>Batal</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save"></i> Update Status
                        </button>
                    </form>
                </div>
            </div>

            <div class="table-card mt-4">
                <div class="table-header">
                    <h3>Quick Actions</h3>
                </div>
                <div style="padding:20px;">
                    <a href="<?= base_url('preorder') ?>" class="btn btn-secondary w-100 mb-2">
                        <i class="fas fa-list"></i> Lihat Semua Pre-Order
                    </a>
                    <a href="<?= base_url('preorder/hapus/' . $preorder->id_preorder) ?>" class="btn btn-danger w-100" onclick="return confirm('Yakin hapus pre-order ini?')">
                        <i class="fas fa-trash"></i> Hapus Pre-Order
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
