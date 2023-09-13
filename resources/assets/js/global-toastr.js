'use strict';

(function () {
    const messageWrapper = document.querySelector('.message-global-text');
    if (messageWrapper) {
        if (messageWrapper.value && messageWrapper.dataset.type) {
            let prePositionClass =
                typeof toastr.options.positionClass === 'undefined' ? 'toast-top-right' : toastr.options.positionClass;

            toastr.options = {
                maxOpened: 1,
                autoDismiss: true,
                closeButton: $('#closeButton').prop('checked'),
                debug: $('#debugInfo').prop('checked'),
                newestOnTop: $('#newestOnTop').prop('checked'),
                progressBar: $('#progressBar').prop('checked'),
                positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
                preventDuplicates: $('#preventDuplicates').prop('checked'),
                onclick: null,
                rtl: isRtl
            };

            let $toast = toastr(msg, title);
        }
    }
})();

