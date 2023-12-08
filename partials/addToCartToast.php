<div class="toast-container position-fixed bottom-0 end-0 p-3" id="toastContainer"></div>

<script>
  const toastTriggers = document.querySelectorAll('.toast-cart')

toastTriggers.forEach(function(toastTrigger) {
    toastTrigger.addEventListener('click', () => {
        const toastContainer = document.getElementById('toastContainer');
        const newToast = document.createElement('div');
        newToast.className = 'toast';
        newToast.setAttribute('role', 'alert');
        newToast.setAttribute('aria-live', 'assertive');
        newToast.setAttribute('aria-atomic', 'true');
        newToast.innerHTML = `
            <div class="toast-header">
                <strong class="me-auto">Thom's Bakery</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <i class="fa-solid fa-circle-check fa-lg" style="color: #00ff00;"></i> Producto agregado al carrito!
            </div>
        `;
        toastContainer.appendChild(newToast);
        const toast = new bootstrap.Toast(newToast);
        toast.show();
    })
})
</script>
