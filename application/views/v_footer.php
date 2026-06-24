<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <img src="<?= base_url('public/assets/images/logo.png') ?>" alt="Nine Store Logo" class="mb-3" style="height: 50px;">
                <h5 class="fw-bold">Nine Store</h5>
                <p class="text-white-50">Your trusted online store for quality products.</p>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="fw-bold text-uppercase mb-3">Menu</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#beranda" class="text-white-50 text-decoration-none">Beranda</a>
                    </li>
                    <li class="mb-2">
                        <a href="#tentang" class="text-white-50 text-decoration-none">Tentang</a>
                    </li>
                    <li class="mb-2">
                        <a href="#produk" class="text-white-50 text-decoration-none">Produk</a>
                    </li>
                    <li class="mb-2">
                        <a href="#pre-order" class="text-white-50 text-decoration-none">Pre-Order</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="fw-bold text-uppercase mb-3">Contact</h6>
                <ul class="list-unstyled text-white-50">
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2"></i> info@ninestore.com
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="fw-bold text-uppercase mb-3">Follow Us</h6>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-outline-light btn-sm">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-white-50 mb-0">
                    &copy; 2026 <strong class="text-white">Nine Store</strong>. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <button id="backToTop" class="btn btn-danger position-fixed bottom-0 end-0 m-4 d-none" style="width: 50px; height: 50px; z-index: 999;">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>

<script>
    const backToTop = document.getElementById('backToTop');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTop.classList.remove('d-none');
        } else {
            backToTop.classList.add('d-none');
        }
    });
    
    backToTop.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?= base_url('public/assets/assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>
<script src="<?= base_url('public/assets/js/form-preorder.js') ?>"></script>

</body>
</html>
