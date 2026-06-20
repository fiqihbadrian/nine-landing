<div class="dashboard-content">
    
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1>Data Produk</h1>
                <p>Kelola data produk yang tersedia pada sistem Nine Shop.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('produk/tambah') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Produk
                </a>
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

    <div class="table-card">
        <div class="table-header">
            <h3>Data Produk</h3>
        </div>
        <div style="padding:20px;">
            <table id="TableProduk" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($produk as $p): ?>
                        <tr>
                            <td><strong><?= $no++; ?></strong></td>
                            <td>
                                <?php if (!empty($p->gambar)): ?>
                                    <img src="<?= base_url('public/assets/upload/' . $p->gambar) ?>" alt="<?= htmlspecialchars($p->nama_produk, ENT_QUOTES, 'UTF-8'); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid rgba(255,255,255,0.1);">
                                <?php else: ?>
                                    <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.05); border-radius: 6px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.1);">
                                        <i class="fas fa-image" style="color: #64748b;"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($p->nama_produk, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <span class="badge bg-primary">
                                    <?= htmlspecialchars($p->nama_kategori ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </td>
                            <td>Rp <?= number_format($p->harga, 0, ',', '.'); ?></td>
                            <td><?= $p->stok; ?> items</td>
                            <td>
                                <?php if ($p->stok > 10): ?>
                                    <span class="badge bg-success">Stok Aman</span>
                                <?php elseif ($p->stok > 0): ?>
                                    <span class="badge bg-warning">Stok Rendah</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Habis</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?= base_url('produk/detail/' . $p->id_produk) ?>" class="action-icon-btn" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url('produk/edit/' . $p->id_produk) ?>" class="action-icon-btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('produk/hapus/' . $p->id_produk) ?>" class="action-icon-btn" title="Delete" onclick="return confirm('Yakin hapus produk ini?')">
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
    new DataTable('#TableProduk');
});
</script>
