// Sidebar toggle
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const menuToggleIcon = menuToggle ? menuToggle.querySelector('i') : null;
    const logo = document.querySelector('.sidebar .logo');
    
    // Function to update icon based on sidebar state
    function updateToggleIcon() {
        if (menuToggleIcon && window.innerWidth > 768) {
            if (sidebar.classList.contains('collapsed')) {
                // Show arrow right icon when collapsed
                menuToggleIcon.classList.remove('fa-bars');
                menuToggleIcon.classList.add('fa-chevron-right');
            } else {
                // Show hamburger icon when expanded
                menuToggleIcon.classList.remove('fa-chevron-right');
                menuToggleIcon.classList.add('fa-bars');
            }
        }
    }
    
    // Desktop sidebar toggle
    if (menuToggle) {
        menuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Check if mobile or desktop
            if (window.innerWidth <= 768) {
                // Mobile: toggle mobile-open class
                sidebar.classList.toggle('mobile-open');
            } else {
                // Desktop: toggle collapsed class
                sidebar.classList.toggle('collapsed');
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
                updateToggleIcon();
            }
        });
    }
    
    // Mobile menu toggle button in top bar
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            sidebar.classList.toggle('mobile-open');
        });
    }
    
    // Logo click to expand when collapsed (desktop only)
    if (logo) {
        logo.addEventListener('click', (e) => {
            if (window.innerWidth > 768 && sidebar.classList.contains('collapsed')) {
                e.preventDefault();
                sidebar.classList.remove('collapsed');
                localStorage.setItem('sidebarCollapsed', 'false');
                updateToggleIcon();
            }
        });
    }

    // Restore sidebar state on desktop only
    if (sidebar && window.innerWidth > 768 && localStorage.getItem('sidebarCollapsed') === 'true') {
        sidebar.classList.add('collapsed');
        updateToggleIcon();
    }

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', (e) => {
        if (window.innerWidth <= 768) {
            if (!sidebar.contains(e.target) && e.target !== mobileMenuToggle && !mobileMenuToggle.contains(e.target)) {
                sidebar.classList.remove('mobile-open');
            }
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            // Remove mobile class when switching to desktop
            sidebar.classList.remove('mobile-open');
            updateToggleIcon();
        } else {
            // Remove collapsed class when switching to mobile
            sidebar.classList.remove('collapsed');
            // Reset to hamburger icon on mobile
            if (menuToggleIcon) {
                menuToggleIcon.classList.remove('fa-chevron-right');
                menuToggleIcon.classList.add('fa-bars');
            }
        }
    });
});
