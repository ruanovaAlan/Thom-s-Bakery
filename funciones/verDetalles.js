
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.random-img').forEach(function(img) {
        img.addEventListener('click', function() {
            let id = this.getAttribute('data-id');
            window.location.href = 'detalles.php?id='+id;
        });
    });
});