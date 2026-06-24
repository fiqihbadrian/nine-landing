<div id="produk">
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white">Our Products</h2>
            <p class="text-white">Koleksi produk terbaik dari Nine Store</p>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($produk_list)): ?>
                <?php foreach ($produk_list as $p): ?>
                    <?php if ($p->stok > 0): ?>
                        <div class="col-md-4">
                            <div class="card h-100 shadow">
                                <?php if (!empty($p->gambar)): ?>
                                    <img src="<?= base_url('public/assets/upload/' . $p->gambar) ?>" 
                                         class="card-img-top" 
                                         alt="<?= htmlspecialchars($p->nama_produk, ENT_QUOTES, 'UTF-8'); ?>" 
                                         style="height: 350px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 350px;">
                                        <i class="fas fa-image fa-3x text-white"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($p->nama_produk, ENT_QUOTES, 'UTF-8'); ?></h5>
                                    <h6 class="text-danger fw-bold">Rp <?= number_format($p->harga, 0, ',', '.'); ?></h6>
                                    <div class="mb-2">
                                        <span class="badge bg-success">Stok: <?= $p->stok ?></span>
                                        <?php if (isset($p->nama_kategori) && !empty($p->nama_kategori)): ?>
                                            <span class="badge bg-secondary"><?= htmlspecialchars($p->nama_kategori, ENT_QUOTES, 'UTF-8'); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <a href="#pre-order" class="btn btn-dark w-100" onclick="selectProduct(<?= $p->id_produk ?>)">Pre-Order</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center rounded-4" role="alert">
                        <i class="fas fa-info-circle"></i> Tidak ada produk tersedia
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
</style>
</div>