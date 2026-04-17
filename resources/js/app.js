import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import 'toastr/build/toastr.min.css';
import toastr from 'toastr';

window.toastr = toastr;

// Optional global config
toastr.options = {
    closeButton: true,
    progressBar: true,
    newestOnTop: true,
    positionClass: "toast-top-right",
    timeOut: "4000",
};


window.addEventListener('toast', event => {
    const { type, message } = event.detail;

    if (typeof toastr[type] === 'function') {
        toastr[type](message);
    } else {
       // toastr.info(message);
    }
});