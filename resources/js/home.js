document.addEventListener('DOMContentLoaded', function () {
  const container = document.querySelector('#productContainer');
  const products = document.querySelectorAll('.product-card');
  const total = products.length;
  let start = 0;
  const step = 8; // mỗi lần trượt 2 sản phẩm
  const visible = 8; // số sản phẩm hiển thị cùng lúc

  // Ẩn nút Prev khi ở đầu
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');

  function updateCarousel() {
    products.forEach((p, i) => {
      if (i >= start && i < start + visible) {
        p.style.display = 'block';
      } else {
        p.style.display = 'none';
      }
    });

    prevBtn.style.display = start === 0 ? 'none' : 'block';
    nextBtn.style.display = start + visible >= total ? 'none' : 'block';
  }

  updateCarousel();

  nextBtn.addEventListener('click', () => {
    if (start + visible < total) {
      start += step;
      updateCarousel();
    }
  });

  prevBtn.addEventListener('click', () => {
    if (start > 0) {
      start -= step;
      updateCarousel();
    }
  });
});