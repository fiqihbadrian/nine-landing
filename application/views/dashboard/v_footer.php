    </main>

    <script src="<?= base_url('public/assets/assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/assets/plugin/chart/chart.js') ?>"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url('public/assets/js/script.js') ?>"></script>
    
    <script>
        <?php if(isset($produk_by_kategori) && is_array($produk_by_kategori)): ?>
        const produkByKategori = <?php echo json_encode($produk_by_kategori); ?>;
        <?php else: ?>
        const produkByKategori = [];
        <?php endif; ?>

        const stokAman = <?php echo isset($total_produk, $produk_habis, $produk_stok_rendah) ? ($total_produk - $produk_habis - $produk_stok_rendah) : 0; ?>;
        const stokRendah = <?php echo isset($produk_stok_rendah) ? $produk_stok_rendah : 0; ?>;
        const stokHabis = <?php echo isset($produk_habis) ? $produk_habis : 0; ?>;

        const revenueCtx = document.getElementById('revenueChart');
        if (revenueCtx) {
            const kategoriLabels = produkByKategori.map(item => item.kategori);
            const kategoriData = produkByKategori.map(item => parseInt(item.total));
            
            new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: kategoriLabels.length > 0 ? kategoriLabels : ['Electronics', 'Fashion', 'Food'],
                    datasets: [{
                        label: 'Jumlah Produk',
                        data: kategoriData.length > 0 ? kategoriData : [4, 2, 3],
                        backgroundColor: [
                            'rgba(220, 38, 38, 0.8)',
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(245, 158, 11, 0.8)',
                            'rgba(139, 92, 246, 0.8)'
                        ],
                        borderColor: [
                            '#dc2626',
                            '#3b82f6',
                            '#10b981',
                            '#f59e0b',
                            '#8b5cf6'
                        ],
                        borderWidth: 2,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#dc2626',
                            borderWidth: 1,
                            padding: 12,
                            displayColors: true,
                            callbacks: {
                                label: function(context) {
                                    return ' Produk: ' + context.parsed.y;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#a0a4b8',
                                stepSize: 1
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#a0a4b8'
                            }
                        }
                    }
                }
            });
        }

        const orderStatusCtx = document.getElementById('orderStatusChart');
        if (orderStatusCtx) {
            new Chart(orderStatusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Stok Aman', 'Stok Rendah', 'Habis'],
                    datasets: [{
                        data: [stokAman, stokRendah, stokHabis],
                        backgroundColor: [
                            '#10b981',
                            '#f59e0b',
                            '#ef4444'
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#dc2626',
                            borderWidth: 1,
                            padding: 12,
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                    return label + ': ' + value + ' (' + percentage + '%)';
                                }
                            }
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>