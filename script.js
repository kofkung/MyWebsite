document.querySelectorAll('a[href*="delete_product.php"]').forEach(function(element) {
    element.addEventListener('click', function(event) {
        if (!confirm('ตุณแน่ใจใช่ไหมว่าต้องการลบ?')) {
            event.preventDefault();
        }
    });
});
