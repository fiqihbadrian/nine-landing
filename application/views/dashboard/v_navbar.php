
<?php
$requestUri = strtolower($_SERVER['REQUEST_URI'] ?? '');
$isDashboardActive = strpos($requestUri, 'dashboard') !== false;
$isPreorderActive = strpos($requestUri, 'preorder') !== false;
$isKategoriActive = strpos($requestUri, 'kategori') !== false;
$isProdukActive = strpos($requestUri, 'produk') !== false;
$isProfileActive = strpos($requestUri, 'profile') !== false;
?>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="logo" href="<?= base_url('dashboard') ?>">
                <img src="<?= base_url('public/assets/images/logo.png') ?>" alt="Nine Logo" style="height: 40px; width: auto;">
                <span class="logo-text">Nine Admin</span>
            </a>
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="<?= base_url('dashboard') ?>" class="nav-link<?= $isDashboardActive ? ' active' : '' ?>">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('preorder') ?>" class="nav-link<?= $isPreorderActive ? ' active' : '' ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Pre-Order</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('kategori') ?>" class="nav-link<?= $isKategoriActive ? ' active' : '' ?>">
                    <i class="fas fa-list"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('produk') ?>" class="nav-link<?= $isProdukActive ? ' active' : '' ?>">
                    <i class="fas fa-box"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('profile') ?>" class="nav-link<?= $isProfileActive ? ' active' : '' ?>">
                    <i class="fas fa-user-cog"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>
    </aside>

    
    <main class="main-content">