<!-- Main Content -->
    <!-- Top Bar -->
    <div class="top-bar">
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
                            <a class="dropdown-item text-danger" href="<?= base_url('login/logout') ?>"><i class="fa-solid fa-right-from-bracket"></i> Sign out</a>
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
                        <i class="fas fa-arrow-up"></i> 12%
                    </div>
                </div>
                <div class="stat-value" id="totalOrders"><?php echo isset($total_users) ? number_format($total_users) : '0'; ?></div>
                <div class="stat-label">Total Users</div>
                <div class="stat-footer">
                    <i class="far fa-clock"></i>
                    <span>Loaded from tb_user</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon success">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i> 8.5%
                    </div>
                </div>
                <div class="stat-value" id="totalRevenue"><?php echo isset($total_produk) ? number_format($total_produk) : '0'; ?></div>
                <div class="stat-label">Total Produk</div>
                <div class="stat-footer">
                    <i class="fas fa-chart-line"></i>
                    <span>Loaded from tb_produk</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon warning">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i> 3.2%
                    </div>
                </div>
                <div class="stat-value" id="activeRiders">87</div>
                <div class="stat-label">Total Orders</div>
                <div class="stat-footer">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Database active</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon info">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-trend up">
                        <i class="fas fa-arrow-up"></i> 0.3
                    </div>
                </div>
                <div class="stat-value">4.8</div>
                <div class="stat-label">Average Rating</div>
                <div class="stat-footer">
                    <i class="fas fa-comments"></i>
                    <span>Connected admin panel</span>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Revenue Analytics</h3>
                        <div class="chart-filters">
                            <button class="filter-btn active">Day</button>
                            <button class="filter-btn">Week</button>
                            <button class="filter-btn">Month</button>
                            <button class="filter-btn">Year</button>
                        </div>
                    </div>
                    <canvas id="revenueChart" height="80"></canvas>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Product Status</h3>
                    </div>
                    <canvas id="orderStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Products Table -->
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
                                    <td><strong>#PRD-<?php echo htmlspecialchars($produk->id, ENT_QUOTES, 'UTF-8'); ?></strong></td>
                                    <td><?php echo htmlspecialchars($produk->nama_produk, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($produk->kategori, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><strong>Rp <?php echo number_format($produk->harga, 0, ',', '.'); ?></strong></td>
                                    <td>
                                        <span class="status-badge <?php echo $produk->stok > 10 ? 'delivered' : ($produk->stok > 0 ? 'pending' : 'cancelled'); ?>">
                                            <i class="fas fa-circle" style="font-size: 8px;"></i>
                                            <?php echo $produk->stok; ?> items
                                        </span>
                                    </td>
                                    <td><?php echo date('d M Y', strtotime($produk->created_at)); ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="#" class="action-icon-btn" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="action-icon-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="action-icon-btn" title="Delete"><i class="fas fa-trash"></i></a>
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