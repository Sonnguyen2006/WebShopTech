
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
