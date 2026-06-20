<!-- Main Content -->
    <!-- Top Bar -->
    <div class="top-bar">
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="top-bar-actions ms-auto">
            <div class="dropdown profile-dropdown">
                <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="button">
                    <div class="user-profile">
                        <div class="user-avatar">AD</div>
                        <div class="user-info">
                            <h6>Admin</h6>
                            <p>Super Admin</p>
                        </div>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end mt-2">
                    <li>
                        <h6 class="dropdown-header">Settings</h6>
                    </li>
                    <li><a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="fa-regular fa-user"></i> Profile Settings</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('notifications') ?>"><i class="fa-regular fa-bell"></i> Notifications</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('privacy') ?>"><i class="fa-solid fa-shield-halved"></i> Privacy &amp; Security</a></li>
                    <li>
                        <div class="sign-out">
                            <a class="dropdown-item text-danger" href="<?= base_url('auth/logout') ?>"><i class="fa-solid fa-right-from-bracket"></i> Sign out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1>Dashboard Overview</h1>
            <p>Welcome back! Here's what's happening with your Nine platform today.</p>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i> <?php echo isset($regular_users) && $total_users > 0 ? round(($regular_users / $total_users) * 100, 1) : '0'; ?>%
                    </div>
                </div>
                <div class="stat-value" id="totalUsers"><?php echo isset($total_users) ? number_format($total_users) : '0'; ?></div>
                <div class="stat-label">Total Users</div>
                <div class="stat-footer">
                    <i class="far fa-user"></i>
                    <span><?php echo isset($admin_users) ? $admin_users : '0'; ?> Admin, <?php echo isset($regular_users) ? $regular_users : '0'; ?> Users</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon success">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i> <?php echo isset($total_kategori) ? $total_kategori : '0'; ?>
                    </div>
                </div>
                <div class="stat-value" id="totalProduk"><?php echo isset($total_produk) ? number_format($total_produk) : '0'; ?></div>
                <div class="stat-label">Total Produk</div>
                <div class="stat-footer">
                    <i class="fas fa-layer-group"></i>
                    <span><?php echo isset($total_kategori) ? $total_kategori : '0'; ?> Kategori</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon warning">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <?php 
                    $stok_status = 'up';
                    if (isset($produk_habis) && $produk_habis > 0) {
                        $stok_status = 'down';
                    } elseif (isset($produk_stok_rendah) && $produk_stok_rendah > 0) {
                        $stok_status = 'neutral';
                    }
                    ?>
                    <div class="stat-trend <?php echo $stok_status; ?>">
                        <i class="fas fa-<?php echo $stok_status == 'up' ? 'arrow-up' : ($stok_status == 'down' ? 'arrow-down' : 'minus'); ?>"></i> 
                        <?php echo isset($produk_stok_rendah) ? $produk_stok_rendah : '0'; ?>
                    </div>
                </div>
                <div class="stat-value" id="totalStok"><?php echo isset($total_stok) ? number_format($total_stok) : '0'; ?></div>
                <div class="stat-label">Total Stok</div>
                <div class="stat-footer">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span><?php echo isset($produk_habis) ? $produk_habis : '0'; ?> Habis, <?php echo isset($produk_stok_rendah) ? $produk_stok_rendah : '0'; ?> Rendah</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon info">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i> 100%
                    </div>
                </div>
                <div class="stat-value">Rp <?php echo isset($total_nilai_stok) ? number_format($total_nilai_stok / 1000, 0) : '0'; ?>K</div>
                <div class="stat-label">Nilai Stok</div>
                <div class="stat-footer">
                    <i class="fas fa-chart-line"></i>
                    <span>Total nilai inventori</span>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Produk per Kategori</h3>
                        <div class="chart-filters">
                            <button class="filter-btn active">All</button>
                            <button class="filter-btn">Electronics</button>
                            <button class="filter-btn">Fashion</button>
                            <button class="filter-btn">Food</button>
                        </div>
                    </div>
                    <canvas id="revenueChart" height="80"></canvas>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Status Stok Produk</h3>
                    </div>
                    <canvas id="orderStatusChart"></canvas>
                    <div class="mt-3" style="padding: 0 20px;">
                        <div class="d-flex justify-content-between mb-2">
                            <span><i class="fas fa-circle" style="color: #10b981; font-size: 10px;"></i> Stok Aman</span>
                            <strong><?php echo isset($total_produk, $produk_habis, $produk_stok_rendah) ? ($total_produk - $produk_habis - $produk_stok_rendah) : '0'; ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span><i class="fas fa-circle" style="color: #f59e0b; font-size: 10px;"></i> Stok Rendah</span>
                            <strong><?php echo isset($produk_stok_rendah) ? $produk_stok_rendah : '0'; ?></strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span><i class="fas fa-circle" style="color: #ef4444; font-size: 10px;"></i> Habis</span>
                            <strong><?php echo isset($produk_habis) ? $produk_habis : '0'; ?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Products Table -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="table-card">
                    <div class="table-header">
                        <h3>Recent Products</h3>
                        <div class="table-actions">
                            <button class="filter-btn">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                            <button class="filter-btn">
                                <i class="fas fa-download"></i> Export
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($latest_produk) && (is_array($latest_produk) || is_object($latest_produk))) : ?>
                                    <?php foreach ($latest_produk as $produk) : ?>
                                        <tr>
                                            <td><strong>#PRD-<?php echo htmlspecialchars($produk->id_produk, ENT_QUOTES, 'UTF-8'); ?></strong></td>
                                            <td>
                                                <?php if (!empty($produk->gambar)): ?>
                                                    <img src="<?= base_url('public/assets/upload/' . $produk->gambar) ?>" alt="<?= htmlspecialchars($produk->nama_produk, ENT_QUOTES, 'UTF-8'); ?>" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; border: 1px solid rgba(255,255,255,0.1);">
                                                <?php else: ?>
                                                    <div style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border-radius: 6px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.1);">
                                                        <i class="fas fa-image" style="color: #64748b; font-size: 14px;"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($produk->nama_produk, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><span class="badge bg-primary"><?php echo isset($produk->nama_kategori) ? htmlspecialchars($produk->nama_kategori, ENT_QUOTES, 'UTF-8') : 'N/A'; ?></span></td>
                                            <td><strong>Rp <?php echo number_format($produk->harga, 0, ',', '.'); ?></strong></td>
                                            <td>
                                                <span class="status-badge <?php echo $produk->stok > 10 ? 'delivered' : ($produk->stok > 0 ? 'pending' : 'cancelled'); ?>">
                                                    <i class="fas fa-circle" style="font-size: 8px;"></i>
                                                    <?php echo $produk->stok; ?> items
                                                </span>
                                            </td>
                                            <td><?php echo isset($produk->created_at) && $produk->created_at ? date('d M Y, H:i', strtotime($produk->created_at)) : 'N/A'; ?></td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="<?= base_url('produk/detail/' . $produk->id_produk) ?>" class="action-icon-btn" title="View"><i class="fas fa-eye"></i></a>
                                                    <a href="<?= base_url('produk/edit/' . $produk->id_produk) ?>" class="action-icon-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="<?= base_url('produk/hapus/' . $produk->id_produk) ?>" class="action-icon-btn" title="Delete" onclick="return confirm('Yakin hapus produk ini?')"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr><td colspan="7" class="text-center">No data available</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <!-- Kategori Card -->
                <div class="chart-card mb-4">
                    <div class="chart-header">
                        <h3>Kategori Produk</h3>
                        <a href="<?= base_url('kategori') ?>" class="filter-btn">View All</a>
                    </div>
                    <div class="kategori-list" style="padding: 20px;">
                        <?php if (!empty($kategori_list) && (is_array($kategori_list) || is_object($kategori_list))) : ?>
                            <?php foreach ($kategori_list as $kategori) : ?>
                                <div class="kategori-item" style="padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 style="margin: 0; color: #fff; font-size: 14px;"><?php echo htmlspecialchars($kategori->nama_kategori, ENT_QUOTES, 'UTF-8'); ?></h6>
                                            <small style="color: #a0a4b8; font-size: 12px;"><?php echo $kategori->total_produk; ?> produk tersedia</small>
                                        </div>
                                        <div>
                                            <span class="badge bg-danger" style="font-size: 12px;"><?php echo $kategori->total_produk; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center" style="color: #a0a4b8;">No categories available</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Recent Activity</h3>
                    </div>
                    <div class="activity-list" style="padding: 20px;">
                        <?php if (!empty($recent_activity) && (is_array($recent_activity) || is_object($recent_activity))) : ?>
                            <?php foreach (array_slice($recent_activity, 0, 5) as $activity) : ?>
                                <div class="activity-item" style="padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                                    <div class="d-flex align-items-start">
                                        <div class="activity-icon" style="width: 32px; height: 32px; border-radius: 50%; background: <?php echo $activity['type'] == 'user' ? '#3b82f6' : '#10b981'; ?>; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                            <i class="fas fa-<?php echo $activity['type'] == 'user' ? 'user' : 'box'; ?>" style="font-size: 14px; color: #fff;"></i>
                                        </div>
                                        <div style="flex: 1;">
                                            <p style="margin: 0; color: #fff; font-size: 13px;">
                                                <strong><?php echo htmlspecialchars($activity['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
                                            </p>
                                            <small style="color: #a0a4b8; font-size: 11px;">
                                                <?php echo $activity['type'] == 'user' ? 'User registered' : 'Product added'; ?> • 
                                                ID: <?php echo $activity['created_at']; ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center" style="color: #a0a4b8;">No recent activity</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>