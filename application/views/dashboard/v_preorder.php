<div class="dashboard-content">
    
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1>Data Pre-Order</h1>
                <p>Kelola semua pre-order dari pelanggan Nine Store.</p>
            </div>
        </div>
    </div>

    
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(128, 0, 0, 0.1);">
                    <i class="fas fa-clock" style="color: #800000;"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Pending</div>
                    <div class="stat-value"><?= count(array_filter($preorder, function($p) { return $p->status == 'pending'; })); ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(251, 146, 60, 0.1);">
                    <i class="fas fa-spinner" style="color: #fb923c;"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Diproses</div>
                    <div class="stat-value"><?= count(array_filter($preorder, function($p) { return $p->status == 'diproses'; })); ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(34, 197, 94, 0.1);">
                    <i class="fas fa-check-circle" style="color: #22c55e;"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Selesai</div>
                    <div class="stat-value"><?= count(array_filter($preorder, function($p) { return $p->status == 'selesai'; })); ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1);">
                    <i class="fas fa-times-circle" style="color: #ef4444;"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Batal</div>
                    <div class="stat-value"><?= count(array_filter($preorder, function($p) { return $p->status == 'batal'; })); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <h3>Data Pre-Order</h3>
        </div>
        <div style="padding:20px;">
            <table id="TablePreorder" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($preorder as $p): ?>
                        <tr>
                            <td><strong><?= $no++; ?></strong></td>
                            <td><?= date('d M Y, H:i', strtotime($p->created_at)); ?></td>
                            <td><?= htmlspecialchars($p->nama, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= $p->whatsapp; ?></td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <?php if (!empty($p->gambar)): ?>
                                        <img src="<?= base_url('public/assets/upload/' . $p->gambar) ?>" alt="<?= htmlspecialchars($p->produk, ENT_QUOTES, 'UTF-8'); ?>" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; border: 1px solid rgba(255,255,255,0.1);">
                                    <?php else: ?>
                                        <div style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border-radius: 6px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.1);">
                                            <i class="fas fa-image" style="color: #64748b; font-size: 14px;"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <div><?= htmlspecialchars($p->produk, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <small style="color: #a0a4b8;"><?= $p->ukuran; ?></small>
                                    </div>
                                </div>
                            </td>
                            <td><?= $p->jumlah; ?> pcs</td>
                            <td>
                                <?php if ($p->status == 'pending'): ?>
                                    <span class="badge" style="background: #800000;">Pending</span>
                                <?php elseif ($p->status == 'diproses'): ?>
                                    <span class="badge bg-warning">Diproses</span>
                                <?php elseif ($p->status == 'selesai'): ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Batal</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?= base_url('preorder/detail/' . $p->id_preorder) ?>" class="action-icon-btn" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url('preorder/hapus/' . $p->id_preorder) ?>" class="action-icon-btn" title="Delete" onclick="return confirm('Yakin hapus preorder ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    new DataTable('#TablePreorder');
});
</script>
