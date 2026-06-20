<div class="dashboard-content">
    
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1>Edit Kategori</h1>
                <p>Perbarui informasi kategori di sistem Nine Shop.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('kategori') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <h3>Form Edit Kategori</h3>
        </div>
        <div style="padding:30px;">
            <form action="<?= base_url('kategori/update_kategori/' . $kategori->id_kategori) ?>" method="post">
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= htmlspecialchars($kategori->nama_kategori, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="<?= base_url('kategori') ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
