
const modal = document.getElementById('checkoutModal');
const btn = document.getElementById('showCheckoutForm');
const close = modal.querySelector('.close');

btn.addEventListener('click', () => {
    modal.classList.add('show');
});

close.addEventListener('click', () => {
    modal.classList.remove('show');
});

// Click ngoài modal để đóng
window.addEventListener('click', (event) => {
    if(event.target == modal) {
        modal.classList.remove('show');
    }
});
document.addEventListener("DOMContentLoaded", function () {
    
    const form = document.querySelector("#checkoutModal form");
    const paymentSelect = document.querySelector("select[name='payment_method']");

    form.addEventListener("submit", function (e) {

        if (paymentSelect.value === "Online") {
            e.preventDefault(); // chặn submit

            alert("⚠️ Tính năng thanh toán Online chưa được cập nhật.\nVui lòng chọn phương thức khác!");
        }
    });

});