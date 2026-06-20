
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const menuToggleIcon = menuToggle ? menuToggle.querySelector('i') : null;
    const logo = document.querySelector('.sidebar .logo');
    

    function updateToggleIcon() {
        if (menuToggleIcon && window.innerWidth > 768) {
            if (sidebar.classList.contains('collapsed')) {

                menuToggleIcon.classList.remove('fa-bars');
                menuToggleIcon.classList.add('fa-chevron-right');
            } else {

                menuToggleIcon.classList.remove('fa-chevron-right');
                menuToggleIcon.classList.add('fa-bars');
            }
        }
    }
    

    if (menuToggle) {
        menuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            

            if (window.innerWidth <= 768) {

                sidebar.classList.toggle('mobile-open');
            } else {

                sidebar.classList.toggle('collapsed');
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
                updateToggleIcon();
            }
        });
    }
    

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            sidebar.classList.toggle('mobile-open');
        });
    }
    

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


    if (sidebar && window.innerWidth > 768 && localStorage.getItem('sidebarCollapsed') === 'true') {
        sidebar.classList.add('collapsed');
        updateToggleIcon();
    }


    document.addEventListener('click', (e) => {
        if (window.innerWidth <= 768) {
            if (!sidebar.contains(e.target) && e.target !== mobileMenuToggle && !mobileMenuToggle.contains(e.target)) {
                sidebar.classList.remove('mobile-open');
            }
        }
    });
    

    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {

            sidebar.classList.remove('mobile-open');
            updateToggleIcon();
        } else {

            sidebar.classList.remove('collapsed');

            if (menuToggleIcon) {
                menuToggleIcon.classList.remove('fa-chevron-right');
                menuToggleIcon.classList.add('fa-bars');
            }
        }
    });
});
