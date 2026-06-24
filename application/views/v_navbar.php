<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="<?= base_url('public/assets/images/logo.png') ?>" alt="NINE Logo" class="navbar-logo" style="height: 45px;">
            <span class="ms-2 fw-bold fs-4">Nine Store</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pre-order">Pre-Order</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    #mainNavbar {
        transition: background-color 0.3s ease;
    }
    
    #mainNavbar.scrolled {
        background-color: #ffffff !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .navbar-logo {
        filter: brightness(0) invert(1);
        transition: filter 0.3s ease;
    }
    
    #mainNavbar.scrolled .navbar-logo {
        filter: none;
    }
    
    #mainNavbar.navbar-dark .navbar-brand,
    #mainNavbar.navbar-dark .nav-link {
        color: #ffffff !important;
    }
    
    #mainNavbar.navbar-dark .nav-link:hover {
        color: rgba(255, 255, 255, 0.8) !important;
    }
</style>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled', 'navbar-light', 'bg-white');
            navbar.classList.remove('navbar-dark', 'bg-transparent');
        } else {
            navbar.classList.remove('scrolled', 'navbar-light', 'bg-white');
            navbar.classList.add('navbar-dark', 'bg-transparent');
        }
    });
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>
