<!-- Sidebar -->
<?php
$requestUri = strtolower($_SERVER['REQUEST_URI'] ?? '');
$isDashboardActive = strpos($requestUri, 'dashboard') !== false;
$isKategoriActive = strpos($requestUri, 'kategori') !== false;
?>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="logo" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-fire"></i>
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
                <a href="<?= base_url('kategori') ?>" class="nav-link<?= $isKategoriActive ? ' active' : '' ?>">
                    <i class="fas fa-list"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('produk') ?>" class="nav-link">
                    <i class="fas fa-box"></i>
                    <span>Produk</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content Wrapper -->
    <main class="main-content">