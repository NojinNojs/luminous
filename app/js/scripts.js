document.addEventListener('DOMContentLoaded', function() {
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Scroll ke bawah
            navbar.classList.remove('navbar-visible');
            navbar.classList.add('navbar-hidden');
        } else {
            // Scroll ke atas
            navbar.classList.remove('navbar-hidden');
            navbar.classList.add('navbar-visible');
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });

    // Memastikan navbar terlihat saat pertama kali halaman dimuat
    navbar.classList.add('navbar-visible');
});


