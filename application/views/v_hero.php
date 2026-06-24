<section id="beranda" class="hero-section min-vh-100 d-flex align-items-center" style="width:100vw;height:100vh;min-height:100vh;position:relative;left:0;top:0;margin:0;padding:0;">
    <div class="container-fluid px-0">
        <div class="row g-5 py-5 mx-0 align-items-center">
            <div class="col-12 col-lg-6 px-4 order-2 order-lg-1">
                <div class="row g-3 align-items-center">
                    <div class="col-4 d-flex justify-content-start hero-card-1" style="transform: translateY(-100px);">
                        <div class="rect-frame" style="width:100%; min-height:180px; border:2px solid rgba(0,0,0,0.08); border-radius:8px; padding:6px; background:#fff; box-shadow:0 6px 18px rgba(0,0,0,0.08);">
                            <div class="card border-0 overflow-hidden h-100" style="border-radius:4px;">
                                <img src="<?= base_url('public/assets/images/baju1.jpg') ?>" alt="Produk 1" class="card-img-top h-100 w-100" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-center hero-card-2" style="transform: translateY(-20px);">
                        <div class="rect-frame" style="width:100%; min-height:180px; border:2px solid rgba(0,0,0,0.08); border-radius:8px; padding:6px; background:#fff; box-shadow:0 6px 18px rgba(0,0,0,0.08);">
                            <div class="card border-0 overflow-hidden h-100" style="border-radius:4px;">
                                <img src="<?= base_url('public/assets/images/baju2.jpg') ?>" alt="Produk 2" class="card-img-top h-100 w-100" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-end hero-card-3" style="transform: translateY(100px);">
                        <div class="rect-frame" style="width:100%; min-height:180px; border:2px solid rgba(0,0,0,0.08); border-radius:8px; padding:6px; background:#fff; box-shadow:0 6px 18px rgba(0,0,0,0.08);">
                            <div class="card border-0 overflow-hidden h-100" style="border-radius:4px;">
                                <img src="<?= base_url('public/assets/images/baju3.jpg') ?>" alt="Produk 3" class="card-img-top h-100 w-100" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 px-4 order-1 order-lg-2">
                <div class="d-flex flex-column align-items-center justify-content-center h-100 text-center">
                    <div class="mb-4">
                        <img src="<?= base_url('public/assets/images/logo.png') ?>" alt="Nine Store Logo" class="img-fluid logo-white" style="max-width: 300px; height: auto; filter: brightness(0) invert(1);">
                    </div>
                    <h1 class="display-5 fw-bold lh-1 mb-3 text-white" style="color:#ffffff !important;">NINE STORE</h1>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a href="#produk"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Price List</button></a>
                        <a href="#pre-order"><button type="button" class="btn btn-outline-secondary btn-lg px-4 text-white border-white">Pre-order</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media (max-width: 991.98px) {
        .hero-card-1,
        .hero-card-2,
        .hero-card-3 {
            transform: translateY(0) !important;
        }
        
        .hero-card-1 {
            justify-content: center !important;
        }
        
        .hero-card-3 {
            justify-content: center !important;
        }
    }
</style>