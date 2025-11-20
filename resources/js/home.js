
  const oddRow = document.getElementById('oddRow');
  const evenRow = document.getElementById('evenRow');
  const nextBtn = document.getElementById('nextBtn');
  const prevBtn = document.getElementById('prevBtn');

  const colWidth = oddRow.querySelector('.col-3').offsetWidth + 10; // 16px gap
  const totalItems = oddRow.querySelectorAll('.col-3').length;
  const visibleCols = 4; // hiển thị 4 cột
  const maxIndex = totalItems - visibleCols;

  let currentIndex = 0;

  function updateView() {
    const offset = -currentIndex * colWidth;
    oddRow.style.transform = `translateX(${offset}px)`;
    evenRow.style.transform = `translateX(${offset}px)`;

    // Ẩn hiện nút khi đến đầu hoặc cuối
    prevBtn.style.display = currentIndex === 0 ? 'none' : 'block';
    nextBtn.style.display = currentIndex >= maxIndex ? 'none' : 'block';
  }

  nextBtn.addEventListener('click', () => {
    //nếu index hiện tại >0 (không nằm vị trí cuối) thì tiến lên
    if (currentIndex < maxIndex) currentIndex++;
    updateView();
  });
  //đặt sự kiễn sau khi click
  prevBtn.addEventListener('click', () => {
    //nếu index hiện tại >0 (không nằm vị trí đầu) thì quay ngược lại
    if (currentIndex > 0) currentIndex--;
    updateView();
  });

  // Khởi tạo
  updateView();
  

