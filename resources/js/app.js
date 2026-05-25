import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    // Tu dong an flash messages sau 5 giay
    var flashMessages = document.querySelectorAll('#flash-success, #flash-error');
    flashMessages.forEach(function (el) {
        setTimeout(function () {
            el.style.transition = 'opacity 0.5s ease';
            el.style.opacity = '0';
            setTimeout(function () {
                el.remove();
            }, 500);
        }, 5000);
    });

    // Xac nhan truoc khi xoa
    document.querySelectorAll('form[data-confirm]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            var message = form.getAttribute('data-confirm') || 'Ban co chac chan muon thuc hien hanh dong nay?';
            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    });
});
