
    document.getElementById('shop').addEventListener('click', function () {
        window.location.href = 'shop.html'; 
    });
const productItems = document.querySelectorAll('.product-item');

productItems.forEach(item => {
    item.addEventListener('click', () => {
        window.location.href = 'shop.html';
    });
});
