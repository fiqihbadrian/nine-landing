<div class="dashboard-content">
    
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1>Tambah Kategori</h1>
                <p>Tambahkan kategori baru ke dalam sistem Nine Shop.</p>
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
            <h3>Form Tambah Kategori</h3>
        </div>
        <div style="padding:30px;">
            <form action="<?= base_url('kategori/simpan_kategori') ?>" method="post">
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required placeholder="Contoh: Elektronik">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('kategori') ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
