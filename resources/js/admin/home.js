const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const wrapper = document.getElementById('mainWrapper');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            wrapper.classList.toggle('sidebar-open');
        });
    
