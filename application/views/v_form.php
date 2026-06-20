<style>
    #preorder {
        background: linear-gradient(135deg, #1a1f2e 0%, #2d1f3f 100%);
        padding: 80px 20px;
        min-height: 100vh;
    }

    .form-container {
        max-width: 600px;
        margin: 0 auto;
        background: rgba(26, 31, 46, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    }

    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .form-header h2 {
        color: #fff;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .form-header p {
        color: #a0a4b8;
        font-size: 16px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-label {
        display: block;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-label .required {
        color: #800000;
        margin-left: 4px;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        padding: 12px 16px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #800000;
        box-shadow: 0 0 0 3px rgba(128, 0, 0, 0.1);
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #64748b;
    }

    .form-textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-select {
        cursor: pointer;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .btn-submit {
        width: 100%;
        background: #800000;
        border: none;
        border-radius: 8px;
        color: #fff;
        padding: 14px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background: #660000;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(128, 0, 0, 0.3);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .info-text {
        color: #a0a4b8;
        font-size: 13px;
        margin-top: 6px;
    }

    .alert {
        padding: 16px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: #86efac;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        border: 1px solid rgba(220, 53, 69, 0.3);
        color: #fca5a5;
    }

    .produk-info {
        font-size: 12px;
        color: #a0a4b8;
        margin-top: 4px;
    }

    @media (max-width: 768px) {
        #preorder {
            padding: 60px 15px;
        }

        .form-container {
            padding: 30px 20px;
        }

        .form-header h2 {
            font-size: 28px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<div id="preorder">
    <div class="form-container">
        <div class="form-header">
            <h2>Form Pre-Order</h2>
            <p>Isi formulir di bawah untuk melakukan pre-order produk Nine Store</p>
        </div>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form id="preorderForm" action="<?= base_url('home/submit_preorder') ?>" method="post">
            <div class="form-group">
                <label class="form-label">Nama Lengkap<span class="required">*</span></label>
                <input type="text" class="form-input" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">No. Telepon<span class="required">*</span></label>
                    <input type="tel" class="form-input" id="whatsapp" name="whatsapp" placeholder="08123456789" required pattern="[0-9]{10,13}">
                    <p class="info-text">Format: 08xxxxxxxxxx</p>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input" id="email" name="email" placeholder="email@example.com">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Produk<span class="required">*</span></label>
                <select class="form-select" id="id_produk" name="id_produk" required onchange="updateProdukInfo()">
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
                <p class="produk-info" id="produkInfo"></p>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Ukuran<span class="required">*</span></label>
                    <select class="form-select" id="ukuran" name="ukuran" required onchange="updateStokInfo()">
                        <option value="">Pilih Ukuran</option>
                    </select>
                    <p class="info-text" id="stokUkuranInfo"></p>
                </div>

                <div class="form-group">
                    <label class="form-label">Jumlah<span class="required">*</span></label>
                    <input type="number" class="form-input" id="jumlah" name="jumlah" placeholder="1" min="1" required>
                    <p class="info-text" id="stokInfo"></p>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Alamat Lengkap<span class="required">*</span></label>
                <textarea class="form-textarea" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap untuk pengiriman" required></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Catatan Tambahan</label>
                <textarea class="form-textarea" id="catatan" name="catatan" placeholder="Catatan khusus untuk pesanan Anda (opsional)" style="min-height: 80px;"></textarea>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Kirim Pre-Order
            </button>
        </form>
    </div>
</div>

<script>
let currentStok = {
    s: 0,
    m: 0,
    l: 0,
    xl: 0,
    xxl: 0
};

function updateProdukInfo() {
    const select = document.getElementById('id_produk');
    const selectedOption = select.options[select.selectedIndex];
    const kategori = selectedOption.getAttribute('data-kategori');
    
    // Get stok per ukuran
    currentStok.s = parseInt(selectedOption.getAttribute('data-stok-s')) || 0;
    currentStok.m = parseInt(selectedOption.getAttribute('data-stok-m')) || 0;
    currentStok.l = parseInt(selectedOption.getAttribute('data-stok-l')) || 0;
    currentStok.xl = parseInt(selectedOption.getAttribute('data-stok-xl')) || 0;
    currentStok.xxl = parseInt(selectedOption.getAttribute('data-stok-xxl')) || 0;
    
    if (kategori) {
        document.getElementById('produkInfo').innerHTML = '<i class="fas fa-tag"></i> Kategori: ' + kategori;
    } else {
        document.getElementById('produkInfo').innerHTML = '';
    }
    
    // Update dropdown ukuran
    updateUkuranOptions();
}

function updateUkuranOptions() {
    const ukuranSelect = document.getElementById('ukuran');
    ukuranSelect.innerHTML = '<option value="">Pilih Ukuran</option>';
    
    const sizes = [
        {value: 'S', label: 'S (Small)', stok: currentStok.s},
        {value: 'M', label: 'M (Medium)', stok: currentStok.m},
        {value: 'L', label: 'L (Large)', stok: currentStok.l},
        {value: 'XL', label: 'XL (Extra Large)', stok: currentStok.xl},
        {value: 'XXL', label: 'XXL (Double XL)', stok: currentStok.xxl}
    ];
    
    sizes.forEach(size => {
        if (size.stok > 0) {
            const option = document.createElement('option');
            option.value = size.value;
            option.textContent = size.label + ' (Stok: ' + size.stok + ')';
            option.setAttribute('data-stok', size.stok);
            ukuranSelect.appendChild(option);
        }
    });
    
    // Reset info
    document.getElementById('stokUkuranInfo').innerHTML = '';
    document.getElementById('stokInfo').innerHTML = '';
    document.getElementById('jumlah').value = '';
    document.getElementById('jumlah').max = '';
}

function updateStokInfo() {
    const ukuranSelect = document.getElementById('ukuran');
    const selectedOption = ukuranSelect.options[ukuranSelect.selectedIndex];
    const stok = selectedOption.getAttribute('data-stok');
    const jumlahInput = document.getElementById('jumlah');
    
    if (stok) {
        document.getElementById('stokUkuranInfo').innerHTML = 'Stok tersedia: ' + stok + ' pcs';
        jumlahInput.max = stok;
    } else {
        document.getElementById('stokUkuranInfo').innerHTML = '';
        jumlahInput.max = '';
    }
}
</script>
