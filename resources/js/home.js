document.addEventListener('DOMContentLoaded', function () {
    const carouselEl = document.getElementById('productCarousel');
    const carousel = new bootstrap.Carousel(carouselEl, {
        interval: false, // không tự chạy
        wrap: false      // không quay vòng
    });

    const items = carouselEl.querySelectorAll('.carousel-item');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    function updateButtons() {
        const activeIndex = Array.from(items).findIndex(item => item.classList.contains('active'));
        prevBtn.style.display = activeIndex === 0 ? 'none' : 'block';
        nextBtn.style.display = activeIndex === items.length - 1 ? 'none' : 'block';
    }

    prevBtn.addEventListener('click', () => {
        carousel.prev();
    });

    nextBtn.addEventListener('click', () => {
        carousel.next();
    });

    // Cập nhật nút mỗi khi slide thay đổi
    carouselEl.addEventListener('slid.bs.carousel', updateButtons);

    // Khởi tạo
    updateButtons();
});