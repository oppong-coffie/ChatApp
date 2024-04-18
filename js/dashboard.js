document.addEventListener('DOMContentLoaded', function() {
    let contact_info = document.getElementById('contact_info');
    contact_info.addEventListener('click', function() {
        contact_info.classList.add('selected');
    });
});
