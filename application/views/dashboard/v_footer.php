    </main>

    <script src="<?= base_url('public/assets/assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/assets/plugin/chart/chart.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/script.js') ?>"></script>
    
    <script>
        // Sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menuToggle');
        
        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
            });
        }

        // Mobile menu toggle
        const menuToggleMobile = document.querySelector('.menu-toggle-mobile');
        if (menuToggleMobile) {
            menuToggleMobile.addEventListener('click', () => {
                sidebar.classList.toggle('mobile-open');
            });
        }

        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart');
        if (revenueCtx) {
            new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue',
                        data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 35000, 32000, 40000, 38000, 45000],
                        borderColor: '#dc2626',
                        backgroundColor: 'rgba(220, 38, 38, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#a0a4b8'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#a0a4b8'
                            }
                        }
                    }
                }
            });
        }

        // Order Status Chart
        const orderStatusCtx = document.getElementById('orderStatusChart');
        if (orderStatusCtx) {
            new Chart(orderStatusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['In Stock', 'Low Stock', 'Out of Stock'],
                    datasets: [{
                        data: [45, 30, 25],
                        backgroundColor: [
                            '#2ecc71',
                            '#f39c12',
                            '#dc2626'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#a0a4b8',
                                padding: 15,
                                font: {
                                    family: 'Poppins'
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