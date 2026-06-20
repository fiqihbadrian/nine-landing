<div class="dashboard-content">
    <div class="page-header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1>Profile Settings</h1>
                <p>Kelola informasi profil dan keamanan akun Anda.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

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

    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('profile/update') ?>" method="post">
                <div class="table-card">
                    <div class="table-header">
                        <h3><i class="fas fa-user-cog me-2"></i>Pengaturan Profil</h3>
                    </div>
                    <div style="padding:30px;">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($user->nama ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user->username ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>

                        <hr style="border-color: rgba(255, 255, 255, 0.1); margin: 30px 0;">

                        <h5 style="color: #fff; margin-bottom: 20px;"><i class="fas fa-lock me-2"></i>Ubah Password</h5>
                        <p style="color: #a0a4b8; font-size: 14px; margin-bottom: 20px;">Kosongkan jika tidak ingin mengubah password</p>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru">
                        </div>

                        <div class="mb-3">
                            <label for="konfirmasi_password" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Ulangi password baru">
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-4">
            <div class="chart-card">
                <div class="chart-header">
                    <h3><i class="fas fa-info-circle me-2"></i>Informasi Akun</h3>
                </div>
                <div style="padding:20px;">
                    <div class="mb-3">
                        <small style="color: #a0a4b8;">ID User</small>
                        <p style="color: #fff; margin: 5px 0 0 0; font-weight: 600;">#USR-<?= str_pad($user->id_user, 3, '0', STR_PAD_LEFT); ?></p>
                    </div>
                    <hr style="border-color: rgba(255, 255, 255, 0.1);">
                    <div class="mb-3">
                        <small style="color: #a0a4b8;">Role</small>
                        <p style="color: #fff; margin: 5px 0 0 0;">
                            <span class="badge bg-primary"><?= ucfirst($user->role); ?></span>
                        </p>
                    </div>
                    <hr style="border-color: rgba(255, 255, 255, 0.1);">
                    <div class="alert" style="background: rgba(220, 38, 38, 0.1); border: 1px solid rgba(220, 38, 38, 0.3); color: #fca5a5; margin-top: 20px;">
                        <i class="fas fa-exclamation-triangle"></i>
                        <small>Jika Anda mengubah password, Anda akan diminta login ulang.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
