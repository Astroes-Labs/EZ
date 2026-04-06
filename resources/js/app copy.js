// import './bootstrap';
import toastr from 'toastr';



// resources/js/app.js  (or inline in layout)

document.addEventListener('livewire:initialized', () => {
    Livewire.on('toast', (event) => {
        // Configure Toastr options globally (optional - customize as needed)
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Show the toast based on type
        if (event.type === 'success') {
            toastr.success(event.message);
        } else if (event.type === 'error') {
            toastr.error(event.message);
        } else if (event.type === 'warning') {
            toastr.warning(event.message);
        } else if (event.type === 'info') {
            toastr.info(event.message);
        } else {
            // Fallback to success or just info
            toastr.info(event.message);
        }
    });
});



/* 
// resources/js/app.js or similar
Livewire.on('toast', (event) => {
    // example with Notyf / Toastify / custom
    Toastify({
        text: event.message,
        duration: 4000,
        gravity: "top",
        position: "right",
        backgroundColor: event.type === 'success' ? "#10b981" : "#ef4444",
    }).showToast();
});


 */

/* 
window.toastr = toastr;
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 5000,
};

 */
/* 
import toastr from 'toastr';
window.toastr = toastr;

toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 5000,
    extendedTimeOut: 1000,
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut'
}; */
